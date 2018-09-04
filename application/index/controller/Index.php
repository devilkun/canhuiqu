<?php
namespace app\index\controller;
use app\admin\controller\INEDX;
use app\index\model\Index as IndexModel;
use app\admin\model\Attachment as AttachmentModel;
use app\index\model\Exhibition as ExhibitionModel;
use think\Validate;
use think\Url;
use think\Cookie;
use think\Request;
use think\File;
use think\Hook;
use think\Image;
use think\Db;
use QL\QueryList;
/**
 * 前台首页控制器
 * @package app\index\controller
 */
class Index extends Home
{
    //首页
    public function index()
    {
        
            $map['status']=1;
            $id = Db::table('dp_exhibition_booth')->where('user_id','105')->limit('12')->column('ex_id');
            $map['a.id']=array('in',$id);
            $data_list = IndexModel::get_exlist($map);
            $min_price=[];
            foreach ($data_list as $dlk=>$dlu){
                $id = $dlu['id'];
                $list = Db::table('dp_exhibition_booth')->where(['ex_id'=>$id,'status'=>2])->select();
                if($list){
                    $price = [];
                    foreach ($list as $k=>$v){
                        $total = 0;
                        if($v['reg_fee']>0){
                            $total+=$v['reg_fee'];
                        }
                        if($v['stand_price']>0){
                            $min_area = min(explode('.',$v['stand_area']));
                            $total += $v['stand_price']*$min_area;
                        }

                        $price[$k] = $total;


                    }
                    $min_price[$id]=number_format(min($price));
                }else{
                    $min_price[$id] = 0;
                }

            }
            $this->assign(['list'  => $data_list,'min_price'=>$min_price,'unread_num'=>unread_num]);
            return $this->fetch();

    }
    //展会
    public function exhibition(){
           $keywords='';
           $args['parentCategoryId'] = 0;
           $args['categoryId'] = 0;
           $args['continentCode'] = 0;
           $args['countryCode'] = 0;
           $args['startTime'] = 0;
           //获取各州所对应的国家信息
           $CountryInfo = IndexModel::getCountryInfo();
            //查询最新发布的信息(5条)
           $district = ExhibitionModel::district();
           //获取分类信息
           $CategoryInfo = IndexModel::getCategoryInfo();
           $condition = input('type');
           if($condition){
               switch ($condition) {
                   case 'newest':
                       //获取最信发布的展会信息
                       $type='newest';
                       $time = strtotime("-1 month");
                       $where['create_time']=array('egt',$time);
                       $data_list = IndexModel::getExNewest($where);
                       $page = $data_list->render();
                       $this->assign(['CountryInfo'=>$CountryInfo,'CategoruInfo'=>$CategoryInfo,'args'=>$args,'list'=>$data_list,'page'=>$page,'district'=>$district,'type'=>$type,'keywords'=>$keywords,'unread_num'=>unread_num]);
                       break;
                    case 'hot':
                       //获取最信发布的展会信息
                       $type='hot';
                       $where['view']=array('gt','20');
                       $data_list = IndexModel::getExHot($where);
                       $page = $data_list->render();
                       $this->assign(['CountryInfo'=>$CountryInfo,'CategoruInfo'=>$CategoryInfo,'args'=>$args,'list'=>$data_list,'page'=>$page,'district'=>$district,'type'=>$type,'keywords'=>$keywords,'unread_num'=>unread_num]);
                    break;
                    case 'all':
                       $type='all';
                       $data_list = IndexModel::getExAll();
                       $page = $data_list->render();
                       $this->assign(['CountryInfo'=>$CountryInfo,'CategoruInfo'=>$CategoryInfo,'args'=>$args,'list'=>$data_list,'page'=>$page,'district'=>$district,'type'=>$type,'keywords'=>$keywords,'unread_num'=>unread_num]);
                       break;
               }
           }else{
                       $type='all';
                       $data_list = IndexModel::getExAll();
                       $page = $data_list->render();
                       $this->assign(['CountryInfo'=>$CountryInfo,'CategoruInfo'=>$CategoryInfo,'args'=>$args,'list'=>$data_list,'page'=>$page,'district'=>$district,'type'=>$type,'keywords'=>$keywords,'unread_num'=>unread_num]);
           }
           return $this->fetch();
    }
    //按条件查询分类
    public function search(){
         $args = input();
         $keywords='';
         //按存在主分类而不存在子分类时按主分类下所有子分类in聚合查询,当主分类不存在子分类时无数据
         if(!empty($args['parentCategoryId'])){
             if(empty($args['categoryId'])){
                //查询该主分类下所有的子分类Id
                $map['pid'] =$args['parentCategoryId'];
                $data_list = IndexModel::getChildrenId($map);
                if($data_list){
                    foreach ($data_list as $key=>$value){
                        $w[]=$value['id'];
                    }
                    $where['type'] = array('in',$w);
                }else{
                    $where['type'] =0;
                }
             }else{
                $where['type']= $args['categoryId'];
             }
         }
         //按存在的大洲Id而不存在国家Id时按大洲Id下的所有子分类in聚合查询,当大洲分类不存在子分类时无数据
         if(!empty($args['continentCode'])){
             if(empty($args['countryCode'])){
                $pid =$args['continentCode'];
                $list =IndexModel::getCountryInfo();
                if($list){
                    foreach($list[$pid] as $k=>$v){
                        $c[] =$v['id'];
                    }
                    $cc['pid'] = array('in',$c);
                    $cid = IndexModel::getCityInfo($cc);
                    $where['city_id']=array('in',$cid);
                }else{
                        $where['city_id']=0;
                }
             }else{
                $w['pid'] =$args['countryCode'];
                $cid = IndexModel::getCityInfo($w);
                $where['city_id']=array('in',$cid);
             }
         }
         //当starTime存在时的查询条件
        if(!empty($args["startTime"])){
             $where['startime'] = ['>=',strtotime($args['startTime'])];
        }
        //如果条件都为空
        if(empty($args['parentCategoryId']) && empty($args['categoryId']) && empty($args['continentCode']) && empty($args['countryCode']) && empty($args["startTime"])){
             $where=[];
        }
        if($where){
            //获取各州所对应的国家信息
            $CountryInfo = IndexModel::getCountryInfo();
            //获取分类信息
            $CategoryInfo = IndexModel::getCategoryInfo();
            $district = ExhibitionModel::district();
            switch ($args['type']) {
                case 'all':
                    $list=IndexModel::getExList($where);
                    $page = $list->render();
                    break;
                case 'condition':
                    $args['type']='all';
                    $list=IndexModel::getExList($where);
                    $page = $list->render();
                    break;
                case 'newest':
                    $time = strtotime("-1 month");
                    $where['create_time']=array('egt',$time);
                    $list=IndexModel::getExNewest($where);
                    $page = $list->render();
                    break;
                case 'hot':
                    $where['view']=array('gt','20');
                    $list = IndexModel::getExHot($where);
                    $page = $list->render();
                    $this->assign(['CountryInfo'=>$CountryInfo,'CategoruInfo'=>$CategoryInfo,'args'=>$args,'list'=>$list,'page'=>$page,'district'=>$district,'type'=>$args['type'],'keywords'=>$keywords]);
                    break;
            }
            $this->assign(['CountryInfo'=>$CountryInfo,'CategoruInfo'=>$CategoryInfo,'args'=>$args,'list'=>$list,'page'=>$page,'district'=>$district,'type'=>$args['type'],'keywords'=>$keywords]);
            return $this->fetch('index/exhibition');
        }else{
            $args['parentCategoryId'] = 0;
            //获取各州所对应的国家信息
            $CountryInfo = IndexModel::getCountryInfo();
            //获取分类信息
            $CategoryInfo = IndexModel::getCategoryInfo();
            switch ($args['type']) {
                case 'all':
                    $list=IndexModel::getExList($where);
                    $page = $list->render();
                    break;
                case 'newest':
                    $time = strtotime("-1 month");
                    $where['create_time']=array('egt',$time);
                    $list=IndexModel::getExNewest($where);
                    $page = $list->render();
                    break;
                case 'hot':
                    $where['view']=array('gt','20');
                    $list = IndexModel::getExHot($where);
                    $page = $list->render();
                    break;
            }
            $district = ExhibitionModel::district();
            $this->assign(['CountryInfo'=>$CountryInfo,'CategoruInfo'=>$CategoryInfo,'args'=>$args,'list'=>$list,'page'=>$page,'district'=>$district,'type'=>$args['type'],'keywords'=>$keywords]);
            return $this->fetch('index/exhibition');
        }

    }
//    public function pc(){
//        $ruleA =array("title"=>array('.e-title','text','-span'),
//            'stime'=>array('.e-info-lt>li:eq(0)','text','',function($content){$arr = explode('~',$content);$content = strtotime($arr[0]);return $content;}),
//            'etime'=>array('.e-info-lt>li:eq(0)','text','',function($content){$arr = explode('~',$content);$content = strtotime($arr[1]);return $content;}),
//            "address"=>array('.e-info-lt>li:eq(1)','text','',function($content){$arr = explode(' ',$content);$content = $arr[0];return $content;}),
//            'people'=>array('.e-info-lt>li:eq(2)','text','',function($content){$string = str_replace('人','',$content);return $string;}),
//            'organization'=>array('.e-info-lt>li:eq(3)','text'),
//            'detail'=>array('.event-content','text'));
//        $ruleB = array(
//            'meeting'=>array('.mod-meet-lt>li>a','href')
//        );
//        $hj = QueryList::Query('http://www.bandenghui.com',$ruleB);
//        foreach ($hj->data as $value){
//            $href = $value['meeting'];
//            $h = QueryList::Query($href,$ruleA);
//            $n[] = ($h->data)[0];
//        }
//        halt($n);
//    }
    //服务器定时访问方法
    public function cron(){
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379);
        $keys = $redis->keys('v:c:*');
            foreach ($keys as $key) {
                      $id = substr($key,4);
                      //获取当前展会ID的已有浏览量
                      $view = Db::table('dp_exhibition_detail')->where('id',$id)->value('view');
                      $click = $redis->get($key);
                      $data['view']=$view+$click;
                      //更新浏览量
                      Db::table('dp_exhibition_detail')->where('id',$id)->update($data);
            }
                      $redis->delete($keys);
    }
  public function send(){
      	// 指明给谁推送，为空表示向所有在线用户推送
        $to_uid = '';
        // 推送的url地址，使用自己的服务器地址
        $push_api_url = "http://canhuiqu.com:2121/";
        $post_data = array(
           "type" => "publish",
           "content" => "这个是推送的测试数据",
           "to" => $to_uid, 
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $push_api_url );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_data );
        curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Expect:"));
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        var_export($return);
}
  public function test(){
       
       halt($id);
  }
  //关键字查询
    public function searchEx(){
        $args=[];
        $args['parentCategoryId'] = 0;
        $args['categoryId'] = 0;
        $args['continentCode'] = 0;
        $args['countryCode'] = 0;
        $args['startTime'] = 0;
        $args['type']=0;
        $type='condition';
        $keywords = input('keywords');
        if(strpos($keywords,' ')){
            $keywords_array = explode(' ',$keywords);
            $where_keywords = array();
            array_push($where_keywords,'like');
            $ARR = array();
            foreach ($keywords_array as $value){
                array_push($ARR,'%'.$value.'%');
            }
            array_push($where_keywords,$ARR);
            array_push($where_keywords,'AND');
            $where['dp_exhibition_detail.name|dp_exhibition_detail.address|dp_exhibition_detail.venues|dp_exhibition_detail.ename'] = $where_keywords;
        }else {
            $where['dp_exhibition_detail.name|dp_exhibition_detail.address|dp_exhibition_detail.venues|dp_exhibition_detail.ename'] = array('like', '%' . $keywords . '%');
        }
        $where['dp_exhibition_detail.status']=1;
        $data_list = IndexModel::getExList($where);
        $page = $data_list->render();
        //获取各州所对应的国家信息
        $CountryInfo = IndexModel::getCountryInfo();
        //获取分类信息
        $CategoryInfo = IndexModel::getCategoryInfo();
        $district = ExhibitionModel::district();
        $this->assign(['CountryInfo'=>$CountryInfo,'CategoruInfo'=>$CategoryInfo,'args'=>$args,'list'=>$data_list,'page'=>$page,'district'=>$district,'type'=>$type,'keywords'=>$keywords]);
        return $this->fetch('index/exhibition');
    }
}

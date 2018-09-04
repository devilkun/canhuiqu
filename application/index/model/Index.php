<?php
namespace app\index\model;

use think\Model as ThinkModel;
use think\Db;
/**
 * 广告模型
 * @package app\cms\model
 */
class Index extends ThinkModel
{

    //获取展会列表
    public static function get_exlist($map=[]){
        $list = Db::table('dp_exhibition_detail')
                ->alias('a')
                ->field('a.id,a.name,a.picture,a.content,a.startime,a.endtime,a.view,a.area,a.ename,c.name as typename,b.name as districtname')
                ->join('dp_exhibition_classification c','a.type = c.id')
                ->join('dp_exhibition_district b','a.city_id=b.id')
                ->limit(12)
                ->order("create_time desc")
                ->where($map)
                ->select();
        return $list;
    }

      //获取会展详细内容
      public static function getEXlistOne($map=[]){
        $list = Db::table('dp_exhibition_detail')
                ->alias('a')
                ->field('a.id,a.ename,a.lat,a.lng,a.city_id,a.name,a.organizer,a.venues,a.address,a.picture,a.content,a.range,a.type,a.startime,a.endtime,a.view,a.area,
                b.name as districtname,c.name as classification,u.username as author')
                ->join('dp_exhibition_classification c','a.type = c.id')
                ->join('dp_exhibition_district b','a.city_id=b.id')
                ->join('dp_admin_user u','a.author=u.id')
                ->where($map)
                ->find();
          return $list;
      }
    //获取分类信息
    public static function getType(){
          $list = Db::table('dp_exhibition_classification')->field('id,name,pid')->select();
          return $list;
    }
    //获取同行业会展信息（5条）
    public static function similarlist($type=[],$id=''){
         $list = Db::table('dp_exhibition_detail')
                             ->alias('a')
                             ->field('a.id,a.name,a.startime,a.endtime,a.picture,d.name as city')
                             ->join('dp_exhibition_district d','a.city_id=d.id')
                             ->order('id desc')
                             ->where($type)
                             ->whereNotIn('dp_exhibition_detail.id',$id)
                             ->limit(5)
                             ->select();
                            return $list;
    }
    //******国内联动信息********//

      //获取省份列表
     public static function getRegionlist(){
          $provincelist = Db::table('dp_city')->field('id,name')->where('leveltype=1')->select();
          return $provincelist;
     }
     //获取城市列表
    public static function getCitylist($pid){
        $citylist = Db::table('dp_city')->field('id,name')->where("pid=$pid")->select();
        return $citylist;
    }
    //获取活动类型
    public static function getActypelist(){
        $actype = Db::table('dp_exhibition_classification')->field('id,name,pid')->select();
        return $actype;
    }
    //获取展会主分类类型
    public static function getExParentType(){
        $list = Db::table('dp_exhibition_classification')->field('id,name,pid')->where('pid',0)->select();
        return $list;
    }
    //******国外联动信息********//

    //获取大洲列表
    public static function getContinentlist(){
        $provincelist = Db::table('dp_exhibition_district')->field('id,name')->where('level=1')->select();
        return $provincelist;
    }
    //获取城市列表
    public static function getCountrylist($pid){
        $countrylist = Db::table('dp_exhibition_district')->field('id,name')->where("pid=$pid")->select();
        return $countrylist;
    }
    //获取国外城市列表
    public static function getFcitylist($pid){
        $fcitylist = Db::table('dp_exhibition_district')->field('id,name')->where("pid=$pid")->select();
        return $fcitylist;
    }
    //添加会展数据至数据库
    public static function saveEx($Ex=[]){
        $list = Db::table("dp_exhibition_detail")->insert($Ex);
        return $list;
    }
    //查询当前主分类下的子分类ID
    public static function getChildrenId($map=[]){
        $list = Db::table("dp_exhibition_classification")->field('id')->where($map)->select();
        return $list;
    }
    //获取主分类下子分类信息
    public static function getChildrenlist($pid){
        $childrenlist = Db::table('dp_exhibition_classification')->field('id,name')->where("pid=$pid")->select();
        return $childrenlist;
    }
    //获取展位发布信息
    public static function getBoothList($id=""){
        $list = Db::view("dp_exhibition_booth",'*')
                        ->view("dp_user_qualificationsinfo",'blicense,company,telephone,qq','dp_user_qualificationsinfo.user_id=dp_exhibition_booth.user_id')
                        ->where('ex_id',$id)
                        ->select();
        return $list;
    }
    //获取单位
    public static function getUnitList(){
        $result = Db::table("dp_units")->field("*")->select();
        foreach ($result as $value){
               $list[$value['id']] = $value['name'];
        }
        return $list;
    }
    //获取各州所对应的国家信息
    public static function getCountryInfo(){
        $result= Db::name("exhibition_district")->where('pid',0)->column('name','id');
        foreach ($result as $k=>$v){
            $list[$k] = Db::name("exhibition_district")->field('id,name')->where('pid',$k)->select();
        }
        return $list;

    }
    //获取国家所对应的城市信息
    public static function getCityInfo($w=[]){
        $result= Db::name("exhibition_district")->where($w)->column('id');
        return $result;
    }
    //获取分类信息
    public static function getCategoryInfo(){
        $result = Db::name("exhibition_classification")->field('id,name')->where('pid',0)->select();
        foreach ($result as $key=>$value){
              $list[$key]['Pname'] = $value['name'];
              $list[$key]['Pid'] = $value['id'];
              $list[$key]['Children'] =Db::name("exhibition_classification")->field('id,name')->where('pid',$value['id'])->select();
        }
        return $list;
    }
    //获取所有的展会信息
    public static function getExAll(){
        $list = Db::view('dp_exhibition_detail','*')
                  ->view('dp_exhibition_classification','name as ty_name','dp_exhibition_classification.id=dp_exhibition_detail.type')
                  ->where('status',1)
                  ->paginate(8,false,['query'=>request()->param()]);
        return $list;
    }
    //根据查询条件获取数据列表
    public static function getExList($map=[]){
        $list = Db::view('dp_exhibition_detail','*')
                  ->view('dp_exhibition_classification','name as ty_name','dp_exhibition_classification.id=dp_exhibition_detail.type')
                  ->where($map)
                  ->paginate(8,false,['query'=>request()->param()]);
        return $list;
    }
    //获取最新发布的展会信息
    public static function getExNewest($where=[]){
        $list = Db::view('dp_exhibition_detail','*')
                  ->view('dp_exhibition_classification','name as ty_name','dp_exhibition_classification.id=dp_exhibition_detail.type')
                  ->order('create_time desc')
                  ->where($where)
                  ->paginate(8);
        return $list;
    }
    //获取最热展会信息
    public static function getExHot($where=[]){
        $list = Db::view('dp_exhibition_detail','*')
        ->view('dp_exhibition_classification','name as ty_name','dp_exhibition_classification.id=dp_exhibition_detail.type')
        ->order('view desc')
        ->where($where)
        ->paginate(8);
        return $list;   
    }
    //获取拼团发布信息
    public static function getPtList($id=''){
       $list = Db::view('dp_exhibition_pt','*')
           ->view("dp_user_qualificationsinfo",'blicense,company,telephone,qq','dp_user_qualificationsinfo.user_id=dp_exhibition_pt.user_id')
               ->where('ex_id',$id)->select();
       return $list;
    }
    //获取当前拼团发布信息
    public static function getPtListOne($id='',$user_id=''){
        $where['dp_exhibition_pt.ex_id']=$id;
        $where['dp_exhibition_pt.user_id']=$user_id;
        $list = Db::view('dp_exhibition_pt','*')
            ->view("dp_user_qualificationsinfo",'blicense,company,telephone,qq','dp_user_qualificationsinfo.user_id=dp_exhibition_pt.user_id')
            ->where($where)
            ->find();
        return $list;
    }
    //获取当前商户行程信息
    public static function getStrokeList($id='',$user_id=''){
        $where['dp_exhibition_stroke.ex_id']=$id;
        $where['dp_exhibition_stroke.user_id']=$user_id;
        $list = Db::table('dp_exhibition_stroke')->where($where)->order('day','asc')->select();
        return $list;
    }
    //根据展位id获取展位信息
    public static function getBoothByArgs($booth_id=''){
        $list = Db::view('dp_exhibition_booth','*')
            ->view("dp_user_qualificationsinfo",'blicense,company,telephone,qq','dp_user_qualificationsinfo.user_id=dp_exhibition_booth.user_id')
            ->where('dp_exhibition_booth.id',$booth_id)
            ->find();
        return $list;
    }

}

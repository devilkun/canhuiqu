<?php
// +----------------------------------------------------------------------
// | 海豚PHP框架 [ DolphinPHP ]
// +----------------------------------------------------------------------
// | 版权所有 2016~2017 河源市卓锐科技有限公司 [ http://www.zrthink.com ]
// +----------------------------------------------------------------------
// | 官方网站: http://dolphinphp.com
// +----------------------------------------------------------------------
// | 开源协议 ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------

namespace app\index\controller;
use app\index\model\Manager as ManagerModel;
use app\index\model\Exhibition as ExhibitionModel;
use app\index\model\Index as IndexModel;
use app\admin\model\Attachment as AttachmentModel;
use think\Ucpaas;
use think\Request;
use think\Db;
use think\Helper;
use think\Hook;
use think\Cookie;
/**
 * 前台首页控制器
 * @package app\index\controller
 */
class Exhibition extends Home
{
           //展会列表
           public function lists(){
                        //判断用户是否登录
                        Hook::listen('CheckAuth',$params);
                        //判断是否为商家账户
                        Hook::listen('CheckQua',$params);
                        $map['dp_admin_user.id']=Cookie::get('user_id','worldevents_');
                        $where['status']=1;
                        $data_list = ExhibitionModel::get_exlist($where);
                        $page = $data_list->render();
                        $type = IndexModel::getType();
                        $district = ExhibitionModel::district();
                        //获取用户添加展会列表数据
                        $map_myex['user_id']=$map['dp_admin_user.id'];
                        $myex =ExhibitionModel::getAddmyex($map_myex);
                        foreach ($type as $k=>$v){
                            $tpid[$v['id']] =$v['name'];
                        }
                        $list = ManagerModel::getUserInfo($map);
                        $this->assign(['list'=>$list,'data_list'=>$data_list,'type'=>$type,'tpid'=>$tpid,'district'=>$district,'myex'=>$myex,'page'=>$page,'unread_num'=>unread_num]);
                        return $this->fetch();
           }
           //添加展会
           public function add()
            {
                //判断用户是否登录
                Hook::listen('CheckAuth',$params);
                //判断是否为商家账户
                Hook::listen('CheckQua',$params);
		        $timelist = $this->getTimelist();
		        //获取省市区联动信息
		        $regionlist = IndexModel::getRegionlist();
		        //获取活动类型
		        $actype = IndexModel::getExParentType();
		        //获取大洲联动信息
		        $continent = IndexModel::getContinentlist();
		        $this->assign(['timelist'=>$timelist,'province'=>$regionlist,'actype'=>$actype,'continent'=>$continent,'unread_num'=>unread_num]);
                        $map['dp_admin_user.id']=Cookie::get('user_id','worldevents_');
	                    $list = ManagerModel::getUserInfo($map);
	                    $this->assign('list',$list);
		        return $this->fetch();
	}
    
//我的展会
  public function myex(){
      //判断用户是否登录
      Hook::listen('CheckAuth',$params);
      //判断是否为商家账户
      Hook::listen('CheckQua',$params);
                        $map['dp_admin_user.id']=Cookie::get('user_id','worldevents_');
                        $where['dp_exlist.user_id']=$map['dp_admin_user.id'];
                        $data_list = ExhibitionModel::get_Myexlist($where);                    
                        $page = $data_list->render();
                        $type = IndexModel::getType();
                        $district = ExhibitionModel::district();
                        //获取用户添加展会列表数据
                        foreach ($type as $k=>$v){
                            $tpid[$v['id']] =$v['name'];
                        }
                        $id = $map['dp_admin_user.id'];
                        //获取已发布展位ID
                        $booth_id = ExhibitionModel::getBoothId($id);
                        //获取已发布的拼团ID
                        $pt_id = ExhibitionModel::getPtId($id);

                        $list = ManagerModel::getUserInfo($map);
                        $this->assign(['list'=>$list,'data_list'=>$data_list,'type'=>$type,'tpid'=>$tpid,'district'=>$district,'booth_id'=>$booth_id,'pt_id'=>$pt_id,'page'=>$page,'unread_num'=>unread_num]);
                        return $this->fetch();
  }
  
//创建24小时制的时间列表
	   public function getTimelist(){

	       for($i=0;$i<=23;$i++){
		           if($i<10){
		               $time[] = '0'.$i.':'.'00';
		           }else{
		               $time[] = $i.':'.'00';
		           }

	        }
	            return $time;
	   }
 //根据获取的省份id获取对应的城市列表
    public function ajax_city(){
        $pid = Request::instance()->post('pid');
        $citylist = IndexModel::getCitylist($pid);
        $len = count($citylist);
        return ['citylist'=>$citylist,'len'=>$len];
    }
    //根据获取的大洲id获取对应的国家列表
    public function ajax_country(){
        $pid = Request::instance()->post('pid');
        $countrylist = IndexModel::getCountrylist($pid);
        $len = count($countrylist);
        return ['countrylist'=>$countrylist,'len'=>$len];
    }
    //根据获取的国家id获取对应的城市列表
    public function ajax_fcity(){
        $pid = Request::instance()->post('pid');
        $fcitylist = IndexModel::getFcitylist($pid);
        $len = count($fcitylist);
        return ['fcitylist'=>$fcitylist,'len'=>$len];
    }
    //根据主分类ID获取对应的子分类列表
    public function ajax_cid(){
        $pid = Request::instance()->post('pid');
        $childrenlist = IndexModel::getChildrenlist($pid);
        $len = count($childrenlist);
        return ['childrenlist'=>$childrenlist,'len'=>$len];
    }
    //判断文件上传信息
    public function checkUpload(){
        //判断当前日期所对应的文件夹是否存在，若不存在则创建
        $dir          = config('upload_path') . DS . 'images' . DS . date('Ymd', $this->request->time());
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        $name = $_FILES['file']['name'];
        $uploaddir = 'images\\' . date('Ymd', $this->request->time()) . '\\';
        $typeArr=['gif','jpg','png'];
        $type = strtolower(substr(strrchr($name, '.'), 1));
        $newname =md5($name).'.'.$type;
        $file_path    = $dir . DS . $newname;
        $uploadfile = $uploaddir .$newname;
        //获取文件类型
        if (!in_array($type, $typeArr)) {
            echo "请上传jpg,png或gif类型的图片！";
            exit;
        }
        $info=move_uploaded_file($_FILES['file']['tmp_name'],$file_path);
        if ($info) {
            // 获取附件信息
            $file_info = [
                'uid'    => cookie('user_id'),
                'name'   => $name,
                'mime'   => $_FILES['file']['type'],
                'path'   => 'uploads/'.str_replace('\\', '/', $uploaddir).str_replace('\\', '/', $newname),
                'ext'    => $type,
                'size'   => $_FILES['file']['size'],
                'md5'    => '',
                'sha1'   => '',
                'thumb'  => '',
                'module' => 'index',
            ];

            // 写入数据库
            if ($file_add = AttachmentModel::create($file_info)){
                echo(json_encode($file_add['id']));
            }
        } else {
            print "Possible file upload attack!  Here's some debugging info:\n";
            print_r($_FILES);
        }
    }
    //处理表单信息
    public function subFrom(){
        //整理表单信息
        $data = Request::instance()->post();
        $ex=['author'=>Cookie::get('user_id','worldevents_'),
             'picture'=>$data['picture'],
             'telephone'=>$data['telephone'],
             'content'=>$data['content'],
             'range'=>$data['range'],
             'name'=>$data['name'],
             'ename'=>$data['ename'],
             'startime'=>strtotime($data['startime']),
             'endtime'=>strtotime($data['endtime']),
             'area'=>$data['area'],
             'city_id'=>$data['city'],
             'address'=>$data['address'],
             'type'=>$data['cid'],
             'venues'=>$data['venues'],
             'organizer'=>$data['organizer'],
             'contractor'=>$data['contractor'],
             'picture'=>$data['picture'],
             'space'=>$data['space'],
             'create_time'=>time(),
             'status'=>'2',                           
            ];
            $url = "https://ditu.google.cn/maps/api/geocode/json?address=".urlencode($ex['address'])."&key=AIzaSyA5uMFeNxZ45Xqzvm_jawEOU2l0PFJVlSQ";
            $latlngByAddress = json_decode($this->curl_request($url));
             if($latlngByAddress && $latlngByAddress->status=="OK"){
                 $ex['lat']=$latlngByAddress->results[0]->geometry->location->lat;
                 $ex['lng']=$latlngByAddress->results[0]->geometry->location->lng;
             }else{
                 $city = Db::table('dp_exhibition_district')->where('id',$ex['city_id'])->value('name');
                 $url = "https://ditu.google.cn/maps/api/geocode/json?address=".urlencode($city)."&key=AIzaSyA5uMFeNxZ45Xqzvm_jawEOU2l0PFJVlSQ";
                 $latlngByCity = json_decode($this->curl_request($url));
                 if($latlngByCity && $latlngByCity->status=="OK"){
                    $ex['lat']=$latlngByCity->results[0]->geometry->location->lat;
                    $ex['lng']=$latlngByCity->results[0]->geometry->location->lng;
                 }
             }    
        $result=IndexModel::saveEx($ex);
        if($result){
            exit(json_encode(1));
        }else{
        	exit(json_encode(0));
        }
    }

    //添加我的展会
    public function ajax_addEx(){
        $map['exhibition_id'] = input('id');
        $map['user_id']=Cookie::get('user_id','worldevents_');
        $result = Db::table('dp_exlist')->insert($map);
        if($result){
            exit(json_encode(1));
        }else{
            exit(json_encode(0));
        }

    }
    //删除我的展会
    public function ajax_delEx(){
        $map['id'] = input('id');
        $result = Db::table('dp_exlist')->delete($map);
        if($result){
            exit(json_encode(1));
        }else{
            exit(json_encode(0));
        }

    }
    //批量添加
    public function ajax_addExbatch(){
        $data = input('id/a');
        $num =0;
        $len = count($data);
        for($i=0;$i<$len;$i++){
              $map['exhibition_id'] = $data[$i];
              $map['user_id']=Cookie::get('user_id','worldevents_');
              $result = Db::table('dp_exlist')->insert($map);
                  if($result){
                     $num +=1;
                  }
        }
         if($num ==$len){
            exit(json_encode(1));
        }else{
            exit(json_encode(0));
        }

    }
    //批量删除
    public function ajax_delExbatch(){
        $data = input('id/a');
        $num =0;
        $len = count($data);
        for($i=0;$i<$len;$i++){
            $map['id'] = $data[$i];
            $result = Db::table('dp_exlist')->delete($map);
            if($result){
                $num +=1;
            }
        }
        if($num ==$len){
            exit(json_encode(1));
        }else{
            exit(json_encode(0));
        }

    }
    //条件查询
    public function searchEx(){
        //判断用户是否登录
        Hook::listen('CheckAuth',$params);
        //判断是否为商家账户
        Hook::listen('CheckQua',$params);
       $data = input();
       if(!empty($data['ex_name'])){
           $name='%'.$data['ex_name'].'%';
           $where['name']=['like',$name];
       }
       if(!empty($data['organizer'])) {
            $organizer='%'.$data['organizer'].'%';
            $where['organizer']=['like',$organizer];
       }
       if(!empty($data['ex_venues'])) {
            $venues='%'.$data['ex_venues'].'%';
            $where['venues']=['like',$venues];
       }
       if(!empty($data['ex_type'])) {
            //查询该分类下的子分类
            $arg['pid']= $data['ex_type'];
            $Cid = IndexModel::getChildrenId($arg);
            if($Cid){
                foreach ($Cid as $key=>$value){
                    $w[]=$value['id'];
                }
                $where['type'] = array('in',$w);
            }else{
                $where['type'] = 0;
            }

       }
       if(!empty($data['startime'])){
            $where['startime']=['>=',strtotime($data['startime'])];
       }
       if(!empty($data['endtime'])){
            $where['endtime']=['<=',strtotime($data['endtime'])];
       }
       if(count($data)==0){
            $where = [];
       }
        $map['dp_admin_user.id']=Cookie::get('user_id','worldevents_');
        $where['status']=1;
        $data_list = ExhibitionModel::get_exlist($where);
        $page = $data_list->render();
        $type = IndexModel::getType();
        $district = ExhibitionModel::district();
        //获取用户添加展会列表数据
        $map_myex['user_id']=$map['dp_admin_user.id'];
        $myex =ExhibitionModel::getAddmyex($map_myex);
        foreach ($type as $k=>$v) {
                $tpid[$v['id']] = $v['name'];
        }
        $list = ManagerModel::getUserInfo($map);
        $this->assign(['list'=>$list,'data_list'=>$data_list,'type'=>$type,'tpid'=>$tpid,'district'=>$district,'myex'=>$myex,'page'=>$page,'unread_num'=>unread_num]);
        return $this->fetch('exhibition/lists');

    }
    //条件查询 MyEx
    public function searchMyEx(){
        //判断用户是否登录
        Hook::listen('CheckAuth',$params);
        //判断是否为商家账户
        Hook::listen('CheckQua',$params);
        $data = input();
        if(!empty($data['startime'])){
            $where['startime']=['>=',strtotime($data['startime'])];
        }
        if(!empty($data['endtime'])){
            $where['endtime']=['<=',strtotime($data['endtime'])];
        }
        if(!empty($data['ex_name'])){
            $name='%'.$data['ex_name'].'%';
            $where['name']=['like',$name];
        }
        if(count($data)==""){
            $where = [];
        }
        $where['user_id']=Cookie::get('user_id','worldevents_');
        $where['status']=1;
        $data_list = ExhibitionModel::get_Myexlist($where);
        $page = $data_list->render();
        $type = IndexModel::getType();
        foreach ($type as $k=>$v) {
            $tpid[$v['id']] = $v['name'];
        }
        $district = ExhibitionModel::district();
        $map['dp_admin_user.id'] =$where['user_id'];
        $list = ManagerModel::getUserInfo($map);
        //获取已发布展位ID
        $id = $map['dp_admin_user.id'];
        $booth_id = ExhibitionModel::getBoothId($id);
        //获取已发布的拼团ID
        $pt_id = ExhibitionModel::getPtId($id);
        $this->assign(['list'=>$list,'data_list'=>$data_list,'type'=>$type,'tpid'=>$tpid,'district'=>$district,'booth_id'=>$booth_id,'pt_id'=>$pt_id,'page'=>$page,'unread_num'=>unread_num]);
        return $this->fetch('exhibition/myex');
    }
    //展位图上传
    public function ajax_booth_pic(){
        $file = $_FILES['booth_pic'];
        $pic_id = $this->saveImg($file);
        exit(json_encode($pic_id));
    }
    //标摊效果图上传
    public function ajax_stand_pic(){
        $file = $_FILES['stand_pic'];
        $pic_id = $this->saveImg($file);
        exit(json_encode($pic_id));
    }
    //表单数据处理
    public function ajax_add_mybooth(){
        $data = input();
        $ex_id = Db::table('dp_exlist')->field('exhibition_id')->where('id',$data['ex_id'])->find();
        $data['ex_id'] =$ex_id['exhibition_id'];
        $data['status']=2;
        $data['commit_time']=time();
        $data["user_id"] = Cookie::get('user_id','worldevents_');
        $result = Db::table('dp_exhibition_booth')->insert($data);
        if($result){
                exit(json_encode('1'));
        }else{
                exit(json_encode('2'));
        }
        
    }
    //我的展位(编辑)
    public function ajax_edit_mybooth(){
        $data = input();
        $ex_id = Db::table('dp_exlist')->field('exhibition_id')->where('id',$data['ex_id'])->find();
        $data['ex_id'] =$ex_id['exhibition_id'];
        //判断数据信息
        if(!array_key_exists('reg_fee',$data)){
             $data['reg_fee']='';
             $data['reg_desc']='';
             $data['regfee_cu']='';
        }
        if(!array_key_exists('indoor_price',$data)){
             $data['indoor_price']='';
             $data['indoor_desc']='';
             $data['indoor_cu']='';
             $data['indoor_au']='';
             $data['indoor_area']='';
        }
        if(!array_key_exists('stand_price',$data)){
            $data['stand_price']='';
            $data['stand_desc']='';
            $data['stand_cu']='';
            $data['stand_au']='';
            $data['stand_area']='';
        }
        if(!array_key_exists('outdoor_price',$data)){
            $data['outdoor_price']='';
            $data['outdoor_desc']='';
            $data['outdoor_cu']='';
            $data['outdoor_au']='';
            $data['outdoor_area']='';
        }
        if(!array_key_exists('other_fee',$data)){
            $data['other_fee']='';
            $data['other_cu']='';
            $data['other_au']='';
            $data['otherfee_desc']='';
        }
        $result = Db::table('dp_exhibition_booth')->where('id',input('ex_id'))->update($data);
        if($result){
            exit(json_encode('1'));
        }else{
            exit(json_encode('2'));
        }

    }
    //表单数据处理(线下预定)
    public function ajax_add_mybooth_off(){
        $data['describe'] = input('describe');
        $data['id'] = input('id');
        $ex_id = Db::table('dp_exlist')->field('exhibition_id')->where('id',$data['id'])->find();
        $data['ex_id'] =$ex_id['exhibition_id'];
        $data['status']=2;
        $data['commit_time']=time();
        $data['pattern']=0;
        $data["user_id"] = Cookie::get('user_id','worldevents_');
        $result = Db::table('dp_exhibition_booth')->insert($data);
        if($result){
            exit(json_encode('1'));
        }else{
            exit(json_encode('2'));
        }
    }
    //保存图片
    public function saveImg($file=[]){
        $name = $file['name'];
        $dir          = config('upload_path') . DS . 'images' . DS . date('Ymd', $this->request->time());
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        $uploaddir = 'images\\' . date('Ymd', $this->request->time()) . '\\';
        $type = strtolower(substr(strrchr($name, '.'), 1));;
        $newname =md5($name).'.'.$type;
        $file_path    = $dir . DS . $newname;
        $info=move_uploaded_file($file['tmp_name'],$file_path);
        if ($info) {
            // 获取附件信息
            $file_info = [
                'uid'    => cookie('user_id'),
                'name'   => $name,
                'mime'   => $file['type'],
                'path'   => 'uploads/'.str_replace('\\', '/', $uploaddir).str_replace('\\', '/', $newname),
                'ext'    => $type,
                'size'   => $file['size'],
                'md5'    => '',
                'sha1'   => '',
                'thumb'  => '',
                'module' => 'exhibition/myex',
            ];
            // 写入数据库
            if ($file_add = AttachmentModel::create($file_info)){
                return $file_add['id'];
            }
        }
    }

    //我的展位
    public function mybooth(){
        //判断用户是否登录
        Hook::listen('CheckAuth',$params);
        //判断是否为商家账户
        Hook::listen('CheckQua',$params);
        $map['dp_admin_user.id']=Cookie::get('user_id','worldevents_');
        $where['dp_exhibition_booth.user_id']=$map['id'];
        $data_list = ExhibitionModel::get_MyBoothList($where);
        $page = $data_list->render();
        $type = IndexModel::getType();
        $district = ExhibitionModel::district();
        foreach ($type as $k=>$v) {
            $tpid[$v['id']] = $v['name'];
        }
        $list = ManagerModel::getUserInfo($map);
        $this->assign(['list'=>$list,'data_list'=>$data_list,'type'=>$type,'tpid'=>$tpid,'district'=>$district,'page'=>$page,'unread_num'=>unread_num]);
        return $this->fetch();
    }
    //我的拼团
    public function mypt(){
        //判断用户是否登录
        Hook::listen('CheckAuth',$params);
        //判断是否为商家账户
        Hook::listen('CheckQua',$params);
        $map['dp_admin_user.id']=Cookie::get('user_id','worldevents_');
        $where['dp_exhibition_pt.user_id']=$map['id'];
        $data_list = ExhibitionModel::get_MyPtList($where);
        $page = $data_list->render();
        $type = IndexModel::getType();
        $district = ExhibitionModel::district();
        foreach ($type as $k=>$v) {
            $tpid[$v['id']] = $v['name'];
        }
        $list = ManagerModel::getUserInfo($map);
        $this->assign(['list'=>$list,'data_list'=>$data_list,'type'=>$type,'tpid'=>$tpid,'district'=>$district,'page'=>$page,'unread_num'=>unread_num]);
        return $this->fetch();
    }
    //我的展位预览
    public function ajax_booth_preview(){
        //获取展位对应展会ID
        $where['ex_id'] = input("id");
        //用户ID
        $where['user_id']=Cookie::get('user_id','worldevents_');
        //获取展位信息
        $data = ExhibitionModel::getMyboothByArgs($where);
        exit(json_encode($data));
    }
    //我的拼团预览
    public function ajax_pt_preview(){
        //获取展位对应展会ID
        $where['ex_id'] = input("id");
        //用户ID
        $where['user_id']=Cookie::get('user_id','worldevents_');
        //获取展位信息
        $data = ExhibitionModel::getMyptByArgs($where);
        exit(json_encode($data));
    }
    //获取图片id
    public function ajax_get_file_path(){
        $id = input('id');
        $path = get_file_path($id);
        exit(json_encode($path));
    }
    //获取展位图片信息
    public function ajax_get_path(){
        $where['ex_id'] = input("id");
        //用户ID
        $where['user_id']=Cookie::get('user_id','worldevents_');
        //获取展位信息
        $data = ExhibitionModel::getMyboothByArgs($where);
        $path = get_file_path($data['booth_pictures']);
        exit(json_encode($path));
    }
    //获取多个展位图片信息
    public function ajax_get_files_path(){
        $ids = input('id');
        $ids = explode(".",$ids);
        $str = "";
        foreach ($ids as $key=>$value){
               $path =get_file_path($value);
               $str .='<img style="height:720px;width:720px;" src='.$path.'>'.'<hr/>';
        }
        exit(json_encode($str));
    }
    //行程图片上传
    public function ajax_stroke_img(){
        $file = $_FILES['stroke_pictures'];
        $pic_id = $this->saveImg($file);
        exit(json_encode($pic_id));
    }
    //ajax 提交数据(我的拼团)
    public function ajax_submit_mypt(){
        $item = [];
        $num =0;
        $strokeids=[];
        $data = input();
        foreach ($data['stroke'] as $value){
            $item['ex_id'] = $data['ex_id'];
            $item['user_id'] = Cookie::get('user_id','worldevents_');
            $item['day'] = $value['day'];
            $item['schedule_type'] = $value['scheduleType'];
            $item['destination_city'] = $value['destinationCity'];
            $item['setoff_city'] = $value['setoffCity'];
            $item['transport'] = $value['transport'];
            $item['meal'] = $value['meal'];
            $item['stay'] = $value['stay'];
            $item['travel_date'] = strtotime($value['travelDate']);
            $item['travel_schedule_desc'] = $value['travelScheduleDesc'];
            $item['status'] = 0;
            $stroke_result =Db::table('dp_exhibition_stroke')->insertGetId($item);
            if($stroke_result){
                $strokeids[]=$stroke_result;
                $num +=1;
            }
        }
        $stroke_id=implode(',',$strokeids);
        $pt = $this->object_to_array(json_decode($data['pt']));
        $pt_data = [
            'ex_id'=>$data['ex_id'],
            'user_id'=>Cookie::get('user_id','worldevents_'),
            'pattern'=>$pt['pattern'],
            'setoff_city'=>$pt['setoffcity'],
            'destination_city'=>$pt['destination_city'],
            'setoff_date'=>strtotime($pt['setoff_date']),
            'day_count'=>$pt['daycount'],
            'night_count'=>$pt['nightcount'],
            'service'=>$pt['service'],
            'is_local'=>$pt['local'],
            'local_price'=>$pt['localprice'],
            'adult_price'=>$pt['adultprice'],
            'room_difference'=>$pt['roomdifference'],
            'discount_rate'=>$pt['discountRate'],
            'stroke_pic'=>$pt['path'],
            'fee_introduce'=>$pt['feeintroduce'],
            'book_notice'=>$pt['booknotice'],
            'status'=>0,
            'create_time'=>time(),
        ];
        $pt_data['stroke_id']=$stroke_id;
        $pt_result =Db::table('dp_exhibition_pt')->insert($pt_data);
        if($num ==count($data['stroke']) && $pt_result){
            $arr =1;
            exit(json_encode($arr));
        }else{
            $arr =0;
            exit(json_encode($arr));
        }


    }
   //对象转数组函数
    public function object_to_array($obj){
        if(is_array($obj)){
            return $obj;
        }
        $_arr = is_object($obj)? get_object_vars($obj) :$obj;
        foreach ($_arr as $key => $val){
            $val=(is_array($val)) || is_object($val) ? object_to_array($val) :$val;
            $arr[$key] = $val;
        }

        return $arr;

    }
    //curl获取展会位置经纬度
    public function curl_request($url,$post='',$cookie='', $returnCookie=0){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查  
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl, CURLOPT_REFERER, "http://XXX");
        if($post) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
        }
        if($cookie) {
            curl_setopt($curl, CURLOPT_COOKIE, $cookie);
        }
        curl_setopt($curl, CURLOPT_HEADER, $returnCookie);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        if (curl_errno($curl)) {
            return curl_error($curl);
        }
        curl_close($curl);
        if($returnCookie){
            list($header, $body) = explode("\r\n\r\n", $data, 2);
            preg_match_all("/Set\-Cookie:([^;]*);/", $header, $matches);
            $info['cookie']  = substr($matches[1][0], 1);
            $info['content'] = $body;
            return $info;
        }else{
            return $data;
        }
    }
}


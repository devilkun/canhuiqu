<?php
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
class Booth extends Home
{
    //展位详情页
    public function book($id){
        $map= ['dp_exhibition_detail.id'=>$id,'dp_exhibition_detail.status'=>'1'];
        $list =IndexModel::getEXlistOne($map);
        $district = ExhibitionModel::district();
        $similar['type'] = $list['type'];
        $similarlist =IndexModel::similarlist($similar,$list['id']);
        //获取展位发布信息
        $booth = IndexModel::getBoothList($id);
        //获取展位单位名称信息
        $unit = IndexModel::getUnitList();
        $this->assign(['list'=>$list,'booth'=>$booth,'unit'=>$unit,'similar'=>$similarlist,'district'=>$district,'unread_num'=>unread_num]);
        return $this->fetch();
    }
    //展位图
    public function booth_pictures(){
        $id= input('id');
        if($id){
            $path = explode('.',$id);
        }else{
            $path = 0;
        }
        $this->assign('path',$path);
        return $this->fetch();
    }
    //标摊效果图
    public function stand_pictures(){
        $id= input('id');
        if($id){
            $path = explode('.',$id);
        }else{
            $path = 0;
        }
        $this->assign('path',$path);
        return $this->fetch();
    }
    //展位预定
    public function contacts(){
        $data = input();
        if(!array_key_exists('indoorArea',$data)){
            $data['indoorArea'] ='';
        }
        if(!array_key_exists('StandArea',$data)){
            $data['StandArea'] ='';
        }
        if(!array_key_exists('outdoorArea',$data)){
            $data['outdoorArea'] ='';
        }
        //获取展位信息
        $booth = IndexModel::getBoothByArgs($data['booth_id']);
        $user_id =Cookie::get('user_id','worldevents_');
        $map= ['dp_exhibition_detail.id'=>$data['ex_id'],'dp_exhibition_detail.status'=>'1'];
        $list =IndexModel::getEXlistOne($map);
        $district = ExhibitionModel::district();
        //获取当前用户的常用企业信息
        $frequent_company = ExhibitionModel::getFrequentCompanyByUserid($user_id);
        $this->assign(['list'=>$list,'district'=>$district,'data'=>$data,'booth'=>$booth,'frequent_company'=>$frequent_company,'unread_num'=>unread_num]);
        return $this->fetch();
    }
    //选择支付
    public function payment(){
        $data = input();
        $user_id = Cookie::get('user_id','worldevents_');
        if(isset($data['is_use'])){
            $data['company_id'] = $data['template_id'];
        }else{
            //保存常用企业
            $company = array(
                'com_name'=>$data['com_name'],
                'com_ename'=>$data['com_ename'],
                'mobile'=>$data['mobile'],
                'fax'=>$data['fax'],
                'email'=>$data['email'],
                'url'=>$data['url'],
                'address'=>$data['address'],
                'user_id'=>$user_id,
                'template_name'=>$data['template_name'],
                'add_time'=>time()
            );
            if(array_key_exists('is_com',$data)){
                $company['is_com']=1;
            }
            $data['company_id'] = Db::table('dp_frequent_company')->insertGetId($company);
        }
        //保存联系人信息
        $contacts = array(
            'con_name'=>$data['name'],
            'con_telephone'=>$data['telephone'],
            'con_email'=>$data['useremail'],
            'con_remark'=>$data['description'],
            'user_id'=>$user_id,
            'add_time'=>time()
        );
        $data['contacts_id']= Db::table('dp_contacts_info')->insertGetId($contacts);
        $map= ['dp_exhibition_detail.id'=>$data['ex_id'],'dp_exhibition_detail.status'=>'1'];
        $list =IndexModel::getEXlistOne($map);
        $district = ExhibitionModel::district();
        $booth = IndexModel::getBoothByArgs($data['booth_id']);
        $this->assign(['list'=>$list,'district'=>$district,'data'=>$data,'booth'=>$booth,'unread_num'=>unread_num]);
        return $this->fetch('booth/payinfo');
    }
    //按选择支付方式生成订单
    public function choose(){
        $data = input();
        $data['create_time'] = time();
        $data['user_id'] = Cookie::get('user_id','worldevents_');
        $service_id= Db::table('dp_book_booth')->insertGetId($data);
        //构建订单数据
        $order = array(
            'order_number'=>$this->build_order_no(),
            'order_type'=>'book_booth',
            'pay_price'=>$data['total'],
            'status'=>2,
            'pay_method'=>$data['payType'],
            'create_time'=>time(),
            'ex_id'=>$data['ex_id'],
            'user_id'=>$data['user_id'],
            'book_booth_id'=>$service_id,
            'booth_id'=>$data['booth_id'],
            'company_id'=>$data['company_id'],
            'contacts_id'=>$data['contacts_id'],
        );
        $status = Db::table('dp_exhibition_order')->insert($order);
        if($status){
            exit(json_encode(1));
        }else{
            exit(json_encode(2));
        }


    }
    //生成唯一订单号
    public function build_order_no()
    {
        $no = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
        //检测是否存在
        $info = Db::table('dp_exhibition_order')->where('order_number',$no)->find();
        (!empty($info)) && $no = $this->build_order_no();
        return $no;

    }
    //获取用户常用企业信息模板
    public function getCompanyTemplate(){
        $data['id']=input('id');
        $data['user_id'] = Cookie::get('user_id','worldevents_');
        $list = Db::table('dp_frequent_company')->where($data)->find();
        exit(json_encode($list));
    }
}

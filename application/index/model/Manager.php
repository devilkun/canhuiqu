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

namespace app\index\model;
use think\Model as ThinkModel;
use think\Db;
use think\Cookie;
/**
 * 广告模型
 * @package app\cms\model
 */
class Manager extends ThinkModel
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '__ADMIN_USER__';
    // 自动写入时间戳
    protected $autoWriteTimestamp = true;

    // 写入时，将菜单id转成json格式
    public function setMenuAuthAttr($value)
    {
        return json_encode($value);
    }

    // 读取时，将菜单id转为数组
    public function getMenuAuthAttr($value)
    {
        return json_decode($value, true);
    }
    //获取用户信息
    public static function getUserInfo($map=[]){
        $list = Db::view('dp_admin_user','*')
               ->view('dp_company_info','*','dp_company_info.user_id = dp_admin_user.id','LEFT')
               ->where($map)->find();
        return $list;
    }
    public static function getMessageCount()
    {
        $num =Db::table('dp_admin_message')->where(['status' => 0, 'uid_receive' => cookie('user_id')])->count();
        return $num;
    }
    //获取用户资质权限
    public static function getCerauth($where=[]){
         $list = Db::table('dp_user_qualifications')->field('id')->where($where)->select();
         return $list;
    }
    //获取用户资质信息
    public static function getCerinfo($where=[]){
         $list = Db::view('dp_user_qualifications','name')
                ->view('dp_user_checkqualifications','remarks,checktime,status','dp_user_checkqualifications.qua_id=dp_user_qualifications.id')
                ->view('dp_admin_user','username','dp_admin_user.id=dp_user_checkqualifications.checkuserid')
                ->where($where)
                ->select();
         return $list;
    }
    //用户信息编辑
    public static function userInfoEdit($id='',$data=[]){
         $list = Db::table('dp_admin_user')->where('id',$id)->update($data);
         return $list;
    }
    //获取用户未读通知信息
    public static function getMessageOfReadNone($user_id=''){
        $where=array('read_status'=>0,'status'=>1,'member_id'=>$user_id);
        $list = Db::table('dp_information')->where($where)->count();
        return $list;
    }
    //获取用户通知信息
    public static function getUserMessage($user_id=''){
        $list = Db::table('dp_admin_message')->field('id,type,content,status,create_time,read_time,update_time')->where('uid_receive',$user_id)->paginate(10);
        return $list;
    }
    //根据ID获取信息内容
    public static function getUserMessageContent($id=""){
        $list = Db::table('dp_admin_message')->field('type,content,status')->where('id',$id)->find();
        return $list;
    }
    //通过用户id获取订单列表
    public static function getOrderListByUserId($user_id=''){
         $list = Db::view('dp_exhibition_order a','id as order_id,pay_method,order_number,order_type,ex_id,pay_price,create_time,status,voucher_id')
                     ->view('dp_exhibition_detail b','name as ex_name','b.id=a.ex_id')
                     ->view('dp_book_booth c','stand_area,indoor_area,outdoor_area','c.id=a.book_booth_id','LEFT')
                     ->view('dp_book_pt d','pt_id','d.id=a.book_pt_id','LEFT')
                     ->where('a.user_id',$user_id)
                     ->paginate(10);
         return $list;
    }
    //根据订单号获取用户线下支付凭条路径
    public static function getReceiptPathByOn($order_number=''){
        $list = Db::view('dp_exhibition_order a')
                    ->view('dp_admin_attachment b','','a.voucher_id = b.id')
                    ->where('a.order_number',$order_number)
                    ->value('b.path');
        return $list;
    }
    //获取当前用户收藏列表
    public static function getFavoriteList($user_id){
        $list = Db::view('dp_exhibition_collection a','id as fid')
                ->view('dp_exhibition_detail b','id as ex_id,name,ename','a.ex_id=b.id')
                ->view('dp_exhibition_classification c','name as type','c.id=b.type')
                ->view('dp_exhibition_district d','name as city','d.id=b.city_id')
                ->where('a.user_id',$user_id)
                ->paginate(20);
        return $list;
    }
    //获取当前用户收藏数量
    public static function getFavoriteCount(){
        $num = Db::table('dp_exhibition_collection')->where('user_id',cookie('user_id'))->count();
        return $num;
    }
}
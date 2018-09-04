<?php
namespace app\index\model;
use think\Model as ThinkModel;
use think\Db;
/**
 * 广告模型
 * @package app\cms\model
 */
class Order extends ThinkModel
{
// 设置当前模型对应的完整数据表名称
    protected $table = '__EXHIBITION_ORDER__';
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
    //根据订单号获取订单详情
    public static function getOrderDetailByOn($order_number=''){
         $list = Db::view('dp_exhibition_order a','id as order_id,order_number,order_type,pay_price,status as order_status,create_time,ex_id,pay_method,booth_id,voucher_id')
                ->view('dp_exhibition_detail b','name as ex_name,ename as ex_ename,venues,startime,endtime,city_id','a.ex_id=b.id')
                ->view('dp_frequent_company c','com_name,email as com_email,mobile as com_mobile,address as com_address,fax as com_fax','a.company_id=c.id')
                ->view('dp_contacts_info d','con_name,con_telephone,con_email,con_remark','a.contacts_id=d.id')
                ->view('dp_exhibition_booth e','*','a.booth_id=e.id')
                ->where('dp_exhibition_order.order_number',$order_number)
                ->find();
                 //获取供应商信息
                $seller = Db::view('dp_exhibition_booth a')
                        ->view('dp_user_qualificationsinfo b','company as seller_company,telephone as seller_telphone,qq as seller_qq',
                            'a.user_id=b.user_id')
                        ->where('a.id',$list['booth_id'])
                        ->find();
                $list['seller_company'] = $seller['seller_company'];
                $list['seller_telphone'] = $seller['seller_telphone'];
                $list['seller_qq'] = $seller['seller_qq'];
         return $list;
    }
    //根据订单号取消订单
    public static function orderCancelByOn($order_id=' '){
         $data['status'] = 3;
         $data['end_time'] = time();
         $list = Db::table('dp_exhibition_order')->where('order_number',$order_id)->update($data);
         return $list;
    }
}
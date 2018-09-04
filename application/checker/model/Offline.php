<?php
namespace app\checker\model;

use think\Model as ThinkModel;
use think\Db;
class Offline extends ThinkModel
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
    //获取审核列表
    public static function getList($map=[]){
        $list = Db::name('exhibition_order')->where($map)->paginate();
        return $list;
    }
    //根据id获取线下支付详情
    public static function getOfflineDetail($id=''){
        $list = Db::view('dp_exhibition_order a','id as order_id,order_number,order_type,pay_price,pay_method,status as order_status,create_time,end_time,voucher_id')
              ->view('dp_exhibition_detail b','name as ex_name,ename as ex_ename,startime,endtime','a.ex_id=b.id')
              ->view('dp_exhibition_booth c','*','a.booth_id=c.id')
              ->view('dp_frequent_company d','*','a.company_id=d.id')
              ->view('dp_contacts_info e','*','a.contacts_id=e.id')
              ->where('a.id',$id)
              ->find();
        return $list;
    }
}
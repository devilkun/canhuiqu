<?php
namespace app\index\controller;
use app\index\model\Order as OrderModel;
use app\index\model\Exhibition as ExhibitionModel;
use think\Ucpaas;
use think\Request;
use think\Db;
use think\Helper;
use think\Hook;
use think\Cookie;
/**
 * 订单管理控制器
 * @package app\index\controller
 */
class Order extends Home
{
    //订单详情页
    public function detail()
    {
       $order_number = input('oid');
       $detail = OrderModel::getOrderDetailByOn($order_number);
       $district = ExhibitionModel::district();
       $this->assign(['detail'=>$detail,'district'=>$district]);
       return $this->fetch();
       
    }
    //取消订单
    public function cancel_order(){
       $order_id = input('order_id');
       $result = OrderModel::orderCancelByOn($order_id);
       if($result){
             exit(json_encode('1'));
       }else{
             exit(json_encode('2'));
       }
    }

}

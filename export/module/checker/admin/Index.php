<?php
namespace app\checker\admin;

use app\admin\controller\Admin;
use app\common\builder\ZBuilder;
use app\checker\model\Offline as OfflineModel;
use app\user\model\Message as MessageModel;
use think\Ucpaas;
use think\Request;
/**
 * 定时任务后台控制器
 */
class Index extends Admin
{
    // 定时任务列表
    public function offline()
    {
        cookie('__forward__', $_SERVER['REQUEST_URI']);
        //查询可用，状态为1；
        $map = $this->getMap();
        $map['pay_method'] = 'offline';
        $map['status'] = 4;
        // 数据列表
        $btn_access = [
            'title' => '审核',
            'icon'  => 'fa fa-fw fa-ravelry',
            'class' => 'btn btn-xs btn-default',
            'href'  => url('offline_detail', ['order_id' => '__id__']),
        ];
        $data_list = OfflineModel::getList($map);
        return ZBuilder::make('table')
            ->hideCheckbox()
            ->setSearch(['order_number' => '订单号', 'pay_method' => '支付状态']) // 设置搜索框
            ->addColumns([ // 批量添加数据列
                ['id', 'ID'],
                ['order_number', '订单号'],
                ['order_type', '订单类型'],
                ['pay_method', '支付方式'],
                ['status','状态','status','',['未知', '支付成功', '支付待处理','支付已取消','支付待审核','支付超时']],
                ['create_time', '提交时间','datetime'],
                ['right_button', '操作', 'btn']
            ])
            ->addRightButton('custom',$btn_access) // 批量添加右侧按钮
            ->addOrder('id') // 添加排序
            ->addFilter('order_number') // 添加筛选
            ->addTimeFilter('create_time')
            ->setRowList($data_list) // 设置表格数据
            ->fetch(); // 渲染模板

    }
    //线下支付详情页
    public function offline_detail($order_id){
        if ($order_id === null) $this->error('参数错误');
        $info = OfflineModel::getOfflineDetail($order_id);
        $info['startime']=date('Y-m-d',$info['startime']);
        $info['endtime']=date('Y-m-d',$info['endtime']);
        $pay_status = ['未知', '支付成功', '支付待处理','支付已取消','支付待审核','支付超时'];
        $info['order_status'] =$pay_status[$info['order_status']];
        $order_type = ['book_booth'=>'展位预定'];
        $info['order_type'] = $order_type[$info['order_type']];
        return ZBuilder::make('form')
            ->addHidden('order_id')
            ->addHidden('con_telephone')
            ->addHidden('user_id')
            ->addHidden('order_number')
            ->addFormItems([
                ['static','ex_name','展会名称'],
                ['static','ex_ename','展会英文名称'],
                ['daterange','startime,endtime','展会举办时间'],
                ['static:3', 'order_number', '订单号'],
                ['static:3', 'order_type', '订单类型'],
                ['static:3', 'pay_price', '支付总额'],
                ['static:3', 'order_status', '支付状态'],
                ['datetime:3', 'create_time', '订单创建时间'],
                ['static:3', 'com_name', '企业名称'],
                ['static:3', 'mobile', '企业联系电话'],
                ['static:3', 'fax', '企业传真'],
                ['static:3', 'email', '企业邮箱'],
                ['static:3', 'address', '企业地址'],
                ['static:3', 'con_name', '联系人姓名'],
                ['static:3', 'con_telephone', '联系人电话'],
                ['gallery', 'voucher_id', '支付凭单'],
            ])
            ->hideBtn('submit,back')
            ->addBtn('<button type="button" class="btn btn-success" id="through">审核通过</button>')
            ->addBtn('<button type="button" class="btn btn-danger" id="reject">驳回</button>')
            ->isAjax(false)
            ->js('sms')
            ->setFormData($info)
            ->fetch();
    }
    //ajax 向用户发送短信
    public function ajax_sms(){
        $phone = Request::instance()->post('phone');
        $user_id = Request::instance()->post('user_id');
        $order_number = Request::instance()->post('order_number');
        $MessageModel = new MessageModel;
        $data['id'] = Request::instance()->post('id');
        $data['status']='1';
        if(OfflineModel::update($data)){
            $action =Request::instance()->post('action');
            $options['accountsid']='5938254090fa99773490bddb19eda595';
            $options['token']='6d9111aa9beca8ccf2ae0e8fc03e88d2';
            $ucpass = new Ucpaas($options);
            $appId = '0a668feaf44449d68f3c8cf816eec4d4';
            $to = $phone;
            //根据不同的参数，分配不同的模板ID
            if($action=='through'){
                $list= ['uid_receive' => $user_id,
                    'uid_send'    => UID,
                    'type'        => '审核结果',
                    'content'     => '您订单号为'.$order_number.'的订单审核成功,感谢您的支付!',];
                $MessageModel->save($list);
                $templateId = "230919";
            }else{
                $templateId = "230946";
            }
            $result = $ucpass->templateSMS($appId,$to,$templateId);
            if(substr($result,21,6) == 000000){
                return ['status'=>'1'];
            }else{
                return ['status'=>'2'];
            }
        }

    }
}
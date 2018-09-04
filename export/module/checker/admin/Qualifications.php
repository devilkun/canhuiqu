<?php
namespace app\checker\admin;
use app\admin\controller\Admin;
use app\common\builder\ZBuilder;
use app\checker\model\Qualifications as QualificationsModel;
use think\Ucpaas;
use think\Request;
use think\Db;
use util\Tree;
class Qualifications extends Admin
{
     public function  index(){
         $data_list = QualificationsModel::get_list();
         // 数据列表
         $btn_access = [
             'title' => '审核',
             'icon'  => 'fa fa-fw fa-ravelry',
             'class' => 'btn btn-xs btn-default',
             'href'  => url('edit', ['id' => '__id__']),
         ];
         return ZBuilder::make('table')
             ->hideCheckbox()
             ->addColumns([ // 批量添加数据列
                 ['id','ID'],
                 ['company', '公司名称'],
                 ['mobile','联系人方式'],
                 ['status','证件核实','status','',['待核实', '已核实']],
                 ['right_button', '操作', 'btn']
             ])
             ->addRightButton('custom',$btn_access) // 批量添加右侧按钮
             ->setRowList($data_list) // 设置表格数据
             ->fetch(); // 渲染模板
     }
     public function edit($id = null, $model = ''){
         // 获取数据
         if ($id === null) $this->error('参数错误');
         $info = QualificationsModel::get($id);
         return ZBuilder::make('form')
             ->addHidden('id')
             ->addHidden('telephone')
             ->addFormItems([
                 ['static', 'company', '公司名称'],
                 ['static', 'telephone', '联系方式'],
                 ['static','business_status','经营状态'],
                 ['gallery','blicense','营业执照'],
                 ['gallery','opermit','开户许可证'],

             ])
            ->hideBtn('submit,back')
            ->addBtn('<button type="button" class="btn btn-success" id="through">审核通过</button>')
            ->addBtn('<button type="button" class="btn btn-danger" id="reject">驳回</button>')
             ->js('qua-sms')
             ->setFormData($info)
             ->fetch();
     }
    //ajax 向用户发送短信
    public function ajax_sms(){
        $data['id'] = Request::instance()->post('id');
        $data['is_check']='1';
        if(QualificationsModel::update($data)){
                return ['status'=>'1'];
        }else{
                return ['status'=>'2'];
        }
     }

}

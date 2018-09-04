<?php
namespace app\exhibition\admin;
use app\admin\controller\Admin;
use app\common\builder\ZBuilder;
use app\exhibition\model\Qualifications as QualificationsModel;
use app\exhibition\model\Checkqualifications as CheckqualificationsModel;
use think\Ucpaas;
use think\Request;
use think\Db;
use util\Tree;
class Qualifications extends Admin
{
     public function  index(){
         $data_list = QualificationsModel::get_list();
         return ZBuilder::make('table')
             ->hideCheckbox()
             ->addColumns([ // 批量添加数据列
                 ['id','ID'],
                 ['company', '公司名称'],
                 ['mobile','联系人方式'],
                 ['status','状态','status','',['未知', '已审核', '待审核']],
                 ['right_button', '操作', 'btn']
             ])
             ->addRightButtons(['edit']) // 批量添加右侧按钮
             ->setRowList($data_list) // 设置表格数据
             ->fetch(); // 渲染模板
     }
     public function edit($id = null, $model = ''){
         // 获取数据
         if ($id === null) $this->error('参数错误');
         $info = QualificationsModel::get($id);
         $userid = $info['user_id'];
         $Qua  =QualificationsModel::get_qua($userid);
         // 保存数据
         if ($this->request->isPost()){
             // 表单数据
             $data = $this->request->post();
             halt($data);
             if(array_key_exists('qua_id',$data)){

             }else{
                 foreach ($Qua as $key=>$value){
                     $arg[] = ['id' =>$key ,'status'=>0];
                 }
                 $model = New CheckqualificationsModel;
                 $result=$model->saveAll($arg);
                 if($result){
                     echo 111;exit;

                 }
             }

         }
         return ZBuilder::make('form')
             ->addHidden('id')
             ->addHidden('telephone')
             ->addFormItems([
                 ['static', 'company', '公司名称'],
                 ['static', 'telephone', '联系方式'],
                 ['image','blicense','营业执照'],
                 ['image','opermit','开户许可证'],
                 ['checkbox','qua_id','资质分配','<span class="text-danger">勾选即表明商家该资质已生效</span>',$Qua]
             ])
            ->hideBtn('submit,back')
            ->addBtn('<button type="button" class="btn btn-success" id="through">审核通过</button>')
            ->addBtn('<button type="button" class="btn btn-danger" id="reject">驳回</button>')
             ->isAjax(false)
             ->setFormData($info)
             ->fetch();
     }

}

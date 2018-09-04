<?php
namespace app\exhibition\admin;
use app\admin\controller\Admin;
use app\common\builder\ZBuilder;
use app\exhibition\model\Check as CheckModel;
use app\exhibition\model\Classification as ClassificationModel;
use think\Ucpaas;
use think\Request;
use think\Db;
use util\Tree;
class Check extends Admin
{
    public function index()
    {
        $map['dp_exhibition_detail.status']=2;
        $data_list = CheckModel::getList($map);
        $list = $data_list->toArray();
        if(!empty($list['data'])){
            foreach ($list['data'] as &$v){
                if($v['area']==0){
                    $city =Db::table('dp_exhibition_district')->where('id',$v['city_id'])->field('name')->find();
                    $c[$v['city_id']] =$city['name'];
                }else{
                    $city =Db::table('dp_city')->where('id',$v['city_id'])->field('name')->find();
                    $c[$v['city_id']] =$city['name'];
                }
            }
        }else{
            $c['city_id']="";
        }
        return ZBuilder::make('table')
            ->setSearch(['title' => '标题', 'cms_column.name' => '栏目名称']) // 设置搜索框
            ->addColumns([ // 批量添加数据列
                ['id','ID'],
                ['name', '展会名称'],
                ['type', '展会分类'],
                ['city_id', '所属城市',$c],
                ['username', '上传作者'],
                ['contractor','承办单位'],
                ['right_button', '操作', 'btn']
            ])
            ->addTopButtons('enable,disable') // 批量添加顶部按钮
            ->addRightButtons(['edit']) // 批量添加右侧按钮
            ->setRowList($data_list) // 设置表格数据
            ->fetch(); // 渲染模板
    }

    /**
     * 编辑
     * @author devilkun <zwy876910200@qq.com>
     * @return mixed
     */
    public function edit($id = null, $model = '')
    {
        if ($id === null) $this->error('参数错误');
        // 保存数据
        if ($this->request->isPost()){
            // 表单数据
            $data = $this->request->post();
            if ($config = ClassificationModel::update($data)) {
                $this->success('编辑成功',url('index'));
            } else {
                $this->error('编辑失败');
            }
        }
        // 获取数据
        $info = CheckModel::get($id);
        $info['startime'] = date('Y-m-d',$info['startime']);
        $info['endtime'] = date('Y-m-d',$info['endtime']);
        if($info['area']==1){
            return ZBuilder::make('form')
                ->addHidden('id')
                ->addHidden('telephone')
                ->addFormItems([
                    ['text', 'name', '展会名称'],
                    ['select', 'type', '展会类型','',ClassificationModel::getLists()],
                    ['linkages','city_id', '所在区域', '', 'city', 3],
                    ['daterange','startime,endtime','会展举办时间'],
                    ['text', 'telephone', '联系方式'],
                    ['ckeditor','content','展会简介'],
                    ['ckeditor', 'range', '展品范围'],
                    ['text', 'organizer', '主办方名称'],
                    ['text', 'contractor', '承办方名称'],
                    ['text', 'venues', '展馆信息'],
                    ['text', 'address', '详细地址'],
                    ['image','picture','上传图片'],
                ])
                ->hideBtn('submit,back')
                ->addBtn('<button type="button" class="btn btn-success" id="through">审核通过</button>')
                ->addBtn('<button type="button" class="btn btn-danger" id="reject">驳回</button>')
                ->Js('sms')
                ->setFormData($info)
                ->fetch();
        }else {
            return ZBuilder::make('form')
                ->addHidden('id')
                ->addHidden('telephone')
                ->addFormItems([
                    ['text', 'name', '展会名称'],
                    ['select', 'type', '展会类型','',ClassificationModel::getLists()],
                    ['linkages','city_id', '所在区域', '', 'exhibition_district', 3],
                    ['daterange','startime,endtime','会展举办时间'],
                    ['text', 'telephone', '联系方式'],
                    ['ckeditor','content','展会简介'],
                    ['ckeditor', 'range', '展品范围'],
                    ['text', 'organizer', '主办方名称'],
                    ['text', 'contractor', '承办方名称'],
                    ['text', 'venues', '展馆信息'],
                    ['text', 'address', '详细地址'],
                    ['image','picture','上传图片'],
                ])
                ->hideBtn('submit,back')
                ->addBtn('<button type="button" class="btn btn-success" id="through">审核通过</button>')
                ->addBtn('<button type="button" class="btn btn-danger" id="reject">驳回</button>')
                ->Js('sms')
                ->setFormData($info)
                ->fetch();
        }
    }

    //ajax 向用户发送短信
    public function ajax_sms(){
        $phone = Request::instance()->post('phone');
        $data['id'] = Request::instance()->post('id');
        $data['status']='1';
        if(CheckModel::update($data)){
                    $action =Request::instance()->post('action');
                    $options['accountsid']='5938254090fa99773490bddb19eda595';
                    $options['token']='6d9111aa9beca8ccf2ae0e8fc03e88d2';
                    $ucpass = new Ucpaas($options);
                    $appId = '0a668feaf44449d68f3c8cf816eec4d4';
                    $to = $phone;
                    //根据不同的参数，分配不同的模板ID
                    if($action=='through'){
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

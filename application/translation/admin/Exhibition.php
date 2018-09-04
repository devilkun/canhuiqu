<?php
namespace app\translation\admin;

use app\admin\controller\Admin;
use app\common\builder\ZBuilder;
use app\translation\model\Exhibition as ExhibitionModel;
use think\Request;
/**
 * 定时任务后台控制器
 */
class Exhibition extends Admin
{
    // 定时任务列表
    public function index()
    {
        cookie('__forward__', $_SERVER['REQUEST_URI']);
        //查询可用，状态为1；
        $map = $this->getMap();
        $map['status'] = 3;
        // 数据列表
        $btn_access = [
            'title' => '翻译',
            'icon'  => 'fa fa-fw fa-ravelry',
            'class' => 'btn btn-xs btn-default',
            'href'  => url('detail', ['id' => '__id__']),
        ];
        $data_list = ExhibitionModel::getList($map);
        return ZBuilder::make('table')
            ->hideCheckbox()
            ->setSearch(['order_number' => '订单号', 'pay_method' => '支付状态']) // 设置搜索框
            ->addColumns([ // 批量添加数据列
                ['id', 'ID'],
                ['ename', '展会英文名称'],
                ['city_id', '展会所在区域','','',ExhibitionModel::getDistrictList()],
                ['type', '展会类型','','',ExhibitionModel::getTypeList()],
                ['create_time', '上传日期','datetime',],
                ['status','状态','status','',['禁用','正常','待审核','待翻译']],
                ['right_button', '操作', 'btn'],
            ])
            ->addRightButton('custom',$btn_access) // 批量添加右侧按钮
            ->addOrder('id') // 添加排序
            ->addFilter('order_number') // 添加筛选
            ->addTimeFilter('create_time')
            ->setRowList($data_list) // 设置表格数据
            ->fetch(); // 渲染模板
    }

    public function detail($id=null,$model=''){
        if ($id === null) $this->error('参数错误');
        if ($this->request->isPost()) {
            // 表单数据
            $data = $this->request->post();
            $result = $this->validate($data, 'Translation');
            if (true !== $result) $this->error($result);
            $translation = [
                'id'=>$data['id'],
                'name'=>$data['name'],
                'content'=>$data['content'],
                'range'=>$data['range'],
                'status'=>1,
                'update_time'=>time()
                ];
            if ($district = ExhibitionModel::update($translation)) {
                $this->success('编辑成功','index');
            } else {
                $this->error('编辑失败');
            }
        }
        $info = ExhibitionModel::getExTranslateDetailById($id);
        $info['startime']=date('Y-m-d',$info['startime']);
        $info['endtime']=date('Y-m-d',$info['endtime']);
        return ZBuilder::make('form')
            ->addHidden('id')
            ->addFormItems([
                ['gallery', 'picture', '展会Logo'],
                ['linkages','type', '展会分类','','exhibition_classification',2],
                ['linkages','city_id', '展会所在区域','', 'exhibition_district', 3],
                ['static','ename','展会英文名称'],
                ['static','venues_name','展馆名称'],
                ['static','organizer_name','主办名称'],
                ['text','name','展会中文名称','<span class="text-danger">必填</span>'],
                ['daterange','startime,endtime','展会举办时间'],
                ['ckeditor','econtent','展会英文内容'],
                ['ckeditor','content','展会中文内容','<span class="text-danger">必填</span>'],
                ['ckeditor','erange','展品范围英文'],
                ['ckeditor','range','展品范围中文','<span class="text-danger">必填</span>'],

            ])
            ->setFormData($info)
            ->fetch();
    }
    
    
}
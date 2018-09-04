<?php
    namespace app\checker\admin;

    use app\admin\controller\Admin;
    use app\common\builder\ZBuilder;
    use think\Request;
    use app\checker\model\Foreign as ForeignModel;

    /**
     * Class Index
     * @package app\checker\admin
     */
class Foreign extends Admin
{
    //首页
    public function index()
    {
        cookie('__forward__', $_SERVER['REQUEST_URI']);
        //查询可用，状态为1；
        $map = $this->getMap();
        $map['dp_exhibition_detail.status'] = 2;
        $btn_access = [
            'title' => '审核',
            'icon'  => 'fa fa-fw fa-ravelry',
            'class' => 'btn btn-xs btn-default',
            'href'  => url('detail', ['id' => '__id__']),
        ];
        $data_list = ForeignModel::getList($map);
        return ZBuilder::make('table')
            ->hideCheckbox()
            ->setSearch(['order_number' => '订单号', 'pay_method' => '支付状态']) // 设置搜索框
            ->addColumns([ // 批量添加数据列
                ['id', 'ID'],
                ['ename', '展会名称'],
                ['t_name','展会类别'],
                ['c_name', '所属城市'],
                ['group_name', '主办公司'],
                ['create_time', '创建时间', 'datetime'],
                ['status','状态','status','',['审核失败', '已审核', '待审核']],
                ['right_button', '操作', 'btn']
            ])
            ->addRightButton('custom',$btn_access) // 批量添加右侧按钮
            ->addOrder('id') // 添加排序
            ->addFilter('order_number') // 添加筛选
            ->addTimeFilter('create_time')
            ->setRowList($data_list) // 设置表格数据
            ->fetch(); // 渲染模板
    }

    /**
     * Notes:国外展会审核内容页
     * User: devilkun
     * Date: 2018/5/17
     * Time: 13:27
     */
    public function detail($id = null, $model = ''){
        // 获取数据
        if ($id === null) $this->error('参数错误');
        $event_frequency=[
            '1'=>'One Time',
            '2'=>'Every Week',
            '3'=>'Every Month',
            '4'=>'Once in 3 Months',
            '5'=>'Once in 6 Months',
            '6'=>'Once in a year',
            '7'=>'Once in 2 years',
            '8'=>'Once in 3 years',
            '9'=>'Once in 4 years',
            '10'=>'Once in 5 years'
        ];
        $info = ForeignModel::getExDetailById($id);
        $info['startime'] = date('Y-m-d',$info['startime']);
        $info['endtime'] = date('Y-m-d',$info['endtime']);
        if($info['organizername']===null){
            $info['organizername'] = '未填写';
        }
        if($info['designation']===null){
            $info['designation'] = '未填写';
        }
        if($info['country_code']===null){
            $info['country_code'] = '未填写';
        }
        return ZBuilder::make('form')
            ->addHidden('id')
            ->addFormItems([
                ['gallery','picture','展会Logo'],
                ['static', 'ename', '展会英文名称'],
                ['static', 'short_name', '展会英文简写名称'],
                ['linkages','city_id', '选择所在区域','', 'exhibition_district', 3],
                ['linkages:6','type', '展会分类','','exhibition_classification',2],
                ['date:6','create_time','展会提交日期', '', '', 'yyyy/mm/dd'],
                ['select', 'event_frequency', '展会举办频次','',$event_frequency],
                ['daterange','startime,endtime','展会举办时间'],
                ['ckeditor','econtent','展会内容(英文)'],
                ['ckeditor','erange','展品范围(英文)'],
                ['static:3','organizername','主办方名称'],
                ['static:3','designation','主办方展会指定'],
                ['static:3','country_code','主办方国家代码'],
                ['static:3','phone_number','主办方联系方式'],
                ['static:3','group_name','主办方机构名称'],
                ['static:3','group_website','主办方网址'],
                ['static:3','email','主办方邮箱'],
                ['static:3','group_city', '主办方所在区域'],
                ['gallery','organizer_logo', '主办方Logo'],


            ])
            ->hideBtn('submit,back')
            ->addBtn('<button type="button" class="btn btn-success" id="through">审核通过</button>')
            ->addBtn('<button type="button" class="btn btn-danger" id="reject">驳回</button>')
            ->js('foreign-sms')
            ->setFormData($info)
            ->fetch();
    }
    /**
     * Notes:审核验证处理
     * User: HIAPAD
     * Date: 2018/5/21
     * Time: 10:40
     * @return array
     */
    public function ajax_sms(){
        $data['id'] = Request::instance()->post('id');
        $action =Request::instance()->post('action');
        if($action=='through'){
            $data['status']=3;
        }else{
            $data['status']=0;
        }
        if(ForeignModel::update($data)){
            return ['status'=>'1'];
        }else{
            return ['status'=>'2'];
        }
    }
}
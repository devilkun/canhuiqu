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

namespace app\exhibition\admin;

use app\admin\controller\Admin;
use app\common\builder\ZBuilder;
use app\exhibition\model\Domestic as DomesticModel;
use app\exhibition\model\Classification as ClassificationModel;
use think\Db;
use util\Tree;
/**
 * 仪表盘控制器
 * @package app\cms\admin
 */
class Domestic extends Admin
{
    /**
     * 首页
     * @author 蔡伟明 <314013107@qq.com>
     * @return mixed
     */
    public function index()
    {
        cookie('__forward__', $_SERVER['REQUEST_URI']);
        // 查询
        $map = $this->getMap();
        $map['status'] = 1;
        $map['area'] = 0;
        // 数据列表
        $data_list = DomesticModel::getList($map);
        return ZBuilder::make('table')
            ->setSearch(['title' => '标题', 'cms_column.name' => '栏目名称']) // 设置搜索框
            ->addColumns([ // 批量添加数据列
                ['id', 'ID'],
                ['name', '展会名称'],
                ['t_name','展会类别'],
                ['c_name', '所属城市'],
                ['view', '点击量'],
                ['username', '发布人'],
                ['update_time', '更新时间', 'datetime'],
                ['right_button', '操作', 'btn']
            ])
            ->addTopButtons('add,enable,disable,delete') // 批量添加顶部按钮
            ->addRightButtons(['edit', 'delete']) // 批量添加右侧按钮
            ->setTableName('exhibition_detail')
            ->setRowList($data_list) // 设置表格数据
            ->fetch(); // 渲染模板
    }
    public function add($cid = 0, $model = '')
    {
        if($this->request->isPost()){
            $data = $this->request->post();
            $data['author']= $_SESSION['dolphin_admin_']['user_auth']['uid'];
            $data['area'] = 1;// area为1 国内会展，默认为0 国外会展
            $result = $this->validate($data, 'Foreign');
            if(true !== $result) $this->error($result);
            if(array_key_exists('status',$data)){
                $data['status'] = 1;
            }
            if ($district = DomesticModel::create($data)) {
                $ID = $district['id'];
                $this->success('编辑成功,即将跳转至行程安排页面', url('stroke',"id=$ID"));
            } else {
                $this->error('新增失败');
            }
        }
        return ZBuilder::make('form')
            ->addFormItems([
                ['text', 'name', '会展名称', '<span class="text-danger">必填</span>'],
                ['select','type', '选择会展分类','<span class="text-danger">必选</span>',ClassificationModel::getLists()],
                ['text','venues', '展馆信息','<span class="text-danger">必选</span>'],
                ['linkages','city_id', '选择所在区域','<span class="text-danger">必填</span>', 'city', 3],
                ['text','address', '详细地址','<span class="text-danger">必填</span>'],
                ['daterange','startime,endtime','会展举办时间','<span class="text-danger">必填</span>'],
                ['ckeditor','content','会展内容','<span class="text-danger">必填</span>'],
                ['text','organizer', '主办单位','<span class="text-danger">必填</span>'],
                ['text','contractor', '承办单位','<span class="text-danger">必填</span>'],
                ['text','view','点击量','',0],
                ['switch','status','状态','','1'],
                ['image','picture','主图片上传','<span class="text-danger">必选</span>'],
                ['images','photos','附属图片上传','<span class="text-danger">选填，使用Control键选取</span>']
            ])
            ->hideBtn('back')
            ->fetch();
    }
    public function edit($id = null, $model = '')
    {
        if ($id === null) $this->error('参数错误');
        // 保存数据
        if ($this->request->isPost()){
            // 表单数据
            $data = $this->request->post();
            if ($district = DomesticModel::update($data)) {
                $this->success('编辑成功',url('index'));
            } else {
                $this->error('编辑失败');
            }
        }
        // 获取数据
        $info = DomesticModel::get($id);
        return ZBuilder::make('form')
            ->addHidden('id')
            ->addFormItems([
                ['text', 'name', '会展名称', '<span class="text-danger">必填</span>'],
                ['select','type', '选择会展分类','<span class="text-danger">必选</span>',ClassificationModel::getLists()],
                ['text','venues', '展馆信息','<span class="text-danger">必选</span>'],
                ['linkages','city_id', '选择所在区域','<span class="text-danger">必填</span>', 'city', 3],
                ['text','address', '详细地址','<span class="text-danger">必填</span>'],
                ['daterange','startime,endtime','会展举办时间','<span class="text-danger">必填</span>'],
                ['ckeditor','content','会展内容','<span class="text-danger">必填</span>'],
                ['text','organizer', '主办单位','<span class="text-danger">必填</span>'],
                ['text','contractor', '承办单位','<span class="text-danger">必填</span>'],
                ['text','view','点击量','<span class="text-danger">必填</span>',0],
                ['switch','status','状态','','1'],
                ['image','picture','主图片上传','<span class="text-danger">必选</span>'],
                ['images','photos','附属图片上传','<span class="text-danger">选填，使用Control键选取</span>']
            ])
            ->setFormData($info)
            ->fetch();
    }
    /**
     * 删除
     * @author devilkun <zwy876910200@qq.com>
     * @return mixed
     */
    public function delete($record = [])
    {
        return $this->setStatus('delete');
    }

    /**
     * 设置配置状态：删除、禁用、启用
     * @param string $type 类型：delete/enable/disable
     * @param array $record
     * @author devilkun <zwy876910200@qq.com>
     * @return mixed
     */
    public function setStatus($type = '', $record = [])
    {
        $ids        = $this->request->isPost() ? input('post.ids/a') : input('param.ids');
        $uid_delete = is_array($ids) ? '' : $ids;
        $ids        = DomesticModel::where('id', 'in', $ids)->column('name');
        return parent::setStatus($type, ['district_'.$type, 'exhibition_district', $uid_delete, UID, implode('、', $ids)]);
    }

    /**
     * 行程安排
     * @param string $id 会展所属ID
     * @author devilkun <zwy876910200@qq.com>
     */
    public function stroke($id){
        $this->assign('id',$id);
        return $this->fetch();
    }

    //数据源
    public function json($id){
        $data =DomesticModel::getCalendar($id);
        foreach($data as &$v){
            $v['start'] = date ( 'Y-m-d H:i:s', $v ['starttime']);
            $v['end'] = date ( 'Y-m-d H:i:s', $v ['endtime'] );
            $v['allDay'] = $v ['allday'] === 1 ? true : false;
        }
        return $data;
    }
    //行程详情页面
    public function detail($exid){
        $this->assign('exid',$exid);
        return $this->fetch();
    }
    //添加行程
    public function addstroke(){
        if(Request::instance()->isPost()){
            $map['exid']=Request::instance()->post('exid');
            $map['color'] = Request::instance()->post('color');
            $map['starttime']= strtotime(Request::instance()->post('startdate').' '.Request::instance()->post('s_hour')
                .':' .Request::instance()->post('s_minute'));
            $map['endtime']= strtotime(Request::instance()->post('enddate').' '.Request::instance()->post('e_hour').':'
                .Request::instance()->post('e_minute'));
            $map['title'] = Request::instance()->post('memo');
            if(DomesticModel::saveStroke($map)){
                return true;
            }
        }
    }
    //编辑行程
    public function editstroke($id=''){
        /*******************获取该行程具体信息************************/
        if(Request::instance()->isGet()) {
            $ID = Request::instance()->get('id');
            $map['id'] = $ID;
            $data = DomesticModel::getStrokeOne($map);
            $this->assign('list',$data);
            return $this->fetch();
        }
        /*******************编辑页面数据变更************************/
        if(Request::instance()->isPost()) {
            $data['id'] = Request::instance()->post('eventid');
            $data['color'] = Request::instance()->post('color');
            $data['starttime']= strtotime(Request::instance()->post('startdate').' '.Request::instance()->post('s_hour')
                .':' .Request::instance()->post('s_minute'));
            $data['endtime']= strtotime(Request::instance()->post('enddate').' '.Request::instance()->post('e_hour')
                .':'
                .Request::instance()->post('e_minute'));
            $data['title'] = Request::instance()->post('memo');
            if(DomesticModel::doEdit($data)) {
                return true;
            }else{
                return 'error';
            }
        }
    }
    //动作处理函数
    public function calendarDo(){
        if(Request::instance()->isPost()) {
            //获取处理动作类型
            $action =Request::instance()->post('action');
            //获取行程ID
            $ID = Request::instance()->post('id');
            //执行删除操作
            if($action == 'del' && $ID !==""){
                $map['id'] = $ID;
                if(DomesticModel::doDel($map)) {
                    return true;
                }else{
                    return 'error';
                }
            }
        }
    }
}
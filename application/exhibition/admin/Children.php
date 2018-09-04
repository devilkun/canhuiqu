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
use app\exhibition\model\Classification as ClassificationModel;
use app\exhibition\model\Column as ColumnModel;
use app\exhibition\model\Document as DocumentModel;
use app\exhibition\model\Field as FieldModel;
use think\Db;
use util\Tree;
/**
 * 会展类别控制器
 * @package app\exhibition\admin
 */
class Children extends Admin
{
   /**
     * 会展子分类首页
     * @author devilkun  <zwy876910200@qq.com>
     * @return mixed
     */
    public function index()
    {   
       cookie('__forward__', $_SERVER['REQUEST_URI']);
        //查询可用，状态为1；
        $map = $this->getMap();
        $map['c_status'] = 1;
        $map['pid']= ['gt','0'];
        // 数据列表
        $data_list = ClassificationModel::getList($map,$parent= 1);
          return ZBuilder::make('table')
            ->setSearch(['name' => '子分类名称']) // 设置搜索框
            ->addColumns([ // 批量添加数据列
                ['id', 'ID'],
                ['pid','主分类名称',ClassificationModel::getTreeList()],
                ['c_icon','类别图标','icon'],
                ['name', '子分类名称'],
                ['c_status', '状态', 'switch'],
                ['right_button', '操作', 'btn']
            ])
            ->addTopButtons('add,enable,disable,delete') // 批量添加顶部按钮
            ->addRightButtons('edit',['table' => 'exhibition_classification']) // 编辑
            ->addRightButton('delete', ['table' => 'exhibition_classification']) // 删除
            ->addOrder(['column_name' => 'exhibition_document.cid'])
            ->addOrder('id')
            ->addFilter(['column_name' => 'exhibition_column.name', 'username' => 'admin_user'])
            ->setRowList($data_list) // 设置表格数据
            ->setPrimaryKey('id')
            ->fetch(); // 渲染模板
    }
     /**
     * 新增子分类
     * @author devilkun <zwy876910200@qq.com>
     * @return mixed
     */
    public function add()
    {
            if($this->request->isPost()){
                    $data = $this->request->post();
                    // 验证
                    $result = $this->validate($data, 'Classification');
                    // 验证失败 输出错误信息
                if(true !== $result) $this->error($result);
                    if ($result = ClassificationModel::create($data)) {
                        $this->success('新增成功', url('index'));
                    } else {
                        $this->error('新增失败');
                    }            
           }   

            return ZBuilder::make('form')
                ->addFormItems([
                ['select', 'pid', '会展主分类名称', '<span class="text-danger">必选</span>', ClassificationModel::getTreeList()],
                ['text', 'name', '会展子分类名称', '<span class="text-danger">必填</span>'],
                ['text', 'ename', '会展子分类英文名称', '<span class="text-danger">必填</span>'],
                ['icon', 'c_icon', '选择图标'],])
               ->fetch();
    }

    /**
    * 编辑子分类
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
                // 验证
                $result = $this->validate($data, 'Classification');
                // 验证失败 输出错误信息
                if(true !== $result) $this->error($result);
                if ($config = ClassificationModel::update($data)) {
                    $this->success('编辑成功',url('index'));
                } else {
                    $this->error('编辑失败');
                }
            }
            // 获取数据
            $info = ClassificationModel::get($id);
            return ZBuilder::make('form')
                   ->addHidden('id')
                   ->addFormItems([
                   ['select', 'pid', '会展主分类名称', '<span class="text-danger">必选</span>', ClassificationModel::getTreeList()],
                   ['text', 'name', '会展子分类名称', '<span class="text-danger">必填</span>'],
                   ['text', 'ename', '会展子分类英文名称', '<span class="text-danger">必填</span>'],
                   ['icon', 'c_icon', '选择图标'],])
                   ->setFormData($info)
                   ->fetch();
    }

    /**
    * 删除子分类
    * @author devilkun <zwy876910200@qq.com>
    * @return mixed
    */
    public function delete($record = [])
    {
        return $this->setStatus('delete');
    }

     /**
     * 启用配置
     * @param array $record 行为日志
     * @author devilkun <zwy876910200@qq.com>
     * @return mixed
     */
    public function enable($record = [])
    {
        return $this->setStatus('enable');
    }

     /**
     * 禁用配置
     * @param array $record 行为日志
     * @author devilkun <zwy876910200@qq.com>
     * @return mixed
     */
    public function disable($record = [])
    {
        return $this->setStatus('disable');
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
        $ids        = ClassificationModel::where('id', 'in', $ids)->column('name');
        return parent::setStatus($type, ['classification_'.$type, 'exhibition_classification', $uid_delete, UID, implode('、', $ids)]);
    }
}
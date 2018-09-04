<?php
namespace app\exhibition\admin;

use app\admin\controller\Admin;
use app\common\builder\ZBuilder;
use app\exhibition\model\Organizer as OrganizerModel;
use think\Db;
use util\Tree;
/**
 * 主办方设置控制器
 * @package app\exhibition\admin
 */
class Organizer extends Admin
{
    /**
     * 首页
     */
    public function index()
    {
        cookie('__forward__', $_SERVER['REQUEST_URI']);
        // 数据列表
        $data_list = OrganizerModel::getList();
        return ZBuilder::make('table')
            ->setSearch(['title' => '标题', 'cms_column.name' => '栏目名称']) // 设置搜索框
            ->addColumns([ // 批量添加数据列
                ['id', 'ID'],
                ['name', '主办方名称'],
                ['address', '主办方地址'],
                ['right_button', '操作', 'btn']
            ])
            ->addTopButtons('add,enable,disable,delete') // 批量添加顶部按钮
            ->addRightButtons(['edit', 'delete']) // 批量添加右侧按钮
            ->addOrder(['column_name' => 'exhibition_document.cid'])
            ->addOrder('id,title,view,username,update_time')
            ->addFilter(['column_name' => 'exhibition_column.name', 'username' => 'admin_user'])
            ->setRowList($data_list) // 设置表格数据
            ->fetch(); // 渲染模板
    }
    /**
     * 新增
     * @author devilkun <zwy876910200@qq.com>
     * @return mixed
     */
    public function add($cid = 0, $model = '')
    {
        if($this->request->isPost()){
            $data = $this->request->post();
            // 验证
            $info = $this->validate($data, 'Organizer');
            // 验证失败 输出错误信息
            if(true !== $info) $this->error($info);
            if ($result = OrganizerModel::create($data)) {
                $this->success('新增成功', url('index'));
            } else {
                $this->error('新增失败');
            }
        }
        return ZBuilder::make('form')
            ->addFormItems([
                ['text', 'name', '主办方名称', '<span class="text-danger">必填</span>'],
                ['text', 'address', '主办方地址', '<span class="text-danger">必填</span>'],
            ])
            ->fetch();
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
            // 验证
            $info = $this->validate($data, 'Organizer');
            // 验证失败 输出错误信息
            if(true !== $info) $this->error($info);
            if ($config = OrganizerModel::update($data)) {
                $this->success('编辑成功',url('index'));
            } else {
                $this->error('编辑失败');
            }
        }
        // 获取数据
        $info = OrganizerModel::get($id);
        return ZBuilder::make('form')
            ->addHidden('id')
            ->addFormItems([
                ['text', 'name', '主办方名称', '<span class="text-danger">必填</span>'],
                ['text', 'address', '主办方地址', '<span class="text-danger">必填</span>'],
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
        $ids        = OrganizerModel::where('id', 'in', $ids)->column('name');
        return parent::setStatus($type, ['organizer_'.$type, 'exhibition_organizer', $uid_delete, UID, implode('、', $ids)]);
    }


}
<?php
namespace app\exhibition\admin;
use app\admin\controller\Admin;
use app\common\builder\ZBuilder;
use app\exhibition\model\Visa as VisaModel;
use think\Db;
use util\Tree;
/**
 * 会展区域控制器
 * @package app\exhibition\admin
 */
class Visa extends Admin
{
    /**
     * 首页
     * @author devilkun  <zwy876910200@qq.com>
     * @return mixed
     */
    public function index()
    {
        return ZBuilder::make('table')
            ->setSearch(['title' => '标题', 'cms_column.name' => '栏目名称']) // 设置搜索框
            ->addColumns([ // 批量添加数据列
                ['id', 'ID'],
                ['name','展馆名称'],
                ['country', '所属国家'],
                ['city', '所属城市'],
                ['username','发布人'],
                ['create_time','发布时间','datetime'],
                ['right_button', '操作', 'btn']
            ])
            ->addTopButtons('add,enable,disable,delete') // 批量添加顶部按钮
            ->addRightButtons('edit,delete') //右按钮
            ->addOrder('id')
            ->setTableName('exhibition_venues')
            ->addFilter(['column_name' => 'exhibition_column.name', 'username' => 'admin_user'])
            ->setRowList() // 设置表格数据
            ->fetch(); // 渲染模板
    }
}

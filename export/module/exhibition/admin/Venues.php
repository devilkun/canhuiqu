<?php
namespace app\exhibition\admin;
use app\admin\controller\Admin;
use app\common\builder\ZBuilder;
use app\exhibition\model\Venues as VenuesModel;
use think\Db;
use util\Tree;
/**
 * 会展区域控制器
 * @package app\exhibition\admin
 */
class Venues extends Admin
{
    /**
     * 首页
     * @author devilkun  <zwy876910200@qq.com>
     * @return mixed
     */
    public function index()
    {
        $data_list = VenuesModel::get_list();
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
            ->setRowList($data_list) // 设置表格数据
            ->fetch(); // 渲染模板
    }

    /**
     * 添加展馆
     */
    public function add(){
            if($this->request->isPost()){
                $data = $this->request->post();
                // 验证
                $info = $this->validate($data, 'Venues');
                // 验证失败 输出错误信息
                if(true !== $info) $this->error($info);
                $data['author']= $_SESSION['dolphin_admin_']['user_auth']['uid'];
                if(array_key_exists('status',$data)){
                    $data['status'] = 1;
                }
                if ($result = VenuesModel::create($data)) {
                    $this->success('新增成功', url('index'));
                } else {
                    $this->error('新增失败');
                }
            }
                return ZBuilder::make('form')
                        ->addFormItems([
                            ['linkages','city_id', '选择所在区域', '<span class="text-danger">必填</span>', 'exhibition_district', 3],
                            ['text', 'name', '展馆名称', '<span class="text-danger">必填</span>'],
                            ['images','pictures','展馆图片上传','建议上传4张图片最佳,使用Control键选取'],
                            ['ckeditor','content','展馆介绍','<span class="text-danger">必填</span>'],
                            ['ckeditor','route','展馆路线','<span class="text-danger">必填</span>'],
                            ['switch', 'status', '状态','<span class="text-danger">默认为开启状态</span>','true'],
                            ['text','acreage','面积(M²)','<span class="text-danger">必填</span>'],
                            ['text','phone','展馆联系方式','<span class="text-danger">必填</span>'],
                            ['text','address','展馆地址','<span class="text-danger">必填</span>'],
                            ['time','startime','展馆开放起始时间','<span class="text-danger">必填</span>'],
                            ['time','endtime','展馆开放结束时间','<span class="text-danger">必填</span>'],
                            ['text','people','可容纳人数','<span class="text-danger">必填</span>'],
                            ['text','website','展馆网址','<span class="text-danger">必填</span>'],
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
            $result = $this->validate($data, 'Venues');
            // 验证失败 输出错误信息
            if(true !== $result) $this->error($result);
            if ($district = VenuesModel::update($data)) {
                $this->success('编辑成功',url('index'));
            } else {
                $this->error('编辑失败');
            }
        }
        // 获取数据
        $info = VenuesModel::get($id);
        return ZBuilder::make('form')
            ->addHidden('id')
            ->addFormItems([
                ['linkages','city_id', '选择所在区域', '<span class="text-danger">必填</span>', 'exhibition_district', 3],
                ['text', 'name', '展馆名称', '<span class="text-danger">必填</span>'],
                ['images','pictures','展馆图片上传','建议上传4张图片最佳,使用Control键选取'],
                ['ckeditor','content','展馆介绍','<span class="text-danger">必填</span>'],
                ['ckeditor','route','展馆路线','<span class="text-danger">必填</span>'],
                ['switch', 'status', '状态','<span class="text-danger">默认为开启状态</span>','true'],
                ['text','acreage','面积(M²)','<span class="text-danger">必填</span>'],
                ['text','phone','展馆联系方式','<span class="text-danger">必填</span>'],
                ['text','address','展馆地址','<span class="text-danger">必填</span>'],
                ['time','startime','展馆开放起始时间','<span class="text-danger">必填</span>'],
                ['time','endtime','展馆开放结束时间','<span class="text-danger">必填</span>'],
                ['text','people','可容纳人数','<span class="text-danger">必填</span>'],
                ['text','website','展馆网址','<span class="text-danger">选填</span>'],
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
        $ids        = VenuesModel::where('id', 'in', $ids)->column('name');
        return parent::setStatus($type, ['district_'.$type, 'exhibition_district', $uid_delete, UID, implode('、', $ids)]);
    }
}
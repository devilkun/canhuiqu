<?php
namespace app\exhibition\admin;
use app\admin\controller\Admin;
use app\common\builder\ZBuilder;
use app\exhibition\model\District as DistrictModel;
use app\exhibition\model\Column as ColumnModel;
use app\exhibition\model\Document as DocumentModel;
use app\exhibition\model\Field as FieldModel;
use think\Db;
use util\Tree;
/**
 * 会展区域控制器
 * @package app\exhibition\admin
 */
class District extends Admin
{
	/**
	     * 首页
	     * @author devilkun  <zwy876910200@qq.com>
	     * @return mixed
	     */
	 public function index()
	 {          
	 	cookie('__forward__', $_SERVER['REQUEST_URI']);
	             //查询可用，状态为1；
		$map = $this->getMap();
		$map['level'] = 1;
		// 数据列表
                  $data_list = DistrictModel::getDistrict($map);
                  return ZBuilder::make('table')
	              ->setSearch(['name' => '区域名称', 'name_en' => '区域英文名称']) // 设置搜索框
	              ->addColumns([ // 批量添加数据列
	                ['id', 'ID'],
	                ['name', '区域名称'],
	                ['name_en','区域英文名称'],
	                ['right_button', '操作', 'btn']
	            ])
	            ->addTopButtons('add,delete') // 批量添加顶部按钮
	            ->addRightButtons(['edit', 'delete']) // 批量添加右侧按钮
	            ->addOrder(['column_name' => 'exhibition_document.cid'])
	            ->addOrder('id')
                ->setPageTips('注意：此分区仅用于国外会展发布使用，国内会展发布无需添加分区 ！！','danger')
	            ->addFilter(['column_name' => 'exhibition_column.name', 'username' => 'admin_user'])
	            ->setRowList($data_list) // 设置表格数据
	            ->fetch(); // 渲染模板
	 }

	/**
	 * 增加
	 * @author devilkun  <zwy876910200@qq.com>
	 * @return mixed    
	 */ 

	 public function add(){

	 	if($this->request->isPost()){
	                    $data = $this->request->post();
                        // 验证
                        $info = $this->validate($data, 'District');
                        // 验证失败 输出错误信息
                        if(true !== $info) $this->error($info);
                        $data['level'] =1 ;
	                    if ($result = DistrictModel::create($data)) {
                                $setting['id'] = $result['id'];
                                $setting['pid'] = 0;
                                $setting['path'] = ','.$setting['id'].',';
                                DistrictModel::update($setting);
	                                $this->success('新增成功', url('index'));
	                    } else {
	                                $this->error('新增失败');
	                    }            
	            }   

             	 return ZBuilder::make('form')
	             ->addFormItems([
	             ['text', 'name', '区域名称', '<span class="text-danger">必填</span>'],
	             ['text', 'name_en', '区域英文名称', '<span class="text-danger">必填</span>'],
                     ['text', 'name_pinyin', '区域拼音名称', '<span class="text-danger">选填</span>'],
                     ['text', 'code', '区域代码', '<span class="text-danger">选填</span>'],
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
            $info = $this->validate($data, 'District');
            // 验证失败 输出错误信息
            if(true !== $info) $this->error($info);
            if ($district = DistrictModel::update($data)) {
                $this->success('编辑成功',url('index'));
            } else {
                $this->error('编辑失败');
            }
        }
        // 获取数据
        $info = DistrictModel::get($id);
        return ZBuilder::make('form')
            ->addHidden('id')
            ->addFormItems([
                ['text', 'name', '区域名称', '<span class="text-danger">必填</span>'],
                ['text', 'name_en', '区域英文名称', '<span class="text-danger">必填</span>'],
                ['text', 'name_pinyin', '区域拼音名称', '<span class="text-danger">选填</span>'],
                ['text', 'code', '区域代码', '<span class="text-danger">选填</span>'],
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
        $ids        = DistrictModel::where('id', 'in', $ids)->column('name');
        return parent::setStatus($type, ['district_'.$type, 'exhibition_district', $uid_delete, UID, implode('、', $ids)]);
    }
}
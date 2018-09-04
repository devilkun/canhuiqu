<?php
namespace app\exhibition\admin;
use app\admin\controller\Admin;
use app\common\builder\ZBuilder;
use app\exhibition\model\District as DistrictModel;
use think\Db;
use util\Tree;
/**
 * 会展区域控制器
 * @package app\exhibition\admin
 */
class City extends Admin
{
    /**
     * 首页
     * @author devilkun  <zwy876910200@qq.com>
     * @return mixed
     */
    public function index()
    {
        cookie('__forward__', $_SERVER['REQUEST_URI']);
        $map = $this->getMap();
        $map['level'] = 3;
        // 数据列表
        $data_list = DistrictModel::getDistrict($map);
        $a =DistrictModel::getTreeList($level=1);
        if(!empty($data_list)){
            foreach ($data_list as $key=>$value) {
                $list_path = explode(',', $value['path']);
                $path[$value['path']] = $a[$list_path['1']];
            }
        }else{
            $path =array();
        }
        return ZBuilder::make('table')
            ->setSearch(['title' => '标题', 'cms_column.name' => '栏目名称']) // 设置搜索框
            ->addColumns([ // 批量添加数据列
                ['id', 'ID'],
                ['path','区域名称',$path],
                ['pid', '国家名称',DistrictModel::getTreeList($level=2)],
                ['name', '城市名称'],
                ['name_en','城市英文名称'],
                ['code','城市代码'],
                ['right_button', '操作', 'btn']
            ])
            ->addTopButtons('add,delete') // 批量添加顶部按钮
            ->addRightButtons('edit,delete') //右按钮
            ->addOrder('id')
            ->setTableName('exhibition_district')
            ->addFilter(['column_name' => 'exhibition_column.name', 'username' => 'admin_user'])
            ->setPageTips('注意：此分区仅用于国外会展发布使用，国内会展发布无需添加分区 ！！','danger')
            ->setRowList($data_list) // 设置表格数据
            ->fetch(); // 渲染模板
    }

    /**
     * 增加
     * @author devilkun  <zwy876910200@qq.com>
     * @return mixed
     */
    public function add(){
        //获取区域数据
        if($this->request->isPost()){
            $data = $this->request->post();
            // 验证
            $info = $this->validate($data, 'City');
            // 验证失败 输出错误信息
            if(true !== $info) $this->error($info);
            $data['level'] =3;
            if ($result = DistrictModel::create($data)) {
                $where['id'] = $result['pid'];
                $a =Db::name('exhibition_district')->where($where)->find();
                $setting = array('id'=>$result['id'],
                    'path'=>$a['path'].$result['id'].',',
                );
                DistrictModel::update($setting);
                $this->success('新增成功', url('index'));
            } else {
                $this->error('新增失败');
            }
        }
        return ZBuilder::make('form')
            ->addFormItems([
                ['linkages','pid', '所在区域', '', 'exhibition_district', 2],
                ['text', 'name', '城市名称', '<span class="text-danger">必填</span>'],
                ['text', 'name_en', '城市英文名称', '<span class="text-danger">必填</span>'],
                ['text', 'name_pinyin', '城市拼音名称', '<span class="text-danger">选填</span>'],
                ['text', 'code', '城市代码', '<span class="text-danger">选填</span>'],
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
            $result = $this->validate($data, 'City');
            // 验证失败 输出错误信息
            if(true !== $result) $this->error($result);
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
                ['linkages','pid', '选择所在区域', '', 'exhibition_district', 2],
                ['text', 'name', '城市名称', '<span class="text-danger">必填</span>'],
                ['text', 'name_en', '城市英文名称', '<span class="text-danger">必填</span>'],
                ['text', 'name_pinyin', '城市拼音名称', '<span class="text-danger">选填</span>'],
                ['text', 'code', '城市代码', '<span class="text-danger">选填</span>'],
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
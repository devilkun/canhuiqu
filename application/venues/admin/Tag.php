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

    namespace app\venues\admin;

    use app\admin\controller\Admin;
    use app\common\builder\ZBuilder;
    use think\Db;
    use app\venues\model\Tag as TagModel;
    /**
     * 仪表盘控制器
     * @package app\cms\admin
     */
    class Tag extends Admin
    {
        /**
         * Notes:展馆模块-标签-首页
         * User: devilkun
         * Date: 2018/5/9
         * Time: 10:28
         * @return mixed
         */
        public function index()
        {
            $data_list = TagModel::getList();
            return ZBuilder::make('table')
                ->setSearch(['title' => '标题', 'venues_tag' => '栏目名称']) // 设置搜索框
                ->addColumns([ // 批量添加数据列
                    ['id', 'ID'],
                    ['tagname','标签名称'],
                    ['num','引用数量'],
                    ['right_button', '操作', 'btn']
                ])
                ->addTopButtons('add,delete') // 批量添加顶部按钮
                ->addRightButtons('edit,delete') //右按钮
                ->addOrder('id')
                ->setTableName('venues_tag')
                ->addFilter(['column_name' => 'exhibition_column.name', 'username' => 'admin_user'])
                ->setRowList($data_list) // 设置表格数据
                ->fetch(); // 渲染模板
        }

        /**
         * Notes:添加展馆标签
         * User: devilkun
         * Date: 2018/5/9
         * Time: 10:54
         * @return mixed|void
         */
        public function add()
        {
            if($this->request->isPost()){
                $data = $this->request->post();
                // 验证
                $info = $this->validate($data, 'Tag');
                // 验证失败 输出错误信息
                if(true !== $info) $this->error($info);
                $data['num'] = 0;
                if ($result = TagModel::create($data)) {
                    $this->success('新增成功', url('index'));
                } else {
                    $this->error('新增失败');
                }
            }
            return ZBuilder::make('form')->addFormItems([
                    ['text', 'tagname', '标签名称', '<span class="text-danger">必填</span>'],])
                ->fetch();
        }

        /**
         * Notes:编辑
         * User: devikun
         * Date: 2018/5/9
         * Time: 11:21
         * @return mixed|void
         */
        public function edit($id = null, $model = ''){
            if ($id === null) $this->error('参数错误');
            // 保存数据
            if ($this->request->isPost()){
                // 表单数据
                $data = $this->request->post();
                // 验证
                $result = $this->validate($data, 'Tag');
                // 验证失败 输出错误信息
                if(true !== $result) $this->error($result);
                if ($district = TagModel::update($data)) {
                    $this->success('编辑成功',url('index'));
                } else {
                    $this->error('编辑失败');
                }
            }
            // 获取数据
            $info = TagModel::get($id);
            return ZBuilder::make('form')
                ->addHidden('id')
                ->addFormItems([
                    ['text', 'tagname', '展馆标签', '<span class="text-danger">必填</span>'],
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
            $ids        = TagModel::where('id', 'in', $ids)->column('tagname');
            return parent::setStatus($type, ['tag_'.$type, 'venues_tag', $uid_delete, UID, implode('、', $ids)]);
        }
    }
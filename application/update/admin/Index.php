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

namespace app\update\admin;

use app\common\controller\Common;
use think\Db;
use util\File;

/**
 * 仪表盘控制器
 * @package app\cms\admin
 */
class Index extends Common
{
    protected $version_from = '1.2.1';
    protected $version_to = '1.3.0';

    protected function _initialize()
    {
        parent::_initialize();
        if (config('dolphin.product_version') == $this->version_to) {
            die('<h1 style="text-align: center;color:red">当前版本已经是V'.$this->version_to.'，无需升级！</h1>');
        }
        if (config('dolphin.product_version') != $this->version_from) {
            $this->error('<h1 style="text-align: center;color:red">框架版本不符合，无法升级</h1>');
        }
    }

    /**
     * 首页
     * @return mixed
     */
    public function index()
    {
        $this->assign('version_from', '1.2.1');
        $this->assign('version_to', '1.3.0');
        return $this->fetch();
    }

    /**
     * 更新数据库
     */
    public function updatedata()
    {
        /**
         * ==============
         * 添加用户快速编辑菜单（开始）
         * ==============
         */
        if (!Db::name('admin_menu')->where('url_value', 'user/index/quickedit')->find()) {
            $data = [
                'pid'         => 20,
                'module'      => 'user',
                'title'       => '快速编辑',
                'icon'        => '',
                'url_type'    => 'module_admin',
                'url_value'   => 'user/index/quickedit',
                'url_target'  => '_self',
                'online_hide' => 0,
                'sort'        => 100,
            ];
            Db::name('admin_menu')->insert($data);
        }
        /**
         * ==============
         * 添加用户快速编辑菜单（结束）
         * ==============
         */

        /**
         * ==============
         * 添加角色快速编辑菜单（开始）
         * ==============
         */
        if (!Db::name('admin_menu')->where('url_value', 'user/role/quickedit')->find()) {
            $data = [
                'pid'         => 67,
                'module'      => 'user',
                'title'       => '快速编辑',
                'icon'        => '',
                'url_type'    => 'module_admin',
                'url_value'   => 'user/role/quickedit',
                'url_target'  => '_self',
                'online_hide' => 0,
                'sort'        => 100,
            ];
            Db::name('admin_menu')->insert($data);
        }
        /**
         * ==============
         * 添加角色快速编辑菜单（结束）
         * ==============
         */

        $this->success('更新成功');
    }

    /**
     * 更新文件
     */
    public function updateFile()
    {
        // 复制静态资源目录
        if (false == File::copy_dir(APP_PATH. 'update/files/application', ROOT_PATH.'application')) {
            $this->error('application目录更新失败');
        }
        if (false == File::copy_dir(APP_PATH. 'update/files/public', ROOT_PATH.'public')) {
            $this->error('public目录更新失败');
        }
        if (false == File::copy_dir(APP_PATH. 'update/files/thinkphp', ROOT_PATH.'thinkphp')) {
            $this->error('thinkphp目录更新失败');
        }
        if (false == File::copy_dir(APP_PATH. 'update/files/vendor', ROOT_PATH.'vendor')) {
            $this->error('vendor目录更新失败');
        }
        if (false == copy(APP_PATH. 'update/files/composer.lock', ROOT_PATH.'composer.lock')) {
            $this->error('composer.lock文件更新失败');
        }
        $this->wipeCache();
        $this->success('更新成功');
    }

    /**
     * 清除缓存
     */
    private function wipeCache()
    {
        $cache_type = config('wipe_cache_type');
        if (!empty($cache_type)) {
            foreach ($cache_type as $item) {
                if ($item == 'LOG_PATH') {
                    $dirs = (array) glob(constant($item) . '*');
                    foreach ($dirs as $dir) {
                        array_map('unlink', glob($dir . '/*.log'));
                    }
                    array_map('rmdir', $dirs);
                } else {
                    array_map('unlink', glob(constant($item) . '/*.*'));
                }
            }
            \think\Cache::clear();
        }
    }
}
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

namespace app\index\controller;

use app\common\controller\Common;
use app\index\model\Manager as ManagerModel;
use think\Cookie;
/**
 * 前台公共控制器
 * @package app\index\controller
 */
class Home extends Common
{
    /**
     * 初始化方法
     * @author 蔡伟明 <314013107@qq.com>
     */
    protected function _initialize()
    {
        // 系统开关
        if (!config('web_site_status')) {
            $this->error('站点已经关闭，请稍后访问~');
        }
        //获取当前用户未读消息数量
        defined('unread_num') or define('unread_num', ManagerModel::getMessageCount());
        // 判断是否登录，并定义用户ID常量
        defined('UID') or define('UID', cookie('user_id'));
        //获取用户信息
        $map['dp_admin_user.id'] = UID;
        defined('user_info') or define('user_info', ManagerModel::getUserInfo($map));
        //获取当前用户收藏数量
        defined('favorite_num') or define('favorite_num', ManagerModel::getFavoriteCount());
    }

    /**
     *加载模板输出（电脑和手机）
     * @accessprotected
     * @paramstring$template模板文件名
     * @paramstring$mobiletemplate手机模板文件名
     * @paramarray$vars模板输出变量
     * @paramarray$replace模板替换
     * @paramarray$config模板参数
     * @returnmixed
     */
    protected function fetch($template = '', $mobiletemplate = '', $vars = [], $replace = [], $config = [])
    {
        if (ismobile()) {
            return $this->view->fetch($mobiletemplate, $vars, $replace, $config);
        } else {
            return $this->view->fetch($template, $vars, $replace, $config);
        }
    }
}

<?php
namespace plugins\TwoStep;

use app\common\controller\Plugin;
use think\Db;
use app\user\model\User as UserModel;

/**
 * 两步验证插件
 */
class TwoStep extends Plugin
{
    /**
     * @var array 插件信息
     */
    public $info = [
        // 插件名[必填]
        'name'        => 'TwoStep',
        // 插件标题[必填]
        'title'       => '两步验证',
        // 插件唯一标识[必填],格式：插件名.开发者标识.plugin
        'identifier'  => 'twostep.wjq.plugin',
        // 插件图标[选填]
        'icon'        => 'fa fa-fw fa-lock',
        // 插件描述[选填]
        'description' => '后台两步验证插件',
        // 插件作者[必填]
        'author'      => '流风回雪',
        // 作者主页[选填]
        'author_url'  => 'https://www.dolphinphp.com',
        // 插件版本[必填],格式采用三段式：主版本号.次版本号.修订版本号
        'version'     => '1.0.0',
        // 是否有后台管理功能[选填]
        'admin'       => '0',
    ];

    /**
     * @var array 插件钩子
     */
    public $hooks = [
        'signin',
        'two_step' => '后台两步验证钩子',
    ];

    /**
     * 登录时判断是否要执行两步验证
     * @param array $params 参数
     * @return boolean
     */
    public function signin($params = [])
    {
        $username = trim($params['username']);
        // 匹配登录方式
        if (preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/", $username)) {
            // 邮箱登录
            $map['email'] = $username;
        } elseif (preg_match("/^1\d{10}$/", $username)) {
            // 手机号登录
            $map['mobile'] = $username;
        } else {
            // 用户名登录
            $map['username'] = $username;
        }

        $map['status'] = 1;

        // 判断用户是否开启了两步验证
        $user_two_step_secret = UserModel::where($map)->value('two_step_secret');
        if ($user_two_step_secret){// 用户开启了两步验证
            session('two_step_status', 0);   // 等待验证
        }else{
            session('two_step_status', 1);   // 无需验证
        }
        return true;
    }

    /**
     * 两步验证判断
     * @return boolean
     */
    public function twoStep(){
        $two_step_status = session('two_step_status');
        if ($two_step_status == 0){
            return false;   // 打开两步验证页
        }else{
            return true;
        }
    }

    /**
     * 安装方法必须实现
     */
    public function install(){
        // 判断 admin_user 表中是否有 two_step_secret 字段
        $admin_user_table_fields = Db::name('admin_user')->getTableFields();
        if ( array_search('two_step_secret', $admin_user_table_fields) == false ){ // 没有就添加
            $prefix = config('database.prefix');
            $result = Db::execute("ALTER TABLE `{$prefix}admin_user` ADD `two_step_secret` CHAR(16) DEFAULT NULL COMMENT '两步验证';");
            if ($result === false){
                $this->error = '数据表字段添加失败';
                return false;
            }
        }
        return true;
    }

    /**
     * 卸载方法必须实现
     */
    public function uninstall(){
        // 判断 admin_user 表中是否有 two_step_secret 字段
        $admin_user_table_fields = Db::name('admin_user')->getTableFields();
        if ( array_search('two_step_secret', $admin_user_table_fields) ){ // 有就删除字段
            $prefix = config('database.prefix');
            $result = Db::execute("ALTER TABLE `{$prefix}admin_user` DROP `two_step_secret`;");
            if ($result === false){
                $this->error = '数据表字段删除失败';
                return false;
            }
        }
        return true;
    }
}
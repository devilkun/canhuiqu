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

namespace plugins\Alipay;

use app\common\controller\Plugin;

/**
 * 支付宝插件
 * @package plugins\Qrcode
 */
class Alipay extends Plugin
{
    /**
     * @var array 插件信息
     */
    public $info = [
        // 插件名[必填]
        'name'        => 'Alipay',
        // 插件标题[必填]
        'title'       => '支付宝插件',
        // 插件唯一标识[必填],格式：插件名.开发者标识.plugin
        'identifier'  => 'alipay.ming.plugin',
        // 插件图标[选填]
        'icon'        => 'fa fa-fw fa-cc-paypal',
        // 插件描述[选填]
        'description' => '支付宝插件',
        // 插件作者[必填]
        'author'      => '陈潇',
        // 作者主页[选填]
        'author_url'  => 'http://www.youlaiyouqu.net',
        // 插件版本[必填],格式采用三段式：主版本号.次版本号.修订版本号
        'version'     => '1.0.0'
    ];
    
    public $trigger = [
        ['sign_type', 'MD5', ''],
        ['sign_type', 'RSA', 'private_key_path,public_key_path'],
    ];
    /**
     * 安装方法必须实现
     * 一般只需返回true即可
     * 如果安装前有需要实现一些业务，可在此方法实现
     * @author 蔡伟明 <314013107@qq.com>
     * @return bool
     */
    public function install(){
        return true;
    }

    /**
     * 卸载方法必须实现
     * 一般只需返回true即可
     * 如果安装前有需要实现一些业务，可在此方法实现
     * @author 蔡伟明 <314013107@qq.com>
     * @return bool
     */
    public function uninstall(){
        return true;
    }
}
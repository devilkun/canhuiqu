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

// 为方便系统核心升级，二次开发中需要用到的公共函数请写在这个文件，不要去修改common.php文件
use think\Db;
use think\View;
use app\user\model\User;

if (!function_exists('get_avatar_path')) {
    /**
     * 获取头像路径
     * @param int $id 附件id
     * @author 蔡伟明 <314013107@qq.com>
     * @return string
     */
    function get_avatar_path($id = 0)
    {
        $path = model('admin/avatar')->getAvatarPath($id);
        if (!$path) {
            return config('public_static_path').'admin/img/none.png';
        }
        return $path;
    }
}

if(!function_exists('subtext')){
    function subtext($text, $length)
    {
      if(mb_strlen($text, 'utf8') > $length)
      return mb_substr($text, 0, $length, 'utf8').'...';
      return $text;
    }
}

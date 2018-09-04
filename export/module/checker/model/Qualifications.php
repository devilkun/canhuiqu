<?php
namespace app\checker\model;

use think\Model as ThinkModel;
use think\Db;
class Qualifications extends ThinkModel
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '__USER_QUALIFICATIONSINFO__';

    // 自动写入时间戳
    protected $autoWriteTimestamp = true;

    // 写入时，将菜单id转成json格式
    public function setMenuAuthAttr($value)
    {
        return json_encode($value);
    }

    // 读取时，将菜单id转为数组
    public function getMenuAuthAttr($value)
    {
        return json_decode($value, true);
    }
    public static function get_list(){
        $list = Db::view('user_qualificationsinfo','id,company,is_check as status')
                ->view('admin_user','mobile','admin_user.id=user_qualificationsinfo.user_id')
                ->select();
        return $list;
    }
}
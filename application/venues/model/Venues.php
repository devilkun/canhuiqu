<?php
namespace app\venues\model;

use think\Model;
use think\Db;

/**
 * 展馆模型
 * @package app\cms\model
 */
class Venues extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '__EXHIBITION_VENUES__';

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

    //获取展馆列表
    public static function get_list($map=[]){
        $list = Db::view('dp_exhibition_venues a')
               ->view('dp_exhibition_district b','name as city','a.city_id=b.id')
               ->view('dp_admin_user c','username','a.author=c.id')
               ->where($map)->paginate('18');
        return $list;
    }

}
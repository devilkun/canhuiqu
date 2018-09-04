<?php
namespace app\venues\model;

use think\Model;
use think\Db;

/**
 * 文档模型
 * @package app\cms\model
 */
class Tag extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '__VENUES_TAG__';
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

    /**
     * Notes:展馆标签数据列表
     * User: devilkun
     * Date: 2018/5/9
     * Time: 10:46
     * @param array $map
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public static function getList($map=[]){

        $list = Db::table('dp_venues_tag')->where($map)->paginate();
        return $list;
    }

    public static function getTag(){
        $list = Db::table('dp_venues_tag')->column('tagname','id');
        return $list;
    }
}
<?php
namespace app\exhibition\model;

use think\Model;
use think\Db;
/**
 * 文档模型
 * @package app\cms\model
 */
class Organizer extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '__EXHIBITION_ORGANIZER__';

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
    //获取主办方信息列表
    public static function getList(){
        $list = Db::name('exhibition_organizer')->select();
        return $list;
    }
    //构建下拉列表数据
    public static function getListdata(){
        $list = Db::name('exhibition_organizer')->select();
        foreach ($list as $value){
            $result[$value['id']] = $value['name'];
        }
        return $result;
    }
}
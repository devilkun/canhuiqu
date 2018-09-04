<?php
namespace app\exhibition\model;

use think\Model;
use think\Db;

/**
 * 文档模型
 * @package app\cms\model
 */
class Foreign extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '__EXHIBITION_DETAIL__';
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
     * 获取展会详情列表 exhibition_detail
     */
    public static function getList($map=[]){

        $list = Db::table('dp_exhibition_detail')
                ->alias('a')
                ->field('a.id,a.name,c.name as t_name,b.name as c_name,a.view,d.username,a.update_time')
                ->join('dp_exhibition_classification c','a.type = c.id')
                ->join('dp_admin_user d','a.author=d.id')
                ->join('dp_exhibition_district b','a.city_id=b.id')
                ->where($map)
                ->paginate();

        return $list;
    }
    //获取数据库中事件源
    public static function getCalendar($id){
        $list = Db::table("dp_calendar")->where('exid',$id)->select();
        return $list;
    }
    //保存行程信息至数据库
    public static function saveStroke($map=[]){
        $list = Db::table("dp_calendar")->insert($map);
        return $list;
    }
    //获取行程详细信息
    public static function getStrokeOne($map=[]){
        $list = Db::table('dp_calendar')->where($map)->find();
        return $list;
    }
    //执行更新操作
    public static function doEdit($data=[]){
        $result = Db::table('dp_calendar')->where('id',$data['id'])->update($data);
        return $result;
    }
    //执行删除操作
    public static function doDel($map= ''){
        $result = Db::table('dp_calendar')->where($map)->delete();
        return $result;
    }
}
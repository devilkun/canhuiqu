<?php
namespace app\exhibition\model;

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
    public static function get_list(){
        $list = Db::table('dp_exhibition_venues')
            ->alias('a')
            ->field('a.id,b.pid,a.name,d.username,a.create_time,b.name as city')
            ->join('dp_admin_user d','a.author=d.id')
            ->join('dp_exhibition_district b','a.city_id=b.id')
            ->where('a.status=1')
            ->select();
                foreach ($list as $key=>$value){
                     $name = SELF::get_Country($map =['id'=>$value['pid']]);
                     $list[$key]['country'] =$name['name'];
                }
                return $list;
    }
    //获取国家名称
    public static function get_Country($map=[]){
        $pid = Db::table('dp_exhibition_district')->field('pid')->where($map)->find();
        $where['id'] = $pid['pid'];
        $name = Db::table('dp_exhibition_district')->field('name')->where($where)->find();
        return $name;

    }
    public static function getVlist($map=[]){
        $list = Db::table('dp_exhibition_venues')->field('id,name')->where($map)->select();
        foreach ($list as $value){
            $result[$value['id']] = $value['name'];
        }
        return $result;
    }

}
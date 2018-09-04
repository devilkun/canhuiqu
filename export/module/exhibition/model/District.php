<?php
namespace app\exhibition\model;

use think\Model;
use think\Db;
use app\exhibition\model\Field as FieldModel;

/**
 * 文档模型
 * @package app\cms\model
 */
class District extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '__EXHIBITION_DISTRICT__';

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
    //获取区域列表
    public static function getDistrict($map= []){
          $list = Db::name('exhibition_district')->where($map)->select();
          return $list;
    }
    /**
     * 获取会展主分类列表
     * @param array $map 筛选条件
     * @param array $order 排序
     * @author 蔡伟明 <314013107@qq.com>
     * @return mixed
     */
    public static function getTreeList($level="",$items="")
    {

        if($items){
            $where['id']=$path;
        }else{
            $where['level']=$level;
        }
        $list = Db::name('exhibition_district')->where($where)->select();
        if($list){
            foreach ($list as $value) {
                $result[$value['id']] = $value['name'];
            }
        }else{
            return false;
        }
        return $result;
    }


}
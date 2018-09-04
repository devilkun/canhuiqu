<?php
namespace app\exhibition\model;

use think\Model as ThinkModel;
use think\Db;
class Check extends ThinkModel
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

    public static function getList($map=[]){
          $list = Db::view('dp_exhibition_detail','id,name,contractor,area,city_id')
                     ->view('dp_admin_user', ['username'], 'dp_admin_user.id=dp_exhibition_detail.author')
                     ->view('dp_exhibition_classification',['name'=>'type'],'dp_exhibition_classification.id=dp_exhibition_detail.type')
                     ->where($map)
                     ->paginate();
          return $list;
     }
}
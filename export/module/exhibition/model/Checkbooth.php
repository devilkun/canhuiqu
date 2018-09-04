<?php
namespace app\exhibition\model;

use think\Model as ThinkModel;
use think\Db;
class Checkbooth extends ThinkModel
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
    //通过状态获取待审核展位信息
    public static function getCheckboothByStatus(){
        $list = Db::view('dp_exhibition_booth','id,commit_time,status')
                    ->view('dp_exhibition_detail','name','dp_exhibition_detail.id=dp_exhibition_booth.ex_id')
                    ->view('dp_user_qualificationsinfo','company','dp_user_qualificationsinfo.user_id=dp_exhibition_booth.user_id')
                    ->where('dp_exhibition_booth.status',2)
                    ->paginate();
        return $list;
    }
    //通过ID获取待审核展位详细信息
    public static function getCheckboothById($id=''){
        $list = Db::view('dp_exhibition_booth','*')
                    ->view('dp_exhibition_detail','name','dp_exhibition_detail.id=dp_exhibition_booth.ex_id')
                    ->view('dp_user_qualificationsinfo','company,telephone','dp_user_qualificationsinfo.user_id=dp_exhibition_booth.user_id')
                    ->where('dp_exhibition_booth.id',$id)
                    ->find();
        return $list;
    }
    //获取单位名称
    public static function getUnit(){
        $list  =  Db::table('dp_units')->column('name','id');
        return $list;
    }
}
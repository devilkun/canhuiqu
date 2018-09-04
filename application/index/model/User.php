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

namespace app\index\model;
use think\Model as ThinkModel;
use think\Db;
use think\Cookie;
/**
 * 广告模型
 * @package app\cms\model
 */
class User extends ThinkModel
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '__ADMIN_USER__';
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
    //获取用户登陆信息
    public static function getUser($mobile, $password){
        $map['password']= trim($password);
        $map['status'] = 1;
        $map['mobile']=trim($mobile);
        $user = Db::name('admin_user')->where($map)->find();
        if ($user){
            Cookie::set('user_id',$user['id']);
            Cookie::set('role',$user['role']);
            return $user;
        }
    }
    //生成审核数据                                                            
    public static function saveQua($arr=[]){
         $list =  Db::table('dp_user_checkqualifications')->insert($arr);
         return $list;
    }
    //保存审核数据
    public static function savePath($where=[]){
         $list = Db::table('dp_user_qualificationsinfo')->insert($where);
         return $list;
    }
    //获取用户资质审核记录
    public static function getQuaInfo($id=''){
        $list = Db::table('dp_user_qualificationsinfo')->where('user_id',$id)->find();
        return $list;
    }
    //更新用户资质审核记录
    public static function upQua($id='',$where=[]){
        $list = Db::table('dp_user_qualificationsinfo')->where('user_id',$id)->update($where);
        return $list;
    }
}
<?php
namespace app\user\behavior;
use think\Controller;
use think\Db;
class CheckQua {
    use \traits\controller\Jump;//类里面引入jump;类
    //绑定到CheckAuth标签，可以用于检测Session以用来判断用户是否登录
    public function run(&$params){
        $role  =cookie('role');
        $user_id=cookie('user_id');
        $seller_type =['11','12','13','14','15','16'];
        $isin = in_array($role,$seller_type);
        if($isin){
            $is_qualification = Db::table('dp_user_qualificationsinfo')->where('user_id',$user_id)->value('status');
            if($is_qualification !==1){
                return $this->error('请先完成服务资质认证','user/certification');
            }
        }
    }
}

<?php
namespace app\index\controller;
use loveteemo\qqconnect\QC;
use think\Db;
use think\Cookie;
class Base{
	//QQ登录
    public function qqlogin(){
    	$qc = new QC();
    	return redirect($qc->qq_login());    
    }
    //回调函数
 	public function callback(){
		$Qc=new QC();
		$access_token=$Qc->qq_callback();
		$openid=$Qc->get_openid();
        $Qc= new QC($access_token,$openid);
        $qq_user_info=$Qc->get_user_info();
	    if($openid && $access_token){
	        $info = Db::table('dp_admin_user')->where('openid',$openid)->find();
	        if($info){
                Cookie::set('user_id',$info['id']);
                Cookie::set('role',$info['role']);
                Cookie::set('figureurl_qq_1',$qq_user_info['figureurl_qq_1']);
                Cookie::set('figureurl_qq_2',$qq_user_info['figureurl_qq_2']);
                return redirect(url('Index/index'));
            }else{
                return redirect(url('User/third_reg',['access_token'=>$access_token,'openid'=>$openid]));
            }

        }
	}
}
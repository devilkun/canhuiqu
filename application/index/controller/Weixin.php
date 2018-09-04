<?php
namespace app\index\controller;
use app\index\model\Index as IndexModel;
use think\Cookie;
use think\Db;
class Weixin extends Home{
	//首页
	public function index(){
        $map['status']=1;
        $data_list = IndexModel::get_exlist($map);
        $this->assign(['list'=> $data_list]);
		return $this->fetch();
	}
} 
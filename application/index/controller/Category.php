<?php
namespace app\index\controller;
use app\index\model\Category as CategoryModel;
use app\index\model\Index as IndexModel;
/*更多分类控制器*/
class Category extends Home
{
    public function index(){
        $data = CategoryModel::getCateInfo();
        //查询最新发布的信息(5条)
        $Newlist =IndexModel::getNewlist();
        $this->assign(['data'=>$data,'Newlist'=>$Newlist]);
        return $this->fetch();
    }
}

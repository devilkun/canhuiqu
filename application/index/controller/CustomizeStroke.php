<?php
namespace app\index\controller;
use app\index\model\Manager as ManagerModel;
use app\index\model\Exhibition as ExhibitionModel;
use app\index\model\Index as IndexModel;
use app\admin\model\Attachment as AttachmentModel;
use think\Ucpaas;
use think\Request;
use think\Db;
use think\Helper;
use think\Hook;
use think\Cookie;
/**
 * 前台首页控制器
 * @package app\index\controller
 */
class CustomizeStroke extends Home
{
    //展位详情页
    public function book($id)
    {
        $map= ['dp_exhibition_detail.id'=>$id,'dp_exhibition_detail.status'=>'1'];
        $list =IndexModel::getEXlistOne($map);
        $district = ExhibitionModel::district();
        $similar['type'] = $list['type'];
        $similarlist =IndexModel::similarlist($similar,$list['id']);
        //获取展位发布信息
        $pt = IndexModel::getPtList($id);
        $this->assign(['list'=>$list,'similar'=>$similarlist,'district'=>$district,'pt'=>$pt,'unread_num'=>unread_num]);
        return $this->fetch();
    }
}
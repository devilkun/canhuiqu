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

namespace app\index\controller;
use app\index\model\Manager as ManagerModel;
use app\index\model\Index as IndexModel;
use app\admin\model\Attachment as AttachmentModel;
use think\Ucpaas;
use think\Request;
use think\Db;
use think\Helper;
use think\Hook;
use think\Cookie;
use think\Image;
/**
 * 前台首页控制器
 * @package app\index\controller
 */
class Manager extends Home
{
    //用户管理中心首页
    public function index()
    {
        //判断用户是否登录
        Hook::listen('CheckAuth',$params);
        $map['dp_admin_user.id']=Cookie::get('user_id','worldevents_');
        //获取所有一级分类信息
        $category = IndexModel::getExParentType();
        //获取从事行业信息
        $list = ManagerModel::getUserInfo($map);
        $trade = explode(',',$list['company_trade']);
        $trade_info=[];
        foreach ($trade as $k=>$tv){
            foreach ($category as $v){
                if($v['id']==$tv){
                    $trade_info[$k]['id'] =$v['id'];
                    $trade_info[$k]['name'] =$v['name'];
                }
            }
        }
        $this->assign(['list'=>$list,'category'=>$category,'trade_info'=>$trade_info,'unread_num'=>unread_num,'favorite_num'=>favorite_num]);
        return $this->fetch();
    }
    //展会列表
    public function exhibition_list()
    {
        //判断用户是否登录
        $map['id']=Cookie::get('user_id','worldevents_');
        $list = ManagerModel::getUserInfo($map);
        $this->assign(['list',$list,'unread_num'=>unread_num,'favorite_num'=>favorite_num]);
        Hook::listen('CheckAuth',$params);
        return $this->fetch();
    }
    //用户信息编辑
    public function user_info(){
        $data = input();
        $data['birthday'] = strtotime($data['birthday']);
        //更新数据
        $id = Cookie::get('user_id','worldevents_');
        $list = ManagerModel::userInfoEdit($id,$data);
        if($list){
            exit(json_encode(1));
        }else{
            exit(json_encode(2));
        }
    }
    //短信验证码
    public function ajax_sms(){
        $telephone = input('tel');
        $options['accountsid']='5938254090fa99773490bddb19eda595';
        $options['token']='6d9111aa9beca8ccf2ae0e8fc03e88d2';
        $ucpass = new Ucpaas($options);
        $appId = '0a668feaf44449d68f3c8cf816eec4d4';
        $to = $telephone;
        $templateId = "186079";
        $param=rand(10000,99999);
        $result = $ucpass->templateSMS($appId,$to,$templateId,$param);
        return ['code'=>$param];
    }
    //重置密码
    public function reset_password(){
        $data = input();
        //匹配密码是否正确
        $where['password'] =md5($data['initial_password']);
        $where['id'] = Cookie::get('user_id','worldevents_');
        $is_right = Db::table('dp_admin_user')->where($where)->find();
        if($is_right){
            $is_update = Db::table('dp_admin_user')->where('id',$where['id'])->update(['password'=>md5($data['new_password'])]);
            if($is_update){
                exit(json_encode(1));
            }else{
                exit(json_encode(0));
            }
        }else{
            exit(json_encode(2));
        }

    }
    //企业信息
    public function company_info(){
        $data = input();
        $where['user_id'] = Cookie::get('user_id','worldevents_');
        //查找该用户企业信息记录
        $status = Db::table('dp_company_info')->where($where)->find();
        if($status){
            $result = Db::table('dp_company_info')->where($where)->update($data);
        }else{
            $data['user_id'] = $where['user_id'];
            $result= Db::table('dp_company_info')->insert($data);
        }
        if($result){
            exit(json_encode('1'));
        }else{
            exit(json_encode('2'));
        }
    }
    public function get_load(){
        $user_id = Cookie::get('user_id','worldevents_');
        $message = ManagerModel::getMessageOfReadNone($user_id);
        exit(json_encode($message));
    }
    //我的信息
    public function myinfo(){
        Hook::listen('CheckAuth',$params);
        $user_id = Cookie::get('user_id','worldevents_');
        $map['dp_admin_user.id']=$user_id;
        $list = ManagerModel::getUserInfo($map);
        //获取用户信息
        $info_list = ManagerModel::getUserMessage($user_id);
        $page = $info_list->render();
        $this->assign(['list'=>$list,'info_list'=>$info_list,'page'=>$page,'unread_num'=>unread_num,'favorite_num'=>favorite_num]);
        return $this->fetch();
    }
    //获取信息内容
    public function ajax_get_content(){
        $id = input('id');
        $result =ManagerModel::getUserMessageContent($id);
        if($result['status']==0){
            $data['status']=1;
            $data['update_time'] =time();
            $data['read_time'] =time();
            Db::table('dp_admin_message')->where('id',$id)->update($data);
            $result['read_status'] = 0;
        }else{
            $result['read_status'] = 1;
        }
        exit(json_encode($result));
    }
    //我的订单
    public function myorder(){
        //判断用户是否登录
        Hook::listen('CheckAuth',$params);
        $user_id = Cookie::get('user_id','worldevents_');
        $map['dp_admin_user.id']=$user_id;
        $list = ManagerModel::getUserInfo($map);
        $user_id = Cookie::get('user_id','worldevents_');
        //获取订单详情
        $order_list =ManagerModel::getOrderListByUserId($user_id);
        $page = $order_list->render();
        $this->assign(['list'=>$list,'order_list'=>$order_list,'page'=>$page,'unread_num'=>unread_num,'favorite_num'=>favorite_num]);
        return $this->fetch();
    }
    //上传支付凭条
    public function upload_receipt(Request $request)
    {
        $file = $request->file('offline-voucher');
        $receipt_id = $this->upFile($file);
        if($receipt_id){
            $arr['voucher_id'] = $receipt_id;
            exit(json_encode($arr));
        }else{
            $arr['voucher_id'] = '';
            exit(json_encode($arr));
        }
    }

    //上传文件
    private function upFile($file)
    {

        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'images');
        if ($info) {//上传成功
            $fname = '/public/uploads/images/' . str_replace('\\', '/', $info->getSaveName());
            $file_path = '../public/uploads/images/' . str_replace('\\', '/', $info->getSaveName());
            chmod($file_path,0755);
            $path = 'uploads/images/' . str_replace('\\', '/', $info->getSaveName());
            $imgArr = explode(',', 'jpg,gif,png,jpeg,bmp,ttf,tif');
            $imgExt = strtolower($info->getExtension());
            $isImg = in_array($imgExt, $imgArr);
            if ($isImg) {//如果是图片，开始处理
                $image = Image::open($file_path);
//                $thumbnail = 1;
                $water = 1;
                //在这里你可以根据你需要，调用ThinkPHP5的图片处理方法了
                if ($water == 1) {//文字水印
                    $image->text('参会去线下付款凭证', '../public/uploads/font/FZSTK.TTF', 15, '#7cb8bb', \think\Image::WATER_NORTHWEST)->save('..' . $fname);
                    $image->text('www.canhuiqu.com', '../public/uploads/font/FZSTK.TTF', 15, '#7cb8bb')->save('..' . $fname);
                }
                if ($water == 2) {//图片水印
                    $image->water('./public/img/df81.png', 9, 100)->save('.' . $fname);
                }
//                if ($thumbnail == 1) {//生成缩略图
//                    $image->thumb(500, 500, 1)->save('.' . $fname);
//                }
            }
            //获取附件信息
            $img_detail = $info->getInfo();
            $file_info = [
                'uid' => cookie('user_id'),
                'name' =>$img_detail['name'],
                'mime' => $img_detail['type'],
                'path' => $path,
                'ext' => $imgExt,
                'size' => $img_detail['size'],
                'md5' => '',
                'sha1' => '',
                'thumb' => '',
                'module' => 'manager/myorder',
            ];
            //写入数据库
            if ($file_add = AttachmentModel::create($file_info)) {
                return $file_add['id'];
            }

        }
    }
    //通过订单号获取线下支付凭条路径
    public function get_receipt_path(){
        $order_number = input('order_number');
        $path = ManagerModel::getReceiptPathByOn($order_number);
        exit(json_encode($path));
    }
    //更新线下支付凭条
    public function saveVoucher(){
        $data = input();
        $result = Db::table('dp_exhibition_order')->where('order_number',$data['order_number'])->update(['voucher_id'=>$data['voucher_id'],'status'=>4]);
        if($result){
            exit(json_encode(1));
        }else{
            exit(json_encode(2));
        }
    }
    //我的收藏
    public function favorite(){
        //获取收藏列表
        $favorite_list = ManagerModel::getFavoriteList(UID);
        $this->assign(['list'=>user_info,'unread_num'=>unread_num,'favorite_num'=>favorite_num,'favorite_list'=>$favorite_list]);
        return $this->fetch();
    }
    //取消收藏
    public function favorite_cancel(){
        $id = input('id');
        $result = Db::table('dp_exhibition_collection')->where('id',$id)->delete();
        if($result){
              exit(json_encode(1));
        }
    }
}
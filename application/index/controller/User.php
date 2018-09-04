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
use app\index\model\User as UserModel;
use app\admin\model\Attachment as AttachmentModel;
use think\helper\hash\Md5;
use think\Ucpaas;
use think\Request;
use think\Db;
use think\Helper;
use think\Hook;
use think\Cookie;
use think\Cache;
use loveteemo\qqconnect\QC;
/**
 * 前台首页控制器
 * @package app\index\controller
 */
class User extends Home
{
    //登陆
    public function login()
    {
        if(!isset($_SERVER['HTTP_REFERER'])){
            $this->error('请登录后继续访问!','/user/login');
        }else{
          Cookie::set('referer',$_SERVER['HTTP_REFERER']);
          return $this->fetch();
        }

    }
    //第三方注册
    public function third_reg(){
        $account_info = input();
        $this->assign(['account_info'=>$account_info]);
        return $this->fetch();
    }
    //注册
    public function reg()
    {
        $role = $this->roleInfo();
        $type = input('type');
        if(empty($type)){
            $this->assign(['rid'=>$role['user'],'nickname'=>'普通商户']);
        }else {
            switch ($type) {
                case 'organizer':
                    $this->assign(['rid' => $role['organizer'], 'nickname' => '主办方']);
                    break;
                case 'organization':
                    $this->assign(['rid' => $role['organization'], 'nickname' => '组织机构']);
                    break;
                case 'contractor':
                    $this->assign(['rid' => $role['contractor'], 'nickname' => '搭建商']);
                    break;
                case 'transporters':
                    $this->assign(['rid' => $role['transporters'], 'nickname' => '运输商']);
                    break;
                case 'hoperator':
                    $this->assign(['rid' => $role['hoperator'], 'nickname' => '酒店运营商']);
                    break;
                case 'toperator':
                    $this->assign(['rid' => $role['toperator'], 'nickname' => '机票运营商']);
                    break;
                case '':
                    $this->assign(['rid' => $role['user'], 'nickname' => '普通商户']);
                    break;
            }
        }
        return $this->fetch();
    }
    //ajax 向用户发送短信
    public function ajax_sms(){

        $phone = Request::instance()->post('phone');
        $account=Db::table('dp_admin_user')->where("mobile=$phone")->find();
        if($account && $account['openid']!==""){
            return ['status'=>1];
        }else if($account && $account['openid']==""){
            return ['status'=>2,'relation_id'=>$account['id']];
        }else{
            $options['accountsid']='5938254090fa99773490bddb19eda595';
            $options['token']='6d9111aa9beca8ccf2ae0e8fc03e88d2';
            $ucpass = new Ucpaas($options);
            $appId = '0a668feaf44449d68f3c8cf816eec4d4';
            $to = $phone;
            $templateId = "186079";
            $param=rand(10000,99999);
            $result = $ucpass->templateSMS($appId,$to,$templateId,$param);
            return ['code'=>$param];
        }
    }
    //账号互联 短信收取
    public function ajax_relation_sms(){
        $phone = Request::instance()->post('phone');
        $options['accountsid']='5938254090fa99773490bddb19eda595';
        $options['token']='6d9111aa9beca8ccf2ae0e8fc03e88d2';
        $ucpass = new Ucpaas($options);
        $appId = '0a668feaf44449d68f3c8cf816eec4d4';
        $to = $phone;
        $templateId = "186079";
        $param=rand(10000,99999);
        $result = $ucpass->templateSMS($appId,$to,$templateId,$param);
        return ['code'=>$param];
    }
    //ajax 获取用户注册信息
    public function ajax_reg(){
        $map['mobile']= Request::instance()->post('mobile');
        $map['password']= md5(Request::instance()->post('password'));
        $map['nickname']= Request::instance()->post('nickname');
        $map['role']=Request::instance()->post('rid');
        $map['status']=1;
        $map['is_front']=1;
        $data=UserModel::create($map);
        if($data){
            $where['rid'] = $map['role'];
            $list  = ManagerModel::getCerauth($where);
            if($list){
                foreach ($list as $value){
                    $arr['qua_id'] = $value['id'];
                    $arr['user_id'] = $data['id'];
                    $arr['status']=2;
                    $arr['checkuserid']=1;
                    UserModel::saveQua($arr);
                }

            }
            return ['status'=>1];
        }

    }
    //ajax 获取用户登陆信息
    public function login_ajax(){
        $mobile= Request::instance()->post('mobile');
        $password= md5(Request::instance()->post('password'));
        if($user=UserModel::getUser($mobile,$password)){
            $arr['status']='1';
            echo json_encode($arr);
        }else{
            $arr['status']='0';
            echo json_encode($arr);
        }
    }
    //商家注册
    public function process(){

        return $this->fetch();
    }
    //获取角色信息
    public function roleInfo(){
        $rolelist = Db::table('dp_admin_role')->field('id,name')->where('is_front','1')->select();
        foreach($rolelist as $k=>$v){
            $list[$v['name']] = $v['id'];
        }
        return $list;
    }
    //退出登录
    public function logout(){
        Cookie::delete('user_id','worldevents_');
        Cookie::delete('role','worldevents_');
        Cookie::delete('figureurl_qq_1','worldevents_');
        Cookie::delete('figureurl_qq_2','worldevents_');
        Hook::listen('CheckAuth',$params);
    }
    //资质认证
    public function certification(){
        //判断用户是否登录
        Hook::listen('CheckAuth',$params);
        $id=Cookie::get('user_id','worldevents_');
        $data = UserModel::getQuaInfo($id);
        $map['dp_admin_user.id']=$id;
        $list = ManagerModel::getUserInfo($map);
        $where['user_id'] = $id;
        $certifications  = ManagerModel::getCerinfo($where);
        $this->assign(['list'=>$list,'certifications'=>$certifications,'data'=>$data,'unread_num'=>unread_num]);
        return $this->fetch();
    }
    //ajax 营业执照图片路径获取
    public function ajax_uploads_blicense(){
        $file = $_FILES['file'];
        $id = $this->saveImg($file);
        exit(json_encode($id));
    }
    //ajax 处理开户许可证图片路径获取
    public function ajax_uploads_opermit(){
        $file = $_FILES['file'];
        $id = $this->saveImg($file);
        exit(json_encode($id));
    }
    //提交上传
    public  function subFrom(){
        $data = input();
        //在线审核
        $name = $data['check_info'];
        $args = $name.'77Pr9b9f4Z4bf5Ms9';
        $token = md5($args);
        $url = "http://api.shutadata.com/ic/basic/getBasicDetailByName?key=adebf113-345a-4b79-9583-71e2809b4185&token=".$token."&name=".urlencode($name);
        $result = json_decode($this->curl_request($url));
        if(!is_null($result)){
            if($result->status=='在营' || $result->status=='存续'){
                //更新商家资质状态
                $user_id =  Cookie::get('user_id','worldevents_');
                $status = Db::table('dp_user_checkqualifications')->where('user_id',$user_id)->update(['status'=>1,'checktime'=>time()]);
                $where['blicense']=$data['blicense'];
                $where['opermit'] = $data['opermit'];
                $where['company'] = $data['company'];
                $where['telephone']= $data['telephone'];
                $where['qq']=$data['qq'];
                $where['check_info']=$data['check_info'];
                $where['user_id'] = $user_id;
                $where['business_status'] = $result->status;
                $where['status'] = 1;
                $id =$where['user_id'];
                $info  = UserModel::getQuaInfo($id);
                if($info){
                    $result = UserModel::upQua($id,$where);
                    if($result && $status){
                        $arr['status']=1;
                        exit(json_encode($arr));
                    }else{
                        $arr['status']=0;
                        exit(json_encode($arr));
                    }
                }else{
                    $result = UserModel::savePath($where);
                    if($result && $status){
                        $arr['status']=1;
                        exit(json_encode($arr));
                    }else{
                        $arr['status']=0;
                        exit(json_encode($arr));
                    }
                }
            }else{
                $arr['status']=2;
                exit(json_encode($arr));
            }
        }else{
            $arr['status']=2;
            exit(json_encode($arr));
        }





    }
    //保存图片
    public function saveImg($file=[]){
        $name = $file['name'];
        $dir          = config('upload_path') . DS . 'images' . DS . date('Ymd', $this->request->time());

        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        $uploaddir = 'images\\' . date('Ymd', $this->request->time()) . '\\';
        $type = strtolower(substr(strrchr($name, '.'), 1));
        $newname =md5($name).'.'.$type;
        $file_path    = $dir . DS . $newname;
        $info=move_uploaded_file($file['tmp_name'],$file_path);
        if ($info) {
            // 获取附件信息
            $file_info = [
                'uid'    => cookie('user_id'),
                'name'   => $name,
                'mime'   => $file['type'],
                'path'   => 'uploads/'.str_replace('\\', '/', $uploaddir).str_replace('\\', '/', $newname),
                'ext'    => $type,
                'size'   => $file['size'],
                'md5'    => '',
                'sha1'   => '',
                'thumb'  => '',
                'module' => 'user/certification',
            ];
            // 写入数据库
            if ($file_add = AttachmentModel::create($file_info)){
                return $file_add['id'];
            }
        }
    }
    //账号补全信息保存
    public function ajax_third_reg(){
        $access_token=input('access_token');
        $openid = input('openid');
        $Qc= new QC($access_token,$openid);
        $qq_user_info=$Qc->get_user_info();
        $data=[
            'mobile'=> input('mobile'),
            'password'=>md5(input('password')),
            'nickname'=>input('nickname'),
            'role'=>input('rid'),
            'status'=>1,
            'is_front'=>1,
            'openid'=>$openid,
            'qq_avatar_1'=>$qq_user_info['figureurl_qq_1'],
            'qq_avatar_2'=>$qq_user_info['figureurl_qq_2'],
            'create_time'=>time(),
            'last_login_time'=>time(),
        ];
        $id=UserModel::insertGetId($data);
        if($id){
            $where['rid'] = $data['role'];
            $list  = ManagerModel::getCerauth($where);
            if($list){
                foreach ($list as $value){
                    $arr['qua_id'] = $value['id'];
                    $arr['user_id'] = $id;
                    $arr['status']=2;
                    $arr['checkuserid']=1;
                    UserModel::saveQua($arr);
                }

            }
            Cookie::set('user_id',$id);
            Cookie::set('role',input('rid'));
            Cookie::set('figureurl_qq_1',$qq_user_info['figureurl_qq_1']);
            Cookie::set('figureurl_qq_2',$qq_user_info['figureurl_qq_2']);
            return ['status'=>1];
        }
    }
    //关联账号
    public function ajax_relation_account(){
        $access_token=input('access_token');
        $openid = input('openid');
        $Qc= new QC($access_token,$openid);
        $qq_user_info=$Qc->get_user_info();
        $data=[
            'openid'=>$openid,
            'qq_avatar_1'=>$qq_user_info['figureurl_qq_1'],
            'qq_avatar_2'=>$qq_user_info['figureurl_qq_2'],
            'create_time'=>time(),
            'last_login_time'=>time(),
        ];
        $relation = Db::table('dp_admin_user')->where('id',input('id'))->update($data);
        //获取账号role
        $role = Db::table('dp_admin_user')->where('id',input('id'))->value('role');
        if($relation){
            Cookie::set('user_id',input('id'));
            Cookie::set('role',$role);
            Cookie::set('figureurl_qq_1',$qq_user_info['figureurl_qq_1']);
            Cookie::set('figureurl_qq_2',$qq_user_info['figureurl_qq_2']);
            $arr['status']=1;
            exit(json_encode($arr));
        }else{
            $arr['status']=0;
            exit(json_encode($arr));
        }

    }
    //curl
    public function curl_request($url,$post='',$cookie='', $returnCookie=0){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true); // 跳过证书检查
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl, CURLOPT_REFERER, "http://XXX");
        if($post) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
        }
        if($cookie) {
            curl_setopt($curl, CURLOPT_COOKIE, $cookie);
        }
        curl_setopt($curl, CURLOPT_HEADER, $returnCookie);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        if (curl_errno($curl)) {
            return curl_error($curl);
        }
        curl_close($curl);
        if($returnCookie){
            list($header, $body) = explode("\r\n\r\n", $data, 2);
            preg_match_all("/Set\-Cookie:([^;]*);/", $header, $matches);
            $info['cookie']  = substr($matches[1][0], 1);
            $info['content'] = $body;
            return $info;
        }else{
            return $data;
        }
    }
}

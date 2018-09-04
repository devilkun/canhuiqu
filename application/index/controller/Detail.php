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
use app\index\model\Index as IndexModel;
use think\Cookie;
use think\Db;
/**
 * 前台首页控制器
 * @package app\index\controller
 */
class Detail extends Home
{
    public function index($id)
    {
        //获取会展详情
        // $this->view($id);
        $map= ['dp_exhibition_detail.id'=>$id,'dp_exhibition_detail.status'=>'1'];
        $list =IndexModel::getEXlistOne($map);
        //获取相关展会(5条)
        $similar['type'] = $list['type'];
        $similar['status']=1;
        $similarlist =IndexModel::similarlist($similar,$list['id']);
        $type = IndexModel::getType();
        //当存在用户id时判断是否添加收藏
        $user_id = Cookie::get('user_id','worldevents_');
        if($user_id){
                   $where['user_id'] = $user_id;
                   $where['ex_id'] = $id; 
                   $result = Db::table('dp_exhibition_collection')->where($where)->find();
                       if($result){
                             $is_collect  = 1;
                       }else{
                             $is_collect  = 0; 
                       }
        }else{
                   $is_collect  = 0;
        }
        $this->assign([
            'list'  =>$list,
            'type'=>$type,
            'similar'=>$similarlist,
            'is_collect'=>$is_collect,
            'unread_num'=>unread_num
        ]);
        return $this->fetch();
    }
    //页面访问量
    public function view($id){
        $content = 'v:c:'.$id;
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379);
        $redis->incr($content);
    }
    //添加取消收藏
    public function collection(){
        $user_id = Cookie::get('user_id','worldevents_');
        if($user_id){
            $data = input();
                if($data['action']=='加入收藏'){
                    $args['ex_id'] = $data['id'];
                    $args['add_time'] = time();
                    $args['user_id'] = $user_id;
                    $result = Db::table('dp_exhibition_collection')->insert($args);
                    if($result){
                        $arr['status'] = 'add-success';
                        exit(json_encode($arr));
                    }
                }
        }else{
            $arr['status'] = 'login-none';
            exit(json_encode($arr));
        }
    }
}

<?php
namespace app\index\model;
use think\Model as ThinkModel;
use think\Db;
/**
 * 广告模型
 * @package app\cms\model
 */
class Exhibition extends ThinkModel
{
// 设置当前模型对应的完整数据表名称
    protected $table = '__EXHIBITION_DETAIL__';
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
    //获取用户信息
    public static function get_exlist($map=[]){
        $list = Db::name('exhibition_detail')->where($map)->paginate(8,false,['query'=>request()->param()]);
        return $list;
    }
    //获取city_id获取国家和城市name
    public static function district(){
         //国外
         $fcity =Db::table('dp_exhibition_district')->where('level',3)->field('name,pid,id')->select();
         foreach ($fcity as $k=>$v){
             $list['0'][$v['id']]['city']=$v['name'];
             $country = Db::table('dp_exhibition_district')->where('id',$v['pid'])->field('name')->find();
             $list['0'][$v['id']]['country']=$country['name'];
         }
         //国内
        $dcity =Db::table('dp_city')->where('leveltype',2)->field('name,pid,id')->select();
        foreach ($dcity as $k1=>$v1){
            $list['1'][$v1['id']]['city']=$v1['name'];
            $list['1'][$v1['id']]['country']='中国';
        }
         return $list;
    }
    //获取用户展会添加列表（ID）
    public static function getAddmyex($map_myex=[]){
       $result = Db::table('dp_exlist')->field('exhibition_id')->where($map_myex)->select();
       if($result){
           foreach ($result as $key => $value) {
           $list[$key] = $value['exhibition_id'];
       }
           return $list;
       }else{
           return $result;
       }
       
    }
    //获取我的展会列表数据
    public static function get_Myexlist($where=[]){
         $list = Db::view("dp_exhibition_detail",'id as ex_id,name,content,type,city_id,startime,endtime,organizer,venues,area')
                ->view("dp_exlist",'id,addtime','dp_exlist.exhibition_id=dp_exhibition_detail.id')
                ->where($where)
                ->paginate(8);
         return $list;
    }
    //获取当前用户已发布展位ID
    public static function getBoothId($id){
         $list = Db::table('dp_exhibition_booth')->where('user_id',$id)->column('ex_id');
         return $list;
    }
    //获取当前用户已发布拼团ID
    public static function getPtId($id){
        $list = Db::table('dp_exhibition_pt')->where('user_id',$id)->column('ex_id');
        return $list;
    }
    //获取当前用户已发布展位列表
    public static function get_MyBoothList($where=[]){
        $list = Db::view("dp_exhibition_detail",'id as ex_id,name,content,type,city_id,startime,endtime,organizer,venues,area')
            ->view("dp_exhibition_booth","pattern","dp_exhibition_booth.ex_id=dp_exhibition_detail.id")
            ->where($where)
            ->paginate(8);
        return $list;
    }
    //根据条件获取展位详细信息(用于我的展位:预览和编辑)
    public static function getMyboothByArgs($where=[]){
        $list = Db::view('dp_exhibition_booth',"*")
                   ->view("dp_exhibition_detail",'name','dp_exhibition_detail.id=dp_exhibition_booth.ex_id')
                   ->where($where)->find();
        return $list;
    }
    //根据条件获取拼团详细信息(用于我的拼团:预览和编辑)
    public static function getMyptByArgs($where=[]){
        $list = Db::view('dp_exhibition_pt',"*")
            ->view("dp_exhibition_detail",'name','dp_exhibition_detail.id=dp_exhibition_pt.ex_id')
            ->where($where)->find();
        return $list;
    }
    //获取当前用户已发布拼团列表
    public static function get_MyPtList($where=[]){
        $list = Db::view("dp_exhibition_detail",'id as ex_id,name,content,type,city_id,startime,endtime,organizer,venues,area')
            ->view("dp_exhibition_pt","setoff_city,destination_city","dp_exhibition_pt.ex_id=dp_exhibition_detail.id")
            ->where($where)
            ->paginate(8);
        return $list;
    }
    //获取当前用户的常用企业信息
    public static function getFrequentCompanyByUserid($user_id=''){
        $list = Db::table('dp_frequent_company')->where('user_id',$user_id)->field('id,template_name')->order('add_time desc')->limit(5)->select();
        return $list;
    }
}
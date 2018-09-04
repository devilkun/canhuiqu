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
/**
 * 广告模型
 * @package app\cms\model
 */
class Category extends ThinkModel
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '__EXHIBITION_CLASSIFICATION__';
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

    //获取分类信息及数量
    public static function getCateInfo(){
        $where['pid'] = 0;
        $list = Db::table("dp_exhibition_classification")->field("id,name")->where($where)->select();
        foreach ($list as $kp=>$vp){
            $pid = $vp['id'];
            $result[$kp]['name']= $vp['name'];
            $result[$kp]['id']= $vp['id'];
            $cid = Db::table('dp_exhibition_classification')->field("id")->where("pid",$pid)->select();
            if($cid){
                $w = [];
                foreach ($cid as $kc=>$vc){
                    $w[] = $vc['id'];
                }
                $map['type']=['in',$w];
                $data =Db::table('dp_exhibition_detail')->where($map)->select();
                $num = count($data);
                $result[$kp]['num']= $num;
            }else{
                $result[$kp]['num']= 0;
            }


        }
        return $result;
    }
   
}
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

namespace app\exhibition\model;

use think\Model;
use think\Db;
use app\exhibition\model\Field as FieldModel;

/**
 * 文档模型
 * @package app\cms\model
 */
class Classification extends Model
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

    /**
     * 获取会展类别列表
     * @param array $map 筛选条件
     * @param array $parent 主分类标识
     * @author 蔡伟明 <314013107@qq.com>
     * @return mixed
     */
    public static function getList($map = [],$parent="")
    { 
            $list = Db::name('exhibition_classification')->where($map)->paginate();
            return $list;
    }

    /**
     * 获取会展主分类列表
     * @param array $map 筛选条件
     * @param array $order 排序
     * @author 蔡伟明 <314013107@qq.com>
     * @return mixed
     */
public static function getTreeList()
{
            $where['pid'] =0;
            $list = Db::name('exhibition_classification')->where($where)->select();
                        if($list){
                                    foreach ($list as $value) {
                                    $result[$value['id']] = $value['name'];
                                    } 
                        }else{
                                    return false;
                        }
                                    return $result;
}
    public static function getLists()
    {
        $list = Db::name('exhibition_classification')->select();
        foreach ($list as $key=>$value){
            $result[$value['id']] = $value['name'];
        }
        return $result;
    }
}
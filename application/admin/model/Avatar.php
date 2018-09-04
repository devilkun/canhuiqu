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

namespace app\admin\model;

use think\Model;

/**
 * 附件模型
 * @package app\admin\model
 */
class Avatar extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '__AVATAR__';

    // 自动写入时间戳
    protected $autoWriteTimestamp = true;

    /**
     * 根据附件id获取路径
     * @param  string|array $id 附件id
     * @param  int $type 类型：0-补全目录，1-直接返回数据库记录的地址
     * @return string|array     路径
     */
    public function getAvatarPath($id = '', $type = 0)
    {
        $path = $this->where('id', $id)->find();
        return $path['path'];
    }
}
?>
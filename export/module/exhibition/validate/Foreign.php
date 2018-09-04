<?php
namespace app\exhibition\validate;

use think\Validate;
/**
 * 配置验证器
 * @package app\exhibition\validate
 */
class Foreign extends Validate
{
    //定义验证规则
    protected $rule = [
        'name|会展名称'   => 'require|unique:exhibition_detail',
        'ename|会展英文名称'   => 'require|unique:exhibition_detail',
        'type|会展分类'   => 'require',
        'venues|展馆信息'   => 'require',
        'city_id|会展所在区域'   => 'require',
        'content|会展内容'   => 'require',
        'address|详细地址'   => 'require',
        'startime|会展举办开始时间'   => 'require',
        'endtime|会展举办结束时间'   => 'require',
        'picture|主图片上传'   => 'require',
        'organizer|主办单位'   => 'require',
    ];
}
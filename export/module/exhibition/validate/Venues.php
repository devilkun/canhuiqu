<?php
namespace app\exhibition\validate;

use think\Validate;
/**
 * 配置验证器
 * @package app\exhibition\validate
 */
class Venues extends Validate
{
    //定义验证规则
    protected $rule = [
        'city_id|所在区域'=>'require',
        'name|展馆名称'   => 'require|unique:exhibition_venues',
        'pictures|图片信息'=>'require',
        'content|展馆介绍'=>'require',
        'route|展馆路线'=>'require',
        'acreage|展馆面积'=>'require',
        'phone|展馆联系方式'=>'require',
        'address|展馆地址'=>'require',
        'startime|展馆开始时间'=>'require',
        'endtime|展馆结束时间'=>'require',
        'people|可容纳人数'=>'require',
        'website|展馆网址'=>'require',
    ];
}
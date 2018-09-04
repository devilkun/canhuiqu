<?php
namespace app\venues\validate;

use think\Validate;
/**
 * 配置验证器
 * @package app\exhibition\validate
 */
class Venues extends Validate
{
    //定义验证规则
    protected $rule = [
        'logo|展馆Logo'=>'require',
        'name|展馆名称'   => 'require|unique:exhibition_venues',
        'city_id|所在区域'=>'require',
        'introduction|展馆介绍'=>'require',
        'email|展馆邮件' =>  'require|email',
        'fax|展馆传真'=>'require',
        'contacts|展馆联系方式'=>'require',
        'address|展馆地址'=>'require',
        'start_time|展馆开始时间'=>'require',
        'end_time|展馆结束时间'=>'require',
        'website|展馆网址'=>'require|url',
    ];
}
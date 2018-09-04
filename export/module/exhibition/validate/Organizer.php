<?php
namespace app\exhibition\validate;

use think\Validate;
/**
 * 配置验证器
 * @package app\exhibition\validate
 */
class Organizer extends Validate
{
    //定义验证规则
    protected $rule = [
        'name|主办方名称'   => 'require|unique:exhibition_classification',
        'address|主办方地址'   => 'require',
    ];
}
<?php
namespace app\exhibition\validate;

use think\Validate;
/**
 * 配置验证器
 * @package app\exhibition\validate
 */
class Classification extends Validate
{
    //定义验证规则
    protected $rule = [
        'name|分类名称'   => 'require|unique:exhibition_classification',
    ];
}
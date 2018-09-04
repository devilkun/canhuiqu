<?php
namespace app\translation\validate;

use think\Validate;
/**
 * 配置验证器
 * @package app\exhibition\validate
 */
class translation extends Validate
{
    //定义验证规则
    protected $rule = [
        'name|展会中文名称'   => 'require|unique:exhibition_detail',
        'content|展会中文内容'=>'require',
        'range|展会范围中文'=>'require',
    ];
}
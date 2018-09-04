<?php
namespace app\exhibition\validate;

use think\Validate;
/**
 * 配置验证器
 * @package app\exhibition\validate
 */
class District extends Validate
{
    //定义验证规则
    protected $rule = [
        'name|区域名称'   => 'require|unique:exhibition_district',
        'name_en|区域英文名称'=>'require',
    ];
}
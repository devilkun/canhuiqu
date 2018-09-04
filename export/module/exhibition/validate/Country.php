<?php
namespace app\exhibition\validate;

use think\Validate;
/**
 * 配置验证器
 * @package app\exhibition\validate
 */
class Country extends Validate
{
    //定义验证规则
    protected $rule = [
        'pid|区域选择'=>'require',
        'name|国家名称'   => 'require|unique:exhibition_district',
        'name_en|国家英文名称'=>'require',
    ];
}
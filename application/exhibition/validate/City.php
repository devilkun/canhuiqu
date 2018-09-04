<?php
namespace app\exhibition\validate;

use think\Validate;
/**
 * 配置验证器
 * @package app\exhibition\validate
 */
class City extends Validate
{
    //定义验证规则
    protected $rule = [
        'pid|所在区域'=>'require',
        'name|城市名称'   => 'require|unique:exhibition_district',
        'name_en|城市英文名称'=>'require',
    ];
}
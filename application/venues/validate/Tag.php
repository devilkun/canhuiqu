<?php
    namespace app\venues\validate;

    use think\Validate;
    /**
     * 配置验证器
     * @package app\exhibition\validate
     */
    class Tag extends Validate
    {
        //定义验证规则
        protected $rule = [
            'tagname|展馆标签名称'   => 'require|unique:venues_tag',
        ];
    }
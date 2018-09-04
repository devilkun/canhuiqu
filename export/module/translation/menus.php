<?php
// +----------------------------------------------------------------------
// | 海豚PHP框架 [ DolphinPHP ]
// +----------------------------------------------------------------------
// | 版权所有 2016~2017 河源市卓锐科技有限公司 [ http://www.zrthink.com ]
// +----------------------------------------------------------------------
// | 官方网站: http://dolphinphp.com
// +----------------------------------------------------------------------
// | 开源协议 ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------

/**
 * 菜单信息
 */
return [
  [
    'title' => '翻译',
    'icon' => 'fa fa-fw fa-print',
    'url_type' => 'module_admin',
    'url_value' => 'translation/exhibition/index',
    'url_target' => '_self',
    'online_hide' => 0,
    'sort' => 5,
    'status' => 1,
    'child' => [
      [
        'title' => '翻译类型',
        'icon' => 'fa fa-fw fa-sitemap',
        'url_type' => 'module_admin',
        'url_value' => '',
        'url_target' => '_self',
        'online_hide' => 0,
        'sort' => 100,
        'status' => 1,
        'child' => [
          [
            'title' => '展会翻译',
            'icon' => 'fa fa-fw fa-ge',
            'url_type' => 'module_admin',
            'url_value' => 'translation/exhibition/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 100,
            'status' => 1,
            'child' => [
              [
                'title' => '展会翻译详情页',
                'icon' => 'fa fa-fw fa-pencil',
                'url_type' => 'module_admin',
                'url_value' => 'translation/exhibition/detail',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
            ],
          ],
        ],
      ],
    ],
  ],
];

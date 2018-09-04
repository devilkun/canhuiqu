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
    'title' => '审核',
    'icon' => 'glyphicon glyphicon-tower',
    'url_type' => 'module_admin',
    'url_value' => 'checker/index/index',
    'url_target' => '_self',
    'online_hide' => 0,
    'sort' => 100,
    'status' => 1,
    'child' => [
      [
        'title' => '审核类型',
        'icon' => 'fa fa-fw fa-book',
        'url_type' => 'module_admin',
        'url_value' => '',
        'url_target' => '_self',
        'online_hide' => 0,
        'sort' => 1,
        'status' => 1,
        'child' => [
          [
            'title' => '线下支付审核',
            'icon' => 'fa fa-fw fa-download',
            'url_type' => 'module_admin',
            'url_value' => 'checker/index/offline',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 1,
            'status' => 1,
            'child' => [
              [
                'title' => '线下支付审核内容',
                'icon' => 'fa fa-fw fa-pagelines',
                'url_type' => 'module_admin',
                'url_value' => 'checker/index/offline_detail',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 1,
                'status' => 1,
              ],
              [
                'title' => '审核结果',
                'icon' => 'fa fa-fw fa-bold',
                'url_type' => 'module_admin',
                'url_value' => 'checker/index/ajax_sms',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 2,
                'status' => 1,
              ],
            ],
          ],
          [
            'title' => '服务资质确认',
            'icon' => 'fa fa-fw fa-shield',
            'url_type' => 'module_admin',
            'url_value' => 'checker/qualifications/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 2,
            'status' => 1,
            'child' => [
              [
                'title' => '服务资质',
                'icon' => 'fa fa-fw fa-check-square-o',
                'url_type' => 'module_admin',
                'url_value' => 'checker/qualifications/edit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
              [
                'title' => '审核结果处理',
                'icon' => 'fa fa-fw fa-check-square-o',
                'url_type' => 'module_admin',
                'url_value' => 'checker/qualifications/ajax_sms',
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

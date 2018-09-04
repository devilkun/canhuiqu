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
    'title' => '展馆',
    'icon' => 'fa fa-fw fa-institution',
    'url_type' => 'module_admin',
    'url_value' => 'venues/tag/index',
    'url_target' => '_self',
    'online_hide' => 0,
    'sort' => 5,
    'status' => 1,
    'child' => [
      [
        'title' => '展馆模块',
        'icon' => 'fa fa-fw fa-tags',
        'url_type' => 'module_admin',
        'url_value' => '',
        'url_target' => '_self',
        'online_hide' => 0,
        'sort' => 1,
        'status' => 1,
        'child' => [
          [
            'title' => '展馆标签',
            'icon' => 'fa fa-fw fa-tag',
            'url_type' => 'module_admin',
            'url_value' => 'venues/tag/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 1,
            'status' => 1,
            'child' => [
              [
                'title' => '新增',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'venues/tag/add',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 1,
                'status' => 1,
              ],
              [
                'title' => '编辑',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'venues/tag/edit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 2,
                'status' => 1,
              ],
              [
                'title' => '删除',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'venues/tag/delete',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 3,
                'status' => 1,
              ],
              [
                'title' => '快速编辑',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'venues/tag/quickedit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 4,
                'status' => 1,
              ],
            ],
          ],
          [
            'title' => '展馆发布',
            'icon' => 'fa fa-fw fa-fa',
            'url_type' => 'module_admin',
            'url_value' => 'venues/venues/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 2,
            'status' => 1,
            'child' => [
              [
                'title' => '新增',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'venues/venues/add',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 1,
                'status' => 1,
              ],
              [
                'title' => '编辑',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'venues/venues/edit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 2,
                'status' => 1,
              ],
              [
                'title' => '删除',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'venues/venues/delete',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 3,
                'status' => 1,
              ],
              [
                'title' => '启用',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'venues/venues/enable',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 4,
                'status' => 1,
              ],
              [
                'title' => '禁用',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'venues/venues/disable',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 5,
                'status' => 1,
              ],
              [
                'title' => '快速编辑',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'venues/venues/quickedit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 6,
                'status' => 1,
              ],
            ],
          ],
        ],
      ],
    ],
  ],
];

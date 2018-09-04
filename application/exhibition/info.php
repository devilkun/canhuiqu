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
 * 模块信息
 */
return [
  'name' => 'exhibition',
  'title' => '会展',
  'identifier' => 'exhibition.TK.module',
  'author' => 'devilkun',
  'version' => '1.0.0',
  'description' => '会展中心模块',
  'tables' => [
    'exhibition_detail',
    'exhibition_classification',
    'exhibition_district',
    'exhibition_venues',
      'city',
  ],
  'database_prefix' => 'dp_',
  'config' => [
    [
      'radio',
      'need_check',
      '是否需要审核',
      '发布文章时是否需要审核才能发布',
      [
        '是',
        '否',
      ],
      1,
    ],
    [
      'radio',
      'comment_status',
      '是否开启评论',
      '是否开启文章评论功能',
      [
        '是',
        '否',
      ],
      1,
    ],
  ],
];

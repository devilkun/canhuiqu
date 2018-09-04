<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    '[exhibition]'=>[
       ':id' => ['detail/index', ['method' => 'get'], ['id' => '\d+']],
        '/category'=>['index/exhibition', ['method' => 'get']],
        '/category-search'=>['index/search', ['method' => 'post']],
    ],
    'index'=>['index/index', ['method' => 'get']],
    'book-booth/:id'=>['booth/book', ['method' => 'get'], ['id' => '\d+']],
    'book-pt/:id'=>['pt/book', ['method' => 'get'], ['id' => '\d+']],
    'customize-stroke/:id'=>['customizeStroke/book', ['method' => 'get'], ['id' => '\d+']],
    'booth-construction/:id'=>['boothConstruction/book', ['method' => 'get'], ['id' => '\d+']],
    'exhibits-transportation/:id'=>['exhibitsTransportation/book', ['method' => 'get'], ['id' => '\d+']],
];

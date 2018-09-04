<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:95:"D:\phpStudy\PHPTutorial\WWW\test.cc\application/../application/index/view/index\exhibition.html";i:1524031490;s:74:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\nav.html";i:1524040551;s:77:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\footer.html";i:1524186740;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/style-news.css" />
    <title>参会去？- 展会</title>
    <link rel="shortcut icon" href="/static/home/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <!--[if lt IE 9]><script> src="http://html5shim.googlecode.com/svn/trunk/html5.js"</script><![endif]-->
</head>
<style>
    .liOver{
        border-color:#eaeaea !important;
        box-shadow: 3px 3px 9px #eaeaea;
    }
</style>
<body style="background:  #ffffff;">
    <div class="top">
        <div class="top">
  <section class="head">
    <div class="nav-box">
      <ul>
        <li><a href="<?php echo url('index/exhibition'); ?>">展会</a></li>
        <li><a href="#">会议</a></li>
        <li><a href="<?php echo url('index/index'); ?>"><img src="/static/home/img/logo.png" class="logo"></a></li>
        <li><a href="#">活动</a></li>
        <li><a href="#">培训</a></li>
      </ul>
    </div>
    <?php if(\think\Request::instance()->cookie('user_id') != ''): ?>
    <div class="registered">
                <?php if(\think\Request::instance()->cookie('figureurl_qq_1')): ?>
                <a href="<?php echo url('Manager/index'); ?>" class="u-vatar"><img src="<?php echo \think\Request::instance()->cookie('figureurl_qq_1'); ?>" height="30" width="30" alt="">
                   </a>
                <?php else: ?>
                <a href="<?php echo url('Manager/index'); ?>" class="u-vatar"><img src="/static/home/img/user1.png" height="30" width="30" alt=""></a>
                <?php endif; if($unread_num > 0): ?><p class="message-tz"><?php echo $unread_num; ?></p><?php endif; ?>
        <div class="uesr-box" style="display: none">
                    <b></b>
                    <ul>
                        <li><a href="<?php echo url('manager/index'); ?>">账户中心</a>
                        <li><a href="<?php echo url('manager/index'); ?>">我的信息</a>
                        <li><a href="<?php echo url('user/logout'); ?>">退出登录</a>
                    </ul>
                </div>
      </div>
    <?php else: ?>
    <div class="login-index">
      <a href="<?php echo url('User/process'); ?>" class="a-sjzc">商家注册</a>
      <a href="<?php echo url('User/login'); ?>">登录 / 注册</a>
    </div>
    <?php endif; ?>
  </section>
</div>

        <section class="banner-ny clearfix"></section>
    </div>
    <form id="webQueryCondition" action="<?php echo url('index/search'); ?>" method="post">
        <input type="hidden" name='type' id="type" value="<?php echo $type; ?>">
        <input id="searchSource" name="source" type="hidden" value="" />
        <input id="parentCategoryId" name="parentCategoryId" type="hidden" value="<?php if($args['parentCategoryId']): ?><?php echo $args['parentCategoryId']; endif; ?>" />
        <input id="categoryId" name="categoryId" type="hidden" value="<?php if($args['categoryId']): ?><?php echo $args['categoryId']; endif; ?>" />
        <input id="continentCode" name="continentCode" type="hidden" value="<?php if($args['continentCode']): ?><?php echo $args['continentCode']; endif; ?>" />
        <input id="countryCode" name="countryCode" type="hidden" value="<?php if($args['countryCode']): ?><?php echo $args['countryCode']; endif; ?>" />
        <input id="startTime" name="startTime" type="hidden" value="<?php if($args['startTime']): ?><?php echo $args['startTime']; endif; ?>" />
        <input type="hidden" id="hidStartTime" name="hidStartTime" value="<?php if($args['startTime']): ?><?php echo $args['startTime']; endif; ?>" />
    </form>
        <div class="middle">
            <div class="sx-wrapper">
                <div class="country-search clearfix" style="position: relative">

                    <li class="thisclass-column">
                        <form action="<?php echo url('index/searchEx'); ?>" method="post">
                        <?php if($keywords == ''): ?>
                        <input type="text" name="keywords" value="" placeholder="请输入展会名称、行业、地点等关键词进行搜索" class="ban-input-lmy" /><?php else: ?>
                        <input type="text" name="keywords" value="<?php echo $keywords; ?>" placeholder="" class="ban-input-lmy" /><?php endif; ?>
                        <button class="ban-btn-lmy" id="keysearch">搜索</button>
                        </form>
                    </li>

                    <hr/>
                    <div class="searchPoz"><b>已选条件</b>
                        <p style="display: inline-block;">&gt;</p><span id="country" style="display: inline-block;"></span>
                        <p style="display: inline-block;">&gt;</p><span id="trade" style="display: inline-block;">$cate</span>
                        <p style="display: inline-block;">&gt;</p><span id="time" style="display: none;"></span>
                        <i class="cite">清空筛选</i>&nbsp;&nbsp;
                    </div>
                    <ul id="ulRegion">
                        <li class="cTi">地点：</li>
                        <li class="cLi-Addr m-hover">
                            <span class="cSel">不限</span>
                            <span name="欧洲" class="" id="9">欧洲
                    <div class="country" style="display: none;">
                        <?php if(is_array($CountryInfo[9]) || $CountryInfo[9] instanceof \think\Collection || $CountryInfo[9] instanceof \think\Paginator): if( count($CountryInfo[9])==0 ) : echo "" ;else: foreach($CountryInfo[9] as $key=>$vo): ?>
                        <a  class="" id="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></a>
                        <?php endforeach; endif; else: echo "" ;endif; if(count($CountryInfo[9]) > 28): ?><i>+</i><?php endif; ?>
                    </div>
                </span>
                            <span name="北美洲" id="18">北美洲
                    <div class="country" style="display: none;">
                        <?php if(is_array($CountryInfo[18]) || $CountryInfo[18] instanceof \think\Collection || $CountryInfo[18] instanceof \think\Paginator): if( count($CountryInfo[18])==0 ) : echo "" ;else: foreach($CountryInfo[18] as $key=>$vo): ?>
                        <a  class="" id="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></a>
                        <?php endforeach; endif; else: echo "" ;endif; if(count($CountryInfo[18]) > 28): ?><i>+</i><?php endif; ?>
                    </div>
                    <b style="display: none;"></b>
                    <b style="display: none;"></b>
                </span>
                            <span name="南美洲" class="" id="40">南美洲
                    <div class="country" style="display: none;">
                       <?php if(is_array($CountryInfo[40]) || $CountryInfo[40] instanceof \think\Collection || $CountryInfo[40] instanceof \think\Paginator): if( count($CountryInfo[40])==0 ) : echo "" ;else: foreach($CountryInfo[40] as $key=>$vo): ?>
                        <a  class="" id="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></a>
                        <?php endforeach; endif; else: echo "" ;endif; if(count($CountryInfo[40]) > 28): ?><i>+</i><?php endif; ?>
                    </div>
                </span>
                            <span name="亚洲" class="" id="1">亚洲
                       <div class="country" style="display: none;">
                        <a  class="" id="2">中国</a>
                        <?php if(is_array($CountryInfo[1]) || $CountryInfo[1] instanceof \think\Collection || $CountryInfo[1] instanceof \think\Paginator): if( count($CountryInfo[1])==0 ) : echo "" ;else: foreach($CountryInfo[1] as $key=>$vo): ?>
                        <a  class="" id="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></a>
                        <?php endforeach; endif; else: echo "" ;endif; if(count($CountryInfo[1]) > 28): ?><i>+</i><?php endif; ?>
                    </div>
                </span>
                            <span name="非洲" class="" id="32">非洲
                    <div class="country" style="display: none;">
                        <?php if(is_array($CountryInfo[32]) || $CountryInfo[32] instanceof \think\Collection || $CountryInfo[32] instanceof \think\Paginator): if( count($CountryInfo[32])==0 ) : echo "" ;else: foreach($CountryInfo[32] as $key=>$vo): ?>
                        <a  class="" id="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></a>
                        <?php endforeach; endif; else: echo "" ;endif; if(count($CountryInfo[32]) > 28): ?><i>+</i><?php endif; ?>
                    </div>
                </span>
                            <span name="大洋洲" class="" id="51">大洋洲
                    <div class="country" style="display: none;">
                        <?php if(is_array($CountryInfo[51]) || $CountryInfo[51] instanceof \think\Collection || $CountryInfo[51] instanceof \think\Paginator): if( count($CountryInfo[51])==0 ) : echo "" ;else: foreach($CountryInfo[51] as $key=>$vo): ?>
                        <a  class="" id="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></a>
                        <?php endforeach; endif; else: echo "" ;endif; if(count($CountryInfo[51]) > 28): ?><i>+</i><?php endif; ?>
                        </div>
                    </span>
                        </li>
                    </ul>
                    <ul id="ulCategory">
                        <li class="cTi">行业：</li>
                        <li class="cLi cLi-Trade m-hover">
                            <span class="cSel">不限</span> <?php if(is_array($CategoruInfo) || $CategoruInfo instanceof \think\Collection || $CategoruInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $CategoruInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$CI): $mod = ($i % 2 );++$i;?>
                            <span name="<?php echo $CI['Pname']; ?>" code="<?php echo $CI['Pid']; ?>"><?php echo $CI['Pname']; ?>
                            <div class="sonclass">
                            <b></b>
                            <?php if(is_array($CI['Children']) || $CI['Children'] instanceof \think\Collection || $CI['Children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $CI['Children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$CC): $mod = ($i % 2 );++$i;?>
                            <a  class='' code="<?php echo $CC['id']; ?>"><?php echo $CC['name']; ?></a>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            </span> <?php endforeach; endif; else: echo "" ;endif; ?>
                            <p id="more-Trade">+</p>
                        </li>
                    </ul>
                    <ul id="ulDate">
                        <li class="cTi">时间：</li>
                        <li class="cLi cLi-Time">
                            <span class="cSel">不限</span>
                            <span code="2018-02-01"><a>2018年02月</a></span>
                            <span code="2018-03-01"><a>2018年03月</a></span>
                            <span code="2018-04-01"><a>2018年04月</a></span>
                            <span code="2018-05-01"><a>2018年05月</a></span>
                            <span code="2018-06-01"><a>2018年06月</a></span>
                            <span code="2018-07-01"><a>2018年07月</a></span>
                            <span code="2018-08-01"><a>2018年08月</a></span>
                            <span code="2018-09-01"><a>2018年09月</a></span>
                            <span code="2018-10-01"><a>2018年10月</a></span>
                            <span code="2018-11-01"><a>2018年11月</a></span>
                            <span code="2018-12-01"><a>2018年12月</a></span>
                            <span code="2019-01-01"><a>2019年01月</a></span>
                            <span code="2019-02-01"><a>2019年02月</a></span>
                            <span code="2019-03-01"><a>2019年03月</a></span>
                            <span code="2019-04-01"><a>2019年04月</a></span>
                            <span code="2019-05-01"><a>2019年05月</a></span>
                            <span code="2019-06-01"><a>2019年06月</a></span>
                            <span code="2019-07-01"><a>2019年07月</a></span>
                            <span code="2019-08-01"><a>2019年08月</a></span>
                            <span code="2019-09-01"><a>2019年09月</a></span>
                            <span code="2019-10-01"><a>2019年10月</a></span>
                            <span code="2019-11-01"><a>2019年11月</a></span>
                            <span code="2019-12-01"><a>2019年12月</a></span>
                            <span code="2020-01-01"><a>2020年01月</a></span>
                            <span code="2020-02-01"><a>2020年02月</a></span>
                            <span code="2020-03-01"><a>2020年03月</a></span>
                            <p id="more-Time">+</p>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>

    <section class="expo-Classification clearfix">
        <div class="expo-type" style="margin-bottom:15px">
            <a href="<?php echo url('index/exhibition',['type'=>'all']); ?>" id="all">全部</a>
            <a href="<?php echo url('index/exhibition',['type'=>'newest']); ?>" id="newest">最新发布</a>
            <a href="<?php echo url('index/exhibition',['type'=>'hot']); ?>" id="hot">热门展会</a>
            <a href="#">推荐展会</a>
            <a href="javascript:voit(0)" id="condition">关键字查询</a>
        </div>
        <div class="list-box clearfix">
            <ul><?php if(count($list) == 0): ?>
                <div class="search-none">
                    <p>
                        <font style="color:#ff8a00">对不起，未搜到相关展会信息！</font>
                    </p>
                    <p>
                        <font style="color:#ff8a00">详情请咨询客服</font>
                    </p>
                </div>
                <?php else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
                <li style="width:1170px" class="expo-item">
                    <div class="fl list-pic">
                        <a href="<?php echo url('detail/index',['id'=>$list['id']]); ?>"><img src="<?php echo get_file_path($list['picture']); ?>" width="229px" height="151px"></a>
                    </div>
                    <div class="fl list-text">
                        <h3><a href="<?php echo url('detail/index',['id'=>$list['id']]); ?>"><?php echo $list['name']; ?>（<?php echo $list['ename']; ?>）</a></h3>
                        <span><?php echo subtext(strip_tags($list['content']),120); ?></span>
                        <p><?php echo date("Y.m.d",$list['startime']); ?> ~ <?php echo date("Y.m.d",$list['endtime']); ?></p>
                        <p><?php echo $district[0][$list['city_id']]['country']; ?> • <?php echo $district[0][$list['city_id']]['city']; ?> • <?php echo $list['venues']; ?></p>
                        <a href="<?php echo url('detail/index',['id'=>$list['id']]); ?>" class="fr look">查看详情&gt;&gt;</a>
                    </div>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>

            </ul>
        </div>
        <nav style="text-align: center"><?php echo $page; ?></nav>
    </section>
    </div>
    </div>
    <div class="foot">
  <div class="fot-mid">
    <div class="fot-a clearfix">
      <dl>
        <dt><a href="#">关于我们</a></dt>
        <dd><a href="#">资费标准</a></dd>
        <dd><a href="#">常见问题</a></dd>
        <dd><a href="#">服务条款</a></dd>
        <dd><a href="#">友情连接</a></dd>
      </dl>
      <dl>
        <dt><a href="#">商务合作</a></dt>
        <dd><a href="#">集团合作</a></dd>
        <dd><a href="#">广告合作</a></dd>
        <dd><a href="#">全球招商</a></dd>
        <dd><a href="#">推广联盟</a></dd>
      </dl>
      <dl>
        <dt><a href="#">商家支持</a></dt>
        <dd><a href="#">商家入驻</a></dd>
        <dd><a href="#">入驻指南</a></dd>
        <dd><a href="#">交易说明</a></dd>
        <dd><a href="#">联系客服</a></dd>
      </dl>
      <dl>
        <dt><a href="#">帮助中心</a></dt>
        <dd><a href="#">常见问题</a></dd>
        <dd><a href="#">新手指南</a></dd>
        <dd><a href="#">支付说明</a></dd>
        <dd><a href="#">网站地图</a></dd>
      </dl>
      <dl>
        <dt><a href="#">网站条款</a></dt>
        <dd><a href="#">用户协议</a></dd>
        <dd><a href="#">隐私说明</a></dd>
        <dd><a href="#">版权说明</a></dd>
        <dd><a href="#">服务保障</a></dd>
      </dl>
    </div>
    <div class="fot-b">
      参会去会展活动信息平台 | 京ICP备17039834号-2
    </div>
    <ul id="side-bar" class="side-pannel side-bar">
        <a href="javascript:;" class="gotop" style="display:none;"><s class="g-icon-top"></s></a>
        <a href="#" target="_blank" class="text qq"><s class="g-icon-qq1" style="width: 20px;height: 20px;"></s><span>在线咨询</span></a>
        <a href="#" target="_blank" class="text weibo"><s class="g-icon-weibo1"></s><span>微博</span></a>
        <a href="javascript:;" class="qr"><s class="g-icon-qr1"></s><i></i></a>
        <?php if(isset($_COOKIE['worldevents_role'])): else: ?>
        <a href="<?php echo url('/user/process');; ?>" class="text survey" target="_self"><s class="g-icon-survey1"></s><span>商家入驻</span></a><?php endif; ?>
    </ul>
  </div>
</div>
<script type="text/javascript" src="/static/home/js/jquery.min.js" ></script>
<script src="/static/home/js/jquery.jslides.js" type="text/javascript" charset="UTF-8"></script>
<script src="/static/home/js/slide.js" type="text/javascript" charset="UTF-8"></script>
<script src="/static/home/js/layui/layui.js" type="text/javascript" charset="UTF-8"></script>
<script>
$(function(){
    $('.registered').on("mouseenter", function () {
        $('.uesr-box').show();
    }).on("mouseleave", function () {
        $('.uesr-box').hide();
    }).on("click",function(){
        $(location).attr('href', '/manager/index');
    });
    $(window).scroll(function(){
        if($(window).scrollTop()>100){
            $("#side-bar .gotop").fadeIn();
        }
        else{
            $("#side-bar .gotop").hide();
        }
    });
    $("#side-bar .gotop").click(function(){
        $('html,body').animate({'scrollTop':0},500);
    });
});
</script>

    <script type="text/javascript" src="/static/home/js/select-sx.js"></script>
    <script>
        $('.expo-item').hover(function(){
            $(this).addClass('liOver');
        },function(){
            $(this).removeClass('liOver');
        });
    </script>
</body>

</html>
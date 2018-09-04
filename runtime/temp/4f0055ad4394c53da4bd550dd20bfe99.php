<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:90:"D:\phpStudy\PHPTutorial\WWW\test.cc\application/../application/index/view/index\index.html";i:1532049405;s:74:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\nav.html";i:1524040551;s:77:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\footer.html";i:1524186740;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/style-news.css" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/share.css" />
    <title>参会去？- 首页</title>
    <link rel="shortcut icon" href="/static/home/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <!--[if lt IE 9]><script> src="http://html5shim.googlecode.com/svn/trunk/html5.js"</script><![endif]-->
    <style>
        .liOver{
            border-color:#ff8a00 !important;
            box-shadow: 0.5px 0.5px 0.5px 0.3px #ff8a00;
        }
    </style>
</head>

<body style="background:  #ffffff;">
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

<div class="top">
    <section class="banner clearfix">
        <div class="search">
            <div class="wrap">
                <div class="tab">
                    <ul class="tab-hd">
                        <li class="active">展会</li>
                        <li>会议</li>
                    </ul>
                    <ul class="tab-bd">
                        <li class="thisclass">
                            <form action="<?php echo url('index/searchEx'); ?>" method="post">
                                <input type="text" value="" placeholder="请输入展会名称、行业、地点等关键词进行搜索" class="ban-input" name="keywords"/>
                                <button class="ban-btn"><img src="/static/home/img/btn-search.png"></button>
                            </form>
                        </li>
                        <li>
                            <!-- <form action="<?php echo url('index/searchMe'); ?>"> -->
                            <input type="text" value="" placeholder="请输入会议名称、行业、地点等关键词进行搜索" class="ban-input" name="keywords"/>
                            <button class="ban-btn"><img src="/static/home/img/btn-search.png"></button>
                            <!-- </form> -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="middle">
    <section class="expo-box">
        <div class="expo-tit clearfix">
            <div class="tit-text fl">
                <span>国际展会</span>
                <a href="<?php echo url('index/exhibition',['type'=>'newest']); ?>">最新展会</a>
                <a href="<?php echo url('index/exhibition',['type'=>'hot']); ?>">热门展会</a>
                <a href="#">推荐展会</a>
            </div>
            <a href="<?php echo url('index/exhibition'); ?>" class="fr more">更多 &gt;&gt;</a>
        </div>
        <div class="expo-list">
            <ul>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li class="expo-item">
                    <div class="expo-pic">
                        <a href="<?php echo url('Detail/index',['id' => $vo['id']]); ?>"><img src="<?php echo get_file_path($vo['picture']); ?>" width="289px" height="176px"></a>
                        <?php if($min_price[$vo['id']] == 0): else: ?><p class="price-money"> ¥ <span> <?php echo $min_price[$vo['id']]; ?> </span> 起</p><?php endif; ?>
                    </div>
                    <div class="expo-text">
                        <a href="<?php echo url('Detail/index',['id' => $vo['id']]); ?>" style="display:block; height:40px">
                            <p><span><?php echo $vo['name']; ?><font style="color: #FF6D52">(<?php echo subtext($vo['ename'],8); ?>)</font></span></p>
                        </a>
                        <p><?php echo date("Y.m.d",$vo['startime']); ?>~<?php echo date("Y.m.d",$vo['endtime']); ?></p>
                        <p><?php echo $vo['districtname']; ?></p>
                    </div>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </section>
    <!-- <section class="expo-box" style="margin-top: 20px;">
     <div class="expo-tit clearfix">
         <div class="tit-text fl">
             <span>商务会议</span>
             <a href="#">最新会议</a>
             <a href="#">热门会议</a>
             <a href="#">推荐会议</a>
         </div>
         <a href="#" class="fr more">更多 &gt;&gt;</a>
     </div>
     <div class="expo-list">
         <ul>
             <li>
                 <div class="expo-pic">
                     <a href="#"><img src="images/expo-a.png" width="100%"></a>
                 </div>
                 <div class="expo-text">
                     <a href="#">
                         <span>加拿大多伦多国际建材展</span>
                     </a>
                     <p>时间：2018-11-28 ~ 2018-11-30</p>
                     <p>地点：多伦多Metro会议中心</p>
                 </div>
             </li>
         </ul>
     </div>
 </section> -->
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

<script>
    $(function() {
        function tabs(tabTit, on, tabCon) {
            $(tabTit).children().hover(function() {
                $(this).addClass(on).siblings().removeClass(on);
                var index = $(tabTit).children().index(this);
                $(tabCon).children().eq(index).show().siblings().hide();
            });
        };
        tabs(".tab-hd", "active", ".tab-bd");
        $('.expo-item').hover(function(){
            $(this).addClass('liOver');
        },function(){
            $(this).removeClass('liOver');
        });
    });
</script>
</body>

</html>
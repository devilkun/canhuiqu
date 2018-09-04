<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:91:"D:\phpStudy\PHPTutorial\WWW\test.cc\application/../application/index/view/user\process.html";i:1521700763;s:74:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\nav.html";i:1524040551;s:77:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\footer.html";i:1524186740;}*/ ?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="/static/home/css/style-news.css"/>
  <link rel="stylesheet" type="text/css" href="/static/home/css/share.css"/>
	<link rel="stylesheet" type="text/css" href="/static/home/css/style.css"/>
  <link rel="stylesheet" type="text/css" href="/static/home/css/style2.css"/>
  <link rel="stylesheet" type="text/css" href="/static/home/js/layui/css/layui.css"/>
  <link rel="stylesheet" type="text/css" href="/static/home/css/bootstrap.css"/>
  <title>参会去？- 商家注册</title>
  <link rel="shortcut icon" href="/static/home/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="renderer" content="webkit">
<!--[if lt IE 9]><script> src="http://html5shim.googlecode.com/svn/trunk/html5.js"</script><![endif]-->
</head>
<body style="background: #f7f8fb;">
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

<!--banner-->
<div class="bd-container clearfix" id="bd-search"></div>

    <!--流程-->
    <div class="process">
    	<p class="lc-wz">提供全球展会综合服务预定的互联网平台，为客户提供全球展会检索、展位预订，展台搭建，展品运输，行程服务，补贴管理等<br />
覆盖展会全产业链的专业服务。</p>
    	<h2 class="lc-tit">入驻流程</h2>
    	<div class="bar">
			<ul class="nav nav-pills nav-justified step step-round" data-step="6">
				<li>
					<a>选择商家类型</a>
				</li>
				<li>
					<a>注册账户</a>
				</li>
				<li>
					<a>完善资料</a>
				</li>
				<li>
					<a>提交审核</a>
				</li>
				<li>
					<a>审核通过</a>
				</li>
				<li>
					<a>发布展会及服务</a>
				</li>
			</ul>
		</div>
<!--进度条-->
<script type="text/javascript" src="/static/home/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/static/home/js/lib.js"></script>
<script>
	$(function() {
		bsStep();
		//bsStep(i) i 为number 可定位到第几步 如bsStep(2)/bsStep(3)
	})
</script>
		<div class="in-box clearfix">
			<ul>
				<li>
					<div class="in-a in-icon"></div>
					<p>主办方</p>
					<a href="<?php echo url('User/reg',['type'=>'organizer']); ?>">立即入驻</a>
				</li>
				<li>
					<div class="in-b in-icon"></div>
					<p>组织机构</p>
					<a href="<?php echo url('User/reg',['type'=>'organization']); ?>">立即入驻</a>
				</li>
				<li>
					<div class="in-c in-icon"></div>
					<p>搭建商</p>
					<!--<a href="<?php echo url('User/reg',['type'=>'contractor']); ?>">立即入驻</a>-->
					<a href="#">建设中...</a>
				</li>
				<li>
					<div class="in-d in-icon"></div>
					<p>运输商</p>
					<!--<a href="<?php echo url('User/reg',['type'=>'transporters']); ?>">立即入驻</a>-->
					<a href="#">建设中...</a>
				</li>
				<li>
					<div class="in-e in-icon"></div>
					<p>酒店运营商</p>
					<!--<a href="<?php echo url('User/reg',['type'=>'hoperator']); ?>">立即入驻</a>-->
					<a href="#">建设中...</a>
				</li>
				<li>
					<div class="in-f in-icon"></div>
					<p>机票运营商</p>
					<!--<a href="<?php echo url('User/reg',['type'=>'toperator']); ?>">立即入驻</a>-->
					<a href="#">建设中...</a>
				</li>
			</ul>
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


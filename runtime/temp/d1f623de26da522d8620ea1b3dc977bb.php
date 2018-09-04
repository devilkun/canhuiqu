<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:87:"D:\phpStudy\PHPTutorial\WWW\test.cc\application/../application/index/view/user\reg.html";i:1522641594;s:74:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\nav.html";i:1524040551;s:77:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\footer.html";i:1524186740;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="/static/home/css/style-news.css"/>
  <link rel="stylesheet" type="text/css" href="/static/home/css/share.css"/>
	<link rel="stylesheet" type="text/css" href="/static/home/css/style.css"/>
  <link rel="stylesheet" type="text/css" href="/static/home/css/style2.css"/>
  <link rel="stylesheet" type="text/css" href="/static/home/js/layui/css/layui.css"/>
  <title>参会去？- 注册</title>
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

	<!--注册-->
	<div class="bd-login">
		<h1 class="login-tit">
			注册
		</h1>
		<div class="login-box clearfix">
			<div class="login-item">
					<input type="hidden" name="role" value="<?php echo $rid; ?>" id="rid"/>
					<input type="hidden" name="nickname" value="<?php echo $nickname; ?>" id="nickname"/>
					<div class="login-input" id="reg-phone">
						<input type="text" value="" name="mobile" placeholder="填写手机号码" id="phone" class="reg"/>
					</div>
					<div class="login-input item-messCode clearfix" id="reg-code">
						<input type="text" value="" name="code" placeholder="填写验证码" class="reg-cod" id="code"/>
						<a href="javascript:void(0);" class="reg-sendCode" onclick="sends.send();" id="sendCode">发送验证码</a>
					</div>
					<div class="login-input" id="reg-pwd">
						<input type="password" value="" name="password" id="pwd"
							   placeholder="设置密码"/>
					</div>
				    <div class="login-input" id="embed-captcha"></div>
					<div class="item-box">
						<label class="remeber">
                            <input type="checkbox" checked="checked" />
                            <span>注册成功后，代表您同意我们的<a href="#">服务条款</a></span>
                        </label>
						<a href="#" class="login-forget">忘记密码？</a>
					</div>
					<button class="login-btn" id="regist-submit">提交</button>
			</div>
			<div class="login-other">
				<p>或使用以下账号登录：</p>
				<a href="#" class="a-weixin">微信登录</a>
				<a href="#" class="a-weibo">微博登录</a>
				<a href="<?php echo url('Base/qqlogin'); ?>" class="a-qq">QQ登录</a>
			</div>
		</div>
	</div>
<div class="bd-box" style="height:55px"></div>
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

<script src="/static/home/js/login.js" type="text/javascript" charset="UTF-8"></script>
<!-- 引入封装了failback的接口--initGeetest -->
<script src="http://static.geetest.com/static/tools/gt.js"></script>
<script>
    $(function(){
        function doOk(){
            $("#regist-submit").attr("disabled", false);
            $("#regist-submit").attr("style", 'background:#fe693e');
        }
        var handlerEmbed = function (captchaObj) {
            captchaObj.appendTo("#embed-captcha");
            captchaObj.onSuccess(doOk);
            captchaObj.onReady(function () {
                $("#regist-submit").attr("disabled", true);
                $("#regist-submit").attr("style", 'background:#A79995');
            });
        };
        $.ajax({
            url: "<?php echo geetest_url(); ?>?t=" + (new Date()).getTime(),
            type: "get",
            dataType: "json",
            success: function (data) {
                initGeetest({
                    gt: data.gt,
                    challenge: data.challenge,
                    product: "float",
                    offline: !data.success,
                    width:'100%'
                }, handlerEmbed);

            }
        });
    });

</script>
</body>

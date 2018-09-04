<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:86:"D:\phpStudy\PHPTutorial\WWW\test.cc\application/../application/index/view/pt\book.html";i:1523326758;s:74:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\nav.html";i:1524040551;s:77:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\footer.html";i:1524186740;}*/ ?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/style-news.css" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/share.css" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/reveal.css" />
    <title><?php echo $list['name']; ?></title>
    <link rel="shortcut icon" href="/static/home/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <!--[if lt IE 9]><script> src="http://html5shim.googlecode.com/svn/trunk/html5.js"</script><![endif]-->
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

<style>
    .not-support {
        font-size: 24px;
        min-height: 300px;
        text-align: center;
        line-height: 300px;
    }

    .not-support span {
        color: #fd715a;
    }
</style>
<div class="top">
    <section class="banner-ny clearfix"></section>
</div>
<section class="details-titBox">
    <div class="details-mid">
        <div class="details-left fl">
            <a href="<?php echo url('Detail/index',['id' => $list['id']]); ?>">展会详情</a>
            <a href="<?php echo url('Booth/book',['id' => $list['id']]); ?>" >展位预定</a>
            <a href="<?php echo url('Pt/book',['id' => $list['id']]); ?>" class="left-actvie">随团行程</a>
            <a href="<?php echo url('CustomizeStroke/book',['id' => $list['id']]); ?>">定制行程</a>
            <a href="<?php echo url('BoothConstruction/book',['id' => $list['id']]); ?>">展台搭建</a>
            <a href="<?php echo url('ExhibitsTransportation/book',['id' => $list['id']]); ?>">展品运输</a>
            <a href="#">展会票务</a>
        </div>
        <!-- <p class="fr tel">
                热线电话：010-12345678
            </p> -->
    </div>
</section>
<section class="content clearfix">
    <!--流程-->
    <div class="bar">
        <div class="text-yd">
            <font style="color:#f7f8fb">预订流程</font>
        </div>
        <ul class="nav nav-pills nav-justified step step-round" data-step="6">
            <li>
                <a>选择供应商</a>
            </li>
            <li>
                <a>选择展位类型和面积</a>
            </li>
            <li>
                <a>填写参展企业信息</a>
            </li>
            <li>
                <a>选择支付</a>
            </li>
            <li>
                <a>供应商确认</a>
            </li>
            <li>
                <a>预定完成</a>
            </li>
        </ul>
    </div>
    
    
    <div class="con-left fl">
        <div class="zh-box">
            <h2><?php echo $list['name']; ?>(<?php echo $list['ename']; ?>)</h2>
            <p>时间：<?php echo date("Y.m.d",$list['startime']); ?> - <?php echo date("Y.m.d",$list['endtime']); ?></p>
            <p>地点：<?php echo $district[0][$list['city_id']]['country']; ?> • <?php echo $district[0][$list['city_id']]['city']; ?> • <?php echo $list['venues']; ?></p>
        </div>
        <div class="zh-company clearfix">
            <div class="Set-out">
                选择你出发的城市：
                <a href="#" class="city-choose">不限</a>
                <a href="#">北京</a>
                <a href="#">上海</a>
                <a href="#">广州</a>
                <a href="#">香港</a>
                <a href="#">其他</a>
            </div>
            <?php if(isset($_COOKIE['worldevents_role']) && $_COOKIE['worldevents_role'] != 10): ?>
            <div class="con-box introduce" style="border:1px solid #ff8a00;margin-top:10px;">
                <div class="not-support">
                    <span style="color: #ff8a00">商家账户暂不支持随团行程预定服务</span>
                </div>
            </div>
            <?php else: if(count($pt) == 0): ?>
                <div class="con-box introduce" style="border:1px solid #ff8a00;margin-top:10px;">
                    <div class="not-support">
                        <span style="color: #ff8a00">该展会暂无供应商提供随团行程预定服务</span>
                    </div>
                </div>
            <?php endif; if(is_array($pt) || $pt instanceof \think\Collection || $pt instanceof \think\Paginator): $i = 0; $__LIST__ = $pt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($i % 2 );++$i;?>
            <div class="set-box clearfix">
                <div class="set-pic fl">
                    <img src="<?php echo get_file_path($list['picture']); ?>" width="180px" height="120px">
                </div>
                <div class="set-message fl">
                    <p>预计出发城市：<?php echo $pt['setoff_city']; ?></p>
                    <p>目的城市：<?php echo $pt['destination_city']; ?></p>
                    <p>时间安排：<?php echo $pt['day_count']; ?>天<?php echo $pt['night_count']; ?>晚</p>
                    <p>出发时间：<?php echo date('Y.m.d',$pt['setoff_date']); ?></p>
                    <p>服务包含：<?php echo $pt['service']; ?></p>
                    <div class="pt-price">
                        ￥<span><?php if($pt['discount_rate'] == 0): ?><?php echo number_format($pt['adult_price']); else: ?><?php echo number_format($pt['adult_price']*$pt['discount_rate']/100); endif; ?></span><br>
                        <i>原价：￥<?php echo number_format($pt['adult_price']); ?></i>
                    </div>
                </div>
                <div class="set-supplier fl">
                    <p><b>服务提供商：</b></p>
                    <p><?php echo $pt['company']; ?></p>
                    <p><b>咨询电话：</b></p>
                    <p><?php echo $pt['telephone']; ?></p>
                    <div class="set-link">
                        <a href="tencent://message/?uin=<?php echo $pt['qq']; ?>">在线联系</a>
                        <a href="<?php echo url('Pt/stroke',['id' => $list['id'],'user_id'=>$pt['user_id']]); ?>">立即预定</a>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>

    </div>
    
    <div class="con-right fr" style="margin-top:15px">
        <div class="right-tit">
            <p>相关展会</p>
        </div>
        <?php if(is_array($similar) || $similar instanceof \think\Collection || $similar instanceof \think\Paginator): $i = 0; $__LIST__ = $similar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($i % 2 );++$i;?>
        <div class="right-con">
            <div class="right-box">
                <a href="<?php echo url('detail/index',['id' => $vs['id']]); ?>"><img src="<?php echo get_file_path($vs['picture']); ?>" width="100%"></a>
            </div>
            <div class="right-text">
                <a href="<?php echo url('detail/index',['id' => $vs['id']]); ?>"><?php echo $vs['name']; ?></a>
                <p><?php echo date("Y.m.d",$vs['startime']); ?> ~ <?php echo date("Y.m.d",$vs['endtime']); ?></p>
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</section>
<!--弹出窗口js-->
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

<script type="text/javascript" src="/static/home/js/jquery.reveal.js"></script>
<!--进度条-->
<script type="text/javascript" src="/static/home/js/progressBar.js"></script>
<!--进度条-->
<script type="text/javascript" src="/static/home/js/lib.js"></script>
<script type="text/javascript" src="/static/home/js/fol_nav.js"></script>

<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:88:"D:\phpStudy\PHPTutorial\WWW\test.cc\application/../application/index/view/pt\stroke.html";i:1522027474;s:74:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\nav.html";i:1524040551;s:77:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\footer.html";i:1524186740;}*/ ?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/style-news.css" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/share.css" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/base.css" />
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
    <div class="details-mid" >
        <div class="details-left fl">
            <a href="<?php echo url('Detail/index',['id' => $list['id']]); ?>">展会详情</a>
            <a href="<?php echo url('Booth/book',['id' => $list['id']]); ?>" >展位预定</a>
            <a href="<?php echo url('Pt/book',['id' => $list['id']]); ?>" class="left-actvie">拼团行程</a>
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
    <div class="bar" >
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
            <div class="company-title">
                <div class="tit-01 tit-choose"><a href="#xc">行程介绍</a></div>
                <div class="tit-01"><a href="#fy">费用说明</a></div>
                <div class="tit-01"><a href="#xz">预定须知</a></div>
            </div>
            <div class="trip-box" id="xc">
                <div class="trip-tit">
                    <span>参考行程</span>
                </div>
                <div id="timeline-wrapper">
                    <div id="timeline">
                        <?php if(is_array($stroke) || $stroke instanceof \think\Collection || $stroke instanceof \think\Paginator): $i = 0; $__LIST__ = $stroke;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$stroke): $mod = ($i % 2 );++$i;?>
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <?php echo $stroke['schedule_type']; ?>
                            </div>
                            <div class="timeline-content">
                                <h4><?php echo $stroke['setoff_city']; ?>-<?php echo $stroke['destination_city']; ?>（<?php echo date('Y年m月d日',$stroke['travel_date']); ?>）</h4>
                                <p class="trip-text"><?php echo $stroke['travel_schedule_desc']; ?></p>
                                <span class="btn">用餐：<?php echo $stroke['meal']; ?></span>
                                <span class="btn">住宿：<?php echo $stroke['stay']; ?></span>
                            </div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>

            </div>
            <div class="cost" id="fy">
                <div class="trip-tit">
                    <span>费用说明</span>
                </div>
                <div class="cost-text">
                    <!--<p class="clearfix">-->
                    <!--<b class="fl">机票：</b>-->
                    <!--<span class="fl">-->
                    <!--出发口岸城市&#45;&#45;胡志明往返含税机票  (单程转机次数≤1次)<br />-->
                    <!--*口岸城市为：广州。详见出团通知-->
                    <!--</span>-->
                    <!--</p>-->
                    <!--<p class="clearfix">-->
                    <!--<b class="fl">酒店：</b>-->
                    <!--<span class="fl">-->
                    <!--星级酒店(或同级别精品酒店)<br />-->
                    <!--*考虑到行程安排、酒店房型库存等原因，实际预定时可能会选用其他同级别精品酒店，双人标准间。夫妻可提供大床房。-->
                    <!--</span>-->
                    <!--</p>-->
                    <!--<p class="clearfix">-->
                    <!--<b class="fl">交通：</b>-->
                    <!--<span class="fl">-->
                    <!--全程豪华大巴，专业司机-->
                    <!--</span>-->
                    <!--</p>-->
                    <!--<p class="clearfix">-->
                    <!--<b class="fl">餐饮：</b>-->
                    <!--<span class="fl">-->
                    <!--丰富的当地特色餐、八菜一汤的商务团餐标-->
                    <!--</span>-->
                    <!--</p>-->
                    <!--<p class="clearfix">-->
                    <!--<b class="fl">签证：</b>-->
                    <!--<span class="fl">-->
                    <!--签证服务费，美国签证-全国领区(商务签证，代办，含邀请函）-->
                    <!--</span>-->
                    <!--</p>-->
                    <!--<p class="clearfix">-->
                    <!--<b class="fl">保险：</b>-->
                    <!--<span class="fl">-->
                    <!--公共交通意外险，境外旅游保险-->
                    <!--</span>-->
                    <!--</p>-->
                    <!--<p class="clearfix">-->
                    <!--<b class="fl">其他：</b>-->
                    <!--<span class="fl">-->
                    <!--接送机，导游费用。-->
                    <!--</span>-->
                    <!--</p>-->
                    <!--<p class="red-sm">说明：当地参团不包含机票及签证费用。</p>-->
                </div>
            </div>
            <div class="yd-sm" id="xz">
                <div class="trip-tit">
                    <span>预定说明</span>
                </div>
                <div class="ydsm-text">
                    <!--<p class="red-sm"><b>报名截止日期</b></p>-->
                    <!--<p>2018年4月01日前可直接在网站预定<br />-->
                    <!--2018年4月01日之后，请联系我公司客服确定。如签证、机票、酒店满足要求、可签约预定。</p>-->
                    <!--<p class="red-sm">备注：当地参团不受上述时间限制。</p>-->
                    <!--<p class="red-sm"><b>预定须知</b></p>-->
                    <!--<p>1、为了确保您能够按时出行，产品确认后请在48小时内付款，同时请按要求尽快提供参展所需的材料并签订参展合同。 </p>-->
                    <!--<p>2、团队报价按2人入住1间房核算，如出现单男单女，则尽量安排与其他同性别团友拼房或加床；若客人无需安排或无法安排， 请补齐单房差以享用单人房间。 </p>-->
                    <!--<p>3、团队机票一经开出，不得更改，不得签转，不得退票；另飞行时间、车程时间以当日实际所时间为准。 </p>-->
                </div>
            </div>
        </div>
    </div>
    <div class="con-right fr pre-book" style="margin-top: 15px !important;">
        <div class="setout-yd" >
            <h4><?php echo $list['name']; ?></h4>
            <h4>(<?php echo $list['ename']; ?>)</h4>
            <p><span>价格：￥<b><?php if($pt['discount_rate'] == 0): ?><?php echo number_format($pt['adult_price']); else: ?><?php echo number_format($pt['adult_price']*$pt['discount_rate']/100); endif; ?></b></span><span>单间差：￥<b><?php echo $pt['room_difference']; ?></b></span></p>
            <p>预计出发城市：<?php echo $pt['setoff_city']; ?></p>                                                                                                                                                                              <p>目 的 地：<?php echo $pt['destination_city']; ?></p>
            <p>时间安排：<?php echo $pt['day_count']; ?>天<?php echo $pt['night_count']; ?>晚</p>
            <p>出发日期：<?php echo date('Y.m.d',$pt['setoff_date']); ?></p>
            <p>
            <ul class="ct-number clearfix">
                <li>参团人数：</li>
                <li class="number-box">
                    <div class="ct-zj">-</div>
                    <div><input type="text" value="1" /></div>
                    <div class="ct-zj">+</div>
                </li>
            </ul>
            </p>
            <p>
                <input type="radio" value="" />需要单间
            </p>
            <p class="money"><b>￥<?php if($pt['discount_rate'] == 0): ?><?php echo number_format($pt['adult_price']); else: ?><?php echo number_format($pt['adult_price']*$pt['discount_rate']/100); endif; ?></b></p>
            <p><a href="#">立即预定</a></p>
        </div>

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
<script src="/static/home/js/ZeroClipboard.js"></script>
<script type="text/javascript" src="/static/home/js/fol_nav.js"></script>
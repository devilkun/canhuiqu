<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:100:"D:\phpStudy\PHPTutorial\WWW\test.cc\application/../application/index/view/customize_stroke\book.html";i:1523326008;s:74:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\nav.html";i:1524040551;s:77:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\footer.html";i:1524186740;}*/ ?>
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
            <a href="<?php echo url('Pt/book',['id' => $list['id']]); ?>" >随团行程</a>
            <a href="<?php echo url('CustomizeStroke/book',['id' => $list['id']]); ?>" class="left-actvie">定制行程</a>
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
            <div class="company-title">
                <div class="tit-01 tit-choose">
                    <a href="#xc">定制行程</a>
                </div>
                <div class="tit-02">如果您需要定制行程，请填写如下信息，我们的客户专员将在24小时内联系您</div>
            </div>
            <div class="custom-table">
                <?php if(isset($_COOKIE['worldevents_role']) && $_COOKIE['worldevents_role'] != 10): ?>
                <div class="con-box introduce" style="border:1px solid #ff8a00;margin-top:10px;">
                    <div class="not-support">
                        <span style="color: #ff8a00">商家账户暂不支持定制行程服务</span>
                    </div>
                </div>
                <?php else: ?>
                <form>
                    <ul>
                        <li>
                            <div class="form-tit fl">
                                <span>*</span> 行程日期：
                            </div>
                            <div class="form-box fl">
                                <input class="form-control" placeholder="出发日期" type="text" style="width: 145px;"> -
                                <input class="form-control" placeholder="回程日期" type="text" style="width: 145px;">
                            </div>
                        </li>
                        <li>
                            <div class="form-tit fl">
                                <span>*</span> 可调整天数：
                            </div>
                            <div class="form-box fl">
                                <select class="form-control" style="width: 305px;">
                                    <option value="0">0 天</option>
                                    <option value="1">1 天</option>
                                    <option value="2" selected="selected">2 天</option>
                                    <option value="3">3 天</option>
                                    <option value="4">4 天</option>
                                    <option value="5">5 天</option>
                                    <option value="6">6 天</option>
                                    <option value="7">7 天</option>
                                    <option value="10">7天以上</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="form-tit fl">
                                <span>*</span> 停留城市：
                            </div>
                            <div class="form-box fl">
                                <select class="form-control" style="width: 110px;">
                                    <option value="" class="" selected="selected">请选择大洲</option>
                                    <option label="欧洲" value="">欧洲</option>
                                    <option label="北美洲" value="string:NA">北美洲</option>
                                    <option label="南美洲" value="string:SA">南美洲</option>
                                    <option label="亚洲" value="string:AS" selected="selected">亚洲</option>
                                    <option label="非洲" value="string:AF">非洲</option>
                                    <option label="大洋洲" value="string:OA">大洋洲</option>
                                </select>
                                <select class="form-control" style="width: 145px;">
                                    <option value="" class="" selected="selected">请选择国家</option>
                                    <option label="德国" value="string:DE">德国</option>
                                    <option label="法国" value="string:FR">法国</option>
                                    <option label="意大利" value="string:IT">意大利</option>
                                    <option label="俄罗斯" value="string:RU">俄罗斯</option>
                                    <option label="英国" value="string:UK">英国</option>
                                </select>
                                <select class="form-control" style="width: 145px;">
                                    <option value="" class="" selected="selected">请选择城市</option>
                                    <option label="雅典" value="string:雅典">雅典</option>
                                    <option label="塞萨洛尼基" value="string:塞萨洛尼基">塞萨洛尼基</option>
                                    <option label="其他城市" value="string:其他城市">其他城市</option>
                                </select>
                                <button class="add-qk">增加城市</button>
                            </div>
                        </li>
                        <li>
                            <div class="form-tit fl">
                                <span>*</span> 已选城市：
                            </div>
                            <div class="form-box">
                                <textarea class="form-control yc-city fl"></textarea>
                                <button class="add-qk fl" style="margin: 12px 0 0 5px;">清空</button>
                            </div>
                        </li>
                        <li>
                            <div class="form-tit fl">
                                <span>*</span> 出行人数-成人：
                            </div>
                            <div class="form-box fl" style="width: 120px;">
                                <select class="form-control" style="width: 120px;">
                                    <option value="1">1 人</option>
                                    <option value="2">2 人</option>
                                    <option value="3">3 人</option>
                                    <option value="4">4 人</option>
                                    <option value="5">5 人</option>
                                    <option value="6">6 人</option>
                                    <option value="7">7 人</option>
                                    <option value="10">7 人以上</option>
                                </select>
                            </div>
                            <div class="form-tit fl" style="margin-left: -50px;">
                                <span>*</span> 儿童：
                            </div>
                            <div class="form-box fl" style="width: 120px;">
                                <select name="" class="form-control" style="width: 120px;">
                                    <option value="0" selected="selected">无</option>
                                    <option value="1">1 人</option>
                                    <option value="2">2 人</option>
                                    <option value="3">3 人</option>
                                    <option value="4">4 人</option>
                                    <option value="5">5 人</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="form-tit fl">
                                <span>*</span> 航班要求：
                            </div>
                            <div class="form-box fl">
                                <input value="1" type="radio" > 直飞</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input value="2" type="radio"> 可转机</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-tit fl">
                                <span>*</span> 接送机：
                            </div>
                            <div class="form-box fl">
                                <input name="" value="1" type="radio"> 需要&nbsp;&nbsp;&nbsp;&nbsp;
                                <input name="" value="2" type="radio"> 不要
                            </div>
                        </li>
                        <li>
                            <div class="form-tit fl">
                                <span>*</span> 其他要求：
                            </div>
                            <div class="form-box fl">
                                <textarea class="form-control other-yq"></textarea>
                            </div>
                        </li>
                        <li>
                            <div class="form-tit fl">
                                <span>*</span> 您的姓名：
                            </div>
                            <div class="form-box">
                                <input class="form-control" type="text" style="width: 200px;">
                            </div>
                        </li>
                        <li>
                            <div class="form-tit fl">
                                <span>*</span> 您的手机号码：
                            </div>
                            <div class="form-box">
                                <input class="form-control" type="text" style="width: 200px;">
                            </div>
                        </li>
                        <li>
                            <div class="form-tit fl">
                                <span>*</span> 验证码：
                            </div>
                            <div class="form-box">
                                <input class="form-control" type="text" style="width: 120px;">
                                <button class="add-qk">获取验证码</button>
                            </div>
                        </li>
                        <li>
                            <button class="custom-tj">提交</button>
                        </li>
                    </ul>
                </form>
                <?php endif; ?>
            </div>
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
<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:91:"D:\phpStudy\PHPTutorial\WWW\test.cc\application/../application/index/view/detail\index.html";i:1523581202;s:74:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\nav.html";i:1524040551;s:77:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\footer.html";i:1524186740;}*/ ?>
<!DOCTYPE>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/style-news.css" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/share.css" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/share.css" />
    <link type="text/css" rel="stylesheet" href="/static/home/js/manager/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/static/home/css/sweetalert2.min.css" />
    <title><?php echo $list['name']; ?></title>
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

<div class="top">
    <section class="banner-ny clearfix"></section>
</div>
    <section class="details-titBox">
        <div class="details-mid">
            <div class="details-left fl">
                <a href="#" class="left-actvie">展会详情</a>
                <a href="<?php echo url('Booth/book',['id' => $list['id']]); ?>">展位预定</a>
                <a href="<?php echo url('Pt/book',['id' => $list['id']]); ?>">拼团行程</a>
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
        <div class="con-left  fl">
            <div class="reservation con-lb clearfix">
                <input type="hidden" value="<?php echo $list['lat']; ?>" id="lat">
                <input type="hidden" value="<?php echo $list['lng']; ?>" id="lng">
                <div class="fl yd-pic"><img src="<?php echo get_file_path($list['picture']); ?>" width="326px" height="204px"></div>
                <div class="fr yd-text">
                    <h2><?php echo $list['name']; ?></h2>
                    <p class="yd-time"><?php echo date("Y.m.d",$list['startime']); ?> ~ <?php echo date("Y.m.d",$list['endtime']); ?></p>
                    <p class="yd-adress"><?php echo $list['venues']; ?></p>
                    <a href="<?php echo url('Booth/book',['id' => $list['id']]); ?>">预订</a>
                    <?php if($is_collect == 1): ?>
                    <a href="javascript:void(0);" ex-id="<?php echo $list['id']; ?>" disabled>已添加收藏</a> <?php else: ?>
                    <a href="javascript:void(0);" id="collection" ex-id="<?php echo $list['id']; ?>" onclick="is_collection(<?php echo $list['id']; ?>,$(this).attr('id'));">加入收藏</a> <?php endif; ?>
                </div>
            </div>
            <div class="con-lb zh-details">
                <p class="xq-text">展会详情</p>
                <div class="expo-Introduction">
                    <p class="Introduction-tit expo-jj">展会简介</p>
                    <div class="Introduction-con">
                        <?php echo $list['content']; ?>
                    </div>
                </div>
                <div class="expo-Introduction">
                    <p class="Introduction-tit expo-fw">展会范围</p>
                    <div class="scope-con">
                        <?php echo $list['range']; ?>
                    </div>
                </div>
                <div class="expo-Introduction">
                    <p class="Introduction-tit expo-adress">展馆位置</p>
                    <div id="googleMap" class="con-box map" style="width:913px;height:255px;"></div>
                </div>
                <div class="share-platform clearfix">
                    <div class="share-platform-l">分享：</div>
                    <div class="share-platform-r">
                        <div class="bdsharebuttonbox">
                            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                            <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
                            <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                        </div>
                        <!-- <div class="share-platform-text">
                                您可以直接复制短链，分享给朋友，也可直接点击社交平台图标，指定分享。
                            </div> -->
                    </div>
                </div>
                <p class="bqsm">内容为网络摘抄，仅供参考，如有侵权告知即删除</p>
            </div>
        </div>
        <div class="con-right fr">
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
        <div class="con-right fr">
            <div class="right-tit">
                <p>主办方</p>
            </div>
            <div class="right-con"><?php echo $list['organizer']; ?></div>
        </div>
    </section>
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

<script src="/static/home/js/ZeroClipboard.js"></script>
<script type="text/javascript" src="/static/home/js/sweetalert2.min.js"></script>
<script>
    $(function() {
        //跟随导航
        var nav = $(".details-titBox"); //得到导航对象
        var win = $(window); //得到窗口对象
        var sc = $(document); //得到document文档对象。
        win.scroll(function() {
            if (sc.scrollTop() >= 360) {
                nav.addClass("fixednav");
            } else {
                nav.removeClass("fixednav");
            }
        });
    });
    function is_collection(ex_id,status){
          var id = ex_id;
          var action = '加入收藏';
          if(status=="already-collection"){
               return false;
          }else{
              swal({
                  title: '<i>加入收藏吗?</i>',
                  type: 'info',
                  html: '加入收藏后,可以在用户后台'+'<span style="color: #CF7EA9"><i>我的收藏</i></span>'+'中找到它哦..',
                  showCloseButton: true,
                  showCancelButton: true,
                  confirmButtonText:
                      '<i class="fa fa-thumbs-up"></i> 加进去吧!',
                  cancelButtonText:
                      '再看看喽..'
              }).then(function(isConfirm){
                      if(isConfirm===true) {
                          $.post('/detail/collection', {
                              id: id, action: action
                          }, function (data) {
                              if (data.status == "login-none") {
                                  $(location).attr('href', '/user/login');
                              }
                              if (data.status == "add-success") {
                                  swal(
                                      '收藏成功!',
                                      '您已成功加入收藏!',
                                      'success'
                                  );
                                  $('#collection').text('已添加收藏');
                                  $('#collection').attr('id', 'already-collection');
                              }
                          }, 'json');
                      }
              });
          }
    }
    //分享url
    var g_url = window.location.href;
    $('.share-copy-c input').val(g_url);
    var clip = new ZeroClipboard(document.getElementById("btnCopy"));

    //分享配置信息
    window._bd_share_config = {
        "common": {
            "bdSnsKey": {},
            "bdText": "分享到新浪微博",
            "bdMini": "1",
            "bdMiniList": ["bdxc", "tqf", "douban", "bdhome", "sqq", "thx", "ibaidu", "meilishuo", "mogujie", "diandian", "huaban", "duitang", "hx", "fx", "youdao", "sdo", "qingbiji", "people", "xinhua", "mail", "isohu", "yaolan", "wealink", "ty", "iguba", "fbook", "twi", "linkedin", "h163", "evernotecn", "copy", "print"],
            "bdPic": "",
            "bdStyle": "1",
            "bdSize": "32"
        },
        "share": {}
    };
    with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
</script>
<script src="http://ditu.google.cn/maps/api/js?key=AIzaSyA5uMFeNxZ45Xqzvm_jawEOU2l0PFJVlSQ&sensor=false"></script>
<script>
    function initialize() {
        var lat = parseFloat(document.getElementById('lat').value);
        var lng = parseFloat(document.getElementById('lng').value);
        var mapProp = {

            center: new google.maps.LatLng(lat, lng),
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
</body>
</html>
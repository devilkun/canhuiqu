<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:89:"D:\phpStudy\PHPTutorial\WWW\test.cc\application/../application/index/view/booth\book.html";i:1523325924;s:74:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\nav.html";i:1524040551;s:77:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\footer.html";i:1524186740;}*/ ?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/style-news.css" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/share.css" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/reveal.css" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/sweetalert2.min.css" />
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
                <a href="<?php echo url('Booth/book',['id' => $list['id']]); ?>" class="left-actvie">展位预定</a>
                <a href="<?php echo url('Pt/book',['id' => $list['id']]); ?>">随团行程</a>
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
                <div class="company-title">
                    <div class="tit-01">选择供应商</div>
                    <div class="tit-02">预定提醒：请尽量选择在线预订，线下交易无法享受市场交易安全保障。</div>
                </div>
                <?php if(isset($_COOKIE['worldevents_role']) && $_COOKIE['worldevents_role'] != 10): ?>
                <div class="con-box introduce" style="border:1px solid #ff8a00;margin-top:10px;">
                    <div class="not-support">
                        <span style="color: #ff8a00">商家账户暂不支持展位预定服务</span>
                    </div>
                </div>
                <?php else: if(count($booth) == 0): ?>
                <div class="con-box introduce" style="border:1px solid #ff8a00;margin-top:10px;">
                    <div class="not-support">
                        <span style="color: #ff8a00">该展会暂无供应商提供展位预定服务</span>
                    </div>
                </div>
                <?php endif; if(is_array($booth) || $booth instanceof \think\Collection || $booth instanceof \think\Paginator): $i = 0; $__LIST__ = $booth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$booth): $mod = ($i % 2 );++$i;?>
                <form id="booth_<?php echo $booth['id']; ?>" action="<?php echo url('booth/contacts'); ?>" method="post" >
                <input name="ex_id" value="<?php echo $booth['ex_id']; ?>" type="hidden">
                <input name="booth_id" value="<?php echo $booth['id']; ?>" type="hidden">
                <div class="company-box">
                    <div class="company-xx">
                        <div class="company-name">
                            <span class="fl"><?php echo $booth['company']; ?></span> <?php if($booth['pattern']==1): ?>
                            <input type="hidden" name="pattern" value="1">
                            <img src="/static/home/img/online.png" class="fl"><?php else: ?>
                            <input type="hidden" name="pattern" value="0">
                            <img src="/static/home/img/offline.png" class="fl"> <?php endif; ?>
                            <span class="q-wz1">
                                <a class="data-tips">企业信息</a>
                                <div class="qy-box" style="display: none;">
                                    <img src="<?php echo get_file_path($booth['blicense']); ?>" style="width: 300px;height: 300px">
                                </div>
                            </span>


                            <p>咨询电话：<?php echo $booth['telephone']; ?></p>
                        </div>
                    </div>
                    <style>
                        .q-wz1 {
                            position: relative;
                            display: inline-block;
                            font-size: 16px
                        }
                        
                        .qy-box {
                            position: absolute;
                            left: 0px;
                            top: 25px;
                            padding: 15px;
                            background-color: #fff;
                            border: 1px solid #ccc;
                        }
                    </style>

                    <div class="company-zh1 clearfix">
                        <?php if($booth['pattern']==0): ?>
                        <li>
                            <strong>详细说明:</strong> <?php echo $booth['describe']; ?>
                        </li>
                        <?php else: ?>
                        <ul>
                            <li>
                                <b>展位类型</b> <?php if($booth['indoor_price'] == 0): else: ?>
                                <p>室内光地</p><?php endif; if($booth['stand_price'] == 0): else: ?>
                                <p>标准摊位</p><?php endif; if($booth['outdoor_price'] == 0): else: ?>
                                <p>室外光地</p><?php endif; ?>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <b>展位价格</b> <?php if($booth['indoor_price'] == 0): else: ?>
                                <p><span>￥<?php echo $booth['indoor_price']; ?></span> /<?php echo $unit[$booth['indoor_cu']]; ?></p><?php endif; if($booth['stand_price'] == 0): else: ?>
                                <p><span>￥<?php echo $booth['stand_price']; ?></span> /<?php echo $unit[$booth['stand_cu']]; ?></p><?php endif; if($booth['outdoor_price'] == 0): else: ?>
                                <p><span>￥<?php echo $booth['outdoor_price']; ?></span> /<?php echo $unit[$booth['outdoor_cu']]; ?></p><?php endif; ?>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <b>预订说明</b> <?php if($booth['indoor_desc'] == ''): else: ?>
                                <p><?php echo $booth['indoor_desc']; ?></p><?php endif; if($booth['stand_desc'] == ''): else: ?>
                                <p><?php echo $booth['stand_desc']; ?></p><?php endif; if($booth['outdoor_desc'] == ''): else: ?>
                                <p><?php echo $booth['outdoor_desc']; ?></p><?php endif; ?>
                            </li>
                        </ul>
                        <ul>

                            <li>
                                <b>预订面积</b> <?php if($booth['indoor_area'] == ''): else: ?>
                                <select style="width: 100px;height: 25px" class="indoor_area select-area">
                                    <option selected="selected" value="0">--请选择--</option>
                                    <?php
                                                if(strstr($booth['indoor_area'],".")){
                                                    $arr = explode(".",$booth['indoor_area']);
                                                    asort($arr);
                                                    foreach($arr as $value){
                                            ?>
                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>

                                    <?php
                                                }
                                             }else{
                                             ?>
                                    <option value="<?php echo $booth['indoor_area']; ?>"><?php echo $booth['indoor_area']; ?></option>
                                    <?php
                                              }
                                             ?>
                                </select>
                                <input style="width: 100px;display:none" class="indoor-other-area" name="indoorArea">&nbsp;&nbsp;<span style="color: blue;"><?php echo $unit[$booth['indoor_au']]; ?></span> <?php endif; ?>
                            </li>


                            <li>
                                <?php if($booth['stand_area'] == ''): else: ?>
                                <select style="width: 100px;height: 25px" class="stand_area select-area">
                                <option selected="selected" value="0">--请选择--</option>
                                <?php
                                                if(strstr($booth['stand_area'],".")){
                                                    $arr = explode(".",$booth['stand_area']);
                                                    asort($arr);
                                                    foreach($arr as $value){
                                ?>
                                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>

                                <?php
                                                    }

                                                }else{
                                ?>
                                                <option value="<?php echo $booth['stand_area']; ?>"><?php echo $booth['stand_area']; ?></option>

                                <?php
                                                }
                                ?>
                            </select>
                                <input style="width: 100px;display:none" class="stand-other-area" name="StandArea">&nbsp;&nbsp;<span style="color: blue;"><?php echo $unit[$booth['stand_au']]; ?></span> <?php endif; ?>
                            </li>


                            <li>
                                <?php if($booth['outdoor_area'] == ''): else: ?>
                                <select style="width: 100px;height: 25px" class="outdoor_area select-area">
                                    <option selected="selected" value="0">--请选择--</option>
                                    <?php
                                                if(strstr($booth['outdoor_area'],".")){
                                                    $arr = explode(".",$booth['outdoor_area']);
                                                    asort($arr);
                                                    foreach($arr as $value){
                                    ?>
                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>

                                    <?php
                                                    }
                                                }else{
                                    ?>
                                    <option value="<?php echo $booth['outdoor_area']; ?>"><?php echo $booth['outdoor_area']; ?></option>

                                    <?php
                                                }
                                    ?>
                                </select>
                                <input style="width: 100px;display:none" class="outdoor-other-area" name="outdoorArea">&nbsp;&nbsp;<span style="color: blue;"><?php echo $unit[$booth['outdoor_au']]; ?></span> <?php endif; ?>
                            </li>

                        </ul>
                    </div>
                    <div class="company-zh2 clearfix">
                        <ul>

                            <li>
                                <?php if($booth['is_pt'] == 1): ?>
                                <strong>是否随团:</strong>
                                <div class="fl st-radio">
                                    <label>
                                    <input type="radio" name="is_pt" value="1" />是
                                    </label>
                                    <label>
                                        <input type="radio" name="is_pt" value="0" checked="checked"/>否
                                    </label>
                                    <a href="#">点击查看行程详情</a>
                                </div>
                                <?php endif; ?>
                            </li>

                            <li>
                                <strong>展位选择:</strong>
                                <span style="color: blue">&nbsp;&nbsp;A.</span>&nbsp;&nbsp;<input type="text" name="firstBooth" value="" placeholder="首选" style="width:100px" />
                                <span style="color: blue">&nbsp;&nbsp;B.</span>&nbsp;&nbsp;<input type="text" name="secondBooth" value="" placeholder="第二选择" style="width:100px" />
                                <span style="color: blue">&nbsp;&nbsp;C.</span>&nbsp;&nbsp;<input type="text" name="thirdBooth" value="" placeholder="第三选择" style="width:100px" />
                                <a href="<?php echo url('booth/booth_pictures',['id'=>$booth['booth_pictures']]); ?>">点击查看展位图</a>
                            </li>
                            <li>
                                <strong>标摊配置:</strong> <?php echo $booth['stand_config']; ?>
                                <a href="<?php echo url('booth/stand_pictures',['id'=>$booth['stand_pictures']]); ?>">标展效果图</a>
                            </li>
                            <li>
                                <strong>价格说明:</strong> <?php if($booth['price_desc'] == ''): ?><span style="color: red">暂无说明</span><?php else: ?><?php echo $booth['price_desc']; endif; ?>
                            </li>
                            <li>
                                <strong>补贴说明:</strong>
                                <div class="zh2-box"><?php if($booth['subsidy_desc'] == ''): ?><span style="color: red">暂无说明</span><?php else: ?><?php echo $booth['subsidy_desc']; endif; ?></div>
                            </li>
                            <li>
                                <strong>其他说明:</strong>
                                <div><?php if($booth['subsidy_desc'] == ''): ?><span style="color: red">暂无说明</span><?php else: ?><?php echo $booth['other_desc']; endif; ?></div>
                            </li>
                        </ul>
                        <?php endif; ?>
                        <ul style="width:210px; float: right;">
                            <a class='btn btn-info' href="tencent://message/?uin=<?php echo $booth['qq']; ?>">在线联系</a> &nbsp;&nbsp;&nbsp;&nbsp; <?php if($booth['pattern']==0): ?><a class='btn btn-danger' href="javascript:void(0);" disabled="disabled">立即预定</a><?php else: ?>
                            <a class='btn btn-danger book' href="javascript:void(0);" onclick="boothBooking('booth_<?php echo $booth['id']; ?>')" ex-id="<?php echo $booth['ex_id']; ?>">立即预定</a><?php endif; ?>
                        </ul>
                    </div>
                </div>
                </form>
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
    </div>
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

    <!--<script type="text/javascript" src="/static/home/js/jquery.reveal.js"></script>-->
    <!--进度条-->
    <script type="text/javascript" src="/static/home/js/progressBar.js"></script>
    <script type="text/javascript" src="/static/home/js/sweetalert2.min.js"></script>
    <!--进度条-->
    <script type="text/javascript" src="/static/home/js/lib.js"></script>
    <script type="text/javascript" src="/static/home/js/fol_nav.js"></script>
    <!--tab-->
    <script>
        $(function() {
            //企业信息
            $(".data-tips").hover(function() {
                $(this).next(".qy-box").show();
            }, function() {
                $(this).next(".qy-box").hide();
            });
            //预定面积
            var areaSelectDom = $(".select-area");
            areaSelectDom.each(function (key, dom) {
                var dom = $(this), nextVal = dom.next().val();
                if (nextVal) dom.val(nextVal);
            });
            areaSelectDom.on("change", function () {
                var dom = $(this), val = $(this).val(), nxt = dom.next();

                if (val && isNaN(parseInt(val))) {
                    nxt.val("");
                    nxt.show();
                } else {
                    nxt.val(val);
                    nxt.hide();
                }
            });
});
        //获取Cookie信息
        function getCookie(name)
        {
            var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
            if(arr=document.cookie.match(reg))
                return unescape(arr[2]);
            else
                return null;
        }
        var boothBooking = function (form) {
            var formDom = $("#" + form);
            var pattern = formDom.find('input[name="pattern"]').val();
            if(pattern == 1){
                var inputValueMap = {};
                formDom.find("input:text").each(function (key, dom) {
                    inputValueMap[dom.name] = dom.value;
                });
                var shouldInputArea = inputValueMap.hasOwnProperty("indoorArea")
                    || inputValueMap.hasOwnProperty("StandArea")
                    || inputValueMap.hasOwnProperty("outdoorArea");
                if (shouldInputArea) {
                    var matched = inputValueMap.hasOwnProperty("indoorArea") && inputValueMap.indoorArea > 0
                        || inputValueMap.hasOwnProperty("StandArea") && inputValueMap.StandArea > 0
                        || inputValueMap.hasOwnProperty("outdoorArea") && inputValueMap.outdoorArea > 0;
                    if (!matched) {
                       swal({
                            text:'<span style="color:red;font-weight:bold">请选择需要预订的面积 !</span>',
                            timer: 3000,
                            type:'warning',
                            showConfirmButton:false,
                            showCloseButton: true
                        });
                        return false;
                    }else{
                            $user_id = getCookie('worldevents_user_id');
                            if($user_id){
                                      $(formDom).submit();
                            }else{
                                      $(location).attr('href','/user/login');
                            }

                    }
                }

            }
        }
        
    </script>   
</body>

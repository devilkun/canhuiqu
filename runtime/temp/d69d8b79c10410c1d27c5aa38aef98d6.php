<?php if (!defined('THINK_PATH')) exit(); /*a:10:{s:92:"D:\phpStudy\PHPTutorial\WWW\test.cc\application/../application/index/view/manager\index.html";i:1523608453;s:85:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_header.html";i:1522810289;s:82:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_top.html";i:1523950681;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side0.html";i:1524191072;s:81:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\user-panel.html";i:1523584321;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side1.html";i:1523952896;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side2.html";i:1523953003;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side3.html";i:1523582908;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side4.html";i:1523582916;s:85:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_footer.html";i:1522810294;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>参会去 | 用户中心</title>
    <link rel="shortcut icon" href="/static/home/img/favicon.ico">
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="/static/home/js/manager/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="/static/home/js/manager/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="/static/home/js/manager/bootstrap/css/bootstrap.min.css">
    <!--LOADING STYLESHEET FOR PAGE-->
    <link type="text/css" rel="stylesheet" href="/static/home/js/manager/intro.js/introjs.css">
    <link type="text/css" rel="stylesheet" href="/static/home/js/manager/calendar/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="/static/home/js/manager/sco.message/sco.message.css">
    <link type="text/css" rel="stylesheet" href="/static/home/js/manager/intro.js/introjs.css">
    <!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="/static/home/js/manager/animate.css/animate.css">
    <link type="text/css" rel="stylesheet" href="/static/home/js/manager/iCheck/skins/all.css">
    <link type="text/css" rel="stylesheet" href="/static/home/js/manager/jquery-notific8/jquery.notific8.min.css">
    <link type="text/css" rel="stylesheet" href="/static/home/js/manager/bootstrap-daterangepicker/daterangepicker-bs3.css">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="/static/home/css/manager/themes/style1/orange-blue.css" class="default-style">
    <link type="text/css" rel="stylesheet" href="/static/home/css/manager/style-responsive.css">
    <!--Loading style layui-->
    <link rel="stylesheet" type="text/css" href="/static/home/js/layui/css/layui.css"/>
     <!--Loading style zyupload-->
    <link rel="stylesheet" type="text/css" href="/static/home/js/zyupload/skins/zyupload-1.0.0.min.css"/>
    <link rel="stylesheet" type="text/css" href="/static/home/css/bootstrap-datepicker3.min.css"/>
</head>
<div>
    <!--BEGIN BACK TO TOP-->
    <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
    <!--END BACK TO TOP-->
    <!--BEGIN TOPBAR-->
    <div id="header-topbar-option-demo" class="page-header-topbar">
        <nav id="topbar" role="navigation" style="margin-bottom: 0; z-index: 2;" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button><a id="logo" href="<?php echo url('index/index');; ?>" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">参会去信息发布</span><span style="display: none" class="logo-text-icon">µ</span></a>
            </div>
            <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <li class="dropdown"><a data-hover="dropdown" href="<?php echo url('manager/myinfo'); ?>" class="dropdown-toggle"><i class="fa fa-bell fa-fw"></i><span class="badge badge-green"><?php echo $unread_num; ?></span></a>
                    </li>
                    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-envelope fa-fw"></i><span class="badge badge-orange">0</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
<?php if(\think\Request::instance()->cookie('role') == '10'): ?>
<!---user-->
<body class=" ">
<div id="wrapper" style="min-height: 650px">
    <!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">
                <li class="user-panel">
    <div class="thumb">
        <?php if(\think\Request::instance()->cookie('figureurl_qq_1')): ?>
        <img src="<?php echo \think\Request::instance()->cookie('figureurl_qq_1'); ?>" alt="" class="img-circle" /><?php else: ?>
        <img src="/static/home/img/user1.png" alt="" class="img-circle" />
        <?php endif; ?>
    </div>
    <div class="info">
        <p><?php if($list['username'] == ''): ?><?php echo $list['mobile']; else: ?><?php echo $list['username']; endif; ?></p>
        <ul class="list-inline list-unstyled">
            <li><a href="<?php echo url('Manager/index'); ?>" data-hover="tooltip" title="个人信息"><i class="fa fa-user"></i></a>
            </li>
            <li><a href="javascript:void(0);" data-hover="tooltip" title="邮件"><i class="fa fa-envelope"></i></a>
            </li>
            <li><a href="javascript:void(0);" data-hover="tooltip" title="设置" data-toggle="modal" data-target="#modal-config"><i class="fa fa-cog"></i></a>
            </li>
            <li><a href="<?php echo url('User/logout'); ?>" data-hover="tooltip" title="登出"><i class="fa fa-sign-out"></i></a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</li>
                <li><a href="#"><i class="fa fa-tachometer fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的需求</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">定制行程</span></a></li>
                        <li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">展台搭建</span></a></li>
                        <li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">展品运输</span></a></li>
                    </ul>
                </li>
                <li name=''><a href="#"><i class="fa fa-edit fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的订单</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo url('manager/myorder'); ?>"><i class="fa fa-rocket"></i><span class="submenu-title">所有订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">展位订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">拼团订单</span></a> </li>
                        <!--<li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">定制订单</span></a> </li>-->
                        <!--<li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">搭建订单</span></a> </li>-->
                        <!--<li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">运输订单</span></a> </li>-->
                        <!--<li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">签证订单</span></a> </li>-->
                        <!--<li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">门票订单</span></a> </li>-->
                    </ul>
                </li>
                <li><a href="<?php echo url('manager/favorite'); ?>"><i class="fa fa-gift fa-fw"><div class="icon-bg bg-orange"></div></i><span class="menu-title">我的收藏</span><span class="label label-yellow"><?php echo $favorite_num; ?>件</span></a>
                </li>
                <!--<li><a href="#"><i class="fa fa-money"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的补贴</span><span class="fa arrow"></span></a>-->
                    <!--<ul class="nav nav-second-level">-->
                        <!--<li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">专项补贴</span></a>-->
                        <!--</li>-->
                    <!--</ul>-->
                <!--</li>-->
                <!--<li><a href="#"><i class="fa fa-indent"><div class="icon-bg bg-orange"></div></i><span class="menu-title">出团手册</span><span class="label label-violet">v1.0</span></a>-->
                <!--</li>-->
                <!--<li><a href="#"><i class="fa fa-bar-chart-o fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的财务</span><span class="fa arrow"></span></a>-->
                    <!--<ul class="nav nav-second-level">-->
                        <!--<li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">Left Sidebar</span></a>-->
                        <!--</li>-->
                    <!--</ul>-->
                <!--</li>-->
                <li><a href="<?php echo url('manager/myinfo'); ?>"><i class="fa fa-bullhorn fa-fw"><div class="icon-bg bg-orange"></div></i><span class="menu-title">我的消息</span><span class="label label-red"><?php echo $unread_num; ?>条</span></a>
                </li>
                <li><a href="#"><i class="fa fa-slack fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">账号中心</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo url('manager/index'); ?>"><i class="fa fa-align-left"></i><span class="submenu-title">账号信息</span></a>
                            <!--<li><a href="<?php echo url('User/certification'); ?>"><i class="fa fa-align-left"></i><span class="submenu-title">服务资质</span></a>-->
                            <!--<li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">常用联系人</span></a>-->
                            <!--<li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">常用企业</span></a>-->
                            <!--</li>-->
                    </ul>
                </li>
                <!--li.charts-sum<div id="ajax-loaded-data-sidebar"></div>-->
            </ul>
        </div>
    </nav>
    <!--END SIDEBAR MENU-->
<?php elseif(\think\Request::instance()->cookie('role') == '11'): ?>
<!--organizer-->
<body class=" ">
<div id="wrapper">
    <!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">
                <li class="user-panel">
    <div class="thumb">
        <?php if(\think\Request::instance()->cookie('figureurl_qq_1')): ?>
        <img src="<?php echo \think\Request::instance()->cookie('figureurl_qq_1'); ?>" alt="" class="img-circle" /><?php else: ?>
        <img src="/static/home/img/user1.png" alt="" class="img-circle" />
        <?php endif; ?>
    </div>
    <div class="info">
        <p><?php if($list['username'] == ''): ?><?php echo $list['mobile']; else: ?><?php echo $list['username']; endif; ?></p>
        <ul class="list-inline list-unstyled">
            <li><a href="<?php echo url('Manager/index'); ?>" data-hover="tooltip" title="个人信息"><i class="fa fa-user"></i></a>
            </li>
            <li><a href="javascript:void(0);" data-hover="tooltip" title="邮件"><i class="fa fa-envelope"></i></a>
            </li>
            <li><a href="javascript:void(0);" data-hover="tooltip" title="设置" data-toggle="modal" data-target="#modal-config"><i class="fa fa-cog"></i></a>
            </li>
            <li><a href="<?php echo url('User/logout'); ?>" data-hover="tooltip" title="登出"><i class="fa fa-sign-out"></i></a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</li>
                <li><a href="#"><i class="fa fa-indent fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">展会管理</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo url('Exhibition/add');; ?>"><i class="fa fa-th-large"></i><span class="submenu-title">发布展会</span></a></li>
                        <li><a href="<?php echo url('Exhibition/myex'); ?>"><i class="fa fa-th-large"></i><span class="submenu-title">我的展会</span></a></li>
                    </ul>
                </li>
                <!--<li><a href="#"><i class="fa fa-tachometer fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">广告管理</span><span class="fa arrow"></span></a>-->
                    <!--<ul class="nav nav-second-level">-->
                        <!--<li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">我的申请</span></a></li>-->
                        <!--<li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">我的广告</span></a></li>-->
                        <!--<li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">广告订单</span></a></li>-->
                    <!--</ul>-->
                <!--</li>-->
                <!--<li name=''><a href="#"><i class="fa fa-edit fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">订单管理</span><span class="fa arrow"></span></a>-->
                    <!--<ul class="nav nav-second-level">-->
                        <!--<li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">所有订单</span></a> </li>-->
                        <!--<li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">展位订单</span></a> </li>-->
                        <!--<li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">拼团订单</span></a> </li>-->
                    <!--</ul>-->
                <!--</li>-->
                <!--<li><a href="#"><i class="fa fa-money"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的补贴</span><span class="fa arrow"></span></a>-->
                    <!--<ul class="nav nav-second-level">-->
                        <!--<li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">专项补贴</span></a>-->
                        <!--</li>-->
                    <!--</ul>-->
                <!--</li>-->
                <!--<li><a href="#"><i class="fa fa-bar-chart-o fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的财务</span><span class="fa arrow"></span></a>-->
                    <!--<ul class="nav nav-second-level">-->
                        <!--<li><a href="#"><i class="fa fa-align-left"></i><span class="submenu-title">财务明细</span></a>-->
                        <!--<li><a href="#"><i class="fa fa-align-left"></i><span class="submenu-title">提现申请</span></a>-->
                        <!--<li><a href="#"><i class="fa fa-align-left"></i><span class="submenu-title">提现申请结果</span></a>-->
                        <!--</li>-->
                    <!--</ul>-->
                <!--</li>-->
                <li><a href="<?php echo url('manager/myinfo'); ?>"><i class="fa fa-bullhorn fa-fw"><div class="icon-bg bg-orange"></div></i><span class="menu-title">我的消息</span><span class="label label-red"><?php echo $unread_num; ?>条</span></a>
                </li>
                <li><a href="#"><i class="fa fa-slack fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">账号中心</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo url('manager/index'); ?>"><i class="fa fa-align-left"></i><span class="submenu-title">账号信息</span></a>
                        <li><a href="<?php echo url('User/certification'); ?>"><i class="fa fa-align-left"></i><span class="submenu-title">服务资质</span></a>
                        <li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">常用联系人</span></a>
                        <li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">常用企业</span></a>
                        </li>
                    </ul>
                </li>
                <!--li.charts-sum<div id="ajax-loaded-data-sidebar"></div>-->
            </ul>
        </div>
    </nav>
    <!--END SIDEBAR MENU-->

<?php elseif(\think\Request::instance()->cookie('role') == '12'): ?>
<!---organization-->
<body class=" ">
<div id="wrapper">
    <!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">
                <li class="user-panel">
    <div class="thumb">
        <?php if(\think\Request::instance()->cookie('figureurl_qq_1')): ?>
        <img src="<?php echo \think\Request::instance()->cookie('figureurl_qq_1'); ?>" alt="" class="img-circle" /><?php else: ?>
        <img src="/static/home/img/user1.png" alt="" class="img-circle" />
        <?php endif; ?>
    </div>
    <div class="info">
        <p><?php if($list['username'] == ''): ?><?php echo $list['mobile']; else: ?><?php echo $list['username']; endif; ?></p>
        <ul class="list-inline list-unstyled">
            <li><a href="<?php echo url('Manager/index'); ?>" data-hover="tooltip" title="个人信息"><i class="fa fa-user"></i></a>
            </li>
            <li><a href="javascript:void(0);" data-hover="tooltip" title="邮件"><i class="fa fa-envelope"></i></a>
            </li>
            <li><a href="javascript:void(0);" data-hover="tooltip" title="设置" data-toggle="modal" data-target="#modal-config"><i class="fa fa-cog"></i></a>
            </li>
            <li><a href="<?php echo url('User/logout'); ?>" data-hover="tooltip" title="登出"><i class="fa fa-sign-out"></i></a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</li>
                <li><a href="#"><i class="fa fa-indent fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">展会管理</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo url('Exhibition/lists');; ?>"><i class="fa fa-th-large"></i><span class="submenu-title">展会列表</span></a></li>
                        <li><a href="<?php echo url('Exhibition/myex'); ?>"><i class="fa fa-th-large"></i><span class="submenu-title">我的展会</span></a></li>
                        <li><a href="<?php echo url('Exhibition/mybooth'); ?>"><i class="fa fa-th-large"></i><span class="submenu-title">我的展位</span></a></li>
                        <li><a href="<?php echo url('Exhibition/mypt'); ?>"><i class="fa fa-th-large"></i><span class="submenu-title">我的拼团</span></a></li>
                    </ul>
                </li>
                <!--<li><a href="#"><i class="fa fa-tachometer fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">广告管理</span><span class="fa arrow"></span></a>-->
                <!--<ul class="nav nav-second-level">-->
                <!--<li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">我的申请</span></a></li>-->
                <!--<li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">我的广告</span></a></li>-->
                <!--<li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">广告订单</span></a></li>-->
                <!--</ul>-->
                <!--</li>-->
                <li name=''><a href="#"><i class="fa fa-edit fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">订单管理</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">所有订单</span></a> </li>
                <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">展位订单</span></a> </li>
                <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">拼团订单</span></a> </li>
                </ul>
                </li>
                <!--<li><a href="#"><i class="fa fa-money"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的补贴</span><span class="fa arrow"></span></a>-->
                <!--<ul class="nav nav-second-level">-->
                <!--<li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">专项补贴</span></a>-->
                <!--</li>-->
                <!--</ul>-->
                <!--</li>-->
                <!--<li><a href="#"><i class="fa fa-bar-chart-o fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的财务</span><span class="fa arrow"></span></a>-->
                <!--<ul class="nav nav-second-level">-->
                <!--<li><a href="#"><i class="fa fa-align-left"></i><span class="submenu-title">财务明细</span></a>-->
                <!--<li><a href="#"><i class="fa fa-align-left"></i><span class="submenu-title">提现申请</span></a>-->
                <!--<li><a href="#"><i class="fa fa-align-left"></i><span class="submenu-title">提现申请结果</span></a>-->
                <!--</li>-->
                <!--</ul>-->
                <!--</li>-->
                <li><a href="<?php echo url('manager/myinfo'); ?>"><i class="fa fa-bullhorn fa-fw"><div class="icon-bg bg-orange"></div></i><span class="menu-title">我的消息</span><span class="label label-red"><?php echo $unread_num; ?>条</span></a>
                </li>
                <li><a href="#"><i class="fa fa-slack fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">账号中心</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo url('manager/index'); ?>"><i class="fa fa-align-left"></i><span class="submenu-title">账号信息</span></a>
                        <li><a href="<?php echo url('User/certification'); ?>"><i class="fa fa-align-left"></i><span class="submenu-title">服务资质</span></a>
                        <!--<li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">常用联系人</span></a>-->
                        <!--<li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">常用企业</span></a>-->
                        <!--</li>-->
                    </ul>
                </li>
                <!--li.charts-sum<div id="ajax-loaded-data-sidebar"></div>-->
            </ul>
        </div>
    </nav>
    <!--END SIDEBAR MENU-->
<?php elseif(\think\Request::instance()->cookie('role') == '13'): ?>
<!--contractor-->
<body class=" ">
<div id="wrapper">
    <!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">
                <li class="user-panel">
    <div class="thumb">
        <?php if(\think\Request::instance()->cookie('figureurl_qq_1')): ?>
        <img src="<?php echo \think\Request::instance()->cookie('figureurl_qq_1'); ?>" alt="" class="img-circle" /><?php else: ?>
        <img src="/static/home/img/user1.png" alt="" class="img-circle" />
        <?php endif; ?>
    </div>
    <div class="info">
        <p><?php if($list['username'] == ''): ?><?php echo $list['mobile']; else: ?><?php echo $list['username']; endif; ?></p>
        <ul class="list-inline list-unstyled">
            <li><a href="<?php echo url('Manager/index'); ?>" data-hover="tooltip" title="个人信息"><i class="fa fa-user"></i></a>
            </li>
            <li><a href="javascript:void(0);" data-hover="tooltip" title="邮件"><i class="fa fa-envelope"></i></a>
            </li>
            <li><a href="javascript:void(0);" data-hover="tooltip" title="设置" data-toggle="modal" data-target="#modal-config"><i class="fa fa-cog"></i></a>
            </li>
            <li><a href="<?php echo url('User/logout'); ?>" data-hover="tooltip" title="登出"><i class="fa fa-sign-out"></i></a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</li>
                <li><a href="#"><i class="fa fa-tachometer fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的需求</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">定制行程</span></a></li>
                        <li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">展台搭建</span></a></li>
                        <li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">展品运输</span></a></li>
                    </ul>
                </li>
                <li name=''><a href="#"><i class="fa fa-edit fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的订单</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">所有订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">展位订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">拼团订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">定制订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">搭建订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">运输订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">签证订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">门票订单</span></a> </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-gift fa-fw"><div class="icon-bg bg-orange"></div></i><span class="menu-title">我的收藏</span><span class="label label-yellow">0件</span></a>
                </li>
                <li><a href="#"><i class="fa fa-money"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的补贴</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">专项补贴</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-indent"><div class="icon-bg bg-orange"></div></i><span class="menu-title">出团手册</span><span class="label label-violet">v1.0</span></a>
                </li>
                <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的财务</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">Left Sidebar</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-bullhorn fa-fw"><div class="icon-bg bg-orange"></div></i><span class="menu-title">我的消息</span><span class="label label-red">0条</span></a>
                </li>
                <li><a href="#"><i class="fa fa-slack fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">账号中心</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">Left Sidebar</span></a>
                        </li>
                    </ul>
                </li>
                <!--li.charts-sum<div id="ajax-loaded-data-sidebar"></div>-->
            </ul>
        </div>
    </nav>
    <!--END SIDEBAR MENU-->
<?php elseif(\think\Request::instance()->cookie('role') == '14'): ?>
<!--transporters-->
<body class=" ">
<div id="wrapper">
    <!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">
                <li class="user-panel">
    <div class="thumb">
        <?php if(\think\Request::instance()->cookie('figureurl_qq_1')): ?>
        <img src="<?php echo \think\Request::instance()->cookie('figureurl_qq_1'); ?>" alt="" class="img-circle" /><?php else: ?>
        <img src="/static/home/img/user1.png" alt="" class="img-circle" />
        <?php endif; ?>
    </div>
    <div class="info">
        <p><?php if($list['username'] == ''): ?><?php echo $list['mobile']; else: ?><?php echo $list['username']; endif; ?></p>
        <ul class="list-inline list-unstyled">
            <li><a href="<?php echo url('Manager/index'); ?>" data-hover="tooltip" title="个人信息"><i class="fa fa-user"></i></a>
            </li>
            <li><a href="javascript:void(0);" data-hover="tooltip" title="邮件"><i class="fa fa-envelope"></i></a>
            </li>
            <li><a href="javascript:void(0);" data-hover="tooltip" title="设置" data-toggle="modal" data-target="#modal-config"><i class="fa fa-cog"></i></a>
            </li>
            <li><a href="<?php echo url('User/logout'); ?>" data-hover="tooltip" title="登出"><i class="fa fa-sign-out"></i></a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</li>
                <li><a href="#"><i class="fa fa-tachometer fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的需求</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">定制行程</span></a></li>
                        <li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">展台搭建</span></a></li>
                        <li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">展品运输</span></a></li>
                    </ul>
                </li>
                <li name=''><a href="#"><i class="fa fa-edit fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的订单</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">所有订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">展位订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">拼团订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">定制订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">搭建订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">运输订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">签证订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">门票订单</span></a> </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-gift fa-fw"><div class="icon-bg bg-orange"></div></i><span class="menu-title">我的收藏</span><span class="label label-yellow">0件</span></a>
                </li>
                <li><a href="#"><i class="fa fa-money"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的补贴</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">专项补贴</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-indent"><div class="icon-bg bg-orange"></div></i><span class="menu-title">出团手册</span><span class="label label-violet">v1.0</span></a>
                </li>
                <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的财务</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">Left Sidebar</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-bullhorn fa-fw"><div class="icon-bg bg-orange"></div></i><span class="menu-title">我的消息</span><span class="label label-red">0条</span></a>
                </li>
                <li><a href="#"><i class="fa fa-slack fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">账号中心</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">Left Sidebar</span></a>
                        </li>
                    </ul>
                </li>
                <!--li.charts-sum<div id="ajax-loaded-data-sidebar"></div>-->
            </ul>
        </div>
    </nav>
    <!--END SIDEBAR MENU-->
<?php elseif(\think\Request::instance()->cookie('role') == '15'): ?>
<!--transporters-->
<body class=" ">
<div id="wrapper">
    <!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">
                <li class="user-panel">
    <div class="thumb">
        <?php if(\think\Request::instance()->cookie('figureurl_qq_1')): ?>
        <img src="<?php echo \think\Request::instance()->cookie('figureurl_qq_1'); ?>" alt="" class="img-circle" /><?php else: ?>
        <img src="/static/home/img/user1.png" alt="" class="img-circle" />
        <?php endif; ?>
    </div>
    <div class="info">
        <p><?php if($list['username'] == ''): ?><?php echo $list['mobile']; else: ?><?php echo $list['username']; endif; ?></p>
        <ul class="list-inline list-unstyled">
            <li><a href="<?php echo url('Manager/index'); ?>" data-hover="tooltip" title="个人信息"><i class="fa fa-user"></i></a>
            </li>
            <li><a href="javascript:void(0);" data-hover="tooltip" title="邮件"><i class="fa fa-envelope"></i></a>
            </li>
            <li><a href="javascript:void(0);" data-hover="tooltip" title="设置" data-toggle="modal" data-target="#modal-config"><i class="fa fa-cog"></i></a>
            </li>
            <li><a href="<?php echo url('User/logout'); ?>" data-hover="tooltip" title="登出"><i class="fa fa-sign-out"></i></a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</li>
                <li><a href="#"><i class="fa fa-tachometer fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的需求</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">定制行程</span></a></li>
                        <li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">展台搭建</span></a></li>
                        <li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">展品运输</span></a></li>
                    </ul>
                </li>
                <li name=''><a href="#"><i class="fa fa-edit fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的订单</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">所有订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">展位订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">拼团订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">定制订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">搭建订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">运输订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">签证订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">门票订单</span></a> </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-gift fa-fw"><div class="icon-bg bg-orange"></div></i><span class="menu-title">我的收藏</span><span class="label label-yellow">0件</span></a>
                </li>
                <li><a href="#"><i class="fa fa-money"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的补贴</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">专项补贴</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-indent"><div class="icon-bg bg-orange"></div></i><span class="menu-title">出团手册</span><span class="label label-violet">v1.0</span></a>
                </li>
                <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的财务</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">Left Sidebar</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-bullhorn fa-fw"><div class="icon-bg bg-orange"></div></i><span class="menu-title">我的消息</span><span class="label label-red">0条</span></a>
                </li>
                <li><a href="#"><i class="fa fa-slack fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">账号中心</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">Left Sidebar</span></a>
                        </li>
                    </ul>
                </li>
                <!--li.charts-sum<div id="ajax-loaded-data-sidebar"></div>-->
            </ul>
        </div>
    </nav>
    <!--END SIDEBAR MENU-->
<?php elseif(\think\Request::instance()->cookie('role') == '16'): ?>
<!--transporters-->
<body class=" ">
<div id="wrapper">
    <!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">
                <li class="user-panel">
    <div class="thumb">
        <?php if(\think\Request::instance()->cookie('figureurl_qq_1')): ?>
        <img src="<?php echo \think\Request::instance()->cookie('figureurl_qq_1'); ?>" alt="" class="img-circle" /><?php else: ?>
        <img src="/static/home/img/user1.png" alt="" class="img-circle" />
        <?php endif; ?>
    </div>
    <div class="info">
        <p><?php if($list['username'] == ''): ?><?php echo $list['mobile']; else: ?><?php echo $list['username']; endif; ?></p>
        <ul class="list-inline list-unstyled">
            <li><a href="<?php echo url('Manager/index'); ?>" data-hover="tooltip" title="个人信息"><i class="fa fa-user"></i></a>
            </li>
            <li><a href="javascript:void(0);" data-hover="tooltip" title="邮件"><i class="fa fa-envelope"></i></a>
            </li>
            <li><a href="javascript:void(0);" data-hover="tooltip" title="设置" data-toggle="modal" data-target="#modal-config"><i class="fa fa-cog"></i></a>
            </li>
            <li><a href="<?php echo url('User/logout'); ?>" data-hover="tooltip" title="登出"><i class="fa fa-sign-out"></i></a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</li>
                <li><a href="#"><i class="fa fa-tachometer fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的需求</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">定制行程</span></a></li>
                        <li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">展台搭建</span></a></li>
                        <li><a href=""><i class="fa fa-th-large"></i><span class="submenu-title">展品运输</span></a></li>
                    </ul>
                </li>
                <li name=''><a href="#"><i class="fa fa-edit fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的订单</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">所有订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">展位订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">拼团订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">定制订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">搭建订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">运输订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">签证订单</span></a> </li>
                        <li><a href="#"><i class="fa fa-rocket"></i><span class="submenu-title">门票订单</span></a> </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-gift fa-fw"><div class="icon-bg bg-orange"></div></i><span class="menu-title">我的收藏</span><span class="label label-yellow">0件</span></a>
                </li>
                <li><a href="#"><i class="fa fa-money"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的补贴</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">专项补贴</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-indent"><div class="icon-bg bg-orange"></div></i><span class="menu-title">出团手册</span><span class="label label-violet">v1.0</span></a>
                </li>
                <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">我的财务</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">Left Sidebar</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-bullhorn fa-fw"><div class="icon-bg bg-orange"></div></i><span class="menu-title">我的消息</span><span class="label label-red">0条</span></a>
                </li>
                <li><a href="#"><i class="fa fa-slack fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title">账号中心</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="layout-left-sidebar.html"><i class="fa fa-align-left"></i><span class="submenu-title">Left Sidebar</span></a>
                        </li>
                    </ul>
                </li>
                <!--li.charts-sum<div id="ajax-loaded-data-sidebar"></div>-->
            </ul>
        </div>
    </nav>
    <!--END SIDEBAR MENU-->
<?php endif; ?>
<style>
    .error{
        color:red;
    }
    .my-tag-box dd{
        border: 1px solid #d9d9d9;
        display: inline-block;
        padding: 5px 10px;
        border-radius: 5px;
        position: relative;
        margin-bottom: 15px;
        margin-right: 15px;
        cursor: pointer;
    }
    .on{
        background-color: #6dbfff;
    }
</style>
<!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <ol class="breadcrumb page-breadcrumb pull-left">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">用户中心</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">用户管理</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">用户信息</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <div class="page-content">
                    <div id="page-user-profile" class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3" style="color: #7cb8bb">
                                    <div class="form-group">
                                        <div class="text-center mbl"><?php if(\think\Request::instance()->cookie('figureurl_qq_2')): ?>
                                            <img src="<?php echo \think\Request::instance()->cookie('figureurl_qq_2'); ?>" style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25); width: 160px;height: 168px;" class="img-circle" /><?php else: ?>
                                            <img src="/static/home/img/user1.png" style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25); width: 160px;height: 168px;" class="img-circle" /><?php endif; ?>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <td width="50%">用户名</td>
                                                <td><span class="label label-orange"><?php if($list['username'] == ''): ?><?php echo $list['mobile']; else: ?><?php echo $list['username']; endif; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td width="50%">状态</td>
                                                <td><span class="label label-success">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%">级别</td>
                                                <td><span class="label label-blue"><i class="fa fa-star text-yellow fa-fw"></i><i class="fa fa-star text-yellow fa-fw"></i><i class="fa fa-star text-yellow fa-fw"></i><i class="fa fa-star text-yellow fa-fw"></i><i class="fa fa-star text-yellow fa-fw"></i></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%">账户类型</td>
                                                <td><span class="label label-pink"><?php echo $list['nickname']; ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%">加入时间</td>
                                                <td><span class="label label-yellow"><?php echo date('Y-m-d',$list['create_time']); ?></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-9">
                                    <ul class="nav nav-tabs ul-edit responsive">
                                        <li class="active"><a href="#tab-activity" data-toggle="tab"><i class="fa fa-bolt"></i>&nbsp;
今日头条</a>
                                        </li>
                                        <li><a href="#tab-edit" data-toggle="tab"><i class="fa fa-edit"></i>&nbsp;
账户信息</a>
                                        </li>
                                        <li ><a href="#tab-messages" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>&nbsp;
企业信息</a>
                                        </li>
                                    </ul>
                                    <div id="generalTabContent" class="tab-content">
                                        <div id="tab-activity" class="tab-pane fade in active">
                                            <ul class="list-activity list-unstyled">
                                                <li>
                                                    <div class="avatar"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/uxceo/48.jpg" class="img-circle" />
                                                    </div>
                                                    <div class="body">
                                                        <div class="desc"><strong class="mrs">Diane Harris</strong>posted a new note
                                                            <br/><small class="text-muted">1 days ago at 6:18am</small>
                                                        </div>
                                                        <div class="content"><a href="#"><strong>Ut enim ad minim veniam</strong></a>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div id="tab-edit" class="tab-pane fade">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="tab-content">
                                                        <div id="tab-profile-setting" class="tab-pane fade in active">
                                                            <form action="#" class="form-horizontal">
                                                                <table class="table">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="col-xs-3" style="border: 0px;"><span style="font-size: 15px">昵称:</span></td>
                                                                        <td style="border: 0px;"><span style="font-size: 15px"><?php echo $list['username']; ?></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-xs-3" style="border: 0px;"><span style="font-size: 15px">性别:</span></td>
                                                                        <td style="border: 0px;"><span style="font-size: 15px"><?php if($list['gender'] == 0): ?>男<?php else: ?>女<?php endif; ?></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-xs-3" style="border: 0px;"><span style="font-size: 15px">生日:</span></td>
                                                                        <td style="border: 0px;"><span style="font-size: 15px"><?php echo date("Y/m/d",$list['birthday']); ?></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-xs-3" style="border: 0px;"><span style="font-size: 15px">QQ:</span></td>
                                                                        <td style="border: 0px;"><span style="font-size: 15px"><?php echo $list['qq']; ?></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-xs-3" style="border: 0px;"><span style="font-size: 15px">手机:</span></td>
                                                                        <td style="border: 0px;"><span style="font-size: 15px"><?php echo $list['mobile']; ?></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-xs-3" style="border: 0px;"><span style="font-size: 15px">邮箱:</span></td>
                                                                        <td style="border: 0px;"><span style="font-size: 15px"><?php echo $list['email']; ?></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-xs-3" style="border: 0px;"><span style="font-size: 15px">城市:</span></td>
                                                                        <td style="border: 0px;"><span style="font-size: 15px"><?php echo $list['city']; ?></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-xs-3" style="border: 0px;"><span style="font-size: 15px">备注:</span></td>
                                                                        <td style="border: 0px;"><span style="font-size: 15px"><?php echo $list['remark']; ?></span></td>
                                                                    </tr>
                                                                    <tr >
                                                                        <td class="col-xs-3" style="border: 0px;">
                                                                            <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i>&nbsp; 编辑</button></td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>

                                                            </form>
                                                        </div>
                                                        <div id="tab-account-setting" class="tab-pane fade" style="min-height: 350px">

                                                            <form  class="form-horizontal" id="reset-password" method="post">
                                                                <input type="hidden" name="mobile" value="<?php echo $list['mobile']; ?>" id="telephone">
                                                                <div class="form-body" >
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">当前密码</label>
                                                                        <div class="col-sm-9 controls">
                                                                            <div class="row">
                                                                                <div class="col-xs-6">
                                                                                    <input type="password"  class="form-control" id="initial_password" name="initial_password"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">验证码</label>
                                                                        <div class="col-sm-9 controls">
                                                                            <div class="row">
                                                                                <div class="col-xs-3">
                                                                                    <input type="password" id="veriy_code" class="form-control" name="code"/>
                                                                                </div>
                                                                                <a href="javascript:void(0);" class="btn btn-default send-code" onclick="sends.send();">获取验证码</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">设置密码</label>
                                                                        <div class="col-sm-9 controls">
                                                                            <div class="row">
                                                                                <div class="col-xs-6">
                                                                                    <input type="password" placeholder="" class="form-control" id="new_password" name="new_password"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">确认密码</label>
                                                                        <div class="col-sm-9 controls">
                                                                            <div class="row">
                                                                                <div class="col-xs-6">
                                                                                    <input type="password" placeholder="" class="form-control" id="confirm_password" name="confirm_password"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mbn">
                                                                        <label class="col-sm-3 control-label"></label>
                                                                        <div class="col-sm-9 controls">
                                                                            <button type="submit" class="btn btn-success" id="reset-pwd"><i class="fa fa-save"></i>&nbsp; 提交
                                                                            </button>&nbsp; &nbsp;<a href="javascript:void(0);" class="btn btn-default empty">取消</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="nav nav-pills nav-stacked">
                                                        <li class="active"><a href="#tab-profile-setting" data-toggle="tab"><i class="fa fa-folder-open"></i>&nbsp;
账户信息</a>
                                                        </li>
                                                        <li><a href="#tab-account-setting" data-toggle="tab"><i class="fa fa-cogs"></i>&nbsp;
密码修改</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-messages" class="tab-pane fade">
                                            <div class="row">
                                                <div class="col-md-9" >
                                                    <div class="tab-content" style="background-color: #f8f8f8;min-height: 380px">
                                                        <div id="tab-messages-setting" class="tab-pane fade in active">
                                                            <form action="#" class="form-horizontal">
                                                                <table class="table">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="col-xs-3" style="border: 0px;"><span style="font-size: 15px">公司名称:</span></td>
                                                                        <td style="border: 0px;"><span style="font-size: 15px"><?php echo $list['company_name']; ?></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-xs-3" style="border: 0px;"><span style="font-size: 15px">公司地址:</span></td>
                                                                        <td style="border: 0px;"><span style="font-size: 15px"><?php echo $list['company_address']; ?></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-xs-3" style="border: 0px;"><span style="font-size: 15px">公司电话:</span></td>
                                                                        <td style="border: 0px;"><span style="font-size: 15px"><?php echo $list['company_mobile']; ?></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-xs-3" style="border: 0px;"><span style="font-size: 15px">公司传真:</span></td>
                                                                        <td style="border: 0px;"><span style="font-size: 15px"><?php echo $list['company_fax']; ?></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-xs-3" style="border: 0px;"><span style="font-size: 15px">公司网址:</span></td>
                                                                        <td style="border: 0px;"><span style="font-size: 15px"><?php echo $list['company_website']; ?></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-xs-3" style="border: 0px;"><span style="font-size: 15px">从事行业:</span></td>
                                                                        <td style="border: 0px;"><span style="font-size: 15px">
                                                                            <dl class="my-tag-box">
                                                                                    <?php if(is_array($trade_info) || $trade_info instanceof \think\Collection || $trade_info instanceof \think\Paginator): $i = 0; $__LIST__ = $trade_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ti): $mod = ($i % 2 );++$i;?><dd><?php echo $ti['name']; ?></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                                                                            </dl>
                                                                                <!--<?php echo $list['company_trade']; ?>-->
                                                                        </span></td>
                                                                    </tr>
                                                                    <tr >
                                                                        <td class="col-xs-3" style="border: 0px;">
                                                                            <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#editCompany"><i class="fa fa-edit"></i>&nbsp; 编辑</button></td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="nav nav-pills nav-stacked">
                                                        <li class="active"><a href="#tab-profile-setting" data-toggle="tab"><i class="fa fa-folder-open"></i>&nbsp;
                                                            企业信息</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div></div>
 <!-- 编辑账户模态框（Modal）账户信息 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" style="width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    账户信息-编辑
                </h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo url('manager/user_info'); ?>"  class="form-horizontal" id="form-edit" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 control-label"> 昵称</label>
                        <div class="col-sm-10 controls">
                            <input type="text" id="username" name="username" class="form-control" value="<?php echo $list['username']; ?>" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">性别</label>
                        <div class="col-sm-10 controls">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <?php if($list['gender'] == 0): ?>
                                    <input type="radio" value="0" name="gender"  checked="checked"/><?php else: ?><input type="radio" value="0" name="gender"/><?php endif; ?>&nbsp; 男

                                </label>
                                <label class="radio-inline">
                                    <?php if($list['gender'] == 1): ?>
                                    <input type="radio" value="1" name="gender" checked="checked"/>
                                    <?php else: ?><input type="radio" value="1" name="gender"/><?php endif; ?>&nbsp; 女
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">生日</label>
                        <div class="col-sm-10 controls">
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text"   class="form-control" id="birthday" name="birthday" value="<?php echo date('Y/m/d',$list['birthday']); ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">QQ</label>
                        <div class="col-sm-10 controls">
                            <input type="text"  class="form-control" id="qq" name="qq" value="<?php echo $list['qq']; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机</label>
                        <div class="col-sm-10 controls">
                            <input type="text" id="mobile" name="mobile" class="form-control" value="<?php echo $list['mobile']; ?>" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">邮箱</label>
                        <div class="col-sm-10 controls">
                            <input id="email" type="text" id="email" name="email" class="form-control"  value="<?php echo $list['email']; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">城市</label>
                        <div class="col-sm-10 controls">
                            <input type="text"  id="city" name="city" class="form-control" value="<?php echo $list['city']; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">备注</label>
                        <div class="col-sm-10 controls">
                            <textarea rows="3" class="form-control" id="remark" name="remark" ><?php echo $list['remark']; ?></textarea>
                        </div>
                    </div>
                </form>
                <div class="alert alert-danger infoAlert" id="infoAlert" style="display: none;">
                    <a href="javascript:void(0);" class="ptAlert close">×</a>
                    <strong>失败！</strong> <br> <span></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                    <button type="button" class="btn btn-primary" id="edit-info">
                        提交更改
                    </button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
        <!--END CONTENT-->
    </div> </div>
<!-- 编辑账户模态框（Modal）账户信息 -->
<div class="modal fade" id="editCompany" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="editCompanyLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="editCompanyLabel">
                    企业信息-编辑
                </h4>
            </div>
            <div class="modal-body" style="min-height: 450px">
                <form action="<?php echo url('manager/company_info'); ?>"  class="form-horizontal" id="form-edit-company" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">公司名称</label>
                        <div class="col-sm-8 controls">
                            <input type="text" id="company_name" name="company_name" class="form-control" value="<?php echo $list['company_name']; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">公司地址</label>
                                <div class="col-sm-8 controls">
                                    <input type="text" class="form-control" id="company_address" name="company_address" value="<?php echo $list['company_address']; ?>"/>
                                </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">公司电话</label>
                        <div class="col-sm-8 controls">
                            <input type="text"  class="form-control" id="company_mobile" name="company_mobile" value="<?php echo $list['company_mobile']; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">公司传真</label>
                        <div class="col-sm-8 controls">
                            <input type="text" id="company_fax" name="company_fax" class="form-control" value="<?php echo $list['company_fax']; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">公司网址</label>
                        <div class="col-sm-8 controls">
                            <input  type="text" id="company_website" name="company_website" class="form-control"  value="<?php echo $list['company_website']; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">从事行业</label>
                        <div class="col-sm-8 controls">
                            <button type="button" class="btn btn-success" data-toggle="modal"  data-target="#selectTrade">添加行业</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-8 controls">
                            <dl class="my-tag-box contain">
                                    <?php if(is_array($trade_info) || $trade_info instanceof \think\Collection || $trade_info instanceof \think\Paginator): $i = 0; $__LIST__ = $trade_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ti): $mod = ($i % 2 );++$i;?>
                                    <dd id="<?php echo $ti['id']; ?>"><?php echo $ti['name']; ?></dd>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                            </dl>
                        </div>
                    </div>
                </form>
                <div class="alert alert-danger infoAlert-company" id="infoAlert-company" style="display: none;">
                    <a href="javascript:void(0);" class="ptAlert close">×</a>
                    <strong>失败！</strong> <br> <span></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                    <button type="button" class="btn btn-primary" id="edit-info-company">
                        提交更改
                    </button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
        <!--END CONTENT-->
    </div> </div>
<!-- 模态框（Modal）行业选择 -->
<div class="modal fade" id="selectTrade" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="selectTradeLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="selectTradeLabel">
                    企业信息-从事行业-选择
                </h4>
            </div>
            <div class="modal-body">
                <dl class="my-tag-box">
                        <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <dd parent-id="<?php echo $vo['id']; ?>" class="category"><?php echo $vo['name']; ?></dd>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                </dl>
                
            </div><!-- /.modal-content -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
                <button type="button" class="btn btn-primary" id="select-trade">
                    提交更改
                </button>
            </div>
        </div><!-- /.modal -->
        <!--END CONTENT-->
    </div> </div>

  <!--BEGIN FOOTER-->
<div id="footer">
    <div class="copyright">参会去会展活动信息平台 | 京ICP备17039834号-2</div>
</div>
<!--END FOOTER-->
<!--END PAGE WRAPPER-->
</div>
</div>
<script src="/static/home/js/manager/jquery-1.10.2.min.js"></script>
<script src="/static/home/js/manager/jquery-migrate-1.2.1.min.js"></script>
<script src="/static/home/js/manager/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="/static/home/js/manager/bootstrap/js/bootstrap.min.js"></script>
<script src="/static/home/js/manager/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="/static/home/js/manager/html5shiv.js"></script>
<script src="/static/home/js/manager/respond.min.js"></script>
<script src="/static/home/js/manager/metisMenu/jquery.metisMenu.js"></script>
<script src="/static/home/js/manager/slimScroll/jquery.slimscroll.js"></script>
<script src="/static/home/js/manager/jquery-cookie/jquery.cookie.js"></script>
<script src="/static/home/js/manager/iCheck/icheck.min.js"></script>
<script src="/static/home/js/manager/iCheck/custom.min.js"></script>
<script src="/static/home/js/manager/jquery-notific8/jquery.notific8.min.js"></script>
<script src="/static/home/js/manager/jquery-highcharts/highcharts.js"></script>
<script src="/static/home/js/manager/jquery.menu.js"></script>
<script src="/static/home/js/manager/jquery-pace/pace.min.js"></script>
<script src="/static/home/js/manager/holder/holder.js"></script>
<script src="/static/home/js/manager/responsive-tabs/responsive-tabs.js"></script>
<script src="/static/home/js/manager/jquery-news-ticker/jquery.newsTicker.min.js"></script>
<script src="/static/home/js/manager/moment/moment.js"></script>
<script src="/static/home/js/manager/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/static/home/js/manager/bootstrap-daterangepicker/daterangepicker.js"></script>
<!--CORE JAVASCRIPT-->
<script src="/static/home/js/manager/main.js"></script>
<!--LOADING SCRIPTS FOR PAGE-->
<script src="/static/home/js/manager/intro.js/intro.js"></script>
<script src="/static/home/js/layui/layui.js"></script>
<script type="text/javascript" src="/static/home/js/zyupload/zyupload-1.0.0.min.js"></script>
<script src="/static/home/js/manager/calendar/zabuto_calendar.min.js"></script>
<script src="/static/home/js/manager/sco.message/sco.message.js"></script>
<script src="/static/home/js/verification.js"></script>
<script type="text/javascript">
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-145464-14', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>
<script src="/static/home/js/manager/public.js"></script>
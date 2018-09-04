<?php if (!defined('THINK_PATH')) exit(); /*a:10:{s:94:"D:\phpStudy\PHPTutorial\WWW\test.cc\application/../application/index/view/exhibition\myex.html";i:1521700761;s:85:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_header.html";i:1522810289;s:82:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_top.html";i:1523950681;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side0.html";i:1524191072;s:81:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\user-panel.html";i:1523584321;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side1.html";i:1523952896;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side2.html";i:1523953003;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side3.html";i:1523582908;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side4.html";i:1523582916;s:85:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_footer.html";i:1522810294;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="/static/home/css/manager/style.css"/>
<link rel="stylesheet" href="/static/home/css/manager/base/jquery.ui.all.css">
<link rel="stylesheet" href="/static/home/js/wangEditor/css/wangEditor.min.css">
<link href="/static/home/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<style>
    .predestine ,.order{
        display: inline-block;
        margin-bottom: 0;
        font-weight: 400;
        vertical-align: middle;
        cursor: pointer;
    }
    .red-border{ border: 1px solid red; display: inline-block; padding: 5px 15px; position: relative; border-radius: 2px;}
    .red-border span{ position: absolute; right: -3px; top: -10px; color: red; font-size: 12px;}
    .checkbox-condition{
        display: inline-block;
        margin-bottom: 0;
        font-weight: 400;
        vertical-align: middle;
        cursor: pointer;
        margin-right: 10px;
    }
</style>
<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
  <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">用户中心</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li ><a href="#">展会管理</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">我的展会</li>
        </ol>
        <div class="clearfix"></div>
    </div>
        <div class="page-content">
        <div class="all-box fl" style="width: 100%;">
            <div class="main-body">
                <form class="form-inline" action="<?php echo url('exhibition/searchMyEx'); ?>" menthod="post">
                    <div class="form-box">
                        <div class="input-group input-box">
                            <span class="input-group-addon">开&nbsp;&nbsp;始&nbsp;&nbsp;时&nbsp;&nbsp;间&nbsp;&nbsp;：</span>
                            <input class="form-control" id="startdate" name="startime"/>
                        </div>
                        <div class="input-group input-box">
                            <span class="input-group-addon">结&nbsp;&nbsp;束&nbsp;&nbsp;时&nbsp;&nbsp;间&nbsp;&nbsp;：</span>
                            <input class="form-control" id="enddate" name="endtime"/>
                        </div>
                        <div class="input-group input-box">
                            <span class="input-group-addon">关&nbsp;&nbsp;键&nbsp;&nbsp;字&nbsp;&nbsp;查&nbsp;&nbsp;询：</span>
                            <input class="form-control" name="ex_name"/>
                            <span class="input-group-btn">
                                <button class="btn btn-primary search" style="height: 34px !important;">提交</button>
                            </span>
                        </div>
                    </div>
                </form>
                 <!--END TITLE & BREADCRUMB PAGE-->

                <div class="tableall all">
                    <button type="button" class="btn btn-default btn-sm" style="margin:10px 0 5px 0;" disabled="disabled" id="delAll">
                        <span class="glyphicon glyphicon-plus-sign"></span> 删除
                    </button>
                    <table class="table tablelist table-hover table-responsive table-bordered table-striped" style="width: 95%;">
                        <tbody>
                        <tr style="text-align: center;">
                            <th style="width:40px;">
                                <input  type="checkbox" name="selectAll" class="all">
                            </th>
                            <th style="width:230px;">展会名称</th>
                            <th style="width:90px;">展会时间</th>
                            <th>国家</th>
                            <th>城市</th>
                            <th>展馆</th>
                            <th>行业</th>
                            <th>主办方</th>
                            <!--<th>状态</th>-->
                            <th style="width:280px;">操作</th>
                        </tr>
                        <?php if(is_array($data_list) || $data_list instanceof \think\Collection || $data_list instanceof \think\Paginator): $j = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($j % 2 );++$j;?>
                        <tr class="ex_detail">
                            <td style="text-align: center;" class="ex_id">
                                <input class="my_checked" type="checkbox"  name="subcheck" id="<?php echo $vo['id']; ?>">
                            </td>
                            <td class="exname"><?php echo $vo['name']; ?></td>
                            <td>
                                <span><?php echo date("Y-m-d",$vo['startime']); ?></span>
                                <span><?php echo date("Y-m-d",$vo['endtime']); ?></span>
                            </td>
                            <td><?php if($vo['area'] == 0): ?><?php echo $district[0][$vo['city_id']]['country']; else: ?><?php echo $district[1][$vo['city_id']]['country']; endif; ?></td>
                            <td><?php if($vo['area'] == 0): ?><?php echo $district[0][$vo['city_id']]['city']; else: ?><?php echo $district[1][$vo['city_id']]['city']; endif; ?></td>
                            <td><?php echo $vo['venues']; ?></td>
                            <td><?php echo $tpid[$vo['type']]; ?></td>
                            <td><?php echo $vo['organizer']; ?></td>
                            <td>
                                <a href="<?php echo url('detail/index',['id' => $vo['ex_id']]); ?>" class="btn btn-default">查看</a>
                                <?php
                                          if(in_array($vo['ex_id'],$booth_id)){
                                    ?>
                                <button class="btn btn-default custom-width booth" data-toggle="modal" disabled="disabled">发布展位</button>
                                <?php
                                          }else{
                                    ?>
                                <button class="btn btn-default custom-width booth" data-toggle="modal">发布展位</button>
                                <?php
                                          }
                                    
                                          if(in_array($vo['ex_id'],$pt_id)){
                                    ?>
                                <button  class="btn btn-default custom-width pt" data-toggle="modal" disabled="disabled">我的拼团</button>
                                <?php
                                          }else{
                                    ?>
                                <input type="hidden" value="<?php echo $vo['ex_id']; ?>" id="ex_id">
                                <button  class="btn btn-default custom-width pt" data-toggle="modal">我的拼团</button>
                                <?php
                                          }
                                    ?>
                                <a href="javascript:void(0);" class="btn btn-default del">删除</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                        <!--发布展位结束-->
                    </table>
                    <!--分页-->
                    <nav style="text-align: center"><?php echo $page; ?></nav>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!--Model框-->
<!--发布展位-->
<form  id="frm">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" style="width: 63%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">
                                            发布展位
                                        </h4>
                                    </div>

                                    <div class="modal-body" style="height:390px;overflow-y:auto;">
                                        <ul id="boothTab" class="nav nav-tabs posted-nav">
                                            <li class="active"><a href="#boothTab_1" data-toggle="tab">价格管理</a></li>
                                            <li><a href="#boothTab_2" data-toggle="tab">标摊效果图</a></li>
                                            <li><a href="#boothTab_3" data-toggle="tab">展位图</a></li>
                                        </ul>


                                        <div class="tab-content">

                                                <input type="hidden" value="" name="ex_id" class="ex_id">
                                                <div style="margin-top: 10px;"></div>
                                                <div class="tab-pane active" id="boothTab_1">
                                                    <div class="form-group">
                                                        <label class="control-label">展会名称:</label><label class="exname"></label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">发布模式:</label>
                                                                <input type="hidden" name="pattern" value="1">
                                                                <label class="checkbox-inline">
                                                                    <input type="radio" name="line" value="1" checked="checked"><span style="color: red">&nbsp;线上预定</span>
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input type="radio" name="line" value="0"><span style="color: red">&nbsp;线下预定</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="line">
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <div class="form-group">
                                                                    <input type="checkbox" value="1" class="booth">
                                                                    <label class="control-label">注&nbsp;册&nbsp;费&nbsp;&nbsp;:</label>
                                                                    <input name="reg_fee" type="number" class="form-control checkbox-inline" style="width: 125px;" disabled="disabled">
                                                                    <select class="form-control checkbox-inline" style="width: 90px; margin-left: -5px;" name="regfee_cu" disabled="disabled">
                                                                        <option value="1">元</option>
                                                                        <option value="2">美元</option>
                                                                        <option value="3">欧元</option>
                                                                    </select>
                                                                    <label class="control-label">/&nbsp;&nbsp;&nbsp;<span style="color: red">企业</span></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">费用说明:</span>
                                                                    <input type="text" name="reg_desc" class="form-control" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <div class="form-group">
                                                                    <input type="checkbox" class="booth" id="indoor">
                                                                    <label class="control-label">室内光地:</label>
                                                                    <input name="indoor_price" type="number" class="form-control checkbox-inline" style="width: 125px;" disabled="disabled">
                                                                    <select class="form-control checkbox-inline" style="width: 90px; margin-left: -5px;" name="indoor_cu" disabled="disabled">
                                                                        <option value="1">元</option>
                                                                        <option value="2">美元</option>
                                                                        <option value="3">欧元</option>
                                                                    </select>
                                                                    <label class="control-label">/</label>
                                                                    <select  class="form-control checkbox-inline" style="width: 120px;" name="indoor_au" disabled="disabled">
                                                                        <option value="4">平方米</option>
                                                                        <option value="5">平方英尺</option>
                                                                        <option value="6">企业</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group indoor" style="display: none">
                                                                    <a href="javascript:void(0)" class="addIndoorArea" style="color: blue;text-decoration: none;">增加室内光地可预定面积</a>
                                                                </div>
                                                                <div class="form-group indoorArea"></div>
                                                                <input type="hidden" name="indoor_area" id="indoorArea" disabled="disabled" value="">
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">预定说明:</span>
                                                                    <input name="indoor_desc" type="text" class="form-control" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <div class="form-group">
                                                                    <input type="checkbox" class="booth" id="stand">
                                                                    <label class="control-label">标准摊位:</label>
                                                                    <input name="stand_price" type="number" class="form-control checkbox-inline" style="width: 125px;" disabled="disabled">
                                                                    <select class="form-control checkbox-inline" style="width: 90px; margin-left: -5px;" name="stand_cu" disabled="disabled">
                                                                        <option value="1">元</option>
                                                                        <option value="2">美元</option>
                                                                        <option value="3">欧元</option>
                                                                    </select>
                                                                    <label class="control-label">/</label>
                                                                    <select class="form-control checkbox-inline"style="width: 120px;" name="stand_au" disabled="disabled">
                                                                        <option value="4">平方米</option>
                                                                        <option value="5">平方英尺</option>
                                                                        <option value="6">企业</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group stand" style="display: none">
                                                                    <a href="javascript:void(0)" class="addStandArea" style="color: blue;text-decoration: none;">增加标准摊位可预定面积</a>
                                                                </div>
                                                                <div class="form-group StandArea"></div>
                                                                <input type="hidden" name="stand_area" id="StandArea" disabled="disabled" value="">
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">预定说明:</span>
                                                                    <input name="stand_desc" type="text" placeholder="比如最小预定面积" class="form-control" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <div class="form-group">
                                                                    <input type="checkbox" class="booth" id="outdoor">
                                                                    <label class="control-label">室外光地:</label>
                                                                    <input name="outdoor_price" type="number" class="form-control checkbox-inline" style="width: 125px;" disabled="disabled">
                                                                    <select class="form-control checkbox-inline" style="width: 90px; margin-left: -5px;" name="outdoor_cu" disabled="disabled">
                                                                        <option value="1">元</option>
                                                                        <option value="2">美元</option>
                                                                        <option value="3">欧元</option>
                                                                    </select>
                                                                    <label class="control-label">/</label>
                                                                    <select class="form-control checkbox-inline" style="width: 120px;" name="outdoor_au" disabled="disabled">
                                                                        <option value="4">平方米</option>
                                                                        <option value="5">平方英尺</option>
                                                                        <option value="6">企业</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group outdoor" style="display: none">
                                                                    <a href="javascript:void(0)" class="addOutdoorArea" style="color: blue;text-decoration: none;">增加室外光地可预定面积</a>
                                                                </div>
                                                                <div class="form-group outdoorArea"></div>
                                                                <input type="hidden" name="outdoor_area" id="outdoorArea" disabled="disabled" value="">
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">预定说明:</span>
                                                                    <input name="outdoor_desc" type="text" placeholder="比如最小预定面积" class="form-control" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <div class="form-group">
                                                                    <input type="checkbox" class="booth">
                                                                    <label class="control-label">其他费用:</label>
                                                                    <input class="form-control checkbox-inline" name="other_fee" type="number" style="width: 125px;" disabled="disabled">
                                                                    <select class="form-control checkbox-inline" name="other_cu" style="width: 90px; margin-left: -5px;" disabled="disabled">
                                                                        <option value="1">元</option>
                                                                        <option value="2">美元</option>
                                                                        <option value="3">欧元</option>
                                                                    </select>
                                                                    <label class="control-label">/</label>
                                                                    <select class="form-control checkbox-inline" name="other_au" style="width: 120px;" disabled="disabled">
                                                                        <option value="4">平方米</option>
                                                                        <option value="5">平方英尺</option>
                                                                        <option value="6">企业</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">费用说明:</span>
                                                                    <input type="text" name="otherfee_desc" class="form-control" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label><span style="color:red;">*</span>标摊配置:</label>
                                                            <textarea id="boothDesc" placeholder="标摊配置" class="form-control" name="stand_config" id="stand_config"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                <span style="color:red;">*</span>价格说明:
                                                            </label>
                                                            <textarea name="price_desc" rows=2 id="priceDesc" placeholder="开口费" class="form-control"></textarea>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">是否&nbsp;提供随&nbsp;团&nbsp;服务&nbsp;:</label>
                                                                    <input type="hidden" name="is_pt" value="0">
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="provideTravel" value="1" >是
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="provideTravel" value="0" checked="checked">否
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row bindTravel" style="display: none"><div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">是&nbsp;&nbsp;否&nbsp;&nbsp;要&nbsp;&nbsp;求&nbsp;&nbsp;随&nbsp;&nbsp;团&nbsp;:</label>
                                                                <input type="hidden" name="is_ct" value="0">
                                                                <label class="checkbox-inline">
                                                                    <input type="radio" name="bindTravel" value="1">是
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input type="radio" name="bindTravel" value="0" checked="checked">否
                                                                </label>
                                                                <a href="javascript:" style="margin-left: 10px; color: green;">绑定拼团</a>
                                                            </div></div></div>
                                                        <div class="row chargeManagementFee" style="display: none"><div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">是否收取脱团管理费:</label>
                                                                <input type="hidden" name="is_dt" value="0">
                                                                <label class="checkbox-inline">
                                                                    <input type="radio" name="chargeManagementFee" value="1">是</label>
                                                                <label class="checkbox-inline">
                                                                    <input type="radio" name="chargeManagementFee" value="0" checked="checked">否
                                                                </label>
                                                                <div class="form-group managementFee" style="display: none;float:right;">
                                                                    <label class="control-label">脱团管理费:</label> <input name="dt_managerfee" type="number" class="form-control checkbox-inline " disabled="disabled" style="width: 125px;">
                                                                    <label class="control-label">元/企业</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">是&nbsp;&nbsp;否&nbsp;&nbsp;要&nbsp;&nbsp;求&nbsp;&nbsp;搭&nbsp;&nbsp;展&nbsp;:</label>
                                                                    <input type="hidden" name="is_ts" value="0">
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="bindBooth" value="1">是
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="bindBooth" value="0" checked="checked">否
                                                                    </label>
                                                                    <a href="javascript:" style="margin-left: 10px; color: green;display:none;" class="bindBooth">绑定展位</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>补贴说明:</label>
                                                            <textarea rows=2 placeholder="补贴说明" class="form-control" name="subsidy_desc"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>其他说明:</label>
                                                            <input type="hidden" name="other_desc">
                                                            <div id="otherInfo">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group describe" style="display: none">
                                                        <label><span style="color:red;">*</span>详细描述:</label>
                                                        <textarea  placeholder="请输入详细信息" class="form-control" name="describe"></textarea>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="boothTab_2">

                                                    <input id="stand_pic" name="stand_pic" type="file" multiple>
                                                </div>
                                                <div class="tab-pane" id="boothTab_3">
                                                    <input type="checkbox" class="travel-source is_presell">&nbsp;&nbsp;预售<br/>
                                                    <input type="hidden" value="1" name="is_presell" disabled="disabled">
                                                    展位说明:
                                                    <textarea  rows="1" placeholder="请输入展位说明" class="form-control" name="booth_desc"></textarea>
                                                    <div class="zw-sm" style="margin-top: 5px">
                                                        <input id="booth_pic" name="booth_pic" type="file" multiple></div>

                                                </div>

                                        </div>

                                    </div>
                                    <div class="alert alert-danger boothAlert" id="boothAlert" style="display: none;">
                                        <a href="javascript:void(0);" class="boothAlert close">×</a>
                                        <strong>失败！</strong> <br> <span></span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                        <button type="button" class="btn btn-success" data-dismiss="modal">保存</button>
                                        <button type="button" class="btn btn-primary subbooth">
                                            保存并提交
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <!---IndoorArea-->
                        <div class="modal fade" id="myAera" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" style="width: 20%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">×
                                        </button>
                                        <h4 class="modal-title">
                                            请输入可预定面积(数字或其他)
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group input-medium error-info" style="display:none;">
                                            <div class="alert alert-danger">请输入有效可预订面积</div>
                                        </div>
                                        <div class="input-group input-medium">
                                            <span class="input-group-addon">面积: </span>
                                            <input name="indoorAera" class="form-control" placeholder="其他"  type="text">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                                data-dismiss="modal">关闭
                                        </button>
                                        <button type="button" class="btn btn-primary addIndoorAera">
                                            确定
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---StandArea-->
                        <div class="modal fade" id="myAera1" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" style="width: 20%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">×
                                        </button>
                                        <h4 class="modal-title">
                                            请输入可预定面积(数字或其他)
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group input-medium error-info" style="display:none;">
                                            <div class="alert alert-danger">请输入有效可预订面积</div>
                                        </div>
                                        <div class="input-group input-medium">
                                            <span class="input-group-addon">面积: </span>
                                            <input name="StandAera" class="form-control" placeholder="其他"  type="text">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                                data-dismiss="modal">关闭
                                        </button>
                                        <button type="button" class="btn btn-primary addStandAera">
                                            确定
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---OutdoorArea-->
                        <div class="modal fade" id="myAera2" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" style="width: 20%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">×
                                        </button>
                                        <h4 class="modal-title">
                                            请输入可预定面积(数字或其他)
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group input-medium error-info" style="display:none;">
                                            <div class="alert alert-danger">请输入有效可预订面积</div>
                                        </div>
                                        <div class="input-group input-medium">
                                            <span class="input-group-addon">面积: </span>
                                            <input name="OutdoorArea" class="form-control" placeholder="其他"  type="text">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                                data-dismiss="modal">关闭
                                        </button>
                                        <button type="button" class="btn btn-primary addOutdoorAera">
                                            确定
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
<!--发布拼团-->
                        <div class="modal fade" id="myGroup" tabindex="-1" role="dialog" data-backdrop="static" style="padding-left: 17px;">
                            <div class="modal-dialog" role="document" style="width: 67%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title">发布拼团</h4>
                                    </div>
                                    <div class="modal-body" style="height:400px;overflow-y:auto;">
                                        <ul id="travelTab" class="nav nav-tabs">
                                            <li class="active"><a href="#travelTab_1" data-toggle="tab">基本信息</a></li>
                                            <li><a href="#travelTab_2" data-toggle="tab">行程介绍</a></li>
                                            <li><a href="#travelTab_3" data-toggle="tab">行程图片</a></li>
                                            <li><a href="#travelTab_4" data-toggle="tab">费用说明</a></li>
                                            <li><a href="#travelTab_5" data-toggle="tab">预定须知</a></li>
                                        </ul>

                                            <div class="tab-content">

                                                <div style="margin-top: 10px;"></div>
                                                <div class="tab-pane active" id="travelTab_1">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">发布模式:</label>
                                                                <label class="checkbox-inline"><input value="1"  type="radio" name="myGroupattern" checked>已定</label>
                                                                <label class="checkbox-inline"><input value="2"  type="radio" name="myGroupattern">预计</label>
                                                                <br><br>
                                                                <label class="control-label">出发城市:</label>
                                                                <input type="hidden" name="setoffCitys">
                                                                <input type="hidden" id="is_other" value="0">
                                                                <input type="hidden" name="otherCity">
                                                                <div  class="predestine" style="display:none">
                                                                    <label class="checkbox-inline">
                                                                        <input value="北京" class="travel-city" type="checkbox" name="setoffCity">北京
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input value="上海" class="travel-city" type="checkbox" name="setoffCity">上海
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input value="广州" class="travel-city" type="checkbox" name="setoffCity">广州
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input value="深圳" class="travel-city" type="checkbox" name="setoffCity">深圳
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input value="香港" class="travel-city" type="checkbox" name="setoffCity">香港
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input value="other" class="travel-city" type="checkbox" name="setoffCity">其他
                                                                    </label>
                                                                </div>
                                                                <div  class="order" >
                                                                    <label class="checkbox-inline">
                                                                        <input value="北京" class="travel-city" type="radio" name="setoffCity">北京
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input value="上海" class="travel-city" type="radio" name="setoffCity">上海
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input value="广州" class="travel-city" type="radio" name="setoffCity">广州
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input value="深圳" class="travel-city" type="radio" name="setoffCity">深圳
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input value="香港" class="travel-city" type="radio" name="setoffCity">香港
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input value="other" class="travel-city" type="radio" name="setoffCity">其他
                                                                    </label>
                                                                </div>
                                                                <label class="checkbox-inline">
                                                                    <input class="form-control" id="travelOtherSource"  placeholder="请输入出发城市" style="display: none;" type="text">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">目的城市:</label>
                                                                <input class="form-control" type="text" name="destination_city" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group input-group input-medium date-picker input-daterange" data-date-format="yyyy-mm-dd">
                                                                <label class="control-label">出发日期:</label> <input class="form-control" type="text" id="setoff" name="setoffdate">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">时间安排:</label>
                                                                <div class="input-group input-medium">
                                                                    <input class="form-control" type="number" id="dayCount">
                                                                    <span class="input-group-addon">天</span>
                                                                    <input class="form-control" type="number" id="nightCount">
                                                                    <span class="input-group-addon">晚</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">服务包含:</label><br>
                                                                <label class="checkbox-inline">
                                                                    <input value="机票" class="travel-service" type="checkbox">机票
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input value="酒店" class="travel-service" type="checkbox">酒店
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input value="境外交通" class="travel-service" type="checkbox">境外交通
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input value="司机" class="travel-service" type="checkbox">司机
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input value="导游" class="travel-service" type="checkbox">导游
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input value="小费" class="travel-service" type="checkbox">小费
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input value="签证" class="travel-service" type="checkbox">签证
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input value="景点门票" class="travel-service" type="checkbox">景点门票
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">本地参团:</label><br>
                                                                <label class="checkbox-inline">
                                                                    <input name="isLocal" value="1"  type="radio">是
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input name="isLocal" value="0"  type="radio" checked>否
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group localDelegation" style="display: none;float: right">
                                                                <label class="control-label">本地参团人员费:</label><br>
                                                                <div class="input-group input-medium">
                                                                    <input class="form-control" type="number" id="localPrice">
                                                                    <span class="input-group-addon">元/人</span>
                                                                </div>
                                                            </div></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label" title="提供完整服务的价格">标准人员费:</label>
                                                                <div class="input-group input-medium">
                                                                    <input class="form-control" type="number" id="adultPrice">
                                                                    <span class="input-group-addon">元/人</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group" style="float: right">
                                                                <label class="control-label">单间差:</label>
                                                                <div class="input-group input-medium">
                                                                    <input class="form-control" type="number" id="roomDifference">
                                                                    <span class="input-group-addon">元/人</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">折扣范围:</label>
                                                                <label class="checkbox-inline">
                                                                    <input placeholder="折扣有效范围1~99" class="form-control" type="number" id="discountRate">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="travelTab_2">
                                                    <div class="panel-group trip" id="accordion" role="tablist">
                                                    </div>
                                                    <button type="button" class="btn btn-info trip-btn" style="margin-bottom: 10px">增加行程</button>
                                                </div>
                                                <div class="tab-pane" id="travelTab_3">
                                                    <div class="up-box">
                                                        <input title="上传图片" multiple="true"  id="strokeImg" type="file" name="stroke_pictures">
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="travelTab_4">
                                                    <div class="form-group">
                                                        <a href="#">点击查看示例:</a>
                                                        <div id="fee_introduce"></div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="travelTab_5">
                                                    <div class="form-group">
                                                            <a href="#">点击查看示例:</a>
                                                            <div id="book_notice"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="alert alert-danger ptAlert" id="ptAlert" style="display: none;">
                                        <a href="javascript:void(0);" class="ptAlert close">×</a>
                                        <strong>失败！</strong> <br> <span></span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                        <button type="button" class="btn btn-primary" id="btnSave-pt">保存</button>
                                    <button type="button" class="btn btn-success" id="btnSubmit-pt">保存并提交</button>
                                    </div>
                                    </div>
                                </div>
                        </div>
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
<script src="/static/home/js/fileinput.js" type="text/javascript"></script>
<script src="/static/home/js/fileinput_locale_zh.js" type="text/javascript"></script>
<script type="text/javascript" src="/static/home/js/manager/jquery-ui-1.8.21.custom.min.js" ></script>
<script type="text/javascript" src="/static/home/js/manager/jquery.ui.datepicker-zh-CN.js" ></script>
<script type="text/javascript" src="/static/home/js/myex.js"></script>
<script type="text/javascript" src="/static/home/js/wangEditor/js/wangEditor.min.js"></script>
<script type="text/javascript" src="/static/home/js/booth.js" ></script>
<script type="text/javascript" src="/static/home/js/pt.js" ></script>

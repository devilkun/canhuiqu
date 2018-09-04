<?php if (!defined('THINK_PATH')) exit(); /*a:10:{s:95:"D:\phpStudy\PHPTutorial\WWW\test.cc\application/../application/index/view/exhibition\lists.html";i:1523327685;s:85:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_header.html";i:1522810289;s:82:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_top.html";i:1523950681;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side0.html";i:1524191072;s:81:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\user-panel.html";i:1523584321;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side1.html";i:1523952896;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side2.html";i:1523953003;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side3.html";i:1523582908;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side4.html";i:1523582916;s:85:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_footer.html";i:1522810294;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="/static/home/css/manager/bootstrap.css"/>
<link rel="stylesheet" href="/static/home/css/manager/base/jquery.ui.all.css">
<style media="screen">
  .no-data{width:100%; background:#fff; clear:both; border:1px solid #cfcfcf; padding: 20px; font-size: 16px; font-weight: bold; color: red}
</style>
<!--BEGIN PAGE WRAPPER-->
 <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <ol class="breadcrumb page-breadcrumb pull-left">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">用户中心</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                         <li ><a href="#">展会管理</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">展会列表</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <div class="page-content">
            <div class="all-box fl" style="width: 100%;">
            <div class="main-body">
                <form class="form-inline" action="<?php echo url('exhibition/searchEx'); ?>" method="post">
                    <div class="form-box">
                        <div class="input-group input-box">
                            <span class="input-group-addon">展&nbsp;&nbsp;会&nbsp;&nbsp;名&nbsp;&nbsp;称&nbsp;&nbsp;：</span>
                            <input class="form-control" name="ex_name"/>
                        </div>
                        <div class="input-group input-box">
                            <span class="input-group-addon">展&nbsp;&nbsp;馆&nbsp;&nbsp;名&nbsp;&nbsp;称&nbsp;&nbsp;：</span>
                            <input class="form-control" name="ex_venues"/>
                        </div>
                         <div class="input-group input-box">
                            <span class="input-group-addon">所&nbsp;&nbsp;属&nbsp;&nbsp;行&nbsp;&nbsp;业&nbsp;&nbsp;：</span>
                            <select class="form-control" style="width: 238px; float: left;" name="ex_type">
                                <option value="" class="" selected="selected">-- 请选择 --</option>
                                <?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tp): $mod = ($i % 2 );++$i;if($tp['pid'] == 0): ?>
                                <option label="<?php echo $tp['name']; ?>" value="<?php echo $tp['id']; ?>"><?php echo $tp['name']; ?></option>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                        <div class="input-group input-box">
                            <span class="input-group-addon">开&nbsp;&nbsp;始&nbsp;&nbsp;时&nbsp;&nbsp;间&nbsp;&nbsp;：</span>
                            <input class="form-control" id="startdate" name="startime"/>
                        </div>
                        <div class="input-group input-box">
                            <span class="input-group-addon">结&nbsp;&nbsp;束&nbsp;&nbsp;时&nbsp;&nbsp;间&nbsp;&nbsp;：</span>
                            <input class="form-control" id="enddate" name="endtime"/>
                        </div>
                        <div class="input-group input-box">
                            <span class="input-group-addon">主&nbsp;&nbsp;&nbsp;&nbsp;办&nbsp;&nbsp;&nbsp;&nbsp;方&nbsp;&nbsp;&nbsp;&nbsp;：</span>
                            <input class="form-control" name="organizer"/>
                            <span class="input-group-btn">
                                <button class="btn btn-primary search" style="height: 34px !important;">查询</button>
                            </span>
                        </div>
                    </div>
                </form>
                <!--<div class="no-data" style="margin-top: 10px;display:none;">没有满足条件的数据，请重新选择查询条件！</div>-->
                <!--<div class="tableall search"></div>-->
                <div class="tableall all">
                    <button type="button" class="btn btn-default btn-sm" style="margin:10px 0 5px 0;" disabled="disabled" id="add">
                        <span class="glyphicon glyphicon-plus-sign"></span> 添加到我的展会
                    </button>
                    <table class="table tablelist table-hover table-responsive table-bordered table-striped" style="width: 98%;">
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
                                <th style="width:190px;">操作</th>
                            </tr>
                            <?php if(is_array($data_list) || $data_list instanceof \think\Collection || $data_list instanceof \think\Paginator): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <tr class="ex_detail">
                                <td style="text-align: center;">
                                  <?php
                                        if(in_array($vo['id'],$myex)){
                                  ?>
                                    <input class="my_checked" type="checkbox"  name="subcheck" id="<?php echo $vo['id']; ?>" disabled="disabled">
                                    <?php
                                          }else{
                                    ?>
                                    <input class="my_checked" type="checkbox"  name="subcheck" id="<?php echo $vo['id']; ?>" >
                                    <?php
                                          }
                                    ?>
                                 </td>
                                <td><?php echo $vo['name']; ?></td>
                                <td>
                                    <span><?php echo date("Y-m-d",$vo['startime']); ?></span>
                                    <span><?php echo date("Y-m-d",$vo['endtime']); ?></span>
                                </td>
                                <td><?php if($vo['area'] == 0): ?><?php echo $district[0][$vo['city_id']]['country']; else: ?><?php echo $district[1][$vo['city_id']]['country']; endif; ?></td>
                                <td><?php if($vo['area'] == 0): ?><?php echo $district[0][$vo['city_id']]['city']; else: ?><?php echo $district[1][$vo['city_id']]['city']; endif; ?></td>
                                <td><?php echo $vo['venues']; ?></td>
                                <td><?php echo $tpid[$vo['type']]; ?></td>
                                <td><?php echo $vo['organizer']; ?></td>
                                <!--<td></td>-->
                                <td>
                                    <a href="<?php echo url('detail/index',['id' => $vo['id']]); ?>" class="btn btn-default">查看</a>
                                    <?php
                                          if(in_array($vo['id'],$myex)){
                                    ?>
                                             <button class="btn btn-primary custom-width" id="<?php echo $vo['id']; ?>" disabled="true">已添加我的展会</button>
                                    <?php
                                          }else{
                                    ?>
                                             <button class="btn btn-primary custom-width myex" id="<?php echo $vo['id']; ?>">添加到我的展会</button>
                                    <?php
                                          }
                                    ?>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <!--分页-->
                    <nav style="text-align: center"><?php echo $page; ?></nav>
                </div>

            </div>

        </div>
                <!--END CONTENT-->
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
<script type="text/javascript" src="/static/home/js/manager/bootstrap.js" ></script>
<!--日历控件-->
<script type="text/javascript" src="/static/home/js/manager/jquery.ui.datepicker-zh-CN.js" ></script>
<script type="text/javascript" src="/static/home/js/manager/jquery-ui-1.8.21.custom.min.js" ></script>
<script type="text/javascript" src="/static/home/js/doex.js" ></script>

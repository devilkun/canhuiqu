<?php if (!defined('THINK_PATH')) exit(); /*a:10:{s:97:"D:\phpStudy\PHPTutorial\WWW\test.cc\application/../application/index/view/user\certification.html";i:1523434804;s:85:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_header.html";i:1522810289;s:82:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_top.html";i:1523950681;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side0.html";i:1524191072;s:81:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\user-panel.html";i:1523584321;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side1.html";i:1523952896;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side2.html";i:1523953003;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side3.html";i:1523582908;s:84:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_side4.html";i:1523582916;s:85:"D:\phpStudy\PHPTutorial\WWW\test.cc\application\index\view\Public\manager_footer.html";i:1522810294;}*/ ?>
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
<link rel="stylesheet" href="/static/home/css/manager/base/jquery.ui.all.css">
<link rel="stylesheet" href="/static/home/css/style.css">
<link rel="stylesheet" type="text/css" href="/static/home/css/bootstrap.min.css"/>
<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
	<!--BEGIN TITLE & BREADCRUMB PAGE-->
	<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
		<ol class="breadcrumb page-breadcrumb pull-left">
			<li><i class="fa fa-home"></i>&nbsp;<a href="index.html">用户中心</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li ><a href="#">账号中心</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li class="active">服务资质</li>
		</ol>
		<div class="clearfix"></div>
	</div>
	<!--END TITLE & BREADCRUMB PAGE-->
		<div class="main-body" style="background: #ededed;">
			<div class="qualification-box">
				<ul id="myTab_Info" class="nav nav-tabs" style="float: left;">
					<li class="active blicense"><a href="#info_1" data-toggle="tab">营业执照</a></li>
					<li class="opermit"><a href="#info_2" data-toggle="tab">开户许可证</a></li>
					<li><a href="#info_3" data-toggle="tab">服务资质</a></li>
				</ul>
				<button class="btn btn-primary" data-toggle="modal" data-target="#edit-box" style="float:right;">编辑</button>
			</div>
			<!--上传资质弹出框-->
			<div class="modal fade" id="edit-box" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width: 65%;">
					<form id="frm">
					<div class="modal-content">

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								&times;
							</button>
							<h4 class="modal-title" id="myModalLabel">
								服务资质
							</h4>
						</div>
						<div class="modal-body" style="overflow-y: auto; max-height: 400px;">
							<ul id="myTab" class="nav nav-tabs">
								<li class="active" ><a href="#tab_1" data-toggle="tab">营业执照</a></li>
								<li><a href="#tab_2" data-toggle="tab">开户许可证</a></li>
								<li><a href="#tab_3" data-toggle="tab">公司信息</a></li>
								<li><a href="#tab_4" data-toggle="tab">智能审核</a></li>
								<li><a href="#tab_5" data-toggle="tab">服务资质</a></li>
							</ul>
							<div class="tab-content edit">
								
								<div class="tab-pane active" id="tab_1">
									<input type="hidden" name="blicense" id="blicense" value="<?php echo $data['blicense']; ?>">
									<div class="layui-upload">
										<button type="button" class="layui-btn" id="test1">上传图片</button>
										<div class="layui-upload-list">
											<img class="layui-upload-img"  id="demo1" style="width: 251px;height: 251px;" src="<?php echo get_file_path($data['blicense']); ?>">
											<p id="demoText"></p>
										</div>
									</div>

								</div>
								<div class="tab-pane" id="tab_2">
									<input type="hidden" name="opermit" id="opermit" value="<?php echo $data['opermit']; ?>">
									<div class="layui-upload">
										<button type="button" class="layui-btn" id="test2">上传图片</button>
										<div class="layui-upload-list" >
											<img class="layui-upload-img"  id="demo2" style="width: 251px;height: 251px;" src="<?php echo get_file_path($data['opermit']); ?>">
											<p id="demoText"></p>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab_3">
									<div class="panel-group">
										<label class="layui-form-label">公司名称</label>
										<div class="layui-input-inline" style="width:400px">
											<input type="text" name="company" autocomplete="off" placeholder="请输入展会名称" class="layui-input"
												   lay-verify="company"  id="company" value="<?php echo $data['company']; ?>">
										</div>
									</div>
									<div class="panel-group">
										<label class="layui-form-label">联系方式</label>
										<div class="layui-input-inline" style="width:400px">
											<input type="text" name="telephone" autocomplete="off" placeholder="请输入联系方式" class="layui-input"
												   lay-verify="telephone"  id="telephone" value="<?php echo $data['telephone']; ?>">
										</div>
									</div>
									<div class="panel-group">
										<label class="layui-form-label">企业&nbsp;&nbsp;QQ</label>
										<div class="layui-input-inline" style="width:400px">
											<input type="text" name="qq" autocomplete="off" placeholder="请输入企业QQ" class="layui-input"
												   lay-verify="qq"  id="qq" value="<?php echo $data['qq']; ?>">
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab_4">
									<div class="panel-group" style="min-height: 60px">
										<label class="layui-form-label">审核信息</label>
										<div class="layui-input-inline" style="width:400px">
											<input type="text" name="check_info" autocomplete="off" placeholder="企业名称/注册号/统一社会信用代码任选一种" class="layui-input"
												   lay-verify="check-info"  id="check-info" value="">
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab_5">
									<div class="panel-group">
										<?php if(is_array($certifications) || $certifications instanceof \think\Collection || $certifications instanceof \think\Paginator): $i = 0; $__LIST__ = $certifications;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vcer): $mod = ($i % 2 );++$i;?>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="sc-font">服务资质 --- <?php echo $vcer['name']; ?></a>
												</h4>
											</div>
										</div>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
							<button type="button" class="btn btn-primary submit-upload-edit">提交更改</button>
						</div>

					</div>
					</form>
				</div>
			</div>
			<div class="tab-content zz-picbox">
				<div class="pan tab-pane active" id="info_1">
					<img src="<?php echo get_file_path($data['blicense']); ?>" width="300" >
				</div>
				<div class="pan tab-pane" id="info_2">
					<img src="<?php echo get_file_path($data['opermit']); ?>" width="300" >
				</div>
				<div class="pan tab-pane" id="info_3">
					<div class="panel-group" id="accordion">
						<?php if(is_array($certifications) || $certifications instanceof \think\Collection || $certifications instanceof \think\Paginator): $i = 0; $__LIST__ = $certifications;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vcer): $mod = ($i % 2 );++$i;?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="sc-font">服务资质 --- <?php echo $vcer['name']; ?></a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-4"><strong>状态:</strong><?php if($vcer['status']==1): ?><span style="color: green">认证成功</span><?php else: ?><span style="color: red">未认证<?php endif; ?></span> </div>
										<div class="col-md-4"><strong>审核人: </strong><?php echo $vcer['username']; ?> </div>
										<div class="col-md-4"><strong>审核时间:</strong><?php if($vcer['checktime']==0): ?>请耐心等待<?php else: ?><?php echo date("Y-m-d H:i",$vcer['checktime']); endif; ?></div>
									</div>
									<div class="row">
										<div class="col-md-4"><strong>处理意见:</strong><?php if($vcer['remarks']==""): ?>暂无<?php else: ?><?php echo $vcer['remarks']; endif; ?></div>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
			</div>
		<!--END CONTENT-->
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
<script>
    layui.use(['upload','layer'], function(){
        var $ = layui.jquery
            ,layer = layui.layer
            ,upload = layui.upload;

        //营业执照上传
        var uploadInst = upload.render({
            elem: '#test1'
            ,url: 'ajax_uploads_blicense'
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#demo1').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                $("#blicense").val(res);
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });
        
        //开户许可证上传
        var uploadInst1 = upload.render({
            elem: '#test2'
            ,url: 'ajax_uploads_opermit'
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#demo2').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                $("#opermit").val(res);
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst1.upload();
                });
            }
        });
        $(".submit-upload-edit").click(function(){
            var blicense = $('#blicense').val();
            var opermit =$('#opermit').val();
            var company =$('#company').val();
            var numbers = /^((0\d{2,3}-\d{7,8})|(1[3584]\d{9}))$/;
            var QQ =/[1-9][0-9]{4,14}/;
            var telephone=$("#telephone").val();
            var qq = $("#qq").val();
            var check_info = $("#check-info").val();
            if(blicense==''){
                $('#myTab a[href="#tab_1"]').tab('show');
                layer.msg('请上传营业执照！');
                return false;
			}
			if(opermit==""){
                $('#myTab a[href="#tab_2"]').tab('show');
                layer.msg('请上传开户许可证！');
                return false;
			}
			if(company==""){
                $('#myTab a[href="#tab_3"]').tab('show');
			    $("#company").focus();
                layer.msg('请正确填写公司名称！');
                return false;
			}
			if(!numbers.test(telephone) || telephone==""){
                $('#myTab a[href="#tab_3"]').tab('show');
                $("#telephone").focus();
                layer.msg('请正确填写联系方式！');
                return false;
			}
            if(!QQ.test(qq)||qq=="" ){
                $('#myTab a[href="#tab_3"]').tab('show');
                $("#qq").focus();
                layer.msg('请正确填写企业QQ！');
                return false;
            }
            if(check_info==""){
                $('#myTab a[href="#tab_4"]').tab('show');
                $("#check-info").focus();
                layer.msg('请填写智能审核信息！');
                return false;
			}
                $.ajax({
                    url: "subFrom",
                    type: "POST",
                    dataType: "json",
                    data:$('form').serialize(),
                    success: function (data) {
                        console.log(data);
                        if(data.status==1){
                            layer.msg('资质初审成功！');
                            $(location).attr('href', '/user/certification');
						}
						if(data.status==2){
                            layer.msg('审核失败,请核查审核信息是否正确！');
						}
						if(data.status==0){
                            layer.msg('暂无数据更改！');
						}

                    }
                });


        });
    });

</script>

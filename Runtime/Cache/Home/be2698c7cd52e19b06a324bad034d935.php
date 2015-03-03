<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/font-awesome.css?v=<?php echo SITE_VERSION;?>" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/mobile_module.css?v=<?php echo SITE_VERSION;?>" media="all">
    <script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/prefixfree.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/m/dialog.js?v=<?php echo SITE_VERSION;?>"></script>
    <script type="text/javascript" src="/Public/Home/js/m/flipsnap.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/m/mobile_module.js?v=<?php echo SITE_VERSION;?>"></script>
    <script type="text/javascript" src="/Public/Home/js/admin_common.js?v=<?php echo SITE_VERSION;?>"></script>
	<title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <meta content="telephone=no, address=no" name="format-detection">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="shortcut icon" href="<?php echo SITE_URL;?>/favicon.ico">
</head>	
<link href="<?php echo ADDON_PUBLIC_PATH;?>/userCenter.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">

<body>
	<div class="container">
    	<div class="box user_box">
        	<div class="head"><img src="<?php echo ADDON_PUBLIC_PATH;?>/head.jpg"/></div>
            <p><strong>刘备</strong></p>
            <p><span>GID:</span> 123456</p>
            <p><span>部门:</span> 军事主治</p>
            <a class="edit" href="#" title="编辑"><img src="/Public/Home/images/m/icon_pencil.png" width="30" width="30"/></a>
        </div>
        <div class="box">
        	<h6>用户总积分:3000</h6>
            <a class="item" href="#">
            	<span class="td title">班级积分</span>
                <span class="td count">120</span>
                <span class="td to">查看详情&gt; </a>
            </a>
            <a class="item" href="#">
            	<span class="td title">班级积分</span>
                <span class="td count">120</span>
                <span class="td to">查看详情&gt; </a>
            </a>
            <a class="item" href="#">
            	<span class="td title">班级积分</span>
                <span class="td count">120</span>
                <span class="td to">查看详情&gt; </a>
            </a>
        </div>
        <div class="box">
        	<h6>参加过的投票</h6>
            <a class="item" href="#">
            	<span class="td title">WeiPHP发展现状</span>
                <span class="td count">&nbsp;</span>
                <span class="td to">查看详情&gt; </a>
            </a>
            <a class="item" href="#">
            	<span class="td title">WeiPHP发展现状</span>
                <span class="td count">>&nbsp;</span>
                <span class="td to">查看详情&gt; </a>
            </a>
        </div>
        <div class="box">
        	<h6>参加的抽奖</h6>
            <a class="item" href="#">
            	<span class="td title">幸运大抽奖</span>
                <span class="td count">&nbsp;</span>
                <span class="td to">查看详情&gt; </a>
            </a>
            <a class="item" href="#">
            	<span class="td title">幸运大抽奖</span>
                <span class="td count">>&nbsp;</span>
                <span class="td to">查看详情&gt; </a>
            </a>
        </div>
        <!--
        <div class="unbind">
        	<p>你还没绑定用户信息！</p>
            <p><a class="btn" href="#">马上去绑定</a></p>
        </div>
        -->
    </div>
</body>
</html>
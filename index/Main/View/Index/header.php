<?php use Sys\P; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>{$page_title}</title>
<meta name="keywords" content="" />
<meta name="description" content=""/>
<link href="__HTML__/css/style.css?v=1.2" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__HTML__/js/jquery.min.js"></script>
<script type="text/javascript" src="__HTML__/js/jquery.cookie.min.js"></script>
<script type="text/javascript" src="__HTML__/js/jquery.SuperSlide.2.1.2.js"></script>
<script type="text/javascript" src="__HTML__/com/laydate/laydate.js"></script>
<script type="text/javascript" src="__HTML__/js/jquery.sticky-kit.js"></script>
<script type="text/javascript" src="__HTML__/js/Validform_v5.3.2.js"></script>
<script type="text/javascript" src="__HTML__/js/commen.js"></script>
</head>


<body>
<div class="unbox">
    <div class="content header">
        <div class="logo"></div>
        <div class="slogan"></div>
        <div class="search">
            <div class="usertext">
                <span class="lf"><a href="http://kjlm.kexueyou.com/" target="_blank">科教联盟介绍</a></span>
                
                <if condition="cookie('username')">
                    <span class="us"> <a class="sch_name" href="{:U('Member/index')}">{:cookie('username')}</a>  / <a href="{:U('Login/loginOut')}">注销</a></span>
                <else />
                	<span class="cc"><a href="{:U('Index/register')}">用户注册说明</a></span>
                    <span class="rf"><a href="{:U('Login/check_login')}">登录</a> / <a href="{:U('Login/register')}">注册</a></span>
                </if>
                
            </div>
            <div class="sfrom">
                <input type="text">
                <button>搜索</button>
            </div>
        </div>
    </div>
</div>

<div class="unbox nav">
    <div class="content">
        <ul>
            <li><a {:navShow('Index')} href="{:U('Index/home')}">首页</a></li>
            <li><a {:navShow('Education')} href="{:U('Education/education')}">科学教育专题</a></li>
            <li><a {:navShow('Resource')} href="{:U('Resource/index')}">高端科教资源</a></li>
            <li><a {:navShow('Pro')} href="{:U('Pro/index')}">支撑服务项目</a></li>
            <li><a {:navShow('Show')} href="{:U('Show/kejiao_show')}">科教活动展示</a></li>
            <li><a {:navShow('Gongyi')} href="{:U('Gongyi/gongyi')}">科教公益项目</a></li>
            <li><a {:navShow('HHH')} href="{:U('HHH/HHH')}">“3H”工程学校</a></li>
        </ul>
    </div>
</div>




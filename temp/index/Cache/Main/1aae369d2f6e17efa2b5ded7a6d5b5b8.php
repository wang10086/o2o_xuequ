<?php if (!defined('THINK_PATH')) exit(); use Sys\P; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo ($page_title); ?></title>
<meta name="keywords" content="" />
<meta name="description" content=""/>
<link href="/index/assets/css/style.css?v=1.2" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/index/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/index/assets/js/jquery.cookie.min.js"></script>
<script type="text/javascript" src="/index/assets/js/jquery.SuperSlide.2.1.2.js"></script>
<script type="text/javascript" src="/index/assets/com/laydate/laydate.js"></script>
<script type="text/javascript" src="/index/assets/js/date.js"></script>
<script type="text/javascript" src="/index/assets/js/jquery.sticky-kit.js"></script>
<script type="text/javascript" src="/index/assets/js/Validform_v5.3.2.js"></script>
<script type="text/javascript" src="/index/assets/js/commen.js"></script>
</head>

<body>
<div class="unbox">
    <div class="content header">
        <div class="logo"></div>
        <div class="slogan"></div>
        <div class="search">
            <div class="usertext">
                <span class="lf"><a href="http://kjlm.kexueyou.com/" target="_blank">科教联盟介绍</a></span>
                
                <?php if(cookie('username')): ?><span class="us"> <a class="sch_name" href="<?php echo U('Member/index');?>"><?php echo cookie('username');?></a>  / <a href="<?php echo U('Login/loginOut');?>">注销</a></span>
                <?php else: ?>
                	<span class="cc"><a href="<?php echo U('Index/register');?>">用户注册说明</a></span>
                    <span class="rf"><a href="<?php echo U('Login/check_login');?>">登录</a> / <a href="<?php echo U('Login/register');?>">注册</a></span><?php endif; ?>
                
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
            <li><a <?php echo navShow('Index');?> href="<?php echo U('Index/home');?>">首页</a></li>
            <li><a <?php echo navShow('Education');?> href="<?php echo U('Education/education');?>">科学教育专题</a></li>
            <li><a <?php echo navShow('Resource');?> href="<?php echo U('Resource/index');?>">高端科教资源</a></li>
            <li><a <?php echo navShow('Pro');?> href="<?php echo U('Pro/index');?>">支撑服务项目</a></li>
            <li><a <?php echo navShow('Show');?> href="<?php echo U('Show/kejiao_show');?>">科教活动展示</a></li>
            <li><a <?php echo navShow('Gongyi');?> href="<?php echo U('Gongyi/gongyi');?>">科教公益项目</a></li>
            <li><a <?php echo navShow('HHH');?> href="<?php echo U('HHH/HHH');?>">“3H”工程学校</a></li>
        </ul>
    </div>
</div>






<style>
    /*.less{background-color: #f4f4f4;}*/
    .hj_con0 img{cursor: default; text-align: center; position: relative; width: 100%;}
    .hj_con1{text-align: center; background-color: #f4f4f4;}
    .hj_con1 .pic{cursor: default; text-align: center; position: relative; width: 90%; margin-bottom: 100px;}
    /*白色*/
    .hj_con3{text-align: center; background-color: #fff;    margin-top: -12px;}
    .hj_con3 .pic{cursor: default; text-align: center; position: relative; width: 90%; margin-bottom: 100px;}
    .hj_con4{position: relative; height: 60px; display: inline-block; top: -59px; left: 68%;}
    .hj_con4 .pic{cursor: pointer ; text-align: center; position: relative;padding-bottom: 100px; width: 165px;}
    /*按钮*/
    .hj_con2{position: relative; height: 60px; display: inline-block; top: -78px; left: 68%;}
    .hj_con2 .pic{cursor: pointer ; text-align: center; position: relative;padding-bottom: 100px; width: 165px;}
    /*.moreline{display: inline-block; width: 458px; height: 108px; cursor: pointer; position: absolute; margin-left: -440px; }*/
    .hj_con5{text-align: center; background-color: #f4f4f4;margin: -39px 0;}
    .hj_con5 .pic{cursor: default; text-align: center; position: relative; width: 90%; margin-bottom: 120px;}
    .hj_con6{position: relative; height: 60px; display: inline-block; top: -66px; left: 68%;}
    .hj_con6 .pic{cursor: pointer ; text-align: center; position: relative;padding-bottom: 100px; width: 165px;}

    .but{width: 165px; position: relative;}
    .footer{ margin-top: -20px;}
</style>

<div class="hj_con0">
    <img src="/index/assets/images/kcym0.jpg">
</div>
<div class="hj_con1">
    <img class="pic" src="/index/assets/images/kcym1_2.jpg">
</div>
<div class="hj_con2">
    <a class="moreline" href="<?php echo U('Pro/index',array('kind'=>33,'type'=>47));?>"><img class="but but1" src="/index/assets/images/kcym2a.jpg"></a>
</div>

<div class="hj_con3">
    <img class="pic" src="/index/assets/images/kcym3.jpg">
</div>
<div class="hj_con4">
    <a class="moreline" href="<?php echo U('Pro/index',array('kind'=>33,'type'=>48));?>"><img class="but but2" src="/index/assets/images/kcym4a.jpg"></a>
</div>


<div class="hj_con5">
    <img class="pic" src="/index/assets/images/kcym5.jpg">
</div>
<div class="hj_con6">
    <a class="moreline" href="<?php echo U('Pro/index',array('kind'=>33,'type'=>49));?>"><img class="but but3" src="/index/assets/images/kcym6a.jpg"></a>
</div>


<div class="unbox mt20 footer">
    <div class="content">
        <div class="logo"></div>
        <div class="link">
            <h2>友情链接</h2>
            <div class="lk">
                <a href="http://www.cas.cn/">中国科学院</a>
                <a href="http://ab.cas.cn/xgj/">中国科学院行政管理局</a>
                <a href="http://kjlm.kexueyou.com/">中国科学院科学教育联盟</a>
            </div>
        </div>
        <div class="code"><img src="/index/assets/images/erweima.png"></div>
        <div class="about">
            <h2>联系我们</h2>
            <p>地址：北京市海淀区中关村南三街15号</p>
        </div>
    </div>
</div>

<div class="unbox copy">
    <!--版权所有 &copy; 中科教科学教育平台 京ICP备12018309号 &nbsp; 京公网安备110402500027号-->
    版权所有 &copy; 中科教科学教育平台 京ICP备12018327号-1 &nbsp; <!--京公网安备110402500027号-->
</div>


</body>
</html>
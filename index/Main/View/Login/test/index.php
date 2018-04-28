
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="generator" content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>中科教科学教育平台 - 中国科学院科学教育联盟</title>
    <!-- Bootstrap核心样式，不修改 -->
    <link href="__HTML__/css/bootstrap.css" rel="stylesheet">
    <!-- 页面自定义样式  -->
    <link href="__HTML__/css/main.css" rel="stylesheet">
</head>

<body class="login-Page">
<!-- 头部 -->
<div id="header">
    <div class="wrapper">
        <div class="header-info">
            <a href="{:U('Index/home')}" target="_blank" class="c-primary">网站首页</a>|<a href="{:U('Login/stu_register')}" class="c-primary">免费注册</a>hi，欢迎来到中科教科学教育平台！
        </div>
        <a href="#" class="logo">
            <span> </span>
        </a>
        <div class="logo-info"></div>
    </div>
</div>
<!-- /头部 -->
<!-- 登陆 -->
<div id="loginmain" class="loginmain" style="background-color: #fff;">
    <div class="login-inner" style="background-image: url(../../assets/images/bg1.jpg);">
        <div class="theme_a">
            <a target="_blank" hidefocus="true" style="position: absolute; width: 700px; height: 500px; left: 0px; top: 0px; cursor: pointer;"></a>
        </div>
    </div>

    <!--登录框-->
    <div class="login-content">
        <div class="login-title">
            <h2>用户登录</h2>
        </div>
        <!--div class="form-login-error">
            <h3>用户登录</h3>
            <p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
        </div-->
        <div class="login-form">
            <form action="#" class="reg-page" method="post"><input name="__RequestVerificationToken" type="hidden" value="7-M9qMQEgHL2paz9q2XVgouEIIo8IYi-zJWqU1">
                <div class="form-group">

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-user form-control-feedback"></i>
                            <i class="glyphicon glyphicon-user"></i>
                        </div>
                        <input class="form-control text-box single-line" data-val="true" data-val-required="必填" id="Username" name="username" placeholder="用户名" type="text" value="">
                        <span class="field-validation-valid text-danger" data-valmsg-for="Username" data-valmsg-replace="true"></span>
                    </div>

                </div>
                <div class="form-group">

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-lock"></i>
                        </div>

                        <input class="form-control text-box single-line password" data-val="true" data-val-required="必填" id="password" name="Password" placeholder="密码" type="password" value="">

                        <span class="field-validation-valid text-danger" data-valmsg-for="Password" data-valmsg-replace="true"></span>
                    </div>

                </div>
                <div class="form-group codebox">

                    <div class="input-group col-xs-7 pull-left">
                        <div class="input-group-addon ">
                            <i class="glyphicon glyphicon-retweet"></i>

                        </div>
                        <input class="form-control text-box single-line" data-val="true" data-val-required="必填" id="Code" name="Code" placeholder="验证码" type="text" value="">
                        <span class="field-validation-valid text-danger" data-valmsg-for="Code" data-valmsg-replace="true"></span>
                    </div>
                    <div class="input-code col-xs-5 pull-right">
                        <img id="vcodeimg" src="./旅行_files/VCode" width="80" height="32" style="cursor:pointer" alt="点击验证码更新">
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="returnUrl">
                    <button type="submit" class="btn btn-primary btn-block btn-login btn-lg">
                        <i class="fa fa-sign-in"></i>
                        登&nbsp;录
                    </button>
                </div>
                <div class="form-group fs12">
                    <label><input type="checkbox" checked="checked" value="agree" name="agreement_chk"> 记住用户</label>
                    <span class="pull-right">
                            <a href="{:U('Login/stu_register')}" class="c-primary">立即注册</a>
                            &nbsp;&nbsp;
                            <a href="#" class="c-primary">忘记密码？</a>
                        </span>

                </div>
            </form>



        </div>
        <div class="login-foot">
            <span>推荐使用：<a href="#">chrome</a>、<a href="#">firefox</a>等浏览器</span>
        </div>

    </div>
</div>
<!-- /登陆 -->
<!-- 底部 -->
<div class="footer-min">
    <div class="wrapper">
        <div class="copyright fs12">
            Copyright © 2014 - 2016 .
        </div>
    </div>
</div>



<!--end 底部 -->
<!-- 核心js jquery版本1.11.3 -->
<script src="__HTML__/js/jquery.min.js"></script>
<script src="__HTML__/js/bootstrap.min.js"></script>


<script src="__HTML__/js/Login.js"></script>

<div style="position: static; display: none; width: 0px; height: 0px; border: none; padding: 0px; margin: 0px;"><div id="trans-tooltip"><div id="tip-left-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left-top.png&quot;);"></div><div id="tip-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-top.png&quot;) repeat-x;"></div><div id="tip-right-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right-top.png&quot;);"></div><div id="tip-right" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right.png&quot;) repeat-y;"></div><div id="tip-right-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right-bottom.png&quot;);"></div><div id="tip-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-bottom.png&quot;) repeat-x;"></div><div id="tip-left-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left-bottom.png&quot;);"></div><div id="tip-left" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left.png&quot;);"></div><div id="trans-content"></div></div><div id="tip-arrow-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-arrow-bottom.png&quot;);"></div><div id="tip-arrow-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-arrow-top.png&quot;);"></div></div></body></html>
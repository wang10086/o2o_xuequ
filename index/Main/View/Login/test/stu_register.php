<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="generator" content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>中科教科学教育平台 - 中国科学院科学教育联盟</title>

    
   
</head>
<body><div class="" style="display: none; position: absolute;"><div class="aui_outer"><table class="aui_border"><tbody><tr><td class="aui_nw"></td><td class="aui_n"></td><td class="aui_ne"></td></tr><tr><td class="aui_w"></td><td class="aui_c"><div class="aui_inner"><table class="aui_dialog"><tbody><tr><td colspan="2" class="aui_header"><div class="aui_titleBar"><div class="aui_title" style="cursor: move; display: block;"></div><a class="aui_close" href="javascript:/*artDialog*/;" style="display: block;">×</a></div></td></tr><tr><td class="aui_icon" style="display: none;"><div class="aui_iconBg" style="background: none;"></div></td><td class="aui_main" style="width: auto; height: auto;"><div class="aui_content" style="padding: 20px 25px;"></div></td></tr><tr><td colspan="2" class="aui_footer"><div class="aui_buttons" style="display: none;"></div></td></tr></tbody></table></div></td><td class="aui_e"></td></tr><tr><td class="aui_sw"></td><td class="aui_s"></td><td class="aui_se" style="cursor: se-resize;"></td></tr></tbody></table></div></div>
    
    <!-- /头部 -->

    <div id="container">
        


<div id="header">
    <div class="wrapper">
        <div class="header-info">
            <a href="{:U('Index/home')}" target="_blank" class="c-primary">网站首页</a>  hi，欢迎来到中科教科学教育平台！
        </div>
        <a href="#" class="logo">
            <span> </span>
        </a>
        <div class="logo-info"></div>
    </div>
</div>

<div id="Main" class="register-main bv-form" novalidate="novalidate"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
    <!--登录框-->
    <div class="wrapper">
        <div class=" register-content">
            <div class="title">
                <input id="hidUserType" name="hidUserType" type="hidden" value="1">
                <h3 class="HT2 c-primary"><span class="name">填写注册信息</span><a href="{:U('Login/index')}" class="a-more">已有账号，请登录</a></h3>
            </div>
            <div class="row">
                <div class="col-xs-6 register-form">
                    <form class="form-horizontal" method="post" role="form" id="form_login">
                        <div id="xx" novalidate="novalidate" class="bv-form"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                            <div class="form-group has-feedback">
                                <label for="inputEmail3" class="col-xs-4 control-label"><span class="c-red">*</span>手机号：</label>
                                <div class="col-xs-7">
                                    <input id="phoneNumber" name="phoneNumber" type="tel" class="form-control" placeholder="请输入手机号码" onkeyup="value=value.replace(/[^\d]/g,&#39;&#39;)" maxlength="11" data-bv-field="phoneNumber"><i class="form-control-feedback" data-bv-icon-for="phoneNumber" style="display: none;"></i>
                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="NOT_VALIDATED" style="display: none;">手机号码不能为空</small><small class="help-block" data-bv-validator="stringLength" data-bv-for="phoneNumber" data-bv-result="NOT_VALIDATED" style="display: none;">手机号码必须为11位</small><small class="help-block" data-bv-validator="regexp" data-bv-for="phoneNumber" data-bv-result="NOT_VALIDATED" style="display: none;">无效的手机号码</small></div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputEmail3" class="col-xs-4 control-label"><span class="c-red">*</span>验证码：</label>
                                <div class="col-xs-4">
                                    <input id="codeNum" name="codeNum" type="text" class="form-control" placeholder="请输入验证码" data-bv-field="codeNum"><i class="form-control-feedback" data-bv-icon-for="codeNum" style="display: none;"></i>
                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="codeNum" data-bv-result="NOT_VALIDATED" style="display: none;">验证码不能为空</small></div>
                                <div class="col-xs-3">
                                    <img id="vcodeimg" src="./学员注册_files/VCode" width="80" height="32" style="cursor:pointer" alt="点击验证码更新">

                                </div>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="inputEmail3" class="col-xs-4 control-label"><span class="c-red">*</span>校验码：</label>
                            <div class="col-xs-4">
                                <input id="code" type="tel" name="code" class="form-control" placeholder="请输入校验码" onkeyup="value=value.replace(/[^\d]/g,&#39;&#39;)" maxlength="6" data-bv-field="code"><i class="form-control-feedback" data-bv-icon-for="code" style="display: none;"></i>
                                <p class="help-block" id="phoneMa" style="color:green;"></p>
                            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="code" data-bv-result="NOT_VALIDATED" style="display: none;">校验码不能为空</small><small class="help-block" data-bv-validator="stringLength" data-bv-for="code" data-bv-result="NOT_VALIDATED" style="display: none;">校验码验证失败</small></div>
                            <div class="col-xs-3">
                                <input type="button" class="btn btn-primary btn-sm" value="免费获取校验码" id="registerCode">
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="inputPassword3" class="col-xs-4 control-label"><span class="c-red">*</span>设置密码：</label>
                            <div class="col-xs-7">
                                <input id="Pwd" name="Pwd" type="password" class="form-control" placeholder="请输入设置密码" maxlength="16" data-bv-field="Pwd"><i class="form-control-feedback" data-bv-icon-for="Pwd" style="display: none;"></i>
                            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="Pwd" data-bv-result="NOT_VALIDATED" style="display: none;">设置密码不能为空</small><small class="help-block" data-bv-validator="regexp" data-bv-for="Pwd" data-bv-result="NOT_VALIDATED" style="display: none;">设置密码只能包含大写、小写、数字和下划线</small><small class="help-block" data-bv-validator="identical" data-bv-for="Pwd" data-bv-result="NOT_VALIDATED" style="display: none;">两次密码输入不一致</small><small class="help-block" data-bv-validator="stringLength" data-bv-for="Pwd" data-bv-result="NOT_VALIDATED" style="display: none;">设置密码验证失败</small></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="inputPassword3" class="col-xs-4 control-label"><span class="c-red">*</span>确认密码：</label>
                            <div class="col-xs-7">
                                <input id="PwdTrue" name="PwdTrue" type="password" class="form-control" placeholder="请输入确认密码" maxlength="20" data-bv-field="PwdTrue"><i class="form-control-feedback" data-bv-icon-for="PwdTrue" style="display: none;"></i>
                            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="PwdTrue" data-bv-result="NOT_VALIDATED" style="display: none;">确认密码不能为空</small><small class="help-block" data-bv-validator="regexp" data-bv-for="PwdTrue" data-bv-result="NOT_VALIDATED" style="display: none;">确认密码只能包含大写、小写、数字和下划线</small><small class="help-block" data-bv-validator="identical" data-bv-for="PwdTrue" data-bv-result="NOT_VALIDATED" style="display: none;">两次密码输入不一致</small><small class="help-block" data-bv-validator="stringLength" data-bv-for="PwdTrue" data-bv-result="NOT_VALIDATED" style="display: none;">确认密码验证失败</small></div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-offset-4 col-xs-7">
                                <button id="btnRegister" class="btn btn-default btn-block btn-primary">提交注册</button>
                                <p class="help-block">点击“提交注册”，即表示您已经阅读并同意遵守研学旅行<a href="#" target="_blank" class="c-primary">网站条款</a> </p>
                            </div>
                        </div>


                    </form>
                </div>
                <div class="col-xs-6 register-ad">
                    <img src="./学员注册_files/register-ad.jpg">
                </div>
            </div>
        </div>


    </div>
</div>



    </div>
   
    <!-- 底部 -->
    <div class="footer-min">
        <div class="wrapper">
            <div class="copyright fs12">
 Copyright © 2014 - 2016 .   &nbsp;&nbsp;&nbsp;&nbsp; <a target="_blank" href="http://www.miitbeian.gov.cn/">a</a>
            </div>
        </div>
    </div>









<!-- Bootstrap核心样式，不修改 -->
<link href="__HTML__/css/bootstrap.css" rel="stylesheet">
<!-- 页面自定义样式  -->
<link href="__HTML__/css/main.css" rel="stylesheet">
 <!-- 核心js jquery版本1.11.3 -->
<script src="__HTML__/js/jquery.min.js"></script>
<script src="__HTML__/js/bootstrap.min.js"></script>



    <!--JavaScript文件-->
    <script src="__HTML__/js/jquery-1.10.2.min.js"></script>
    <script src="__HTML__/js/bootstrap.min.js(1)"></script>
    <script src="__HTML__/js/bootstrapValidator.js"></script>
    <link href="__HTML__/css/default.css" rel="stylesheet">
    <script src="__HTML__/js/artDialog.js"></script>

    <script src="__HTML__/js/Register.js"></script>



<div style="position: static; display: none; width: 0px; height: 0px; border: none; padding: 0px; margin: 0px;"><div id="trans-tooltip"><div id="tip-left-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left-top.png&quot;);"></div><div id="tip-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-top.png&quot;) repeat-x;"></div><div id="tip-right-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right-top.png&quot;);"></div><div id="tip-right" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right.png&quot;) repeat-y;"></div><div id="tip-right-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right-bottom.png&quot;);"></div><div id="tip-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-bottom.png&quot;) repeat-x;"></div><div id="tip-left-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left-bottom.png&quot;);"></div><div id="tip-left" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left.png&quot;);"></div><div id="trans-content"></div></div><div id="tip-arrow-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-arrow-bottom.png&quot;);"></div><div id="tip-arrow-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-arrow-top.png&quot;);"></div></div></body></html>
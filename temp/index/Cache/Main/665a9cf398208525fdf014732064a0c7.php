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





<div class="unbox">
    <div class="content ovhid">

        <div class="crumbs">
            您所在的位置：<a href="<?php echo U('Index/home');?>">首页</a>  <span>&gt;</span> <a href="#">用户登录</a>
        </div>
        
        <h1 id="title" style="font-size:26px; font-weight:200;">用户登录</h1>
        
        <form class="applyform" method="post" action="<?php echo U('Login/check_login');?>">
        	<input type="hidden" name="dosubmint" value="1">
        	<input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
            <div class="loginfrom gbg">
                <ul>
                    <li>
                        <label>请输入手机号</label>
                        <input type="text"  class="text" name="mobile" placeholder="请输入手机号码" datatype="*6-16" nullmsg="请输入手机号码！"  errormsg="格式不正确" />
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>密码</label>
                        <input type="password"  class="text" name="password" placeholder="请输入密码" datatype="*6-16" nullmsg="请输入密码！" maxlength="16">
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>验证码</label>
                        <input type="text"  class="code" name="yzm_code" placeholder="请输入验证码" datatype="*4-4" maxlength="4" nullmsg="请输入验证码">
                        <img src="<?php echo U('Login/verify');?>" class="yzmcode" onclick="this.src='<?php echo U('Login/verify');?>'+'?'+Math.random()"  title="点击刷新">
                        <span class="Validform_checktip"></span>
                    </li>
                </ul>

                <style>
                    .res_pwd{width: 300px; display: inline-block;margin: 0 350px;}
                    .findpwd{display:inline-block;width: 100px; height: 25px;text-align: center; line-height: 25px; border-radius: 10px; border: solid 1px #eeeeee; background: #eeeeee;}
                    .reg{margin:0 50px 0 23px;}
                </style>

            </div>
            <div class="unfrom">
                <a class="submint" href="javascript:;">立即登录</a>
                <div class="res_pwd">
                    <a class="findpwd reg" href="<?php echo U('Login/register');?>">免费注册</a>
                    <a class="findpwd" href="<?php echo U('Login/find_pwd');?>">找回密码</a>
                </div>
            </div>

        </form>

    </div>
</div>

<script type="text/javascript">
	$(function(){			   
		$(".applyform").Validform({
			tiptype:function(msg,o,cssctl){
				if(!o.obj.is("form")){
					var objtip=o.obj.siblings(".Validform_checktip");
					cssctl(objtip,o.type);
					objtip.text(msg);
				}
			},
			btnSubmit : ".submint",
			ajaxPost:true,
			callback:function(data){
				var obj = eval(data);  
				if(obj.status == 'y'){
					showmsg('提示',data.info); 
					setTimeout("window.location.href='<?php echo U('Login/index');?>'",3000);
				}else{
					showmsg('提示',data.info); 
				}
			}
		});
	});
	
	
</script>

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
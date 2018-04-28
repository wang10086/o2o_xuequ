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






<div class="unbox">
    <div class="content ovhid">

        <div class="crumbs">
            您所在的位置：<a href="<?php echo U('Index/home');?>">首页</a>  <span>&gt;</span> <a href="#">用户注册</a>
        </div>

        <h1 id="title" style="font-size:26px; font-weight:200;">用户注册</h1>

        <form class="applyform registerform" method="post" action="<?php echo U('Login/register');?>">
            <input type="hidden" name="dosubmint" value="1">
			<input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
            <div class="loginfrom gbg">
                <ul>
                    <li>
                        <label>用户名</label>
                        <input type="text" class="text" name="info[username]" placeholder="请输入用户名" datatype="*2-16" nullmsg="请输入用户名！" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>手机号</label>
                        <input type="text" class="text mobile-input" id="mobile" name="info[mobile]" placeholder="请输入手机号" datatype="m" nullmsg="手机号格式不正确！" errormsg="手机号格式不正确" />
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>校验码</label>
                        <input type="text" name="info[mobile_code]" class="code mobile-code" placeholder="请输入校验码" datatype="n4-4" maxlength="4" />
                        <a class="verification-desc sendcode" onclick="send()">获取短信验证码</a>
                    </li>
                    <li  class="need">
                        <label>密码</label>
                        <input type="password" class=" text" name="info[password]" placeholder="请输入6-16位长度密码" datatype="*6-16" nullmsg="请输入密码" maxlength="16" />
                        <span class="Validform_checktip"></span>
                    </li>
                    <li  class="need">
                        <label>确认密码</label>
                        <input type="password" class="text" name="info[password2]" placeholder="请输入确认密码" datatype="*6-16" recheck="info[password]" nullmsg="请输入确认密码"  maxlength="16"/>
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>验证码</label>
                        <input type="text" class="code" name="info[yzm_code]" placeholder="请输入验证码" datatype="*4-4" maxlength="4" nullmsg="请输入验证码">
                        <img src="<?php echo U('Login/verify');?>" class="yzmcode" onclick="this.src='<?php echo U('Login/verify');?>'+'?'+Math.random()"  title="点击刷新">
                        <span class="Validform_checktip"></span>
                    </li>
                </ul>
            </div>
            <div class="unfrom">
                <a href="javascript:;" class="submint disabled-btn">立即注册</a>
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
                    showmsg('提示',obj.info);
                    setTimeout("window.location.href='<?php echo U('Login/register');?>'",3000);
                }else{
                    showmsg('提示',obj.info);
                }
            }
        });
    });
	
    function goback(){
        window.location.href="<?php echo U('Login/register');?>";
    }
	
	//重发验证码
	var wait=60;
	function time() {
		if (wait == 0) {
			$('.sendcode').removeAttr('disabled').removeClass('send').html('获取验证码');
			wait = 60;
		} else {
			$('.sendcode').attr("disabled", true).addClass('send').html("重新发送，[" + wait + "s]");
			wait--;
			setTimeout(function() {
				time()
			},
			1000)
		}
	}
	
	//发送验证码
	function send(){
		var  mobile = $("#mobile").val();
		if(mobile){
			//提交表单
            $.ajax({
               type: "GET",
               url: "<?php echo U('Login/send_code');?>",
			   dataType:'json', 
               data:{mobile:mobile,rand:parseInt(10000*Math.random())},
               success:function(data){
				   if(data.status=='n'){
					  showmsg('提示',data.info);
				   }
				   time();
               }
            });
			
		}else{
			showmsg('提示','请输入手机号码');
		}
	}

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
</div>


</body>
</html>
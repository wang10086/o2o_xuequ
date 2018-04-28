<include file="Index:header" />

<div class="unbox">
    <div class="content ovhid">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="#">用户登录</a>
        </div>
        
        <h1 id="title" style="font-size:26px; font-weight:200;">用户登录</h1>
        
        <form class="applyform" method="post" action="{:U('Login/check_login')}">
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
                        <img src="{:U('Login/verify')}" class="yzmcode" onclick="this.src='{:U('Login/verify')}'+'?'+Math.random()"  title="点击刷新">
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
                    <a class="findpwd reg" href="{:U('Login/register')}">免费注册</a>
                    <a class="findpwd" href="{:U('Login/find_pwd')}">找回密码</a>
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
					setTimeout("window.location.href='{:U('Login/index')}'",3000);
				}else{
					showmsg('提示',data.info); 
				}
			}
		});
	});
	
	
</script>

<include file="Index:footer" />

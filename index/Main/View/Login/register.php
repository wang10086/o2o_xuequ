<include file="Index:header" />


<div class="unbox">
    <div class="content ovhid">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="#">用户注册</a>
        </div>

        <h1 id="title" style="font-size:26px; font-weight:200;">用户注册</h1>

        <form class="applyform registerform" method="post" action="{:U('Login/register')}">
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
                        <img src="{:U('Login/verify')}" class="yzmcode" onclick="this.src='{:U('Login/verify')}'+'?'+Math.random()"  title="点击刷新">
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
                    setTimeout("window.location.href='{:U('Login/register')}'",3000);
                }else{
                    showmsg('提示',obj.info);
                }
            }
        });
    });
	
    function goback(){
        window.location.href="{:U('Login/register')}";
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
               url: "{:U('Login/send_code')}",
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


<include file="Index:footer" />
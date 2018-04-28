<?php use Sys\P; ?>
<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title><?php echo P::SYSTEM_NAME; ?>注册</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="__HTML__/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="__HTML__/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="__HTML__/css/py.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bg-black">

<div class="form-box" id="reg-box">
    <div class="header">注册</div>
    <form method="post" action="{:U('Index/reg')}" name="myform" id="myform">
        <input type="hidden" name="dosubmit" value="1" />
        <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
        <div class="box-body">
            <div class="formbox" style=" padding:20px 6px 10px 6px;">

                <div class="form-group col-md-4" style="position:relative">
                    <input type="text" name="info[username]" id="username" placeholder="用户名"  class="form-control" />
                </div>

                <div class="form-group col-md-4">
                    <input type="password" name="password_1" id="password_1" placeholder="密码" maxlength="16"  class="form-control" />
                </div>

                <div class="form-group col-md-4">
                    <input type="password" name="password_2" id="password_2" placeholder="确认密码" maxlength="16"  class="form-control" />
                </div>

                <div class="form-group col-md-4">
                    <input type="text" name="info[name]" id="regname" class="form-control" placeholder="姓名" />
                </div>

                <div class="form-group col-md-4" style="position:relative">
                    <input type="text" name="info[email]" placeholder="邮箱"  id="email" class="form-control" />
                </div>

                <div class="form-group col-md-4">
                    <input type="text" name="info[mobile]" id="mobile" placeholder="手机号码" maxlength="11" class="form-control" />
                </div>

                <div class="form-group col-md-4">
                    <input type="text" name="info[company]" placeholder="单位" class="form-control" />
                </div>

                <div class="form-group col-md-4">
                    <input type="text" name="info[department]" placeholder="部门" class="form-control" />
                </div>

                <div class="form-group col-md-4">
                    <input type="text" name="info[post]" placeholder="职称" class="form-control" />
                </div>


                <div class="form-group col-md-12">
                    <textarea class="form-control" name="info[speciality]" style="height:100px;"  placeholder="擅长领域" ></textarea>
                </div>
            </div>

        </div><!-- /.box-body -->

        <div class="footer" style="margin-top:0;">
            <button type="submit" class="btn bg-olive btn-block" style="width:200px; margin:0 auto 10px auto;">提交</button>
            <div style="text-align:center"><a href="{:U('Index/login')}">已有账号</a><!-- &nbsp;&nbsp;|&nbsp;&nbsp;<a href="{:U('Index/backpwd')}">找回密码</a>--></div>
        </div>
    </form>


</div>
<div style="width:100%; height:20px; position:fixed; left:0; bottom:20px; text-align:center; color:#ffffff;"><?php echo P::SYSTEM_NAME; ?> &copy; 版权所有</div>

<!-- jQuery 1.11.1 -->
<script src="__HTML__/js/jquery-1.11.1.min.js"></script>
<!-- Bootstrap -->
<script src="__HTML__/js/bootstrap.min.js" type="text/javascript"></script>
<script src="__HTML__/js/plugins/form/formvalidator.js" type="text/javascript"></script>
<script src="__HTML__/js/plugins/form/formvalidatorregex.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
        $("#username").formValidator({onshow:"4-20位字符，可由英文、数字组成",onfocus:"4-20位字符，可由英文、数字组成"}).inputValidator({min:4,max:20,onerror:"4-20位字符，可由英文、数字组成"}).regexValidator({regexp:"ps_username",datatype:"enum",onerror:"4-20位字符，可由中文、英文、数字组成"}).ajaxValidator({
            type : "get",
            url : "<?php echo U('User/public_checkname_ajax'); ?>",
            data :"m=Main&c=User&a=public_checkname_ajax",
            datatype : "html",
            async:'false',
            success : function(data){
                if( data == 1 ) {
                    return true;
                } else {
                    return false;
                }
            },
            buttons: $("#dosubmit"),
            onerror : "该用户名不可用。",
            onwait : "请稍候..."
        });
        $("#password_1").formValidator({onshow:"6-20位字符(字符、数字、符号)组成",onfocus:"6-20位字符（字符、数字、符号）组成"}).inputValidator({min:6,max:20,onerror:"6-20位字符(字符、数字、符号)组成"});
        $("#password_2").formValidator({onshow:"请再次输入密码",onfocus:"请再次输入密码",oncorrect:"&nbsp;"}).inputValidator({min:1,onerror:"确认密码不能为空"}).compareValidator({desid:"password_1",operateor:"=",onerror:"与上面密码不一致，请重新输入"});
        $("#regname").formValidator({onshow:"请输入姓名",onfocus:"姓名为不低于2位字符",oncorrect:"&nbsp;"}).inputValidator({min:2,max:20,onerror:"姓名输入有误"});
        $("#email").formValidator({onshow:"请输入邮箱",onfocus:"请输入邮箱"}).inputValidator({min:4,max:20,onerror:"请输入邮箱"}).regexValidator({regexp:"email",datatype:"enum",onerror:"请输入邮箱"});
        $("#mobile").formValidator({onShow:"请输入你的手机号码，可以为空哦",onFocus:"你要是输入了，必须输入正确"}).inputValidator({min:11,max:11,onError:"手机号码必须是11位的,请确认"}).regexValidator({regexp:"^1[3|4|5|7|8][0-9]{9}$",onerror:"你输入的手机格式不正确"});


    });
</script>
</body>
</html>
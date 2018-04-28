<?php if (!defined('THINK_PATH')) exit(); use Sys\P; ?>
<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title><?php echo P::SYSTEM_NAME; ?>登录</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="/admin/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="/admin/assets/css/py.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bg-black">

<div class="form-box" id="login-box">
    <div class="header"><?php echo P::SYSTEM_NAME; ?></div>
    <form id="loginform" method="post" class="form-vertical" action="<?php echo U('Index/login');?>" />
    <input type="hidden" name="dosubmit" value="1" />
    <div class="body bg-gray">
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="用户名"/>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="密码"/>
        </div>
    </div>
    <div class="footer">
        <button type="submit" class="btn bg-olive btn-block">进入系统</button>
        <!-- <div style="text-align:center"><a href="<?php echo U('Index/reg');?>">注册账号</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo U('Index/backpwd');?>">找回密码</a></div>-->
    </div>
    </form>

</div>
<div style="width:100%; height:20px; position:fixed; left:0; bottom:20px; text-align:center; color:#ffffff;"><?php echo P::SYSTEM_NAME; ?> &copy; 版权所有</div>


<!-- jQuery 1.11.1 -->
<script src="/admin/assets/js/jquery-1.11.1.min.js"></script>
<!-- Bootstrap -->
<script src="/admin/assets/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>
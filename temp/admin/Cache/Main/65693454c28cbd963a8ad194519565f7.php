<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title>系统提示</title>
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
    <script src="/admin/assets/js/html5shiv.min.js"></script>
    <script src="/admin/assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bg-black">

<div class="form-box" id="login-box">
    <div class="header"><p>系统提示：</p></div>
    <form action="index.html" method="post">
        <div class="body bg-gray">
            <div class="form-group">

                <h2><?php echo($message); ?></h2>

                <p>页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b></p>
            </div>
        </div>
        <div class="footer">

            <a href="<?php echo($jumpUrl); ?>" class="btn bg-olive btn-block">立即跳转</a>
        </div>
    </form>

</div>


<!-- jQuery 1.11.1 -->
<script src="/admin/assets/js/jquery-1.11.1.min.js"></script>
<!-- Bootstrap -->
<script src="/admin/assets/js/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    })();
</script>

</body>
</html>
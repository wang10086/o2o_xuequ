<?php if (!defined('THINK_PATH')) exit(); use Sys\P; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo P::SYSTEM_NAME; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="/index/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="/index/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="/index/assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="/index/assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="/index/assets/css/py.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="/index/assets/js/html5shiv.min.js"></script>
          <script src="/index/assets/js/respond.min.js"></script>
        <![endif]-->
        <?php echo PHP_EOL . $__additional_css__ ?>

    </head>
    <body class="skin-blue">
       
        <section class="content">
            <div class="row" style="margin-top:-15px;">
          
			 
            	<div class="form-group box-float-12"><div class="bor-bot"><strong><?php echo ($row["task"]); ?></strong></div></div>
                <div class="form-group box-float-4">上课讲师：<?php echo ($row["teacher"]); ?></div>
                <div class="form-group box-float-4">上课时间：<?php echo ($row["start_time"]); ?></div>
                <div class="form-group box-float-4">上课时长：<?php echo ($row["duration"]); ?>分钟</div>
                <div class="form-group box-float-4">上课人数：预计:<?php echo ($row["stu_num"]); ?> / 实到:<?php echo ($row["to_num"]); ?></div>
                <div class="form-group box-float-4">上课场地：<?php echo ($row["site"]); ?></div>
                <div class="form-group box-float-12"><div class="bor-bot"><strong>课程概要</strong></div></div>
                <div class="form-group box-float-12"><?php echo ($cour["summary"]); ?></div>
                <div class="form-group box-float-12"><div class="bor-bot"><strong>备注</strong></div></div>
                <div class="form-group box-float-12"><?php echo ($row["remarks"]); ?></div>
              
            </div>
        </section>

        <!-- jQuery 2.0.2 -->
        <script src="/index/assets/js/jquery-1.11.1.min.js"></script>
        <!-- Bootstrap -->
        <script src="/index/assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="/index/assets/js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- jQuery Knob -->
        <script src="/index/assets/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="/index/assets/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
 		<?php echo $__additional_js__; ?>
        <?php echo $__additional_jscode__ ?>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                /* jQueryKnob */
                $(".knob").knob();
            });
        </script>

    </body>
</html>
<?php use Sys\P; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo P::SYSTEM_NAME; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="__HTML__/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="__HTML__/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="__HTML__/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="__HTML__/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="__HTML__/css/py.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="__HTML__/js/html5shiv.min.js"></script>
          <script src="__HTML__/js/respond.min.js"></script>
        <![endif]-->
        <?php echo PHP_EOL . $__additional_css__ ?>

    </head>
    <body class="skin-blue">
       
        <section class="content">
            <div class="row" style="margin-top:-15px;">
          
			 
            	<div class="form-group box-float-12"><div class="bor-bot"><strong>{$row.task}</strong></div></div>
                <div class="form-group box-float-4">上课讲师：{$row.teacher}</div>
                <div class="form-group box-float-4">上课时间：{$row.start_time}</div>
                <div class="form-group box-float-4">上课时长：{$row.duration}分钟</div>
                <div class="form-group box-float-4">上课人数：预计:{$row.stu_num} / 实到:{$row.to_num}</div>
                <div class="form-group box-float-4">上课场地：{$row.site}</div>
                <div class="form-group box-float-12"><div class="bor-bot"><strong>课程概要</strong></div></div>
                <div class="form-group box-float-12">{$cour.summary}</div>
                <div class="form-group box-float-12"><div class="bor-bot"><strong>备注</strong></div></div>
                <div class="form-group box-float-12">{$row.remarks}</div>
              
            </div>
        </section>

        <!-- jQuery 2.0.2 -->
        <script src="__HTML__/js/jquery-1.11.1.min.js"></script>
        <!-- Bootstrap -->
        <script src="__HTML__/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="__HTML__/js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- jQuery Knob -->
        <script src="__HTML__/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="__HTML__/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
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

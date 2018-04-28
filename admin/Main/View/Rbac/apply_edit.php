<?php use Sys\P; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo P::SYSTEM_NAME; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="__HTML__/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="__HTML__/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="__HTML__/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- jquery-ui style -->
        <link href="__HTML__/css/jQueryUI/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css" />
        <!-- ArtDialog -->
        <link href="__HTML__/css/artDialog.css" rel="stylesheet" type="text/css"  />
        <link href="__HTML__/css/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="__HTML__/css/py.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="__HTML__/js/html5shiv.min.js"></script>
          <script src="__HTML__/js/respond.min.js"></script>
        <![endif]-->
        <?php echo PHP_EOL . $__additional_css__ ?>
		 <!-- jQuery 1.11.1 -->
        <script src="__HTML__/js/jquery-1.7.2.min.js"></script>
        <!-- Bootstrap -->
        <script src="__HTML__/js/bootstrap.min.js" type="text/javascript"></script>
        <!--JqueryUI-->
        <script src="__HTML__/js/plugins/jqueryui/jquery-ui.js" type="text/javascript"></script>       
        <!--timepicker-->
        <script src="__HTML__/js/plugins/jqueryui/jquery-ui-slide.min.js" type="text/javascript"></script>   
        <script src="__HTML__/js/plugins/jqueryui/jquery-ui-timepicker-addon.js" type="text/javascript"></script>     
        <!--artdialog-->
       
        <!-- FORM -->
        <script src="__HTML__/js/plugins/form/formvalidator.js" type="text/javascript"></script>
        <script src="__HTML__/js/plugins/form/formvalidatorregex.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="__HTML__/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="__HTML__/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        
        <script src="__HTML__/comm/laydate/laydate.js"></script>
		 <script type="text/javascript">
        	//laydate.skin('molv');
        </script>

        <!-- AdminLTE App -->
        <?php echo $__additional_js__; ?>
        <?php echo $__additional_jscode__ ?>
        <script src="__HTML__/js/public.js" type="text/javascript"></script>
        <script src="__HTML__/js/py/app.js" type="text/javascript"></script>
        <script src="__HTML__/js/artDialog.js"></script> 
        <script src="__HTML__/js/iframeTools.js"></script> 
        <script src="__HTML__/comm/charts/highcharts.js" type="text/javascript"></script>
		 <script src="__HTML__/comm/charts/modules/exporting.js" type="text/javascript"></script>
    </head>
    <body>

		<script type="text/javascript">
        window.gosubmint= function(){
			var rs = new Array();
			$('.rolecheckbox').each(function(index, element) {
				if ($(element).find("input").is(':checked')) {
					var obj = {};
					obj.role  = $(element).find("input").val();
					rs.push(obj);
				}
			});
			
			$('.usercheckbox').each(function(index, element) {
				if ($(element).find("input").is(':checked')) {
					var obj = {};
					obj.user  = $(element).find("input").val();
					rs.push(obj);

				}
			});
			//console.log(rs);
			return rs;		
		 } 
        </script>
       
        <section class="content">
        	
            <div class="userdata">
            	<if condition="$rolelist">
                <div class="form-group" style="float:left; clear:both; width:100%;">
                    <label>角色</label>
                    <ul class="checkboxlist">
                        <foreach name="rolelist" key="k" item="v">
                            <li class="col-md-2 rolecheckbox"><input type="checkbox" name="role[]" value="{$k}" data="{$v}" <?php if(in_array($k,$arr_role)){ echo 'checked';} ?> > {$v} </li>
                        </foreach>
                    </ul>
                </div>
                </if>
                
                <if condition="$userlist">
                <div class="form-group"  style=" width:100%;border-top:2px solid #f39c12; margin-top:5px; float:left; clear:both; padding-top:20px;">
                    <label>用户</label>
                    <ul class="checkboxlist">
                        <foreach name="userlist" key="k" item="v">
                            <li class="col-md-2 usercheckbox"><input type="checkbox" name="user[]" value="{$k}" data="{$v}" <?php if(in_array($k,$arr_user)){ echo 'checked';} ?> > {$v} </li>
                        </foreach>
                    </ul>
                </div>
                </if>
            </div><!-- /.box-body -->
        </section>


        <include file="Index:footer" />
        
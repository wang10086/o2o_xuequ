<!-- add new calendar event modal -->

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
<script src="__HTML__/comm/jquery.autocomplete.min.js"></script>
<script src="__HTML__/js/timepicki.js" type="text/javascript"></script>
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
<script src="__HTML__/comm/plupload-2.2.0/js/plupload.full.min.js"></script>
<script type="text/javascript" src="__HTML__/comm/city/jquery.cityselect.js"></script>
<script type="text/javascript" src="__HTML__/js/cropper.min.js"></script>
<script type="text/javascript" src="__HTML__/js/sitelogo_new.js"></script>
<script>
    $(document).ready(function() {
        //interval = setInterval(lockscreen, "1000");
    })
    function lockscreen(){
        $.get("<?php echo U('Index/public_lock'); ?>", function(result){
            if(result==1){
                window.location.href='<?php echo U('Index/public_lockscreen','','',true); ?>';
            }
        });
    }
    $(document).keydown(function(event){
        if(event.keyCode==27){
            art.dialog.close();
        }
    });
</script>


</body>
</html>
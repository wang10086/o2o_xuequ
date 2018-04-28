<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <title>选择图片</title>

    <link rel="stylesheet" href="__HTML__/comm/upload.css" />
    <script src="__HTML__/comm/jquery-1.8.3.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="__HTML__/comm/skin/simple.css" />
    <link rel="stylesheet" href="__HTML__/comm/upload.css" />
    <script type="text/javascript" src="__HTML__/comm/artDialog.min.js"></script>
    <script type="text/javascript" src="__HTML__/comm/iframeTools.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            showfile();
        });

        function showfile(){
            $('#filelist').find('li').each(function(index, element){

                $(element).unbind();

                $(element).mouseover(function(){
                    $(this).find('.imgdiv').css('background','#fafafa');
                });

                $(element).mouseout(function(){
                    if($(this).find('.select').is(':hidden')){
                        $(this).find('.imgdiv').css('background','#ffffff');
                    }
                });

                $(element).click(function(e) {
                    var obj = $(this).find('.select');
                    if(obj.is(':visible')){
                        $(this).find('.imgdiv').css('background','#ffffff');
                        $(this).find('.select').hide();
                        $(this).find('input').attr('checked',false);
                    } else {
                        if (!art.dialog.data("multi")) clear_select();
                        $(this).find('.imgdiv').css('background','#fafafa');
                        $(this).find('.select').show();
                        $(this).find('input').attr('checked',true);
                    };
                });

                //$(element).click();

            });
        }
        function clear_select() {
            $('#filelist').find('li').each(function(index, element){
                $(element).find('.imgdiv').css('background','#ffffff');
                $(element).find('.select').hide();
                $(element).find('input').attr('checked',false);
            });
        }

        window.get_upfile_val =  function () {

            var rs = new Array();

            $('#showfilelist li').each(function(index, element) {
                if ($(element).find("input[name=upfile]:checked")) {
                    var obj = {};
                    obj.id    = $(element).find("input[name=upfile]:checked").val();
                    obj.thumb = $(element).find("input[name=upfilesimurl]:checked").val();
                    obj.imgurl   = $(element).find("input[name=upfilebigurl]:checked").val();
                    rs.push(obj);
                }
            });

            return rs;
        }

    </script>
</head>
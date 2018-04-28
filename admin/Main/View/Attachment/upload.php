<include file="header" />
<body>
<link href="__HTML__/comm/upload/uploadify.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript" src="__HTML__/comm/upload/jquery.uploadify.min.js?v=<?php echo rand(0,9999);?>"></script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $("#upfile").uploadify({
            "formData"       : {
                "catid"       : "<php>echo $catid;</php>",
                "timestamp"   : "<php>echo time();</php>",
                "dosubmit"     : "<php> echo md5(time());</php>"
            },
            "swf"             : "__HTML__/comm/upload/uploadify.swf",
            "uploader"        : "{:U('Attachment/img_upload')}",
            "width"           : 75,
            "height"          : 28,
            "queueID"         : "uploadfilelist",
            "buttonText"      : "选择文件",
            "buttonImage"     : "__HTML__/img/btn/selectfile.png",
            "fileTypeExts"    : "*.jpg; *.jpeg; *.gif; *.png; *.doc; *.docx; *.xls; *.xlsx; *.ppt; *.pptx; *.pdf; *.pdfx; *.zip; *.rar; *.7z; *.mp3; *.mp4; *.flv; *.avi; *.mov; *.wmv; *.swf",
            "fileDesc"        : "Web Image Files(.JPG,.GIF,.PNG)",
            "auto"            : false,
            "multi"           : true,
            "method"          : "post",
            "onQueueComplete" : function() {
                $('#uploadfilelist').hide();
                showfile();
            },
            "onDialogOpen"    : function() {
                $('#uploadfilelist').show();
            },
            "onUploadSuccess" : function(f, svr, rs) {
                if (rs) {
                    var data = eval('(' + svr + ')');
                    if (data.rs == 0) {
                        var filetext = '<li><div class="imgdiv" style="background:#fafafa;"><div class="select" style="display:block"></div><div class="outline"><img src="' + data.file_thumb + '" width="80" height="60" /></div></div><div style="display:none;"><input type="checkbox" checked="checked" name="upfile" value="' + data.id + '" /><input type="checkbox" checked="checked" name="upfilesimurl" value="' + data.file_thumb + '" /><input type="checkbox" checked="checked" name="upfilebigurl" value="' + data.file_path + '" /></div></li>';
                        $("#showfilelist").append(filetext);
                    } else {
                        alert("文件" + f.name + "未能成功上传：" + data.msg + "\n请上传小于 20M 的文件。");
                    }
                } else {
                    alert("文件" + f.name + "未能成功上传：服务器未响应！");
                }
            }
        });

        setTimeout(function(){
            $("#upfile").uploadify('settings', 'multi', art.dialog.data("multi")?true:false);
        },300);
    });

    // 关闭并返回数据到主页面

</script>
<table width="100%" rules="none" border="0" cellpadding="0" cellspacing="0">
    <tr>

        <td style="padding:10px;">
            <!--
            <div id="nav">
                <div class="list">
                 <ul>
                    <li class="ing"><a href="{:U('Attachment/img_upload', array('catid'=>$catid))}">上传文件</a></li>


                    <li><a href="{:U('Attachment/index', array('catid'=>$catid))}">历史上传</a></li>


                    <li><a href="{:U('Attachment/not_use')}">未使用的</a></li>

                </ul>
                </div>
            </div>
            -->
            <div id="content" style="border:none;">
                <table width="100%" rules="none" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="padding:10px;">
                            <div class="uploaddiv"><input type="file" id="upfile" name="uploadfile" /></div>
                            <div class="beginbtn" onClick="javascript: $('#upfile').uploadify('upload','*');">开始上传</div>
                        </td>
                    </tr>
                    <!--
                    <tr>
                        <td style="padding:0px 10px; font-family:Arial, Helvetica, sans-serif;" colspan="2">
                        请上传小于 1.5M 的文件
                        </td>
                    </tr>
                    -->
                    <tr>
                        <td style="padding:20px 10px 10px 10px;" colspan="2">
                            <div class="newliet">
                                <div class="newtitle">列表</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:5px 10px 10px 10px;" colspan="2">
                            <div id="uploadfilelist"></div>
                            <div id="filelist"><ul id="showfilelist"></ul></div>

                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>
</body>
</html>
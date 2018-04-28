<include file="header" />
<body>
<table width="100%" rules="none" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td style="padding:10px;">
            <div id="nav">
                <div class="list">
                    <ul>
                        <li><a href="{:U('Attachment/img_upload', array('catid'=>$catid))}">上传图片</a></li>

                        <li <?php if (ACTION_NAME == "index") echo 'class="ing"'; ?>><a href="{:U('Attachment/index', array('catid'=>$catid))}">历史上传</a></li>

                        <!--
                <li <?php if (ACTION_NAME == "not_use") echo 'class="ing"'; ?>><a href="{:U('Attachment/not_use')}">未使用的</a></li>
                -->
                    </ul>
                </div>
            </div>
            <div id="content">
                <table width="100%" rules="none" border="0" cellpadding="0" cellspacing="0">

                    <tr>
                        <td style="padding:5px 10px;">
                            <div id="filelist">
                                <ul id="showfilelist">
                                    <?php
                                    if(is_array($images)){
                                        foreach($images as $v){
                                            ?>
                                            <li>
                                                <div class="imgdiv">
                                                    <div class="select"></div>
                                                    <div class="outline"><img src="<?php echo thumb($v['filepath']); ?>" height="60" width="80" /></div>
                                                </div>
                                                <input type="checkbox" name="upfile" value="<?php echo $v['id']; ?>" style="display:none;"/>
                                                <input type="checkbox"  name="upfilesimurl" value="<?php echo thumb($v['filepath']); ?>"  style="display:none;"/>
                                                <input type="checkbox" name="upfilebigurl" value="<?php echo $v['filepath']; ?>" style="display:none;" />
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>

                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:5px 15px 10px 15px;">
                            <div id="pages"><?php echo $pages?></div>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>
</body>
</html>
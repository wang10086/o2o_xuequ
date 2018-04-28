<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>发布{$kindname}</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('News/travel',array('kind'=>$kind))}">旅游文章列表</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">编辑文章</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body" style="margin-top:20px;">
                            <form method="post" action="{:U('News/tra_add')}" name="myform" id="myform">
                                <input type="hidden" name="dosubmit" value="1" />
                                <input type="hidden" name="editid" value="{$row.id}" />
                                <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
                                <!-- text input -->

                                <div class="form-group col-md-4">
                                    <label>序号（数字越大，排序越靠前）</label>
                                    <input type="text" name="info[sort]" value="{$row.sort}" id="sort" class="form-control" />
                                </div>
                               
                                <div class="form-group col-md-4">
                                    <label>发布者</label>
                                    <input type="text" name="info[editor]" id="editor" value="{:cookie('name')}"  class="form-control" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>文章来源</label>
                                    <input type="text" name="info[source]" id="source" value="中科教" class="form-control" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label>标题</label>
                                    <input type="text" name="info[title]" id="title" value="{$row.title}"  class="form-control" />
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label>是否外链(外链请填写外链地址以http://开始)</label>
                                    <input type="text" name="info[ext_links]" value="{$row.ext_links}"  id="keywords" class="form-control" />
                                </div>

                                <div class="form-group col-md-12">
                                    <label>关联标签(不对外显示，多个标签请用空格隔开)</label>
                                    <input type="text" name="info[keywords]" id="keywords" value="{$row.keywords}" class="form-control" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label>描述</label>
                                    <textarea name="info[description]"  class="form-control">{$row.description}</textarea>
                                </div>

                                
                                {:upload_m('uploadfile','files',$pic,'上传标题图片')}


                               <!-- <div class="form-group col-md-12" style="margin-top:15px;">
									<?php /*echo editor('content'); */?>
                                </div>-->

                                <!-- right column -->
                                <div class="col-md-12">

                                    <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">日程安排</h3>
                                        </div>
                                        <div class="box-body" style="padding-top:20px;">

                                            <div class="form-group col-md-12" id="addti_btn">
                                                <a href="javascript:;" class="btn btn-success btn-sm" onClick="task(1)" style="margin-right:10px;"><i class="fa fa-fw  fa-plus"></i> 添加日程</a>
                                            </div>

                                            <div id="task_timu">
                                                <foreach name="days" key="k" item="v">
                                                    <div class="tasklist" id="task_a_{$v.id}">
                                                        <a class="aui_close" href="javascript:;" onClick="del_timu('task_a_{$v.id}')">×</a>
                                                        <div class="col-md-12 pd">
                                                            <label class="titou"><strong>第<span class="tihao">{$k+1}</span>天</strong></label>
                                                            <div class="input-group">
                                                                <input type="text" placeholder="活动小标题" name="days[{$v.id}1000][remarks]" class="form-control" value="{$v.remarks}">
                                                            </div>
                                                            <div class="input-group pads">
                                                                <input type="text" placeholder="所在城市" name="days[{$v.id}1000][citys]" class="form-control" value="{$v.citys}">
                                                            </div>
                                                            <div class="input-group pads">
                                                                <textarea class="form-control" placeholder="行程内容" name="days[{$v.id}1000][content]">{$v.content}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </foreach>
                                            </div>

                                            <div style="display:none" id="task_val">0</div>

                                            {:upload_m('daysfile','daysfiles',$atts,'&nbsp;日程照片','daysbox','daypic','某一天的图片')}
                                            <div id="daysbox"></div>

                                            <div class="form-group">&nbsp;</div>
                                            <div class="form-group">&nbsp;</div>
                                            <div class="form-group">&nbsp;</div>

                                        </div>
                                    </div><!-- /.box -->

                                </div><!--/.col (right) -->


                            
                                <div class="form-group col-md-12">
                                        <div style="border:0;">
                                        <foreach name="infotype" key="k" item="v">
                                            
                                            <?php if($v['level']==1){ ?>
                                            </div>
                                            <div class="unlm">
                                            <span class="lm_a"><input type="checkbox" name="lm[]" <?php if(in_array('['.$v['id'].']',$lm)){ echo 'checked';} ?>  value="[{$v.id}]"> {$v.title}</span><br />
                                            <?php }else{ ?>
                                            <span class="lm_b"><input type="checkbox" name="lm[]" <?php if(in_array('['.$v['id'].']',$lm)){ echo 'checked';} ?>  value="[{$v.id}]"> {$v.title}</span>
                                            <?php } ?>
                                            
                                        </foreach>
                                        </div>
                                    </div>
    
                                    <div class="form-group">&nbsp;</div>
                                    <div class="form-group">&nbsp;</div>
                                </div>


                            </form>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    <div class="form-group savebtn">
                        <button onClick="submintform()" class="btn btn-success btn-lg saves"><i class="fa fa-pencil-square"></i> 保存</button>
                    </div>

                </div><!--/.col (right) -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<include file="Index:footer" />

<script type="text/javascript">

    function submintform(){
        var title = $('#title').val();
        if(!title){
            alert('标题不能为空');
        }else{
            $('#myform').submit();
        }
    }

    function task(obj){

        var i = parseInt($('#task_val').text())+1;

        var days = '<div class="input-group"><input type="text" placeholder="活动小标题" name="days['+i+'][remarks]" class="form-control"></div><div class="input-group pads"><input type="text" placeholder="地点安排" name="days['+i+'][citys]" class="form-control"></div><div class="input-group pads"><textarea class="form-control" placeholder="行程安排"  name="days['+i+'][content]"></textarea></div>';
        //var days = '<div class="input-group pads"><textarea class="form-control" placeholder="行程内容"  name="days['+i+'][content]"></textarea></div><div class="input-group"></div>';


        var header = '<div class="tasklist" id="task_ti_'+i+'"><a class="aui_close" href="javascript:;" onClick="del_timu(\'task_ti_'+i+'\')">×</a><div class="col-md-12 pd"><label class="titou"><strong>第<span class="tihao">'+i+'</span>天</strong></label>';

        var footer = '</div></div>';


        var html = header+days+footer;

        $('#task_timu').append(html);
        $('#task_val').html(i);
        //重编题号
        $('.tihao').each(function(index, element) {
            var no = index*1+1;
            $(this).text(no);
        });
    }

    //移除题目
    function del_timu(obj){
        $('#'+obj).remove();
        $('.tihao').each(function(index, element) {
            var no = index*1+1;
            $(this).text(no);
        });
    }
</script>
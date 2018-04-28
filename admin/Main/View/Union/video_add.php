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
                <li><a href="{:U('News/index',array('kind'=>$kind))}">文章列表</a></li>
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
                            <form method="post" action="{:U('Union/video_add')}" name="myform" id="myform">
                                <input type="hidden" name="dosubmit" value="1" />

                                <div class="form-group col-md-4">
                                    <label>序号（数字越大，排序越靠前）</label>
                                    <input type="text" name="info[sort]" id="sort" class="form-control" />
                                </div>


                                <div class="form-group col-md-4">
                                    <label>发布者</label>
                                    <input type="text" name="info[editor]" id="editor" value="{:cookie('name')}"  class="form-control" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>文章来源</label>
                                    <input type="text" name="info[source]" id="source" value="科学文化传播处" class="form-control" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label>标题</label>
                                    <input type="text" name="info[title]" id="title"  class="form-control" />
                                </div>

                                <div class="form-group col-md-12">
                                    <label>是否外链(外链请填写外链地址以http://开始)</label>
                                    <input type="text" name="info[ext_links]" value="{$row.ext_links}"  id="keywords" class="form-control" />
                                </div>

                                <div class="form-group col-md-12">
                                    <label>关联标签(不对外显示，多个标签请用空格隔开)</label>
                                    <input type="text" name="info[keywords]" id="keywords" class="form-control" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label>描述</label>
                                    <textarea name="info[description]"  class="form-control"></textarea>
                                </div>


                                {:upload_m('uploadfile','files','','上传视频')}
                                <span>请上传一张视频封面图,视频文件请不超过100MB</span>




                                <!--<div class="form-group col-md-12" style="margin-top:15px;">
									<?php /*echo editor('content'); */?>
                                </div>-->



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
</script>
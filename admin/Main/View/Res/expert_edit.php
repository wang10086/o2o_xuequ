<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>编辑专家信息</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('Res/expert')}">专家</a></li>
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
                            <h3 class="box-title">编辑</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body" style="margin-top:20px;">
                            <form method="post" action="{:U('Res/expert_edit')}" name="myform" id="myform">
                                <input type="hidden" name="dosubmit" value="1" />
                                <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
                                <input type="hidden" name="editid" value="{$row.id}" />
                                <!-- text input -->



                                <div class="form-group col-md-6">
                                    <label>专家名称</label>
                                    <input type="text" name="info[title]" value="{$row.title}"  id="title"  class="form-control" />
                                </div>

                                <div class="form-group col-md-3">
                                    <label>所在领域</label>
                                    <input type="text" name="info[fields]" value="{$row.fields}"  id="fields" class="form-control" />
                                </div>

                                <div class="form-group col-md-3">
                                    <label>序号（数字越大，排序越靠前）</label>
                                    <input type="text" name="info[sort]" value="{$row.sort}"  id="sort" class="form-control" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>实施省市</label>
                                    <select name="info[ss_city]" class="form-control">
                                        <option value="全国">全国</option>
                                        <option value="北京">北京</option>
                                        <option value="天津">天津</option>
                                        <option value="上海">上海</option>
                                        <option value="重庆">重庆</option>
                                        <option value="辽宁">辽宁</option>
                                        <option value="吉林">吉林</option>
                                        <option value="黑龙江">黑龙江</option>
                                        <option value="河北">河北</option>
                                        <option value="山西">山西</option>
                                        <option value="陕西">陕西</option>
                                        <option value="山东">山东</option>
                                        <option value="安徽">安徽</option>
                                        <option value="江苏">江苏</option>
                                        <option value="浙江">浙江</option>
                                        <option value="河南">河南</option>
                                        <option value="湖北">湖北</option>
                                        <option value="湖南">湖南</option>
                                        <option value="江西">江西</option>
                                        <option value="台湾">台湾</option>
                                        <option value="福建">福建</option>
                                        <option value="云南">云南</option>
                                        <option value="海南">海南</option>
                                        <option value="四川">四川</option>
                                        <option value="贵州">贵州</option>
                                        <option value="广东">广东</option>
                                        <option value="甘肃">甘肃</option>
                                        <option value="青海 ">青海 </option>
                                        <option value="西藏">西藏</option>
                                        <option value="新疆">新疆</option>
                                        <option value="广西">广西</option>
                                        <option value="内蒙古">内蒙古</option>
                                        <option value="宁夏 ">宁夏 </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>是否公益</label>
                                    <select name="info[tag]"  class="form-control">
                                        <option value="公益">公益</option>
                                        <option value="非公益">非公益</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>适合人群</label>
                                    <input type="text" name="info[fit]" value="{$row.fit}"  id="pro" class="form-control" />
                                </div>

                                <div class="form-group col-md-12">
                                    <label>标签(多个标签请用空格隔开)</label>
                                    <input type="text" name="info[keywords]" value="{$row.keywords}"  id="keywords" class="form-control" />
                                </div>

                                {:upload_m('uploadfile','files',$atts,'专家照片')}

                                <div class="form-group col-md-12" style="margin-top:15px;">
                                    <?php /*echo editor('content',$row['content']); */?>

                                </div>


                                <div class="form-group">&nbsp;</div>

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

<script type="text/javascript">
    function submintform(){
        var title = $('#title').val();
        if(!title){
            alert('专家名称不能为空');
        }else{
            $('#myform').submit();
        }
    }
</script>

<include file="Index:footer" />
        

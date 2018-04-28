<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>编辑分类</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('Goods/kinds')}">分类管理</a></li>
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
                            <h3 class="box-title">编辑分类</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form method="post" action="{:U('Goods/add_kinds')}" name="myform" id="myform">
                                <input type="hidden" name="dosubmit" value="1" />
                                <input type="hidden" name="id" value="{$row.id}" />
                                <!-- text input -->

                                <div class="form-group col-md-4">
                                    <label>上级分类</label>
                                    <select class="form-control" name="info[pid]">
                                        <option value="0">顶级分类</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>分类名称</label>
                                    <input type="text" name="info[kind_name]" id="kind_name" value="{$row.kind_name}" class="form-control" />
                                </div>


                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success">保存</button>
                                </div>

                                <div class="form-group">&nbsp;</div>
                                <div class="form-group">&nbsp;</div>
                                <div class="form-group">&nbsp;</div>

                            </form>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!--/.col (right) -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<include file="Index:footer" />
        

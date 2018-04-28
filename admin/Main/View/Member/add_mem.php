<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">

    <include file="Index:menu" />

    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>录入 / 编辑 / 用户支撑服务校信息</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('Member/apply_service')}">支撑服务校</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!-- right column -->
                <form class="form-horizontal" role="form" method="post" action="{:U('Member/add_mem')}">
                    <input type="hidden" name="dosubmint" value="1" />
                    <div class="col-md-12">

                        <div class="box box-warning">
                            <div class="box-header">
                                <h3 class="box-title">基本信息</h3>
                            </div>
                            <div class="box-body"  id="form_tip">
                                <!-- text input -->

                                <div class="form-group col-md-10">
                                    <label class="col-sm-4 control-label">学校名称</label>
                                    <div class="col-sm-8">
                                        <input type="text" style="background-color: inherit" class="form-control" name="info[username]"   />
                                    </div>
                                </div>

                                <div class="form-group col-md-10">
                                    <label class="col-sm-4 control-label">手机</label>
                                    <div class="col-sm-8">
                                        <input type="text" style="background-color: inherit" class="form-control" name="info[mobile]"   />
                                    </div>
                                </div>

                                <div class="form-group">&nbsp;</div>

                                <div class="form-group savebtn">
                                    <input type="submit" value="保存" style="display: inline-block;width: 150px;height: 50px; background: #3c8dbc; border-radius: 15px; font-size: 18px; color: #ffffff;">
                                    <!--<button class="btn btn-success btn-lg saves"><i class="fa fa-pencil-square"></i> 保存</button>-->
                                </div>

                            </div>
                        </div><!-- /.box -->
                    </div><!--/.col (right) -->

                </form>

            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->



    <include file="Index:footer" />
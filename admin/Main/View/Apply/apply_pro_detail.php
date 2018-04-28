<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>录入 / 编辑 / 用户支撑服务校信息</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('Apply/apply_service')}">支撑服务校</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <input type="hidden" name="dosubmint" value="1" />
                <input type="hidden" name="id" value="{$row.id}" />
                <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
                <!-- right column -->
                <form class="form-horizontal" role="form">
                <div class="col-md-12">

                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">基本信息</h3>
                        </div>
                        <div class="box-body" style="padding-top:20px;" id="form_tip">
                            <!-- text input -->

                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">学校名称</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row.school_name}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">校长姓名</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row.school_master}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">学校网站</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row.school_web}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">微信公众号</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row.wechat_num}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">所在省份</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row['province']}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">学校地址</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row.school_addr}" readonly />
                                </div>
                            </div>
                            <div class="form-group">&nbsp;</div>
                        </div>
                    </div><!-- /.box -->
                </div><!--/.col (right) -->


                <div class="col-md-12">

                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">科技教育负责人(主管校长或主任)</h3>
                        </div>
                        <div class="box-body" style="padding-top:20px;" id="form_tip">
                            <!-- text input -->

                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">姓名</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row.manager_name}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">性别</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row['manager_sex']}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">职务</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row.manager_job}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">办公电话</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row.tel_num}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">手机</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row.mobile_num}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">邮箱/微信</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row.wechat_email}" readonly />
                                </div>
                            </div>
                            <div class="form-group">&nbsp;</div>
                        </div>
                    </div><!-- /.box -->

                </div><!--/.col (right) -->


                <div class="col-md-12">

                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">联系人</h3>
                        </div>
                        <div class="box-body" style="padding-top:20px;" id="form_tip">
                            <!-- text input -->
                            <!-- text input -->
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">姓名</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row.contacts_name}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">性别</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row.manager_sex}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">职务</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row.contacts_job}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">办公电话</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row.contacts_tel}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">手机</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row.contacts_mobile}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">邮箱/微信</label>
                                <div class="col-sm-8">
                                    <input type="text" style="border: hidden;background-color: inherit" class="form-control" value="{$row.contacts_email}" readonly />
                                </div>
                            </div>
                            <div class="form-group">&nbsp;</div>
                        </div>
                    </div><!-- /.box -->


                </div><!--/.col (right) -->


                <div class="col-md-12">

                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">申报单位科学教育建设情况</h3>
                        </div>
                        <div class="box-body" style="padding-top:20px;" id="form_tip">
                            <!-- text input -->
                            <div class="form-group col-md-12">
                                <textarea name="info[description]" class="form-control" style="height:200px;border: hidden;background-color: inherit" readonly>{$row.description}</textarea>
                            </div>


                            <div class="form-group">&nbsp;</div>
                        </div>
                    </div><!-- /.box -->


                </div><!--/.col (right) -->
                </form>

            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<include file="Index:footer" />

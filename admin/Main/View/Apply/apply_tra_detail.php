<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>审核研学/科学课程预约记录</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('Apply/apply_tra')}">申请记录</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
               
                <!-- right column -->
                <form method="post" action="{:U('Apply/apply_tra_detail')}" name="myform" id="myform" >
                <input type="hidden" name="dosubmint" value="1" />
                <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
                <input type="hidden" name="id" value="{$data.id}" />
                                
                <div class="col-md-12" id="noput">

                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">预约基本信息</h3>
                        </div>
                        <div class="box-body" style="padding-top:0 20px;" id="form_tip">
                            <!-- text input -->
							<div class="form-group" style="padding:20px;">

                                <if condition="$data[type] eq 1">
                                    <label  class="biaoti">科学课程名称：{$data.goods_title}</label>
                                    <else />
                                    <label  class="biaoti">研学旅行名称：{$data.goods_title}</label>
                                </if>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">预约类型</label>
                                <div class="col-sm-8">
                                    <if condition="$data[type] eq 1">
                                        <input type="text" class="form-control noinput" value="科学课程" readonly  />
                                        <else />
                                        <input type="text" class="form-control noinput" value="研学旅行" readonly  />
                                    </if>

                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">邀请者</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control noinput" value="{$data.yq_name}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">负责人</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control noinput" value="{$data.manager_name}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">联系人</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control noinput" value="{$data.call_man}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">联系电话</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control noinput" value="{$data.tel_num}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">联系邮箱</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control noinput" value="{$data.e_mail}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">听课对象</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control noinput" value="{$data.listener}" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">讲课日期</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control noinput" value="{$data.in_day|date='Y-m-d',###}" readonly />
                                </div>
                            </div>

                            <div class="form-group">&nbsp;</div>
                        </div>
                    </div><!-- /.box -->
                </div><!--/.col (right) -->


                

                <div class="col-md-12">

                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">审核</h3>
                        </div>
                        <div class="box-body" style="padding-top:20px;" id="form_tip">
                           	
                                
                            <div class="form-group col-md-12" style="margin-top:10px;">
                                <div class="checkboxlist" id="applycheckbox" style="margin-top:10px;">
                                <input type="radio" name="status" value="1" <?php if($data['status']==1){ echo 'checked';} ?> > 通过 &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="status" value="2" <?php if($data['status']==2){ echo 'checked';} ?> > 不通过
                                </div>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <div style="border-top:1px solid #dedede; margin-top:15px; padding-top:20px;">
                                    <label>审核意见</label>
                                    <textarea class="form-control" name="verify_view" >{$data.verify_view}</textarea>
                                </div>
                            </div>
                           
                            <div class="form-group">&nbsp;</div>
                                   
                        </div>
                    </div><!-- /.box -->
                </div><!--/.col (right) -->

                
                <div class="form-group savebtn">
                    <button class="btn btn-success btn-lg saves">保存</button>
                </div>
                </form>

            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<include file="Index:footer" />

        
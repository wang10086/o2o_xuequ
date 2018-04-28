<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>录入 / 编辑 / 审核支撑服务校信息</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('Apply/apply_service')}">支撑服务校</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="{:U('Apply/apply_pro')}" name="myform" id="myform">
                    <input type="hidden" name="dosubmint" value="1" />
                    <input type="hidden" name="id" value="{$row.id}" />
                    <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
                    <!-- right column -->
                    <div class="col-md-12">

                        <div class="box box-warning">
                            <div class="box-header">
                                <h3 class="box-title">基本信息</h3>
                            </div>
                            <div class="box-body" style="padding-top:20px;" id="form_tip">
                                <!-- text input -->
                                <div class="form-group col-md-4">
                                    <label>学校名称</label>
                                    <input type="text" name="info[school_name]" value="{$row.school_name}" class="form-control"/>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>校长姓名</label>
                                    <input type="text" name="info[school_master]" value="{$row.school_master}" class="form-control"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>学校网站</label>
                                    <input type="text" name="info[school_web]" class="form-control" value="{$row.school_web}"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>微信公众号</label>
                                    <input type="text" name="info[wechat_num]" class="form-control"  value="{$row.wechat_num}"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>所在省份</label>
                                    <select name="info[province]" class="form-control">
                                    	<foreach name="provincelist" item="v">
                                        <option value="{$v}" <?php if($row['province']==$v){ echo 'selected';} ?>>{$v}</option>
                                        </foreach>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>学校地址</label>
                                    <input type="text" name="info[school_addr]" class="form-control" value="{$row.school_addr}"/>
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
                                    <label>姓名</label>
                                    <input type="text" name="info[manager_name]" value="{$row.manager_name}" class="form-control"/>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>性别</label>
                                    <select name="info[manager_sex]" class="form-control">
                                    	<option value="">请选择</option>
                                        <option value="男" <?php if($row['manager_sex']=='男'){ echo 'selected';} ?>>男</option>
                                        <option value="女" <?php if($row['manager_sex']=='女'){ echo 'selected';} ?>>女</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>职务</label>
                                    <input type="text" name="info[manager_job]" class="form-control" value="{$row.manager_job}"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>办公电话</label>
                                    <input type="text" name="info[tel_num]" class="form-control"  value="{$row.tel_num}"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>手机</label>
                                    <input type="text" name="info[mobile_num]" class="form-control"  value="{$row.mobile_num}"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>邮箱/微信</label>
                                    <input type="text" name="info[wechat_email]" class="form-control" value="{$row.wechat_email}"/>
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
                                    <label>姓名</label>
                                    <input type="text" name="info[contacts_name]" value="{$row.contacts_name}" class="form-control"/>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>性别</label>
                                    <select name="info[contacts_sex]" class="form-control">
                                    	<option value="">请选择</option>
                                        <option value="男" <?php if($row['manager_sex']=='男'){ echo 'selected';} ?>>男</option>
                                        <option value="女" <?php if($row['manager_sex']=='女'){ echo 'selected';} ?>>女</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>职务</label>
                                    <input type="text" name="info[contacts_job]" class="form-control" value="{$row.contacts_job}"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>办公电话</label>
                                    <input type="text" name="info[contacts_tel]" class="form-control"  value="{$row.contacts_tel}"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>手机</label>
                                    <input type="text" name="info[contacts_mobile]" class="form-control"  value="{$row.contacts_mobile}"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>邮箱/微信</label>
                                    <input type="text" name="info[contacts_email]" class="form-control" value="{$row.contacts_email}"/>
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
                                	<textarea name="info[description]" class="form-control" style="height:200px;">{$row.description}</textarea>
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
                            <div class="box-body">
                               
                                <div class="form-group col-md-12" style="margin-top:10px;">
                                    <div class="checkboxlist" id="applycheckbox" style="margin-top:10px;">
                                    <input type="radio" name="status" value="1" <?php if($row['status']==1){ echo 'checked';} ?> > 审核通过 &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="status" value="2" <?php if($row['status']==2){ echo 'checked';} ?> > 审核不通过
                                    </div>
                                </div>
                                
                                
                                <div class="form-group col-md-12 select_2 ">
                                    <div style="border-top:2px solid #dedede; margin-top:15px; padding-top:20px;">
                                        <label>审核意见</label>
                                        <textarea name="info[verify_view]" class="form-control" style="height:100px;">{$row.verify_view}</textarea>
                                    </div>
                                </div>
                                
                                
                             
                               
                                <div class="form-group">&nbsp;</div>
                                
                            </div>
                            
                        </div>
                        <div class="form-group savebtn">
                            <button class="btn btn-success btn-lg saves"><i class="fa fa-pencil-square"></i> 保存</button>
                        </div>
                    </div>



                </form>
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<include file="Index:footer" />

<script type="text/jscript">
$(document).ready(function(e) {
	/*
	$('#applycheckbox').find('ins').each(function(index, element) {
		$(this).click(function(){
			if(index==0){
				$('.select_1').show();
				$('.select_2').hide();	
			}else{
				$('.select_2').show();
				$('.select_1').hide();	
			}
		})
	});
	*/
});
</script>

<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>审核专家讲座预约记录</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('Apply/apply_lecture')}">申请记录</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
               
                <!-- right column -->
                <form method="post" action="{:U('Apply/apply_lecture_detail')}" name="myform" id="myform" >
                <input type="hidden" name="dosubmint" value="1" />
                <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
                <input type="hidden" name="id" value="{$data.id}" />
                <input type="hidden" name="zj_id" value="{$data.res_id}" />
                                
                <div class="col-md-12" id="noput">

                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">预约基本信息</h3>
                        </div>
                        <div class="box-body" style="padding-top:0 20px;" id="form_tip">
                            <!-- text input -->
							<div class="form-group" style="padding:20px;">
                                <label  class="biaoti">预约讲座：{$data.article_title}</label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">预约专家</label>
                                <div class="col-sm-8">
                                    <input type="text" name="zj_name" class="form-control noinput" value="{$data.expname}" onblur="check_zj()"  />
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
                                <label class="col-sm-4 control-label">讲课地点</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control noinput" value="{$data.show_addr}" readonly />
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
                                    <input type="text" class="form-control noinput" value="{$data.in_day}" readonly />
                                </div>
                            </div>
                            <if condition="$type eq 0">
                                <div class="form-group col-md-12">
                                    <label class="col-sm-4 control-label">预约关键词</label>
                                    <div class="col-sm-8"><textarea class="noinput_area" readonly>{$data.vague_keywords}</textarea></div>
                                </div>
                            </if>

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
                           	
                                
                            <div class="form-group col-md-12" style="margin-top:10px; margin-bottom: 30px;">
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
                
                
                <div class="col-md-12 select_1" <?php if($data['status']==2 || $data['status']==0){ echo 'style="display:none;"'; } ?>>

                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">确认并将预约记录同步至排课系统</h3>
                        </div>
                        <div class="box-body" style="padding-top:20px;" id="form_tip">
                        	<input type="hidden" name="info[cour_id]" value="{$data.article_id}">
                            <input type="hidden" name="info[order_id]" value="{$data.id}">
                            <input type="hidden" name="info[teacher_id]" value="{$data.cms_exp_id}">
                            <div class="form-group col-md-6">
                                <label>课程名称</label>
                                <input type="text" name="info[task]"  value="<?php if($wots){ echo $wots['task']; }else{ echo $data['article_title'];} ?>"  class="form-control"/>
                            </div>
                           
                            <div class="form-group col-md-6">
                                <label>讲课专家</label>
                                <input type="text" name="info[teacher]"  value="<?php if($wots){ echo $wots['teacher']; }else{ echo $data['expname'];} ?>" id="teacher" class="form-control" readonly/>
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label>讲课日期</label>
                                <div class="input-group" onclick="laydate({elem: '#builddate'});">
                                    <input type="text" name="info[builddate]"  value="<?php if($wots){ echo $wots['builddate']; }else{ echo date('Y-m-d',$inday);} ?>" id="builddate" class="form-control"/>
                                    <span class="input-group-addon" style="width:32px;"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div> 
                            
                            <div class="form-group col-md-3">
                                <label>上课时间</label>
                                <div class="time_pick">
                                    <input type="text" name="info[stime]" value="<?php if($wots){ echo $wots['stime']; } ?>" class="timeselect form-control" />
                                </div>
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label>预计时长（分钟）</label>
                                <input type="text" name="info[duration]"  value="<?php if($wots){ echo $wots['duration']; } ?>" class="form-control"/>
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label>预计人数</label>
                                <input type="text" name="info[stu_num]"  value="<?php if($wots){ echo $wots['stu_num']; } ?>" class="form-control"/>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label>上课场地</label>
                                <input type="text" name="info[site]" value="<?php if($wots){ echo $wots['site']; }else{ echo $data['show_addr'];} ?>" class="form-control" />
                            </div>
                            
                            
                            <div class="form-group col-md-12">
                                <label>备注</label>
                                <textarea class="form-control" name="info[remarks]" style="height:100px;"><?php if($wots){ echo $wots['remarks']; } ?></textarea>
                            </div>
                            
                            <div class="form-group col-md-12" style="margin-top:10px;">
                                <div class="checkboxlist" id="applycheckbox" style="margin-top:10px;">
                                <input type="checkbox" name="sms_xx" value="1"> 短信通知预约联系人（学校） &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="sms_zj" value="1"> 短信通知预约专家
                                </div>
                            </div>
                            
                            <div class="form-group">&nbsp;</div>
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
<script type="text/javascript">
    $(".timeselect").timepicki();
    $(document).ready(function(e) {
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
    });


 //检查输入专家名字是否正确-
    function check_zj(){
        var name = $("input[name='zj_name']").val();
        $.ajax({
            type:"POST",
            url :"{:U('Ajax/check_zj')}",
            data:{name:name},
            success:function(msg){
                if(msg != 0){
                   $("input[name=zj_id]").val(msg);
                }else{
                    alert("请输入正确的专家名称");
                    return false;
                }
            }
        })
    }

</script>
<script>

</script>
        
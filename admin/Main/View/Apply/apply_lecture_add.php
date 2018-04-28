<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>新增预约记录</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('Apply/apply_lecture')}">预约记录列表</a></li>
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
                            <h3 class="box-title">添加记录</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body" style="margin-top:20px;">
                            <form method="post" action="{:U('Apply/Apply_lec_add')}" name="myform" id="myform" onsubmit="return beforeSubmit(this)">
                                <input type="hidden" name="dosubmint" value="1" />
                                <!-- text input -->
                                <div class="form-group col-md-4">
                                    <label>学校(单位)名称</label>
                                    <input type="text" name="info[unit_name]" value="{$row.unit_name}"  id="title"  class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <label>讲课地点</label>
                                    <input type="text" name="info[show_addr]" value="{$row.show_addr}" class="form-control" />
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>联系人姓名</label>
                                    <input type="text" name="info[yq_name]" value="{$row.yq_name}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <label>联系电话</label>
                                    <input type="text" name="info[tel_num]" value="{$row.tel_num}" id="tel" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <label>电子邮箱(微信)</label>
                                    <input type="text" name="info[e_mail]" value="{$row.e_mail}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <label>讲课时间</label>
                                    <input type="text" name="info[in_day]" value="{$row.in_day}" class="inputdate form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <label>听课对象</label>
                                    <input type="text" name="info[listener]" value="{$row.listener}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <label>专家名字</label>
                                    <input type="text" name="zj_name" value="{$row.zj_name}" onblur="check_zj()" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <label>演讲课程</label>
                                    <select class="form-control"  name="info[article_title]" id="article_title">

                                    </select>
                    
                                </div>

                                <div class="form-group">&nbsp;</div>
                                <div class="form-group">&nbsp;</div>
                            </div>
                        </div><!-- /.box -->
                        <div class="form-group savebtn">
                            <button class="btn btn-success btn-lg saves" ><i class="fa fa-pencil-square"></i> 保存</button>
                        </div>
                    </div><!--/.col (right) -->
					</form>
                </div><!--/.col (right) -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<script type="text/javascript">
    //检验表单
    function beforeSubmit(form) {
        var title = $('#title').val();
        var tel = $('#tel').val();
        var zj_name = $("input[name='zj_name']").val();
        if (!title) {
            alert('邀请单位不能为空');
            return false;
        } else if (!tel) {
            alert('电话号码不能为空');
            return false;
        }else if(!zj_name){
            alert("专家名字不能为空");
            return false;
        }else{
            $('#myform').submit();
        }
    }

    //检查输入专家名字是否正确
    function check_zj(){
        var name = $("input[name='zj_name']").val();
        $.ajax({
            type:"POST",
            url :"{:U('Ajax/add_lecture')}",
            data:{name:name},
            success:function(msg){
                if(msg){
                    $("#article_title").empty();
                    var count = msg.length;
                    var i= 0;
                    var b="";
                    b+='<option value="" disabled selected>请选择课程</option>';
                    for(i=0;i<count;i++){
                        b+="<option value='"+msg[i].title+"'>"+msg[i].title+"</option>";
                    }
                    $("#article_title").append(b);
                }else{
                    $("#article_title").empty();
                    alert("请输入正确的专家名称");
                }
            }
        })
    }

    //时间插件
    laydate.render({
        elem: '.inputdate',theme: '#0099CC',type: 'datetime'
    });
</script>

<include file="Index:footer" />


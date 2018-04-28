		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>新增用户</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('User/index')}">用户管理</a></li>
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
                                    <h3 class="box-title">新增用户</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                <form method="post" action="{:U('User/add')}" name="myform" id="myform">
                                	<div class="formbox">
                                    	
                                        <input type="hidden" name="dosubmit" value="1" />
                                        <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />             						
                                        
                                        
                                        <div class="form-group col-md-4">
                                            <label>角色</label>
                                            <select class="form-control" name="info[roleid]" id="juese" onChange="selectls()">
                                                <foreach name="roles" item="v">
                                                <option value="{$v.id}">{$v.name}</option>
                                                </foreach>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label>账号状态</label>
                                            <select class="form-control" name="info[status]">
                                                <option value="0">启用</option>
                                                <option value="1">禁用</option>
                                               
                                            </select>
                                        </div>
                                        
                                       
                                        <div class="form-group col-md-4" style="position:relative">
                                            <label>用户组</label>
                                            <input type="text" name="info[user_group]"  value="{$row.user_group}"  class="form-control" />
                                        </div>

                                        
                                        
                                        <div class="form-group col-md-4" style="position:relative">
                                            <label>用户名</label>
                                            <input type="text" name="info[username]" id="username"  class="form-control" />
                                        </div>
                                        
                                        
                                        
                                        <div class="form-group col-md-4">
                                            <label>密码</label>
                                            <input type="password" name="password_1" id="password_1" maxlength="16"  class="form-control" />
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label>确认密码</label>
                                            <input type="password" name="password_2" id="password_2"  maxlength="16"  class="form-control" />
                                        </div>
                                        
                                        
                                        <div class="form-group col-md-4">
                                            <label>姓名</label>
                                            <input type="text" name="info[name]" id="regname" class="form-control" />
                                        </div>
                                        
                                        
                                        <div class="form-group col-md-4" style="position:relative">
                                            <label>邮箱</label>
                                            <input type="text" name="info[email]" id="email" class="form-control" />
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label>手机号码</label>
                                            <input type="text" name="info[mobile]" id="mobile" maxlength="11" class="form-control" />
                                        </div>

                                        
                                        
                                        <div class="form-group col-md-4">
                                            <label>单位</label>
                                            <input type="text" name="info[company]" class="form-control" />
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label>部门</label>
                                            <input type="text" name="info[department]" class="form-control" />
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label>职位</label>
                                            <input type="text" name="info[post]"  class="form-control" />
                                        </div>
                                        
                                        
                                        <div class="form-group col-md-12">
                                            <label>擅长领域</label>
                                            <textarea class="form-control" name="info[speciality]" style="height:100px;" ></textarea>
                                        </div>
    
                                   		
                                    </div>
                                    <div class="form-group">&nbsp;</div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            <div class="form-group savebtn">
                                <button class="btn btn-success btn-lg saves"><i class="fa fa-pencil-square"></i> 保存</button>
                            </div>
                            </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
        
        <include file="Index:footer" />
        
		<script type="text/javascript">
		$(document).ready(function(){
			$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
			$("#username").formValidator({onshow:"4-20位字符，可由英文、数字组成",onfocus:"4-20位字符，可由英文、数字组成"}).inputValidator({min:4,max:20,onerror:"4-20位字符，可由英文、数字组成"}).regexValidator({regexp:"ps_username",datatype:"enum",onerror:"4-20位字符，可由中文、英文、数字组成"}).ajaxValidator({
				type : "get",
				url : "<?php echo U('User/public_checkname_ajax'); ?>",
				data :"m=Main&c=User&a=public_checkname_ajax",
				datatype : "html",
				async:'false',
				success : function(data){
					if( data == 1 ) {
						return true;
					} else {
						return false;
					}
				},
				buttons: $("#dosubmit"),
				onerror : "该用户名不可用。",
				onwait : "请稍候..."
			});
			$("#password_1").formValidator({onshow:"6-20位字符(字符、数字、符号)组成",onfocus:"6-20位字符（字符、数字、符号）组成"}).inputValidator({min:6,max:20,onerror:"6-20位字符(字符、数字、符号)组成"});
			$("#password_2").formValidator({onshow:"请再次输入密码",onfocus:"请再次输入密码",oncorrect:"&nbsp;"}).inputValidator({min:1,onerror:"确认密码不能为空"}).compareValidator({desid:"password_1",operateor:"=",onerror:"与上面密码不一致，请重新输入"});
			$("#regname").formValidator({onshow:"请输入姓名",onfocus:"姓名为不低于2位字符",oncorrect:"&nbsp;"}).inputValidator({min:2,max:20,onerror:"姓名输入有误"});
			$("#email").formValidator({onshow:"请输入邮箱",onfocus:"请输入邮箱"}).inputValidator({min:4,max:20,onerror:"请输入邮箱"}).regexValidator({regexp:"email",datatype:"enum",onerror:"请输入邮箱"});
			$("#mobile").formValidator({onShow:"请输入你的手机号码，可以为空哦",onFocus:"你要是输入了，必须输入正确"}).inputValidator({min:11,max:11,onError:"手机号码必须是11位的,请确认"}).regexValidator({regexp:"^1[3|4|5|7|8][0-9]{9}$",onerror:"你输入的手机格式不正确"});
			
	
		});
		</script>
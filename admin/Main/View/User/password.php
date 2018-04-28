		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>修改密码</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('User/index')}">用户管理</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                         <!-- right column -->
                        <div class="col-md-6">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">修改密码</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form method="post" action="{:U('User/password')}" name="basic_validate" id="basic_validate" enctype="multipart/form-data" novalidate />
                                    <input type="hidden" name="dosubmit" value="1" />
                                    <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
                                		<input type="hidden" name="editdate" value="{$row.id}" />
                                        <!-- text input -->
                                        
                                        <div class="form-group">
                                            <label>用户名</label>
                                            <input type="text" class="form-control" value="{$row.username}" disabled="">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>新密码</label>
                                            <input type="password" name="password_1" value="" id="password_1" class="form-control"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>确认密码</label>
                                            <input type="password" name="password_2" value="" id="password_2" class="form-control"/>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                        	<button type="submit" class="btn btn-success">修改</button>
                                        </div>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
		
        <include file="Index:footer" />
        
        <script type="text/javascript">
		$(document).ready(function(){
			$.formValidator.initConfig({autotip:true,formid:"basic_validate",onerror:function(msg){}});
			
			$("#password_1").formValidator({onshow:"6-20位字符（字符、数字、符号）组成",onfocus:"6-20位字符（字符、数字、符号）组成"}).inputValidator({min:6,max:20,onerror:"6-20位字符（字符、数字、符号）组成"});
			$("#password_2").formValidator({onshow:"请再次输入密码",onfocus:"请再次输入密码",oncorrect:"&nbsp;"}).inputValidator({min:1,onerror:"确认密码不能为空"}).compareValidator({desid:"password_1",operateor:"=",onerror:"与上面密码不一致，请重新输入"});
	
		});
		</script>
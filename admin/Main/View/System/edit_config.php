		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1><?php if($row){ echo '编辑网站配置'; }else{ echo '新增网站配置'; } ?></h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('System/config')}">网站配置管理</a></li>
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
                                    <h3 class="box-title"><?php if($row){ echo '编辑网站配置'; }else{ echo '新增网站配置'; } ?></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    	<form method="post" action="{:U('System/edit_config')}" name="myform" id="myform">
                                        <input type="hidden" name="dosubmit" value="1" />
                                        <input type="hidden" name="id" value="{$row.id}" />
                                        <!-- text input -->
                                        <div class="form-group col-md-12">
                                            <label>配置项</label>
                                            <input type="text" name="info[conf_explain]" id="conf_explain" value="{$row.conf_explain}"  class="form-control" />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>标识</label>
                                            <input type="text" name="info[conf_key]" id="conf_key"  <?php if(!$show){ echo 'readonly';} ?>  value="{$row.conf_key}"  class="form-control" />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>内容</label>
                                            <textarea  class="form-control" id="conf_val" name="info[conf_val]" style="height:300px" >{$row.conf_val}</textarea>
                                        </div>
                                        
                                        
                                        <div class="form-group col-md-12">
                                        	<button type="submit" class="btn btn-success">保存</button>
                                        </div>
                                        
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
        
		<script type="text/javascript">
		$(document).ready(function(){
			/*
			$.formValidator.initConfig({autotip:true,formid:"basic_validate",onerror:function(msg){}});
			$("#username").formValidator({onshow:"4-20位字符，可由英文、数字组成",onfocus:"4-20位字符，可由英文、数字组成"}).inputValidator({min:4,max:20,onerror:"4-20位字符，可由英文、数字组成"}).regexValidator({regexp:"ps_username",datatype:"enum",onerror:"4-20位字符，可由中文、英文、数字组成"}).ajaxValidator({
				type : "get",
				url : "<?php echo U('User/public_checkname_ajax'); ?>",
				data :"m=User&a=public_checkname_ajax",
				datatype : "html",
				async:'false',
				success : function(data){
					if( data == "1" ) {
						return true;
					} else {
						return false;
					}
				},
				buttons: $("#dosubmit"),
				onerror : "该用户名不可用。",
				onwait : "请稍候..."
			});
			$("#email").formValidator({onshow:"请输入邮箱",onfocus:"请输入邮箱"}).inputValidator({min:4,max:20,onerror:"请输入邮箱"}).regexValidator({regexp:"email",datatype:"enum",onerror:"请输入邮箱"}).ajaxValidator({
				type : "get",
				url : "ucenter.php",
				data :"m=User&a=public_checkmail_ajax",
				datatype : "html",
				async:'false',
				success : function(data){
					if( data == "1" ) {
						return true;
					} else {
						return false;
					}
				},
				buttons: $("#dosubmit"),
				onerror : "该邮箱已被注册。",
				onwait : "请稍候..."
			});
			$("#password_1").formValidator({onshow:"6-20位字符（字符、数字、符号）组成",onfocus:"6-20位字符（字符、数字、符号）组成"}).inputValidator({min:6,max:20,onerror:"6-20位字符（字符、数字、符号）组成"});
			$("#password_2").formValidator({onshow:"请再次输入密码",onfocus:"请再次输入密码",oncorrect:"&nbsp;"}).inputValidator({min:1,onerror:"确认密码不能为空"}).compareValidator({desid:"password_1",operateor:"=",onerror:"与上面密码不一致，请重新输入"});
			*/
	
		});
		</script>
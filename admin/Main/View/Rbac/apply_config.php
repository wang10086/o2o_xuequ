		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
           
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>审核配置</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('Rbac/apply_config')}">审核配置</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                   

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                         <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">审核配置</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered dataTable fontmini" id="tablelist">
                                        <tr role="row" class="orders" >
                                        	
                                            <th class="sorting" data="title" width="100">审核项</th>
                                            <th class="sorting" data="role">用户组权限</th>
                                            <th class="sorting" data="user">用户权限</th>
                                            <if condition="rolemenu(array('Rbac/apply_edit'))">
                                            <th width="60" class="taskOptions">配置</th>
                                            </if>
                                        </tr>
                                        <foreach name="datalist" item="row">
                                        <tr>
                                            <td>{$row.title}</td>
                                            <td class="role_{$row.id}">{$row.role}</td>
                                            <td class="user_{$row.id}">{$row.user}</td>
                                            <if condition="rolemenu(array('Rbac/apply_edit'))">
                                            <td class="taskOptions">
                                            <button onClick="config('{$row.title}',{$row.id});" title="配置权限" class="btn btn-info btn-smsm"><i class="fa fa-pencil"></i></button>
                                            </td>
                                            </if>
                                            
                                        </tr>
                                        </foreach>		
                                        
                                    </table>
                                </div><!-- /.box-body -->
                                <div class="box-footer clearfix">
                                	<div class="pagestyle">{$pages}</div>
                                </div>
                            </div><!-- /.box -->

                            
                        </div><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
		
        

        <include file="Index:footer" />
        
        <script type="text/javascript">
        //权限配置
		function config(title,obj) {
			art.dialog.open('op.php?c=Rbac&a=apply_edit&id='+obj,{
				lock:true,
				title: '配置'+title+'权限',
				width:1000,
				height:500,
				okValue: '保存',
				fixed: true,
				ok: function () {
					var origin = artDialog.open.origin;
					var data = this.iframe.contentWindow.gosubmint();	
					var role = '';
					var user = '';
					for (var j = 0; j < data.length; j++) {
						if(data[j].role){
							role += data[j].role+'-';
						}
						if(data[j].user){
							user += data[j].user+'-';
						}
					}
					//保存
					$.ajax({
		               type: "POST",
		               url: "<?php echo U('Rbac/save_app'); ?>",
					   dataType:'json', 
		               data: {id:obj,user:user,role:role},
		               success:function(data){
		                   $('.role_'+obj).text(data.role);
						   $('.user_'+obj).text(data.user);
			           }
		           });
				},
				cancelValue:'取消',
				cancel: function () {
				}
			});	
		}
	
        </script>
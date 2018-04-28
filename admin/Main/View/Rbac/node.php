		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
           
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>节点管理</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('Rbac/node')}">节点管理</a></li>
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
                                    <h3 class="box-title">节点列表</h3>
                                    <div class="pull-right box-tools">
                                        <!--
                                        <button class="btn btn-info btn-sm" id="search"><i class="fa fa-search"></i></button>
                                        -->
                                        <button onClick="javascript:window.location.href='{:U('Rbac/addnode',array('pid'=>1,'level'=>2))}';" title="添加控制器" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i></button>
                                       
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                <foreach name="nodes" item="app">
                                    <table class="table table-bordered dataTable fontmini" id="tablelist">
                                    	<tr role="row">
                                            <th width="160">ID</th>
                                            <th width="">节点名称</th>
                                            <th width="80">类型</th>
                                            <th width="80">状态</th>
                                            <if condition="rolemenu(array('Rbac/addnode'))">
                                            <th width="50" class="taskOptions">添加</th>
                                            </if>
                                            <if condition="rolemenu(array('Rbac/addnode'))">
                                            <th width="50" class="taskOptions">修改</th>
                                            </if>
                                            <if condition="rolemenu(array('Delete/node'))">
                                            <th width="50" class="taskOptions">删除</th>
                                            </if>
										</tr>
                                        <foreach name="app.child" item="action">
                                    	<tr bgcolor="#ccc">
                                        	<td>{$action.name}</td>
                                            <td>{$action.title}</td>
                                            <td>控制器</td>
                                            <td>{$action.status}</td>
                                            <if condition="rolemenu(array('Rbac/addnode'))">
                                            <td class="taskOptions">
                                                <button onClick="javascript:window.location.href='{:U('Rbac/addnode',array('pid'=>$action['id'],'level'=>3))}';" title="添加节点" class="btn btn-info btn-smsm"><i class="fa fa-plus"></i></button>
                                            </td>
                                            </if>
                                            <if condition="rolemenu(array('Rbac/addnode'))">
                                            <td class="taskOptions">
                                                <button onClick="javascript:window.location.href='{:U('Rbac/addnode',array('id'=>$action['id'],'level'=>2))}';" title="修改节点" class="btn btn-success btn-smsm"><i class="fa fa-pencil"></i></button>
                                            </td>
                                            </if>
                                            <if condition="rolemenu(array('Delete/node'))">
                                            <td class="taskOptions">
                                            	<button onClick="javascript:ConfirmDel('{:U('Delete/node',array('id'=>$action['id']))}')" title="删除节点" class="btn btn-warning btn-smsm"><i class="fa fa-times"></i></button>
                                            </td>
                                            </if>
                                        </tr>
                                        <foreach name="action.child" item="method">
                                        <tr>
                                        	<td>{$method.name}</td>
                                            <td>{$method.title}</td>
                                            <td>方法</td>
                                            <td>{$method.status}</td>
                                            <if condition="rolemenu(array('Rbac/addnode'))">
                                            <td class="taskOptions">&nbsp;</td>
                                            </if>
                                            <if condition="rolemenu(array('Rbac/addnode'))">
                                            <td class="taskOptions">
                                                <button onClick="javascript:window.location.href='{:U('Rbac/addnode',array('id'=>$method['id'],'level'=>3))}';" title="修改节点" class="btn btn-success btn-smsm"><i class="fa fa-pencil"></i></button>
                                            </td>
                                            </if>
                                            <if condition="rolemenu(array('Delete/node'))">
                                            <td class="taskOptions">
                                                <button onClick="javascript:window.location.href='{:U('Delete/node',array('id'=>$method['id']))}';"  title="删除节点" class="btn btn-warning btn-smsm"><i class="fa fa-times"></i></button>
                                            </td>
                                            </if>
                                        </tr>	
                                        </foreach>
                                        </foreach>			
                                    </table>
                                    </foreach>
                                </div><!-- /.box-body -->
                                <div class="box-footer clearfix">
                                	
                                </div>
                            </div><!-- /.box -->

                            
                        </div><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <include file="Index:footer" />
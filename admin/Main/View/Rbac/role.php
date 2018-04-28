		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
           
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>角色管理</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('Rbac/role')}">角色管理</a></li>
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
                                    <h3 class="box-title">角色列表</h3>
                                    <div class="pull-right box-tools">
                                    	<!--
                                        <button class="btn btn-info btn-sm" id="search"><i class="fa fa-search"></i></button>
                                        -->
                                        <button onClick="javascript:window.location.href='{:U('Rbac/addrole')}';" title="添加角色" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i></button>
                                       
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered dataTable fontmini" id="tablelist">
                                    	<tr role="row" class="orders">
											<th class="sorting" data="id">ID</th>
                                            <th class="sorting" data="name">角色名</th>
                                            <th class="sorting" data="remark" >角色描述</th>
                                            <th class="sorting" data="status">状态</th>
                                            <if condition="rolemenu(array('Rbac/addrole'))">
                                            <th width="60" class="taskOptions">修改</th>
                                            </if>
                                            <if condition="rolemenu(array('Rbac/priv'))">
                                            <th width="60" class="taskOptions">权限</th>
                                            </if>
                                            <if condition="rolemenu(array('Delete/role'))">
                                            <th width="60" class="taskOptions">删除</th>
                                            </if>
										</tr>
                                        <foreach name="roles" item="row">
                                        <tr>
											<td>{$row.id}</td>
                                            <td>{$row.name}</td>
                                            <td>{$row.remark}</td>
                                            <td><if condition="$row['status']==1">启用<else/>停用</if></td>
                                            <if condition="rolemenu(array('Rbac/addrole'))">
                                            <td class="taskOptions">
                                                <button onClick="javascript:window.location.href='{:U('Rbac/addrole',array('id'=>$row['id']))}';" class="btn btn-success btn-smsm" title="修改角色"><i class="fa fa-pencil"></i></button>
                                            </td>
                                            </if>
                                            <if condition="rolemenu(array('Rbac/priv'))">
                                            <td class="taskOptions">
                                                <button onClick="javascript:window.location.href='{:U('Rbac/priv',array('roleid'=>$row['id']))}';" class="btn btn-info btn-smsm" title="分配权限"><i class="fa fa-plus"></i></button>
                                            </td>
                                            </if>
                                            <if condition="rolemenu(array('Delete/role'))">
                                            <td class="taskOptions">
                                                <button onClick="javascript:ConfirmDel('{:U('Delete/role',array('id'=>$row['id']))}');"  class="btn btn-warning btn-smsm" title="删除角色"><i class="fa fa-times"></i></button>
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
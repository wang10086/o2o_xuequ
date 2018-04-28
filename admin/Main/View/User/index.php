		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
           
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>用户管理</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('User/index')}">用户管理</a></li>
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
                                    <h3 class="box-title">用户列表</h3>
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-info btn-sm" onclick="javascript:opensearch('searchtext',300,260);"><i class="fa fa-search"></i></button>
                                        <if condition="rolemenu(array('User/add'))">
                                        <button onClick="javascript:window.location.href='{:U('User/add')}';" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i></button>
                                        </if>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered dataTable fontmini" id="tablelist">
                                        <tr role="row" class="orders" >
                                        	<if condition="rolemenu(array('User/status'))">
                                            <th width="60" class="taskOptions sorting" data="a.status">状态</th>
                                            </if>
                                            <th class="sorting" data="a.avatar" width="60" align="center" style="text-align:center;">头像</th>
                                            <th class="sorting" data="a.username">用户名</th>
                                            <th class="sorting" data="a.name">姓名</th>
                                            <th class="sorting" data="a.mobile">手机号</th>
                                            <th class="sorting" data="a.email">Email</th>
                                            <th class="sorting" data="a.update_time">最近登陆时间</th>
                                            <th class="sorting" data="a.roleid">角色</th>
                                            <if condition="rolemenu(array('User/password'))">
                                            <th width="60" class="taskOptions">密码</th>
                                            </if>
                                            <if condition="rolemenu(array('User/edit'))">
                                            <th width="60" class="taskOptions">编辑</th>
                                            </if>
                                            <if condition="rolemenu(array('Delete/user'))">
                                            <th width="60" class="taskOptions">删除</th>
                                            </if>
                                        </tr>
                                        <foreach name="users" item="row">
                                        <tr>
                                        	<if condition="rolemenu(array('User/status'))">
                                            <td class="taskOptions" style="line-height:32px;">
                                            <?php if($row['status']==0){ echo '<span class="green">正常</span>'; }else{ echo '<span class="red">停用</span>'; }  ?>
                                            </td>
                                            </if>
                                            <td align="center" style="text-align:center;"><img src="{$row.avatar}" class="useravatar"></td>
                                            <td style="line-height:32px;">{$row.username}</td>
                                            <td style="line-height:32px;">{$row.name}</td>
                                            <td style="line-height:32px;">{$row.mobile}</td>
                                            <td style="line-height:32px;">{$row.email}</td>
                                            <td style="line-height:32px;"><if condition="$row['update_time']">{$row.update_time|date='Y-m-d H:i:s',###}</if></td>
                                            <td style="line-height:32px;">{$row.remark}</td>
                                            <if condition="rolemenu(array('User/password'))">
                                            <td class="taskOptions" style="line-height:32px;">
                                            <button onClick="javascript:window.location.href='{:U('User/password',array('id'=>$row['userid']))}';" title="修改密码" class="btn btn-success btn-smsm"><i class="fa fa-lock"></i></button>
                                            </td>
                                            </if>
                                            <if condition="rolemenu(array('User/edit'))">
                                            <td class="taskOptions" style="line-height:32px;">
                                            <button onClick="javascript:window.location.href='{:U('User/edit',array('id'=>$row['userid']))}';" title="修改资料" class="btn btn-info btn-smsm"><i class="fa fa-pencil"></i></button>
                                            </td>
                                            </if>
                                            <if condition="rolemenu(array('Delete/user'))">
                                            <td class="taskOptions" style="line-height:32px;">
                                            <?php  if($row['username']!=C('RBAC_SUPER_ADMIN')){ ?>
                                            <button onClick="javascript:ConfirmDel('{:U('Delete/user',array('id'=>$row['userid']))}');" title="删除用户" class="btn btn-warning btn-smsm"><i class="fa fa-times"></i></button>
                                            <?php } ?>
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
		
        <div id="searchtext">
            <form action="" method="get" id="searchform">
            <input type="hidden" name="c" value="User">
            <input type="hidden" name="a" value="index">
            <div class="form-group">
                <select  class="form-control"  name="status">
                    <option value="">状态</option>
                    <option value="0" <?php if($status==0){ echo 'selected';} ?>>正常</option>
                    <option value="1" <?php if($status==1){ echo 'selected';} ?>>停用</option>
                </select>
            </div>
            <div class="form-group">
                <select  class="form-control"  name="pid">
                    <option value="">渠道</option>
                    <foreach name="companylist" item="row">
                    <option value="{$row.id}" <?php if($pid==$row['id']){ echo 'selected';} ?>>{$row.company_name}</option>
                    </foreach>
                </select>
            </div>
            <div class="form-group">
                <select  class="form-control"  name="role">
                    <option value="">角色</option>
                    <foreach name="rolelist" item="row">
                    <option value="{$row.id}" <?php if($role==$row['id']){ echo 'selected';} ?>>{$row.remark}</option>
                    </foreach>       
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="user" placeholder="用户名" value="{$user}" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="name" placeholder="使用者" value="{$name}" class="form-control"/>
            </div>
            </form>
        </div>

        <include file="Index:footer" />
        
        
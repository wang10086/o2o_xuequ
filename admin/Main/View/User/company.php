		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
           
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>企业管理</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('User/dealer')}">企业管理</a></li>
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
                                    <h3 class="box-title">企业列表</h3>
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-info btn-sm" onclick="javascript:opensearch('searchtext',300,80);"><i class="fa fa-search"></i></button>
                                        <if condition="rolemenu('User/company_edit')">
                                        <button onClick="javascript:window.location.href='{:U('User/company_edit')}';" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i></button>
                                        </if>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered dataTable fontmini" id="tablelist">
                                        <tr role="row" class="orders" >
                                            <th class="sorting" data="comid">企业编号</th>
                                            <th class="sorting" data="company">企业名称</th>
                                            <if condition="rolemenu('User/dealer_edit')">
                                            <th width="60" class="taskOptions">编辑</th>
                                            </if>
                                            <if condition="rolemenu('Delete/user')">
                                            <th width="60" class="taskOptions">删除</th>
                                            </if>
                                        </tr>
                                        <foreach name="companylist" item="row">
                                        <tr>
                                        	 
                                            <td>{$row.comid}</td>
                                            <td>{$row.company}</td>
                                            <if condition="rolemenu('User/company_edit')">
                                            <td class="taskOptions">
                                            <button onClick="javascript:window.location.href='{:U('User/company_edit',array('id'=>$row['comid']))}';" title="修改资料" class="btn btn-info btn-smsm"><i class="fa fa-pencil"></i></button>
                                            </td>
                                            </if>
                                            <if condition="rolemenu('Delete/company')">
                                            <td class="taskOptions">
                                            <button onClick="javascript:ConfirmDel('{:U('Delete/company',array('id'=>$row['comid']))}');" title="删除用户" class="btn btn-warning btn-smsm"><i class="fa fa-times"></i></button>
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
            <input type="hidden" name="m" value="User">
            <input type="hidden" name="a" value="company">
            
            <div class="form-group">
                <input type="text" name="company_name" placeholder="企业名称" class="form-control">
            </div>
            
            </form>
        </div>

        <include file="Index:footer" />
        
        
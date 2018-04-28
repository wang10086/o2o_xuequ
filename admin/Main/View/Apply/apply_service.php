		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
           
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>支撑服务校申请记录</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('Apply/index')}">支撑服务校申请记录</a></li>
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
                                    <h3 class="box-title">支撑服务校申请记录</h3>
                                    <div class="pull-right box-tools">
                                    	<a href="javascript:;" class="btn btn-info btn-sm" onclick="javascript:opensearch('searchtext',700,120);" style="color:#ffffff;"><i class="fa fa-search"></i> 搜索</a>
                                        <if condition="rolemenu('Apply/apply_pro')">
                                            <a href="{:U('Apply/apply_pro')}" style="color:#ffffff;" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> 录入学校</a>
                                        </if>
                                    </div>
                                    
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered dataTable fontmini" id="tablelist">
                                    	<tr role="row" class="orders" >
                                        	<th class="sorting" data="id" width="05">ID</th>
											<th class="sorting" data="school_name">学校名称</th>
                                            <th class="sorting" data="manager_name" width="70">负责人</th>
                                            <th class="sorting" data="mobile_num">负责人电话</th>
                                            <th class="sorting" data="contacts_name"  width="70">联系人</th>
                                            <th class="sorting" data="contacts_mobile">联系电话</th>
											<th class="sorting" data="apply_time">申请时间</th>
                                            <th class="sorting" data="status" width="90">状态</th>
                                            <if condition="rolemenu('Apply/apply_pro')">
                                                <th class="sorting taskOptions" width="180">操作</th>
                                            </if>
										</tr>
                                        <foreach name="users" item="row">
                                        <tr>
                                        	<td>{$row.id}</td>
											<td>{$row.school_name}</td>
                                            <td>{$row.manager_name}</td>
                                            <td>{$row.mobile_num}</td>
                                            <td>{$row.contacts_name}</td>
                                            <td>{$row.contacts_mobile}</td>
											<td><if condition="$row['apply_time']">{$row.apply_time|date='Y-m-d H:i:s',###}</if></td>
                                            
                                            <td>{$row.strstatus}</td>
                                            
                                            <if condition="rolemenu('Goods/edit')">
                                            <td class="taskOptions" >
                                                <if condition="$row.status eq 0">
                                                    <a href="{:U('Apply/apply_pro',array('id'=>$row['id']))}" title="审核" class="btn btn-upd btn-smsm"><i class="fa fa-pencil"></i>审核</a>
                                                    <else />
                                                    <a href="javascript:;" title="审核" class="btn btn-upd btn-smsm" disabled><i class="fa fa-pencil"></i>审核</a>
                                                </if>

                                                <a href="{:U('Apply/apply_pro_detail',array('id'=>$row['id']))}" title="详情" class="btn btn-info btn-smsm"><i class="ion-gear-a"></i>详情</a>
                                                <!--<a href="{:U('Apply/apply_pro_del',array('id'=>$row['id']))}" onclick="return del()" title="删除" class="btn btn-del btn-smsm"><i class="icon ion-close-circled"></i>删除</a>-->
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
            <form method="get" action="{:U('Apply/apply_service')}" id="searchfrom" name="myform">
            <input type="hidden" name="m" value="Main">
            <input type="hidden" name="c" value="Apply">
            <input type="hidden" name="a" value="apply_service">
            <div class="form-group col-md-12">
                <input type="text" name="kw" placeholder="学校名称"  class="form-control"/>
            </div>
            
            </form>
        </div>

        <script type="text/javascript">
            function del(){
                if(!confirm("确认要删除？")){
                    window.event.returnValue = false;
                }
            }
        </script>


        <include file="Index:footer" />
        
        
		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
           
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>会员管理</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('Member/index')}">会员管理</a></li>
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
                                    <h3 class="box-title">会员列表</h3>
                                    <div class="pull-right box-tools">
                                    	<a href="javascript:;" class="btn btn-info btn-sm" onclick="javascript:opensearch('searchtext',700,160);" style="color:#ffffff;"><i class="fa fa-search"></i> 搜索</a>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered dataTable fontmini" id="tablelist">
                                    	<tr role="row" class="orders" >
                                        	<th width="60">头像</th>
                                        	<th class="sorting" data="id" width="80">ID</th>
											<th class="sorting" data="username">用户名</th>
                                            <th class="sorting" data="mobile">手机号</th>
                                            <th class="sorting" data="email">邮箱</th>
                                            <th class="sorting" data="last_login_time" width="140">最近登陆</th>
											<th class="sorting" data="reg_time" width="140">注册时间</th>
                                            <th class="sorting" data="level" width="140">等级</th>
                                            <th class="sorting" data="level" width="140">操作</th>
										</tr>
                                        <foreach name="users" item="row">
                                        <tr>
                                        	<td align="center"><img src="{$row.avatar}" width="36" style="border-radius:36px;"></td>
                                        	<td style="line-height:36px;">{$row.id}</td>
											<!--<td style="line-height:36px;"><?php /*echo iconv("GBK", "UTF-8", urldecode($row['username'])); */?></td>-->
											<td style="line-height:36px;"><?php echo urldecode($row['username']); ?></td>
                                            <td style="line-height:36px;">{$row.mobile}</td>
                                            <td style="line-height:36px;">{$row.email}</td>
											<td style="line-height:36px;"><if condition="$row['last_login_time']">{$row.last_login_time|date='Y-m-d H:i:s',###}</if></td>
                                            <td style="line-height:36px;"><if condition="$row['reg_time']">{$row.reg_time|date='Y-m-d H:i:s',###}</if></td>
                                            <td style="line-height:36px;">{$row.strlevel}</td>
                                            <td style="line-height:36px; text-align: center;"><a href="{:U('Member/Member_del',array('id'=>$row['id']))}" onclick="return del()" title="删除" class="btn btn-del btn-smsm"><i class="icon ion-close-circled"></i>删除</a></td>
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
            <form method="get" action="{:U('Member/index')}" id="searchfrom" name="myform">
            <input type="hidden" name="m" value="Main">
            <input type="hidden" name="c" value="Member">
            <input type="hidden" name="a" value="index">
            <div class="form-group col-md-4">
                <input type="text" name="uid" placeholder="用户ID"  class="form-control"/>
            </div>
            <div class="form-group col-md-4">
                <input type="text" name="un" placeholder="用户名"  class="form-control"/>
            </div>
            <div class="form-group col-md-4">
                <input type="text" name="rn" placeholder="姓名"  class="form-control"/>
            </div>
            <div class="form-group col-md-4">
                <input type="text" name="mb" placeholder="手机号"  class="form-control"/>
            </div>
            <div class="form-group col-md-4">
                <input type="text" name="em" placeholder="邮箱"  class="form-control"/>
            </div>
            </form>
        </div>
        
        
        <include file="Index:footer" />

        <script type="text/javascript">
            function del(){
                if(!confirm("确认要删除？")){
                    window.event.returnValue = false;
                }
            }
        </script>
        
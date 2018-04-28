		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
           
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>网站流量管理</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="javascript:;">网站流量管理</a></li>
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
                                    <h3 class="box-title">网站流量列表</h3>
                                    <div class="pull-right box-tools">
                                    	<a href="javascript:;" class="btn btn-info btn-sm" onclick="javascript:opensearch('searchtext',700,160);" style="color:#ffffff;"><i class="fa fa-search"></i> 搜索</a>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered dataTable fontmini" id="tablelist">
                                    	<tr role="row" class="orders" >
                                        	<th class="sorting" data="id" width="80">ID</th>
                                            <th class="sorting" data="mobile">中科教网站</th>
                                            <th class="sorting" data="email">联盟网站</th>
                                            <th class="sorting" data="username">日期</th>
                                        </tr>
                                        <foreach name="datalist" item="row">
                                        <tr>
                                        	<td style="line-height:36px;">{$row.id}</td>
											<td style="line-height:36px;">{$row.o2o_counter}</td>
                                            <td style="line-height:36px;">{$row.kjlm_counter}</td>
                                            <td style="line-height:36px;">{$row.date}</td>
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
        
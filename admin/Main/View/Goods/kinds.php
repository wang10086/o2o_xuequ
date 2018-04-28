<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">

    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>分类管理</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('Goods/kinds')}">分类管理</a></li>
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
                            <h3 class="box-title">分类管理</h3>
                            <div class="pull-right box-tools">

                                <button onClick="javascript:window.location.href='{:U('Goods/add_kinds')}';" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered dataTable fontmini" id="tablelist">
                                <tr role="row" class="orders" >
                                    <th class="sorting" data="id" width="60">ID</th>
                                    <th class="sorting" data="kind_name">分类名称</th>
                                    <if condition="rolemenu('Goods/add_kinds')">
                                        <th width="60" class="taskOptions">编辑</th>
                                    </if>
                                    <if condition="rolemenu('Goods/delkinds')">
                                        <th width="60" class="taskOptions">删除</th>
                                    </if>
                                </tr>
                                <foreach name="kindlist" item="row">
                                    <tr>
                                        <td>{$row.id}</td>
                                        <td>{$row.kind_name}</td>

                                        <if condition="rolemenu('Goods/add_kinds')">
                                            <td class="taskOptions">
                                                <button onClick="javascript:window.location.href='{:U('Goods/add_kinds',array('id'=>$row['id']))}';" title="修改" class="btn btn-info btn-smsm"><i class="fa fa-pencil"></i></button>
                                            </td>
                                        </if>
                                        <if condition="rolemenu('Goods/delkinds')">
                                            <td class="taskOptions">
                                                <button onClick="javascript:ConfirmDel('{:U('Goods/delkinds',array('id'=>$row['id']))}');" title="删除" class="btn btn-warning btn-smsm"><i class="fa fa-times"></i></button>
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
    <form method="get" action="{:U('User/index')}" name="myform">
        <div class="form-group">
            <input type="text" name="username" placeholder="用户名" value="{$username}"  class="form-control"/>
        </div>
        <div class="form-group">
            <input type="text" name="realname" placeholder="使用者" value="{$realname}"  class="form-control"/>
        </div>
        <div class="form-group">
            <input type="text" name="mobile" placeholder="手机号" value="{$mobile}"  class="form-control"/>
        </div>
        <div class="form-group">
            <input type="text" name="email" placeholder="Email" value="{$email}"  class="form-control"/>
        </div>
    </form>
</div>

<include file="Index:footer" />
        

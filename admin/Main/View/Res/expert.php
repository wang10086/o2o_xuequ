<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">

    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>专家管理</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('Res/expert')}">专家管理</a></li>
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
                            <h3 class="box-title">专家列表</h3>
                            <div class="pull-right box-tools">
                                <button class="btn btn-info btn-sm" onclick="javascript:opensearch('searchtext',500,160);"><i class="fa fa-search"></i> 搜索</button>
                                <button onClick="javascript:window.location.href='{:U('Res/expert_edit')}';" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> 新增专家</button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered dataTable fontmini" id="tablelist">
                                <tr role="row" class="orders" >
                                    <th class="sorting" data="id" width="60">ID</th>
                                    <th class="sorting" data="title">专家名称</th>
                                    <th class="sorting" data="fields">所在领域</th>
                                    <th class="sorting" data="update_time" width="140">更新时间</th>
                                    <if condition="rolemenu(array('Res/expert_edit'))">
                                        <th width="60" class="taskOptions">编辑</th>
                                    </if>
                                    <if condition="rolemenu('Res/expert_del')">
                                        <th width="60" class="taskOptions">删除</th>
                                    </if>
                                </tr>
                                <foreach name="datalist" item="row">

                                    <tr>
                                        <td>{$row.id}</td>
                                        <td>{$row.title}</td>
                                        <td>{$row.fields}</td>
                                        <td style="line-height:24px;"><if condition="$row['update_time']">{$row.update_time|date='Y-m-d H:i',###}</if></td>
                                        <if condition="rolemenu(array('Res/expert_edit'))">
                                            <td class="taskOptions">
                                                <button onClick="javascript:window.location.href='{:U('Res/expert_edit',array('id'=>$row['id']))}';" title="修改" class="btn btn-info btn-smsm"><i class="fa fa-pencil"></i></button>
                                            </td>
                                        </if>
                                        <if condition="rolemenu('Res/expert_del')">
                                            <td class="taskOptions">

                                                <a onClick="javascript:ConfirmDel('{:U('Res/expert_del',array('id'=>$row['id']))}');" title="删除" class="btn btn-warning btn-smsm" style="color:#ffffff;"><i class="fa fa-times"></i></a>
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
    <form action="{:U('Res/expert')}" method="post" id="searchform">

        <div class="form-group col-md-12">
            <input type="text" name="keywords" placeholder="关键字" class="form-control"/>
        </div>
    </form>

</div>

<include file="Index:footer" />
        

<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">

    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>资源管理</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('Res/index')}">专家管理</a></li>
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
                            <h3 class="box-title">资源列表</h3>
                            <div class="pull-right box-tools">
                                <button class="btn btn-info btn-sm" onclick="javascript:opensearch('searchtext',500,160);"><i class="fa fa-search"></i> 搜索</button>
                                <if condition="$type eq 2">
                                    <button onClick="javascript:window.location.href='{:U('Res/res_upd',array('type'=>$type))}';" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> 新增资源</button>
                                <else />
                                    <button onClick="javascript:window.location.href='{:U('Res/res_edit',array('type'=>$type))}';" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> 新增资源</button>
                                </if>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">

                            <div class="btn-group" id="catfont">
                                <a href="{:U('Res/index')}" class="btn <?php if(!$type){ echo 'btn-info';}else{ echo 'btn-default'; } ?>">全部</a>
                                <foreach name="kind" key="k" item="v">
                                    <a href="{:U('Res/index',array('type'=>$k))}" class="btn <?php if($k==$type){ echo 'btn-info';}else{ echo 'btn-default'; } ?>">{$v}</a>
                                </foreach>
                            </div>

                            <table class="table table-bordered dataTable fontmini" id="tablelist" style="margin-top:10px;">
                                <tr role="row" class="orders" >
                                    <th class="sorting" data="id" width="60">ID</th>
                                    <th class="sorting" data="sort" width="60">序号</th>
                                    <th class="sorting" data="title" width="">资源名称</th>
                                    <th class="sorting" data="fields" width="">所属领域</th>
                                    <th class="sorting" data="city" width="100">所在地区</th>
                                    <th class="sorting" data="system" width="100">所属系统</th>
                                    <th class="sorting" data="pro" width="100">支持项目</th>
                                    <th class="sorting" data="type" width="100">资源类型</th>
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
                                        <td>{$row.sort}</td>
                                        <td>{$row.title}</td>
                                        <td>{$row.fields}</td>
                                        <td>{$row.city}</td>
                                        <td>{$row.system}</td>
                                        <td>{$row.pro}</td>
                                        <td>{$row.typename}</td>
                                        <td style="line-height:24px;"><if condition="$row['update_time']">{$row.update_time|date='Y-m-d H:i',###}</if></td>
                                        <!--<if condition="rolemenu(array('Res/res_edit'))">-->
                                        <td class="taskOptions">
                                            <button onClick="javascript:window.location.href='{:U('Res/update',array('id'=>$row['id'],'type'=>$type))}';" title="修改" class="btn btn-info btn-smsm"><i class="fa fa-pencil"></i></button>
                                        </td>
                                        <!--<if condition="$type eq 2">
                                            <td class="taskOptions">
                                                <button onClick="javascript:window.location.href='{:U('Res/res_upd',array('id'=>$row['id'],'type'=>$type))}';" title="修改" class="btn btn-info btn-smsm"><i class="fa fa-pencil"></i></button>
                                            </td>
                                        <else />
                                            <td class="taskOptions">
                                                <button onClick="javascript:window.location.href='{:U('Res/res_edit',array('id'=>$row['id'],'type'=>$type))}';" title="修改" class="btn btn-info btn-smsm"><i class="fa fa-pencil"></i></button>
                                            </td>
                                        </if>-->
                                        <if condition="rolemenu('Res/res_del')">
                                            <td class="taskOptions">

                                                <a onClick="javascript:ConfirmDel('{:U('Res/res_del',array('id'=>$row['id']))}');" title="删除" class="btn btn-warning btn-smsm" style="color:#ffffff;"><i class="fa fa-times"></i></a>
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
    <form action="{:U('Res/index')}" method="get" id="searchform">
        <input type="hidden" name="m" value="Main">
        <input type="hidden" name="c" value="Res">
        <input type="hidden" name="a" value="index">
        <div class="form-group col-md-6">
            <select class="form-control" name="type">
                <option value="0">资源类型</option>
                <foreach name="kind" key="k" item="v">
                    <option value="{$k}">{$v}</option>
                </foreach>
            </select>
        </div>
        <div class="form-group col-md-6">
            <input type="text" name="keywords" placeholder="关键字" class="form-control"/>
        </div>
    </form>

</div>

<include file="Index:footer" />
        

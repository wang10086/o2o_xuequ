<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">

    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>服务项目管理</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('Goods/goodslist')}">服务项目</a></li>
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
                            <h3 class="box-title">服务项目</h3>
                            <div class="pull-right box-tools">
                                <button class="btn btn-info btn-sm" onclick="javascript:opensearch('searchtext',500,160);"><i class="fa fa-search"></i> 搜索</button>
                                <button onClick="javascript:window.location.href='{:U('Goods/goods_add')}';" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> 新增项目</button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered dataTable fontmini" id="tablelist">
                                <tr role="row" class="orders" >
                                    <th class="sorting" data="id" width="60">ID</th>
                                    <th class="sorting" data="title">标题</th>
                                    <th class="sorting" data="col">类型</th>
                                    <th class="sorting" data="fit">适合学段</th>
                                    <th class="sorting" data="days" width="100">活动天数</th>
                                    <th class="sorting" data="create_time" width="110">创建时间</th>
                                    <th class="sorting" data="update_time" width="110">更新时间</th>
                                    <if condition="rolemenu(array('Goods/goods_add'))">
                                        <th width="60" class="taskOptions">编辑</th>
                                    </if>
                                    <if condition="rolemenu(array('Goods/del_goods'))">
                                        <th width="60" class="taskOptions">删除</th>
                                    </if>
                                </tr>
                                <foreach name="datalist" item="row">

                                    <tr>
                                        <td>{$row.id}</td>
                                        <td><a href="">{$row.title}</a></td>
                                        <td style="line-height:24px;">{:get_kind($row['col'])}</td>
                                        <td>{$row.fit}</td>
                                        <td>{$row.days}</td>
                                        <td><if condition="$row['create_time']">{$row.create_time|date='y-m-d H:i',###}</if></td>
                                        <td><if condition="$row['update_time']">{$row.update_time|date='y-m-d H:i',###}</if></td>
                                        <if condition="rolemenu(array('Goods/goods_add'))">
                                            <td class="taskOptions">
                                                <a href="{:U('Goods/goods_add',array('id'=>$row['id']))}" title="修改" class="btn btn-info btn-smsm"><i class="fa fa-pencil"></i></a>
                                            </td>
                                        </if>
                                        <if condition="rolemenu(array('Goods/del_goods'))">
                                            <td class="taskOptions">
                                                <a href="JavaScript:;"  onClick="javascript:ConfirmDel('{:U('Goods/del_goods',array('id'=>$row['id']))}');" title="删除" class="btn btn-danger btn-smsm"><i class="fa fa-times"></i></a>
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
        <input type="hidden" name="m" value="Main">
        <input type="hidden" name="c" value="Goods">
        <input type="hidden" name="a" value="goodslist">
        <div class="form-group col-md-5">
            <select  class="form-control"  name="kind">
                <option value="-1">类型</option>
                <foreach name="kindlist" key="k" item="v">
                    <option value="{$k}">{$v}</option>
                </foreach>
            </select>
        </div>

        <div class="form-group col-md-7">
            <input type="text" name="keywords" placeholder="关键字" class="form-control">
        </div>

    </form>
</div>

<include file="Index:footer" />
        

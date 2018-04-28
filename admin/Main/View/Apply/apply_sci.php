<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">

    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>科技节产品预约记录</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('Apply/apply_sci')}">科技节产品预约记录</a></li>
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
                            <h3 class="box-title">科技节产品预约记录</h3>
                            <div class="pull-right box-tools">
                                <a href="javascript:;" class="btn btn-info btn-sm" onclick="javascript:opensearch('searchtext',700,120);" style="color:#ffffff;"><i class="fa fa-search"></i> 搜索</a>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered dataTable fontmini" id="tablelist">
                                <tr role="row" class="orders" >
                                    <th class="sorting cent" data="id" width="80">ID</th>
                                    <th class="sorting cent" data="title">科技节名称</th>
                                    <th class="sorting cent" data="call_man">联系人</th>
                                    <th class="sorting cent" data="tel_num">联系电话</th>
                                    <th class="sorting cent" data="in_day">科技节日期</th>
                                    <th class="sorting cent" data="apply_time">申请时间</th>
                                    <th class="sorting cent" data="status" width="140">状态</th>
                                    <th class="sorting cent" data="status" width="140">操作</th>
                                </tr>
                                <foreach name="data" item="row">
                                    <tr>
                                        <td class="cent">{$row.id}</td>
                                        <td>{$row.sci_tit}</td>
                                        <td class="cent">{$row.call_man}</td>
                                        <td class="cent">{$row.tel_num}</td>
                                        <td class="cent">{$row.in_day|date='Y-m-d H:i:s',###}</td>
                                        <td class="cent"><if condition="$row['booking_time']">{$row.booking_time|date='Y-m-d H:i:s',###}</if></td>
                                        <td class="cent">{$row.strstatus}</td>
                                        <td class="cent" width="140">
                                            <a href="{:U('Apply/apply_sci_detail',array('id'=> $row[id]))}"><i class="btn btn-upd btn-smsm fa fa-pencil">审核</i></a>
                                            <!--<a href="{:U('Apply/apply_lec_del',array('id'=>$row['id']))}" onclick="return del()" title="删除" class="btn btn-del btn-smsm"><i class="icon ion-close-circled"></i>删除</a>-->
                                        </td>
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


<include file="Index:footer" />

<script type="text/javascript">
    function del(){
        if(!confirm("确认要删除？")){
            window.event.returnValue = false;
        }
    }
</script>


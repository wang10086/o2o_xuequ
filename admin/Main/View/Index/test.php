<include file="header" />

<div class="wrapper row-offcanvas row-offcanvas-left">

    <include file="menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo P::SYSTEM_NAME."<small>".P::VERSION."（".P::VERSION_NAME."）</small>"; ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/icons')}"><i class="fa fa-home"></i> 首页</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>129</h3>
                            <p>汇总数据</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-earth"></i>
                        </div>
                        <a href="javascript:;" class="small-box-footer">查看详情 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->



                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>8</h3>
                            <p>汇总数据</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document-text"></i>
                        </div>
                        <a href="{:U('System/area')}" class="small-box-footer">查看详情 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->


                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>5</h3>
                            <p>汇总数据</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios7-cart"></i>
                        </div>
                        <a href="{:U('Account/accountlist')}" class="small-box-footer">查看详情 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>20</h3>
                            <p>汇总数据</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios7-email"></i>
                        </div>
                        <a href="javascript:;" class="small-box-footer">查看详情 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->

            <!-- Main row -->
            <div class="row">

                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">

                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="nav-tabs-custom">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs pull-right">
                            <li class="active"><a href="#revenue-chart">内部教师</a></li>
                            <li><a href="#sales-chart">外聘教师</a></li>
                            <li class="pull-left header">教师管理</li>
                        </ul>
                        <div class="tab-content">
                            <!-- Morris chart - Sales -->
                            <div class="chart tab-pane active">

                                <table class="table table-bordered dataTable fontmini" id="tablelist">
                                    <tr role="row" class="orders" >
                                        <th class="sorting" data="id">日期</th>
                                        <th class="sorting" data="subject">课程名称</th>
                                        <th class="sorting" data="email">授课老师</th>
                                        <th class="sorting" data="mobile">记录者</th>
                                        <th class="sorting" data="department">记录时间</th>
                                        <if condition="rolemenu(array('Account/edit'))">
                                            <th width="60" class="taskOptions">详情</th>
                                        </if>
                                    </tr>
                                    <foreach name="datalist" item="row">

                                        <tr>
                                            <td>{$row.work_id}</td>
                                            <td>{$row.name}</td>
                                            <td>{$row.email}</td>
                                            <td>{$row.mobile}</td>
                                            <td>{$row.department}</td>
                                            <if condition="rolemenu(array('Account/edit'))">
                                                <td class="taskOptions">
                                                    <button onClick="javascript:window.location.href='{:U('Account/edit',array('id'=>$row['id']))}';" title="修改资料" class="btn btn-info btn-smsm"><i class="fa fa-pencil"></i></button>
                                                </td>
                                            </if>

                                        </tr>
                                    </foreach>

                                </table>
                            </div>

                        </div>
                    </div><!-- /.nav-tabs-custom -->
                </section>
            </div><!-- /.row (main row) -->

        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->



<include file="footer" />

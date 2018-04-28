		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
           
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>网站配置</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('System/config')}">网站配置</a></li>
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
                                    <h3 class="box-title">网站配置</h3>
                                    <div class="pull-right box-tools">
                                    	<?php if($show && rolemenu(array('System/edit_config'))){ ?>
                                        <a href="{:U('System/edit_config',array('show'=>1))}"  class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> 新增配置</a>
                                        <?php } ?>
                                        <?php if(!$show){ ?>
                                        <a href="{:U('System/config',array('show'=>1))}"  class="btn btn-info btn-sm">显示全部</a>
                                        <?php } ?>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered dataTable fontmini" id="tablelist">
                                    	<tr role="row" class="orders" >
                                        	<th width="180">配置项</th>
                                            <th width="180">标识</th>
                                            <th>内容</th>
                                            <if condition="rolemenu(array('System/edit_config'))">
                                            <th width="60" class="taskOptions">编辑</th>
                                            </if>
                                            <?php if($show && rolemenu(array('Delete/del_config'))){ ?>
                                            <th width="60" class="taskOptions">删除</th>
                                            <?php } ?>
                                            
										</tr>
                                        <foreach name="datalist" item="row">
                                        <tr>
                                            <td>{$row.conf_explain}</td>
                                            <td>{$row.conf_key}</td>
                                            <td>{$row.conf_val}</td>
                                            <if condition="rolemenu(array('System/edit_config'))">
                                            <td class="taskOptions">
                                                <button onClick="javascript:window.location.href='{:U('System/edit_config',array('id'=>$row['id']))}';" title="修改" class="btn btn-info btn-smsm"><i class="fa fa-pencil"></i></button>
                                            </td>
                                            </if>
                                            <?php if($show && rolemenu(array('Delete/del_config'))){ ?>
                                            <td class="taskOptions">
                                                <a onClick="javascript:ConfirmDel('{:U('Delete/del_config',array('id'=>$row['id']))}');" title="删除" class="btn btn-warning btn-smsm"><i class="fa fa-times"></i></a>
                                            </td>
                                            <?php } ?>
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


        <include file="Index:footer" />
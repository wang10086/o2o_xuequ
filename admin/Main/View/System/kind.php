		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
           
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>栏目管理</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('System/kind')}">栏目管理</a></li>
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
                                    <h3 class="box-title">所有栏目</h3>
                                    <div class="pull-right box-tools">
                                        <!-- <button class="btn btn-info btn-sm" onclick="javascript:opensearch('searchtext',580,110);"><i class="fa fa-search"></i></button> -->
                                        <a href="{:U('System/kind_edit',array('type'=>$type))}" class="btn btn-danger btn-sm" style="color:#ffffff;"><i class="fa fa-plus"></i> 新增栏目</a>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                	<div class="btn-group" id="catfont">
                                    	<foreach name="kindtype" key="k" item="v">
                                    	<a href="{:U('System/kind',array('type'=>$k))}" class="btn <?php if($k==$type){ echo 'btn-info';}else{ echo 'btn-default';} ?> ">{$v}</a>
                                        </foreach>
                                    </div>
                                    
                                    <table class="table table-bordered dataTable fontmini" id="listtable" style="margin-top:10px;">
                                        <tr role="row">
                                            <th width="60">ID</th>
                                            <th width="60">序号</th>
                                            <th>栏目名称</th>
                                            <th width="100">状态</th>
                                            <if condition="rolemenu(array('System/kind_edit'))">
                                            <th width="60" class="taskOptions">修改</th>
                                            </if>
                                            <if condition="rolemenu(array('System/kind_del'))">
                                            <th width="60" class="taskOptions">删除</th>
                                            </if>
                                        </tr>
                                        <foreach name="datalist" item="row">
                                        <tr>
                                            <td style="height:36px; line-height:36px;">{$row.id}</td>
                                            <td style="height:36px; line-height:36px;">{$row.sort}</td>
                                            <td style="height:36px; line-height:36px;">{$row.tab} {$row.title}</td>
                                            <td style="height:36px; line-height:36px;" <?php if(rolemenu('Index/opstatus')){ ?> onClick="opstatus('{$row.id}','kind','status','6',this)" <?php } ?>>
                                          	
                                          	<?php if($row['status']){ echo '<span class="green">已启用</span>';}else{ echo '<span class="red">已停用</span>';} ?>
                                            </td>
                                            <if condition="rolemenu(array('System/kind_edit'))">
                                            <td class="taskOptions"  style="height:36px; line-height:36px;">
                                            	<a href="{:U('System/kind_edit',array('id'=>$row['id'],'type'=>$type))}" class="btn btn-info btn-smsm"><i class="fa fa-pencil"></i></a>
                                            </td>
                                            </if>
                                            <if condition="rolemenu(array('System/kind_del'))">
                                            <td class="taskOptions"  style="height:36px; line-height:36px;">
                                                <a onClick="javascript:ConfirmDel('{:U('System/kind_del',array('id'=>$row['id']))}');" title="删除" class="btn btn-warning btn-smsm"><i class="fa fa-times"></i></a>
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
            <input type="hidden" name="c" value="System">
            <input type="hidden" name="a" value="kind">
           
            <div class="form-group col-md-6">
                <input type="text" name="id" placeholder="ID" value="" class="form-control"/>
            </div>
            
            <div class="form-group col-md-6">
                <input type="text" name="bt" placeholder="分类名称" value="" class="form-control"/>
            </div>
            
            </form>
        </div>

        <include file="Index:footer" />
        
        
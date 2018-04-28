		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>编辑节点</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('Rbac/node')}">节点管理</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                         <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->
                            <form method="post" action="{:U('Rbac/addnode', array('pid'=>$pid,'level'=>$level))}" name="myform" id="myform">
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">编辑节点</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    
                                    <input type="hidden" name="dosubmit" value="1" />
                                    <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
                                    <if condition="$row">
                                    <input type="hidden" name="id" value="{$row.id}" />
                                    </if>
                                    <input type="hidden" name="pid" value="{$pid}" />
                                    <input type="hidden" name="level" value="{$level}" />
                                    <!-- text input -->
                                    <div class="form-group">&nbsp;</div>
                                    <div class="form-group  col-md-12">
                                        <label>上级节点：{$prnt.title} - {$prnt.name}</label>
                                    </div>
                                    
                                    <div class="form-group  col-md-3">
                                        <label>{$type}名称</label>
                                        <input type="text" name="info[name]"  class="form-control" id="nodename" value="{$row.name}"/>
                                    </div>
                                    <div class="form-group  col-md-3">
                                        <label>{$type}标题</label>
                                        <input type="text" name="info[title]" class="form-control" id="nodetile" value="{$row.title}"  />
                                    </div>
                                    
                                    
                                    <div class="form-group  col-md-3">
                                        <label>{$type}排序</label>
                                        <input type="text" name="info[sort]" class="form-control" id="sort" value="{$row.sort}"  />
                                    </div>

                                    <div class="form-group  col-md-3">
                                        <label>节点状态</label>
                                        <select class="form-control" name="info[status]">
                                            <option <?php if($row === false or $row['status']==1){ echo 'selected';}?> value="1">启用</option>
                                            <option <?php if($row !== false and $row['status'] == 0){ echo 'selected';}?> value="0">禁用</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group  col-md-12">
                                        <label>{$type}描述</label>
                                        <input type="text" name="info[remark]" class="form-control" id="remark" value="{$row.remark}"  />
                                    </div>
                                    
                                    
                                    <div class="form-group">&nbsp;</div>
                                    &nbsp;
                                    </div>
                                    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            <div class="form-group savebtn">
                                <button class="btn btn-success btn-lg saves"><i class="fa fa-pencil-square"></i> 保存</button>
                            </div>
                            </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
		
        <include file="Index:footer" />

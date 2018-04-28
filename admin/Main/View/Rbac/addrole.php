		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>编辑角色</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('Rbac/role')}">角色管理</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                         <!-- right column -->
                        <div class="col-md-6">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">编辑角色</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    	<form method="post" action="{:U('Rbac/addrole')}" name="myform" id="myform">
                                        <input type="hidden" name="dosubmit" value="1" />
                                        <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
                                        <if condition="$row">
                                        <input type="hidden" name="id" value="{$row.id}" />
                                        </if>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>父级角色</label>
                                            <select class="form-control" name="info[parentid]">
                                                <foreach name="rolelist" item="v">
                                                <option value="{$v.id}" <?php if($v['id']==$row['parentid']) echo 'selected'; ?> >{$v.name}</option>
                                                </foreach>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>角色名称</label>
                                            <input type="text" name="info[name]" class="form-control"  value="{$row.name}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>角色描述</label>
                                            <input type="text" name="info[remark]" class="form-control" value="{$row.remark}"/>
                                        </div>

                                        <div class="form-group">
                                            <label>角色状态</label>
                                            <select class="form-control" name="info[status]">
                                                <option <?php if($row === false or $row['status']==1){ echo 'selected';}?> value="1">启用</option>
                                                <option <?php if($row !== false and $row['status'] == 0){ echo 'selected';}?> value="0">禁用</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                        	<button type="submit" class="btn btn-success">保存</button>
                                        </div>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
		
        <include file="Index:footer" />

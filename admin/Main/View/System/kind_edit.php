		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>编辑栏目</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('System/kind')}">栏目管理</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">编辑栏目</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form method="post" action="{:U('System/kind_edit')}" name="myform" id="myform">
                                        <input type="hidden" name="dosubmit" value="1" />
                                	    <input type="hidden" name="editdate" value="{$row.id}" />
                                        <input type="hidden" name="info[type]" value="{$type}" />
                                        <input type="hidden" name="info[icons]" id="onicons" value="{$row.icons}" />
                                        <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
                                        <!-- text input -->
                                        
                                        <div class="form-group col-md-4">
                                            <label>上级栏目</label>
                                            <select class="form-control" name="pid" id="pid" onChange="lanmustye()">
                                            	<option value="0" <?php if($row['pid']==0){ echo 'selected';} ?>>顶级分类</option>
                                                <foreach name="datalist" item="v">
                                                <option value="{$v.id}" <?php if($row['pid']==$v['id']){ echo 'selected';} ?> >{$v.tab} {$v.title}</option>
                                                </foreach>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label>栏目名称</label>
                                            <input type="text" name="info[title]" value="{$row.title}" class="form-control" />
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label>状态</label>
                                            <select class="form-control" name="info[status]">
                                            	<option value="0" <?php if($row['status']==0 && $row){ echo 'selected';} ?>>停用</option>
                                                <option value="1" <?php if($row['status']==1 || !$row){ echo 'selected';} ?>>启用</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label>排序（数字越大越靠前）</label>
                                            <input type="text" name="info[sort]" value="{$row.sort}" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>控制器名称</label>
                                            <input type="text" name="info[controller]" value="{$row.controller}" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>方法名称</label>
                                            <input type="text" name="info[action]" value="{$row.action}" class="form-control" />
                                        </div>
                                        
                                        
                                        <div class="form-group col-md-12">
                                            <label>关键字</label>
                                            <input type="text" name="info[keywords]" value="{$row.keywords}" class="form-control" />
                                        </div>
                                      
                                       
                                        
                                        <div class="form-group col-md-12 ">
                                        	<label>栏目介绍</label>
                                            <textarea class="form-control" name="info[desc]" style="height:200px;" >{$row.desc}</textarea>
                                        </div>
                                        
                                    
                                        <div class="form-group  col-md-12">
                                        	<button type="submit" class="btn btn-success">保存</button>
                                        </div>
                                        
                                        <div class="form-group">&nbsp;</div>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!--/.col (right) -->
                        
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
        
        <include file="Index:footer" />
        <script type="text/javascript">
        function select_icon(i,obj){
			$('.ilist').removeClass('on');
			$(obj).addClass('on');
			$('#onicons').val(i);
		}
		function lanmustye(){
			var v = $('#pid').val();
			if(v==0){
				$('.paiban').hide();
				$('.jieshao').show();
			}else{
				$('.paiban').show()
				$('.jieshao').hide();;
			}	
		}
		function fuzhi(obj,vv,num){
			$('.stylelist').find('li').removeClass('on');
			$(obj).addClass('on');
			$('#styleval').val(vv);
			$('#style_num').val(num);
		}
		$(document).ready(function(e) {
			lanmustye();
        });
        </script>
        
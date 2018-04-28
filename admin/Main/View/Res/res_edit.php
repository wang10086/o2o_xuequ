<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>编辑资源信息</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('Res/index')}">资源管理</a></li>
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
                            <h3 class="box-title">编辑</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body" style="margin-top:20px;">
                            <form method="post" action="{:U('Res/res_edit')}" name="myform" id="myform">
                                <input type="hidden" name="dosubmit" value="1" />
                                <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
                                <input type="hidden" name="editid" value="{$row.id}" />
                                <!-- text input -->



                                <div class="form-group col-md-4">
                                    <label>资源名称</label>
                                    <input type="text" name="info[title]" value="{$row.title}"  id="title"  class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <label>序号（数字越大，排序越靠前）</label>
                                    <input type="text" name="info[sort]" value="{$row.sort}"  id="sort" class="form-control" />
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>专家请关联排课系统专家ID</label>
                                    <input type="text" name="info[cms_exp_id]" value="{$row.cms_exp_id}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <label>资源类型</label>
                                    <select class="form-control" name="info[type]">
                                        <foreach name="kind" key="k" item="v">
                                            <option value="{$k}" <?php if($type==$k || $row['type']==$k){ echo 'selected';} ?> >{$v}</option>
                                        </foreach>
                                    </select>
                                </div>



                                <div class="form-group col-md-4">
                                    <label>科教领域</label>
                                    <select class="form-control"  name="info[fields]">
                                        <option value="">请选择</option>
                                        <foreach name="resf" item="v">
                                        <option value="{$v}" <?php if($row['fields']==$v){ echo 'selected';} ?>>{$v}</option>
                                        </foreach>
                                        
                                    </select>
                    
                                </div>

                                <div class="form-group col-md-4">
                                    <label>所属系统</label>
                                    <select name="info[system]" class="form-control"   >
                                        <option value="">请选择</option>
                                        <foreach name="ress" item="v">
                                        <option value="{$v}" <?php if($row['system']==$v){ echo 'selected';} ?>>{$v}</option>
                                        </foreach>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>所在地区</label>
                                    <input type="text" name="info[city]" value="{$row.city}"  id="city" class="form-control" />
                                </div>


                                <div class="form-group col-md-4">
                                    <label>是否公益</label>
                                    <select name="info[tag]"  class="form-control">
                                    	<option value="" <?php if(!$row['tag']){ echo 'selected';} ?>>请选择</option>
                                        <option value="公益" <?php if($row['tag']=='公益'){ echo 'selected';} ?>>公益</option>
                                        <option value="非公益" <?php if($row['tag']=='非公益'){ echo 'selected';} ?>>非公益</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>实施城市</label>
                                    <input type="text" name="info[ss_city]" value="{$row.ss_city}"  id="ss_city" class="form-control" />
                                </div>

                                
                                <div class="form-group col-md-12">
                                	<span class="lm_c"><strong>支持项目</strong></span>
                                    <foreach name="resp" key="k" item="v">
                                        <span class="lm_c"><input type="checkbox" name="pro[]" <?php if(in_array($v,$pro)){ echo 'checked';} ?>  value="{$v}"> {$v}</span>
                                    </foreach>
                                </div>
                                
                                <div class="form-group col-md-12">
                                	<span class="lm_c"><strong>适合学段</strong></span>
                                    <foreach name="goodsfit" key="k" item="v">
                                        <span class="lm_c"><input type="checkbox" name="fit[]" <?php if(in_array($v,$fit)){ echo 'checked';} ?>  value="{$v}"> {$v}</span>
                                    </foreach>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label>关联标签(不对外显示，多个标签请用空格隔开)</label>
                                    <input type="text" name="info[keywords]" value="{$row.keywords}"  id="keywords" class="form-control" />
                                </div>

                                {:upload_m('uploadfile','files',$atts,'资源照片')}

                                <div class="form-group col-md-12" style="margin-top:15px;">
                                        	<?php echo editor('content',$row['content']); ?>
                                        </div>
                                <!--<div class="form-group col-md-12" style="margin-top:15px;">
                                    <label>内容</label>
                                    <textarea name="info[content]"  rows="10" class="form-control" value="{$row.content}">{$row.content}</textarea>
                                </div>-->

                                <div class="form-group">&nbsp;</div>


                                <div class="form-group col-md-12">
                                        <div style="border:0;">
                                        <foreach name="infotype" key="k" item="v">
                                            
                                            <?php if($v['level']==1){ ?>
                                            </div>
                                            <div class="unlm">
                                            <span class="lm_a"><input type="checkbox" name="lm[]" <?php if(in_array('['.$v['id'].']',$lm)){ echo 'checked';} ?>  value="[{$v.id}]"> {$v.title}</span><br />
                                            <?php }else{ ?>
                                            <span class="lm_b"><input type="checkbox" name="lm[]" <?php if(in_array('['.$v['id'].']',$lm)){ echo 'checked';} ?>  value="[{$v.id}]"> {$v.title}</span>
                                            <?php } ?>
                                            
                                        </foreach>
                                </div>

                                <div class="form-group">&nbsp;</div>
                                <div class="form-group">&nbsp;</div>
                            </div>
                        </div><!-- /.box -->
                        <div class="form-group savebtn">
                            <button class="btn btn-success btn-lg saves" onClick="submintform()"><i class="fa fa-pencil-square"></i> 保存</button>
                        </div>
                    </div><!--/.col (right) -->
					</form>
                </div><!--/.col (right) -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<script type="text/javascript">
    function submintform(){
        var title = $('#title').val();
        if(!title){
            alert('资源名称不能为空');
        }else{
            $('#myform').submit();
        }
    }
</script>

<include file="Index:footer" />


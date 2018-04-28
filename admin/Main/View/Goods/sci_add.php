<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>发布科技节产品</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('Goods/science')}">科技节产品管理</a></li>
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
                            <h3 class="box-title">编辑产品信息</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body" style="margin-top:20px;">
                            <form method="post" action="{:U('Goods/sci_add')}" name="myform" id="myform">
                                <input type="hidden" name="dosubmit" value="1" />
                                <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
                                <!-- text input -->
								<div class="form-group col-md-3">
                                    <label>标题</label>
                                    <input type="text" name="info[title]" id="title"  class="form-control" />
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label>序号（数字越大，排序越靠前）</label>
                                    <input type="text" name="info[sort]" id="sort" class="form-control" />
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label>参考价格</label>
                                    <input type="text" name="info[price]" id="price" value="{$row.price}"  class="form-control" />
                                </div>

                                <div class="form-group col-md-3">
                                    <label>科教领域</label>
                                    <select name="info[fields]"  class="form-control">
                                        <option value="">请选择</option>
                                        <foreach name="goodsfie" item="v">
                                        <option value="{$v}" <?php if($row['fields']==$v){ echo 'selected';} ?>>{$v}</option>
                                        </foreach>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label>是否公益</label>
                                    <select name="info[gongyi]"  class="form-control">
                                    	<option value="" <?php if(!$row['tag']){ echo 'selected';} ?>>请选择</option>
                                        <option value="公益" <?php if($row['gongyi']=='公益'){ echo 'selected';} ?>>公益</option>
                                        <option value="非公益" <?php if($row['gongyi']=='非公益'){ echo 'selected';} ?>>非公益</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>实施省市</label>
                                    <input type="text" name="info[city]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>所属系统</label>
                                    <select name="info[system]"  class="form-control">
                                        <option value="中国科学院院内" <?php if($row['system']=='中国科学院院内'){ echo 'selected';} ?>>中国科学院院内</option>
                                        <option value="中国科学院院外" <?php if($row['system']=='中国科学院院外'){ echo 'selected';} ?>>中国科学院院外</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>支持项目</label>
                                    <select name="info[res_pro]"  class="form-control">
                                        <option value="">请选择</option>
                                        <foreach name="res_pro" item="v">
                                            <option value="{$v}" <?php if($row['res_pro']==$v){echo 'selected';} ?>>{$v}</option>
                                        </foreach>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <span class="lm_c"><strong>适合人群</strong></span>
                                    <foreach name="goodsfit" key="k" item="v">
                                        <span class="lm_c"><input type="checkbox" name="fit[]" <?php if(in_array($v,$fit)){ echo 'checked';} ?>  value="{$v}"> {$v}</span>
                                    </foreach>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>关联标签(不对外显示，多个标签请用空格隔开)</label>
                                    <input type="text" name="info[keywords]" id="keywords" class="form-control" />
                                </div>
                                

                                {:upload_m('uploadfile','files','','上传图片')}




                                <div class="form-group col-md-12" style="margin-top:15px;">
                                    <?php echo editor('content');  ?>
                                </div>






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
                                </div>

                                <div class="form-group">&nbsp;</div>
                                <div class="form-group">&nbsp;</div>
                            </div>
                        </div><!-- /.box -->
                        <div class="form-group savebtn">
                            <button class="btn btn-success btn-lg saves" onClick="submintform()"><i class="fa fa-pencil-square"></i> 保存</button>
                        </div>
                    </div><!--/.col (right) -->

                </div><!--/.col (right) -->
                </form>
                
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<include file="Index:footer" />

<script type="text/javascript">

    function submintform(){
        var title = $('#title').val();
        if(!title){
            alert('标题不能为空');
        }else{
            $('#myform').submit();
        }
    }
</script>
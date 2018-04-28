<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>编辑服务项目</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('Goods/goodslist')}">服务项目</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="{:U('Goods/goods_add')}" name="myform" id="myform">
                    <input type="hidden" name="dosubmint" value="1" />
                    <input type="hidden" name="editid" value="{$row.id}" />
                    <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
                    <!-- right column -->
                    <div class="col-md-12">

                        <div class="box box-warning">
                            <div class="box-header">
                                <h3 class="box-title">编辑服务项目</h3>
                            </div>
                            <div class="box-body" style="padding-top:20px;" id="form_tip">
                                <!-- text input -->
                                <div class="form-group col-md-12">
                                    <label>活动名称</label>
                                    <input type="text" name="info[title]" value="{$row.title}" class="form-control"/>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>活动排序</label>
                                    <input type="text" name="info[sort]" value="{$row.sort}" class="form-control"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>开课日期</label>
                                    <input type="text" name="info[com_date]" class="form-control" value="{$row.com_date}"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>活动开始日期</label>
                                    <input type="text" name="info[start_date]" class="form-control inputdate"  value="{$row.start_date}"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>活动截止日期</label>
                                    <input type="text" name="info[end_date]" class="form-control inputdate"  value="{$row.end_date}"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>每班限额</label>
                                    <input type="text" name="info[quota]" class="form-control" value="{$row.quota}"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>活动时长</label>
                                    <input type="text" name="info[days]" class="form-control" value="{$row.days}"/>
                                </div>
                                
                                <!--<div class="form-group col-md-4">
                                    <label>活动时长</label>
                                    <select name="info[days]"  class="form-control" >
                                        <option value="">请选择</option>
                                        <foreach name="goodsday" item="v">
                                        <option value="{$v}" <?php /*if($row['days']==$v){ echo 'selected';} */?>>{$v}</option>
                                        </foreach>
                                    </select>
                                </div>-->
                                
								<!--
                                <div class="form-group col-md-4">
                                    <label>科教领域</label>
                                    <select name="info[fields]"  class="form-control">
                                        <option value="">请选择</option>
                                        <foreach name="goodsfie" item="v">
                                        <option value="{$v}" <?php if($row['fields']==$v){ echo 'selected';} ?>>{$v}</option>
                                        </foreach>
                                    </select>
                                </div>
                                -->
                                
                                <div class="form-group col-md-4">
                                    <label>是否公益</label>
                                    <select name="info[gongyi]"  class="form-control">
                                    	<option value="" <?php if(!$row['tag']){ echo 'selected';} ?>>请选择</option>
                                        <option value="公益" <?php if($row['gongyi']=='公益'){ echo 'selected';} ?>>公益</option>
                                        <option value="非公益" <?php if($row['gongyi']=='非公益'){ echo 'selected';} ?>>非公益</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>实施省市</label>
                                    <input type="text" name="info[city]" value="{$row.city}" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>所属组织</label>
                                    <input type="text" name="info[org]" value="{$row.org}" class="form-control">
                                    
                                </div>
                                <!--
                                <div class="form-group col-md-4">
                                    <label>支持项目</label>
                                    <select name="info[res_pro]"  class="form-control">
                                        <option value="">请选择</option>
                                        <foreach name="res_pro" item="v">
                                            <option value="{$v}" <?php if($row['res_pro']==$v){echo 'selected';} ?>>{$v}</option>
                                        </foreach>
                                    </select>
                                </div>
                                -->
                                
                                <div class="form-group col-md-12">
                                	<span class="lm_c"><strong>科教领域</strong></span>
                                    <foreach name="goodsfie" key="k" item="v">
                                        <span class="lm_c"><input type="checkbox" name="fie[]" <?php if(in_array($v,$fie)){ echo 'checked';} ?>  value="{$v}"> {$v}</span>
                                    </foreach>
                                </div>
                                
                                <div class="form-group col-md-12">
                                	<span class="lm_c"><strong>适合学段</strong></span>
                                    <foreach name="goodsfit" key="k" item="v">
                                        <span class="lm_c"><input type="checkbox" name="fit[]" <?php if(in_array($v,$fit)){ echo 'checked';} ?>  value="{$v}"> {$v}</span>
                                    </foreach>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>课程亮点</label>
                                    <textarea class="form-control" name="info[lights]" style="height:120px" placeholder="多条请用空格分隔">{$row.lights}</textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>课程目标</label>
                                    <textarea class="form-control" name="info[target]" style="height:120px" >{$row.target}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>课程内容</label>
                                    <textarea class="form-control" name="info[content]" style="height:120px"  >{$row.content}</textarea>
                                </div>
                                
                                <!--
                                <div class="form-group col-md-12">
                                    <label>课程安排</label>
                                    <textarea class="form-control" name="info[plan]" style="height:120px"  >{$row.plan}</textarea>
                                </div>
                                -->

                                <div class="form-group col-md-12">
                                    <label>配套资料及器材</label>
                                    <textarea class="form-control" name="info[cost]" style="height:120px" >{$row.cost}</textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>注意事项</label>
                                    <textarea class="form-control" name="info[notice]" style="height:120px" >{$row.notice}</textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>安全保障</label>
                                    <textarea class="form-control" name="info[security]" style="height:120px" >{$row.security}</textarea>
                                </div>




                                <div class="form-group col-md-12" style="margin-bottom:0;">
                                    <label>资源标签</label>
                                    <p style="color:#cccccc">可以通过标签关联相关信息，<a href="javascript:;" onClick="task_tag()">增加标签</a></p>
                                </div>

                                <div id="task_tag">
                                    <div id="task_tag_val" style="display:none;">2</div>
                                    <div class="ti" id="task_tag_list">

                                        <foreach name="tag" key="k" item="v">
                                            <div class="col-md-2 pd" id="tag_mr_{$k}">
                                                <div class="input-group">
                                                    <input type="text" placeholder="标签" name="tag[]" value="{$v}" class="form-control">
                                                    <span class="input-group-addon" style="width:32px;"><a href="javascript:;"  onClick="deltag('tag_mr_{$k}')">X</a></span>
                                                </div>
                                            </div>
                                        </foreach>

                                    </div>
                                </div>

                                <div class="form-group">&nbsp;</div>
                                <div class="form-group">&nbsp;</div>

                                {:upload_m('uploadfile','files',$atts,'活动轮播图片')}


                                <div class="form-group">&nbsp;</div>
                                <div class="form-group">&nbsp;</div>
                            </div>
                        </div><!-- /.box -->
                    </div><!--/.col (right) -->


                    <!-- right column -->
                    <div class="col-md-12">

                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">价格政策</h3>
                            </div>
                            <div class="box-body" style="padding-top:20px;">

                                <div class="form-group col-md-12" style="padding-top:15px;">
                                    <a href="javascript:;" class="btn btn-success btn-sm" onclick="addprice()" style="margin-right:10px;"><i class="fa fa-fw  fa-plus"></i> 新增价格</a>
                                </div>

                                <div id="pricelist">
                                    <div id="price_val" style="display:none">0</div>
                                    <foreach name="price" key="k" item="v">
                                        <div class="col-md-3 pd" id="fac_mr_{$v.id}">
                                            <div class="input-group">
                                                    <span class="input-group-addon" style="background:#ffffff;">
                                                        <input type="text" name="price[{$v.id}10000][date]" placeholder="日期" class="left_text inputdate hasDatepicker" value="{$v.ondate}">
                                                    </span>
                                                <input type="text" placeholder="价格" name="price[{$v.id}10000][price]" class="form-control" value="{$v.price}">
                                                <span class="input-group-addon dels"><a href="javascript:;" onclick="del_fac('fac_mr_{$v.id}')">X</a></span>
                                            </div>
                                        </div>
                                    </foreach>
                                </div>

                                <div class="form-group">&nbsp;</div>
                                <div class="form-group">&nbsp;</div>
                            </div>
                        </div><!-- /.box -->
                    </div><!--/.col (right) -->


                    <!-- right column -->
                    <div class="col-md-12">

                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">日程安排</h3>
                            </div>
                            <div class="box-body" style="padding-top:20px;">

                                <div class="form-group col-md-12" id="addti_btn">
                                    <a href="javascript:;" class="btn btn-success btn-sm" onClick="task(1)" style="margin-right:10px;"><i class="fa fa-fw  fa-plus"></i> 添加日程</a>
                                </div>

                                <div id="task_timu">
                                    <foreach name="days" key="k" item="v">
                                        <div class="tasklist" id="task_a_{$v.id}">
                                            <a class="aui_close" href="javascript:;" onClick="del_timu('task_a_{$v.id}')">×</a>
                                            <div class="col-md-12 pd">
                                                <label class="titou"><strong>第<span class="tihao">{$k+1}</span>天</strong></label>
                                                <div class="input-group">
                                                    <input type="text" placeholder="所在城市" name="days[{$v.id}1000][citys]" class="form-control" value="{$v.citys}">
                                                </div>
                                                <div class="input-group pads">
                                                    <textarea class="form-control" placeholder="行程安排" name="days[{$v.id}1000][content]">{$v.content}</textarea>
                                                </div>
                                                <div class="input-group">
                                                    <input type="text" placeholder="房餐车安排" name="days[{$v.id}1000][remarks]" class="form-control" value="{$v.remarks}">
                                                </div>
                                            </div>
                                        </div>
                                    </foreach>

                                </div>

                                <div style="display:none" id="task_val">0</div>

                                {:upload_m('daysfile','daysfiles',$daypic,'&nbsp;日程照片','daysbox','daypic','某一天的图片')}
								<div id="daysbox"></div>

                                <div class="form-group">&nbsp;</div>
                                <div class="form-group">&nbsp;</div>
                                <div class="form-group">&nbsp;</div>

                            </div>
                        </div><!-- /.box -->

                    </div><!--/.col (right) -->



                    <!-- right column -->
                    <div class="col-md-12">

                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">分类</h3>
                            </div>
                            <div class="box-body" style="padding-top:20px;">

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
                            <button class="btn btn-success btn-lg saves"><i class="fa fa-pencil-square"></i> 保存</button>
                        </div>
                    </div><!--/.col (right) -->



                </form>
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<include file="Index:footer" />

<script type="text/javascript">
    function task_tag(){

        var i = parseInt($('#task_tag_val').text())+1;

        var html = '<div class="col-md-2 pd" id="tag_'+i+'"><div class="input-group"><input type="text" placeholder="标签" name="tag[]" class="form-control"><span class="input-group-addon" style="width:32px;"><a href="javascript:;"  onClick="deltag(\'tag_'+i+'\')">X</a></span></div></div>';

        $('#task_tag_list').append(html);
        $('#task_tag_val').html(i);
    }


    function deltag(obj){
        $('#'+obj).remove();
    }


    function task(obj){

        var i = parseInt($('#task_val').text())+1;

        var days = '<div class="input-group"><input type="text" placeholder="地点安排" name="days['+i+'][citys]" class="form-control"></div><div class="input-group pads"><textarea class="form-control" placeholder="行程安排"  name="days['+i+'][content]"></textarea></div><div class="input-group"><input type="text" placeholder="房餐车安排" name="days['+i+'][remarks]" class="form-control"></div>';


        var header = '<div class="tasklist" id="task_ti_'+i+'"><a class="aui_close" href="javascript:;" onClick="del_timu(\'task_ti_'+i+'\')">×</a><div class="col-md-12 pd"><label class="titou"><strong>第<span class="tihao">'+i+'</span>天</strong></label>';

        var footer = '</div></div>';


        var html = header+days+footer;

        $('#task_timu').append(html);
        $('#task_val').html(i);
        //重编题号
        $('.tihao').each(function(index, element) {
            var no = index*1+1;
            $(this).text(no);
        });
    }

    //移除题目
    function del_timu(obj){
        $('#'+obj).remove();
        $('.tihao').each(function(index, element) {
            var no = index*1+1;
            $(this).text(no);
        });
    }

    $(document).ready(function(){
        $.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){ art_show_msg(msg);}});
        $("#courtitle").formValidator({onshow:"请输入课件标题",onfocus:"课件标题不能少于6个字",oncorrect:"&nbsp;"}).inputValidator({min:12,onerror:"课件标题输入有误"});
        $("#summary").formValidator({onshow:"请输入课件概要",onfocus:"课件概要不能少于30位字符",oncorrect:"&nbsp;"}).inputValidator({min:30,onerror:"课件概要输入有误"});
        $("#requirement").formValidator({onshow:"请输入教学目的",onfocus:"教学目的不能少于30位字符",oncorrect:"&nbsp;"}).inputValidator({min:30,onerror:"教学目的输入有误"});

    });



</script>




</script>
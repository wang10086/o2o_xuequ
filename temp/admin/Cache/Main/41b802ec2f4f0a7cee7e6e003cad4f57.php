<?php if (!defined('THINK_PATH')) exit(); use Sys\P; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo P::SYSTEM_NAME; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="/admin/assets/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="/admin/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="/admin/assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- jquery-ui style -->
    <link href="/admin/assets/css/jQueryUI/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css" />
    <!-- ArtDialog -->
    <link href="/admin/assets/comm/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
    <!--手动添加style-->
    <link href="/admin/assets/css/style.css" rel="stylesheet" type="text/css" />

    <link href="/admin/assets/comm/cropper/cropper.min.css" rel="stylesheet">
    <link href="/admin/assets/comm/sitelogo/sitelogo.css" rel="stylesheet">
    <!-- Theme style -->
    <link href="/admin/assets/css/py.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/css/artDialog.css" rel="stylesheet" type="text/css"  />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/admin/assets/js/html5shiv.min.js"></script>
    <script src="/admin/assets/js/respond.min.js"></script>
    <![endif]-->
    <?php echo PHP_EOL . $__additional_css__ ?>
    <!-- jQuery 1.11.1 -->
    <script src="/admin/assets/js/jquery-1.7.2.min.js"></script>
    <!-- Bootstrap -->
    <script src="/admin/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/admin/assets/laydate/laydate.js"></script>
    <script type="text/javascript">
        var web_path = '<?php echo C('WEB_PATH'); ?>';
        var role     = '<?php echo cookie('roleid'); ?>';
    </script>

</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header">
    <a href="./" class="logo" style="font-size:16px;">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        <?php echo P::SYSTEM_NAME; ?>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">


                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <span><?php  echo cookie('name'); ?> <i class="caret"></i></span>
                    </a>

                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="<?php echo GetHead();?>" class="img-circle" alt="User Image"  onClick="window.location.href='<?php echo U('User/edit');?>'" />
                            <p><?php  echo cookie('name'); ?></p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo U('User/edit',array('id'=>cookie('userid')));?>" class="btn btn-default btn-flat">修改资料</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo U('User/password',array('id'=>cookie('userid')));?>" class="btn btn-default btn-flat">修改密码</a>
                            </div>
                        </li>
                    </ul>


                </li>
                <li class="dropdown messages-menu">
                    <a href="<?php echo U('Index/logout');?>" class="dropdown-toggle">
                        <i class="fa fa-power-off"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>


<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas" id="indexmenus">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">

            <div class="pull-left image">
                <img src="<?php echo GetHead();?>" class="img-circle" alt="User Image" onClick="window.location.href='<?php echo U('User/edit');?>'" />
            </div>

            <div class="pull-left info">
                <p><?php  echo cookie('name'); ?></p>
                <a href="<?php echo U('User/edit');?>"><?php if(cookie('userid')==C('RBAC_SUPER_ADMIN')){ echo 'Superman'; }else{ echo cookie('rolename');} ?></a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <?php if(rolemenu(array('Index/index'))): ?><li class="<?php echo ison(CONTROLLER_NAME, 'Index');?>">
                    <a href="<?php echo U('Index/index');?>">
                        <i class="fa fa-home"></i> <span>系统首页</span>
                    </a>
                </li><?php endif; ?>

            <?php if(rolemenu(array('Res/index','Res/res_edit'))): ?><li class="<?php echo ison(CONTROLLER_NAME, 'Res');?>">
                    <a href="<?php echo U('Res/index');?>">
                        <i class="fa fa-calendar"></i>
                        <span>资源管理</span>
                    </a>

                </li><?php endif; ?>

            <?php if(rolemenu(array('Goods/goodslist','Goods/courtype'))): ?><li class="treeview <?php echo ison(CONTROLLER_NAME, 'Goods');?>">
                    <a href="javascript:;">
                        <i class="fa fa-file-text"></i>
                        <span>服务项目</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(rolemenu(array('Goods/goodslist'))): ?><li><a href="<?php echo U('Goods/goodslist');?>"><i class="fa fa-angle-right"></i> 旅行产品</a></li><?php endif; ?>
                        <?php if(rolemenu(array('Goods/index'))): ?><li><a href="<?php echo U('Goods/index');?>"><i class="fa fa-angle-right"></i> 专家讲座</a></li><?php endif; ?>
                        <?php if(rolemenu(array('Goods/product'))): ?><li><a href="<?php echo U('Goods/product');?>"><i class="fa fa-angle-right"></i> 实体产品</a></li><?php endif; ?>
                        <?php if(rolemenu(array('Goods/sci'))): ?><li><a href="<?php echo U('Goods/sci');?>"><i class="fa fa-angle-right"></i> 科技节产品</a></li><?php endif; ?>
                        <?php if(rolemenu(array('Goods/science'))): ?><li><a href="<?php echo U('Goods/science');?>"><i class="fa fa-angle-right"></i> 科学课程(表格类)</a></li><?php endif; ?>
                    </ul>
                </li><?php endif; ?>


            <?php if(rolemenu(array('News/index'))): ?><li class="treeview <?php echo ison(CONTROLLER_NAME, 'News');?>">
                    <a href="javascript:;">
                        <i class="fa fa-list-alt"></i>
                        <span>文章管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo U('News/index');?>"><i class="fa fa-angle-right"></i> 新闻文章管理</a></li>
                        <li><a href="<?php echo U('News/travel');?>"><i class="fa fa-angle-right"></i> 旅游文章管理</a></li>
                        <li><a href="<?php echo U('News/pic');?>"><i class="fa fa-angle-right"></i> 长图文章管理(一张大图)</a></li>
                    </ul>
                </li><?php endif; ?>


            <?php if(rolemenu(array('Union/news'))): ?><li class="treeview <?php echo ison(CONTROLLER_NAME, 'Union');?>">
                    <a href="javascript:;">
                        <i class="fa fa-chain"></i>
                        <span>联盟网站管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo U('Union/index');?>"><i class="fa fa-angle-right"></i> 新闻文章管理</a></li>
                        <li><a href="<?php echo U('Union/morepic_list');?>"><i class="fa fa-angle-right"></i> 多图片文章管理</a></li>
                        <li><a href="<?php echo U('Union/upload_list');?>"><i class="fa fa-angle-right"></i> 文档资料上传</a></li>
                        <li><a href="<?php echo U('Union/video_list');?>"><i class="fa fa-angle-right"></i> 视频资料上传</a></li>
                    </ul>
                </li><?php endif; ?>

            <?php if(rolemenu(array('Expert/news'))): ?><li class="treeview <?php echo ison(CONTROLLER_NAME, 'Expert');?>">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>老专家网站管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo U('Expert/index');?>"><i class="fa fa-angle-right"></i> 新闻文章管理</a></li>
                    </ul>
                </li><?php endif; ?>

            <?php if(rolemenu(array('Apply/index','Apply/apply_service'))): ?><li class="treeview <?php echo ison(CONTROLLER_NAME, 'Apply');?>">
                    <a href="javascript:;">
                        <i class="fa fa-bell"></i>
                        <span>预约信息管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(rolemenu(array('Apply/apply_service'))): ?><li><a href="<?php echo U('Apply/apply_service');?>"><i class="fa fa-angle-right"></i> 支撑服务校申请记录</a></li><?php endif; ?>
                        <?php if(rolemenu(array('Apply/apply_lecture'))): ?><li><a href="<?php echo U('Apply/apply_lecture');?>"><i class="fa fa-angle-right"></i> 预约老专家演讲记录</a></li><?php endif; ?>
                        <?php if(rolemenu(array('Apply/apply_sci'))): ?><li><a href="<?php echo U('Apply/apply_sci');?>"><i class="fa fa-angle-right"></i> 预约科技节产品记录</a></li><?php endif; ?>
                        <?php if(rolemenu(array('Apply/apply_tra'))): ?><li><a href="<?php echo U('Apply/apply_tra');?>"><i class="fa fa-angle-right"></i> 预约研学/科学课程记录</a></li><?php endif; ?>
                    </ul>
                </li><?php endif; ?>
            
            <?php if(rolemenu(array('Member/index','Member/apply_service'))): ?><li class="treeview <?php echo ison(CONTROLLER_NAME, 'Member');?>">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>会员管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(rolemenu(array('Member/index'))): ?><li><a href="<?php echo U('Member/index');?>"><i class="fa fa-angle-right"></i> 会员列表</a></li><?php endif; ?>

                        <!--临时添加会员入口-->
                        <?php if(rolemenu(array('Member/add_mem'))): ?><li><a href="<?php echo U('Member/add_mem');?>"><i class="fa fa-angle-right"></i> 添加会员(临时使用)</a></li><?php endif; ?>
                        
                    </ul>
                </li><?php endif; ?>
            

            <!--
            <?php if(rolemenu(array('Message/index'))): ?><li class="<?php echo ison(CONTROLLER_NAME, 'Message');?>">
                    <a href="<?php echo U('Message/index',array('type'=>0));?>">
                        <i class="fa fa-envelope"></i> <span>系统消息</span> 
                        <?php $noread = no_read(); ?>
                        <?php if($noread): ?><small class="badge pull-right bg-red" style="margin-right:10px;"><?php echo ($noread); ?></small><?php endif; ?>
                    </a>
                </li><?php endif; ?>
            -->


            <?php if(rolemenu(array('System/config','System/update_web'))): ?><li class="treeview <?php echo ison(CONTROLLER_NAME, 'System');?>">
                    <a href="javascript:;">
                        <i class="fa fa-desktop"></i>
                        <span>系统管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(rolemenu(array('System/config'))): ?><li><a href="<?php echo U('System/config');?>"><i class="fa fa-angle-right"></i> 网站配置</a></li><?php endif; ?>
                        <?php if(rolemenu(array('System/kind'))): ?><li><a href="<?php echo U('System/kind');?>"><i class="fa fa-angle-right"></i> 栏目管理</a></li><?php endif; ?>
                        <?php if(rolemenu(array('System/counter'))): ?><li><a href="<?php echo U('System/counter');?>"><i class="fa fa-angle-right"></i>网站流量管理</a></li><?php endif; ?>
                    </ul>
                </li><?php endif; ?>

            <?php if(rolemenu(array('User/index','Rbac/role','Rbac/node'))): ?><li class="treeview <?php echo ison(CONTROLLER_NAME, 'User');?> <?php echo ison(CONTROLLER_NAME, 'Rbac');?>">
                    <a href="javascript:;">
                        <i class="fa fa-cog"></i>
                        <span>后台管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo U('User/index');?>"><i class="fa fa-angle-right"></i> 用户管理</a></li>
                        <?php if(cookie('username')==C('RBAC_SUPER_ADMIN')){ ?>
                            <li><a href="<?php echo U('Rbac/role');?>"><i class="fa fa-angle-right"></i> 角色管理</a></li>
                            <li><a href="<?php echo U('Rbac/node');?>"><i class="fa fa-angle-right"></i> 节点管理</a></li>
                        <?php } ?>
                    </ul>
                </li><?php endif; ?>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>审核专家讲座预约记录</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo U('Index/index');?>"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="<?php echo U('Apply/apply_lecture');?>">申请记录</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
               
                <!-- right column -->
                <form method="post" action="<?php echo U('Apply/apply_lecture_detail');?>" name="myform" id="myform" >
                <input type="hidden" name="dosubmint" value="1" />
                <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
                <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
                <input type="hidden" name="zj_id" value="<?php echo ($data["res_id"]); ?>" />
                                
                <div class="col-md-12" id="noput">

                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">预约基本信息</h3>
                        </div>
                        <div class="box-body" style="padding-top:0 20px;" id="form_tip">
                            <!-- text input -->
							<div class="form-group" style="padding:20px;">
                                <label  class="biaoti">预约讲座：<?php echo ($data["article_title"]); ?></label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">预约专家</label>
                                <div class="col-sm-8">
                                    <input type="text" name="zj_name" class="form-control noinput" value="<?php echo ($data["expname"]); ?>" onblur="check_zj()"  />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">邀请者</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control noinput" value="<?php echo ($data["yq_name"]); ?>" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">负责人</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control noinput" value="<?php echo ($data["manager_name"]); ?>" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">联系人</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control noinput" value="<?php echo ($data["call_man"]); ?>" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">联系电话</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control noinput" value="<?php echo ($data["tel_num"]); ?>" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">联系邮箱</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control noinput" value="<?php echo ($data["e_mail"]); ?>" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">讲课地点</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control noinput" value="<?php echo ($data["show_addr"]); ?>" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">听课对象</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control noinput" value="<?php echo ($data["listener"]); ?>" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 control-label">讲课日期</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control noinput" value="<?php echo ($data["in_day"]); ?>" readonly />
                                </div>
                            </div>
                            <?php if($type == 0): ?><div class="form-group col-md-12">
                                    <label class="col-sm-4 control-label">预约关键词</label>
                                    <div class="col-sm-8"><textarea class="noinput_area" readonly><?php echo ($data["vague_keywords"]); ?></textarea></div>
                                </div><?php endif; ?>

                            <div class="form-group">&nbsp;</div>
                        </div>
                    </div><!-- /.box -->
                </div><!--/.col (right) -->


                

                <div class="col-md-12">

                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">审核</h3>
                        </div>
                        <div class="box-body" style="padding-top:20px;" id="form_tip">
                           	
                                
                            <div class="form-group col-md-12" style="margin-top:10px; margin-bottom: 30px;">
                                <div class="checkboxlist" id="applycheckbox" style="margin-top:10px;">
                                <input type="radio" name="status" value="1" <?php if($data['status']==1){ echo 'checked';} ?> > 通过 &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="status" value="2" <?php if($data['status']==2){ echo 'checked';} ?> > 不通过
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <div style="border-top:1px solid #dedede; margin-top:15px; padding-top:20px;">
                                    <label>审核意见</label>
                                    <textarea class="form-control" name="verify_view" ><?php echo ($data["verify_view"]); ?></textarea>
                                </div>
                            </div>
                           
                            <div class="form-group">&nbsp;</div>
                                   
                        </div>
                    </div><!-- /.box -->
                </div><!--/.col (right) -->
                
                
                <div class="col-md-12 select_1" <?php if($data['status']==2 || $data['status']==0){ echo 'style="display:none;"'; } ?>>

                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">确认并将预约记录同步至排课系统</h3>
                        </div>
                        <div class="box-body" style="padding-top:20px;" id="form_tip">
                        	<input type="hidden" name="info[cour_id]" value="<?php echo ($data["article_id"]); ?>">
                            <input type="hidden" name="info[order_id]" value="<?php echo ($data["id"]); ?>">
                            <input type="hidden" name="info[teacher_id]" value="<?php echo ($data["cms_exp_id"]); ?>">
                            <div class="form-group col-md-6">
                                <label>课程名称</label>
                                <input type="text" name="info[task]"  value="<?php if($wots){ echo $wots['task']; }else{ echo $data['article_title'];} ?>"  class="form-control"/>
                            </div>
                           
                            <div class="form-group col-md-6">
                                <label>讲课专家</label>
                                <input type="text" name="info[teacher]"  value="<?php if($wots){ echo $wots['teacher']; }else{ echo $data['expname'];} ?>" id="teacher" class="form-control" readonly/>
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label>讲课日期</label>
                                <div class="input-group" onclick="laydate({elem: '#builddate'});">
                                    <input type="text" name="info[builddate]"  value="<?php if($wots){ echo $wots['builddate']; }else{ echo date('Y-m-d',$inday);} ?>" id="builddate" class="form-control"/>
                                    <span class="input-group-addon" style="width:32px;"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div> 
                            
                            <div class="form-group col-md-3">
                                <label>上课时间</label>
                                <div class="time_pick">
                                    <input type="text" name="info[stime]" value="<?php if($wots){ echo $wots['stime']; } ?>" class="timeselect form-control" />
                                </div>
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label>预计时长（分钟）</label>
                                <input type="text" name="info[duration]"  value="<?php if($wots){ echo $wots['duration']; } ?>" class="form-control"/>
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label>预计人数</label>
                                <input type="text" name="info[stu_num]"  value="<?php if($wots){ echo $wots['stu_num']; } ?>" class="form-control"/>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label>上课场地</label>
                                <input type="text" name="info[site]" value="<?php if($wots){ echo $wots['site']; }else{ echo $data['show_addr'];} ?>" class="form-control" />
                            </div>
                            
                            
                            <div class="form-group col-md-12">
                                <label>备注</label>
                                <textarea class="form-control" name="info[remarks]" style="height:100px;"><?php if($wots){ echo $wots['remarks']; } ?></textarea>
                            </div>
                            
                            <div class="form-group col-md-12" style="margin-top:10px;">
                                <div class="checkboxlist" id="applycheckbox" style="margin-top:10px;">
                                <input type="checkbox" name="sms_xx" value="1"> 短信通知预约联系人（学校） &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="sms_zj" value="1"> 短信通知预约专家
                                </div>
                            </div>
                            
                            <div class="form-group">&nbsp;</div>
                            <div class="form-group">&nbsp;</div>
                        </div>
                    </div><!-- /.box -->
                </div><!--/.col (right) -->
                
                <div class="form-group savebtn">
                    <button class="btn btn-success btn-lg saves">保存</button>
                </div>
                </form>

            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<!-- add new calendar event modal -->

<!--JqueryUI-->
<script src="/admin/assets/js/plugins/jqueryui/jquery-ui.js" type="text/javascript"></script>
<!--timepicker-->
<script src="/admin/assets/js/plugins/jqueryui/jquery-ui-slide.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/plugins/jqueryui/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
<!--artdialog-->

<!-- FORM -->
<script src="/admin/assets/js/plugins/form/formvalidator.js" type="text/javascript"></script>
<script src="/admin/assets/js/plugins/form/formvalidatorregex.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="/admin/assets/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="/admin/assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script src="/admin/assets/comm/jquery.autocomplete.min.js"></script>
<script src="/admin/assets/js/timepicki.js" type="text/javascript"></script>
<script src="/admin/assets/comm/laydate/laydate.js"></script>
<script type="text/javascript">
    //laydate.skin('molv');
</script>

<!-- AdminLTE App -->
<?php echo $__additional_js__; ?>
<?php echo $__additional_jscode__ ?>
<script src="/admin/assets/js/public.js" type="text/javascript"></script>
<script src="/admin/assets/js/py/app.js" type="text/javascript"></script>
<script src="/admin/assets/js/artDialog.js"></script>
<script src="/admin/assets/js/iframeTools.js"></script>
<script src="/admin/assets/comm/charts/highcharts.js" type="text/javascript"></script>
<script src="/admin/assets/comm/charts/modules/exporting.js" type="text/javascript"></script>
<script src="/admin/assets/comm/plupload-2.2.0/js/plupload.full.min.js"></script>
<script type="text/javascript" src="/admin/assets/comm/city/jquery.cityselect.js"></script>
<script type="text/javascript" src="/admin/assets/js/cropper.min.js"></script>
<script type="text/javascript" src="/admin/assets/js/sitelogo_new.js"></script>
<script>
    $(document).ready(function() {
        //interval = setInterval(lockscreen, "1000");
    })
    function lockscreen(){
        $.get("<?php echo U('Index/public_lock'); ?>", function(result){
            if(result==1){
                window.location.href='<?php echo U('Index/public_lockscreen','','',true); ?>';
            }
        });
    }
    $(document).keydown(function(event){
        if(event.keyCode==27){
            art.dialog.close();
        }
    });
</script>


</body>
</html>
<script type="text/javascript">
    $(".timeselect").timepicki();
    $(document).ready(function(e) {
        $('#applycheckbox').find('ins').each(function(index, element) {
            $(this).click(function(){
                if(index==0){
                    $('.select_1').show();
                    $('.select_2').hide();
                }else{
                    $('.select_2').show();
                    $('.select_1').hide();
                }
            })
        });
    });


 //检查输入专家名字是否正确-
    function check_zj(){
        var name = $("input[name='zj_name']").val();
        $.ajax({
            type:"POST",
            url :"<?php echo U('Ajax/check_zj');?>",
            data:{name:name},
            success:function(msg){
                if(msg != 0){
                   $("input[name=zj_id]").val(msg);
                }else{
                    alert("请输入正确的专家名称");
                    return false;
                }
            }
        })
    }

</script>
<script>

</script>
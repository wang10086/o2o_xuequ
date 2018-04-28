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
                        <!--<?php if(rolemenu(array('Member/add_mem'))): ?><li><a href="<?php echo U('Member/add_mem');?>"><i class="fa fa-angle-right"></i> 添加会员(临时使用)</a></li><?php endif; ?>-->
                        
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
            <h1>编辑服务项目</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo U('Index/index');?>"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="<?php echo U('Goods/goodslist');?>">服务项目</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="<?php echo U('Goods/goods_add');?>" name="myform" id="myform">
                    <input type="hidden" name="dosubmint" value="1" />
                    <input type="hidden" name="editid" value="<?php echo ($row["id"]); ?>" />
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
                                    <input type="text" name="info[title]" value="<?php echo ($row["title"]); ?>" class="form-control"/>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>活动排序</label>
                                    <input type="text" name="info[sort]" value="<?php echo ($row["sort"]); ?>" class="form-control"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>开课日期</label>
                                    <input type="text" name="info[com_date]" class="form-control" value="<?php echo ($row["com_date"]); ?>"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>活动开始日期</label>
                                    <input type="text" name="info[start_date]" class="form-control inputdate"  value="<?php echo ($row["start_date"]); ?>"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>活动截止日期</label>
                                    <input type="text" name="info[end_date]" class="form-control inputdate"  value="<?php echo ($row["end_date"]); ?>"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>每班限额</label>
                                    <input type="text" name="info[quota]" class="form-control" value="<?php echo ($row["quota"]); ?>"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>活动时长</label>
                                    <input type="text" name="info[days]" class="form-control" value="<?php echo ($row["days"]); ?>"/>
                                </div>
                                
                                <!--<div class="form-group col-md-4">
                                    <label>活动时长</label>
                                    <select name="info[days]"  class="form-control" >
                                        <option value="">请选择</option>
                                        <?php if(is_array($goodsday)): foreach($goodsday as $key=>$v): ?><option value="<?php echo ($v); ?>" <?php ?>><?php echo ($v); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>-->
                                
								<!--
                                <div class="form-group col-md-4">
                                    <label>科教领域</label>
                                    <select name="info[fields]"  class="form-control">
                                        <option value="">请选择</option>
                                        <?php if(is_array($goodsfie)): foreach($goodsfie as $key=>$v): ?><option value="<?php echo ($v); ?>" <?php if($row['fields']==$v){ echo 'selected';} ?>><?php echo ($v); ?></option><?php endforeach; endif; ?>
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
                                    <input type="text" name="info[city]" value="<?php echo ($row["city"]); ?>" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>所属组织</label>
                                    <input type="text" name="info[org]" value="<?php echo ($row["org"]); ?>" class="form-control">
                                    
                                </div>
                                <!--
                                <div class="form-group col-md-4">
                                    <label>支持项目</label>
                                    <select name="info[res_pro]"  class="form-control">
                                        <option value="">请选择</option>
                                        <?php if(is_array($res_pro)): foreach($res_pro as $key=>$v): ?><option value="<?php echo ($v); ?>" <?php if($row['res_pro']==$v){echo 'selected';} ?>><?php echo ($v); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>
                                -->
                                
                                <div class="form-group col-md-12">
                                	<span class="lm_c"><strong>科教领域</strong></span>
                                    <?php if(is_array($goodsfie)): foreach($goodsfie as $k=>$v): ?><span class="lm_c"><input type="checkbox" name="fie[]" <?php if(in_array($v,$fie)){ echo 'checked';} ?>  value="<?php echo ($v); ?>"> <?php echo ($v); ?></span><?php endforeach; endif; ?>
                                </div>
                                
                                <div class="form-group col-md-12">
                                	<span class="lm_c"><strong>适合学段</strong></span>
                                    <?php if(is_array($goodsfit)): foreach($goodsfit as $k=>$v): ?><span class="lm_c"><input type="checkbox" name="fit[]" <?php if(in_array($v,$fit)){ echo 'checked';} ?>  value="<?php echo ($v); ?>"> <?php echo ($v); ?></span><?php endforeach; endif; ?>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>课程亮点</label>
                                    <textarea class="form-control" name="info[lights]" style="height:120px" placeholder="多条请用空格分隔"><?php echo ($row["lights"]); ?></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>课程目标</label>
                                    <textarea class="form-control" name="info[target]" style="height:120px" ><?php echo ($row["target"]); ?></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>课程内容</label>
                                    <textarea class="form-control" name="info[content]" style="height:120px"  ><?php echo ($row["content"]); ?></textarea>
                                </div>
                                
                                <!--
                                <div class="form-group col-md-12">
                                    <label>课程安排</label>
                                    <textarea class="form-control" name="info[plan]" style="height:120px"  ><?php echo ($row["plan"]); ?></textarea>
                                </div>
                                -->

                                <div class="form-group col-md-12">
                                    <label>配套资料及器材</label>
                                    <textarea class="form-control" name="info[cost]" style="height:120px" ><?php echo ($row["cost"]); ?></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>注意事项</label>
                                    <textarea class="form-control" name="info[notice]" style="height:120px" ><?php echo ($row["notice"]); ?></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>安全保障</label>
                                    <textarea class="form-control" name="info[security]" style="height:120px" ><?php echo ($row["security"]); ?></textarea>
                                </div>




                                <div class="form-group col-md-12" style="margin-bottom:0;">
                                    <label>资源标签</label>
                                    <p style="color:#cccccc">可以通过标签关联相关信息，<a href="javascript:;" onClick="task_tag()">增加标签</a></p>
                                </div>

                                <div id="task_tag">
                                    <div id="task_tag_val" style="display:none;">2</div>
                                    <div class="ti" id="task_tag_list">

                                        <?php if(is_array($tag)): foreach($tag as $k=>$v): ?><div class="col-md-2 pd" id="tag_mr_<?php echo ($k); ?>">
                                                <div class="input-group">
                                                    <input type="text" placeholder="标签" name="tag[]" value="<?php echo ($v); ?>" class="form-control">
                                                    <span class="input-group-addon" style="width:32px;"><a href="javascript:;"  onClick="deltag('tag_mr_<?php echo ($k); ?>')">X</a></span>
                                                </div>
                                            </div><?php endforeach; endif; ?>

                                    </div>
                                </div>

                                <div class="form-group">&nbsp;</div>
                                <div class="form-group">&nbsp;</div>

                                <?php echo upload_m('uploadfile','files',$atts,'活动轮播图片');?>


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
                                    <?php if(is_array($price)): foreach($price as $k=>$v): ?><div class="col-md-3 pd" id="fac_mr_<?php echo ($v["id"]); ?>">
                                            <div class="input-group">
                                                    <span class="input-group-addon" style="background:#ffffff;">
                                                        <input type="text" name="price[<?php echo ($v["id"]); ?>10000][date]" placeholder="日期" class="left_text inputdate hasDatepicker" value="<?php echo ($v["ondate"]); ?>">
                                                    </span>
                                                <input type="text" placeholder="价格" name="price[<?php echo ($v["id"]); ?>10000][price]" class="form-control" value="<?php echo ($v["price"]); ?>">
                                                <span class="input-group-addon dels"><a href="javascript:;" onclick="del_fac('fac_mr_<?php echo ($v["id"]); ?>')">X</a></span>
                                            </div>
                                        </div><?php endforeach; endif; ?>
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
                                    <?php if(is_array($days)): foreach($days as $k=>$v): ?><div class="tasklist" id="task_a_<?php echo ($v["id"]); ?>">
                                            <a class="aui_close" href="javascript:;" onClick="del_timu('task_a_<?php echo ($v["id"]); ?>')">×</a>
                                            <div class="col-md-12 pd">
                                                <label class="titou"><strong>第<span class="tihao"><?php echo ($k+1); ?></span>天</strong></label>
                                                <div class="input-group">
                                                    <input type="text" placeholder="所在城市" name="days[<?php echo ($v["id"]); ?>1000][citys]" class="form-control" value="<?php echo ($v["citys"]); ?>">
                                                </div>
                                                <div class="input-group pads">
                                                    <textarea class="form-control" placeholder="行程安排" name="days[<?php echo ($v["id"]); ?>1000][content]"><?php echo ($v["content"]); ?></textarea>
                                                </div>
                                                <div class="input-group">
                                                    <input type="text" placeholder="房餐车安排" name="days[<?php echo ($v["id"]); ?>1000][remarks]" class="form-control" value="<?php echo ($v["remarks"]); ?>">
                                                </div>
                                            </div>
                                        </div><?php endforeach; endif; ?>

                                </div>

                                <div style="display:none" id="task_val">0</div>

                                <?php echo upload_m('daysfile','daysfiles',$daypic,'&nbsp;日程照片','daysbox','daypic','某一天的图片');?>
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
                                        <?php if(is_array($infotype)): foreach($infotype as $k=>$v): if($v['level']==1){ ?>
                                            </div>
                                            <div class="unlm">
                                            <span class="lm_a"><input type="checkbox" name="lm[]" <?php if(in_array('['.$v['id'].']',$lm)){ echo 'checked';} ?>  value="[<?php echo ($v["id"]); ?>]"> <?php echo ($v["title"]); ?></span><br />
                                            <?php }else{ ?>
                                            <span class="lm_b"><input type="checkbox" name="lm[]" <?php if(in_array('['.$v['id'].']',$lm)){ echo 'checked';} ?>  value="[<?php echo ($v["id"]); ?>]"> <?php echo ($v["title"]); ?></span>
                                            <?php } endforeach; endif; ?>
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
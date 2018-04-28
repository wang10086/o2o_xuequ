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
            <h1>科技节产品预约记录</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo U('Index/index');?>"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="<?php echo U('Apply/apply_sci');?>">科技节产品预约记录</a></li>
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
                            <h3 class="box-title">科技节产品预约记录</h3>
                            <div class="pull-right box-tools">
                                <a href="javascript:;" class="btn btn-info btn-sm" onclick="javascript:opensearch('searchtext',700,120);" style="color:#ffffff;"><i class="fa fa-search"></i> 搜索</a>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered dataTable fontmini" id="tablelist">
                                <tr role="row" class="orders" >
                                    <th class="sorting cent" data="id" width="80">ID</th>
                                    <th class="sorting cent" data="title">科技节名称</th>
                                    <th class="sorting cent" data="call_man">联系人</th>
                                    <th class="sorting cent" data="tel_num">联系电话</th>
                                    <th class="sorting cent" data="in_day">科技节日期</th>
                                    <th class="sorting cent" data="apply_time">申请时间</th>
                                    <th class="sorting cent" data="status" width="140">状态</th>
                                    <th class="sorting cent" data="status" width="140">操作</th>
                                </tr>
                                <?php if(is_array($data)): foreach($data as $key=>$row): ?><tr>
                                        <td class="cent"><?php echo ($row["id"]); ?></td>
                                        <td><?php echo ($row["sci_tit"]); ?></td>
                                        <td class="cent"><?php echo ($row["call_man"]); ?></td>
                                        <td class="cent"><?php echo ($row["tel_num"]); ?></td>
                                        <td class="cent"><?php echo (date('Y-m-d H:i:s',$row["in_day"])); ?></td>
                                        <td class="cent"><?php if($row['booking_time']): echo (date('Y-m-d H:i:s',$row["booking_time"])); endif; ?></td>
                                        <td class="cent"><?php echo ($row["strstatus"]); ?></td>
                                        <td class="cent" width="140">
                                            <a href="<?php echo U('Apply/apply_sci_detail',array('id'=> $row[id]));?>"><i class="btn btn-upd btn-smsm fa fa-pencil">审核</i></a>
                                            <!--<a href="<?php echo U('Apply/apply_lec_del',array('id'=>$row['id']));?>" onclick="return del()" title="删除" class="btn btn-del btn-smsm"><i class="icon ion-close-circled"></i>删除</a>-->
                                        </td>
                                    </tr><?php endforeach; endif; ?>

                            </table>
                        </div><!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pagestyle"><?php echo ($pages); ?></div>
                        </div>
                    </div><!-- /.box -->


                </div><!-- right col -->
            </div><!-- /.row (main row) -->

        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- add new calendar event modal -->

<div id="searchtext">
    <form method="get" action="<?php echo U('Apply/apply_service');?>" id="searchfrom" name="myform">
        <input type="hidden" name="m" value="Main">
        <input type="hidden" name="c" value="Apply">
        <input type="hidden" name="a" value="apply_service">
        <div class="form-group col-md-12">
            <input type="text" name="kw" placeholder="学校名称"  class="form-control"/>
        </div>

    </form>
</div>


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
    function del(){
        if(!confirm("确认要删除？")){
            window.event.returnValue = false;
        }
    }
</script>
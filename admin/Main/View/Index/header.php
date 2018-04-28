<?php use Sys\P; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo P::SYSTEM_NAME; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="__HTML__/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="__HTML__/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="__HTML__/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- jquery-ui style -->
    <link href="__HTML__/css/jQueryUI/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css" />
    <!-- ArtDialog -->
    <link href="__HTML__/comm/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
    <!--手动添加style-->
    <link href="__HTML__/css/style.css" rel="stylesheet" type="text/css" />

    <link href="__HTML__/comm/cropper/cropper.min.css" rel="stylesheet">
    <link href="__HTML__/comm/sitelogo/sitelogo.css" rel="stylesheet">
    <!-- Theme style -->
    <link href="__HTML__/css/py.css" rel="stylesheet" type="text/css" />
    <link href="__HTML__/css/artDialog.css" rel="stylesheet" type="text/css"  />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="__HTML__/js/html5shiv.min.js"></script>
    <script src="__HTML__/js/respond.min.js"></script>
    <![endif]-->
    <?php echo PHP_EOL . $__additional_css__ ?>
    <!-- jQuery 1.11.1 -->
    <script src="__HTML__/js/jquery-1.7.2.min.js"></script>
    <!-- Bootstrap -->
    <script src="__HTML__/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="__HTML__/laydate/laydate.js"></script>
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
                            <img src="{:GetHead()}" class="img-circle" alt="User Image"  onClick="window.location.href='{:U('User/edit')}'" />
                            <p><?php  echo cookie('name'); ?></p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{:U('User/edit',array('id'=>cookie('userid')))}" class="btn btn-default btn-flat">修改资料</a>
                            </div>
                            <div class="pull-right">
                                <a href="{:U('User/password',array('id'=>cookie('userid')))}" class="btn btn-default btn-flat">修改密码</a>
                            </div>
                        </li>
                    </ul>


                </li>
                <li class="dropdown messages-menu">
                    <a href="{:U('Index/logout')}" class="dropdown-toggle">
                        <i class="fa fa-power-off"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

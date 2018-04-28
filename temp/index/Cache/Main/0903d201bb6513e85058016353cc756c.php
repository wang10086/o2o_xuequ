<?php if (!defined('THINK_PATH')) exit(); use Sys\P; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo ($page_title); ?></title>
<meta name="keywords" content="" />
<meta name="description" content=""/>
<link href="/index/assets/css/style.css?v=1.2" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/index/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/index/assets/js/jquery.cookie.min.js"></script>
<script type="text/javascript" src="/index/assets/js/jquery.SuperSlide.2.1.2.js"></script>
<script type="text/javascript" src="/index/assets/com/laydate/laydate.js"></script>
<script type="text/javascript" src="/index/assets/js/jquery.sticky-kit.js"></script>
<script type="text/javascript" src="/index/assets/js/Validform_v5.3.2.js"></script>
<script type="text/javascript" src="/index/assets/js/commen.js"></script>
</head>


<body>
<div class="unbox">
    <div class="content header">
        <div class="logo"></div>
        <div class="slogan"></div>
        <div class="search">
            <div class="usertext">
                <span class="lf"><a href="http://kjlm.kexueyou.com/" target="_blank">科教联盟介绍</a></span>
                
                <?php if(cookie('username')): ?><span class="us"> <a class="sch_name" href="<?php echo U('Member/index');?>"><?php echo cookie('username');?></a>  / <a href="<?php echo U('Login/loginOut');?>">注销</a></span>
                <?php else: ?>
                	<span class="cc"><a href="<?php echo U('Index/register');?>">用户注册说明</a></span>
                    <span class="rf"><a href="<?php echo U('Login/check_login');?>">登录</a> / <a href="<?php echo U('Login/register');?>">注册</a></span><?php endif; ?>
                
            </div>
            <div class="sfrom">
                <input type="text">
                <button>搜索</button>
            </div>
        </div>
    </div>
</div>

<div class="unbox nav">
    <div class="content">
        <ul>
            <li><a <?php echo navShow('Index');?> href="<?php echo U('Index/home');?>">首页</a></li>
            <li><a <?php echo navShow('Education');?> href="<?php echo U('Education/education');?>">科学教育专题</a></li>
            <li><a <?php echo navShow('Resource');?> href="<?php echo U('Resource/index');?>">高端科教资源</a></li>
            <li><a <?php echo navShow('Pro');?> href="<?php echo U('Pro/index');?>">支撑服务项目</a></li>
            <li><a <?php echo navShow('Show');?> href="<?php echo U('Show/kejiao_show');?>">科教活动展示</a></li>
            <li><a <?php echo navShow('Gongyi');?> href="<?php echo U('Gongyi/gongyi');?>">科教公益项目</a></li>
            <li><a <?php echo navShow('HHH');?> href="<?php echo U('HHH/HHH');?>">“3H”工程学校</a></li>
        </ul>
    </div>
</div>






<div class="unbox">
    <div class="content ovhid">

        <div class="crumbs">
            您所在的位置：<a href="<?php echo U('Index/home');?>">首页</a>  <span>&gt;</span> <a href="#">科学教育专题</a>
            <a href="<?php echo U('Education/more_edu');?>"><span class="res_more">更多>></span></a>
        </div>

        <div class="listbox">
            <ul>
                <li>
                    <a href="<?php echo U('Education/yanjiangtuan');?>" class="listcon">
                        <img src="/index/assets/images/1.jpg">
                        <p>中国科学院老科学家科普演讲团专题</p>
                    </a>
                    <a href="<?php echo U('Education/yanjiangtuan');?>" class="more">了解详情</a>
                </li>

                <li>
                    <a href="<?php echo U('Gongyi/gongyi');?>" class="listcon">
                        <img src="/index/assets/images/u262.png">
                        <p>学校科学教育基金</p>
                    </a>
                    <a href="<?php echo U('Gongyi/gongyi');?>" class="more">了解详情</a>
                </li>

                <!--<li>
                    <a href="<?php echo U('Education/zjs_luntan');?>" class="listcon">
                        <img src="/index/assets/images/zjs_luntan1.png">
                        <p>“紫金山论坛”专题</p>
                    </a>
                    <a href="<?php echo U('Education/zjs_luntan');?>" class="more">了解详情</a>
                </li>-->

                <li>
                    <a href="<?php echo U('Education/shaokeyuan');?>" class="listcon">
                        <img src="/index/assets/images/shaokeyuan.png">
                        <p>海淀区少年科学院专题</p>
                    </a>
                    <a href="<?php echo U('Education/shaokeyuan');?>" class="more">了解详情</a>
                </li>

                <li>
                    <a href="<?php echo U('HHH/HHH');?>" class="listcon">
                        <img src="/index/assets/images/4.jpg">
                        <p>中国科学院“3H工程”支撑服务学校专题</p>
                    </a>
                    <a href="<?php echo U('HHH/HHH');?>" class="more">了解详情</a>
                </li>

                <?php if(is_array($data)): foreach($data as $key=>$vo): ?><li>
                        <a href="<?php echo U('Education/edu_detail',array('id'=>$vo['id'],'module'=>$vo['module']));?>" class="listcon">
                            <img src="/<?php echo ($vo["pic"]); ?>">
                            <p><?php echo ($vo["title"]); ?></p>
                        </a>
                        <a href="<?php echo U('Education/edu_detail',array('id'=>$vo['id'],'module'=>$vo['module']));?>" class="more">了解详情</a>
                    </li><?php endforeach; endif; ?>

            </ul>
        </div>

        <div class="page">
            <a href="#" class="ll">上一页</a>
            <a href="#" class="on">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#" class="rr">下一页</a>
        </div>

    </div>
</div>


<script type="text/javascript">
</script>

<div class="unbox mt20 footer">
    <div class="content">
        <div class="logo"></div>
        <div class="link">
            <h2>友情链接</h2>
            <div class="lk">
                <a href="http://www.cas.cn/">中国科学院</a>
                <a href="http://ab.cas.cn/xgj/">中国科学院行政管理局</a>
                <a href="http://kjlm.kexueyou.com/">中国科学院科学教育联盟</a>
            </div>
        </div>
        <div class="code"><img src="/index/assets/images/erweima.png"></div>
        <div class="about">
            <h2>联系我们</h2>
            <p>地址：北京市海淀区中关村南三街15号</p>
        </div>
    </div>
</div>

<div class="unbox copy">
    <!--版权所有 &copy; 中科教科学教育平台 京ICP备12018309号 &nbsp; 京公网安备110402500027号-->
    版权所有 &copy; 中科教科学教育平台 京ICP备12018327号-1 &nbsp; <!--京公网安备110402500027号-->
</div>


</body>
</html>
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
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="<?php echo U('Index/home');?>">首页</a>  <span>&gt;</span> <a href="<?php echo U('Index/education');?>">科学教育专题</a> <span>&gt;</span> <a href="#">中国科学院“率先行动”成果展</a>
        </div>


        <div class="content">


            <div class="artdetail_gy">

                <h1>中国科学院“率先行动”成果展</h1>

                <img  style=""  src="/index/assets/images/sxxd.png">
                <div class="newscon mt20">
                    <p>“率先行动”成果展是中科院按照中央关于“砥砺奋进的五年”主题宣传活动的重大部署，展示中科院“十八大”以来取得的创新成就，迎接党的“十九大”胜利召开的重要举措。此次成果展按照中科院新时期办院方针“三个面向”“四个率先”布局，遴选中科院在面向世界科技前沿、面向国家重大需求、面向国民经济主战场，率先实现科学技术跨越发展、率先建成国家创新人才高地、率先建成国家高水平科技智库、率先建设国际一流科研机构方面所取得的代表性成果，按照“用中国科学院技术展示中国科学院成果”的创新思路，综合利用各种先进展示科普手段和展示方式，向公众有效传播前沿科学知识和科学思想，增强全院乃至全国科技界创新跨越的信心和勇气，激发全社会的创新创业活力。</p>
                </div>
                <!--<div class="nr" >
                    <img src="/index/assets/images/sxxd.png">
                    <p>“率先行动”成果展是中科院按照中央关于“砥砺奋进的五年”主题宣传活动的重大部署，展示中科院“十八大”以来取得的创新成就，迎接党的“十九大”胜利召开的重要举措。此次成果展按照中科院新时期办院方针“三个面向”“四个率先”布局，遴选中科院在面向世界科技前沿、面向国家重大需求、面向国民经济主战场，率先实现科学技术跨越发展、率先建成国家创新人才高地、率先建成国家高水平科技智库、率先建设国际一流科研机构方面所取得的代表性成果，按照“用中国科学院技术展示中国科学院成果”的创新思路，综合利用各种先进展示科普手段和展示方式，向公众有效传播前沿科学知识和科学思想，增强全院乃至全国科技界创新跨越的信心和勇气，激发全社会的创新创业活力。</p>
                </div>-->
            </div>


            <div class="actrbox">

                <!--<div class="unrel mt20">
                    <div class="reltit">
                        <h2>相关领域专家</h2>
                    </div>
                    <div class=" exphot">
                        <ul>
                            <?php if(is_array($data_x)): foreach($data_x as $key=>$v): ?><li><a href="<?php echo U('Pro/lecture',array('id'=>$v['id']));?>"><img src="<?php echo thumb($v['pic'],105,105);?>"><p><?php echo ($v["title"]); ?></p></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>-->

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>相关领域活动</h2>
                    </div>
                    <div class="cont"><ul>
                            <?php if(is_array($data_y)): foreach($data_y as $key=>$v): ?><li><a href="<?php echo U('Pro/travel',array('id'=>$v['id']));?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
                        </ul></div>
                </div>

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>相关领域资源</h2>
                    </div>
                    <div class="cont"><ul>
                            <?php if(is_array($data_z)): foreach($data_z as $key=>$v): ?><li><a href="<?php echo U('Resource/ziyuan_detail',array('id'=>$v['id'],'col'=>$v['col']));?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
                        </ul></div>
                </div>

            </div>


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
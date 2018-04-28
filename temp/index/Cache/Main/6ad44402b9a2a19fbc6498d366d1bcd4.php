<?php if (!defined('THINK_PATH')) exit();?>    <?php use Sys\P; ?>
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
<script type="text/javascript" src="/index/assets/js/date.js"></script>
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





    <!--<link rel="stylesheet" type="text/css" href="/index/assets/pic/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/index/assets/pic/css/default.css">-->
    <link rel="stylesheet" type="text/css" href="/index/assets/pic/css/pgwslideshow.css">
    <script type="text/javascript" src="/index/assets/pic/js/pgwslideshow.min.js"></script>
    <style>



    </style>

    <div class="unbox">
    	<div class="content">
        	
            <div class="crumbs">
            	您所在的位置：<a href="<?php echo U('Index/home');?>">首页</a>  <span>&gt;</span> <a href="<?php echo U('Pro/index');?>">支撑服务项目</a> <span>&gt;</span>  <a href="javascript:;"><?php echo ($row["title"]); ?></a>
            </div>

            <style type="text/css">
                /* css 重置 */

                /* 本例子css */
                .picScroll-left{ width:208px;  overflow:hidden; position:relative;  border:1px solid #ccc; float: left; height: 185px; margin-right: 20px; }
                .picScroll-left .hd{ overflow:hidden;  height:0px; background:#f4f4f4; padding:0 10px;  }
                .picScroll-left .hd .prev,.picScroll-left .hd .next{ display:block;  width:5px; height:9px; float:right; margin-right:5px; margin-top:10px;  overflow:hidden;  cursor:pointer; background:url("images/arrow.png") no-repeat;}
                .picScroll-left .hd .next{ background-position:0 -50px;  }
                .picScroll-left .hd .prev{ background-position:-60px 0; }
                .picScroll-left .hd .next{ background-position:-60px -50px; }
                .picScroll-left .hd ul{ float:right; overflow:hidden; zoom:1; margin-top:10px; zoom:1; }
                .picScroll-left .hd ul li{ float:left;  width:9px; height:9px; overflow:hidden; margin-right:5px; text-indent:-999px; cursor:pointer; background:url("images/icoCircle.gif") 0 -9px no-repeat; }
                .picScroll-left .hd ul li.on{ background-position:0 0; }
                .picScroll-left .bd{ padding:10px;   }
                .picScroll-left .bd ul{ overflow:hidden; zoom:1; }
                .picScroll-left .bd ul li{ float:left; _display:inline; overflow:hidden; text-align:center; text-align: center; }
                .picScroll-left .bd ul li .pic{ text-align:center; margin-left: 10px;}
                .picScroll-left .bd ul li .pic img{ width:150px; height:150px; display:block;  padding:2px; border:1px solid #ccc; }
                .picScroll-left .bd ul li .pic a:hover img{ border-color:#999;  }
                .picScroll-left .bd ul li .title{ line-height:24px;   }

                .expdesc{margin-left: 20px;}

            </style>

            <div class="content mt20 pb20 lx_cont">
                <div class="artdetail">
                    <div class="expert">
                        <!--<img src="<?php echo thumb($row['pic'],240,150);?>">-->
                        <img src="/<?php echo ($row[pic]); ?>" class="sci_img" >

                        <div class="expdesc">
                            <h2><?php echo ($row["title"]); ?></h2>
                            <?php if($row[fit]): ?><p>适合人群：<?php echo ($row["fit"]); ?></p><?php endif; ?>
                            <?php if($row[city]): ?><p>实施城市：<?php echo ($row["city"]); ?></p><?php endif; ?>
                            <?php if($row[system]): ?><p>所属系统：<?php echo ($row["system"]); ?></p><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="actrbox">

                <div class="unrel">
                    <div class="reltit">
                        <h2>热门活动</h2>
                    </div>
                    <div class="cont"><ul>
                            <?php if(is_array($data_y)): foreach($data_y as $key=>$v): ?><li><a href="<?php echo U('Pro/travel',array('id'=>$v['id']));?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
                        </ul></div>
                </div>

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>热门资源</h2>
                    </div>
                    <div class="cont"><ul>
                            <?php if(is_array($data_z)): foreach($data_z as $key=>$v): ?><li><a href="<?php echo U('Resource/ziyuan_detail',array('id'=>$v['id'],'col'=>$v['col']));?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
                        </ul></div>
                </div>

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>热门专家</h2>
                    </div>
                    <div class=" exphot">
                        <ul>
                            <?php if(is_array($data_x)): foreach($data_x as $key=>$v): ?><li><a href="<?php echo U('Pro/lecture',array('id'=>$v['id']));?>"><img src="<?php echo thumb($v['pic'],105,105);?>"><p><?php echo ($v["title"]); ?></p></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="lxnrz">
                <div class="lxnav" id="lxnav">
                    <ul>
                        <?php if($row['lights']): ?><li class="on" onClick="goto('kechengtese',this)">课程特色</li><?php endif; ?>
                        <?php if($row['target']): ?><li onClick="goto('kechengmubiao',this)">课程目标</li><?php endif; ?>
                        <?php if($row['content']): ?><li onClick="goto('kechengneirong',this)">课程内容</li><?php endif; ?>
                        <?php if($row['cost']): ?><li onClick="goto('feiyongshuoming',this)">配套资料</li><?php endif; ?>
                        <?php if($atts): ?><li onClick="goto('xiangguantupian',this)">相关图片</li><?php endif; ?>
                    </ul>
                </div>

                <?php if($row['lights']): ?><div class="lxunit" id="kechengtese">
                        <h3 class="lx_dtitle">课程特色</h3>
                        <div class="conts">
                            <p class="tra_p"><?php echo nl2br($row['lights']);?></p>
                        </div>
                    </div><?php endif; ?>

                <?php if($row['target']): ?><div class="lxunit" id="kechengmubiao">
                        <h3 class="lx_dtitle">课程目标</h3>
                        <div class="conts">
                            <?php echo nl2br($row['target']);?>
                        </div>
                    </div><?php endif; ?>

                <?php if($row['content']): ?><div class="lxunit" id="kechengneirong">
                        <h3 class="lx_dtitle">课程内容</h3>
                        <div class="conts">
                            <?php echo nl2br($row['content']);?>
                        </div>
                    </div><?php endif; ?>

                <?php if($row['cost']): ?><div class="lxunit" id="feiyongshuoming">
                        <h3 class="lx_dtitle">理论课程所需材料</h3>
                        <div class="conts">
                            <p class="tra_p"><?php echo nl2br($row['cost']);?></p>
                        </div>
                    </div><?php endif; ?>

                <?php if($atts): ?><div class="lxunit" id="xiangguantupian">
                        <h3 class="lx_dtitle">相关图片</h3>
                        <div class="kechengpic">
                            <ul>
                                <?php if(is_array($atts)): foreach($atts as $key=>$v): ?><!--<li><img src="<?php echo thumb($v['filepath'],208,150);?>"><span><?php echo ($v["filename"]); ?></span></li>-->
                                    <li><img src="/<?php echo ($v[filepath]); ?>"><span><?php echo ($v["filename"]); ?></span></li><?php endforeach; endif; ?>
                            </ul>
                        </div>
                    </div><?php endif; ?>
            </div>
        </div>
    </div>

    
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
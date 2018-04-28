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





<!---->



<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="<?php echo U('Index/home');?>">首页</a>  <span>&gt;</span> <a href="<?php echo U('Resource/index');?>">高端科教资源</a> <?php if($kindname): ?><span>&gt;</span> <a href="<?php echo U('Resource/index',array('type'=>$row['type']));?>"><?php echo ($kindname); ?></a><?php endif; ?> <span>&gt;</span> <a href=""><?php echo ($row["title"]); ?></a>
        </div>

        <div class="content">


            <div class="artdetail">
                <?php if (in_array('[11]',$_SESSION['col'])){ ?>
                    <div class="dtitle"><h2>顾问描述</h2></div>
                    <div class="expert">
                        <img src="/<?php echo ($row['pic']); ?>">
                        <div class="expdesc">
                            <h2><?php echo ($row["title"]); ?></h2>
                            <ul class="resdesc">
                                <li><strong>职务 :</strong> <?php echo ($row["keywords"]); ?></li>
                                <li><strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </li>
                                <!--<li><strong>所在省市 :</strong> <?php echo ($row["city"]); ?></li>-->
                                <!--<li><strong>适合人群 :</strong> <?php echo ($row["fit"]); ?></li>-->
                            </ul>
                        </div>
                    </div>
                <?php }elseif (in_array('[2]',$_SESSION['col']) or in_array('[3]',$_SESSION['col']) or in_array('[4]',$_SESSION['col']) or in_array('[5]',$_SESSION['col']) or in_array('[6]',$_SESSION['col']) or in_array('[7]',$_SESSION['col']) or in_array('[8]',$_SESSION['col']) or in_array('[9]',$_SESSION['col']) or in_array('[10]',$_SESSION['col'])){ ?>
                    <div class="dtitle"><h2>资源描述</h2></div>
                    <div class="expert">
                        <!--<img src="<?php echo thumb($row['pic'],240,150);?>">-->
                        <img src="/<?php echo ($row['pic']); ?>">
                        <div class="expdesc">
                            <h2><?php echo ($row["title"]); ?></h2>
                            <ul class="resdesc">
                                <li><strong>科教领域 :</strong> <?php echo ($row["fields"]); ?></li>
                                <li><strong>所属系统 :</strong> <?php echo ($row["system"]); ?></li>
                                <!--<li><strong>所在省市 :</strong> <?php echo ($row["city"]); ?></li>
                                <li><strong>适合人群 :</strong> <?php echo ($row["fit"]); ?></li>-->
                            </ul>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="dtitle"><h2>专家描述</h2></div>
                    <div class="expert">
                        <img src="/<?php echo ($row['pic']); ?>">
                        <div class="expdesc">
                            <h2><?php echo ($row["title"]); ?></h2>
                            <ul class="resdesc">
                                <?php if($row['fields']): ?><li><strong>科教领域 :</strong> <?php echo ($row["fields"]); ?></li><?php endif; ?>
                                <?php if($row['system']): ?><li><strong>所属系统 :</strong> <?php echo ($row["system"]); ?></li><?php endif; ?>
                                <?php if($row['city']): ?><li><strong>所在省市 :</strong> <?php echo ($row["city"]); ?></li><?php endif; ?>
                                <?php if($row['fit']): ?><li><strong>适合人群 :</strong> <?php echo ($row["fit"]); ?></li><?php endif; ?>
                                <?php if($row['pro']): ?><li><strong>支持项目 :</strong> <?php echo ($row["pro"]); ?></li><?php endif; ?>
                                <?php if($row['ss_city']): ?><li><strong>实施省市 :</strong> <?php echo ($row["ss_city"]); ?></li><?php endif; ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>



                <?php if (in_array('[11]',$_SESSION['col'])){ ?>
                    <div class="dtitle"><h2>顾问介绍</h2></div>
                        <div class="newscon mt20 desc_cont">&emsp;&emsp; <?php echo nl2br($row['content']);?></div>
                <?php }elseif (in_array('[3]',$_SESSION['col']) or in_array('[4]',$_SESSION['col']) or in_array('[5]',$_SESSION['col']) or in_array('[6]',$_SESSION['col']) or in_array('[7]',$_SESSION['col']) or in_array('[8]',$_SESSION['col']) or in_array('[9]',$_SESSION['col']) or in_array('[10]',$_SESSION['col'])){ ?>
                    <div class="dtitle"><h2>资源介绍</h2></div>
                        <div class="newscon mt20 desc_cont">&emsp;&emsp; <?php echo nl2br($row['content']);?></div>
                <?php }elseif (in_array('[2]',$_SESSION['col'])){ ?>
                    <div class="dtitle"><h2>资源介绍</h2></div>
                        <div class="newscon mt20 desc_cont">
                            <div class="actlbox">
                                <?php if(is_array($info)): foreach($info as $key=>$value): ?><div class ='tra_con'>
                                        <?php if($value['remarks']): ?><p class="tra_title"><?php echo ($value["remarks"]); ?></p><?php endif; ?>
                                        <?php if($value['citys']): ?><p class="tra_addr">地点：<?php echo ($value["citys"]); ?></p><?php endif; ?>
                                        <div class="tra_newscon">
                                            <!--<?php echo nl2br($value['content']);?>-->
                                            <?php echo ($value['content']); ?>
                                        </div>
                                        <div class="tra_morepic">
                                            <?php if(is_array($value['filepath'])): foreach($value['filepath'] as $key=>$vo): ?><img src="/<?php echo ($vo); ?>"><?php endforeach; endif; ?>
                                        </div>
                                    </div><?php endforeach; endif; ?>
                            </div>
                        </div>
                <?php }else{ ?>
                    <div class="dtitle"><h2>专家介绍</h2></div>
                        <div class="newscon mt20 desc_cont">&emsp;&emsp; <?php echo nl2br($row['content']);?></div>
                <?php } ?>



                <?php if (in_array('[11]',$_SESSION['col'])){ ?>
                    <div class="dtitle mt20"><h2>顾问职责</h2></div>
                    <div class="newscon mt20 desc_cont">
                        &emsp;&emsp;联盟建设、管理、运行中重大事项的决策咨询；联盟科学教育理论研究指导；出席联盟重要活动；专题报告。
                    </div>
                <?php }else{ ?>
                    <div class="dtitle mt20"><h2>相关项目</h2></div>
                    <div class="newscon mt20 desc_cont">
                        <div class="about_t">
                            <?php if(is_array($data_A)): foreach($data_A as $key=>$v): echo ($v); ?>：<?php endforeach; endif; ?>
                        </div>
                        <!--<div class="about_C">
                            <?php if(is_array($data_B)): foreach($data_B as $key=>$v): if($type == '1'): ?><span><a href="<?php echo U('Pro/lecture',array('id'=>$v['id']));?>"><?php echo ($v["title"]); ?></a></span>
                                <?php elseif($type == '10'): ?>
                                    <span><a href="<?php echo U('Pro/goods',array('id'=>$v['id']));?>"><?php echo ($v["title"]); ?></a></span>
                                <?php elseif(($type == '3') or ($type == '4')): ?>
                                    <span><a href="<?php echo U('Pro/index',array('kind'=>35));?>"><?php echo ($v["title"]); ?></a></span>
                                    <?php else: ?>
                                    <span><a href="<?php echo U('Pro/travel',array('id'=>$v['id']));?>"><?php echo ($v["title"]); ?></a></span><?php endif; endforeach; endif; ?>
                        </div>-->
                        <div class="about_C">
                            <?php if(is_array($data_B)): foreach($data_B as $key=>$v): if($type == '1'): ?><span><a href="<?php echo U('Pro/lecture',array('id'=>$v['expert_id']));?>"><?php echo ($v["title"]); ?></a></span>
                                    <?php elseif($type == '10'): ?>
                                    <span><a href="javascript:;"><?php echo ($v["title"]); ?></a></span>
                                    <?php elseif(($type == '3') or ($type == '4')): ?>
                                    <span><a href="javascript:;"><?php echo ($v["title"]); ?></a></span>
                                    <?php else: ?>
                                    <span><a href="<?php echo U('Pro/travel',array('id'=>$v['id']));?>"><?php echo ($v["title"]); ?></a></span><?php endif; endforeach; endif; ?>
                        </div>
                    </div>
                <?php } ?>

            </div>




            <div class="actrbox">

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>热门活动</h2>
                    </div>
                    <div class="cont">
                        <ul>
                            <?php if(is_array($data_y)): foreach($data_y as $key=>$v): ?><li><a href="<?php echo U('Pro/travel',array('id'=>$v['id']));?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div>
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
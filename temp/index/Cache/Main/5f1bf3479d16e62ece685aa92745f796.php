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






<div class="unbox mt20">
    <div class="content">
        <div class="slide"><a href="<?php echo U('Index/zhicheng');?>"><img src="/index/assets/images/BANNER_1.jpg"></a></div>
        <div class="hotnews">
            <div class="stit">
                <h2>通知公告</h2>
                <a href="<?php echo U('Index/notify_list');?>" class="more">更多&gt;&gt;</a>
            </div>
            <div class="hotlist">
                <ul>
                    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><li><a href="<?php echo U('Index/notify_detail',array('id'=>$vo['id'],'module'=>$vo['module']));?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; ?>
                    <li><a href="http://kjlm.kexueyou.com/">中国科学院科学教育联盟介绍</a></li>
                    <li><a href="<?php echo U('Index/register');?>">用户注册说明</a></li>
                    <li><a href="<?php echo U('Index/zhicheng');?>">中国科学院科学教育联盟支撑服务校(单位)建设</a></li>
                    <!--<li><a href="<?php echo U('Gongyi/gongyi');?>">关于针对学校设立科学教育专项基金方案</a></li>-->
                </ul>
            </div>
            <div class="stit">
                <h2>公益活动</h2>
                <a href="<?php echo U('Index/gongyi_list');?>" class="more">更多&gt;&gt;</a>
            </div>
            <div class="hotlist">
                <ul>
                    <?php if(is_array($info)): foreach($info as $key=>$vo): ?><li><a href="javascript:;"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; ?>
                    <li><a href="<?php echo U('Index/sxxd');?>">中国科学院“率先行动”成果展</a></li>
                    <li><a href="<?php echo U('Gongyi/zhumeng');?>">中科筑梦行动</a></li>
                    <li><a href="<?php echo U('Gongyi/chuangke');?>">中科创客营</a></li>
                    <li><a href="<?php echo U('Gongyi/help_stu');?>">中科助学营</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--中科box start-->
<!--2017-2018课程 start-->
<!--2018寒假夏令营start-->
<!--<div class="hj_img unbox">
    <a href="<?php echo U('Index/win_holiday');?>"><img src="/index/assets/images/2018hj.jpg" alt=""></a>
</div>-->
<div class="hj_img unbox mt20">
    <a href="<?php echo U('Index/zk_box');?>"><img src="/index/assets/images/zk_box2.jpg" alt=""></a>
</div>
<div class="hj_img unbox">
    <a href="<?php echo U('Index/lession');?>"><img src="/index/assets/images/2018lession.jpg" alt=""></a>
</div>

<!--<div class="hj_img unbox mt20">
    <a href="<?php echo U('Index/jlh');?>"><img src="/index/assets/images/jlh_1.jpg" alt=""></a>
</div>-->

<div class="unbox mt20 gbg">
    <div class="content">
        <div class="title mt20">
            <h2>科学教育专题</h2>
            <a href="<?php echo U('Education/education');?>" class="more">更多&gt;&gt;</a>
        </div>
        <div class="fslide" id="subject">
            <div class="picslide">
                <div class="bd">
                    <ul class="picList">
                        <li>
                            <a href="<?php echo U('Education/yanjiangtuan');?>">
                                <div class="pic"><img src="/index/assets/images/1.jpg"></div>
                                <div class="bt">
                                    <p class="strstr">中国科学院老科学家科普演讲团专题</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Gongyi/gongyi');?>">
                                <div class="pic"><img src="/index/assets/images/u262.png"></div>
                                <div class="bt">
                                    <p class="strstr">学校科学教育基金</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Education/shaokeyuan');?>">
                                <div class="pic"><img src="/index/assets/images/shaokeyuan.png"></div>
                                <div class="bt">
                                    <p class="strstr">海淀区少年科学院专题</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('HHH/HHH');?>">
                                <div class="pic"><img src="/index/assets/images/4.jpg"></div>
                                <div class="bt">
                                    <p class="strstr">中国科学院“3H工程”学校专题</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Education/zjs_luntan');?>">
                                <div class="pic"><img src="/index/assets/images/zjs_luntan1.png"></div>
                                <div class="bt">
                                    <p class="strstr">“紫金山论坛”专题</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hd">
                <a class="next"></a>
                <a class="prev"></a>
            </div>

        </div>

    </div>
</div>


<div class="unbox mt20">
    <div class="content" style="clear: both;">
        <div class="title">
            <h2>高端科教资源</h2>
            <a href="<?php echo U('Resource/index');?>" class="more">更多&gt;&gt;</a>
        </div>

        <div class="reso">
            <div class="l_reso">

                <div class="img_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>1));?>">
                        <img src="/index/assets/images/1_kjzj.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>1));?>"><p>科教专家</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>2));?>">
                        <img src="/index/assets/images/1_kyys.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>2));?>"><p>科研院所</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>3));?>">
                        <img src="/index/assets/images/1_kpzz.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>3));?>"><p>科普组织</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>4));?>">
                        <img src="/index/assets/images/1_zyxh.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>4));?>"><p>专业学会</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>5));?>">
                        <img src="/index/assets/images/1_kjjg.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>5));?>"><p>科教机构</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>6));?>">
                        <img src="/index/assets/images/1_ywtz.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>6));?>"><p>野外台站</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>7));?>">
                        <img src="/index/assets/images/1_dzwy.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>7));?>"><p>动.植物园</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>8));?>">
                        <img src="/index/assets/images/1_twt.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>8));?>"><p>天文台</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>9));?>">
                        <img src="/index/assets/images/1_bwg.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>9));?>"><p>博物馆</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>10));?>">
                        <img src="/index/assets/images/1_sys.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="<?php echo U('Resource/index',array('type'=>10));?>"><p>实验室</p></a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="unbox mt20 gbg">
    <div class="content">
        <div class="title mt20">
            <h2>支撑服务项目</h2>
            <a href="<?php echo U('Pro/index');?>" class="more">更多&gt;&gt;</a>
        </div>
        <div class="pro">
            <div class="unpro">
                <a class="p1" href="<?php echo U('Pro/index',array('kind'=>31));?>">走进科学院<br>走近科学家</a>
                <a class="p2" href="<?php echo U('Pro/index',array('kind'=>36));?>">走进中国科学院<br>野外台站</a>
                <a class="p3" href="<?php echo U('Pro/index',array('kind'=>32));?>">研学旅行</a>
                <a class="p4" href="<?php echo U('Pro/index',array('kind'=>33));?>">科学课程</a>
                <a class="p5" href="<?php echo U('Pro/index',array('kind'=>34));?>">研究性课题</a>
                <a class="p6" href="<?php echo U('Pro/index',array('kind'=>35));?>">科技节</a>
                <a class="p7" href="<?php echo U('Pro/index',array('kind'=>31));?>">科学家讲座</a>
                <a class="p8" href="<?php echo U('Pro/index',array('kind'=>40));?>">订制科学<br>教育产品</a>
            </div>
        </div>
    </div>
</div>


<div class="unbox mt20">
    <div class="content">
        <div class="title">
            <h2>科教活动展示</h2>
            <a href="<?php echo U('Show/kejiao_show');?>" class="more">更多&gt;&gt;</a>
        </div>
        <div class="fslide" id="activity">
            <div class="picslide">
                <div class="bd cpbd">
                    <ul class="picList">
                        <?php if(is_array($data)): foreach($data as $key=>$v): ?><li>
                                <a href="<?php echo U('Show/kejiao',array('id'=>$v['id'],'module'=>$v['module']));?>">
                                    <div class="pic"><img src="/<?php echo ($v["pic"]); ?>"></div>
                                    <div class="bt">
                                        <p class="strstr"><?php echo ($v["title"]); ?>”</p>
                                    </div>
                                    <?php if($v['type'] == 'new'): ?><img class="ind_new" src="/index/assets/images/new1.png"><?php endif; ?>
                                </a>
                            </li><?php endforeach; endif; ?>
                    </ul>
                </div>
            </div>
            <div class="hd">
                <a class="next cpnext"></a>
                <a class="prev cpprev"></a>
            </div>

        </div>

    </div>
</div>

<script type="text/javascript">
    $("#subject").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"leftLoop",autoPlay:false,vis:4,delayTime:400,interTime:5000,prevCell:'.prev',nextCell:'.next'});
    $("#activity").slide({titCell:".cphd ul",mainCell:".cpbd ul",autoPage:true,effect:"leftLoop",autoPlay:false,vis:4,delayTime:400,interTime:5000,prevCell:'.cpprev',nextCell:'.cpnext'});
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
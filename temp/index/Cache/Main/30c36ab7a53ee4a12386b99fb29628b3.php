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
            您所在的位置：<a href="<?php echo U('Index/home');?>">首页</a>  <span>&gt;</span> <a href="<?php echo U('Education/education');?>">科学教育专题</a> <span>&gt;</span> <a href="#">中国科学院老科学家科普演讲团</a>
        </div>


        <div class="content">


            <div class="artdetail">

                <h1>中国科学院老科学家科普演讲团</h1>

                <div class="dtitle"><h2>简介</h2></div>

                <div class="newscon mt20">
                    <p>中国科学院老科学家科普演讲团成立于1997年，主要由中国科学院退休研究员组成，也有高等院校、解放军以及国家各部委的专家、教授参加，还吸收了一些热心科普事业的优秀中青年学者。演讲团以弘扬科学精神、倡导科学思想、传播科技知识为己任，演讲内容涵盖现代科学技术的主要领域。</p>
                    <p>演讲团成立20年来，受到了中国科学院、中国科协、北京市和各地政府部门、科协组织以及民间团体的亲切关怀和热心支持，足迹遍及全国各省、直辖市、自治区的1500多个市、县，演讲18000多场，听众超过680万人，其中有大、中、小学学生和教师，有各级领导干部，有部队官兵，有政府公务员和社区居民。演讲团团员本着认真负责、严谨务实的精神，力求使每一场演讲富有知识性、科学性和趣味性，引发和培养听众热爱科学、亲近科学的兴趣，使听众在轻松、和谐、愉快的氛围中，真切地体会到“科学就是力量”、“科技就在身边”。</p>
                    <p>演讲团的劳动受到社会各界广泛关注和高度评价。2002年，时任副总理的李岚清同志亲切接见了演讲团领导和代表，2003年演讲团被评为全国科普先进集体，2007年荣获全国科普教学银杏奖，2011年被评为首都市民热爱的品牌科普团。</p>
                    <p>科技创新和科学普及是实现创新发展的两翼，演讲团任重道远。我们期待与社会各界建立更多、更密切的联系，我们将以热情、认真、严谨、高质量的工作回报社会的厚爱。</p>
                </div>
                <div class="morepic">
                    <div>
                        <img src="/index/assets/images/yjt_1.jpg">
                        <p>演讲团成员合影</p>
                    </div>
                    <div>
                        <img src="/index/assets/images/yjt_2.jpg">
                        <p>李岚清同志接见老科学家科普演讲团</p>
                    </div>
                    <div>
                        <img src="/index/assets/images/yjt_4.jpg">
                        <p>陈贺能教授在课堂上与学生互动</p>
                    </div>
                </div>

                <div class="dtitle mt20"><h2>科普讲座</h2></div>

                <div class="jiangzuo mt20">
                    <img src="/index/assets/images/1151.jpg">
                </div>

                <div class="centbox mt20">
                    <!--<a href="<?php echo U('Pro/index',array('kind' => 31));?>" class="centmore">选择讲座</a>-->
                    <a href="<?php echo U('Pro/index',array('kind' => 31));?>" class="centmore_l">选择讲座</a>
                    <a href="<?php echo U('Pro/agenda');?>" class="centmore_r" target="_blank">专家日程安排</a>
                </div>

                <div class="dtitle mt20"><h2>相关动态</h2></div>

                <div class="morelist">
                    <ul>
                        <li class="hot">
                            <a href="#">
                                <img src="/index/assets/images/timg4.jpg">
                                <div>
                                    <p>热烈庆祝中国科学院老科学家</p><p>科普演讲团成立20周年</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mlist_title">
                    <ul>
                        <li>• <a href="#">热烈庆祝中国科学院老科学家科普演讲团成立20周年</a></li>
                        <li>• <a href="#">热烈庆祝中国科学院老科学家科普演讲团成立20周年 </a></li>
                        <li>• <a href="#">热烈庆祝中国科学院老科学家科普演讲团成立20周年</a></li>
                        <li>• <a href="#">热烈庆祝中国科学院老科学家科普演讲团成立20周年</a></li>
                        <li>• <a href="#">热烈庆祝中国科学院老科学家科普演讲团成立20周年</a></li>
                        <li>• <a href="#">热烈庆祝中国科学院老科学家科普演讲团成立20周年</a></li>
                        <li>• <a href="#">热烈庆祝中国科学院老科学家科普演讲团成立20周年</a></li>
                    </ul>
                </div>

            </div>


            <div class="actrbox">
                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>热门活动</h2>
                    </div>
                    <div class="cont"><ul>
                            <?php if(is_array($data_y)): foreach($data_y as $key=>$v): ?><li><a href="<?php echo U('Pro/travel',array('id'=>$v['id']));?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
                        </ul></div>
                </div>

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>热门讲座</h2>
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


                <!--<div class="unrel mt20">
                                    <div class="reltit">
                                        <h2>教师培训</h2>
                                    </div>
                                    <div class="cont">
                                        <ul>
                                                <li><a href="javascript:;">培训课程一</a></li>
                                                <li><a href="javascript:;">培训课程二</a></li>
                                                <li><a href="javascript:;">培训课程三</a></li>
                                                <li><a href="javascript:;">培训课程四</a></li>
                                                <li><a href="javascript:;">培训课程五</a></li>
                                        </ul>
                                    </div>
                                </div>-->

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
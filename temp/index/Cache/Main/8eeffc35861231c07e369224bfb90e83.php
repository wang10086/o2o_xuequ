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
            您所在的位置：<a href="<?php echo U('Index/home');?>">首页</a>  <span>&gt;</span> <a href="javascript:;">科教公益项目</a>
        </div>


        <div class="content">


            <div class="artdetail">


                <div class="dtitle mt20"><h2>公益组织</h2></div>

                <div class="newscon mt20">
                    <h1>北京中科科教发展基金会</h1>
                    <p>北京中科科教发展基金会成立于2014年6月，是由中国科学院、社会相关企事业机构联合发起，在社会各界共同支持下成立的地方公益性非公募基金会。北京中科科教发展基金会以中国科学院、国家部委、高等院校的科技、教育、文化资源为依托，以享有声誉的科学家、教育家群体、科普科教基地为平台，以培养中华民族科技创新人才、发展科技教育事业为根本宗旨，重点通过开发、开展科技教育类资助、扶持、专项奖励、专项培训、课题研究、国际交流等项目，推广科教理念，推动科教融合，普及科技教育，选拔创新人才。并致力于振兴民族、振兴科技教育事业，服务社会，服务国家，努力将基金会打造成为全国科教创新综合服务平台。</p>
                </div>

                <div class="centbox mt20 pb40">
                    <a href="http://www.sedf.org.cn/" target="_blank" class="centmore">了解详情</a>
                </div>

                <div class="dtitle mt20"><h2>基金设立</h2></div>

                <div class="newscon mt20">
                    <p style="font-size:16px;"><strong>可设项目：</strong></p>
                    <p>定向或非定向的奖学金、奖教金、科学教育课题、科学教育支撑服务项目等专项基金项目。</p>
                    <p>定向项目是指专门用于本校师生科学教育活动的专项基金项目；</p>
                    <p>非定向项目是指面向非特定人群设立的科学教育活动的专项基金项目；</p>
                    <p>奖学金项目是指针对具有科学特长，取得优异成绩，具有科技创新人才培养潜力的在校中小学生设立的专项基金项目；</p>
                    <p>奖教金项目是指针对在学校科学教育方面做出突出贡献的在校教师设立的专项基金项目；</p>
                    <p>科学教育课题项目是指对学校科学教育发展相关方面进行理论探索、教学创新、经验交流、论文发表提供支持而设立的专项基金项目；</p>
                    <p>科学教育支撑服务项目是指对学校开展专家讲座、研学旅行、科学课程、探究式课题、科技节、科学博物园、展览展示等科学教育活动提供支持而设立的专项基金项目。</p>


                    <p style="margin-top:20px;font-size:16px;"><strong>资金来源：</strong></p>
                    <p>包括本校经费、社会资金等</p>
                    <p>社会资金来源包括愿意为学校科学教育发展提供支持的相关企事业单位、个人或其他社会组织的捐赠。</p>

                    <p style="margin-top:20px;font-size:16px;"><strong>捐赠回馈：</strong></p>
                    <p>包括捐赠方基金项目冠名、捐赠方税收减免、其他回馈等</p>
                    <p>捐赠方基金项目冠名是指捐赠方有权以企业名称、个人或其他合法合规的名称命名该基金项目，并对外宣传。</p>
                    <p>捐赠方税收减免是指捐赠方根据国家税收政策所能享受到的企业所得税减免。</p>
                    <p>其他回馈是指基金使用方、中国科学院科学教育联盟相关成员等依托自身资源为捐赠方提供的其他支持或服务。</p>

                    <p style="margin-top:20px;font-size:16px;"><strong>定向基金项目设立流程：</strong></p>

                    <p>1.学校方提出定向基金项目设立需求</p>
                    <p>2.基金会、学校方商定基金项目内容</p>
                    <p>3.学校方、基金会商定捐赠资金来源</p>
                    <p>4.学校方、基金会、捐赠方沟通捐赠意向</p>
                    <p>5.签订《捐款协议》</p>
                    <p>6.捐赠方支付捐款</p>
                    <p>7.学校方、基金会商定项目实施方案</p>
                    <p>8.项目实施</p>



                </div>

                <div class="centbox mt20 pb40">
                    <a href="javascript:;" class="centmore" onClick="showmsg('设立定向基金项目请联系','（工作日：周一至周五 9：00—18：00）<br><br>联系电话：010-62571432<br>联系人：王丹')">我要设立定向基金项目</a>
                </div>

                <div class="dtitle mt20"><h2>公益项目</h2></div>
				
                <div class="threepic mt20">
                	<ul>
                    	<li><a href="<?php echo U('Gongyi/zhumeng');?>"><img src="/index/assets/images/u124.png"><span>中科筑梦行动</span></a></li> 
                        <li><a href="<?php echo U('Gongyi/chuangke');?>"><img src="/index/assets/images/u126.png"><span>中科创客营</span></a></li>
                        <li><a href="<?php echo U('Gongyi/help_stu');?>"><img src="/index/assets/images/u128.png"><span>中科助学营</span></a></li>
                    </ul>
                </div>

                <div class="dtitle mt20"><h2>项目示范</h2></div>

                <div class="newscon mt20">
                    <h1>基金会资助中科“红枫未来”奖学金</h1>
                    <p>为提升中国科学院中关村学校的教育品质，切实加强师资、生源建设，鼓励教师团队开展学术研究、创新教学方式，奖励品学兼优的优秀毕业生，引导他们立志成才，为校增光，服务社会，支持、资助中国科学院中关村学校的教学建设。2016年9月1日，在新学期开学典礼上，北京中科科教发展基金会特为中国科学院中关村学校（北京中关村中学）设立的中科“红枫未来”奖学金项目捐赠资金152000元，现场一共有22名高中学生及30名初中学生获得了本次奖学金，受到了学校领导、广大教师、在校学生的一致认同，学校表示：将弘扬学校传统，开拓教学视野，做科教融合的践行者。</p>
                    
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
                        <h2>热门资源</h2>
                    </div>
                    <div class="cont"><ul>
                            <?php if(is_array($data_z)): foreach($data_z as $key=>$v): ?><li><a href="<?php echo U('Member/book_lecture',array('id'=>$v['id']));?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
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
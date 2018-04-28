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
            	您所在的位置：<a href="<?php echo U('Index/home');?>">首页</a>  <span>&gt;</span> <a href="javascript:;">支撑服务校(单位)建设</a>
            </div>
            
            
            <div class="content">
            
            	<div class="artdetail">
                
                    <div class="dtitle mt20"><h2>简介</h2></div>
                    
                    <div class="newscon mt20">
                    	<h1>支撑服务校(单位)建设</h1>
                    	<p> 中国科学院科学教育联盟为落实中国科学院“‘科学与中国’科学教育”计划，将中国科学院高端科研资源科普化成果进一步教学应用化，通过“科教联盟”科学教育支撑服务校(单位)网络，进入中小学校，助力学校提升科学教育硬件建设水平、提升师生科学素养、改善科技创新人才成长环境，践行中国科学院肩负的“科普国家队”历史使命，启动“科学教育支撑服务校(单位)”建设工作。</p>
                        <p>依托“科教联盟”科研院所成员单位，为“科学教育支撑服务校(单位)”提供高端科学教育资源；依托“科教联盟”合作基金会，为“科学教育支撑服务校(单位)”设立单独管理的科学教育专项基金；依托“科教联盟”执行单位，为“科学教育支撑服务校(单位)”提供体系化、个性化、公益性的科学教育支撑服务。</p>
                        <p>组织“科学教育支撑服务校(单位)”参加“科教联盟”各项科学教育活动，参评“科学教育特色示范校”，共同建设科技创新人才培养基地，为中国科学院大学等重点高校培养和输送科技创新人才。</p>
                    </div>
                    
                    <div class="dtitle mt20"><h2>支撑服务内容</h2></div>
                    
                    <div class="newscon mt20">
                    	<p>中国科学院科学教育联盟将对“科学教育支撑服务校(单位)”提供以下支撑服务：</p>
<p>（一）提供高端科学教育资源</p>
<p>根据学校需求，提供中国科学院科学家、科研院所、大科学装置、实验室、野外台站等高端科学教育资源。</p>
<p>（二）提供公益科学教育活动</p>
<p>提供科学家进校园、走进中科院、科普大篷车进校园、公益基金科学教育项目等公益活动。</p>
<p>（三）设立学校定向科学教育专项基金</p>
<p>设立科学教育奖学金、奖教金、研学旅行等科教公益项目专项基金，定向用于学校学生、教师，开展科学教育活动。</p>
<p>（四）提供科学教室、实验室建设支撑服务</p>
<p>依托中国科学院物理、化学、生命科学、地球科学、天文、信息技术等各领域专业实验室的技术和资源，为“科学教育支撑服务校(单位)”建设科学教育专业实验室，并提供后续的课程、教材、培训等服务。</p>
<p>（五）提供体系化的科学教育教师培训</p>
<p>面向“科学教育支撑服务校(单位)”的校领导、科技主管负责人、各学科教师、校外科技实践活动基地辅导教师等，提供5个层级+1个专题（心理）形式的培训课程与主题研修活动，培训重点围绕战略视野、科研前沿、方案规划、学科进展、实践操作、科学素养、综合能力、课堂设计、操作能力等方面展开，以报告交流、实地体验、进组实践、科普报告、实践技能等形式开展。</p>
<p>（六）提供体系化的科学教育学生活动项目</p>
<p>提供科学教育服务项目或定制个性化、体系化的科学教育建设专项方案。</p>
<p>基础层项目：主要以科学家进校园系列科普讲座、科学主题月活动与科技节活动、走进中科院系列活动、走进中科院野外台站科学考察等形式开展，旨在培养激发学生科学兴趣，通过普及，让每一名学生都有机会接触并投入到自己感兴趣的科学实践活动当中去。</p>
<p>中间层项目：主要以走进中科院系列活动、校本课程、社团科学主题课程、走进中科院野外台站科学考察等形式开展，基于学生自身兴趣，通过小规模的科技社团专题活动，开展科学知识深入学习、科学方法指导、科学精神教育、科技创新能力引导等方面的培养。</p>
<p>尖端层项目：主要以社团科学主题课程、科技创新课题、科技比赛专项辅导等形式开展，主要引导学生走进中科院实验室，自主选题开展某一学科领域的深入研究，提升科技创新能力、掌握科学研究方法、培养科学实践应用的能力、形成科学探究实践成果的同时参加各级科技比赛。</p>
                    </div>
                    
                    <div class="centbox mt20 pb40">
                        <a href="<?php echo U('Member/apply_service');?>" class="centmoremax">申请支撑服务校(单位)</a>
                    </div>
                    
                    <div class="dtitle mt20"><h2>相关文件下载</h2></div>
                    
                    <div class="downloadlist">
                        <ul>
                        	<li><i class="pdf"></i><a href="/upload/file/1.pdf" target="_blank">关于组织开展“中国科学院科学教育联盟支撑服务校(单位)”申报工作的通知</a><span>262KB</span></li>
                            <li><i class="pdf"></i><a href="/upload/file/2.pdf" target="_blank">中国科学院科学教育联盟支撑服务校(单位)建设方案</a><span>1403KB</span></li>
                            <li><i class="pdf"></i><a href="/upload/file/3.pdf" target="_blank">中国科学院科学教育联盟支撑服务校(单位)申报流程</a><span>238KB</span></li>
                            <li><i class="pdf"></i><a href="/upload/file/4.pdf" target="_blank">中国科学院科学教育联盟支撑服务校(单位)申请表</a><span>214KB</span></li>
                        </ul>
                    </div>

                    <div class="dtitle mt20"><h2>支撑服务校(单位)动态</h2><a href="<?php echo U('Index/dynamic');?>" class="mores">更多>></a></div>
                    
                    <div class="morelist slideBox">
                        <div class="bd">
                            <ul>
                                <?php if(is_array($info)): foreach($info as $key=>$vo): ?><li class="hot"><a href="<?php echo U("$vo[url]", array('id'=>$vo['id'],'module' => $vo['module']));?>"><img src="/<?php echo ($vo["pic"]); ?>"><span><?php echo ($vo["title"]); ?></span></a></li><?php endforeach; endif; ?>
                            </ul>
                        </div>
                        <!-- 下面是前/后按钮代码，如果不需要删除即可 -->
                        <a class="prev" href="javascript:void(0)"></a>
                        <a class="next" href="javascript:void(0)"></a>
                    </div>

                    <div class="mlist_title">
                        <ul>
                            <?php if(is_array($info)): foreach($info as $key=>$vo): ?><li>• <a href="<?php echo U("$vo[url]", array('id'=>$vo['id'], 'module' => $vo['module']));?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div>

                    <div class="dtitle mt20">
                    	<h2>支撑服务学校(单位)分布</h2>
                        <a href="<?php echo U('Index/pro_detail');?>" class="mores">查看全部学校(单位)>></a>
                    </div>
					
                    <div class="map_dis">
                        <div class="mapbox">
                            <div id="map_container" style="height:100%;"></div>
                        </div>
                        <div class="newsch">
                        	<div class="schtit">最新支撑服务校(单位)名单</div>
                            <div class="schlist txtMarquee-top">
                            	<div class="bd">
                            	<ul>
                                    <?php if(is_array($schools)): foreach($schools as $key=>$v): ?><li><?php echo ($v); ?></li><?php endforeach; endif; ?>
                                </ul>
                                </div>
                            </div>
                        </div>
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
                
                
            </div>
            
        </div>
    </div>
	
    <script src="/index/assets/js/echarts-all-3.js"></script>
	<script src="/index/assets/js/china.js"></script>
    <script type="text/javascript">
    
    var dom = document.getElementById("map_container");
    var myChart = echarts.init(dom);
    var app = {};
    option = null;
	
    var geoCoordMap = <?php echo ($coordinate); ?>;
    
    var convertData = function (data) {
        var res = [];
        for (var i = 0; i < data.length; i++) {
            var geoCoord = geoCoordMap[data[i].name];
            if (geoCoord) {
                res.push({
                    name: data[i].name,
                    value: geoCoord.concat(data[i].value)
                });
            }
        }
        return res;
    };
    
    option = {
        backgroundColor: '#eeeeee',
        
        tooltip: {
            trigger: 'item',
            formatter: function (params) {
                return params.name + ' : ' + params.value[2] +' 所学校';
            }
        },
        visualMap: {
            min: 0,
            max: 10,
            calculable: false,
            inRange: {
                color: ['#ffff00', '#ff6600', '#ff3300']
            },
            textStyle: {
                color: '#fff'
            }
        },
        geo: {
            map: 'china',
            label: {
                emphasis: {
                    show: false
                }
            },
            itemStyle: {
                normal: {
                    areaColor: '#0099CC',
                    borderColor: '#CFECFF'
                },
                emphasis: {
                    areaColor: '#009999'
                }
            }
        },
        series: [
            {
                name: '支撑服务校(单位)',
                type: 'scatter',
                coordinateSystem: 'geo',
				data: convertData(<?php echo ($proschdata); ?>),
                symbolSize: 12,
                label: {
                    normal: {
                        show: false
                    },
                    emphasis: {
                        show: false
                    }
                },
                itemStyle: {
                    emphasis: {
                        borderColor: '#fff',
                        borderWidth: 1
                    }
                }
            }
        ]
    };
    if (option && typeof option === "object") {
        myChart.setOption(option, true);
    }
    
    $(".txtMarquee-top").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:14,interTime:50,trigger:"click"});
    jQuery(".slideBox").slide({mainCell:".bd ul",autoPlay:true});
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
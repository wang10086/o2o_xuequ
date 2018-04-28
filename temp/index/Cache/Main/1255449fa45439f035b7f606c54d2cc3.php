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
                您所在的位置：<a href="index.html">首页</a>  <span>&gt;</span> <a href="<?php echo U('Pro/index');?>">专家讲座</a> <span>&gt;</span> <a href="javascript:;"><?php echo ($row["title"]); ?></a>
            </div>
            
            
            <div class="content">
            
            
                <div class="artdetail">
                
                    <div class="dtitle mt20"><h2>专家简介</h2></div>
                    
                    <div class="expert_lec">
                    	<img src="<?php echo thumb($row['pic'],180,240);?>">
                        <div class="expdesc">
                        	<h2><?php echo ($row["title"]); ?></h2>
                            <?php echo ($row["content"]); ?>
                        </div>
                    </div>
                    
                    
                    <div class="dtitle"><h2>相关讲座</h2></div>
                    
                    <div class="lecture">
                        <ul>
                        	<?php if(is_array($lec)): foreach($lec as $k=>$v): ?><li>
                                <input type="hidden" name="">
                                <input type="hidden" name="id" value="$v['id']">
                                <h3><a href="#"><?php echo ($v["title"]); ?></a></h3>
                                <div class="nr">
                                	<!--
                                    <img src="<?php echo thumb($v['pic'],280,180);?>">
                                    -->
                                    <p style="width:100%;"><?php echo strip_tags($v['content']);?></p>
                                </div>
                                <div class="tagboosk">

                                    <div class="tags">
                                        <?php if($v['city'] != null): ?><span><?php echo ($v["city"]); ?></span><?php endif; ?>
                                        <?php if($v['fields'] != null): ?><span><?php echo ($v["fields"]); ?></span><?php endif; ?>
                                        <?php if($v['fit'] != null): ?><span><?php echo ($v["fit"]); ?></span><?php endif; ?>
                                        <?php if($v['keywords'] != null): if(is_array($v['keywords'])): foreach($v['keywords'] as $key=>$vo): if($vo != ''): ?><span><?php echo ($vo); ?></span><?php endif; endforeach; endif; endif; ?>
                                    </div>

                                    <!--<a href="<?php echo U('Member/book_lecture',array('id'=>$v['id']));?>" class="more">马上预约</a>-->
                                    <a href="javascript:;" onclick="check_app(<?php echo ($v['id']); ?>)" class="more">马上预约</a>
                                </div>
                            </li><?php endforeach; endif; ?>
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
        //验证用户是否是支撑服务校用户
        function check_app(id){
            var host = window.location.host;
            var con;
            $.ajax({
                type:'post',
                url:"<?php echo U('pro/check_apply');?>",
                data:{id:id},
                success:function(msg){
                    if(msg == 0){
                        con=confirm("只有支撑服务校用户才能预约课程,请先注册登录!");
                        if(con==true){
                            window.location.href="<?php echo U('Login/check_login');?>";
                        }
                        return;
                    }else if(msg == 1){
                        con=confirm("只有支撑服务校用户才能预约课程,请先申请支撑服务校!");
                        if(con==true){
                            window.location.href="<?php echo U('Member/apply_service');?>";
                        }
                        return;
                    }else if(msg == 2){
                        var url= "http://"+host+"/Member/book_lecture/id/"+id+".html";
                        window.location.href=url;
                        return;
                    }
                }
            })
        }
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
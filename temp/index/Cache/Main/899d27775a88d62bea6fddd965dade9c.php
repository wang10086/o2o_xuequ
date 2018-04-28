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
            
            <div class="content mt20 pb20 lx_cont">
                <h1 class="lx_title"><?php echo ($row["title"]); ?></h1>
                <div class="lx_top">
                    <div class="lxleft">
                    <!--轮播图 start-->
                    <div class="htmleaf-content bgcolor-3">
                        <ul class="pgwSlideshow">
                            <?php if($pics != null): if(is_array($pics)): foreach($pics as $key=>$v): ?><li><img src="/<?php echo ($v); ?>" alt=""></li><?php endforeach; endif; ?>
                                <?php else: ?>
                                <li><img src="/index/assets/images/11.jpg" alt="" data-large-src="/index/assets/images/11.jpg"></li>
                                <li><img src="/index/assets/images/12.jpg" alt=""></li>
                                <li><img src="/index/assets/images/13.jpg" alt=""></li>
                                <li><img src="/index/assets/images/14.jpg" alt=""></li><?php endif; ?>
                        </ul>
                    </div>
                    <!--轮播图 end-->
                </div>

                <div class="lxright">
                	<!--<h1><?php echo ($row["title"]); ?></h1>-->
                    <!--<?php if($price['price']): ?><span class="price">&yen;<?php echo ($price["price"]); ?></span><?php endif; ?>-->
                    <?php if($row['fields']): ?><p>科教领域：<?php echo ($row["fields"]); ?> </p><?php endif; ?>
                    <?php if($row['days']): ?><p>活动天数：<?php echo ($row["days"]); ?></p><?php endif; ?>
                    <?php if($row['fit']): ?><p>适合人群：<?php echo ($row["fit"]); ?> </p><?php endif; ?>
                    <?php if($row['city']): ?><p>实施省市：<?php echo ($row["city"]); ?> </p><?php endif; ?>
                    <?php if($tags): ?><p>相关资源：</p>
                        <div class="tag">
                            <?php if(is_array($tags)): foreach($tags as $key=>$v): ?><a href="javascript:;"><?php echo ($v); ?></a><?php endforeach; endif; ?>
                        </div><?php endif; ?>

                    <!--日期-->
                    <form id="apply_info" method="post" action="<?php echo U('Member/apply_science');?>">
                        <input type="hidden" name="id" value="<?php echo ($row['id']); ?>">
                        <input type="hidden" name="kind" value="<?php echo ($kind); ?>">
                        <input type="hidden" name="module" value="<?php echo ($row['module']); ?>">
                        <div class="booking_day">
                            <div class="selectdate">
                                <span>日期</span>
                                <input type="text" name="date" id="date" class="inputdate">
                                <a class="tra_but" href="javascript:;" onClick="joinshopcart(<?php echo ($row['id']); ?>)">预定</a>
                                <a href="javascript:;" onclick="showmsg('研学旅行','（工作日：周一至周五 9：00—18：00）<br><br>联系电话：010-62571432<br>联系人：王丹')"><div class="centmoremax">咨询</div></a>
                            </div>
                        </div>
                    </form>
                </div>

                <?php if(($cities != null) or ($cities != '')): ?><div class="booking_gy">
                        <div class="lx_gy">课程概要 &nbsp;:&nbsp; </div>
                        <?php if(is_array($days)): foreach($days as $k=>$v): if($v['citys'] != null): ?><div class="lx_day"><span>D<?php echo ($k+1); ?> </span><span class="lx_detail"><?php echo ($v["citys"]); ?></span></div><?php endif; endforeach; endif; ?>
                    </div><?php endif; ?>

                <?php if(($light != null) or ($light != '')): ?><div class="fill">
                        <div class="high_light">
                            <img src="/index/assets/images/kcts.png" >
                        </div>
                        <p class="hl_title">课程特色</p>
                        <div class="hl_content">
                            <?php if(is_array($row['lights'])): foreach($row['lights'] as $key=>$v): if($v != null): ?><p>★<?php echo ($light); ?></p><?php endif; endforeach; endif; ?>
                        </div>
                    </div><?php endif; ?>
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
                        <?php if($row['target']): ?><li class="on" onClick="goto('kechengmubiao',this)">课程目标</li><?php endif; ?>
                        <?php if($row['content']): ?><li onClick="goto('kechengneirong',this)">课程内容</li><?php endif; ?>
                        <li onClick="goto('kechenganpai',this)">课程安排</li>
                        <?php if($lession): ?><li onClick="goto('feiyongshuoming',this)">配套资料</li><?php endif; ?>
                        <?php if($row['security']): ?><li onClick="goto('anquanbaozhang',this)">安全保障</li><?php endif; ?>
                    </ul>
                </div>

                <?php if($row['target']): ?><div class="lxunit" id="kechengmubiao">
                        <h3 class="lx_dtitle">课程目标</h3>
                        <div class="conts">
                            <p class="tra_p"><?php echo nl2br($row['target']);?></p>
                        </div>
                    </div><?php endif; ?>

                <?php if($row['content']): ?><div class="lxunit" id="kechengneirong">
                        <h3 class="lx_dtitle">课程内容</h3>
                        <div class="conts">
                            <p class="tra_p"><?php echo nl2br($row['content']);?></p>
                        </div>
                    </div><?php endif; ?>

                <div class="lxunit" id="kechenganpai">
                    <h3 class="lx_dtitle">课程安排</h3>
                    <div class="mt40">
                        <table class="tab">
                            <tr class="tab_th">
                                <th class="tabl">课时</th>
                                <?php if($days_next): ?><th class="tabl">第一学期课程安排</th>
                                    <?php else: ?>
                                    <th class="tabl">课程安排</th><?php endif; ?>
                            </tr>
                            <?php if(is_array($days)): foreach($days as $k=>$v): ?><tr class="tab_tr">
                                    <!--<td class="tab_tit tabl"><?php echo ($v["citys"]); ?></td>-->
                                    <td class="tab_tit tabl"><?php echo nl2br($v['content']);?></td>
                                    <td class="tab_con tabl"><?php echo nl2br($v['remarks']);?></td>
                                </tr><?php endforeach; endif; ?>
                        </table>
                    </div>

                    <?php if($days_next): ?><div class="mt40">
                            <table class="tab">
                                <tr class="tab_th">
                                    <th class="tabl">课时</th>
                                    <th class="tabl">第二学期课程安排</th>
                                </tr>
                                <?php if(is_array($days_next)): foreach($days_next as $k=>$v): ?><tr class="tab_tr">
                                        <td class="tab_tit tabl"><?php echo ($v['content']); ?></td>
                                        <td class="tab_con tabl"><?php echo ($v['remarks']); ?></td>
                                    </tr><?php endforeach; endif; ?>
                            </table>
                        </div><?php endif; ?>

                </div>

                <?php if($lession): ?><div class="lxunit" id="feiyongshuoming">
                        <h3 class="lx_dtitle">理论课程所需材料列表</h3>
                        <div class="conts">
                            <?php if(is_array($lession)): foreach($lession as $key=>$vo): ?><img class="science_img" src="/<?php echo ($vo); ?>" ><?php endforeach; endif; ?>
                        </div>
                    </div><?php endif; ?>

                <?php if($row['cost']): ?><div class="lxunit" id="feiyongshuoming">
                        <h3 class="lx_dtitle">理论课程所需材料</h3>
                        <div class="conts">
                            <p><?php echo nl2br($row['cost']);?></p>
                        </div>
                    </div><?php endif; ?>

                <?php if($row['security']): ?><div class="lxunit" id="anquanbaozhang">
                        <h3 class="lx_dtitle">安全保障及注意事项</h3>
                        <div class="conts">
                            <p class="tra_p"><?php echo nl2br($row['security']);?></p>
                        </div>
                    </div><?php endif; ?>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.pgwSlideshow').pgwSlideshow({
                transitionEffect:'fading',
                autoSlide:true
            });
        });
    </script>
    
    <script type="text/javascript">
	laydate.render({
		elem: '.inputdate',showBottom: false,theme: '#0099CC',trigger: 'click'
	});
	$('#lxnav').stick_in_parent();
    </script>

    <script>
        //加入购物车
        function joinshopcart(id){
            var date = $('#date').val();
            //提交表单
            $.ajax({
                type: "POST",
                url: "<?php echo U('Pro/joinshopcart');?>",
                dataType:'json',
                data:{id:id,rand:parseInt(10000*Math.random())},
                success:function(data){
                    var con;
                    if(data == 0){
                        con = confirm("只有支撑服务校(单位)用户才能申请科技节,请先注册登录!");
                        if(con == true){
                            window.location.href = "<?php echo U('Login/check_login');?>";
                        }
                        return;
                    }else if (data ==1){
                        con = confirm("只有支撑服务校(单位)用户才能申请科技节,请先申请支撑服务校!");
                        if(con == true){
                            window.location.href = "<?php echo U('Member/apply_service');?>";
                        }
                        return;
                    }else{
                        if (!date){
                            alert("请选择预约时间!");
                        }else {
                            $("#apply_info").submit();
                        }
                        /*var html = '';
                        for(var o in data){
                            html += '<li>';
                            html += '<img class="img" src="'+data[o].pic+'">';
                            html += '<div class="bt">';
                            html += '<h4>'+data[o].title+'</h4>';
                            html += '</div>';
                            html += '</li>';
                        }
                        $('#mycart').html(html);*/
                    }
                }
            });

        }

        /*$(document).ready(function(e) {
         joinshopcart(0);
         });*/
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
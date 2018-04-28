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
            您所在的位置：<a href="<?php echo U('Index/home');?>">首页</a>  <span>&gt;</span> <a href="javascript:;">支撑服务项目</a>
        </div>

        <div class="content mt20">
            <div class="menu">
                <h2>支撑服务项目</h2>
                <?php if(is_array($dataA)): foreach($dataA as $key=>$vo): ?><div class="unit">
                        <?php if(in_array($vo['id'],$kind_ids)): ?><a href="javascript:;" onclick="showmsg('学校定制项目请联系','（工作日：周一至周五 9：00—18：00）<br><br>联系电话：010-62571432<br>联系人：王丹')"><h3><?php echo ($vo["title"]); ?></h3></a>
                            <?php else: ?>
                            <a href="<?php echo U('Pro/index',array('kind'=>$vo['id']));?>"><h3><?php echo ($vo["title"]); ?></h3></a><?php endif; ?>
                        <div class="morebox">
                            <ul>
                                <?php if(is_array($dataB)): foreach($dataB as $key=>$v): if($v['pid'] == $vo['id']): if(in_array($vo['id'],$kind_ids)): ?><li><a href="javascript:;" onclick="showmsg('学校定制项目请联系','（工作日：周一至周五 9：00—18：00）<br><br>联系电话：010-62571432<br>联系人：王丹')"><?php echo ($v["title"]); ?></a></li>
                                            <?php else: ?>
                                            <li><a href="<?php echo U('Pro/index',array('kind'=>$vo['id'],'type'=>$v['id']));?>"><?php echo ($v["title"]); ?></a></li><?php endif; endif; endforeach; endif; ?>
                            </ul>
                            <?php if($vo['desc']): ?><div class="tip">
                                    <?php echo ($vo["desc"]); ?>
                                </div><?php endif; ?>

                        </div>
                    </div><?php endforeach; endif; ?>
            </div>

            <!--<div class="centbox mt20 pb40">
                <a href="javascript:;" class="centmore" onClick="showmsg('学校定制项目请联系','（工作日：周一至周五 9：00—18：00）<br><br>联系电话：010-62571432<br>联系人：王丹')">我要设立定向基金项目</a>
            </div>-->

            <div class="prolist">
                <form method="get" action="<?php echo U('Pro/index');?>" name="myform">
                    <div class="jiansuo">
                        <span>科教领域：</span>
                        <select name="fields">
                            <option value="">请选择</option>
                            <?php if(is_array($resf)): foreach($resf as $key=>$v): ?><option value="<?php echo ($v); ?>" <?php if($fid==$v){ echo 'selected';} ?>><?php echo ($v); ?></option><?php endforeach; endif; ?>
                        </select>
                        &nbsp;
                        <span>实施省市：</span>
                        <select name="ss_city">
                            <option value="">请选择</option>
                            <?php if(is_array($resc)): foreach($resc as $key=>$v): ?><option value="<?php echo ($v); ?>" <?php if($fid==$v){ echo 'selected';} ?>><?php echo ($v); ?></option><?php endforeach; endif; ?>
                        </select>
                        &nbsp;
                        <span>适合人群：</span>
                        <select name="fit">
                            <option value="">请选择</option>
                            <?php if(is_array($rest)): foreach($rest as $key=>$v): ?><option value="<?php echo ($v); ?>" <?php if($fid==$v){ echo 'selected';} ?>><?php echo ($v); ?></option><?php endforeach; endif; ?>
                        </select>
                        &nbsp;
                        <span>是否公益：</span>
                        <select name="tag">
                            <option value="公益">公益</option>
                            <option value="非公益">非公益</option>
                        </select>
                        &nbsp;
                        <span>活动时长：</span>
                        <select name="days">
                            <option value="">请选择</option>
                            <?php if(is_array($resd)): foreach($resd as $key=>$v): ?><option value="<?php echo ($v); ?>" <?php if($fid==$v){ echo 'selected';} ?>><?php echo ($v); ?></option><?php endforeach; endif; ?>
                        </select>
                        &nbsp;
                        <input name="kw" type="text" class="inputtext" value="<?php echo ($kw); ?>">
                        <button id="button">GO</button>
                    </div>
                </form>

                <div class="plbox">
                    <div class="<?php echo ($style); ?>">
                        <ul>
                            <?php if(is_array($datalist)): foreach($datalist as $key=>$vo): ?><li>
                                    <h2><a href="<?php echo U($url,array('id'=>$vo['id'],'module'=>$vo['module'],'k'=>$kind));?>"><?php echo ($vo["title"]); ?></a></h2>
                                    <a href="<?php echo U($url,array('id'=>$vo['id'],'module'=>$vo['module'],'k'=>$kind));?>"><img src="<?php echo thumb($vo['pic'],105,105);?>"></a>
                                    <div class="desc">
                                        <?php if($vo["fields"] != null): ?><p>科教领域 : <?php echo ($vo["fields"]); ?></p><?php endif; ?>
                                        <?php if($vo["ss_city"] != null): ?><p>实施省市 : <?php echo ($vo["ss_city"]); ?></p><?php endif; ?>
                                        <?php if($vo["fit"] != null): ?><p>适合学段 : <?php echo ($vo["fit"]); ?></p><?php endif; ?>
                                    </div>
                                    <?php if($kind == 35): ?><a href="javascript:;" onClick="joinshopcart(<?php echo ($vo['id']); ?>)" class="more">加入我的科技节</a>
                                        <?php else: ?>
                                        <a href="<?php echo U($url,array('id'=>$vo['id'],'module'=>$vo['module'],'k'=>$kind));?>" class="more">了解详情</a><?php endif; ?>
                                </li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                    <div class="pagestyle">
                        <?php echo ($pages); ?>
                    </div>
                </div>

                <div class="prorbox">


                    <?php if($kind == 35): ?><div class="unrel">
                            <div class="reltit">
                                <h2>我的科技节</h2>
                            </div>
                            <div class="cart">
                                <ul id="mycart">

                                </ul>
                                <a href="<?php echo U('Member/cart');?>" class="joincart">我的科技节</a>
                            </div>
                        </div>
                        <?php else: ?>

                        <div class="unrel mt20" style="margin-top: 0">
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
                                <h2>热门资源</h2>
                            </div>
                            <div class="cont">
                                <ul>
                                    <?php if(is_array($data_z)): foreach($data_z as $key=>$v): ?><li><a href="<?php echo U('Resource/ziyuan_detail',array('id'=>$v['id'],'col'=>$v['col']));?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="unrel" style="margin-top: 20px;">
                            <div class="reltit">
                                <h2>热门专家</h2>
                            </div>
                            <div class="pro_cont">
                                <div class=" pro_exphot">
                                    <ul>
                                        <?php if(is_array($data_x)): foreach($data_x as $key=>$v): ?><li><a href="<?php echo U('Pro/lecture',array('id'=>$v['id']));?>"><img src="<?php echo thumb($v['pic'],105,105);?>"><p><?php echo ($v["title"]); ?></p></a></li><?php endforeach; endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div><?php endif; ?>
                </div>

            </div>



        </div>


    </div>
</div>

<!--<script>
	//加入购物车
	function joinshopcart(id){
		//提交表单
		$.ajax({
		   type: "POST",
		   url: "<?php echo U('Pro/joinshopcart');?>",
		   dataType:'json', 
		   data:{id:id,rand:parseInt(10000*Math.random())},
		   success:function(data){
			   var html = '';
			   for(var o in data){
				   html += '<li>';
				   html += '<img class="img" src="'+data[o].pic+'">';
				   html += '<div class="bt">';
                   html += '<h4>'+data[o].title+'</h4>';
                   html += '<span>&yen;'+data[o].price+'</span>';
                   html += '</div>';
                   html += '</li>';
			   }
			   $('#mycart').html(html);  
		   }
		});
				
	}
	
	$(document).ready(function(e) {
        joinshopcart(0);
    });
</script>-->
<!--下面正常的-->
<!--<script>
    //加入购物车
    function joinshopcart(id){
        //提交表单
        $.ajax({
            type: "POST",
            url: "<?php echo U('Pro/joinshopcart');?>",
            dataType:'json',
            data:{id:id,rand:parseInt(10000*Math.random())},
            success:function(data){
                var html = '';
                for(var o in data){
                    html += '<li>';
                    html += '<img class="img" src="'+data[o].pic+'">';
                    html += '<div class="bt">';
                    html += '<h4>'+data[o].title+'</h4>';
                    html += '</div>';
                    html += '</li>';
                }
                $('#mycart').html(html);
            }
        });

    }

    $(document).ready(function(e) {
        joinshopcart(0);
    });
</script>-->

<script>
    //加入购物车
    function joinshopcart(id){
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
                    var html = '';
                     for(var o in data){
                     html += '<li>';
                     html += '<img class="img" src="'+data[o].pic+'">';
                     html += '<div class="bt">';
                     html += '<h4>'+data[o].title+'</h4>';
                     html += '</div>';
                     html += '</li>';
                     }
                     $('#mycart').html(html);
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
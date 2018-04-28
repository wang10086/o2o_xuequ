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




    
    <div class="unbox">
        <div class="content">
            
            <div class="crumbs">
                您所在的位置：<a href="index.html">首页</a>  <span>&gt;</span> <a href="<?php echo U('Pro/index',array('kind'=>35));?>">科技节</a> <span>&gt;</span> <a href="javascript:;">我的购物车</a>
            </div>
            
            
            <div class="content">
            
            
                <div class="artdetail">
                <div class="shoplist">
                <table width="100%" rules="none" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <th width="600">课题名称</th>
                        <th width="100">数量</th>
                        <!--<th width="100">价格</th>-->
                        <th width="50">删除</th>
                    </tr>
                    <?php if(is_array($shoplist)): foreach($shoplist as $key=>$row): ?><tr>
                        <td>
                            <a href="<?php echo U('Pro/sci',array('id'=>$row['id']));?>"><img class="img" src="<?php echo ($row["pic"]); ?>"></a>
                            <a href="<?php echo U('Pro/sci',array('id'=>$row['id']));?>"><h4><?php echo ($row["title"]); ?></h4></a>
                        </td>
                        <td>1</td>
                        <!--<td>&yen;<?php echo ($row["price"]); ?></td>-->
                        <td><a href="javascript:;" onClick="removecart(<?php echo ($row["id"]); ?>,this)">删除</a></td>
                    </tr><?php endforeach; endif; ?>
                    <tr>
                        <th>合计</th>
                        <th><?php echo ($count); ?></th>
                        <!--<th>&yen;0.00</th>-->
                        <th></th>
                    </tr>
                </table>
                </div>
                    
                    <!--
                    <div class="dtitle"><h2>预定信息</h2></div>
                    -->
                <form id="save_sci" action="<?php echo U('Member/cart');?>" method="post" >
                    <input type="hidden" name="dosubmint" value="1">
                <div class="cartbooking">
                    <div class="booking">
                        <div>
                            <label>听课对象</label>
                            <input type="text" name="listener">
                        </div>
                    <label style="margin-left: 30px;">活动时间</label><input type="text" name="sci_time" id="sci_time" class="inputdate">
                    </div>
                    <!--<input type="submit" class="submint" value="立即预订">-->
                    <a href="javascript:;" onclick="save_sci()" class="submint">立即预订</a>
                </div>
                </form>
                    
                    
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
        
    <script>
    //删除
	function removecart(id,obj){
		//提交表单
		$.ajax({
		   type: "POST",
		   url: "<?php echo U('Pro/joinshopcart');?>",
		   dataType:'json', 
		   data:{id:id,type:1,rand:parseInt(10000*Math.random())},
		   success:function(data){
			   $(obj).parent().parent().remove();
		   }
		});
				
	}
	laydate.render({
		elem: '.inputdate',showBottom: false,theme: '#0099CC',trigger: 'click'
	});

    //保存购物车到数据库
    function save_sci(){
        var sci_time = document.getElementById("sci_time").value;
        if(!sci_time){
            alert("预约科技节时间不能为空！");
        }else{
            document.getElementById("save_sci").submit();
        }

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
</div>


</body>
</html>
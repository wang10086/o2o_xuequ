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
                您所在的位置：<a href="<?php echo U('Index/home');?>">首页</a>  <span>&gt;</span> <a href="javascript:;">个人中心</a>
            </div>
            
            
            <div class="content">
            
            
                <div class="artdetail">

                    <?php if($lecture): ?><div class="dtitle"><h2>预约讲座记录</h2></div>
                        <div class="booklist">
                            <table width="100%" rules="none" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th width="400">讲座/关键字</th>
                                    <th width="90">专家</th>
                                    <th width="110">审核状态</th>
                                    <th width="150">预约时间</th>
                                </tr>
                                <?php if(is_array($lecture)): foreach($lecture as $key=>$row): ?><tr>
                                        <?php if($row['type'] == 1): ?><td>
                                                <a href="<?php echo U('Pro/lecture',array('id'=>$row['res_id']));?>"><img class="img" src="<?php echo thumb($row['pic'],180,180);?>"></a>
                                                <a href="<?php echo U('Pro/lecture',array('id'=>$row['res_id']));?>"><h4><?php echo ($row["article_title"]); ?></h4></a>
                                            </td>
                                            <?php else: ?>
                                            <td>
                                                <a href="javascript:;"><h4><?php echo ($row["vague_keywords"]); ?></h4></a>
                                            </td><?php endif; ?>

                                        <td><?php echo ($row["exp"]); ?></td>
                                        <td><?php echo ($status[$row['status']]); ?></td>
                                        <td><?php echo ($row["in_day"]); ?></td>
                                    </tr><?php endforeach; endif; ?>
                            </table>
                        </div><?php endif; ?>

                    <div class="dtitle mt20"><h2>服务校申请记录</h2></div>
                    <div class="booklist">
                    <table width="100%" rules="none" border="0" cellpadding="0" cellspacing="0">
                    	<tr>
                        	<th width="400">学校名称</th>
                            <th width="150">联系人</th>
                            <th width="180">审核状态</th>
                            <th width="260">申请时间</th>
                            <?php if($service and (($sta == 0) or ($sta == 2))): ?><th width="50">操作</th><?php endif; ?>
                        </tr>
                        <tr>
                        	<td><h4><?php echo ($service["school_name"]); ?></h4></td>
                            <td><?php echo ($service["contacts_name"]); ?></td>
                            <td><?php echo ($v_status[$service['status']]); ?></td>
                            <td><?php if($service['apply_time']): echo (date('Y-m-d H:i:s',$service["apply_time"])); endif; ?> </td>
                            <?php if($service and (($service['status'] == 0) or ($service['status'] == 2))): ?><td><a class="apply_edit" href="<?php echo U('Member/apply_service_edit',array('id'=>$service['id']));?>">修改</a></td><?php endif; ?>
                        </tr>
                    </table>
                    </div>

                    <?php if($scis): ?><div class="dtitle mt20"><h2>科技节预约记录</h2></div>
                        <div class="booklist">
                            <table width="100%" rules="none" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th width="400">科技节名称</th>
                                    <th width="150">联系人</th>
                                    <th width="150">审核状态</th>
                                    <th width="260">科技节时间</th>
                                </tr>
                                <?php if(is_array($scis)): foreach($scis as $key=>$sci): ?><tr>
                                        <td><h4><?php echo ($sci["sci_tit"]); ?></h4></td>
                                        <td><?php echo ($sci["call_man"]); ?></td>
                                        <td><?php echo ($status[$sci['status']]); ?></td>
                                        <td><?php echo (date('Y-m-d',$sci["in_day"])); ?></td>
                                    </tr><?php endforeach; endif; ?>
                            </table>
                        </div><?php endif; ?>

                    <?php if($tra_lessions): ?><div class="dtitle mt20"><h2>研学旅行/科学课程预约记录</h2></div>
                        <div class="booklist">
                            <table width="100%" rules="none" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th width="400">研学旅行/科学课程名称</th>
                                    <th width="150">联系人</th>
                                    <th width="150">审核状态</th>
                                    <th width="260">研学/科学课程时间</th>
                                </tr>
                                <?php if(is_array($tra_lessions)): foreach($tra_lessions as $key=>$tra): ?><tr>
                                        <td><h4><?php echo ($tra["goods_title"]); ?></h4></td>
                                        <td><?php echo ($tra["call_man"]); ?></td>
                                        <td><?php echo ($status[$tra['status']]); ?></td>
                                        <td><?php echo (date('Y-m-d',$tra["in_day"])); ?></td>
                                    </tr><?php endforeach; endif; ?>
                            </table>
                        </div><?php endif; ?>

                    <div class="dtitle mt20"><h2>相关文件下载</h2></div>

                    <div class="downloadlist">
                        <ul>
                            <!--<?php if($id != null): ?><li><i class="pdf"></i><a href="<?php echo U('Member/download_pdf',array('id' => $id));?>" target="_blank">下载我的支撑服务校申请表</a><span>263KB</span></li>
                                <?php else: ?>
                                <li><i class="pdf"></i>
                                    <a href="javascript:;" class="centmore" onClick="showmsg('下载我的支撑服务校申请表','<br />您没有待审核的支撑服务校信息')">下载我的支撑服务校申请表</a>
                                </li><?php endif; ?>-->
                            <li><i class="pdf"></i><a href="<?php echo U('Member/download_pdf',array('id' => $id));?>" target="_blank">下载我的支撑服务校(单位)申请表</a><span>263KB</span></li>
                        </ul>
                    </div>
                    

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
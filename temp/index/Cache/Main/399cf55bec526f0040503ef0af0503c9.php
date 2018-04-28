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
    <div class="content ovhid">

        <div class="crumbs">
            您所在的位置：<a href="<?php echo U('Index/home');?>">首页</a>  <span>&gt;</span> <a href="<?php echo U('Pro/index');?>">支撑服务项目</a><span>&gt;</span> <a href="#">预约</a>
        </div>
        
        <h1 id="title" style="font-size:26px; font-weight:200;"><?php echo ($data["title"]); ?></h1>
        
        <form class="applyform" action="<?php echo U('Member/book_lecture');?>">
        	<input type="hidden" name="info[article_id]" value="<?php echo ($data["id"]); ?>">
            <input type="hidden" name="info[article_title]" value="<?php echo ($data["title"]); ?>">
            <input type="hidden" name="info[res_id]" value="<?php echo ($data["expert_id"]); ?>">
            <input type="hidden" name="info[type]" value="<?php echo ($type); ?>">
            <input type="hidden" name="dosubmint" value="1">
        	
            <div class="unfrom gbg">
                <h2>预约提示</h2>
                <div class="tip">
                <p>一、关于本表：本表是双方安排讲课的依据。</p>
                <p>二、行程变动：邀请方或受邀请方若有行程变动，需及时与对方进行沟通，协商解决。</p>
                <p>三、演讲场地： 讲课场地需有多媒体设备。最好安排在中小型阶梯教室，不宜用操场、体育馆等大型场所。</p>
                <p>四、听众组织：相同年龄段或相近知识水平听众集中听讲效果较好，避免中、小学生同堂听讲。</p>
                <p>五、交通食宿：北京地区单位需派车接送演讲专家。如果派车有困难，建议使用网络约车接送服务。如果需要使用出租车，请报销出租车费，并请准确告知演讲专家讲课地址，方便告知出租车司机使用导航设备寻找目的地。</p>
                </div>
                <h2 style="margin-top:40px;">填写预订信息</h2>
                <ul>
                    <li>
                        <label>申请单位</label>
                        <input type="text" name="info[yq_name]"  datatype="s2-20" nullmsg="请输入邀请单位" errormsg="格式输入有误" value="<?php echo ($info['school_name']); ?>" placeholder="请输入邀请单位" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>负责人</label>
                        <input type="text" name="info[manager_name]" datatype="s2-20" nullmsg="请输入负责人姓名" errormsg="名字格式输入有误" value="<?php echo ($info['school_master']); ?>" placeholder="请输入负责人姓名">
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>联系人</label>
                        <input type="text" name="info[call_man]" datatype="s2-20" nullmsg="请输入联系人姓名" errormsg="名字格式输入有误" value="<?php echo ($info['contacts_name']); ?>" placeholder="请输入联系人姓名">
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>联系电话</label>
                        <input type="text" name="info[tel_num]" datatype="*7-20" nullmsg="请输入联系电话" errormsg="电话号码格式输入有误" value="<?php echo ($info['contacts_mobile']); ?>" placeholder="请输入联系电话">
                    </li>
                    <li>
                        <label>电子邮箱/微信</label>
                        <input type="text" name="info[e_mail]" nullmsg="请输入电子邮箱" errormsg="邮箱格式输入有误" value="<?php echo ($info['contacts_email']); ?>" placeholder="请输入电子邮箱">
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>讲课地点</label>
                        <input type="text" name="info[show_addr]" datatype="s2-30" nullmsg="请输入讲课地点" errormsg="请输入2-30位字符" value="<?php echo ($info['school_addr']); ?>" placeholder="请输入讲课地点">
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>听课对象</label>
                        <input type="text" name="info[listener]" datatype="s2-30" nullmsg="请输入听课对象" errormsg="请输入2-30位字符" placeholder="请输入听课对象">
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>讲课时间</label>
                        <input type="text" name="info[in_day]" class="inputdate" placeholder="请选择讲课时间"  datatype="*6-30" nullmsg="请选择讲课时间！">
                        <span class="Validform_checktip"></span>
                    </li>

                    <?php if($nid == 100): ?><li>
                            <input type="hidden" name="info[type]" value="0">
                            <label>预约关键字</label>
                            <textarea id="vague" name="info[vague_keywords]" placeholder="请输入预约关键词,例如'地球与空间科学','物理与工程'等" nullmsg="请输入关键词!"></textarea>
                            <span class="Validform_checktip"></span>
                        </li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li><?php endif; ?>
                    
                </ul>
            </div>
            
            
            <div class="unfrom">
                <a href="javascript:;" class="submint">提交申请</a>
            </div>
            
                
        </form>

    </div>
</div>

<script type="text/javascript">
	$(function(){			   
		$(".applyform").Validform({
			tiptype:function(msg,o,cssctl){
				if(!o.obj.is("form")){
					var objtip=o.obj.siblings(".Validform_checktip");
					cssctl(objtip,o.type);
					objtip.text(msg);
				}
			},
			btnSubmit : ".submint",
			ajaxPost:true,
			callback:function(data){
				var obj = eval(data);  
				if(obj.status == 'y'){
					showmsg('提示',data.info); 
					setTimeout("window.location.href='<?php echo U('Member/index');?>'",3000); 
				}else{
					showmsg('提示',data.info); 
				}
			}
		});
	});
	
	
	

	laydate.render({
		elem: '.inputdate',theme: '#0099CC',type: 'datetime'
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
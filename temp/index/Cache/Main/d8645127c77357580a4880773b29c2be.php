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
            您所在的位置：<a href="<?php echo U('Index/home');?>">首页</a>  <span>&gt;</span> <a href="<?php echo U('Zhicheng/zhicheng');?>">支撑服务校建设</a><span>&gt;</span> <a href="#">支撑服务校申请</a>
        </div>
        
        <h1 id="title" style="font-size:26px; font-weight:200;">中国科学院科学教育联盟支撑服务校申请表</h1>

            <form class="applyform" action="<?php echo U('Member/apply_service');?>">
        	<input type="hidden" name="dosubmint" value="1">
        	<input type="hidden" name="aid" value="<?php echo ($row["id"]); ?>">
        	<input type="hidden" name="nid" value="<?php echo ($nid); ?>">
            <div class="unfrom gbg">
                <h2>基本信息</h2>
                <ul>
                    <li>
                        <label>学校名称</label>
                        <input type="text" name="info[school_name]" placeholder="请输入学校名称" datatype="s4-20" nullmsg="请输入学校名称！" value="<?php echo ($row["school_name"]); ?>" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>校长姓名</label>
                        <input type="text" name="info[school_master]" placeholder="请输入校长姓名" datatype="s2-20" nullmsg="请输入校长姓名！" value="<?php echo ($row["school_master"]); ?>"  class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>学校网站</label>
                        <input type="text" name="info[school_web]" placeholder="http://"  value="<?php echo ($row["school_web"]); ?>"  class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>微信公众号</label>
                        <input type="text" name="info[wechat_num]" value="<?php echo ($row["wechat_num"]); ?>"  placeholder="请输入微信公众号" class="fromval" >
                    </li>
                    <li>
                        <label>所在省份</label>
                        <select name="info[province]" class="fromval" >
                        	<?php if(is_array($provincelist)): foreach($provincelist as $k=>$v): ?><option value="<?php echo ($k); ?>" <?php if($row['province']==$k){ echo 'selected';} ?>><?php echo ($k); ?></option><?php endforeach; endif; ?>
                        </select>
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>学校地址</label>
                        <input type="text" name="info[school_addr]"  value="<?php echo ($row["school_addr"]); ?>"  placeholder="请输入学校地址"  datatype="s6-30" nullmsg="请输入学校地址！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                </ul>
            </div>
            <div class="unfrom">
                <h2>科技教育负责人(主管校长或主任)</h2>
                <ul>
                    <li>
                        <label>姓名</label>
                        <input type="text" name="info[manager_name]"  value="<?php echo ($row["manager_name"]); ?>"  placeholder="请输入负责人姓名" datatype="s2-20" nullmsg="请输入负责人姓名！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                		<label>性别</label>
                    	<input type="radio" value="男" name="manager_sex" id="male" class="pr1"  datatype="*" <?php if($row['manager_sex']=='男'){ echo 'checked';} ?>>
                        <span>男</span> 
                        <input type="radio" value="女" name="manager_sex" id="female" class="pr1" <?php if($row['manager_sex']=='女'){ echo 'checked';} ?>>
                        <span>女</span>
                		<span class="Validform_checktip"></span>
                	</li>
                    <li>
                        <label>职务</label>
                        <input type="text" name="info[manager_job]" value="<?php echo ($row["manager_job"]); ?>"  placeholder="请输入负责人职务" datatype="s2-12" nullmsg="请输入负责人职务！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>办公电话</label>
                        <input type="text" name="info[tel_num]" value="<?php echo ($row["tel_num"]); ?>" placeholder="请输入办公电话" datatype="*7-20" nullmsg="请输入负责人办公电话！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>手机</label>
                        <input type="text" name="info[mobile_num]" value="<?php echo ($row["mobile_num"]); ?>" placeholder="请输入手机号码" maxlength="11" datatype="m" nullmsg="请输入负责人手机号码！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>邮箱/微信</label>
                        <input type="text" name="info[wechat_email]" value="<?php echo ($row["wechat_email"]); ?>"  placeholder="请输入邮箱/微信" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                </ul>
            </div>

            <div class="unfrom gbg">
                <h2>联系人</h2>
                <ul>
                    <li>
                        <label>姓名</label>
                        <input type="text" name="info[contacts_name]" value="<?php echo ($row["contacts_name"]); ?>"   placeholder="请输入联系人姓名" datatype="s2-20" nullmsg="请输入联系人姓名！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                		<label>性别</label>
                    	<input type="radio" value="男" name="contacts_sex" id="male" class="pr1" datatype="*" <?php if($row['contacts_sex']=='男'){ echo 'checked';} ?>>
                        <span>男</span> 
                        <input type="radio" value="女" name="contacts_sex" id="female" class="pr1"  <?php if($row['contacts_sex']=='女'){ echo 'checked';} ?>>
                        <span>女</span>
                		<span class="Validform_checktip"></span>
                	</li>
                    <li>
                        <label>职务</label>
                        <input type="text" name="info[contacts_job]" value="<?php echo ($row["contacts_job"]); ?>" placeholder="请输入联系人职务" datatype="s2-12" nullmsg="请输入联系人职务！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>办公电话</label>
                        <input type="text" name="info[contacts_tel]" value="<?php echo ($row["contacts_tel"]); ?>" placeholder="请输入办公电话" datatype="*7-20" nullmsg="请输入联系人办公电话！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>手机</label>
                        <input type="text" name="info[contacts_mobile]" value="<?php echo ($row["contacts_mobile"]); ?>" placeholder="请输入手机号码" maxlength="11" datatype="m" nullmsg="请输入联系人手机号码！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>邮箱/微信</label>
                        <input type="text" name="info[contacts_email]" value="<?php echo ($row["contacts_email"]); ?>" placeholder="请输入邮箱/微信" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                </ul>
            </div>
            
            <div class="unfrom">
                <h2>申报单位科学教育建设情况(必填)</h2>
                <p>(从人员.资金.科技活动.基础设施等方面说明,2000字以内)</p>
                <textarea name="info[description]" class="fromval" ><?php echo ($row["description"]); ?></textarea>
                <a href="javascript:;" class="applysave" onClick="saveFrom();">暂时保存</a>
                <a href="javascript:;" class="applysubmint">正式提交</a>
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
			btnSubmit : ".applysubmint",
			ajaxPost:true,
			callback:function(data){
				var obj = eval(data);  
				if(obj.status == 'y'){
					showmsg('提示',data.info); 
					setTimeout("window.location.href='<?php echo U('Index/zhicheng');?>'",3000); 
				}else{
					showmsg('提示',data.info); 
				}
			}
		});
		
		
		
		$('.fromval').each(function(index, element) {
            var key = $(this).attr('name');
			$(this).val($.cookie(key));
        });	
		
		$("input[name='manager_sex']").each(function(index, element) {
            var val = $(this).val();
			if(val == $.cookie('manager_sex')){
				$(this).attr('checked', 'checked');
			}
        });
		
		$("input[name='contacts_sex']").each(function(index, element) {
            var val = $(this).val();
			if(val == $.cookie('contacts_sex')){
				$(this).attr('checked', 'checked');
			}
        });
		
		/*
		$('input').mouseout(function(){
			saveFrom();
		})
		*/
		
	});
	
	function goback(){
		window.location.href="<?php echo U('Index/zhicheng');?>";
	}
	
	
	function saveFrom(){
		$('.fromval').each(function(index, element) {
            var key = $(this).attr('name');
			var value = $(this).val();
			$.cookie(key,value, { expires:30 });
        });	
		
		var manager_sex = $("input[name='manager_sex']:checked").val();
		$.cookie('manager_sex',manager_sex, { expires:30 });
		
		var contacts_sex = $("input[name='contacts_sex']:checked").val();
		$.cookie('contacts_sex',contacts_sex, { expires:30 });
		
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
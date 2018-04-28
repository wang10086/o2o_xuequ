<include file="Index:header" />

<div class="unbox">
    <div class="content ovhid">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Zhicheng/zhicheng')}">支撑服务校建设</a><span>&gt;</span> <a href="#">支撑服务校申请</a>
        </div>
        
        <h1 id="title" style="font-size:26px; font-weight:200;">中国科学院科学教育联盟支撑服务校申请表</h1>

            <form class="applyform" action="{:U('Member/apply_service')}">
        	<input type="hidden" name="dosubmint" value="1">
        	<input type="hidden" name="aid" value="{$row.id}">
        	<input type="hidden" name="nid" value="{$nid}">
            <div class="unfrom gbg">
                <h2>基本信息</h2>
                <ul>
                    <li>
                        <label>学校名称</label>
                        <input type="text" name="info[school_name]" placeholder="请输入学校名称" datatype="s4-20" nullmsg="请输入学校名称！" value="{$row.school_name}" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>校长姓名</label>
                        <input type="text" name="info[school_master]" placeholder="请输入校长姓名" datatype="s2-20" nullmsg="请输入校长姓名！" value="{$row.school_master}"  class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>学校网站</label>
                        <input type="text" name="info[school_web]" placeholder="http://"  value="{$row.school_web}"  class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>微信公众号</label>
                        <input type="text" name="info[wechat_num]" value="{$row.wechat_num}"  placeholder="请输入微信公众号" class="fromval" >
                    </li>
                    <li>
                        <label>所在省份</label>
                        <select name="info[province]" class="fromval" >
                        	<foreach name="provincelist" key="k" item="v">
                            <option value="{$k}" <?php if($row['province']==$k){ echo 'selected';} ?>>{$k}</option>
                            </foreach>
                        </select>
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>学校地址</label>
                        <input type="text" name="info[school_addr]"  value="{$row.school_addr}"  placeholder="请输入学校地址"  datatype="s6-30" nullmsg="请输入学校地址！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                </ul>
            </div>
            <div class="unfrom">
                <h2>科技教育负责人(主管校长或主任)</h2>
                <ul>
                    <li>
                        <label>姓名</label>
                        <input type="text" name="info[manager_name]"  value="{$row.manager_name}"  placeholder="请输入负责人姓名" datatype="s2-20" nullmsg="请输入负责人姓名！" class="fromval" >
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
                        <input type="text" name="info[manager_job]" value="{$row.manager_job}"  placeholder="请输入负责人职务" datatype="s2-12" nullmsg="请输入负责人职务！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>办公电话</label>
                        <input type="text" name="info[tel_num]" value="{$row.tel_num}" placeholder="请输入办公电话" datatype="*7-20" nullmsg="请输入负责人办公电话！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>手机</label>
                        <input type="text" name="info[mobile_num]" value="{$row.mobile_num}" placeholder="请输入手机号码" maxlength="11" datatype="m" nullmsg="请输入负责人手机号码！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>邮箱/微信</label>
                        <input type="text" name="info[wechat_email]" value="{$row.wechat_email}"  placeholder="请输入邮箱/微信" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                </ul>
            </div>

            <div class="unfrom gbg">
                <h2>联系人</h2>
                <ul>
                    <li>
                        <label>姓名</label>
                        <input type="text" name="info[contacts_name]" value="{$row.contacts_name}"   placeholder="请输入联系人姓名" datatype="s2-20" nullmsg="请输入联系人姓名！" class="fromval" >
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
                        <input type="text" name="info[contacts_job]" value="{$row.contacts_job}" placeholder="请输入联系人职务" datatype="s2-12" nullmsg="请输入联系人职务！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>办公电话</label>
                        <input type="text" name="info[contacts_tel]" value="{$row.contacts_tel}" placeholder="请输入办公电话" datatype="*7-20" nullmsg="请输入联系人办公电话！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>手机</label>
                        <input type="text" name="info[contacts_mobile]" value="{$row.contacts_mobile}" placeholder="请输入手机号码" maxlength="11" datatype="m" nullmsg="请输入联系人手机号码！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>邮箱/微信</label>
                        <input type="text" name="info[contacts_email]" value="{$row.contacts_email}" placeholder="请输入邮箱/微信" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                </ul>
            </div>
            
            <div class="unfrom">
                <h2>申报单位科学教育建设情况(必填)</h2>
                <p>(从人员.资金.科技活动.基础设施等方面说明,2000字以内)</p>
                <textarea name="info[description]" class="fromval" >{$row.description}</textarea>
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
					setTimeout("window.location.href='{:U('Index/zhicheng')}'",3000); 
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
		window.location.href="{:U('Index/zhicheng')}";
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

<include file="Index:footer" />

<include file="Index:header" />

<div class="unbox">
    <div class="content ovhid">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Gongyi/gongyi')}">科教公益项目</a><span>&gt;</span> <a href="#">预约公益项目</a>
        </div>
        
        <h1 id="title" style="font-size:26px; font-weight:200;">中科筑梦行动——科学家讲堂公益项目申请表</h1>

            <form class="applyform" action="{:U('Gongyi/pubLession')}">
        	<input type="hidden" name="dosubmint" value="1">
        	<input type="hidden" name="aid" value="{$row.id}">
        	<input type="hidden" name="nid" value="{$nid}">
            <div class="unfrom gbg">
                <h2>基本信息</h2>
                <ul>
                    <li>
                        <label>学校(单位)名称</label>
                        <input type="text" name="info[school_name]" placeholder="请输入学校(单位)名称" datatype="s4-20" nullmsg="请输入学校(单位)名称！" value="{$row.school_name}" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>校长姓名</label>
                        <input type="text" name="info[school_master]" placeholder="请输入校长姓名" datatype="s2-20" nullmsg="请输入校长姓名！" value="{$row.school_master}"  class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>学校(单位)网站</label>
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
                        <label>学校(单位)地址</label>
                        <input type="text" name="info[school_addr]"  value="{$row.school_addr}"  placeholder="请输入学校(单位)地址"  datatype="s4-30" nullmsg="请输入学校(单位)地址！" class="fromval" >
                        <span class="Validform_checktip"></span>
                    </li>
                </ul>
            </div>
            <div class="unfrom">
                <h2>科技教育负责人(主管、校长或主任)</h2>
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
                        <input type="text" name="info[tel_num]" value="{$row.tel_num}" placeholder="请输入办公电话" datatype="/^[^\D]{11,12}$/" nullmsg="请输入负责人办公电话！" class="fromval" >
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
                        <input type="text" name="info[contacts_tel]" value="{$row.contacts_tel}" placeholder="请输入办公电话" datatype="/^[^\D]{11,12}$/" nullmsg="请输入联系人办公电话！" class="fromval" >
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
                <h2>邀请信息</h2>
                <ul>
                    <li>
                        <label>专家姓名</label>
                        <select name="data[res_id]" class="fromval" onchange="check_res()" id="res_id"  datatype="s1-10" nullmsg="请选择专家" errormsg="请选择专家">
                            <option value="" selected disabled>请选择专家</option>
                            <foreach name="res" key="k" item="v">
                                <option value="{$k}" <?php if($row['res_id']==$k){ echo 'selected';} ?>>{$v}</option>
                            </foreach>
                        </select>
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>讲座信息</label>
                        <select  class="form-control"  name="data[article_id]" id="field" datatype="s2-50" nullmsg="请选择讲座信息" errormsg="请选择讲座信息">
                            <option value="" selected disabled>请选择讲座信息</option>
                        </select>
                        <!--<span class="Validform_checktip"></span>-->
                    </li>
                    <li>
                        <label>讲课地点</label>
                        <input type="text" name="data[show_addr]" datatype="s2-30" nullmsg="请输入讲课地点" errormsg="请输入2-30位字符" value="{$info['school_addr']}" placeholder="请输入讲课地点">
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>听课对象</label>
                        <input type="text" name="data[listener]" datatype="s2-30" nullmsg="请输入听课对象" errormsg="请输入2-30位字符" placeholder="请输入听课对象">
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>讲课时间</label>
                        <input type="text" name="data[in_day]" class="inputdate" placeholder="请选择讲课时间"  datatype="*6-30" nullmsg="请选择讲课时间！">
                        <span class="Validform_checktip"></span>
                    </li>

                    <li>
                        <input type="hidden" name="data[type]" value="0">
                        <label>预约关键字</label>
                        <input type="text" name="data[vague_keywords]" placeholder="请输入关键字信息" >
                    </li>

                </ul>
            </div>

            <div class="unfrom" style="padding-top: 0px">
                <h2>学校(单位)科学教育建设情况(必填)</h2>
                <p>(从人员.资金.科技活动.基础设施等方面说明,2000字以内)</p>
                <textarea name="info[description]" class="fromval"  required>{$row.description}</textarea>
                <!--<a href="javascript:;" class="applysave" onClick="saveFrom();">暂时保存</a>
                <a href="javascript:;" class="applysubmint">提交信息</a>-->
                <div class="centbox mt20">
                    <a href="javascript:;" class="applysubmint centmore">提交信息</a>
                </div>
            </div>
            
                
        </form>
    </div>
</div>

<script type="text/javascript">

    function check_res(){
        var id = $('#res_id').val();
        $.ajax({
            type:"POST",
            url:"{:U('Gongyi/lession')}",
            data:{id:id},
            success:function(msg){
                if(msg){
                    $("#field").empty();
                    var count = msg.length;
                    var i= 0;
                    var b="";
                    b+='<option value="" disabled selected>请选择讲座信息</option>';
                    for(i=0;i<count;i++){
                        b+="<option value='"+msg[i].id+"'>"+msg[i].title+"</option>";
                    }
                    $("#field").append(b);
                }else{
                    $("#field").empty();
                    var b='<option value="" disabled selected>暂无讲座信息</option>';
                    $("#field").append(b);
                }

            }
        })
    }
	
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
					setTimeout("window.location.href='{:U('Gongyi/gongyi')}'",3000);
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
	
	
	/*function saveFrom(){
		$('.fromval').each(function(index, element) {
            var key = $(this).attr('name');
			var value = $(this).val();
			$.cookie(key,value, { expires:30 });
        });	
		
		var manager_sex = $("input[name='manager_sex']:checked").val();
		$.cookie('manager_sex',manager_sex, { expires:30 });
		
		var contacts_sex = $("input[name='contacts_sex']:checked").val();
		$.cookie('contacts_sex',contacts_sex, { expires:30 });
		
	}*/

    /*laydate.render({
        elem: '.inputdate',theme: '#0099CC',type: 'datetime'
    });*/
    laydate.render({
        elem: '.inputdate'
        ,theme: '#0099CC'
    });
	
</script>

<include file="Index:footer" />

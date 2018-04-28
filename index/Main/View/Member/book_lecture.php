<include file="Index:header" />

<div class="unbox">
    <div class="content ovhid">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Pro/index')}">支撑服务项目</a><span>&gt;</span> <a href="#">预约</a>
        </div>
        
        <h1 id="title" style="font-size:26px; font-weight:200;">{$data.title}</h1>
        
        <form class="applyform" action="{:U('Member/book_lecture')}">
        	<input type="hidden" name="info[article_id]" value="{$data.id}">
            <input type="hidden" name="info[article_title]" value="{$data.title}">
            <input type="hidden" name="info[res_id]" value="{$data.expert_id}">
            <input type="hidden" name="info[type]" value="{$type}">
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
                        <input type="text" name="info[yq_name]"  datatype="s2-20" nullmsg="请输入邀请单位" errormsg="格式输入有误" value="{$info['school_name']}" placeholder="请输入邀请单位" >
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>负责人</label>
                        <input type="text" name="info[manager_name]" datatype="s2-20" nullmsg="请输入负责人姓名" errormsg="名字格式输入有误" value="{$info['school_master']}" placeholder="请输入负责人姓名">
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>联系人</label>
                        <input type="text" name="info[call_man]" datatype="s2-20" nullmsg="请输入联系人姓名" errormsg="名字格式输入有误" value="{$info['contacts_name']}" placeholder="请输入联系人姓名">
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>联系电话</label>
                        <input type="text" name="info[tel_num]" datatype="*7-20" nullmsg="请输入联系电话" errormsg="电话号码格式输入有误" value="{$info['contacts_mobile']}" placeholder="请输入联系电话">
                    </li>
                    <li>
                        <label>电子邮箱/微信</label>
                        <input type="text" name="info[e_mail]" nullmsg="请输入电子邮箱" errormsg="邮箱格式输入有误" value="{$info['contacts_email']}" placeholder="请输入电子邮箱">
                        <span class="Validform_checktip"></span>
                    </li>
                    <li>
                        <label>讲课地点</label>
                        <input type="text" name="info[show_addr]" datatype="s2-30" nullmsg="请输入讲课地点" errormsg="请输入2-30位字符" value="{$info['school_addr']}" placeholder="请输入讲课地点">
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

                    <if condition="$nid eq 100">
                        <li>
                            <input type="hidden" name="info[type]" value="0">
                            <label>预约关键字</label>
                            <textarea id="vague" name="info[vague_keywords]" placeholder="请输入预约关键词,例如'地球与空间科学','物理与工程'等" nullmsg="请输入关键词!"></textarea>
                            <span class="Validform_checktip"></span>
                        </li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </if>
                    
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
					setTimeout("window.location.href='{:U('Member/index')}'",3000); 
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
    
<include file="Index:footer" />

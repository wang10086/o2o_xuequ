<include file="Index:header_boot" />

<script src="__HTML__/laydate/laydate.js"></script>
<script type="text/javascript" src="__HTML__/js/Validform_v5.3.2.js"></script>

<div class="unbox">
    <div class="content ovhid">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Pro/index')}">支撑服务项目</a><span>&gt;</span> <a href="#">预约</a>
        </div>
        <h1 id="title">{$data.title}</h1>
        <form class="form-horizontal" method="post" action="{:U('Pro/yuyue_jiangzuo')}" role="form">
            <input type="hidden" name="article_id" value="{$data.id}">
            <input type="hidden" name="article_title" value="{$data.title}">
            <input type="hidden" name="dosubmint" value="1">
            <div class="yuyue_info">
                <p class="yuyue_p"></p>
                <div class="form-group col-md-6 yy_form col-sm-6">
                    <label for="yq_name" class="col-sm-4 control-label">邀请者</label>
                    <div class="col-sm-8">
                        <input type="text" name="yq_name" class="form-control" id="yq_name" datatype="s2-20" nullmsg="请输入邀请者名字" errormsg="名字格式输入有误" placeholder="请输入邀请者名字">
                        <span class="Validform_checktip"></span>
                    </div>
                </div>
                <div class="form-group col-md-6 yy_form col-sm-6">
                    <label for="manager_name" class="col-sm-4 control-label">负责人</label>
                    <div class="col-sm-8">
                        <input type="text" name="manager_name" class="form-control" id="manager_name" datatype="s2-20" nullmsg="请输入负责人姓名" errormsg="名字格式输入有误" placeholder="请输入负责人姓名">
                        <span class="Validform_checktip"></span>
                    </div>
                </div>
                <div class="form-group col-md-4 yy_form col-sm-4">
                    <label for="call_man" class="col-md-6 control-label">联系人</label>
                    <div class="col-sm-6">
                        <input type="text" name="call_man" class="form-control" id="call_man" datatype="s2-20" nullmsg="请输入联系人姓名" errormsg="名字格式输入有误" placeholder="请输入联系人姓名">
                        <span class="Validform_checktip"></span>
                    </div>
                </div>
                <div class="form-group col-md-4 yy_form">
                    <label for="tel_num" class="col-md-5 control-label">联系电话</label>
                    <div class="col-sm-7">
                        <input type="text" name="tel_num" class="form-control" id="tel_num" datatype="*7-20" nullmsg="请输入联系电话" errormsg="电话号码格式输入有误" placeholder="请输入联系电话">
                        <span class="Validform_checktip"></span>
                    </div>
                </div>
                <div class="form-group col-md-4 yy_form">
                    <label for="e_mail" class="col-md-4 control-label">电子邮箱</label>
                    <div class="col-sm-8">
                        <input type="text" name="e_mail" class="form-control" id="e_mail" nullmsg="请输入电子邮箱" errormsg="邮箱格式输入有误" placeholder="请输入电子邮箱">
                        <span class="Validform_checktip"></span>
                    </div>
                </div>
                <div class="form-group col-md-6 yy_form">
                    <label for="show_addr" class="col-md-4 control-label">讲课地点</label>
                    <div class="col-sm-8">
                        <input type="text" name="show_addr" class="form-control" id="show_addr" datatype="s2-30" nullmsg="请输入讲课地点" errormsg="请输入2-30位字符" placeholder="请输入讲课地点">
                        <span class="Validform_checktip"></span>
                    </div>
                </div>
                <div class="form-group col-md-6 yy_form">
                    <label for="listener" class="col-md-4 control-label">听课对象</label>
                    <div class="col-sm-8">
                        <input type="text" name="listener" class="form-control" id="listener" datatype="s2-30" nullmsg="请输入听课对象" errormsg="请输入2-30位字符" placeholder="请输入听课对象">
                        <span class="Validform_checktip"></span>
                    </div>
                </div>
                <div class="form-group col-md-6 yy_form">
                    <label for="in_day" class="col-md-4 control-label">预计讲课日期</label>
                    <div class="col-sm-8">
                        <input type="text" name="in_day" class="form-control" id="in_day"  nullmsg="请选择日期" placeholder="请选择日期">
                        <span class="Validform_checktip"></span>
                    </div>
                </div>
                <div class="form-group col-md-6 yy_form">
                    <label for="in_time" class="col-md-4 control-label">预计讲课时间</label>
                    <div class="col-sm-8">
                        <input type="text" name="in_time" class="form-control" id="in_time" nullmsg="请选择讲课时间" placeholder="请选择讲课时间">
                        <span class="Validform_checktip"></span>
                    </div>
                </div>

                <div class="btn-group btn-group-justified button" role="group">
                    <button type="submit" class=" btn btn-primary btn-default">提&nbsp;交&nbsp;申&nbsp;请</button>
                </div>
            </div>

        </form>

    </div>
</div>



<script>
    //执行一个laydate实例//日期范围
    //自定义颜色
    laydate.render({
        elem: '#in_day'
        ,theme: '#0099cc'
    });
    //时间范围
    laydate.render({
        elem: '#in_time'
        ,type: 'time'
        ,theme: '#0099cc'
        ,range: true
    });
</script>

<script type="text/javascript">
    $(function(){
        $(".form-horizontal").Validform({
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
                    setTimeout("window.location.href='{:U('Pro/index')}'",3000);
                }else{
                    showmsg('提示',data.info);
                }
            }
        });
    });

    function goback(){
        window.location.href="{:U('Pro/index')}";
    }

</script>

<include file="Index:footer" />

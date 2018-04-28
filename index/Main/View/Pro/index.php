<include file="Index:header" />

<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="javascript:;">支撑服务项目</a>
        </div>

        <div class="content mt20">
            <div class="menu">
                <h2>支撑服务项目</h2>
                <foreach name="dataA" item="vo">
                    <div class="unit">
                        <if condition="in_array($vo['id'],$kind_ids)">
                            <a href="javascript:;" onclick="showmsg('学校定制项目请联系','（工作日：周一至周五 9：00—18：00）<br><br>联系电话：010-62571432<br>联系人：王丹')"><h3>{$vo.title}</h3></a>
                            <else />
                            <a href="{:U('Pro/index',array('kind'=>$vo['id']))}"><h3>{$vo.title}</h3></a>
                        </if>
                        <div class="morebox">
                            <ul>
                                <foreach name ='dataB' item="v">
                                    <if condition="$v['pid'] eq $vo['id']">
                                        <if condition="in_array($vo['id'],$kind_ids)">
                                            <li><a href="javascript:;" onclick="showmsg('学校定制项目请联系','（工作日：周一至周五 9：00—18：00）<br><br>联系电话：010-62571432<br>联系人：王丹')">{$v.title}</a></li>
                                            <else />
                                            <li><a href="{:U('Pro/index',array('kind'=>$vo['id'],'type'=>$v['id']))}">{$v.title}</a></li>
                                        </if>
                                    </if>
                                </foreach>
                            </ul>
                            <if condition="$vo['desc']">
                                <div class="tip">
                                    {$vo.desc}
                                </div>
                            </if>

                        </div>
                    </div>
                </foreach>
            </div>

            <!--<div class="centbox mt20 pb40">
                <a href="javascript:;" class="centmore" onClick="showmsg('学校定制项目请联系','（工作日：周一至周五 9：00—18：00）<br><br>联系电话：010-62571432<br>联系人：王丹')">我要设立定向基金项目</a>
            </div>-->

            <div class="prolist">
                <form method="get" action="{:U('Pro/index')}" name="myform">
                    <div class="jiansuo">
                        <span>科教领域：</span>
                        <select name="fields">
                            <option value="">请选择</option>
                            <foreach name="resf" item="v">
                                <option value="{$v}" <?php if($fid==$v){ echo 'selected';} ?>>{$v}</option>
                            </foreach>
                        </select>
                        &nbsp;
                        <span>实施省市：</span>
                        <select name="ss_city">
                            <option value="">请选择</option>
                            <foreach name="resc" item="v">
                                <option value="{$v}" <?php if($fid==$v){ echo 'selected';} ?>>{$v}</option>
                            </foreach>
                        </select>
                        &nbsp;
                        <span>适合人群：</span>
                        <select name="fit">
                            <option value="">请选择</option>
                            <foreach name="rest" item="v">
                                <option value="{$v}" <?php if($fid==$v){ echo 'selected';} ?>>{$v}</option>
                            </foreach>
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
                            <foreach name="resd" item="v">
                                <option value="{$v}" <?php if($fid==$v){ echo 'selected';} ?>>{$v}</option>
                            </foreach>
                        </select>
                        &nbsp;
                        <input name="kw" type="text" class="inputtext" value="{$kw}">
                        <button id="button">GO</button>
                    </div>
                </form>

                <div class="plbox">
                    <div class="{$style}">
                        <ul>
                            <foreach name="datalist" item="vo">
                                <li>
                                    <h2><a href="{:U($url,array('id'=>$vo['id'],'module'=>$vo['module'],'k'=>$kind))}">{$vo.title}</a></h2>
                                    <a href="{:U($url,array('id'=>$vo['id'],'module'=>$vo['module'],'k'=>$kind))}"><img src="{:thumb($vo['pic'],105,105)}"></a>
                                    <div class="desc">
                                        <if condition="$vo.fields neq null">
                                            <p>科教领域 : {$vo.fields}</p>
                                        </if>
                                        <if condition="$vo.ss_city neq null">
                                            <p>实施省市 : {$vo.ss_city}</p>
                                        </if>
                                        <if condition="$vo.fit neq null">
                                            <p>适合学段 : {$vo.fit}</p>
                                        </if>
                                    </div>
                                    <if condition="$kind eq 35">
                                        <a href="javascript:;" onClick="joinshopcart({$vo['id']})" class="more">加入我的科技节</a>
                                        <else />
                                        <a href="{:U($url,array('id'=>$vo['id'],'module'=>$vo['module'],'k'=>$kind))}" class="more">了解详情</a>
                                    </if>
                                </li>
                            </foreach>
                        </ul>
                    </div>
                    <div class="pagestyle">
                        {$pages}
                    </div>
                </div>

                <div class="prorbox">


                    <if condition="$kind eq 35">
                        <div class="unrel">
                            <div class="reltit">
                                <h2>我的科技节</h2>
                            </div>
                            <div class="cart">
                                <ul id="mycart">

                                </ul>
                                <a href="{:U('Member/cart')}" class="joincart">我的科技节</a>
                            </div>
                        </div>
                        <else />

                        <div class="unrel mt20" style="margin-top: 0">
                            <div class="reltit">
                                <h2>热门活动</h2>
                            </div>
                            <div class="cont">
                                <ul>
                                    <foreach name="data_y" item="v">
                                        <li><a href="{:U('Pro/travel',array('id'=>$v['id']))}">{$v.title}</a></li>
                                    </foreach>
                                </ul>
                            </div>
                        </div>

                        <div class="unrel mt20">
                            <div class="reltit">
                                <h2>热门资源</h2>
                            </div>
                            <div class="cont">
                                <ul>
                                    <foreach name="data_z" item="v">
                                        <li><a href="{:U('Resource/ziyuan_detail',array('id'=>$v['id'],'col'=>$v['col']))}">{$v.title}</a></li>
                                    </foreach>
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
                                        <foreach name="data_x" item = 'v'>
                                            <li><a href="{:U('Pro/lecture',array('id'=>$v['id']))}"><img src="{:thumb($v['pic'],105,105)}"><p>{$v.title}</p></a></li>
                                        </foreach>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </if>
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
		   url: "{:U('Pro/joinshopcart')}",
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
            url: "{:U('Pro/joinshopcart')}",
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
            url: "{:U('Pro/joinshopcart')}",
            dataType:'json',
            data:{id:id,rand:parseInt(10000*Math.random())},
            success:function(data){
                var con;
                if(data == 0){
                    con = confirm("只有支撑服务校(单位)用户才能申请科技节,请先注册登录!");
                    if(con == true){
                        window.location.href = "{:U('Login/check_login')}";
                    }
                    return;
                }else if (data ==1){
                    con = confirm("只有支撑服务校(单位)用户才能申请科技节,请先申请支撑服务校!");
                    if(con == true){
                        window.location.href = "{:U('Member/apply_service')}";
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

<include file="Index:footer" />

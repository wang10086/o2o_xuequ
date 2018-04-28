    <include file="Index:header" />

    <!--<link rel="stylesheet" type="text/css" href="__HTML__/pic/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="__HTML__/pic/css/default.css">-->
    <link rel="stylesheet" type="text/css" href="__HTML__/pic/css/pgwslideshow.css">
    <script type="text/javascript" src="__HTML__/pic/js/pgwslideshow.min.js"></script>
    <style>



    </style>

    <div class="unbox">
    	<div class="content">
        	
            <div class="crumbs">
            	您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Pro/index')}">支撑服务项目</a> <span>&gt;</span>  <a href="javascript:;">{$row.title}</a>
            </div>
            
            <div class="content mt20 pb20 lx_cont">
                <h1 class="lx_title">{$row.title}</h1>
                <div class="lx_top">
                    <div class="lxleft">
                    <!--轮播图 start-->
                    <div class="htmleaf-content bgcolor-3">
                        <ul class="pgwSlideshow">
                            <if condition="$pics neq null">
                                <foreach name="pics" item="v">
                                    <li><img src="/{$v}" alt=""></li>
                                </foreach>
                                <else />
                                <li><img src="__HTML__/images/11.jpg" alt="" data-large-src="__HTML__/images/11.jpg"></li>
                                <li><img src="__HTML__/images/12.jpg" alt=""></li>
                                <li><img src="__HTML__/images/13.jpg" alt=""></li>
                                <li><img src="__HTML__/images/14.jpg" alt=""></li>
                            </if>
                        </ul>
                    </div>
                    <!--轮播图 end-->
                </div>

                <div class="lxright">
                	<!--<h1>{$row.title}</h1>-->
                    <!--<if condition="$price['price']"><span class="price">&yen;{$price.price}</span></if>-->
                    <if condition="$row['fields']"><p>科教领域：{$row.fields} </p></if>
                    <if condition="$row['days']"><p>活动天数：{$row.days}</p></if>
                    <if condition="$row['fit']"><p>适合人群：{$row.fit} </p></if>
                    <if condition="$row['city']"><p>实施省市：{$row.city} </p></if>
                    <if condition="$tags">
                    <p>相关资源：</p>
                        <div class="tag">
                            <foreach name="tags" item="v">
                            <a href="javascript:;">{$v}</a>
                            </foreach>
                        </div>
                    </if>

                    <!--日期-->
                    <form id="apply_info" method="post" action="{:U('Member/apply_science')}">
                        <input type="hidden" name="id" value="{$row['id']}">
                        <input type="hidden" name="kind" value="{$kind}">
                        <input type="hidden" name="module" value="{$row['module']}">
                        <div class="booking_day">
                            <div class="selectdate">
                                <span>日期</span>
                                <input type="text" name="date" id="date" class="inputdate">
                                <a class="tra_but" href="javascript:;" onClick="joinshopcart({$row['id']})">预定</a>
                                <a href="javascript:;" onclick="showmsg('研学旅行','（工作日：周一至周五 9：00—18：00）<br><br>联系电话：010-62571432<br>联系人：王丹')"><div class="centmoremax">咨询</div></a>
                            </div>
                        </div>
                    </form>
                </div>

                <if condition="($cities neq null) or ($cities neq '')">
                    <div class="booking_gy">
                        <div class="lx_gy">课程概要 &nbsp;:&nbsp; </div>
                        <foreach name="days" item="v" key="k">
                            <if condition="$v['citys'] neq null">
                                <div class="lx_day"><span>D{$k+1} </span><span class="lx_detail">{$v.citys}</span></div>
                            </if>
                        </foreach>
                    </div>
                </if>

                <if condition="($light neq null) or ($light neq '')">
                    <div class="fill">
                        <div class="high_light">
                            <img src="__HTML__/images/kcts.png" >
                        </div>
                        <p class="hl_title">课程特色</p>
                        <div class="hl_content">
                            <foreach name="row['lights']" item="v">
                                <if condition="$v neq null">
                                    <p>★{$light}</p>
                                </if>
                            </foreach>
                        </div>
                    </div>
                </if>
                </div>
            </div>

            <div class="actrbox">

                <div class="unrel">
                    <div class="reltit">
                        <h2>热门活动</h2>
                    </div>
                    <div class="cont"><ul>
                            <foreach name="data_y" item="v">
                                <li><a href="{:U('Pro/travel',array('id'=>$v['id']))}">{$v.title}</a></li>
                            </foreach>
                        </ul></div>
                </div>

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>热门资源</h2>
                    </div>
                    <div class="cont"><ul>
                            <foreach name="data_z" item="v">
                                <li><a href="{:U('Resource/ziyuan_detail',array('id'=>$v['id'],'col'=>$v['col']))}">{$v.title}</a></li>
                            </foreach>
                        </ul></div>
                </div>

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>热门专家</h2>
                    </div>
                    <div class=" exphot">
                        <ul>
                            <foreach name="data_x" item="v">
                                <li><a href="{:U('Pro/lecture',array('id'=>$v['id']))}"><img src="{:thumb($v['pic'],105,105)}"><p>{$v.title}</p></a></li>
                            </foreach>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="lxnrz">
                <div class="lxnav" id="lxnav">
                    <ul>
                        <if condition="$row['target']"><li class="on" onClick="goto('kechengmubiao',this)">课程目标</li></if>
                        <if condition="$row['content']"><li onClick="goto('kechengneirong',this)">课程内容</li></if>
                        <li onClick="goto('kechenganpai',this)">课程安排</li>
                        <if condition="$lession"><li onClick="goto('feiyongshuoming',this)">配套资料</li></if>
                        <if condition="$row['security']"><li onClick="goto('anquanbaozhang',this)">安全保障</li></if>
                    </ul>
                </div>

                <if condition="$row['target']">
                    <div class="lxunit" id="kechengmubiao">
                        <h3 class="lx_dtitle">课程目标</h3>
                        <div class="conts">
                            <p class="tra_p">{:nl2br($row['target'])}</p>
                        </div>
                    </div>
                </if>

                <if condition="$row['content']">
                    <div class="lxunit" id="kechengneirong">
                        <h3 class="lx_dtitle">课程内容</h3>
                        <div class="conts">
                            <p class="tra_p">{:nl2br($row['content'])}</p>
                        </div>
                    </div>
                </if>

                <div class="lxunit" id="kechenganpai">
                    <h3 class="lx_dtitle">课程安排</h3>
                    <div class="mt40">
                        <table class="tab">
                            <tr class="tab_th">
                                <th class="tabl">课时</th>
                                <if condition="$days_next">
                                    <th class="tabl">第一学期课程安排</th>
                                    <else />
                                    <th class="tabl">课程安排</th>
                                </if>
                            </tr>
                            <foreach name="days" item="v" key="k">
                                <tr class="tab_tr">
                                    <!--<td class="tab_tit tabl">{$v.citys}</td>-->
                                    <td class="tab_tit tabl">{:nl2br($v['content'])}</td>
                                    <td class="tab_con tabl">{:nl2br($v['remarks'])}</td>
                                </tr>
                            </foreach>
                        </table>
                    </div>

                    <if condition="$days_next">
                        <div class="mt40">
                            <table class="tab">
                                <tr class="tab_th">
                                    <th class="tabl">课时</th>
                                    <th class="tabl">第二学期课程安排</th>
                                </tr>
                                <foreach name="days_next" item="v" key="k">
                                    <tr class="tab_tr">
                                        <td class="tab_tit tabl">{$v['content']}</td>
                                        <td class="tab_con tabl">{$v['remarks']}</td>
                                    </tr>
                                </foreach>
                            </table>
                        </div>
                    </if>

                </div>

                <if condition="$lession">
                    <div class="lxunit" id="feiyongshuoming">
                        <h3 class="lx_dtitle">理论课程所需材料列表</h3>
                        <div class="conts">
                            <foreach name="lession" item="vo">
                                <img class="science_img" src="/{$vo}" >
                            </foreach>
                        </div>
                    </div>
                </if>

                <if condition="$row['cost']">
                    <div class="lxunit" id="feiyongshuoming">
                        <h3 class="lx_dtitle">理论课程所需材料</h3>
                        <div class="conts">
                            <p>{:nl2br($row['cost'])}</p>
                        </div>
                    </div>
                </if>

                <if condition="$row['security']">
                    <div class="lxunit" id="anquanbaozhang">
                        <h3 class="lx_dtitle">安全保障及注意事项</h3>
                        <div class="conts">
                            <p class="tra_p">{:nl2br($row['security'])}</p>
                        </div>
                    </div>
                </if>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.pgwSlideshow').pgwSlideshow({
                transitionEffect:'fading',
                autoSlide:true
            });
        });
    </script>
    
    <script type="text/javascript">
	laydate.render({
		elem: '.inputdate',showBottom: false,theme: '#0099CC',trigger: 'click'
	});
	$('#lxnav').stick_in_parent();
    </script>

    <script>
        //加入购物车
        function joinshopcart(id){
            var date = $('#date').val();
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
                        if (!date){
                            alert("请选择预约时间!");
                        }else {
                            $("#apply_info").submit();
                        }
                        /*var html = '';
                        for(var o in data){
                            html += '<li>';
                            html += '<img class="img" src="'+data[o].pic+'">';
                            html += '<div class="bt">';
                            html += '<h4>'+data[o].title+'</h4>';
                            html += '</div>';
                            html += '</li>';
                        }
                        $('#mycart').html(html);*/
                    }
                }
            });

        }

        /*$(document).ready(function(e) {
         joinshopcart(0);
         });*/
    </script>
    
    <include file="Index:footer" />

    <include file="Index:header" />
    
    <div class="unbox">
    	<div class="content">
        	
            <div class="crumbs">
            	您所在的位置：<a href="index.html">首页</a>  <span>&gt;</span> <a href="{:U('Pro/index')}">支撑服务项目</a> <span>&gt;</span>  <a href="javascript:;">{$row.title}</a>
            </div>

            <style>
                /*.lxleft{ width:550px; height:auto !important; float:left; clear:left; padding-bottom:20px; overflow:hidden;}
                .lxleft .lxpic{ width:100%; height:auto !important; float:left; clear:both;}
                .lxleft .lxpic img{ width:550px;height:355px;}

                .lxright{ width:610px; height:auto !important; float:right; clear:right; overflow:hidden; padding-bottom:20px;}
                .lxright h1{font-weight: 400;font-style: normal;font-size: 28px; line-height:32px; float:left; clear:both; text-align:left; width:100%; margin:24px 0 20px 0;}
                .lxright .price{ width:630px; height:auto !important; float:left; clear:both; padding:10px 15px; background:#eeeeee;font-family: "微软雅黑 Bold", "微软雅黑 Regular", 微软雅黑;font-weight: 500;font-style: normal;font-size: 26px; color:#0099CC; margin-top:20px;}
                .lxright p{ padding:5px 0; line-height:18px; margin:0; font-size:14px; width:100%; float:left; clear:both;}
                .lxright p.top{ margin-top:20px;}
                .lxright .tag{ width:95%; height:auto !important; float:left; clear:both; margin:-34px 0 10px 74px; }
                .lxright .tag a{ float:left; margin:10px 10px 0 0; padding:0 10px; border:1px solid #0099CC; font-size:14px; border-radius:40px;}
                !*.lxright .booking{ width:546px; height:60px; padding:30px; float:left; clear:both; margin-top:30px; background:#fafafa; border:2px solid #0099CC;}
                .lxright .selectdate{ width:546px; height:auto !important; float:left; clear:both; margin-top:10px;}
                .lxright .selectdate span{ font-size:16px; float:left; line-height:36px; margin-right:10px;}
                .lxright .selectdate input{ width:200px; height:34px; float:left; line-height:34px; padding:0 10px; border:1px solid #dedede; background:#ffffff;outline:none;}
                .lxright .selectdate button{ width:100px; height:36px; line-height:36px; border:0; background:#0099CC; color:#ffffff; outline:none; margin-left:10px;}*!
                .lxright .booking{ width:98%; height:80px; padding:5px; font-size: 14px; float:left; clear:both; margin-top:52px; background:#fafafa; border:2px solid #0099CC;overflow:hidden;    position: relative;  top: -20px;}
                .lxright .booking .lx_gy{display:inline-block;height: 100%;float: left;}
                .lxright .booking .lx_detail{margin-right: 20px;    border: 1px solid #dedede;padding: 0 10px;}
                .lxright .booking .lx_day{display: inline-block; float: left;}

                .lxleft .booking{ width:88%; line-height:36px; padding:30px; float:left; clear:both; margin-top:50px; background:#fafafa; border:2px solid #0099CC;}
                .lxleft .selectdate{ width:510px; height:auto !important; float:left; clear:both; }
                .lxleft .selectdate span{ font-size:16px; float:left; line-height:36px; margin-right:10px;}
                .lxleft .selectdate input{ width:200px; height:34px; float:left; line-height:34px; padding:0 10px; border:1px solid #dedede; background:#ffffff;outline:none;}
                .lxleft .selectdate button{ width:100px; height:36px; line-height:36px; border:0; background:#0099CC; color:#ffffff; outline:none; margin-left:10px;}*/
            </style>
            
            <div class="content mt20 pb20">
            	
                <div class="lxleft">
                	<div class="lxpic">
                    	<img src="{:thumb($row['pic'],550,355)}">
                    </div>
                    <div class="lxdate">
                    <!--DATE-->
                    <div id="datehead">
                        <a href="javascript:;" class="but prvemonth" onClick="prevMonth()">上月</a>
                        <span class="dateInfo" onClick="thisMonth()"></span>
                        <a href="javascript:;" class="but nextmonth"  onClick="nextMonth()">下月</a>
                    </div>
                    <table id="calTable">
                        <tr>
                            <td class="day">周日</td>
                            <td class="day">周一</td>
                            <td class="day">周二</td>
                            <td class="day">周三</td>
                            <td class="day">周四</td>
                            <td class="day">周五</td>
                            <td class="day">周六</td>
                        </tr>
                        <tr>
                            <td class="calBox sun" id="calBox0"></td>
                            <td class="calBox" id="calBox1"></td>
                            <td class="calBox" id="calBox2"></td>
                            <td class="calBox" id="calBox3"></td>
                            <td class="calBox" id="calBox4"></td>
                            <td class="calBox" id="calBox5"></td>
                            <td class="calBox sat" id="calBox6"></td>
                        </tr>
                        <tr>
                            <td class="calBox sun" id="calBox7"></td>
                            <td class="calBox" id="calBox8"></td>
                            <td class="calBox" id="calBox9"></td>
                            <td class="calBox" id="calBox10"></td>
                            <td class="calBox" id="calBox11"></td>
                            <td class="calBox" id="calBox12"></td>
                            <td class="calBox sat" id="calBox13"></td>
                        </tr>
                        <tr>
                            <td class="calBox sun" id="calBox14"></td>
                            <td class="calBox" id="calBox15"></td>
                            <td class="calBox" id="calBox16"></td>
                            <td class="calBox" id="calBox17"></td>
                            <td class="calBox" id="calBox18"></td>
                            <td class="calBox" id="calBox19"></td>
                            <td class="calBox sat" id="calBox20"></td>
                        </tr>
                        <tr>
                            <td class="calBox sun" id="calBox21"></td>
                            <td class="calBox" id="calBox22"></td>
                            <td class="calBox" id="calBox23"></td>
                            <td class="calBox" id="calBox24"></td>
                            <td class="calBox" id="calBox25"></td>
                            <td class="calBox" id="calBox26"></td>
                            <td class="calBox sat" id="calBox27"></td>
                        </tr>
                        <tr>
                            <td class="calBox sun" id="calBox28"></td>
                            <td class="calBox" id="calBox29"></td>
                            <td class="calBox" id="calBox30"></td>
                            <td class="calBox" id="calBox31"></td>
                            <td class="calBox" id="calBox32"></td>
                            <td class="calBox" id="calBox33"></td>
                            <td class="calBox sat" id="calBox34"></td>
                        </tr>
                        <tr>
                            <td class="calBox sun" id="calBox35"></td>
                            <td class="calBox" id="calBox36"></td>
                            <td class="calBox" id="calBox37"></td>
                            <td class="calBox" id="calBox38"></td>
                            <td class="calBox" id="calBox39"></td>
                            <td class="calBox" id="calBox40"></td>
                            <td class="calBox sat" id="calBox41"></td>
                        </tr>
                    </table>
                    <!--DATE END-->
                    </div>
                </div>
            	
                <div class="lxright">
                	<h1>{$row.title}</h1>
                    <if condition="$price['price']"><span class="price">&yen;{$price.price}</span></if>
                    <p class="top">活动名称：{$row.title} <!--  |  <font color="#0066CC">已上课人次    29680</font> --></p>
                    <if condition="$row['quota']"><p>每班限额：{$row.quota}人</p></if>
                    <if condition="$row['end_date']"><p>活动有效期：{$row.start_date} 至 {$row.end_date} </p></if>
                    <if condition="$row['com_date']"><p>开课日期：{$row.com_date}</p></if>
                    <if condition="$row['days']"><p>活动天数：{$row.days}</p></if>
                    <if condition="$row['fit']"><p>适合学段：{$row.fit} </p></if>
                    <if condition="$tags">
                    <p>相关资源：</p>
                    <div class="tag">
                    	<foreach name="tags" item="v">
                    	<a href="javascript:;">{$v}</a>
                        </foreach>
                    </div>
                    </if>
                    <div class="booking">
                        <div class="selectdate">
                        	<span>日期</span>
                            <input type="text" class="inputdate">
                            <button>预定</button>
                        </div>
                    </div>

                    <div class="fill">
                        <div class="high_light">
                            <img src="__HTML__/images/high_lights.png" >
                        </div>
                        <p class="hl_title">产品特色详情</p>
                        <div class="hl_content">
                            <p>★让更多的青少年儿童感知科学文化的魅力!</p>
                            <p>★让更多的青少年儿童感知科学文化的魅力!</p>
                            <p>★让更多的青少年儿童感知科学文化的魅力!</p>
                            <p>★让更多的青少年儿童感知科学文化的魅力!</p>
                            <p>★让更多的青少年儿童感知科学文化的魅力!</p>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    
    
    <div class="unbox mt20">
    	<div class="content">
        
        	<div class="lxnrz">
                <div class="lxnav" id="lxnav"> 
                    <ul>
                        <li class="on" onClick="goto('kechengmubiao',this)">课程目标</li>
                        <li onClick="goto('kechengneirong',this)">课程内容</li>
                        <li onClick="goto('kechenganpai',this)">课程安排</li>
                        <li onClick="goto('feiyongshuoming',this)">配套资料</li>
                        <li onClick="goto('anquanbaozhang',this)">安全保障</li>
                    </ul>
                </div>
                
                <div class="lxunit" id="kechengmubiao"> 
                	<h3>课程目标</h3>
                    <div class="conts">
                    	<p>{:nl2br($row['target'])}</p>
                    </div>
                </div>
                
                <div class="lxunit" id="kechengneirong">
                	<h3>课程内容</h3>
                    <div class="conts">
                    	<p>{:nl2br($row['content'])}</p>
                    </div>
                </div>
                
                
                <div class="lxunit" id="kechenganpai">
                	<h3>课程安排</h3>
                    
                    <foreach name="days" item="v" key="k">
                    <div class="dayunit mt40">
                    	<div class="icon">{$k}</div>
                        <h4>{$v.citys}</h4>
                        <p>{$v.content}</p>
                        <p>{$v.remarks}</p>
                    </div>
                    </foreach>
                    
                    
                </div>
                
                <div class="lxunit" id="feiyongshuoming">
                	<h3>配套资料</h3>
                    <div class="conts">
                    	<p>{:nl2br($row['cost'])}</p>
                    </div>
                </div>
                
                
                <div class="lxunit" id="anquanbaozhang">
                	<h3>安全保障</h3>
                    <div class="conts">
                    	<p>{:nl2br($row['security'])}</p>
                    </div>
                </div>
                
            </div>


            <div class="actrbox">

                <div class="unrel mt20">
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
            
        </div>
    </div>
    
    <script type="text/javascript">
	laydate.render({
		elem: '.inputdate',showBottom: false,theme: '#0099CC',trigger: 'click'
	});
	$('#lxnav').stick_in_parent();
    </script>
        
        
    
    <include file="Index:footer" />

<include file="Index:header" />
<script src="__HTML__/laydate/laydate.js"></script>

    
    <div class="unbox">
    	<div class="content">
        	
            <div class="crumbs">
            	您所在的位置：<a href="{:U('Index/zhicheng')}">首页</a>  <span>&gt;</span> <a href="{:U(zhichengfuwuxiangmu)}">支撑服务项目</a> <span>&gt;</span>  <a href="#">科学+文化考察课程—北京营初中版</a>
            </div>
            
            
            <div class="content mt20 pb20">
                <input type="hidden" name = "goods_id" value="{$data.goods_id}">
            	
                <div class="lxleft">
                	<div class="lxpic">
                    	<img src="/{$data.pic}">
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
                	<h1>{$data.title}</h1>
                    <span class="price">&yen;{$data.price}</span>
                    <p class="top">活动名称：{$data.title}  |  <font color="#0066CC">已上课人次    29680</font></p>
                    <p>每班限额：{$data.quota}人</p>
                    <p>活动有效期：{$data.start_data} 至{$data.end_data} </p>
                    <p>活动天数：{$data.days}</p>
                    <p>适合学段：{$data.fit} </p>
                    <p>活动内容：</p>
                    <div class="tag">
                        <foreach name="tag" item="vo">
                            <a href="#">{$vo}</a>
                        </foreach>
                    </div>
                    
                    <div class="booking">
                        <div class="selectdate">
                        	<span>日期</span>
                            <input type="text" id="day" class="inputdate">
                            <button>选择日期</button>
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
                        <li onClick="goto('feiyongshuoming',this)">费用说明</li>
                        <li onClick="goto('anquanbaozhang',this)">安全保障</li>
                    </ul>
                </div>
                
                <div class="lxunit" id="kechengmubiao"> 
                	<h3>课程目标</h3>
                    <div class="conts">
                        <foreach name="target" item="v">
                            {$v} <br />
                        </foreach>
                    </div>
                </div>
                
                <div class="lxunit" id="kechengneirong">
                	<h3>课程内容</h3>
                    <div class="conts">
                    	<p>
                            <foreach name="content" item="v">
                                {$v} <br />
                            </foreach>
                        </p>
                    </div>
                </div>
                
                
                <div class="lxunit" id="kechenganpai">
                	<h3>课程安排</h3>

                    <div class="dayunit mt40">
                        <foreach name="plan" item="v">
                            {$v} <br />
                        </foreach>
                    
                </div>
                
                <div class="lxunit" id="feiyongshuoming">
                	<h3>费用说明</h3>
                    <div class="conts">
                        {$data.cost|stripslashes}
                    </div>
                </div>
                
                
                <div class="lxunit" id="anquanbaozhang">
                	<h3>安全保障</h3>
                    <div class="conts">
                    	<p>
                            <foreach name="security" item="v">
                                {$v}.<br />
                            </foreach>
                        </p>
                    </div>
                </div>
                
            </div>
            
            
            <div class="actrbox">
                	
                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>支撑服务专家</h2>
                    </div>
                    <div class="cont"></div>
                </div>
                
                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>支撑服务项目</h2>
                    </div>
                    <div class="cont"></div>
                </div>
                
                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>支撑服务案例</h2>
                    </div>
                    <div class="cont"></div>
                </div>
                
            </div>
            
        </div>
    </div>

        <script>
            //执行一个laydate实例//日期范围
            //自定义颜色
            laydate.render({
                elem: '#day'
                ,theme: '#0099cc'
            });
            /*//时间范围
            laydate.render({
                elem: '#day'
                ,type: 'time'
                ,theme: '#0099cc'
                ,range: true
            });*/
        </script>



<include file="Index:footer" />

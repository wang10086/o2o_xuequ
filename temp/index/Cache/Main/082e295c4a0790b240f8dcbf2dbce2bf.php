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





<link href="/index/assets/css/py.css?v=1.0" rel="stylesheet" type="text/css" />
<link href="/index/assets/css/artDialog.css"  type="text/css"  />
<link href="/index/assets/css/date.css" rel="stylesheet" type="text/css" />
<link href="/index/assets/css/jQueryUI/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css" />
<script src="/index/assets/js/date.js" ></script>
<script src="/index/assets/js/jquery-1.11.1.min.js"></script>
<script src="/index/assets/js/jqueryUI/jquery-ui.js" type="text/javascript"></script>
<script src="/index/assets/js/artDialog.js"></script>
<script src="/index/assets/js/iframeTools.js"></script>
<script src="/index/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/index/assets/date/app.js" type="text/javascript"></script>



        <div class="wrapper row-offcanvas row-offcanvas-left">
            

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="">
                <!-- Content Header (Page header) -->

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">

                        <style>
                            .search-zj{display: inline-block;margin-right: 20px;};
                        </style>
                       
                    </div><!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        
                        <div class="col-md-12"> 
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">专家日程安排</h3>
                                </div>
                                <div class="box-body">
                                    <!-- 日历表格 -->
                                    <table id="calTable">
                                        <tr>
                                            <td colspan="7">
                                            	 <span id="dateInfo" style="float:left"></span>
                                                <div style="float:right">
                                                    <div class="search-zj">
                                                        <input type="text" id="zj_name" class="search-input" style="width: 100px; height: 14px;">
                                                        <button class="btn btn-default btn-sm fa " onclick="getTasks()">搜索</button>
                                                    </div>
                                                <button class="btn btn-default btn-sm fa fa-caret-left"  onClick="prevMonth()">上月</button>
                                                <button class="btn btn-default btn-sm fa "  onClick="thisMonth()">本月</button>
                                                <button class="btn btn-default btn-sm fa fa-caret-right"  onClick="nextMonth()">下月</button>
                                                </div>
                                                
                                            </td>
                                        </tr>
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
                                </div>
                            </div>
                        </div>
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
        
        <div id="addtext" style="display:none">
            <form action="" method="get" id="searchform">
            <input type="hidden" name="c" value="Games">
            <input type="hidden" name="a" value="gamelist">
            <div class="form-group col-md-3">
                <input type="text" name="gameid" placeholder="表单信息" class="form-control"/>
            </div>
            <div class="form-group col-md-3">
                <input type="text" name="gamename" placeholder="表单信息" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <input type="text" name="gamelevelmin" placeholder="表单信息" class="form-control"/>
            </div>
            <div class="form-group col-md-3">
                <input type="text" name="gamelevelmax" placeholder="表单信息" class="form-control"/>
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="gameplayermin" placeholder="表单信息" class="form-control"/>
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="gameplayermax" placeholder="表单信息" class="form-control"/>
            </div>
            
            </form>
        </div>
        
        
        <div id="textinfo" style="display:none">
            
        </div>

        
        
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

		 
		<script>
       // JavaScript Document
		var daysInMonth = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);    //每月天数
		var today = new Today();    //今日对象
		var year = today.year;      //当前显示的年份
		var month = today.month;    //当前显示的月份
		
		//页面加载完毕后执行fillBox函数
		/*$(function() {
			fillBox();
		});*/
		//今日对象
		function Today() {
			this.now = new Date();
			this.year = this.now.getFullYear();
			this.month = this.now.getMonth();
			this.day = this.now.getDate();
		}
		
		//根据当前年月填充每日单元格
		function fillBox() {
			updateDateInfo();                   //更新年月提示
			$("td.calBox").empty();             //清空每日单元格
		
			var dayCounter = 1;                 //设置天数计数器并初始化为1
			var cal = new Date(year, month, 1); //以当前年月第一天为参数创建日期对象
			var startDay = cal.getDay();        //计算填充开始位置
			//计算填充结束位置
			var endDay = startDay + getDays(cal.getMonth(), cal.getFullYear()) - 1;
		
			//如果显示的是今日所在月份的日程，设置day变量为今日日期
			var day = -1;
			if (today.year == year && today.month == month) {
				day = today.day;
			}
		
			//从startDay开始到endDay结束，在每日单元格内填入日期信息
			for (var i=startDay; i<=endDay; i++) {
			///////////////
			var tempmonth; var tempday;
			if(month+1<10 ){ tempmonth="0"+(month+1);}else{tempmonth=(month+1); }
			if(dayCounter<10 ){ tempday="0"+dayCounter;}else{ tempday= dayCounter; }
			////////////////////////
				if (dayCounter==day) {
					$("#calBox" + i).html("<div class='date today' id='" + year + "-" + tempmonth + "-" + tempday + "'>" + dayCounter + "</div>");
				} else {
					$("#calBox" + i).html("<div class='date' id='" + year + "-" + tempmonth + "-" + tempday + "' >" + dayCounter + "</div>");
				}
				dayCounter++;
			}
			getTasks();                         //从服务器获取任务信息
		  $('#load-ing').hide();
		}
		
		/*//从服务器获取任务信息
        function getTasks() {
        $.post('<?php echo U('Pro/public_db'); ?>',{month: year + "-" + (month +1)},function(e){
        if(e != null){
        $(e).each(function(i){
        buildTask(e[i].builddate, e[i].id, e[i].task);
        } );
        }
        },'json')
        }*/

       //从服务器获取任务信息
       function getTasks() {
           var zj_name  = $("#zj_name").val();
           var host     = window.location.host;
           var url      = 'http://'+host+'/Pro/public_db/zj_name/'+zj_name+'.html';
           $.get(url,{month: year + "-" + (month +1)},function(e){
               if(e != null){
                   delTask();
                   $(e).each(function(i){
                       buildTask(e[i].builddate, e[i].id, e[i].task);
                   } );
               }
           },'json')
       }

       //点击搜索框时移除之前的节点
       function delTask() {
           var a = $("td").find("a[class='task_blue']")
               a.remove();
       }
       
       //根据日期、任务编号、任务内容在页面上创建任务节点
       function buildTask(buildDate, taskId, taskInfo) {
           /*$("#" + buildDate).parent().append("<a href='javascript:;'  class='task_blue' onclick='Taskinfo("+taskId+")'>" + taskInfo + "</a>");*/
           $("#" + buildDate).parent().append("<a href='javascript:;'  class='task_blue' >" + taskInfo + "</a>");
       }

       //查看详情
       function Taskinfo(id,pid,status) {
           var web_path = "<?php echo ($web_path); ?>";
           art.dialog.open(web_path+'/Pro/appo_info/id/'+id,{
               lock:true,
               title: '日程介绍',
               width:860,
               height:500,
               //okValue: '提交',
               //button: btns
           });
       }

		//判断是否闰年返回每月天数
		function getDays(month, year) {
			if (1 == month) {
				if (((0 == year % 4) && (0 != (year % 100))) || (0 == year % 400)) {
					return 29;
				} else {
					return 28;
				}
			} else {
				return daysInMonth[month];
			}
		}
		
		//显示上月日程
		function prevMonth() {
			if ((month - 1) < 0) {
				month = 11;
				year--;
			} else {
				month--;
			}
			fillBox();              //填充每日单元格
		}
		
		//显示下月日程
		function nextMonth() {
			if((month + 1) > 11) {
				month = 0;
				year++;
			} else {
				month++;
			}
			fillBox();              //填充每日单元格
		}
		
		//显示本月日程
		function thisMonth() {
			year = today.year;
			month = today.month;
			fillBox();              //填充每日单元格
		}
		
		//更新年月提示
		function updateDateInfo() {
			$("#dateInfo").html(year + "年" + (month + 1) + "月");
		}


        </script>
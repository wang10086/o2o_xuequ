	//日历
	var daysInMonth = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);    //每月天数
	var today 		= new Today();     //今日对象
	var year 		= today.year;      //当前显示的年份
	var month 		= today.month;     //当前显示的月份
	
	//页面加载完毕后执行fillBox函数
	$(function() {
		fillBox();
	});
	
	//今日对象
	function Today() {
		this.now 	= new Date();
		this.year	= this.now.getFullYear();
		this.month 	= this.now.getMonth();
		this.day 	= this.now.getDate();
	}
	
	//根据当前年月填充每日单元格
	function fillBox() {
		updateDateInfo();                   //更新年月提示
		$("td.calBox").empty();             //清空每日单元格
	
		var dayCounter 	= 1;                 //设置天数计数器并初始化为1
		var cal 		= new Date(year, month, 1); //以当前年月第一天为参数创建日期对象
		var startDay 	= cal.getDay();        //计算填充开始位置
		//计算填充结束位置
		var endDay 		= startDay + getDays(cal.getMonth(), cal.getFullYear()) - 1;
	
		//如果显示的是今日所在月份的日程，设置day变量为今日日期
		var day 		= -1;
		
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
		getTasks();
	  	$('#load-ing').hide();
	}
	
	//从服务器获取任务信息
	function getTasks() {
		  $.post('date.php',{month: year + "-" + (month +1)},function(e){
			if(e != null){
			 $(e).each(function(i){
				buildTask(e[i].builddate, e[i].id, e[i].task);
			  } );
			}
		},'json')
	}
	
	//根据日期、任务编号、任务内容在页面上创建任务节点
	function buildTask(buildDate, taskId, taskInfo) {
		$("#" + buildDate).parent().append("<a href='#' title='" + taskInfo + "' class='task_blue' target='_blank'>" + taskInfo + "</a>");
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
		year 	= today.year;
		month 	= today.month;
		fillBox();              //填充每日单元格
	}
	
	//更新年月提示
	function updateDateInfo() {
		$(".dateInfo").html(year + "年" + (month + 1) + "月");
	}
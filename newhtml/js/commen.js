$(document).ready(function(e) {
	var h = parseInt($('.menu').height()) - 91;
	$('.morebox').css('height',h+'px');
	//$(".newslist ul li").css("background","#FFF");
	//$(".newslist ul li:even").css("background","#EEE");
});


function goto(a,b){
	$("html,body").animate({scrollTop:$("#"+a).offset().top-51},600);
	$("#lxnav").find('li').removeClass('on');
	$(b).addClass('on');
}
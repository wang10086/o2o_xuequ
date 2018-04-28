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


function showmsg(title,content){
	var html = '<div class="showbox">';
		html += '<div class="showwin">';
    	html += '<div class="showcontent">';
        html += '<div class="showtitle">'+title+'</div>';
        html += '<div class="showclose" onClick="closemsg()">X</div>';
        html += '<div class="showtext">'+content+'</div>';
        html += '</div>';
		html += '</div>';
		html += '</div>';
		
	$('body').append(html);
	$('.showbox').show();	
}


function closemsg(){
	$('.showbox').remove();
}
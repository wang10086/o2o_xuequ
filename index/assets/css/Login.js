//窗体加载时运行
$(function () {

    //绑定验证码切换事件
    $("#vcodeimg").bind("click", changeCode);
});



//切换验证码
function changeCode() {
    var objImg = $("#vcodeimg");
    objImg.attr("src", "/Register/VCode?t=" + (new Date()).valueOf());

}

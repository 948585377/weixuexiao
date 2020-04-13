//----------全局菊花转----------
$("body").append('<div id="common_progress" class="common_progress_bg"><div class="common_progress"><div class="common_loading"></div><br><span>正在载入...</span></div></div>');
var common_ajax_callback = true;
//默认为true; 不用此功能的页面 可以定义成false;
$(document).ajaxStart(function () {
    if (!common_ajax_callback) {
        return false;
    }
    //这里添加 ajax提交前的处理方法 ：例如 添加 显示遮罩层菊花转
    ajax_start_loading();
}).ajaxStop(function () {
    if (!common_ajax_callback) {
        return false;
    }
    //这里添加 ajax完成后的处理方法 ：例如 添加 隐藏遮罩层菊花转
    ajax_stop_loading();
}).ajaxError(function () {
    if (!common_ajax_callback) {
        return false;
    }
    //这里添加 ajax异常的处理方法 ：例如 jTips('提示出错！');
    ajax_stop_loading();
    jTips('非常抱歉，访问失败。请稍后重试！');
});
// 开启菊花转
function ajax_start_loading(text) {
    $("#common_progress").css("display", "block");
    $("body").css("position", "fixed");
    $(".common_progress").css("margin-left", $(window).width() / 2 - 80);
    if (text) {
        $("#common_progress span").text(text);
    }
}
// 关闭菊花转
function ajax_stop_loading() {
    $("#common_progress").hide();
    $("body").css("position", "static");
}


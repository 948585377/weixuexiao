//----------全局菊花转----------
$("body").append('<div id="common_progress" class="common_progress_bg"><div class="common_progress"><div class="common_loading"></div><br><span>正在载入...</span></div></div>');
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


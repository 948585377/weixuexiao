/*收藏夹start*/
//后加	 
//点击 按钮栏的按钮触发的事件
$(".select_type_cancel, .local_img_btn, .web_img_btn, .local_audio_btn, .web_audio_btn,.local_media_btn,.web_media_btn").on("click", function () {
    $(".select_type_bg").hide().children().not(".select_type_cancel").hide();
});
$(".add_pic_btn").on("click", function () {
    if ($(".pic_list li").length >= 9) {
        jTips("最多只能传9张图片哦！");
    } else {
        $(".faceBox").css("display", "none");
        $(".select_type_bg").show();
        $(".local_img_btn").show();
        $(".web_img_btn").show();
    }
});

$(".add_video_btn").on("click", function () {
    if ($(".video_list li").length >= 1 || $(".media_list li").length >= 1) {
        jTips("最多只能传1个语音,或你已经上传了视频");
    } else {
        $(".faceBox").css("display", "none");
        $(".select_type_bg").show();
        $(".local_audio_btn").show();
        $(".web_audio_btn").show();
    }
});
//var first_load_vod_init=true;
$(".add_video_btn2").on("click", function () {
    if ($(".media_list li").length >= 1 || $(".video_list li").length >= 1) {
        jTips("最多只能传1个视频，或你已经上传了语音");
    } else {
        $(".faceBox").css("display", "none");
        $(".select_type_bg").show();
        $(".local_media_btn").show();
        $(".web_media_btn").show();
        $(".media_upload_tips").show();

    }
});


$(".web_media_btn").on("click", function () {
    if ($(".media_list li").length < 1) {
        $(".favorites_bg").show();
        $(".favorites_video_box").show();
        $(".sure").attr("media_type", "video");
        $('.favorites_bg').css('min-height', $(document).height());
        $(window).scrollTop(0);
    } else {
        jTips('最多只能上传1个视频哦！');
    }
});

$(".local_audio_btn").on("click", function () {
    if ($(".video_list li").length < 1) {
        $(".babysay_bg").show();
    } else {
        jTips('最多只能上传1个语音哦！');
    }
});
$(".web_audio_btn").on("click", function () {
    if ($(".video_list li").length < 1) {
        $(".favorites_bg").show();
        $(".favorites_audio_box").show();
        $(".sure").attr("media_type", "audio");
        $('.favorites_bg').css('min-height', $(document).height());
        $(window).scrollTop(0);
    } else {
        jTips('最多只能上传1个语音哦！');
    }
});

$(".web_img_btn").on("click", function () {
    if ($(".pic_list li").length < 9) {
        $(".favorites_bg").show();
        $(".favorites_image_box").show();
        $(".sure").attr("media_type", "image");
        $('.favorites_bg').css('min-height', $(document).height());
        $(window).scrollTop(0);
    } else {
        jTips("主人，最多只能上传9张图片！");
    }
});
//复选框
$(".favorites_checkbox").on("click", function () {
    if ($(this).hasClass("checked")) {
        $(this).removeClass("checked");
    } else {
        var pic_list_num = $(".pic_list .sdk_img_li").length + $(".favorites_image_box").find(".checked").length;
        if (pic_list_num >= 9) {
            jTips("不能再添加了主人！");
        } else {
            $(this).addClass("checked");
        }

    }
});
//单选框
$(".favorites_radio").on("click", function (e) {
    e.stopPropagation();
    if ($(this).hasClass("checked")) {
        $(this).removeClass("checked");
    } else {
        $(this).parent().parent().find(".favorites_radio.checked").removeClass("checked");
        $(this).addClass("checked");
    }
});

//收藏夹 点击确认按钮
$(".favorites_control_box .sure").on("click", function () {

    if($(this).attr("media_type")=="video"){       //处理视频类型
        if($(".favorites_video_box").find(".checked").length>0){
            var _media_list='';
            $(".favorites_video_box").find(".checked").each(function(){
                var p_obj=$(this).parent().find(".favorites_play_icon");
                _media_list +='<li><div class="favorites_play_icon" receive_id="'+ p_obj.attr("receive_id") +'" video_url="'+ p_obj.attr("video_url") +'"></div><img src="'+ p_obj.next("img").attr("src") +'"><div class="del_btn" vod_id=""></div></li>';
            });
            $(".media_list").html(_media_list);
	
            $(".media_list li").css("height", $(".media_list li").width() + "px");
        }	
    } else if ($(this).attr("media_type") == "image") { //处理图片类型
        if ($(".favorites_image_box").find(".checked").length > 0) {
            var _image_list = '';
            $(".favorites_image_box").find(".checked").each(function () {
                var p_obj = $(this).parent().find("img");

                _image_list += '<li><img receive_id="' + p_obj.attr("receive_id") + '" src="' + p_obj.attr("src") + '"><div class="del_btn2"></div></li>';
            });

            $(".pic_list li").not(".sdk_img_li").remove();
            $(".pic_list").append(_image_list);
            $(".pic_list li").css("height", $(".pic_list li").width() + "px");
            $(".del_btn2").on("click", function () {
                var _this = $(this);
                jConfirm("主人，真的要删除我吗？", '', function (r) {
                    if (r) {
                        var _receive_id = _this.closest("li").find("img").attr('receive_id');
                        $(".favorites_image_box").find('img[receive_id=' + _receive_id + ']').parent().next(".favorites_checkbox").removeClass('checked');
                        _this.closest("li").fadeOut().remove();
                    }
                });
            });
        }
    } else { //处理语音类型
        if ($(".favorites_audio_box").find(".checked").length > 0) {
            var _audio_list = '';
            $(".favorites_audio_box").find(".checked").each(function () {
                var p_obj = $(this).parent().find("audio");
                _audio_list += '<li><div class="arrow"></div><div class="voice_play_tip"></div><div class="voice_play_time">' + p_obj.attr('time') + '"</div><div class="delete_voice_btn"></div><audio class="sound1" width="320" height="240" receive_id="' + p_obj.attr("receive_id") + '" controls="controls" style="display:none; opacity: 0;" src="' + p_obj.attr("src") + '"></audio></li>';
            });
            $(".video_list").append(_audio_list);

        }
    }

    $(".favorites_bg").hide();
    $(".favorites_video_box").hide();
    $(".favorites_audio_box").hide();
    $(".favorites_image_box").hide();
});
$(".favorites_control_box .cancel").on("click", function () {
    $(".favorites_bg").hide();
    $(".favorites_video_box").hide();
    $(".favorites_audio_box").hide();
    $(".favorites_image_box").hide();
});

$(".media_list").on("click", ".del_btn", function (e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).parent("li").remove();
});

//播放视频
$(".favorites_bg").on("click", ".favorites_play_icon", function (e) {
    e.stopPropagation();
    e.preventDefault();
    var video_url = $(this).attr("video_url");
    $(".video_bg").append('<video src="' + video_url + '" controls="controls" webkit-playsinline playsinline>您的浏览器不支持 video 标签。</video>');
    $(".video_bg").show();
    $(".video_bg").children("video").index(0).currentTime = 0.0;

});

$(".close_video_btn").on("click", function (e) {
    e.stopPropagation();
    e.preventDefault();
    $(".video_bg").hide();
    $(".video_bg").children("video")[0].pause();
    $(".video_bg").children("video")[0].currentTime = 0;
    $(".video_bg").children("video").remove();
});
//end
//语音播放
function my_audio_play(outside_obj, inside_obj, other_obj) {

    var now_play_video_index = '-1';
    $(outside_obj).on('click', inside_obj, function (e) {
        e.stopPropagation();
        e.preventDefault();
        var obj = $(this);
        var jq_obj = obj.children('.sound1');
        var dom_obj = jq_obj[0];
        if (obj.hasClass("video_stop")) {
            dom_obj.pause();
            dom_obj.currentTime = 0.0;
            obj.removeClass("video_stop");
            now_play_video_index = '-1';
        } else {
            if (now_play_video_index != '-1' && now_play_video_index != obj.index()) {
                var now_play_li = $(".audio_icon").eq(now_play_video_index);
                var now_play_obj = now_play_li.children('.sound1')[0];
                now_play_obj.pause();
                now_play_obj.currentTime = 0.0;
                now_play_li.removeClass("video_stop");
                now_play_video_index = '-1';
            }
            dom_obj.play();
            obj.addClass("video_stop");
            now_play_video_index = obj.index();
            dom_obj.addEventListener('ended', function () {
                dom_obj.pause();
                dom_obj.currentTime = 0.0;
                obj.removeClass("video_stop");
                now_play_video_index = '-1';
            }, false);
        }
    });
    $(outside_obj).on("click", other_obj, function () {
        if (now_play_video_index != '-1' && now_play_video_index != obj.index()) {
            var now_play_li = $(".audio_icon").eq(now_play_video_index);
            var now_play_obj = now_play_li.children('.sound1')[0];
            now_play_obj.pause();
            now_play_obj.currentTime = 0.0;
            now_play_li.removeClass("video_stop");
            now_play_video_index = '-1';
        }
    });
}
my_audio_play(".favorites_audio_box", ".favorites_option_li");
my_audio_play(".video_list", "li:not(.sdk_voice_li)", ".sdk_voice_li");
//end

var favorites_img_arr = [];
$(".favorites_media img").each(function () {
    favorites_img_arr.push($(this).attr("path"));
});

//点击预览图片
$(".favorites_image_box").on("click", ".favorites_media img", function (e) {
    e.stopPropagation();
    //console.log($(this).attr('receive_id'));
    look_img_fun($(this).attr("path"), favorites_img_arr);
});

//预览图片sdk方法
function look_img_fun(current_url, url_array) {
    wx.previewImage({
        current: current_url, // 当前显示的图片链接
        urls: url_array // 需要预览的图片链接列表
    });
}

$(".favorites_bg").on("scroll", function (e) {
    e.stopPropagation();
});

//获取语音时长

    if ($('.sound1').length > 0) {
        $('.sound1').on('loadedmetadata', function () {
            var this_time = Number(this.duration).toFixed(0);
            $(this).attr('time', this_time).parent().children('.voice_play_time').text(this_time+'"');
        })
    }


/*收藏夹end*/
$(function () {
    var dialog = $(".dialog_bg_1");
    var faceBox = $(".faceBox");
    var piclist=$(".pic_list");
    var videolist=$(".video_list");
    var GLOBAL_NAME;

    $(".openDialog").on("click", function () {
        dialog.css("display", "block");
        dialog.height(dialog.height()-44);
        GLOBAL_NAME = $(this).attr("name");
        //faceBox.css("marginLeft", (dialog.find(".dialog_1").width() - faceBox.width()) / 2);
    });

    $(".dialog_showFace").on('click', function () {
        createFaceSet(face_img_base_url+"face/", objMap, $(".feedback_content"));
        if(faceBox.css("display")=="block"){
            faceBox.css("display", "none");
        }else{
            faceBox.css("display", "block");
        }

    });
   
	/*$(".add_pic_btn").click(function () {
		faceBox.css("display", "none");
	});
	
	$(".add_video_btn").click(function () {
		faceBox.css("display", "none");
		if($(".video_list li").length >= 1){
			 jAlert("最多只能传1个语音哦！");
		}else{
			if($(".babysay_bg").css("display")=="block"){
	            //videolist.css("display", "none");
				$(".babysay_bg").hide();
	        }else{
	            //videolist.css("display", "block");
				$(".babysay_bg").show();
	        }
		}
    })*/


   /* document.addEventListener("touchstart", function (e) {
        var target = $(e.target);

        if(target.closest(".dialog_showFace").length>0){
            piclist.css("display","none");
            videolist.css("display","none");
        }else if( target.closest(".add_pic_btn").length>0){
            faceBox.css("display","none");
            videolist.css("display","none");
        }else if(target.closest(".add_video_btn").length>0){
            piclist.css("display","none");
            faceBox.css("display","none");
        }

    });*/

    createDialog(dialog, function (arg) {
        var string = arg.replace(/\[([^\]]+)\]/g, function (a, b) {
            return "<img src='"+ face_img_base_url +"images/mr/" + objMap[b] + ".gif'>"
        });
        $("#content").append("<div>" + string + "   GLOBAL_NAME = " + GLOBAL_NAME + "</div>");
    }, 150);

    var win_width=$(window).width();

    makeFaceBox("faceImg", "faceNum", 4, win_width);
});

//创建表情集
//（string 基于页面的图片资源路径， obj 表情对象， obj 输入框）
var isExist = false;    //判断图片是否已经加载
function createFaceSet(baseUrl, objMap, input) {
    if (!isExist) {
        var node = $("#faceImg");
        var objLength = 0;
        $.each(objMap, function (name, value) {
            if ((objLength % 20) == 0) {
                node.find("li:last").append("<div class='faceBox_delItem'><img src='"+ face_img_base_url +"face/del.gif'></div>");
                node.append("<li></li>");
            }
            var domStr = '<div class="faceBox_item">' +
                '<img src="' + baseUrl + value + '.gif" alt="' + name + '" title="' + name + '" />' +
                '</div>';
            node.find("li:last").append(domStr);
            objLength++;
        })
        $("#faceImg li").css("width",$(window).width()+"px");
        $(".faceBox_item").css("width",(($("body").width()-2)/7)+"px");
        $(".faceBox_item").css("height",$(".faceBox_item").css("width"));
       $("#faceNum").css("width",$(window).width()+"px");
       // alert($("#faceImg li").css("width"));


        node.find("li:last").append("<div class='faceBox_delItem'><img src='"+ face_img_base_url +"face/del.gif'></div>");
        isExist = true;
        $("#faceImg").find(".faceBox_item").each(function () {
            $(this).bind('click', function () {
                var str = input.val() + '[' + $(this).find('img').attr('title') + ']';
                input.val(str);
            });
        });
        $(".faceBox_delItem").on("click", function () {
            var inputVal = input.val();
            if (inputVal.charAt(inputVal.length - 1) === "]") {
                var temp = inputVal.lastIndexOf("[");
                input.val(inputVal.substr(0, temp));
            }
        });
    }
}

//生成滑动选择效果（只实现了移动端的方法）
//（string 表情列表的ID， string数字列表的ID， int 页数， int 显示表情区域的宽度）
function makeFaceBox(faceListId, numListId, pageSum, listWidth) {
    var startPageX;                     //触摸到的x轴坐标
    var isTouch = false;
    var beforeContainerMarginLeft;      //移动前marginLeft的值
    var afterContainerMarginLeft;       //移动后marginLeft的值
    var currentPage = 1;                //当前页数
    var container = $("#" + faceListId);
    var pageNumber = $("#" + numListId);
    document.getElementById(faceListId).addEventListener("touchstart", function (e) {
        isTouch = true;
        beforeContainerMarginLeft = parseInt(container.css("marginLeft"));
        startPageX = e.touches[0].pageX;
    });
    document.getElementById(faceListId).addEventListener("touchmove", function (e) {
        if (isTouch) {
            e.preventDefault();
            container.css("marginLeft", beforeContainerMarginLeft + e.touches[0].pageX - startPageX);
        }
    });
    document.getElementById(faceListId).addEventListener("touchend", function () {
        if (isTouch) {
            afterContainerMarginLeft = parseInt(container.css("marginLeft"));
            if (afterContainerMarginLeft > 1) {
                container.animate({marginLeft: 0}, 200);
            } else {
                if (Math.abs(beforeContainerMarginLeft - afterContainerMarginLeft) > 50) {
                    if (afterContainerMarginLeft > beforeContainerMarginLeft) {
                        //向右滑，上一页
                        container.animate({marginLeft: beforeContainerMarginLeft + listWidth}, 200);
                        currentPage--;
                        pageNumber.find("li").removeClass("active");
                        pageNumber.find("li").eq(currentPage - 1).addClass("active");
                    } else {
                        if (afterContainerMarginLeft < -listWidth * (pageSum - 1)) {
                            container.animate({marginLeft: beforeContainerMarginLeft}, 200);
                        } else {
                            //向左滑，下一页
                            container.animate({marginLeft: beforeContainerMarginLeft - listWidth}, 200);
                            currentPage++;
                            pageNumber.find("li").removeClass("active");
                            pageNumber.find("li").eq(currentPage - 1).addClass("active");
                        }
                    }
                } else {
                    container.animate({marginLeft: beforeContainerMarginLeft}, 200);
                }
            }
            isTouch = false;
        }
    });
}
//创建对话框
//（string 对话框，  function 点击确定回调函数，  int 字体数量）
function createDialog(dialog, callback, countNumber) {
    var cancel = dialog.find(".dialog_cancel");
    var confirm = dialog.find(".dialog_confirm");
    if (countNumber) {
        var textArea = dialog.find("textarea");
        var number = dialog.find(".dialog_btnSet_number");
        var numberColor = number.css("color");
        number.html(countNumber);
        textArea.on("keyup", function () {
            number.html(countNumber - $(this).val().length);
            if (number.html() < 0) {
                number.css("color", "red");
            } else {
                number.css("color", numberColor);
            }
        })
    }
    cancel.click(function () {
        dialog.css("display", "none");
        if(dialog.find("textarea")){
            dialog.find("textarea").val("");
        }

    });
    confirm.click(function () {
        if(textArea.css("display")!="none"){
        if (textArea.val().length) {
            if (textArea.val().length <= countNumber) {
                callback(textArea.val());
                textArea.val("");
                number.html(countNumber);
                dialog.css("display", "none");
            } else {
                alert("输入内容不能大于" + countNumber + "个字.")
            }
        } else {
            alert("内容不能为空.")
        }
        }
    });
}
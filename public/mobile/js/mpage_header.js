
function pullBaby(){
	if($("#babyList").css("display") == "none"){
		$("#babyList").show();
		$("#BlackBg").show();
	}else{
		hideBaby();
	}
}

function hideBaby(){
	$("#babyList").hide();
	$("#BlackBg").hide();
}

function showNav(){
	$("#navBtnList").css("display","block");
	$("#TransparentBg").css("display","block");
}

function closeNav(){
	$("#navBtnList").css("display","none");
	$("#TransparentBg").css("display","none");
	$("#weekList").css("display","none");
}

function removeActive(){
	$("#navBtnList").find("li").removeClass("active");
}

function changeNav(){
//	closeNav();
}

$(document).scroll(function(){
	if(document.body.scrollTop > 0){
		$(".backTop").css("display","block");
	}else{
		$(".backTop").css("display","none");
	}
});

var ctx = $("#ctx").val();
var type = $("#type").val();
var stuid = $("#stuid").val(); 
var commonUrl_loadingPage = $("#commonUrl_loadingPage").val();
var commonUrl_loadingData = $("#commonUrl_loadingData").val();
var IS_APPID_BJQ_COMMENT = $("#IS_APPID_BJQ_COMMENT").val();
var IS_APPID_BJQ_REWARD = $("#IS_APPID_BJQ_REWARD").val();
var IS_APPID_BJQ_REWARD_MINIMUM = $("#IS_APPID_BJQ_REWARD_MINIMUM").val();
var IS_APPID_BJQ_REWARD_MAXIMUM = $("#IS_APPID_BJQ_REWARD_MAXIMUM").val();
var usertype = $("#usertype").val(); 
var PB = new PromptBox();
var check_pass_word = '';
var passwords = $('#password').get(0);
var character, index = 0;
var bjqBtnConfig = {
		rewordBtn:"",
		commentBtn:"",
		praiseBtn:"",
		btnBoxWidth:"83%"
};

var bjqDataCount = 0;
var grxcDataCount = 0;
$(document).ready(function() {
	FastClick.attach(document.body);
	
	// PB.prompt("数据载入中，请等待~","forever");
	getClassList();
	$("#nowPage").val(0);
	type = $("#type").val();
	initGhhdTips();
	queryCommentList();
	if(type == 1){
		initBjq();
	}
	setInterval(queryCommentList,30000);
	$('#commentTip').click(function(){
		jumpCommentList();
	})
	$(".rewardBox-close").click(function(){
		closeRewarBox();
	});
	$("#rewarSaveBtn").click(function(){
		bjqRewarSave();
	});
	$("#buttonBoxShade").click(function(){
		$("#buttonBoxShade").hide();
		var otherCheckedButBox = $(".buttonBox.checked");
		otherCheckedButBox.removeClass("checked");
		otherCheckedButBox.animate({width:"0"},300);
		otherCheckedButBox.hide(300);
	});
	$("#rewardBoxShade").click(function(){
		$("#rewardBox,#rewardBoxShade").hide();
	});
	$("#QRcodeBoxShade").click(function(){
		$("#QRcodeBox,#QRcodeBoxShade").hide();
		getRewar($("#rewarDataid").val());
	});
	
	$('#keyboard li').click(function(){
        if ($(this).hasClass('delete')) {
        	$(passwords.elements[--index%6]).val('');
        	if($(passwords.elements[0]).val() == '') {
        		index = 0;
        	}
            /*for(var i= 0,len=passwords.elements.length-1;len>=i;len--){
                if($(passwords.elements[len]).val()!=''){
                    $(passwords.elements[len]).val('');
                    break;
                }
            }*/
            return false;
        }
        if ($(this).hasClass('cancle')) {
            //关闭
            return false;
        }
        if ($(this).hasClass('symbol') || $(this).hasClass('tab')) {
            character = $(this).text();
			$(passwords.elements[index++%6]).val(character);
			if($(passwords.elements[5]).val() != '') {
        		index = 0;
        	}
        /*for(var i= 0,len=passwords.elements.length;i<len;i++){
            if($(passwords.elements[i]).val()== null ||$(passwords.elements[i]).val()==undefined||$(passwords.elements[i]).val()==''){
                $(passwords.elements[i]).val(character);
                break;
            }
        }*/
	        if($(passwords.elements[5]).val() != '') {
	            var temp_rePass_word = '';
	            for (var i = 0; i < passwords.elements.length; i++) {
	                temp_rePass_word += $(passwords.elements[i]).val();
	            }
	            check_pass_word = temp_rePass_word;
//	            $("#key").hide();
//	            closeRewardPasswordBox();
	            PB.prompt("打赏中...", "forever");
	            rewardMoney();
	        }
        }
        return false;
    });
	
//	else if(type == 2){
//		initGrxc();
//	}
});

function checkMoneyRule(obj) {   
    var maxLength = 3;
    if(obj.value.length > maxLength){
        obj.value = obj.value.substr(0,maxLength);   
    }
    if(parseFloat(obj.value)>= parseFloat(IS_APPID_BJQ_REWARD_MAXIMUM)){
    	obj.value = parseFloat(IS_APPID_BJQ_REWARD_MAXIMUM);
    }
    if(parseFloat(obj.value)< parseFloat(IS_APPID_BJQ_REWARD_MINIMUM)){
    	if(IS_APPID_BJQ_REWARD_MINIMUM==0){
    		obj.value = 0.01;
    	}else{
    		obj.value =	parseFloat(IS_APPID_BJQ_REWARD_MINIMUM);
    	}
    }
}

/**
 * 查询评论列表
 */
function queryCommentList(){
	var submitData = {
			appid: ApiParamUtil.MY_CLASS_CLASS_QUERY_COMMENT_LIST,
			api: ApiParamUtil.MY_CLASS_CLASS_QUERY_COMMENT_LIST,
			readstate: "0",
			"pageSize":1,
			"nowPage":1
		};
		$.ajax({
			cache:false,
			type: "POST",
			url: basicParameters.loadingData,
			data: submitData,
			success: function(datas){
				var result = typeof datas === "object" ? datas : JSON.parse(datas);
				if(result.ret.code==="200"){
					if(result.data.dataTotal!==0){
						var tipMsg;
						if(result.data.dataTotal > 0){
							tipMsg = result.data.dataTotal + "条新消息";
						}else{
							return;
						}
						$("#commentTip").html('<p><img src="'+result.data.commentList[0].headportrait+'" /><span>'+tipMsg+'</span></p>');
						var doc = document.documentElement;
						var commentTip = document.getElementById("commentTip");
						var PBX = (doc.clientWidth - commentTip.offsetWidth)/2;
//						var PBY = (doc.clientHeight - commentTip.offsetHeight-50)/2;
						commentTip.style.left = PBX+'px';
					}else{
						$("#commentTip").html('');
					}
				}else{
					console.log(result.ret.code+":"+result.ret.msg);
				}
			}
		});
}

/**
 * 跳转评论列表
 */
function jumpCommentList(){
	location.href = basicParameters.loadingPage + "&appid=" + ApiParamUtil.MY_CLASS_CLASS_CIRCLE_COMMENT_LIST_JUMP;
}

function initBjq(){
	$("#discussBg").click(function(){
		textBlur();
	});
	initInfo();
	emojiTransformation();
	loadBjqList();
}

function initGrxc(){
	initGrxcInfo();
	emojiTransformation();
	loadGrxcList();
}


/* 表情转换 */
function emojiTransformation(){
	$('.comment').each(function(i, d){
        $(d).emoji();
    });
}

function initInfo(){
	setHASW();
	initImgCss();
//	var publishdate = $("span[name='publishdate']");
//	for (var i = 0; i < publishdate.length; i++) {
//		var yyyy = publishdate.eq(i).html().substring(0,4);
//		var MM = publishdate.eq(i).html().substring(5,7);
//		var dd = publishdate.eq(i).html().substring(8,10);
//		publishdate.eq(i).html( MM + "月" + dd + "日");
//	}
}

function formatdata(date){
	var MM = date.substring(5,7);
	var dd = date.substring(8,10);
	return MM + "月" + dd + "日";
}

$(document).scroll(function(){
	if(document.body.scrollTop + document.body.clientHeight >= document.body.scrollHeight){
		if($("#loadDiv").length == 0 && $("#overDiv").length == 0 && $("#grxcBody").html().length+$("#bjqBody").html().length > 0){
			createLoadDiv();
			if(type==1){
				loadBjqList();
			}else{
				loadGrxcList();
			}
			
		}
	}
});

function closeMenu(){
	$("#coverBg").css("display","none");
	$("#delBox").css("display","none");
}

function showMenu(){
	$("#selectType").css("display","block");
	$("#coverBg").css("display","block");
}

function menuClick(){
	if($("#selectType").css("display") == "none"){
		showMenu();
	}else{
		closeMenu();
	}
}

/*点赞和取消点赞*/
function savePraise(obj,dataid){
	closeToolBox();
	$(obj).removeAttr("onclick","");
	var submitData = {
			appid 	:  ApiParamUtil.MY_CLASS_CLASS_PRAISE,
			dataid	: dataid
	};
	$.post(commonUrl_loadingData, submitData, function(json) {
		var result = typeof json == "object" ? json : JSON.parse(json);
		if(result.ret.code == 200){
			$(obj).attr("onclick","savePraise(this,"+dataid+")");
			if(result.ret.msg == "praised"){
				$("#like_label"+dataid).find(".icon_text").html("取消");
			}else if(result.ret.msg == "unpraise"){
				$("#like_label"+dataid).find(".icon_text").html("点赞");
			}else{
				PB.prompt("点赞失败！");
			}
			getPraise(dataid);
		}
	});
}

function getPraise(dataid){
	var submitData = {
			appid 	:  ApiParamUtil.MY_CLASS_CLASS_QUERY_PRAISE_USER_LIST,
			dataid	: dataid
	};
	$.post(commonUrl_loadingData, submitData, function(json) {
		var result = typeof json == "object" ? json : JSON.parse(json);
		if(result.ret.code == 200){
			$("#praiseUserList"+dataid).find(".praiseUser").remove();
			$("#praiseUserList"+dataid).find(".andSoOn").remove();
			if(result.data.praiseUserList != null && result.data.praiseUserList.length > 0){
				$("#praiseUserList"+dataid).removeClass("hide");
				for (var i = 0; i < result.data.praiseUserList.length; i++) {
					if(i >= 5){
						$("#praiseUserList"+dataid)
						.append('<span class="hide praiseUser" id="praise'+dataid+'User'+result.data.praiseUserList[i].userid+'">' 
							+ result.data.praiseUserList[i].username + '</span>');
						if(i == result.data.praiseUserList.length - 1){
							$("#praiseUserList"+dataid)
							.append('<div class="andSoOn">等' + result.data.praiseUserList.length + '人</div>');
						}
					}else{
						$("#praiseUserList"+dataid)
						.append('<span class="praiseUser" id="praise'+dataid+'User'+result.data.praiseUserList[i].userid+'">' 
							+ result.data.praiseUserList[i].username + '</span>');
					}
					
				}
			}else{
				$("#praiseUserList"+dataid).addClass("hide");
			}
		}
	});
}

//function savePraise(wlzyid,userid){
//	var url = ctx + "/mobile/savePraise";
//	var submitData = {
//			wlzyid : wlzyid,
//			userid : userid
//	};
//	$.post(url, submitData, function(data) {
//		if (data == "save" || data == "cancel" ) {
//			getPraise(wlzyid,data);
//		} else {
//			alert(data);
//		}
//		return false;
//	});
//}

//function getPraise(wlzyid,state){
//	var url = ctx + "/mobile/getPraise";
//	var submitData = {
//			wlzyid : wlzyid
//	};
//	$.post(url, submitData, function(data) {
//		if(state == "save"){
//			$("#like_label"+wlzyid).html("取消");
//		}else if(state == "cancel"){
//			$("#like_label"+wlzyid).html("点赞");
//		}
//		$("#praiseCount"+wlzyid).html(data + "人赞");
//		return false;
//	});
//}

function createLoadDiv(){
	var loadDiv = "<div id='loadDiv' class='loadBox'>正在加载...</div>"; 
	if(type==1){
		$("#bjqBody").append(loadDiv);
	}else{
		$("#grxcBody").append(loadDiv);
	}
	
}

function createOverDiv(){
	var loadDiv = "<div id='overDiv' class='loadBox'>没有更多数据了</div>"; 
	if(type==1){
		$("#bjqBody").append(loadDiv);
	}else{
		$("#grxcBody").append(loadDiv);
	}
	
}

function removeLoadDiv(){
	$("#loadDiv").remove();
}

function loadBjqList(){
	
	var url = ctx + "/mobile/loading_data?rand="+Math.random();
	
	var nowPage = parseInt($("#nowPage").val()) + 1;
	var pageCount = $("#pageCount").val();
	var orgcode = $("#orgcode").val();
	var campusid = $("#campusid").val();
	var userid = $("#userid").val();
	
	var submitData = {
			nowPage : nowPage,
			pageCount : pageCount,
			orgcode : orgcode,
			campusid : campusid,
			userid : userid,
			appid : $("#appid").val(),
			bjid : $("#bjid").val(),
			usertype : $("#usertype").val()
		};
		$.get(url, submitData, function(data) {
			var datas = JsonsUtil.evalNoSpace(data).data;
			bjqDataCount = bjqDataCount+ datas.dataList.length;
			if(datas.dataList.length < 1 && nowPage <= 1){
				createNoDataBjqDiv();
			}else{
				removeNoDataBjqDiv();
			}
			
			createBjqBox(datas.dataList);
			emojiTransformation();
			removeLoadDiv();
			if(datas.dataList.length  < pageCount && $("#overDiv").length == 0 && nowPage > 1){
				createOverDiv();
			}
			$("#nowPage").val(nowPage);
			setTimeout(function(){initInfo();}, 200);
			setTimeout(function(){PB.promptHide();},200);
			return false;
		});
}

function loadGrxcList(){
	var url = ctx + "/mobile/loading_data?rand="+Math.random();
	var nowPage = parseInt($("#nowPage").val()) + 1;
	var pageCount = $("#pageCount").val();
	var orgcode = $("#orgcode").val();
	var campusid = $("#campusid").val();
	var userid = $("#userid").val();
	
	var submitData = {
			nowPage : nowPage,
			pageCount : pageCount,
			orgcode : orgcode,
			campusid : campusid,
			userid : userid,
			appid : "2071013",
			stuid : $("#stuid").val(),
			usertype : $("#usertype").val()
		};
		$.get(url, submitData, function(data) {
			var datas = eval('('+data+')');
			if(datas.length < 1 && nowPage <= 1){
				if($("#usertype").val()==1){
					createNoDatafslxDiv();
				}else{
					createNoDataGrxcDiv();
				}
			}else{
				removeNoDataGrxcDiv();
			}
			installGrxcXcBox(datas);
			removeLoadDiv();
			if(datas.length <= 0 && $("#overDiv").length == 0 && nowPage > 1){
				createOverDiv();
			}
			$("#nowPage").val(nowPage);
			setTimeout(function(){initInfo();}, 200);
			setTimeout(function(){PB.promptHide();},200);
			emojiTransformation();
			return false;
		});
}

function createNoDataBjqDiv(){
	var div = '<div id="noDataBjqDiv" class="noData">还没有班级圈数据</div>';
	if($("#noDataBjqDiv").length == 0){
		$("#bjqBody").html(div);
	}
}

function createNoDataGrxcDiv(){
	var div = '<div id="noDataGrxcDiv" class="noData">还没有个人相册数据</div>';
	if($("#noDataGrxcDiv").length == 0){
		$("#grxcBody").html(div);
	}
}

function createNoDatafslxDiv(){
	var div = '<div id="noDataGrxcDiv" class="noData">还没有发送历史数据</div>';
	if($("#noDataGrxcDiv").length == 0){
		$("#grxcBody").html(div);
	}
}


function removeNoDataBjqDiv(){
	if($("#noDataBjqDiv").length > 0){
		$("#noDataBjqDiv").remove();
	}
}

function removeNoDataGrxcDiv(){
	if($("#noDataGrxcDiv").length > 0){
		$("#noDataGrxcDiv").remove();
	}
}

/**
 * 评论发送
 */
function discussSend(){
	$('#discussSend').attr("disabled",true);
	var url = basicParameters.loadingData;
	var receiverid = $("#receiverid").val();
	var content = $("#content").val();
	if(content == "" || content == null){
		closeDiscussText();
		return ;
	}
	if(receiverid == "" || receiverid == null){
		receiverid = 0;
	}
	var userid = $("#userid").val();
	var orgcode = $("#orgcode").val();
	var wlzyid = $("#wlzyid").val();
	var content = $("#content").val();
	var submitData = {
			api: ApiParamUtil.MY_CLASS_CLASS_DISCUSS_SAVE,
			appid: ApiParamUtil.MY_CLASS_CLASS_DISCUSS_SAVE,
			receiverid: receiverid,
			userid: userid,
			wlzyid: wlzyid,
			content: content
	};
	$.post(url, submitData, function(datas) {
		var result = typeof datas === "object" ? datas : JSON.parse(datas);
		$('#discussSend').removeAttr("disabled");
		closeDiscussText();
		reflishDiscuss(result.data.comment);
		emojiTransformation();
		return false;
	});
}

function reflishDiscuss(datas){
	var liList = "";
	for (var i = 0; i < datas.length; i++) {
		var receiver = "";
		if(datas[i].receiverid != 0){
			receiver = "回复<span>"+ datas[i].receiver +"</span>";
		}
		liList += '<li onclick="setWlzyIdAndReceiver('+ datas[i].wlzyid +','+ datas[i].publisherid +','+ datas[i].id +');">'
			   +  '		<span>'+ datas[i].publisher +'</span>'
			   +		receiver+ '：' +datas[i].content
			   +  '</li>';
	}
	if(datas.length > 0){
		$("#discuss"+datas[0].wlzyid).css("display","block");
		$("#discuss"+datas[0].wlzyid).find(".discussBox").find("ul").html(liList);
	}else{
		$("#discuss"+$("#wlzyid").val()).css("display","none");
	}
	$("#discuss"+$("#wlzyid").val()).removeClass("hide");
}

function setWlzyIdAndReceiver(wlzyid,publisherid,commentId){
	var userId = $("#userid").val();
	if(userId == publisherid){
		$("#delBox").css("display","block");
		$("#coverBg").css("display","block");
		$("#wlzyid").val(wlzyid);
		$("#discussId").val(commentId);
	}else{
		$("#wlzyid").val(wlzyid);
		$("#receiverid").val(publisherid);
		$("#discussText").css("display","block");
		$("#discussBg").css("display","block");
		createDiscussSend("comment");
	}
}

function delDiscuss(){
	var url = basicParameters.loadingData;
	var commentid = $("#discussId").val();
	var wlzyid = $("#wlzyid").val();
	var submitData = {
			api: ApiParamUtil.MY_CLASS_CLASS_DISCUSS_DELETE,
			appid: ApiParamUtil.MY_CLASS_CLASS_DISCUSS_DELETE,
			commentid: commentid,
			wlzyid: wlzyid
	};
	$.post(url, submitData, function(datas) {
		var result = typeof datas === "object" ? datas : JSON.parse(datas);
		closeMenu();
		reflishDiscuss(result.data.comment);
		emojiTransformation();
		return false;
	});
}

function createDiscussSend(type){
	var discussSend = new Array();
	$("#emojiBox,#imageBox").hide();
	discussSend.push('<img id="emojiClose" class="showEmojiBox" alt="插入表情" src="'+ctx+'/static/jquery-emoji/images/emojiClose.png" width="30" height="30" onclick="showBox(\'emoji\')">');
	discussSend.push('<img id="emojiOpen" class="showEmojiBox" alt="插入表情" src="'+ctx+'/static/jquery-emoji/images/emojiOpen.png" width="30" height="30" onclick="showBox(\'emoji\')">');
	if(type=="release"){
		discussSend.push('<img id="imageClose" class="showImageBox" alt="插入图片" src="'+ctx+'/static/jquery-emoji/images/imageClose.png" width="30" height="30" onclick="showBox(\'image\')">');
		discussSend.push('<img id="imageOpen" class="showImageBox" alt="插入图片" src="'+ctx+'/static/jquery-emoji/images/imageOpen.png" width="30" height="30" onclick="showBox(\'image\')">');
		discussSend.push('<button id="discussRelease" class="s" >发送</button>');
	}else if(type=="comment"){
		discussSend.push('<button id="discussSend" class="s" onclick="discussSend()">发送</button>');
	}
	discussSend.push('<button id="discussCancel" class="c" onclick="closeDiscussText();">取消</button>');
	$("#discussButton").html(discussSend.join(''));
}
/**
 * 弹出班级圈发布跳转选项框
 */
 
var fburl = $("#fburl").val(); 
function jumpBjqSend(){
      window.location.href = fburl;  
}

/**
 * 关闭班级圈发布跳转选项框
 */ 
function closeSendType() {
	$(".sendType").animate({height:"0px"}, "fast");
	$("#fullbg").hide();
	document.body.style.cssText = '';
	document.body.parentNode.style.overflow="scroll";
	document.documentElement.style.overflow='';
} 

function discussRelease(){
	$("#discussText").css("display","block");
	$("#discussBg").css("display","block");
	createDiscussSend("release");
}

function setWlzyId(wlzyid){
	closeToolBox();
	$("#wlzyid").val(wlzyid);
	$("#receiverid").val("");
	$("#discussText").css("display","block");
	$("#discussBg").css("display","block");
	createDiscussSend("comment");
}

function closeDiscussText(){
	$("#receiverid").val("");
	$("#discussText").css("display","none");
	$("#discussBg").css("display","none");
	$("#content").val("");
}

function delWlzy(id){
	conformMsg("提示","确认删除？",id);
}

function realDel(id){
	removeConformDiv();
	var url = ctx + "/mobile/delWlzy";
	var submitData = {
			id 		: id,
			orgcode : $("#orgcode").val()
	};
	$.post(url, submitData, function(data) {
		if(data == "success"){
			$("#xcBox"+id).remove();
		}
	});
}

function textBlur(){
	$("#discussText").blur();
}

/**
 * 创建班级圈
 */
function createBjqBox(datas){
	var userid = basicParameters.userid;
	var dataArray = new Array();
	if(parseInt(IS_APPID_BJQ_COMMENT)===0 && parseInt(IS_APPID_BJQ_REWARD)===0){
		bjqBtnConfig.praiseBtn= " one_btn btn-span-noborder ";
		bjqBtnConfig.btnBoxWidth="27%";
	}else if(parseInt(IS_APPID_BJQ_COMMENT)===0){
		bjqBtnConfig.rewordBtn= " two_btn ";
		bjqBtnConfig.praiseBtn= " two_btn btn-span-noborder ";
		bjqBtnConfig.btnBoxWidth="55%";
	}else if(parseInt(IS_APPID_BJQ_REWARD)===0){
		bjqBtnConfig.commentBtn= " two_btn ";
		bjqBtnConfig.praiseBtn= " two_btn ";
		bjqBtnConfig.btnBoxWidth="55%";
	}
	
	for (var i = 0; i < datas.length; i++) {
		dataArray.push('<div id="xcBox'+ datas[i].id +'" class="xcBox">');
		dataArray.push('<div class="l">');
		dataArray.push('<div class="headimg">');
		if(datas[i].publisherpic == null || datas[i].publisherpic == ""){
			dataArray.push('<img alt="" src ="'+basicParameters.ctx+'/static/styles/wxStyle/images/publisherpic.png" />');
		}else{
			dataArray.push('<img alt="" src ="'+datas[i].publisherpic+'"/>');
		}
		dataArray.push('</div>');
		dataArray.push('</div>');
		dataArray.push('<div class="r">');
		dataArray.push('<div class="nameAndTime">');
		dataArray.push('<span class="name">'+ datas[i].publisher +'</span>');
		dataArray.push('</div>');
		if(datas[i].content){
			dataArray.push('<div class="content comment">'+datas[i].content+'</div>');
		}else{
			dataArray.push('<div class="content comment"></div>');
		}
		dataArray.push(assemblePic(datas[i]));
		dataArray.push('<div id="like'+ datas[i].id +'" class="like">');
		//time
		dataArray.push('<span name="publishdate" class="time">'+ dateTimesUtil.formatTime(datas[i].publishdate) +'</span>');
		//del
		if(datas[i].publisherid == userid){
			dataArray.push('<span class="del" onclick="delWlzy('+ datas[i].id +')">删除</span>');
		}
		dataArray.push('<div class="toolButton" onclick="showTooLBtnBox(this)">');
		dataArray.push('<em class="dot"></em>');
		dataArray.push('<em class="dot dot-right"></em>');
		dataArray.push('<span class="triangle"></span>')
		dataArray.push('</div>');
		dataArray.push('<div class="buttonBox" >');
		
		//打赏按钮
		if(parseInt(IS_APPID_BJQ_REWARD)!==0){
			dataArray.push('<span class="btn-span '+bjqBtnConfig.rewordBtn+'" onclick="showRewardBox('+datas[i].id+',\''+datas[i].publisher+'\',\''+datas[i].publisherid+'\')">');
			dataArray.push('<i class="icon_sprite_outer gopng_currency"></i>');
			dataArray.push('<span class="icon_text">打赏</span></span>');
		}
		//点赞按钮
		dataArray.push('<span class="btn-span '+bjqBtnConfig.praiseBtn+'" id="like_label'+ datas[i].id +'" onclick="savePraise(this,'+ datas[i].id +')">');
		dataArray.push('<i class="icon_sprite_outer gopng_heart"></i>');
		dataArray.push('<span class="icon_text">');
		if(datas[i].isPraise==0){
			dataArray.push('点赞');
		}else{
			dataArray.push('取消');
		}
		dataArray.push('</span>');
		dataArray.push('</span>')
		//评论按钮
		if(parseInt(IS_APPID_BJQ_COMMENT)!==0){
			dataArray.push('<span class="btn-span btn-span-noborder '+bjqBtnConfig.commentBtn+'" onclick="setWlzyId('+ datas[i].id +');">');
			dataArray.push('<i class="icon_sprite_outer gopng_comment">');
			dataArray.push('</i>');
			dataArray.push('<span class="icon_text">评论</span>');
			dataArray.push('</span>')
		}
		dataArray.push('</div>');
		dataArray.push('</div>');
		
		if((datas[i].rewardList && parseInt(IS_APPID_BJQ_REWARD)!==0) || datas[i].wxXxPraiseList.length != 0 || (datas[i].commentList && parseInt(IS_APPID_BJQ_COMMENT)!==0) ){
			dataArray.push('<div class="arrowLine"><span></span></div>');
		}
		if(parseInt(IS_APPID_BJQ_REWARD)!==0){
			dataArray.push(assembleReward(datas[i]));
		}
		dataArray.push(assemblePraise(datas[i]));
		if(parseInt(IS_APPID_BJQ_COMMENT)!==0){
			dataArray.push(assembleDiscuss(datas[i]));
			dataArray.push('</div>');
		}else{
			dataArray.push('<div id="discuss'+ datas[i].id +'" class="discuss hide">');
			dataArray.push('</div>');
		}
		dataArray.push('</div>');
		dataArray.push('<div class="cl"></div>');
		dataArray.push('</div>');
	}
	$("#bjqBody").append(dataArray.join(''));
}

/**
 * 关闭打赏窗口
 */
function closeRewarBox(){
	$("#rewardBox,#rewardBoxShade").hide();
}

/**
 * 班级圈打赏
 */
function bjqRewarSave(){
	
	if(!$("#rewarMoney").val()){
		PB.prompt("需要输入打赏金额哦！");
		return;
	}
	var submitData = {
		appid: ApiParamUtil.REWARD_INFO_BEFORE_SAVE_CHECK,
		dataid: $("#rewarDataid").val(),
		amounts: $("#rewarMoney").val(),
		receiver: $("#rewarReceiver").val(),
		receiverid: $("#rewarReceiverid").val()
	};
	$.post(commonUrl_loadingData, submitData, function(json) {
		var result = typeof json == "object" ? json : JSON.parse(json);
		if(result.ret.code == 200){
			var oWinObj = $("#oWindow");
			$(".blackBg").css("display", "block");
			oWinObj.show();
			closeRewarBox();
		}else if(result.ret.code == 500){
			closeRewarBox();
			jumpWXPay();
		}else if(result.ret.code == 400 && result.ret.msg =="nopassword"){
			PB.prompt('您未设置支付密码！<br/><span id="remainTime">5</span>秒后跳转到个人中心—修改/设置密码', 'forever');
			var time = 5;
			setInterval(function() { 
				time--;
				$("#remainTime").html(time); }
		    , 1000);
			setTimeout("forgetPassword()", 5000);
		}else{
			closeRewarBox();
			PB.prompt(result.ret.msg);
		}
	});
}

function closePasswordBox() {
	closeRewardPasswordBox();
	index = 0;
	for (var i = 0; i < 6; i++) {
		$(passwords.elements[i]).val('');
	}
}
function closeRewardPasswordBox() {
	$("#oWindow").hide();
	$(".blackBg").hide();
}

function rewardMoney(){
	var submitData = {
			appid: ApiParamUtil.REWARD_INFO_SAVE,
			dataid: $("#rewarDataid").val(),
			amounts: $("#rewarMoney").val(),
			receiver: $("#rewarReceiver").val(),
			receiverid: $("#rewarReceiverid").val(),
			password:check_pass_word
		};
		$.ajax({
			cache: false,
			type: "POST",
			url: commonUrl_loadingData,
			data: submitData,
			success: function(datas){
				var result = typeof datas === "object" ? datas : JSON.parse(datas);
				$("#password .pass").val('');
				if (result.ret.code === "200") {
					closeRewardPasswordBox();
					getRewar($("#rewarDataid").val());
					PB.prompt("谢谢打赏！");
				} else if (result.ret.code === "400") {
					PB.prompt('密码错误，请重试！');
				} else {
					console.log(result.ret.code+":"+result.ret.msg);
				}
			}
		});
}

/**
 * 跳转设置打赏密码
 */
function forgetPassword() {
	window.location.href = commonUrl_loadingPage + "&appid=" + ApiParamUtil.PAYMENT_PASSWORD_FORM_JUMP + "&fromappid=" + $("#appid").val();
}

/**
 * 余额不足跳转微信支付
 */
function jumpWXPay(){
	var submitData = {
		appid: ApiParamUtil.COMMON_WEIXIN_TWO_DIMENSION_CODE,
		dataid: $("#rewarDataid").val(),
		total_fee: $("#rewarMoney").val(),
		receiverid: $("#rewarReceiverid").val(),
		type: ApiParamUtil.REWARD_INFO_SAVE
	};
	$.post(commonUrl_loadingData, submitData, function(json) {
		var result = typeof json == "object" ? json : JSON.parse(json);
		if(result.ret.code == 200){
			$(".QRcodeImg").attr("src", basicParameters.ctx+result.data);
			$("#QRcodeBox,#QRcodeBoxShade").show();
		}else{
			var msg = "微信支付失败，请稍后重试~";
			if(result.ret.msg)msg=result.ret.msg;
			PB.prompt(msg);
		}
	});
}

/**
 * 获取班级圈打赏列表
 */
function getRewar(dataid){
	var submitData = {
			appid 	:  ApiParamUtil.REWARD_QUERY_LIST,
			dataid	: dataid
	};
	$.post(commonUrl_loadingData, submitData, function(json) {
		var result = typeof json == "object" ? json : JSON.parse(json);
		if(result.ret.code == 200){
			if($("#rewardUserList"+dataid).parent().find(".arrowLine").length==0 && result.data.rewardList !== 0){
				$("#rewardUserList"+dataid).before('<div class="arrowLine"><span></span></div>');
			}
			$("#rewardUserList"+dataid).find(".rewarUser").remove();
			$("#rewardUserList"+dataid).find(".andSoOn").remove();
			if(result.data.rewardList != null && result.data.rewardList.length > 0){
				$("#rewardUserList"+dataid).removeClass("hide");
				for (var i = 0; i < result.data.rewardList.length; i++) {
					if(i >= 5){
						$("#rewardUserList"+dataid).append('<span class="hide" class="rewarUser" id="reward'+dataid+'User'+result.data.rewardList[i].userid+'">' 
								+ result.data.rewardList[i].username + '</span>');
						if(i == result.data.rewardList.length - 1){
							$("#rewardList"+dataid).append('<div class="andSoOn">等' + result.data.rewardList.length + '人</div>');
						}
					}else{
						$("#rewardUserList"+dataid)
						.append('<span class="rewarUser" id="reward'+dataid+'User'+result.data.rewardList[i].userid+'">' 
							+ result.data.rewardList[i].username + '</span>');
					}
					
				}
			}else{
				$("#rewardUserList"+dataid).addClass("hide");
			}
		}
	});
}

function closeToolBox(){
	var otherCheckedButBox = $(".buttonBox.checked");
	otherCheckedButBox.removeClass("checked");
	otherCheckedButBox.animate({width:"0"},300);
	otherCheckedButBox.hide(300);
	$("#buttonBoxShade").hide();
}

/**
 * 显示打赏窗口
 */
function showRewardBox(dataid,receiver,receiverid){
	closeToolBox();
	if(receiverid == $("#userid").val()){
		PB.prompt("不能给自己打赏！");
		return;
	}
	
	var rewardUseridArray = new Array();
	$('#rewardUserList'+dataid).find(".rewardSpan").each(function(){
		rewardUseridArray.push($(this).attr("userid"));
	});
	var rewardUserids = rewardUseridArray.join(',');
	if((new RegExp(","+basicParameters.userid+",")).test(","+rewardUserids+",")){
		PB.prompt("已打赏过！");
		closeRewarBox();
		return;
	}
	$("#rewardBox,#rewardBoxShade").show();
	var money = (Math.random()*parseInt(IS_APPID_BJQ_REWARD_MAXIMUM)).toFixed(1);
	if(money<IS_APPID_BJQ_REWARD_MINIMUM){
		money = (parseFloat(money) + parseInt(IS_APPID_BJQ_REWARD_MINIMUM)).toFixed(1);
	}
	
	$("#rewarMoney").attr("min",IS_APPID_BJQ_REWARD_MINIMUM);
	$("#rewarMoney").attr("max",IS_APPID_BJQ_REWARD_MAXIMUM);
		
//	var money =  Math.random().toFixed(2);
	if(money=="0.0")money="0.1";
	$("#rewarMoney").val(money);
	$("#rewarDataid").val(dataid);
	$("#rewarReceiver").val(receiver);
	$("#rewarReceiverid").val(receiverid);
}

function showTooLBtnBox(node){
	var checkedButBox = $(node).parent().find(".buttonBox");
	
	if(!checkedButBox.hasClass("checked")){
		var otherCheckedButBox = $(".buttonBox.checked");
		otherCheckedButBox.removeClass("checked");
		otherCheckedButBox.animate({width:"0"},300);
		otherCheckedButBox.hide(300);
		checkedButBox.show();
		checkedButBox.animate({width:bjqBtnConfig.btnBoxWidth},300);
		checkedButBox.addClass("checked");
		$("#buttonBoxShade").show();
	}else{
		checkedButBox.animate({width:"0"},300,function(){
			checkedButBox.removeClass("checked");
			$("#buttonBoxShade").hide();
		});
		checkedButBox.hide(300);
	}
}

/**
 * 组装班级圈内容
 * @param data
 */
function assemblePic(data){
	var picArray = new Array();
	picArray.push('<div class="pic parent">');
	if(data.fileList != null){
		for (var j = 0; j < data.fileList.length; j++) {
			if(data.fileList[j].filetype=="mp3"){
				picArray.push('<div class="jp-details" onclick="openAudioDetail('+data.fileList[j].filename+')">');
				picArray.push('<div class="jp-cover">');
				picArray.push('<img alt="" src="'+ctx+'/static/styles/wxStyle2/css/fonts/ic_play_circle_outline_48px_white.svg" class="palyimg" />');
				picArray.push('<img src="'+data.fileList[j].qiniufile+'">');
				picArray.push('</div>');
				picArray.push('<div class="jp-info">');
				picArray.push('<div class="jp-title" aria-label="title">'+data.title+'</div>');
				picArray.push('<div class="jp-album" aria-label="album">'+content+'</div>');
				picArray.push('</div>');
				picArray.push('</div>');
			}else if(data.fileList[j].filetype=="mp4" || (data.fileList[j].qiniufile).indexOf(".mp4")>-1){
						
				picArray.push('<div class="imgOnly">');
				var coverUrl=data.filename;
				if(coverUrl!=null && coverUrl!='' && coverUrl!='null'){
					picArray.push('<video style="width:100%;height:200" poster="'+data.filename+'@50q.jpg" preload="none" controls="controls"><source src="'+data.fileList[j].qiniufile+'?avthumb/mp4" type="video/mp4"></video>');
				}else{
					picArray.push('<video style="width:100%;height:200" preload="none" controls="controls"><source src="'+data.fileList[j].qiniufile+'?avthumb/mp4" type="video/mp4"></video>');
				}
				picArray.push('</div>');
			}else{
				var noMR = "";
				if((j+1) % 3 == 0){
					noMR = "noMR ";
				}
				var className = "";
				if(data.fileList.length > 1){
					className = noMR + "img";
				}else{
					className = "imgOnly";
				}
				picArray.push('<div class="'+ className +'">');
				picArray.push('<a onclick="wxImageShow(this)">');
				picArray.push('<img alt="'+ data.content +'" src="'+ checkQiniuUrl(data.fileList[j].qiniufile)+'" />');
				picArray.push('</a>');
				picArray.push('</div>');
			}
		}
	}
	picArray.push('</div>');
	return picArray.join('');
}

/**
 * 组装打赏
 * @param data
 * @returns
 */
function assembleReward(data){
	var rewArray = new Array();
	if(data.rewardList != null && data.rewardList.length > 0 ){
		rewArray.push('<div onclick="showReward(this);" class="rewardUserList" id="rewardUserList'+data.id+'">');
	}else{
		rewArray.push('<div onclick="showReward(this);" class="rewardUserList hide" id="rewardUserList'+data.id+'">');
	}
	rewArray.push('<span class="icon_sprite_outer"><i class="gopng_currency_red"></i></span>');
	if(data.rewardList != null && data.rewardList.length > 0 ){
		for (var j = 0; j < data.rewardList.length; j++) {
			if(j >= 5){
				rewArray.push('<span class="rewardSpan hide" id="reward'+data.id+'User'+data.rewardList[j].userid+'" userid="'+data.rewardList[j].userid+'">' + data.rewardList[j].username + '</span>');
				if(j == data.rewardList.length -1){
					rewArray.push('<div class="andSoOn">等'+data.rewardList.length+'人</div>');
				}
			}else{
				rewArray.push('<span id="reward'+data.id+'User'+data.rewardList[j].userid+'" class="rewardSpan" userid="'+data.rewardList[j].userid+'">' + data.rewardList[j].username + '</span>');
			}
		}
	}
	rewArray.push('</div>');
	return rewArray.join('');
}

/**
 * 组装点赞
 * @param data
 * @returns
 */
function assemblePraise(data){
	var praArray = new Array();
	if(data.wxXxPraiseList != null && data.wxXxPraiseList.length > 0 ){
		praArray.push('<div onclick="showPraised(this);" class="praiseUserList" id="praiseUserList'+data.id+'">');
	}else{
		praArray.push('<div onclick="showPraised(this);" class="praiseUserList hide" id="praiseUserList'+data.id+'">');
	}
	praArray.push('<span class="icon_sprite_outer"><i class="gopng_heart_red"></i></span>');
	if(data.wxXxPraiseList != null && data.wxXxPraiseList.length > 0 ){
		for (var j = 0; j < data.wxXxPraiseList.length; j++) {
			if(j >= 5){
				praArray.push('<span class="hide praiseUser" id="praise'+data.id+'User'+data.wxXxPraiseList[j].userid+'">' + data.wxXxPraiseList[j].username + '</span>');
				if(j == data.wxXxPraiseList.length -1){
					praArray.push('<div class="andSoOn">等'+data.wxXxPraiseList.length+'人</div>');
				}
			}else{
				praArray.push('<span class="praiseUser" id="praise'+data.id+'User'+data.wxXxPraiseList[j].userid+'">' + data.wxXxPraiseList[j].username + '</span>');
			}
		}
	}
	praArray.push('</div>');
	return praArray.join('');
}

/**
 * 组装评论
 * @param data
 * @returns
 */
function assembleDiscuss(data){
	var disArray = new Array();
	if(data.commentList == null){
		disArray.push('<div id="discuss'+ data.id +'" class="discuss hide">');
	}else{
		disArray.push('<div id="discuss'+ data.id +'" class="discuss">');
	}
	disArray.push('');
	disArray.push('<div class="discussBox comment">');
	disArray.push('<ul>');
	if(data.commentList != null){
		for (var j = 0; j < data.commentList.length; j++) {
			var comment = data.commentList[j];
			var receiver = "";
			if(comment.receiverid != "0"){
				receiver = "";
			}
			disArray.push('<li onclick="setWlzyIdAndReceiver('+ data.id +','+ comment.publisherid +','+ comment.id +');">');
			disArray.push('<span>' +comment.publisher +'</span>');
			if(comment.receiverid != "0"){
				disArray.push('回复<span>'+ comment.receiver +'</span>');
			}
			disArray.push('：'+comment.content);
			disArray.push('</li>');
		}
	}
	disArray.push('</ul>');
	disArray.push('</div>');
	return disArray.join('');
}

function installXcBox(datas){
	var userid = $("#userid").val();
	var str = "";
	for (var i = 0; i < datas.length; i++) {
		var publisherpic = "";
		if(datas[i].publisherpic == null || datas[i].publisherpic == ""){
			publisherpic = ctx + "/static/styles/wxStyle/images/publisherpic.png";
		}else{
			publisherpic = datas[i].publisherpic;
		}
		var content=datas[i].content;
		if(datas[i].content=="undefined" || datas[i].content==undefined || datas[i].content==null){
			content="";
		}
		var imgBox = "";
		if(datas[i].fileList != null){
			for (var j = 0; j < datas[i].fileList.length; j++) {
				if(datas[i].fileList[j].filetype=="mp3"){
					imgBox='<div class="jp-details" onclick="openAudioDetail('+datas[i].fileList[j].filename+')">'
						+  '<div class="jp-cover">'
						+  '<img alt="" src="'+ctx+'/static/styles/wxStyle2/css/fonts/ic_play_circle_outline_48px_white.svg" class="palyimg" />'
						+  '<img src="'+datas[i].fileList[j].qiniufile+'">'
						+  '</div>'
						+  '<div class="jp-info">'
						+  '<div class="jp-title" aria-label="title">'+datas[i].title+'</div>'
						+  '<div class="jp-album" aria-label="album">'+content+'</div>'
						+  '</div>'
						+  '</div>';
					content="";
				}else{
					var noMR = "";
					if((j+1) % 3 == 0){
						noMR = "noMR ";
					}
					var className = "";
					if(datas[i].fileList.length > 1){
						className = noMR + "img";
					}else{
						className = "imgOnly";
					}
					imgBox += '<div class="'+ className +'">'
						   +  '		<a onclick="wxImageShow(this)">'
						   +  '			<img alt="'+ datas[i].content +'" src="'+ checkQiniuUrl(datas[i].fileList[j].qiniufile)+'" />'
						   +  '		</a>'
						   +  '</div>';
				}
				
			}
		}
		
		var likeText = "";
		if(datas[i].isPraise==0){
			likeText = "点赞";
		}else{
			likeText = "取消";
		}
		var likeBtn = '<button onclick="savePraise(this,'+ datas[i].id +')">'
					+ '		<span id="like_label'+ datas[i].id +'">'+likeText+'</span>'
					+ '		<div class="cl"></div>'
					+ '</button>';
		var ifhide = " hide";
		var peopList = "";
		if(datas[i].wxXxPraiseList != null && datas[i].wxXxPraiseList.length > 0 ){
			for (var j = 0; j < datas[i].wxXxPraiseList.length; j++) {
				if(j >= 5){
					peopList += '<span class="hide" id="praise'+datas[i].id+'User'+datas[i].wxXxPraiseList[j].userid+'">' + datas[i].wxXxPraiseList[j].username + '</span>';
					if(j == datas[i].wxXxPraiseList.length -1){
						peopList += '<div class="andSoOn">等'+datas[i].wxXxPraiseList.length+'人</div>';
					}
				}else{
					peopList += '<span id="praise'+datas[i].id+'User'+datas[i].wxXxPraiseList[j].userid+'">' + datas[i].wxXxPraiseList[j].username + '</span>';
				}
			}
			ifhide = '';
		}
		var hide = "";
		if(datas[i].commentList == null || parseInt(IS_APPID_BJQ_COMMENT)==0){
			hide = ' style="display:none;"';
		}
		var discussBox = "";
		if(datas[i].commentList != null){
			for (var j = 0; j < datas[i].commentList.length; j++) {
				var comment = datas[i].commentList[j];
				var receiver = "";
				if(comment.receiverid != "0"){
					receiver = "回复<span>"+ comment.receiver +"</span>";
				}
				
				discussBox += '<li onclick="setWlzyIdAndReceiver('+ datas[i].id +','+ comment.publisherid +','+ comment.id +');">'
						   +  '		<span>' +comment.publisher +'</span>'
						   +  		receiver
						   +  '：'
						   +  		comment.content
						   +  '</li>';
			}
		}
		var delBtn = "";
		if(datas[i].publisherid == $("#userid").val()){
			delBtn = '<span class="del" onclick="delWlzy('+ datas[i].id +')">删除</span>';
		}
		var hideDiscuss = "";
		if(parseInt(IS_APPID_BJQ_COMMENT)==0){
			hideDiscuss = " hide";
		}
		
		str += '<div id="xcBox'+ datas[i].id +'" class="xcBox">'
			+  '	<div class="l">'
			+  '		<div class="img">'
			+  '			<img alt="" src = '+ publisherpic +' />'
			+  '		</div>'
			+  '	</div>'
			+  '	<div class="r">'
			+  '		<div class="nameAndTime">'
			+  '			<span class="name">'+ datas[i].publisher +'</span>'
			+  '			<span name="publishdate" class="time">'+ datas[i].publishdate +'</span>'
			+  '		</div>'
			+  '		<div class="content comment">'+ content +'</div>'
			+  '		<div class="pic parent">'
			+				imgBox
			+  '		</div>'
			+  '		<div id="like'+ datas[i].id +'" class="like">'
			+  				likeBtn
			+  				delBtn
			+  '			<button class="discussBtn'+hideDiscuss+'" onclick="setWlzyId('+ datas[i].id +');">评论</button>'
			+  '		</div>'
			+  '		<div onclick="showPraised(this);" class="praiseUserList'+ifhide+'" id="praiseUserList'+datas[i].id+'">'
			+  '			<span class="icon_sprite_outer"><i class="gopng_heart_red"></i></span>'
			+  				peopList
			+  '		</div>'
			+  '		<div id="discuss'+ datas[i].id +'" class="discuss"'+ hide +'>'
			+  '			<div class="arrowLine"><span></span></div>'
			+  '			<div class="discussBox comment">'
			+  '				<ul>'
			+  						discussBox
			+  '				</ul>'
			+  '			</div>'
			+  '		</div>'
			+  '	</div>'
			+  '	<div class="cl"></div>'
			+  '</div>';
	}
	$("#bjqBody").append(str);
}

function conformMsg(title,msg,id){
	if(!title){
		title = "提示";
	}
	if(!msg){
		msg = "确认删除？";
	}
	var conformDiv = $('<div id="conformDiv" style="top:50%;height:200px;margin-top:-100px;left:10%;right:10%;background:white;position:fixed;z-index:9999;"></div>').appendTo($("body"));
    var titleDiv = $('<div style="width:90%;margin:0 3%;padding:0 2%;height:65px;line-height:65px;font-size:18px;color:#39ac13;font-weight:bold;border-bottom:1px solid #bababa;">'+ title +'</div>').appendTo(conformDiv);
    var msgDiv = $('<div style="width:90%;margin:0 3%;padding:0 2%;height:84px;line-height:84px;font-size:16px;">'+ msg +'</div>').appendTo(conformDiv);
    var btnBox = $('<div style="width:100%;height:49px;border-top:1px solid #d5d5d5;background:#d5d5d5;"></div>').appendTo(conformDiv);
    var btnDivL = $('<div style="width:50%;height:49px;float:left;"></div>').appendTo(btnBox);
    var btnDivR = $('<div style="width:50%;height:49px;float:left;"></div>').appendTo(btnBox);
    var cancelBtn = $('<div style="margin:0 1px 0 0;height:49px;line-height:49px;background:white;text-align:center;cursor:pointer;" onclick="removeConformDiv()">取消</div>').appendTo(btnDivL);
    var enterBtn = $('<div style="margin:0;height:49px;line-height:49px;background:white;text-align:center;cursor:pointer;" onclick="realDel('+ id +')">确定</div>').appendTo(btnDivR);
    var coverDiv = $('<div id="coverDiv" style="top:0;bottom:0;left:0;right:0;position:fixed;background:black;filter:alpha(opacity:30);opacity:0.3;z-index:9998;"></div>').appendTo($("body"));
}

function removeConformDiv(){
	$("#conformDiv").remove();
	$("#coverDiv").remove();
}

function  initImgCss(){
	var imgDivs = $(".img");
	for (var i = 0; i < imgDivs.length; i++) {
		//外面边框的的高宽比例
		var H_W = imgDivs.eq(i).height() / imgDivs.eq(i).width();
		//图片的高宽比例
		var h_w = imgDivs.eq(i).find("img").height() / imgDivs.eq(i).find("img").width();
		if(H_W > 1 && H_W > h_w){
			maxHeight(imgDivs.eq(i));
		}else if(H_W > 1 && H_W < h_w){
			maxWidth(imgDivs.eq(i));
		}else if(H_W < 1 && H_W > h_w){
			maxHeight(imgDivs.eq(i));
		}else if(H_W < 1 && H_W < h_w){
			maxWidth(imgDivs.eq(i));
		}else if(H_W = 1 && h_w > 1){
			maxWidth(imgDivs.eq(i));
		}else if(H_W = 1 && h_w < 1){
			maxHeight(imgDivs.eq(i));
		}else{
			maxHeightAndWidth(imgDivs.eq(i));
		}
	}
}

function maxWidth(obj){
	obj.find("img").css("width","100%");
	obj.find("img").css("top","50%");
	obj.find("img").css("margin-top",-obj.find("img").height()/2);
}

function maxHeight(obj){
	obj.find("img").css("height","100%");
	obj.find("img").css("left","50%");
	obj.find("img").css("margin-left",-obj.find("img").width()/2);
}

function maxHeightAndWidth(obj){
	obj.find("img").css("top","0");
	obj.find("img").css("left","0");
	obj.find("img").css("height","100%");
	obj.find("img").css("width","100%");
}

function setHASW(){
	var imgDivs = $(".img");
	for (var i = 0; i < imgDivs.length; i++) {
		imgDivs.eq(i).css("height",imgDivs.eq(i).width());
	}
}

function findClassPhotoinfo(){
	$("#grxcBody").html("");
	grxcDataCount = 0;
	$("#bjq_tab").addClass("current");
	$("#grxc_tab").removeClass("current");
	$("#bjq_content").css("display","block");
	$("#grxc_content").css("display","none");
	type = 1;
	if(bjqDataCount<1){
		$("#nowPage").val(0);
		loadBjqList();
	}
}

function findPersonPhotoinfo(){
	$("#bjqBody").html("");
	$("#grxcBody").html("");
	bjqDataCount = 0;
	$("#bjq_tab").removeClass("current");
	$("#grxc_tab").addClass("current");
	$("#bjq_content").css("display","none");
	$("#grxc_content").css("display","block");
	type = 2;
	if(grxcDataCount<1){
		$("#nowPage").val(0);
		loadGrxcList();
	}
}

function queryClassPhotoinfo(){
	$("#bjqBody").html("");
	$("#grxcBody").html("");
	grxcDataCount = 0;
	$("#bjq_tab").addClass("current");
	$("#grxc_tab").removeClass("current");
	$("#bjq_content").css("display","block");
	$("#grxc_content").css("display","none");
	type = 1;
	$("#nowPage").val(0);
	loadBjqList();
}


function jumpToMsgPage(){
	location.href = ctx+"/mobile/loading_page?orgcode="+$("#orgcode").val()+"&campusid="+$("#campusid").val()+"&stuid="+$("#stuid").val()+"&userid="+$("#userid").val()+"&appid="+$("#msg_appid").val();
}

function installGrxcXcBox(datas){
	var lastTime = $("#grxcBody").find(".selfBox:last").find(".l").find("input[type=hidden]").val();
	var str = "";
	//按天数循环
	for (var i = 0; i < datas.length; i++) {
		var dayBox = "";
		//循环一天中的记录条数
		for (var j = 0; j < datas[i].length; j++) {
			//每条信息的变量
			var imgOrText = "";
			var filetype="";
			if(datas[i][j].fileList != null && datas[i][j].fileList != undefined){
				//照片变量
				var photoBox = "";
				//3个if分别为图片是1张、3张和其他情况
				if(datas[i][j].fileList.length == 1){
					
						//组装图片table
					photoBox += '<div class="img">'
							 +  '	<a onclick="wxImageShow(this)">'
							 +  '		<img alt="" src="' + checkQiniuUrl(datas[i][j].fileList[0].qiniufile) + '" />'
							 +  '	</a>'
							 +  '</div>';
					filetype=datas[i][j].fileList[0].filetype;
				}else if(datas[i][j].fileList.length == 3){
					//组装图片table
					photoBox += '<table width="100%" height="100%">'
							 +  '	<tr>'
							 +  '		<td rowspan="2" style="width:50%;">'
							 +  '			<div class="imgs">'
							 +  '				<a onclick="wxImageShow(this)">'
							 +  '					<img alt="" src="' + checkQiniuUrl(datas[i][j].fileList[0].qiniufile) + '" />'
							 +  '				</a>'
							 +  '			</div>'
							 +  '		</td>'
							 +  '		<td style="width:50%;">'
							 +  '			<div class="imgs">'
							 +  '				<a onclick="wxImageShow(this)">'
							 +  '					<img alt="" src="' + checkQiniuUrl(datas[i][j].fileList[1].qiniufile) + '" />'
							 +  '				</a>'
							 +  '			</div>'
							 +  '		</td>'
							 +  '	</tr>'
							 +  '	<tr>'
							 +  '		<td style="width:50%;">'
							 +  '			<div class="imgs">'
							 +  '				<a onclick="wxImageShow(this)">'
							 +  '					<img alt="" src="' + checkQiniuUrl(datas[i][j].fileList[2].qiniufile) + '" />'
							 +  '				</a>'
							 +  '			</div>'
							 +  '		</td>'
							 +  '	</tr>'
							 +  '</table>';
				}else if(datas[i][j].fileList.length > 1 && datas[i][j].fileList.length != 3){
					//个人相册中，一条信息展示，最多显示4张，所以循环限制在4以内
					var td = "";
					//循环组装图片table
					for (var k = 0; k < datas[i][j].fileList.length; k++) {
						if(k <= 3){
							var tr = "";
							var _tr = "";
							if(k == 0 || k % 2 == 0){
								tr = "<tr>";
							}
							if((k+1) % 2 == 0){
								_tr = "</tr>";
							}
							td += tr
							   +  '<td style="width:50%;">'
							   +  '		<div class="imgs">'
							   +  '			<a onclick="wxImageShow(this)">'
							   +  '				<img alt="" src="'+ checkQiniuUrl(datas[i][j].fileList[k].qiniufile) +'" />'
							   +  '			</a>'
							   +  '		</div>'
							   +  '</td>'
							   +  _tr;
						}else{
							td += '	<a onclick="wxImageShow(this)" style="display:none;">'
							   +  '		<img alt="" src="'+ checkQiniuUrl(datas[i][j].fileList[k].qiniufile) +'" />'
							   +  '	</a>';
						}
					}
					photoBox += '<table width="100%" height="100%">'
							 +  	td		
							 +  '</table>';
				}
				if(filetype=="mp3"){
					imgOrText='<div class="jp-details" onclick="openAudioDetail('+datas[i][j].fileList[0].filename+')">'
					+  '<div class="jp-cover">'
					+  '<img alt="" src="'+ctx+'/static/styles/wxStyle2/css/fonts/ic_play_circle_outline_48px_white.svg" class="palyimg" />'
					+  '<img src="'+datas[i][j].fileList[0].qiniufile+'">'
					+  '</div>'
					+  '<div class="jp-info">'
					+  '<div class="jp-title" aria-label="title">'+datas[i][j].title+'</div>'
					+  '<div class="jp-album" aria-label="album">'+datas[i][j].content+'</div>'
					+  '</div>'
					+  '</div>';
					
				}else{
					imgOrText += '<div class="imgBox">'
						  +  	photoBox
						  +  '</div>'
						  +  '<div class="info" onclick="openPhotoDetail('+datas[i][j].id+')">'
						  +  '	<div class="content">' + datas[i][j].content + '</div>'
						  +  '	<div class="picNum">共' + datas[i][j].fileList.length + '张</div>'
						  +  '</div>';
				}
				
			}else{
			//这是没有照片的情况，只显示文字
				imgOrText += '<div class="noPic" onclick="openPhotoDetail('+datas[i][j].id+')">'
						  +		datas[i][j].content
						  +  '</div>';
			}
			dayBox += '<div class="dayList comment">'
				   +  		imgOrText
				   +  '</div>';
		}

		//增加列表的时候判断是否和最后一条数据的日期相同，如果相同，不显示时间
		var day = datas[i][0].publishdate.substring(8,10);
		var month = datas[i][0].publishdate.substring(5,7) + "月";
		if(lastTime == datas[i][0].publishdate.substring(0,10)){
			day = "";
			month = "";
		}
		
		//增加每天列表
		str += '<div class="selfBox">'
			+  '	<div class="l">'
			+  '		<h1>' + day + '</h1>'
			+  '		<h6>' + month + '</h6>'
			+  '	</div>'
			+  '	<div class="r parent">'
			+			dayBox
			+  '	</div>'
			+  '	<div class="cl"></div>'
			+  '</div>';
	}
	$("#grxcBody").append(str);
}

function openAudioDetail(resourceid){
	var url = commonUrl_loadingPage+'&appid=20710913&dataid='+resourceid+'&stuid='+$("#stuid").val();
	location.href = url;
}

function openPhotoDetail(id,filetype){
	var url = commonUrl_loadingPage+'&appid=207101406&dataid='+id+'&stuid='+$("#stuid").val()+"&usertype="+$("#usertype").val()+"&type=2";
//	var url = ctx + "/mobile/getPersonPhotoDetailForWx/"+$("#orgcode").val()+"/"+$("#campusid").val()+"/"+$("#userid").val()+"/" + id;
	location.href = url;
}

function initGrxcInfo(){
	var dayList = $(".dayList");
	for (var i = 0; i < dayList.length; i++) {
		if(dayList.eq(i).find(".info").length > 0){
			dayList.eq(i).find(".info").eq(0).css("width",dayList.eq(i).width()-dayList.eq(i).find(".imgBox").eq(0).width()-6);
		}
	}
	
	var imgDiv = $(".img");
	for (var i = 0; i < imgDiv.length; i++) {
		if(imgDiv.eq(i).find("img").height() < imgDiv.eq(i).find("img").width()){
			imgDiv.eq(i).find("img").css("height","100%");
			imgDiv.eq(i).find("img").css("left","50%");
			imgDiv.eq(i).find("img").css("margin-left",-imgDiv.eq(i).find("img").width()/2);
		}else{
			imgDiv.eq(i).find("img").css("width","100%");
			imgDiv.eq(i).find("img").css("top","50%");
			imgDiv.eq(i).find("img").css("margin-top",-imgDiv.eq(i).find("img").height()/2);
		}
	}
	
	var imgDivs = $(".imgs");
	for (var i = 0; i < imgDivs.length; i++) {
		//外面边框的的高宽比例
		var H_W = imgDivs.eq(i).height() / imgDivs.eq(i).width();
		//图片的高宽比例
		var h_w = imgDivs.eq(i).find("img").height() / imgDivs.eq(i).find("img").width();
		if(H_W > 1 && H_W > h_w){
			maxHeight(imgDivs.eq(i));
		}else if(H_W > 1 && H_W < h_w){
			maxWidth(imgDivs.eq(i));
		}else if(H_W < 1 && H_W > h_w){
			maxHeight(imgDivs.eq(i));
		}else if(H_W < 1 && H_W < h_w){
			maxWidth(imgDivs.eq(i));
		}else if(H_W = 1 && h_w > 1){
			maxWidth(imgDivs.eq(i));
		}else if(H_W = 1 && h_w < 1){
			maxHeight(imgDivs.eq(i));
		}else{
			maxHeightAndWidth(imgDivs.eq(i));
		}
	}
	
	var content = $(".content");
	for (var i = 0; i < content.length; i++) {
		if(content.eq(i).html().length > 35){
			content.eq(i).html(content.eq(i).html().substr(0,35) + "...");
		}
	}
}

function showReward(obj){
	var hasHide = $(obj).find("span").hasClass("hide");
	$(obj).find("span").removeClass("hide");
	if(!hasHide){
		for (var i = 0; i < $(obj).find("span").length; i++) {
			if(i >= 5){
				$(obj).find("span").eq(i).addClass("hide");
			}
		}
		$(obj).find(".andSoOn").removeClass("hide");
	}else{
		$(obj).find(".andSoOn").addClass("hide");
	}
}

function showPraised(obj){
	var hasHide = $(obj).find("span").hasClass("hide");
	$(obj).find("span").removeClass("hide");
	if(!hasHide){
		for (var i = 0; i < $(obj).find("span").length; i++) {
			if(i >= 5){
				$(obj).find("span").eq(i).addClass("hide");
			}
		}
		$(obj).find(".andSoOn").removeClass("hide");
	}else{
		$(obj).find(".andSoOn").addClass("hide");
	}
}


function showSelectBox(obj){
	if($("#"+obj).find("ul").children().length > 0){
		if(obj=="stuList")$(".checkAll").css("display","none");
		$(".selectList").css("display","block");
		$(".blackBg").css("display","block");
		$("#"+obj).css("display","block");
		var height = 0;
		if($("#"+obj).attr("class") == "double"){
			$("#"+obj).css("height",$(".selectList").height());
			$("#"+obj).find("ul").css("height",$(".selectList").height()-50);
			var objList;
			if($("#"+obj+"Value").val() != ""){
				objList = $("#"+obj+"Value").val().split(",");
				var liList = $("#"+obj).find("li");
				for (var j = 0; j < liList.length; j++) {
					for (var i = 0; i < objList.length; i++) {
						if(objList[i] == liList.eq(j).find("input[type=hidden]").val()){
							liList.eq(j).find("img").attr("alt","checked");
							liList.eq(j).find("img").attr("src",ctx+"/static/styles/bjq/img/checked.png");
							liList.eq(j).find("input[type=hidden]").attr("name","checked");
							liList.eq(j).find("span[class=le]").attr("name","checkedName");
							break;
						}else{
							liList.eq(j).find("img").attr("alt","check");
							liList.eq(j).find("img").attr("src",ctx+"/static/styles/bjq/img/check.png");
							liList.eq(j).find("input[type=hidden]").attr("name","check");
							liList.eq(j).find("span[class=le]").attr("name","checkName");
						}
					}
				}
			}else{
				$("#"+obj).find("img").attr("alt","check");
				$("#"+obj).find("img").attr("src",ctx+"/static/styles/bjq/img/check.png");
				$("#"+obj).find("input[type=hidden]").attr("name","check");
				$("#"+obj).find("span[class=le]").attr("name","checkName");
			}
		}else{
			$("#"+obj).css("height",$(".selectList").height());
			$("#"+obj).find("ul").css("height",$(".selectList").height());
		}
		$(".selectList").css("margin-top",-$("#"+obj).parent().height()/2);	
	}
}

/**
 * 获取班级选项列表
 */
function getClassList(){
	var submitData = {
			appid:ApiParamUtil.COMMON_QUERY_CLASS,
			api:ApiParamUtil.COMMON_QUERY_CLASS,
			stuid:basicParameters.stuid,
			usertype : $("#usertype").val()
		};
		$.ajax({
			cache:false,
			type: "POST",
			url: basicParameters.loadingData,
			async:false,
			data: submitData,
			success: function(datas){
				var result = typeof datas === "object" ? datas : JSON.parse(datas);
				if(result.ret.code==="200"){
					createBjList(result.data.bjList);
				}else{
					console.log(result.ret.code+":"+result.ret.msg);
				}
			}
		});
}
/**
 * 创建班级下拉选项
 */
function createBjList(bjData){
	var bjList = new Array();
	bjList.push('<ul>');
	for(var i=0;i<bjData.length;i++){
		bjList.push('<li onclick="isSelect(this);">');
		bjList.push('<span class="le">'+bjData[i].bj+'</span>');
		bjList.push('<input type=hidden value="'+bjData[i].id+'" />');
	}
	bjList.push('</ul>');
	$("#classList").html(bjList.join(''));
	if(bjData=='' || bjData == null || bjData.length===0){
		PB.prompt("没有班级！");
	}else{
		$('#className').html(bjData[0].bj);
		$('#bjid').val(bjData[0].id);
		var defauleSelected = $('#classList input[value='+bjData[0].id+']');
		defauleSelected.attr("name","selected");
		defauleSelected.parent().find("span[class=le]").attr("name","selectedName");
		defauleSelected.parent().addClass("selected");
	}
}

function isSelect(obj){
	$(obj).parent().children().removeAttr("class");
	$(obj).parent().find("span[class=le]").attr("name","selectName");
	$(obj).parent().find("input[type=hidden]").attr("name","select");
	$(obj).attr("class","selected");
	$(obj).find("span[class=le]").attr("name","selectedName");
	$(obj).find("input[type=hidden]").attr("name","selected");
	var boxName = $(obj).parent().parent().attr("id");
	var selectedName = $(obj).find("span[class=le][name=selectedName]");
	var selectedValue = $(obj).find("input[type=hidden][name=selected]");
	$("#className").html(selectedName.html());
	$("#bjid").val(selectedValue.val());
	closeBox();
	PB.prompt("数据载入中，请等待~","forever");
	queryClassPhotoinfo();
}

function closeBox(){
	$(".selectList").css("display","none");
	$(".blackBg").css("display","none");
	$(".single").css("display","none");
	$(".double").css("display","none");
	$(".double").css("height","auto");
	$(".double").find("ul").css("height","auto");
}

function initGhhdTips() {
	var submitData = {
		appid:ApiParamUtil.APPID_GHHD_STAGE_QUERY,
		api:ApiParamUtil.APPID_GHHD_STAGE_QUERY
	};
	$.ajax({
		cache: false,
		type: "POST",
		url: basicParameters.loadingData,
		data: submitData,
		success: function(datas){
			var result = typeof datas === "object" ? datas : JSON.parse(datas);
			if(result.ret.code==="200"){
				if (result.data.stage == 1) {// 报名
					$("#ghhdName").html(result.data.title);
					$("#ghhdInfo").html("活动报名开始啦，点此参加");
					$("#ghhdHref").attr('onclick', 'javascript:window.location.href="' + result.data.url + '"');
					$("#ghhdHref").show();
				} else if (result.data.stage == 2) {// 投票
					$("#ghhdName").html(result.data.title);
					$("#ghhdInfo").html("活动投票开始啦，点此投票");
					$("#ghhdHref").attr('onclick', 'javascript:window.location.href="' + result.data.url + '"');
					$("#ghhdHref").show();
				} else if (result.data.stage == 3) {//  公布结果
					$("#ghhdName").html(result.data.title);
					$("#ghhdInfo").html("活动评选结果出炉啦，点此查看");
					$("#ghhdHref").attr('onclick', 'javascript:window.location.href="' + result.data.url + '"');
					$("#ghhdHref").show();
				} else {
					$("#ghhdHref").hide();
				}
			}else{
				console.log(result.ret.code+":"+result.ret.msg);
			}
		}
	});
}
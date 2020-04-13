/**
 * 设置图片自适应显示中间一部分
 */

//每页数量
var pageSize = 28;
//当前页码
var nowPage = 1;

var wlzytype = $('#param_wlzytype').val();
var albumTotal = $('#param_albumTotal').val();
var albumName = $('#param_albumName').val();
var albumClass = $('#param_albumClass').val();
var sid = $('#sid').val();
var scsid = $('#scsid').val();

var ajax_switch = true;

$(document).ready(function() {
	$('#tagsTextarea').tokenfield({showAutocompleteOnFocus: true,createTokensOnBlur:true,delimiter:" "});
	$('#tagsTextarea').on('tokenfield:createdtoken', function (e) {
		var tags = $('#tagsTextarea').val();
		if(in_array(e.attrs.value,tags.split(' '))){
			PB.prompt('已设置该标签，请不要重复添加！');
			 $(e.relatedTarget).remove();
			return;
		}
	  }).tokenfield()
	$('.album-bottom').hide();
	queryPicList();
	$('#albumTotal').text('（'+albumTotal+'张）');
	$('#albumName').text(albumName);
//	$('#albumClass').text(albumClass);
	$('#albumButton').click(function(){
		changePic();
	});
	$('#btnCancel').click(function(){
		$('#tagsTextBox,.discussBg').hide();
		$('#tagsTextarea').val('');
		$(".token").remove();
	});
	$('#btnConfirm').click(function(){
		saveTags();
	});
	$('#albumTagsBtn').click(function(){
		addTags();
	});
	$('#albumDelBtn').click(function(){
		delImage();
	});
	$('#albumAllBtn').click(function(){
		imageCheckAll(this);
	});
	$('.tokenfield').click(function(){
		$("#tagsTextarea-tokenfield").focus().select();
	});
});

function changePic(){
	$('#albumBox').html('');
	if($('.album-bottom').is(':visible')){
		$('.album-bottom').hide();
		$('#albumButton').text("管理");
		$('.img-check,.image-mask,.image-check').unbind();
		$('.image-mask,.image-check').hide();
		$('.image-check,#albumAllBtn').removeAttr('checked');
		$('#albumAllBtn').removeClass('image-all-checked');
		$('.album-imageBox').unbind();
		$(".album-imageBox").bind("click",function(){
			wxImageShow(this);
		});
		$(".img-uncheck").parent(".album-imageBox").show();
	}else{
		$('.album-bottom').show();
		$('#albumButton').text("完成");
		$(".img-check,.image-mask,.image-check").bind("click",function(){
			imageCheckChange(this);
		});
		$('.album-imageBox').unbind();
	}
	nowPage = 1;
	queryPicList();
}

function hideOtherPic(){
	$(".img-uncheck").parent(".album-imageBox").hide();
	function queryPic(){
		var length = $(".img-check").length;
		var api = ApiParamUtil.ALBUM_PIC_ADD_QUERY;
		var submitData = {
				appid:api,
				api:api,
				wlzytype:wlzytype,
				tag: $('#param_albumName').val(),
				bjids: $('#param_albumClass').val(),
				tagid: $('#param_tagid').val(),
				"pageSize":pageSize,
				"nowPage":nowPage
			};
			$.ajax({
				cache:false,
				type: "POST",
				url: basicParameters.loadingData,
				data: submitData,
				success: function(datas){
					var result = typeof datas === "object" ? datas : JSON.parse(datas);
					if(result.ret.code==="200"){
						createPicList(result.data.imageList);
						nowPageChange();
						removeLoadDiv();
						if(result.data.imageList.length === 0 && nowPage===1){
							noDataDiv();
						}else if(result.data.imageList.length === 0){
							createOverDiv();
						}else{
							removeNoDataDiv();
						}
						if(length<28&&nowPage!=-1){
							queryPic();
						}
					}else{
						console.log(result.ret.code+":"+result.ret.msg);
					}
				}
			});
	}
	$(".img-uncheck").parent(".album-imageBox").hide();
}

/**
 * 设置滑动监听事件
 */
$(document).scroll(function(){
	if(document.body.scrollTop + document.body.clientHeight >= document.body.scrollHeight){
		if(nowPage!==-1&&nowPage!==1){
			createLoadDiv();
			queryPicList();
		}
	}
});

/**
 * 创建加载中提示
 */
function createLoadDiv(){
	PB.prompt("正在加载...","forever");
}
/**
 * 加载完成
 */
function createOverDiv(){
//	PB.prompt("没有数据！");
	nowPage=-1;
}
/**
 * 改变页码
 */
function nowPageChange(){
	nowPage = nowPage + 1;
}
/**
 * 移除数据载入中提示
 */
function removeLoadDiv(){
	PB.promptHide();
	PB.hideShade();
}
/**
 * 创建没有数据提示
 */
function noDataDiv(){
	var div = '<div id="noDataDiv" class="noData">还没有任何数据哦</div>';
	if($("#noDataDiv").length == 0){
		$('.albumList').html(div);
	}
}
/**
 * 移除没有数据提示
 */
function removeNoDataDiv(){
	$('#noDataDiv').remove();
}

/**
 * 获取图片列表
 */
function queryPicList(){
	var myPhoto = 0;
	if($('.album-bottom').is(':visible')){
		myPhoto = 1;
	}else{
		myPhoto = 0;
	}
	var submitData = {
			"pageSize":pageSize,
			myPhoto:myPhoto,
			"nowPage":nowPage
		};
		if(ajax_switch){
			ajax_switch = false;
			$.ajax({
				cache:false,
				type: "POST",
				url: sxc,
				data: submitData,
				success: function(datas){
					var result = typeof datas === "object" ? datas : JSON.parse(datas);
					if(result.ret.code==="200"){
						createPicList(result.data.imageList);
						nowPageChange();
						removeLoadDiv();
						if(result.data.imageList.length === 0 && nowPage===1){
							noDataDiv();
							ajax_switch = false;
						}else if(result.data.imageList.length === 0){
							createOverDiv();
							ajax_switch = false;
						}else{
							removeNoDataDiv();
							ajax_switch = true;
						}
					}else{
						console.log(result.ret.code+":"+result.ret.msg);
						ajax_switch = false;
					}
				}
			});
		}
}

/**
 * 图片列表组装
 */
function createPicList(dataList){
	var albumBox = new Array();
	for(var i=0;i<dataList.length;i++){
		if(i!==0 && (i+1)%4===0){
			albumBox.push('<div class="album-imageBox div-imgMask ">');
		}else{
			albumBox.push('<div class="album-imageBox div-imgMask imageBox-margin">');
		}
		if(sid == scsid){
			albumBox.push('<img alt="image" class="img-pic img-adaptive img-check" src="'+dataList[i].image+'" datetime="'+dataList[i].date+'" >');
		}else{
			albumBox.push('<img alt="image" class="img-pic img-adaptive img-uncheck" src="'+dataList[i].image+'" datetime="'+dataList[i].date+'" >');
		}
		albumBox.push('<div class="image-mask"></div>');
		albumBox.push('<div class="image-check" imageid="'+dataList[i].id+'" ></div>');
		albumBox.push('</div>');
	}
	if(dataList.length !== 0 && nowPage==1)
		$('#albumLastTime').html(dataList[0].date.substring(0,10));
	$('#albumBox').append(albumBox.join(''));
	imagesAdaptive();
	if($('.album-bottom').is(':visible')){
		$('.img-check,.image-mask,.image-check').unbind();
		$(".img-check,.image-mask,.image-check").bind("click",function(){
			imageCheckChange(this);
		});
	}else{
		$('.album-imageBox').unbind();
		$(".album-imageBox").bind("click",function(){
			wxImageShow(this);
		});
	}
}
function imagesAdaptive(){
	$(".img-adaptive").one('load', function() {
		var proportion = $(this).width()/$(this).height();
	 	if($(this).width()>$(this).height()){
	 		var originalWidth = $(this).parent('.div-imgMask').width();
	 		$(this).height(originalWidth);
	 		var changeWidth = originalWidth*proportion;
	 		$(this).width(changeWidth);
	 		$(this).css("margin-left",-Math.round((changeWidth-originalWidth)/2)+"px");
	 		$(this).removeClass('img-adaptive');
	 	}else{
	 		var originalHeight = $(this).parent('.div-imgMask').width();
	 		$(this).width(originalHeight);
	 		var changeHeight = originalHeight/proportion;
	 		$(this).height(changeHeight);
	 		$(this).css("margin-top",-Math.round((changeHeight-originalHeight)/2)+"px");
	 		$(this).removeClass('img-adaptive');
	 	}
	 	$(".div-imgMask").height($(".div-imgMask").width());
	}).each(function() {
		if(this.complete) $(this).load();
	});
}

/**
 * 返回
 */
function cancel(){
	history.go(-1);
}

/**
 * 图片选择状态改变
 */
function imageCheckChange(node){
	var img = $(node).parent().find('.img-check');
	var check = $(node).parent().find('.image-check');
	var mask = $(node).parent().find('.image-mask');
	if(check.attr('checked')===undefined){
		img.nextAll().show();
		check.attr('checked','');
	}else{
		img.nextAll().hide();
		check.removeAttr('checked');
	}
}

/**
 * 图片全选
 */
function imageCheckAll(node){
	if($(node).attr('checked')===undefined){
		$(node).addClass('image-all-checked');
		$('.image-check,.image-mask').show();
		$('.img-check').parent('.album-imageBox').find('.image-check').attr('checked','');
		$(node).attr('checked','')
	}else{
		$(node).removeClass('image-all-checked');
		$('.image-check,.image-mask').hide();
		$('.image-check').removeAttr('checked','');
		$(node).removeAttr('checked')
	}
}

/**
 * 设置标签
 */
function addTags(){
	var checkedImages = $('.image-check[checked]');
	if(checkedImages.length===0){
		PB.prompt('你还没有选择图片哦！');
		return;
	}
	$('#tagsTextBox,.discussBg').show();
	getTagsList();
}

function saveTags(){
	var fileids = new Array();
	$('.image-check[checked]').each(function(){
		fileids.push($(this).attr("imageid"));
	})
	var api = ApiParamUtil.ALBUM_PIC_ADD_TAGS;
	if($('#tagsTextarea').val()===null ||$('#tagsTextarea').val()===""){
		PB.prompt("请输入标签！");
		return;
	}
	var submitData = {
			appid:api,
			api:api,
			fileids:fileids.join(','),
			tags:$('#tagsTextarea').val().replace(/\s/g,",")
		};
		$.ajax({
			cache:false,
			type: "POST",
			url: basicParameters.loadingData,
			data: submitData,
			success: function(datas){
				var result = typeof datas === "object" ? datas : JSON.parse(datas);
				if(result.ret.code==="200"){
					$('#tagsTextBox,.discussBg').hide();
					$('#tagsTextarea').val('');
					$(".token").remove();
				}else{
					console.log(result.ret.code+":"+result.ret.msg);
				}
			}
		});
}

/**
 * 删除图片
 */
function delImage(){
	var url = $('#dellimg').val();
	var checkedImages = $('.image-check[checked]');
	if(checkedImages.length===0){
		PB.prompt('你还没有选择图片哦！');
		return;
	}
	var fileids = new Array();
	checkedImages.each(function(){
		fileids.push($(this).attr("imageid"));
	})
	if(confirm("确定要删除吗？")){
	var submitData = {
			fileids:fileids.join(',')
		};
	    $.post(url,submitData,function(data){
            if(data.result){
                PB.prompt(data.msg);
				location.reload();
            }else{
				PB.prompt(data.msg);
            }
		},'json'); 	
	}
}

//获取标签选项
function getTagsList(){
	var submitData = {
			appid:ApiParamUtil.ALBUM_TOP_TAGS_QUERY,
			top:8,
		};
		$.ajax({
			cache:false,
			type: "POST",
			url: basicParameters.loadingData,
			data: submitData,
			success: function(datas){
				var result = typeof datas === "object" ? datas : JSON.parse(datas);
				if(result.ret.code==="200"){
					createTagsList(result.data.tagList);
				}else{
					console.log(result.ret.code+":"+result.ret.msg);
				}
			}
		});
}

function createTagsList(dataData){
	var dataList = new Array();
	for(var i=0;i<dataData.length;i++){
		if(i !== 0 && (i+1)%4 === 0){
			dataList.push('<button class="btn-tag" onclick="setInputTags(this)">'+dataData[i].tag+'</button>');
		}else{
			dataList.push('<button class="btn-tag margin-right" onclick="setInputTags(this)">'+dataData[i].tag+'</button>');
		}
	}
	if(dataData=='' || dataData == null || dataData.length===0){
		PB.prompt("没有历史标签数据！");
		$('#topTags').hide();
	}else{
		$("#topTags").html(dataList.join(''));
	}
}

//设置标签值
function setInputTags(node){
	var tags = $('#tagsTextarea').val();
	if(tags === null || tags === ""){
		tags = $(node).text();
	}else{
		if(in_array($(node).text(),tags.split(' '))){
			PB.prompt('已设置该标签，请不要重复添加！');
			return;
		}
	}
	$('#tagsTextarea').tokenfield('createToken', $(node).text());
}

function in_array(stringToSearch, arrayToSearch) {
	for (s = 0; s < arrayToSearch.length; s++) {
		thisEntry = arrayToSearch[s].toString();
		if (thisEntry == stringToSearch) {
			return true;
		}
	}
	return false;
}
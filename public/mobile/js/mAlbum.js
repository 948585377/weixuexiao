/**
 * 相册
 */
//每页数量
var pageSize = 6;
//当前页码
var nowPage = 1;
var classids = $('classids').val();
var ajax_switch = true;
$(document).ready(function() {
	//getClassList();
	queryAlbumList();
	$('#jumpAdd').click(function(){
		jumpAdd();
	})
});

/**
 * 设置图片高度
 */
function setImageHeight(){
	if($(".albumCover").length!==0){
		var imageWidth = $(".albumCover")[0].offsetWidth;
		var albumBoxWidth = $(".albumBox")[0].offsetWidth;
		$(".albumBox").height(albumBoxWidth);
		$(".albumCover,.bg-dark,.bg-tint").height(imageWidth);
	}
}

/**
 * 设置滑动监听事件
 */
$(document).scroll(function(){
	if(document.body.scrollTop + document.body.clientHeight >= document.body.scrollHeight){
		if(nowPage!==-1&&nowPage!==1){
			createLoadDiv();
			queryAlbumList();
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
 * 获取相册列表
 */
function queryAlbumList(){
	
	var submitData = {
			pageSize:pageSize,
			nowPage:nowPage
		};
		if(ajax_switch){
			ajax_switch = false;
			$.ajax({
				cache:false,
				type: "POST",
				url: sxclisturl,
				data: submitData,
				success: function(datas){
					
					var result = JSON.parse(datas);
					if(result.ret.code==="200"){
						createAlbumList(result.data.albumList);
						nowPageChange();
						removeLoadDiv();
						if(result.data.albumList.length === 0 && nowPage===1){
							noDataDiv();
							ajax_switch = false;
						}else if(result.data.albumList.length === 0){
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
 * 相册列表组装
 */
function createAlbumList(dataList){
	var albumBox = new Array();
	for(var i=0;i<dataList.length;i++){
		if((i+1)%2!==0){
			albumBox.push('<div class="albumBox albumBox-left">');
		}else{
			albumBox.push('<div class="albumBox albumBox-right">');
		}
		albumBox.push('<a href="javascript:jumpForm(\''+dataList[i].tag+'\',\''+dataList[i].sid+'\',\''+dataList[i].total+'\',\''+dataList[i].tagid+'\')">');
		if(dataList[i].picurl){
			albumBox.push('<div class="albumCover div-imgMask">');
			albumBox.push('<img class="img-adaptive" title="" src="'+dataList[i].picurl+'" >');
			albumBox.push('</div>');
		}else{
			albumBox.push('<img class="albumCover" title="" style="background-color: #e6e6e6;" >');
		}
		albumBox.push('<div class="bg-dark"></div>');
		albumBox.push('<div class="bg-tint"></div>');
		albumBox.push('<div class="ablumBottom" ><span class="ablumName">'+dataList[i].tag+'</span><span class="ablumTotal">（'+dataList[i].total+'张）</span></div>');
		albumBox.push('</a>');
		albumBox.push('</div>');
	}
	albumBox.push('<div class="cl"></div>');
	$('#albumList').append(albumBox.join(''));
	setImageHeight();
	imagesAdaptive();
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
	window.history.go(-1);
}
/**
 * 跳转新增页面
 */
function jumpAdd(){
	var url = basicParameters.loadingPage+"&appid="+ApiParamUtil.ALBUM_PIC_ADD_JUMP;
	if($("#usertype").val()){
		url = url + "&usertype="+$("#usertype").val();
	}
	location.href = url;
}

/**
 * 跳转详情页面
*/
function jumpForm(albumName,sid,total,tagid){
	var url = $('#basicParameters').val()+"&sid="+sid+"&type=1";
	
	location.href = url;
}

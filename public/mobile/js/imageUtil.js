/**
 * 阿里云oos图片参数配置
 */
var cloudLibrary = {domainName:"static.weixiaotong.com.cn",defaultImageConfig:["@",200,"w_",200,"h_",1,"e_",0,"c_",0,"i_",60,"Q_",1,"x_",1,"o","png"]};

/**
 * 阿里云oss图片参数
 * 参数：1、图片地址2、图片类型3、宽4、高
 */
function setOSSImageSize(){
	var imageSrc = arguments[0];
	var imageType =/\.[^\.]+$/.exec(imageSrc);
	cloudLibrary.defaultImageConfig[17]=imageType;
	if(arguments[1])
		cloudLibrary.defaultImageConfig[17]=arguments[1];
	if(arguments[2])
		cloudLibrary.defaultImageConfig[1]=arguments[2];
	if(arguments[3])
		cloudLibrary.defaultImageConfig[3]=arguments[3];
	var imageConfig = cloudLibrary.defaultImageConfig.join("");
	if (imageSrc!=undefined && imageSrc!=null && imageSrc!='' && imageSrc.indexOf(cloudLibrary.domainName) > 0) {
		return imageSrc + imageConfig;
	} else {
		return imageSrc;
	}
}

/**
 * 图片取一半显示
 */
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
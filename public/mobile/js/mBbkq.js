var ctx = $("#ctx").val();
var commonUrl_loadingPage = $("#commonUrl_loadingPage").val();
var firstDay = new Date();
var lastDay = new Date();
var paxyConfig = new Object;
var paxyDateTime = new Date();

$(document).ready(function() {
	$("#leaveBtn").click(function() {
		stuLeave();
	});
	if($('#paxyDateTime').val()){
		paxyDateTime = new Date($('#paxyDateTime').val());
	}
	queryPaxyConfig();
	createPaxyData();
	queryPaxyList();
})

function stuLeave(){
	window.location.href = commonUrl_loadingPage + "&appid=3072&usertype=2&type=3";
}

function queryPaxyConfig(){
	var submitData = {
			api: ApiParamUtil.SCHOOL_KGPZ_QUERY,
			appid: ApiParamUtil.SCHOOL_KGPZ_QUERY
	};
	$.ajax({
		cache:false,
		type: "POST",
		url: basicParameters.loadingData,
		async:false,
		data: submitData,
		success: function(datas){
			var result = typeof datas === "object" ? datas : JSON.parse(datas);
			var data = typeof datas === "object" ? result.data : JSON.parse(result.data);
			paxyConfig.config1 = {e:data.aaData['20710612'],s:data.aaData['20710611']};
			paxyConfig.config2 = {e:data.aaData['20710622'],s:data.aaData['20710621']};
			paxyConfig.config3 = {e:data.aaData['20710632'],s:data.aaData['20710631']};
			paxyConfig.config4 = {e:data.aaData['20710642'],s:data.aaData['20710641']};
			paxyConfig.config5 = {e:data.aaData['20710652'],s:data.aaData['20710651']};
			paxyConfig.config6 = {e:data.aaData['20710662'],s:data.aaData['20710661']};
		}
	})
}

/**
 * 时分转秒
 */
function hourBranchFormatToMin(date){
	var time = date.split(':');
	var hour = time[0];
	var branch = time[1];
	var seconds = hour*360+branch*6;
	return seconds;
}
	


function checkTime(i)
{
if (i<10) 
  {i="0" + i}
  return i
}

function createPaxyData(){
	var dayArray = new Array();
	var paxyData = new Array();
	
	var now = new Date(paxyDateTime);
    var day = now.getDay();
    var week = "01234567";
    var days = week.indexOf(day);
    if(day===0)day=7;
    lastDay = new Date(paxyDateTime);
    var istoday = paxyDateTime.getDay()===0? 7:paxyDateTime.getDay();
    if($('#paxyDateTime').val()){
		days = 7;
		lastDay.setDate(lastDay.getDate()-week.indexOf(day)+days);
	}
	firstDay = new Date(paxyDateTime);
	firstDay.setDate(firstDay.getDate()-week.indexOf(day)+1);
	
	var datetime = new Date(firstDay);
	for(var i=0;i<days;i++){
		var date = datetime.getFullYear()+"-"+checkTime(datetime.getMonth()+1)+"-"+checkTime(datetime.getDate());
		if(i === istoday-1){
			paxyData.push('<div class="week checked" date="'+date+'" id="date_'+date+'" onclick="changeSelected(this)" >');
		}else{
			paxyData.push('<div class="week"  date="'+date+'" id="date_'+date+'" onclick="changeSelected(this)" >');
		}
		paxyData.push('<em></em><span></span>');
		paxyData.push(checkTime(datetime.getMonth()+1)+"/"+checkTime(datetime.getDate()));
		paxyData.push('</div>');
		datetime.setDate(datetime.getDate()+1);
	}
	$('.weekDate').html(paxyData.join(''));
}


function changeSelected(node){
	$(".weekDate .checked").removeClass("checked");
	$(".paxyData .checked").removeClass("checked");
	$("#paxy_"+$(node).attr("date")).addClass("checked");
	$(node).addClass("checked");
}

function queryPaxyList(){
	var submitData = {
			appid:ApiParamUtil.DAILY_MANAGE_STUDENT_ATTENDANCE_LIST_QUERY,
			api:ApiParamUtil.DAILY_MANAGE_STUDENT_ATTENDANCE_LIST_QUERY,
			enddate: new Date(lastDay).Format("yyyy-MM-dd"),
			begindate: new Date(firstDay).Format("yyyy-MM-dd"),
			stuid: basicParameters.stuid
		};
		$.ajax({
			cache:false,
			type: "POST",
//			async:false,
			url: basicParameters.loadingData,
			data: submitData,
			success: function(datas){
				var result = typeof datas === "object" ? datas : JSON.parse(datas);
				if(result.ret.code==="200"){
					createPaxyBox(result.data.aaData);
				}
			}
		});
}

function createPaxyBox(datalist){
	var paxyBox = new Array();
	for(var i=0;i<datalist.length;i++){
		paxyBox.push('<div id="paxy_'+datalist[i].date+'" class="paxy-il">');
		var allinterval = datalist[i].interval1+datalist[i].interval2+datalist[i].interval3+datalist[i].interval4+datalist[i].interval5+datalist[i].interval6;
		if(allinterval){
		paxyBox.push('<div class="interval1 interval">');
		if(datalist[i].interval1!==""){
			var interval1 = datalist[i].interval1.split(',');
			var id1 = datalist[i].id1.split(',');
			for(var i1 = 0;i1<interval1.length;i1++){
				paxyBox.push('<div class="paxy" onclick="viewPaxy(this)" style="margin-top:'+setXCoordinate(interval1[i1],1)+'px;" paxyid="'+id1[i1]+'" ><div class="div-time">'+interval1[i1]+'</div><div class="div-img"><img src="'+ctx+'/static/jquery/winpop/images/gh_xh_wating.gif" /></div></div>');
			}
		}
		paxyBox.push('</div>');
		paxyBox.push('<div class="interval2 interval">');
	    if(datalist[i].interval2!==""){
	    	var interval2 = datalist[i].interval2.split(',');
	    	var id2 = datalist[i].id2.split(',');
	    	for(var i2 = 0;i2<interval2.length;i2++){
	    		paxyBox.push('<div class="paxy" onclick="viewPaxy(this)" style="margin-top:'+setXCoordinate(interval2[i2],2)+'px;" paxyid="'+id2[i2]+'" ><div class="div-time">'+interval2[i2]+'</div><div class="div-img"><img src="'+ctx+'/static/jquery/winpop/images/gh_xh_wating.gif" /></div></div>');
	    	}
	    }
	    paxyBox.push('</div>');
	    paxyBox.push('<div class="interval3 interval">');
	    if(datalist[i].interval3!==""){
	    	var interval3 = datalist[i].interval3.split(',');
	    	var id3 = datalist[i].id3.split(',');
	    	for(var i3 = 0;i3<interval3.length;i3++){
	    		paxyBox.push('<div class="paxy" onclick="viewPaxy(this)" style="margin-top:'+setXCoordinate(interval3[i3],3)+'px;" paxyid="'+id3[i3]+'" ><div class="div-time">'+interval3[i3]+'</div><div class="div-img"><img src="'+ctx+'/static/jquery/winpop/images/gh_xh_wating.gif" /></div></div>');
	    	}
	    }
	    paxyBox.push('</div>');
	    paxyBox.push('<div class="interval4 interval">');
	    if(datalist[i].interval4!==""){
	    	var interval4 = datalist[i].interval4.split(',');
	    	var id4 = datalist[i].id4.split(',');
	    	for(var i4 = 0;i4<interval4.length;i4++){
	    		paxyBox.push('<div class="paxy" onclick="viewPaxy(this)" style="margin-top:'+setXCoordinate(interval4[i4],4)+'px;" paxyid="'+id4[i4]+'" ><div class="div-time">'+interval4[i4]+'</div><div class="div-img"><img src="'+ctx+'/static/jquery/winpop/images/gh_xh_wating.gif" /></div></div>');
	    	}
	    }
	    paxyBox.push('</div>');
	    paxyBox.push('<div class="interval5 interval">');
	    if(datalist[i].interval5!==""){
	    	var interval5 = datalist[i].interval5.split(',');
	    	var id5 = datalist[i].id5.split(',');
	    	for(var i5 = 0;i5<interval5.length;i5++){
	    		paxyBox.push('<div class="paxy" onclick="viewPaxy(this)" style="margin-top:'+setXCoordinate(interval5[i5],5)+'px;" paxyid="'+id5[i5]+'" ><div class="div-time">'+interval5[i5]+'</div><div class="div-img"><img src="'+ctx+'/static/jquery/winpop/images/gh_xh_wating.gif" /></div></div>');
	    	}
	    }
	    paxyBox.push('</div>');
	    paxyBox.push('<div class="interval6 interval">');
	    if(datalist[i].interval6!==""){
	    	var interval6 = datalist[i].interval6.split(',');
	    	var id6 = datalist[i].id6.split(',');
	    	for(var i6 = 0;i6<interval6.length;i6++){
	    		paxyBox.push('<div class="paxy" onclick="viewPaxy(this)" style="margin-top:'+setXCoordinate(interval6[i6],6)+'px;" paxyid="'+id6[i6]+'" ><div class="div-time">'+interval6[i6]+'</div><div class="div-img"><img src="'+ctx+'/static/jquery/winpop/images/gh_xh_wating.gif" /></div></div>');
	    	}
	    }
	    paxyBox.push('</div>');
	}else{
		paxyBox.push('<div class="nointerval">没有打卡记录</div>');
	}
	    paxyBox.push('</div>');
	}
	
	$(".paxyData").html(paxyBox.join(''));
	var defineDatePaxy = $("#paxy_"+new Date(paxyDateTime).Format("yyyy-MM-dd"));
	defineDatePaxy.addClass("checked");
	var definePaxy = defineDatePaxy.find(".paxy");
	if(definePaxy.length!=0){
		viewPaxy(definePaxy[definePaxy.length-1]);
	}
}

function viewPaxy(node){
	$('.paxyData .interval .checked').removeClass("checked");
	$(node).addClass("checked");
	var submitData = {
			appid:ApiParamUtil.DAILY_MANAGE_STUDENT_ATTENDANCE_ONE_QUERY,
			api:ApiParamUtil.DAILY_MANAGE_STUDENT_ATTENDANCE_ONE_QUERY,
			id: $(node).attr("paxyid"),
			stuid: basicParameters.stuid
		};
		$.ajax({
			cache:false,
			type: "POST",
			url: basicParameters.loadingData,
			data: submitData,
			success: function(datas){
				var result = typeof datas === "object" ? datas : JSON.parse(datas);
				if(result.ret.code==="200"){
					var bodytemp = result.data.bodytemp;
					if(bodytemp!=null && bodytemp!='' && bodytemp!='0.0'){
						bodytemp = bodytemp+'&#176;C';
					}else{
						bodytemp = '未测';
					}
					var image = result.data.picpath;
					if(image===""){
						image = ctx+'/static/jquery-emoji/images/attendance/image_false.png';
					}
					setPaxyData(image,result.data.ismedicine,result.data.issnack,result.data.isfeeling,bodytemp,result.data.parentword);
				}else{
					console.log(result.ret.code+":"+result.ret.msg);
				}
			}
		});
}

function setPaxyData(image,medicine,snack,feeling,bodytemp,parentword){
	if(basicParameters.xxType=="1"){
		var stateBox= new Array();
		if(medicine){
			stateBox.push('<i class="medicine_true"></i>');
		}else{
			stateBox.push('<i class="medicine_false"></i>');
		}
		if(snack){
			stateBox.push('<i class="snack_true"></i>');
		}else{
			stateBox.push('<i class="snack_false"></i>');
		}
		if(feeling){
			stateBox.push('<i class="feeling_true"></i>');
		}else{
			stateBox.push('<i class="feeling_false"></i>');
		}
		$(".pushState").html(stateBox.join(""));
	}
	if(!image){
		image = basicParameters.ctx + "/static/jquery-emoji/images/attendance/image_false.png";
	}
	$(".pushImg img").attr("src", image);
	$("#parentword").html(parentword);
	$("#bodytemp").html(bodytemp=="null" ?"":bodytemp);
}

function setXCoordinate(time,i){
	var XC_max = $(".paxyData").height() - 50;
	var proportion = XC_max/(hourBranchFormatToMin(paxyConfig["config"+i].e)-hourBranchFormatToMin(paxyConfig["config"+i].s));
	return (hourBranchFormatToMin(time)-hourBranchFormatToMin(paxyConfig["config"+i].s))*proportion;
}


 function lxfEndtime(){
 $(".lxftime").each(function(){
  var lxfday=$(this).attr("lxfday");//用来判断是否显示天数的变量
  var endtime = new Date($(this).attr("endtime")).getTime();
  //取结束日期(毫秒值)
  var nowtime = new Date().getTime();
  //今天的日期(毫秒值)
  var youtime = endtime-nowtime;//还有多久(毫秒值)
  var seconds = youtime/1000;
  var minutes = Math.floor(seconds/60);
  var hours = Math.floor(minutes/60);
  var days = Math.floor(hours/24);
  var CDay= days ;
  var CHour= hours % 24;
  var CMinute= minutes % 60;
  var CSecond= Math.floor(seconds%60);
  //"%"是取余运算，可以理解为60进一后取余数，然后只要余数。
  if(endtime<=nowtime){
		if($(this).attr("lxfday")=="no"){
			//输出没有天数的数据
			$(this).html("已过期");
		}else{
			//输出有天数的数据
			$(this).children(".days").html('00');
			$(this).children(".houers").html('00');
			$(this).children(".mins").html('00');
			$(this).children(".secnds").html('00');
		}
    }else{
		if($(this).attr("lxfday")=="no"){
			//输出没有天数的数据
			if(days > 0){
				$(this).html("剩"+days+"天 "+CHour+":"+CMinute+":"+CSecond);
			}else{
				$(this).html("剩"+CHour+":"+CMinute+":"+CSecond);
			}
		}else{
			//输出有天数的数据
			$(this).children(".days").html(days);
			$(this).children(".houers").html(CHour);
			$(this).children(".mins").html(CMinute);
			$(this).children(".secnds").html(CSecond);
		}
    }
 });
 setTimeout("lxfEndtime()",1000);
};
$(function(){
 lxfEndtime();
});
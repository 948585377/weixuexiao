
//带删除的滑动门Tab js效果
  function Tab(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
menu.className=i==cursel?"hover":"";
con.style.display=i==cursel?"block":"none";
}
}


$(document).ready(function () {
  
  //控制产品列表的高度
	 $(function () {
		   ReSetWidth();
		   $(window).resize(ReSetWidth)
		});

		var ReSetWidth=function(){
		   $(".Beautiful ul li").css("height",($(window).width()-20)/3);
		   $(".cardBox").css("height",($(window).width()*0.8)/1.8);
		   
		  if(document.body.scrollWidth < 600){
		   $(".ProList li span").css("height",($(window).width()-70)/2);
		  }
		   else{
			$(".ProList li span").css("height",($(window).width()-100)/3);
		  }
		}
		
  //显示加载框
  $(".ProList li a").click(function(){
	  $(".LOAD").show();
  });
  
  $(".SerList ul a").click(function(){
	  $(".LOAD").show();
  });
  
  
  
});



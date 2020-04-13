var aim_div="";//目标div 放置日历的位置
var m=0;//使用标识,之前页面记录的几列
var n=0;//使用标识,根据页面宽度决定日历分为几列
var language="cn";//语言选择
var month_arry;
var week_arry;
var month_cn=new Array("一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月");//月
var month_en=new Array("January","February","March","April","May","June","July","August","September","October","November","December");//月
var week_cn=new Array("日","一","二","三","四","五","六");//星期
var week_en=new Array("Su","Mo","Tu","We","Th","Fr","Sa");//星期

function loading_calendar(id,lan){
	aim_div="#"+id;
	language=lan;
	if(lan=="cn"){
		month_arry=month_cn;
		week_arry=week_cn;
	}else{
		month_arry=month_en;
		week_arry=week_en;
	}
	//开始
	$(aim_div).fullYearPicker({
		disabledDay : '',
		value : [ /* '2016-6-25', '2016-8-26'  */],
		cellClick : function(dateStr, isDisabled) {
			/* console.log("单击日期:"+dateStr); */
			/* arguments[0] */
		}
	});	
}


(function() {
	window.onload=function(){  
		  window.onresize = change;  
		  change();  
	} ;
	
 

	 
	
	//设置年份菜单
	function setYearMenu(year){
		$(".year .left_first_year").text(year-1+"");
		$(".year .left_sencond_year").text(year-2+"");
		$(".year .cen_year").text(year);
		$(".year .right_first_year").text(year+1+"");
		$(".year .right_sencond_year").text(year+2+"");
	}
	
	
	//设置开始日期和结束日期
 
	
	
	
 
 
	
 
	//监听日期拖在
	 
	/*根据日期判断大小 开始值小于结束值返回true  */
 
 
	
	/*拖拽选着  */
	 
 
 
	
	//@config：配置，具体配置项目看下面
	//@param：为方法时需要传递的参数
	$.fn.fullYearPicker = function(config, param) {
		if (config === 'setDisabledDay' || config === 'setYear'
				|| config === 'getSelected'
				|| config === 'acceptChange') {//方法
			var me = $(this);
			if (config == 'setYear') {//重置年份
				me.data('config').year = param;//更新缓存数据年份
				me.find('div.year a:first').trigger('click', true);
			} else if (config == 'getSelected') {//获取当前当前年份选中的日期集合（注意不更新默认传入的值，要更新值请调用acceptChange方法）
				return me.find('td.selected').map(function() {
					return getDateStr(this);
				}).get();
			} else if (config == 'acceptChange') {//更新日历值，这样才会保存选中的值，更换其他年份后，再切换到当前年份才会自动选中上一次选中的值
				me.data('config').value = me
						.fullYearPicker('getSelected');
			} else {
				me.find('td.disabled').removeClass('disabled');
				me.data('config').disabledDay = param;//更新不可点击星期
				if (param) {
					me
							.find('table tr:gt(1)')
							.find('td')
							.each(
									function() {
										if (param
												.indexOf(this.cellIndex) != -1)
											this.className = (this.className || '')
													.replace(
															'selected',
															'')
													+ (this.className ? ' '
															: '')
													+ 'disabled';
									});
				}
			}
			return this;
		}
		//@year:显示的年份
		//@disabledDay:不允许选择的星期列，注意星期日是0，其他一样
		//@cellClick:单元格点击事件（可缺省）。事件有2个参数，第一个@dateStr：日期字符串，格式“年-月-日”，第二个@isDisabled，此单元格是否允许点击
		//@value:选中的值，注意为数组字符串，格式如['2016-6-25','2016-8-26'.......]
		config = $.extend({
			year : new Date().getFullYear(),
			disabledDay : '',
			value : []
		}, config);
		return this
				.addClass('fullYearPicker')
				.each(
						function() {
							var me = $(this), year = config.year|| new Date().getFullYear(), newConifg = {
								cellClick : config.cellClick,
								disabledDay : config.disabledDay,
								year : year,
								value : config.value
							};
							me.data('config', newConifg);
							
							me.append('<div class="year">'
													+'<table>'
													+'<th class="year-operation-btn"><a href="#"  class="am-icon-chevron-left"></a></th>'
													+'<th class="left_sencond_year year_btn">'+ ''+'</th>'
													+'<th class="left_first_year year_btn">'+ ''+'</th>'
													+'<th id="cen_year" class="cen_year year_btn">'+ year+'</th>'
													+'<th class="right_first_year year_btn">'+ ''+'</th>'
													+'<th class="right_sencond_year year_btn">'+ ''+'</th>'
													+'<th class="year-operation-btn"><a href="#" class="next am-icon-chevron-right"></a></th>'
													+'</table>'
													+'<div class="stone"></div></div><div class="picker"></div>')
									.find('.year-operation-btn')
									.click(
											function(e, setYear) {
												if (setYear)
													year = me.data('config').year;
												else
													$(this).children("a").attr("class")== 'am-icon-chevron-left' ? year--: year++;
												setYearMenu(year);
												renderYear(
														year,
														$(this).closest('div.fullYearPicker'),
														newConifg.disabledDay,
														newConifg.value);
														//alert(year);
														//gettest();
														GetHoli();
												document.getElementById("cen_year").firstChild.data=year;
												return false;
											});
							setYearMenu(year);
							//年份选择
							$(".year .year_btn").click(function(){
								var class_name=$(this).attr("class");
								if(class_name.indexOf("cen_year")<0){
									var year=parseInt($(this).text());
									setYearMenu(year);
									renderYear(year, me, newConifg.disabledDay,newConifg.value);
									//alert(year);
									//gettest();
									GetHoli();
								}
							});
							renderYear(year, me, newConifg.disabledDay,
									newConifg.value);
									//alert(year);
									//gettest();
									GetHoli();
							
						});
	};
})();


function close_modal(){
	$("#calendar-modal-1").modal('close');
	
}


	
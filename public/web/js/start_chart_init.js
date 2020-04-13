var PieOption = {
    a : { //支付方式比例图
		title : {
			text: '',
			x:'center'
		},
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} 笔 ({d}%)"
        },
        legend: {
            orient : 'vertical',
            x : 'left',
            data:['银联支付','支付宝支付','百付宝支付','微信支付','现金支付','余额支付']
        },
        calculable : true,
        series : [
            {
                name:' ',
                type:'pie',
                radius : '60%',
                center: ['50%', '60%'],
                data:[]
            }
        ]
    },
    b:{ // 交互功能使用率 初始化
        title : {
            text: '',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} 次 ({d}%)"
        },
        legend: {
            orient : 'vertical',
            x : 'left',
            data:['班级圈','在线报名','通知公告','打卡考勤','在线留言','相册','在线请假']
        },
        calculable : true,
        series : [
            {
                name:'交互功能使用率',
                type:'pie',
                radius : '60%',
                center: ['50%', '60%'],
                data:[]
            }
        ]
    },
    c:{
		tooltip : {
			trigger: 'item',
			formatter: function(c){if(c.series.typess==1){return c.name+"</br>"+c.value+"人";}else if(c.series.typess==2){return c.name+"</br>"+c.value+"%";}}
		},
		legend: {
			data:['出勤人数/次','出勤比例']
		},
		toolbox: {
			show : true,
			feature : {
				magicType : {show: true, type: ['line', 'bar']},
				restore : {show: true},
				saveAsImage : {show: true}
			}
		},
        calculable : false,
		grid: {y: 70, y2:30, x2:20,width:'80%'},
		xAxis : [
			{
				type : 'category',
				data : []
			},
			{
				type : 'category',
				axisLine: {show:false},
				axisTick: {show:false},
				axisLabel: {show:false},
				splitArea: {show:false},
				splitLine: {show:false},
				data : []
			}
		],
		yAxis: [{
			type: 'value',
			scale: true,
			name: '单位:人',
			min: 0,
			},{
			type: 'value',
			scale: true,
            min: 0,
			max: 100,
			name: '单位:%',
			}],
		series : [
			{
				name:'出勤人数/次',
				type:'bar',
				typess:1,

				itemStyle: {normal: {color:'rgba(65, 202, 192)', label:{show:true,formatter:function(c){return c.value+"人";}}}},
				data:[]
			},
			{
				name:'出勤比例',
				type:'bar',
				typess:2,
				yAxisIndex: 1,
				itemStyle: {normal: {color:'rgba(119, 230,0)', label:{show:true,formatter:function(c){return c.value+"%";}}}},
				data:[]
			},
		]
    },
    d:{ //培训模式，柱状图
		tooltip : {
			trigger: 'item',
			formatter: function(c){if(c.series.typess==1){return c.series.name+"</br>"+c.value+"节";}else if(c.series.typess==6){return c.series.name+"</br>"+c.value+"元";}else{return c.series.name+"</br>"+c.value+"人次";}}
		},
		legend: {
			data:['课时安排/节','签到人次','请假人次','缺勤人次','新增报名人数','新增收入/元']
		},

        calculable : false,
		grid: {y: 70, y2:30, x2:20,width:'80%'},
		xAxis : [
			{
				type : 'category',
				data : []
			},
			{
				type : 'category',
				axisLine: {show:false},
				axisTick: {show:false},
				axisLabel: {show:false},
				splitArea: {show:false},
				splitLine: {show:false},
				data : []
			}
		],
		yAxis: [{
			type: 'value',
			scale: true,
			name: '单位:课时（人次）',
			min: 0,
			},{
			type: 'value',
			scale: true,
			name: '单位:元',
			}],
		series : [
			{
				name:'课时安排/节',
				type:'bar',
				typess:1,
				itemStyle: {normal: {color:'rgba(65, 202, 192)', label:{show:true,formatter:function(c){return "课时安排:\n"+c.value+"节";}}}},
				data:[]
			},
			{
				name:'签到人次',
				type:'bar',
				typess:2,
				itemStyle: {normal: {color:'rgba(75, 207, 202)', label:{show:true,formatter:function(c){return "签到:\n"+c.value+"人次";}}}},
				data:[]
			},
			{
				name:'请假人次',
				type:'bar',
				typess:3,
				itemStyle: {normal: {color:'rgba(85, 212, 212)', label:{show:true,formatter:function(c){return "请假:\n"+c.value+"人次";}}}},
				data:[]
			},
			{
				name:'缺勤人次',
				type:'bar',
				typess:4,
				itemStyle: {normal: {color:'rgba(95, 217, 222)', label:{show:true,formatter:function(c){return "缺勤:\n"+c.value+"人次";}}}},
				data:[]
			},
			{
				name:'新增报名人数',
				type:'bar',
				typess:5,
				itemStyle: {normal: {color:'rgba(105, 222, 232)', label:{show:true,formatter:function(c){return "新增报名:\n"+c.value+"人";}}}},
				data:[]
			},
		
			{
				name:'新增收入/元',
				type:'bar',
				typess:6,
				 yAxisIndex: 1,
				itemStyle: {normal: {color:'rgba(255, 130, 0)', label:{show:true,formatter:function(c){return "新增收入:\n"+c.value+"元";}}}},
				data:[]
			},
			
		]
    }







}




    var pieoption_c = {
		tooltip : {
			trigger: 'item',
			formatter: function(c){if(c.series.typess==1){return c.name+"</br>"+c.value+"人";}else if(c.series.typess==2){return c.name+"</br>"+c.value+"%";}}
		},
		legend: {
			data:['出勤人数/次','出勤比例']
		},
		toolbox: {
			show : true,
			feature : {
				magicType : {show: true, type: ['line', 'bar']},
				restore : {show: true},
				saveAsImage : {show: true}
			}
		},
        calculable : false,
		grid: {y: 70, y2:30, x2:20,width:'80%'},
		xAxis : [
			{
				type : 'category',
				data : []
			},
			{
				type : 'category',
				axisLine: {show:false},
				axisTick: {show:false},
				axisLabel: {show:false},
				splitArea: {show:false},
				splitLine: {show:false},
				data : []
			}
		],
		yAxis: [{
			type: 'value',
			scale: true,
			name: '单位:人',
			min: 0,
			},{
			type: 'value',
			scale: true,
            min: 0,
			max: 100,
			name: '单位:%',
			}],
		series : [
			{
				name:'出勤人数/次',
				type:'bar',
				typess:1,

				itemStyle: {normal: {color:'rgba(65, 202, 192)', label:{show:true,formatter:function(c){return c.value+"人";}}}},
				data:[]
			},
			{
				name:'出勤比例',
				type:'bar',
				typess:2,
				yAxisIndex: 1,
				itemStyle: {normal: {color:'rgba(119, 230,0)', label:{show:true,formatter:function(c){return c.value+"%";}}}},
				data:[]
			},
		]
    };
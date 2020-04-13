/*画圆弧统计图*/
/*调用方式，多种颜色 $(select).drawCircle(true);*/
/*调用方式，单种颜色 $(select).drawCircle(false,'green');*/
$.fn.drawCircle = function(i, c) {
var multicolor = i;
var color = c
return $(this).each(function() {
$(this).find('.circlebgtop').css({
'opacity': '1'
})
$(this).find('.rightcircle').css({
'-webkit-transform': 'rotate(0)',
'transform': 'rotate(0deg)',
})
$(this).find('.leftcircle').css({
'-webkit-transform': 'rotate(0)',
'transform': 'rotate(0deg)',
})
var val = $(this).find('.number').attr('data-val');
if(val > 0.50000 || val == 1) {
var deg = 360 * val + 'deg';
$(this).find('.rightcircle').css({
'-webkit-transform': 'rotate(180)',
'transform': 'rotate(180deg)',
'-webkit-transition-duration':'1s',
'transition-duration':'1s',
'-webkit-transition-timing-function': 'linear',
'-webkit-animation-fill-mode': 'forwards'
});
$(this).find('.circlebgtop').css({
'-webkit-transition-duration':'1s',
'transition-duration':'1s',
'-webkit-transition-delay': '0.5s',
'opacity': '0'
})
$(this).find('.leftcircle').css({
'-webkit-transition-duration':'1s',
'transition-duration':'1s',
'-webkit-transition-timing-function': 'linear',
'-webkit-animation-fill-mode': 'forwards',
'-webkit-transform': 'rotate(' + deg + ')',
'transform': 'rotate(' + deg + ')'
})
} else if(val < 0.5000 || val == 0.50000) {
//console.log(360*val);
var deg = 360 * val + 'deg';
$(this).find('.rightcircle').css({
'-webkit-transform': 'rotate(' + deg + ')',
'transform': 'rotate(' + deg + ')',
'-webkit-transition-duration':'1s',
'transition-duration':'1s',
'-webkit-transition-timing-function': 'linear',
'-webkit-animation-fill-mode': 'forwards'
});
}
if(multicolor) {
if(val == 0) {
$(this).find('.number').css({
'color': '#999'
})
} else if(val > 0 && val < 0.5999) {
$(this).find('.rightcircle').css({
'background-color': '#ff7068'
});
$(this).find('.leftcircle').css({
'background-color': '#ff7068'
});
$(this).find('.number').css({
'color': '#ff7068'
})
} else if(val > 0.5999 && val < 0.6999) {
$(this).find('.rightcircle').css({
'background-color': '#ff9900'
});
$(this).find('.leftcircle').css({
'background-color': '#ff9900'
});
$(this).find('.number').css({
'color': '#ff9900'
})
} else if(val > 0.6999 && val < 0.8499) {
$(this).find('.rightcircle').css({
'background-color': '#4fc1e9'
});


$(this).find('.leftcircle').css({
'background-color': '#4fc1e9'


});
$(this).find('.number').css({
'color': '#4fc1e9'
})
} else if(val > 0.8499) {
$(this).find('.rightcircle').css({
'background-color': '#48cfad'
});
$(this).find('.leftcircle').css({
'background-color': '#48cfad'
});
$(this).find('.number').css({
'color': '#48cfad'
})
} else if(val == null || val == '') {
$(this).find('.number').css({
'background-color': '#e6e6e6',
'color': '#aaa'
}).text('--')
}
} else {
$(this).find('.rightcircle').css({
'background-color': color
});
$(this).find('.leftcircle').css({
'background-color': color
});
$(this).find('.number').css({
'color': color
});
$(this).find('.number').css({
'color': color
});
}


})
}
   
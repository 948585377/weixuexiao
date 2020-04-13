
common_ajax_callback = false; //全局变量 在公共模板页定义 表示是否用公共的 ajax 成功回调和失败回调 ，这里设置为false 不使用公共回调
if( scroll_load_obj === undefined){
    var scroll_load_obj = null;
}

var index_type_item = '';

function Scroll_load(param) {
    this.limit = $(param.li_item).eq($(param.li_item).length-1).attr('time');
    this.pageSize = param.pageSize || 10;
    this.ajax_switch = param.ajax_switch || true;
    this.ul_box = param.ul_box ;
    this.li_item = param.li_item ;
    this.ajax_url = param.ajax_url ;
    this.after_ajax = param.after_ajax || null;
}
Scroll_load.prototype.load_init = function () {
    var self = this;
    scroll_load_obj = this;
    if ($('.has_show_over').length == 0) {
        $(self.ul_box).after('<div class="has_show_over" style="clear:both;height:45px;line-height:45px"><div class="jzz_div"><div class="jzz jzz_over"><div class="pir"><img src="https://weimeizhanoss.oss-cn-shenzhen.aliyuncs.com/public/mobile/img/p_jzz.png" /></div><div class="jzz_text"></div></div></div></div>');
    }
    if (($(self.li_item).length % self.pageSize != 0) || $(self.li_item).length == 0) {
        $(".jzz_text").text(''); //数据已加载完毕
    }
    $(window).on("scroll", scroll_fun);
}
function scroll_fun() {

    var winHeight = window.innerHeight || document.documentElement.clientHeight,
        scrollTop = document.body.scrollTop || document.documentElement.scrollTop,
        documentHeight = $(document).height();
    //判断是否滚到差不多浏览器底部
    if (parseInt(winHeight) + parseInt(scrollTop) +1 > parseInt(documentHeight)) {
        var self = scroll_load_obj;
        $(window).off("scroll", scroll_fun);
        //console.log(self.ajax_switch);
        if (self.ajax_switch) {
            //这里做ajax
            self.ajax_switch = false;  //把ajax锁关了防止不断ajax
            var datanumb = $(self.ul_box).children('div').length;
            if(datanumb >= 1){
                $('.has_show_over').animate({height:"45px"});
                $(".jzz").removeClass('jzz_over');
                $('.jzz_text').text('加载中');
            }
            var search_type='';
            var search_content='';
            if($('#search_input').length>0){
                typesearch_content = $.trim($('#search_input').val());
                $('.type_item.checked').each(function () {
                    if (search_type != '') {
                        search_type += ',' + $(this).attr('type');
                    } else {
                        search_type += $(this).attr('type');
                    }
                })
            }
            if (index_type_item != '') {
                search_type = index_type_item;
            }
            var post_data = {
                limit: $(self.ul_box).children('div').eq($(self.ul_box).children('div').length-1).attr('time'),
                lat : $('#curlat').val(),
                lng : $('#curlng').val()
            };
            $.ajax({
                type: 'POST',
                url: self.ajax_url,
                data: post_data,
                dataType: "html",
                success: function (data) {
                    //载入更多内容
                    if ($.trim(data)) {
                        console.log(data);
                        $(self.ul_box).append(data);
                        if (typeof (self.after_ajax) != 'undefined') {
                            self.after_ajax();
                        }
                        $(window).on("scroll", scroll_fun);
                        self.ajax_switch = true;

                    } else {
                        $(".jzz").addClass('jzz_over');
                        $('.jzz_text').text('数据已加载完毕');
                        $(window).off("scroll", scroll_fun);

                        $('.has_show_over').animate({
                            height:0
                        },300);
                        // $('.has_show_over').animate({height:"0"});

                    }
                },
                error: function () {
                    $('.jzz_text').text('加载中');
                    jTips('加载失败！');
                    $(window).on("scroll", scroll_fun);
                    self.ajax_switch = true;
                }
            }) //ajax结束
        }

    }
}
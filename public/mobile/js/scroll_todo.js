/*上拉到底部 加载更多 
limit 当前 查询条目的下标 默认从0开始 
pageSize 每次查询的增加条目数
ajax_switch 表示 ajax 锁，防止多次提交
ul_box 包含条目的容器的 class
li_item 单位条目的 标签的 class
ajax_url ajax的url
调用方法如下：
new Scroll_load({
    'limit': '0',
    'pageSize': 10,
    'ajax_switch': true,
    'ul_box': '.baby_diary_list',
    'li_item': '.baby_diary_list .li_content_box',
    'ajax_url': '@Url.Action("NotifyList")',
    'page_name': 'parent_notify', //  页面名称
    ,'post_param':{}, //传参
    'after_ajax': function () {
        image_bind_error_event(); // 图片错误处理
        icon_replace($(".desc")); // 替换表情
        img_big(); // 图片放大
    }
}).load_init();
*/
common_ajax_callback = false; //全局变量 在公共模板页定义 表示是否用公共的 ajax 成功回调和失败回调 ，这里设置为false 不使用公共回调
var scroll_load_obj = null;
var index_type_item = '';
function scroll_list_to_detail() {
    sessionStorage.setItem("cache_html_switch_" + scroll_load_obj.page_name, true);
}
function Scroll_load(param) {
   // this.limit = (sessionStorage.getItem('limit' + param.page_name)) ? (sessionStorage.getItem('limit' + param.page_name) || param.pageSize || '0') : (param.pageSize || '0');
    this.limit = $(param.li_item).eq($(param.li_item).length - 1 ).attr('time') || param.pageSize ;
    this.liwhere = param.limit;
    this.pageSize = param.pageSize || 10;
    //console.log(typeof(sessionStorage.getItem('ajax_switch' + param.page_name)));
    //if (sessionStorage.getItem('ajax_switch' + param.page_name) !== null) {
    //    this.ajax_switch = false;
    //} else {
    //    this.ajax_switch = param.ajax_switch || true;
    //}
    this.ajax_switch = param.ajax_switch || true;
    this.ul_box = param.ul_box || '.listContent';
    this.li_item = param.li_item || '.listContent .leave_main';
    this.ajax_url = param.ajax_url || '';
	this.bj_id = param.bj_id || '';
    this.after_ajax = param.after_ajax || null;
    this.page_name = param.page_name || "";
    //this.post_param = param.post_param || {};

    }
Scroll_load.prototype.load_init = function () {
    var self = this;
    scroll_load_obj = this;
    if ($('.has_show_over').length == 0) {
        $(self.ul_box).after('<div class="has_show_over" style="clear:both;height:45px;line-height:45px"><div class="jzz_div"><div class="jzz jzz_over"><div class="pir"><img src="https://weimeizhanoss.oss-cn-shenzhen.aliyuncs.com/public/mobile/img/p_jzz.png" /></div><div class="jzz_text"></div></div></div></div>');
    }
    //判断时候有缓存的hmtl，有的话加到列表容器
    //if (sessionStorage.getItem('cache_html_switch_' + self.page_name) && sessionStorage.getItem('cache_html' + self.page_name)) {
    //    $(self.ul_box).html(sessionStorage.getItem('cache_html' + self.page_name));
    //    if (typeof (self.after_ajax) != 'undefined') { self.after_ajax(); }
    //    //判断时候有 缓存的 scroll_top，有的话滚动到相应的高度
    //    if (sessionStorage.getItem('scroll_top' + self.page_name)) {
    //        $(window).scrollTop(sessionStorage.getItem('scroll_top' + self.page_name));
    //    }
    //}
    //else {
    //    clear_page_session(this.page_name);
    //}
    //sessionStorage.removeItem('cache_html_switch_' + self.page_name);
    if (($(self.li_item).length % self.pageSize != 0) || $(self.li_item).length == 0) {
        $(".jzz_text").text(''); //数据已加载完毕
    }
    $(window).on("scroll", scroll_fun);
}
function scroll_fun() {

    // var bottom = $(".has_show_over");
    var winHeight = window.innerHeight || document.documentElement.clientHeight,
        scrollTop = document.body.scrollTop || document.documentElement.scrollTop,
        documentHeight = $(document).height();
    //将当前的浏览器滚动的高度存在浏览器缓存变量scroll_top
   // sessionStorage.setItem('scroll_top' + scroll_load_obj.page_name, scrollTop);
    //判断是否滚到差不多浏览器底部
    if (parseInt(winHeight) + parseInt(scrollTop) + 5 > parseInt(documentHeight)) {
        var self = scroll_load_obj;
        $(window).off("scroll", scroll_fun);
        //console.log(self.ajax_switch);
        if (self.ajax_switch) {
            //这里做ajax
            self.ajax_switch = false;  //把ajax锁关了防止不断ajax
            $(".jzz").removeClass('jzz_over');
            $('.jzz_text').text('加载中');
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
                limit:self.limit || $(self.li_item).eq($(self.li_item).length - 1 ).attr('time'),
                type: search_type,
               	truelimit:self.liwhere,
                content: search_content
            };
                
            $.ajax({
                type: 'POST',
                url: self.ajax_url,
                data: post_data,
                dataType: "html",
                success: function (data) {
                    //载入更多内容
                    if ($.trim(data)) {

                        $(self.ul_box).append(data);
                       // sessionStorage.setItem('cache_html' + self.page_name, $(self.ul_box).html());
                        self.limit = $(self.ul_box).children('li').eq($(self.ul_box).children('li').length-1).attr('time');
                       // sessionStorage.setItem('limit' + self.page_name, self.limit);
                        if (typeof (self.after_ajax) != 'undefined') { self.after_ajax(); }
                       
                            $(window).on("scroll", scroll_fun);
                            self.ajax_switch = true;
                        
                    } else {
                        $(".jzz").addClass('jzz_over');
                        $('.jzz_text').text('数据已加载完毕');
                        $(window).off("scroll", scroll_fun);
                        window.setTimeout(function () {
                            //$('.has_show_over').animate({
                            //    height:0
                            //},300);
                            $('.has_show_over').fadeOut();
                        }, 400)
                    }
                },
                error: function () {
                    jTips('加载失败！');
                    $(window).on("scroll", scroll_fun);
                    self.ajax_switch = true;
                }
            }) //ajax结束
        }

    }
}


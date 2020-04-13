//学生余额消费记录专用js


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
    'after_ajax': function () {
        image_bind_error_event(); // 图片错误处理
        icon_replace($(".desc")); // 替换表情
        img_big(); // 图片放大
    }
}).load_init();
*/
common_ajax_callback = false; //全局变量 在公共模板页定义 表示是否用公共的 ajax 成功回调和失败回调 ，这里设置为false 不使用公共回调
//scroll_load_obj在页面的js中定义，全局变量。
//var scroll_load_obj = null;
function scroll_list_to_detail_cache_on(cache_page_name) {
    // 开启缓存开关
    sessionStorage.setItem("cache_html_switch_" + cache_page_name, true);
}
function scroll_list_to_cache_off(cache_page_name) {
    // 关闭缓存开关
    sessionStorage.removeItem("cache_html_switch_" + cache_page_name);
}
function Scroll_load(param) {
    //this.limit = (sessionStorage.getItem('limit' + param.page_name)) ? (sessionStorage.getItem('limit' + param.page_name) || param.pageSize || '0') : (param.pageSize || '0');
    this.limit = param.pageSize || '10';
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
    this.after_ajax = param.after_ajax || null;
    this.page_name = param.page_name || "";

}
Scroll_load.prototype.load_init = function () {
    var self = this;
    scroll_load_obj = this;
    $('body').append('<div class="has_show_over" style="clear:both;height:45px;line-height:45px"><div class="jzz_div"><div class="jzz jzz_over"><div class="pir"><img src="https://weimeizhanoss.oss-cn-shenzhen.aliyuncs.com/public/mobile/img/p_jzz.png" /></div><div class="jzz_text"></div></div></div></div>');
    //判断是否开启缓存，且有缓存的hmtl，有的话更新列表容器
    if (sessionStorage.getItem('cache_html_switch_' + self.page_name)) {
        if (sessionStorage.getItem('cache_html' + self.page_name)) {
            $(self.ul_box).html(sessionStorage.getItem('cache_html' + self.page_name));
            if (typeof (self.after_ajax) != 'undefined') { self.after_ajax(); }
            //判断时候有 缓存的 scroll_top，有的话滚动到相应的高度
            if (sessionStorage.getItem('scroll_top' + self.page_name)) {
                $(window).scrollTop(sessionStorage.getItem('scroll_top' + self.page_name));
            }
        }

        if (sessionStorage.getItem('limit' + self.page_name)) {
            self.limit = sessionStorage.getItem('limit' + self.page_name) || self.pageSize || '10';
        }

        if (sessionStorage.getItem('ajax_switch' + self.page_name)) {
            self.ajax_switch = false;
        }
    }
    else {
        clear_page_session(this.page_name);
    }
    sessionStorage.removeItem('cache_html_switch_' + self.page_name);
    console.log(IS_NEW);

        //如果进入页面时获取的数据已经获取完了，则无操作
        if (($(self.li_item).length % self.pageSize != 0) || $(self.li_item).length == 0) {
            $(".jzz_text").text(''); //数据已加载完毕
        } else {
            //如果进入页面时获取的数据没有获取完，则将scroll_fun 绑定到 window 的 scroll 里
            $(window).on("scroll", scroll_fun); //pei 改 移到else里面

        }

}
function scroll_fun() {
    // var bottom = $(".has_show_over");
    var winHeight = window.innerHeight || document.documentElement.clientHeight,
        scrollTop = document.body.scrollTop || document.documentElement.scrollTop,
        documentHeight = $(document).height();
    //将当前的浏览器滚动的高度存在浏览器缓存变量scroll_top
    sessionStorage.setItem('scroll_top' + scroll_load_obj.page_name, scrollTop);
    //判断是否滚到差不多浏览器底部
    if (parseInt(winHeight) + parseInt(scrollTop) + 5 > parseInt(documentHeight)) {
        var self = scroll_load_obj;
        /*这里是为了防止切换记录类型后下拉无操作所以注释掉，如果页面无类型变换的下拉则不能注释掉,否则将会产生无效操作*/
        //$(window).off("scroll", scroll_fun);

       /* 余额记录如果A类型拉到底了再切换类型，将会自动执行一次下拉操作，这里的check_und 和 is_ajax_check 用来处理*/
        let check_und = $(self.ul_box).children('li').eq($(self.ul_box).children('li').length-1).attr('time');
        let is_ajax_check = true;

        //如果是切换类型时的自动操作，则is_ajax_check 为 false
        if(typeof(check_und) == "undefined"){
            is_ajax_check = false;
        }

        if (self.ajax_switch) {
            //这里做ajax
            self.ajax_switch = false;  //把ajax锁关了防止不断ajax
			$('.has_show_over').animate({height:"45px"});
            $(".jzz").removeClass('jzz_over');
            $('.jzz_text').text('加载中');
			var post_data = {
                limit: $(self.ul_box).children('li').eq($(self.ul_box).children('li').length-1).attr('time'),
				noticeytpe: $("#noticeytpe").val(),
            };
            $.ajax({
                type: 'POST',
                url: self.ajax_url,
                data: post_data,
                dataType: "html",
                success: function (data) {
                    //载入更多内容
                    console.log(is_ajax_check);
                    if ($.trim(data)) {

                        if(is_ajax_check){
                            $(self.ul_box).append(data);
                        //如果是自动执行的下拉操作，则不将获取的数据显示出来，进而不会出现重复数据
                        //TODO:: 最好是找到为什么会自动执行下拉操作
                        }else{
                            self.ajax_switch = true;
                        }

                        sessionStorage.setItem('cache_html' + self.page_name, $(self.ul_box).html());
                        self.limit = parseInt(self.limit) + self.pageSize;
                        sessionStorage.setItem('limit' + self.page_name, self.limit);
                        if (typeof (self.after_ajax) != 'undefined') { self.after_ajax(); }
                        if (parseInt(self.limit) > $(self.li_item).length) {
                            $(".jzz").addClass('jzz_over');
                            $('.jzz_text').text('加载中');
                            sessionStorage.setItem('ajax_switch' + self.page_name, self.ajax_switch);
                            /*余额记录页面需要将这句注释掉，否则切换类型时会出现下拉无反应的情况*/
                           //$(window).off("scroll", scroll_fun);
                            $('.has_show_over').animate({height: 0});
                            self.ajax_switch = true;
                        } else {

                            $(window).on("scroll", scroll_fun);
                            self.ajax_switch = true;
                        }

                    } else {
                        //真正数据获取完了其实是执行到这里的
                        $(".jzz").addClass('jzz_over');
                        $('.jzz_text').text('数据已加载完毕');
                        sessionStorage.setItem('ajax_switch' + self.page_name, self.ajax_switch);
                        $(window).off("scroll", scroll_fun);
                        $('.has_show_over').animate({height: 0});
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




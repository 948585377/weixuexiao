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
var scroll_load_obj = null;
ROOT_URL = "http://weimeizhan.oss-cn-shenzhen.aliyuncs.com/";
function Scroll_load(param) {
    this.limit = (param.pageSize || '0');
    this.pageSize = param.pageSize || 10;
    //console.log(typeof(sessionStorage.getItem('ajax_switch' + param.page_name)));
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
    $('body').append('<div class="has_show_over" style="clear:both;height:45px;line-height:45px"><div class="jzz_div"><div class="jzz jzz_over"><div class="pir"><img src="' + ROOT_URL + 'public/mobile/img/p_jzz.png" /></div><div class="jzz_text"></div></div></div></div>');
    //判断时候有缓存的hmtl，有的话加到列表容器
    if (($(self.li_item).length % self.pageSize != 0) || $(self.li_item).length == 0) {
        $(".jzz_text").text(''); //数据已加载完毕
    } else {
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
        $(window).off("scroll", scroll_fun);
        //console.log(self.ajax_switch);
        if (self.ajax_switch) {
            //这里做ajax
            self.ajax_switch = false;  //把ajax锁关了防止不断ajax
            $(".jzz").removeClass('jzz_over');
            $('.jzz_text').text('加载中');

            $.ajax({
                type: 'POST',
                url: self.ajax_url,
                data: {
                    limit: self.limit
                },
                dataType: "html",
                success: function (data) {
                    //载入更多内容
                    if ($.trim(data)) {
                        $(self.ul_box).append(data);
                        sessionStorage.setItem('cache_html' + self.page_name, $(self.ul_box).html());
                        self.limit = parseInt(self.limit) + self.pageSize;
                        sessionStorage.setItem('limit' + self.page_name, self.limit);
                        if (typeof (self.after_ajax) != 'undefined') { self.after_ajax(); }
                        if (parseInt(self.limit) > $(self.li_item).length) {
                            $(".jzz").addClass('jzz_over');
                            $('.jzz_text').text('数据已加载完毕');
                            sessionStorage.setItem('ajax_switch' + self.page_name, self.ajax_switch);
                            $(window).off("scroll", scroll_fun);
                            window.setTimeout(function () {
                                $('.has_show_over').animate({
                                    height: 0
                                }, 300);
                            }, 400)

                        } else {

                            $(window).on("scroll", scroll_fun);
                            self.ajax_switch = true;
                        }
                    } else {
                        $(".jzz").addClass('jzz_over');
                        $('.jzz_text').text('数据已加载完毕');
                        $(window).off("scroll", scroll_fun);
                        window.setTimeout(function () {
                            $('.has_show_over').animate({
                                height: 0
                            }, 300);
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


/**
 * Created by shenpei on 15-2-6.
 */
common_ajax_callback = false;
$.wx_upload = {
    choose_img_btn: '',              //选择图片按钮
    upload_btn: '',                  //上传图片按钮
    img_showlist: '',                //图片显示的列表
    img_single: '',                  //单图显示的标签
    img_localId: [],                 //存放选择的图片数组
    img_localId_now: [],             //当前选择的图片数组
    img_serverId: [],                //上传到微信端返回的图片数组
    img_max_length: 8,               //最多允许选择的图片数
    del_img_btn: 'del_btn',      //删除图片按钮
    record_btn: '',                  //录音按钮
    sent_record_directly: false,      //点击停止录音是否直接发送语音，false不发送
    video_btn: '',                   //播放/暂停按钮
    video_list: '',                  //显示语音列表
    video_localId: [],               //存放语音数组
    video_localId_now_index: -1,     //当前正在播放语音对应数组的下标
    video_serverId: [],              //上传到微信端返回的语音数组
    video_max_length: 5,             //最多允许录的语音数
    del_video_btn: 'del_video_btn',  //删除语音按钮
    video_start_time:0,              //
    video_end_time:0,
    video_period_time:0,
    client_point:1,
    img_wrapper_ul:'#img_wrapper ul',
    myScroll:null,
    say_tips:'.say_tips1',
    say_tips2:'.say_tips2',
    count_time:60,
    settimeout_fun:null,
    video_time:[],
    success_img_arr:[],         //上传成功图片列表
    fail_local_img_arr:[],      //本地上传失败图片列表
    fail_server_img_arr:[],      //服务端传输失败图片列表
    success_video_arr:[],       //上传成功音频列表
    fail_local_video_arr:[],    //本地上传失败音频列表
    fail_server_video_arr:[],    //服务端传输失败音频列表
    upload_img_url:'',           //调用从微信取图片到自己服务器的方法链接地址
    upload_video_url:'',         //调用从微信取音频到自己服务器的方法链接地址
    fail_media_id:'',
    success_media_id:'',

    //图片选择
    wxsdkChooseImage: function () {
        var self = this;
        //var localIds="";
        wx.chooseImage({
            success: function (res) {
                // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                self.img_localId_now = res.localIds;
                var cut_length = res.localIds.length +$(self.img_showlist).children("li").length - self.img_max_length;    //新改
                if (cut_length > 0) {
                    for (cut_length; cut_length > 0; cut_length--) {
                        self.img_localId_now.pop();
                    }
                }
                self.wxsdkAddimgtolist();
            }
        });


    },
    //将图片添加到显示的列表
    wxsdkAddimgtolist: function () {
        var self = this;
        var _img_showlist = $(self.img_showlist);
        var img_localId_length = self.img_localId.length;
        $.each(self.img_localId_now, function (i, item) {
            _img_showlist.append('<li class="sdk_img_li"><img src="' + item + '"><div class="' + self.del_img_btn + '" img_index="' + (i + img_localId_length) + '"></div></li>');

        });
        $("img_wrapper_ul").on("click","li",function(e){
            e.stopPropagation();
            $(".img_bigger_bg").hide();
        })
        _img_showlist.children("li").css("height", _img_showlist.children("li").width() + "px");
        self.img_localId = self.img_localId.concat(self.img_localId_now);

        //监听删除事件
        $("." + self.del_img_btn).on("click", function (e) {
            e.stopPropagation();
            var _this_index = self.count_index($(this).closest(".sdk_img_li").index(),"sdk_img_li");  //计算 .sdk_img_li对应下标  //新版
            var _this=$(this);
            jConfirm("主人，真的要删除我吗？",'',function(r){
                if(r){
                    self.img_localId.splice(_this_index,1);
                    _this.closest("li").fadeOut().remove();
                }
            });
        });
    },
    //上传图片到微信端
    wxsdkUploadimg: function () {
        var self = this;
        // pei modify2
        //var  n_i=0;
        var  arr_length=self.img_localId.length;	 //图片总的个数	
        var num_i=0;
        function uploadimg(){
            //var num_i=num_i_i;
            //window.setTimeout(function(){
            wx.uploadImage({
                localId: self.img_localId[num_i], // 需要上传的图片的本地ID，由chooseImage接口获得
                isShowProgressTips: 0, // 默认为1，显示进度提示
                success: function (res) {
                    //alert(res.serverId);//modify10-22
                    //10-13重新修改

                    $.ajax({    //将图片从微信端传到服务器
                        url:self.upload_img_url,
                        type:'post',
                        data:{'serverId':res.serverId},
                        dataType:'json',
                        success:function(data){

                            if(data.status !=0){
                                self.success_img_arr.push(data.data);
                                self.show_progress();
                                if(num_i == arr_length-1){
                                    if(self.video_localId.length>0){
                                        self.wxsdkUploadvideo();
                                    }else if($('.media_list li.vod_li').length>0){
                                        //alert('调用：1');
                                        $('#progress_text').text('等待上传视频...');
                                        qcVideo.uploader.startUpload();
                                    }else{
                                        if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 ){
                                            self.showErrorMsg(); //提示存在上传失败的图片或者视频
                                        }else{
                                            //alert('输出：2');
                                            self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                                        }
                                    }
                                }else{
                                    num_i++;
                                    uploadimg();
                                }
                            }else{
                                console.log(data.info);
                                self.fail_server_img_arr.push(res.serverId);
                                self.show_progress();

                                if(num_i == arr_length-1){
                                    if(self.video_localId.length>0){
                                        self.wxsdkUploadvideo();
                                    }else if($('.media_list li.vod_li').length>0){
                                        //alert('调用：2');
                                        $('#progress_text').text('等待上传视频...');
                                        qcVideo.uploader.startUpload();
                                    }else{
                                        if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 ){
                                            self.showErrorMsg(); //提示存在上传失败的图片或者视频
                                        }else{
                                            // alert('输出：2');
                                            self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                                        }
                                    }
                                }else{
                                    num_i++;
                                    uploadimg();
                                }
                            }
                        },
                        error:function(){
                            self.fail_server_img_arr.push(res.serverId);
                            self.show_progress();
                            if(num_i == arr_length-1){
                                if(self.video_localId.length>0){
                                    self.wxsdkUploadvideo();
                                }else if($('.media_list li.vod_li').length>0){
                                    //alert('调用：3');
                                    $('#progress_text').text('等待上传视频...');
                                    qcVideo.uploader.startUpload();
                                }else{
                                    if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 ){
                                        self.showErrorMsg(); //提示存在上传失败的图片或者视频
                                    }else{
                                        // alert('输出：3');
                                        self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                                    }
                                }
                            }else{
                                num_i++;
                                uploadimg();
                            }
                        }
                    })

                },
                fail:function(){
                    //alert(num_i);//modify10-22
                    self.fail_local_img_arr.push(self.img_localId[num_i]);
                    self.show_progress();
                    if(num_i == arr_length-1){
                        if(self.video_localId.length>0){
                            self.wxsdkUploadvideo();
                        }else if($('.media_list li.vod_li').length>0){
                            $('#progress_text').text('等待上传视频...');
                            qcVideo.uploader.startUpload();
                        }else{
                            if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 ){
                                self.showErrorMsg(); //提示存在上传失败的图片或者视频
                            }else{
                                self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                            }
                        }
                    }else{
                        num_i++;
                        uploadimg();
                    }
                }
            });
            //},100);   
        }
        uploadimg();

        /*$.each(self.img_localId,function(i){
			uploadimg(i);
		})*/



    },
    wxsdkUploadvideo: function () {   //上传音频
        var self = this;
        var  n_i=0;
        var  arr_length=self.video_localId.length;  //音频的总的个数
        var video_i=0;
        function uploadvideo(){
            //var video_i=video_i_i;
            //window.setTimeout(function(){
            wx.uploadVoice({
                localId: self.video_localId[video_i],
                isShowProgressTips: 0,
                success: function (res) {

                    $.ajax({    //将音频从微信端传到服务器
                        url:self.upload_video_url,
                        type:'POST',
                        data:{'serverId':res.serverId},
                        dataType:'json',
                        success:function(data){
                            if(data.status !=0){
                                self.success_video_arr.push(data.data);
                                self.show_progress();
                                if(video_i == arr_length-1){
                                    if($('.media_list li.vod_li').length>0){
                                        $('#progress_text').text('等待上传视频...');
                                        qcVideo.uploader.startUpload();
                                    }else if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 || self.fail_local_video_arr.length >0 || self.fail_server_video_arr.length >0){
                                        self.showErrorMsg(); //提示存在上传失败的图片或者视频
                                    }else{
                                        self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                                    }
                                }else{
                                    num_i++;
                                    uploadvideo();
                                }
                            }else{
                                console.log(data.info);
                                self.fail_server_video_arr.push(res.serverId);
                                self.show_progress();
                                if(video_i == arr_length-1){
                                    if($('.media_list li.vod_li').length>0){
                                        $('#progress_text').text('等待上传视频...');
                                        qcVideo.uploader.startUpload();
                                    }else if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 || self.fail_local_video_arr.length >0 || self.fail_server_video_arr.length >0){
                                        self.showErrorMsg(); //提示存在上传失败的图片或者视频
                                    }else{
                                        self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                                    }
                                }else{
                                    num_i++;
                                    uploadvideo();
                                }
                            }
                        },
                        error:function(){
                            self.fail_server_video_arr.push(res.serverId);
                            self.show_progress();
                            if(video_i == arr_length-1){
                                if($('.media_list li.vod_li').length>0){
                                    $('#progress_text').text('等待上传视频...');
                                    qcVideo.uploader.startUpload();
                                }else if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 || self.fail_local_video_arr.length >0 || self.fail_server_video_arr.length >0){
                                    self.showErrorMsg(); //提示存在上传失败的图片或者视频
                                }else{
                                    self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                                }
                            }else{
                                num_i++;
                                uploadvideo();
                            }
                        }
                    })


                },
                fail:function(){
                    self.fail_local_video_arr.push(self.video_localId[n_i]);
                    self.show_progress();
                    if(video_i == arr_length-1){
                        if($('.media_list li.vod_li').length>0){
                            $('#progress_text').text('等待上传视频...');
                            qcVideo.uploader.startUpload();
                        }else if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 || self.fail_local_video_arr.length >0 || self.fail_server_video_arr.length >0){
                            self.showErrorMsg(); //提示存在上传失败的图片或者视频
                        }else{
                            self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                        }
                    }else{
                        num_i++;
                        uploadvideo();
                    }
                }
            });
            //},100);
        }
        uploadvideo();
        /*for(var video_i=0; video_i< self.video_localId.length; video_i++){
			(function(video_i){
				uploadvideo(video_i);
			})(video_i)
			
		}*/

    },
    //语音播放结束
    wxsdkonVoicePlayEnd: function (localId) {
        var self = this;
        var _video_list = $(self.video_list);
        _video_list.children(".sdk_voice_li").eq(self.video_localId_now_index).removeClass("video_stop");    //新版
        self.video_localId_now_index=-1;
    },
    //录音自动结束
    wxsdkonVoiceRecordEnd: function (localId) {
        var self = this;
        self.video_period_time=60;
        var _video_list = $(self.video_list);
        self.video_localId.push(localId);
        window.clearTimeout(self.settimeout_fun);
        self.video_time.push(self.video_period_time);
        _video_list.append('<li class="sdk_voice_li" video_index="' + (self.video_localId.length - 1) + '"><div class="arrow"></div><div class="voice_play_tip"></div><div class="voice_play_time">'+ self.video_period_time +'"</div><div class="' + self.del_video_btn + '" ></div></li>');  //新版

        //停止录音就上传
        if (self.sent_record_directly) {
            $(self.upload_btn).click();
        }
    },
    wxsdkcheckForm:function(){return true;},
    wxsdkSendData: function () {
        this.hideLoadingMsg();
    },
    init: function () {
        var self = this;
        this.addLoadingMsg();
        this.addErrorMsg();


        if (self.choose_img_btn != '' && (self.img_showlist != '' || self.img_single != '')) {
            var _choose_img_btn = $(self.choose_img_btn);
            var _upload_btn = $(self.upload_btn);
            var _img_showlist = $(self.img_showlist);
            var _img_single = $(self.img_single);
            if (_choose_img_btn.length > 0) {
                if (_img_showlist.length > 0) {
                    _choose_img_btn.on("click", function () {  // 多图片上传
                        if (_img_showlist.children("li").length < self.img_max_length) {  //新改
                            self.wxsdkChooseImage();
                        } else {
                            jAlert("最多只能传" + self.img_max_length + "张图片哦！");
                        }
                    });
                }
            }
            if (_upload_btn.length > 0) {
                //监听点击提交按钮事件
                _upload_btn.on("click", function () {
                    self.showLoadingMsg();
                    if(self.wxsdkcheckForm()){

                        //10-13重新修改
                        if (self.img_localId.length > 0){
                            self.wxsdkUploadimg();   //上传图片

                        }else if (self.video_localId.length > 0) {
                            self.wxsdkUploadvideo();  //上传音频
                        }else if($('.media_list li.vod_li').length>0){
                            $('#progress_text').text('等待上传视频...');
                            qcVideo.uploader.startUpload();  //上传视频
                        }else{
                            self.wxsdkSendData([],[],[],'');  //不上传图片跟语音
                        }

                    }else{
                        self.hideLoadingMsg();
                    }
                });
            }
        }
        if (self.record_btn != '' && self.video_list != '') {
            var _record_btn = $(self.record_btn);           //录音按钮
            var _video_list = $(self.video_list);			//显示录音列表ul

            //监听录音按钮事件
            _record_btn.on("click", function (e) {
                e.stopPropagation();
                e.preventDefault();
                if ($(this).hasClass("record_stop")) {   //停止录音
                    self.count_time = 60;
                    wx.stopRecord({
                        success: function (res) {
                            $(".babysay_bg").hide();
                            var end_time= new Date();
                            self.video_end_time=Math.round(parseInt(end_time.getTime())/1000);
                            self.video_period_time=self.video_end_time - self.video_start_time;

                            if (parseInt(self.video_period_time) > 0 && parseInt(self.video_period_time) <= 60) {
                                window.clearTimeout(self.settimeout_fun);
                                self.video_localId.push(res.localId);
                                self.video_time.push(self.video_period_time);
                                _video_list.append('<li class="sdk_voice_li" video_index="' + (self.video_localId.length - 1) + '"><div class="arrow"></div><div class="voice_play_tip"></div><div class="voice_play_time">'+ self.video_period_time +'"</div><div class="' + self.del_video_btn + '" ></div></li>');   //新版

                                //停止录音就上传
                                if (self.sent_record_directly) {
                                    _upload_btn.click();
                                }
                            } else {
                                self.count_time = 1;
                            }

                        },
                        fail: function (res) {
                            //alert(JSON.stringify(res));
                            jAlert("抱歉，咨询出错啦，请检查一下你的网络或者重新录音再发送！");
                        }
                    });

                    $(this).removeClass("record_stop");
                    $(self.say_tips).text('点击话筒开始录音吧');
                    $(self.say_tips2).html('时长不超过<span class="pink_f">'+ self.count_time +'</span>秒');
                } else {                                  //开始录音
                    if ($(self.video_list).children("li").length < self.video_max_length) {      //新改
                        //开始录音前停止正在播放的语音
                        if (self.video_localId_now_index > -1){
                            wx.stopVoice({
                                localId: self.video_localId[self.video_localId_now_index] // 需要停止的音频的本地ID，由stopRecord接口获得
                            });
                            $(".video_stop").removeClass("video_stop"); //pei2015/4/6 add去掉其他正在播放的样式
                        }
                        wx.startRecord({
                            cancel: function () {
                                jAlert('您已拒绝录音');
                            },
                            success:function(){
                                //alert("可以了");
                                var start_time= new Date();
                                self.video_start_time=Math.round(parseInt(start_time.getTime())/1000);
                            }

                        });
                        self.count_time=60;
                        $(this).addClass("record_stop");
                        if (self.sent_record_directly)
                            $(self.say_tips).text('点击话筒发送录音');
                        else
                            $(self.say_tips).text('点击话筒停止录音');
                        $(self.say_tips2).html('时长不超过<span class="pink_f">'+ self.count_time +'</span>秒');
                        self.funCountTime();
                    } else {
                        jAlert("最多只能传" + self.video_max_length + "条语音哦！");
                    }

                }
            });  //监听录音按钮事件结束

            //播放/暂停语音

            _video_list.on("click", ".sdk_voice_li", function () {               //新版
                var _this_index = self.count_index($(this).index(),"sdk_voice_li");  //计算 .sdk_voice_li对应下标     //新版

                if ($(this).hasClass("video_stop")) {
                    wx.pauseVoice({
                        localId: self.video_localId[_this_index] // 需要暂停的音频的本地ID，由stopRecord接口获得
                    });
                    $(this).removeClass("video_stop");
                } else {
                    if (self.video_localId_now_index > -1){
                        wx.stopVoice({
                            localId: self.video_localId[self.video_localId_now_index] // 需要停止的音频的本地ID，由stopRecord接口获得
                        });
                        $(".video_stop").removeClass("video_stop"); //pei2015/4/6 add去掉其他正在播放的样式
                    }
                    wx.playVoice({
                        localId: self.video_localId[_this_index] // 需要播放的音频的本地ID，由stopRecord接口获得
                    });
                    $(this).addClass("video_stop");
                    self.video_localId_now_index = _this_index;          //新版
                }
            });

            //删除语音
            _video_list.on("click", "." + self.del_video_btn, function (e) {
                e.stopPropagation();
                e.preventDefault();
                var _this=$(this);
                var _this_index = self.count_index($(this).parent(".sdk_voice_li").index(),"sdk_voice_li");  //计算 .sdk_voice_li对应下标   //新版

                jConfirm("主人，真的要删除我吗？",'',function(r){
                    if(r){
                        wx.stopVoice({
                            localId: self.video_localId[_this_index] // 需要停止的音频的本地ID，由stopRecord接口获得
                        });
                        self.video_localId.splice(_this_index,1);
                        self.video_time.splice(_this_index,1);
                        _this.parent("li").remove();
                    }
                });
            });
        }

        $('#try_btn').on('click',function(e){
            e.stopPropagation();
            e.preventDefault();
            self.hideErrorMsg();
            $(".upload_error_tips").html('正在处理...');
            self.try_upload();     // 存在上传失败的图片 ，重试上传失败的图片

        });
        $('#continue_btn').on('click',function(e){
            e.stopPropagation();
            e.preventDefault();
            self.hideErrorMsg();
            //$(".upload_error_tips").html('正在处理...');
            self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
        });
    },
    try_upload:function(){      //上传图片或者音频失败续传
        var self=this;
        var num_local_img_i=0;
        var num_server_img_i=0;
        var num_local_video_i=0;
        var num_server_video_i=0;
        //var  arr_length=self.img_localId.length + self.video_localId.length;  //图片跟音频的总的个数
        if(self.fail_local_img_arr.length>0){
            local_uploadimg();
        }else if(self.fail_server_img_arr.length>0){
            server_uploadimg();
        }else if(self.fail_local_video_arr.length>0){
            local_uploadvideo();
        }else if(self.fail_server_video_arr.length>0){
            server_uploadvideo();
        }else if(self.fail_media_id !=''){
            qcVideo.uploader.reUpload();
        }else{
            self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法							  
        }

        function local_uploadimg(){  //如果是图片上传到微信失败
            wx.uploadImage({
                localId: self.fail_local_img_arr[num_local_img_i], // 需要上传的图片的本地ID，由chooseImage接口获得
                isShowProgressTips: 0, // 默认为1，显示进度提示
                success: function (res) {

                    $.ajax({
                        url:self.upload_img_url,    //php 从微信下载图片的方法
                        type:'POST',
                        data:{'serverId':res.serverId},
                        dataType:'json',
                        success:function(data){
                            if(data.status !=0){
                                self.success_img_arr.push(data.data);
                                self.show_progress();
                                if(num_local_img_i == self.fail_local_img_arr.length-1){
                                    self.fail_local_img_arr.splice(num_local_img_i,1);
                                    if(self.fail_server_img_arr.length>0){
                                        server_uploadimg();
                                    }else if(self.fail_local_video_arr.length>0){
                                        local_uploadvideo();
                                    }else if(self.fail_server_video_arr.length>0){
                                        server_uploadvideo();
                                    }else if(self.fail_media_id !=''){
                                        qcVideo.uploader.reUpload();
                                    }else{
                                        if(self.fail_local_img_arr.length >0 ){
                                            self.showErrorMsg(); //提示存在上传失败的图片
                                        }else{
                                            self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法

                                        }
                                    }
                                }else{
                                    self.fail_local_img_arr.splice(num_local_img_i,1);
                                    //num_local_img_i++;
                                    local_uploadimg();
                                }
                            }else{
                                self.fail_server_img_arr.push(res.serverId);
                                self.show_progress();
                                if(num_local_img_i == self.fail_local_img_arr.length-1){
                                    self.fail_local_img_arr.splice(num_local_img_i,1);
                                    if(self.fail_server_img_arr.length>0){
                                        server_uploadimg();
                                    }else if(self.fail_local_video_arr.length>0){
                                        local_uploadvideo();
                                    }else if(self.fail_server_video_arr.length>0){
                                        server_uploadvideo();
                                    }else if(self.fail_media_id !=''){
                                        qcVideo.uploader.reUpload();
                                    }else{
                                        if(self.fail_local_img_arr.length >0 ){
                                            self.showErrorMsg(); //提示存在上传失败的图片
                                        }else{
                                            self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                                        }
                                    }
                                }else{
                                    //num_local_img_i++;
                                    self.fail_local_img_arr.splice(num_local_img_i,1);
                                    local_uploadimg();
                                }
                            }

                        },
                        error:function(){
                            self.fail_server_img_arr.push(res.serverId);
                            self.show_progress();
                            if(num_local_img_i == self.fail_local_img_arr.length-1){
                                self.fail_local_img_arr.splice(num_local_img_i,1);
                                if(self.fail_server_img_arr.length>0){
                                    server_uploadimg();
                                }else if(self.fail_local_video_arr.length>0){
                                    local_uploadvideo();
                                }else if(self.fail_server_video_arr.length>0){
                                    server_uploadvideo();
                                }else if(self.fail_media_id !=''){
                                    qcVideo.uploader.reUpload();
                                }else{
                                    if(self.fail_local_img_arr.length >0 ){
                                        self.showErrorMsg(); //提示存在上传失败的图片
                                    }else{
                                        self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                                    }
                                }
                            }else{
                                //num_local_img_i++;
                                self.fail_local_img_arr.splice(num_local_img_i,1);
                                local_uploadimg();
                            }
                        }
                    })

                },
                fail:function(){
                    //self.fail_local_img_arr.push(self.fail_local_img_arr[num_local_img_i]);
                    self.show_progress();
                    if(num_local_img_i == self.fail_local_img_arr.length-1){
                        if(self.fail_server_img_arr.length>0){
                            server_uploadimg();
                        }else if(self.fail_local_video_arr.length>0){
                            local_uploadvideo();
                        }else if(self.fail_server_video_arr.length>0){
                            server_uploadvideo();
                        }else if(self.fail_media_id !=''){
                            qcVideo.uploader.reUpload();
                        }else{
                            if(self.fail_local_img_arr.length >0 ){
                                self.showErrorMsg(); //提示存在上传失败的图片
                            }else{
                                self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                            }
                        }
                    }else{
                        num_local_img_i++;
                        local_uploadimg();
                    }
                }
            });

        }

        function server_uploadimg(){              //如果是图片从微信传到服务器失败
            $.ajax({
                url:self.upload_img_url,    //php 从微信下载图片的方法
                type:'POST',
                data:{'serverId':self.fail_server_img_arr[num_server_img_i]},
                dataType:'json',
                success:function(data){
                    if(data.status !=0){
                        self.success_img_arr.push(data.data);
                        self.show_progress();
                        if(num_local_img_i == self.fail_server_img_arr.length-1){
                            self.fail_server_img_arr.splice(num_server_img_i,1);
                            if(self.fail_local_video_arr.length>0){
                                local_uploadvideo();
                            }else if(self.fail_server_video_arr.length>0){
                                server_uploadvideo();
                            }else if(self.fail_media_id !=''){
                                qcVideo.uploader.reUpload();
                            }else{
                                if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 ){
                                    self.showErrorMsg(); //提示存在上传失败的图片
                                }else{
                                    self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                                }
                            }
                        }else{
                            self.fail_server_img_arr.splice(num_server_img_i,1);
                            //num_server_img_i++;
                            server_uploadimg();
                        }
                    }else{
                        self.show_progress();
                        if(num_local_img_i == self.fail_server_img_arr.length-1){
                            if(self.fail_local_video_arr.length>0){
                                local_uploadvideo();
                            }else if(self.fail_server_video_arr.length>0){
                                server_uploadvideo();
                            }else if(self.fail_media_id !=''){
                                qcVideo.uploader.reUpload();
                            }else{
                                if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 ){
                                    self.showErrorMsg(); //提示存在上传失败的图片
                                }else{
                                    self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                                }
                            }
                        }else{
                            num_server_img_i++;
                            server_uploadimg();
                        }
                    }
                },
                error:function(){
                    //self.fail_server_img_arr.push(self.fail_server_img_arr[num_server_img_i]);
                    self.show_progress();
                    if(num_local_img_i == self.fail_server_img_arr.length-1){
                        if(self.fail_local_video_arr.length>0){
                            local_uploadvideo();
                        }else if(self.fail_server_video_arr.length>0){
                            server_uploadvideo();
                        }else if(self.fail_media_id !=''){
                            qcVideo.uploader.reUpload();
                        }else{
                            if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 ){
                                self.showErrorMsg(); //提示存在上传失败的图片
                            }else{
                                self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                            }
                        }
                    }else{
                        num_server_img_i++;
                        server_uploadimg();
                    }
                }
            })
        }





        function local_uploadvideo(){             //如果是音频上传到微信失败
            wx.uploadVoice({
                localId: self.fail_local_video_arr[num_local_video_i],
                isShowProgressTips: 0,
                success: function (res) {

                    $.ajax({    //将图片从微信端传到服务器
                        url:self.upload_video_url,
                        type:'POST',
                        data:{'serverId':res.serverId},
                        dataType:'json',
                        success:function(data){
                            if(data.status !=0){
                                self.success_video_arr.push(data.data);
                                self.show_progress();
                                if(num_local_video_i == self.fail_local_video_arr.length-1){
                                    self.fail_local_video_arr.splice(num_local_video_i,1);
                                    if(self.fail_server_video_arr.length>0){
                                        server_uploadvideo();
                                    }else if(self.fail_media_id !=''){
                                        qcVideo.uploader.reUpload();
                                    }else{
                                        if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 || self.fail_local_video_arr.length >0 ){
                                            self.showErrorMsg(); //提示存在上传失败的图片
                                        }else{
                                            self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                                        }
                                    }
                                }else{
                                    //num_local_video_i++;
                                    self.fail_local_video_arr.splice(num_local_video_i,1);
                                    local_uploadvideo();
                                }
                            }else{
                                self.fail_server_video_arr.push(res.serverId);
                                self.show_progress();
                                if(num_local_video_i == self.fail_local_video_arr.length-1){
                                    self.fail_local_video_arr.splice(num_local_video_i,1);
                                    if(self.fail_server_video_arr.length>0){
                                        server_uploadvideo();
                                    }else if(self.fail_media_id !=''){
                                        qcVideo.uploader.reUpload();
                                    }else{
                                        if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 || self.fail_local_video_arr.length >0 ){
                                            self.showErrorMsg(); //提示存在上传失败的图片
                                        }else{
                                            self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                                        }
                                    }
                                }else{
                                    self.fail_local_video_arr.splice(num_local_video_i,1);
                                    //num_local_video_i++;
                                    local_uploadvideo();
                                }
                            }
                        },
                        error:function(){
                            self.fail_server_video_arr.push(res.serverId);
                            self.show_progress();
                            if(num_local_video_i == self.fail_local_video_arr.length-1){
                                self.fail_local_video_arr.splice(num_local_video_i,1);
                                if(self.fail_server_video_arr.length>0){
                                    server_uploadvideo();
                                }else if(self.fail_media_id !=''){
                                    qcVideo.uploader.reUpload();
                                }else{
                                    if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 || self.fail_local_video_arr.length >0 ){
                                        self.showErrorMsg(); //提示存在上传失败的图片
                                    }else{
                                        self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                                    }
                                }
                            }else{
                                self.fail_local_video_arr.splice(num_local_video_i,1);
                                //num_local_video_i++;
                                local_uploadvideo();
                            }
                        }
                    })


                },
                fail:function(){
                    //self.fail_local_video_arr.push(self.fail_local_video_arr[num_local_video_i]);
                    self.show_progress();
                    if(num_local_video_i == self.fail_local_video_arr.length-1){
                        if(self.fail_server_video_arr.length>0){
                            server_uploadvideo();
                        }else if(self.fail_media_id !=''){
                            qcVideo.uploader.reUpload();
                        }else{
                            if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 || self.fail_local_video_arr.length >0 ){
                                self.showErrorMsg(); //提示存在上传失败的图片
                            }else{
                                self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                            }
                        }
                    }else{
                        num_local_video_i++;
                        local_uploadvideo();
                    }
                }
            });

        }
        //uploadvideo();


        function server_uploadvideo(){              //如果是音频从微信传到服务器失败
            $.ajax({
                url:self.upload_video_url,    //php 从微信下载图片的方法
                type:'POST',
                data:{'serverId':self.fail_server_video_arr[num_server_video_i]},
                dataType:'json',
                success:function(data){
                    if(data.status !=0){
                        self.success_img_arr.push(data.data);
                        self.show_progress();
                        if(num_server_video_i == self.fail_server_video_arr.length-1){
                            self.fail_server_video_arr.splice(num_server_video_i,1);
                            if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 || self.fail_local_video_arr.length >0 || self.fail_server_video_arr.length >0 ){
                                self.showErrorMsg(); //提示存在上传失败的图片
                            }else if(self.fail_media_id !=''){
                                qcVideo.uploader.reUpload();
                            }else{
                                self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                            }

                        }else{
                            self.fail_server_video_arr.splice(num_server_video_i,1);
                            //num_local_video_i++;
                            local_uploadvideo();
                        }
                    }else{
                        self.show_progress();
                        if(num_server_video_i == self.fail_server_video_arr.length-1){
                            if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 || self.fail_local_video_arr.length >0 || self.fail_server_video_arr.length >0 ){
                                self.showErrorMsg(); //提示存在上传失败的图片
                            }else if(self.fail_media_id !=''){
                                qcVideo.uploader.reUpload();
                            }else{
                                self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                            }

                        }else{
                            num_local_video_i++;
                            local_uploadvideo();
                        }
                    }
                },
                error:function(){
                    // self.fail_server_img_arr.push(self.img_localId[num_server_video_i]);
                    self.show_progress();
                    if(num_server_video_i == self.fail_server_video_arr.length-1){
                        if(self.fail_local_img_arr.length >0 || self.fail_server_img_arr.length >0 || self.fail_local_video_arr.length >0 || self.fail_server_video_arr.length >0 ){
                            self.showErrorMsg(); //提示存在上传失败的图片
                        }else{
                            self.wxsdkSendData(self.success_img_arr, self.success_video_arr,self.video_time,self.success_media_id);  //调用提交 表单跟图片音频的方法
                        }

                    }else{
                        num_local_video_i++;
                        local_uploadvideo();
                    }
                }
            })
        }

    },
    //显示加载进度
    show_progress:function(){
        var self=this;
        var  arr_length=self.img_localId.length + self.video_localId.length;  //图片跟音频的总的个数
        var percent=Math.floor((self.success_img_arr.length + self.success_video_arr.length)/arr_length *100);
        if(percent>100){
            percent=100;
        }
        var str = '图片音频已上传' + percent + '%';
        if (self.img_localId.length == 0 && self.video_localId.length > 0)
            str = '音频已上传' + percent + '%';
        if (self.img_localId.length > 0 && self.video_localId.length == 0)
            str = '图片已上传' + percent + '%';
        $('#progress_text').text(str);
    },
    //添加显示上传失败提示页面
    addErrorMsg: function () {
        $("body").append("<div id=\"upload_error\" class=\"upload_error_bg\"><div class=\"upload_error\"><div class=\"upload_error_tips\"></div><div><div id=\"try_btn\">重试</div><div id=\"continue_btn\">跳过直接发布</div></div></div></div>");
    },
    // 显示失败提示页面（文本值）
    showErrorMsg: function () {
        $("#upload_error").css("display", "block");
        $("body").css("position", "fixed");
        $(".upload_error").css("margin-left", $(window).width() / 2 - 130);
        var error_text='';
        if(this.fail_local_img_arr.length + this.fail_server_img_arr.length >0){
            var error_img_num=this.fail_local_img_arr.length + this.fail_server_img_arr.length;
            error_text += error_img_num +'张图片上传失败！';
        }
        if(this.fail_local_video_arr.length + this.fail_server_video_arr.length >0){
            var error_video_num=this.fail_local_video_arr.length + this.fail_server_video_arr.length;
            error_text += error_video_num +'个语音上传失败！';
        }
        if(this.fail_media_id!=''){
            error_text +='1个视频上传失败！';
        }
        $(".upload_error_tips").html(error_text);
    },
    // 隐藏失败提示页面
    hideErrorMsg: function () {
        $("#upload_error").hide();
        $("body").css("position", "static");
    },
    // 添加Loading
    addLoadingMsg: function () {
        $("body").append("<div id=\"progress\" class=\"progress_bg\"><div class=\"progress\"><div class=\"loading\"></div><br><span id=\"progress_text\">正在载入...</span></div></div>");
    },
    // 显示Loading （文本值）
    showLoadingMsg: function (text) {
        $("#progress").css("display", "block");
        $("body").css("position", "fixed");
        $(".progress").css("margin-left", $(window).width() / 2 - 80);
        if (text) {
            $("#progress span").text(text);
        }
    },
    // 隐藏Loading
    hideLoadingMsg: function () {
        $("#progress").hide();
        $("body").css("position", "static");
    },
    funCountTime:function(){
        var self=this;
        self.count_time -=1;
        $(self.say_tips2).html('还能录<span class="pink_f">'+ self.count_time +'</span>秒');
        if(self.count_time==0){
            self.count_time=60;
            wx.stopRecord({
                success: function (res) {
                    $(".babysay_bg").hide();
                    var end_time= new Date();
                    self.video_end_time=Math.round(parseInt(end_time.getTime())/1000);
                    self.video_period_time=self.video_end_time - self.video_start_time;

                    if (parseInt(self.video_period_time) > 0 && parseInt(self.video_period_time) <= 60) {
                        window.clearTimeout(self.settimeout_fun);
                        self.video_localId.push(res.localId);
                        self.video_time.push(self.video_period_time);
                        $(self.video_list).append('<li class="sdk_voice_li" video_index="' + (self.video_localId.length - 1) + '"><div class="arrow"></div><div class="voice_play_tip"></div><div class="voice_play_time">'+ self.video_period_time +'"</div><div class="' + self.del_video_btn + '" ></div></li>');   //新版

                        //停止录音就上传
                        if (self.sent_record_directly) {
                            $(self.upload_btn).click();
                        }
                    } else {
                        jAlert("抱歉，咨询出错啦，请检查一下你的网络或者重新录音再发送！");
                    }
                },
                fail: function (res) {
                    //alert(JSON.stringify(res));
                    jAlert("抱歉，咨询出错啦，请检查一下你的网络或者重新录音再发送！");
                }
            });
            $(self.record_btn).removeClass("record_stop");
            $(self.say_tips).text('点击话筒开始录音吧');
            $(self.say_tips2).html('时长不超过<span class="pink_f">'+ self.count_time +'</span>秒');
        }else{
            self.settimeout_fun=window.setTimeout(function(){
                self.funCountTime();
            },1000);
        }

    },
    count_index:function(obj_index,class_name){             //新版
        var _this_index0=obj_index;
        var _this_index=-1;
        var this_li=$("."+ class_name).parent().children("li");
        for(var i=0; i <= _this_index0; i++){
            if(this_li.eq(i).hasClass(class_name)){
                _this_index +=1;
            }
        }
        return _this_index;
    }

}

/*upload结束*/
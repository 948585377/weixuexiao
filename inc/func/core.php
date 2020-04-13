<?php
/**
 * 微教育模块
 *
 * @author 高贵血迹
 */
defined ( 'IN_IA' ) or exit ( 'Access Denied' );
class Core extends WeModuleSite {

    // ===============================================
    public $m = 'wx_school';
    public $table_assteach = 'wx_school_assteach';
    public $table_classify = 'wx_school_classify';
    public $table_points = 'wx_school_points';
    public $table_pointsrecord = 'wx_school_pointsrecord';
    public $table_address = 'wx_school_address';
    public $table_mall = 'wx_school_mall';
    public $table_mallorder = 'wx_school_mallorder';
    public $table_score = 'wx_school_score';
    public $table_news = 'wx_school_news';
    public $table_index = 'wx_school_index';
    public $table_students = 'wx_school_students';
    public $table_tcourse = 'wx_school_tcourse';
    public $table_teachers = 'wx_school_teachers';
    public $table_area = 'wx_school_area';
    public $table_type = 'wx_school_type';
    public $table_kcbiao = 'wx_school_kcbiao';
    public $table_cook = 'wx_school_cookbook';
    public $table_reply = 'wx_school_reply';
    public $table_banners = 'wx_school_banners';
    public $table_bbsreply = 'wx_school_bbsreply';
    public $table_user = 'wx_school_user';
    public $table_set = 'wx_school_set';
    public $table_leave = 'wx_school_leave';
	public $table_liuyan = 'wx_school_liuyan';
    public $table_notice = 'wx_school_notice';
    public $table_bjq = 'wx_school_bjq';
    public $table_media = 'wx_school_media';
    public $table_dianzan = 'wx_school_dianzan';
    public $table_order = 'wx_school_order';
    public $table_wxpay = 'wx_school_wxpay';
    public $table_group = 'wx_school_fans_group';
    public $table_qrinfo = 'wx_school_qrcode_info';
    public $table_qrset = 'wx_school_qrcode_set';
    public $table_qrstat = 'wx_school_qrcode_statinfo';
    public $table_cost = 'wx_school_cost';
    public $table_object = 'wx_school_object';
    public $table_signup = 'wx_school_signup';
    public $table_record = 'wx_school_record';
    public $table_checkmac = 'wx_school_checkmac';
    public $table_checklog = 'wx_school_checklog';
    public $table_idcard = 'wx_school_idcard';
    public $table_icon = 'wx_school_icon';
    public $table_timetable = 'wx_school_timetable';
    public $table_zjh = 'wx_school_zjh';
    public $table_zjhset = 'wx_school_zjhset';
    public $table_zjhdetail = 'wx_school_zjhdetail';
    public $table_scset = 'wx_school_shouceset';
    public $table_scicon = 'wx_school_shouceseticon';
    public $table_sc = 'wx_school_shouce';
    public $table_scpy = 'wx_school_shoucepyk';
    public $table_scforxs = 'wx_school_scforxs';
    public $table_allcamera = 'wx_school_allcamera';
    public $table_camerapl = 'wx_school_camerapl';
    public $table_class = 'wx_school_user_class';
    public $table_online = 'wx_school_online';
    public $table_questions = 'wx_school_questions';
    public $table_answers = 'wx_school_answers';
    public $table_ans_remark = 'wx_school_ans_remark';
    public $table_gongkaike = 'wx_school_gongkaike';
    public $table_gkkpjk = 'wx_school_gkkpjk';
    public $table_gkkpj = 'wx_school_gkkpj';
    public $table_gkkpjbz = 'wx_school_gkkpjbz';
    public $table_groupactivity = 'wx_school_groupactivity';
    public $table_groupsign = 'wx_school_groupsign';
    public $table_todo = 'wx_school_todo';
    public $table_camerask = 'wx_school_camerask';
    public $table_courseorder = 'wx_school_courseorder';
    public $table_cyybeizhu_teacher = 'wx_school_cyybeizhu_teacher';
    public $table_coursebuy = 'wx_school_coursebuy';
    public $table_kcsign = 'wx_school_kcsign';
    public $table_tempstudent = 'wx_school_tempstudent';
    public $table_fzqx = 'wx_school_fzqx';
    public $table_kcpingjia = 'wx_school_kcpingjia';
    public $table_chongzhi = 'wx_school_chongzhi';
    public $table_checkdateset = 'wx_school_checkdateset';
    public $table_checkdatedetail = 'wx_school_checkdatedetail';
    public $table_checktimeset = 'wx_school_checktimeset';
    public $table_apartment = 'wx_school_apartment';
    public $table_aproom = 'wx_school_aproom';
    public $table_booksborrow = 'wx_school_booksborrow';
    public $table_help = 'wx_school_helps';
    public $table_printer = 'wx_school_printer';
    public $table_print_log = 'wx_school_print_log';
    public $table_printset = 'wx_school_printset';
    public $table_teascore = 'wx_school_teascore';
    public $table_lanset = 'wx_school_language';
    public $table_buzhulog = 'wx_school_buzhulog';
    public $table_yuecostlog = 'wx_school_yuecostlog';
    public $table_upsence = 'wx_school_upsence';
    public $table_teasencefiles = 'wx_school_teasencefiles';
    public $table_visitors = 'wx_school_visitors';
    public $table_vislog = 'wx_school_vislog';
	public $table_schoolset = 'wx_school_schoolset';
	public $table_busgps = 'wx_school_busgps';
	public $table_notice_comment = 'wx_school_notice_comment';
	
	public $table_classcard_mac = 'wx_school_classcard_mac';
	public $table_classcard_set = 'wx_school_classcard_set';
	public $table_classcard_kh = 'wx_school_classcard_kouhao';
	public $table_classcard_honour = 'wx_school_classcard_honour';
	public $table_classcard_epaper = 'wx_school_classcard_epaper';
	public $table_classcard_duty = 'wx_school_classcard_duty';
	public $table_classcard_praise = 'wx_school_classcard_praise';
	public $table_classcard_praise_type = 'wx_school_classcard_praise_type';
	public $table_classcard_praise_comment = 'wx_school_classcard_praise_comment';
	public $table_classcard_checklog = 'wx_school_classcard_checklog';
	
    public function getNaveMenu($schoolid, $action,$IsDep = false) {
        global $_W, $_GPC;
        $do = $_GPC['do'];
        $navemenu = array();
        $school = pdo_fetch("SELECT is_cost,is_recordmac,is_rest,shoucename,is_video,videoname,is_kb,mallsetinfo,issale,is_chongzhi,is_qx,is_printer,is_buzhu,is_ap,is_book  FROM " . tablename($this->table_index) . " WHERE :id = id", array(':id' => $schoolid));
        $schoolset = pdo_fetch("SELECT * FROM ".GetTableName('schoolset')." WHERE schoolid = '{$schoolid}' ");

        $mallsetinfo = unserialize($school['mallsetinfo']);
        if(!empty($_W['tid']) && $_W['tid'] != 0 ){
            $tid = $_W['tid'];
            //查看是否是喂药管家
            $doctor = pdo_fetch("SELECT doctorid FROM " . GetTableName('schoolset') . " WHERE schoolid = '{$schoolid}'");
            if($doctor['doctorid'] == $tid){
                $drugmanager = true;
            }else{
                $drugmanager = false;
            }
            //查看是否是校长
            $ismaster = pdo_fetch("SELECT status FROM " . GetTableName('teachers') . " WHERE schoolid = '{$schoolid}' AND id = '{$tid}'");

            if($ismaster['status'] == 2){
                $schoolteacher = true;
            }else{
                $schoolteacher = false;
            }

            $loginTeaFzid =  pdo_fetch("SELECT fz_id FROM " . tablename ($this->table_teachers) . " where schoolid = :schoolid And id =:id ", array(':schoolid' => $schoolid,':id'=>$tid));
            $qxarr = GetQxByFz($loginTeaFzid['fz_id'],1,$schoolid);
        }
        if($IsDep == false){
            $navemenu[0] = array(
                'title' => '<icon style="color:#d9534f;" class="fa fa123 fa-cog"></icon>  <span class="big_title">基本设置</span>',
                'items' => array(
                    0 => array(
                        'title' => '校园概览 ',
                        'url' => $do != 'start' ? $this->createWebUrl('start', array('op' => 'display', 'schoolid' => $schoolid)) : $this->createWebUrl('start', array('op' => 'display', 'schoolid' => $schoolid)),
                        'active' => $action == 'start' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#d9534f;" class="fa fa-bank"></i>',
                        ),
                    ),
                ),
                'icon' => 'fa fa-user-md',
                'this' => 'no1'
            );
    
            if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100010')){
                $navemenu[0]['items'][] =  array(
                    'title' => '校园设置 ',
                    'url' => $do != 'schoolset' ? $this->createWebUrl('schoolset', array('op' => 'post', 'schoolid' => $schoolid)) : '#',
                    'active' => $action == 'schoolset' ? ' active' : '',
                    'append' => array(
                        'title' => '<i style="color:#d9534f;" class="fa fa-cog"></i>',
                    ),
                );
            }
            if($_W['isfounder'] || $_W['role'] == 'owner' || $_W['role'] == 'manager' || strstr($qxarr,'10002')){
                $navemenu[0]['items'][] = array(
                    'title' => '基础设置 ',
                    'url' => $do != 'semester' ? $this->createWebUrl('semester', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                    'active' => $action == 'semester' ? ' active' : '',
                    'append' => array(
                        'title' => '<i style="color:#d9534f;" class="fa fa-bars"></i>',
                    ),
                );
            }
            if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100030')){
                if ($school['is_video']==1 && !empty($school['videoname'])) {
                    $navemenu[0]['items'][] = array(
                        'title' => $school['videoname'],
                        'url' => $do != 'allcamera' ? $this->createWebUrl('allcamera', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'allcamera' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#d9534f;" class="fa fa-eye"></i>',
                        ),
                    );
                }
            }
            if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100040')    ){
                $navemenu[0]['items'][] = array(
                    'title' => '食谱管理', 'url' => $do != 'cook' ? $this->createWebUrl('cook', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                    'active' => $action == 'cook' ? ' active' : '',
                    'append' => array(
                        'title' => '<i style="color:#d9534f;" class="fa fa-cutlery"></i>',
                    )
                );
            }
            if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100050')    ){
                $navemenu[0]['items'][] = array(
                    'title' => '幻灯片管理',
                    'url' => $do != 'banner' ? $this->createWebUrl('banner', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                    'active' => $action == 'banner' ? ' active' : '',
                    'append' => array(
                        'title' => '<i style="color:#d9534f;" class="fa fa-image"></i>',
                    ),
                );
            }
            if(!ShowSomeThing()){
                if($_W['isfounder'] || $_W['role'] == 'owner' ){
                    $navemenu[0]['items'][] = array(
                        'title' => '应用列表',
                        'url' => $do != 'apps' ? $this->createWebUrl('apps', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'apps' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#d9534f;" class="fa fa-cubes"></i>',
                        ),
                    );
                }
            }
            
            $tag = 1 ;
            if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100060') || strstr($qxarr,'100070') || strstr($qxarr,'1004101')   || strstr($qxarr,'100080') || strstr($qxarr,'10009') || strstr($qxarr,'100100') || strstr($qxarr,'10011') ){
                $navemenu[$tag] = array(
                    'title' => '<icon style="color:#7228b5;" class="fa fa123 fa-database"></icon>  <span class="big_title">教务管理</span>',
                    'this' => 'no2'
                );
                if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100060')    ){
                    $navemenu[$tag]['items'][] = array(
                        'title' => '教师管理',
                        'url' => $do != 'assess' ? $this->createWebUrl('assess', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'assess' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#7228b5;" class="fa fa-user"></i>',
                        ),
                    );
                }
               
    
                if(is_showpf()){
    
                    if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100310')    ){
                        $navemenu[$tag]['items'][] = array(
                            'title' => '教师评分',
                            'url' => $do != 'teascore' ? $this->createWebUrl('teascore', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                            'active' => $action == 'teascore' ? ' active' : '',
                            'append' => array(
                                'title' => '<i style="color:#7228b5;" class="fa fa-pencil"></i>',
                            ),
                        );
                    }
                    if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'1003801') ){
                        $navemenu[$tag]['items'][] = array(
                            'title' => '资料上传',
                            'url' => $do != 'uploadsence' ? $this->createWebUrl('uploadsence', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                            'active' => $action == 'uploadsence' ? ' active' : '',
                            'append' => array(
                                'title' => '<i style="color:#7228b5;" class="fa fa-upload"></i>',
                            ),
                        );
                    }
                }
    
    
                if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100070')    ){
                    $navemenu[$tag]['items'][] =  array(
                        'title' => '学生管理',
                        'url' => $do != 'students' ? $this->createWebUrl('students', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'students' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#7228b5;" class="fa fa-users"></i>',
                        ),
                    );
                }
                if (is_showpf()){
                    if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100330')    ){
                        $navemenu[$tag]['items'][] =  array(
                            'title' => '学生评分',
                            'url' => $do != 'studentscore' ? $this->createWebUrl('studentscore', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                            'active' => $action == 'studentscore' ? ' active' : '',
                            'append' => array(
                                'title' => '<i style="color:#7228b5;" class="fa fa-pencil-square-o"></i>',
                            ),
                        );
                    }
    
                    if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'1004101')    ){
                        $navemenu[$tag]['items'][] =  array(
                            'title' => '班级评分',
                            'url' => $do != 'bjscore' ? $this->createWebUrl('bjscore', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                            'active' => $action == 'bjscore' ? ' active' : '',
                            'append' => array(
                                'title' => '<i style="color:#7228b5;" class="fa fa-pencil-square-o"></i>',
                            ),
                        );
                    }
                }
    
    
                if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100080')){
                    $navemenu[$tag]['items'][] =  array(
                        'title' => '成绩管理',
                        'url' => $do != 'chengji' ? $this->createWebUrl('chengji', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'chengji' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#7228b5;" class="fa fa-book"></i>',
                        ),
                    );
                }
                if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'10009')){
                    if( strstr($qxarr,'1000901') || strstr($qxarr,'1000921') || strstr($qxarr,'1000941') || (is_showgkk() && strstr($qxarr,'1000951')) || $_W['isfounder'] || $_W['role'] == 'owner' ){
                        $navemenu[$tag]['items'][] = array(
                            'title' => '课程管理', 'url' => $do != 'kecheng' ? $this->createWebUrl('kecheng', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                            'active' => $action == 'kecheng' ? ' active' : '',
                            'append' => array(
                                'title' => '<i style="color:#7228b5;" class="fa fa-graduation-cap"></i>',
                            ),
                        );
    
                    }
                }
                if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100100')){
                    if ($school['is_kb'] == 1) {
                        $navemenu[$tag]['items'][] = array(
                            'title' => '公立课表',
                            'url' => $do != 'timetable' ? $this->createWebUrl('timetable', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                            'active' => $action == 'timetable' ? ' active' : '',
                            'append' => array(
                                'title' => '<i style="color:#7228b5;" class="fa fa-bomb"></i>',
                            ),
                        );
                    }
                }
                if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'10011')){
                    if ($school['is_rest'] == 1 && $school['shoucename']) {
                        $navemenu[$tag]['items'][] = array(
                            'title' => $school['shoucename'],
                            'url' => $do != 'shoucelist' ? $this->createWebUrl('shoucelist', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                            'active' => $action == 'shoucelist' ? ' active' : '',
                            'append' => array(
                                'title' => '<i style="color:#7228b5;" class="fa fa-child"></i>',
                            ),
                        );
                    }
                }
                $tag++;
            }
            if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'10012') || strstr($qxarr,'100130') || strstr($qxarr,'10014') || strstr($qxarr,'100150') || strstr($qxarr,'100160') || strstr($qxarr,'100170') || strstr($qxarr,'100180') || strstr($qxarr,'100190')  || $drugmanager || $schoolteacher || strstr($qxarr,'1004501')){
                $navemenu[$tag] = array(
                    'title' => '<icon style="color:#258a25;" class="fa fa123 fa-wechat"></icon> <span class="big_title">互动管理</span> ',
                    'this' => 'no3'
                );
                if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'10012')){
                    $navemenu[$tag]['items'][] = array(
                        'title' =>'作业通知请假',
                        'url' => $do != 'notice' ? $this->createWebUrl('notice', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'notice' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#258a25;" class="fa fa-bullhorn"></i>',
                        ),
                    );
                }
                if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100130')){
                    $navemenu[$tag]['items'][] = array(
                        'title' => '报名管理',
                        'url' => $do != 'signup' ? $this->createWebUrl('signup', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'signup' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#258a25;" class="fa fa-comments"></i>',
                        ),
                    );
                }
                if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'10014')    ){
                    $navemenu[$tag]['items'][] = array(
                        'title' => '文章系统',
                        'url' => $do != 'article' ? $this->createWebUrl('article', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'article' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#258a25;" class="fa fa-desktop"></i>',
                        ),
                    );
                }
                if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100150')    ){
                    $navemenu[$tag]['items'][] = array(
                        'title' => '班级圈管理',
                        'url' => $do != 'bjquan' ? $this->createWebUrl('bjquan', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'bjquan' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#258a25;" class="fa fa-wechat"></i>',
                        ),
                    );
                }
                if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100160')){
                    $navemenu[$tag]['items'][] = array(
                        'title' => '相册管理',
                        'url' => $do != 'photos' ? $this->createWebUrl('photos', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'photos' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#258a25;" class="fa fa-camera"></i>',
                        ),
                    );
                }
                if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100170')    ){
                    $navemenu[$tag]['items'][] = array(
                        'title' => '集体活动',
                        'url' => $do != 'groupactivity' ? $this->createWebUrl('groupactivity', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'groupactivity' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#258a25;" class="fa fa-trophy"></i>',
                        ),
                    );
                }
                if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100180')    ){
                    $navemenu[$tag]['items'][] = array(
                        'title' => '家政家教',
                        'url' => $do != 'houseorder' ? $this->createWebUrl('houseorder', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'houseorder' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#258a25;" class="fa fa-coffee"></i>',
                        ),
                    );
                }
                if($_W['isfounder'] || $_W['role'] == 'owner' || strstr($qxarr,'100190')    ){
                    $navemenu[$tag]['items'][] = array(
                        'title' => '校长信箱',
                        'url' => $do != 'yzxx' ? $this->createWebUrl('yzxx', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'yzxx' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#258a25;" class="fa fa-comments"></i>',
                        ),
                    );
                }
                if(keep_Blacklist()){
                    if($_W['isfounder'] || $_W['role'] == 'owner' || $drugmanager || $schoolteacher || strstr($qxarr,'1004501')){
                        $navemenu[$tag]['items'][] = array(
                            'title' => '喂药管理',
                            'url' => $do != 'drug' ? $this->createWebUrl('drug', array('schoolid' => $schoolid,'status'=>'-1')) : '#',
                            'active' => $action == 'drug' ? ' active' : '',
                            'append' => array(
                                'title' => '<i style="color:#258a25;" class="fa fa-medkit" aria-hidden="true"></i>',
                            ),
                        );
                    }
                }
                $tag++;
            }
            if($_W['isfounder'] || $_W['role'] == 'owner' || ( $school['is_cost'] != 2 && (strstr($qxarr,'100200') || strstr($qxarr,'100210') || strstr($qxarr,'100220') || strstr($qxarr,'100221') || strstr($qxarr,'100222') )) ){
                $navemenu[$tag] = array(
                    'title' => '<icon style="color:#cc6b08;" class="fa fa123 fa-money"></icon> <span class="big_title">财务管理</span> ',
                    'this' => 'no4'
                );
                if (($school['is_cost'] != 2 && strstr($qxarr,'100200') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    $navemenu[$tag]['items'][] = array(
                        'title' => '缴费管理',
                        'url' => $do != 'cost' ? $this->createWebUrl('cost', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'cost' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#cc6b08;" class="fa fa-money"></i>',
                        ),
                    );
                }
                if (($school['is_cost'] != 2 && strstr($qxarr,'100210') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    $navemenu[$tag]['items'][] = array(
                        'title' => '订单管理',
                        'url' => $do != 'payall' ? $this->createWebUrl('payall', array('op' => 'display', 'schoolid' => $schoolid, 'is_pay' => '-1')) : '#',
                        'active' => $action == 'payall' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#cc6b08;" class="fa fa-bar-chart-o"></i>',
                        ),
                    );
                }
                if (($school['is_cost'] != 2 && ( strstr($qxarr,'100220') || strstr($qxarr,'100221') || strstr($qxarr,'100222') ) ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    if($school['is_chongzhi'] == 1){
                        $navemenu[$tag]['items'][] = array(
                            'title' => '充值管理',
                            'url' => $do != 'chongzhi' ? $this->createWebUrl('chongzhi', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                            'active' => $action == 'chongzhi' ? ' active' : '',
                            'append' => array(
                                'title' => '<i style="color:#cc6b08;" class="fa fa-cny"></i>',
                            ),
                        );
                    }
                }
    
    
                // if (($school['is_cost'] != 2 &&  strstr($qxarr,'1004401')) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                //     if($school['is_chongzhi'] == 1){
                //         $navemenu[$tag]['items'][] = array(
                //             'title' => '退费管理',
                //             'url' => $do != 'yuerefound' ? $this->createWebUrl('yuerefound', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                //             'active' => $action == 'yuerefound' ? ' active' : '',
                //             'append' => array(
                //                 'title' => '<i style="color:#cc6b08;" class="fa fa-mail-reply"></i>',
                //             ),
                //         );
                //     }
                // }
                if (($school['is_cost'] != 2 && strstr($qxarr,'10030') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    if($school['is_printer'] == 1){
                        $navemenu[$tag]['items'][] = array(
                            'title' => '小票打印',
                            'url' => $do != 'printlog' ? $this->createWebUrl('printlog', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                            'active' => $action == 'printlog' ? ' active' : '',
                            'append' => array(
                                'title' => '<i style="color:#cc6b08;" class="fa fa-print"></i>',
                            ),
                        );
                    }
                }
                if(is_showap()){
                    if (($school['is_cost'] != 2 && strstr($qxarr,'1003901') ) || $_W['isfounder'] || $_W['role'] == 'owner' ) {
                        if($school['is_buzhu'] == 1){
                            $navemenu[$tag]['items'][] = array(
                                'title' => '国家补助',
                                'url' => $do != 'buzhu' ? $this->createWebUrl('buzhu', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                                'active' => $action == 'buzhu' ? ' active' : '',
                                'append' => array(
                                    'title' => '<i style="color:#cc6b08;" class="fa fa-heart"></i>',
                                ),
                            );
                        }
                    }
                }
    
    
                $tag++;
            }
            if($_W['isfounder'] || $_W['role'] == 'owner' || ($school['is_recordmac'] != 2 && (strstr($qxarr,'100230') || strstr($qxarr,'100240') || strstr($qxarr,'100250'))) ){
                $navemenu[$tag] = array(
                    'title' => '<icon style="color:#077ccc;" class="fa fa123 fa-credit-card"></icon> <span class="big_title">考勤管理</span> ',
                    'this' => 'no5'
                );
                if ( ($school['is_recordmac'] != 2 && strstr($qxarr,'100290') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    $navemenu[$tag]['items'][] = array(
                        'title' => '时间设置',
                        'url' => $do != 'checkdateset' ? $this->createWebUrl('checkdateset', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'checkdateset' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#077ccc;" class="fa fa-indent"></i>',
                        ),
                    );
                }
                if ( ($school['is_recordmac'] != 2 && strstr($qxarr,'100230') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    $navemenu[$tag]['items'][] = array(
                        'title' => '考勤记录',
                        'url' => $do != 'checklog' ? $this->createWebUrl('checklog', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'checklog' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#077ccc;" class="fa fa-table"></i>',
                        ),
                    );
                }
                if ( ($school['is_recordmac'] != 2 && strstr($qxarr,'100240') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    $navemenu[$tag]['items'][] = array(
                        'title' => '设备管理',
                        'url' => $do != 'check' ? $this->createWebUrl('check', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'check' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#077ccc;" class="fa fa-gears"></i>',
                        ),
                    );
                }
                if ( ($school['is_recordmac'] != 2 && strstr($qxarr,'100250') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    $navemenu[$tag]['items'][] = array(
                        'title' => '考勤卡库',
                        'url' => $do != 'cardlist' ? $this->createWebUrl('cardlist', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'cardlist' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#077ccc;" class="fa fa-credit-card"></i>',
                        ),
                    );
                }
                if(vis()){
                    if (  strstr($qxarr,'1004001') || strstr($qxarr,'1004011')  || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    $navemenu[$tag]['items'][] = array(
                        'title' => '访问预约',
                        'url' => $do != 'visitors' ? $this->createWebUrl('visitors', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'visitors' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#077ccc;" class="fa fa-male"></i>',
                        ),
                    );
                    }
                }
                $tag++;
            }
            if($mallsetinfo['isShow'] == 1){
                if($_W['isfounder'] || $_W['role'] == 'owner' || ($mallsetinfo['isShow'] == 1 && (strstr($qxarr,'100260') || strstr($qxarr,'100270') || strstr($qxarr,'10028'))) ){
                    //商城
                    $navemenu[$tag] = array(
                        'title' => '<icon style="color:#47e0d5;" class="fa fa123 fa-shopping-cart"></icon> <span class="big_title">商城管理</span> ',
                        'this' => 'no6'
                    );
        
                    if ( ($mallsetinfo['isShow'] == 1 && strstr($qxarr,'100260') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                        $navemenu[$tag]['items'][] = array(
                            'title' => '商品设置',
                            'url' => $do != 'malladd' ? $this->createWebUrl('malladd', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                            'active' => $action == 'malladd' ? ' active' : '',
                            'append' => array(
                                'title' => '<i style="color:#47e0d5;" class="fa fa-gift"></i>',
                            ),
                        );
                    }
                    if ( ($mallsetinfo['isShow'] == 1 && strstr($qxarr,'100270') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                        $navemenu[$tag]['items'][] = array(
                            'title' => '商城订单',
                            'url' => $do != 'mallorder' ? $this->createWebUrl('mallorder', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                            'active' => $action == 'mallorder' ? ' active' : '',
                            'append' => array(
                                'title' => '<i style="color:#47e0d5;" class="fa fa-reorder"></i>',
                            ),
                        );
                    }
                    if ( ($mallsetinfo['isShow'] == 1 && strstr($qxarr,'10028') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                        $navemenu[$tag]['items'][] = array(
                            'title' => '积分管理',
                            'url' => $do != 'points' ? $this->createWebUrl('points', array('op' => 'post', 'schoolid' => $schoolid)) : '#',
                            'active' => $action == 'points' ? ' active' : '',
                            'append' => array(
                                'title' => '<i style="color:#47e0d5;" class="fa fa-paper-plane-o"></i>',
                            ),
                        );
                    }
                    $tag++;
                }
            }
            if($_W['isfounder'] || $_W['role'] == 'owner' || ($school['is_recordmac'] != 2) ){
                
                $navemenu[$tag] = array(
                    'title' => '<icon style="color:#47e0d5;" class="fa fa123 fa-credit-card"></icon> <span class="big_title">班牌管理</span> ',
                    'this' => 'no10'
                );
    
                if ( (strstr($qxarr,'1004601') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    $navemenu[$tag]['items'][] = array(
                        'title' => '基础设置',
                        'url' => $do != 'classcardset' ? $this->createWebUrl('classcardset', array('op' => 'post', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'classcardset' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#47e0d5;" class="fa fa-cog"></i>',
                        ),
                    );
                }
                if ( (strstr($qxarr,'1004602') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    $navemenu[$tag]['items'][] = array(
                        'title' => '班级口号',
                        'url' => $do != 'classkh' ? $this->createWebUrl('classkh', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'classkh' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#47e0d5;" class="fa fa-bullhorn"></i>',
                        ),
                    );
                }
                if ( ( strstr($qxarr,'1004603') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    $navemenu[$tag]['items'][] = array(
                        'title' => '班级荣誉',
                        'url' => $do != 'classhonour' ? $this->createWebUrl('classhonour', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'classhonour' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#47e0d5;" class="fa fa-glass"></i>',
                        ),
                    );
                }
				if ( (strstr($qxarr,'1004604') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    $navemenu[$tag]['items'][] = array(
                        'title' => '电子板报',
                        'url' => $do != 'classepaper' ? $this->createWebUrl('classepaper', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'classepaper' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#47e0d5;" class="fa fa-edit"></i>',
                        ),
                    );
                }
				if ( (strstr($qxarr,'1004605') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    $navemenu[$tag]['items'][] = array(
                        'title' => '班级值日生',
                        'url' => $do != 'classeduty' ? $this->createWebUrl('classeduty', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'classeduty' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#47e0d5;" class="fa fa-paper-plane-o"></i>',
                        ),
                    );
                }
				
				if ( (strstr($qxarr,'1004606') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    $navemenu[$tag]['items'][] = array(
                        'title' => '优秀学生',
                        'url' => $do != 'classepraise' ? $this->createWebUrl('classepraise', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'classepraise' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#47e0d5;" class="fa fa-child"></i>',
                        ),
                    );
                }
				
				if ( (strstr($qxarr,'1004607') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    $navemenu[$tag]['items'][] = array(
                        'title' => '课堂考勤',
                        'url' => $do != 'classchecklog' ? $this->createWebUrl('classchecklog', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'classchecklog' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#47e0d5;" class="fa fa-building-o"></i>',
                        ),
                    );
                }
				if ( (strstr($qxarr,'1004608') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                    $navemenu[$tag]['items'][] = array(
                        'title' => '班牌列表',
                        'url' => $do != 'classcards' ? $this->createWebUrl('classcards', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                        'active' => $action == 'classcards' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#47e0d5;" class="fa fa-credit-card"></i>',
                        ),
                    );
                }
                $tag++;
            }
            if(is_showap()){
    
                if($school['is_ap'] == 1){
    
    
                    if($_W['isfounder'] || $_W['role'] == 'owner' || (strstr($qxarr,'10032')  || strstr($qxarr,'100340') )) {
                        $navemenu[$tag] = array(
                            'title' => '<icon style="color:#b0c312;" class="fa fa123 fa-building-o"></icon>  <span class="big_title">宿舍管理</span>',
                            'this' => 'no7'
                        );
                        if ( strstr($qxarr,'10032')  || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                            $navemenu[$tag]['items'][] = array(
                                'title' => '楼栋设置',
                                'url' => $do != 'apartmentset' ? $this->createWebUrl('apartmentset', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                                'active' => $action == 'apartmentset' ? ' active' : '',
                                'append' => array(
                                    'title' => '<i style="color:#b0c312;" class="fa fa-tasks"></i>',
                                ),
                            );
                        }
                        if ( strstr($qxarr,'100340')  || $_W['isfounder'] || $_W['role'] == 'owner' ) {
                            $navemenu[$tag]['items'][] = array(
                                'title' => '宿舍考勤',
                                'url' => $do != 'apcheck' ? $this->createWebUrl('apcheck', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                                'active' => $action == 'apcheck' ? ' active' : '',
                                'append' => array(
                                    'title' => '<i style="color:#b0c312;" class="fa fa-calendar"></i>',
                                ),
                            );
                        }
                        if ( strstr($qxarr,'1003501')  || $_W['isfounder'] || $_W['role'] == 'owner' ) {
                            $navemenu[$tag]['items'][] = array(
                                'title' => '实时汇总',
                                'url' => $do != 'apcheckall' ? $this->createWebUrl('apcheckall', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                                'active' => $action == 'apcheckall' ? ' active' : '',
                                'append' => array(
                                    'title' => '<i style="color:#b0c312;" class="fa fa-desktop"></i>',
                                ),
                            );
                        }
                        $tag++;
                    }
                }
    
                if($school['is_book'] == 1){
                    if($_W['isfounder'] || $_W['role'] == 'owner' || (strstr($qxarr,'100360') || strstr($qxarr,'100370') )) {
                        $navemenu[$tag] = array(
                            'title' => '<icon style="color:#fd65ff;" class="fa fa123 fa-book"></icon>  <span class="big_title">图书借阅</span>',
                            'this' => 'no8'
                        );
                        if ( ($school['is_recordmac'] != 2 && strstr($qxarr,'100360') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                            $navemenu[$tag]['items'][] = array(
                                'title' => '借阅与归还',
                                'url' => $do != 'booksborrow' ? $this->createWebUrl('booksborrow', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                                'active' => $action == 'booksborrow' ? ' active' : '',
                                'append' => array(
                                    'title' => '<i style="color:#fd65ff;" class="fa fa-language"></i>',
                                ),
                            );
    
                        }
    
                        if (  strstr($qxarr,'100370')  || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                            $navemenu[$tag]['items'][] = array(
                                'title' => '借阅记录',
                                'url' => $do != 'booksrecord' ? $this->createWebUrl('booksrecord', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                                'active' => $action == 'booksrecord' ? ' active' : '',
                                'append' => array(
                                    'title' => '<i style="color:#fd65ff;" class="fa fa-reorder"></i>',
                                ),
                            );
                        }
    
                    }
                    $tag++;
                }

            }





            if(assets()){
                if($schoolset['is_gw'] == 1 || $schoolset['is_csyd'] == 1){
                     if($_W['isfounder'] || $_W['role'] == 'owner' || (strstr($qxarr,'10042') || strstr($qxarr,'10043') )) {
                        $navemenu[$tag] = array(
                            'title' => '<icon style="color:#7963d0;" class="fa fa123 fa-th"></icon>  <span class="big_title">公物管理</span>',
                            'this' => 'no9'
                        );
                        if ( ($schoolset['is_csyd'] == 1 && strstr($qxarr,'1004201') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                            $navemenu[$tag]['items'][] = array(
                                'title' => '场室预定',
                                'url' => $do != 'roomreservelog' ? $this->createWebUrl('roomreservelog', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                                'active' => $action == 'roomreservelog' ? ' active' : '',
                                'append' => array(
                                    'title' => '<i style="color:#7963d0;" class="fa fa-thumb-tack"></i>',
                                ),
                            );
                        }

                        if ( ($schoolset['is_gw'] == 1 && strstr($qxarr,'10043') ) || $_W['isfounder'] || $_W['role'] == 'owner'    ) {
                            $navemenu[$tag]['items'][] = array(
                                'title' => '公物管理',
                                'url' => $do != 'assetsmanager' ? $this->createWebUrl('assetsmanager', array('op' => 'display', 'schoolid' => $schoolid)) : '#',
                                'active' => $action == 'assetsmanager' ? ' active' : '',
                                'append' => array(
                                    'title' => '<i style="color:#7963d0;" class="fa fa-table"></i>',
                                ),
                            );
                        }
                     }
                    $tag++;
                }
            }

        }else{
            $navemenu[0] = array(
                'title' => '<icon style="color:#d9534f;" class="fa fa123 fa-cog"></icon>  <span class="big_title">基本设置</span>',
                'items' => array(
                    0 => array(
                        'title' => '分类设置 ',
                        'url' => $do != 'newtype' ? $this->createWebUrl('newtype', array('op' => 'display')) : $this->createWebUrl('newtype', array('op' => 'display')),
                        'active' => $action == 'newtype' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#d9534f;" class="fa fa-bars"></i>',
                        ),
                    ),
                    1 => array(
                        'title' => '学校管理 ',
                        'url' => $do != 'newschool' ? $this->createWebUrl('newschool', array('op' => 'display')) : $this->createWebUrl('newtype', array('op' => 'display')),
                        'active' => $action == 'newschool' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#d9534f;" class="fa fa-bank"></i>',
                        ),
                    ),
                    2 => array(
                        'title' => '校区设置 ',
                        'url' => $do != 'newarea' ? $this->createWebUrl('newarea', array('op' => 'display')) : $this->createWebUrl('newarea', array('op' => 'display')),
                        'active' => $action == 'newarea' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#d9534f;" class="fa fa-cog"></i>',
                        ),
                    ),
                    3 => array(
                        'title' => '平台功能 ',
                        'url' => $do != 'newmanager' ? $this->createWebUrl('newmanager', array('op' => 'display')) : $this->createWebUrl('newmanager', array('op' => 'display')),
                        'active' => $action == 'newmanager' || $action == 'new_manger_apps' || $action == 'newlanset' || $action == 'newsensitive' || $action == 'newbinding' || $action == 'newloginctrl' || $action == 'newcomload' || $action == 'newguid' || $action == 'newcomad' || $action == 'newbanners' || $action == 'newfenzu' ? ' active' : '',
                        'append' => array(
                            'title' => '<i style="color:#d9534f;" class="fa fa-cubes"></i>',
                        ),
                    ),
                    
                ),
                'icon' => 'fa fa-user-md',
                'this' => 'no1'
            );
        }
        

        return $navemenu;
    }

    public function sendtempmsg($template_id, $url, $data, $topcolor, $tousers = '',$weid= '') {
        if($weid == ''){
            $access_token = $this->getAccessToken2();
            if(empty($access_token)) {
                return;
            }
        }else{
            $access_token = $this->getAccessToken3($weid);
        }
        $postarr = '{"touser":"'.$tousers.'","template_id":"'.$template_id.'","url":"'.$url.'","topcolor":"'.$topcolor.'","data":'.$data.'}';
        $res = ihttp_post('https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token,$postarr);
        return $res;
    }

    public function sendMobileBmshtz($signup_id, $schoolid, $weid, $tid, $s_name) { //报名审核提醒老师  
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'bjqshtz');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['bjqshtz'] == 1 || !empty($smsset['bjqshtz'])){
            $teacher = pdo_fetch("SELECT id,openid,mobile,tname FROM " . tablename($this->table_teachers) . " WHERE :id = id ", array(':id' => $tid));
            $signtype = pdo_fetch("SELECT bj_id,orderid FROM " . tablename($this->table_signup) . " where :id = id", array(':id' => $signup_id));
            $class = pdo_fetch("SELECT cost FROM " . tablename($this->table_classify) . " where sid = :sid ", array(':sid' => $signtype['bj_id']));
            if(!empty($class['cost'])){
                $order = pdo_fetch("SELECT status FROM " . tablename($this->table_order) . " where id = :id ", array(':id' => $signtype['orderid']));
            }
            $leibie = "学生报名申请";
            if(!empty($class['cost'])){
                if($order['status'] == 1){
                    $zhuangtai = "未付费";
                }else{
                    $zhuangtai = "已付费";
                }
            }else{
                $zhuangtai = "未通过";
            }
            $ttime = date('Y-m-d H:i:s', TIMESTAMP);
            $body = "点击本条消息快速审核 ";
            $datas=array(
                'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                'first'=>array('value'=>'老师您好,您收到了一条报名审核提醒','color'=>'#FF9E05'),
                'keyword1'=>array('value'=>$leibie,'color'=>'#1587CD'),
                'keyword2'=>array('value'=>$s_name,'color'=>'#FF9E05'),
                'keyword3'=>array('value'=>$zhuangtai,'color'=>'#1587CD'),
                'keyword4'=>array('value'=>$ttime,'color'=>'#1587CD'),
                'remark'=> array('value'=>$body,'color'=>'#FF9E05')
            );
            $data=json_encode($datas); //发送的消息模板数据
            $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('bm', array('schoolid' => $schoolid, 'id' => $signup_id));
            if(isallow_sendsms($schoolid,'bjqshtz')){
                if($teacher['mobile']){
                    $ttimes = date('m月d日 H:i', TIMESTAMP);
                    $content = array(
                        'name' => $s_name,
                        'time' => $ttimes,
                        'type' => "报名申请审核",
                    );
                    mload()->model('sms');
                    sms_send($teacher['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'bmshtz', $weid, $schoolid);
                }
            }
            if (!empty($smsset['bjqshtz'])) {
                $this->sendtempmsg($smsset['bjqshtz'], $url, $data, '#FF0000', $teacher['openid']);
            }
        }
    }

    public function sendMobileBmshjg($signupid, $schoolid, $weid, $toopenid, $s_name) { //老师修改报名资料后，会提醒学生(无需发短信)
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'bjqshjg');
        if(!empty($smsset['bjqshjg'])){
            $signtype = pdo_fetch("SELECT * FROM " . tablename($this->table_signup) . " where :id = id", array(':id' => $signupid));
            $class = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " where sid = :sid ", array(':sid' => $signtype['bj_id']));
            if(!empty($class['cost'])){
                $order = pdo_fetch("SELECT status FROM " . tablename($this->table_order) . " where id = :id ", array(':id' => $signtype['orderid']));
            }
            $leibie = "报名申请";
            if(!empty($class['cost'])){
                if($order['status'] == 1){
                    $zhuangtai = "未付费";
                    $body = "点击本条消息快速支付报名费";
                }else{
                    $zhuangtai = "已付费";
                    $body = "点击本条消息快速查看 ";
                }
            }else{
                $zhuangtai = "审核中";
                $body = "点击本条消息快速查看 ";
            }
            $ttime = date('Y-m-d H:i:s', TIMESTAMP);
            $datas=array(
                'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                'first'=>array('value'=>'您好,【'.$s_name.'】的报名资料已经开始审核','color'=>'#FF9E05'),
                'keyword1'=>array('value'=>$leibie,'color'=>'#1587CD'),
                'keyword2'=>array('value'=>$zhuangtai,'color'=>'#FF9E05'),
                'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                'remark'=> array('value'=>$body,'color'=>'#FF9E05')
            );
            $data=json_encode($datas); //发送的消息模板数据
            $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('signupjc', array('schoolid' => $schoolid, 'id' =>$signupid));
            $this->sendtempmsg($smsset['bjqshjg'], $url, $data, '#FF0000', $toopenid);
        }
    }

    public function sendMobileBmshjgtz($signupid, $schoolid, $weid, $toopenid, $s_name, $rand) {  //报名结果通知学生
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'bjqshjg');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['bjqshjg'] == 1 || !empty($smsset['bjqshjg'])){
            $signtype = pdo_fetch("SELECT * FROM " . tablename($this->table_signup) . " where id = :id", array(':id' => $signupid));
            $leibie = "报名申请";
            if ($signtype['status'] == 2){
                $zhuangtai = "已通过";
                $body = "您可以通过以下信息绑定学生:\n学生姓名:{$s_name}\n学号:{$signtype['numberid']}\n手机号码:{$signtype['mobile']}\n绑定码:{$rand}\n千万不要将本信息告诉给陌生人 ";
            }else if($signtype['status'] == 3){
                $zhuangtai = "未通过";
                $body = "点击本条消息查看详情 ";
            }

            $ttime = date('Y-m-d H:i:s', TIMESTAMP);

            $datas=array(
                'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                'first'=>array('value'=>'您好,【'.$s_name.'】的报名资料审核完毕','color'=>'#FF9E05'),
                'keyword1'=>array('value'=>$leibie,'color'=>'#1587CD'),
                'keyword2'=>array('value'=>$s_name,'color'=>'#FF9E05'),
                'keyword3'=>array('value'=>$zhuangtai,'color'=>'#1587CD'),
                'keyword4'=>array('value'=>$ttime,'color'=>'#1587CD'),
                'remark'=> array('value'=>$body,'color'=>'#FF9E05')
            );
            $data=json_encode($datas); //发送的消息模板数据
            $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('signupjc', array('schoolid' => $schoolid, 'id' =>$signupid));
            if (!empty($smsset['bjqshjg'])) {
                $this->sendtempmsg($smsset['bjqshjg'], $url, $data, '#FF0000', $toopenid);
            }
            if(isallow_sendsms($schoolid,'bjqshjg')){
                if($signtype['mobile']){
                    $content = array(
                        'name' => $s_name,
                        'type' => "报名申请审核",
                        'result' => $zhuangtai,
                    );
                    mload()->model('sms');
                    sms_send($signtype['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'bmshjgtz', $weid, $schoolid);
                }
            }
        }
    }

    public function sendMobileSignshtz($logid) { //微信签到审核提醒老师 统一平台已处理 check
        global $_GPC,$_W;
        $log = pdo_fetch("SELECT * FROM " . tablename($this->table_checklog) . " where :id = id", array(':id' => $logid));
        $schoolid = $log['schoolid'];
        $weid = $log['weid'];
        $smsset = get_weidset($weid,'bjqshtz');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['bjqshtz'] == 1 || !empty($smsset['bjqshtz'])){
            $class = pdo_fetch("SELECT tid FROM " . tablename($this->table_classify) . " where sid = :sid ", array(':sid' => $log['bj_id']));
            $teacher = pdo_fetch("SELECT openid,tname,mobile FROM " . tablename($this->table_teachers) . " where id = :id And schoolid = :schoolid ", array(':schoolid' => $log['schoolid'],':id' => $class['tid']));
            $student = pdo_fetch("SELECT s_name FROM " . tablename($this->table_students) . " where id = :id ", array(':id' => $log['sid']));
            $school = pdo_fetch("SELECT is_signneedcomfim FROM " . tablename($this->table_index) . " where id = :id ", array(':id' => $log['schoolid']));
            if($log['leixing'] ==1){
                $leixing = "到校";
            }else{
                $leixing = "离校";
            }
            $title = "学生{$leixing}签到审核提醒";
            if($log['isconfirm'] == 1){
                $zhuangtai = "已通过";
            }else{
                $zhuangtai = "未审核";
            }
            $ttime = date('Y-m-d H:i:s', $log['createtime']);
            $time = date('Y-m-d', $log['createtime']);
            $body = "点击本条消息快速审核";
            $datas=array(
                'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                'first'=>array('value'=>''.$teacher['tname'].'老师您好,您收到了一条签到审核提醒','color'=>'#FF9E05'),
                'keyword1'=>array('value'=>$title,'color'=>'#1587CD'), 
                'keyword2'=>array('value'=>$student['s_name'],'color'=>'#FF9E05'),
                'keyword3'=>array('value'=>$zhuangtai,'color'=>'#1587CD'),
                'keyword4'=>array('value'=>$ttime,'color'=>'#1587CD'),
                'remark'=> array('value'=>$body,'color'=>'#FF9E05')
            );
            $data=json_encode($datas);
            $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('signlist', array('schoolid' => $log['schoolid'],'time' => $time,'bj_id' => $log['bj_id']));
            if (!empty($smsset['bjqshtz'])) {
                $this->sendtempmsg($smsset['bjqshtz'], $url, $data, '#FF0000', $teacher['openid']);
            }
            /**开始 和校园 消息发送判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
            }
            if($typtsmsset['msgsendtype'] == 1){
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
                $sendtyptid = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE  id = '{$typtsmsset['typt_admin_tid']}'  ");
                $receietea = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE id = '{$class['tid']}' ");
                $receivers = []; 
                $receivers[] = array( 'receiverid' => "{$receietea['typt_user_id']}" ); 
                $smscontent =  "老师您好，您收到".$title."，请至公众号内查看详情";
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$sendtyptid['typt_user_id']);
            }else{
                if(isallow_sendsms($schoolid,'bjqshtz')){
                    if($teacher['mobile']){
                        $ttimes = date('m月d日 H:i', TIMESTAMP);
                        $content = array(
                            'name' => $student['s_name'],
                            'time' => $ttimes,
                            'type' => "微信签到审核",
                        );
                        mload()->model('sms');
                        sms_send($teacher['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'signshtz', $weid, $schoolid);
                    }
                }
            }
            /**结束 和校园 消息发送判断 */
        }
    }

    public function sendMobileFzqdshjg($logid) { //微信辅助签到确认结果通知给学生 统一平台已处理 check
        global $_GPC,$_W;
        $log = pdo_fetch("SELECT sid,leixing,schoolid,weid FROM " . tablename($this->table_checklog) . " where :id = id", array(':id' => $logid));
        $schoolid = $log['schoolid'];
        $weid = $log['weid'];
        $sms_set = get_school_sms_set($schoolid);
        $smsset = get_weidset($weid,'bjqshjg');
        if($sms_set['bjqshjg'] == 1 || !empty($smsset['bjqshjg'])){
            $student = pdo_fetch("SELECT s_name FROM " . tablename($this->table_students) . " where id = :id ", array(':id' => $log['sid']));
            if($log['leixing'] ==1){
                $leixing = "到校";
            }else{
                $leixing = "离校";
            }
            $leibie = "签到确认成功";
            $zhuangtai = "审核通过";
            $ttime = date('Y-m-d H:i:s', TIMESTAMP);
            $body = "点击本条消息快速查看 ";
            $openidall = pdo_fetchall("select sid,id,openid,mobile from ".tablename($this->table_user)." where sid = '{$log['sid']}'");
            $body  = "点击本条消息查看详情 ";

            /**开始 和校园 消息发送判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
            }
            if($typtsmsset['msgsendtype'] == 1){
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
                $typtSend = SendHXYCheckSms($typt_appid,$typtsmsset['ec_code'],$logid);
            }
            /**结束 和校园 消息发送判断 */

            $num = count($openidall);
            if ($num > 1){
                foreach ($openidall as $key => $values) {
                    $openid = $values['openid'];
                    $datas=array(
                        'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                        'first'=>array('value'=>'您好'.$student['s_name'].',您的'.$leixing.'签到已审核通过','color'=>'#FF9E05'),
                        'keyword1'=>array('value'=>$leibie,'color'=>'#1587CD'),
                        'keyword2'=>array('value'=>$zhuangtai,'color'=>'#FF9E05'),
                        'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                        'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                    );
                    $data = json_encode($datas); //发送的消息模板数据
                    $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('calendar', array('schoolid' => $log['schoolid'],'userid'=>$values['id']));
                    if($smsset['bjqshjg']){
                        $this->sendtempmsg($smsset['bjqshjg'], $url, $data, '#FF0000', $openid);
                    }
                    if($typtsmsset['msgsendtype'] != 1){
                        if(isallow_sendsms($schoolid,'bjqshjg')){
                            if($values['mobile']){
                                $content = array(
                                    'name' => $student['s_name'],
                                    'type' => "微信签到",
                                    'result' => "已通过",
                                );
                                mload()->model('sms');
                                sms_send($values['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'fzqdshjg', $weid, $schoolid);
                            }
                        }
                    }
                }
            }else{
                $openid = $openidall['0']['openid'];
                $datas=array(
                    'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                    'first'=>array('value'=>'您好'.$student['s_name'].',您的'.$leixing.'签到已审核通过','color'=>'#FF9E05'),
                    'keyword1'=>array('value'=>$leibie,'color'=>'#1587CD'),
                    'keyword2'=>array('value'=>$zhuangtai,'color'=>'#FF9E05'),
                    'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                    'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                );
                $data = json_encode($datas); //发送的消息模板数据
                $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('calendar', array('schoolid' => $log['schoolid'],'userid' => $openidall['0']['id']));
                if($smsset['bjqshjg']){
                    $this->sendtempmsg($smsset['bjqshjg'], $url, $data, '#FF0000', $openid);
                }
                if($typtsmsset['msgsendtype'] != 1){
                    if(isallow_sendsms($schoolid,'bjqshjg')){
                        if($openidall['0']['mobile']){
                            $content = array(
                                'name' => $student['s_name'],
                                'type' => "微信签到",
                                'result' => "已通过",
                            );
                            mload()->model('sms');
                            sms_send($openidall['0']['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'fzqdshjg', $weid, $schoolid);
                        }
                    }
                }
            }
        }
    }

    public function sendMobileBjqshtz($schoolid, $weid, $shername, $bj_id,$tid) { //班级圈审核提醒老师 统一平台已处理 check
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'bjqshtz');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['bjqshtz'] == 1 || !empty($smsset['bjqshtz'])){
            $bzj = pdo_fetch("SELECT tid FROM " . tablename($this->table_classify) . " where weid = :weid And schoolid = :schoolid And sid = :sid", array(':weid' => $weid, ':schoolid' => $schoolid, ':sid' => $bj_id));
            if($tid){
                $teachers = pdo_fetch("SELECT tname,openid,mobile,id FROM " . tablename($this->table_teachers) . " where id = :id ", array(':id' => $tid));
            }else{
                $teachers = pdo_fetch("SELECT tname,openid,mobile,id FROM " . tablename($this->table_teachers) . " where id = :id ", array(':id' => $bzj['tid']));
            }
            $leibie = "班级圈内容审核";
            $zhuangtai = "未审核";
            $ttime = date('Y-m-d H:i:s', TIMESTAMP);
            $body = "点击本条消息快速审核 ";
            $datas=array(
                'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                'first'=>array('value'=>'老师您好,您收到了一条班级圈内容审核提醒','color'=>'#FF9E05'),
                'keyword1'=>array('value'=>$leibie,'color'=>'#1587CD'),
                'keyword2'=>array('value'=>$shername,'color'=>'#FF9E05'),
                'keyword3'=>array('value'=>$zhuangtai,'color'=>'#1587CD'),
                'keyword4'=>array('value'=>$ttime,'color'=>'#1587CD'),
                'remark'=> array('value'=>$body,'color'=>'#FF9E05')
            );
            $data=json_encode($datas); //发送的消息模板数据

            $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('bjq', array('schoolid' => $schoolid, 'bj_id' => $bj_id));
            /**开始 和校园 消息发送判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
            }
            if($typtsmsset['msgsendtype'] == 1){
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
                $sendtyptid = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE  id = '{$typtsmsset['typt_admin_tid']}'  ");
                $receietea = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE id = '{$teachers['id']}' ");
                $receivers = []; 
                $receivers[] = array( 'receiverid' => "{$receietea['typt_user_id']}" ); 
                $smscontent = $teachers['tname'].$datas['first']['value']."，请至公众号内查看详情";
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$sendtyptid['typt_user_id']);
            }else{
                if(isallow_sendsms($schoolid,'bjqshtz')){
                    if($teachers['mobile']){
                        $ttimes = date('m月d日 H:i', TIMESTAMP);
                        $content = array(
                            'name' => $shername,
                            'time' => $ttimes,
                            'type' => "班级圈内容审核",
                        );
                        mload()->model('sms');
                        sms_send($teachers['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'bjqshtz', $weid, $schoolid);
                    }
                }
            }
            /**结束 和校园 消息发送判断 */
            if (!empty($smsset['bjqshtz'])) {
                $this->sendtempmsg($smsset['bjqshtz'], $url, $data, '#FF0000', $teachers['openid']);
            }
        }
    }

    public function sendMobileBjqshjg($schoolid, $weid, $shername, $toopenid, $userid) {  //班级圈内容审核结果通知学生 统一平台已处理 check
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'bjqshjg');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['bjqshjg'] == 1 || !empty($smsset['bjqshjg'])) {
            $leibie = "班级圈内容审核";
            $zhuangtai = "审核通过";
            $ttime = date('Y-m-d H:i:s', TIMESTAMP);
            $body = "点击本条消息快速查看 ";
            $datas=array(
                'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                'first'=>array('value'=>'您好'.$shername.',您收到一条班级圈审核结果通知','color'=>'#FF9E05'),
                'keyword1'=>array('value'=>$leibie,'color'=>'#1587CD'),
                'keyword2'=>array('value'=>$zhuangtai,'color'=>'#FF9E05'),
                'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                'remark'=> array('value'=>$body,'color'=>'#FF9E05')
            );
            $data=json_encode($datas); //发送的消息模板数据
            $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('sbjq', array('schoolid' => $schoolid));

            /**开始 和校园 消息发送判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
            }
            if($typtsmsset['msgsendtype'] == 1){
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
                $sendtyptid = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE  id = '{$typtsmsset['typt_admin_tid']}'  ");
                $user = pdo_fetch("select mobile,sid from ".tablename($this->table_user)." where openid = '{$toopenid}' and schoolid = '{$schoolid}' and weid = '{$weid}' ");
                $stuinfo = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('students')." WHERE  id='{$user['sid']}'  ");
                $receivers = []; 
                $receivers[] = array( 'receiverid' => "{$stuinfo['typt_user_id']}" ); 
                $smscontent = $datas['first']['value']."，请至公众号内查看详情";
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$sendtyptid['typt_user_id']);
            }else{
                if(isallow_sendsms($schoolid,'bjqshjg')){
                    $user = pdo_fetch("select mobile from ".tablename($this->table_user)." where id = '{$userid}'");
                    if($user['mobile']){
                        $content = array(
                            'name' => $shername,
                            'type' => "班级圈内容审核",
                            'result' => "已通过",
                        );
                        mload()->model('sms');
                        sms_send($user['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'bjqshjg', $weid, $schoolid);
                    }
                }
            }
            /**结束 和校园 消息发送判断 */

            if (!empty($smsset['bjqshjg']) && !empty($toopenid)) {
                $this->sendtempmsg($smsset['bjqshjg'], $url, $data, '#FF0000', $toopenid);
            }
        }
    }

    public function doWebZuoyeMsg(){
        global $_GPC,$_W;
        $notice_id = $_GPC['notice_id'];
        $schoolid = $_GPC['schoolid'];
        $weid = $_GPC['weid'];
        $tname = $_GPC['tname'];
        $bj_id = $_GPC['bj_id'];
        $pindex = max(1, intval($_GPC['page']));
        $psize = 2;
        $total = pdo_fetchcolumn("SELECT COUNT(1) FROM ".tablename($this->table_students)." where weid = :weid And schoolid = :schoolid And bj_id = :bj_id",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':bj_id'=>$bj_id));

        $tp = ceil($total/$psize);
        for ($i=1; $i < $tp; $i++) {
            $this->sendMobileZuoye($notice_id, $schoolid, $weid, $tname, $bj_id, $pindex, $psize);
            if ($pindex == $i) {
                $mq = round(($pindex / $tp) * 100);
                $msg = '正在发送，目前：<strong style="color:#5cb85c">' . $mq . ' %</strong>,请勿执行任何操作';

                $page = $pindex + 1;
                $to = $this -> createWebUrl('ZuoyeMsg', array('notice_id' => $notice_id, 'schoolid' => $schoolid, 'weid' => $weid, 'tname' => $tname, 'bj_id' => $bj_id, 'page' => $page));
                $this->imessage($msg, $to);
            }
        }
        $this->imessage('发送成功！', $this -> createWebUrl('notice', array('op' => 'display5','schoolid' => $schoolid,'notice_id' => $notice_id)));
    }


    public function sendMobileZytzToUserArr($schoolid,$schooltype, $weid, $tname, $arr, $noticearr, $usertaype, $pindex='1', $psize='20'){ //向指定用户发送作业通知 统一平台已处理 check
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'zuoye');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['zuoye'] == 1 || !empty($smsset['zuoye'])) {
            $school = pdo_fetch("SELECT title FROM ".tablename($this->table_index)." WHERE :weid = weid And :id = id", array(':weid' => $weid, ':id' => $schoolid));
            $newArray = array_slice($arr,($pindex-1)*$psize,$psize);
            /** 和校园判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
            }
            
            $receivers = []; 
            $HXYTITLE = '';
            $title = '';
            /**结束 */
            foreach($newArray as $key=> $val){ //循环学生
                if($usertaype == 'tostu'){
                    $student = pdo_fetch("select s_name,bj_id from ".tablename($this->table_students)." where id = '{$val}' ");
                    foreach($noticearr as $item){
                        $nownotice = pdo_fetch("SELECT id,title,outurl,createtime,bj_id,kc_id,km_id FROM ".tablename($this->table_notice)." WHERE :id = id ", array(':id' => $item));
                        if($schooltype){
                            $stuallkc = pdo_fetchall("SELECT distinct kcid FROM ".tablename($this->table_order)." where sid = '{$val}' And type = 1 And status = 2 And sid != 0 ");
                            $kclallsarr = array();
                            foreach($stuallkc as $key){
                                $kclallsarr[] = $key['kcid'];
                            }
                            if(in_array($nownotice['kc_id'],$kclallsarr)){
                                $checknow = pdo_fetch("SELECT id FROM ".tablename($this->table_record)." where weid = :weid And schoolid = :schoolid And noticeid = :noticeid And sid = :sid ",array(':weid'=>$weid,':schoolid'=>$schoolid,':noticeid'=>$nownotice['id'],':sid'=>$val));
                                if($checknow){
                                    continue;
                                }else{
                                    $notice = $nownotice;
                                    $notice_id = $notice['id'];
                                }
                            }else{
                                continue;
                            }
                        }else{
                            if($student['bj_id'] == $nownotice['bj_id']){
                                $notice = $nownotice;
                                $notice_id = $notice['id'];
                            }
                        }

                    }
                    if($schooltype){
                        $category = pdo_fetch("SELECT name as sname FROM " . tablename($this->table_tcourse) . " WHERE :id = id ", array(':id' => $notice['kc_id']));
                        $title ="{$tname}发来一条作业消息!";
                    }else{
                        $category = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " WHERE :sid = sid ", array(':sid' => $notice['bj_id']));
                        $km = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " WHERE :sid = sid ", array(':sid' => $notice['km_id']));
                        $title ="【{$km['sname']}】-{$tname}发来一条作业消息!";
                        $HXYTITLE = "【{$km['sname']}】-{$tname}发来一条作业消息，标题为【{$notice['title']}】";
                    }
                    $openidall = pdo_fetchall("select id,sid,tid,pard,mobile,openid from ".tablename($this->table_user)." where sid = '{$val}' ");
                    $stuinfo = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('students')." WHERE  id='{$val}'  ");
                    $receivers[] = array( 'receiverid' => "{$stuinfo['typt_user_id']}" );  //拼装receivers数组
                    $bjname  = "{$category['sname']}";
                    $body  = "点击本条消息查看详情 ";
                    foreach ($openidall as $values) { //循环学生下的每一个家长
                        $openid = $values['openid'];
                        $record = pdo_fetch("SELECT id FROM ".tablename($this->table_record)." where weid = :weid And schoolid = :schoolid And noticeid = :noticeid And openid = :openid And sid = :sid And userid = :userid And type = :type",array(
                            ':weid'=>$weid,
                            ':schoolid'=>$schoolid,
                            ':noticeid'=>$notice_id,
                            ':openid'=>$openid,
                            ':sid'=>$values['sid'],
                            ':userid'=>$values['id'],
                            ':type'=>2
                        ));
                        $datas=array(
                            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                            'first'=>array('value'=>$title,'color'=>'#1587CD'),
                            'keyword1'=>array('value'=>$bjname,'color'=>'#1587CD'),
                            'keyword2'=>array('value'=>$notice['title'],'color'=>'#2D6A90'),
                            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                        );
                        $data = json_encode($datas); //发送的消息模板数据

                        if(empty($record['id'])){
                            if($values['sid']){
                                $date = array(
                                    'weid' =>  $weid,
                                    'schoolid' => $schoolid,
                                    'noticeid' => $notice_id,
                                    'sid' => $values['sid'],
                                    'userid' => $values['id'],
                                    'openid' => $openid,
                                    'type' => 2,
                                    'createtime' => $notice['createtime']
                                );
                                pdo_insert($this->table_record, $date);
                                $record_id = pdo_insertid();
                                if(!empty($notice['outurl'])){
                                    $url = $notice['outurl'];
                                }else{
                                    $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('szuoye', array('schoolid' => $schoolid,'record_id' => $record_id,'id' => $notice_id,'userid' => $values['id']));
                                }
                                if($typtsmsset['msgsendtype'] != 1){
                                    if(isallow_sendsms($schoolid,'zuoye')){
                                        if($values['mobile']){
                                            $ttimes = date('m月d日 H:i', TIMESTAMP);
                                            $content = array(
                                                'name' => "(".$km['sname'].")-".$tname."老师",
                                                'time' => $ttimes,
                                            );
                                            if($schooltype){
                                                $content['name'] = $tname."老师";
                                            }
                                            mload()->model('sms');
                                            sms_send($values['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'zuoye', $weid, $schoolid);
                                        }
                                    }
                                }

                                if(!empty($smsset['zuoye'])){
                                    $this->sendtempmsg($smsset['zuoye'], $url, $data, '#FF0000', $openid);
                                }
                            }
                        }
                    }
                }
            }
            /**开始 和校园 消息发送判断 */
            // if(keep_hxy()){
            //     mload()->model('hxy');
            //     $typtsmsset = CheckTyptSMSSet($schoolid);
            // }
            if($typtsmsset['msgsendtype'] == 1){
                // $filename = MODULE_ROOT . '/model/typt.config.php';
                // require $filename;
                $sendtyptid = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE  tname = '{$tname}' and schoolid = '{$schoolid}' and weid = '{$weid}'  ");
               
                $smscontent = $HXYTITLE."，请至公众号内查看详情";
                $ttime = date("Y-m-d H:i:s",time());
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$sendtyptid['typt_user_id']);
            }
            /**结束 和校园 消息发送判断 */
        }
    }
    
    public function sendMobileZuoye($notice_id, $schoolid, $weid, $tname, $bj_id, $pindex='1', $psize='1000') {  //作业群发通知 统一平台已处理 check
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'zuoye');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['zuoye'] == 1 || !empty($smsset['zuoye'])) {
            $notice = pdo_fetch("SELECT * FROM ".tablename($this->table_notice)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $notice_id, ':schoolid' => $schoolid));
            $km = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " WHERE :sid = sid AND :schoolid =schoolid", array(':sid' => $notice['km_id'], ':schoolid' => $schoolid));
            $bj = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " WHERE :sid = sid AND :schoolid =schoolid", array(':sid' => $notice['bj_id'], ':schoolid' => $schoolid));
            //$userinfo = pdo_fetchall("SELECT id FROM ".tablename($this->table_students)." where weid = :weid And schoolid = :schoolid And bj_id = :bj_id ORDER BY id DESC",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':bj_id'=>$notice['bj_id']));
            $userinfo = pdo_fetchall("SELECT id,typt_user_id FROM ".tablename($this->table_students)." where weid = :weid And schoolid = :schoolid And bj_id = :bj_id ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize,array(':weid'=>$weid, ':schoolid'=>$schoolid, ':bj_id'=>$bj_id));
            /** 和校园判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
            }
           
            $receivers = []; 
            $HXYTITLE = "【{$km['sname']}】-{$tname}发来一条作业消息，标题为【{$notice['title']}】"; 
            $title = '';
            /**结束 */

            foreach ($userinfo as $key => $value) {
                $receivers[] = array( 'receiverid' => "{$value['typt_user_id']}" );  //拼装receivers数组
                $openidall = pdo_fetchall("select * from ".tablename($this->table_user)." where sid = '{$value['id']}'");
                $title ="【{$km['sname']}】-{$tname}发来一条作业消息";
                $bjname  = "{$bj['sname']}";
                $body  = "点击本条消息查看详情 ";

                $num = count($openidall);
                if ($num > 1){
                    foreach ($openidall as $key => $values) {
                        $openid = $values['openid'];
                        $record = pdo_fetch("SELECT id FROM ".tablename($this->table_record)." where weid = :weid And schoolid = :schoolid And noticeid = :noticeid And openid = :openid And sid = :sid And userid = :userid And type = :type",array(
                            ':weid'=>$weid,
                            ':schoolid'=>$schoolid,
                            ':noticeid'=>$notice_id,
                            ':openid'=>$openid,
                            ':sid'=>$values['sid'],
                            ':userid'=>$values['id'],
                            ':type' => 2
                        ));
                        $datas=array(
                            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                            'first'=>array('value'=>$title,'color'=>'#1587CD'),
                            'keyword1'=>array('value'=>$bjname,'color'=>'#1587CD'),
                            'keyword2'=>array('value'=>$notice['title'],'color'=>'#2D6A90'),
                            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                        );
                        $data = json_encode($datas); //发送的消息模板数据
                        if(empty($record['id'])){
                            if($values['sid']){
                                $date = array(
                                    'weid' =>  $notice['weid'],
                                    'schoolid' => $schoolid,
                                    'noticeid' => $notice_id,
                                    'sid' => $values['sid'],
                                    'userid' => $values['id'],
                                    'openid' => $openid,
                                    'type' => 2,
                                    'createtime' => $notice['createtime']
                                );
                                pdo_insert($this->table_record, $date);
                                $record_id = pdo_insertid();
                                if(!empty($notice['outurl'])){
                                    $url = $notice['outurl'];
                                }else{
                                    $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('szuoye', array('schoolid' => $schoolid,'record_id' => $record_id,'id' => $notice_id,'userid' => $values['id']));
                                }
                                if($typtsmsset['msgsendtype'] != 1){ //如果未开启和校园群发
                                    if(isallow_sendsms($schoolid,'zuoye')){
                                        if($values['mobile']){
                                            $ttimes = date('m月d日 H:i', TIMESTAMP);
                                            $content = array(
                                                'name' => "(".$km['sname'].")-".$tname."老师",
                                                'time' => $ttimes,
                                            );
                                            mload()->model('sms');
                                            sms_send($values['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'zuoye', $weid, $schoolid);
                                        }
                                    }
                                }
                                if(!empty($smsset['zuoye'])){
                                    $this->sendtempmsg($smsset['zuoye'], $url, $data, '#FF0000', $openid);
                                }
                            }
                        }
                    }
                }else{
                    $openid = $openidall['0']['openid'];
                    $record = pdo_fetch("SELECT id FROM ".tablename($this->table_record)." where weid = :weid And schoolid = :schoolid And noticeid = :noticeid And openid = :openid And sid = :sid And userid = :userid And type = :type",array(
                        ':weid'=>$notice['weid'],
                        ':schoolid'=>$schoolid,
                        ':noticeid'=>$notice_id,
                        ':openid'=>$openid,
                        ':sid'=>$openidall['0']['sid'],
                        ':userid'=>$openidall['0']['id'],
                        ':type' => 2
                    ));
                    $datas=array(
                        'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                        'first'=>array('value'=>$title,'color'=>'#1587CD'),
                        'keyword1'=>array('value'=>$bjname,'color'=>'#1587CD'),
                        'keyword2'=>array('value'=>$notice['title'],'color'=>'#2D6A90'),
                        'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                    );
                    $data = json_encode($datas); //发送的消息模板数据
                    if(empty($record['id'])){
                        if($openidall['0']['sid']){
                            $date = array(
                                'weid' =>  $notice['weid'],
                                'schoolid' => $schoolid,
                                'noticeid' => $notice_id,
                                'sid' => $openidall['0']['sid'],
                                'userid' => $openidall['0']['id'],
                                'openid' => $openid,
                                'type' => 2,
                                'createtime' => $notice['createtime']
                            );
                            pdo_insert($this->table_record, $date);
                            $record_id = pdo_insertid();
                            if(!empty($notice['outurl'])){
                                $url = $notice['outurl'];
                            }else{
                                $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('szuoye', array('schoolid' => $schoolid,'record_id' => $record_id,'id' => $notice_id,'userid' => $openidall['0']['id']));
                            }
                            if($typtsmsset['msgsendtype'] != 1){
                                if(isallow_sendsms($schoolid,'zuoye')){
                                    if($openidall['0']['mobile']){
                                        $ttimes = date('m月d日 H:i', TIMESTAMP);
                                        $content = array(
                                            'name' => "(".$km['sname'].")-".$tname."老师",
                                            'time' => $ttimes,
                                        );
                                        mload()->model('sms');
                                        sms_send($openidall['0']['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'zuoye', $weid, $schoolid);
                                    }
                                }
                            }
                            if(!empty($smsset['zuoye'])){
                                $this->sendtempmsg($smsset['zuoye'], $url, $data, '#FF0000', $openid);
                            }
                        }
                    }
                }
            }
            /**开始 和校园 消息发送判断 */
            if($typtsmsset['msgsendtype'] == 1){
                $sendtyptid = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE  tname = '{$tname}' and schoolid = '{$schoolid}' and weid = '{$weid}' ");
                $smscontent = $HXYTITLE."，请至公众号内查看详情";
                $ttime = date("Y-m-d H:i:s",time());
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$sendtyptid['typt_user_id']);
            }
            /**结束 和校园 消息发送判断 */
        }
    }

    //班级通知
    public function doWebBjtzMsg(){
        global $_GPC,$_W;
        $notice_id = $_GPC['notice_id'];
        $schoolid = $_GPC['schoolid'];
        $weid = $_GPC['weid'];
        $tname = $_GPC['tname'];
        $bj_id = $_GPC['bj_id'];
        $pindex = max(1, intval($_GPC['page']));
        $psize = 2;
        $total = 0 ;
        //bj_id是数组表示是集体活动
        if (is_array($bj_id)) {
            $tp = count($bj_id);
            $this->sendMobileHdtz($notice_id, $schoolid, $weid, $tname, $bj_id[0],1,20);
            for ($i=0; $i < $tp; $i++){
                if ($pindex == $i) {
                    $mq = round(($pindex / $tp) * 100);
                    $msg = '正在发送，目前：<strong style="color:#5cb85c">' . $mq . ' %</strong>,请勿执行任何操作';

                    $page = $pindex + 1;
                    array_splice($bj_id,0,1);
                    $to = $this -> createWebUrl('BjtzMsg', array('notice_id' => $notice_id, 'schoolid' => $schoolid, 'weid' => $weid, 'tname' => $tname, 'bj_id' => $bj_id, 'page' => $page));
                    $this->imessage($msg, $to);
                }
            }
            $this->imessage('发送成功！', $this -> createWebUrl('groupactivity', array('op' => 'display','schoolid' => $schoolid)));
        }else{
            $total = pdo_fetchcolumn("SELECT COUNT(1) FROM ".tablename($this->table_students)." where weid = :weid And schoolid = :schoolid And bj_id = :bj_id",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':bj_id'=>$bj_id));
            $tp = ceil($total/$psize);
            for ($i=1; $i < $tp; $i++){
                $this->sendMobileBjtz($notice_id, $schoolid, $weid, $tname, $bj_id, $pindex, $psize);
                if ($pindex == $i) {
                    $mq = round(($pindex / $tp) * 100);
                    $msg = '正在发送，目前：<strong style="color:#5cb85c">' . $mq . ' %</strong>,请勿执行任何操作';

                    $page = $pindex + 1;
                    $to = $this -> createWebUrl('BjtzMsg', array('notice_id' => $notice_id, 'schoolid' => $schoolid, 'weid' => $weid, 'tname' => $tname, 'bj_id' => $bj_id, 'page' => $page));
                    $this->imessage($msg, $to);
                }
            }
            $this->imessage('发送成功！', $this -> createWebUrl('notice', array('op' => 'display5','schoolid' => $schoolid,'notice_id' => $notice_id)));
        }

    }

    public function sendMobileBjtzToUserArr($schoolid,$schooltype, $weid, $tname, $arr, $noticearr, $usertaype, $pindex='1', $psize='20'){ //向指定用户发送班级通知 统一平台已处理 check
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'bjtz');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['bjtz'] == 1 || !empty($smsset['bjtz'])) {
            $school = pdo_fetch("SELECT title FROM ".tablename($this->table_index)." WHERE :weid = weid And :id = id", array(':weid' => $weid, ':id' => $schoolid));
            $newArray = array_slice($arr,($pindex-1)*$psize,$psize);

            /** 和校园判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
            }
            
            $receivers = []; 
            /**结束 */
            $HXYTITLE = '';
            foreach($newArray as $key=> $val){
                if($usertaype == 'tostu'){
                    $student = pdo_fetch("select s_name,bj_id,typt_user_id from ".tablename($this->table_students)." where id = '{$val}' ");
                    $receivers[] = array( 'receiverid' => "{$student['typt_user_id']}" );  //拼装receivers数组
                    
                    foreach($noticearr as $item){
                        $nownotice = pdo_fetch("SELECT id,title,outurl,createtime,bj_id,kc_id FROM ".tablename($this->table_notice)." WHERE :id = id ", array(':id' => $item));
                        if($schooltype){
                            $stuallkc = pdo_fetchall("SELECT distinct kcid FROM ".tablename($this->table_order)." where sid = '{$val}' And type = 1 And status = 2 And sid != 0 ");
                            $kclallsarr = array();
                            foreach($stuallkc as $key){
                                $kclallsarr[] = $key['kcid'];
                            }
                            if(in_array($nownotice['kc_id'],$kclallsarr)){
                                $checknow = pdo_fetch("SELECT id FROM ".tablename($this->table_record)." where weid = :weid And schoolid = :schoolid And noticeid = :noticeid And sid = :sid ",array(':weid'=>$weid,':schoolid'=>$schoolid,':noticeid'=>$nownotice['id'],':sid'=>$val));
                                if($checknow){
                                    continue;
                                }else{
                                    $notice = $nownotice;
                                    $notice_id = $notice['id'];
                                }
                            }else{
                                continue;
                            }
                        }else{
                            if($student['bj_id'] == $nownotice['bj_id']){
                                $notice = $nownotice;
                                $notice_id = $notice['id'];
                            }
                        }

                    }
                    if($schooltype){
                        $category = pdo_fetch("SELECT name as sname FROM " . tablename($this->table_tcourse) . " WHERE :id = id ", array(':id' => $notice['kc_id']));
                    }else{
                        $category = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " WHERE :sid = sid ", array(':sid' => $notice['bj_id']));
                    }
                    $openidall = pdo_fetchall("select id,sid,tid,pard,mobile,openid from ".tablename($this->table_user)." where sid = '{$val}' ");
                    $name  = "{$tname}老师";
                    $bjname  = "{$category['sname']}";
                    $ttime = date('Y-m-d H:i:s', $notice['createtime']);
                    $body  = "点击本条消息查看详情 ";
                    foreach ($openidall as $values) {
                        $openid = $values['openid'];
                        $record = pdo_fetch("SELECT id FROM ".tablename($this->table_record)." where weid = :weid And schoolid = :schoolid And noticeid = :noticeid And openid = :openid And sid = :sid And userid = :userid And type = :type",array(
                            ':weid'=>$weid,
                            ':schoolid'=>$schoolid,
                            ':noticeid'=>$notice_id,
                            ':openid'=>$openid,
                            ':sid'=>$values['sid'],
                            ':userid'=>$values['id'],
                            ':type'=>1
                        ));
                        if($values['pard'] == 2){
                            $guanxi = "妈妈";
                        }else if($values['pard'] == 3){
                            $guanxi = "爸爸";
                        }else if($values['pard'] == 4){
                            $guanxi = "";
                        }else if($values['pard'] == 5){
                            $guanxi = "家长";
                        }
                        $title = "【{$student['s_name']}】{$guanxi}，您收到一条班级通知";
                        $HXYTITLE = "您收到一条班级通知，标题为【{$notice['title']}】";
                        $datas=array(
                            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                            'first'=>array('value'=>$title,'color'=>'#1587CD'),
                            'keyword1'=>array('value'=>$bjname,'color'=>'#1587CD'),
                            'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
                            'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                            'keyword4'=>array('value'=>$notice['title'],'color'=>'#1587CD'),
                            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                        );
                        $data = json_encode($datas); //发送的消息模板数据

                        if(empty($record['id'])){
                            if($values['sid']){
                                $date = array(
                                    'weid' =>  $weid,
                                    'schoolid' => $schoolid,
                                    'noticeid' => $notice_id,
                                    'sid' => $values['sid'],
                                    'userid' => $values['id'],
                                    'openid' => $openid,
                                    'type' => 1,
                                    'createtime' => $notice['createtime']
                                );
                                pdo_insert($this->table_record, $date);
                                $record_id = pdo_insertid();
                                if(!empty($notice['outurl'])){
                                    $url = $notice['outurl'];
                                }else{
                                    $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('snotice', array('schoolid' => $schoolid,'record_id' => $record_id,'id' => $notice_id,'userid' => $values['id']));
                                }
                                if($typtsmsset['msgsendtype'] != 1){ //如果未启用统一平台消息发送
                                    if(isallow_sendsms($schoolid,'bjtz')){
                                        if($values['mobile']){
                                            $ttimes = date('m月d日 H:i', TIMESTAMP);
                                            $content = array(
                                                'name' => "(".$student['s_name'].")".$guanxi,
                                                'time' => $ttimes,
                                                'type' => "班级通知",
                                            );
                                            mload()->model('sms');
                                            sms_send($values['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'bjtz', $weid, $schoolid);
                                        }
                                    }
                                }

                                if(!empty($smsset['bjtz'])){
                                    $this->sendtempmsg($smsset['bjtz'], $url, $data, '#FF0000', $openid);

                                }
                            }
                        }
                    }
                }
            }

            /**开始 和校园 消息发送判断 */
            if($typtsmsset['msgsendtype'] == 1){
                $sendtyptid = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE  tname = '{$tname}' and schoolid = '{$schoolid}' and weid = '{$weid}'  ");
                $title = "您收到一条班级通知，标题为【】";
                $smscontent = $HXYTITLE."，请至公众号内查看详情";
                $ttime = date("Y-m-d H:i:s",time());
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$sendtyptid['typt_user_id']);
            }
            /**结束 和校园 消息发送判断 */

        }
    }
    public function sendMobileBjtz($notice_id, $schoolid, $weid, $tname, $bj_id, $pindex, $psize) { //班级群发通知 统一平台已处理 check
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'bjtz');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['bjtz'] == 1 || !empty($smsset['bjtz'])){
            $notice = pdo_fetch("SELECT * FROM ".tablename($this->table_notice)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $notice_id, ':schoolid' => $schoolid));
            $category = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " WHERE :sid = sid ", array(':sid' => $bj_id));
            $userinfo = pdo_fetchall("SELECT id,typt_user_id FROM ".tablename($this->table_students)." where weid = :weid And schoolid = :schoolid And bj_id = :bj_id ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize,array(':weid'=>$weid, ':schoolid'=>$schoolid, ':bj_id'=>$bj_id));
            /** 和校园判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
            }
            $HXYTITLE = "";
            $receivers = []; 
            /**结束 */

            //$userinfo = pdo_fetchall("SELECT * FROM ".tablename($this->table_students)." where weid = :weid And schoolid = :schoolid And bj_id = :bj_id",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':bj_id'=>$bj_id));
            foreach ($userinfo as $key => $value){
                $openidall = pdo_fetchall("select id,sid,tid,pard,mobile,openid from ".tablename($this->table_user)." where sid = '{$value['id']}' ");
                $receivers[] = array( 'receiverid' => "{$value['typt_user_id']}" );  //拼装receivers数组

                $name  = "{$tname}老师";
                $bjname  = "{$category['sname']}";
                $ttime = date('Y-m-d H:i:s', $notice['createtime']);
                $body  = "点击本条消息查看详情 ";
                $num = count($openidall);
                if ($num > 1){
                    foreach ($openidall as $key => $values) {
                        $openid = $values['openid'];
                        $record = pdo_fetch("SELECT id FROM ".tablename($this->table_record)." where weid = :weid And schoolid = :schoolid And noticeid = :noticeid And openid = :openid And sid = :sid And userid = :userid And type = :type",array(
                            ':weid'=>$weid,
                            ':schoolid'=>$schoolid,
                            ':noticeid'=>$notice_id,
                            ':openid'=>$openid,
                            ':sid'=>$values['sid'],
                            ':userid'=>$values['id'],
                            ':type'=>1
                        ));
                        $student = pdo_fetch("SELECT s_name FROM ".tablename($this->table_students)." where id = :id",array(':id'=>$values['sid']));
                        if($values['pard'] == 2){
                            $guanxi = "妈妈";
                        }else if($values['pard'] == 3){
                            $guanxi = "爸爸";
                        }else if($values['pard'] == 4){
                            $guanxi = "";
                        }else if($values['pard'] == 5){
                            $guanxi = "家长";
                        }
                        $title = "【{$student['s_name']}】{$guanxi}，您收到一条班级通知";
                        $HXYTITLE = "您收到一条班级通知，标题为【{$notice['title']}】";
                        $datas=array(
                            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                            'first'=>array('value'=>$title,'color'=>'#1587CD'),
                            'keyword1'=>array('value'=>$bjname,'color'=>'#1587CD'),
                            'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
                            'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                            'keyword4'=>array('value'=>$notice['title'],'color'=>'#1587CD'),
                            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                        );
                        $data = json_encode($datas); //发送的消息模板数据

                        if(empty($record['id'])){
                            if($values['sid']){
                                $date = array(
                                    'weid' =>  $weid,
                                    'schoolid' => $schoolid,
                                    'noticeid' => $notice_id,
                                    'sid' => $values['sid'],
                                    'userid' => $values['id'],
                                    'openid' => $openid,
                                    'type' => 1,
                                    'createtime' => $notice['createtime']
                                );
                                pdo_insert($this->table_record, $date);
                                $record_id = pdo_insertid();
                                if(!empty($notice['outurl'])){
                                    $url = $notice['outurl'];
                                }else{
                                    $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('snotice', array('schoolid' => $schoolid,'record_id' => $record_id,'id' => $notice_id,'userid' => $values['id']));
                                }
                                if($typtsmsset['msgsendtype'] != 1){ //如果未开启统一平台消息发送
                                    if(isallow_sendsms($schoolid,'bjtz')){
                                        if($values['mobile']){
                                            $ttimes = date('m月d日 H:i', TIMESTAMP);
                                            $content = array(
                                                'name' => "(".$student['s_name'].")".$guanxi,
                                                'time' => $ttimes,
                                                'type' => "班级通知",
                                            );
                                            mload()->model('sms');
                                            sms_send($values['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'bjtz', $weid, $schoolid);
                                        }
                                    }
                                }
                                if(!empty($smsset['bjtz'])){
                                    $this->sendtempmsg($smsset['bjtz'], $url, $data, '#FF0000', $openid);

                                }
                            }
                        }
                    }
                }else{
                    $openid = $openidall['0']['openid'];
                    $record = pdo_fetch("SELECT id FROM ".tablename($this->table_record)." where weid = :weid And schoolid = :schoolid And noticeid = :noticeid And openid = :openid And sid = :sid And userid = :userid And type = :type",array(
                        ':weid'=>$_W['uniacid'],
                        ':schoolid'=>$schoolid,
                        ':noticeid'=>$notice_id,
                        ':openid'=>$openid,
                        ':sid'=>$openidall['0']['sid'],
                        ':userid'=>$openidall['0']['id'],
                        ':type'=>1,
                    ));
                    $student = pdo_fetch("SELECT s_name FROM ".tablename($this->table_students)." where id = :id",array(':id'=>$openidall['0']['sid']));
                    if($openidall['0']['pard'] == 2){
                        $guanxi = "妈妈";
                    }else if($openidall['0']['pard'] == 3){
                        $guanxi = "爸爸";
                    }else if($openidall['0']['pard'] == 4){
                        $guanxi = "";
                    }else if($openidall['0']['pard'] == 5){
                        $guanxi = "家长";
                    }
                    $title = "【{$student['s_name']}】{$guanxi}，您收到一条班级通知";
                    $HXYTITLE = "您收到一条班级通知，标题为【{$notice['title']}】";
                    $datas=array(
                        'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                        'first'=>array('value'=>$title,'color'=>'#1587CD'),
                        'keyword1'=>array('value'=>$bjname,'color'=>'#1587CD'),
                        'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
                        'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                        'keyword4'=>array('value'=>$notice['title'],'color'=>'#1587CD'),
                        'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                    );
                    $data = json_encode($datas); //发送的消息模板数据
                    if(empty($record['id'])){
                        if($openidall['0']['sid']){
                            $date = array(
                                'weid' =>  $_W['uniacid'],
                                'schoolid' => $schoolid,
                                'noticeid' => $notice_id,
                                'sid' => $openidall['0']['sid'],
                                'userid' => $openidall['0']['id'],
                                'openid' => $openid,
                                'type' => 1,
                                'createtime' => $notice['createtime']
                            );
                            pdo_insert($this->table_record, $date);
                            $record_id = pdo_insertid();
                            if(!empty($notice['outurl'])){
                                $url = $notice['outurl'];
                            }else{
                                $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('snotice', array('schoolid' => $schoolid,'record_id' => $record_id,'id' => $notice_id,'userid' => $openidall['0']['id']));
                            }
                            if($typtsmsset['msgsendtype'] != 1){ 
                                if(isallow_sendsms($schoolid,'bjtz')){
                                    if($openidall['0']['mobile']){
                                        $ttimes = date('m月d日 H:i', TIMESTAMP);
                                        $content = array(
                                            'name' => "(".$student['s_name'].")".$guanxi,
                                            'time' => $ttimes,
                                            'type' => "班级通知",
                                        );
                                        mload()->model('sms');
                                        sms_send($openidall['0']['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'bjtz', $weid, $schoolid);
                                    }
                                }
                            }
                            if(!empty($smsset['bjtz'])){
                                $this->sendtempmsg($smsset['bjtz'], $url, $data, '#FF0000', $openid);

                            }
                        }
                    }
                }
            }
            /**开始 和校园 消息发送判断 */
            if($typtsmsset['msgsendtype'] == 1){
                $sendtyptid = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE  tname = '{$tname}' and schoolid = '{$schoolid}' and weid = '{$weid}'  ");
                $title = "您收到一条班级通知";
                $smscontent = $HXYTITLE."，请至公众号内查看详情";
                $ttime = date("Y-m-d H:i:s",time());
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$sendtyptid['typt_user_id']);
            }
            /**结束 和校园 消息发送判断 */
        }
    }

    public function sendMobileHdtz($notice_id, $schoolid, $weid, $tname, $bj_id,$pindex = 1,$psize = 20) { //集体活动通知 Lee 统一平台已处理 check
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'xxtongzhi');
        if(!empty($smsset['xxtongzhi'])){
            $notice = pdo_fetch("SELECT * FROM ".tablename($this->table_groupactivity)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $notice_id, ':schoolid' => $schoolid));
            $school = pdo_fetch("SELECT title FROM ".tablename($this->table_index)." WHERE :weid = weid AND :id = id", array(':weid' => $weid, ':id' => $schoolid));
            $userinfo=pdo_fetchall("SELECT id,typt_user_id FROM ".tablename($this->table_students)." where weid = :weid And schoolid = :schoolid And bj_id = :bj_id LIMIT " . ($pindex - 1) * $psize . ',' . $psize,array(':weid'=>$weid, ':schoolid'=>$schoolid, ':bj_id'=>$bj_id));
            /** 和校园判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
            }
            
            $receivers = []; 
            $HXYTITLE = "";
            /**结束 */

            foreach ($userinfo as $key => $value){
                $receivers[] = array( 'receiverid' => "{$value['typt_user_id']}" );  //拼装receivers数组
                $openidall = pdo_fetchall("select id,sid,tid,pard,openid,userinfo from ".tablename($this->table_user)." where sid = '{$value['id']}' ");
                $name  = "校务办公室";
                $schoolname ="{$school['title']}";
                $ttime = date('Y-m-d H:i:s', $notice['createtime']);
                $body  = "点击本条消息查看详情 ";
                $num = count($openidall);
                if ($num > 1){
                    foreach ($openidall as $key => $values) {
                        $openid = $values['openid'];
                        $mobileinfo = $values['userinfo'];
                        $student = pdo_fetch("SELECT s_name FROM ".tablename($this->table_students)." where id = :id",array(':id'=>$values['sid']));
                        if($values['pard'] == 2){
                            $guanxi = "妈妈";
                        }else if($values['pard'] == 3){
                            $guanxi = "爸爸";
                        }else if($values['pard'] == 4){
                            $guanxi = "";
                        }else if($values['pard'] == 5){
                            $guanxi = "家长";
                        }
                        $title = "【{$student['s_name']}】{$guanxi}，您收到一条集体活动创建通知";
                        $HXYTITLE = "您收到一条集体活动创建通知，标题为【{$notice['title']}】";
                        //$keyword4 = $notice['title']
                        $datas=array(
                            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                            'first'=>array('value'=>$title,'color'=>'#1587CD'),
                            'keyword1'=>array('value'=>$schoolname,'color'=>'#1587CD'),
                            'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
                            'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                            'keyword4'=>array('value'=>$notice['title'],'color'=>'#1587CD'),
                            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                        );
                        $data = json_encode($datas); //发送的消息模板数据

                        if($values['sid']){
                            $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('gadetail', array('schoolid' => $schoolid,'gaid' => $notice_id,'op'=>'sendmsg'));
                            $this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $openid);
                        }

                    }
                }else{
                    $openid = $openidall['0']['openid'];
                    $mobileinfo = $openidall['0']['userinfo'];
                    $student = pdo_fetch("SELECT s_name FROM ".tablename($this->table_students)." where id = :id",array(':id'=>$openidall['0']['sid']));
                    if($openidall['0']['pard'] == 2){
                        $guanxi = "妈妈";
                    }else if($openidall['0']['pard'] == 3){
                        $guanxi = "爸爸";
                    }else if($openidall['0']['pard'] == 4){
                        $guanxi = "";
                    }else if($openidall['0']['pard'] == 5){
                        $guanxi = "家长";
                    }
                    $title = "【{$student['s_name']}】{$guanxi}，您收到一条集体活动创建通知";
                    $datas=array(
                        'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                        'first'=>array('value'=>$title,'color'=>'#1587CD'),
                        'keyword1'=>array('value'=>$schoolname,'color'=>'#1587CD'),
                        'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
                        'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                        'keyword4'=>array('value'=>$notice['title'],'color'=>'#1587CD'),
                        'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                    );
                    $data = json_encode($datas); //发送的消息模板数据
                    if($openidall['0']['sid']){

                        $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('gadetail', array('schoolid' => $schoolid,'gaid' => $notice_id,'op'=>'sendmsg'));

                        $this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $openid);
                    }

                }
            }

            /**开始 和校园 消息发送判断 */
            if($typtsmsset['msgsendtype'] == 1){
                $sendtyptid = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE  tname = '{$tname}' and schoolid = '{$schoolid}'  ");
                $title = "您收到一条集体活动通知";
                $smscontent = $HXYTITLE."，请至公众号内查看详情";
                $ttime = date("Y-m-d H:i:s",time());
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$sendtyptid['typt_user_id']);
            }
            /**结束 和校园 消息发送判断 */
        }
    }

    public function sendMobileRwtz($todoid, $schoolid, $weid, $fsid, $jsid,$type) { //任务通知 Lee 统一平台已处理 check
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'xxtongzhi');
        if(!empty($smsset['xxtongzhi'])){
            $notice = pdo_fetch("SELECT todoname,createtime FROM ".tablename($this->table_todo)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $todoid, ':schoolid' => $schoolid));
            $school = pdo_fetch("SELECT title FROM ".tablename($this->table_index)." WHERE :weid = weid AND :id = id", array(':weid' => $weid, ':id' => $schoolid));
            $openidall = pdo_fetch("select id,tid,openid from ".tablename($this->table_user)." where tid = '{$jsid}' ");
            $fsteacher = pdo_fetch("SELECT tname,typt_user_id FROM ".tablename($this->table_teachers)." where weid = :weid And schoolid = :schoolid And id = :id",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':id'=>$fsid));
            $jsteacher  = pdo_fetch("SELECT tname,typt_user_id FROM ".tablename($this->table_teachers)." where id = :id",array(':id'=>$jsid));
            $name       = $fsteacher['tname'];
            $schoolname = "{$school['title']}";
            $ttime      = date('Y-m-d H:i:s', $notice['createtime']);
            $body       = "点击本条消息查看详情 ";
            $openid     = $openidall['openid'];
            $title      = "【{$jsteacher['tname']}】老师，您收到一条任务通知";
            if($type == "create"){
                $keyword4 ="你有新的任务：". $notice['todoname'];
            }elseif($type == "deliver"){
                $keyword4 ="收到转交任务：". $notice['todoname'];
            }elseif($type == "finish"){
                $keyword4 ="任务已完成：". $notice['todoname'];
            }elseif($type == "second_refuse"){
                $keyword4 ="转交任务被拒绝：". $notice['todoname'];
            }elseif($type == "first_refuse"){
                $keyword4 ="任务被拒绝：". $notice['todoname'];
            }
            $datas=array(
                'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                'first'=>array('value'=>$title,'color'=>'#1587CD'),
                'keyword1'=>array('value'=>$schoolname,'color'=>'#1587CD'),
                'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
                'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                'keyword4'=>array('value'=>$keyword4,'color'=>'#1587CD'),
                'remark'=> array('value'=>$body,'color'=>'#FF9E05')
            );
            $data = json_encode($datas); //发送的消息模板数据
            if($openidall['tid']){
                $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('todolist', array('schoolid' => $schoolid));
                $this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $openid);
            }

            /**开始 和校园 消息发送判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
            }
            if($typtsmsset['msgsendtype'] == 1){
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
                $receivers = []; 
                $receivers[] = array( 'receiverid' => "{$jsteacher['typt_user_id']}" ); 
                $smscontent = $teachers['tname']."老师，您收到一条任务通知：".$keyword4."，请至公众号内查看详情";
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$fsteacher['typt_user_id']);
            } 
            /**结束 和校园 消息发送判断 */
        }
    }

    public function sendMobileXsqrqdtz($signid, $schoolid, $weid) { //学生课程签到成功通知 Lee
        global $_GPC,$_W;
        $school = pdo_fetch("SELECT title FROM ".tablename($this->table_index)." WHERE :weid = weid AND :id = id", array(':weid' => $weid, ':id' => $schoolid));
        $sign = pdo_fetch("SELECT kcid,ksid,sid,type,createtime FROM ".tablename($this->table_kcsign)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $signid, ':schoolid' => $schoolid));
        $kcinfo = pdo_fetch("SELECT name FROM ".tablename($this->table_tcourse)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $sign['kcid'], ':schoolid' => $schoolid));
        $student = pdo_fetch("SELECT s_name FROM ".tablename($this->table_students)." where weid = :weid And schoolid = :schoolid And id = :id",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':id'=>$sign['sid']));

        $openidall = pdo_fetchall("select id,sid,openid,pard,mobile from ".tablename($this->table_user)." where sid = '{$sign['sid']}' ");
        //return $openidall;
        if($sign['type'] ==1){
            $smsset = get_weidset($weid,'sykstx');
            $title = "【{$student['s_name']}】参加【{$kcinfo['name']}】课程签到成功";
            $count_done = pdo_fetchcolumn("SELECT count(*) FROM ".tablename($this->table_kcsign)." WHERE :weid = weid AND :sid = sid AND :schoolid = schoolid and kcid=:kcid And status=:status", array(':weid' => $weid, ':sid' => $sign['sid'], ':schoolid' => $schoolid,':kcid'=>$sign['kcid'],':status'=>2));
            $count_all = pdo_fetchcolumn("SELECT ksnum FROM ".tablename($this->table_coursebuy)." WHERE :weid = weid AND :sid = sid AND :schoolid = schoolid and kcid=:kcid ", array(':weid' => $weid, ':sid' => $sign['sid'], ':schoolid' => $schoolid,':kcid'=>$sign['kcid']));
            $rest = $count_all - $count_done;
            $count_done_word = $count_done."节";
            $rest_word = $rest."节";
            $signtime = date("Y-m-d H:i:s",$sign['createtime']);
            $body = "点击查看课程详情";
            $num = count($openidall);
            if ($num > 1){
                foreach ($openidall as $key => $values) {
                    if($values['sid'] ==$sign['sid']){
                        $openid = $values['openid'];
                        $datas=array(
                            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                            'first'=>array('value'=>$title,'color'=>'#1587CD'),
                            'keyword1'=>array('value'=>$signtime,'color'=>'#1587CD'),
                            'keyword2'=>array('value'=>$count_done_word,'color'=>'#2D6A90'),
                            'keyword3'=>array('value'=>$rest_word,'color'=>'#1587CD'),
                            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                        );
                        $data = json_encode($datas); //发送的消息模板数据
                        $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('mykcinfo', array('schoolid' => $schoolid,'userid' => $values['id'],'id'=>$sign['kcid']));
                        if(!empty($smsset['sykstx'])){
                            $this->sendtempmsg($smsset['sykstx'], $url, $data, '#FF0000', $openid);
                        }
                        if(isallow_sendsms($schoolid,'sykstx')){
                            if($values['mobile']){
                                $ttimes = date('m月d日 H:i', TIMESTAMP);
                                $content = array(
                                    'name' => $student['s_name'],
                                    'time' => $ttimes,

                                );
                                mload()->model('sms');
                                sms_send($values['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'sykstx', $weid, $schoolid);
                            }
                        }
                    }
                }
            }else{
                if($openidall['0']['sid'] == $sign['sid']){
                    $openid = $openidall['0']['openid'];
                    $datas=array(
                        'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                        'first'=>array('value'=>$title,'color'=>'#1587CD'),
                        'keyword1'=>array('value'=>$signtime,'color'=>'#1587CD'),
                        'keyword2'=>array('value'=>$count_done,'color'=>'#2D6A90'),
                        'keyword3'=>array('value'=>$rest,'color'=>'#1587CD'),
                        'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                    );
                    $data = json_encode($datas); //发送的消息模板数据
                    $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('mykcinfo', array('schoolid' => $schoolid,'userid' => $openidall['0']['id'],'id'=>$sign['kcid']));
                    if(!empty($smsset['sykstx'])){
                        $this->sendtempmsg($smsset['sykstx'], $url, $data, '#FF0000', $openid);
                    }
                    if(isallow_sendsms($schoolid,'sykstx')){
                        if($openidall['0']['mobile']){
                            $ttimes = date('m月d日 H:i', TIMESTAMP);
                            $content = array(
                                'name' => $student['s_name'],
                                'time' => $ttimes,
                            );
                            mload()->model('sms');
                            sms_send($openidall['0']['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'sykstx', $weid, $schoolid);
                        }
                    }
                }
            }
        }elseif($sign['type'] ==0){
			mload()->model('kc');
			$ksinfo = GetOneKcKsOrder($sign['kcid'],$sign['ksid']);
            $smsset = get_weidset($weid,'kcqdtx');
            $title = "【{$student['s_name']}】签到成功";
            $count_done = pdo_fetchcolumn("SELECT sum(costnum) FROM ".tablename($this->table_kcsign)." WHERE :weid = weid AND :sid = sid AND :schoolid = schoolid and kcid=:kcid And status=:status", array(':weid' => $weid, ':sid' => $sign['sid'], ':schoolid' => $schoolid,':kcid'=>$sign['kcid'],':status'=>2));
            $count_all = pdo_fetchcolumn("SELECT ksnum FROM ".tablename($this->table_coursebuy)." WHERE :weid = weid AND :sid = sid AND :schoolid = schoolid and kcid=:kcid ", array(':weid' => $weid, ':sid' => $sign['sid'], ':schoolid' => $schoolid,':kcid'=>$sign['kcid']));
            $rest = $count_all - $count_done;
            $keyword1 ="{$kcinfo['name']}【第{$ksinfo['nuber']}】课";
            $signtime = date("Y-m-d H:i:s",$sign['createtime']);
            $keyword4 = "上课签到 ";
            $body = "剩余课时【".$rest."】节， 点击查看详情";
            $num = count($openidall);
            if ($num > 1){
                foreach ($openidall as $key => $values) {
                    if($values['sid'] ==$sign['sid']){
                        $openid = $values['openid'];
                        $datas=array(
                            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                            'first'=>array('value'=>$title,'color'=>'#1587CD'),
                            'keyword1'=>array('value'=>$keyword1,'color'=>'#1587CD'),
                            'keyword2'=>array('value'=>$student['s_name'],'color'=>'#2D6A90'),
                            'keyword3'=>array('value'=>$signtime,'color'=>'#1587CD'),
                            'keyword4'=>array('value'=>$keyword4),
                            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                        );
                        $data = json_encode($datas); //发送的消息模板数据
                        $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('mykcinfo', array('schoolid' => $schoolid,'userid' => $values['id'],'id'=>$sign['kcid']));
                        if(!empty($smsset['kcqdtx'])){
                            $this->sendtempmsg($smsset['kcqdtx'], $url, $data, '#FF0000', $openid);
                        }
                        if(isallow_sendsms($schoolid,'kcqdtx')){
                            if($values['mobile']){
                                $ttimes = date('m月d日 H:i', TIMESTAMP);
                                $content = array(
                                    'name' => $student['s_name'],
                                    'time' => $ttimes,
                                );
                                mload()->model('sms');
                                sms_send($values['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'kcqdtx', $weid, $schoolid);
                            }
                        }
                    }
                }
            }else{
                if($openidall['0']['sid'] == $sign['sid']){
                    $openid = $openidall['0']['openid'];
                    $datas=array(
                        'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                        'first'=>array('value'=>$title,'color'=>'#1587CD'),
                        'keyword1'=>array('value'=>$keyword1,'color'=>'#1587CD'),
                        'keyword2'=>array('value'=>$student['s_name'],'color'=>'#2D6A90'),
                        'keyword3'=>array('value'=>$signtime,'color'=>'#1587CD'),
                        'keyword4'=>array('value'=>$keyword4,'color'=>'#1587CD'),
                        'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                    );
                    $data = json_encode($datas); //发送的消息模板数据
                    $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('mykcinfo', array('schoolid' => $schoolid,'userid' => $openidall['0']['id'],'id'=>$sign['kcid']));
                    if(!empty($smsset['kcqdtx'])){
                        $this->sendtempmsg($smsset['kcqdtx'], $url, $data, '#FF0000', $openid);
                    }
                    if(isallow_sendsms($schoolid,'kcqdtx')){
                        if($openidall['0']['mobile']){
                            $ttimes = date('m月d日 H:i', TIMESTAMP);
                            $content = array(
                                'name' => $student['s_name'],
                                'time' => $ttimes,
                            );
                            mload()->model('sms');
                            sms_send($openidall['0']['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'kcqdtx', $weid, $schoolid);
                        }
                    }
                }
            }
        }
    }

    public function sendMobileJsqrqdtz($signid, $schoolid, $weid) { //教师课程签到待确认通知 Lee
        global $_GPC,$_W;
        $school = pdo_fetch("SELECT title FROM ".tablename($this->table_index)." WHERE :weid = weid AND :id = id", array(':weid' => $weid, ':id' => $schoolid));
        $sign = pdo_fetch("SELECT kcid,ksid,tid,type,createtime FROM ".tablename($this->table_kcsign)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $signid, ':schoolid' => $schoolid));
        $kcinfo = pdo_fetch("SELECT xq_id,name FROM ".tablename($this->table_tcourse)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $sign['kcid'], ':schoolid' => $schoolid));
        $teacher = pdo_fetch("SELECT tname FROM ".tablename($this->table_teachers)." where weid = :weid And schoolid = :schoolid And id = :id",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':id'=>$sign['tid']));
        $njzr_id = pdo_fetch("SELECT tid FROM ".tablename($this->table_classify)." WHERE :weid = weid AND :sid = sid AND :schoolid = schoolid ", array(':weid' => $weid, ':sid' => $kcinfo['xq_id'], ':schoolid' => $schoolid));

        $openid = pdo_fetch("select id,openid from ".tablename($this->table_user)." where tid = '{$njzr_id['tid']}' ");
        $njzrinfo = pdo_fetch("SELECT tname,mobile FROM ".tablename($this->table_teachers)." where weid = :weid And schoolid = :schoolid And id = :id",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':id'=>$njzr_id['tid']));
        $smsset = get_weidset($weid,'kcqdtx');
        $title = "{$njzrinfo['tname']}老师,您有一条签到信息需要确认";
        $keyword1 = $kcinfo['name'];
        $keyword2 = $teacher['tname'];
        $keyword3 = date("Y-m-d H:i:s",$sign['createtime']);
        $body = "点击进行签到确认";
        if($sign['type'] ==1){
            $keyword4 = "自由签到";
        }elseif($sign['type'] ==0){
            $keyword4 = "固定课表";
        }
        $datas=array(
            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
            'first'=>array('value'=>$title,'color'=>'#FF9E05'),
            'keyword1'=>array('value'=>$keyword1,'color'=>'#1587CD'),
            'keyword2'=>array('value'=>$keyword2,'color'=>'#2D6A90'),
            'keyword3'=>array('value'=>$keyword3,'color'=>'#1587CD'),
            'keyword4'=>array('value'=>$keyword4,'color'=>'#1587CD'),
            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
        );
        $data = json_encode($datas);
        $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('tqrjsqd', array('schoolid' => $schoolid));
        $this->sendtempmsg($smsset['kcqdtx'], $url, $data, '#FF0000', $openid['openid']);
        if(isallow_sendsms($schoolid,'kcqdtx')){
            if($njzrinfo['mobile']){
                $ttimes = date('m月d日 H:i', TIMESTAMP);
                $content = array(
                    'name' => $njzrinfo['tname'],
                    'time' => $ttimes,
                );
                mload()->model('sms');
                sms_send($njzrinfo['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'kcqdtx', $weid, $schoolid);
            }
        }
    }

    public function sendMobileTxjsqd($kcid,$schoolid,$weid) { //提醒教师签到课程 Lee
        global $_GPC,$_W;
        $school = pdo_fetch("SELECT title FROM ".tablename($this->table_index)." WHERE :weid = weid AND :id = id", array(':weid' => $weid, ':id' => $schoolid));
        $kcinfo = pdo_fetch("SELECT xq_id,name,maintid,tid,adrr FROM ".tablename($this->table_tcourse)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $kcid, ':schoolid' => $schoolid));
        if(!empty($kcinfo['maintid'])){
            $teacher = pdo_fetch("SELECT id,tname FROM ".tablename($this->table_teachers)." where weid = :weid And schoolid = :schoolid And id = :id",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':id'=>$kcinfo['maintid']));
        }elseif(empty($kcinfo['maintid'])){
            $teacher = pdo_fetch("SELECT id,tname,mobile FROM ".tablename($this->table_teachers)." where weid = :weid And schoolid = :schoolid And id = :id",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':id'=>$kcinfo['tid']));
        }
        $openid = pdo_fetch("select id,openid from ".tablename($this->table_user)." where tid = '{$teacher['id']}' ");
        $smsset = get_weidset($weid,'sktxls');
        $title = "{$teacher['tname']}老师,您有课程需要签到";
        $keyword1 = $kcinfo['name'];
        $keyword2 = date("Y-m-d",time());
        $kcaddr = pdo_fetch("select sname from ".tablename($this->table_classify)." where sid = '{$kcinfo['adrr']}' ");
        $keyword3 = $kcaddr['sname'];
        $body = "点击进行签到";
        $datas=array(
            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
            'first'=>array('value'=>$title,'color'=>'#FF9E05'),
            'keyword1'=>array('value'=>$keyword1,'color'=>'#1587CD'),
            'keyword2'=>array('value'=>$keyword2,'color'=>'#2D6A90'),
            'keyword3'=>array('value'=>$keyword3,'color'=>'#1587CD'),
            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
        );
        $data = json_encode($datas);
        $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('tmykcinfo', array('schoolid' => $schoolid,'id'=>$kcid));
        if(!empty($smsset['sktxls'])){
            $this->sendtempmsg($smsset['sktxls'], $url, $data, '#FF0000', $openid['openid']);
        }
        if(isallow_sendsms($schoolid,'sktxls')){
            if($teacher['mobile']){
                $ttimes = date('m月d日 H:i', TIMESTAMP);
                $content = array(
                    'name' => $teacher['tname'],
                    'time' => $ttimes,
                );
                mload()->model('sms');
                sms_send($teacher['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'sktxls', $weid, $schoolid);
            }
        }
    }

    public function sendMobileQrjsqdtz($signid,$schoolid,$weid) { //确认教师课程签到通知 Lee
        global $_GPC,$_W;
        $school = pdo_fetch("SELECT title FROM ".tablename($this->table_index)." WHERE :weid = weid AND :id = id", array(':weid' => $weid, ':id' => $schoolid));
        $signinfo = pdo_fetch("SELECT * FROM ".tablename($this->table_kcsign)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $signid, ':schoolid' => $schoolid));
        $kcinfo = pdo_fetch("SELECT name,adrr FROM ".tablename($this->table_tcourse)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $signinfo['kcid'], ':schoolid' => $schoolid));
        $teacher = pdo_fetch("SELECT id,tname,mobile FROM ".tablename($this->table_teachers)." where weid = :weid And schoolid = :schoolid And id = :id",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':id'=>$signinfo['tid']));
        $openid = pdo_fetch("select id,openid from ".tablename($this->table_user)." where tid = '{$teacher['id']}' ");
        $smsset = get_weidset($weid,'kcqdtx');
        $title = "{$teacher['tname']}老师,您有签到被确认";
        $keyword1 = $kcinfo['name'];
        $keyword2 = date("Y-m-d H:i:s",$signinfo['createtime']);
        $kcaddr = pdo_fetch("select sname from ".tablename($this->table_classify)." where sid = '{$kcinfo['adrr']}' ");
        $keyword3 = $kcaddr['sname'];
        $body = "点击查看详情";
        if($signinfo['type'] ==1){
            $keyword4 = "自由签到";
        }elseif($signinfo['type'] ==0){
            $keyword4 = "固定课表";
        }
        $datas=array(
            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
            'first'=>array('value'=>$title,'color'=>'#1587CD'),
            'keyword1'=>array('value'=>$keyword1,'color'=>'#1587CD'),
            'keyword2'=>array('value'=>$keyword2,'color'=>'#2D6A90'),
            'keyword3'=>array('value'=>$keyword3,'color'=>'#1587CD'),
            'keyword4'=>array('value'=>$keyword4,'color'=>'#1587CD'),
            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
        );
        $data = json_encode($datas);
        $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('tmykcinfo', array('schoolid' => $schoolid,'id'=>$signinfo['kcid']));

        if(!empty($smsset['kcqdtx'])){
            $this->sendtempmsg($smsset['kcqdtx'], $url, $data, '#FF0000', $openid['openid']);
        }
        if(isallow_sendsms($schoolid,'kcqdtx')){
            if($teacher['mobile']){
                $ttimes = date('m月d日 H:i', TIMESTAMP);
                $content = array(
                    'name' => $teacher['tname'],
                    'time' => $ttimes,
                );
                mload()->model('sms');
                sms_send($teacher['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'kcqdtx', $weid, $schoolid);
            }
        }
    }

    public function sendMobileYykctz($yyid,$schoolid,$weid) { //预约课程通知 Lee
        global $_GPC,$_W;
        $school = pdo_fetch("SELECT title FROM ".tablename($this->table_index)." WHERE :weid = weid AND :id = id", array(':weid' => $weid, ':id' => $schoolid));
        $yyinfo = pdo_fetch("SELECT * FROM ".tablename($this->table_courseorder)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $yyid, ':schoolid' => $schoolid));
        if(!empty($yyinfo['kcid'])){
            $kcinfo = pdo_fetch("SELECT name FROM ".tablename($this->table_tcourse)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $yyinfo['kcid'], ':schoolid' => $schoolid));
        }
        $teacher = pdo_fetch("SELECT id,tname,mobile FROM ".tablename($this->table_teachers)." where weid = :weid And schoolid = :schoolid And id = :id",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':id'=>$yyinfo['tid']));
        $openid = pdo_fetch("select id,openid from ".tablename($this->table_user)." where tid = '{$teacher['id']}' ");
        $smsset = get_weidset($weid,'kcyytx');
        $title = "{$teacher['tname']}老师,您收到一条课程预约信息";
        $keyword1 = $yyinfo['name'];
        $keyword2 = $yyinfo['tel'];
        $keyword3 = date("Y-m-d",$yyinfo['createtime']);

        $body = "点击查看详情";
        if(empty($yyinfo['kcid'])){
            $keyword4 = "公共预约";
        }elseif(!empty($yyinfo['kcid'])){
            $keyword4 = "{$kcinfo['name']}";
        }
        $datas=array(
            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
            'first'=>array('value'=>$title,'color'=>'#1587CD'),
            'keyword1'=>array('value'=>$keyword1,'color'=>'#1587CD'),
            'keyword2'=>array('value'=>$keyword2,'color'=>'#2D6A90'),
            'keyword3'=>array('value'=>$keyword3,'color'=>'#1587CD'),
            'keyword4'=>array('value'=>$keyword4,'color'=>'#1587CD'),
            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
        );
        $data = json_encode($datas);
        $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('cyylist', array('schoolid' => $schoolid));
        if(!empty($smsset['kcyytx'])){
            $this->sendtempmsg($smsset['kcyytx'], $url, $data, '#FF0000', $openid['openid']);
        }
        if(isallow_sendsms($schoolid,'kcyytx')){
            if($teacher['mobile']){
                $ttimes = date('m月d日 H:i', TIMESTAMP);
                $content = array(
                    'name' => $teacher['tname'],
                    'time' => $ttimes,
                );
                mload()->model('sms');
                sms_send($teacher['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'kcyytx', $weid, $schoolid);
            }
        }
    }


    public function sendMobileJssktx($ksid,$schoolid,$weid) { //教师授课提醒 Lee
        global $_GPC,$_W;
        $school = pdo_fetch("SELECT title FROM ".tablename($this->table_index)." WHERE :weid = weid AND :id = id", array(':weid' => $weid, ':id' => $schoolid));
        $ksinfo = pdo_fetch("SELECT * FROM ".tablename($this->table_kcbiao)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $ksid, ':schoolid' => $schoolid));
        $kcinfo = pdo_fetch("SELECT name,adrr FROM ".tablename($this->table_tcourse)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $ksinfo['kcid'], ':schoolid' => $schoolid));
        $teacher = pdo_fetch("SELECT id,tname,mobile FROM ".tablename($this->table_teachers)." where weid = :weid And schoolid = :schoolid And id = :id",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':id'=>$ksinfo['tid']));
        $openid = pdo_fetch("select id,openid from ".tablename($this->table_user)." where tid = '{$teacher['id']}' ");
        $sdinfo = pdo_fetch("select sname from ".tablename($this->table_classify)." where sid = '{$ksinfo['sd_id']}' ");
        $smsset = get_weidset($weid,'sktxls');
        $students =pdo_fetchall("SELECT distinct sid FROM ".tablename($this->table_order)." WHERE weid ='{$weid}' AND kcid ='{$ksinfo['kcid']}' AND schoolid = '{$schoolid}' and type = 1 and status=2 and sid != 0");
		mload()->model('kc');
		$nuber = GetOneKcKsOrder($ksinfo['kcid'],$ksid);
        foreach($students as $key=>$value){
            $student_v = pdo_fetch("SELECT s_name FROM ".tablename($this->table_students)." where weid = :weid And schoolid = :schoolid And id = :id",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':id'=>$value['sid']));
            $user_v = pdo_fetchall("select id,openid,pard,mobile from ".tablename($this->table_user)." where sid = '{$value['sid']}' and weid = '{$weid}' and schoolid='{$schoolid}' ");
			
            $keyword1 = $kcinfo['name']."【第".$nuber['nuber']."课】";
            $keyword2 = date("n月d日",$ksinfo['date'])." ".$sdinfo['sname'];
            $kcaddr = pdo_fetch("select sname from ".tablename($this->table_classify)." where sid = '{$kcinfo['adrr']}' ");
            $keyword3 = $kcaddr['sname'];
            $body = "点击查看详情";
            $num = count($user_v);
            if($num > 1){
                foreach($user_v as $key_u=>$value_u){
                    $guanxi = get_guanxi($value_u['pard']);
                    $title = "{$student_v['s_name']}{$guanxi},您收到一条学生上课提醒";
                    $datas=array(
                        'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                        'first'=>array('value'=>$title,'color'=>'#FF9E05'),
                        'keyword1'=>array('value'=>$keyword1,'color'=>'#1587CD'),
                        'keyword2'=>array('value'=>$keyword2,'color'=>'#2D6A90'),
                        'keyword3'=>array('value'=>$keyword3,'color'=>'#1587CD'),
                        'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                    );
                    $data = json_encode($datas);
                    $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('mykcinfo', array('schoolid' => $schoolid,'userid'=>$value_u['id'],'id'=>$ksinfo['kcid']));
                    if(!empty($smsset['sktxls'])){
                        $this->sendtempmsg($smsset['sktxls'], $url, $data, '#FF0000', $value_u['openid']);
                        //var_dump($value_u['openid']);
                        //var_dump($student_v['s_name']);

                    }
                    if(isallow_sendsms($schoolid,'sktxls')){
                        if($value_u['mobile']){
                            $ttimes = date('m月d日 H:i', TIMESTAMP);
                            $name = $student_v['s_name'].$guanxi;
                            $content = array(
                                'name' => $name,
                                'time' => $ttimes,
                            );
                            mload()->model('sms');
                            sms_send($value_u['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'sktxls', $weid, $schoolid);
                        }
                    }
                }
            }elseif($num == 1){
                $guanxi = get_guanxi($user_v[0]['pard']);
                $title = "{$student_v['s_name']}{$guanxi},您收到一条学生上课提醒";
                $datas=array(
                    'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                    'first'=>array('value'=>$title,'color'=>'#FF9E05'),
                    'keyword1'=>array('value'=>$keyword1,'color'=>'#1587CD'),
                    'keyword2'=>array('value'=>$keyword2,'color'=>'#2D6A90'),
                    'keyword3'=>array('value'=>$keyword3,'color'=>'#1587CD'),
                    'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                );
                $data = json_encode($datas);
                $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('mykcinfo', array('schoolid' => $schoolid,'userid'=>$user_v[0]['id'],'id'=>$ksinfo['kcid']));
                if(!empty($smsset['sktxls'])){
                    $this->sendtempmsg($smsset['sktxls'], $url, $data, '#FF0000', $user_v[0]['openid']);
                    //var_dump($user_v[0]['openid']);
                    //var_dump($student_v['s_name']);
                }
                if(isallow_sendsms($schoolid,'sktxls')){
                    if($user_v[0]['mobile']){
                        $ttimes = date('m月d日 H:i', TIMESTAMP);
                        $name = $student_v['s_name'].$guanxi;
                        $content = array(
                            'name' => $name,
                            'time' => $ttimes,
                        );
                        mload()->model('sms');
                        sms_send($user_v[0]['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'sktxls', $weid, $schoolid);
                    }
                }

            }

        }

        $title = "{$teacher['tname']}老师,您收到一条授课提醒";
        $keyword1 = $kcinfo['name']."【第".$nuber['nuber']."课】";
        $keyword2 = date("n月d日",$ksinfo['date'])." ".$sdinfo['sname'];
        $kcaddr = pdo_fetch("select sname from ".tablename($this->table_classify)." where sid = '{$kcinfo['adrr']}' ");
        $keyword3 = $kcaddr['sname'];
        $body = "点击查看详情";

        $datas=array(
            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
            'first'=>array('value'=>$title,'color'=>'#FF9E05'),
            'keyword1'=>array('value'=>$keyword1,'color'=>'#1587CD'),
            'keyword2'=>array('value'=>$keyword2,'color'=>'#2D6A90'),
            'keyword3'=>array('value'=>$keyword3,'color'=>'#1587CD'),
            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
        );
        $data = json_encode($datas);
        $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('tmykcinfo', array('schoolid' => $schoolid,'id'=>$ksinfo['kcid']));
        if(!empty($smsset['sktxls'])){
            $this->sendtempmsg($smsset['sktxls'], $url, $data, '#FF0000', $openid['openid']);
            //var_dump( $openid['openid']);
            //var_dump($teacher['tname']);
        }
        if(isallow_sendsms($schoolid,'sktxls')){
            if($teacher['mobile']){
                $ttimes = date('m月d日 H:i', TIMESTAMP);
                $content = array(
                    'name' => $teacher['tname'],
                    'time' => $ttimes,
                );
                mload()->model('sms');
                sms_send($teacher['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'sktxls', $weid, $schoolid);
            }
        }
    }


    public function sendMobileOvertimeTx($kcid,$sid,$schoolid,$weid) { //学生过期提醒
        global $_GPC,$_W;
        $school = pdo_fetch("SELECT title FROM ".tablename($this->table_index)." WHERE :weid = weid AND :id = id", array(':weid' => $weid, ':id' => $schoolid));

        $kcinfo = pdo_fetch("SELECT name,adrr FROM ".tablename($this->table_tcourse)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $kcid, ':schoolid' => $schoolid));
        $smsset = get_weidset($weid,'xxtongzhi');

        $student_v = pdo_fetch("SELECT s_name FROM ".tablename($this->table_students)." where weid = :weid And schoolid = :schoolid And id = :id",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':id'=>$sid));
        $user_v = pdo_fetchall("select id,openid,pard,userinfo from ".tablename($this->table_user)." where sid = '{$sid}' and weid = '{$weid}' and schoolid='{$schoolid}' ");

        $keyword1 = $school['title'];
        $keyword2 = '管理员';

        $keyword3 = date("Y-m-d H:i",time());
        $keyword4 = "您的课程【{$kcinfo['name']}】即将过期，请安排时间上课";
        $body = "点击查看课程详情";


            $guanxi = get_guanxi($user_v[0]['pard']);
            $title = "{$student_v['s_name']}{$guanxi},您有课程即将过期";
            $datas=array(
                'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                'first'=>array('value'=>$title,'color'=>'#FF9E05'),
                'keyword1'=>array('value'=>$keyword1,'color'=>'#1587CD'),
                'keyword2'=>array('value'=>$keyword2,'color'=>'#2D6A90'),
                'keyword3'=>array('value'=>$keyword3,'color'=>'#1587CD'),
                'keyword4'=>array('value'=>$keyword4,'color'=>'#1587CD'),
                'remark'=> array('value'=>$body,'color'=>'#FF9E05')
            );
            $data = json_encode($datas);
            $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('mykcinfo', array('schoolid' => $schoolid,'userid'=>$user_v[0]['id'],'id'=>$kcid));

            if(!empty($smsset['xxtongzhi'])){

                $bb = $this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $user_v[0]['openid']);
                return $bb;
                //var_dump($user_v[0]['openid']);
                //var_dump($student_v['s_name']);
            }


    }



    public function doWebXytzMsg(){
        global $_GPC,$_W;
        $notice_id = $_GPC['notice_id'];
        $schoolid = $_GPC['schoolid'];
        $weid = $_GPC['weid'];
        $tname = $_GPC['tname'];
        $groupid = $_GPC['groupid'];
        $pindex = max(1, intval($_GPC['page']));
        $psize = 2;
        if ($groupid >= 4) {
            $total = pdo_fetchcolumn("SELECT id FROM ".tablename($this->table_teachers)." where weid = :weid And schoolid = :schoolid And fz_id = :fz_id " ,array(':weid'=>$weid, ':schoolid'=>$schoolid, ':fz_id'=>$groupid));
        }else{
            if ($groupid == 1) {
                $total = pdo_fetchcolumn("SELECT COUNT(1) FROM ".tablename($this->table_user)." where weid = :weid And schoolid = :schoolid",array(':weid'=>$weid, ':schoolid'=>$schoolid));
            }
            if ($groupid == 2) {
                $total = pdo_fetchcolumn("SELECT COUNT(1) FROM ".tablename($this->table_teachers)." where weid = :weid And schoolid = :schoolid",array(':weid'=>$weid, ':schoolid'=>$schoolid));
            }
            if ($groupid == 3) {
                $total = pdo_fetchcolumn("SELECT COUNT(1) FROM ".tablename($this->table_students)." where weid = :weid And schoolid = :schoolid",array(':weid'=>$weid, ':schoolid'=>$schoolid));
            }
        }
        $tp = ceil($total/$psize);
        //echo '第' . $pindex . '次,总共'.$tp.'次';

        for ($i=1; $i < $tp; $i++) {
            $this->sendMobileXytz($notice_id, $schoolid, $weid, $tname, $groupid, $pindex, $psize);
            if ($pindex == $i) {
                $mq = round(($pindex / $tp) * 100);
                $msg = '正在发送，目前：<strong style="color:#5cb85c">' . $mq . ' %</strong>,请勿执行任何操作';

                $page = $pindex + 1;
                $to = $this -> createWebUrl('XytzMsg', array('notice_id' => $notice_id, 'schoolid' => $schoolid, 'weid' => $weid, 'tname' => $tname, 'groupid' => $groupid, 'page' => $page));
                $this->imessage($msg, $to);
            }
        }
        $this->imessage('发送成功！', $this -> createWebUrl('notice', array('op' => 'display5','schoolid' => $schoolid,'notice_id' => $notice_id)));
    }
    public function sendMobileXytzToUserArr($notice_id, $schoolid, $weid, $tname, $arr, $usertaype, $pindex='1', $psize='20'){ //向指定用户发送校园通知 统一平台已处理 check
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'xxtongzhi');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['xxtongzhi'] == 1 || !empty($smsset['xxtongzhi'])) {
            $notice = pdo_fetch("SELECT title,outurl,createtime FROM ".tablename($this->table_notice)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $notice_id, ':schoolid' => $schoolid));
            $school = pdo_fetch("SELECT title FROM ".tablename($this->table_index)." WHERE :weid = weid AND :id = id", array(':weid' => $weid, ':id' => $schoolid));
            $newArray = array_slice($arr,($pindex-1)*$psize,$psize);

            /** 和校园判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
            }
           
            $receivers = []; 
            $HXYTITLE = "";
            /**结束 */
            foreach($newArray as $val){
                if($usertaype == 'tostu'){
                    $student = pdo_fetch("select s_name,typt_user_id from ".tablename($this->table_students)." where id = '{$val}' ");
                    $receivers[] = array( 'receiverid' => "{$student['typt_user_id']}" );  //拼装receivers数组

                    $openid = pdo_fetchall("select id,sid,tid,pard,mobile,openid from ".tablename($this->table_user)." where sid = '{$val}' ");
                    foreach($openid as $o) {
                        if($o['pard'] == 2){
                            $guanxi = "妈妈";
                        }else if($o['pard'] == 3){
                            $guanxi = "爸爸";
                        }else if($o['pard'] == 4){
                            $guanxi = "";
                        }else if($o['pard'] == 5){
                            $guanxi = "家长";
                        }
                        $ttime = date('Y-m-d H:i:s', $notice['createtime']);
                        $content = array(
                            'name' => "(".$student['s_name'].")".$guanxi,
                            'time' => $ttime,
                        );
                        $title = "【{$student['s_name']}】{$guanxi}，您收到一条学校通知";
                        $HXYTITLE = "您收到一条校园通知，标题为【{$notice['title']}】";
                        $schoolname ="{$school['title']}";
                        $name  = "{$tname}老师";
                        $body  = "点击本条消息查看详情 ";
                        $datas=array(
                            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                            'first'=>array('value'=>$title,'color'=>'#1587CD'),
                            'keyword1'=>array('value'=>$schoolname,'color'=>'#1587CD'),
                            'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
                            'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                            'keyword4'=>array('value'=>$notice['title'],'color'=>'#1587CD'),
                            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                        );
                        $data = json_encode($datas); //发送的消息模板数据
                        $record = pdo_fetch("SELECT * FROM ".tablename($this->table_record)." where weid = :weid And schoolid = :schoolid And noticeid = :noticeid And openid = :openid And sid = :sid And userid = :userid And type = :type",array(
                            ':weid'=>$_W['uniacid'],
                            ':schoolid'=>$schoolid,
                            ':noticeid'=>$notice_id,
                            ':openid'=>$o['openid'],
                            ':sid'=>$o['sid'],
                            ':userid'=>$o['id'],
                            ':type'=>3
                        ));
                        if(empty($record['id'])){
                            if($o['sid']){
                                $date = array(
                                    'weid' =>  $_W['uniacid'],
                                    'schoolid' => $schoolid,
                                    'noticeid' => $notice_id,
                                    'sid' => $o['sid'],
                                    'userid' => $o['id'],
                                    'openid' => $o['openid'],
                                    'type' => 3,
                                    'createtime' => $notice['createtime']
                                );
                                pdo_insert($this->table_record, $date);
                                $record_id = pdo_insertid();
                                if(!empty($notice['outurl'])){
                                    $url = $notice['outurl'];
                                }else{
                                    $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('snotice', array('schoolid' => $schoolid,'record_id' => $record_id,'id' => $notice_id,'userid' => $o['id']));
                                }
                                if($typtsmsset['msgsendtype'] != 1){
                                    if(isallow_sendsms($schoolid,'xxtongzhi')){
                                        $mobile = $o['mobile'];
                                        if($mobile){
                                            mload()->model('sms');
                                            sms_send($mobile, $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'xxtongzhi', $weid, $schoolid);
                                        }
                                    }
                                }
                                if(!empty($smsset['xxtongzhi'])){
                                    $this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $o['openid']);
                                }
                            }
                        }
                    }
                }
                if($usertaype == 'totea'){
                    $teacher = pdo_fetch("select tname,mobile,typt_user_id from ".tablename($this->table_teachers)." where id = '{$val}' ");
                    $receivers[] = array( 'receiverid' => "{$teacher['typt_user_id']}" );  //拼装receivers数组

                    $openid = pdo_fetch("select * from ".tablename($this->table_user)." where tid = '{$val}' ");
                    $title = "【{$teacher['tname']}】老师，您收到一条学校通知";
                    $HXYTITLE = "您收到一条校园通知，标题为【{$notice['title']}】";
                    $schoolname ="{$school['title']}";
                    $name  = "{$tname}老师";
                    $ttime = date('Y-m-d H:i:s', $notice['createtime']);
                    $body  = "点击本条消息查看详情 ";
                    $datas=array(
                        'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                        'first'=>array('value'=>$title,'color'=>'#1587CD'),
                        'keyword1'=>array('value'=>$schoolname,'color'=>'#1587CD'),
                        'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
                        'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                        'keyword4'=>array('value'=>$notice['title'],'color'=>'#1587CD'),
                        'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                    );
                    $data = json_encode($datas); //发送的消息模板数据
                    //message($datas);

                    $record = pdo_fetch("SELECT id FROM ".tablename($this->table_record)." where weid = :weid And schoolid = :schoolid And noticeid = :noticeid And openid = :openid And tid = :tid And userid = :userid And type = :type",array(
                        ':weid'=>$_W['uniacid'],
                        ':schoolid'=>$schoolid,
                        ':noticeid'=>$notice_id,
                        ':openid'=>$openid['openid'],
                        ':tid'=>$openid['tid'],
                        ':userid'=>$openid['id'],
                        ':type'=>3,
                    ));
                    if(empty($record['id'])){
                        if($openid['tid']){
                            $date = array(
                                'weid' =>  $_W['uniacid'],
                                'schoolid' => $schoolid,
                                'noticeid' => $notice_id,
                                'tid' => $openid['tid'],
                                'userid' => $openid['id'],
                                'openid' => $openid['openid'],
                                'type' => 3,
                                'createtime' => $notice['createtime']
                            );
                            pdo_insert($this->table_record, $date);
                            $record_id = pdo_insertid();

                            if(!empty($notice['outurl'])){
                                $url = $notice['outurl'];
                            }else{
                                $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('mnotice', array('schoolid' => $schoolid,'id' => $notice_id,'record_id' => $record_id));
                            }
                            if($typtsmsset['msgsendtype'] != 1){
                                if(isallow_sendsms($schoolid,'xxtongzhi')){
                                    if($teacher['mobile']){
                                        $content = array(
                                            'name' => $teacher['tname']."老师",
                                            'time' => $ttime,
                                        );
                                        mload()->model('sms');
                                        sms_send($teacher['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'xxtongzhi', $weid, $schoolid);
                                    }
                                }
                            }
                            if(!empty($smsset['xxtongzhi'])){
                                $this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $openid['openid']);
                            }
                        }
                    }
                }
            }
            /**开始 和校园 消息发送判断 */
            if($typtsmsset['msgsendtype'] == 1){
                $sendtyptid = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE  tname = '{$tname}' and schoolid = '{$schoolid}' ");
                $title = "您收到一条校园通知";
                $smscontent = $HXYTITLE."，请至公众号内查看详情";
                $ttime = date("Y-m-d H:i:s",time());
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$sendtyptid['typt_user_id']);
            }
            /**结束 和校园 消息发送判断 */
        }
    }
    public function sendMobileXytz($notice_id, $schoolid, $weid, $tname, $groupid,$pindex='1', $psize='20') { //校园群发通知 统一平台已处理 check
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'xxtongzhi');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['xxtongzhi'] == 1 || !empty($smsset['xxtongzhi'])) {
            /** 和校园判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
            }
            $HXYTITLE = "";
            $temprec = [];
            $receivers = []; 
            /**结束 */

            $notice = pdo_fetch("SELECT title,outurl,createtime FROM ".tablename($this->table_notice)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $notice_id, ':schoolid' => $schoolid));
            $HXYTITLE = "您收到一条校园通知，标题为【{$notice['title']}】";
            $school = pdo_fetch("SELECT title FROM ".tablename($this->table_index)." WHERE :weid = weid AND :id = id", array(':weid' => $weid, ':id' => $schoolid));
            if ($groupid == 1) { //全体师生
                $userinfo = pdo_fetchall("SELECT id,sid,tid,pard,userinfo FROM ".tablename($this->table_user)." where weid = :weid And schoolid = :schoolid LIMIT " . ($pindex - 1) * $psize . ',' . $psize,array(':weid'=>$weid, ':schoolid'=>$schoolid));
            }
            if ($groupid == 2) { //全体老师
                $userinfo = pdo_fetchall("SELECT id,tname,mobile,typt_user_id FROM ".tablename($this->table_teachers)." where weid = :weid And schoolid = :schoolid LIMIT " . ($pindex - 1) * $psize . ',' . $psize,array(':weid'=>$weid, ':schoolid'=>$schoolid));
            }
            if ($groupid == 3) { //全体学生
                $userinfo = pdo_fetchall("SELECT id,s_name,typt_user_id FROM ".tablename($this->table_students)." where weid = :weid And schoolid = :schoolid ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize,array(':weid'=>$weid, ':schoolid'=>$schoolid));
            }

            foreach ($userinfo as $key => $value) {
                $openid = "";
                if ($groupid == 2) { //全体老师
                    $openid = pdo_fetch("select * from ".tablename($this->table_user)." where tid = '{$value['id']}' ");
                    $temprec[] = $value['typt_user_id']; //拼装临时rec
                    $title = "【{$value['tname']}】老师，您收到一条学校通知";
                   
                    $schoolname ="{$school['title']}";
                    $name  = "{$tname}老师";
                    $ttime = date('Y-m-d H:i:s', $notice['createtime']);
                    $body  = "点击本条消息查看详情 ";
                    $datas=array(
                        'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                        'first'=>array('value'=>$title,'color'=>'#1587CD'),
                        'keyword1'=>array('value'=>$schoolname,'color'=>'#1587CD'),
                        'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
                        'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                        'keyword4'=>array('value'=>$notice['title'],'color'=>'#1587CD'),
                        'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                    );
                    $data = json_encode($datas); //发送的消息模板数据
                    //message($datas);

                    $record = pdo_fetch("SELECT id FROM ".tablename($this->table_record)." where weid = :weid And schoolid = :schoolid And noticeid = :noticeid And openid = :openid And tid = :tid And userid = :userid And type = :type",array(
                        ':weid'=>$_W['uniacid'],
                        ':schoolid'=>$schoolid,
                        ':noticeid'=>$notice_id,
                        ':openid'=>$openid['openid'],
                        ':tid'=>$openid['tid'],
                        ':userid'=>$openid['id'],
                        ':type'=>3,
                    ));
                    if(empty($record['id'])){
                        if($openid['tid']){
                            $date = array(
                                'weid' =>  $_W['uniacid'],
                                'schoolid' => $schoolid,
                                'noticeid' => $notice_id,
                                'tid' => $openid['tid'],
                                'userid' => $openid['id'],
                                'openid' => $openid['openid'],
                                'type' => 3,
                                'createtime' => $notice['createtime']
                            );
                            pdo_insert($this->table_record, $date);
                            $record_id = pdo_insertid();

                            if(!empty($notice['outurl'])){
                                $url = $notice['outurl'];
                            }else{
                                $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('mnotice', array('schoolid' => $schoolid,'id' => $notice_id,'record_id' => $record_id));
                            }
                            if($typtsmsset['msgsendtype'] != 1){
                                if(isallow_sendsms($schoolid,'xxtongzhi')){
                                    if($value['mobile']){
                                        $content = array(
                                            'name' => $value['tname']."老师",
                                            'time' => $ttime,
                                        );
                                        mload()->model('sms');
                                        sms_send($value['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'xxtongzhi', $weid, $schoolid);
                                    }
                                }
                            }

                            if(!empty($smsset['xxtongzhi'])){
                                $this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $openid['openid']);
                            }
                        }
                    }
                }else{
                    if ($groupid == 1) { //全体师生
                        $openid = pdo_fetch("select * from ".tablename($this->table_user)." where id = '{$value['id']}' ");
                        if(!empty($value['pard'])){
                            $student = pdo_fetch("SELECT s_name,typt_user_id FROM ".tablename($this->table_students)." where id = :id",array(':id'=>$value['sid']));
                            if(!in_array($student['typt_user_id'], $temprec)){
                                $temprec[] = $student['typt_user_id']; //拼装临时rec
                            }

                            $ttime = date('Y-m-d H:i:s', $notice['createtime']);
                            if($value['pard'] == 2){
                                $guanxi = "妈妈";
                            }else if($value['pard'] == 3){
                                $guanxi = "爸爸";
                            }else if($value['pard'] == 4){
                                $guanxi = "";
                            }else if($value['pard'] == 5){
                                $guanxi = "家长";
                            }
                            $mobile = $openid['mobile'];
                            $ttimes = date('m月d日 H:i', TIMESTAMP);
                            $content = array(
                                'name' => "(".$student['s_name'].")".$guanxi,
                                'time' => $ttimes,
                            );
                            $title = "【{$student['s_name']}】{$guanxi}，您收到一条学校通知";
                            $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('snotice', array('schoolid' => $schoolid,'record_id' => $record_id,'id' => $notice_id,'userid' => $value['id']));
                        }else{
                            $teacher = pdo_fetch("SELECT tname,mobile,typt_user_id FROM ".tablename($this->table_teachers)." where id = :id",array(':id'=>$value['tid']));
                            if(!in_array($teacher['typt_user_id'], $temprec)){
                                $temprec[] = $teacher['typt_user_id']; //拼装临时rec
                            }
                            $title = "【{$teacher['tname']}】老师，您收到一条学校通知";
                            $ttime = date('Y-m-d H:i:s', $notice['createtime']);
                            $mobile = $teacher['mobile'];
                            $content = array(
                                'name' => $teacher['tname'],
                                'time' => $ttime,
                            );
                            $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('mnotice', array('schoolid' => $schoolid,'id' => $notice_id,'record_id' => $record_id));
                        }
                        $schoolname ="{$school['title']}";
                        $name  = "{$tname}老师";
                        $body  = "点击本条消息查看详情 ";
                        $datas=array(
                            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                            'first'=>array('value'=>$title,'color'=>'#1587CD'),
                            'keyword1'=>array('value'=>$schoolname,'color'=>'#1587CD'),
                            'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
                            'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                            'keyword4'=>array('value'=>$notice['title'],'color'=>'#1587CD'),
                            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                        );
                        $data = json_encode($datas); //发送的消息模板数据
                        if(!empty($value['pard'])){ //判断身份 然后检测是否发送本消息
                            $record = pdo_fetch("SELECT id FROM ".tablename($this->table_record)." where weid = :weid And schoolid = :schoolid And noticeid = :noticeid And openid = :openid And sid = :sid And userid = :userid And type = :type",array(
                                ':weid'=>$_W['uniacid'],
                                ':schoolid'=>$schoolid,
                                ':noticeid'=>$notice_id,
                                ':openid'=>$openid['openid'],
                                ':sid'=>$openid['sid'],
                                ':userid'=>$openid['id'],
                                ':type'=>3
                            ));
                            if(empty($record['id'])){
                                if($openid['sid']){
                                    $date = array(
                                        'weid' =>  $_W['uniacid'],
                                        'schoolid' => $schoolid,
                                        'noticeid' => $notice_id,
                                        'sid' => $openid['sid'],
                                        'userid' => $openid['id'],
                                        'openid' => $openid['openid'],
                                        'type' => 3,
                                        'createtime' => $notice['createtime']
                                    );
                                    pdo_insert($this->table_record, $date);
                                    $record_id = pdo_insertid();
                                    if(!empty($notice['outurl'])){
                                        $url = $notice['outurl'];
                                    }
                                    if($typtsmsset['msgsendtype'] != 1){
                                        if(isallow_sendsms($schoolid,'xxtongzhi')){
                                            if($mobile){
                                                mload()->model('sms');
                                                sms_send($mobile, $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'xxtongzhi', $weid, $schoolid);
                                            }
                                        }
                                    }
                                    if(!empty($smsset['xxtongzhi'])){
                                        $this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $openid['openid']);
                                    }
                                }
                            }
                        }else{
                            $record = pdo_fetch("SELECT id FROM ".tablename($this->table_record)." where weid = :weid And schoolid = :schoolid And noticeid = :noticeid And openid = :openid And tid = :tid And userid = :userid And type = :type",array(
                                ':weid'=>$_W['uniacid'],
                                ':schoolid'=>$schoolid,
                                ':noticeid'=>$notice_id,
                                ':openid'=>$openid['openid'],
                                ':tid'=>$openid['tid'],
                                ':userid'=>$openid['id'],
                                ':type'=>3,
                            ));
                            if(empty($record['id'])){
                                if($openid['tid']){
                                    $date = array(
                                        'weid' =>  $_W['uniacid'],
                                        'schoolid' => $schoolid,
                                        'noticeid' => $notice_id,
                                        'tid' => $openid['tid'],
                                        'userid' => $openid['id'],
                                        'openid' => $openid['openid'],
                                        'type' => 3,
                                        'createtime' => $notice['createtime']
                                    );
                                    pdo_insert($this->table_record, $date);
                                    $record_id = pdo_insertid();
                                    if(!empty($notice['outurl'])){
                                        $url = $notice['outurl'];
                                    }
                                    if(isallow_sendsms($schoolid,'xxtongzhi')){
                                        if($mobile){
                                            mload()->model('sms');
                                            sms_send($mobile, $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'xxtongzhi', $weid, $schoolid);
                                        }
                                    }
                                    if(!empty($smsset['xxtongzhi'])){
                                        $this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $openid['openid']);
                                    }
                                }
                            }
                        }
                    }
                    if ($groupid == 3) { //全体学生
                        $temprec[] = $value['typt_user_id']; //拼装临时rec
                        $openid = pdo_fetchall("select id,sid,tid,pard,mobile,openid from ".tablename($this->table_user)." where sid = '{$value['id']}' ");
                        foreach($openid as $o) {
                            if($o['pard'] == 2){
                                $guanxi = "妈妈";
                            }else if($o['pard'] == 3){
                                $guanxi = "爸爸";
                            }else if($o['pard'] == 4){
                                $guanxi = "";
                            }else if($o['pard'] == 5){
                                $guanxi = "家长";
                            }
                            $ttime = date('Y-m-d H:i:s', $notice['createtime']);
                            $content = array(
                                'name' => "(".$value['s_name'].")".$guanxi,
                                'time' => $ttime,
                            );
                            $title = "【{$value['s_name']}】{$guanxi}，您收到一条学校通知";
                            $schoolname ="{$school['title']}";
                            $name  = "{$tname}老师";
                            $body  = "点击本条消息查看详情 ";
                            $datas=array(
                                'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                                'first'=>array('value'=>$title,'color'=>'#1587CD'),
                                'keyword1'=>array('value'=>$schoolname,'color'=>'#1587CD'),
                                'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
                                'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                                'keyword4'=>array('value'=>$notice['title'],'color'=>'#1587CD'),
                                'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                            );
                            $data = json_encode($datas); //发送的消息模板数据
                            $record = pdo_fetch("SELECT * FROM ".tablename($this->table_record)." where weid = :weid And schoolid = :schoolid And noticeid = :noticeid And openid = :openid And sid = :sid And userid = :userid And type = :type",array(
                                ':weid'=>$_W['uniacid'],
                                ':schoolid'=>$schoolid,
                                ':noticeid'=>$notice_id,
                                ':openid'=>$o['openid'],
                                ':sid'=>$o['sid'],
                                ':userid'=>$o['id'],
                                ':type'=>3
                            ));
                            if(empty($record['id'])){
                                if($o['sid']){
                                    $date = array(
                                        'weid' =>  $_W['uniacid'],
                                        'schoolid' => $schoolid,
                                        'noticeid' => $notice_id,
                                        'sid' => $o['sid'],
                                        'userid' => $o['id'],
                                        'openid' => $o['openid'],
                                        'type' => 3,
                                        'createtime' => $notice['createtime']
                                    );
                                    pdo_insert($this->table_record, $date);
                                    $record_id = pdo_insertid();
                                    if(!empty($notice['outurl'])){
                                        $url = $notice['outurl'];
                                    }else{
                                        $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('snotice', array('schoolid' => $schoolid,'record_id' => $record_id,'id' => $notice_id,'userid' => $o['id']));
                                    }
                                    if($typtsmsset['msgsendtype'] != 1){
                                        if(isallow_sendsms($schoolid,'xxtongzhi')){
                                            $mobile = $o['mobile'];
                                            if($mobile){
                                                mload()->model('sms');
                                                sms_send($mobile, $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'xxtongzhi', $weid, $schoolid);
                                            }
                                        }
                                    }

                                    if(!empty($smsset['xxtongzhi'])){
                                        $this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $o['openid']);
                                    }
                                }
                            }
                        }
                    }
                }
            }
            /**开始 和校园 消息发送判断 */
            if($typtsmsset['msgsendtype'] == 1){
                $sendtyptid = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE   tname = '{$tname}' and schoolid = '{$schoolid}'  ");
                $title = "您收到一条校园通知";
                foreach($temprec as $kt => $vt){
                    $receivers[] = array( 'receiverid' => "{$vt}" );  //拼装receivers数组
                }
                $smscontent = $HXYTITLE."，请至公众号内查看详情";
                $ttime = date("Y-m-d H:i:s",time());
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$sendtyptid['typt_user_id']);
            }
            /**结束 和校园 消息发送判断 */

        }
    }

    public function sendMobileFxtz($schoolid, $weid, $tname, $bj_id) { //放学群发通知
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'bjtz');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['bjtz'] == 1 || !empty($smsset['bjtz'])) {
            $bname = pdo_fetch("SELECT * FROM ".tablename($this->table_classify)." WHERE :weid = weid AND :schoolid =schoolid And :sid = sid", array(':weid' => $weid, ':schoolid' => $schoolid, ':sid' => $bj_id));
            $pindex = max(1, intval($_GPC['page']));
            $psize = 20;

            $userinfo = pdo_fetchall("SELECT * FROM ".tablename($this->table_students)." where weid = :weid And schoolid = :schoolid And bj_id = :bj_id",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':bj_id'=>$bj_id));

            foreach ($userinfo as $key => $value) {

                $openidall = pdo_fetchall("select openid,mobile,pard from ".tablename($this->table_user)." where sid = '{$value['id']}' ");
                $s_name = $value['s_name'];
                $name  = "班主任-{$tname}";
                $title = "{$s_name}家长，您收到一条学生放学通知";
                $bjname  = "{$bname['sname']}";
                $ttime = date('Y-m-d H:i:s', time());
                $notice  = "本班已经放学，请家长留意学生放学后动态，确认是否安全回家";
                $body  = "";
                $datas=array(
                    'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                    'first'=>array('value'=>$title,'color'=>'#FF9E05'),
                    'keyword1'=>array('value'=>$bjname,'color'=>'#1587CD'),
                    'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
                    'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                    'keyword4'=>array('value'=>$notice,'color'=>'#1587CD'),
                    'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                );
                $data = json_encode($datas); //发送的消息模板数据
                $url = "";
                $num = count($openidall);
                $ttimes = date('m月d日 H:i', time());
                $content = array(
                    'name' => "(".$s_name.")"."家长",
                    'time' => $ttimes,
                    'type' => "放学通知",
                );
                if ($num > 1){
                    foreach ($openidall as $key => $values) {
                        if($values['pard'] != 4){ //不发送给学生本人
                            if(isallow_sendsms($schoolid,'bjtz')){
                                $mobile = $values['mobile'];
                                if($mobile){
                                    mload()->model('sms');
                                    sms_send($mobile, $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'bjtz', $weid, $schoolid);
                                }
                            }
                            if(!empty($smsset['bjtz'])){
                                $openid = $values['openid'];
                                $this->sendtempmsg($smsset['bjtz'], $url, $data, '#FF0000', $openid);
                            }
                        }
                    }
                }else{
                    if(isallow_sendsms($schoolid,'bjtz')){
                        $mobile = $openidall['0']['mobile'];
                        if($mobile){
                            mload()->model('sms');
                            sms_send($mobile, $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'bjtz', $weid, $schoolid);
                        }
                    }
                    if(!empty($smsset['bjtz'])){
                        $openid = $openidall['0']['openid'];
                        $this->sendtempmsg($smsset['bjtz'], $url, $data, '#FF0000', $openid);
                    }
                }
            }
        }
    }

    public function sendMobileFxsc($weid, $schoolid, $tname, $sid, $scid, $setid) {
        global $_GPC,$_W;
        $school = pdo_fetch("SELECT shoucename FROM ".tablename($this->table_index)." WHERE :id = id", array(':id' => $schoolid));
        $smsset = get_weidset($weid,'bjtz');
        if(!empty($smsset['bjtz'])) {
            $student = pdo_fetch("SELECT bj_id,s_name FROM ".tablename($this->table_students)." WHERE :id = id", array(':id' => $sid));
            $bname = pdo_fetch("SELECT sname FROM ".tablename($this->table_classify)." WHERE :sid = sid", array(':sid' => $student['bj_id']));
            $userinfo = pdo_fetchall("SELECT id,openid,pard FROM ".tablename($this->table_user)." where weid = :weid And schoolid = :schoolid And sid = :sid",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':sid'=>$sid));
            foreach ($userinfo as $key => $value) {
                $name  = "老师-{$tname}";
                if($value['pard'] == 2){
                    $pard ="妈妈";
                }
                if($value['pard'] == 3){
                    $pard ="爸爸";
                }
                if($value['pard'] == 4){
                    $pard ="";
                }
                if($value['pard'] == 5){
                    $pard ="家长";
                }
                $title = "{$student['s_name']}{$pard}，您收到一条学生{$school['shoucename']}消息";
                $bjname  = "{$bname['sname']}";
                $ttime = date('Y-m-d H:i:s', TIMESTAMP);
                $notice  = "点击本条消息可快速查看";
                $body  = "";
                $datas = array(
                    'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                    'first'=>array('value'=>$title,'color'=>'#FF9E05'),
                    'keyword1'=>array('value'=>$bjname,'color'=>'#1587CD'),
                    'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
                    'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                    'keyword4'=>array('value'=>$notice,'color'=>'#1587CD'),
                    'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                );
                $data = json_encode($datas); //发送的消息模板数据
                $url = $_W['siteroot'] .'app/'.$this->createMobileUrl('scforxs', array('schoolid' => $schoolid,'scid' => $scid,'userid' => $value['id'],'setid' => $setid,'op' => 'check','type' => 'school'));
       
                $this->sendtempmsg($smsset['bjtz'], $url, $data, '#FF0000', $value['openid']);
            }
        }
    }

    public function sendMobileXsqj($leave_id, $schoolid, $weid, $tid) { //学生请假通知 发送给老师 统一平台已处理 check
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'xsqingjia');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['xsqingjia'] == 1 || !empty($smsset['xsqingjia'])) {
            $leave = pdo_fetch("SELECT * FROM ".tablename($this->table_leave)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $leave_id, ':schoolid' => $schoolid));
            $student = pdo_fetch("SELECT muid,duid,otheruid,s_name,bj_id,typt_user_id FROM " . tablename($this->table_students) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $leave['sid']));
            $teacher = pdo_fetch("SELECT tname,openid,mobile,typt_user_id FROM " . tablename($this->table_teachers) . " where id = :id", array(':id' => $tid));
            $guanxi = "本人";
            if($student['muid'] == $leave['uid']){
                $guanxi = "妈妈";
            }else if($student['duid'] == $leave['uid']) {
                $guanxi = "爸爸";
            }else if($student['otheruid'] == $leave['uid']) {
                $guanxi = "家长";
            }
            $shenfen = "{$student['s_name']}{$guanxi}";
            $stime = date('m月d日 H:i',$leave['startime1']);
            $etime = date('m月d日 H:i',$leave['endtime1']);
            $ttime = date('Y-m-d H:i:s', $leave['createtime']);
            $time  = "{$stime}至{$etime}";
            $body = '';
            $body .= "消息时间：{$ttime} \n";
            $body .= "点击本条消息快速处理 ";
            $datas=array(
                'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                'first'=>array('value'=>'您收到了一条'.$shenfen.'的请假申请','color'=>'#1587CD'),
                'childName'=>array('value'=>$student['s_name'],'color'=>'#1587CD'),
                'time'=>array('value'=>$time,'color'=>'#2D6A90'),
                'score'=>array('value'=>$leave['conet'],'color'=>'#1587CD'),
                'remark'=> array('value'=>$body,'color'=>'#FF9E05')
            );
            $data=json_encode($datas); //发送的消息模板数据
            $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('smssage', array('schoolid' => $schoolid,'bj_id' => $student['bj_id']));

            /**开始 和校园 消息发送判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
            }
            if($typtsmsset['msgsendtype'] == 1){
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
                $receivers = []; 
                $receivers[] = array( 'receiverid' => "{$teacher['typt_user_id']}" ); 
                $smscontent = '您收到了一条'.$shenfen.'的请假申请'."，请至公众号内查看详情";
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$student['typt_user_id']);
            }else{
                if(isallow_sendsms($schoolid,'xsqingjia')){
                    if($teacher['mobile']){
                        $ttimes = date('m月d日 H:i', TIMESTAMP);
                        $content = array(
                            'name' => $student['s_name'].$guanxi,
                            'time' => $ttimes,
                        );
                        mload()->model('sms');
                        sms_send($teacher['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'xsqingjia', $weid, $schoolid);
                    }
                }
            }
            /**结束 和校园 消息发送判断 */


            if (!empty($smsset['xsqingjia'])) {
                $this->sendtempmsg($smsset['xsqingjia'], $url, $data, '#FF0000', $teacher['openid']);
            }
        }
    }

    public function sendMobileXsqjsh($leaveid, $schoolid, $weid, $tname) { //学生请假审核结果 发送给学生 统一平台已处理 check
        global $_W;
        $smsset = get_weidset($weid,'xsqjsh');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['xsqjsh'] == 1 || !empty($smsset['xsqjsh'])) {
            $leave = pdo_fetch("SELECT * FROM ".tablename($this->table_leave)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $leaveid, ':schoolid' => $schoolid));
            $student = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $leave['sid']));
            $jieguo = "";
            if($leave['status'] ==1){
                $jieguo = "同意";
            }else{
                $jieguo = "不同意";
            }
            $stime = date('m月d日 H:i',$leave['startime1']);
            $etime = date('m月d日 H:i',$leave['endtime1']);
            $time = "{$stime}至{$etime}";
            $ctime = date('Y-m-d H:i:s', $leave['cltime']);
            $body = '';
            $body .= "处理时间：{$ctime} \n";
            $body .= "{$leave['reconet']}";
            $datas=array(
                'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                'first'=>array('value'=>'您好，'.$tname.'老师已经回复了您的请假申请','color'=>'#1587CD'),
                'keyword1'=>array('value'=>$student['s_name'],'color'=>'#1587CD'),
                'keyword2'=>array('value'=>$time,'color'=>'#2D6A90'),
                'keyword3'=>array('value'=>$jieguo,'color'=>'#1587CD'),
                'keyword4'=>array('value'=>$tname,'color'=>'#1587CD'),
                'remark'=> array('value'=>$body,'color'=>'#FF9E05')
            );
            $data=json_encode($datas); //发送的消息模板数据
            $touser = pdo_fetch("SELECT id,mobile FROM " . tablename($this->table_user) . " where schoolid = :schoolid AND sid = :sid AND uid = :uid AND openid = :openid", array(':schoolid' => $schoolid, ':sid' => $leave['sid'], ':uid' => $leave['uid'], ':openid' => $leave['openid']));
            $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('leavelist', array('schoolid' => $schoolid,'userid' => $touser['id']));


            /**开始 和校园 消息发送判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
            }
            if($typtsmsset['msgsendtype'] == 1){
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
                $sendtyptid = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE tname = '{$tname}' and schoolid = '{$schoolid}' ");
                $receivers = []; 
                $receivers[] = array( 'receiverid' => "{$student['typt_user_id']}" ); 
                $smscontent = '您好，'.$tname.'老师已经回复了您的请假申请'."，请至公众号内查看详情";
                $ttime = date("Y-m-d H:i:s",time());
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$sendtyptid['typt_user_id']);
            }else{
                if(isallow_sendsms($schoolid,'xsqjsh')){
                    $mobile = $touser['mobile'];
                    if($mobile){
                        $content = array(
                            'name' => $student['s_name'].$guanxi,
                            'type' => $jieguo,
                        );
                        mload()->model('sms');
                        sms_send($mobile, $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'xsqjsh', $weid, $schoolid);
                    }
                }
            }
            /**结束 和校园 消息发送判断 */

            if (!empty($smsset['xsqjsh'])) {
                $this->sendtempmsg($smsset['xsqjsh'], $url, $data, '#FF0000', $leave['openid']);
            }
        }
    }
    public function sendMobileYzxx($mailid, $schoolid, $weid) { //校长信箱 统一平台已处理 check
        global $_W;
        $smsset = get_weidset($weid, 'liuyan');
        $mail = pdo_fetch("SELECT * FROM " . tablename($this->table_courseorder) . " WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $mailid, ':schoolid' => $schoolid));
        $stu = pdo_fetch("SELECT sid,pard FROM " . tablename($this->table_user) . " WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $mail['fromuserid'], ':schoolid' => $schoolid));
        $students = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $stu['sid']));
        $teacher = pdo_fetch("SELECT tname,openid,typt_user_id FROM " . tablename($this->table_teachers) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $mail['totid']));//查询master
        $guanxi = "本人";
        if ($stu['pard'] == 2) {
            $guanxi = "妈妈";
        } else if ($stu['pard'] == 3) {
            $guanxi = "爸爸";
        } else if ($stu['pard'] == 5) {
            $guanxi = "家长";
        }
        $time = date('Y-m-d H:i:s', $mail['createtime']);
        $data1 = "{$students['s_name']}{$guanxi}";
        $body = '';
        $body .= "点击本条消息查看详情 ";
        $datas = array(
            'name' => array('value' => $_W['account']['name'], 'color' => '#173177'),
            'first' => array('value' => '您好，' . $teacher['tname'] . '校长,您收到了一条校长信箱通知！', 'color' => '#1587CD'),
            'keyword1' => array('value' => $data1, 'color' => '#1587CD'),
            'keyword2' => array('value' => $time, 'color' => '#2D6A90'),
			'keyword3' => array('value' => $mail['beizhu'], 'color' => '#2D6A90'),
            'remark' => array('value' => $body, 'color' => '#FF9E05')
        );
        $data = json_encode($datas); //发送的消息模板数据
        $url = $_W['siteroot'] . 'app/' . $this->createMobileUrl('tyzxx', array('schoolid' => $schoolid, 'id' => $mailid, 'leaveid' => $mailid['id']));

        /**开始 和校园 消息发送判断 */
        if(keep_hxy()){
            mload()->model('hxy');
            $typtsmsset = CheckTyptSMSSet($schoolid);
        }
        if($typtsmsset['msgsendtype'] == 1){
            $filename = MODULE_ROOT . '/model/typt.config.php';
            require $filename;
            $receivers = []; 
            $receivers[] = array( 'receiverid' => "{$teacher['typt_user_id']}" ); 
            $smscontent = '您好，' . $teacher['tname'] . '校长,您收到了一条校长信箱通知'."，请至公众号内查看详情";
            $ttime = date("Y-m-d H:i:s",time());
            $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$students['typt_user_id']);
        } 
        /**结束 和校园 消息发送判断 */
        if (!empty($smsset['liuyan'])) {
            $this->sendtempmsg($smsset['liuyan'], $url, $data, '#FF0000', $teacher['openid']);
        }
    }

    public function sendMobileYzxxhf($mailid, $schoolid, $weid) { // 校长信箱回复 统一平台已处理 check
        global $_W;
        $smsset = get_weidset($weid,'liuyan');
        $mail= pdo_fetch("SELECT * FROM ".tablename($this->table_courseorder)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $mailid, ':schoolid' => $schoolid));
        $stu= pdo_fetch("SELECT sid,pard,openid FROM ".tablename($this->table_user)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $mail['fromuserid'], ':schoolid' => $schoolid));
        $students = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $stu['sid']));
        $teacher = pdo_fetch("SELECT tname,openid,typt_user_id FROM " . tablename($this->table_teachers) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $mail['totid']));//查询master
        $guanxi = "本人";
        if($stu['pard'] == 2){
            $guanxi = "妈妈";
        }else if($stu['pard'] ==3) {
            $guanxi = "爸爸";
        }else if($stu['pard'] == 5) {
            $guanxi = "家长";
        }
        $time = date('Y-m-d H:i:s', $mail['createtime']);
        $data1 = "{$teacher['tname']}校长";
        $body = '';
        $body .= "mail摘要：{$mail['huifu']} \n";
        $body .= "点击本条消息查看详情 ";
        $temp = "{$students['s_name']}{$guanxi}";
        $datas=array(
            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
            'first'=>array('value'=>"您好，{$temp}，您收到了一条校长信箱回复！",'color'=>'#1587CD'),
            'keyword1'=>array('value'=>$data1,'color'=>'#1587CD'),
            'keyword2'=>array('value'=>$time,'color'=>'#2D6A90'),
			'keyword3' => array('value' => $mail['beizhu'], 'color' => '#2D6A90'),
            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
        );
        $data=json_encode($datas); //发送的消息模板数据

        /**开始 和校园 消息发送判断 */
        if(keep_hxy()){
            mload()->model('hxy');
            $typtsmsset = CheckTyptSMSSet($schoolid);
        }
        if($typtsmsset['msgsendtype'] == 1){
            $filename = MODULE_ROOT . '/model/typt.config.php';
            require $filename;
            $receivers = []; 
            $receivers[] = array( 'receiverid' => "{$students['typt_user_id']}" ); 
            $smscontent = '您好，{$temp}，您收到了一条校长信箱回复'."，请至公众号内查看详情";
            $ttime = date("Y-m-d H:i:s",time());
            $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$teacher['typt_user_id']);
        } 
        /**结束 和校园 消息发送判断 */

        $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('syzxx', array('schoolid' => $schoolid,'id' => $leave_id,'leaveid' => $leave['leaveid']));
        if (!empty($smsset['liuyan'])) {
            $this->sendtempmsg($smsset['liuyan'], $url, $data, '#FF0000', $stu['openid']);
        }
    }
    public function sendMobileJzly($leave_id, $schoolid, $weid, $uid, $bj_id, $sid, $tid) { //家长或学生留言 发送给老师 统一平台已处理 check
        global $_W;
        $smsset = get_weidset($weid,'liuyan');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['liuyan'] == 1 || !empty($smsset['liuyan'])) {
            $leave = pdo_fetch("SELECT * FROM ".tablename($this->table_leave)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $leave_id, ':schoolid' => $schoolid));
            $students = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $sid));
            $msgs = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " where weid = :weid AND schoolid=:schoolid AND status=:status", array(':weid' => $weid, ':schoolid' => $schoolid, ':status' => 2));
            $teacher = pdo_fetch("SELECT mobile,tname,openid,typt_user_id FROM " . tablename($this->table_teachers) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $tid));//查询master
            $guanxi = "本人";
            if($students['muid'] == $uid){
                $guanxi = "妈妈";
            }else if($students['duid'] == $uid) {
                $guanxi = "爸爸";
            }else if($students['otheruid'] == $uid) {
                $guanxi = "家长";
            }
            $time = date('Y-m-d H:i:s', $leave['createtime']);
            $data1 = "{$students['s_name']}{$guanxi}";
            $body = '';
            $body .= "点击本条消息快速回复 ";
            $datas=array(
                'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                'first'=>array('value'=>'您好，'.$teacher['tname'].'老师,您收到了一条留言信息！','color'=>'#1587CD'),
                'keyword1'=>array('value'=>$data1,'color'=>'#1587CD'),
                'keyword2'=>array('value'=>$time,'color'=>'#2D6A90'),
				'keyword3' => array('value' => $leave['conet'], 'color' => '#2D6A90'),
                'remark'=> array('value'=>$body,'color'=>'#FF9E05')
            );
            $data=json_encode($datas); //发送的消息模板数据
            $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('tjiaoliu', array('schoolid' => $schoolid,'id' => $leave_id,'leaveid' => $leave['leaveid']));


            /**开始 和校园 消息发送判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
            }
            if($typtsmsset['msgsendtype'] == 1){
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
                $receivers = []; 
                $receivers[] = array( 'receiverid' => "{$teacher['typt_user_id']}" ); 
                $smscontent = '您好，'.$teacher['tname'].'老师,您收到了一条留言信息'."，请至公众号内查看详情";
                $ttime = date("Y-m-d H:i:s",time());
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$students['typt_user_id']);
            }else{
                if(isallow_sendsms($schoolid,'liuyan')){
                    if($teacher['mobile']){
                        $ttimes = date('m月d日 H:i', TIMESTAMP);
                        $content = array(
                            'name' => $students['s_name'].$guanxi,
                            'time' => $ttimes,
                        );
                        mload()->model('sms');
                        sms_send($teacher['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'liuyan', $weid, $schoolid);
                    }
                }
            }
            /**结束 和校园 消息发送判断 */



            if (!empty($smsset['liuyan'])) {
                $this->sendtempmsg($smsset['liuyan'], $url, $data, '#FF0000', $teacher['openid']);
            }
        }
    }

    public function sendMobileJzlyhf($leave_id, $schoolid, $weid, $topenid, $sid, $tname, $uid) { //班主任回复家长留言 发送给家长或学生 统一平台已处理 check
        global $_W;
        $smsset = get_weidset($weid,'liuyanhf');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['liuyanhf'] == 1 || !empty($smsset['liuyanhf'])) {
            $leave = pdo_fetch("SELECT conet,createtime,userid FROM ".tablename($this->table_leave)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $leave_id, ':schoolid' => $schoolid));
            $students = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $sid));
            $msgs = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " where weid = :weid AND schoolid=:schoolid AND status=:status", array(':weid' => $weid, ':schoolid' => $schoolid, ':status' => 2));
            $guanxi = "";
            if($students['muid'] == $uid){
                $guanxi = "妈妈";
            }else if($students['duid'] == $uid) {
                $guanxi = "爸爸";
            }else if($students['otheruid'] == $uid) {
                $guanxi = "家长";
            }
            $time = date('Y-m-d H:i:s', $leave['createtime']);
            $data1 = "{$students['s_name']}{$guanxi},您收到了一条老师的留言回复信息！";
            $body = "点击本条消息快速回复 ";
            $datas=array(
                'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                'first'=>array('value'=>$data1,'color'=>'#1587CD'),
                'keyword1'=>array('value'=>$tname,'color'=>'#1587CD'),
                'keyword2'=>array('value'=>$time,'color'=>'#2D6A90'),
                'keyword3'=>array('value'=>$leave['conet'],'color'=>'#2D6A90'),
                'remark'=> array('value'=>$body,'color'=>'#FF9E05')
            );
            $data=json_encode($datas); //发送的消息模板数据
            $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('jiaoliu', array('schoolid' => $schoolid));



            /**开始 和校园 消息发送判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
            }
            if($typtsmsset['msgsendtype'] == 1){
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;

                $sendtyptid = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE tname = '{$tname}' and schoolid = '{$schoolid}' ");
                $receivers = []; 
                $receivers[] = array( 'receiverid' => "{$students['typt_user_id']}" ); 
                $smscontent = "{$students['s_name']}{$guanxi},您收到了一条留言回复信息"."，请至公众号内查看详情";
                $ttime = date("Y-m-d H:i:s",time());
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$sendtyptid['typt_user_id']);
            }else{
                if(isallow_sendsms($schoolid,'liuyanhf')){
                    $touser = pdo_fetch("SELECT mobile FROM " . tablename($this->table_user) . " where schoolid = :schoolid AND sid = :sid AND uid = :uid AND openid = :openid", array(':schoolid' => $schoolid, ':sid' => $sid, ':uid' => $uid, ':openid' => $topenid));
                    $mobile = $touser['mobile'];
                    if($mobile){
                        $ttimes = date('m月d日 H:i', TIMESTAMP);
                        $content = array(
                            'name' => $students['s_name'].$guanxi,
                            'time' => $ttimes,
                        );
                        mload()->model('sms');
                        sms_send($mobile, $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'liuyanhf', $weid, $schoolid);
                    }
                }
            }
            /**结束 和校园 消息发送判断 */



            if (!empty($smsset['liuyanhf'])) {
                $this->sendtempmsg($smsset['liuyanhf'], $url, $data, '#FF0000', $topenid);
            }
        }
    }

    public function sendMobileLyhf($leave_id, $schoolid, $weid) { //通讯录私聊  统一平台已处理 check
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'liuyan');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['liuyan'] == 1 || !empty($smsset['liuyan'])) {
            $leave = pdo_fetch("SELECT userid,touserid,conet,createtime,leaveid FROM ".tablename($this->table_leave)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $leave_id, ':schoolid' => $schoolid));
            $user = pdo_fetch("SELECT pard,sid,tid,mobile FROM " . tablename($this->table_user) . " where weid = :weid AND id = :id", array(':weid' => $weid, ':id' => $leave['userid']));
            $touser = pdo_fetch("SELECT id,pard,sid,tid,mobile,openid FROM " . tablename($this->table_user) . " where weid = :weid AND id = :id", array(':weid' => $weid, ':id' => $leave['touserid']));
            $students1 = pdo_fetch("SELECT s_name,typt_user_id FROM " . tablename($this->table_students) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $user['sid']));
            $students2 = pdo_fetch("SELECT s_name,typt_user_id FROM " . tablename($this->table_students) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $touser['sid']));
            $teacher1 = pdo_fetch("SELECT tname,mobile,typt_user_id FROM " . tablename($this->table_teachers) . " where weid = :weid AND id = :id", array(':weid' => $weid, ':id' => $user['tid']));
            $teacher2 = pdo_fetch("SELECT tname,mobile,typt_user_id FROM " . tablename($this->table_teachers) . " where weid = :weid AND id = :id", array(':weid' => $weid, ':id' => $touser['tid']));
            mload()->model('user');
            if($user['sid']){
                $gx1 = check_gx($user['pard']);
            }
            if($touser['sid']){
                $gx2 = check_gx($touser['pard']);
            }
            $tname = empty($user['sid']) ? $teacher1['tname']: $students1['s_name']."$gx1";//发送
            $tname1 = empty($touser['sid']) ? $teacher2['tname']: $students2['s_name']."$gx2";//接收
            $time = date('Y-m-d H:i:s', $leave['createtime']);
            $data1 = "{$tname1},您收到了一条留言！";
            $body = "点击本条消息快速回复 ";
            $datas=array(
                'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                'first'=>array('value'=>$data1,'color'=>'#1587CD'),
                'keyword1'=>array('value'=>$tname,'color'=>'#1587CD'),
                'keyword2'=>array('value'=>$time,'color'=>'#2D6A90'),
				'keyword3' => array('value' => $leave['conet'], 'color' => '#2D6A90'),
                'remark'=> array('value'=>$body,'color'=>'#FF9E05')
            );
            $data=json_encode($datas); //发送的消息模板数据
            if($touser['sid']){
                $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('sduihua', array('schoolid' => $schoolid,'id' =>$leave['leaveid'],'userid' =>$touser['id']));
            }else{
                $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('tduihua', array('schoolid' => $schoolid,'id' =>$leave['leaveid'],'userid' =>$touser['id']));
            }
            /**开始 和校园 消息发送判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
            }
            if($typtsmsset['msgsendtype'] == 1){
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
                $sendid = empty($user['sid']) ? $teacher1['typt_user_id']: $students1['typt_user_id'];//发送
                $receive = empty($touser['sid']) ? $teacher2['typt_user_id']: $students2['typt_user_id'];//接收
                $receivers = []; 
                $receivers[] = array( 'receiverid' => "{$receive}" ); 
                $smscontent = "{$tname1},您收到了一条留言"."，请至公众号内查看详情";
                $ttime = date("Y-m-d H:i:s",time());
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$sendid);
            }else{
                if(isallow_sendsms($schoolid,'liuyan')){
                    $mobile = empty($touser['sid']) ? $teacher2['mobile'] : $touser['mobile'];
                    if($mobile){
                        $ttimes = date('m月d日 H:i', TIMESTAMP);
                        $content = array(
                            'name' => $tname,
                            'time' => $ttimes,
                        );
                        mload()->model('sms');
                        sms_send($mobile, $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'lyhf', $weid, $schoolid);
                    }
                }
            }
            /**结束 和校园 消息发送判断 */
            if (!empty($smsset['liuyan'])) {
                $this->sendtempmsg($smsset['liuyan'], $url, $data, '#FF0000', $touser['openid']);
            }
        }
    }

    public function sendMobileJsqj($leave_id, $schoolid, $weid, $openid) { //教师请假 发送给校长或主任 统一平台已处理 check
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'jsqingjia');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['jsqingjia'] == 1 || !empty($smsset['jsqingjia'])) {
            $leave = pdo_fetch("SELECT * FROM ".tablename($this->table_leave)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $leave_id, ':schoolid' => $schoolid));
            $teacher = pdo_fetch("SELECT tname,mobile,typt_user_id FROM " . tablename($this->table_teachers) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $leave['tid']));
            $stime = date('Y-m-d H:i', $leave['startime1']);
            $etime = date('Y-m-d H:i', $leave['endtime1']);
            $time = "{$stime}至{$etime}";
            $body = "点击本条消息快速处理 ";
            $datas=array(
                'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                'first'=>array('value'=>'您收到了一条教师请假申请','color'=>'#1587CD'),
                'keyword1'=>array('value'=>$teacher['tname'],'color'=>'#1587CD'),
                'keyword2'=>array('value'=>$leave['type'],'color'=>'#2D6A90'),
                'keyword3'=>array('value'=>$time,'color'=>'#1587CD'),
                'keyword4'=>array('value'=>$leave['conet'],'color'=>'#173177'),
                'remark'=> array('value'=>$body,'color'=>'#FF9E05')
            );
            $data=json_encode($datas); //发送的消息模板数据
            if(is_showgkk())
            {
                $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('tmssage', array('schoolid' => $schoolid,'id' => $leave_id));
            }else{
                $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('tmcomet', array('schoolid' => $schoolid,'id' => $leave_id));
            }
            /**开始 和校园 消息发送判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
            }
            if($typtsmsset['msgsendtype'] == 1){
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;

                $receivetid = pdo_fetch("SELECT tid FROM ".GetTableName('user')." WHERE openid = '{$openid}' and sid = 0 and tid != 0 and schoolid = '{$schoolid}' ");
                $receietea = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE id = '{$receivetid['tid']}' ");
                $receivers = []; 
                $receivers[] = array( 'receiverid' => "{$receietea['typt_user_id']}" ); 
                $smscontent = "您收到了一条教师请假申请"."，请至公众号内查看详情";
                $ttime = date("Y-m-d H:i:s",time());
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$teacher['typt_user_id']);
            }else{
                if(isallow_sendsms($schoolid,'jsqingjia')){
                    if($teacher['mobile']){
                        $ttimes = date('m月d日 H:i', TIMESTAMP);
                        $content = array(
                            'name' => $teacher['tname'],
                            'time' => $ttimes,
                        );
                        mload()->model('sms');
                        sms_send($teacher['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'jsqingjia', $weid, $schoolid);
                    }
                }
            }
            /**结束 和校园 消息发送判断 */



            if (!empty($smsset['jsqingjia'])) {
                $this->sendtempmsg($smsset['jsqingjia'], $url, $data, '#FF0000', $openid);
            }
        }
    }

    public function sendMobileJsqjsh($leaveid, $schoolid, $weid, $shname) { //教师审核结果 发送给请假教师 统一平台已处理 check
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'jsqjsh');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['jsqjsh'] == 1 || !empty($smsset['jsqjsh'])) {
            $leave = pdo_fetch("SELECT cltime,tid,openid,status FROM ".tablename($this->table_leave)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $leaveid, ':schoolid' => $schoolid));
            $teacher = pdo_fetch("SELECT tname,mobile FROM " . tablename($this->table_teachers) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $leave['tid']));
            $jieguo = "";
            if($leave['status'] ==1){
                $jieguo = "同意";
            }else{
                $jieguo = "不同意";
            }
            $time = date('Y-m-d H:i', $leave['cltime']);
            $body = "点击本条消息查看详情 ";
            $datas=array(
                'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                'first'=>array('value'=>'请假审批结果通知','color'=>'#1587CD'),
                'keyword1'=>array('value'=>$jieguo,'color'=>'#1587CD'),
                'keyword2'=>array('value'=>$shname,'color'=>'#2D6A90'),
                'keyword3'=>array('value'=>$time,'color'=>'#1587CD'),
                'remark'=> array('value'=>$body,'color'=>'#FF9E05')
            );
            $data=json_encode($datas); //发送的消息模板数据
            $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('leavelistforteacher', array('schoolid' => $schoolid,'id' => $leaveid));
            /**开始 和校园 消息发送判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
            }
            if($typtsmsset['msgsendtype'] == 1){
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
                $sendtyptid = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE tname = '{$shname}' and schoolid = '{$schoolid}' ");
                $receivetid = pdo_fetch("SELECT tid FROM ".GetTableName('user')." WHERE openid = '{$leave['openid']}' and sid = 0 and tid != 0 and schoolid = '{$schoolid}' ");
                $receietea = pdo_fetch("SELECT typt_user_id FROM ".GetTableName('teachers')." WHERE id = '{$receivetid['tid']}' ");
                $receivers = []; 
                $receivers[] = array( 'receiverid' => "{$receietea['typt_user_id']}" ); 
                $smscontent = "您收到了一条请假审批结果通知，请至公众号内查看详情";
                $ttime = date("Y-m-d H:i:s",time());
                $typtSend =  SendHXYsms($typt_appid,$ttime,$typtsmsset['ec_code'],$smscontent,$receivers,$sendtyptid['typt_user_id']);
            }else{
                if(isallow_sendsms($schoolid,'jsqjsh')){
                    if($teacher['mobile']){
                        $content = array(
                            'name' => $teacher['tname'],
                            'type' => $jieguo,
                        );
                        mload()->model('sms');
                        sms_send($teacher['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'jsqjsh', $weid, $schoolid);
                    }
                }
            }
            /**结束 和校园 消息发送判断 */
            if (!empty($smsset['jsqjsh'])) {
                $this->sendtempmsg($smsset['jsqjsh'], $url, $data, '#FF0000', $leave['openid']);
            }
        }
    }

    public function sendMobileJxlxtz($schoolid, $weid, $bj_id, $sid, $type, $leixing, $id, $pard) { //学生进校离校通知 统一平台已处理 check
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'jxlxtx');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['jxlxtx'] == 1 || !empty($smsset['jxlxtx'])) {
            $student = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " where id = :id ", array(':id' => $sid));
            $log = pdo_fetch("SELECT * FROM " . tablename($this->table_checklog) . " where id = :id ", array(':id' => $id));
            $bjinfo = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " where sid = :sid ", array(':sid' => $bj_id));
            /**分班播报**/
            $macs=pdo_fetchall("SELECT macid FROM " . tablename($this->table_checkmac) . " where bj_id = :bj_id  And schoolid=:schoolid And weid=:weid", array(':bj_id' => $log['bj_id'],':schoolid'=>$schoolid,':weid'=>$weid));
            $macids=array();
            if($macs){
                foreach($macs as $k => $v){
                    array_push($macids,$v['macid']);
                }
            }
            $macs1=pdo_fetchall("SELECT macid FROM " . tablename($this->table_checkmac) . " where is_master =2   And schoolid=:schoolid And weid=:weid", array(':schoolid'=>$schoolid,':weid'=>$weid));
            if($macs1){
                foreach($macs1 as $k => $v){
                    array_push($macids,$v['macid']);
                }
            }
            $jdata = array(
                "iccode"=> $log['cardid'],
                "p_school"=>$schoolid,
                "signtime "=> date('m月d日 H:i', TIMESTAMP),
                "imgurl"=> tomedia($log['pic']),
                "m_type"=>$leixing,
                " device_id "=> 1,
                'macs'=>array()
            );
            $jdata['macs'] = $macids;
            if($macs || $macs1){
                $this->pushMess($jdata);
            }
            /***分班播报**/

            $condition = ' ';
            if($log['sc_ap'] == 0){
                $sendarr = GetSendSet($schoolid,$weid,$bj_id);
                $pard_str = '';
                if(in_array('students',$sendarr) && !in_array('parents',$sendarr) ){
                    $condition = "and pard = 4";
                }
                if(in_array('parents',$sendarr) && !in_array('students',$sendarr) ){
                    $condition = "and pard != 4";
                }
            }
            //向家长或学生本人推送
            $userinfo = pdo_fetchall("SELECT id,pard,mobile FROM ".tablename($this->table_user)." where weid = :weid And schoolid = :schoolid And sid = :sid $condition",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':sid'=>$sid));
            /**开始 和校园 消息发送判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
            }
            if($typtsmsset['msgsendtype'] == 1){
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
                $typtSend = SendHXYCheckSms($typt_appid,$typtsmsset['ec_code'],$id);
            }
            /**结束 和校园 消息发送判断 */
            foreach ($userinfo as $key => $value) {
                $openid = pdo_fetch("select id,openid from ".tablename($this->table_user)." where id = '{$value['id']}' ");
                $s_name = $student['s_name'];
                include 'pard.php';
                $guanxi = "";

                if($log['sc_ap'] == 0){
                    if($leixing == 1){
                        $lx = "进校";
                        if($pard >1){
                            $body  = "您的孩子已由【{$jsr}】安全送到,点击详情查看更多";
                        }else{
                            $body  = "打卡成功,点击详情查看";
                        }
                    }else{
                        $lx = "离校";
                        if($pard >1){
                            $body  = "您的孩子已由【{$jsr}】安全接到,点击详情查看更多";
                        }else{
                            $body  = "打卡成功,点击详情查看";
                        }
                    }
                }elseif($log['sc_ap'] == 1){
                    if($leixing == 1){
                        $lx = "归寝";
                        if($pard >1){
                            $body  = "您的孩子已归寝,点击详情查看更多";
                        }else{
                            $body  = "打卡成功,点击详情查看";
                        }
                        $type = "归寝";
                    }elseif($leixing == 2){
                        $lx = "离寝";
                        if($pard >1){
                            $body  = "您的孩子已离寝,点击详情查看更多";
                        }else{
                            $body  = "打卡成功,点击详情查看";
                        }
                        $type = "离寝";
                    }else{
                        return;
                    }
                }
                if($value['pard'] == 2){
                    $guanxi = "妈妈";
                }else if($value['pard'] == 3) {
                    $guanxi = "爸爸";
                }else if($value['pard'] == 5) {
                    $guanxi = "家长";
                }
                if($openid['pard'] == 4){
                    $title = "【{$s_name}】,您收到一条学生{$lx}通知";
                }else{
                    $title = "【{$s_name}】{$guanxi},您收到一条学生{$lx}通知";
                }
                $ttime = date('Y-m-d H:i:s', $log['createtime']);
                $time = date('Y-m-d', $log['createtime']);
                $datas=array(
                    'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                    'first'=>array('value'=>$title,'color'=>'#FF9E05'),
                    'childName'=>array('value'=>$s_name,'color'=>'#1587CD'),
                    'time'=>array('value'=>$ttime,'color'=>'#2D6A90'),
                    'status'=>array('value'=>$type,'color'=>'#1587CD'),
                    'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                );
                $data = json_encode($datas); //发送的消息模板数据
                $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('checklogdetail', array('schoolid' => $schoolid,'userid' => $openid['id'],'time' => $time,'logid' => $id));
                if($_SERVER ['HTTP_HOST'] == 'wei.yesaaa.com'){
                    $url = $_W['sitescheme'].'wei.yesaaa.cn/app/index.php?i='.$weid.'&schoolid='.$schoolid.'&time='.$time.'&userid='.$openid['id'].'&logid='.$id.'&c=entry&do=checklogdetail&m=fm_jiaoyu';
                }
                if($typtsmsset['msgsendtype'] != 1){
                    if(isallow_sendsms($schoolid,'jxlxtx')){
                        if($value['mobile']){
                            $ttimes = date('m月d日 H:i', TIMESTAMP);
                            $content = array(
                                'name' => $s_name,
                                'time' => $ttimes,
                                'type' => $lx,
                            );
                            mload()->model('sms');
                            sms_send($value['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'jxlxtx', $weid, $schoolid);
                        }
                    }
                }

                if(!empty($smsset['jxlxtx'])){
                    $this->sendtempmsg($smsset['jxlxtx'], $url, $data, '#FF0000', $openid['openid']);
                }
            }

            //向班主任/授课老师推送刷卡消息
            if($log['sc_ap'] == 0) {
                $tid_arr = '';
                if (in_array('head_teacher', $sendarr)) {
                    $bzrinfo = pdo_fetch("SELECT tid FROM " . tablename($this->table_classify) . " where sid = :sid ", array(':sid' => $bj_id));
                    if (!empty($bzrinfo['tid'])) {
                        $tid_arr .= $bzrinfo['tid'] . ',';
                    }
                }
                if (in_array('rest_teacher', $sendarr)) {
                    $skteainfo = pdo_fetchall("SELECT tid FROM " . tablename($this->table_class) . " where bj_id = '{$bj_id}' and schoolid = '{$schoolid}' and weid = '{$weid}' ");
                    foreach ($skteainfo as $value) {
                        $tid_arr .= $value['tid'] . ',';
                    }
                }
                $tid_arr     = trim($tid_arr, ',');
                $teauserinfo = pdo_fetchall("SELECT id,tid FROM " . tablename($this->table_user) . " where weid = '{$weid}' And schoolid = '{$schoolid}' And FIND_IN_SET(tid,'{$tid_arr}')");
                foreach ($teauserinfo as $key => $value) {
                    $openid = pdo_fetch("select id,openid,tid from " . tablename($this->table_user) . " where id = '{$value['id']}' ");
                    $s_name = $student['s_name'];
                    $this_teainfo = pdo_fetch("select id,tname from " . tablename($this->table_teachers) . " where id = '{$value['tid']}' ");
                    if ($leixing == 1) {
                        $lx = "进校";
                    } else {
                        $lx = "离校";
                    }
                    $body = "学生{$lx}打卡成功,点击详情查看";
                    $title = "【{$this_teainfo['tname']}】老师,您收到一条{$bjinfo['sname']}学生{$lx}通知";
                    $ttime = date('Y-m-d H:i:s', $log['createtime']);
                    $time  = date('Y-m-d', $log['createtime']);
                    $datas = array(
                        'name'      => array('value' => $_W['account']['name'], 'color' => '#173177'),
                        'first'     => array('value' => $title, 'color' => '#FF9E05'),
                        'childName' => array('value' => $s_name, 'color' => '#1587CD'),
                        'time'      => array('value' => $ttime, 'color' => '#2D6A90'),
                        'status'    => array('value' => $type, 'color' => '#1587CD'),
                        'remark'    => array('value' => $body, 'color' => '#FF9E05')
                    );
                    $data  = json_encode($datas); //发送的消息模板数据
                    $url   = $_W['siteroot'] . 'app/' . $this->createMobileUrl('tchecklogdetail', array('schoolid' => $schoolid, 'userid' => $openid['id'], 'time' => $time, 'logid' => $id));
                    if ($_SERVER ['HTTP_HOST'] == 'wei.yesaaa.com') {
                        $url = $_W['sitescheme'] . 'wei.yesaaa.cn/app/index.php?i=' . $weid . '&schoolid=' . $schoolid . '&time=' . $time . '&userid=' . $openid['id'] . '&logid=' . $id . '&c=entry&do=tchecklogdetail&m=fm_jiaoyu';
                    }
                    if (isallow_sendsms($schoolid, 'jxlxtx')) {
                        if ($value['mobile']) {
                            $ttimes  = date('m月d日 H:i', TIMESTAMP);
                            $content = array(
                                'name' => $s_name,
                                'time' => $ttimes,
                                'type' => $lx,
                            );
                            mload()->model('sms');
                            sms_send($value['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'jxlxtx', $weid, $schoolid);
                        }
                    }
                    if (!empty($smsset['jxlxtx'])) {
                        $this->sendtempmsg($smsset['jxlxtx'], $url, $data, '#FF0000', $openid['openid']);
                    }
                }
            }
        }
    }

    public function sendMobileJxlxtz_yl($schoolid, $weid, $sid, $id,$macid) { //学生进校离校通知 养老院
        global $_GPC,$_W;
        $smsset  = get_weidset($weid,'jxlxtx');
        $sms_set = get_school_sms_set($schoolid);
        $schoool = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where id = :id ", array(':id' => $schoolid));
        if($macid != 'wechatSign'){
            $ckmac   = pdo_fetch("SELECT * FROM " . tablename($this->table_checkmac) . " WHERE macid = '{$macid}' And weid = '{$weid}' And schoolid = '{$schoolid}' ");
            $macName = $ckmac['name'];
        }else{
            $macName = '代签';
        }

        if($sms_set['jxlxtx'] == 1 || !empty($smsset['jxlxtx'])) {
            $student = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " where id = :id ", array(':id' => $sid));
            $log = pdo_fetch("SELECT * FROM " . tablename($this->table_checklog) . " where id = :id ", array(':id' => $id));
            $userinfo = pdo_fetchall("SELECT id,userinfo FROM ".tablename($this->table_user)." where weid = :weid And schoolid = :schoolid And sid = :sid",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':sid'=>$sid));
            foreach ($userinfo as $key => $value) {
                $openid = pdo_fetch("select id,openid from ".tablename($this->table_user)." where id = '{$value['id']}' ");
                $s_name = $student['s_name'];

                $fans_info		 = mc_fansinfo($openid['openid']);
                $member_nickname = $fans_info['nickname'];
                $check_time		 = date("H:i",time());
                $check_date		 = date("Y-m-d",time());
                if($check_time >= '04:00' && $check_time <= '06:40'){
                    $status_word = "晨练健身，寅时阳气生，卯时主生发";
                }
                if($check_time > '06:40' && $check_time <= '07:40'){
                    $status_word = "进早膳，早晨吃得像皇帝";
                }
                if($check_time > '07:40' && $check_time <= '11:00'){
                    $status_word = "上午休闲娱乐，遛弯顺便刷个卡";
                }
                if($check_time > '11:00' && $check_time <= '12:30'){
                    $status_word = "进午膳啦，午餐吃得像平民";
                }
                if($check_time > '13:30' && $check_time <= '16:30'){
                    $status_word = "下午休闲娱乐";
                }
                if($check_time > '16:30' && $check_time <= '18:00'){
                    $status_word = "进晚膳，晚膳吃得像乞丐，才能长寿哦";
                }

                if($check_time > '18:00' && $check_time <= '22:00'){
                    $status_word = "晚上散步溜";
                }


                $title = "【{$member_nickname}】\r\n您好,这是一条来自【{$schoool['title']}】的充满生命活力打卡通知。";
                $body  = "亲友【{$s_name}】在 {$check_time} 打卡，这个时间是【{$status_word}】\r\n打卡成功，点击详情查看照片哦 ";
                $ttime = date('Y-m-d H:i:s', $log['createtime']);
                $time = date('Y-m-d', $log['createtime']);
                $datas=array(
                    'name'		=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                    'first'		=>array('value'=>$title,'color'=>'#FF9E05'),
                    'keyword1'	=>array('value'=>$macName,'color'=>'#1587CD'),
                    'keyword2'	=>array('value'=>$check_date,'color'=>'#2D6A90'),
                    'keyword3'	=>array('value'=>$check_time,'color'=>'#2D6A90'),
                    'keyword4'	=>array('value'=>$s_name,'color'=>'#1587CD'),
                    'keyword5'	=>array('value'=>$schoool['title'],'color'=>'#1587CD'),
                    'remark'	=> array('value'=>$body,'color'=>'#FF9E05')
                );
                $data = json_encode($datas); //发送的消息模板数据
                $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('checklogdetail', array('schoolid' => $schoolid,'userid' => $openid['id'],'time' => $time,'logid' => $id));
                if(!empty($smsset['jxlxtx'])){
                    $this->sendtempmsg($smsset['jxlxtx'], $url, $data, '#FF0000', $openid['openid']);
                }
            }
        }
    }

    public function pushMess($pdata){
        $path = dirname(__FILE__);
        require_once( $path . '/Jpush.php');
        $pushObj = new Jpush();
        //$receive = array('alias'=>array('cba20199ba1a3068','72d7e0259122e426'));    //别名
        $receive = array('alias'=>$pdata['macs']);

        $title = 'ceshi';
        /* $content = [
            "iccode"=>1,
            "p_school"=>1,
            "signtime "=> "2018年4月3日17:54:43",
            "imgurl"=> "_1.jpg,_2.jpg",
            "m_type"=>1,
            " device_id "=> 1
        ]; */
        $content = [
            "iccode"=>$pdata['iccode'],
            "p_school"=>$pdata['p_school'],
            "signtime "=> $pdata['signtime'],
            "imgurl"=> $pdata['imgurl'],
            "m_type"=>$pdata['m_type'],
            "device_id"=> $pdata['device_id']
        ];
        $m_time = '86400';        //离线保留时间
        //$extras = array("versionname"=>"", "versioncode"=>"");   //自定义数组
        $extras='';
        //调用推送,并处理
        $result = $pushObj->push($receive,$title,$content,$extras,$m_time);
        if($result){
            $res_arr = json_decode($result, true);
            if(isset($res_arr['error'])){   //如果返回了error则证明失败
                //错误信息 错误码
                //$this->error($res_arr['error']['message'].'：'.$res_arr['error']['code'],Url('Jpush/index'));
                //$this->error($res_arr['error']['message'].'：'.$res_arr['error']['code']);
                //api_error($res_arr['error']['message'].'：'.$res_arr['error']['code']);
            }else{
                //处理成功的推送......
                //可执行一系列对应操作~
                //  api_success('推送成功~'.json_encode($res_arr));
            }
        }else{      //接口调用失败或无响应
            //  $this->error('接口调用失败或无响应~');
        }
    }

    public function sendMobileFzqdtx($schoolid, $weid, $bj_id, $sid, $type, $leixing, $id, $pard) { //教师代签到或签离提醒 发送给学生 统一平台已处理 check
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'jxlxtx');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['jxlxtx'] == 1 || !empty($smsset['jxlxtx'])) {
            $student = pdo_fetch("SELECT s_name FROM " . tablename($this->table_students) . " where id = :id ", array(':id' => $sid));
            $log = pdo_fetch("SELECT * FROM " . tablename($this->table_checklog) . " where id = :id ", array(':id' => $id));
            $openidall = pdo_fetchall("select sid,id,openid,pard,mobile from ".tablename($this->table_user)." where sid = :sid ", array(':sid' => $log['sid']));


            /**开始 和校园 消息发送判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
            }
            if($typtsmsset['msgsendtype'] == 1){
                $filename = MODULE_ROOT . '/model/typt.config.php';
                require $filename;
                $typtSend = SendHXYCheckSms($typt_appid,$typtsmsset['ec_code'],$id);
            }
            /**结束 和校园 消息发送判断 */
            $num = count($openidall);
            if ($num > 1){
                foreach ($openidall as $key => $values) {
                    if($values['sid']){
                        include 'pard.php';
                        $guanxi = "";
                        if($leixing == 1){
                            $lx = "进校";
                        }else{
                            $lx = "离校";
                        }
                        $body  = "学生已由老师代签考勤,点击详情查看更多";
                        if($values['pard'] == 2){
                            $guanxi = "妈妈";
                        }else if($values['pard'] == 3) {
                            $guanxi = "爸爸";
                        }else if($values['pard'] == 5) {
                            $guanxi = "家长";
                        }
                        if($values['pard'] == 4){
                            $title = "【{$student['s_name']}】,您收到一条学生{$lx}通知";
                        }else{
                            $title = "【{$student['s_name']}】{$guanxi},您收到一条学生{$lx}通知";
                        }
                        $ttime = date('Y-m-d H:i:s', $log['createtime']);
                        $time = date('Y-m-d', $log['createtime']);
                        $datas=array(
                            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                            'first'=>array('value'=>$title,'color'=>'#FF9E05'),
                            'childName'=>array('value'=>$student['s_name'],'color'=>'#1587CD'),
                            'time'=>array('value'=>$ttime,'color'=>'#2D6A90'),
                            'status'=>array('value'=>$type,'color'=>'#1587CD'),
                            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                        );
                        $data = json_encode($datas); //发送的消息模板数据
                        $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('calendar', array('schoolid' => $schoolid,'userid' => $values['id'],'time' => $time));
                        if($typtsmsset['msgsendtype'] != 1){
                            if(isallow_sendsms($schoolid,'jxlxtx')){
                                if($values['mobile']){
                                    $ttimes = date('m月d日 H:i', TIMESTAMP);
                                    $content = array(
                                        'name' => $student['s_name'],
                                        'time' => $ttimes,
                                        'type' => $lx,
                                    );
                                    mload()->model('sms');
                                    sms_send($values['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'jxlxtx', $weid, $schoolid);
                                }
                            }
                        }

                        if(!empty($smsset['jxlxtx'])){
                            $this->sendtempmsg($smsset['jxlxtx'], $url, $data, '#FF0000', $values['openid']);
                        }
                    }
                }
            }else{
                if($openidall['0']['sid']){
                    include 'pard.php';
                    $guanxi = "";
                    if($leixing == 1){
                        $lx = "进校";
                    }else{
                        $lx = "离校";
                    }
                    $body  = "学生已由老师代签考勤,点击详情查看更多";
                    if($openidall['0']['pard'] == 2){
                        $guanxi = "妈妈";
                    }else if($openidall['0']['pard'] == 3) {
                        $guanxi = "爸爸";
                    }else if($openidall['0']['pard'] == 5) {
                        $guanxi = "家长";
                    }
                    if($openidall['0']['pard'] == 4){
                        $title = "【{$student['s_name']}】,您收到一条学生{$lx}通知";
                    }else{
                        $title = "【{$student['s_name']}】{$guanxi},您收到一条学生{$lx}通知";
                    }
                    $ttime = date('Y-m-d H:i:s', $log['createtime']);
                    $time = date('Y-m-d', $log['createtime']);
                    $datas=array(
                        'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                        'first'=>array('value'=>$title,'color'=>'#FF9E05'),
                        'childName'=>array('value'=>$student['s_name'],'color'=>'#1587CD'),
                        'time'=>array('value'=>$ttime,'color'=>'#2D6A90'),
                        'status'=>array('value'=>$type,'color'=>'#1587CD'),
                        'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                    );
                    $data = json_encode($datas); //发送的消息模板数据
                    $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('calendar', array('schoolid' => $schoolid,'userid' => $openidall['0']['id'],'time' => $time));
                    if($typtsmsset['msgsendtype'] != 1){
                        if(isallow_sendsms($schoolid,'jxlxtx')){
                            if($openidall['0']['mobile']){
                                $ttimes = date('m月d日 H:i', TIMESTAMP);
                                $content = array(
                                    'name' => $student['s_name'],
                                    'time' => $ttimes,
                                    'type' => $lx,
                                );
                                mload()->model('sms');
                                sms_send($openidall['0']['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'jxlxtx', $weid, $schoolid);
                            }
                        }
                    }

                    if(!empty($smsset['jxlxtx'])){
                        $this->sendtempmsg($smsset['jxlxtx'], $url, $data, '#FF0000', $openidall['0']['openid']);
                    }
                }
            }
        }
    }

    public function sendMobileJfjgtz($orderid) { //缴费结果通知 统一平台已处理 check

        global $_W;
        $order = pdo_fetch("SELECT * FROM " . tablename($this->table_order) . " where id = :id ", array(':id' => $orderid));
        $weid = $order['weid'];
        $schoolid = $order['schoolid'];
        $smsset = get_weidset($weid,'jfjgtz');
        $sms_set = get_school_sms_set($schoolid);

        if($sms_set['jfjgtz'] == 1 || !empty($smsset['jfjgtz'])) {

            $student = pdo_fetch("SELECT s_name FROM " . tablename($this->table_students) . " where id = :id ", array(':id' => $order['sid']));

            /**开始 和校园 消息发送判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
                }
                if($typtsmsset['msgsendtype'] == 1){
                    $filename = MODULE_ROOT . '/model/typt.config.php';
                    require $filename;

                    $op_time = date("Y-m-d H:i:s",time());
                    $is_yue = 2;
                    if($order['pay_type'] == 'chongzhi'){
                        $is_yue = 1;
                    }
                    SendHXYPaySms($typt_appid,$op_time,$typtsmsset['ec_code'],$order['cose'],'99999999',$order['sid'],2,2,$is_yue);
                }
                /**结束 和校园 消息发送判断 */
    
            if($order['type'] == 7 ){
                $user = pdo_fetch("select * from ".tablename($this->table_user)." where id = '{$order['userid']}' ");
                $pard = $user['pard'];
                if($pard == 2){
                    $jsr  = "妈妈";
                }
                if($pard == 3){
                    $jsr  = "爸爸";
                }
                if($pard == 4){
                    $jsr  = "";
                }
                if($pard == 5){
                    $jsr  = "家长";
                }
                $s_name = $student['s_name'];
                $title = "【{$s_name}】{$jsr},您收到一条缴费结果通知";
				$nowtime = time();
                $time = date('Y-m-d H:i:s', $nowtime);
                $vod = pdo_fetch("SELECT name FROM ".tablename($this->table_allcamera)." WHERE id = '{$order['vodid']}'");
                $ob = "【{$vod['name']}】";
                if($order['status'] ==1){
                    $ty = "未支付";
                }else if ($order['status'] ==2){
                    $ty = "已支付";
                }
                $body  = "订单号【{$orderid}】,点击详情查看";
                $datas=array(
                    'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                    'first'=>array('value'=>$title,'color'=>'#FF9E05'),
                    'keyword1'=>array('value'=>$s_name,'color'=>'#1587CD'),
                    'keyword2'=>array('value'=>$time,'color'=>'#2D6A90'),
                    'keyword3'=>array('value'=>$ob,'color'=>'#1587CD'),
                    'keyword4'=> array('value'=>$ty,'color'=>'#FF9E05'),
                    'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                );
                $data = json_encode($datas); //发送的消息模板数据
                $url = $_W['siteroot'] . 'app/index.php?i=' . $weid . '&c=entry&schoolid=' . $schoolid . '&do=camera&m=fm_jiaoyu&id=' . $order['vodid'];
                if(isallow_sendsms($schoolid,'jfjgtz')){
                    if($user['mobile']){
                        $ttimes = date('m月d日 H:i', TIMESTAMP);
                        $content = array(
                            'name' => $s_name,
                            'time' => $ttimes,
                            'type' => $ty,
                        );
                        mload()->model('sms');
                        sms_send($user['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'jfjgtz', $weid, $schoolid);
                    }
                }
                if(!empty($smsset['jfjgtz'])){
                    $send = $this->sendtempmsg($smsset['jfjgtz'], $url, $data, '#FF0000', $user['openid'],$weid);
                }
            }else{

                if($order['type'] != 6 ){
                    $userinfo = pdo_fetchall("SELECT id,pard,openid,mobile FROM ".tablename($this->table_user)." where schoolid = :schoolid And sid = :sid",array(':schoolid'=>$order['schoolid'], ':sid'=>$order['sid']));
                }else{
                    $morder = pdo_fetch("SELECT tid,sid,userid FROM " . tablename($this->table_mallorder) . " where torderid = :torderid ", array(':torderid' => $orderid));
                    if($morder['tid'] == 0 && $morder['sid'] != 0 && $morder['userid'] != 0  )
                    {
                        $userinfo = pdo_fetchall("SELECT id,pard,openid,mobile,sid,tid FROM ".tablename($this->table_user)." where schoolid = :schoolid And id = :id",array(':schoolid'=>$order['schoolid'], ':id'=>$morder['userid']));
                    }elseif($morder['tid'] != 0 && $morder['sid'] == 0){
                        $userinfo = pdo_fetchall("SELECT id,pard,openid,mobile,sid,tid FROM ".tablename($this->table_user)." where schoolid = :schoolid And tid = :tid",array(':schoolid'=>$order['schoolid'], ':tid'=>$morder['tid']));
                    }

                }
                foreach ($userinfo as $key => $value) {
                    $openid = pdo_fetch("select openid from ".tablename($this->table_user)." where id = '{$value['id']}' ");
                    $s_name = $student['s_name'];
                    $pard = $value['pard'];
                    if($pard == 2){
                        $jsr  = "妈妈";
                    }
                    if($pard == 3){
                        $jsr  = "爸爸";
                    }
                    if($pard == 4){
                        $jsr  = "";
                    }
                    if($pard == 5){
                        $jsr  = "家长";
                    }
                    if($order['type'] == 6 )
                    {	$morder = pdo_fetch("SELECT tid,sid FROM " . tablename($this->table_mallorder) . " where torderid = :torderid ", array(':torderid' => $orderid));


                        if($morder['tid'] != 0 && $morder['sid'] == 0 ){
                            $teacher = pdo_fetch("SELECT tname FROM " . tablename($this->table_teachers) . " where  id = :id  ", array(':id' => $morder['tid']));
                            $s_name = $teacher['tname'];
                            $jsr = "老师";
                        }elseif($morder['tid'] == 0 && $morder['sid'] != 0 ){
                            $student = pdo_fetch("SELECT s_name FROM " . tablename($this->table_students) . " where  id = :id  ", array(':id' => $morder['sid']));
                            $s_name = $student['s_name'];

                        }
                    }
                    $title = "【{$s_name}】{$jsr},您收到一条缴费结果通知";
					$nowtime = time();
					$time = date('Y-m-d H:i:s', $nowtime);

                    if($order['type'] ==1){
                        $kc = pdo_fetch("SELECT name FROM ".tablename($this->table_tcourse)." WHERE id = '{$order['kcid']}'");//课程
                        $ob = "【{$kc['name']}】";
                    }else if ($order['type'] ==3){
                        $ct = pdo_fetch("SELECT * FROM ".tablename($this->table_cost)." WHERE id = '{$order['costid']}'");//项目
                        $ob = "【{$ct['name']}】";
                    }else if ($order['type'] ==4){
                        $ob = "【报名费】";
                    }else if ($order['type'] ==5){
                        $ob = "【考勤卡费】";
                    }else if($order['type'] == 6 ){
                        $ob = "【商城支付】";
                    }else if($order['type'] == 9 ){
                        $ob = "【充电桩充次】";
                    }else if($order['type'] == 8 ){
                        $ob = "【余额充值】";
                    }
                    if($order['status'] ==1){
                        $ty = "未支付";
                    }else if ($order['status'] ==2){
                        $ty = "已支付";
                    }
                    $body  = "订单号【{$orderid}】,点击详情查看";

                    $datas=array(
                        'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                        'first'=>array('value'=>$title,'color'=>'#FF9E05'),
                        'keyword1'=>array('value'=>$s_name,'color'=>'#1587CD'),
                        'keyword2'=>array('value'=>$time,'color'=>'#2D6A90'),
                        'keyword3'=>array('value'=>$ob,'color'=>'#1587CD'),
                        'keyword4'=> array('value'=>$ty,'color'=>'#FF9E05'),
                        'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                    );
                    $data = json_encode($datas); //发送的消息模板数据

                  
                    $url =  $_W['siteroot']."app/index.php?i=".$weid."&c=entry&schoolid=".$order['schoolid']."&userid=".$value['id']."&do=user&m=fm_jiaoyu&op=all_g";
                    if($order['type'] == 6 )
                    {
                        if($value['tid'] != 0 && $value['sid'] == 0 ){
                            $url =  $_W['siteroot']."app/index.php?i=".$weid."&c=entry&schoolid=".$order['schoolid']."&userid=".$value['id']."&do=getorder&m=fm_jiaoyu";

                        }elseif($value['tid'] == 0 && $value['sid'] != 0 ){
                            $url =  $_W['siteroot']."app/index.php?i=".$weid."&c=entry&schoolid=".$order['schoolid']."&userid=".$value['id']."&do=sgetorder&m=fm_jiaoyu&op=yes_g";
                        }

                    }
                    //return($url);

                    if(isallow_sendsms($schoolid,'jfjgtz')){
                        if($value['mobile']){
                            $ttimes = date('m月d日 H:i', TIMESTAMP);
                            $content = array(
                                'name' => $student['s_name'],
                                'time' => $ttimes,
                                'type' => $ty,
                            );
                            mload()->model('sms');
                            sms_send($value['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'jfjgtz', $weid, $schoolid);
                        }
                    }
                    if(!empty($smsset['jfjgtz'])){
                        $this->sendtempmsg($smsset['jfjgtz'], $url, $data, '#FF0000', $openid['openid'],$weid);
                    }
                }
            }
        }
        return $send;
    }

    public function sendMobileOfflinexf($sid,$cost,$macid,$paytime,$schoolid,$weid,$mac_type,$IsChongzhi = false){ //线下消费通知 统一平台已处理 check
        global $_W;
        $weid = $weid;
        $schoolid = $schoolid;
        $smsset = get_weidset($weid,'jfjgtz');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['jfjgtz'] == 1 || !empty($smsset['jfjgtz'])) {
            $student = pdo_fetch("SELECT s_name,chongzhi,chargenum,buzhu FROM " . tablename($this->table_students) . " where id = :id ", array(':id' => $sid));
            $nowtime = time();
            $school = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where weid ='{$weid}' and id='{$schoolid}' ");
            if($school['is_buzhu']){
                $student_buzhu = $student['buzhu'];
            }else{
                $student_buzhu = 0 ;

            }

            /**开始 和校园 消息发送判断 */
            if(keep_hxy()){
                mload()->model('hxy');
                $typtsmsset = CheckTyptSMSSet($schoolid);
                }
                if($typtsmsset['msgsendtype'] == 1){
                    $filename = MODULE_ROOT . '/model/typt.config.php';
                    require $filename;

                    $op_time = date("Y-m-d H:i:s",time());
                    $cost_type = 2;
                    if($IsChongzhi == true){
                        $cost_type = 1;
                    }
                    SendHXYPaySms($typt_appid,$op_time,$typtsmsset['ec_code'],$cost,$macid,$sid,1,$cost_type,1);
                }
                /**结束 和校园 消息发送判断 */


            $userinfo = pdo_fetchall("SELECT id,pard,openid,mobile FROM ".tablename($this->table_user)." where schoolid = :schoolid And sid = :sid",array(':schoolid'=>$schoolid, ':sid'=>$sid));
            foreach ($userinfo as $key => $value) {
                $openid = pdo_fetch("select openid from ".tablename($this->table_user)." where id = '{$value['id']}' ");
                $s_name = $student['s_name'];
                $pard = $value['pard'];
                if($pard == 2){
                    $jsr  = "妈妈";
                }
                if($pard == 3){
                    $jsr  = "爸爸";
                }
                if($pard == 4){
                    $jsr  = "";
                }
                if($pard == 5){
                    $jsr  = "家长";
                }


                $time = date('Y-m-d H:i:s', $paytime);


                $restyue = $student['chongzhi'] + $student_buzhu;
                if($mac_type == 1){
                    $ob = $macid."#消费机";
                    $title = "【{$s_name}】{$jsr},您收到一条学生消费通知";
                    $ty = "扣除余额 ￥".$cost.' ，剩余 ￥'.$restyue;
                }elseif($mac_type == 2){
                    $ckmac = pdo_fetch("SELECT * FROM " . tablename($this->table_checkmac) . " WHERE macid = '{$macid}' And schoolid = '{$schoolid}' ");
                    $ob = $ckmac['name'];
                    $title = "【{$s_name}】{$jsr},您收到一条学生充电桩使用通知";
                    $ty = "扣除次数 一次，剩余 ".$student['chargenum']."次";
                }
                $body  = "点击查看详情";
                $datas=array(
                    'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                    'first'=>array('value'=>$title,'color'=>'#FF9E05'),
                    'keyword1'=>array('value'=>$s_name,'color'=>'#1587CD'),
                    'keyword2'=>array('value'=>$time,'color'=>'#2D6A90'),
                    'keyword3'=>array('value'=>$ob,'color'=>'#1587CD'),
                    'keyword4'=> array('value'=>$ty,'color'=>'#FF9E05'),
                    'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                );
                $data = json_encode($datas); //发送的消息模板数据
                $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('user', array('schoolid' => $schoolid,'userid' => $value['id']));
                if(isallow_sendsms($schoolid,'jfjgtz')){
                    if($value['mobile']){
                        $ttimes = date('m月d日 H:i', TIMESTAMP);
                        $content = array(
                            'name' => $student['s_name'],
                            'time' => $ttimes,
                            'type' => $ty,
                        );
                        mload()->model('sms');
                        sms_send($value['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'jfjgtz', $weid, $schoolid);
                    }
                }
                if(!empty($smsset['jfjgtz'])){
                    $this->sendtempmsg($smsset['jfjgtz'], $url, $data, '#FF0000', $openid['openid']);
                }
            }
        }
    }

    public function sendMobileTxkcpj($kcid, $schoolid, $weid) { //提醒评价课程通知
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'xxtongzhi');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['xxtongzhi'] == 1 || !empty($smsset['xxtongzhi'])){
            $kcinfo = pdo_fetch("SELECT * FROM ".tablename($this->table_tcourse)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $kcid, ':schoolid' => $schoolid));
            if(!empty($kcinfo['maintid'])){
                $teacher = pdo_fetch("SELECT tname FROM ".tablename($this->table_teachers)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $kcinfo['maintid'], ':schoolid' => $schoolid));
            }elseif(empty($kcinfo['maintid'])){
                $teacher = pdo_fetch("SELECT tname FROM ".tablename($this->table_teachers)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $kcinfo['tid'], ':schoolid' => $schoolid));
            }
            $stulist = pdo_fetchall("SELECT distinct sid FROM " . tablename($this->table_order) . " where weid='{$weid}' and schoolid = '{$schoolid}' And kcid = '{$kcid}' And type = 1 And status=2 " );
            $school = pdo_fetch("SELECT title FROM ".tablename($this->table_index)." WHERE :weid = weid AND :id = id", array(':weid' => $weid, ':id' => $schoolid));
            foreach( $stulist as $key => $value )
            {
                $openidall = pdo_fetchall("select id,sid,tid,pard,userinfo,openid from ".tablename($this->table_user)." where sid = '{$value['sid']}' ");
                $name  = $teacher['tname'];
                $schoolname ="{$school['title']}";
                $ttime = date('Y-m-d H:i:s', time());
                $body  = "点击本条消息查看详情 ";
                $num = count($openidall);
                if ($num > 1){
                    foreach ($openidall as $key => $values) {
                        $openid = $values['openid'];
                        $mobileinfo = $values['userinfo'];
                        $student = pdo_fetch("SELECT s_name FROM ".tablename($this->table_students)." where id = :id",array(':id'=>$values['sid']));
                        if($values['pard'] == 2){
                            $guanxi = "妈妈";
                        }else if($values['pard'] == 3){
                            $guanxi = "爸爸";
                        }else if($values['pard'] == 4){
                            $guanxi = "";
                        }else if($values['pard'] == 5){
                            $guanxi = "家长";
                        }
                        $title = "【{$student['s_name']}】{$guanxi}，您收到一条提醒课程评价通知";
                        $keyword4 = "请评价课程【".$kcinfo['name']."】";
                        $datas=array(
                            'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                            'first'=>array('value'=>$title,'color'=>'#1587CD'),
                            'keyword1'=>array('value'=>$schoolname,'color'=>'#1587CD'),
                            'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
                            'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                            'keyword4'=>array('value'=>$keyword4,'color'=>'#1587CD'),
                            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                        );
                        $data = json_encode($datas); //发送的消息模板数据

                        if($values['sid']){
                            $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('kcpingjia', array('schoolid' => $schoolid,'kcid' => $kcid,'sid'=>$values['sid']));
                            $this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $openid);
                        }

                    }
                }else{
                    $openid = $openidall['0']['openid'];
                    $mobileinfo = $openidall['0']['userinfo'];
                    $student = pdo_fetch("SELECT s_name FROM ".tablename($this->table_students)." where id = :id",array(':id'=>$openidall['0']['sid']));
                    if($openidall['0']['pard'] == 2){
                        $guanxi = "妈妈";
                    }else if($openidall['0']['pard'] == 3){
                        $guanxi = "爸爸";
                    }else if($openidall['0']['pard'] == 4){
                        $guanxi = "";
                    }else if($openidall['0']['pard'] == 5){
                        $guanxi = "家长";
                    }
                    $title = "【{$student['s_name']}】{$guanxi}，您收到一条提醒课程评价通知";
                    $keyword4 = "请评价课程【".$kcinfo['name']."】";
                    $datas=array(
                        'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                        'first'=>array('value'=>$title,'color'=>'#1587CD'),
                        'keyword1'=>array('value'=>$schoolname,'color'=>'#1587CD'),
                        'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
                        'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                        'keyword4'=>array('value'=>$keyword4,'color'=>'#1587CD'),
                        'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                    );
                    $data = json_encode($datas); //发送的消息模板数据
                    if($openidall['0']['sid']){

                        $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('kcpingjia', array('schoolid' => $schoolid,'kcid' => $kcid,'sid'=>$openidall['0']['sid']));

                        $this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $openid);
                    }
                }
            }
            return true;
        }
    }

    //向老师发送预约提醒
    public function sendMobileTeaVis($id, $schoolid, $weid) { //访问申请结果通知
        global $_W;
        $smsset = get_weidset($weid,'fkyytx');
        $stu= pdo_fetch("SELECT * FROM ".tablename($this->table_visitors)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $id, ':schoolid' => $schoolid));
        $tea= pdo_fetch("SELECT openid FROM ".tablename($this->table_teachers)." WHERE :id = id ", array( ':id' => $stu['t_id']));
        $time = date('m月d日 H:i', $stu['starttime']) .' 到 '. date('m月d日 H:i', $stu['endtime']); //访问时间
        $row = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " WHERE sid = :sid", array(':sid' => $stu['sy_id']));
        $reason = $row['sname'];
        $title = $stu['s_name'];
        if($stu['status'] == 6){
            $status = '预约已取消';
            $reason = '预约已取消';
            $time1 = date('Y年m月d日 H:i', $stu['lastedittime']);
        }elseif($stu['status'] == 1){
            $status = '待审核';
            $time1 = '待审核';
        }
        $body = '';
        $body .= "点击查看预约详情 ";
        $datas=array(
            'name'=>array('value'=>$stu['s_name'],'color'=>'#173177'),
            'first'=>array('value'=>"{$title}向您提出访问申请！",'color'=>'#1587CD'),
            'keyword1'=>array('value'=>$title,'color'=>'#2D6A90'),//访问者的姓名
            'keyword2'=>array('value'=>$time1,'color'=>'#2D6A90'), // 访问审核时间
            'keyword3'=>array('value'=>$time,'color'=>'#2D6A90'), // 访问时间
            'keyword4'=>array('value'=>$status,'color'=>'#2D6A90'), // 审批状态
            'keyword5'=>array('value'=>$reason,'color'=>'#2D6A90'), // 理由
            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
        );
        $data=json_encode($datas); //发送的消息模板数据
        if($stu['status'] == 6){
            $url =  $_W['siteroot']."app/index.php?i=".$weid."&c=entry&schoolid=".$schoolid."&id=".$id."&goto=visitorsjc&do=hookviscom&m=fm_jiaoyu&from=teacher";
        }else{
            $url =  $_W['siteroot']."app/index.php?i=".$weid."&c=entry&schoolid=".$schoolid."&goto=tvisitors&do=hookvistea&m=fm_jiaoyu";
        }
        if (!empty($smsset['fkyytx'])) {
            $this->sendtempmsg($smsset['fkyytx'], $url, $data, '#FF0000', $tea['openid']);
        }
    }

    //向学生家长发送预约提醒
    public function sendMobileStuVis($id, $schoolid, $weid) { //访问申请结果通知
        global $_W;
        $smsset = get_weidset($weid,'fkyytx');
        $stu= pdo_fetch("SELECT * FROM ".tablename($this->table_visitors)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $id, ':schoolid' => $schoolid));
        $time = date('Y-m-d H:i:s', $stu['lastedittime']); // 审核时间
        $time2 = date('m月d日 H:i', $stu['starttime']) .' 到 '. date('m月d日 H:i', $stu['endtime']); //访问时间
        $statu = $stu['status'];
        if($statu == 2){
            $status = '预约成功';
            $row = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " WHERE sid = :sid", array(':sid' => $stu['sy_id']));
            $reason = $row['sname'];
        }elseif($statu == 3){
            $status = '拒绝';
            $reason = $stu['refuseinfo'];
        }elseif($statu == 6){
            $status = '预约已取消';
            $reason = '预约已取消';
        }
        $title = $stu['s_name'];
        $body = '';
        $body .= "点击查看审核查看详情 ";
        $datas=array(
            'name'=>array('value'=>$stu['s_name'],'color'=>'#173177'),
            'first'=>array('value'=>"{$stu['s_name']}的审核结果通知！",'color'=>'#1587CD'),
            'keyword1'=>array('value'=>$title,'color'=>'#2D6A90'),//访问者的姓名
            'keyword2'=>array('value'=>$time,'color'=>'#2D6A90'), // 访问审核时间
            'keyword3'=>array('value'=>$time2,'color'=>'#2D6A90'), // 访问时间
            'keyword4'=>array('value'=>$status,'color'=>'#2D6A90'), // 审批状态
            'keyword5'=>array('value'=>$reason,'color'=>'#2D6A90'), // 理由
            'remark'=> array('value'=>$body,'color'=>'#FF9E05')
        );
        $data=json_encode($datas); //发送的消息模板数据
        $url =  $_W['siteroot']."app/index.php?i=".$weid."&c=entry&schoolid=".$schoolid."&id=".$id."&goto=visitorsjc&do=hookviscom&m=fm_jiaoyu";
        if (!empty($smsset['fkyytx'])) {
            $this->sendtempmsg($smsset['fkyytx'], $url, $data, '#FF0000', $stu['openid']);
        }
    }

    /**
     * 转班通知家长
     * @author Hannibal·Lee <No@email.com>
     * @param [int] $sid 学生
     * @param [int] $kcid 转到哪个班
     * @param [string] $OldKcName 转前所属班级
     * @param [int] $schoolid
     * @param [int] $weid
     *
     * @return void
     */
    public function sendMobileZbtz($sid,$kcid,$OldKcName,$schoolid, $weid) {
        global $_GPC,$_W;
        $smsset = get_weidset($weid,'xxtongzhi');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['xxtongzhi'] == 1 || !empty($smsset['xxtongzhi'])){
            $school = pdo_fetch("SELECT title FROM ".GetTableName('index')." WHERE :weid = weid AND :id = id", array(':weid' => $weid, ':id' => $schoolid));
            $newkcinfo = pdo_fetch("SELECT * FROM ".GetTableName('tcourse')." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $kcid, ':schoolid' => $schoolid));
            if(!empty($newkcinfo['maintid'])){
                $teacher = pdo_fetch("SELECT tname FROM ".GetTableName('teachers')." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $newkcinfo['maintid'], ':schoolid' => $schoolid));
            }elseif(empty($newkcinfo['maintid'])){
                $teacher = pdo_fetch("SELECT tname FROM ".GetTableName('teachers')." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $newkcinfo['tid'], ':schoolid' => $schoolid));
            }
            $openidall = pdo_fetchall("select id,sid,tid,pard,userinfo,openid from ".GetTableName('user')." where sid = '{$sid}' and schoolid = '{$schoolid}' and weid = '{$weid}' ");
            $address = pdo_fetch("SELECT sname FROM ".GetTableName('classify')." WHERE :weid = weid AND :sid = sid and type = 'addr' ", array(':weid' => $weid, ':sid' => $newkcinfo['adrr']));
            $student = pdo_fetch("SELECT * FROM ".GetTableName('students')." WHERE :weid = weid AND :id = id", array(':weid' => $weid, ':id' => $sid));
            $TeaName  = $teacher['tname'];
            $SchoolName ="{$school['title']}";
            $ttime = date('Y-m-d H:i:s', time());
            $body  = "点击本条消息查看详情 ";
            $num = count($openidall);
            if ($num > 1){
                foreach ($openidall as $key => $values) {
                    $openid = $values['openid'];
                    $mobileinfo = $values['userinfo'];
                    if($values['pard'] == 2){
                        $guanxi = "妈妈";
                    }else if($values['pard'] == 3){
                        $guanxi = "爸爸";
                    }else if($values['pard'] == 4){
                        $guanxi = "";
                    }else if($values['pard'] == 5){
                        $guanxi = "家长";
                    }
                    $title = "【{$student['s_name']}】{$guanxi}，您收到一条学生转班通知";
                    $keyword4 = "\r\n学生【{$student['s_name']}】从 【{$OldKcName}】转到 【{$newkcinfo['name']}】";
                    if(!empty($TeaName)){
                        $keyword4 .= "，授课老师【{$TeaName}】"; 
                    }
                    if(!empty($address['sname'])){
                        $keyword4 .= "，授课教室【{$address['sname']}】"; 
                    }
                    $datas=array(
                        'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
                        'first'=>array('value'=>$title,'color'=>'#1587CD'),
                        'keyword1'=>array('value'=>$SchoolName,'color'=>'#1587CD'),
                        'keyword2'=>array('value'=>'管理员','color'=>'#2D6A90'),
                        'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
                        'keyword4'=>array('value'=>$keyword4,'color'=>'#1587CD'),
                        'remark'=> array('value'=>$body,'color'=>'#FF9E05')
                    );
                    $data = json_encode($datas); //发送的消息模板数据
                    if($values['sid']){
                        $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('mykcinfo', array('schoolid' => $schoolid,'id' => $kcid,'sid'=>$values['sid']));
                        $this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $openid);
                    }
                }
            }else{
                $openid = $openidall['0']['openid'];
                $mobileinfo = $openidall['0']['userinfo'];
                $student = pdo_fetch("SELECT s_name FROM ".tablename($this->table_students)." where id = :id",array(':id'=>$openidall['0']['sid']));
                if($openidall['0']['pard'] == 2){
                    $guanxi = "妈妈";
                }else if($openidall['0']['pard'] == 3){
                    $guanxi = "爸爸";
                }else if($openidall['0']['pard'] == 4){
                    $guanxi = "";
                }else if($openidall['0']['pard'] == 5){
                    $guanxi = "家长";
                }
                $title = "【{$student['s_name']}】{$guanxi}，您收到一条学生转班通知";
                $keyword4 = "\r\n学生【{$student['s_name']}】从 【{$OldKcName}】转到 【{$newkcinfo['name']}】";
                if(!empty($TeaName)){
                    $keyword4 .= "，授课老师【{$TeaName}】"; 
                }
                if(!empty($address['sname'])){
                    $keyword4 .= "，授课教室【{$address['sname']}】"; 
                }
                $datas=array(
                    'name'      => array('value' => $_W['account']['name'], 'color' => '#173177'),
                    'first'     => array('value' => $title, 'color' => '#1587CD'),
                    'keyword1'  => array('value' => $SchoolName, 'color' => '#1587CD'),
                    'keyword2'  => array('value' => '管理员', 'color' => '#2D6A90'),
                    'keyword3'  => array('value' => $ttime, 'color' => '#1587CD'),
                    'keyword4'  => array('value' => $keyword4, 'color' => '#1587CD'),
                    'remark'    => array('value' => $body, 'color' => '#FF9E05')
                );
                $data = json_encode($datas); //发送的消息模板数据
                if($openidall['0']['sid']){
                    $url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('mykcinfo', array('schoolid' => $schoolid,'id' => $kcid,'sid'=>$openidall['0']['sid']));
                    $this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $openid);
                }
            }
            return true;
        }
    }
	
    //拼团结果通知 openid参数 为触发这个函数时的用户openid 虚拟的调用虚拟用户openid
    public function sendMobilePttz($teamid,$openid) {
        global $_W;
		mload()->model('kc');
		$team = pdo_fetch("SELECT weid,kcid,schoolid,masterid FROM " . GetTableName('sale_team') . " WHERE id = '{$teamid}' ");
		$smsset = get_weidset($team['weid'],'pttz');
		$master = pdo_fetch("SELECT openid FROM " . GetTableName('sale_team') . " WHERE id = '{$team['masterid']}' ");
		$kcinfo = pdo_fetch("SELECT name FROM " . GetTableName('tcourse') . " WHERE id = '{$team['kcid']}' ");
        $teamlist =  pdo_fetchall("SELECT openid,is_really,userid,ismaster FROM " . GetTableName('sale_team') . " WHERE masterid = '{$team['masterid']}' And kcid = '{$team['kcid']}' ");
		$body  = "点击查看团购详情,获取邀请卡";
		if(CheckTemIsFull($teamid)){
			$body  = "拼团成功,点击立即开始学习 ";
		}
		$masterfans = mc_fansinfo($master['openid']);
		$faninfo = mc_fansinfo($openid);
		foreach($teamlist as $row){
			if($row['ismaster'] == 1){
				if($openid == $row['openid']){
					$topword = "您好,您成功发起了一次拼团";
				}else{
					$topword = "团长好,".$faninfo['nickname']." 加入了您的拼团";
				}
			}else{
				if($openid == $row['openid']){
					$topword = "您好,您已成功加入本次拼团";
				}else{
					$topword = "您好,".$faninfo['nickname']." 加入了您参与的拼团";
				}
			}
			$datas=array(
				'first'=>array('value'=> $topword,'color'=>'#FF9E05'),
				'keyword1'=>array('value'=>$kcinfo['name'],'color'=>'#2D6A90'),
				'keyword2'=>array('value'=>$masterfans['nickname'],'color'=>'#2D6A90'),
				'remark'=> array('value'=>$body,'color'=>'#FF9E05')
			);
			$data= json_encode($datas); //发送的消息模板数据
			if (!empty($smsset['pttz'])) {
				if($row['is_really'] != 1){//发送给非虚拟用户
					$url =  $_W['siteroot']."app/index.php?i=".$team['weid']."&c=entry&schoolid=".$team['schoolid']."&id=".$row['userid']."&op=tuan&do=mysaleinfo&m=fm_jiaoyu";
					$this->sendtempmsg($smsset['pttz'], $url, $data, '#FF0000', $row['openid']);
				}
			}
		}
    }
	
	//助力结果通知
    public function sendMobileZltz($teamid,$openid) {
        global $_W;
		mload()->model('kc');
		$team = pdo_fetch("SELECT weid,kcid,schoolid,masterid FROM " . GetTableName('sale_team') . " WHERE id = '{$teamid}' ");
		$smsset = get_weidset($team['weid'],'zltz');
		$master = pdo_fetch("SELECT userid,openid,endtime FROM " . GetTableName('sale_team') . " WHERE id = '{$team['masterid']}' ");
		$kcinfo = pdo_fetch("SELECT name FROM " . GetTableName('tcourse') . " WHERE id = '{$team['kcid']}' ");
		$endtime = '截至时间'.date('m月d日 H:i',$master['endtime']);
		$status  = "助力中";
		$body  = "点击查看助力详情,获取邀请卡";
		if(CheckTemIsFull($teamid)){
			$status  = "助力成功";
			$body  = "助力成功,点击立即开始学习";
			$endtime = '您已助力成功';
		}
		$masterfans = mc_fansinfo($master['openid']);
		$faninfo = mc_fansinfo($openid);
		if($openid == $master['openid']){
			$topword = $masterfans['nickname'].",您好,您成功发起了一次助力";
		}else{
			$topword = $masterfans['nickname'].",您好,".$faninfo['nickname']." 为您助力成功！";
		}
		$datas=array(
			'first'=>array('value'=> $topword,'color'=>'#FF9E05'),
			'keyword1'=>array('value'=>$kcinfo['name'],'color'=>'#2D6A90'),
			'keyword2'=>array('value'=>$status,'color'=>'#2D6A90'),
			'keyword3'=>array('value'=>$endtime,'color'=>'#2D6A90'),
			'remark'=> array('value'=>$body,'color'=>'#FF9E05')
		);
		$data= json_encode($datas); //发送的消息模板数据
		if (!empty($smsset['zltz'])) {
			$url =  $_W['siteroot']."app/index.php?i=".$team['weid']."&c=entry&schoolid=".$team['schoolid']."&id=".$master['userid']."&op=zhuli&do=mysaleinfo&m=fm_jiaoyu";
			$this->sendtempmsg($smsset['zltz'], $url, $data, '#FF0000', $master['openid']);
		}
    }

    /**
     * 老师公物领用相关通知
     *
     * @param [type] $gwshenheid 公物申请id
     * @param [type] $schoolid
     * @param [type] $weid
     *
     * @return void
     */
    public function sendMobileTeaAssetsShenHe($gwshenheid, $schoolid, $weid){  
		global $_GPC,$_W;
        $smsset = get_weidset($weid,'xxtongzhi');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['xxtongzhi'] == 1 || !empty($smsset['xxtongzhi'])) {
			//$notice = pdo_fetch("SELECT title,outurl,createtime FROM ".tablename($this->table_notice)." WHERE :weid = weid AND :id = id AND :schoolid = schoolid", array(':weid' => $weid, ':id' => $notice_id, ':schoolid' => $schoolid));
			$gwshengeinfo = pdo_fetch("SELECT * FROM ".GetTableName('assetstake')." WHERE id = '{$gwshenheid}' ");
			$gwinfo = pdo_fetch("SELECT name,danwei FROM ".GetTableName('assets')." WHERE id = '{$gwshengeinfo['gwid']}' ");
			$school = pdo_fetch("SELECT title FROM ".GetTableName('index')." WHERE id = '{$schoolid}' ");
			$SendToTea = pdo_fetch("SELECT tname,mobile FROM ".GetTableName('teachers')." WHERE id = '{$gwshengeinfo['tid']}' ");
			$ClTea = pdo_fetch("SELECT tname FROM ".GetTableName('teachers')." WHERE id = '{$gwshengeinfo['cltid']}' ");
			$openid = pdo_fetch("SELECT * FROM ".GetTableName('user')." WHERE tid = '{$gwshengeinfo['tid']}' and schoolid = '{$schoolid}' ");
			$title = "【{$SendToTea['tname']}】老师，您收到一条公物领用相关通知";
			$schoolname ="{$school['title']}";
            if($gwshengeinfo['cltid'] != -1){
			    $name  = "{$ClTea['tname']}老师";
            }else{
                $name  = "管理员";
            }
			$statusword = $gwshengeinfo['status'] == 2 ? "申请已通过" : ( $gwshengeinfo['status'] == 3 ?  "申请被拒绝" : ($gwshengeinfo['status'] == 4 ?  "物品已归还":" "));
			$disc = " 您的【领用{$gwshengeinfo['num']}{$gwinfo['danwei']}{$gwinfo['name']}】{$statusword}";
			$body  = "点击本条消息查看详情 ";
			$ttime = date('Y-m-d H:i:s', $gwshengeinfo['cltime']);
			$datas=array(
				'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
				'first'=>array('value'=>$title,'color'=>'#1587CD'),
				'keyword1'=>array('value'=>$schoolname,'color'=>'#1587CD'),
				'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
				'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
				'keyword4'=>array('value'=>$disc,'color'=>'#1587CD'),
				'remark'=> array('value'=>$body,'color'=>'#FF9E05')
			);
			$data = json_encode($datas); //发送的消息模板数据
			$url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('hookassetstea', array('schoolid' => $schoolid,'tid' => $gwshengeinfo['tid'],'goto'=>'myassetstake'));
			if(isallow_sendsms($schoolid,'xxtongzhi')){
				if($SendToTea['mobile']){
					$content = array(
						'name' => $SendToTea['tname']."老师",
						'time' => $ttime,
					);
					mload()->model('sms');
					sms_send($SendToTea['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'xxtongzhi', $weid, $schoolid);
				}
			}
			if(!empty($smsset['xxtongzhi'])){
			 $res = 	$this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $openid['openid']);
			}
			return $openid;
        }
    }

    public function sendMobileTeaAssetsFix($fixsqid, $schoolid, $weid){ //老师公物维修审核结果通知
		global $_GPC,$_W;
        $smsset = get_weidset($weid,'xxtongzhi');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['xxtongzhi'] == 1 || !empty($smsset['xxtongzhi'])) {
			$gwfixinfo = pdo_fetch("SELECT * FROM ".GetTableName('assetsfix')." WHERE id = '{$fixsqid}' ");
			$gwinfo = pdo_fetch("SELECT name FROM ".GetTableName('assets')." WHERE id = '{$gwfixinfo['gwid']}' ");
			$school = pdo_fetch("SELECT title FROM ".GetTableName('index')." WHERE id = '{$schoolid}' ");
			$SendToTea = pdo_fetch("SELECT tname,mobile FROM ".GetTableName('teachers')." WHERE id = '{$gwfixinfo['tid']}' ");
			$ClTea = pdo_fetch("SELECT tname FROM ".GetTableName('teachers')." WHERE id = '{$gwfixinfo['cltid']}' ");
			$openid = pdo_fetch("SELECT * FROM ".GetTableName('user')." WHERE tid = '{$gwfixinfo['tid']}' and schoolid = '{$schoolid}' ");
			$title = "【{$SendToTea['tname']}】老师，您收到一条公物维修相关通知";
            $schoolname ="{$school['title']}";
            if($gwfixinfo['cltid'] != -1){
			    $name  = "{$ClTea['tname']}老师";
            }else{
                $name  = "管理员";
            }
            $gwname = $gwinfo['name'] ? $gwinfo['name'] : $gwfixinfo['gwname'];
			$statusword = $gwfixinfo['status'] == 2 ? "物品已维修完成" : ( $gwfixinfo['status'] == 3 ?  "申请已被拒绝" : ($gwfixinfo['status'] == 4 ?  "物品无法维修，已报废":($gwfixinfo['status'] == 5 ?  "开始维修":" " )));
			if($gwfixinfo['status'] != 5){
				$clms = ",处理描述【{$gwfixinfo['cltext']}】";
			}
			$disc = " 您的【申请维修{$gwname}】{$statusword}{$clms}";
			$body  = "点击本条消息查看详情 ";
			$ttime = date('Y-m-d H:i:s', $gwfixinfo['cltime']);
			$datas=array(
				'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
				'first'=>array('value'=>$title,'color'=>'#1587CD'),
				'keyword1'=>array('value'=>$schoolname,'color'=>'#1587CD'),
				'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
				'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
				'keyword4'=>array('value'=>$disc,'color'=>'#1587CD'),
				'remark'=> array('value'=>$body,'color'=>'#FF9E05')
			);
			$data = json_encode($datas); //发送的消息模板数据
			$url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('hookassetstea', array('schoolid' => $schoolid,'tid' => $gwfixinfo['tid'],'goto'=>'assetsfix'));
			if(isallow_sendsms($schoolid,'xxtongzhi')){
				if($SendToTea['mobile']){
					$content = array(
						'name' => $SendToTea['tname']."老师",
						'time' => $ttime,
					);
					mload()->model('sms');
					sms_send($SendToTea['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'xxtongzhi', $weid, $schoolid);
				}
			}
			if(!empty($smsset['xxtongzhi'])){
			 $res = $this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $openid['openid']);
			}
			return $res;
        }
    }


    public function sendMobileTeaRoomReserve($sqid, $schoolid, $weid){ //老师场室预定处理结果
		global $_GPC,$_W;
        $smsset = get_weidset($weid,'xxtongzhi');
        $sms_set = get_school_sms_set($schoolid);
        if($sms_set['xxtongzhi'] == 1 || !empty($smsset['xxtongzhi'])) {
			$sqinfo = pdo_fetch("SELECT * FROM ".GetTableName('roomreserve')." WHERE id = '{$sqid}' ");
			$roominfo = pdo_fetch("SELECT * FROM ".GetTableName('classify')." WHERE sid = '{$sqinfo['roomid']}' ");
			$SendToTea = pdo_fetch("SELECT tname,mobile FROM ".GetTableName('teachers')." WHERE id = '{$sqinfo['tid']}' ");
			$school = pdo_fetch("SELECT title FROM ".GetTableName('index')." WHERE id = '{$schoolid}' ");
			$ClTea = pdo_fetch("SELECT tname FROM ".GetTableName('teachers')." WHERE id = '{$sqinfo['cltid']}' ");
			$openid = pdo_fetch("SELECT * FROM ".GetTableName('user')." WHERE tid = '{$sqinfo['tid']}' and schoolid = '{$schoolid}' ");
			$title = "【{$SendToTea['tname']}】老师，您收到一条场室预定相关通知";
			$schoolname ="{$school['title']}";
			if($sqinfo['cltid'] != -1){
			    $name  = "{$ClTea['tname']}老师";
            }else{
                $name  = "管理员";
            }
			$starttime = date("Y年m月d日 H:i",$sqinfo['starttime']);
			$endtime = date("Y年m月d日 H:i",$sqinfo['endtime']);
			$statusword = $sqinfo['status'] == 2 ? "申请已通过" : "申请已被拒绝" ;
			$disc = " 您的预约【{$roominfo['sname']}】【{$starttime} 至 {$endtime}】{$statusword}";
			$body  = "点击本条消息查看详情 ";
			$ttime = date('Y-m-d H:i:s', $sqinfo['cltime']);
			$datas=array(
				'name'=>array('value'=>$_W['account']['name'],'color'=>'#173177'),
				'first'=>array('value'=>$title,'color'=>'#1587CD'),
				'keyword1'=>array('value'=>$schoolname,'color'=>'#1587CD'),
				'keyword2'=>array('value'=>$name,'color'=>'#2D6A90'),
				'keyword3'=>array('value'=>$ttime,'color'=>'#1587CD'),
				'keyword4'=>array('value'=>$disc,'color'=>'#1587CD'),
				'remark'=> array('value'=>$body,'color'=>'#FF9E05')
			);
			$data = json_encode($datas); //发送的消息模板数据
			$url =  $_W['siteroot'] .'app/'.$this->createMobileUrl('hookassetstea', array('schoolid' => $schoolid,'goto'=>'roomreserve'));
			if(isallow_sendsms($schoolid,'xxtongzhi')){
				if($SendToTea['mobile']){
					$content = array(
						'name' => $SendToTea['tname']."老师",
						'time' => $ttime,
					);
					mload()->model('sms');
					sms_send($SendToTea['mobile'], $content, $smsset['sms_SignName'], $smsset['sms_Code'], 'xxtongzhi', $weid, $schoolid);
				}
			}
			if(!empty($smsset['xxtongzhi'])){
			 $res = $this->sendtempmsg($smsset['xxtongzhi'], $url, $data, '#FF0000', $openid['openid']);
			}
			return $res;
        }
    }


}
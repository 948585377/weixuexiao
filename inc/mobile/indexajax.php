<?php
/**
 * 微教育模块
 *
 * @author 高贵血迹
 */global $_W, $_GPC;

$operation = in_array ( $_GPC ['op'], array ('default','useredit','jiaoliu','bdxs','bdls','unboundls','qingjia','agree','defeid','sagree','sdefeid','savemsg','xsqingjia','stuqj_px','savesmsg','getbjlist','signup','txshbm','xgxsinfo','tgsq','jjsq', 'bangdingcardjl', 'jbidcard', 'changeimg', 'changePimg', 'changeimgt','showchecklog','liaotian','jzjb','getkcbiao','bangdingcardjforteacher','addclick','xgdz','tjzy','GetQueStisticsData','tjpy_c','tjpy_p','njzragree','reset_stuinfo','createsence','getkcbiaobytid','addqzkh','GetTgy','xsqjchehui','adddrug','DiffDay','GetByInfo','UpdateBy') ) ? $_GPC ['op'] : 'default';

if ($operation == 'default') {
    die ( json_encode ( array (
        'result' => false,
        'msg' => '参数错误'
    ) ) );
}
if ($operation == 'useredit') {
    $data = explode ( '|', $_GPC ['json'] );

    if (empty($_GPC ['schoolid'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }
    $user = pdo_fetch ( 'SELECT * FROM ' . tablename ( $this->table_user ) . ' WHERE id = :id ', array (':id' => $_GPC ['userid']));

    if (empty($user)) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    } else {

        if ($user ['status'] == 1) {

            $data ['result'] = false; //

            $data ['msg'] = '抱歉您的帐号被锁定，请联系校方！';

        } else {

            $info = array ('name' => $_GPC ['name'],'mobile' => $_GPC ['mobile']);
            $main = pdo_fetch ( 'SELECT * FROM ' . tablename ( $this->table_students ) . ' WHERE id = :id ', array (':id' => $user ['sid']));
            if($main['keyid'] != 0 )
            {
                $allstu = pdo_fetchall ( 'SELECT * FROM ' . tablename ( $this->table_students ) . ' WHERE keyid = :keyid ', array (':keyid' => $main ['keyid']));

                foreach( $allstu as $key => $value )
                {
                    $temp['is_allowmsg'] = trim($_GPC ['is_allowmsg']);
					$temp['realname'] = $info['name'];
					$temp['mobile'] = $info['mobile'];
                    pdo_update ( $this->table_user, $temp, array ('sid' => $value ['id'],'openid'=>$user['openid']) );
                }
            }else{
                $temp['is_allowmsg'] = trim($_GPC ['is_allowmsg']);
				$temp['realname'] = $info['name'];
				$temp['mobile'] = $info['mobile'];
                pdo_update ( $this->table_user, $temp, array ('id' => $user ['id']) );
            }




            $data ['result'] = true;

            $data ['msg'] = '修改成功！';
        }
        die ( json_encode ( $data ) );
    }
}
if ($operation == 'liaotian') {
    if (empty($_GPC ['schoolid'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }
    $user = pdo_fetch ( 'SELECT id,status FROM ' . tablename ( $this->table_user ) . ' WHERE id = :id And openid = :openid', array (':id' => $_GPC ['userid'],':openid' => $_GPC ['openid']));
    if (empty($user)) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    } else {
        if ($user ['status'] == 1) {
            $data ['result'] = false; //
            $data ['msg'] = '抱歉您的帐号被锁定，请联系校方！';
        } else {
            if(trim($_GPC ['is_allowmsg']) == 'N'){
                $is_allowmsg = 1;
            }
            if(trim($_GPC ['is_allowmsg']) == 'Y'){
                $is_allowmsg = 2;
            }
            $temp['is_allowmsg'] = $is_allowmsg;
            pdo_update ( $this->table_user, $temp, array ('id' => $user ['id']) );
            $data ['result'] = true;
            $data ['msg'] = '修改成功！';
        }
        die ( json_encode ( $data ) );
    }
}
if ($operation == 'jzjb') {
    $data = explode ( '|', $_GPC ['json'] );
    if (! $_GPC ['schoolid'] || ! $_GPC ['weid']) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }

    $user = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " where :schoolid = schoolid And :weid = weid And :id = id", array(
        ':weid' => $_GPC ['weid'],
        ':schoolid' => $_GPC ['schoolid'],
        ':id'=>$_GPC ['sid']
    ));

    if (empty($user['id'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求，没找你的学生信息！'
        ) ) );
    }

    if (empty($_GPC['openid'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }else{
        if($user['keyid'] != '0' )
        {
            $otherStu = pdo_fetchall("SELECT * FROM " . tablename($this->table_students) . " where :schoolid = schoolid And :weid = weid And :keyid = keyid", array(
                ':weid' => $_GPC ['weid'],
                ':schoolid' => $_GPC ['schoolid'],
                ':keyid'=>$user ['keyid']
            ));

            foreach( $otherStu as $key => $value )
            {

                if($_GPC['pard'] == 2){
                    $temp = array(
                        'mom' => 0,
                        'muserid' => 0,
                        'muid'=> 0
                    );
                }
                if($_GPC['pard'] == 3){
                    $temp = array(
                        'dad' => 0,
                        'duserid' => 0,
                        'duid'=> 0
                    );
                }
                if($_GPC['pard'] == 4){
                    $temp = array(
                        'own' => 0,
                        'ouserid' => 0,
                        'ouid'=> 0
                    );
                }
                if($_GPC['pard'] == 5){
                    $temp = array(
                        'other' => 0,
                        'otheruserid' => 0,
                        'otheruid'=> 0
                    );
                }

                pdo_update($this->table_students, $temp, array('id' => $value['id']));
                pdo_delete($this->table_user, array('sid' => $value['id'],'openid'=>$_GPC['openid']));
            }


        }else{

            if($_GPC['pard'] == 2){
                $temp = array(
                    'mom' => 0,
                    'muserid' => 0,
                    'muid'=> 0
                );
            }
            if($_GPC['pard'] == 3){
                $temp = array(
                    'dad' => 0,
                    'duserid' => 0,
                    'duid'=> 0
                );
            }
            if($_GPC['pard'] == 4){
                $temp = array(
                    'own' => 0,
                    'ouserid' => 0,
                    'ouid'=> 0
                );
            }
            if($_GPC['pard'] == 5){
                $temp = array(
                    'other' => 0,
                    'otheruserid' => 0,
                    'otheruid'=> 0
                );
            }
            pdo_update($this->table_students, $temp, array('id' => $_GPC['sid']));
            pdo_delete($this->table_user, array('id' => $_GPC['userid']));
        }
        session_destroy();
        $data ['result'] = true;
        $data ['msg'] = '解绑成功！';
        die ( json_encode ( $data ) );
    }
}
if ($operation == 'bdxs') {
    $language = $_W['lanconfig']['bangding'];
    $subjectId = trim($_GPC['subjectId']);
    $school = pdo_fetch("SELECT bd_type FROM " . tablename($this->table_index) . " WHERE id = {$_GPC['schoolid']} ");
    if ($school['bd_type'] ==1 || $school['bd_type'] ==4 || $school['bd_type'] ==5 || $school['bd_type'] ==7){
        $bdset = get_weidset($_GPC['weid'],'bd_set');
        $sms_set = get_school_sms_set($_GPC ['schoolid']);
        if($sms_set['code'] ==1 && $bdset['sms_SignName'] && $bdset['sms_Code']){
            $mobile = !empty($_GPC['mymobile']) ? $_GPC['mymobile'] : $_GPC['mobile'];
            $status = check_verifycode($mobile, $_GPC['mobilecode'], $_GPC['weid']);
            if(!$status) {
                $data ['result'] = false;
                $data ['msg'] = '短信验证码错误或已过期！';
                die ( json_encode ( $data ) );
            }
        }else{
            if(empty($_GPC['mymobile'])){
                $condition .= " AND mobile = '{$_GPC['mobile']}'";
            }
        }
    }
    if ($school['bd_type'] ==2 || $school['bd_type'] ==4 || $school['bd_type'] ==6 || $school['bd_type'] ==7){
        $condition .= " AND code = '{$_GPC['code']}'";
    }
    if ($school['bd_type'] ==3 || $school['bd_type'] ==5 || $school['bd_type'] ==6 || $school['bd_type'] ==7){
        $condition .= " AND numberid = '{$_GPC['xuehao']}'";
    }
    if(empty($_GPC['sid'])){
        $sid = pdo_fetch("SELECT id FROM " . tablename($this->table_students) . " where :schoolid = schoolid And :weid = weid And :s_name = s_name $condition", array(
            ':weid' => $_GPC ['weid'],
            ':schoolid' => $_GPC ['schoolid'],
            ':s_name'=>$_GPC ['s_name']
        ));
        $stuid = $sid['id'];
    }else{
        $stuid = $_GPC['sid'];
    }
    $user = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where :schoolid = schoolid And weid = :weid AND sid=:sid And uid =:uid ", array(
        ':weid' => $_GPC ['weid'],
        ':schoolid' => $_GPC ['schoolid'],
        ':sid' => $stuid,
        ':uid' => $_GPC['uid'],
    ));
    $item = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " where :schoolid = schoolid And weid = :weid AND id=:id ", array(
        ':weid' => $_GPC ['weid'],
        ':schoolid' => $_GPC ['schoolid'],
        ':id' => $stuid
    ));
    if($item['status'] == 1){
        //$data ['result'] = false;
        //$data ['msg'] = '该生尚未激活';
        //die ( json_encode ( $data ) );
    }
    if(!empty($user)){
        $data ['result'] = false;
        $data ['msg'] = $language['bangding_jstip1'];
        die ( json_encode ( $data ) );
    }
    if(empty($stuid)){
        $data ['result'] = false;
        $data ['msg'] = $language['bangding_jstip2'];
        die ( json_encode ( $data ) );
    }
    if($subjectId == 2){
        if (!empty($item['mom'])){
            $data ['result'] = false;
            $data ['msg'] = $language['bangding_jstip3'];
            die ( json_encode ( $data ) );
        }
    }
    if($subjectId == 3){
        if (!empty($item['dad'])){
            $data ['result'] = false;
            $data ['msg'] = $language['bangding_jstip4'];
            die ( json_encode ( $data ) );
        }
    }
    if($subjectId == 4){
        if (!empty($item['own'])){
            $data ['result'] = false;
            $data ['msg'] = $language['bangding_jstip5'];
            die ( json_encode ( $data ) );
        }
    }
    if($subjectId == 5){
        if (!empty($item['other'])){
            $data ['result'] = false;
            $data ['msg'] = $language['bangding_jstip6'];
            die ( json_encode ( $data ) );
        }
    }
    if (empty($_GPC['openid'])) {
        $data ['result'] = false;
        $data ['msg'] = '非法请求！';
        die ( json_encode ( $data ) );
    }else{
        $userdata = array(
            'sid' => trim($stuid),
            'weid' =>  $_GPC ['weid'],
            'schoolid' => $_GPC ['schoolid'],
            'openid' => $_W ['openid'],
            'pard' => $subjectId,
            'uid' => $_GPC['uid'],
            'createtime' => time()
        );
        if(!empty($_GPC['mobile']) || !empty($_GPC['mymobile'])){
            if(!$_GPC['mymobile']){
                $userinfo = array(
                    'name' => $_GPC['s_name'].get_guanxi($subjectId),
                    'mobile' => trim($_GPC['mobile'])
                );
            }else{
                $userinfo = array(
                    'name' => $_GPC['realname'],
                    'mobile' => trim($_GPC['mymobile'])
                );
            }
			$userdata['realname'] = $userinfo['name'];
			$userdata['mobile'] = $userinfo['mobile'];
        }
        pdo_insert($this->table_user, $userdata);
        $userid = pdo_insertid();
        if($subjectId == 2){
            $temp = array(
                'mom' => $_GPC['openid'],
                'muserid' => $userid,
                'muid'=> $_GPC['uid']
            );
        }
        if($subjectId == 3){
            $temp = array(
                'dad' => $_GPC['openid'],
                'duserid' => $userid,
                'duid'=> $_GPC['uid']
            );
        }
        if($subjectId == 4){
            $temp = array(
                'own' => $_GPC['openid'],
                'ouserid' => $userid,
                'ouid'=> $_GPC['uid']
            );
        }
        if($subjectId == 5){
            $temp = array(
                'other' => $_GPC['openid'],
                'otheruserid' => $userid,
                'otheruid'=> $_GPC['uid']
            );
        }
        pdo_update($this->table_students, $temp, array('id' => $stuid));
        $data ['result'] = true;
        $data ['msg'] = '恭喜您,绑定成功!点击确定立刻跳转至个人中心';
        die ( json_encode ( $data ) );
    }
}

if ($operation == 'bdls') {
    $language = $_W['lanconfig']['bangding'];
    $data = explode ( '|', $_GPC ['json'] );
    if (! $_GPC ['schoolid'] || ! $_W ['openid']) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }
    $bdset = get_weidset($_GPC['weid'],'bd_set');
    $sms_set = get_school_sms_set($_GPC ['schoolid']);
    if($sms_set['code'] ==1 && $bdset['sms_SignName'] && $bdset['sms_Code']){
        $status = check_verifycode($_GPC['mobile'], $_GPC['mobilecode'], $_GPC['weid']);
        if(!$status) {
            die ( json_encode ( array (
                'result' => false,
                'msg' => '短信验证码错误！'
            ) ) );
        }
    }
    $tid = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " where :schoolid = schoolid And :weid = weid And :tname = tname And :code = code ", array(
        ':weid' => $_GPC ['weid'],
        ':schoolid' => $_GPC ['schoolid'],
        ':tname'=>$_GPC ['tname'],
        ':code'=>$_GPC ['code']
    ), 'id');
    $item = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " where weid = :weid AND id=:id ORDER BY id DESC", array(
        ':weid' => $_GPC ['weid'],
        ':id' => $tid['id']
    ));

    $user = pdo_fetch("SELECT id FROM " . tablename($this->table_teachers) . " where :schoolid = schoolid And :weid = weid And :openid = openid", array(
        ':weid' => $_GPC ['weid'],
        ':schoolid' => $_GPC ['schoolid'],
        ':openid'=>$_GPC ['openid']
    ));

    if ($user['id']) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => $language['bangding_jstip7']
        ) ) );
    }

    if (empty($_GPC['openid'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }

    if(empty($tid['id'])){
        die ( json_encode ( array (
            'result' => false,
            'msg' => '姓名或绑定码输入有误！'
        ) ) );
    }
    if(!empty($item['openid'])){

        die ( json_encode ( array (
            'result' => false,
            'msg' => $language['bangding_jstip8']
        ) ) );

    }else{

        pdo_insert($this->table_user, array (
            'tid' => trim($tid['id']),
            'weid' =>  $_GPC ['weid'],
            'schoolid' => $_GPC ['schoolid'],
            'openid' => $_W ['openid'],
            'uid' => $_GPC['uid'],
            'createtime' => time()
        ));
        $userid = pdo_insertid();
        $temp = array(
            'openid' => $_GPC ['openid'],
            'uid' => $_GPC['uid'],
            'userid' => $userid
        );
        if(!empty($_GPC['mobile'])){
            $temp['mobile'] = trim($_GPC['mobile']);
        }
        pdo_update($this->table_teachers, $temp, array('id' => $tid['id']));

        $data ['result'] = true;

        $data ['msg'] = '绑定成功！';

        die ( json_encode ( $data ) );
    }
}

if ($operation == 'unboundls') {
    $user = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where :schoolid = schoolid And :id = id ", array(':id' => $_GPC ['user'],':schoolid' => $_GPC ['schoolid']));
    if (empty($user)) {
        $data ['result'] = false;
        $data ['msg'] = '非法请求，没找你的老师信息！';
    }else{
        $temp = array('openid' => '','uid'    => 0);
        pdo_update($this->table_teachers, $temp, array('id' => $user['tid']));
        pdo_delete($this->table_leave, array('userid' => $user['id']));
        pdo_delete($this->table_leave, array('touserid' => $user['id']));
        pdo_delete($this->table_bjq, array('userid' => $user['id']));
        pdo_delete($this->table_dianzan, array('userid' => $user['id']));
        pdo_delete($this->table_leave, array('tuid' => $user['uid']));
        pdo_delete($this->table_user, array('id' => $user['id']));
        $data ['result'] = true;
        $data ['msg'] = '解绑成功！';
    }
    die ( json_encode ( $data ) );
}

if ($operation == 'qingjia') {
    if (! $_GPC ['schoolid'] || ! $_GPC ['weid']) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }
    $user = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " where :schoolid = schoolid And :weid = weid And :openid = openid", array(
        ':weid' => $_GPC ['weid'],
        ':schoolid' => $_GPC ['schoolid'],
        ':openid'=>$_GPC ['openid']
    ), 'id');
    $leave = pdo_fetch("SELECT * FROM " . tablename($this->table_leave) . " where :schoolid = schoolid And :weid = weid And :tid = tid ORDER BY id DESC LIMIT 1", array(
        ':weid' => $_GPC['weid'],
        ':schoolid' => $_GPC ['schoolid'],
        ':tid' => $_GPC ['tid']
    ));
    if ((time() - $leave['createtime']) <  200) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '您请假太频繁了，请待会再试！'
        ) ) );
    }
    if (empty($user['id'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求，没找你的老师信息！'
        ) ) );
    }
    if (empty($_GPC['openid'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }else{
        $schoolid = $_GPC['schoolid'];
        $weid = $_GPC['weid'];
        $teacher = pdo_fetch("SELECT openid FROM " . tablename($this->table_teachers) . " where id = :id AND schoolid = :schoolid ", array(':id' => $_GPC['totid'], ':schoolid' => $schoolid));
        $toopenid = $teacher['openid'];
        if(is_showgkk())
        {
            $is_njzr = $_GPC['is_njzr'];
        }


        if(is_showpf()){
            if($_GPC['MoreOrLess'] == 1){
                $date = $_GPC['qingjiaDate'];
                $starttime_temp = $_GPC['startTime'];
                $endtime_temp = $_GPC['endTime'];
                $starttime_str = $date.' '.$starttime_temp;
                $endtime_str = $date.' '.$endtime_temp;
                $starttime = strtotime($starttime_str);
                $endtime = strtotime($endtime_str);
                $data = array(
                    'weid' =>  $_GPC ['weid'],
                    'schoolid' => $_GPC ['schoolid'],
                    'openid' => $_GPC ['openid'],
                    'tid' => $_GPC ['tid'],
                    'type' => $_GPC ['type'],
                    'startime1' => $starttime,
                    'endtime1' => $endtime,
                    'ksnum' => $_GPC['qingjiaNum'],
                    'conet' => $_GPC ['content'],
                    'uid' => $_GPC['uid'],
                    'createtime' => time(),
                    'tktype' =>  $_GPC['tktype'],
                    'cltid' => $_GPC['totid'],
                    'more_less' =>$_GPC['MoreOrLess'],
                    'classid' => $_GPC['classid']
                );
            }elseif($_GPC['MoreOrLess'] == 2){
                $starttime = $_GPC['startTime'];
                $endtime = $_GPC['endTime'];
                $starttime = strtotime($starttime);
                $endtime = strtotime($endtime)+86399;
                $data = array(
                    'weid' =>  $_GPC ['weid'],
                    'schoolid' => $_GPC ['schoolid'],
                    'openid' => $_GPC ['openid'],
                    'tid' => $_GPC ['tid'],
                    'type' => $_GPC ['type'],
                    'startime1' => $starttime,
                    'endtime1' => $endtime,
                    'conet' => $_GPC ['content'],
                    'uid' => $_GPC['uid'],
                    'createtime' => time(),
                    'tktype' =>  $_GPC['tktype'],
                    'cltid' => $_GPC['totid'],
                    'more_less' =>$_GPC['MoreOrLess'],
                    'classid' => $_GPC['classid']
                );
            }

        }else{
            $data = array(
                'weid' =>  $_GPC ['weid'],
                'schoolid' => $_GPC ['schoolid'],
                'openid' => $_GPC ['openid'],
                'tid' => $_GPC ['tid'],
                'type' => $_GPC ['type'],
                'startime1' => strtotime($_GPC['startTime']),
                'endtime1' => strtotime($_GPC['endTime']),
                'conet' => $_GPC ['content'],
                'uid' => $_GPC['uid'],
                'createtime' => time(),
            );
            if(is_showgkk())
            {
                $data['tktype'] =  $_GPC['tktype'];
                if($is_njzr){
                    $data['toxztid'] =  $_GPC['totid'];
                }else{
                    $data['tonjzrtid'] = $_GPC['totid'];
                }
            }
        }

        pdo_insert($this->table_leave, $data);
        $leave_id = pdo_insertid();
        $this->sendMobileJsqj($leave_id, $schoolid, $weid, $toopenid);
        $data ['result'] = true;
        $data ['msg'] = '提交申请成功！';
        die ( json_encode ( $data ) );
    }
}

if ($operation == 'agree') {
    $schoolid = $_GPC['schoolid'];
    $weid = $_GPC['weid'];
    $leaveid = $_GPC['id'];
    $shname = trim($_GPC['shname']);
    $data = array(
        'cltid' =>  $_GPC['tid'],
        'reconet' =>  trim($_GPC['reconet']),
        'cltime' =>  time(),
        'status' =>  1,
    );
    pdo_update($this->table_leave, $data, array('id' => $leaveid));
    $this->sendMobileJsqjsh($leaveid, $schoolid, $weid, $shname);
    $data ['result'] = true;
    $data ['msg'] ='审核成功！';
    $actop = 'shzgqj';
    $userid = $_GPC['userid'];
    $point = PointAct($weid,$schoolid,$userid,$actop);
    $point1 = PointMission($weid,$schoolid,$userid,$actop);

    if(!empty($point))
    {
        $data ['msg'] = '审核成功!积分+'.$point;
    }
    die ( json_encode ( $data ) );
}

if ($operation == 'defeid') {
    $schoolid = $_GPC['schoolid'];
    $weid = $_GPC['weid'];
    $leaveid = $_GPC['id'];
    $shname = trim($_GPC['shname']);
    $data = array(
        'reconet' =>  trim($_GPC['reconet']),
        'cltid' =>  $_GPC['tid'],
        'cltime' =>  time(),
        'status' =>  2,
    );
    pdo_update($this->table_leave, $data, array('id' => $leaveid));
    $this->sendMobileJsqjsh($leaveid, $schoolid, $weid, $shname);
    $data ['result'] = true;
    $data ['msg'] = '审核成功！';
    $actop = 'shzgqj';
    $userid = $_GPC['userid'];
    $point = PointAct($weid,$schoolid,$userid,$actop);
    $point1 = PointMission($weid,$schoolid,$userid,$actop);
    if(!empty($point))
    {
        $data ['msg'] = '审核成功!积分+'.$point;
    }
    die ( json_encode ( $data ) );
}

if ($operation == 'sagree') {
    $schoolid = $_GPC['schoolid'];
    $weid = $_GPC['weid'];
    $leaveid = $_GPC['id'];
    $tname = $_GPC['tname'];
    if($_GPC['agreetype'] == 'agree'){
        $status = 1;
        /*******************修改kcsign表***********************/
        $leave = pdo_fetch("SELECT * FROM ".GetTableName('leave')." WHERE id = '{$leaveid}' ");
        pdo_update($this->table_kcsign, array('status'=>3), array('sid' => $leave['sid'],'ksid'=>$leave['ksid']));
        /*******************修改kcsign表***********************/
    }else{
        $status = 2;
    }
    $data = array(
        'reconet' =>  $_GPC['content'],
        'cltid' =>  $_GPC['tid'],
        'cltime' =>  time(),
        'status' =>  $status
    );
    pdo_update($this->table_leave, $data, array('id' => $leaveid));
    $this->sendMobileXsqjsh($leaveid, $schoolid, $weid, $tname);
    $reulset ['status'] = 1;
    $reulset ['info'] = '审核成功,已通知请假人！';
    $actop = 'shxsqj';
    $userid = $_GPC['userid'];
    $point = PointAct($weid,$schoolid,$userid,$actop);
    $point1 = PointMission($weid,$schoolid,$userid,$actop);
    if(!empty($point))
    {
        $reulset ['info'] = '审核成功,已通知请假人!积分+'.$point;
    }
    die ( json_encode ( $reulset ) );
}

if ($operation == 'sdefeid') {
    $schoolid = $_GPC['schoolid'];
    $weid = $_GPC['weid'];
    $leaveid = $_GPC['id'];
    $tname = $_GPC['tname'];
    $data = array(
        'reconet' =>  $_GPC['reconet'],
        'cltid' =>  $_GPC['tid'],
        'cltime' =>  time(),
        'status' =>  2,
    );
    pdo_update($this->table_leave, $data, array('id' => $leaveid));
    $this->sendMobileXsqjsh($leaveid, $schoolid, $weid, $tname);
    $data ['result'] = true;
    $data ['msg'] = '审核成功！';
    die ( json_encode ( $data ) );

}

if ($operation == 'savemsg') {
    if (! $_GPC ['schoolid'] || ! $_GPC ['weid']) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }
    $leave = pdo_fetch("SELECT * FROM " . tablename($this->table_leave) . " where :schoolid = schoolid And :weid = weid And :sid = sid  And :openid = openid And :isliuyan = isliuyan And :uid = uid And :bj_id = bj_id ORDER BY createtime ASC LIMIT 1", array(
        ':weid' => $_GPC['weid'],
        ':schoolid' => $_GPC ['schoolid'],
        ':openid' => $_GPC ['openid'],
        ':bj_id' => $_GPC ['bj_id'],
        ':uid' => $_GPC ['uid'],
        ':isliuyan' => 1,
        ':sid' => $_GPC ['sid']
    ));

    $time = pdo_fetch("SELECT * FROM " . tablename($this->table_leave) . " where :schoolid = schoolid And :weid = weid And :sid = sid And :uid = uid And :bj_id = bj_id ORDER BY createtime DESC LIMIT 1", array(
        ':weid' => $_GPC['weid'],
        ':schoolid' => $_GPC ['schoolid'],
        ':bj_id' => $_GPC ['bj_id'],
        ':uid' => $_GPC ['uid'],
        ':sid' => $_GPC ['sid']
    ));

    if (empty($_GPC['openid'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }else if (!empty($leave['id'])) {
        $schoolid = $_GPC['schoolid'];
        $weid = $_GPC['weid'];
        $uid = $_GPC['uid'];
        $bj_id = $_GPC['bj_id'];
        $sid = $_GPC['sid'];
        $tid = $_GPC['tid'];
        $data = array(
            'weid' =>  $_GPC ['weid'],
            'schoolid' => $_GPC ['schoolid'],
            'openid' => $_GPC ['openid'],
            'sid' => $_GPC ['sid'],
            'conet' => $_GPC ['content'],
            'bj_id' => $_GPC['bj_id'],
            'uid' => $_GPC['uid'],
            'leaveid'=>$leave['id'],
            'isliuyan'=>1,
            'createtime' => time(),
        );
        pdo_insert($this->table_leave, $data);
        $leave_id = pdo_insertid();
        $this->sendMobileJzly($leave_id, $schoolid, $weid, $uid, $bj_id, $sid, $tid);
        $data ['result'] = true;
        $data ['msg'] = '成功发送留言信息，请勿重复发送！';
        die ( json_encode ( $data ) );
    }else{

        $schoolid = $_GPC['schoolid'];

        $weid = $_GPC['weid'];

        $uid = $_GPC['uid'];

        $bj_id = $_GPC['bj_id'];

        $sid = $_GPC['sid'];

        $tid = $_GPC['tid'];

        $data = array(
            'weid' =>  $_GPC ['weid'],
            'schoolid' => $_GPC ['schoolid'],
            'openid' => $_GPC ['openid'],
            'sid' => $_GPC ['sid'],
            'conet' => $_GPC ['content'],
            'bj_id' => $_GPC['bj_id'],
            'uid' => $_GPC['uid'],
            'leaveid'=>$leave['id'],
            'isliuyan'=>1,
            'isfrist'=>1,
            'createtime' => time(),
        );
        pdo_insert($this->table_leave, $data);
        $leave_id = pdo_insertid();
        $data1 = array(
            'leaveid'=>$leave_id,
        );
        pdo_update($this->table_leave, $data1, array('id' => $leave_id));
        $this->sendMobileJzly($leave_id, $schoolid, $weid, $uid, $bj_id, $sid, $tid);
        $data ['result'] = true;
        $data ['msg'] = '成功发送留言信息，请勿重复发送！';
        die ( json_encode ( $data ) );
    }
}
if ($operation == 'stuqj_px') {
    if (! $_GPC ['schoolid'] || ! $_GPC ['weid']) {
        $result ['result'] = false;
        $result ['msg'] = '非法请求！';
    }else{
		if($_GPC['opt'] == 'check'){
			$startime = strtotime($_GPC ['startTime']);
			$endtime = strtotime($_GPC ['endTime']);
			$sid = $_GPC['sid'];
			if($startime >= time()){
				if($startime > $endtime){
					$result ['result'] = false;
					$result ['msg'] = '请假结束时间必须大于开始时间！';
				}else{
					$BuyInfo = pdo_fetchall("SELECT kcid FROM " . GetTableName('coursebuy') . " WHERE sid = '{$sid}' ");
					if(empty($BuyInfo)){
						$result ['result'] = false;
						$result ['msg'] = '抱歉,您没有报名任何课程';
					}else{
                        //判断是否已经请假
                        $kcidarr = arrayToString($BuyInfo);
                        $starttime1 = mktime(0,0,0,date("m"),date("d"),date("Y"));
			            $endtime1 = $starttime1 + 86399;
                        $hasqj = pdo_fetch("SELECT * FROM ".GetTableName('leave')." WHERE schoolid = '{$_GPC ['schoolid']}' AND sid = '{$sid}' AND FIND_IN_SET(kcid,'{$kcidarr}') AND createtime < '{$endtime1}' AND createtime > {$starttime1} AND status = 0");
                        if(empty($hasqj)){
                            $ksarr = array();
                            foreach($BuyInfo as $key => $row){
                                $ks = pdo_fetchall("SELECT id FROM " . GetTableName('kcbiao') . " WHERE kcid = '{$row['kcid']}' And (date >= {$startime} And date <= {$endtime}) ");
                                foreach($ks as $k => $r){
                                    if(!in_array($r['id'],$ksarr)){
                                        $ksarr[] = $r['id'];
                                    }
                                }
                            }
                            if(count($ksarr) > 0){
                                $result ['result'] = true;
                                $result ['ksarr'] = $ksarr;
                                $result ['ksnub'] = count($ksarr);
                            }else{
                                $result ['result'] = false;
                                $result ['msg'] = '抱歉，时间内无课程安排,无需请假！';
                            }
                        }else{
                            $result ['result'] = false;
                            $result ['msg'] = '抱歉，您的请假申请已提交，请等待处理！';
                        }
                        
					}
				}
			}else{
				$result ['result'] = false;
				$result ['msg'] = '抱歉，请假开始时间必须大于当前时间！';
			}
		}else{
			$schoolid = $_GPC['schoolid'];
			$weid = $_GPC['weid'];
            $ksarr = $_GPC['ksarr'];
            /*********************************keep_Blicklist定制病因详情************************************/
            if(keep_Blacklist() && $_GPC['is_bingyin']){
                if(!empty($_GPC['headimg_1'])){
                    load()->func('communication');
                    load()->func('file');
                    $token2 = $this->getAccessToken2();
                    $url_1 = 'https://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$token2.'&media_id='.$_GPC['headimg_1'];
                    $pic_data_1 = ihttp_request($url_1);
                    $path_1 = "images/fm_jiaoyu/img/";
                    $picurl_1 = $path_1.random(30) .".jpg";
                    file_write($picurl_1,$pic_data_1['content']);
                    if (!empty($_W['setting']['remote']['type'])) { //
                        $remotestatus = file_remote_upload($picurl_1); //
                        if (is_error($remotestatus)) {
                            message('远程附件上传失败，请检查配置并重新上传');
                        }
                    }
                }
                if(!empty($_GPC['headimg_2'])){
                    load()->func('communication');
                    load()->func('file');
                    $token2 = $this->getAccessToken2();
                    $url_2 = 'https://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$token2.'&media_id='.$_GPC['headimg_2'];
                    $pic_data_2 = ihttp_request($url_2);
                    $path_2 = "images/fm_jiaoyu/img/";
                    $picurl_2 = $path_2.random(30) .".jpg";
                    file_write($picurl_2,$pic_data_2['content']);
                    if (!empty($_W['setting']['remote']['type'])) { //
                        $remotestatus = file_remote_upload($picurl_2); //
                        if (is_error($remotestatus)) {
                            message('远程附件上传失败，请检查配置并重新上传');
                        }
                    }
                }
                $data_byinfo = array(
                    'weid'      =>  $_GPC ['weid'],
                    'schoolid'  =>  $_GPC ['schoolid'],
                    'jbname'    =>  $_GPC ['jbname'],
                    'fbtime'    =>  strtotime($_GPC ['fbtime']),
                    'qztime'    =>  strtotime($_GPC ['qztime']),
                    'hospital'  =>  $_GPC ['hospital'],
                    'jbstatus'  =>  $_GPC ['jbstatus'],
                    'zdzm'      =>  $picurl_1,
                    'blzm'      =>  $picurl_2,
                    'sqjtime'   =>  time(),
                );
                pdo_insert(GetTableName('byinfo',false), $data_byinfo);
                $byid = pdo_insertid();
                if(!empty($_GPC['mobile'])){
                    pdo_update(GetTableName('students',false),array('mobile'=>$_GPC['mobile']),array('id'=>$_GPC['sid']));
                }
            }
            /*********************************keep_Blicklist定制病因详情************************************/
			foreach($ksarr as $row){
				$ksinfo = pdo_fetch("SELECT kcid FROM " . GetTableName('kcbiao') . " WHERE id = '{$row}' ");
				$kcinfo = pdo_fetch("SELECT id,maintid FROM " . GetTableName('tcourse') . " WHERE id = '{$ksinfo['kcid']}' ");
				if($kcinfo && $ksinfo){
					$data = array(
                        'weid' =>  $_GPC ['weid'],
                        'schoolid' => $_GPC ['schoolid'],
                        'openid' => $_GPC ['openid'],
                        'sid' => $_GPC ['sid'],
                        'uid' => $_GPC['uid'],
                        'type' => $_GPC ['type'],
                        'startime1' => strtotime($_GPC ['startTime']),
                        'endtime1' => strtotime($_GPC ['endTime']),
                        'conet' => $_GPC ['content'],
                        'createtime' => time(),
						'ksid' => $row,
						'kcid' => $ksinfo['kcid'],
					);
					if(keep_Blacklist()){
                        $data['byid'] = $byid;
                    }
                    pdo_insert($this->table_leave, $data);
                    $leave_id = pdo_insertid();
                    
                    //为kcsign添加一条待老师确认请假记录
                    $data2 = array(
                        'weid' => $_GPC ['weid'],
                        'schoolid' => $_GPC ['schoolid'],
                        'kcid' => $ksinfo['kcid'],
                        'ksid' => $row,
                        'sid' => $_GPC ['sid'],
                        'createtime' => time(),
                        'signtime' => time(),
                        'status' => 1,
                        'qrtid' => $kcinfo['maintid'],
                        'qjid' => $leave_id,
                    );
					pdo_insert($this->table_kcsign, $data2);
					$this->sendMobileXsqj($leave_id, $schoolid, $weid, $kcinfo['maintid']);
				}
			}
			$result ['result'] = true;
			$result ['msg'] = '已将请假申请发送至覆盖课程的主讲老师，请勿重复申请！';
		}
	}
	die ( json_encode ( $result ) );
}
if ($operation == 'xsqingjia') {
    $data = explode ( '|', $_GPC ['json'] );
    if (! $_GPC ['schoolid'] || ! $_GPC ['weid']) {
        $result ['result'] = false;
        $result ['msg'] = '非法请求！';
    }
    $leave = pdo_fetch("SELECT * FROM " . tablename($this->table_leave) . " where :schoolid = schoolid And :weid = weid And :sid = sid And :tid = tid And :isliuyan = isliuyan ORDER BY id DESC LIMIT 1", array(
        ':weid' => $_GPC['weid'],
        ':schoolid' => $_GPC ['schoolid'],
        ':tid' => 0,
        ':isliuyan' => 0,
        ':sid' => $_GPC ['sid']
    ));

    if ((time() - $leave['createtime']) <  100) {
		$result ['result'] = false;
        $result ['msg'] = '您请假太频繁了，请待会再试！';
    }
    if (empty($_GPC['openid'])) {
		$result ['result'] = false;
        $result ['msg'] = '非法请求！';
    }else{
        /*********************************keep_Blicklist定制病因详情************************************/
        if(keep_Blacklist() && $_GPC['is_bingyin']){
            if(!empty($_GPC['headimg_1'])){
                load()->func('communication');
                load()->func('file');
                $token2 = $this->getAccessToken2();
                $url_1 = 'https://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$token2.'&media_id='.$_GPC['headimg_1'];
                $pic_data_1 = ihttp_request($url_1);
                $path_1 = "images/fm_jiaoyu/img/";
                $picurl_1 = $path_1.random(30) .".jpg";
                file_write($picurl_1,$pic_data_1['content']);
                if (!empty($_W['setting']['remote']['type'])) { //
                    $remotestatus = file_remote_upload($picurl_1); //
                    if (is_error($remotestatus)) {
                        message('远程附件上传失败，请检查配置并重新上传');
                    }
                }
            }
            if(!empty($_GPC['headimg_2'])){
                load()->func('communication');
                load()->func('file');
                $token2 = $this->getAccessToken2();
                $url_2 = 'https://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$token2.'&media_id='.$_GPC['headimg_2'];
                $pic_data_2 = ihttp_request($url_2);
                $path_2 = "images/fm_jiaoyu/img/";
                $picurl_2 = $path_2.random(30) .".jpg";
                file_write($picurl_2,$pic_data_2['content']);
                if (!empty($_W['setting']['remote']['type'])) { //
                    $remotestatus = file_remote_upload($picurl_2); //
                    if (is_error($remotestatus)) {
                        message('远程附件上传失败，请检查配置并重新上传');
                    }
                }
            }
            $data_byinfo = array(
                'weid'      =>  $_GPC ['weid'],
                'schoolid'  =>  $_GPC ['schoolid'],
                'jbname'    =>  $_GPC ['jbname'],
                'fbtime'    =>  strtotime($_GPC ['fbtime']),
                'qztime'    =>  strtotime($_GPC ['qztime']),
                'hospital'  =>  $_GPC ['hospital'],
                'jbstatus'  =>  $_GPC ['jbstatus'],
                'zdzm'      =>  $picurl_1,
                'blzm'      =>  $picurl_2,
                'sqjtime'   =>  time(),
            );
            pdo_insert(GetTableName('byinfo',false), $data_byinfo);
            $byid = pdo_insertid();
            if(!empty($_GPC['mobile'])){
                pdo_update(GetTableName('students',false),array('mobile'=>$_GPC['mobile']),array('id'=>$_GPC['sid']));
            }
        }
        /*********************************keep_Blicklist定制病因详情************************************/
        $schoolid = $_GPC['schoolid'];
        $weid = $_GPC['weid'];
        $tid = $_GPC['tid'];
        $data = array(
            'weid' =>  $_GPC ['weid'],
            'schoolid' => $_GPC ['schoolid'],
            'openid' => $_GPC ['openid'],
            'sid' => $_GPC ['sid'],
            'type' => $_GPC ['type'],
            'startime1' => strtotime($_GPC ['startTime']),
            'endtime1' => strtotime($_GPC ['endTime']),
            'conet' => $_GPC ['content'],
            'uid' => $_GPC['uid'],
            'bj_id' => $_GPC['bj_id'],
            'createtime' => time(),
        );
        if(keep_Blacklist()){
            $data['byid'] = $byid;
        }
		if($data['startime1']> time()){
			if($data['startime1'] < $data['endtime1']){
				pdo_insert($this->table_leave, $data);
				$leave_id = pdo_insertid();
				$this->sendMobileXsqj($leave_id, $schoolid, $weid, $tid);
				$result ['result'] = true;
				$result ['msg'] = '申请成功，请勿重复申请！';
			}else{
				$result ['result'] = false;
				$result ['msg'] = '请假结束时间必须大于开始时间！';
			}
		}else{
			$result ['result'] = false;
			$result ['msg'] = '请假开始时间必须大于当前时间！';
		}
    }
	die ( json_encode ( $result ) );
}

if ($operation == 'savesmsg') {
    $data = explode ( '|', $_GPC ['json'] );
    if (! $_GPC ['schoolid'] || ! $_GPC ['weid']) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }
    if (empty($_GPC['openid'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }else{
        $schoolid = $_GPC['schoolid'];
        $topenid = $_GPC['topenid'];
        $weid = $_GPC['weid'];
        $uid = $_GPC['uid'];
        $tuid = $_GPC['tuid'];
        $bj_id = $_GPC['bj_id'];
        $sid = $_GPC['sid'];
        $tid = $_GPC['tid'];
        $itemid = $_GPC['itemid'];
        $tname = $_GPC['tname'];
        $leaveid = $_GPC['leaveid'];
        $data = array(
            'weid' =>  $weid,
            'schoolid' => $schoolid,
            'openid' => $topenid,
            'sid' => $_GPC ['sid'],
            'conet' => $_GPC ['content'],
            'bj_id' => $bj_id,
            'uid' => $uid,
            'teacherid' => $tid,
            'tuid' => $tuid,
            'leaveid'=>$leaveid,
            'isliuyan'=>1,
            'createtime' => time(),
            'status' =>  2,
        );
        $data1 = array(
            'cltime' =>  time(),
            'status' =>  2,
        );
        pdo_insert($this->table_leave, $data);
        $leave_id = pdo_insertid();
        pdo_update($this->table_leave, $data1, array('id' => $itemid));
        $this->sendMobileJzlyhf($leave_id, $schoolid, $weid, $topenid, $sid, $tname, $uid);
        $data ['result'] = true;
        $data ['msg'] = '成功发送留言信息，请勿重复发送！';
        die ( json_encode ( $data ) );

    }
}
if ($operation == 'getbjlist')  {
    if (! $_GPC ['schoolid']) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }else{
        $data = array();
        $bjlist = pdo_fetchall("SELECT * FROM " . tablename($this->table_classify) . " where schoolid = '{$_GPC['schoolid']}' And weid = '{$_W['uniacid']}' And parentid = '{$_GPC['gradeId']}' And type = 'theclass' and is_over != 2 ORDER BY ssort DESC");
        $data ['bjlist'] = $bjlist;
        $data ['result'] = true;
        $data ['msg'] = '成功获取！';

        die ( json_encode ( $data ) );

    }
}
if ($operation == 'signup')  {
    $language = $_W['lanconfig']['signup'];
    if (empty($_GPC ['schoolid'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }
    if (ischeckName($_GPC['s_name']) == false) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => $language['signup_jstip7']
        ) ) );
    }
    $check1 = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE :weid = weid And :schoolid = schoolid And :s_name = s_name And :mobile = mobile And :xq_id = xq_id ", array(
        ':weid' => $_GPC['weid'],
        ':schoolid' => $_GPC['schoolid'],
        ':s_name' => trim($_GPC['s_name']),
        ':xq_id' => $_GPC['njid'],
        ':mobile' => $_GPC['mobile']
    ));
    if (!empty($check1)){
        die ( json_encode ( array (
            'result' => false,
            'msg' => $language['signup_jstip8']
        ) ) );
    }
    $check2 = pdo_fetch("SELECT * FROM " . tablename($this->table_signup) . " WHERE :weid = weid And :schoolid = schoolid And :name = name And :mobile = mobile And :sex = sex And :nj_id = nj_id ", array(
        ':weid' => $_GPC['weid'],
        ':schoolid' => $_GPC['schoolid'],
        ':name' => trim($_GPC['s_name']),
        ':sex' => $_GPC['sex'],
        ':nj_id' => $_GPC['njid'],
        ':mobile' => $_GPC['mobile']
    ));
    if (!empty($check2)){
        die ( json_encode ( array (
            'result' => false,
            'msg' => $language['signup_jstip9']
        ) ) );
    }
    if(!empty($_GPC['mobilecode'])){
        $status = check_verifycode($_GPC['mobile'], $_GPC['mobilecode'], $_GPC['weid']);
        if(!$status) {
            die ( json_encode ( array (
                'result' => false,
                'msg' => '短信验证码错误或已失效！'
            ) ) );
        }
    }
    if (empty($_GPC ['openid']))  {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }else{
        $school = pdo_fetch("SELECT signset FROM " . tablename($this->table_index) . " WHERE :id = id ", array(':id' => $_GPC['schoolid']));
        $sign = unserialize($school['signset']);
        $iscost = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " WHERE :sid = sid ", array(':sid' => $_GPC['bjid']));
        $njinfo = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " WHERE :sid = sid ", array(':sid' => $_GPC['njid']));
        $setting = pdo_fetch("SELECT * FROM " . tablename($this->table_set) . " WHERE :weid = weid", array(':weid' => $_GPC['weid']));
        if(!empty($_GPC['headimg'])){
            load()->func('communication');
            load()->func('file');
            $token2 = $this->getAccessToken2();
            $url = 'https://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$token2.'&media_id='.$_GPC['headimg'];
            $pic_data = ihttp_request($url);
            $path = "images/fm_jiaoyu/img/";
            $picurl = $path.random(30) .".jpg";
            file_write($picurl,$pic_data['content']);
            $files = IA_ROOT . "/attachment/".$picurl;
            cut($files);//裁剪
            if (!empty($_W['setting']['remote']['type'])) { //
                $remotestatus = file_remote_upload($picurl); //
                if (is_error($remotestatus)) {
                    message('远程附件上传失败，请检查配置并重新上传');
                }
            }
        }

        if(!empty($_GPC['picarr1'])){
            load()->func('communication');
            load()->func('file');
            $token2 = $this->getAccessToken2();
            $url_1 = 'https://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$token2.'&media_id='.$_GPC['picarr1'];
            $pic_data_1 = ihttp_request($url_1);
            $path_1 = "images/fm_jiaoyu/img/";
            $picurl_1 = $path_1.random(30) .".jpg";
            file_write($picurl_1,$pic_data_1['content']);
            if (!empty($_W['setting']['remote']['type'])) { //
                $remotestatus = file_remote_upload($picurl_1); //
                if (is_error($remotestatus)) {
                    message('远程附件上传失败，请检查配置并重新上传');
                }
            }
        }

        if(!empty($_GPC['picarr2'])){
            load()->func('communication');
            load()->func('file');
            $token2 = $this->getAccessToken2();
            $url_2 = 'https://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$token2.'&media_id='.$_GPC['picarr2'];
            $pic_data_2 = ihttp_request($url_2);
            $path_2 = "images/fm_jiaoyu/img/";
            $picurl_2 = $path_2.random(30) .".jpg";
            file_write($picurl_2,$pic_data_2['content']);
            if (!empty($_W['setting']['remote']['type'])) { //
                $remotestatus = file_remote_upload($picurl_2); //
                if (is_error($remotestatus)) {
                    message('远程附件上传失败，请检查配置并重新上传');
                }
            }
        }

        if(!empty($_GPC['picarr3'])){
            load()->func('communication');
            load()->func('file');
            $token2 = $this->getAccessToken2();
            $url_3 = 'https://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$token2.'&media_id='.$_GPC['picarr3'];
            $pic_data_3 = ihttp_request($url_3);
            $path_3 = "images/fm_jiaoyu/img/";
            $picurl_3 = $path_3.random(30) .".jpg";
            file_write($picurl_3,$pic_data_3['content']);
            if (!empty($_W['setting']['remote']['type'])) { //
                $remotestatus = file_remote_upload($picurl_3); //
                if (is_error($remotestatus)) {
                    message('远程附件上传失败，请检查配置并重新上传');
                }
            }
        }

        if(!empty($_GPC['picarr4'])){
            load()->func('communication');
            load()->func('file');
            $token2 = $this->getAccessToken2();
            $url_4 = 'https://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$token2.'&media_id='.$_GPC['picarr4'];
            $pic_data_4 = ihttp_request($url_4);
            $path_4 = "images/fm_jiaoyu/img/";
            $picurl_4 = $path_4.random(30) .".jpg";
            file_write($picurl_4,$pic_data_4['content']);
            if (!empty($_W['setting']['remote']['type'])) { //
                $remotestatus = file_remote_upload($picurl_4); //
                if (is_error($remotestatus)) {
                    message('远程附件上传失败，请检查配置并重新上传');
                }
            }
        }

        if(!empty($_GPC['picarr5'])){
            load()->func('communication');
            load()->func('file');
            $token2 = $this->getAccessToken2();
            $url_5 = 'https://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$token2.'&media_id='.$_GPC['picarr5'];
            $pic_data_5 = ihttp_request($url_5);
            $path_5 = "images/fm_jiaoyu/img/";
            $picurl_5 = $path_5.random(30) .".jpg";
            file_write($picurl_5,$pic_data_5['content']);
            if (!empty($_W['setting']['remote']['type'])) {
                $remotestatus = file_remote_upload($picurl_5);
                if (is_error($remotestatus)) {
                    message('远程附件上传失败，请检查配置并重新上传');
                }
            }
        }
        $temp = array(
            'weid' => $_GPC['weid'],
            'schoolid' => $_GPC['schoolid'],
            'name' => trim($_GPC['s_name']),
            'icon' => $picurl,
            'sex' => $_GPC['sex'],
            'mobile' => trim($_GPC['mobile']),
            'nj_id' => $_GPC['njid'],
            'bj_id' => $_GPC['bjid'],
            'idcard' => $_GPC['idcard'],
            'numberid' => trim($_GPC['numberid']),
            'birthday' => strtotime($_GPC['birthday']),
            'uid' => $_GPC['uid'],
            'openid' => $_GPC['openid'],
            'createtime' => time(),
            'cost' => $iscost['cost'],
            'pard' => $_GPC['pard'],
            'status' => 1,
            'picarr1' => $picurl_1,
            'picarr2' => $picurl_2,
            'picarr3' => $picurl_3,
            'picarr4' => $picurl_4,
            'picarr5' => $picurl_5,
            'textarr1'=> $_GPC['textarr1'],
            'textarr2'=> $_GPC['textarr2'],
            'textarr3'=> $_GPC['textarr3'],
            'textarr4'=> $_GPC['textarr4'],
            'textarr5'=> $_GPC['textarr5'],
            'textarr6'=> $_GPC['textarr6'],
            'textarr7'=> $_GPC['textarr7'],
            'textarr8'=> $_GPC['textarr8'],
            'textarr9'=> $_GPC['textarr9'],
            'textarr10'=> $_GPC['textarr10'],
        );

        pdo_insert($this->table_signup, $temp);


        $signup_id = pdo_insertid();
        if (!empty($iscost['cost'])){
            $temp1 = array(
                'weid' =>  $_GPC['weid'],
                'schoolid' => $_GPC['schoolid'],
                'type' => 4,
                'status' => 1,
                'uid' => $_GPC['uid'],
                'cose' => $iscost['cost'],
                'orderid' => time(),
                'signid' => $signup_id,
                'payweid' => $sign['payweid'],
                'createtime' => time(),
            );
            pdo_insert($this->table_order, $temp1);
            $order_id = pdo_insertid();
            pdo_update($this->table_signup, array('orderid' => $order_id), array('id' =>$signup_id));
        }
        $randStr = str_shuffle('1234567890');
        $rand    = substr($randStr, 0, 6);
        $this->sendMobileBmshtz($signup_id, $_GPC['schoolid'], $_GPC['weid'], $njinfo['tid'], $_GPC['s_name'], $rand);
        $data ['result'] = true;
        $data ['msg'] = '提交成功！';

        die ( json_encode ( $data ) );

    }
}

if ($operation == 'txshbm')  {
    if (empty($_GPC ['schoolid'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }
    $signup_id = $_GPC['id'];
    $check1 = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE :weid = weid And :schoolid = schoolid And :s_name = s_name And :mobile = mobile ", array(
        ':weid' => $_GPC['weid'],
        ':schoolid' => $_GPC['schoolid'],
        ':s_name' => trim($_GPC['s_name']),
        ':mobile' => $_GPC['mobile']
    ));
    $order = pdo_fetch("SELECT * FROM " . tablename($this->table_order) . " where signid = :signid ", array(':signid' => $signup_id));
    $iscost = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " WHERE :sid = sid ", array(':sid' => $_GPC['bjid']));
    $item = pdo_fetch("SELECT * FROM " . tablename($this->table_signup) . " where :id = id", array(':id' => $signup_id));
    $nowtime = time();
    $lasttime = $nowtime - $item['lasttime'];

    if ($lasttime <= 180){
        die ( json_encode ( array (
            'result' => false,
            'msg' => '抱歉,您提醒的频率过高,请稍后再试!'
        ) ) );
    }
    if (!empty($check1)){
        die ( json_encode ( array (
            'result' => false,
            'msg' => '该生已录入学校系统,无需重复报名!'
        ) ) );
    }
    if (!empty($iscost['cost'])){
        if ($order['status'] == 1){
            die ( json_encode ( array (
                'result' => false,
                'msg' => '抱歉!您尚未付费,请您先支付报名费!'
            ) ) );
        }
    }
    if (empty($_GPC ['openid']))  {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }else{
        $school = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " WHERE :id = id ", array(':id' => $_GPC['schoolid']));
        $njinfo = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " WHERE :sid = sid ", array(':sid' => $_GPC['njid']));
        $setting = pdo_fetch("SELECT * FROM " . tablename($this->table_set) . " WHERE :weid = weid", array(':weid' => $_GPC['weid']));
        pdo_update($this->table_signup, array('lasttime' => time()), array('id' => $signup_id));
        $this->sendMobileBmshtz($signup_id, $_GPC['schoolid'], $_GPC['weid'], $njinfo['tid'], $_GPC['s_name']);
        $data ['result'] = true;
        $data ['msg'] = '提醒成功,请勿频繁操作！';
        die ( json_encode ( $data ) );
    }
}
if ($operation == 'xgxsinfo')  {
    if (empty($_GPC ['schoolid'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }
    $check = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE :weid = weid And :schoolid = schoolid And :s_name = s_name And :mobile = mobile And :xq_id = xq_id ", array(
        ':weid' => $_GPC['weid'],
        ':schoolid' => $_GPC['schoolid'],
        ':s_name' => trim($_GPC['s_name']),
        ':xq_id' => $_GPC['njid'],
        ':mobile' => $_GPC['mobile']
    ));
    if (!empty($check)){
        die ( json_encode ( array (
            'result' => false,
            'msg' => '该生已录入学校,无需重复审核！'
        ) ) );
    }
    if (empty($_GPC ['openid']))  {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }else{
        $iscost = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " WHERE :sid = sid ", array(':sid' => $_GPC['bjid']));
        $njinfo = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " WHERE :sid = sid ", array(':sid' => $_GPC['njid']));
        $njzr = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " WHERE :id = id ", array(':id' => $njinfo['tid']));
        $item = pdo_fetch("SELECT * FROM " . tablename($this->table_signup) . " WHERE :id = id", array(':id' => $_GPC['id']));
        $order = pdo_fetch("SELECT * FROM " . tablename($this->table_order) . " WHERE :id = id", array(':id' => $item['orderid']));
        $temp = array(
            'weid' => $_GPC['weid'],
            'schoolid' => $_GPC['schoolid'],
            'name' => trim($_GPC['s_name']),
            'numberid' => $_GPC['numberid'],
            'sex' => $_GPC['sex'],
            'mobile' => $_GPC['mobile'],
            'nj_id' => $_GPC['njid'],
            'bj_id' => $_GPC['bjid'],
            'idcard' => $_GPC['idcard'],
            'pard' => $_GPC['pard'],
            'birthday' => strtotime($_GPC['birthday']),
            'cost' => $iscost['cost'],
            'textarr1'=>$_GPC['textarr1'],
            'textarr2'=>$_GPC['textarr2'],
            'textarr3'=>$_GPC['textarr3'],
            'textarr4'=>$_GPC['textarr4'],
            'textarr5'=>$_GPC['textarr5'],
            'textarr6'=>$_GPC['textarr6'],
            'textarr7'=>$_GPC['textarr7'],
            'textarr8'=>$_GPC['textarr8'],
            'textarr9'=>$_GPC['textarr9'],
            'textarr10'=>$_GPC['textarr10'],
        );
        pdo_update($this->table_signup, $temp, array('id' => $_GPC['id']));
        if (!empty($iscost['cost'])){
            if (empty($order)) {
                $temp1 = array(
                    'weid' =>  $_GPC['weid'],
                    'schoolid' => $_GPC['schoolid'],
                    'type' => 4,
                    'status' => 1,
                    'uid' => $item['uid'],
                    'cose' => $iscost['cost'],
                    'orderid' => time(),
                    'signid' => $_GPC['id'],
                    'createtime' => time(),
                );
                pdo_insert($this->table_order, $temp1);
                $order_id = pdo_insertid();
                pdo_update($this->table_signup, array('orderid' => $order_id), array('id' =>$_GPC['id']));
                $this->sendMobileBmshjg($_GPC['id'], $_GPC['schoolid'], $_GPC['weid'], $item['openid'], $_GPC['s_name']);
            }else{
                $this->sendMobileBmshjg($_GPC['id'], $_GPC['schoolid'], $_GPC['weid'], $item['openid'], $_GPC['s_name']);
            }
        }else{
            $this->sendMobileBmshjg($_GPC['id'], $_GPC['schoolid'], $_GPC['weid'], $item['openid'], $_GPC['s_name']);
        }

        $data ['result'] = true;
        $data ['msg'] = '信息修改成功！';

        die ( json_encode ( $data ) );
    }
}

if ($operation == 'tgsq')  {
    if (empty($_GPC ['openid'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }else{
        $item = pdo_fetch("SELECT * FROM " . tablename($this->table_signup) . " WHERE :id = id", array(':id' => $_GPC['id']));
        $school = pdo_fetch("SELECT signset,is_stuewcode,spic FROM " . tablename($this->table_index) . " where id = :id ", array(':id' => $item['schoolid']));
        $randStr = str_shuffle('123456789');
        $rand    = substr($randStr, 0, 6);
        $temp = array(
            'weid' => $item['weid'],
            'schoolid' => $item['schoolid'],
            'icon' => $item['icon'],
            's_name' => $item['name'],
            'sex' => $item['sex'],
            'numberid' => $item['numberid'],
            'mobile' => $item['mobile'],
            'xq_id' => $item['nj_id'],
            'bj_id' => $item['bj_id'],
            'note' => $item['idcard'],
            'code' => $rand,
            'birthdate' => $item['birthday'],
            'seffectivetime' => time(),
            'createdate' => time()
        );
        pdo_insert($this->table_students, $temp);
        $studentid = pdo_insertid();
        if($school['is_stuewcode'] ==1){
            if(empty($item['icon'])){
                if(empty($school['spic'])){
                    die ( json_encode ( array (
                        'result' => false,
                        'msg' => '抱歉,本校开启了用户二维码功能,请上传学生头像或设置校园默认学生头像'
                    ) ) );
                }
            }
            load()->func('tpl');
            load()->func('file');
            $barcode = array(
                'expire_seconds' =>2592000,
                'action_name' => '',
                'action_info' => array(
                    'scene' => array(
                        'scene_id' => $studentid
                    ),
                ),
            );
            $uniacccount = WeAccount::create($wwwweid);
            $barcode['action_name'] = 'QR_SCENE';
            $result = $uniacccount->barCodeCreateDisposable($barcode);
            if (is_error($result)) {
                message($result['message'], referer(), 'fail');
            }
            if (!is_error($result)) {
                $showurl = $this->createImageUrlCenterForUser("https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=" . $result['ticket'], $studentid, 0, $schoolid);
                $urlarr = explode('/',$showurl);
                $qrurls = "images/fm_jiaoyu/".$urlarr['4'];
                $insert = array(
                    'weid' => $item['weid'],
                    'schoolid' => $item['schoolid'],
                    'qrcid' => $studentid,
                    'name' => '用户绑定临时二维码',
                    'model' => 1,
                    'qr_url' => ltrim($result['url'],"http://weixin.qq.com/q/"),
                    'ticket' => $result['ticket'],
                    'show_url' => $qrurls,
                    'expire' => $result['expire_seconds'] + time(),
                    'createtime' => time(),
                    'status' => '1',
                    'type' => '3'
                );
                pdo_insert($this->table_qrinfo, $insert);
                $qrid = pdo_insertid();
                $qrurl = pdo_fetch("SELECT show_url FROM " . tablename($this->table_qrinfo) . " WHERE id = '{$qrid}'");
                $arr = explode('/',$qrurl['show_url']);
                $pathname = "images/fm_jiaoyu/".$arr['2'];
                if (!empty($_W['setting']['remote']['type'])) {
                    $remotestatus = file_remote_upload($pathname);
                    if (is_error($remotestatus)) {
                        message('远程附件上传失败，'.$pathname.'请检查配置并重新上传');
                    }
                }
            }
        }
        $singset = iunserializer($school['signset']);
        if($singset['is_bd'] ==1){
            if(!empty($item['pard'])){
                if($item['pard'] == 2){
                    $data = array(
                        'numberid' => $item['numberid'],
                        'mom' => $item['openid'],
                        'muid'=> $item['uid']
                    );
                    $info = array ('name' => '','mobile' => $item ['mobile']);
                }
                if($item['pard'] == 3){
                    $data = array(
                        'numberid' => $item['numberid'],
                        'dad' => $item['openid'],
                        'duid'=> $item['uid']
                    );
                    $info = array ('name' => '','mobile' => $item ['mobile']);
                }
                if($item['pard'] == 4){
                    $data = array(
                        'numberid' => $item['numberid'],
                        'own' => $item['openid'],
                        'ouid'=> $item['uid']
                    );
                    $info = array ('name' => $item ['name'],'mobile' => $item ['mobile']);
                }
                if($item['pard'] == 5){
                    $data = array(
                        'numberid' => $item['numberid'],
                        'other' => $item['openid'],
                        'otheruid'=> $item['uid']
                    );
                    $info = array ('name' => $item ['name'],'mobile' => $item ['mobile']);
                }
                $temp2 = array(
                    'sid' => $studentid,
                    'weid' =>  $item ['weid'],
                    'schoolid' => $item ['schoolid'],
                    'openid' => $item ['openid'],
                    'pard' => $item['pard'],
                    'uid' => $item['uid']
                );
				$temp2['realname'] = $info['name'];
				$temp2['mobile'] = $info['mobile'];
                pdo_insert($this->table_user, $temp2);
                $userid = pdo_insertid();
                if($item['pard'] == 2){
                    $data['muserid'] = $userid;
                }
                if($item['pard'] == 3){
                    $data['duserid'] = $userid;
                }
                if($item['pard'] == 4){
                    $data['ouserid'] = $userid;
                }
                if($item['pard'] == 5){
                    $data['otheruserid'] = $userid;
                }
                $data['keyid'] = $studentid;
                $data['qrcode_id'] = $qrid;
                pdo_update($this->table_students, $data, array('id' => $studentid));
            }
        }

        $temp1 = array(
            'sid' => $studentid,
            'status' => 2,
            'passtime' => time()
        );

        pdo_update($this->table_signup, $temp1, array('id' => $_GPC['id']));
        $this->sendMobileBmshjgtz($_GPC['id'], $item['schoolid'], $item['weid'], $item['openid'], $item['name'],$rand);
        $data ['result'] = true;
        $data ['msg'] = '审核成功,已录入学生系统！';

        die ( json_encode ( $data ) );

    }
}

if ($operation == 'jjsq')  {
    if (empty($_GPC ['openid'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }else{
        $item = pdo_fetch("SELECT * FROM " . tablename($this->table_signup) . " WHERE :id = id", array(':id' => $_GPC['id']));

        $temp = array(
            'status' => 3,
            'passtime' => time()
        );

        pdo_update($this->table_signup, $temp, array('id' => $_GPC['id']));
        $rand = 111;
        $this->sendMobileBmshjgtz($_GPC['id'], $item['schoolid'], $item['weid'], $item['openid'], $item['name'],$rand);
        $data ['result'] = true;
        $data ['msg'] = '已拒绝该生申请,您还可以执行通过操作！';

        die ( json_encode ( $data ) );

    }
}
if ($operation == 'bangdingcardjforteacher')  {
    $lastedittime = time();
    if (empty($_GPC ['openid'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }
    $checkcard = pdo_fetch("SELECT pard,id FROM " . tablename($this->table_idcard) . " WHERE :weid = weid And :schoolid = schoolid And :idcard = idcard", array(
        ':weid' => $_GPC['weid'],
        ':schoolid' => $_GPC['schoolid'],
        ':idcard' => $_GPC['idcard']
    ));


    $school = pdo_fetch("SELECT is_cardlist FROM " . tablename($this->table_index) . " WHERE id = :id ", array(':id' => $_GPC['schoolid']));
    if ($school['is_cardlist'] ==1){
        if (empty($checkcard)) {
            die ( json_encode ( array (
                'result' => false,
                'msg' => '抱歉,本校无此卡号！'
            ) ) );
        }
    }
    if (!empty($checkcard['pard'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '本卡已被绑定！'
        ) ) );
    }else{
        $teacher = pdo_fetch("SELECT tname,thumb FROM " . tablename($this->table_teachers) . " WHERE id = :id ", array(':id' => $_GPC['tid']));
        $temp = array(
            'weid' => $_GPC['weid'],
            'schoolid' => $_GPC['schoolid'],
            'idcard' => $_GPC['idcard'],
            'tid' => $_GPC['tid'],
            'pname' => $teacher['tname'],
            'pard' => 1,
            'tpic'=>$teacher['thumb'],
            'usertype' => 1,
            'is_on' => 1,
            'createtime' => time(),
            'severend' => 4114507889,
            'lastedittime'=>$lastedittime
        );
        $WtCardId = 0;
        if ($school['is_cardlist'] ==1){
            pdo_update($this->table_idcard, $temp, array('id' =>$checkcard['id']));
            $WtCardId = $checkcard['id'];
        }else{
            pdo_insert($this->table_idcard, $temp);
            $WtCardId = pdo_insertid();
        }

        if(keep_wt() && CheckWtOn($_GPC['schoolid'])){
            $schoolid = $_GPC['schoolid'];
            $weid = $_GPC['weid'];
            mload()->model('wt');
            //新增人员
            $param['idcardNo']  = $WtCardId;
            $param['idNo']      = $_GPC['idcard'];
            $param['name']      = $teacher['tname'];
            $result = personAction($schoolid, $weid, time(), $param, 'insert', 'idcard');  //新增人员
            if($result['result'] == '1'){
                $guid =$result['data']['guid'];
                pdo_update(GetTableName('idcard',false),array('guid'=>$guid),array('id'=>$WtCardId)); //保存 guid
                $result_device =  People2Device($schoolid, $weid, time(),$guid); //授权设备
                if($result_device['result'] == '1'){
                    $imgurl      = tomedia($teacher['thumb']);
                    $result_face = PersonFace($schoolid, $weid, time(), $guid, $imgurl); //注册照片
                    if ($result_face['result'] == '1') {
                        pdo_update(GetTableName('idcard', false), array('photo_guid' => $result_face['data']['guid']), array('id' =>$WtCardId)); //保存照片guid
                    }else{
                        $back_msg = CheckWtReturnCode($result_face['code']);
                    }
                }else{
                    $back_msg = CheckWtReturnCode($result_device['code']);
                }
            }else{
                $back_msg = CheckWtReturnCode($result['code']);
            }
        }
        //创建更新卡信息任务
        if(is_showZB()) {
            CreateHBtodo_ZB($_GPC['schoolid'], $_GPC['weid'], $lastedittime, 14);
        }
        $data ['result'] = true;
        $data ['msg'] = '绑定成功！';

        die ( json_encode ( $data ) );

    }
}
if ($operation == 'bangdingcardjl')  {
    if (empty($_GPC ['openid'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }
    $lastedittime = time();
    $checkcard = pdo_fetch("SELECT * FROM " . tablename($this->table_idcard) . " WHERE :weid = weid And :schoolid = schoolid And :idcard = idcard", array(
        ':weid' => $_GPC['weid'],
        ':schoolid' => $_GPC['schoolid'],
        ':idcard' => $_GPC['idcard']
    ));
    if (empty($_GPC['username'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '请输入持卡人姓名！'
        ) ) );
    }
    if (!empty($checkcard['pard'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '本卡已被绑定！'
        ) ) );
    }
    $school = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " WHERE id = :id ", array(':id' => $_GPC['schoolid']));
    if ($school['is_cardlist'] ==1){
        if (empty($checkcard)) {
            die ( json_encode ( array (
                'result' => false,
                'msg' => '抱歉,本校无此卡号！'
            ) ) );
        }
    }
    $pard = pdo_fetch("SELECT * FROM " . tablename($this->table_idcard) . " WHERE :weid = weid And :schoolid = schoolid And :idcard = idcard And :sid = sid And :pard = pard", array(
        ':weid' => $_GPC['weid'],
        ':schoolid' => $_GPC['schoolid'],
        ':idcard' => $_GPC['idcard'],
        ':sid' => $_GPC['sid'],
        ':pard' => $_GPC['pard']
    ));
    if (!empty($pard)) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '你选择的关系已经绑定其他卡！'
        ) ) );
    }else{
        $WtCardId = 0;
        if($school['is_cardpay'] == 1){
            $card = unserialize($school['cardset']);
            if($card['cardtime'] == 1){
                if($checkcard['is_frist'] ==1){
                    $severend = $card['endtime1'] * 86400 + time();
                }else{
                    $severend = time();
                }
            }else{
                $severend = $card['endtime2'];
            }
            $student =pdo_fetch("SELECT * FROM " . GetTableName('students') . " WHERE :weid = weid And :schoolid = schoolid And :id = id ",array(
                ':weid' => $_GPC['weid'],
                ':schoolid' => $_GPC['schoolid'],
                ':id' => $_GPC['sid'],
            ));
            $temp = array(
                'weid' => $_GPC['weid'],
                'schoolid' => $_GPC['schoolid'],
                'idcard' => $_GPC['idcard'],
                'sid' => $_GPC['sid'],
                'bj_id' => $_GPC['bj_id'],
                'pname' => $_GPC['username'],
                'pard' => $_GPC['pard'],
                'usertype' => 0,
                'is_on' => 1,
                'createtime' => time(),
                'severend' => $severend,
                'lastedittime' =>$lastedittime
            );
            if($temp['pard'] == 1){
                if(!keep_wt() && CheckWtOn($_GPC['schoolid'])){
                    $temp['spic'] =$student['icon'];
                }
            }
            if ($school['is_cardlist'] ==1){
                pdo_update($this->table_idcard, $temp, array('id' =>$checkcard['id']));
                $WtCardId = $checkcard['id'];
            }else{
                pdo_insert($this->table_idcard, $temp);
                $WtCardId = pdo_insertid();
            }
            if(is_showZB()) {
                CreateHBtodo_ZB($_GPC['schoolid'], $_GPC['weid'], $lastedittime, 14);
            }
        }else{
            $temp2 = array(
                'weid' => $_GPC['weid'],
                'schoolid' => $_GPC['schoolid'],
                'idcard' => $_GPC['idcard'],
                'sid' => $_GPC['sid'],
                'bj_id' => $_GPC['bj_id'],
                'pard' => $_GPC['pard'],
                'pname' => $_GPC['username'],
                'usertype' => 0,
                'is_on' => 1,
                'createtime' => time(),
                'lastedittime' =>$lastedittime
            );
            if ($school['is_cardlist'] ==1){
                pdo_update($this->table_idcard, $temp2, array('id' =>$checkcard['id']));
                $WtCardId = $checkcard['id'];
            }else{
                pdo_insert($this->table_idcard, $temp2);
                $WtCardId = pdo_insertid();
            }
            if(is_showZB()) {
                CreateHBtodo_ZB($_GPC['schoolid'], $_GPC['weid'], $lastedittime, 14);
            }
        }

        if(keep_wt() && CheckWtOn($_GPC['schoolid'])){
            $schoolid = $_GPC['schoolid'];
            $weid = $_GPC['weid'];
            mload()->model('wt');
            $student = pdo_fetch("SELECT * FROM " . GetTableName('students') . " where id = :id ", array(':id' => $_GPC['sid']));
            $param['idcardNo']  = $WtCardId;
            $param['idNo']      = $_GPC['idcard'];
            $CardPname = '';
            if(!empty($_GPC['username'])){
                $CardPname = $_GPC['username'];
            }else{
                $student = pdo_fetch("SELECT * FROM " . GetTableName('students') . " where id = :id ", array(':id' => $value['sid']));

                if($_GPC['pard'] == 1){
                    $CardPname = $student['s_name']."";
                    $picurl = $student['icon'];
                }
                if($_GPC['pard'] == 2){
                    $CardPname = $student['s_name']."妈妈";
                }
                if($_GPC['pard'] == 3){
                    $CardPname = $student['s_name']."爸爸";
                }
                if($_GPC['pard'] == 4){
                    $CardPname = $student['s_name']."爷爷";
                }
                if($_GPC['pard'] == 5){
                    $CardPname = $student['s_name']."奶奶";
                }
                if($_GPC['pard'] == 6){
                    $CardPname = $student['s_name']."外公";
                }
                if($_GPC['pard'] == 7){
                    $CardPname = $student['s_name']."外婆";
                }
                if($_GPC['pard'] == 8){
                    $CardPname = $student['s_name']."叔叔";
                }
                if($_GPC['pard'] == 9){
                    $CardPname = $student['s_name']."阿姨";
                }
                if($_GPC['pard'] == 10){
                    $CardPname = $student['s_name']."其他家长";
                }
            }
            $param['name'] = $CardPname;
            $result = personAction($schoolid, $weid, time(), $param, 'insert', 'idcard');  //新增人员
            if($result['result'] == '1'){
                $guid =$result['data']['guid'];
                pdo_update(GetTableName('idcard',false),array('guid'=>$guid),array('id'=>$WtCardId)); //保存 guid
                $result_device =  People2Device($schoolid, $weid, time(),$guid); //授权设备
                if($result_device['result'] == '1'){
                    if(!empty($picurl)){
                        $imgurl      = tomedia($picurl);
                        $result_face = PersonFace($schoolid, $weid, time(), $guid, $imgurl); //注册照片
                        if ($result_face['result'] == '1') {
                            pdo_update(GetTableName('idcard', false), array('photo_guid' => $result_face['data']['guid'],'spic'=>$picurl), array('id' => $WtCardId)); //保存照片guid
                        }else{
                            $back_msg = CheckWtReturnCode($result_face['code']);
                        }
                    }
                }else{
                    $back_msg = CheckWtReturnCode($result_device['code']);
                }
            }else{
                $back_msg = CheckWtReturnCode($result['code']);
            }
        }
        $data ['result'] = true;
        $data ['msg'] = '绑定成功！';
        if(!empty($back_msg)){
            $data ['msg'] .= "|". $back_msg;
        }
        die ( json_encode ( $data ) );

    }
}
if ($operation == 'jbidcard')  {
    $item = pdo_fetch("SELECT * FROM " . tablename($this->table_idcard) . " WHERE :id = id", array(':id' => $_GPC['id']));
    if (empty($item)) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '无此卡！'
        ) ) );
    }else{
        $temp = array(
            'sid' => 0,
            'tid' => 0,
            'pard'=> 0,
            'bj_id'=> 0,
            'is_on'=> 0,
            'usertype'=> 3,
            //'createtime'=> '',
            'pname'=> '',
            //'severend'=> '',
            'spic'=> '',
            'tpic'=> '',
        );
        pdo_update($this->table_idcard, $temp, array('id' => $_GPC['id']));
        $data ['result'] = true;
        $data ['msg'] = '解绑成功！';


        if(keep_wt() && CheckWtOn($item['schoolid'])){
            mload()->model('wt');
            $schoolid = $item['schoolid'];
            $weid = $item['weid'];

            $guid = pdo_fetch("SELECT guid FROM " . GetTableName('idcard') . " WHERE id = :id", array(':id' =>$_GPC['id']));
            if(!empty($guid)) {
                $param['guid'] = $guid['guid'];
                $result        = personAction($schoolid, $weid, time(), $param, 'delete', '');
                if ($result['result'] != 1) {
                    $data ['result'] = false;
                    $data ['msg']    = CheckWtReturnCode($result_face['code']);
                    die (json_encode($data));
                }
            }
        }


        die ( json_encode ( $data ) );

    }
}

if ($operation == 'changeimg') {
    load()->func('communication');
    load()->func('file');
    $token2 = $this->getAccessToken2();
    $photoUrl = $_GPC ['bigImage'];
    $student = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE :id = id", array(':id' => $_GPC['sid']));
    if (empty($student)) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '没找到本学生！'
        ) ) );
    }else{
        if(!empty($photoUrl)) {
            $url = 'https://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$token2.'&media_id='.$photoUrl;
            $pic_data = ihttp_request($url);
            $path = "images/fm_jiaoyu/";
            $picurl = $path.random(30) .".jpg";
            file_write($picurl,$pic_data['content']);
            $files = IA_ROOT . "/attachment/".$picurl;
            cut($files);
            if (!empty($_W['setting']['remote']['type'])) { //
                $remotestatus = file_remote_upload($picurl); //
                if (is_error($remotestatus)) {
                    message('远程附件上传失败，请检查配置并重新上传');
                }
            }
        }
        if(!(keep_wt() && CheckWtOn($student['schoolid']))) {
            if ($student['keyid'] != 0) {
                $allstu = pdo_fetchall("SELECT id FROM " . tablename($this->table_students) . " WHERE :keyid = keyid", array(':keyid' => $student['keyid']));
                foreach ($allstu as $key => $value) {
                    pdo_update($this->table_students, array('icon' => $picurl), array('id' => $value['id']));
                }
            } else {
                pdo_update($this->table_students, array('icon' => $picurl), array('id' => $student['id']));
            }
        }else{
            mload()->model('wt');
            $schoolid = $student['schoolid'];
            $weid = $student['weid'];
            $guid = pdo_fetch("SELECT guid,photo_guid FROM " . GetTableName('idcard') . " WHERE sid = :sid AND pard = :pard", array(':sid' =>$student['id'],':pard'=>1));
            $imgurl = tomedia($picurl);
            //上传新的
            $result_face = PersonFace($schoolid, $weid, time(),$guid['guid'],$imgurl);
            $result_device =  People2Device($schoolid, $weid, time(),$guid['guid']); //授权设备
            $data ['msg_device'] = CheckWtReturnCode($result_device['code']);
            if($result_face['result'] == '1'){
                //删除旧的
                DeleteFace($schoolid, $weid, time(),$guid['guid'],$guid['photo_guid']);
                pdo_update(GetTableName('students',false),array('photo_guid'=>$result_face['data']['guid']),array('id'=>$student['id']));
                if ($student['keyid'] != 0) {
                    $allstu = pdo_fetchall("SELECT id FROM " . tablename($this->table_students) . " WHERE :keyid = keyid", array(':keyid' => $student['keyid']));
                    foreach ($allstu as $key => $value) {
                        pdo_update($this->table_students, array('icon' => $picurl), array('id' => $value['id']));
                    }
                } else {
                    pdo_update($this->table_students, array('icon' => $picurl), array('id' => $student['id']));
                }
            }else{
                $data ['result'] = false;
                $data ['msg'] = CheckWtReturnCode($result_face['code']);
                die ( json_encode ( $data ) );
            }
        }
		$data ['newpic'] = tomedia($picurl);
        $data ['result'] = true;
        $data ['msg'] = '修改头像成功';

        die ( json_encode ( $data ) );

    }
}

if ($operation == 'changeimgt') {
	load()->func('communication');
	load()->func('file');

	$token2 = $this->getAccessToken2();
	$photoUrl = $_GPC ['bigImage'];
	$data = explode ( '|', $_GPC ['json'] );
	$teacher = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " WHERE :id = id", array(':id' => $_GPC['tid']));

	if (empty($teacher)) {
		die ( json_encode ( array (
			'result' => false,
			'msg' => '没找到该教师信息！' 
		) ) );
	}else{			
		if(!empty($photoUrl)) {		 
			$url = 'https://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$token2.'&media_id='.$photoUrl;
			$pic_data = ihttp_request($url);
			$path = "images/fm_jiaoyu/";
			$picurl = $path.random(30) .".jpg";
			$picurl3 = $path.random(30) .".jpg";
			file_write($picurl,$pic_data['content']);
			file_write($picurl3,$pic_data['content']);
			$files = IA_ROOT . "/attachment/".$picurl;
			$files2 = IA_ROOT . "/attachment/".$picurl3;
			cut($files);
			cut($files2);
			if (!empty($_W['setting']['remote']['type'])) { // 
				$remotestatus = file_remote_upload($picurl); //
				if (is_error($remotestatus)) {
					message('远程附件上传失败，请检查配置并重新上传');					
				}
			}
		}
		$newpic = tomedia($picurl3);
		if(keep_wt() && CheckWtOn($teacher['schoolid'])){
			mload()->model('wt');
			$schoolid = $teacher['schoolid'];
			$weid = $teacher['weid'];
			$guid = pdo_fetch("SELECT guid,photo_guid FROM " . GetTableName('idcard') . " WHERE tid = :tid", array(':tid' =>$_GPC['tid']));
			$imgurl = tomedia($picurl);
			//上传新的
			$result_face = PersonFace($schoolid, $weid, time(),$guid['guid'],$imgurl);
		$result_device =  People2Device($schoolid, $weid, time(),$guid['guid']); //授权设备
			$data ['msg_device'] = CheckWtReturnCode($result_device['code']);
			if($result_face['result'] == '1'){
				//删除旧的
				DeleteFace($schoolid, $weid, time(),$guid['guid'],$guid['photo_guid']);
				pdo_update(GetTableName('teachers',false),array('photo_guid'=>$result_face['data']['guid'],'thumb' => $picurl),array('id'=>$_GPC['tid']));
			}elseif($result_face['result'] == '0'){
				$data ['result'] = false;
				$data ['msg'] = '修改失败，请确认头像合法后重新上传';
				die ( json_encode ( $data ) );
			}
		}else{
			$allcard = pdo_fetchall("SELECT id,idcard,tpic FROM " . GetTableName('idcard') . " WHERE :tid = tid", array(':tid' => $_GPC['tid']));
			$schoolid = $teacher['schoolid'];
			if($allcard){
				$path = "images/fm_jiaoyu/cardthumb/".$schoolid."/";
				foreach($allcard as $row){
					if(strstr($row['tpic'],'/cardthumb/')){
						file_delete($row['tpic']);
					}
					$picurl2 = $path.trim($row['idcard']).".jpg";
					file_move(ATTACHMENT_ROOT.$picurl,ATTACHMENT_ROOT.$picurl2);
					if (!empty($_W['setting']['remote']['type'])) {
						$remotestatus = file_remote_upload($picurl2);
					}
					pdo_update(GetTableName('idcard',false), array('tpic' => $picurl2), array('id' => $row['id']));
				}
			}
			pdo_update($this->table_teachers, array('thumb' => $picurl3), array('id' => $_GPC['tid']));
		}
		$data ['newpic'] = $newpic;
		$data ['result'] = true;
		$data ['msg'] = '修改头像成功';
		die ( json_encode ( $data ) );
	}
}

if ($operation == 'changePimg') {
    load()->func('communication');
    load()->func('file');
    $token2 = $this->getAccessToken2();
    $photoUrl = $_GPC ['bigImage'];
    $user = pdo_fetch("SELECT * FROM " . tablename($this->table_idcard) . " WHERE :id = id", array(':id' => $_GPC['id']));
    if (empty($user['id'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '没找到本卡！'
        ) ) );
    }else{
        if(!empty($photoUrl)) {
			mkdirs(IA_ROOT."/attachment/", "0777");
            if($user['spic']){
                file_delete($user['spic']);
            }
            $url = 'https://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$token2.'&media_id='.$photoUrl;
            $pic_data = ihttp_request($url);
            $path = "images/fm_jiaoyu/cardthumb/".$user['schoolid']."/";
            if(keep_wt() && CheckWtOn($user['schoolid']) ){
                $picurl = $path.random(30) .".jpg";
            }else{
                $picurl = $path.$user['idcard'].".jpg";
            }
            file_write($picurl,$pic_data['content']);
            $files = ATTACHMENT_ROOT.$picurl;
            cut($files);
            if (!empty($_W['setting']['remote']['type'])) {
                $remotestatus = file_remote_upload($picurl);
            }
        }
        if(!(keep_wt() && CheckWtOn($user['schoolid']))){
            $data ['result'] = true;
            $data ['msg'] = '修改头像成功';
            pdo_update($this->table_idcard, array('spic' => $picurl), array('id' => $user['id']));
        }else{
            mload()->model('wt');
            $schoolid = $user['schoolid'];
            $weid = $user['weid'];
            $guid = $user['guid'];
            $imgurl = tomedia($picurl);

            //上传新的
            $result_face = PersonFace($schoolid, $weid, time(),$guid,$imgurl);
            $result_device =  People2Device($schoolid, $weid, time(),$guid); //授权设备
            $data ['msg_device'] = CheckWtReturnCode($result_device['code']);
            if($result_face['result'] == '1'){
                //删除旧的
                DeleteFace($schoolid, $weid, time(),$guid,$user['photo_guid']);
                pdo_update(GetTableName('idcard',false),array('photo_guid'=>$result_face['data']['guid'],'spic' => $picurl),array('id'=>$user['id']));
                $data ['result'] = true;
                $data ['msg'] = '修改头像成功';
            }else{
                $data ['result'] = false;
                $data ['msg'] = CheckWtReturnCode($result_face['code']);
            }
        }
        die ( json_encode ( $data ) );
    }
}

if ($operation == 'showchecklog') {

    $data = explode ( '|', $_GPC ['json'] );

    $log = pdo_fetch("SELECT * FROM " . tablename($this->table_checklog) . " WHERE :id = id", array(':id' => $_GPC['id']));

    $mac = pdo_fetch("SELECT * FROM " . tablename($this->table_checkmac) . " WHERE schoolid = '{$log['schoolid']}' And id = '{$log['macid']}' ");

    // if($mac['macname'] == 3)	{
    // if (preg_match('/(http:\/\/)|(https:\/\/)/i', $log['pic'])) {
    // if(!empty($log['pic'])) {
    // load()->func('file');
    // load()->func('communication');
    // $pic_data = file_get_contents($log['pic']);
    // $path = "images/fm_jiaoyu/";
    // $picurl = $path.random(30) .".jpg";
    // $pic_data = $this->getImg($log['pic'],$picurl);
    // file_write($picurl,$pic_data);
    // if (!empty($_W['setting']['remote']['type'])) { //
    // $remotestatus = file_remote_upload($picurl); //
    // if (is_error($remotestatus)) {
    // message('远程附件上传失败，请检查配置并重新上传');
    // }
    // }
    // pdo_update($this->table_checklog, array('pic' => $picurl), array('id' => $_GPC['id']));
    // }
    // }
    // }
    if (empty($log)) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => 'no data'
        ) ) );
    }else{

        $data ['result'] = true;
        $data ['ret']['code'] = 200;
        $data ['data'] = $log;
        //$data ['data']['picurl'] = $log['pic'];
        $data ['data']['macname'] = $mac['name'];
        $data ['data']['mactype'] = $mac['macname'];
        $data ['data']['msg'] = '获取记录成功';
        pdo_update($this->table_checklog, array('isread' => 2), array('id' => $_GPC['id']));
        die ( json_encode ( $data ) );

    }
}
if ($operation == 'getkcbiao') {
    $date = date('Y-m-d',$_GPC['time']);
    $riqi = explode ('-', $date);
    $starttime = mktime(0,0,0,$riqi[1],$riqi[2],$riqi[0]);
    $endtime = $starttime + 86399;
    $condition = " AND begintime < '{$starttime}' AND endtime > '{$endtime}'";
    $cook = pdo_fetch("SELECT * FROM " . tablename($this->table_timetable) . " WHERE schoolid = :schoolid And bj_id = :bj_id And ishow = 1 $condition", array(':schoolid' => $_GPC['schoolid'],':bj_id' => $_GPC['bj_id']));
    if($cook['monday'] || $cook['tuesday'] || $cook['wednesday'] || $cook['thursday'] || $cook['friday'] || $cook['saturday'] || $cook['sunday']){
        mload()->model('kc');
        $return =  getkctimetableByBjid($_GPC['schoolid'],$_GPC['bj_id'],$starttime,$endtime);
        if(!empty($return['km'])){
            $result['data']['sd_1'] = $return['sd']['sd_1']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_1']['sname'];
            $result['data']['sd_2'] = $return['sd']['sd_2']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_2']['sname'];
            $result['data']['sd_3'] = $return['sd']['sd_3']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_3']['sname'];
            $result['data']['sd_4'] = $return['sd']['sd_4']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_4']['sname'];
            $result['data']['sd_5'] = $return['sd']['sd_5']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_5']['sname'];
            $result['data']['sd_6'] = $return['sd']['sd_6']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_6']['sname'];
            $result['data']['sd_7'] = $return['sd']['sd_7']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_7']['sname'];
            $result['data']['sd_8'] = $return['sd']['sd_8']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_8']['sname'];
            $result['data']['sd_9'] = $return['sd']['sd_9']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_9']['sname'];
            $result['data']['sd_10'] = $return['sd']['sd_10']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_10']['sname'];
            $result['data']['sd_11'] = $return['sd']['sd_11']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_11']['sname'];
            $result['data']['sd_12'] = $return['sd']['sd_12']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_12']['sname'];
            $result['data']['km_1_name'] = $return['km']['km_1']['sname'];
            $result['data']['km_2_name'] = $return['km']['km_2']['sname'];
            $result['data']['km_3_name'] = $return['km']['km_3']['sname'];
            $result['data']['km_4_name'] = $return['km']['km_4']['sname'];
            $result['data']['km_5_name'] = $return['km']['km_5']['sname'];
            $result['data']['km_6_name'] = $return['km']['km_6']['sname'];
            $result['data']['km_7_name'] = $return['km']['km_7']['sname'];
            $result['data']['km_8_name'] = $return['km']['km_8']['sname'];
            $result['data']['km_9_name'] = $return['km']['km_9']['sname'];
            $result['data']['km_10_name'] = $return['km']['km_10']['sname'];
            $result['data']['km_11_name'] = $return['km']['km_11']['sname'];
            $result['data']['km_12_name'] = $return['km']['km_12']['sname'];
            $result['data']['km_1_pic'] = $return['km']['km_1']['icon'];
            $result['data']['km_2_pic'] = $return['km']['km_2']['icon'];
            $result['data']['km_3_pic'] = $return['km']['km_3']['icon'];
            $result['data']['km_4_pic'] = $return['km']['km_4']['icon'];
            $result['data']['km_5_pic'] = $return['km']['km_5']['icon'];
            $result['data']['km_6_pic'] = $return['km']['km_6']['icon'];
            $result['data']['km_7_pic'] = $return['km']['km_7']['icon'];
            $result['data']['km_8_pic'] = $return['km']['km_8']['icon'];
            $result['data']['km_9_pic'] = $return['km']['km_9']['icon'];
            $result['data']['km_10_pic'] = $return['km']['km_10']['icon'];
            $result['data']['km_11_pic'] = $return['km']['km_11']['icon'];
            $result['data']['km_12_pic'] = $return['km']['km_12']['icon'];
            if($_GPC['is_tea'] = 'is_tea'){
                $result['data']['sd_1'] .= '<br/><span class="bj_span">'.$return['km']['km_1']['tname'].'</span>';
                $result['data']['sd_2'] .= '<br/><span class="bj_span">'.$return['km']['km_2']['tname'].'</span>';
                $result['data']['sd_3'] .= '<br/><span class="bj_span">'.$return['km']['km_3']['tname'].'</span>';
                $result['data']['sd_4'] .= '<br/><span class="bj_span">'.$return['km']['km_4']['tname'].'</span>';
                $result['data']['sd_5'] .= '<br/><span class="bj_span">'.$return['km']['km_5']['tname'].'</span>';
                $result['data']['sd_6'] .= '<br/><span class="bj_span">'.$return['km']['km_6']['tname'].'</span>';
                $result['data']['sd_7'] .= '<br/><span class="bj_span">'.$return['km']['km_7']['tname'].'</span>';
                $result['data']['sd_8'] .= '<br/><span class="bj_span">'.$return['km']['km_8']['tname'].'</span>';
                $result['data']['sd_9'] .= '<br/><span class="bj_span">'.$return['km']['km_9']['tname'].'</span>';
                $result['data']['sd_10'] .= '<br/><span class="bj_span">'.$return['km']['km_10']['tname'].'</span>';
                $result['data']['sd_11'] .= '<br/><span class="bj_span">'.$return['km']['km_11']['tname'].'</span>';
                $result['data']['sd_12'] .= '<br/><span class="bj_span">'.$return['km']['km_12']['tname'].'</span>';
            }
            $result['info'] = 1;
        }else{
            $result['info'] = 2;
        }
    }else{
        $result['info'] = 2;
    }
    die ( json_encode ( $result ) );
}

if ($operation == 'addclick') {
    $data = explode ( '|', $_GPC ['json'] );

    if (empty($_GPC ['schoolid'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }

    $banner = pdo_fetch ( 'SELECT id,click FROM ' . tablename ( $this->table_banners ) . ' WHERE id = :id ', array (':id' => $_GPC ['id']));

    if (empty($banner)) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    } else {
        $click = $banner['click'] +1;

        pdo_update ( $this->table_banners, array('click' => $click), array ('id' => $banner['id']) );

        die ( json_encode ( $data ) );
    }

}

if ($operation == 'tjzy') {
    $tid = $_GPC['tid'];
    $weid        = $_GPC['weid'];
    $schoolid    = $_GPC['schoolid'];
    $sid         = $_GPC['sid'];
    $userid         = $_GPC['userid'];
    $zyid        = $_GPC['txtQuestionnaireId'];
    $hasSubmit   = trim($_GPC['hasSubmit']);
    $txtItemJson = trim($_GPC['txtItemJson']);
    $json1 = str_replace('&quot;', '"', $txtItemJson);
    $json2 = str_replace('&#039;', "'", $json1);
    $object = json_decode($json2,true);

    $is_TiJiao = pdo_fetch('SELECT id  FROM ' . tablename ( $this->table_answers ) . ' WHERE schoolid = :schoolid And weid = :weid AND  sid = :sid And tid =:tid AND zyid = :zyid', array (':schoolid'=>$schoolid,':weid'=>$weid, ':sid' =>$sid ,':tid' =>$tid , ':zyid' => $zyid ));

    if(empty($is_TiJiao)){
        foreach($object as $value){
            if($value['type'] == 'a') {
                $type = 1;
            }
            if($value['type'] == 'b'){
                $type = 2;
            }
            if($value['type'] == 'c'){
                $type = 3;
            }

            $temp=array(
                'tmid'=>$value['tmid'],
                'type'=>$type,
                'MyAnswer'=>$value['huida'],
                'weid'  => $weid ,
                'userid' => $userid ,
                'schoolid' => $schoolid,
                'sid' => $sid,
                'tid' => $tid,
                'createtime' => time(),
                'zyid' => $zyid
            );

            pdo_insert($this->table_answers,$temp);
        }
        $data['result'] = true;
        $data['info'] = '提交成功！';
    }else{
        $data['result'] = false;
        $data['info'] = '您已回答过本题';
    }
    die(json_encode($data));
}


if ($operation == 'GetQueStisticsData') {
    mload()->model('que');
    $leaveid = $_GPC['sQuestionUid'];
    $schoolid = $_GPC['schoolid'];
    $weid = $_GPC['weid'];
    $tmidtemp = intval(trim($_GPC['sListOrder']));

    $tmid =$tmidtemp + 1;

    /*$XuanXIangArr = DaTiRenShu($leaveid,$tmid,$schoolid,$weid);
    $XuanXiangCount = count($XuanXIangArr);*/
    $JieGuo = GetTongJi($leaveid,$schoolid,$weid);
    $ZY_content = GetZyContentPlusTm($leaveid,$tmid,$schoolid,$weid);

    $tempA = pdo_fetchall("SELECT distinct userid FROM " . tablename('wx_school_answers') . " where zyid= :zyid AND tmid = :tmid  AND schoolid = :schoolid  AND weid = :weid  ", array( ':zyid' =>$leaveid, ':tmid' =>$tmid,':schoolid' =>$schoolid, ':weid' => $weid ));
    $countA = count($tempA);
    $question_content1 = $ZY_content['title'];
    $question_content = $question_content1. "(" . (string)$countA ."人已答)";
    if($ZY_content['type'] == 1)
    {
        $typess = 'a';
    }elseif($ZY_content['type'] == 2){
        $typess = 'b';
    }elseif($ZY_content['type'] == 3){
        $typess = 'c';
    }

    $JieGuo_temp = array(
        //'XuanXiangCount' => $XuanXiangCount,
        'question_content' => $question_content,
        'question_type' => $typess,
        'tmid' => $tmid);
    $key_temp  ;
    if($typess != 'c'){
        foreach($ZY_content['content'] as $key => $value)
        {
            $name = $value['title'];
            $content = $value['title'];
            if($value['is_answer'] == "Yes")
            {
                $content = $content."(答案)";
                $name = $name."(答案)";
            };
            $y = $JieGuo[$tmid][$key]['count'];
            $JieGuo_temp['key'] = $key;

            $key_temp[$key - 1 ]['name'] = $name;
            $key_temp[$key - 1]['content'] = $content;
            $key_temp[$key - 1]['y'] = intval($y);
            $key_temp[$key - 1]['id'] = $key;
            $key_temp[$key - 1]['tmid'] = $tmid;



        }
    }elseif($typess == 'c')
    {

        $key_temp = GetWenDaTongJiPlusTm($leaveid,$tmid,$schoolid,$weid);

    };

    $JieGuo_temp['question_data'] = $key_temp ;
    $JieGuo_temp11 = array( $JieGuo_temp);

    $fanhui = json_encode($JieGuo_temp11);
    $fanhui1 = '"{'.$fanhui.'}"';
    die($fanhui);


}

if ($operation == 'xgdz') {
    $weid      = $_W['uniacid'];
    $schoolid  = intval($_GPC['schoolid']);
    $openid    = $_W['openid'];
    $addressid = $_GPC['addressid'];
    $AddName   = $_GPC['name'];
    $AddPhone  = $_GPC['phone'];
    $province  = $_GPC['province'];
    $city      = $_GPC['city'];
    $county    = $_GPC['county'];
    $address   = $_GPC['address'];
    $temp = array(
        'name'     => $AddName,
        'phone'    => $AddPhone,
        'province' => $province,
        'city'     => $city,
        'county'   => $county,
        'address'  => $address
    );
    if(!empty($addressid)){

        pdo_update($this->table_address,$temp,array('id' => $addressid));
        $data['result'] = true;
        $data['info'] = '修改地址成功！';


        die(json_encode($data));

    }
    else
    {
        $temp['weid']     = $weid;
        $temp['schoolid'] = $schoolid ;
        $temp['openid']   = $openid;
        pdo_insert($this->table_address,$temp);
        $insertid = pdo_insertid();
        if($insertid){
            $data['result'] = true;
            $data['info'] = '修改地址成功！';
            die(json_encode($data));
        }
    }

    $data['result'] = false;
    $data['info'] = '出现未知错误，修改地址失败，请重新尝试！';
    die(json_encode($data));
}


if ($operation == 'createsence') {
    $weid      = $_W['uniacid'];
    $schoolid  = intval($_GPC['schoolid']);
    $senceQxfzid  = $_GPC['senceQxfzid'];
    $senceName  = $_GPC['senceName'];
    $senceDate  = strtotime($_GPC['senceDate']);
    $temp = array(
        'qxfzid'     => $senceQxfzid,
        'sencetime'    => $senceDate,
        'name' => $senceName,
        'weid'     => $weid,
        'schoolid'   => $schoolid,
        'createtime'  => time()
    );
    $check = pdo_fetch("SELECT * FROM " . tablename($this->table_upsence) . " WHERE name = '{$senceName}' and sencetime ='{$senceDate}' and weid = '{$weid}' and schoolid = '{$schoolid}' ");
    if(!empty($check)){
        $data['result'] = false;
        $data['msg'] = '当前场景重复，请重新创建';
        die(json_encode($data));
    }
    pdo_insert($this->table_upsence,$temp);
    $data['result'] = true;
    $data['msg'] = '创建场景成功！';
    die(json_encode($data));
}





if(is_showgkk())
{
    if ($operation == 'tjpy_c') {
        $tid         = $_GPC['tid'];
        $weid        = $_GPC['weid'];
        $schoolid    = $_GPC['schoolid'];
        $sid         = $_GPC['sid'];
        $userid      = $_GPC['userid'];
        $zyid        = $_GPC['txtQuestionnaireId'];
        $txtItemJson = trim($_GPC['txtItemJson']);
        $json1       = str_replace('&quot;', '"', $txtItemJson);
        $json2       = str_replace('&#039;', "'", $json1);
        $object      = json_decode($json2,true);

        $is_Piyue = pdo_fetch('SELECT id  FROM ' . tablename ( $this->table_ans_remark ) . ' WHERE schoolid = :schoolid And weid = :weid AND  sid = :sid  AND zyid = :zyid', array (':schoolid'=>$schoolid,':weid'=>$weid, ':sid' =>$sid , ':zyid' => $zyid ));

        if(empty($is_Piyue)){
            foreach($object as $value){
                $back = 111;
                $type = 1;
                $teacher = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " WHERE :id = id", array(':id' => $tid));
                $temp=array(
                    'tmid'=>$value['tmid'],
                    'type'=>$type,
                    'content'=>$value['huida'],
                    'weid'  => $weid ,
                    'userid' => $userid ,
                    'schoolid' => $schoolid,
                    'sid' => $sid,
                    'tid' => $tid,
                    'tname' => $teacher['tname'],
                    'createtime' => time(),
                    'zyid' => $zyid
                );

                pdo_insert($this->table_ans_remark,$temp);
            }
            $data['result'] = true;
            $data['info'] = '提交成功！';
        }else{
            $data['result'] = false;
            $data['info'] = '您已批阅过此回答';
        }
        die(json_encode($data));
    }

    if ($operation == 'tjpy_p') {
        $tid         = $_GPC['tid'];
        $weid        = $_GPC['weid'];
        $schoolid    = $_GPC['schoolid'];
        $sid         = $_GPC['sid'];
        $userid      = $_GPC['userid'];
        $zyid        = $_GPC['txtQuestionnaireId'];
        $txtItemJson = trim($_GPC['txtItemJson']);
        $json1       = str_replace('&quot;', '"', $txtItemJson);
        $json2       = str_replace('&#039;', "'", $json1);
        $object      = json_decode($json2,true);

        $is_Piyue = pdo_fetch('SELECT id  FROM ' . tablename ( $this->table_ans_remark ) . ' WHERE schoolid = :schoolid And weid = :weid AND  sid = :sid  AND zyid = :zyid', array (':schoolid'=>$schoolid,':weid'=>$weid, ':sid' =>$sid , ':zyid' => $zyid ));

        if(empty($is_Piyue)){
            foreach($object as $value){
                //$back = 111;
                $type = 2;
                $teacher = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " WHERE :id = id", array(':id' => $tid));
                $temp=array(
                    //'tmid'=>$value['tmid'],
                    'type'=>$type,
                    'content'=>$value['huida'],
                    'weid'  => $weid ,
                    'userid' => $userid ,
                    'schoolid' => $schoolid,
                    'sid' => $sid,
                    'tid' => $tid,
                    'tname' => $teacher['tname'],
                    'createtime' => time(),
                    'zyid' => $zyid
                );

                pdo_insert($this->table_ans_remark,$temp);
            }
            $data['result'] = true;
            $data['info'] = '提交成功！';
        }else{
            $data['result'] = false;
            $data['info'] = '您已批阅过此回答';
        }
        die(json_encode($data));
    }

    if ($operation == 'njzragree') {
        $leaveid     = $_GPC['leaveid'];
        $toxztid     = $_GPC['toxztid'];
        $tktype      = $_GPC['tktype'];
        $njzrcontent = $_GPC['njzrcontent'];
        $schoolid    = $_GPC['schoolid'];
        $weid        = $_GPC['weid'];

        $temp= array(
            'toxztid' => $toxztid,
            'status' => 3 ,
            'njzryj' => $njzrcontent,
            'njzrcltime' => time(),
            'tktype'=>$tktype
        );
        $leave = pdo_fetch("SELECT * FROM " . tablename($this->table_leave) . " WHERE :id = id", array(':id' => $leaveid));
        if(!empty($leave)){
            $teacher = pdo_fetch("SELECT openid FROM " . tablename($this->table_teachers) . " where id = :id AND schoolid = :schoolid ", array(':id' => $toxztid, ':schoolid' => $schoolid));
            $toopenid = $teacher['openid'];
            pdo_update($this->table_leave,$temp,array('id'=> $leaveid));
            $this->sendMobileJsqj($leaveid, $schoolid, $weid, $toopenid);
            $data['result'] = true;
            $data['info'] = "抄送成功！";
        }else{
            $data['result'] = false;
            $data['info'] = '抄送失败，请重新抄送！';
        }
        die(json_encode($data));
    }
}



if ($operation == 'getkcbiaobytid') {
    mload()->model('kc');
    $date = date('Y-m-d',$_GPC['time']);
    $riqi = explode ('-', $date);
    $starttime = mktime(0,0,0,$riqi[1],$riqi[2],$riqi[0]);
    $endtime = $starttime + 86399;
    $condition = " AND begintime < '{$starttime}' AND endtime > '{$endtime}'";
    $cook = pdo_fetch("SELECT * FROM " . tablename($this->table_timetable) . " WHERE schoolid = :schoolid And bj_id = :bj_id And ishow = 1 $condition", array(':schoolid' => $_GPC['schoolid'],':bj_id' => $_GPC['bj_id']));

    mload()->model('kc');
    $return =  getkctimetableByTid($_GPC['schoolid'],$_GPC['tid'],$starttime,$endtime);
    //die ( json_encode ( $return ) );
    if(!empty($return['km'])){
        if(!empty($return['km']['km_1'])){
            $result['data']['sd_1'] = $return['sd']['sd_1']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_1']['sname'].'<br/> <span class="nj_span"> '.$return['km']['km_1']['njname'].'</span><span class="bj_span">'.$return['km']['km_1']['bjname'].'</span>';
            $result['data']['km_1_name'] = $return['km']['km_1']['sname'];
            $result['data']['km_1_pic'] = $return['km']['km_1']['icon'];
        }
        if(!empty($return['km']['km_2'])){
            $result['data']['sd_2'] = $return['sd']['sd_2']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_2']['sname'].'<br/> <span class="nj_span"> '.$return['km']['km_2']['njname'].'</span><span class="bj_span">'.$return['km']['km_2']['bjname'].'</span>';
            $result['data']['km_2_name'] = $return['km']['km_2']['sname'];
            $result['data']['km_2_pic'] = $return['km']['km_2']['icon'];
        }
        if(!empty($return['km']['km_3'])){
            $result['data']['sd_3'] = $return['sd']['sd_3']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_3']['sname'].'<br/> <span class="nj_span"> '.$return['km']['km_3']['njname'].'</span><span class="bj_span">'.$return['km']['km_3']['bjname'].'</span>';
            $result['data']['km_3_name'] = $return['km']['km_3']['sname'];
            $result['data']['km_3_pic'] = $return['km']['km_3']['icon'];
        }
        if(!empty($return['km']['km_4'])){
            $result['data']['sd_4'] = $return['sd']['sd_4']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_4']['sname'].'<br/> <span class="nj_span"> '.$return['km']['km_4']['njname'].'</span><span class="bj_span">'.$return['km']['km_4']['bjname'].'</span>';
            $result['data']['km_4_name'] = $return['km']['km_4']['sname'];
            $result['data']['km_4_pic'] = $return['km']['km_4']['icon'];
        }
        if(!empty($return['km']['km_5'])){
            $result['data']['sd_5'] = $return['sd']['sd_5']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_5']['sname'].'<br/> <span class="nj_span"> '.$return['km']['km_5']['njname'].'</span><span class="bj_span">'.$return['km']['km_5']['bjname'].'</span>';
            $result['data']['km_5_name'] = $return['km']['km_5']['sname'];
            $result['data']['km_5_pic'] = $return['km']['km_5']['icon'];
        }
        if(!empty($return['km']['km_6'])){
            $result['data']['sd_6'] = $return['sd']['sd_6']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_6']['sname'].'<br/> <span class="nj_span"> '.$return['km']['km_6']['njname'].'</span><span class="bj_span">'.$return['km']['km_6']['bjname'].'</span>';
            $result['data']['km_6_name'] = $return['km']['km_6']['sname'];
            $result['data']['km_6_pic'] = $return['km']['km_6']['icon'];
        }
        if(!empty($return['km']['km_7'])){
            $result['data']['sd_7'] = $return['sd']['sd_7']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_7']['sname'].'<br/> <span class="nj_span"> '.$return['km']['km_7']['njname'].'</span><span class="bj_span">'.$return['km']['km_7']['bjname'].'</span>';
            $result['data']['km_7_name'] = $return['km']['km_7']['sname'];
            $result['data']['km_7_pic'] = $return['km']['km_7']['icon'];
        }
        if(!empty($return['km']['km_8'])){
            $result['data']['sd_8'] = $return['sd']['sd_8']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_8']['sname'].'<br/> <span class="nj_span"> '.$return['km']['km_8']['njname'].'</span><span class="bj_span">'.$return['km']['km_8']['bjname'].'</span>';
            $result['data']['km_8_name'] = $return['km']['km_8']['sname'];
            $result['data']['km_8_pic'] = $return['km']['km_8']['icon'];
        }
        if(!empty($return['km']['km_9'])){
            $result['data']['sd_9'] = $return['sd']['sd_9']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_9']['sname'].'<br/> <span class="nj_span"> '.$return['km']['km_9']['njname'].'</span><span class="bj_span">'.$return['km']['km_9']['bjname'].'</span>';
            $result['data']['km_9_name'] = $return['km']['km_9']['sname'];
            $result['data']['km_9_pic'] = $return['km']['km_9']['icon'];
        }
        if(!empty($return['km']['km_10'])){
            $result['data']['sd_10'] = $return['sd']['sd_10']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_10']['sname'].'<br/> <span class="nj_span"> '.$return['km']['km_10']['njname'].'</span><span class="bj_span">'.$return['km']['km_10']['bjname'].'</span>';
            $result['data']['km_10_name'] = $return['km']['km_10']['sname'];
            $result['data']['km_10_pic'] = $return['km']['km_10']['icon'];
        }
        if(!empty($return['km']['km_11'])){
            $result['data']['sd_11'] = $return['sd']['sd_11']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_11']['sname'].'<br/> <span class="nj_span"> '.$return['km']['km_11']['njname'].'</span><span class="bj_span">'.$return['km']['km_11']['bjname'].'</span>';
            $result['data']['km_11_name'] = $return['km']['km_11']['sname'];
            $result['data']['km_11_pic'] = $return['km']['km_11']['icon'];
        }
        if(!empty($return['km']['km_12'])){
            $result['data']['sd_12'] = $return['sd']['sd_12']['sname']."&nbsp;&nbsp;&nbsp;&nbsp;". $return['km']['km_12']['sname'].'<br/> <span class="nj_span"> '.$return['km']['km_12']['njname'].'</span><span class="bj_span">'.$return['km']['km_12']['bjname'].'</span>';'<br/>'.$return['km']['km_12']['njname']."|".$return['km']['km_12']['bjname'];
            $result['data']['km_12_name'] = $return['km']['km_12']['sname'];
            $result['data']['km_12_pic'] = $return['km']['km_12']['icon'];
        }

        $result['info'] = 1;
    }else{
        $result['info'] = 2;
    }

    die ( json_encode ( $result ) );
}


if ($operation == 'zdytest') {
    $data = explode ( '|', $_GPC ['json'] );
    if (! $_GPC ['schoolid'] || ! $_GPC ['weid']) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }
    if (empty($_GPC['openid'])) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！'
        ) ) );
    }else{
        $data = array(
            'weid' =>  $_GPC ['weid'],
            'schoolid' => $_GPC ['schoolid'],
            'openid' => $_GPC ['openid'],
            'sid' => $_GPC ['sid'],
            'tid' => $_GPC ['tid'],
            'mobile' => $_GPC ['mobile'],
            'content' => htmlspecialchars($_GPC ['content']),
            'uid' => $_GPC['uid'],
            'bj_id' => $_GPC['bj_id'],
            'icon' => $_GPC['bigImage'],
        );
        $res = pdo_insert($this->table_zdytest, $data);
        $data ['result'] = true;
        $data ['msg'] = '添加成功';
        die ( json_encode ( $data ) );
    }
}
#上传图片
if ($operation == 'uploadimg') {
    load()->func('communication');
    load()->func('file');
    $token2 = $this->getAccessToken2();
    $photoUrl = $_GPC ['bigImage'];
    $uid = $_GPC['uid'];
    $data = explode ( '|', $_GPC ['json'] );

    if(!empty($photoUrl)) {
        $url = 'https://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$token2.'&media_id='.$photoUrl;
        $pic_data = ihttp_request($url);
        $path = "images/fm_jiaoyu/";
        $picurl = $path.random(30) .".jpg";
        file_write($picurl,$pic_data['content']);
        $files = IA_ROOT . "/attachment/".$picurl;
        cut($files);
        if (!empty($_W['setting']['remote']['type'])) { //
            $remotestatus = file_remote_upload($picurl); //
            if (is_error($remotestatus)) {
                message('远程附件上传失败，请检查配置并重新上传');
            }
        }
    }
    // pdo_insert($this->table_zdytest, array('icon' => $picurl), array('id' => $uid));
    $data ['result'] = true;
    $data ['msg'] = '上传成功';
    $data ['picurl'] = $picurl;
    die ( json_encode ( $data ) );
}
if (is_TestFz()) {
    //添加潜在客户
    if ($operation == 'addqzkh') {
        if (empty($_GPC ['schoolid'])) {
            die(json_encode(array(
            'result' => false,
            'msg' => '非法请求！'
        )));
        }
        $check = pdo_fetch("SELECT * FROM " . GetTableName('qzkh') . " WHERE :weid = weid And :schoolid = schoolid And :sname = sname And :mobile = mobile ", array(
        ':weid' => $_GPC['weid'],
        ':schoolid' => $_GPC['schoolid'],
        ':sname' => trim($_GPC['sname']),
        ':mobile' => $_GPC['mobile']
    ));
        if (!empty($check)) {
            die(json_encode(array(
            'result' => false,
            'msg' => '您已为该学生申请，请等待老师与您联系'
        )));
        }
    
        if (empty($_GPC ['openid'])) {
            die(json_encode(array(
            'result' => false,
            'msg' => '非法请求！'
        )));
        } else {
            $temp = array(
            'weid' => $_GPC['weid'],
            'schoolid' => $_GPC['schoolid'],
            'openid' => $_GPC['openid'],
            'shareid' => $_GPC['shareid'],
            'sex' => $_GPC['sex'],
            'pard' => $_GPC['pard'] ? $_GPC['pard'] : 4,
            'sname' => trim($_GPC['sname']),
            'name' => trim($_GPC['name']),
            'mobile' => trim($_GPC['mobile']),
            'hobby' => trim($_GPC['hobby']),
            'birthday' => strtotime($_GPC['birthday']),
            'status' => 1,
            'createtime' => time(),
        );
            pdo_insert(GetTableName('qzkh', false), $temp);
            $data ['result'] = true;
            $data ['msg'] = '提交成功，稍后安排专业老师与您联系！';
            die(json_encode($data));
        }
    }
}

if($operation == 'GetTgy'){
    if (empty($_GPC ['schoolid'])) {
        die(json_encode(array(
            'result' => false,
            'msg' => '非法请求！'
        )));
    }
    $kcinfo = pdo_fetch("SELECT tg_id FROM ".GetTableName('tcourse')." WHERE id = '{$_GPC['kcid']}' ");
    $tgystr = pdo_fetch("SELECT team FROM ".GetTableName('kc_promote')." WHERE id = '{$kcinfo['tg_id']}' ");
    $tgyarr = explode(',',$tgystr['team']);
    $tgy = [];
    foreach($tgyarr as $k => $v){
        $teacher = pdo_fetch("SELECT id,tname FROM ".GetTableName('teachers')." WHERE id = '{$v}' ");
        $tgy[$k]['tid'] = $teacher['id'];
        $tgy[$k]['tname'] = $teacher['tname'];
    }
    $data ['tgy'] = $tgy;
    $data ['result'] = true;
    $data ['msg'] = '获取成功';
    die(json_encode($data));
}

if($operation == 'xsqjchehui'){
    if (empty($_GPC ['schoolid'])) {
        die(json_encode(array(
            'result' => false,
            'msg' => '非法请求！'
        )));
    }
    $leaveinfo = pdo_fetch("SELECT id FROM ".GetTableName('leave')." WHERE id = '{$_GPC['id']}' ");
    
    if (empty($leaveinfo)) {
        die(json_encode(array(
            'result' => false,
            'msg' => '当前信息不存在，或已被删除！'
        )));
    }
    pdo_update(GetTableName('leave',false),array('status'=>3,'cltime'=>time()),array('id'=>$_GPC['id']));
    $data ['result'] = true;
    $data ['msg'] = '请假申请已撤回';
    die(json_encode($data));
}

if($operation == 'adddrug'){
    load()->func('communication');
    load()->func('file');
    $data = explode ( '|', $_GPC ['json'] );
    
    if (! $_GPC ['schoolid'] || ! $_GPC ['weid']) {
            die ( json_encode ( array (
                'result' => false,
                'msg' => '非法请求！' ,
                'status' => 2,
                'info' => '非法请求！' 
                    ) ) );
    }else{
        $schoolid   = trim($_GPC['schoolid']);
        $weid       = trim($_GPC['weid']);
        $content    = trim($_GPC['content']);
        $starttime    = $_GPC['starttime'];
        $endtime    = $_GPC['endtime'];
        $datetime    = $_GPC['datetime'];
        $sid        = $_GPC['sid'];
        $photoUrls  = $_GPC['photoUrls'];
        $photo_temp = serialize($photoUrls);
        $data = array(
            'schoolid' => $_GPC['schoolid'],
            'weid' => $_GPC['weid'],
            'content' => $_GPC['content'],
            'starttime' => strtotime($_GPC['starttime']),
            'endtime' => strtotime($_GPC['endtime']),
            'datetime' => serialize($_GPC['datetime']),
            'sid' => $_GPC['sid'],
            'headimg' => serialize($_GPC['photoUrls']),
            'createtime' => time(),
            'status' => 0,
        );
            
        $drugid = pdo_insert(GetTableName('drug',false), $data);

        $drugid = pdo_insertid();
        if (empty($drugid)) {
            die ( json_encode ( array (
            'result' => false,
            'msg' => '申请失败，请重试！' 
                ) ) );
        }else{
            die ( json_encode ( array (
                'result' => true,
                'status' => 1,
                'msg' => '申请成功，请勿重复发送!'
            ) ) );
        }
    }
}


if($operation == 'DiffDay'){
    $start = date("Y-m-d",strtotime($_GPC['start']));
    $end = date("Y-m-d",strtotime($_GPC['end']));
    $diffday = diffBetweenTwoDays($start,$end) + 1;
    $data ['result'] = true;
    $data ['data'] = $diffday;
    die(json_encode($data));
}

if($operation == 'GetByInfo'){
    if (! $_GPC ['schoolid'] || ! $_GPC ['weid']) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！' 
            )));
    }else{
        //请假信息
        $leave = pdo_fetch("SELECT startime1,endtime1 FROM ".GetTableName('leave')." WHERE byid = '{$_GPC['id']}' AND schoolid = '{$_GPC['schoolid']}' ");

        //病因资料
        $byinfo = pdo_fetch("SELECT * FROM ".GetTableName('byinfo')." WHERE id = '{$_GPC['id']}' AND schoolid = '{$_GPC['schoolid']}' ");
        $start = date("Y-m-d",$leave['startime1']);
        $end = date("Y-m-d",$leave['endtime1']);
        $diffday = diffBetweenTwoDays($start,$end) + 1;
        $datainfo = array(
            'diffday' => $diffday,
            'jbname' => $byinfo['jbname'],
            'fbtime' => $byinfo['fbtime'] ? date("Y-m-d",$byinfo['fbtime']) : '未填写',
            'qztime' => $byinfo['qztime'] ? date("Y-m-d",$byinfo['qztime']) : '未填写',
            'zytime' => $byinfo['zytime'] ? date("Y-m-d",$byinfo['zytime']) : '未填写',
            'fktime' => $byinfo['fktime'] ? date("Y-m-d",$byinfo['fktime']) : '未填写',
            'stzk' => $byinfo['stzk'],
            'is_heal' => $byinfo['is_heal'],
            'hospital' => $byinfo['hospital'],
            'jbstatus' => $byinfo['jbstatus'],
            'zdzm' => tomedia($byinfo['zdzm']),
            'blzm' => tomedia($byinfo['blzm']),
            'zyzm' => tomedia($byinfo['zyzm']),
            'tsign' => tomedia($byinfo['tsign']),
        );
        $data ['result'] = true;
        $data ['data'] = $datainfo;
        die(json_encode($data));
    }
    
}

if($operation == 'UpdateBy'){
    if (! $_GPC ['schoolid'] || ! $_GPC ['weid']) {
        die ( json_encode ( array (
            'result' => false,
            'msg' => '非法请求！' 
            )));
    }else{
        $schoolid = $_GPC ['schoolid'];
        $weid = $_GPC ['weid'];
        $id = $_GPC ['id'];
        $zytime = strtotime($_GPC ['zytime']);
        $fktime = strtotime($_GPC ['fktime']);
        $stzk = $_GPC ['stzk'];
        $TeaSignBase64 = $_GPC ['TeaSignBase64'];
        /*************************将签名和白色背景图合并成海报*****************************/
        $poster = MODULE_URL."public/mobile/img/newsvideosharepic.jpg";
        $posterdata = setPoster($TeaSignBase64,$poster);
        $qrcode_name = 'images/fm_jiaoyu/'.random(30).'.jpg';
        $filename = IA_ROOT .'/attachment/'. $qrcode_name;
        $posterQrcode = createPoster($posterdata, $filename); //保存图片
        if(!empty($_GPC['zyzm'])){
            load()->func('communication');
            load()->func('file');
            $token2 = $this->getAccessToken2();
            $url_1 = 'https://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$token2.'&media_id='.$_GPC['zyzm'];
            $pic_data_1 = ihttp_request($url_1);
            $path_1 = "images/fm_jiaoyu/img/";
            $picurl_1 = $path_1.random(30) .".jpg";
            file_write($picurl_1,$pic_data_1['content']);
            if (!empty($_W['setting']['remote']['type'])) { //
                $remotestatus = file_remote_upload($picurl_1); //
                if (is_error($remotestatus)) {
                    message('远程附件上传失败，请检查配置并重新上传');
                }
            }
        }
        /*************************将签名和白色背景图合并成海报*****************************/
        $data = array(
            'zytime' => $zytime,
            'fktime' => $fktime,
            'zyzm' => $picurl_1,
            'stzk' => $stzk,
            'tsign' => $qrcode_name,
            'tsigntime' => time(),
            'is_heal' => 1,
        );
        $by = pdo_fetch("SELECT id FROM ".GetTableName('byinfo')." WHERE id = '{$id}' ");
        if(!empty($by)){
            pdo_update(GetTableName('byinfo',false),$data,array('id'=>$id));
            $data ['result'] = true;
            $data ['msg'] = '操作成功';
        }else{
            $data ['result'] = false;
            $data ['msg'] = '操作失败';
        }
        die(json_encode($data));
    }
    
}
?>
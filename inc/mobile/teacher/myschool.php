<?php
/**
 * 微教育模块
 *
 * @author 高贵血迹
 */
global $_W, $_GPC;
$weid = $_W['uniacid'];
$schoolid = $_GPC['schoolid'];
$openid = $_W['openid'];
$act = "wd";
$fzstr = GetFzByQx('shjsqj', 2, $schoolid);
$fzarr = explode(',', $fzstr);

//查询是否用户登录	
//查询该微信是否绑定了教师（Lee 0721）	
$schoollist = get_myschool($weid, $openid);
$it = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where  weid = :weid And schoolid = :schoolid And openid = :openid And sid = :sid ", array(
	':weid' => $weid,
	':schoolid' => $schoolid,
	':openid' => $openid,
	':sid' => 0
));
$tid_global = $it['tid'] ? $it['tid'] : 0;
if (!empty($schoolid) && empty($it)) {
	$stopurl = $_W['siteroot'] . 'app/' . $this->createMobileUrl('bangding', array('schoolid' => $schoolid));
	header("location:$stopurl");
	exit;
}
$guid = need_guid($it['id'], $schoolid, 2);
if (!empty($guid)) {
	pdo_update($this->table_user, array('is_frist' => 2), array('id' => $it['id']));
	$stopurl = $_W['siteroot'] . 'app/index.php?i=' . $weid . '&c=entry&do=guid&m=fm_jiaoyu' . '&schoolid=' . $schoolid . '&guid=' . $guid . '&place=myschool';
	header("location:$stopurl");
	exit;
}
if (!$_W['schooltype']) {
	$bjlists = get_mylist($schoolid, $it['tid'], 'teacher');
} else {
	$tid = $it['tid'];
	$time = time();
	$kclists_str = '';
	$kclist = pdo_fetchall("select id ,name  FROM " . tablename($this->table_tcourse) . " WHERE schoolid = '{$schoolid}'  and (tid like '%,{$tid},%'  or tid like '%,{$tid}' or tid like '{$tid},%' or tid ='{$tid}') and start<='{$time}' and end >= '{$time}' ORDER BY end DESC , ssort DESC   limit 3");
	$kclist_count = pdo_fetchcolumn("select count(id)  FROM " . tablename($this->table_tcourse) . " WHERE schoolid = '{$schoolid}'  and (tid like '%,{$tid},%'  or tid like '%,{$tid}' or tid like '{$tid},%' or tid ='{$tid}') and start<='{$time}' and end >= '{$time}' ORDER BY end DESC , ssort DESC  ");
	if (!empty($kclist)) {
		$muti = 1;
		foreach ($kclist as $value) {
			$kclists_str .= $value['name'] . ' </br> ';
		}
		$kclists_str =  substr($kclists_str, 0, strlen($kclists_str) - 6);
		if ($kclist_count > 3) {
			$kclists_str .= '&nbsp;<span style="color:#17b056">等' . $kclist_count . '门课程</span>';
		}
	} else {
		$muti = 0;
		$kclists_str = "暂无授课信息";
	}
}
$schoolset = pdo_fetch("SELECT is_unbind FROM " . tablename($this->table_schoolset) . " where weid = :weid AND schoolid=:schoolid ", array(':weid' => $weid, ':schoolid' => $schoolid));

if (!empty($schoollist)) {
	// 获取该微信绑定的老师的学校信息（Lee 0721）
	$school = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where weid = :weid AND id=:id ORDER BY ssort DESC", array(':weid' => $weid, ':id' => $schoolid));
	$mallsetinfo = unserialize($school['mallsetinfo']);
	//获取老师信息（Lee 0721）
	$teacher = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " where weid = :weid AND id=:id ", array(':weid' => $weid, ':id' => $it['tid']));
	$teacher['star_width'] = $teacher['star'] * 12;
	$all = CheckMission($it['tid'], $weid, $schoolid) ? CheckMission($it['tid'], $weid, $schoolid) : 0;
	//var_dump($all);
	$teacher['Ttitle'] = GetTeacherTitle($teacher['status'], $teacher['fz_id']);
	//获取一条该教师在该学校的班级信息   （Lee 0721） 
	$bzj = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " where weid = :weid And schoolid = :schoolid And tid = :tid And type = :type", array(':weid' => $weid, ':schoolid' => $schoolid, ':tid' => $it['tid'], ':type' => 'theclass'));
	//获取所有该教师在该学校的班级信息   （Lee 0721） 		
	$bjlist = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where schoolid = '{$schoolid}' And weid = '{$weid}' And tid = '{$it['tid']}' And type = 'theclass' ORDER BY sid ASC, ssort DESC");
	//格式化userinfo  （Lee 0721） 
	$userinfo = iunserializer($it['userinfo']);


	if(is_TestFz()){
			
		$BeginDate = date('Y-m-d', strtotime(date('Y-m-01'))); 
		$StartDate = strtotime(date('Y-m-d', strtotime(date('Y-m-01'))));  //本月第一天开始
		$EndDate = strtotime("$BeginDate +1 month -1 day"); //本月最后一天结束
		$TeaTopArr = pdo_fetch("SELECT teatopiconarr,mastertopiconarr,teatemplate FROM ".GetTableName('schoolset')." WHERE schoolid = '{$schoolid}' ");
		$NowMonthKcStNum = 0;
		$NowMonthKcSNum = 0;
		$NowMonthStNum = 0;
		if($TeaTopArr['teatemplate'] == 'new'){
			$TopIconFTea = [];
			if($teacher['status'] == 2){

				/*****************************月度课消****************************/
				//本月排课课时
				$NowMonthKcB = pdo_fetchAll("SELECT id FROM ".GetTableName('kcbiao')." WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' AND date >= '{$StartDate}' AND date <= '{$EndDate}'");
				$NowMonthKcBNum = count($NowMonthKcB);

				foreach($NowMonthKcB as $k => $v){
					$NowMonthKcS = pdo_fetch("SELECT id FROM ".GetTableName('kcsign')." WHERE ksid = '{$v['id']}' AND createtime >= '{$StartDate}' AND createtime <= '{$EndDate}'");
					if(!empty($NowMonthKcS)){
						$NowMonthKcSNum++;
					}
				}
				/*****************************月度课消****************************/

				/*****************************月度业绩****************************/
				$time = time();
				//查询所有的试听课程
				$TryKc = pdo_fetchAll("SELECT id,cose FROM ".GetTableName('tcourse')." WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' AND start<='{$time}' and end >= '{$time}'AND is_try = 1");
				//获取本月课程计划课程业绩(推广员*任务*课程单价)
				$monthAllMoney = 0;
				$monthSjMoney = 0;
				foreach($TryKc as $k => $v){
					$kc_pro = pdo_fetch("SELECT team,tg_number FROM ".GetTableName('kc_promote')." WHERE kcid = {$v['id']}");
					$tgy = explode(',',$kc_pro['team']);
					//本月计划推广业绩
					$monthAllMoney += $v['cose'] * count($tgy) * $kc_pro['tg_number'];

					//本月实际推广业绩
					$monthSjMoney += pdo_fetchcolumn("SELECT SUM(cose) FROM ".GetTableName('order')." WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' AND superior_tid != 0 AND paytime >= '{$StartDate}' AND paytime <= '{$EndDate}' AND kcid = '{$v['id']}'");

				}
				/*****************************月度业绩****************************/

				$TeaArray = explode(',',$TeaTopArr['mastertopiconarr']);
				$condition .= " AND NOT FIND_IN_SET(id,'{$TeaTopArr['mastertopiconarr']}') ";

			}else{

				//本月邀约试听人数
				$NowMonthSt = pdo_fetchAll("SELECT sid,kcid FROM ".GetTableName('order')." WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' AND superior_tid = '{$tid_global}' AND createtime >= '{$StartDate}' AND createtime <= '{$EndDate}'");
				//本月到校试听人数
				$NowMonthStNum = count($NowMonthSt);
				foreach($NowMonthSt as $k => $v){
					$NowMonthKcSt = pdo_fetch("SELECT id FROM ".GetTableName('kcsign')." WHERE sid = '{$v['sid']}' AND kcid = '{$v['kcid']}' AND status = 2  AND createtime >= '{$StartDate}' AND createtime <= '{$EndDate}'");
					if(!empty($NowMonthKcSt)){
						$NowMonthKcStNum++;
					}
				}

				//本月排课课时
				$NowMonthKcB = pdo_fetchAll("SELECT id FROM ".GetTableName('kcbiao')." WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' AND tid = '{$tid_global}' AND date >= '{$StartDate}' AND date <= '{$EndDate}'");
				$NowMonthKcBNum = count($NowMonthKcB);
				//本月签到课时

				foreach($NowMonthKcB as $k => $v){
					$NowMonthKcS = pdo_fetch("SELECT id FROM ".GetTableName('kcsign')." WHERE ksid = '{$v['id']}' AND createtime >= '{$StartDate}' AND createtime <= '{$EndDate}'");
					if(!empty($NowMonthKcS)){
						$NowMonthKcSNum++;
					}
				}
				$TeaArray = explode(',',$TeaTopArr['teatopiconarr']);
				$condition .= " AND NOT FIND_IN_SET(id,'{$TeaTopArr['teatopiconarr']}') ";
			}
			foreach($TeaArray as $key_1 => $value_1){
				$TopIconFTea[] = pdo_fetch("SELECT * FROM ".GetTableName('icon')." WHERE id='{$value_1}' ");
			}

			$tempnew = true;
		}
		
	}

	//按分类显示
	if($tempnew == false || !is_TestFz()){
		$icontype = pdo_fetchall("SELECT title,id,ssort FROM ".GetTableName('icontype')." WHERE schoolid = '{$_GPC['schoolid']}' AND weid = '{$weid}' AND place = 13 ORDER BY ssort DESC",array(),'id');
	}
	// var_dump($icontype);die;
	$icontype[0] = array(
		'title' => '更多功能',
		'id' => 0 ,
		'ssort' => 0 
	);
 

	//查出所有icon
	$iconsF = pdo_fetchall("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place $condition ORDER by ssort ASC", array(':weid' => $weid, ':schoolid' => $schoolid, ':place' => 13));
	$temparray = [];
	foreach($iconsF as $k => $v){

		if(is_TestFz()){
			if($tempnew == true){
				$index_this_typeid = 0;
			}else{
				$index_this_typeid = $v['typeid'];
			}
		}else{
			$index_this_typeid = $v['typeid'];
		}
		

		if ($v['do'] == 'gkklist' || $v['do'] == 'gkkpjjl') {
			if (is_showgkk()) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}
	 
		if ($v['do'] == 'gkkpjjl') {
			$icontype[$index_this_typeid]['hasdata'][] = $v;
		}

		if ($v['do'] == 'tlylist') {
			$icontype[$index_this_typeid]['hasdata'][] = $v;
		}

		if ($v['do'] == 'noticelist') {
			if (IsHasQx($tid_global, 2000101, 2, $schoolid)) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'smssage') {
			if ((IsHasQx($tid_global, 2000401, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}
		if ($mallsetinfo['isShow'] == 1) {
			if ($v['do'] == 'goodslist') {
				if ((IsHasQx($tid_global, 2001701, 2, $schoolid))) {
					$icontype[$index_this_typeid]['hasdata'][] = $v;
				}
			}
		}

		if ($v['do'] == 'todolist') {
			if ((IsHasQx($tid_global, 2001201, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'cyylist') {
			if ((IsHasQx($tid_global, 2001301, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'tmycourse') {
			if ((IsHasQx($tid_global, 2001401, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'tkcsignall') {
			if ((IsHasQx($tid_global, 2001501, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'tyzxx') {
			if ((IsHasQx($tid_global, 2001801, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'tmssage') {
			if ((IsHasQx($tid_global, 2001001, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'mnoticelist') {
			if ((IsHasQx($tid_global, 2000101, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'zuoyelist') {
			if ((IsHasQx($tid_global, 2000301, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'yjfx') {
			if ((IsHasQx($tid_global, 2001901, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'bjq') {
			$icontype[$index_this_typeid]['hasdata'][] = $v;
		}

		if ($v['do'] == 'xclist') {
			if ((IsHasQx($tid_global, 2001601, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'stulist') {
			if ((IsHasQx($tid_global, 2000501, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'bmlist') {
			if ((IsHasQx($tid_global, 2000701, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'signlist') {
			if ((IsHasQx($tid_global, 2000601, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'jschecklog') {
			if ((IsHasQx($tid_global, 2001101, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'tongxunlu') {
			$icontype[$index_this_typeid]['hasdata'][] = $v;
		}

		if ($v['do'] == 'tzjhlist') {
			if ((IsHasQx($tid_global, 2000901, 2, $schoolid)) || (IsHasQx($tid_global, 2000911, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'shoucelist') {
			if ((IsHasQx($tid_global, 2000801, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'schoolbus') {
			if ((IsHasQx($tid_global, 2003101, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		$tuiguang = check_app('tuiguang',$weid,$schoolid);
		if ($v['do'] == 'trykclist') {
			if($tuiguang){
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'tmyscore') {
			if ((IsHasQx($tid_global, 2002001, 2, $schoolid)) && is_showpf() ) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}
		
		if ($v['do'] == 'tscoreall') {
			if ((IsHasQx($tid_global, 2002101, 2, $schoolid)) && is_showpf() ) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}
		
		if ($v['do'] == 'tallcamera') {
			if (((IsHasQx($tid_global, 2002501, 2, $schoolid)) && !$_W['schooltype'])) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}
		
		if ($v['do'] == 'tstuapinfo') {
			if ((IsHasQx($tid_global, 2002301, 2, $schoolid)) && is_showap()) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}
		
		if ($v['do'] == 'tvisitors') {
			if(vis()){
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'assetslist' ) {
			if( assets() && CheckSchoolSet($schoolid,'is_gw') ){
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}
		
		if ($v['do'] == 'assetsshenqing') {
			if ((IsHasQx($tid_global, 2003001, 2, $schoolid)) && assets() && CheckSchoolSet($schoolid,'is_gw') ) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}	
		}
		
		if ($v['do'] == 'assetsfix') {
			if (assets() && CheckSchoolSet($schoolid,'is_gw') ) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}
		
 

		if ($v['do'] == 'assetsfixlist') {
			if ((IsHasQx($tid_global, 2003002, 2, $schoolid)) && assets() && CheckSchoolSet($schoolid,'is_gw') ) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'roomreserve') {
			if (assets() && CheckSchoolSet($schoolid,'is_csyd') ) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'roomreservelist') {
			if ((IsHasQx($tid_global, 2002901, 2, $schoolid)) && assets() && CheckSchoolSet($schoolid,'is_csyd') ) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'tremind') {
			if(is_TestFz()){
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'tqzkh') {
			if(is_TestFz()){
				if($teacher['status'] == 2){
					$icontype[$index_this_typeid]['hasdata'][] = $v;

				}
			}
		}

		if ($v['do'] == 'tstuscore') {
			if ((IsHasQx($tid_global, 2002201, 2, $schoolid)) && is_showpf()) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}
		
		if ($v['do'] == 'chengjireview') {
			if ((IsHasQx($tid_global, 2002401, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}
		if ($v['do'] == 'chengjidetail') {
			 if(is_showpf()){
				$icontype[$index_this_typeid]['hasdata'][] = $v;

			 }
			 
		}
	
		if ($v['do'] == 'tsencerecord') {
			if ((IsHasQx($tid_global, 2002601, 2, $schoolid))) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'teatimetable') {
			if ((IsHasQx($tid_global, 2002701, 2, $schoolid)) && is_showgkk()) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'tbjscore') {
			if ((IsHasQx($tid_global, 2002801, 2, $schoolid)) && is_showpf()) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}
		
		if ($v['do'] == 'tkpi') {
			if (is_TestFz()) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'tgrade') {
			if (is_TestFz()) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

		if ($v['do'] == 'tdruglog') {
			if (keep_Blacklist()) {
				$is_bzr = pdo_fetch("SELECT tid FROM ".GetTableName('classify')." WHERE schoolid = '{$schoolid}' ANd weid = '{$weid}' AND type = 'theclass' AND tid = '{$tid_global}'");
				if($is_bzr){
					$icontype[$index_this_typeid]['hasdata'][] = $v;
				}
			}
		}

		if ($v['do'] == 'tdruglist') {
			$doctor = pdo_fetch("SELECT id FROM ".GetTableName('schoolset')." WHERE doctorid = '{$tid_global}' AND schoolid = '{$schoolid}' AND weid = '{$weid}' ");
			if (keep_Blacklist() && !empty($doctor)) {
				$icontype[$index_this_typeid]['hasdata'][] = $v;
			}
		}

	}
	 
	if (!empty($schoolid)) {
		if(is_TestFz()){
			if($TeaTopArr['teatemplate'] == 'new'){
				include $this->template('' . $school['style3'] . '/myschool_new');
			}else{
				include $this->template('' . $school['style3'] . '/myschool');
			}
		}else{
			include $this->template('' . $school['style3'] . '/myschool');
		}
	} else {
		include $this->template('teacher/myschool');
	}
} else {
	if (!empty($schoolid)) {
		$stopurl = $_W['siteroot'] . 'app/' . $this->createMobileUrl('bangding', array('schoolid' => $schoolid));
		header("location:$stopurl");
	} else {
		$stopurl = $_W['siteroot'] . 'app/' . $this->createMobileUrl('binding');
		header("location:$stopurl");
	}
}

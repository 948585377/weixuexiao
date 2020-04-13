<?php
/**
 * 微教育模块
 *
 * @author 高贵血迹
 */
        global $_W, $_GPC;
        $weid = $_W['uniacid'];
		$schoolid = intval($_GPC['schoolid']);
		$openid = $_W['openid'];
		$videoid = $_GPC['id'];
		
		$it = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where id = :id ", array(':id' => $_SESSION['user']));

		$school = pdo_fetch("SELECT videoname,videopic,style2,title,spic,tpic,headcolor FROM " . tablename($this->table_index) . " where weid = :weid AND id=:id ", array(':weid' => $weid, ':id' => $schoolid));
		$set = pdo_fetch("SELECT sensitive_word FROM " . tablename($this->table_set) . " where weid = :weid ", array(':weid' => $weid));
		$allowpy = 1;		
        if(!empty($it)){
			$student = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " where weid = :weid AND id = :id", array(':weid' => $weid, ':id' => $it['sid']));	
            $mac = get_device_type();
			if($_GPC['op'] == 'mybj'){		
				$mybj = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " WHERE weid = :weid And schoolid = :schoolid And sid = :sid", array(':weid' => $weid, ':schoolid' => $schoolid, ':sid' => $student['bj_id']));
				if($mybj['allowpy'] == 2){
					$allowpy = 2;
				}
				$start = $mybj['videostart'];
				$end = $mybj['videoend'];

				$is_ontime = 0 ;
				if (date('H:i',TIMESTAMP) > $start && $end > date('H:i',TIMESTAMP)){
					$is_ontime = 1;
					} 
				$pic = $school['videopic'];
				if($mac != 'ios'){
					$thisvideo = $mybj['video'];
					if (preg_match('/lechange/i', $mybj['video'])) {
						$thisvideo = $mybj['video'].'?v='.getRandomString(32);
					}
				}else{
					$thisvideo = $mybj['video'];
				}
				$myplsl  = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename($this->table_camerapl) . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' AND bj_id = '{$student['bj_id']}' And type = 2");
				$mydzsl  = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename($this->table_camerapl) . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' AND bj_id = '{$student['bj_id']}' And type = 1");
				$myisdz = pdo_fetch("SELECT id FROM " . tablename($this->table_camerapl) . " where weid = :weid AND schoolid = :schoolid AND bj_id = :bj_id AND userid = :userid", array(':weid' => $weid, ':schoolid' => $schoolid, ':bj_id' => $student['bj_id'], ':userid' => $it['id']));
				$name = $mybj['sname'];
				$thisclick = $mybj['videoclick'];
				$click = $mybj['videoclick'] + 1;
				pdo_update($this->table_classify, array('videoclick' =>  $click), array('sid' =>  $student['bj_id']));
				$allpl = pdo_fetchall("SELECT * FROM " . tablename($this->table_camerapl) . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' AND bj_id = '{$student['bj_id']}' AND type = 2 ORDER BY createtime DESC");
				$obid = 3;
				$this->checkobjiect($schoolid, $student['id'], $obid);				
			}else{
				$mybj = pdo_fetch("SELECT * FROM " . tablename($this->table_allcamera) . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' AND id = '{$videoid}'");
				if($mybj['is_pay'] == 1){
					$allow_sk = false;
					mload()->model('vod');
					$allow_look = check_vod_pay($schoolid, $it['sid'], $videoid, $it['id']);
					if($mybj['is_try'] == 1 && $mac == 'ios'){
						if(check_have_try($schoolid,$videoid,$it['id'])){
							$allow_sk = true;//检测是否有试看权限，排除安卓设备
						}
					}
				}else{
					$obid = 3;
					$this->checkobjiect($schoolid, $student['id'], $obid);						
				}		
				if($mybj['allowpy'] == 2){
					$allowpy = 2;
				}
				$start1    = $mybj['starttime1'];
				$end1      = $mybj['endtime1'];
				$start2    = $mybj['starttime2'];
				$end2      = $mybj['endtime2'];
				$start3    = $mybj['starttime3'];
				$end3      = $mybj['endtime3'];
				$is_ontime = 0 ;
				
					if ( $start1 != -1 && date('H:i',TIMESTAMP) > $start1 && $end1 > date('H:i',TIMESTAMP)){
					$is_ontime = 1;
					} 
					if ( $start2 != -1 && date('H:i',TIMESTAMP) > $start2 && $end2 > date('H:i',TIMESTAMP)){
					$is_ontime = 1 ;
					}
					if ( $start3 != -1 && date('H:i',TIMESTAMP) > $start3 && $end3 > date('H:i',TIMESTAMP)){
					$is_ontime = 1 ;
					}			
				$pic = $mybj['videopic'];
				if($mac != 'ios'){
					$thisvideo = $mybj['videourl'];
					if (preg_match('/lechange/i', $mybj['videourl'])) {
						$thisvideo = $mybj['videourl'].'?v='.getRandomString(32);
					}					
				}else{
					$thisvideo = $mybj['videourl'];
				}				
				$myplsl  = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename($this->table_camerapl) . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' AND carmeraid = '{$videoid}' And type = 2");
				$mydzsl  = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename($this->table_camerapl) . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' AND carmeraid = '{$videoid}' And type = 1");
				$myisdz = pdo_fetch("SELECT id FROM " . tablename($this->table_camerapl) . " where weid = :weid AND schoolid = :schoolid AND carmeraid = :carmeraid AND userid = :userid", array(':weid' => $weid, ':schoolid' => $schoolid, ':carmeraid' => $videoid, ':userid' => $it['id']));
				$name = $mybj['name'];
				$thisclick = $mybj['click'];
				$click = $mybj['click'] + 1;
				pdo_update($this->table_allcamera, array('click' =>  $click), array('id' =>  $videoid));
				$allpl = pdo_fetchall("SELECT * FROM " . tablename($this->table_camerapl) . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' AND carmeraid = '{$videoid}' AND type = 2 ORDER BY createtime DESC");
			}
			foreach($allpl as $key => $row){
				$user = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where id = :id ", array(':id' => $row['userid']));
				$allpl[$key]['time'] = sub_day($row['createtime']);
				if($user['pard'] == 0){
					$teacher = pdo_fetch("SELECT tname,thumb FROM " . tablename($this->table_teachers) . " where id = :id ", array(':id' => $user['tid']));
					$allpl[$key]['name'] = $teacher['tname']."老师";
					$allpl[$key]['icon'] = !empty($teacher['thumb']) ? $teacher['thumb'] : $school['tpic'];
				}else{
					$studen = pdo_fetch("SELECT s_name,icon FROM " . tablename($this->table_students) . " where id = :id ", array(':id' => $user['sid']));
					if($user['pard'] == 4){	
						$allpl[$key]['name'] = $studen['s_name'];
						$allpl[$key]['icon'] = !empty($studen['icon']) ? $studen['icon'] : $school['spic'];
					}else{
					$item = pdo_fetch("SELECT avatar FROM " . tablename ( 'mc_members' ) . " where uniacid = :uniacid AND uid=:uid ", array(':uid' => $user['uid'], ':uniacid' => $weid)); 
					$allpl[$key]['icon'] = $item['avatar'];
						if($user['pard'] == 2){
							$allpl[$key]['name'] = $studen['s_name']."妈妈";
						}
						if($user['pard'] == 3){
							$allpl[$key]['name'] = $studen['s_name']."爸爸";
						}
						if($user['pard'] == 4){
							$allpl[$key]['name'] = $studen['s_name']."家长";
						}						
					}
				}
			}
			if($it['pard'] == 0){
				$my = pdo_fetch("SELECT thumb FROM " . tablename($this->table_teachers) . " where id = :id ", array(':id' => $it['tid']));
				$myicon = empty($my['thumb']) ? $school['tpic'] : $my['thumb'];
			}else{
				if($it['pard'] == 4){
					$my = pdo_fetch("SELECT icon FROM " . tablename($this->table_students) . " where id = :id ", array(':id' => $it['sid']));
					$myicon = empty($my['icon']) ? $school['spic'] : $my['icon'];
				}else{
					$my = pdo_fetch("SELECT avatar FROM " . tablename ( 'mc_members' ) . " where uniacid = :uniacid AND uid=:uid ", array(':uid' => $it['uid'], ':uniacid' => $weid)); 
					$myicon = $my['avatar'];
				}
			}
			if (!empty($_W['setting']['remote']['type'])) { 
				$urls = $_W['attachurl']; 
			} else {
				$urls = $_W['siteroot'].'attachment/';
			}			
			include $this->template(''.$school['style2'].'/camera');
        }else{
			session_destroy();
		    $stopurl = $_W['siteroot'] .'app/'.$this->createMobileUrl('bangding', array('schoolid' => $schoolid));
			header("location:$stopurl");
			exit;
        }        
?>
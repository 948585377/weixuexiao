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
		$kcid = $_GPC['kcid'];
		$it = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where weid = :weid And :schoolid = schoolid And :openid = openid And :sid = sid", array(':weid' => $weid,':schoolid' => $schoolid,':openid' => $openid,':sid' => 0));
		$school = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where weid = :weid AND id=:id ", array(':weid' => $weid, ':id' => $schoolid));
		$kc = pdo_fetch("SELECT name FROM " . tablename($this->table_tcourse) . " where weid = :weid AND id=:id ", array(':weid' => $weid, ':id' => $kcid));
		$thistime = trim($_GPC['limit']);
		if($thistime){
			$condition = " AND id < '{$thistime}'";	
			//$leave1 = pdo_fetchall("SELECT id,sid FROM " . tablename($this->table_order) . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' AND type = 1 and status=2 And kcid='{$kcid}' and sid != 0 $condition GROUP BY sid,kcid ORDER BY id DESC LIMIT 0,10 ");

            $leave1 = pdo_fetchall("SELECT id,sid FROM " . GetTableName('coursebuy') . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' AND  kcid='{$kcid}' and sid != 0 and is_change != 1 $condition GROUP BY kcid,sid ORDER BY id DESC  LIMIT 0,10 ");

			foreach($leave1 as $key =>$row){
				$students = pdo_fetch("SELECT id,s_name,numberid,xq_id,sex,icon FROM " . tablename($this->table_students) . " where weid = '{$weid}' And schoolid = '{$schoolid}' And id = {$row['sid']} ");
				$banji = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " where sid = :sid And schoolid = :schoolid ", array(':schoolid' => $schoolid,':sid' => $students['xq_id']));
				$yq = pdo_fetchcolumn("SELECT sum(costnum) FROM " . tablename($this->table_kcsign) . " where weid = '{$weid}' And schoolid = '{$schoolid}' And sid = {$row['sid']} And kcid = '{$kcid}' And status = 2 ");
				$buy = pdo_fetchcolumn("SELECT ksnum FROM " . tablename($this->table_coursebuy) . " where weid = '{$weid}' And schoolid = '{$schoolid}' And sid = {$row['sid']} And kcid = '{$kcid}' ");
				$leave1[$key] = $students;
				$leave1[$key]['banji'] = $banji['sname'];
				$leave1[$key]['yq'] = $yq;
				$leave1[$key]['buy'] = $buy?$buy:0;
				$rest = $leave1[$key]['buy'] - $yq;
				$leave1[$key]['rest'] = ($rest>= 0)?$rest:0;
				$leave1[$key]['sid']=$leave1[$key]['id'];
				$leave1[$key]['id'] = $row['id'];	
			}
			include $this->template('comtool/tkcstu');	 
		}else{
			//$leave = pdo_fetchall("SELECT id,sid FROM " . tablename($this->table_order) . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' AND type = 1 and status=2 And kcid='{$kcid}' and sid != 0 GROUP BY sid,kcid ORDER BY id DESC LIMIT 0,10");

            $leave = pdo_fetchall("SELECT id,sid FROM " . GetTableName('coursebuy') . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' AND  kcid='{$kcid}' and sid != 0 and is_change != 1 GROUP BY kcid,sid ORDER BY id DESC  LIMIT 0,10 ");
			foreach($leave as $key =>$row){
				$students = pdo_fetch("SELECT id,s_name,numberid,xq_id,sex,icon FROM " . tablename($this->table_students) . " where weid = '{$weid}' And schoolid = '{$schoolid}' And id = {$row['sid']} ");
				$banji = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " where sid = :sid And schoolid = :schoolid ", array(':schoolid' => $schoolid,':sid' => $students['xq_id']));
				$yq = pdo_fetchcolumn("SELECT sum(costnum) FROM " . tablename($this->table_kcsign) . " where weid = '{$weid}' And schoolid = '{$schoolid}' And sid = {$row['sid']} And kcid = '{$kcid}' And status = 2 ");
				$buy = pdo_fetchcolumn("SELECT ksnum FROM " . tablename($this->table_coursebuy) . " where weid = '{$weid}' And schoolid = '{$schoolid}' And sid = {$row['sid']} And kcid = '{$kcid}' ");
				$leave[$key] = $students;
				$leave[$key]['banji'] = $banji['sname'];
				$leave[$key]['yq'] = $yq;
				$leave[$key]['buy'] =$buy?$buy:0;
				$rest = $leave[$key]['buy'] - $yq;
				$leave[$key]['rest'] = ($rest>= 0)?$rest:0;
				$leave[$key]['sid']	=$leave[$key]['id'];
				$leave[$key]['id'] = $row['id'];
			}
			include $this->template(''.$school['style3'].'/tkcstu');	
		}				        		
        if(empty($it)){
			session_destroy();
            $stopurl = $_W['siteroot'] .'app/'.$this->createMobileUrl('bangding', array('schoolid' => $schoolid));
			header("location:$stopurl");
        }        
?>
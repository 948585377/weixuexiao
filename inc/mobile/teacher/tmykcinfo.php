<?php
/**
 * 微教育模块
 *
 * @author 高贵血迹
 */
    global $_W, $_GPC;
    $weid = $_W ['uniacid']; 
	$openid = $_W['openid'];
    $id = intval($_GPC['id']);
	$schoolid = intval($_GPC['schoolid']);
	if(!empty($_GPC['checktid'])){
		$checktid = $_GPC['checktid'];
	}
	//检查是否用户登陆
	$userid = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where :schoolid = schoolid And :weid = weid And :openid = openid And :sid = sid", array(':weid' => $weid, ':schoolid' => $schoolid, ':openid' => $openid, ':sid' => 0), 'id');
	$it = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where weid = :weid AND id=:id ORDER BY id DESC", array(':weid' => $weid, ':id' => $userid['id']));
	$school = pdo_fetch("SELECT style3,title,tpic,logo FROM " . tablename($this->table_index) . " where weid = :weid AND id = :id ", array(':weid' => $weid, ':id' => $schoolid));
	$tid_global = $it['tid'];
	if($it){
		//获取基本信息
		if(empty($checktid)){
			$teacher = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " WHERE schoolid = :schoolid And id = :id", array(':schoolid' => $schoolid,':id' => $it['tid']));
		}elseif(!empty($checktid)){
			$teacher = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " WHERE schoolid = :schoolid And id = :id", array(':schoolid' => $schoolid,':id' => $checktid));
		}

		$item = pdo_fetch("SELECT * FROM " . tablename($this->table_tcourse) . " WHERE id = :id ", array(':id' => $id));
		//var_dump($item);
		$showTime = TIMESTAMP + $item['signTime']*60;
		//var_dump($showTime);
		$t_array = explode(',',$item['tid']);
		$tname_array = ' ';
		$tid_tname = array();
		foreach( $t_array as $key_t => $value_t )
		{
			$teacher_all =  pdo_fetch("SELECT id,tname FROM " . tablename($this->table_teachers) . " WHERE schoolid = :schoolid And id = :id", array(':schoolid' => $schoolid,':id' => $value_t));	
			$tname_array.=$teacher_all['tname']."/";
			$tid_tname[$key_t] = $teacher_all;
		}
		$tname_array_end = trim($tname_array,"/");
		
		$time = strtotime(date('Ymd'));
		$time1 =$time + 86399;
		if($item['OldOrNew'] == 0){
			 $list = pdo_fetchall("SELECT * FROM " . tablename($this->table_kcbiao) . " WHERE weid = :weid AND schoolid =:schoolid AND kcid = :kcid  ORDER BY date ASC", array(':weid' => $weid, ':schoolid' => $schoolid, ':kcid' => $id));
			 foreach( $list as $key => $value )
			{
				if(empty($checktid)){
					$checksign = pdo_fetch("SELECT id FROM " . tablename($this->table_kcsign) . " WHERE weid='{$weid}' AND schoolid='{$schoolid}' AND  ksid = '{$value['id']}' AND kcid='{$id}' AND tid='{$it['tid']}' And status=2 ");
					$checkothersign = pdo_fetch("SELECT id FROM " . tablename($this->table_kcsign) . " WHERE weid='{$weid}' AND schoolid='{$schoolid}' AND  ksid = '{$value['id']}' AND kcid='{$id}' And tid!='{$it['tid']}' AND sid=0 And status=2 ");
					if(!empty($checksign)){
						$list[$key]['checksign'] = 1;
					}
					if(!empty($checkothersign)){
						$list[$key]['checksign'] = 2;
					}
				}elseif(!empty($checktid)){
					$checksign = pdo_fetch("SELECT id FROM " . tablename($this->table_kcsign) . " WHERE weid='{$weid}' AND schoolid='{$schoolid}' AND  ksid = '{$value['id']}' AND kcid='{$id}' AND tid='{$checktid}' And status=2 ");
					$checkothersign = pdo_fetch("SELECT id FROM " . tablename($this->table_kcsign) . " WHERE weid='{$weid}' AND schoolid='{$schoolid}' AND  ksid = '{$value['id']}' AND kcid='{$id}' And tid!='{$checktid}' AND sid=0 And status=2 ");
					if(!empty($checksign)){
						$list[$key]['checksign'] = 1;
					}
					if(!empty($checkothersign)){
						$list[$key]['checksign'] = 2;
					}
				}
				$list[$key]['nub'] = $key +1;
				
			}
			$isHaveKs = pdo_fetch("select * FROM ".tablename($this->table_kcbiao)." WHERE date>='{$time}' AND date<='{$time1}' And kcid = '{$item['id']}'");
			if (empty($_GPC['notOwner']))
			{
				$ableKs =pdo_fetchall("select * FROM ".tablename($this->table_kcbiao)." WHERE date>='{$time}' AND date<='{$time1}' And kcid = '{$item['id']}' and  tid='{$it['tid']}'"); 
			}elseif(!empty($_GPC['notOwner'])){
				$ableKs =pdo_fetchall("select * FROM ".tablename($this->table_kcbiao)." WHERE date>='{$time}' AND date<='{$time1}' And kcid = '{$item['id']}' "); 
			}
			
			foreach( $ableKs as $key_ks => $value_ks )
			{
				$sd = pdo_fetch("select sname FROM ".tablename($this->table_classify)." WHERE sid='{$value_ks['sd_id']}'"); 
				$ableKs[$key_ks]['sdname'] = $sd['sname'];
			}
			//var_dump($ableKs);
			if (!empty($isHaveKs)){
				$hasSign = pdo_fetch("select id FROM ".tablename($this->table_kcsign)." WHERE createtime>='{$time}' AND createtime<'{$time1}' And kcid = '{$item['id']}' AND ksid = '{$isHaveKs['id']}' AND tid!='{$it['tid']}' and sid=0 and status=2 ");
				$myhassign = pdo_fetch("select id,status FROM ".tablename($this->table_kcsign)." WHERE createtime>='{$time}' AND createtime<'{$time1}' And kcid = '{$item['id']}' AND ksid = '{$isHaveKs['id']}' AND tid='{$it['tid']}' ");
			}
		}else{
			$hasSign = pdo_fetch("select id FROM ".tablename($this->table_kcsign)." WHERE createtime>='{$time}' AND createtime<'{$time1}' And kcid = '{$item['id']}' AND tid!='{$it['tid']}' AND sid=0 and status=2 ");
			$myhassign = pdo_fetch("select id,status FROM ".tablename($this->table_kcsign)." WHERE createtime>='{$time}' AND createtime<'{$time1}' And kcid = '{$item['id']}' AND tid='{$it['tid']}' ");
			if(empty($checktid)){
				$kslist =  pdo_fetchall("select * FROM ".tablename($this->table_kcsign)." WHERE weid='{$weid}' And schoolid='{$schoolid}' And kcid = '{$item['id']}' And sid=0 And status=2 ");
			}elseif(!empty($checktid)){
				$kslist =  pdo_fetchall("select * FROM ".tablename($this->table_kcsign)." WHERE weid='{$weid}' And schoolid='{$schoolid}' And kcid = '{$item['id']}' And tid={$checktid} And status=2 ");
			}
		}

		
	    if($item['maintid'] != 0){
			$teacher_main = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " where weid = :weid AND schoolid=:schoolid AND id=:id", array(':weid' => $weid, ':schoolid' => $schoolid, ':id' => $item['maintid']));
		}else{
			$teacher_main = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " where weid = :weid AND schoolid=:schoolid AND id=:id", array(':weid' => $weid, ':schoolid' => $schoolid, ':id' => $item['tid']));
		}
		$title = $item['title'];
        $category = pdo_fetchall("SELECT * FROM " . tablename($this->table_classify) . " WHERE weid = :weid AND schoolid = :schoolid ", array(':weid' => $weid, ':schoolid' => $schoolid), 'sid');
        include $this->template(''.$school['style3'].'/tmykcinfo');
	}else{
		session_destroy();
	    $stopurl = $_W['siteroot'] .'app/'.$this->createMobileUrl('bangding', array('schoolid' => $schoolid));
		header("location:$stopurl");
		exit;
	}
?>
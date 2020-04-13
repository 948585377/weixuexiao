<?php
/**
 * 微教育模块
 *
 * @author 高贵血迹
 */
    global $_W, $_GPC;
    $weid = $this->weid;
    $from_user = $this->_fromuser;
	$schoolid = intval($_GPC['schoolid']);
	$openid = $_W['openid'];
    $obid = 1;
    
    //查询是否用户登录		
	$userid = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where :schoolid = schoolid And :weid = weid And :openid = openid And :sid = sid", array(':weid' => $weid, ':schoolid' => $schoolid, ':openid' => $openid, ':sid' => 0), 'id');
	$it = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where weid = :weid AND id=:id ORDER BY id DESC", array(':weid' => $weid, ':id' => $userid['id']));	
	$school = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where weid = :weid AND id=:id ORDER BY ssort DESC", array(':weid' => $weid, ':id' => $schoolid));
	$teachers = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " where weid = :weid AND id = :id", array(':weid' => $_W ['uniacid'], ':id' => $it['tid']));		
	$allnj =getallnj($it['tid']);
	if($allnj){
        $allnj =getallnj($it['tid']);
    }else{
        $allnj =array();
    }
	$nj_temp = array();
	foreach( $allnj as $key => $value )
	{
		$nj_temp[$key] = $value['sid'];
	}	
	
	if(!empty($it)){
	    $allsign =  pdo_fetchall("SELECT * FROM " . tablename($this->table_kcsign) . " where weid = '{$weid}' And schoolid = '{$schoolid}' And sid=0   ORDER BY createtime DESC ");
	    //var_dump($allsign);
	    $list = array();
	    $list_noneed = array();
	    $list_need = array();
	    $i_noneed = 0 ;
	    $i_need = 0;
	    $i_l = 0;
	    foreach( $allsign as $keya => $valuea )
	    {
	    	$kcinfo =  pdo_fetch("SELECT * FROM " . tablename($this->table_tcourse) . " where weid = '{$weid}' And schoolid = '{$schoolid}' And id='{$valuea['kcid']}' ");
	    	if($kcinfo['OldOrNew'] ==0){
		    	$checksign = pdo_fetch("SELECT id FROM " . tablename($this->table_kcsign) . " where weid = '{$weid}' And schoolid = '{$schoolid}' And sid=0 And status=2 And ksid={$valuea['ksid']} ");
	    	}elseif($kcinfo['OldOrNew'] ==1){
		    	$timestart = strtotime(date("Ymd",$valuea['createtime']));
		    	$timeend =$timestart + 86399;
		    	$checksign = pdo_fetch("SELECT id FROM " . tablename($this->table_kcsign) . " where weid = '{$weid}' And schoolid = '{$schoolid}' And sid=0 And  status=2 And tid !={$valuea['tid']} And kcid={$valuea['kcid']} And createtime>{$timestart} And createtime<{$timeend} "); 
	    	}
	    	if(in_array($kcinfo['xq_id'],$nj_temp)){
		    	if($valuea['status'] ==2 ){
			    	$list_noneed[$i_noneed] = $valuea;
			    	$list_noneed[$i_noneed]['bj_id'] = $kcinfo['bj_id'];
		    		$list_noneed[$i_noneed]['OldOrNew'] = $kcinfo['OldOrNew'];
		    		$list_noneed[$i_noneed]['signed'] = 0;
		    		$i_noneed++;
		    	}elseif($valuea['status'] ==1){
			    	if(!empty($checksign)){
				    	$list_noneed[$i_noneed] =$valuea;
				    	$list_noneed[$i_noneed]['bj_id'] = $kcinfo['bj_id'];
		    			$list_noneed[$i_noneed]['OldOrNew'] = $kcinfo['OldOrNew'];
				    	$list_noneed[$i_noneed]['signed'] = 1;
				    	$i_noneed++;
			    	}else{
				    	$list_need[$i_need] =$valuea;
				    	$list_need[$i_need]['bj_id'] = $kcinfo['bj_id'];
		    			$list_need[$i_need]['OldOrNew'] = $kcinfo['OldOrNew'];
				    	$i_need++;
			    	}
			    	
		    	}
		    
	    	}
	    	
	    }
		include $this->template(''.$school['style3'].'/tqrjsqd');	
	}else{
		session_destroy();
	    $stopurl = $_W['siteroot'] .'app/'.$this->createMobileUrl('bangding', array('schoolid' => $schoolid));
		header("location:$stopurl");
		exit;
    }       
?>
<?php
/**
 * 微教育模块
 *
 * @author 高贵血迹
 */
global $_GPC, $_W;

$weid              = $_W['uniacid'];
$action            = 'kecheng';
$this1             = 'no2';
$GLOBALS['frames'] = $this->getNaveMenu($_GPC['schoolid'], $action);
$schoolid          = intval($_GPC['schoolid']);
$logo              = pdo_fetch("SELECT logo,title,is_kb,tpic,spic FROM " . tablename($this->table_index) . " WHERE id = '{$schoolid}'");
/** 学期? */
$xueqi = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = :weid And schoolid = :schoolid And type = :type ORDER BY ssort DESC", array(':weid' => $weid, ':type' => 'semester', ':schoolid' => $schoolid));

/** 科目? */
$km = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = :weid And schoolid = :schoolid And type = :type ORDER BY ssort DESC", array(':weid' => $weid, ':type' => 'subject', ':schoolid' => $schoolid));

/** 班级? */
$bj = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = :weid And schoolid = :schoolid And type = :type ORDER BY ssort DESC", array(':weid' => $weid, ':type' => 'theclass', ':schoolid' => $schoolid));

/** 星期? */
$xq = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = :weid And schoolid = :schoolid And type = :type ORDER BY ssort DESC", array(':weid' => $weid, ':type' => 'week', ':schoolid' => $schoolid));

/** 时段? */
$sd = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = :weid And schoolid = :schoolid And type = :type ORDER BY ssort DESC", array(':weid' => $weid, ':type' => 'timeframe', ':schoolid' => $schoolid));

/**教室**/
$js = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = :weid And schoolid = :schoolid And type = :type ORDER BY ssort DESC", array(':weid' => $weid, ':type' => 'addr', ':schoolid' => $schoolid));
/** 期号 */
$qh = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = :weid And schoolid = :schoolid And type = :type ORDER BY ssort DESC", array(':weid' => $weid, ':type' => 'score', ':schoolid' => $schoolid));

$allkc = pdo_fetchall("SELECT id,name FROM " . tablename($this->table_tcourse) . " WHERE  weid = :weid And schoolid = :schoolid ORDER BY  CONVERT(name USING gbk)  ASC", array(':weid' => $weid, ':schoolid' => $schoolid));
$category = pdo_fetchall("SELECT * FROM " . tablename($this->table_classify) . " WHERE weid = :weid And schoolid = :schoolid ORDER BY sid ASC, ssort DESC", array(':weid' => $weid, ':schoolid' => $schoolid), 'sid');
$tuan = check_app('tuan',$weid,$schoolid);$tuiguang = check_app('tuiguang',$weid,$schoolid);$zhuli = check_app('zhuli',$weid,$schoolid);
$operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
$tid_global = $_W['tid'];
if($tid_global !='founder' && $tid_global != 'owner'){
		$loginTeaFzid =  pdo_fetch("SELECT fz_id FROM " . tablename ($this->table_teachers) . " where weid = :weid And schoolid = :schoolid And id =:id ", array(':weid' => $weid,':schoolid' => $schoolid,':id'=>$tid_global));
		$qxarr = GetQxByFz($loginTeaFzid['fz_id'],1,$schoolid);
}
if($operation == 'post'){
 	if (!(IsHasQx($tid_global,1000922,1,$schoolid))){
		$this->imessage('非法访问，您无权操作该页面','','error');	
	}
  	$addr =  pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = '{$weid}' And schoolid ='{$schoolid}' And type='addr' ORDER BY ssort DESC ");
    load()->func('tpl');
    $id = intval($_GPC['id']);
    if(!empty($id)){
        $item     = pdo_fetch("SELECT * FROM " . GetTableName('kcbiao') . " WHERE id = :id ", array(':id' => $id));
        $kc       = pdo_fetch("SELECT * FROM " . tablename($this->table_tcourse) . " WHERE id = :id ", array(':id' => $item['kcid']));
        $teachers = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " WHERE id = :id ", array(':id' => $item['tid']));	
         $tidarray = explode(',', $kc['tid']);
                foreach( $tidarray as $key => $value )
                {
                	$allteacher[$key] = pdo_fetch("SELECT id,tname FROM " . tablename ($this->table_teachers) . " where id = :id ", array(':id' => $value));		
                }
        
        if(empty($item)){
            $this->imessage('抱歉，本条信息不存在在或是已经删除！', '', 'error');
        }
    }
    if(checksubmit('submit')){
	    if(empty($_GPC['sktid'])){
		     $this->imessage('授课老师不能为空！', '', 'referer');
	    }
	    $sdinfo = pdo_fetch("SELECT sd_start,sd_end FROM " . GetTableName ('classify') . " where sid = :sid ", array(':sid' => $_GPC['sd']));
		$lasttime =$_GPC['date'].date(" H:i",$sdinfo['sd_start']);
		$check_start = strtotime($_GPC['date'].date(" H:i",$sdinfo['sd_start']));
		$check_end   = strtotime($_GPC['date'].date(" H:i",$sdinfo['sd_end']));
		$data = array(
            'weid'        => $weid,
            'schoolid'    => $schoolid,
            'tid'         => intval($_GPC['sktid']),
            'kcid'        => trim($_GPC['kcid']),
            'sd_id'       => trim($_GPC['sd']),
            'isxiangqing' => trim($_GPC['isxiangqing']),
            'content'     => trim($_GPC['content']),
			'addr_id'	  => trim($_GPC['addr_id']),
			'costnum'	  => $_GPC['costnum']?$_GPC['costnum']:1,
            'date'        => strtotime($lasttime),
        );
		if($_GPC['piliang'] == 1){//批量编辑同期其他规则时候 检查冲突排课
			unset($data['date']);
			$allks = pdo_fetchall("SELECT * FROM " . GetTableName('kcbiao'). " WHERE kcid = :kcid And rulsetid = :rulsetid ", array(':kcid' => $_GPC['kcid'],':rulsetid' => $item['rulsetid']));
			$sucks = 0;
			$defks = 0;
			$defaddr = '';
			$defakc = '';
			$defatea = '';
			foreach($allks as $key => $r){
				$data['date'] = strtotime(date('Y-m-d',$r['date']).date(" H:i",$sdinfo['sd_start']));
				$start = strtotime(date('Y-m-d',$r['date']).date(" H:i",$sdinfo['sd_start']));
				$end   = strtotime(date('Y-m-d',$r['date']).date(" H:i",$sdinfo['sd_end']));
				$checkaddr =  pdo_fetch("SELECT id FROM " . GetTableName('kcbiao') . " where id != '{$r['id']}' And addr_id='{$_GPC['adrr']}' And date>='{$start}' And date<= '{$end}' ");
				if(empty($checkaddr)){
					$checkkc =  pdo_fetch("SELECT id FROM " . GetTableName('kcbiao') . " where id != '{$r['id']}' And  kcid='{$kcid}' And date>='{$start}' And date<= '{$end}' ");
					if(empty($checkkc)){
						$checktea =  pdo_fetch("SELECT id FROM " . GetTableName('kcbiao') . " where id != '{$r['id']}' And  tid='{$dataarray['tid']}' And date>='{$start}' And date<= '{$end}' ");
						if(empty($checktea)){
							pdo_update(GetTableName('kcbiao',false), $data, array('id' =>$r['id']));
							$sucks ++;
						}else{
							$defatea .= ",".date('Y-m-d',$r['date']);
							$defks ++;
						}
					}else{
						$defakc .= ",".date('Y-m-d',$r['date']);
						$defks ++;
					}
				}else{
					$defaddr .= ",".date('Y-m-d',$r['date']);
					$defks ++;
				}
				$msg = "成功修改".$sucks."节";
				if($defakc != '' || $defaddr != '' || $defatea != ''){
					if($defakc != ''){
						$msg .= ",本课程以下日期排课冲突".$defakc;
					}
					if($defaddr != ''){
						$msg .= ",本教室以下日期排课冲突".$defaddr;
					}
					if($defatea != ''){
						$msg .= ",该老师以下日期排课冲突".$defatea;
					}
				}
			}
		}else{
			$check =  pdo_fetch("SELECT id FROM " . GetTableName('kcbiao') . " where id != '{$id}' And addr_id='{$_GPC['adrr']}' And date>='{$check_start}' And date<= '{$check_end}' ");
			$checktea =  pdo_fetch("SELECT id FROM " . GetTableName('kcbiao') . " where id != '{$id}' And tid='{$_GPC['sktid']}' And date>='{$check_start}' And date<= '{$check_end}' ");
			if(!empty($checktea)){
				$this->imessage('抱歉，本老师该时间已有其他排课！', '', 'error');
			}
			if(!empty($check)){
				$this->imessage('抱歉，本课时与其他课时冲突！', '', 'error');
			}
		}
        if(empty($id)){
            $this->imessage('抱歉，本课时不存在在或是已经删除！', '', 'error');
        }else{
			if($_GPC['piliang'] == 1){
				$this->imessage($msg, $this->createWebUrl('kcbiao', array('op' => 'display', 'schoolid' => $schoolid)), 'success');
			}else{
				pdo_update($this->table_kcbiao, $data, array('id' => $id));
				$this->imessage('修改成功！', $this->createWebUrl('kcbiao', array('op' => 'display', 'schoolid' => $schoolid)), 'success');
			}
			
        }
    }
}elseif($operation == 'display'){
	$mode = !empty($_GPC['mode']) ? $_GPC['mode'] : 'table';
	if($mode == 'list'){
		if (!(IsHasQx($tid_global,1000921,1,$schoolid))){
			$this->imessage('非法访问，您无权操作该页面','','error');	
		}
		$pindex    = max(1, intval($_GPC['page']));
		$psize     = 20;
		$condition = '';
		$time = time();
		$is_start = !empty($_GPC['is_start'])?$_GPC['is_start'] : -1 ;
		switch ( $is_start )
		{
			case -1 :
				break;
			case 1 :
				$condition .= "And date > {$time}";
				break;
			case 2 :
				$condition .= "And date <= {$time} ";
				break;	
			default:
				break;
		}
		if(!empty($_GPC['name'])){
			$condition .= " And id LIKE '%{$_GPC['name']}%' ";
		}
		if(!empty($_GPC['kcname'])){
			 $kcname = trim($_GPC['kcname']);
			$kcsearch = pdo_fetchall("SELECT id FROM " . tablename($this->table_tcourse) . " WHERE weid='{$weid}' And schoolid='{$schoolid}' And name LIKE '%$kcname%' ");
			$kcid_temp = '';
			if(!empty($kcsearch)){
				foreach( $kcsearch as $key => $value )
				{
					$kcid_temp .=$value['id'].",";
				}
				$kcid_str = trim($kcid_temp,",");
				$condition .= " And kcid in ({$kcid_str}) ";
			}
			else{
				 $condition .= " And kcid =0 ";
			}
		}
	   
		if (!empty($_GPC['tname'])) {
			$tname = trim($_GPC['tname']);
			$tid = pdo_fetch("SELECT id FROM " . tablename ($this->table_teachers) . " where weid='{$weid}' And schoolid='{$schoolid}' And tname ='{$tname}'");
			$condition .= "And tid ='{$tid['id']}' ";
		}
		if(!empty($_GPC['kc_id'])){
			$kcid       = intval($_GPC['kc_id']);
			$condition .= " And kcid = '{$kcid}'";
		}

		if(!empty($_GPC['km_id'])){
			$cid       = intval($_GPC['km_id']);
			$condition .= " And km_id = '{$cid}'";
		}
		if(!empty($_GPC['js_id'])){
			$jsid       = intval($_GPC['js_id']);
			$condition .= " And addr_id = '{$jsid}'";
		}

		if(!empty($_GPC['xq_id'])){
			$cid       = intval($_GPC['xq_id']);
			$condition .= " And xq_id = '{$cid}'";
		}

		if(!empty($_GPC['sd_id'])){
			$cid       = intval($_GPC['sd_id']);
			$condition .= " And sd_id = '{$cid}'";
		}

		if(!empty($_GPC['kstime'])) {
		   // if()
			$starttime = strtotime($_GPC['kstime']['start']);
			$endtime = strtotime($_GPC['kstime']['end']) + 86399;
			if($starttime >0 && $endtime>0 )
			{
				$condition .= " And date > '{$starttime}' And date < '{$endtime}'";
			}
			
		}
		if(!empty($_GPC['kcName'])){
			$kcFromKeId = pdo_fetchcolumn("SELECT id FROM " . tablename($this->table_tcourse) . " WHERE weid='{$weid}' And schoolid='{$schoolid}' And name = '{$_GPC['kcName']}' ");
			$condition .= "And kcid = {$kcFromKeId}";
		}
		$index = $pindex*$psize - ($psize-1);
		$list = pdo_fetchall("SELECT * FROM " . GetTableName('kcbiao') . " WHERE weid = '{$weid}' And schoolid = '{$schoolid}' $condition ORDER BY date ASC LIMIT " . ($pindex - 1) * $psize . ',' . $psize);
		foreach($list as $key => $row){
			$teacher = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " where id = :id ", array(':id' => $row['tid']));
			$kc      = pdo_fetch("SELECT * FROM " . tablename($this->table_tcourse) . " where id = :id ", array(':id' => $row['kcid']));
			$bmstu   = pdo_fetchcolumn("SELECT COUNT(distinct sid ) FROM " . tablename($this->table_order) . " WHERE weid = '{$weid}' And schoolid = '{$schoolid}' And type = 1 And status = 2 And kcid = '{$row['kcid']}' And sid != 0  " );
			$signstu = pdo_fetchcolumn("SELECT COUNT(distinct sid ) FROM " . GetTableName('kcsign') . " WHERE weid = '{$weid}' And schoolid = '{$schoolid}'  And status = 2 And kcid = '{$row['kcid']}' And ksid = '{$row['id']}' And sid != 0   " );
			 $leavetu = pdo_fetchcolumn("SELECT COUNT(distinct sid ) FROM " . GetTableName('kcsign') . " WHERE weid = '{$weid}' And schoolid = '{$schoolid}'  And status = 3 And kcid = '{$row['kcid']}' And ksid = '{$row['id']}' And sid != 0   " );
			 $signtid = pdo_fetch("SELECT tid FROM " . GetTableName('kcsign') . " WHERE weid = '{$weid}' And schoolid = '{$schoolid}'  And status = 2 And kcid = '{$row['kcid']}' And ksid = '{$row['id']}' And sid = 0  And tid != 0  " );
			 $teaSign = pdo_fetch("SELECT tname FROM " . tablename($this->table_teachers) . " where id = :id ", array(':id' => $signtid['tid']));
			$weekarray=array("星期日","星期一","星期二","星期三","星期四","星期五","星期六"); //先定义一个数组
	//echo "星期".$weekarray[date("w")];
			$list[$key]['tname']  = $teacher['tname'];
			$list[$key]['kcname'] = $kc['name'];
			$list[$key]['adrr']   = $kc['adrr'];
			$list[$key]['unsign']  = $bmstu - $signstu ;
			$list[$key]['signstu']  = $signstu?$signstu:0;
			$list[$key]['leavetu']  = $leavetu?$leavetu:0;
			$list[$key]['teaSign']  = $teaSign['tname'];
			$list[$key]['index']   = $index;
			$list[$key]['week'] = $weekarray[date("w",$row['date'])];
			$index++;
		}
		$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . GetTableName('kcbiao') . " WHERE weid = '{$weid}' And schoolid = '{$schoolid}' $condition");

		$pager = pagination($total, $pindex, $psize);
	}
	if($mode == 'table'){
		$teachers = pdo_fetchall("SELECT id,tname FROM " . GetTableName('teachers') . " WHERE schoolid = :schoolid ", array(':schoolid' => $schoolid));	
		$nowweek = $_GPC['dtweek'] ? $_GPC['dtweek'] :str_pad(date("W"),1,"0",STR_PAD_LEFT);//动态周期
		$alladdr =  pdo_fetchall("SELECT sid,sname FROM " . GetTableName('classify') . " where schoolid = '{$schoolid}' And type = 'addr' ");
		$kslist = GetOneKcKsOrder($kcid,0);
	}
}elseif($operation == 'kb_dianm'){
    load()->func('tpl');
    $ksid = intval($_GPC['ksid']);
	$ksinfo   = pdo_fetch("SELECT * FROM " . GetTableName('kcbiao') . " WHERE id = :id ", array(':id' => $ksid));
    if(!empty($ksinfo) && !empty($_GPC['sid'])){
		$kcinfo   = pdo_fetch("SELECT OldOrNew FROM " . GetTableName('tcourse') . " WHERE id = :id ", array(':id' => $ksinfo['kcid']));
		$kcbiaodata = array(
			'tid'      => intval($_GPC['tid']),
			'costnum'  => $_GPC['ks_costnum']?$_GPC['ks_costnum']:1
		);
		if(empty($_GPC['tid'])){//没修改老师的情况
			unset($kcbiaodata['tid']);
		}else{//修改了老师的进行新建签到或更新数据
			$teasigndata = array(
				'weid'        => $weid,
				'schoolid'    => $schoolid,
				'tid'         => intval($_GPC['tid']),
				'kcid'        => $ksinfo['kcid'],
				'ksid'        => $ksid,
				'status'	  => 2,
				'type'	  	  => $kcinfo['OldOrNew'],
				'qrtid'       => is_numeric($tid_global)? $tid_global : -1,
				'costnum'	  => $_GPC['ks_costnum']?$_GPC['ks_costnum']:1,
				'createtime'  => time(),
				'signtime'    => time()
			);
			$checktea = pdo_fetch("SELECT id FROM " . GetTableName('kcsign') . " WHERE  ksid = '{$ksid}' And tid != 0 And sid = 0 " );
			if(!empty($checktea)){
				pdo_update(GetTableName('kcsign',false), $teasigndata, array('id' => $checktea['id']));
				$tsignid = $checktea['id'];
			}else{
				pdo_insert(GetTableName('kcsign',false), $teasigndata);
				$tsignid = pdo_insertid();
			}
			if($_GPC['pev_tea'] == 1){
				$this->sendMobileQrjsqdtz($tsignid,$schoolid,$weid);
			}
		}
		pdo_update(GetTableName('kcbiao',false), $kcbiaodata, array('id' => $ksid));//修改本节课老师和课时消耗数量
		if(!empty($_GPC['sid'])){
			mload()->model('kc');
			$dianumber = 0;
			$dmxgumber = 0;
			$ksbg = '';
			foreach($_GPC['sid'] as $key => $row){
				$GetRestKsBySid = GetRestKsBySid($ksinfo['kcid'],$row);
				$stusigndata = array(
					'weid'        => $weid,
					'schoolid'    => $schoolid,
					'sid'         => intval($row),
					'kcid'        => $ksinfo['kcid'],
					'ksid'        => $ksid,
					'status'	  => $_GPC['status'][$key],
					'type'	  	  => $kcinfo['OldOrNew'],
					'qrtid'       => is_numeric($tid_global)? $tid_global : -1,
					'costnum'	  => $_GPC['costnum'][$key],
					'createtime'  => time(),
					'signtime'    => time()
				);
				if($_GPC['status'][$key] != 2){ //前端未选到课，本条不记录扣课时
					unset($stusigndata['costnum']);
				}else{
					if($GetRestKsBySid['restnumber'] < $_GPC['costnum'][$key]){//检查学生课时是否足够
						$ksbg .='|'.$_GPC['s_name'][$key];//记录课时不足的名单
						$stusigndata['status'] = 1;//并标记为待确认
						unset($stusigndata['costnum']);
					}
				}
				$checkstu = pdo_fetch("SELECT id FROM " . GetTableName('kcsign') . " WHERE kcid = '{$ksinfo['kcid']}' And ksid = '{$ksid}' And sid = '{$row}' " );
				if(!empty($checkstu)){
					unset($stusigndata['createtime']);
					pdo_update(GetTableName('kcsign',false), $stusigndata, array('id' => $checkstu['id']));
					$signid = $checkstu['id'];
					$dmxgumber++;
				}else{
					pdo_insert(GetTableName('kcsign',false), $stusigndata);
					$signid = pdo_insertid();
					$dianumber++;
				}
				if($_GPC['pev_stu'] == 1 && $_GPC['status'][$key] == 2){
					$this->sendMobileXsqrqdtz($signid, $schoolid, $weid);
				}
			}
			$result['result'] = true;
			$result['msg'] = '点名成功,新点名'.$dianumber.'个学生,修改点名状态'.$dmxgumber.'个学生';
			if($ksbg != ''){
				$result['msg'] = '点名成功,新点名'.$dianumber.'个学生,修改点名状态'.$dmxgumber.'个学生'.'以下学生课时不足,无法点名'.$ksbg;
			}
		}
	}else{
		if(empty($_GPC['sid'])){
			$result['result'] = false;
			$result['msg'] = '本课无学生报名,无法点名';
		}
		if(empty($ksinfo)){
			$result['result'] = false;
			$result['msg'] = '本课时不存在，或被删除，请刷新本页';
		}
	}
	die(json_encode($result));
}elseif($operation == 'kb_tiaoke'){
    load()->func('tpl');
    $ksid = intval($_GPC['ksid']);
    if(!empty($ksid)){
        $item   = pdo_fetch("SELECT * FROM " . GetTableName('kcbiao') . " WHERE id = :id ", array(':id' => $ksid));        
		$sdinfo = pdo_fetch("SELECT sd_start,sd_end FROM " . GetTableName ('classify') . " where sid = :sid ", array(':sid' => $_GPC['sd_id']));
		$lasttime = $_GPC['date'].date(" H:i",$sdinfo['sd_start']);
		$check_start = strtotime($_GPC['date'].date(" H:i",$sdinfo['sd_start']));
		$check_end   = strtotime($_GPC['date'].date(" H:i",$sdinfo['sd_end']));
		$signstu = pdo_fetch("SELECT id FROM " . GetTableName('kcsign') . " WHERE ( status = 2 Or status = 3 ) And kcid = '{$row['kcid']}' And ksid = '{$ksid}' And sid != 0   " );
		$signtid = pdo_fetch("SELECT id FROM " . GetTableName('kcsign') . " WHERE status = 2 And kcid = '{$item['kcid']}' And ksid = '{$ksid}' And sid = 0  And tid != 0  " );
		$data = array(
			'weid'        => $weid,
			'schoolid'    => $schoolid,
			'tid'         => intval($_GPC['tid']),
			'kcid'        => $item['kcid'],
			'sd_id'       => trim($_GPC['sd_id']),
			'content'     => trim($_GPC['content']),
			'addr_id'	  => trim($_GPC['addr_id']),
			'costnum'	  => $_GPC['costnum']?$_GPC['costnum']:1,
			'date'        => strtotime($lasttime),
		);
		if($signstu){
			unset($data['date']);
		}
		if($signtid){
			unset($data['tid']);
		}else{
			if(empty($_GPC['tid'])){
				$result['result'] = false;
				$result['msg'] = '授课老师不能为空！';
				die(json_encode($result));
			}
		}
		$check =  pdo_fetch("SELECT id FROM " . GetTableName('kcbiao') . " where id != '{$ksid}' And addr_id='{$_GPC['adrr']}' And date>='{$check_start}' And date<= '{$check_end}' ");
		$checktea =  pdo_fetch("SELECT id FROM " . GetTableName('kcbiao') . " where id != '{$ksid}' And tid='{$_GPC['tid']}' And date>='{$check_start}' And date<= '{$check_end}' ");
		$checksd =  pdo_fetch("SELECT id FROM " . GetTableName('kcbiao') . " where kcid = '{$item['kcid']}' And sd_id='{$_GPC['sd_id']}' And date>='{$check_start}' And date<= '{$check_end}' ");
		if(!empty($checksd)){
			$result['result'] = false;
			$result['msg'] = '抱歉，本课本日期本时段已有排课！';
		}
		if(!empty($check)){
			$result['result'] = false;
			$result['msg'] = '抱歉，调课目标日期其他课时教室冲突！';
		}
		if(!empty($checktea)){
			$result['result'] = false;
			$result['msg'] = '抱歉，本老师该时间已有其他排课！';
		}
		if(empty($check) && empty($checktea) && empty($checksd)){
			pdo_update(GetTableName('kcbiao',false), $data, array('id' => $ksid));
			$result['result'] = true;
			$result['msg'] = '调课成功';
		}
	}else{
		$result['result'] = false;
		$result['msg'] = '本课时不存在，或被删除，请刷新本页';
	}
	die(json_encode($result));	
}elseif($operation == 'get_oneks'){
	$ksid = $_GPC['ksid'];
	$ksinfo = pdo_fetch('SELECT * FROM ' . GetTableName('kcbiao') . " WHERE id = '{$ksid}' ");
	if($ksinfo){
		$signstu = pdo_fetchcolumn("SELECT COUNT(distinct sid ) FROM " . GetTableName('kcsign') . " WHERE status = 2 And kcid = '{$ksinfo['kcid']}' And ksid = '{$ksid}' And sid != 0   " );
		$checktea = pdo_fetch("SELECT id,tid FROM " . GetTableName('kcsign') . " WHERE status = 2 And kcid = '{$ksinfo['kcid']}' And ksid = '{$ksinfo['id']}' And tid != 0   " );
		$teasign = false;
		if($checktea){
			$teasign = true;
		}
		$data['result'] = true;
		$ksinfo['riqi'] = date('Y-m-d',$ksinfo['date']);
		$data['signstu'] = $signstu;
		$data['teasign'] = $teasign;
		$data['checktea'] = $checktea;
		$data['ksinfo'] = $ksinfo;
		$data['msg'] = '获取课时信息成功';
	}else{
		$data['result'] = false;
		$data['msg'] = '此课时不存在,请确认';
	}
	die( json_encode($data));
}elseif($operation == 'get_oneks_stulist'){//获取指定课时的信息包含正式学员列表
	$ksid = $_GPC['ksid'];
	$ksinfo = pdo_fetch('SELECT * FROM ' . GetTableName('kcbiao') . " WHERE id = '{$ksid}' ");
	if($ksinfo){
		//$allsignstu   = pdo_fetchall("SELECT sid,kcid,team_id FROM " . GetTableName('order') . " WHERE type = 1 And status = 2 And kcid = '{$ksinfo['kcid']}' And sid != 0  " );
		$allsignstu = pdo_fetchall("SELECT * FROM " . GetTableName('coursebuy') . " WHERE kcid = :kcid And is_change != :is_change  ", array( ':kcid' => $ksinfo['kcid'], 'is_change' => 1 )); 
		$signstu = pdo_fetchcolumn("SELECT COUNT(distinct sid ) FROM " . GetTableName('kcsign') . " WHERE status = 2 And kcid = '{$ksinfo['kcid']}' And ksid = '{$ksinfo['id']}' And sid != 0   " );
		$signstuqueke = pdo_fetchcolumn("SELECT COUNT(distinct sid ) FROM " . GetTableName('kcsign') . " WHERE status = 0 And kcid = '{$ksinfo['kcid']}' And ksid = '{$ksinfo['id']}' And sid != 0   " );
		$leavetu = pdo_fetchcolumn("SELECT COUNT(distinct sid ) FROM " . GetTableName('kcsign') . " WHERE status = 3 And kcid = '{$ksinfo['kcid']}' And ksid = '{$ksinfo['id']}' And sid != 0   " );
		$checktea = pdo_fetch("SELECT id,tid FROM " . GetTableName('kcsign') . " WHERE status = 2 And kcid = '{$ksinfo['kcid']}' And ksid = '{$ksinfo['id']}' And tid != 0   " );
		$queke  = count($allsignstu) - $signstu - $signstuqueke;
		$teasign = false;
		if($checktea){
			$teasign = true;
		}
		//status  1待确认 2签到成功  3请假
		if(is_array($allsignstu)){
			mload()->model('kc');
			foreach($allsignstu as $key => $row){
				$stuinfo = pdo_fetch('SELECT s_name,icon,mobile FROM ' . GetTableName('students') . " WHERE id = '{$row['sid']}' ");
				if($stuinfo){
					$user = pdo_fetch("SELECT mobile FROM " . GetTableName('user') . " WHERE sid = :sid ", array(':sid' => $row['sid']));
					$allsignstu[$key]['mobile'] = empty($user['mobile'])?$stuinfo['mobile']:$user['mobile'];
					$allsignstu[$key]['s_name'] = $stuinfo['s_name'];
					$allsignstu[$key]['icon'] = empty($stuinfo['icon'])?tomedia($logo['spic']):tomedia($stuinfo['icon']);
					$GetRestKsBySid = GetRestKsBySid($row['kcid'],$row['sid']);
					$allsignstu[$key]['restnum'] = $GetRestKsBySid['restnumber'];
					$allsignstu[$key]['buycourse'] = $GetRestKsBySid['buycourse'];
					$allsignstu[$key]['ks_hassign'] = 2;
					$checkstusign = pdo_fetch("SELECT * FROM " . GetTableName('kcsign') . " WHERE sid = :sid And ksid=:ksid  ", array(':sid' => $row['sid'],':ksid'=> $ksid));
					if($checkstusign){
						$allsignstu[$key]['ks_hassign'] = 1;
						$allsignstu[$key]['checkstusign'] = $checkstusign;
					}
				}else{
					unset($allsignstu[$key]);
					pdo_delete(GetTableName('coursebuy',false),array('id'=>$row['sid']));
				}				
			}
			if(is_array($allsignstu)){
				sort_array_multi($allsignstu, ['ks_hassign'], ['asc']);
			}
		}
		$allsigntea = pdo_fetchall("SELECT * FROM " . GetTableName('kcsign') . " WHERE  kcid = '{$ksinfo['kcid']}' And ksid = '{$ksinfo['id']}' And tid != 0   " );
		foreach($allsigntea as $key => $row){
			$teainfo = pdo_fetch('SELECT tname,thumb FROM ' . GetTableName('teachers') . " WHERE id = '{$row['tid']}' ");
			$allsigntea[$key]['tname'] = $teainfo['tname'];
			$allsigntea[$key]['thumb'] = empty($teainfo['thumb'])?tomedia($logo['tpic']):tomedia($teainfo['thumb']);
		}
		$data['result'] = true;
		$ksinfo['riqi'] = date('Y-m-d',$ksinfo['date']);
		$data['queke'] = $queke;
		$data['teasign'] = $teasign;
		$data['checktea'] = $checktea;
		$data['signstu'] = $signstu;
		$data['allsigntea'] = $allsigntea;
		$data['allsignstu'] = $allsignstu;
		$data['ksinfo'] = $ksinfo;
		$data['msg'] = '获取课时信息成功';
	}else{
		$data['result'] = false;
		$data['msg'] = '此课时不存在,请确认';
	}
	die( json_encode($data));
}elseif($operation == 'ks_list_online'){
	$condition = '';
	$condition1 = '';
	$kcid      = intval($_GPC['kcid']);
	if($_GPC['tid']){
		$condition1 .= "And tid = '{$_GPC['tid']}' ";
	}
	if($_GPC['cont_type'] != -1){
		$condition1 .= "And content_type = '{$_GPC['cont_type']}' ";
	}
	$kcinfo = pdo_fetch("SELECT allow_menu,tid,maintid FROM " . GetTableName('tcourse') . " where id = :id ", array(':id' => $kcid));
	$tidarray = explode(',', $kcinfo['tid']);
	$teachers = array();
	foreach( $tidarray as $key => $value ){
		$tea = pdo_fetch("SELECT id,tname,thumb FROM " . GetTableName ('teachers') . " where id = :id ", array(':id' => $value));
		$maintid = false;
		if($kcinfo['maintid'] == $tea['id']){
			$maintid = true;
		}
		$teachers[] = array(
			'id' 		=> $tea['id'],
			'maintid' 	=> $maintid,
			'tname' 	=> $tea['tname']
		);
	}
	if($kcinfo['allow_menu'] == 1){//启用章节
		$allmenu =  pdo_fetchall("SELECT * FROM " . GetTableName('kc_menu') . " where schoolid ='{$schoolid}' And kcid ='{$kcid}' ORDER BY id ASC");
		$menulist = pdo_fetchall("SELECT * FROM " . GetTableName('kc_menu') . " WHERE schoolid = '{$schoolid}' And kcid = '{$kcid}' ORDER BY id ASC ");
	}else{
		$menulist = array(array('name' => '默认章节'));
		$condition = " ";
	}
	$typearray = array(0=> '富文本',1=> '直播',2=> '视频',3=> '语音',4=> '纯图',5=> '文档/文件');
	foreach($menulist as $k => $item){
		if($kcinfo['allow_menu'] == 1){//启用章节
			$condition = "And menu_id = '{$item['id']}' ";
		}
		$menulist[$k]['list'] = pdo_fetchall("SELECT * FROM " . GetTableName('kcbiao') . " WHERE schoolid = '{$schoolid}' And kcid = '{$kcid}' $condition $condition1 ORDER BY ssort DESC ");
		foreach($menulist[$k]['list'] as $key => $row){
			$teacher = pdo_fetch("SELECT tname,thumb FROM " . GetTableName('teachers') . " where id = :id ", array(':id' => $row['tid']));
			$menulist[$k]['list'][$key]['tname'] = !empty($teacher['tname'])?$teacher['tname']:'未安排';
			$menulist[$k]['list'][$key]['thumb'] = !empty($teacher['tname'])?tomedia($teacher['thumb']):tomedia($logo['tpic']);
			$menulist[$k]['list'][$key]['type'] = $typearray[$row['content_type']];
			$menulist[$k]['list'][$key]['times'] = pdo_fetchcolumn("SELECT COUNT(distinct sid ) FROM " . GetTableName('kcsign') . " WHERE schoolid = '{$schoolid}'  And status = 2 And kcid = '{$kcid}' And ksid = '{$row['id']}' And sid != 0   " );
			$pkteahcer = '管理员';
			if($row['pkuser'] > 0){
				$teahcer = pdo_fetch("select tname FROM ".GetTableName('teachers')." WHERE id = '{$kcinfo['pkuser']}' ");
				$pkteahcer = $teahcer['tname'];
			}
			$menulist[$k]['list'][$key]['pkuser'] = $pkteahcer;
		}
	}
	$is_online = true;
    include $this->template('public/kctable_bot');
    return;	
}elseif($operation == 'ks_list'){
    $condition = '';
    $nowweek = $_GPC['dtweek'] ? $_GPC['dtweek'] :str_pad(date("W"),1,"0",STR_PAD_LEFT);//动态周期
    $NowDate = date("m-d");
    $dangqiannian = date("Y"); //当前年
    $nowweekstart = strtotime($dangqiannian.'-'.'W'.$nowweek.'-1'); // 本周的开始时间
    $nowweekend = strtotime($dangqiannian.'-'.'W'.$nowweek.'-7') + 86399; // 本周的结束时间
	if (!empty($_GPC['kcid'])) {
		$kcid      = intval($_GPC['kcid']);
		$condition .= "And kcid ='{$kcid}' ";
	}
	if (!empty($_GPC['tname'])) {
		$tname = trim($_GPC['tname']);
		$tid = pdo_fetch("SELECT id FROM " . GetTableName ('teachers') . " where schoolid='{$schoolid}' And tname ='{$tname}'");
		if($tid){
			$condition .= "And tid ='{$tid['id']}' ";
		}
    }
    if(!empty($_GPC['sk_tid'])){
        $tid       = intval($_GPC['sk_tid']);
        $condition .= " And tid = '{$tid}'";
    }
    if(!empty($_GPC['js_id'])){
        $jsid       = intval($_GPC['js_id']);
        $condition .= " And addr_id = '{$jsid}'";
    }
    mload()->model('kc');
    $Ord_key = 0;
    $list = GetKcInfo($weid, $schoolid, $condition,$kcid,$nowweekstart,$nowweekend);
   //var_dump($backinfo);
    $Data = array(
        0=>array(
            'title' => "周一",
            'date' => date('m-d',$nowweekstart),
			'index'=> 7
        ),
        1=>array(
            'title' => "周二",
            'date' => date('m-d',$nowweekstart + 86400 ),
			'index'=> 6
        ),
        2=>array(
            'title' => "周三",
            'date' => date('m-d',$nowweekstart + 86400*2 ),
			'index'=> 5
        ),
        3=>array(
            'title' => "周四",
            'date' => date('m-d',$nowweekstart + 86400*3 ),
			'index'=> 4
        ),
        4=>array(
            'title' => "周五",
            'date' => date('m-d',$nowweekstart + 86400*4 ),
			'index'=> 3
        ),
        5=>array(
            'title' => "周六",
            'date' => date('m-d',$nowweekstart + 86400*5 ),
			'index'=> 2
        ),
        6=>array(
            'title' => "周日",
            'date' => date('m-d',$nowweekstart + 86400*6 ),
			'index'=> 1
        ),
    );
    
    foreach($list as $key => $value){
        $weekOrder = $value['week'];
        if($weekOrder != 0){
            $Data[$weekOrder - 1]['data'][$value['sd_id']]['data'][] = $value;
            $Data[$weekOrder - 1]['data'][$value['sd_id']]['start_time'] = $value['sd_start'];
            $Data[$weekOrder - 1]['data'][$value['sd_id']]['end_time'] = $value['sd_end'];
        }else{
            $Data[$weekOrder + 6]['data'][$value['sd_id']]['data'][] = $value;
            $Data[$weekOrder + 6]['data'][$value['sd_id']]['start_time'] = $value['sd_start'];
            $Data[$weekOrder + 6]['data'][$value['sd_id']]['end_time'] = $value['sd_end'];
        } 
    }
    $NowTimeLine = date("H:i",time());
	$is_online = false;
    include $this->template('public/kctable_bot');
    return;
}elseif($operation == 'displayteam'){
	$teamid      = intval($_GPC['teamid']);
	$team = pdo_fetch("SELECT masterid FROM " . GetTableName('sale_team') . " where id = :id ", array(':id' => $teamid));
	$list = pdo_fetchall("SELECT * FROM " . GetTableName('sale_team') . " where masterid = :masterid ", array(':masterid' => $team['masterid']));
	if($list){
		foreach($list as $key => $row){
			if($row['orderid'] > 0){
				pdo_delete(GetTableName('coursebuy',false), array('orderid' => $row['orderid']));
				pdo_delete(GetTableName('order',false), array('id' => $row['orderid']));
			}
			pdo_delete(GetTableName('sale_team',false), array('id' => $row['id']));
		}
	}
	$result['result'] = true;
	$result['msg'] = 'OK';
	die(json_encode($result));
}elseif($operation == 'change_trysee'){
	$ksid      = intval($_GPC['ksid']);
	$ksinfo = pdo_fetch("SELECT id,is_try_see FROM " . GetTableName('kcbiao') . " where id = :id ", array(':id' => $ksid));
	if($ksinfo){
		$data = array('is_try_see' => intval($_GPC['trysee']));
		pdo_update(GetTableName('kcbiao',false), $data, array('id' => $ksid));
		$result['result'] = true;
		$result['msg'] = 'OK';
	}else{
		$result['result'] = false;
		$result['msg'] = '本课时不存在或已被删除';
	}
	die(json_encode($result));
}elseif($operation == 'del_oneks'){
    $ksid = intval($_GPC['ksid']);
	$ksinfo = pdo_fetch("SELECT id FROM " . GetTableName('kcbiao') . " where id = :id ", array(':id' => $ksid));
    if(!empty($ksinfo)){
		pdo_delete(GetTableName('kcbiao',false), array('id' => $ksid));
		$result['result'] = true;
		$result['msg'] = '删除成功！';
    }else{
		$result['result'] = false;
		$result['msg'] = '本课时不存在或已被删除';
	}
    die(json_encode($result));	
}elseif($operation == 'delete'){
    $id = intval($_GPC['id']);
    if(empty($id)){
        $this->imessage('抱歉，本条信息不存在在或是已经被删除！');
    }
    pdo_delete($this->table_kcbiao, array('id' => $id));
    $this->imessage('删除成功！', referer(), 'success');
}elseif($operation == 'remind'){
    $id = intval($_GPC['id']);
    $schoolid = intval($_GPC['schoolid']);
    $weid = intval($_GPC['weid']);
    if(empty($id)){
        $this->imessage('抱歉，本条信息不存在在或是已经被删除！');
    }
   	pdo_update($this->table_kcbiao,array('is_remind'=>1),array('id'=>$id));
  	$this->sendMobileJssktx($id,$schoolid,$weid);
    $message = "提醒老师授课成功!";
	$data ['result'] = true;
	$data ['msg'] = $message;
	die (json_encode($data));
}elseif($operation == 'remindall'){
    $rowcount    = 0;
    $notrowcount = 0;
    foreach($_GPC['idArr'] as $k => $id){
        $id = intval($id);
        if(!empty($id)){
            $hasRemind = pdo_fetch("SELECT is_remind FROM " . GetTableName('kcbiao') . " WHERE id = :id", array(':id' => $id));
            if($hasRemind['is_remind'] ==1){
                $notrowcount++;
            }elseif($hasRemind['is_remind'] ==0){
	            $rowcount++;
             	pdo_update($this->table_kcbiao,array('is_remind'=>1),array('id'=>$id));
  				$this->sendMobileJssktx($id,$schoolid,$weid);
            }
        }
    }
	$message = "操作成功！共提醒{$rowcount}课时,{$notrowcount}课时无法重复提醒!";
	$data ['result'] = true;
	$data ['msg'] = $message;
	die (json_encode($data));
}elseif($operation == 'deleteall'){
    $rowcount    = 0;
    $notrowcount = 0;
    foreach($_GPC['idArr'] as $k => $id){
        $id = intval($id);
        if(!empty($id)){
            $goods = pdo_fetch("SELECT * FROM " . GetTableName('kcbiao') . " WHERE id = :id", array(':id' => $id));
            if(empty($goods)){
                $notrowcount++;
                continue;
            }
            pdo_delete($this->table_kcbiao, array('id' => $id, 'weid' => $weid));
            $rowcount++;
        }
    }
	$message = "操作成功！共删除{$rowcount}条数据,{$notrowcount}条数据不能删除!";
	$data ['result'] = true;
	$data ['msg'] = $message;
	die (json_encode($data));	
}
include $this->template('web/kcbiao');
?>
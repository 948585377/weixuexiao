<?php
/**
 * 微教育模块
 *
 * @author 高贵血迹
 */
global $_GPC, $_W;

$weid              = $_W['uniacid'];
$action            = 'buzhu';
$this1             = 'no4';
$GLOBALS['frames'] = $this->getNaveMenu($_GPC['schoolid'], $action);
$schoolid          = intval($_GPC['schoolid']);
$logo              = pdo_fetch("SELECT logo,title FROM " . tablename($this->table_index) . " WHERE id = '{$schoolid}'");

$bj    = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = '{$weid}' AND schoolid ={$schoolid} And type = 'theclass' ORDER BY ssort DESC");
$nj = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = '{$weid}' AND schoolid ={$schoolid} And type = 'semester' ORDER BY ssort DESC");

$tid_global = $_W['tid'];
$operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';

/* if (!(IsHasQx($tid_global,1003301,1,$schoolid))){
	$this->imessage('非法访问，您无权操作该页面2','','error');	
} */


if($operation == 'export'){
	if(checksubmit()) {
			
		$file = upload_file($_FILES['file'], 'excel');
	
		if(is_error($file)) {
			$this->imessage($file['message'],'','error');
		}
		
		$data = read_excel($file);
		
		if(is_error($data)) {
			$this->imessage($data['message'],'','error');
		}
		unset($data[1]);
		if(empty($data)) {
			$this->imessage('没有要导入的数据','','error');
		}
		$suc_num = 0;
		$rep_num = 0;
		$notfind_num = 0 ;
		$stuname_str = '';
		//print_r($data);
		foreach($data as $strs) {
			
			$bj_id = pdo_fetch("SELECT sid,parentid FROM " . tablename($this->table_classify) . " WHERE sname=:sname AND weid=:weid And schoolid=:schoolid  ", array(':sname' => trim($strs[1]), ':weid' => $weid, ':schoolid'=> $schoolid));
			$sid = pdo_fetch("SELECT id FROM " . tablename($this->table_students) . " WHERE s_name=:s_name AND weid=:weid And schoolid=:schoolid and bj_id = :bj_id  ", array(':s_name' => trim($strs[0]), ':weid' => $weid, ':schoolid'=> $schoolid,'bj_id'=>$bj_id['sid']));
			if(empty($sid)){
				$notfind_num++;
				continue;
			}else{
				$insert['sid'] = empty($sid) ? 0 : intval($sid['id']);
				$insert['start_yue'] = trim($strs[2]);
				$insert['now_yue'] = trim($strs[2]);
				$this_starttime = strtotime($strs[3]);
				$this_endtime = strtotime($strs[4]) + 86399;
				$insert['starttime'] = $this_starttime;
				$insert['endtime'] = $this_endtime;
				$insert['schoolid'] = $schoolid;
				$insert['weid'] = $_W['uniacid'];
				$insert['createtime'] = time();
				$check = pdo_fetch("SELECT id FROM " . tablename($this->table_buzhulog) . " WHERE sid='{$sid['id']}' AND weid='{$_W['uniacid']}' And schoolid='{$schoolid}'  and ((starttime <='{$this_starttime}' and endtime >='{$this_starttime}') or (starttime <='{$this_endtime}' and endtime >='{$this_endtime}')  or (starttime >='{$this_starttime}' and endtime <='{$this_endtime}') )");
				if(!empty($check)){
					$rep_num++;
					$stuname_str .=$strs[0].' | ';
					continue;
				}else{
					pdo_insert($this->table_buzhulog, $insert);
					$yuelog = array(
						'schoolid' 		=> $schoolid,
						'weid'	   		=> $_W['uniacid'],
						'sid'	   		=> $sid['id'],
						'yue_type' 		=> 1,
						'cost' 	   		=> trim($strs[2]),
						'costtime' 		=> time(),
						'cost_type'		=> 1,
						'on_offline' 	=> 2,
						'createtime' => time()
					); 
					pdo_insert($this->table_yuecostlog,$yuelog);
				}
				$suc_num++;
			}
		} ;
		$fail_num = $rep_num + $notfind_num;
		$back_str = "导入成功{$suc_num}条补助发放记录。";
		if(!empty($fail_num)){
			$back_str .="{$fail_num}条发放失败。";
		}
		if(!empty($rep_num)){
			$back_str .="</br>以下{$rep_num}名学生补助有效期重复，发放失败：</br>{$stuname_str}";
		}
		$this->imessage($back_str, $this->createWebUrl('buzhu', array('op' => 'display', 'schoolid' => $schoolid)), 'success');
	}
	/*
	//导出学生量化积分*****************************************************
}elseif($operation == 'out_list'){
	if($limit == 0 ){
		$condition = ' ';	
	}elseif($limit == 1){
		$ob_str = '';
		foreach($scoreOb as $key_s=>$value_s){
			$ob_str .= $value_s['sid'].","; 
		}
		
		$ob_str = trim($ob_str,",");
		$condition = "and FIND_IN_SET(obid,'{$ob_str}')";	
	}
	$scoretime = $_GPC['scoretime'];
	if(empty($scoretime)){
		 $this->imessage('抱歉，请先选择时间！','','error');
	}
	$condition .= " and scoretime = '{$scoretime}' ";

	$list = pdo_fetchall("SELECT tid,sum(score) as allscore FROM " . tablename($this->table_teascore) . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' $condition  and type = 1  group by tid ORDER BY tid DESC  ");
		$ii = 0;
		$array_out = array();
		foreach($list as $key => $row){
			$array_out[$ii]['tname'] = pdo_fetch("SELECT tname FROM " . tablename($this->table_teachers) . " where id = :id ", array(':id' => $row['tid']))['tname'];
			foreach($scoreOb as $key_s=>$value_s){
				$array_out[$ii][$value_s['sname']] = pdo_fetchcolumn("SELECT score FROM " . tablename($this->table_teascore) . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' and tid = '{$row['tid']}' and scoretime = '{$scoretime}' and  obid = '{$value_s['sid']}' ") ? pdo_fetchcolumn("SELECT score FROM " . tablename($this->table_teascore) . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' and tid = '{$row['tid']}' and scoretime = '{$scoretime}' and  obid = '{$value_s['sid']}' ") :'0';
			}
			foreach($scoreObPa as $key_sp=>$value_sp){
				$array_out[$ii][$value_sp['sname']] = pdo_fetchcolumn("SELECT sum(score) as countscore FROM " . tablename($this->table_teascore) . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' and tid = '{$row['tid']}' and scoretime = '{$scoretime}' and  parentobid = '{$value_sp['sid']}' ") ? pdo_fetchcolumn("SELECT sum(score) as countscore FROM " . tablename($this->table_teascore) . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' and tid = '{$row['tid']}' and scoretime = '{$scoretime}' and  parentobid = '{$value_sp['sid']}' ") : '0';
			}
			$array_out[$ii]['all'] = $row['allscore'];
			 $ii++;
		}
		//var_dump($array_out);
		//die();
		$first_title = array();
		$first_title['tname'] = "教师姓名";
		foreach($scoreOb as $key_s=>$value_s){
			$first_title[$value_s['sid']] =$value_s['sname'];
		}
		foreach($scoreObPa as $key_sp=>$value_sp){
			$first_title[$value_sp['sid']] = $value_sp['sname'].'汇总';
		}
		$first_title[] = '总分';
		    $title="评分信息-".date("Y-m",$scoretime);
		    $this->exportexcel($array_out, $first_title, $title);
			exit();
			*/
}

if($operation == 'display'){

    $pindex    = max(1, intval($_GPC['page']));
    $psize     = 20;

    if(!empty($_GPC['stuname'])){
		$student = pdo_fetch("SELECT id FROM " . tablename($this->table_students) . " WHERE schoolid = :schoolid And s_name = :s_name ORDER BY id DESC LIMIT 1", array(':schoolid' => $schoolid,':s_name' => $_GPC['stuname']));
		$condition .= " AND sid = '{$student['id']}'";		
    }
	$yue_type = -1;
 
	if($_GPC['yue_type'] == 1){
		$yue_type = 1;
		$condition .= " and yue_type = 1  ";
	}
	if($_GPC['yue_type'] == 2){
		$yue_type = 2;
		$condition .= " and yue_type = 2  ";
	}


	$cost_type = -1;
 
	if($_GPC['cost_type'] == 1){
		$cost_type = 1;
		$condition .= " and cost_type = 1  ";
	}elseif($_GPC['cost_type'] == 2){
		$cost_type = 2;
		$condition .= " and cost_type = 2  ";
	}else{

		$condition .= " and FIND_IN_SET(cost_type,'1,2')  ";
	}

 
	
	if(!empty($_GPC['nj_id']) && empty($_GPC['bj_id'])){
		$student = pdo_fetchall("SELECT id FROM " . tablename($this->table_students) . " WHERE schoolid = :schoolid And xq_id = :xq_id ORDER BY id DESC ", array(':schoolid' => $schoolid,':xq_id' => $_GPC['nj_id']));
		$stu_str = '';
		foreach($student as $value){
			$stu_str .=$value['sid'].",";
		}
		$stu_str = tirm($stu_str,',');
		$condition .= " AND FIND_IN_SET(sid,'{$stu_str}')";		
    }
	if(!empty($_GPC['bj_id'])){
		$student = pdo_fetchall("SELECT id FROM " . tablename($this->table_students) . " WHERE schoolid = :schoolid And bj_id = :bj_id ORDER BY id DESC ", array(':schoolid' => $schoolid,':bj_id' => $_GPC['bj_id']));
		$stu_str = '';
		foreach($student as $value){
			$stu_str .=$value['sid'].",";
		}
		$stu_str = tirm($stu_str,',');
		$condition .= " AND FIND_IN_SET(sid,'{$stu_str}')";				
	}
	
 
	if(!empty($_GPC['createtime'])) {
		$starttime = strtotime($_GPC['createtime']['start']);
		$endtime = strtotime($_GPC['createtime']['end']) + 86399;
		$condition .= " AND createtime > '{$starttime}' AND createtime < '{$endtime}'";
	} else {
		$starttime = strtotime('-600 day');
		$endtime = TIMESTAMP;
	}

	if($_GPC['OutExcel'] == 'OutExcel'){
		ini_set("memory_limit","-1");
		$OutList = pdo_fetchall(" SELECT * FROM ".GetTableName('yuecostlog')." WHERE weid = '{$weid}' and schoolid = '{$schoolid}' and FIND_IN_SET(yue_type,'1,2') and FIND_IN_SET(cost_type,'1,2') $condition ORDER BY createtime DESC ");
		$ii = 0;
		$OutArr = [];
		foreach($OutList as $key_o => $row_o){
			$student = pdo_fetch("SELECT id,icon,s_name,bj_id,xq_id FROM " . tablename($this->table_students) . " WHERE schoolid = :schoolid And id = :id ", array(':schoolid' => $schoolid,':id' => $row_o['sid']));
			$bj_name = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " WHERE schoolid = :schoolid And sid = :sid ", array(':schoolid' => $schoolid,':sid' => $student['bj_id']));
			$nj_name = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " WHERE schoolid = :schoolid And sid = :sid ", array(':schoolid' => $schoolid,':sid' => $student['xq_id']));
			$OutArr[$ii]['sName'] = $student['s_name'];
			$OutArr[$ii]['NjName'] = $nj_name['sname'];	
			$OutArr[$ii]['BjName'] = $bj_name['sname'];
			//$OutArr[$ii]['BjName'] = $bj_name['sname'];
			$OutArr[$ii]['cost'] = $row_o['cost'];
			$OutArr[$ii]['costtype'] = $row_o['cost_type'] == 1 ? "充值" : $row_o['cost_type'] == 2 ? "消费" : '' ;
			$OutArr[$ii]['yuetype'] = $row_o['yue_type'] == 1 ? "国家补助" : $row_o['yue_type'] == 2 ? "普通余额" : '' ;
			$OutArr[$ii]['costtime'] = date("Y-m-d H:i:s",$row_o['createtime']);

			$ii++;
			 
		}
		$ExcelTitle = date("Y-m-d H:i:s",time())."流水记录表";
		$this->exportexcel($OutArr, array('学生', '年级','班级','金额','类型','余额种类' ,'流水时间'), $ExcelTitle);
		exit();

	}
	$list = pdo_fetchall(" SELECT * FROM ".GetTableName('yuecostlog')." WHERE weid = '{$weid}' and schoolid = '{$schoolid}' and FIND_IN_SET(yue_type,'1,2')  $condition ORDER BY costtime DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize);
	foreach($list as $key => $row){
		$student = pdo_fetch("SELECT id,icon,s_name,bj_id,xq_id FROM " . tablename($this->table_students) . " WHERE schoolid = :schoolid And id = :id ", array(':schoolid' => $schoolid,':id' => $row['sid']));
		if(!empty($student['icon'])){
			$list[$key]['sicon'] = $student['icon'];
		}else{
			$list[$key]['sicon'] = $logo['spic']; 
		}
		if($row['cost_type'] == 3){
			if($row['cztid'] == -1){
				$list[$key]['cztname'] = "管理员";
			}else{
				$cztea = pdo_fetch("SELECT tname FROM ".GetTableName('teachers')." WHERE id = '{$row['cztid']}' ");
				$list[$key]['cztname'] = $cztea['tname'];
			}
		}
		$bj_name = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " WHERE schoolid = :schoolid And sid = :sid ", array(':schoolid' => $schoolid,':sid' => $student['bj_id']));
		$nj_name = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " WHERE schoolid = :schoolid And sid = :sid ", array(':schoolid' => $schoolid,':sid' => $student['xq_id']));
		$list[$key]['bj_name'] = $bj_name['sname'];
		$list[$key]['nj_name'] = $nj_name['sname'];	
		$list[$key]['s_name'] = $student['s_name'];
		 

	}
	$total = pdo_fetchcolumn(" SELECT count(*) FROM ".GetTableName('yuecostlog')." WHERE weid = '{$weid}' and schoolid = '{$schoolid}' and FIND_IN_SET(yue_type,'1,2') and cost_type != 3 $condition ORDER BY createtime DESC ");
	$pager = pagination($total, $pindex, $psize);
	
}elseif($operation == 'delete'){
    $id = intval($_GPC['id']);
    if(empty($id)){
        $this->imessage('抱歉，本条信息不存在在或是已经被删除！');
    }
    pdo_delete($this->table_yuecostlog, array('id' => $id));
    $this->imessage('删除成功！', referer(), 'success');
}elseif($operation == 'deleteall'){
    $rowcount    = 0;
    $notrowcount = 0;
    foreach($_GPC['idArr'] as $k => $id){
        $id = intval($id);
        if(!empty($id)){
            $goods = pdo_fetch("SELECT * FROM " . tablename($this->table_yuecostlog) . " WHERE id = :id", array(':id' => $id));
            if(empty($goods)){
                $notrowcount++;
                continue;
            }
            pdo_delete($this->table_yuecostlog, array('id' => $id, 'weid' => $weid));
            $rowcount++;
        }
    }
    $message = "操作成功！共删除{$rowcount}条数据,{$notrowcount}条数据不能删除!";

    $data ['result'] = true;

    $data ['msg'] = $message;

    die (json_encode($data));
}
include $this->template('web/yuecostlog');
?>
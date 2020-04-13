<?php
/**
 * 微教育模块
 *
 * @author 高贵血迹
 */
global $_GPC, $_W;

$weid              = $_W['uniacid'];
$action            = 'chengji';
$this1             = 'no2';
$GLOBALS['frames'] = $this->getNaveMenu($_GPC['schoolid'], $action);
$schoolid          = intval($_GPC['schoolid']);
$logo              = pdo_fetch("SELECT logo,title FROM " . tablename($this->table_index) . " WHERE id = '{$schoolid}'");


$xq    = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = '{$weid}' AND schoolid ={$schoolid} And type = 'semester' ORDER BY ssort DESC");
$qh    = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = '{$weid}' AND schoolid ={$schoolid} And type = 'score' and is_review = 1 ORDER BY ssort DESC");

$category = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " WHERE weid =  '{$weid}' AND schoolid ={$schoolid} ORDER BY sid ASC, ssort DESC", array(':weid' => $weid, ':schoolid' => $schoolid), 'sid');

$operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
$tid_global = $_W['tid'];
if (!(IsHasQx($tid_global,1000805,1,$schoolid))){
	$this->imessage('非法访问，您无权操作该页面','','error');	
}
if($operation == 'display'){
    $pindex    = max(1, intval($_GPC['page']));
    $psize     = 20;
    $condition = '';
	if(!empty($_GPC['search_qh'])){
		$this_qhid = $_GPC['search_qh'];
	}else{
		$this_qhid =$qh[0]['sid'];
	}

	$this_qhinfo =  pdo_fetch("SELECT sid,sname,qhtype,qh_bjlist FROM " . tablename($this->table_classify) . " where weid = '{$weid}' AND schoolid ={$schoolid} and sid='{$this_qhid}' And type = 'score' ORDER BY ssort DESC");
	if($this_qhinfo['qhtype'] == 2){
		$this_bjlist = explode(",",$this_qhinfo['qh_bjlist']);
	}
	
	if(!empty($_GPC['search_nj'])){
		$this_njid = $_GPC['search_nj'];
	}else{
		$this_njid =$xq[0]['sid'];
	}
	$this_njinfo =  pdo_fetch("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = '{$weid}' AND schoolid ={$schoolid} and sid='{$this_njid}' And type = 'semester' ");
	$back_result = GetRviewByQhAndNj($this_qhid,$this_njid,$schoolid);
	
	if($_GPC['excel_review'] == 'excel_review'){
		$out_array = array();
		$title_array = array();
		$ii = 0	;
		foreach($back_result['data'] as $key=>$value){
			$out_array[$ii]['sname'] = $value['sname']; 
			$title_array['bj_name'] = '班级';
			foreach($value['data'] as $key_d=>$value_d){
				$key_avg_str = "avg".$key_d;
				$key_pass_str = "pass".$key_d;
				$key_final_str = "final".$key_d;
				$key_rank_str = "rank".$key_d;
				$title_array[$key_avg_str] =$value_d['km_name']."平均分";
				$title_array[$key_pass_str] =$value_d['km_name']."及格率";
				$title_array[$key_final_str] =$value_d['km_name']."得分";
				$title_array[$key_rank_str] =$value_d['km_name']."排名";
				$out_array[$ii][$key_avg_str] = $value_d['avg_score']; 
				$out_array[$ii][$key_pass_str] =$value_d['avg_per'];
				$out_array[$ii][$key_final_str] = $value_d['final_score']; 
				$out_array[$ii][$key_rank_str] = $value_d['rank']; 
			}
			$out_array[$ii]['allscore'] = $value['allscore']['score']; 
			$out_array[$ii]['allscorerank'] = $value['allscore']['rank_all']; 
			$title_array['allscore'] = "总分";
			$title_array['allscorerank'] = "总分排名";
			$ii++;
		}
		$title_excel = $this_qhinfo['sname'].'-'.$this_njinfo['sname'].' 考察结果';
			$this->exportexcel($out_array, $title_array, $title_excel);
			exit();
		
		
		
	}
	
	
	$lastdata = end($back_result['data']);
}
include $this->template('web/review');
?>
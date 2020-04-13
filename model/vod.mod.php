<?php
/**
 * 微教育模块
 *
 * @author 高贵血迹
 */
defined('IN_IA') or exit('Access Denied');
load()->func('communication');

function check_have_try($schoolid,$videoid,$userid){ //检查是否试看过本视频
	$check_try = pdo_fetch("SELECT id FROM " . tablename('wx_school_camerask') . " WHERE schoolid = '{$schoolid}' And carmeraid = '{$videoid}' And userid = '{$userid}' ");
	if(!$check_try){
		return true;
	}else{
		return false;
	}
}

function check_vod_pay($schoolid, $sid, $videoid, $userid) { //查询是否有观看视频 并返回 1 禁止观看  2允许观看 3请续费
	//检查全家情况
	$check_vod_order = pdo_fetchall("SELECT userid,vodtype,paytime FROM " . tablename('wx_school_order') . " where schoolid = '{$schoolid}' And sid = '{$sid}' And vodid = '{$videoid}' And type = 7 And status = 2 ORDER BY id DESC");
	$allow = 1;//禁止观看,请购买
	if($check_vod_order){
		$num = count($check_vod_order);
		$vod = pdo_fetch("SELECT days FROM " . tablename('wx_school_allcamera') . " where schoolid = '{$schoolid}' And id = '{$videoid}'");		
		foreach ($check_vod_order as $key => $value) {
			if($value['vodtype'] == 'one'){ 
				if($value['userid'] == $userid){  //检查到自己的ID
					$time = $vod['days'] * 86400;
					$times = $time + $value['paytime'];
					if($times > time()){
						$allow = 2;//允许观看
						break;						
					}else{
						$allow = 3;//单人观看续费
					}
				}					
			}else{ //非自己ID处理				
				$time = $vod['days'] * 86400;
				$times = $time + $value['paytime'];
				if($times > time()){
					$allow = 2;//允许观看
					break;						
				}else{
					$allow = 4;//全家观看续费
				}
			}			
		}
	}
	return $allow;
}

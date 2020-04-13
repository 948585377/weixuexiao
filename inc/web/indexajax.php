<?php
/**
* 微教育模块
*
* @author 高贵血迹
*/global $_W, $_GPC;
$operation = in_array ( $_GPC ['op'], array ('default','checkpass','guanli','getquyulist','getbjlist','createorder','changemactype','checkorder','getloadingorder','delorder','getallteacher','getgkkqr','recreateqr','get_user_qr','reget_user_qr','huifu_mail','getstu_bj','getstu_kc','buy_kc','xugou_kc','get_fzqx_qd','get_fzqx_ht','set_fzqx','get_signupdetail','bjtzfb','mnotpro','xytzfb','notpro', 'zytzfb','znotpro','getkclist','setcheckdate','getcheckholi','changeschooltype','checkverstypeforhtml','getdatesetinfo','getstu_ap','addTemplate','settemhy','getclassbyarr','makeorder','checkver','GetTeachersByFz','GetSellTea','SendBjtzWithArray','getalltimeset','delet_timeset','edit_timeset','getallmenulist','edit_menuset','delet_menuset','get_ks_conttemplet','any_fanslist',"SyncSchoolHXY",'KcGetStuByMass','AddBy') ) ? $_GPC ['op'] : 'default';

if ($operation == 'default') {
		   die ( json_encode ( array (
				 'result' => false,
				 'msg' => '参数错误'
				) ) );
}
if ($operation == 'any_fanslist') {
	$type = $operation;
	$list = pdo_fetchall("SELECT nickname,avatar,uid FROM " . tablename('mc_members') . " where avatar != '' And nickname != '' And uniacid = '{$_W['uniacid']}' ORDER BY RAND() limit 0,10");
	foreach($list as $key => $row){
		$checkopenid = pdo_fetch("SELECT openid FROM " . tablename('mc_mapping_fans') . " where uid = '{$row['uid']}' And uniacid = '{$_W['uniacid']}' ");
		$list[$key]['openid'] = $checkopenid['openid'];
		$fansinfo = mc_fansinfo($checkopenid['openid']);
		if(empty($fansinfo['headimgurl'])){
			unset($list[$key]);
		}
	}
	include $this->template('public/anyfans_list');
}
if ($operation == 'settemhy') {
	if (empty($_GPC ['weid'])) {
		$result ['result'] = false;
		$result ['msg'] = '参数错误';	   
	}else{
		$access_token = $this->getAccessToken2();
		$postarr = ' {"industry_id1":"16","industry_id2":"17"}';
		$res = ihttp_post('https://api.weixin.qq.com/cgi-bin/template/api_set_industry?access_token='.$access_token,$postarr);
		$content = @json_decode($res['content'],true);
		if($content['errcode'] == 0){
			$result ['msg'] = '设置成功';
			$result ['result'] = true;
		}else{
			$result ['result'] = false;
			$result ['msg'] = $content['errmsg'];
		}
		$result ['content'] = $content;
	}
	die ( json_encode ( $result ) );
}
if ($operation == 'addTemplate') {
	if (empty($_GPC ['weid'])) {
		$result ['result'] = false;
		$result ['msg'] = '参数错误';	   
	}else{
		mload()->model('sms');
		$template = $_GPC ['template'];
		$temp = temp_types($template);
		$access_token = $this->getAccessToken2();
		$postarr = '{"template_id_short": "'.$temp['id'].'"}';
		$res = ihttp_post('https://api.weixin.qq.com/cgi-bin/template/api_add_template?access_token='.$access_token,$postarr);
		$content = @json_decode($res['content'],true);
		if($content['errcode'] == 0){
			$result ['template_id'] = $content['template_id'];
			$result ['msg'] = '修改成功';
			$result ['result'] = true;
		}else{
			$result ['result'] = false;
			$result ['msg'] = '自动填充失败，检查公众号APPID及密钥是否正确';
		}
		$result ['temp'] = $temp;
		$result ['content'] = $content;
	}
	die ( json_encode ( $result ) );
}
if ($operation == 'changemactype') {
	if (empty($_GPC ['schoolid']) || empty($_GPC ['weid'])) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}else{  
		$data = array(
			'model_type'=> trim($_GPC['model_type']),
		);
		pdo_update($this->table_checkmac, $data, array('id' => $_GPC['macid']));
		$result ['result'] = true;
		$result ['msg'] = '修改成功';
	 die ( json_encode ( $result ) );
	}
}	
if ($operation == 'createorder') {
	if (empty($_GPC ['schoolid']) || empty($_GPC ['weid'])) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}
	$checkorder = pdo_fetch("SELECT * FROM " . tablename($this->table_online) . " WHERE :macid = macid And result = 2 And isread = 2", array(':macid' => trim($_GPC['macid'])));
	  
	if(!empty($checkorder)){
			 die ( json_encode ( array (
			 'result' => false,
			 'msg' => '尚有未执行完的任务,如需要执行定时任务,请先执行其他任务再执行该任务！'
			  ) ) );
	}else{  
		$data = array(
			'weid'	 	=> trim($_GPC['weid']),
			'schoolid'	=> trim($_GPC['schoolid']),
			'commond'   => trim($_GPC['order']),
			'macid'	    => trim($_GPC['macid']),
			'createtime'=> time()
		);
		if($_GPC['time_type'] == 2){
			if(empty($_GPC['dotime1']) || empty($_GPC['dotime1'])){
				 die ( json_encode ( array (
				 'result' => false,
				 'msg' => '抱歉,执行定时任务，请先选择时间！' 
				  ) ) );					
			}
			$signTime = $_GPC['dotime1']." ".$_GPC['dotime2'];
			$data['dotime']	= strtotime($signTime);
		}
		pdo_insert($this->table_online, $data);
		$onlineid = pdo_insertid();
		$result ['result'] = true;
		$result ['id'] 	= $onlineid;
		$result ['msg'] = '命令已创建！';

	 die ( json_encode ( $result ) );
	}
}
if ($operation == 'checkorder') {
	$order = pdo_fetch("SELECT * FROM " . tablename($this->table_online) . " WHERE :id = id ", array(':id' => trim($_GPC['id'])));
	if($order['result'] == 2){
		$result ['result'] = false;
		$result ['msg'] = '玩命执行命令中。。。';			
	}else{
		$result ['result'] = true;
		$result ['msg'] = '命令执行成功！';
	}
	 die ( json_encode ( $result ) );
	
}
if ($operation == 'delorder') {
	$order = pdo_fetch("SELECT * FROM " . tablename($this->table_online) . " WHERE :id = id ", array(':id' => trim($_GPC['id'])));
	if($order){
		$result ['result'] = true;
		$result ['msg'] = '删除成功';	
		pdo_delete($this->table_online, array('id' => trim($_GPC['id'])));	
	}else{
		$result ['result'] = false;
		$result ['msg'] = '此任务不存在或已被删除';
	}
	 die ( json_encode ( $result ) );
	
}	
if ($operation == 'getloadingorder') {
	$checkorder = pdo_fetch("SELECT * FROM " . tablename($this->table_online) . " WHERE :macid = macid And result = 2 And isread = 2", array(':macid' => trim($_GPC['id'])));
	if($checkorder){
		if(!empty($checkorder['dotime'])){
			$dotime = date('Y-m-d H:i:s',$checkorder['dotime']);
		}else{
			$dotime = "未执行";
		}
		if($checkorder['commond'] == 1){
			$ordername = "立即更新学生和卡信息.创建于".date('Y-m-d H:i:s',$checkorder['createtime'])." 执行时间:".$dotime;
		}
		if($checkorder['commond'] == 2){
			$ordername = "重新初始化学生和卡信息".date('Y-m-d H:i:s',$checkorder['createtime'])." 执行时间:".$dotime;
		}
		if($checkorder['commond'] == 3){
			$ordername = "更新图片".date('Y-m-d H:i:s',$checkorder['createtime'])." 执行时间:".$dotime;
		}
		if($checkorder['commond'] == 4){
			$ordername = "重启设备".date('Y-m-d H:i:s',$checkorder['createtime'])." 执行时间:".$dotime;
		}
		if($checkorder['commond'] == 11){
			$ordername = "更新所有信息".date('Y-m-d H:i:s',$checkorder['createtime'])." 执行时间:".$dotime;
		}
		if($checkorder['commond'] == 12){
			$ordername = "重启设备".date('Y-m-d H:i:s',$checkorder['createtime'])." 执行时间:".$dotime;
		}
		if($checkorder['commond'] == 13){
			$ordername = "设备关机".date('Y-m-d H:i:s',$checkorder['createtime'])." 执行时间:".$dotime;
		}
		if($checkorder['commond'] == 16){
			$ordername = "更新设备信息".date('Y-m-d H:i:s',$checkorder['createtime'])." 执行时间:".$dotime;
		}
		if($checkorder['commond'] == 14){
			$ordername = "更新卡信息（心跳）".date('Y-m-d H:i:s',$checkorder['createtime'])." 执行时间:".$dotime;
		}
		if($checkorder['commond'] == 15){
			$ordername = "更新班级信息（心跳）".date('Y-m-d H:i:s',$checkorder['createtime'])." 执行时间:".$dotime;
		}
		if($checkorder['commond'] == 17){
			$ordername = "更新访客信息（心跳）".date('Y-m-d H:i:s',$checkorder['createtime'])." 执行时间:".$dotime;
		}else{
			
			$ordername = $checkorder['commond'].date('Y-m-d H:i:s',$checkorder['createtime'])." 执行时间:".$dotime;
			}

		$result ['result'] = true;
		$result ['id'] = $checkorder['id'];
		$result ['ordername'] = $ordername;
	}else{
		$result ['result'] = false;	
	}
	 die ( json_encode ( $result ) );	
}




if ($operation == 'checkpass') {
	$data = explode ( '|', $_GPC ['json'] );
	if (! $_GPC ['schooid'] || ! $_GPC ['weid']) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
		 }
	
	$tid = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where :id = id And :weid = weid And :password = password", array(
			 ':id' => $_GPC ['schooid'],
			 ':weid' => $_GPC ['weid'],
			 ':password'=>$_GPC ['password']
			  ), 'id');
			  
	if(empty($tid['id'])){
			 die ( json_encode ( array (
			 'result' => false,
			 'msg' => '密码输入错误！' 
			  ) ) );
	}else{  			
		$data ['result'] = true;
		
		$data ['url'] = $_W['siteroot'] .'web/'.$this->createWebUrl('assess', array('id' => $_GPC ['schooid'], 'schoolid' =>  $_GPC ['schooid']));
		
		$data ['msg'] = '密码正确！';

	 die ( json_encode ( $data ) );
	}
}
if ($operation == 'guanli') {
	$data = explode ( '|', $_GPC ['json'] );
	if (! $_GPC ['schooid1'] || ! $_GPC ['weid']) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
		 }
	
	$tid = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where :id = id And :weid = weid And :password = password", array(
			 ':id' => $_GPC ['schooid1'],
			 ':weid' => $_GPC ['weid'],
			 ':password'=>$_GPC ['password1']
			  ), 'id');
			  
	if(empty($tid['id'])){
			 die ( json_encode ( array (
			 'result' => false,
			 'msg' => '密码输入错误！' 
			  ) ) );
	}else{  			
		$data ['result'] = true;
		
		$data ['url'] = $_W['siteroot'] .'web/'.$this->createWebUrl('school', array('id' => $_GPC ['schooid1'], 'schoolid' =>  $_GPC ['schooid1'], 'op' => 'post'));
		
		$data ['msg'] = '密码正确！';

	 die ( json_encode ( $data ) );
	}
}
if ($operation == 'getquyulist')  {
	if (! $_GPC ['weid']) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}else{
		$data = array();
		$bjlist = pdo_fetchall("SELECT * FROM " . tablename($this->table_area) . " where weid = '{$_GPC['weid']}' And parentid = '{$_GPC['gradeId']}' And type = '' ORDER BY ssort DESC");
		$data ['bjlist'] = $bjlist;
		$data ['result'] = true;
		$data ['msg'] = '成功获取！';
		
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
		$bjlist = pdo_fetchall("SELECT * FROM " . tablename($this->table_classify) . " where schoolid = '{$_GPC['schoolid']}' And parentid = '{$_GPC['gradeId']}' And type = 'theclass' ORDER BY CONVERT(sname USING gbk) ASC");
		$data ['bjlist'] = $bjlist;
		$data ['result'] = true;
		$data ['msg'] = '成功获取！';
		
	  die ( json_encode ( $data ) );
	  
	}
}




if($operation == 'GetTeachersByFz'){
	$schoolid = $_GPC['schoolid'];
	$fz_id = $_GPC['fz_id'];
   // if($fz_id != 0 ){
		$tealist = pdo_fetchall("SELECT id,tname FROM ".GetTableName('teachers')." WHERE schoolid = '{$schoolid}' And fz_id ='{$fz_id}' ORDER BY CONVERT(tname USING gbk) ASC ");
	//}else{

   // }

	die ( json_encode ( $tealist ) );
}


if ($operation == 'getallteacher')  {
	if (! $_GPC ['schoolid']) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}else{
		$data = array();
		$teachcers = pdo_fetchall("SELECT id,tname FROM " . tablename($this->table_teachers) . " where schoolid = '{$_GPC['schoolid']}' and weid='{$_W['uniacid']}' And tname = '{$_GPC['tname']}' ORDER BY id DESC");
		if($teachcers){
			$data ['teachcers'] = $teachcers;
			$data ['result'] = true;
			$data ['msg'] = '成功获取！';
		}else{
			$data ['result'] = false;
			$data ['msg'] = '无法查找到此老师，请确认姓名';			
		}
	  die ( json_encode ( $data ) );
	  
	}
}
if ($operation == 'get_user_qr')  {
	if (! $_GPC ['id']) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}else{
		load()->func('tpl');
		load()->func('file');
		$student = pdo_fetch("select icon from " . tablename($this->table_students) . " where id = :id ", array(':id' => $_GPC['id']));
		if(empty($student['icon'])){
			$spic  = pdo_fetch("SELECT spic FROM " . tablename($this->table_index) . " WHERE id = '{$_GPC ['schoolid']}'");
			if(empty($spic['spic'])){
				$datass ['result'] = false;
				$datass ['msg'] = '创建失败,如未上传学生头像,请先设置校园默认头像';
				 die ( json_encode ( $datass ) );
			}
		}
		$barcode = array(
			'expire_seconds' =>2592000 ,
			'action_name' => '',
			'action_info' => array(
							'scene' => array(
									'scene_id' => $_GPC['id']
							),
			),
		);
		$uniacccount = WeAccount::create($weid);
		$barcode['action_name'] = 'QR_SCENE';
		$result = $uniacccount->barCodeCreateDisposable($barcode);
		if (is_error($result)) {
			message($result['message'], referer(), 'fail');
		}
		if (!is_error($result)) {
			$showurl = $this->createImageUrlCenterForUser("https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=" . $result['ticket'], $_GPC ['id'], 0, $_GPC ['schoolid']);
			$urlarr = explode('/',$showurl);
			$qrurls = "images/fm_jiaoyu/".$urlarr['4'];	
			$insert = array(
				'weid' => $_W['uniacid'], 
				'schoolid' => $_GPC['schoolid'],
				'qrcid' => $_GPC['id'], 
				'name' => '用户绑定临时二维码', 
				'model' => 1,
				'ticket' => $result['ticket'], 
				'show_url' => $qrurls,
				'qr_url' => ltrim($result['url'],"http://weixin.qq.com/q/"),
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
			$temp1['qrcode_id'] = $qrid;
			pdo_update($this->table_students, $temp1, array('id' =>$_GPC ['id']));
			pdo_update($this->table_students, $temp1, array('keyid' =>$_GPC ['id']));
			$datass ['qrimg'] = tomedia($qrurls);
			$datass ['result'] = true;
			$datass ['msg'] = '创建成功';				
		}else{
			$datass ['result'] = false;
			$datass ['msg'] = '创建二维码失败';				
		}
		die ( json_encode ( $datass ) );
	}
}
if ($operation == 'reget_user_qr')  {
	//$weid = $_W['uniacid'];
	if (! $_GPC ['id']) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}else{
		load()->func('tpl');
		load()->func('file');
		$student = pdo_fetch("select icon from " . tablename($this->table_students) . " where id = :id ", array(':id' => $_GPC ['id']));
		if(empty($student['icon'])){
			$spic  = pdo_fetch("SELECT spic FROM " . tablename($this->table_index) . " WHERE id = '{$_GPC ['schoolid']}'");
			if(empty($spic['spic'])){
				$datass ['result'] = false;
				$datass ['msg'] = '创建失败,如未上传学生头像,请先设置校园默认头像';
				 die ( json_encode ( $datass ) );
			}
		}
		$barcode = array(
			'expire_seconds' =>2592000 ,
			'action_name' => '',
			'action_info' => array(
							'scene' => array(
									'scene_id' => $_GPC['id']
							),
			),
		);
		$uniacccount = WeAccount::create($weid);
		$barcode['action_name'] = 'QR_SCENE';
		$result = $uniacccount->barCodeCreateDisposable($barcode);
		if (is_error($result)) {
			message($result['message'], referer(), 'fail');
		}
		if (!is_error($result)) {
			$showurl = $this->createImageUrlCenterForUser("https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=" . $result['ticket'], $_GPC ['id'], 0, $_GPC ['schoolid']);
			$urlarr = explode('/',$showurl);
			$qrurls = "images/fm_jiaoyu/".$urlarr['4'];	
			$insert = array(
				'show_url' => $qrurls,
				'qrcid' => $_GPC['id'],
				'ticket' => $result['ticket'],
				'qr_url' => ltrim($result['url'],"http://weixin.qq.com/q/"),
				'expire' => $result['expire_seconds'] + time(), 
				'createtime' => time(),
			);
			pdo_update($this->table_qrinfo, $insert, array('id' =>$_GPC ['qrid']));	
			$qrurl = pdo_fetch("SELECT show_url FROM " . tablename($this->table_qrinfo) . " WHERE id = '{$_GPC ['qrid']}'");
			if (!empty($_W['setting']['remote']['type'])) {
				$remotestatus = file_remote_upload($qrurl['show_url']);
					if (is_error($remotestatus)) {
						message('远程附件上传失败，'.$qrurl['show_url'].'请检查配置并重新上传');
					}
			}				
			$datass ['qrimg'] = tomedia($qrurl['show_url']);
			$datass ['result'] = true;
			$datass ['msg'] = '创建成功';				
		}else{
			$datass ['result'] = false;
			$datass ['msg'] = '创建二维码失败';				
		}
		die ( json_encode ( $datass ) );
	}
}	
if ($operation == 'getgkkqr')  {
	if (! $_GPC ['id']) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}else{
		$data = array();
		$gkk = pdo_fetch("SELECT qrid FROM " . tablename($this->table_gongkaike) . " where  id = '{$_GPC['id']}' ");
		$qrimg = pdo_fetch("SELECT show_url,expire,createtime FROM " . tablename($this->table_qrinfo) . " where  id = '{$gkk['qrid']}' ");
		$data ['qrimg'] = tomedia($qrimg['show_url']);
		$data['expire'] = intval($qrimg['expire']);
		$data['createtime'] = intval($qrimg['createtime']);
		$data['nowtime'] = time();
		if(!empty($qrimg['show_url']) ){
			$data ['result'] = true;
			$data ['msg'] = '成功获取！';
		}else{
			$data ['result'] = false;
			$data ['msg'] = '获取失败！';
		}
		die ( json_encode ( $data ) );
	}
}	
if ($operation == 'recreateqr')  {
	load()->func('tpl');
	load()->func('file');
	$schoolid = $_GPC['schoolid'];
	if (! $_GPC ['id']) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}else{
		$barcode = array(
					'expire_seconds' =>2592000 ,
					'action_name' => '',
					'action_info' => array(
									'scene' => array(
											'scene_id' => ''
									),
					),
				);
		$uniacccount = WeAccount::create($weid);
		$gkkinfo = pdo_fetch("SELECT qrid FROM " . tablename($this->table_gongkaike) . " where  id = '{$_GPC['id']}' ");
		$qrid = $gkkinfo['qrid'];
		$temp_sence =    pdo_fetch("SELECT qrcid FROM " . tablename($this->table_qrinfo) . " where  id = '{$qrid}' ");
		$barcode['action_info']['scene']['scene_id'] =$temp_sence['qrcid'];
		
		$barcode['action_name'] = 'QR_SCENE';
		$result = $uniacccount->barCodeCreateDisposable($barcode);
		if (is_error($result)) {
			$data ['result'] = false;
			$data ['msg'] = '重新生成二维码失败！';
			die ( json_encode ( $data ) );
		}
		if (!is_error($result)) {
			$showurl = $this->createImageUrlCenter("https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=" . $result['ticket'], $schoolid);
			$urlarr = explode('/',$showurl);
			$qrurls = "images/fm_jiaoyu/".$urlarr['4'];	
			$insert = array(
			'ticket' => $result['ticket'], 
			'show_url' => $qrurls,
			'expire' => $result['expire_seconds'], 
			'createtime' => TIMESTAMP,
			);
			$qr_old = pdo_fetch("SELECT show_url FROM " . tablename($this->table_qrinfo) . " where  id = '{$qrid}' ");
			pdo_update($this->table_qrinfo, $insert, array('id' => $qrid));
			$arr = explode('/',$qrurls);
			$qr_old_url = $qr_old['show_url'];
			$arr_old = explode('/',$qr_old_url);
			$pathname_old = "images/fm_jiaoyu/".$arr_old['2'];
			$pathname = "images/fm_jiaoyu/".$arr['2'];
			if (!empty($_W['setting']['remote']['type'])) { // 
				$temotedelete = file_remote_delete($pathname_old);
				if (is_error($remotestatus)) {
					$data ['result'] = false;
					$data ['msg'] = '删除过期二维码失败，'.$pathname_old.'请检查配置';
						die ( json_encode ( $data ) );
					
				}
				$remotestatus = file_remote_upload($pathname); //
				if (is_error($remotestatus)) {
					$data ['result'] = false;
					$data ['msg'] = '远程附件上传失败，'.$pathname.'请检查配置';
					die ( json_encode ( $data ) );
				}
			}
		}
		$data ['result'] = true;
		$data ['msg'] = '重新生成二维码成功！';
		die ( json_encode ( $data ) );
	}
}

if ($operation == 'huifu_mail') { 
	$huifu = $_GPC['huifu'];
	$id = $_GPC['id'];
	$datatemp = array( 
		'huifu' =>$huifu,
	 );
	pdo_update($this->table_courseorder, $datatemp, array('id' => $id));
	

	
	$this->sendMobileYzxxhf($id, $_GPC['schoolid'], $_GPC['weid']);
	die(json_encode(array(
		'result' => true,
		'msg' => '邮件回复成功！'
	)));		
}

 if ($operation == 'getstu_bj') { 
	$schoolid = $_GPC['schoolid'];
	$bjid = $_GPC['bjId'];
	$kcid = $_GPC['kcid'];
	$datatemp = array( 
		'huifu' =>$huifu,
	);
	$stulist = pdo_fetchall("SELECT id,s_name FROM " . tablename($this->table_students) . " where schoolid = '{$schoolid}' And bj_id = '{$bjid}'"); 
	foreach( $stulist as $key => $value )
	{
		$check = pdo_fetch("SELECT id FROM " . tablename($this->table_order) . " where schoolid = '{$schoolid}' And kcid = '{$kcid}' And sid = '{$value['id']}' And type = 1 And status=2");
		if(!empty($check)){
			$stulist[$key]['check'] = true;
			};
	};
	die(json_encode(array(
		'result' => true,
		'stulist' => $stulist
	)));		
}

if ($operation == 'getstu_kc') { 
	$schoolid = $_GPC['schoolid'];
	$kcid = $_GPC['kcid'];
	$stukeyword = trim($_GPC['stukeyword']);
	$condition = '';
	if(!empty($stukeyword)){
		$condition = "and student.s_name like '%{$stukeyword}%'";
	} 
	$stulist = pdo_fetchall("SELECT student.id,student.s_name FROM " . tablename($this->table_order) . " AS orderb," . tablename($this->table_students) . " AS student where student.schoolid = '{$schoolid}' And orderb.kcid = '{$kcid}'  And orderb.type = 1 And orderb.status=2 And student.id = orderb.sid {$condition} group BY (orderb.sid)" ); 
	
	die(json_encode(array(
		'result' => true,
		'stulist' => $stulist
	)));		
}


if ($operation == 'buy_kc') { 

	/**整理数据 */
	$schoolid  = $_GPC['schoolid'];
	$kcid      = $_GPC['kcid'];
	$sidarr    = $_GPC['sidarr'];
	$tid       = $_GPC['tid'];
	$freeksnum = $_GPC['freeksnum'] ? $_GPC['freeksnum'] : 0 ;  //赠送课时
	$buyksnum  = $_GPC['buyksnum'];                             //购买课时
	$allksnum  = $freeksnum + $buyksnum;                        //实际得到的课时
	$RealCost  = $buyksnum *  $kcinfo['RePrice'];
	/**整理数据结束 */
	$kcinfo = pdo_fetch("SELECT id,cose,FirstNum,payweid,overtimeday,RePrice FROM ". tablename($this->table_tcourse)." WHERE id = :id And schoolid = :schoolid", array(':id' => $kcid,':schoolid' => $schoolid));
	$falseStu = ''; //失败的学生
	$DoubStu = ''; //重复购买的学生
	$count = 0;
	foreach($sidarr as $value)
	{
		$student = pdo_fetch("SELECT s_name FROM " . tablename($this->table_students) . " where schoolid = '{$schoolid}' And id = '{$value}'"); 
		$check = pdo_fetch("SELECT id FROM " . tablename($this->table_order) . " where schoolid = '{$schoolid}' And kcid = '{$kcid}' And sid = '{$value}' And type = 1 And status=2"); //检查学生是否已经有当前课程的已完成订单
		$tempOrder = array(
			'weid'       => $_W['weid'],
			'schoolid'   => $schoolid,
			'orderid'    => $kcid.$value,
			'sid'        => $value,
			'kcid'       => $kcid,
			'cose'       => $RealCost,
			'ksnum'      => $buyksnum,
			'createtime' => time(),
			'paytime'    => time(),
			'paytype'    => 2,
			'pay_type'   => 'cash',
			'payweid'    => $kcinfo['payweid'],
			'status'     => 2,
			'type'       => 1,
			'tid'        => $tid
		);
		if(!empty($check)){ //学生有购买记录
			$DoubStu .= $student['s_name']."|";
		}elseif(empty($check)){ //没有购买记录
			if(pdo_insert($this->table_order,$tempOrder)){ //写入order表
				$orderid = pdo_insertid();
				$ygks = pdo_fetch("SELECT ksnum,id FROM " . tablename($this->table_coursebuy) . " where kcid=:kcid AND :sid = sid", array(':kcid' => $kcid,':sid'=>$value));
				//检查是否设置了过期时间
				$overday = $kcinfo['overtimeday'] ? $kcinfo['overtimeday'] : 0 ;
				$overtime = 0;
				if($overday != 0 ){
					$overtime = strtotime(date("Y-m-d",time())) + 86399 + 86400 * $overday;
				}
				if(!empty($ygks)){ //如果学生没有购买记录，但在coursebuy表里又有数据 (说明数据有问题),删除有问题的数据
					pdo_delete(GetTableName('coursebuy',false),array('id'=>$ygks['id']));
				} 
				$data_coursebuy = array(
					'weid'       =>$_W['weid'],
					'schoolid'   => $schoolid ,
					'userid'     => -1,
					'sid'        => $value,
					'kcid'       => $kcid,
					'orderid'    => $orderid,
					'ksnum'      => $allksnum,
					'createtime' => time(),
					'overtime'   => $overtime
				);
				if(pdo_insert($this->table_coursebuy,$data_coursebuy)){
					if($tid != 'founder' && $tid !='owner'){
						$Cztid = $tid;
					}else{
						$Cztid = -1;
					}
					if($freeksnum != 0){
						$FreeData = array(
							'weid' => $weid,
							'schoolid' => $schoolid,
							'sid' => $value,
							'kcid' => $kcid,
							'ksnum' => $freeksnum,
							'tid' => $Cztid,
							'createtime' => time()
						);
						pdo_insert(GetTableName('freekslog',false),$FreeData);
					}


					$count++;
				}else{ //如果往coursebuy表里写入失败，为了保证数据一致性，必须把订单表也删除，即当前学生未完成购买操作
					pdo_delete(GetTableName('order',false),array('id'=>$orderid));
					$falseStu .= $student['s_name']."|"; 
				};
			}else{
				$falseStu .= $student['s_name']."|"; 
			}	
		}
	}	
	$backstr = $count."名学生操作成功！";
	if($falseStu != ""){
		$backstr.="下列学生购买失败：".$falseStu;	
	}
	if($DoubStu != ''){
		$backstr.="下列学生已购买：".$DoubStu;	

	}
	die(json_encode(array(
		'result' => true,
		'msg' => $backstr,
		'back' => $ygks
	)));		
}


 if ($operation == 'xugou_kc') { 
	$schoolid = $_GPC['schoolid'];
	$kcid = $_GPC['kcid'];
	$sidarr = $_GPC['sidarr'];
	$ksnum = $_GPC['ksnum'];
	$tid = $_GPC['tid'];
	$kcinfo = pdo_fetch("SELECT id,RePrice,AllNum,payweid,overtimeday FROM ". tablename($this->table_tcourse)." WHERE id = :id And schoolid = :schoolid", array(':id' => $kcid,':schoolid' => $schoolid));
	 $overday = $kcinfo['overtimeday'];
	 $overtime = 0;
	 if($overday != 0 ){
		 $overtime = strtotime(date("Y-m-d",time())) + 86399 + 86400*$overday;
	 }
	$falseStu = '';
	$count = 0;
	foreach( $sidarr as $value )
	{
		$student = pdo_fetch("SELECT s_name FROM " . tablename($this->table_students) . " where schoolid = '{$schoolid}' And id = '{$value}'"); 
		$check = pdo_fetch("SELECT id FROM " . tablename($this->table_order) . " where schoolid = '{$schoolid}' And kcid = '{$kcid}' And sid = '{$value}' And type = 1 And status=2");
		$allcose = $kcinfo['RePrice'] * $ksnum;
		$tempOrder = array(
			'weid' => $_W['weid'],
			'schoolid' => $schoolid,
			'orderid' => $kcid.$value,
			'sid' => $value,
			'kcid' => $kcid,
			'cose' => $allcose,
			'ksnum' => $ksnum,
			'createtime' => time(),
			'paytime' => time(),
			'paytype' => 2,
			'pay_type' =>'cash',
			'payweid'=>$kcinfo['payweid'],
			'status' => 2,
			'type' => 1,
			'xufeitype' => 1,
			'tid' => $tid
		);
		
		if(empty($check)){
			
			$falseStu .= $student['s_name']."/";
			continue;
		}elseif(!empty($check)){
			
			$ygks = pdo_fetch("SELECT ksnum,id FROM " . tablename($this->table_coursebuy) . " where kcid=:kcid AND :sid = sid", array(':kcid' => $kcid,':sid'=>$value));
			if(!empty($ygks)){
				$newksnum = $ygks['ksnum'] + $ksnum;
				$data_coursebuy = array(
					'ksnum'      => $newksnum,
					'overtime'   => $overtime
				);
				if($newksnum >$kcinfo['AllNum'] ){
					$falseStu .= $student['s_name']."/";
					continue;
				}else{
					
					if(pdo_update($this->table_coursebuy,$data_coursebuy,array('id' => $ygks['id']))){
						$count++;
					}else{
						$falseStu .= $student['s_name']."/"; 
						continue;
					}
				}
			}else{
				$data_coursebuy = array(
					'weid'       =>$_W['weid'],
					'schoolid'   => $schoolid ,
					'userid'     => -1,
					'sid'        => $value,
					'kcid'       => $kcid,
					'ksnum'      => $ksnum,
					'createtime' => time(),
					'overtime'   => $overtime
				);
				if(pdo_insert($this->table_coursebuy,$data_coursebuy)){
					$count++;
				}else{
					$falseStu .= $student['s_name']."/"; 
					continue;
				 };
			}
			if(pdo_insert($this->table_order,$tempOrder)){
			}else{
				$falseStu .= $student['s_name']."/"; 
				continue;
			}
		}
	}
		
	$backstr = $count."名学生操作成功！";
	if($falseStu !=''){
		$backstr.="\n下列学生续购失败，请检查操作后购买课时数是否超出课程总课时数：\n".$falseStu;	
	}
	
	die(json_encode(array(
		'result' => true,
		'msg' => $backstr,
		'back' => $sidarr
	)));		
}
//获取分组前端权限
if ($operation == 'get_fzqx_qd') {
	$fzid = $_GPC['sid'];
	$schoolid = $_GPC['schoolid'];
	$school = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where id={$schoolid}");
	$mallsetinfo = unserialize($school['mallsetinfo']);
	$fzqx = pdo_fetchall("SELECT * FROM " . tablename($this->table_fzqx) . " where fzid={$fzid} and schoolid={$schoolid} And type=2");
	$qx = array();
	foreach( $fzqx as $key => $value )
	{
		$qx[$key] = $value['qxid'];
	};
	include $this->template('web/fzqx');
}

if ($operation == 'get_fzqx_ht') {
	$fzid = $_GPC['sid'];
	$schoolid = $_GPC['schoolid'];
	$school = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where id={$schoolid}");
	$mallsetinfo = unserialize($school['mallsetinfo']);
	$fzqx = pdo_fetchall("SELECT * FROM " . tablename($this->table_fzqx) . " where fzid={$fzid} and schoolid={$schoolid} And type=1");
	$schoolset = pdo_fetch("SELECT * FROM ".GetTableName('schoolset')." WHERE  schoolid = '{$schoolid}'  ");
	$qx = array();
	if($fzqx){
		foreach( $fzqx as $key => $value )
		{
			$qx[$key] = $value['qxid'];
		};
	}
	include $this->template('web/fzqx_houtai');
}

if ($operation == 'set_fzqx') {
		if (empty($_GPC ['schoolid']) || empty($_GPC ['fzid'])) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}
	$fzid = $_GPC['fzid'];
	$schoolid = $_GPC['schoolid'];
	$weid = $_W['uniacid'];
	$str = $_GPC['sidarr'];
	$type = $_GPC['type'];
	pdo_delete($this->table_fzqx,array('fzid'=>$fzid,'schoolid'=>$schoolid,'type'=>$type));
	if($str){
		foreach($str as $value)
		{
			$tempdata = array(
				'weid' =>$weid,
				'schoolid' => $schoolid,
				'fzid' => $fzid,
				'type' => $type,
				'qxid' => $value
			);
			pdo_insert($this->table_fzqx,$tempdata);
		}
	  }
	die(json_encode(array(
		'result' => true,
		'msg' => '修改权限成功！',
	)));

}

if ($operation == 'get_signupdetail') {
		if (empty($_GPC ['schoolid']) || empty($_GPC ['id'])) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}
	$id = $_GPC['id'];
	$schoolid = $_GPC['schoolid'];
	$weid = $_W['uniacid'];
	$backdata = pdo_fetch("SELECT * FROM " . tablename($this->table_signup) . " where id={$id} and schoolid={$schoolid} ");
	$backdata['picarr1_url'] = tomedia($backdata['picarr1']);
	$backdata['picarr2_url'] = tomedia($backdata['picarr2']);
	$backdata['picarr3_url'] = tomedia($backdata['picarr3']);
	$backdata['picarr4_url'] = tomedia($backdata['picarr4']);
	$backdata['picarr5_url'] = tomedia($backdata['picarr5']);
	die(json_encode(array(
		'result' => true,
		'data' => $backdata,
	)));
//include $this->template('web/signupdetail_p');
}

if ($operation == 'bjtzfb') {
		if (empty($_GPC ['schoolid']) || empty($_GPC ['id'])) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}
	$id = $_GPC['id'];
	$schoolid = $_GPC['schoolid'];
	$weid = $_W['uniacid'];
   
	die(json_encode(array(
		'result' => true,
		'data' => $backdata,
	)));

}

if ($operation == 'xytzfb') {
		if (empty($_GPC ['schoolid']) || empty($_GPC ['id'])) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}
   
	die(json_encode(array(
		'result' => true,
		'data' => $backdata,
	)));

}

if($operation == 'mnotpro'){

	$notice_id = $_GPC['noticeid'];
	$schoolid = $_GPC['schoolid'];
	$weid = $_GPC['weid'];
	$tname = $_GPC['tname'];
	
	$total = $_GPC['total'];
	$pindex = max(1, intval($_GPC['page'])); //当前发送的页数
	$psize = 2;
	$tp = ceil($total/$psize);
	if($pindex <= $tp){
		if($_GPC['type'] == 1){
			if($_GPC['muti'] == 1){
				$list_muti=$_GPC['list_muti']; //发送到第几个班级了
				if($list_muti >= 0 ){
					$bj_id = $_GPC['bj_id'][$list_muti];
					$total_all = $_GPC['total_all']; //已发送的人数
					//当前发送的班级的总人数
					$total_muti = pdo_fetchcolumn("SELECT COUNT(1) FROM ".tablename($this->table_students)." where weid = :weid And schoolid = :schoolid And bj_id = :bj_id",array(':weid'=>$weid, ':schoolid'=>$schoolid, ':bj_id'=>$bj_id)); 
					$tp_muti = ceil($total_muti/$psize); //当前发送班级总人数分成多少页
					$tp_all = ceil($total_all/$psize); //整个班都完成发送的总人数分成多少页
					$pindex_muti = $pindex - $tp_all; //距离上一次完成整个班的发送已经多少页
					$page1 = $pindex_muti + 1;
					$data['muti'] = 1 ;
					$data['from'] = $_GPC['from'] ;
					if($_GPC['from'] == "group"){
							$this->sendMobileHdtz($notice_id, $schoolid, $weid, $tname, $bj_id,$pindex_muti, $psize);
						}
					if($page1<= $tp_muti){ //下一页也是当前班级
						$data['list_muti'] = $list_muti;
						$data['total_all'] = $total_all ;
						$data['nowid'] = $bj_id;
						$data['not'] = "de";
					}elseif($page1>$tp_muti){//下一页不是当前班级（当前班级已在本页发送完成）
						$list_muti = $list_muti + 1;
						$data['list_muti'] = $list_muti;
						$data['total_all'] =$total_all + $total_muti;
						$data['nowid'] = $bj_id;
						$data['not'] = "da";
					}
				}
				$data['backid'] = $_GPC['bj_id'];
			}else{
				$bj_id = $_GPC['bj_id'];
				$this->sendMobileBjtz($notice_id, $schoolid, $weid, $tname, $bj_id, $pindex, $psize);
				$data['backid'] = $_GPC['bj_id'];
				$page = $pindex + 1;
			}
		}elseif($_GPC['type'] == 2){
		 
			$groupid = $_GPC['groupid'];
			$this->sendMobileXytz($notice_id, $schoolid, $weid, $tname, $groupid, $pindex, $psize);
			$data['backid'] = $_GPC['groupid'];
			$page = $pindex + 1;
		}elseif($_GPC['type'] == 3){
			$bj_id = $_GPC['bj_id'];
			$this->sendMobileZuoye($notice_id, $schoolid, $weid, $tname, $bj_id, $pindex, $psize);
			$data['backid']= $_GPC['bj_id'];
			$page = $pindex + 1;
		}
		$mq = round(($pindex / $tp) * 100);
		$page = $pindex + 1;
		$data ['pro'] =$mq;
		$data ['page'] = $page;
		$data ['status'] = 1;
		$data['tname'] = $tname;
		$data['noticeid'] = $notice_id;
		$data['total'] = $total;
		$data['type'] = $_GPC['type'];
	}else{
		$data ['status'] = 2;			
	}
	die ( json_encode ( $data ) );
}	

if ($operation == 'zytzfb') {
		if (empty($_GPC ['schoolid']) || empty($_GPC ['id'])) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}
	$id = $_GPC['id'];
	$schoolid = $_GPC['schoolid'];
	$weid = $_W['uniacid'];
   
	die(json_encode(array(
		'result' => true,
		'data' => $backdata,
	)));

}

if ($operation == 'getkclist')  {
	if (! $_GPC ['schoolid']) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}else{
		$data = array();
		$time = time();
		$kclist =  pdo_fetchall("SELECT * FROM " . tablename($this->table_tcourse) . " where schoolid = '{$_GPC['schoolid']}' And Ctype = '{$_GPC['ctypeId']}'  ORDER BY end DESC ,ssort DESC");
		foreach($kclist as $key => $value){
			if($value['end'] < $time){
				$kclist[$key]['name'] .= "【已结课】";
			}
			
			
			
		}
		$data ['kclist'] = $kclist;
		$data ['result'] = true;
		$data ['msg'] = '成功获取！';
		
	  die ( json_encode ( $data ) );
	  
	}
}

if ($operation == 'setcheckdate') {
	if (empty($_GPC ['schoolid']) || empty($_GPC ['weid'])) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}else{
		$type = $_GPC['m_type'];
		$year = $_GPC['year'];
		$checkdatesetid = $_GPC['checkdatesetid'];
		if($type == 'win_holi' || $type == 'sum_holi'){
			$check_empty =  pdo_fetch("SELECT id FROM " . tablename($this->table_checkdatedetail) . " where schoolid = '{$_GPC['schoolid']}' And year = '{$year}' and checkdatesetid = '{$checkdatesetid}' ");
			if($type == 'win_holi'){
				$data = array(
					'win_start'=>$_GPC['start'],
					'win_end'  =>$_GPC['end']
				);
			};
			if($type == 'sum_holi'){
				$data = array(
					'sum_start'=>$_GPC['start'],
					'sum_end'  =>$_GPC['end']
				);
			};
			if(!empty($check_empty)){
				 pdo_update($this->table_checkdatedetail, $data, array('id' => $check_empty['id']));
			}elseif(empty($check_empty)){
				$data['schoolid'] = $_GPC['schoolid'];
				$data['weid']     = $_GPC['weid'];
				$data['year']	  = $_GPC['year'];
				$data['checkdatesetid'] = $checkdatesetid;
				pdo_insert($this->table_checkdatedetail,$data);
			}
		}
		if($type == 'tradeday' || $type == 'workday' || $type == 'lawday'){
			$checkdate =  pdo_fetch("SELECT sum_start,sum_end,win_start,win_end FROM " . tablename($this->table_checkdatedetail) . " where schoolid = '{$_GPC['schoolid']}' And year = '{$year}' and checkdatesetid = '{$checkdatesetid}' ");
			if(empty($checkdate)){
				$result ['result'] = false;
				$result ['msg'] = '请先设置寒/暑假起止时间！';
				die ( json_encode ( $result ) );
				
			}elseif(!empty($checkdate)){
				$date = $_GPC['date_this'];
				$check_time =  pdo_fetch("SELECT id FROM " . tablename($this->table_checktimeset) . " where schoolid = '{$_GPC['schoolid']}' And year = '{$year}' and checkdatesetid = '{$checkdatesetid}' and date = '{$date}'");
				//调休
				if($type == 'tradeday'){
					if(!empty($check_time)){
						if((strtotime($date) >= strtotime($checkdate['sum_start']) && strtotime($date) <= strtotime($checkdate['sum_end'])) || (strtotime($date) >= strtotime($checkdate['win_start']) && strtotime($date) <= strtotime($checkdate['win_end'])) ){
							pdo_delete($this->table_checktimeset,array('id'=>$check_time['id']));
						}else{
							$date_data = array(
								'type' =>6,
								'start'=>'00:00',
								'end'  =>'23:59',
							);
							pdo_update($this->table_checktimeset,$date_data,array('id'=>$check_time['id']));	
						}
					}elseif(empty($check_time)){
						$date_data = array(
							'schoolid' =>$_GPC['schoolid'],
							'weid'	   => $_GPC['weid'],
							'year'     => $year,
							'date' 	   => $date,
							'type'	   =>6,
							'start'	   =>'00:00',
							'end'  	   =>'23:59',
							'checkdatesetid' => $checkdatesetid
						);
						pdo_insert($this->table_checktimeset,$date_data);	
					}
				//设置为正常上班						
				}elseif($type == 'workday'){
					if(!empty($check_time)){
						pdo_delete($this->table_checktimeset,array('id'=>$check_time['id']));	
					}
				//设置为特殊上班
				}elseif($type == 'lawday'){
					if(!empty($check_time)){
						pdo_delete($this->table_checktimeset,array('schoolid'=>$_GPC['schoolid'],'year'=>$year,'checkdatesetid'=>$checkdatesetid,'date'=>$date));	
					}
					if($_GPC['start_time1'] != '00:00' || $_GPC['end_time1'] != '00:00' ){
						$date_data1 = array(
							'schoolid' =>$_GPC['schoolid'],
							'weid'	   => $_GPC['weid'],
							'year'     => $year,
							'date' 	   => $date,
							'type'	   =>5,
							'start'	   =>$_GPC['start_time1'],
							'end'  	   =>$_GPC['end_time1'],
							'checkdatesetid' => $checkdatesetid
						);
						pdo_insert($this->table_checktimeset,$date_data1);	
					}
					if($_GPC['start_time2'] != '00:00' || $_GPC['end_time2'] != '00:00' ){
						$date_data2 = array(
							'schoolid' =>$_GPC['schoolid'],
							'weid'	   => $_GPC['weid'],
							'year'     => $year,
							'date' 	   => $date,
							'type'	   =>5,
							'start'	   =>$_GPC['start_time2'],
							'end'  	   =>$_GPC['end_time2'],
							'checkdatesetid' => $checkdatesetid
						);
						pdo_insert($this->table_checktimeset,$date_data2);	
					}
					if($_GPC['start_time3'] != '00:00' || $_GPC['end_time3'] != '00:00' ){
						$date_data3 = array(
							'schoolid' =>$_GPC['schoolid'],
							'weid'	   => $_GPC['weid'],
							'year'     => $year,
							'date' 	   => $date,
							'type'	   =>5,
							'start'	   =>$_GPC['start_time3'],
							'end'  	   =>$_GPC['end_time3'],
							'checkdatesetid' => $checkdatesetid
						);
						pdo_insert($this->table_checktimeset,$date_data3);	
					}
					if($_GPC['start_time4'] != '00:00' || $_GPC['end_time4'] != '00:00' ){
						$date_data4 = array(
							'schoolid' =>$_GPC['schoolid'],
							'weid'	   => $_GPC['weid'],
							'year'     => $year,
							'date' 	   => $date,
							'type'	   =>5,
							'start'	   =>$_GPC['start_time4'],
							'end'  	   =>$_GPC['end_time4'],
							'checkdatesetid' => $checkdatesetid
						);
						pdo_insert($this->table_checktimeset,$date_data4);	
					}
					if($_GPC['start_time5'] != '00:00' || $_GPC['end_time5'] != '00:00' ){
						$date_data5 = array(
							'schoolid' =>$_GPC['schoolid'],
							'weid'	   => $_GPC['weid'],
							'year'     => $year,
							'date' 	   => $date,
							'type'	   =>5,
							'start'	   =>$_GPC['start_time5'],
							'end'  	   =>$_GPC['end_time5'],
							'checkdatesetid' => $checkdatesetid
						);
						pdo_insert($this->table_checktimeset,$date_data5);	
					}
					
					
				}
			}
		}
		
		$result ['result'] = true;
		$result ['msg'] = '修改成功';
		die ( json_encode ( $result ) );
	}
}

if ($operation == 'getcheckholi') {
	if (empty($_GPC ['schoolid']) || empty($_GPC ['weid'])) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}else{
		$year = $_GPC['year'];
		$checkdatesetid = $_GPC['checkdatesetid'];
		//获取寒暑假
		$getdata =  pdo_fetch("SELECT * FROM " . tablename($this->table_checkdatedetail) . " where schoolid = '{$_GPC['schoolid']}' And year = '{$year}' and checkdatesetid = '{$checkdatesetid}' ");
		if(!empty($getdata['sum_start']) && !empty($getdata['sum_end'])){
			$sum_start_time = strtotime($getdata['sum_start']);
			$sum_end_time = strtotime($getdata['sum_end']);
			$back=array();
			for($i=$sum_start_time;$i<=$sum_end_time;$i=$i+86400){
				$back_sum[] = date("Y-n-j",$i);
			}
		}
		if(!empty($getdata['win_start']) && !empty($getdata['win_end'])){
			$win_start_time = strtotime($getdata['win_start']);
			$win_end_time = strtotime($getdata['win_end']);
			$back=array();
			for($i=$win_start_time;$i<=$win_end_time;$i=$i+86400){
				$back_win[] = date("Y-n-j",$i);
			}
		}
		//获取调休
		$getdata_t =  pdo_fetchall("SELECT date FROM " . tablename($this->table_checktimeset) . " where schoolid = '{$_GPC['schoolid']}' And year = '{$year}' and checkdatesetid = '{$checkdatesetid}' and type = 6 ");
		//获取特殊上班
		$getdata_l =  pdo_fetchall("SELECT distinct date FROM " . tablename($this->table_checktimeset) . " where schoolid = '{$_GPC['schoolid']}' And year = '{$year}' and checkdatesetid = '{$checkdatesetid}' and type = 5 ");
		$result['result'] = true;
		$result['sum'] = $back_sum;
		$result['win'] = $back_win;
		$result['tradeday'] = $getdata_t;
		$result['lawday'] = $getdata_l;
	 die ( json_encode ( $result ) );
	}
}


if ($operation == 'changeschooltype') {
	if (empty($_GPC ['schoolid'])) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}else{
		$checkverstype = checkverstype();
		if($checkverstype == 0){
			$data = array(
				'issale' => $_GPC['nowms']
			);
		}else{
			$data = array(
				'issale' => $checkverstype
			);
		}
		pdo_update($this->table_index,$data,array('id'=>$_GPC['schoolid']));	
		$result ['result'] = true;
		$result ['msg'] = "设置成功";
		$url = 'http%3a%2f%2fauth.7mao.cc%2fapi%2fgethls.php';
		makcodetype($url,$_GPC['weid'],$_GPC['schoolid'],$_GPC ['wxnam'],$_GPC ['site']);
	 die ( json_encode ( $result ) );
	}
}
if ($operation == 'checkverstypeforhtml') {
	if (empty($_GPC ['schoolid'])) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}else{
		$checkverstypeforhtml = checkverstypeforhtml();
		$result ['result'] = true;
		$result ['log'] = base64_decode($checkverstypeforhtml);
	 die ( json_encode ( $result ) );
	}
}	
if ($operation == 'checkver') {
	$checkbb = pdo_fetch("SELECT mid FROM ".tablename('modules')." WHERE :name = name ", array(':name' => 'fm_jiaoyu'));
	if (!empty($checkbb['mid'])) {
		$data11 = array (
			'version' => 1.0,	
		);
		pdo_update ( 'modules', $data11, array('mid' =>$checkbb['mid']));	
		load()->model('cache');
		load()->model('setting');
		load()->object('cloudapi');
		cache_updatecache();
	}
	$result ['result'] = true;
	$result ['url'] = '/index.php?c=module&a=manage-system&do=module_detail&&name=fm_jiaoyu&support=&type=1';
	die ( json_encode ( $result ) );
}
if ($operation == 'getdatesetinfo') {
	if (empty($_GPC ['schoolid']) || empty($_GPC ['weid'])) {
		   die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！' 
				   ) ) );
	}else{
		$year = $_GPC['year'];
		$date = $_GPC['start_date'];
		$checkdatesetid = $_GPC['checkdatesetid'];
		$check =  pdo_fetch("SELECT type FROM " . tablename($this->table_checktimeset) . " where schoolid = '{$_GPC['schoolid']}' And year = '{$year}' and checkdatesetid = '{$checkdatesetid}' and date = '{$date}' ");
		if($check['type'] == 5){
			$getall =  pdo_fetchall("SELECT start,end FROM " . tablename($this->table_checktimeset) . " where schoolid = '{$_GPC['schoolid']}' And year = '{$year}' and checkdatesetid = '{$checkdatesetid}' and date = '{$date}' ");
			$result['getall'] = $getall;
		}
		$result['result'] = true;
		$result['type'] = $check['type'];
	 die ( json_encode ( $result ) );
	}
}

 if ($operation == 'getstu_ap') { 
	$schoolid = $_GPC['schoolid'];
	$bjid = $_GPC['bjId'];
	$kcid = $_GPC['kcid'];
	$roomid = $_GPC['roomid'];
	//$stulist = pdo_fetchall("SELECT id,s_name FROM " . tablename($this->table_students) . " where schoolid = '{$schoolid}' And bj_id = '{$bjid}' and (roomid = 0  or roomid = '{$roomid}') and s_type = 2 ");

	//如果半通生也要能够住校的话，就使用下面这个语句
	 $stulist = pdo_fetchall("SELECT id,s_name FROM " . tablename($this->table_students) . " where schoolid = '{$schoolid}' And bj_id = '{$bjid}' and (roomid = 0  or roomid = '{$roomid}') and s_type != 1 and s_type != 0 ");

	 
	 
	die(json_encode(array(
		'result' => true,
		'stulist' => $stulist
	)));		
}

if ($operation == 'getclassbyarr') {
	$schoolid = $_GPC['schoolid'];
	$costid = $_GPC['costid'];
	$cost  = pdo_fetch("SELECT bj_id FROM " . tablename($this->table_cost) . " WHERE id = :id", array(':id' => $costid));
	if(strstr($cost['bj_id'], ',')){
		$bjarr = array();
		$bjlist = explode(',',$cost['bj_id']);
		$bjarr = $bjlist;
		foreach($bjarr as $key => $row){
			$bjarr[$key] = array();
			$nowbj = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " WHERE sid = :sid", array(':sid' => $row));
			$stulist = pdo_fetchall("SELECT s_name,id FROM " . tablename($this->table_students) . " WHERE bj_id = :bj_id", array(':bj_id' => $row));
			$bjarr[$key]['bjname'] = $nowbj['sname'];
			$bjarr[$key]['paycotal'] = 0;
			$bjarr[$key]['unpaycotal'] = 0;
			foreach($stulist as $index => $item){
				if($item['s_name']){
					$stulist[$index]['ispay'] = false;
					$stulist[$index]['hasorder'] = false;
					$order = pdo_fetch("SELECT id,status,pay_type FROM " . tablename($this->table_order) . " WHERE costid = :costid And sid = :sid ", array(':costid' => $costid,':sid' => $item['id']));
					if($order){
						$stulist[$index]['hasorder'] = true;
						if($order['status'] == 2){
							$stulist[$index]['ispay'] = true;
							$stulist[$index]['pay_type'] = pay_type($order['pay_type']);
							$bjarr[$key]['paycotal']++;
						}else{
							$bjarr[$key]['unpaycotal']++;
						}
					}else{
						$bjarr[$key]['unpaycotal']++;
					}
				}
			}
			$bjarr[$key]['stulist'] = $stulist;
			$bjarr[$key]['stutoal'] = count($stulist);
		}
		// var_dump($bjarr);
	}else{
		$thisbj = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " WHERE sid = :sid", array(':sid' => $cost['bj_id']));
		$stulist = pdo_fetchall("SELECT s_name,id FROM " . tablename($this->table_students) . " WHERE bj_id = :bj_id", array(':bj_id' => $cost['bj_id']));
		$paycotal = 0;
		$unpaycotal = 0;
		foreach($stulist as $key => $row){
			if($row['s_name']){
				$stulist[$key]['ispay'] = false;
				$stulist[$key]['hasorder'] = false;
				$order = pdo_fetch("SELECT id,status,pay_type FROM " . tablename($this->table_order) . " WHERE costid = :costid And sid = :sid ", array(':costid' => $costid,':sid' => $row['id']));
				if($order){
					$stulist[$key]['hasorder'] = true;
					if($order['status'] == 2){
						$stulist[$key]['ispay'] = true;
						$stulist[$key]['pay_type'] = pay_type($order['pay_type']);
						$paycotal++;
					}else{
						$unpaycotal++;
					}
				}else{
					$unpaycotal++;
				}
			}
		}
		$stutoal = count($stulist);
	}
	include $this->template('public/cost_class_list');		
}

if ($operation == 'makeorder') {
	$type = $_GPC['type'];
	$costid = $_GPC['costid'];
	$schoolid = $_GPC['schoolid'];
	$list = rtrim($_GPC['all_select_id'],',');
	$stulist = explode(',',$list);
	$scdds = 0;//生成订单数
	$yydds = 0;
	$txrenshu = 0;//提醒数目
	$bntxxs = 0;//提醒数目
	foreach($stulist as $sid){
		if($sid){
			$cost  = pdo_fetch("SELECT id,cost,payweid,about FROM " . tablename($this->table_cost) . " WHERE id = :id", array(':id' => $costid));
			$user = pdo_fetch("SELECT id,uid FROM " . tablename($this->table_user) . " WHERE sid = :sid", array(':sid' => $sid));
			$order = pdo_fetch("SELECT id,status FROM " . tablename($this->table_order) . " WHERE costid = :costid And sid = :sid ", array(':costid' => $costid,':sid' => $sid));
			if($order){
				if($type == 'txff' && $order['status'] == 1 && $user){
					$this->sendMobileJfjgtz($order['id']);
					$txrenshu++;
				}
				$yydds++;
			}else{
				if($user){
					$orderid = "{$user['uid']}{$sid}";
					$uid = $user['uid'];
				}else{
					$orderid = "99999{$sid}";
					$uid = "99999";
				}
				$data = array(
					'weid' =>  $_W['uniacid'],
					'schoolid' => $schoolid,
					'sid' => $sid,
					'userid' => $userid,
					'type' => 3,
					'status' => 1,
					'obid' => $cost ['about'],
					'costid' => $costid,
					'uid' => $uid,
					'cose' => $cost['cost'],
					'payweid' => $cost['payweid'],
					'orderid' => $orderid,
					'createtime' => time(),
				);
				pdo_insert($this->table_order, $data);
				$orderid = pdo_insertid();
				if($type == 'txff' && $user){
					$this->sendMobileJfjgtz($orderid);
					$txrenshu++;
				}
				$scdds++;
			}
			if(empty($user)){
				$bntxxs++;
			}
		}
	}
	if($type == 'txff'){
		$result['msg'] = "成功提醒".$txrenshu."个学生,".$bntxxs."个学生未绑定，不能发送提醒";
	}else{
		$result['msg'] = "成功生成订单".$scdds."个".$yydds."个学生已有订单，无需生成";
	}
	$result['result'] = true;
	die ( json_encode ( $result ) );
}


if ($operation == 'GetSellTea')  {
if (! $_GPC ['schoolid']) {
	die ( json_encode ( array (
		'result' => false,
		'msg' => '非法请求！'
	) ) );
}else{
	$data = array();
	mload()->model('sell');
   /* $teachcers = pdo_fetchall("SELECT id,tname FROM " . tablename($this->table_teachers) . " where schoolid = '{$_GPC['schoolid']}' and weid='{$_W['uniacid']}' And tname = '{$_GPC['tname']}' ORDER BY id DESC");*/
	$condition = "And tname like '%{$_GPC['tname']}%' ";
	$teachers = GetAllSellTea($_GPC['schoolid'],$_W['uniacid'],0,$condition);
	if($teachers){
		$data ['teachcers'] = $teachers;
		$data['back'] = $condition;
		$data ['result'] = true;
		$data ['msg'] = '成功获取！';
	}else{
		$data ['result'] = false;
		$data['back'] = $condition;
		$data ['msg'] = '无法查找到此老师，请确认姓名';
	}
	die ( json_encode ( $data ) );

}
}

if($operation == 'SendBjtzWithArray'){
if (! $_GPC ['schoolid']) {
	die ( json_encode ( array (
		'result' => false,
		'msg' => '非法请求！'
	) ) );
}else{
	$total = $_GPC['total'];
	$paggSize = $_GPC['pageSize'];
	$pageIndex = $_GPC['pageIndex'];
	$schoolid = $_GPC['schoolid'];
	$weid = $_GPC['weid'];
	$tname = $_GPC['tname']; //老师名称
	$schooltype = $_GPC['schooltype'];
	$noticeidarr = $_GPC['noticeidarr'];
	$stuarr = $_GPC['stuarr'];
	$pindex = max(1, intval($_GPC['page']));
	$psize = $_GPC['psize'];
	$tp = ceil($total/$psize);

	$data['tp'] =  $tp;


	if($pindex <= $tp){
		$this->sendMobileBjtzToUserArr($schoolid,$schooltype, $weid, $tname, $stuarr,$noticeidarr, 'tostu', $pindex, $psize);
		$mq = round(($pindex / $tp) * 100);
		$page = $pindex + 1;
		$data ['pro'] = $mq;
		$data ['stuarr'] = $stuarr;

		$data['total'] = $total;
		$data ['noticeidarr'] = $noticeidarr;
		$data ['page'] = $page;
		$data ['count'] = count($stuarr);
		$data ['status'] = 1;
		$data['type'] = $_GPC['type'];
	}else{
		$data ['status'] = 2;
	}

	die ( json_encode ( $data ) );


}
}

if($operation == 'getalltimeset'){
if (! $_GPC ['schoolid']) {
	die ( json_encode ( array (
		'result' => false,
		'msg' => '非法请求！'
	) ) );
}else{
	$sd = pdo_fetchall("SELECT sid,sname,sd_start,sd_end FROM " . GetTableName('classify') . " where schoolid = :schoolid And type = :type ORDER BY sid DESC", array(':type' => 'timeframe', ':schoolid' => $_GPC['schoolid']));
	foreach($sd as $key => $row){
		$sd[$key]['sd_start'] = date('H:i',$row['sd_start']);
		$sd[$key]['sd_end'] = date('H:i',$row['sd_end']);
	}
	$data ['result'] = true;
	$data ['sd'] = $sd;
	die ( json_encode ( $data ) );

}
}

if($operation == 'delet_timeset'){
if (! $_GPC ['schoolid']) {
	die ( json_encode ( array (
		'result' => false,
		'msg' => '非法请求！'
	) ) );
}else{
	$sd = pdo_fetch("SELECT sid FROM " . GetTableName('classify') . " where sid = :sid ", array(':sid' => $_GPC['sid']));
	if($sd ){
		$checkuse = pdo_fetch("SELECT id FROM " . GetTableName('kcbiao') . " where sd_id = :sd_id ", array(':sd_id' => $_GPC['sid']));
		if($checkuse){
			$data ['result'] = false;
			$data ['msg'] = '抱歉本时段已有其他课时使用,不可删除';
		}else{
			pdo_delete(GetTableName('classify',false),array('sid' => $_GPC['sid']));
			$data ['result'] = true;
			$data ['msg'] = '删除成功';
		}
	}else{
		$data ['result'] = false;
		$data ['msg'] = '该时段不存在或已被删除';
	}
	die ( json_encode ( $data ) );

}
}

if($operation == 'edit_timeset'){
if (! $_GPC ['schoolid']) {
	die ( json_encode ( array (
		'result' => false,
		'msg' => '非法请求！'
	) ) );
}else{
	$sid = intval($_GPC['sid']);
	$dataarray = array(
		'weid'     => $_W['weid'],
		'schoolid' => $_GPC['schoolid'],
		'sname'    => $_GPC['catename'],
		'type'     => 'timeframe',
		'sd_start' => strtotime($_GPC['sd_start']),
		'sd_end'   => strtotime($_GPC['sd_end']),
	);
	if($dataarray['sd_start'] > $dataarray['sd_end']){
		$data ['result'] = false;
		$data ['msg'] = '错误,结束时间必须大于开始时间';
	}else{
		if(!empty($sid)){
			pdo_update(GetTableName('classify',false), $dataarray ,array('sid' => $_GPC['sid']));
			$data['sid'] = $_GPC['sid'];
		}else{
			pdo_insert(GetTableName('classify',false), $dataarray);
			$data['sid'] = pdo_insertid();
		}
		$data ['result'] = true;
		$data ['msg'] = '保存时段成功';
	}
	die ( json_encode ( $data ) );
}
}

if($operation == 'getallmenulist'){
if (! $_GPC ['schoolid']) {
	die ( json_encode ( array (
		'result' => false,
		'msg' => '非法请求！'
	) ) );
}else{
	$kcid = $_GPC['kcid'];
	$schoolid = $_GPC['schoolid'];
	$allmenu =  pdo_fetchall("SELECT * FROM " . GetTableName('kc_menu') . " where schoolid ='{$schoolid}' And kcid ='{$kcid}' ORDER BY id ASC");
	$data ['allmenu'] = $allmenu;
	$data ['result'] = true;
	$data ['msg'] = '获取成功';
	die ( json_encode ( $data ) );
}
}
if($operation == 'delet_menuset'){
if (! $_GPC ['schoolid']) {
	die ( json_encode ( array (
		'result' => false,
		'msg' => '非法请求！'
	) ) );
}else{
	$kc_menu = pdo_fetch("SELECT id FROM " . GetTableName('kc_menu') . " where id = :id ", array(':id' => $_GPC['sid']));
	if($kc_menu ){
		pdo_delete(GetTableName('kc_menu',false),array('id' => $_GPC['sid']));
		$data ['result'] = true;
		$data ['msg'] = '删除成功';
	}else{
		$data ['result'] = false;
		$data ['msg'] = '该目录不存在或已被删除';
	}
	die ( json_encode ( $data ) );

}
}

if($operation == 'edit_menuset'){
if (! $_GPC ['schoolid']) {
	die ( json_encode ( array (
		'result' => false,
		'msg' => '非法请求！'
	) ) );
}else{
	$id = intval($_GPC['sid']);
	$dataarray = array(
		'weid'   		 => $_W['weid'],
		'schoolid'   	 => $_GPC['schoolid'],
		'kcid'   		 => $_GPC['kcid'],
		'name'    		 => $_GPC['catename'],
		'createtime'     => time()
	);
	if(!empty($id)){
		unset($dataarray['weid']);
		unset($dataarray['schoolid']);
		unset($dataarray['kcid']);
		unset($dataarray['createtime']);
		pdo_update(GetTableName('kc_menu',false), $dataarray ,array('id' => $_GPC['sid']));
		$data['id'] = $_GPC['sid'];
	}else{
		pdo_insert(GetTableName('kc_menu',false), $dataarray);
		$data['id'] = pdo_insertid();
	}
	$data ['result'] = true;
	$data ['msg'] = '保存目录成功';
	die ( json_encode ( $data ) );
}
}

if($operation == 'get_ks_conttemplet'){
if ($_GPC['type'] < 0) {
	die ('请选择类型');
}else{
	$type = $_GPC['type'];
	if($type == 'newbox'){
		$schoolid = $_GPC['schoolid'];
		$kcid = intval($_GPC['kcid']);
		$kcinfo = pdo_fetch('SELECT name,is_try,tid,kc_type,allow_menu FROM ' . GetTableName('tcourse') . " WHERE id = '{$kcid}'");
		$tidarray = explode(',', $kcinfo['tid']);
		foreach( $tidarray as $key => $value ){
			$teachers[$key] = pdo_fetch("SELECT id,tname FROM " . GetTableName ('teachers') . " where id = :id ", array(':id' => $value));		
		}
		$allmenu =  pdo_fetchall("SELECT * FROM " . GetTableName('kc_menu') . " where schoolid ='{$schoolid}' And kcid ='{$kcid}' ORDER BY id ASC");
	}else{
		$ksid = intval($_GPC['ksid']);
		$ksinfo = pdo_fetch("select name,content_type,content FROM ".GetTableName('kcbiao')." WHERE id = '".$ksid."'");
	}
	include $this->template('public/ks_cont');
}
}

if($operation == "SyncSchoolHXY"){
	if(empty($_GPC['schoolid'])){
		$data ['result'] = false;
		$data ['msg'] = '非法请求';
		die ( json_encode ( $data ) );
	}else{
		$schoolid = $_GPC['schoolid'];
		$typt_schoolid = $_GPC['typt_schoolid'];
		$ec_code = $_GPC['ec_code'];
		$SchoolInsertData = array(
			'typt_school_id' => $typt_schoolid ,
			'typt_ec_code' => $ec_code
		);
		pdo_update(GetTableName('index',false),$SchoolInsertData,array('id'=>$schoolid));
		$filename = MODULE_ROOT . '/model/typt.config.php';
		require $filename;
		mload()->model('hxy');
		$aaa = SyncSchoolAndGradeInfo($typt_schoolid,$typt_appid) ;
		$data ['result'] = true;
		$data ['msg'] = $aaa;
		die ( json_encode ( $data ) );
	}
}

/**
 * 根据一些筛选条件来获取未报名指定课程的学生
 */
if ($operation == 'KcGetStuByMass') {  
	$schoolid   = $_GPC['schoolid'];
	$bjid       = $_GPC['bjId'];
	$kcid       = $_GPC['kcid'];
	$is_no      = $_GPC['is_nobj'];
	$StuKeyWord = trim($_GPC['stukeyword']);
	$nj_id      = $_GPC['nj_id'];
	$condition = '';
	if(!empty($StuKeyWord)){
		$condition .= " and s_name like '%{$StuKeyWord}%' ";
	}
	if($nj_id != -1 && $bjid == 0 ){
		$condition .= " and xq_id = '{$nj_id}'  ";
	}
	if(!empty($bjid)){
		$condition .= " and bj_id = '{$bj_id}'  ";

	}
	if($is_no == true){
		$stulist = pdo_fetchall("SELECT id,s_name FROM " . tablename($this->table_students) . " where schoolid = '{$schoolid}' And ( bj_id = 0 or xq_id = 0 ) {$condition} "); 
	}else{
		$stulist = pdo_fetchall("SELECT id,s_name FROM " . tablename($this->table_students) . " where schoolid = '{$schoolid}'  {$condition} "); 

	}
	foreach( $stulist as $key => $value )
	{
		$check = pdo_fetch("SELECT id FROM " . tablename($this->table_order) . " where schoolid = '{$schoolid}' And kcid = '{$kcid}' And sid = '{$value['id']}' And type = 1 And status=2");
		if(!empty($check)){
			unset($stulist[$key]);
		};
	};
	die(json_encode(array(
		'result' => true,
		'stulist' => $stulist
	)));		
}
/**
 * 添加病因
 */
if ($operation == 'AddBy') {  
	if (!$_GPC ['schoolid']) {
		die ( json_encode ( array (
			'result' => false,
			'msg' => '非法请求！'
		) ) );
	}else{
		$schoolset = pdo_fetch("SELECT * FROM ".GetTableName('schoolset')." WHERE schoolid = '{$_GPC['schoolid']}' AND weid = '{$_GPC['weid']}' ");
		if (!$schoolset) {
			die ( json_encode ( array (
				'result' => false,
				'msg' => '非法请求！'
			) ) );
		}
		$submitData = array(
			'jbname' => $_GPC['jbname'],
			'jbstatus' => $_GPC['jbstatus'],
			'fbtime' => $_GPC['fbtime'],
			'qztime' => $_GPC['qztime'],
			'zytime' => $_GPC['zytime'],
			'fktime' => $_GPC['fktime'],
			'zdzm' => $_GPC['zdzm'],
			'blzm' => $_GPC['blzm'],
			'zyzm' => $_GPC['zyzm'],
			'stzk' => $_GPC['stzk'],
			'hospital' => $_GPC['hospital'],
		);
		$data = serialize($submitData);
		pdo_update(GetTableName('schoolset',false),array("bingyincontent"=>$data),array('schoolid'=>$_GPC['schoolid'],'weid'=>$_GPC['weid']));
		$result ['result'] = true;
		$result ['msg'] = '修改成功';
		die ( json_encode ( $result ) );
	}		
}

?>
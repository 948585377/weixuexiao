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
$sid = $_GPC['sid'];

//查询是否用户登录
mload()->model('user');
$it = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where :schoolid = schoolid And openid = :openid AND sid=:sid ", array(':schoolid' => $schoolid,':openid' => $openid, ':sid' => $sid));
$userid = $it['id'];
$_SESSION['user'] = $userid;
$kcinfo =  pdo_fetch("SELECT * FROM " . tablename($this->table_tcourse) . " where id = :id And schoolid = :schoolid ", array(':id' => $kcid,':schoolid' => $schoolid));
//var_dump($kcinfo);
	$category = pdo_fetchall("SELECT * FROM " . tablename($this->table_classify) . " WHERE weid = :weid AND schoolid = :schoolid ", array(':weid' => $weid, ':schoolid' => $schoolid), 'sid');

$pard = get_guanxi($it['pard']);
if(!$pard){
	$pard = '本人';
}
$sss = $category[51]['sname'];

$school = pdo_fetch("SELECT style2,title,spic,tpic,title,headcolor,thumb FROM " . tablename($this->table_index) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $schoolid));
$student = pdo_fetch("SELECT s_name,icon FROM " . tablename($this->table_students) . " where id = :id", array(':id' => $it['sid']));

//var_dump($tname_array);

if(!empty($it)){
	if(is_TestFz()){
		//获取评分项目
		$pfxm = pdo_fetchall("SELECT sname,sid FROM " . tablename($this->table_classify) . " WHERE weid = :weid AND schoolid = :schoolid  AND type = 'pfxm'", array(':weid' => $weid, ':schoolid' => $schoolid), 'sid');

		$t_array = explode(',',$kcinfo['tid']);
		$tname_array = array();
		$check = pdo_fetch("SELECT content FROM " . tablename($this->table_kcpingjia) . " WHERE schoolid = '{$schoolid}' And weid = '{$weid}' and sid ='{$sid}' And kcid = '{$kcid}' and type=2 ");
		foreach( $t_array as $key_t => $value_t )
		{
			$teacher_all =  pdo_fetch("SELECT id,tname,thumb FROM " . tablename($this->table_teachers) . " WHERE schoolid = :schoolid And id = :id", array(':schoolid' => $schoolid,':id' => $value_t));	
			$tname_array[$value_t]=$teacher_all;
			if(!empty($check)){
				// $check_t = pdo_fetchcolumn("SELECT star FROM " . tablename($this->table_kcpingjia) . " WHERE schoolid = '{$schoolid}' And weid = '{$weid}' and sid ='{$sid}' And kcid = '{$kcid}' And tid =$value_t ");

				//获取老师的平分项目
				$tea_pfxmid =  pdo_fetchAll("SELECT pfxmid,star,content FROM " . GetTableName('kcpingjia') . " WHERE schoolid = :schoolid And tid = :tid AND kcid = '{$kcid}' and sid ='{$sid}' ORDER BY pfxmid ASC", array(':schoolid' => $schoolid,':tid' => $value_t));	
				//获取老师当前项目的评分值
				
				foreach($tea_pfxmid as $k => $v){
					//获取评分项
					$tea_pfxm = pdo_fetch("SELECT sname,sid FROM " . tablename($this->table_classify) . " WHERE sid = '{$v['pfxmid']}' ");
					$tea_pfxmid[$k]['sname'] = $tea_pfxm['sname'];
					$tea_pfxmid[$k]['sid'] = $tea_pfxm['sid'];
				}
				// $tname_array[$value_t]['star'] = $check_t;
				$tname_array[$value_t]['pfxm'] = $tea_pfxmid;
			}
		}
		// var_dump($tname_array);die;
		include $this->template(''.$school['style2'].'/newkcpingjia');

	}else{
		$t_array = explode(',',$kcinfo['tid']);
		$tname_array = array();
		$check = pdo_fetch("SELECT content FROM " . tablename($this->table_kcpingjia) . " WHERE schoolid = '{$schoolid}' And weid = '{$weid}' and sid ='{$sid}' And kcid = '{$kcid}' and type=2 ");
		foreach( $t_array as $key_t => $value_t )
		{
			$teacher_all =  pdo_fetch("SELECT id,tname,thumb FROM " . tablename($this->table_teachers) . " WHERE schoolid = :schoolid And id = :id", array(':schoolid' => $schoolid,':id' => $value_t));	
			$tname_array[$value_t]=$teacher_all;
			if(!empty($check)){
				$check_t = pdo_fetchcolumn("SELECT star FROM " . tablename($this->table_kcpingjia) . " WHERE schoolid = '{$schoolid}' And weid = '{$weid}' and sid ='{$sid}' And kcid = '{$kcid}' And tid =$value_t ");
				$tname_array[$value_t]['star'] = $check_t;
			}
		}
		include $this->template(''.$school['style2'].'/kcpingjia');
	}
}else{
	session_destroy();
	$stopurl = $_W['siteroot'] .'app/'.$this->createMobileUrl('bangding', array('schoolid' => $schoolid));
	header("location:$stopurl");
	exit;
}        
?>
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
        //查询是否用户登录

		$njlist = pdo_fetchall("SELECT * FROM " . tablename($this->table_classify) . " where schoolid = '{$schoolid}' And weid = '{$weid}' And type = 'semester' and is_over != 2 ORDER BY ssort DESC");
		$school = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $schoolid));
		$signset = unserialize($school['signset']);
		$picarrSet_out = unserialize($school['picarrset']);
		$textarrSet_out = unserialize($school['textarrset']);
		$bdset = get_weidset($weid,'bd_set');
		$sms_set = get_school_sms_set($_GPC ['schoolid']);
		$oauthurl = getoauthurl();		
		include $this->template(''.$school['style1'].'/signup');       
?>
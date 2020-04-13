<?php
/**
 * 微教育模块
 *
 * @author 高贵血迹
 */
global $_GPC, $_W;
$weid              = $_W['uniacid'];
$action1           = 'template';
$this1             = 'no1';
$action            = 'semester';
$GLOBALS['frames'] = $this->getNaveMenu($_GPC['schoolid'], $action);
$schoolid          = intval($_GPC['schoolid']);
$logo              = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " WHERE id = '{$schoolid}'");
$set              = pdo_fetch("SELECT id FROM " . GetTableName('schoolset') . " WHERE schoolid = '{$schoolid}'");
if(empty($set)){
	$data_set = array(
		'weid'     => $weid,
		'schoolid' => trim($_GPC['schoolid']),
		'teatemplate' => is_TestFz() ? 'new' : 'old',
		'stutemplate' => is_TestFz() ? 'new' : 'old',
	);
	pdo_insert(GetTableName('schoolset',false), $data_set);
}
$schoolset = pdo_fetch("SELECT * FROM " . GetTableName('schoolset') . " WHERE schoolid = '{$schoolid}'");
$operation         = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
$uniacid = intval($_W['uniacid']);


$tid_global = $_W['tid'];
$TeaiconArray = array();


$TeaiconArray['tmyscore']   = array('name' =>'我的评分','icon' => MODULE_URL.'public/mobile/img/circle_icon4.png','do'=>'tmyscore','url' => $this -> createMobileUrl('tmyscore', array('schoolid' => $schoolid)));
$TeaiconArray['tscoreall']  = array('name' =>'评分情况','icon' => MODULE_URL.'public/mobile/img/formal_enroll_icon.png','do'=>'tscoreall','url' => $this -> createMobileUrl('tscoreall', array('schoolid' => $schoolid)));
$TeaiconArray['tallcamera'] = array('name' =>'监控列表','icon' => MODULE_URL.'public/mobile/img/59ddef4d7a25b_88.png','do'=>'tallcamera','url' => $this -> createMobileUrl('tallcamera', array('schoolid' => $schoolid)));
$TeaiconArray['schoolbus']   = array('name' =>'校车定位','icon' => MODULE_URL.'public/mobile/img/link_fx.png','do'=>'schoolbus','url' => $this -> createMobileUrl('schoolbus', array('schoolid' => $schoolid)));
//评分定制 GLP
if(is_showpf()){
    $TeaiconArray['tstuscore']     = array('name' =>'学生评分','icon' => MODULE_URL.'public/mobile/img/circle_icon17.png','do'=>'tstuscore','url' => $this -> createMobileUrl('tstuscore', array('schoolid' => $schoolid)));
    $TeaiconArray['tsencerecord']  = array('name' =>'上传场景','icon' => MODULE_URL.'public/mobile/img/59ddef4d7a25b_39.png','do'=>'tsencerecord','url' => $this -> createMobileUrl('tsencerecord', array('schoolid' => $schoolid)));
    $TeaiconArray['chengjireview'] = array('name' =>'成绩考察','icon' => MODULE_URL.'public/mobile/img/59ddef4d7a25b_66.png','do'=>'chengjireview','url' => $this -> createMobileUrl('chengjireview', array('schoolid' => $schoolid)));
    $TeaiconArray['chengjidetail'] = array('name' =>'成绩详情','icon' => MODULE_URL.'public/mobile/img/59ddef4d7a25b_18.png','do'=>'chengjidetail','url' => $this -> createMobileUrl('chengjidetail', array('schoolid' => $schoolid)));
    $TeaiconArray['tbjscore'] = array('name' =>'班级评分','icon' => MODULE_URL.'public/mobile/img/bjicon_orange.png','do'=>'tbjscore','url' => $this -> createMobileUrl('tbjscore', array('schoolid' => $schoolid)));
}
//宿舍定制 游侠
if(is_showap()){
    $TeaiconArray['tstuapinfo']  = array('name' =>'宿舍考勤','icon' => MODULE_URL.'public/mobile/img/circle_icon23.png','do'=>'tstuapinfo','url' => $this -> createMobileUrl('tstuapinfo', array('schoolid' => $schoolid)));
}
//史志强 定制
if(is_showgkk()){
    $TeaiconArray['teatimetable'] = array('name' =>'教师课表','icon' => MODULE_URL.'public/mobile/img/circle_icon23.png','do'=>'teatimetable','url' => $this -> createMobileUrl('teatimetable', array('schoolid' => $schoolid)));
}

if(vis()){
    //插件形式，
    $TeaiconArray['tvisitors'] = array('name' =>'访客列表','icon' => MODULE_URL.'public/mobile/img/hard_use_icon1_2.png','do'=>'tvisitors','url' => $this -> createMobileUrl('hookvistea', array('schoolid' => $schoolid,'goto'=>'tvisitors')));
}
$tuan = check_app('tuan',$weid,$schoolid);$tuiguang = check_app('tuiguang',$weid,$schoolid);$zhuli = check_app('zhuli',$weid,$schoolid);
$sale =false;
if($zhuli || $tuan || $tuiguang){
	$sale = true;
}
if(assets()){
	$TeaiconArray['assetslist'] = array('name' =>'公物列表','icon' => MODULE_URL.'public/mobile/img/59ddef4d7a25b_49.png','do'=>'assetslist','url' => $this -> createMobileUrl('hookassetstea', array('schoolid' => $schoolid,'goto'=>'assetslist')));
	$TeaiconArray['assetsshenqing'] = array('name' =>'领用申请','icon' => MODULE_URL.'public/mobile/img/59ddef4d7a25b_90.png','do'=>'assetsshenqing','url' => $this -> createMobileUrl('hookassetstea', array('schoolid' => $schoolid,'goto'=>'assetsshenqing')));
	$TeaiconArray['assetsfix'] = array('name' =>'公物维修','icon' => MODULE_URL.'public/mobile/img/59ddef4d7a25b_81.png','do'=>'assetsfix','url' => $this -> createMobileUrl('hookassetstea', array('schoolid' => $schoolid,'goto'=>'assetsfix')));
	$TeaiconArray['assetsfixlist'] = array('name' =>'维修列表','icon' => MODULE_URL.'public/mobile/img/59ddef4d7a25b_66.png','do'=>'assetsfixlist','url' => $this -> createMobileUrl('hookassetstea', array('schoolid' => $schoolid,'goto'=>'assetsfixlist')));
	$TeaiconArray['roomreserve'] = array('name' =>'场室预定','icon' => MODULE_URL.'public/mobile/img/59ddef4d7a25b_28.png','do'=>'roomreserve','url' => $this -> createMobileUrl('hookassetstea', array('schoolid' => $schoolid,'goto'=>'roomreserve')));
	$TeaiconArray['roomreservelist'] = array('name' =>'场室预定列表','icon' => MODULE_URL.'public/mobile/img/59ddef4d7a25b_38.png','do'=>'roomreservelist','url' => $this -> createMobileUrl('hookassetstea', array('schoolid' => $schoolid,'goto'=>'roomreservelist')));
}
if (is_TestFz()) {
    $TeaiconArray['tremind'] = array('name' =>'特别提醒','icon' => MODULE_URL.'public/mobile/img/59ddef4d7a25b_38.png','do'=>'tremind','url' => $this -> createMobileUrl('tremind', array('schoolid' => $schoolid)));
    $TeaiconArray['tqzkh'] = array('name' =>'潜在客户列表','icon' => MODULE_URL.'public/mobile/img/59ddef4d7a25b_38.png','do'=>'tqzkh','url' => $this -> createMobileUrl('tqzkh', array('schoolid' => $schoolid)));
    $TeaiconArray['tkpi'] = array('name' =>'KPI','icon' => MODULE_URL.'public/mobile/img/59ddef4d7a25b_38.png','do'=>'tkpi','url' => $this -> createMobileUrl('tkpi', array('schoolid' => $schoolid)));
    $TeaiconArray['tgrade'] = array('name' =>'我的评分','icon' => MODULE_URL.'public/mobile/img/59ddef4d7a25b_38.png','do'=>'tgrade','url' => $this -> createMobileUrl('tgrade', array('schoolid' => $schoolid)));
}
if($tuiguang){
	$TeaiconArray['trykclist'] = array('name' =>'课程推广','icon' => MODULE_URL.'public/mobile/img/icon-item005.png','do'=>'trykclist','url' => $this -> createMobileUrl('hooktea', array('goto' => 'trykclist','schoolid' => $schoolid)));
}


if(keep_Blacklist()){
    $TeaiconArray['tdruglog'] = array('name' =>'喂药管理','icon' => MODULE_URL.'public/mobile/img/circle_icon23.png','do'=>'tdruglog','url' => $this -> createMobileUrl('tdruglog', array('schoolid' => $schoolid)));
    $TeaiconArray['tdruglist'] = array('name' =>'喂药列表','icon' => MODULE_URL.'public/mobile/img/circle_icon23.png','do'=>'tdruglist','url' => $this -> createMobileUrl('tdruglist', array('schoolid' => $schoolid)));
}

$state = uni_permission($_W['uid'], $uniacid);
// if($state != 'founder' && $state != 'manager' && $state != 'owner' ){
//    $this->imessage('非法访问，您无权操作该页面','','error');
// }
if($operation == 'display'){
	mload()->model('tea');
	$list = getalljsfzallteainfo($schoolid,0,$schooltype);
	$list2 = getalljsfzallteainfo_nofz($schoolid,$schooltype);
	$shteahcers = $logo['sh_teacherids'];
	$sh_tealist = '';
	$shteahcersss= explode(',',$shteahcers);
	foreach($shteahcersss as $row){
		$teacher = pdo_fetch("SELECT tname FROM " . tablename($this->table_teachers) . " WHERE id = '{$row}'");
		if($teacher){
			$sh_tealist .= $teacher['tname'].',';
		}
	}
	$sh_tealist = rtrim($sh_tealist,',');
    if(checksubmit('submit')){
        $data = array(
            'style1'    => trim($_GPC['style1']),
            'style2'    => trim($_GPC['style2']),
            'style3'    => trim($_GPC['style3']),
            'userstyle' => trim($_GPC['userstyle']),
            'bjqstyle'  => trim($_GPC['bjqstyle']),
			'headcolor' => trim($_GPC['headcolor']),
			'sh_teacherids' => rtrim($_GPC['sh_teacherids'],','),
		);
		if(is_TestFz()){
			$data2 = array(
				'teatemplate' => $_GPC['teatemplate'],
				'stutemplate' => $_GPC['stutemplate'],
			);
			pdo_update(GetTableName('schoolset',false), $data2, array('schoolid' => $schoolid, 'weid' => $weid));
		}
        pdo_update($this->table_index, $data, array('id' => $schoolid, 'weid' => $weid));
        $this->imessage('修改前端模板成功!', referer(), 'success');
    }
}elseif($operation == 'display1'){
    $icons = pdo_fetchall("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place ORDER by ssort ASC", array(':weid' => $weid, ':schoolid' => $schoolid, ':place' => 1));
    if(checksubmit('submit')){
        $titles         = $_GPC['iconname'];
        $url            = $_GPC['url'];
        $icon           = $_GPC['iconurl'];
        $ssort          = $_GPC['ssort'];
        $filter         = array();
        $filter['weid'] = $_W['uniacid'];
        foreach($titles as $key => $t){
            $id           = intval($key);
            $filter['id'] = intval($id);
            if(!empty($t)){
                $rec = array(
                    'name'  => $t,
                    'icon'  => trim($icon[$id]),
                    'url'   => trim($url[$id]),
                    'ssort' => intval($ssort[$id])
                );
                pdo_update($this->table_icon, $rec, $filter);
            }
        }
        $this->imessage('修改成功!', referer(), 'success');
    }
}elseif($operation == 'display2'){
    $icons1 = pdo_fetchall("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place ORDER by id ASC", array(':weid' => $weid, ':schoolid' => $schoolid, ':place' => 3));
    $icons2 = pdo_fetchall("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place ORDER by id ASC", array(':weid' => $weid, ':schoolid' => $schoolid, ':place' => 4));
    $icons3 = pdo_fetchall("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place ORDER by id ASC", array(':weid' => $weid, ':schoolid' => $schoolid, ':place' => 5));
    $lastid = pdo_fetch("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid ORDER by id DESC LIMIT 0,1", array(':weid' => $weid, ':schoolid' => $schoolid));
    $stutop = pdo_fetch("SELECT * FROM " . tablename($this->table_icon) . " where weid = '{$weid}' And schoolid = '{$schoolid}' And place = 12 ");
    if(checksubmit('submit')){
        $type               = $_GPC['type'];//类型 1覆盖 2新建
        $btnname            = $_GPC['btnname'];//按钮名称
        $mfbzs              = $_GPC['mfbzs'];//魔方小字
        $bzcolor            = $_GPC['bzcolor'];//魔方按钮颜色
        $iconpics           = $_GPC['iconpics']; //图标地址
        $url                = $_GPC['url']; //链接地址
        $place              = $_GPC['place'];//位置 3顶部 4魔方 5底部
        $filter             = array();
        $filter['weid']     = $_W['uniacid'];
        $filter['schoolid'] = $_W['schoolid'];
        foreach($type as $key => $t){
            $id           = intval($key);
            $filter['id'] = intval($id);
            if($t == 1){
                $rec = array(
                    'name'   => trim($btnname[$id]),
                    'beizhu' => trim($mfbzs[$id]),
                    'color'  => trim($bzcolor[$id]),
                    'icon'   => trim($iconpics[$id]),
                    'url'    => trim($url[$id]),
                    'place'  => intval($place[$id])
                );
                pdo_update($this->table_icon, $rec, array('id' => $id));
            }else{
                $data = array(
                    'weid'     => trim($_GPC['weid']),
                    'schoolid' => trim($_GPC['schoolid']),
                    'name'     => trim($btnname[$id]),
                    'beizhu'   => trim($mfbzs[$id]),
                    'color'    => trim($bzcolor[$id]),
                    'icon'     => trim($iconpics[$id]),
                    'url'      => trim($url[$id]),
                    'place'    => intval($place[$id]),
                    'status'   => 1,
                );
                pdo_insert($this->table_icon, $data);
            }
        }
        
       
        if(empty($stutop)){
         	$topdata = array(
	         	'weid'     => trim($_GPC['weid']),
	            'schoolid' => trim($_GPC['schoolid']),
	            'name'     =>"学生中心顶部",
				'status' => $_GPC['topType'],
				'color'=> $_GPC['topColor'],
				'icon'  => $_GPC['top_image'],
			 	'place'    => 12,
        	);
        	pdo_insert($this->table_icon, $topdata);
        }elseif(!empty($stutop)){
          	$topdata = array(
				'status' => $_GPC['topType'],
				'color'=> $_GPC['topColor'],
				'icon'  => $_GPC['top_image'],
	        );
	        pdo_update($this->table_icon, $topdata, array('id' => $stutop['id']));
        }
     
        $this->imessage('操作成功!', referer(), 'success');
    }
}elseif($operation == 'reset2'){
	pdo_delete($this->table_icon, array('schoolid' => $schoolid,'place' => 3));
	pdo_delete($this->table_icon, array('schoolid' => $schoolid,'place' => 4));
	pdo_delete($this->table_icon, array('schoolid' => $schoolid,'place' => 5));
	//顶部
	$icon1 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'考勤','do' => 'calendar','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/parent_sign.png','url' => $this->createMobileUrl('calendar', array('schoolid' => $schoolid)),'place' => 3,'ssort' => 1,'status' => 1,);
	$icon2 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'通知','do' => 'snoticelist','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/circle_icon1_2.png','url' => $this->createMobileUrl('snoticelist', array('schoolid' => $schoolid)),'place' => 3,'ssort' => 2,'status' => 1,);
	$icon3 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'作业','do' => 'szuoyelist','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/circle_icon1_1.png','url' => $this->createMobileUrl('szuoyelist', array('schoolid' => $schoolid)),'place' => 3,'ssort' => 3,'status' => 1,);
	$icon4 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'留言','do' => 'slylist','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/circle_icon1_5.png','url' => $this->createMobileUrl('slylist', array('schoolid' => $schoolid)),'place' => 3,'ssort' => 4,'status' => 1,);	
	//魔方
	$icon5 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'本周计划','beizhu' =>'关注学生成长','do' => 'szjhlist','color' => '#ff0000','icon' => MODULE_URL.'public/mobile/img/3.png','url' => $this->createMobileUrl('szjhlist', array('schoolid' => $schoolid)),'place' => 4,'ssort' => 1,'status' => 1,);
	$icon6 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'校园商城','beizhu' =>'校园周边','do' => 'sgoodslist','color' => '#ff9900','icon' => MODULE_URL.'public/mobile/img/1.png','url' => $this->createMobileUrl('sgoodslist', array('schoolid' => $schoolid)),'place' => 4,'ssort' => 2,'status' => 1,);
	$icon7 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'班级相册','beizhu' =>'记录精彩瞬间','do' => 'sxclist','color' => '#6aa84f','icon' => MODULE_URL.'public/mobile/img/4.png','url' => $this->createMobileUrl('sxclist', array('schoolid' => $schoolid)),'place' => 4,'ssort' => 3,'status' => 1,);
	$icon8 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'校园视频','beizhu' =>'实时关注孩子','do' => 'allcamera','color' => '#a64d79','icon' => MODULE_URL.'public/mobile/img/2.png','url' => $this->createMobileUrl('allcamera', array('schoolid' => $schoolid)),'place' => 4,'ssort' => 4,'status' => 1,);
	//列表
	$icon9 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'学生基本信息','do' => 'myinfo','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/hard_icon3_4.png','url' => $this->createMobileUrl('myinfo', array('schoolid' => $schoolid)),'place' => 5,'ssort' => 1,'status' => 1,);
	$icon10 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'我的授课老师','do' => 'mytecher','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/hard_use_icon1_2.png','url' => $this->createMobileUrl('mytecher', array('schoolid' => $schoolid)),'place' => 5,'ssort' => 2,'status' => 1,);
	$icon11 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'我的在读课程','do' => 'myclass','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/hard_icon3_1.png','url' => $this->createMobileUrl('myclass', array('schoolid' => $schoolid)),'place' => 5,'ssort' => 3,'status' => 1,);
	$icon12 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'请假记录','do' => 'leavelist','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/hard_icon4_9.png','url' => $this->createMobileUrl('leavelist', array('schoolid' => $schoolid)),'place' => 5,'ssort' => 4,'status' => 1,);
	$icon13 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'绑定考勤卡','do' => 'checkcard','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/hard_icon4_9.png','url' => $this->createMobileUrl('checkcard', array('schoolid' => $schoolid)),'place' => 5,'ssort' => 5,'status' => 1,);
	$icon14 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'我的成绩','do' => 'chengji','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/hard_icon4_8.png','url' => $this->createMobileUrl('chengji', array('schoolid' => $schoolid)),'place' => 5,'ssort' => 6,'status' => 1,);
	$icon15 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'本周课表','do' => 'timetable','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/hard_icon2_1.png','url' => $this->createMobileUrl('timetable', array('schoolid' => $schoolid)),'place' => 5,'ssort' => 7,'status' => 1,);
	$icon16 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'车载轨迹','do' => 'schoolbus','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/czgj.png','url' => $this->createMobileUrl('schoolbus', array('schoolid' => $schoolid)),'place' => 5,'ssort' => 8,'status' => 1,);
	$icon17 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'在校表现','do' => 'sclistforxs','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/hard_use_icon1_4.png','url' => $this->createMobileUrl('sclistforxs', array('schoolid' => $schoolid)),'place' => 5,'ssort' => 9,'status' => 1,);
	$icon18 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'集体活动','do' => 'galist','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/hard_icon4_1.png','url' => $this->createMobileUrl('galist', array('schoolid' => $schoolid)),'place' => 5,'ssort' => 10,'status' => 1,);
	$icon19 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'意见反馈','do' => 'syzxx','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/hard_use_icon8_3.png','url' => $this->createMobileUrl('syzxx', array('schoolid' => $schoolid)),'place' => 5,'ssort' => 11,'status' => 1,);
	pdo_insert($this->table_icon, $icon1);
	pdo_insert($this->table_icon, $icon2);
	pdo_insert($this->table_icon, $icon3);
	pdo_insert($this->table_icon, $icon4);
	pdo_insert($this->table_icon, $icon5);
	pdo_insert($this->table_icon, $icon6);
	pdo_insert($this->table_icon, $icon7);
	pdo_insert($this->table_icon, $icon8);
	pdo_insert($this->table_icon, $icon9);
	pdo_insert($this->table_icon, $icon10);
	pdo_insert($this->table_icon, $icon11);
	pdo_insert($this->table_icon, $icon12);
	pdo_insert($this->table_icon, $icon13);
	pdo_insert($this->table_icon, $icon14);
	pdo_insert($this->table_icon, $icon15);
	pdo_insert($this->table_icon, $icon16);
	pdo_insert($this->table_icon, $icon17);
	pdo_insert($this->table_icon, $icon18);
	pdo_insert($this->table_icon, $icon19);
	$this->imessage('操作成功!', referer(), 'success');	
}elseif($operation == 'display4'){
	$iconsF = pdo_fetchall("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place ORDER by ssort ASC", array(':weid' => $weid, ':schoolid' => $schoolid, ':place' => 13));
	
	$icontype = pdo_fetchall("SELECT * FROM " . GetTableName('icontype') . " where weid = :weid And schoolid = :schoolid And place = :place ORDER by ssort DESC", array(':weid' => $weid, ':schoolid' => $schoolid, ':place' => 13));
	foreach($iconsF as $k => $v){
		$icontype1 = pdo_fetch("SELECT title FROM ".GetTableName('icontype')." WHERE id = '{$v['typeid']}'  ");
		$iconsF[$k]['icontype'] = $icontype1['title'];
	}

    //检查是否有新增的图标
	$this_sql = "SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place And do=:do AND status = :status AND url = :url";
	
	$lasticontypeid = pdo_fetch("SELECT * FROM " . GetTableName('icontype') . " where weid = :weid And schoolid = :schoolid ORDER by id DESC LIMIT 0,1", array(':weid' => $weid, ':schoolid' => $schoolid));
	$lasticontypeid['id'] = $lasticontypeid['id'] ? $lasticontypeid['id'] : 0 ;
	$TeaTopArr = pdo_fetch("SELECT * FROM ".GetTableName('schoolset')." WHERE schoolid = '{$schoolid}' ");

	$TeaArray = explode(',',$TeaTopArr['teatopiconarr']);
	$TopIconFTea = [];
	foreach($TeaArray as $key_1 => $value_1){
		$TopIconFTea[] = pdo_fetch("SELECT * FROM ".GetTableName('icon')." WHERE id='{$value_1}' ");
	}
	$TeaArrayMaster = explode(',',$TeaTopArr['mastertopiconarr']);
	$TopIconFMaster = [];
	foreach($TeaArrayMaster as $key_11 => $value_11){
		$TopIconFMaster[] = pdo_fetch("SELECT * FROM ".GetTableName('icon')." WHERE id='{$value_11}' ");
	}
	
 
	$is_newest = true;
    $missed_icon = array();
	foreach($TeaiconArray as $key=>$value){
	    $this_sql_param = array(
	        ':weid' => $weid,
            ':schoolid' => $schoolid,
            ':place' => 13,
            ':do' => $value['do'],
            ':status' => 1,
            ':url' => $value['url']
        );
		$check_this = pdo_fetch($this_sql,$this_sql_param);
		if(empty($check_this)){
			$is_newest = false;
            $missed_icon[] = $value['do'];
			continue;
		}
	}

/*     foreach($iconsFF as $keyF => $valueF){

	    if(!is_showgkk()){
		    if($valueF['do'] != 'gkklist' && $valueF['do'] != 'gkkpjjl'){
				$iconsF[] = $valueF;
		    }
	    }else{
			$iconsF[] = $valueF;
		}
    } */
	$ss = count($iconsF,0);
	for($i=$ss;$i>=0;$i--){
		if(!is_showgkk()){
			if($iconsF[$i]['do'] == 'gkklist' || $iconsF[$i]['do'] == 'gkkpjjl'){
				UnsetArrayByKey($iconsF,$i);
		    }
		}

        if($iconsF[$i]['do'] == 'gkkpjjl'){
            UnsetArrayByKey($iconsF,$i);
        }

        if(!is_showap()){
            if($iconsF[$i]['do'] == 'tstuapinfo'){
                UnsetArrayByKey($iconsF,$i);
            }
        }
	}

	//提交保存
    if(checksubmit('submit')){


		

		if(is_TestFz()){
			$TopIconId = $_GPC['TopIconId'];
			$TopIconIdorder = $_GPC['TopIconIdorder'];
			$TTTTT = [];
			foreach($TopIconId as $key_TT => $value_TT){
				$K = $TopIconIdorder[$key_TT]  ;
				$TTTTT[$K] = $value_TT;
			}
			$TopStr = implode(",",$TTTTT);
			//普通老师，写入 tea
			//校长，写入 master
			if($_GPC['is_master']){
				$datatemp = array(
					'mastertopiconarr' => $TopStr,
				);
			}else{
				$datatemp = array(
					'teatopiconarr' => $TopStr,
				);
			}
			pdo_update(GetTableName('schoolset',false),$datatemp,array('schoolid'=>$schoolid));
	
		}
        $type               = $_GPC['type'];//类型 1覆盖 2新建
        $btnname            = $_GPC['btnname'];//按钮名称
        $mfbzs              = $_GPC['mfbzs'];//魔方小字
        $bzcolor            = $_GPC['bzcolor'];//魔方按钮颜色
        $iconpics           = $_GPC['iconpics']; //图标地址
        $place              = $_GPC['place'];//位置 3顶部 4魔方 5底部
        $typeid              = $_GPC['typeid'];
        $filter             = array();
        $filter['weid']     = $_W['uniacid'];
        $filter['schoolid'] = $_W['schoolid'];
		$ssortId = $_GPC['ssortId'];
        foreach($iconpics as $key => $t){
            $id           = intval($key);
            $filter['id'] = intval($id);
          
            $rec = array(
                'name'   => trim($btnname[$id]),
                'icon'   =>trim($iconpics[$id]),
                'place'  => intval($place[$id]),
                'ssort'  => intval($ssortId[$id]),
                'typeid'  => intval($typeid[$id]),

            );
            pdo_update($this->table_icon, $rec, array('id' => $id));
			  
		}
		
		$title            	= $_GPC['icontypetitle'];
		$ssort              = $_GPC['ssort'];
		$status              = $_GPC['status'];
		foreach($type as $key => $t){
			$id           = intval($key);
			if($t == 1){
				$rec = array(
					'title'   => trim($title[$id]),
					'ssort' => trim($ssort[$id]),
					'place'  => intval($place[$id]),
					'status'  => intval($status[$id])
				);
				pdo_update(GetTableName('icontype',false), $rec, array('id' => $id));
			}else{
				$data = array(
					'weid'     => trim($_GPC['weid']),
					'schoolid' => trim($_GPC['schoolid']),
					'title'     => trim($title[$id]),
					'ssort'     => trim($ssort[$id]),
					'place'    => intval($place[$id]),
					'status'   => 1,
				);
				if(!empty($title[$id])){
					pdo_insert(GetTableName('icontype',false), $data);
				}
			}
		}

		$icon_shouce = pdo_fetch("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place And do=:do", array(':weid' => $weid, ':schoolid' => $schoolid, ':place' => 13,':do'=>'shoucelist'));
		pdo_update($this->table_index, array('shoucename'=>$icon_shouce['name']), array('id' => $schoolid));
       $this->imessage('操作成功!', referer(), 'success');
    }
}elseif($operation == 'reset4'){//一键恢复教师中心图标
	pdo_delete($this->table_icon, array('schoolid' => $schoolid,'place' => 13 ));
	$icon1  = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'留言','icon' => MODULE_URL.'public/mobile/img/link_msg.png','url' => $this -> createMobileUrl('tlylist', array('schoolid' => $schoolid)),'place' => 13,'do'=>'tlylist', 'ssort' => 1,'status' => 1,);
	$icon2  = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'班级通知','icon' => MODULE_URL.'public/mobile/img/link_bjtz.png','url' => $this -> createMobileUrl('noticelist', array('schoolid' => $schoolid)),'place' => 13,'do'=>'noticelist','ssort' => 2,'status' => 1,);
	$icon3  = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'学生请假','icon' => MODULE_URL.'public/mobile/img/link_ktdt.png','url' => $this -> createMobileUrl('smssage', array('schoolid' => $schoolid)),'place' => 13,'do'=>'smssage','ssort' => 3,'status' => 1,);
	$icon4  = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'商城','icon' => MODULE_URL.'public/mobile/img/link_mail.png','url' => $this -> createMobileUrl('goodslist', array('schoolid' => $schoolid)),'place' =>13, 'do'=>'goodslist','ssort' => 4,'status' => 1,);
	$icon5  = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'任务','icon' => MODULE_URL.'public/mobile/img/circle_icon1_7.png','url' => $this -> createMobileUrl('todolist', array('schoolid' => $schoolid)),'place' => 13,'do'=>'todolist','ssort' => 5,'status' => 1,);
	$icon6  = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'课程预约','icon' => MODULE_URL.'public/mobile/img/circle_icon18.png','url' => $this -> createMobileUrl('cyylist', array('schoolid' => $schoolid)),'place' => 13,'do'=>'cyylist','ssort' => 6,'status' => 1,);
	$icon7  = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'我的课程','icon' => MODULE_URL.'public/mobile/img/circle_icon1_1.png','url' => $this -> createMobileUrl('tmycourse', array('schoolid' => $schoolid)),'place' => 13,'do'=>'tmycourse','ssort' => 7,'status' => 1,);
	$icon8  = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'授课情况','icon' => MODULE_URL.'public/mobile/img/circle_icon15.png','url' => $this -> createMobileUrl('tkcsignall', array('schoolid' => $schoolid)),'place' => 13,'do'=>'tkcsignall','ssort' => 8,'status' => 1,);
	if(is_showgkk()){
        $icon9  = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'我的公开课','icon' => MODULE_URL.'public/mobile/img/circle_icon18.png','url' => $this -> createMobileUrl('gkklist', array('schoolid' => $schoolid)),'place' => 13,'do'=>'gkklist','ssort' => 9,'status' => 1,);

    }
	$icon11 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'校长信箱','icon' => MODULE_URL.'public/mobile/img/circle_icon16.png','url' => $this -> createMobileUrl('tyzxx', array('schoolid' => $schoolid)),'place' => 13,'do'=>'tyzxx','ssort' => 11,'status' => 1,);
	$icon12 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'职工请假','icon' => MODULE_URL.'public/mobile/img/circle_icon1_3.png','url' => $this -> createMobileUrl('tmssage', array('schoolid' => $schoolid)),'place' => 13,'do'=>'tmssage','ssort' => 12,'status' => 1,);
	$icon13 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'校园公告','icon' => MODULE_URL.'public/mobile/img/link_alarm.png','url' => $this -> createMobileUrl('mnoticelist', array('schoolid' => $schoolid)),'place' => 13,'do'=>'mnoticelist','ssort' => 13,'status' => 1,);
	$icon14 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'作业管理','icon' => MODULE_URL.'public/mobile/img/link_zuoye.png','url' => $this -> createMobileUrl('zuoyelist', array('schoolid' => $schoolid)),'place' => 13,'do'=>'zuoyelist','ssort' => 14,'status' => 1,);
	$icon15 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'一键放学','icon' => MODULE_URL.'public/mobile/img/ETftrL1UNrZ3i4100SbKuISjZLOUnj.png','url' => '','place' => 13,'do'=>'yjfx','ssort' => 15,'status' => 1,);
	$icon16 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'班级圈','icon' => MODULE_URL.'public/mobile/img/link_bjq.png','url' => $this -> createMobileUrl('bjq', array('schoolid' => $schoolid)),'place' => 13,'do'=>'bjq','ssort' => 16,'status' => 1,);
	$icon17 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'班级相册','icon' => MODULE_URL.'public/mobile/img/link_xc.png','url' => $this -> createMobileUrl('xclist', array('schoolid' => $schoolid)),'place' => 13,'do'=>'xclist','ssort' => 17,'status' => 1,);
	$icon18 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'学生管理','icon' => MODULE_URL.'public/mobile/img/link_xs.png','url' => $this -> createMobileUrl('stulist', array('schoolid' => $schoolid)),'place' => 13,'do'=>'stulist','ssort' => 18,'status' => 1,);
	$icon19 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'报名列表','icon' => MODULE_URL.'public/mobile/img/link_bm.png','url' => $this -> createMobileUrl('bmlist', array('schoolid' => $schoolid)),'place' => 13,'do'=>'bmlist','ssort' => 19,'status' => 1,);
	$icon20 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'学生考勤','icon' => MODULE_URL.'public/mobile/img/link_sck.png','url' => $this -> createMobileUrl('signlist', array('schoolid' => $schoolid)),'place' => 13,'do'=>'signlist','ssort' => 20,'status' => 1,);
	$icon21 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'职工考勤','icon' => MODULE_URL.'public/mobile/img/link_jskq.png','url' => $this -> createMobileUrl('jschecklog', array('schoolid' => $schoolid)),'place' => 13,'do'=>'jschecklog','ssort' => 21,'status' => 1,);
	$icon22 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'通讯录','icon' => MODULE_URL.'public/mobile/img/ioc11.png','url' => $this -> createMobileUrl('tongxunlu', array('schoolid' => $schoolid)),'place' => 13,'do'=>'tongxunlu','ssort' => 22,'status' => 1,);
	$icon23 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'周计划','icon' => MODULE_URL.'public/mobile/img/link_zjh.png','url' => $this -> createMobileUrl('tzjhlist', array('schoolid' => $schoolid)),'place' => 13,'do'=>'tzjhlist','ssort' => 23,'status' => 1,);
	$icon24 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'成长手册','icon' => MODULE_URL.'public/mobile/img/link_zxbx.png','url' => $this -> createMobileUrl('shoucelist', array('schoolid' => $schoolid)),'place' => 13,'do'=>'shoucelist','ssort' => 24,'status' => 1,);
	$icon25 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'校车定位','icon' => MODULE_URL.'public/mobile/img/link_fx.png','url' => $this -> createMobileUrl('schoolbus', array('schoolid' => $schoolid)),'place' => 13,'do'=>'schoolbus','ssort' => 25,'status' => 1,);
	if($tuiguang){
	$icon26 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'课程推广','icon' => MODULE_URL.'public/mobile/img/icon-item005.png','url' => $this -> createMobileUrl('hooktea', array('goto' => 'trykclist','schoolid' => $schoolid)),'place' => 13,'do'=>'schoolbus','ssort' => 26,'status' => 1,);
	}
	pdo_insert($this->table_icon, $icon1);
	pdo_insert($this->table_icon, $icon2);
	pdo_insert($this->table_icon, $icon3);
	pdo_insert($this->table_icon, $icon4);
	pdo_insert($this->table_icon, $icon5);
	pdo_insert($this->table_icon, $icon6);
	pdo_insert($this->table_icon, $icon7);
	pdo_insert($this->table_icon, $icon8);
	if(is_showgkk()){
        pdo_insert($this->table_icon, $icon9);
        pdo_insert($this->table_icon, $icon10);
    }
	pdo_insert($this->table_icon, $icon11);
	pdo_insert($this->table_icon, $icon12);
	pdo_insert($this->table_icon, $icon13);
	pdo_insert($this->table_icon, $icon14);
	pdo_insert($this->table_icon, $icon15);
	pdo_insert($this->table_icon, $icon16);
	pdo_insert($this->table_icon, $icon17);
	pdo_insert($this->table_icon, $icon18);
	pdo_insert($this->table_icon, $icon19);
	pdo_insert($this->table_icon, $icon20);
	pdo_insert($this->table_icon, $icon21);
	pdo_insert($this->table_icon, $icon22);
	pdo_insert($this->table_icon, $icon23);
	pdo_insert($this->table_icon, $icon24);
	pdo_insert($this->table_icon, $icon25);
	if($tuiguang){
		pdo_insert($this->table_icon, $icon26);
	}
	$this->imessage('操作成功!', referer(), 'success');
}elseif($operation == 'newadd_tea'){//检查新增
    $missed_icon = $_GPC['missed_icon'];
	$this_sql = "SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place And do=:do AND status = :status AND url = :url";
	foreach ($missed_icon as $key=>$value){
        $this_sql_param_check = array(
            ':weid' => $weid,
            ':schoolid' => $schoolid,
            ':place' => 13,
            ':do' => $value,
            ':status' => 1,
            ':url' => $TeaiconArray[$value]['url'],
        );
        $check_this = pdo_fetch($this_sql,$this_sql_param_check);
        if(empty($check_this)){
            $max_ssort = pdo_fetch("SELECT ssort FROM " . tablename($this->table_icon) . " where weid = $weid And schoolid = $schoolid And place = 13 and  status = 1 ORDER BY ssort DESC ")['ssort'] + 1;
            $insert_data = array(
                'weid' => $weid,
                'schoolid' => $schoolid,
                'name' =>$TeaiconArray[$value]['name'],
                'icon' =>$TeaiconArray[$value]['icon'],
                'url' => $TeaiconArray[$value]['url'],
                'place' => 13,
                'do'=>$value,
                'ssort' => $max_ssort,
                'status' => 1,
            );
            if(!empty($insert_data)){
                pdo_insert($this->table_icon, $insert_data);
            }
        }
    }
	$this->imessage('操作成功!', referer(), 'success');
}elseif($operation == 'display3'){
	$icons_10 = pdo_fetch("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place ORDER by ssort ASC", array(':weid' => $weid, ':schoolid' => $schoolid, ':place' => 10));
	$icons_11 = pdo_fetch("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place ORDER by ssort ASC", array(':weid' => $weid, ':schoolid' => $schoolid, ':place' => 11));
    $icons1 = pdo_fetchall("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place ORDER by ssort ASC", array(':weid' => $weid, ':schoolid' => $schoolid, ':place' => 6));
    $icons2 = pdo_fetchall("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place ORDER by ssort ASC", array(':weid' => $weid, ':schoolid' => $schoolid, ':place' => 7));
    $icons22 = pdo_fetchall("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place And status = :status ORDER by ssort ASC", array(':weid' => $weid, ':schoolid' => $schoolid, ':place' => 7, ':status' => 1));	
    $icons3 = pdo_fetchall("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place ORDER by ssort ASC", array(':weid' => $weid, ':schoolid' => $schoolid, ':place' => 8));
    $icons4 = pdo_fetchall("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place ORDER by ssort ASC", array(':weid' => $weid, ':schoolid' => $schoolid, ':place' => 9));
    $icons44 = pdo_fetchall("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And place = :place And status = :status ORDER by ssort ASC", array(':weid' => $weid, ':schoolid' => $schoolid, ':place' => 9, ':status' => 1));	
    if(checksubmit('submit')){
        $titles         = $_GPC['iconname'];
        $url            = $_GPC['url'];
		$dos             = $_GPC['dos'];
		$bzcolor        = $_GPC['bzcolor'];//魔方按钮颜色
        $icon           = $_GPC['iconurl'];
		$icon2          = $_GPC['iconurl2'];
		$place          = $_GPC['place'];
        $ssort          = $_GPC['ssort'];
        $filter         = array();
        $filter['weid'] = $_W['uniacid'];
        foreach($titles as $key => $t){
            $id           = intval($key);
            $filter['id'] = intval($id);
            if(!empty($t)){
                $rec = array(
                    'name'  => $t,
					'color' => trim($bzcolor[$id]),
                    'icon'  => trim($icon[$id]),
					'icon2' => trim($icon2[$id]),
                    'url'   => trim($url[$id]),
					'do'    => $dos[$id],
					'place' => intval($place[$id]),
                    'ssort' => intval($ssort[$id])
                );
                pdo_update($this->table_icon, $rec, $filter);
            }
        }
        $this->imessage('操作成功!', referer(), 'success');
    }
}elseif($operation == 'reset1'){
	pdo_delete($this->table_icon, array('schoolid' => $schoolid,'place' => 1 ));
	
	$icon1 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'学校简介','icon' => MODULE_URL.'public/mobile/img/ioc1.png','url' => $_W['siteroot'] .'app/'.$this->createMobileUrl('jianjie', array('schoolid' => $schoolid)),'place' => 1,'ssort' => 1,'status' => 1,);
	$icon2 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'教师风采','icon' => MODULE_URL.'public/mobile/img/ioc2.png','url' => $_W['siteroot'] .'app/'.$this->createMobileUrl('teachers', array('schoolid' => $schoolid)),'place' => 1,'ssort' => 2,'status' => 1,);
	$icon3 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'招生简介','icon' => MODULE_URL.'public/mobile/img/ioc4.png','url' => $_W['siteroot'] .'app/'.$this->createMobileUrl('zhaosheng', array('schoolid' => $schoolid)),'place' => 1,'ssort' => 3,'status' => 1,);
	$icon4 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'本周食谱','icon' => MODULE_URL.'public/mobile/img/ioc3.png','url' => $_W['siteroot'] .'app/'.$this->createMobileUrl('cooklist', array('schoolid' => $schoolid)),'place' => 1,'ssort' => 4,'status' => 1,);
	$icon5 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'微信绑定','icon' => MODULE_URL.'public/mobile/img/ioc7.png','url' => $_W['siteroot'] .'app/'.$this->createMobileUrl('bangding', array('schoolid' => $schoolid)),'place' => 1,'ssort' => 5,'status' => 1,);
	$icon6 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'课程列表','icon' => MODULE_URL.'public/mobile/img/ioc8.png','url' => $_W['siteroot'] .'app/'.$this->createMobileUrl('kc', array('schoolid' => $schoolid)),'place' => 1,'ssort' => 6,'status' => 1,);
	$icon7 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'报名申请','icon' => MODULE_URL.'public/mobile/img/ioc9.png','url' => $_W['siteroot'] .'app/'.$this->createMobileUrl('signup', array('schoolid' => $schoolid)),'place' => 1,'ssort' => 7,'status' => 1,);
	$icon8 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'教师中心','icon' => MODULE_URL.'public/mobile/img/ioc10.png','url' => $_W['siteroot'] .'app/'.$this->createMobileUrl('myschool', array('schoolid' => $schoolid)),'place' => 1,'ssort' => 8,'status' => 1,);
	pdo_insert($this->table_icon, $icon1);
	pdo_insert($this->table_icon, $icon2);
	pdo_insert($this->table_icon, $icon3);
	pdo_insert($this->table_icon, $icon4);
	pdo_insert($this->table_icon, $icon5);
	pdo_insert($this->table_icon, $icon6);
	pdo_insert($this->table_icon, $icon7);
	pdo_insert($this->table_icon, $icon8);
	$this->imessage('操作成功!', referer(), 'success');
}elseif($operation == 'reset'){
	//6学生底部 7学生弹框 8教师底部 9教师弹框  10学生中心按钮   11教师中心按钮
	pdo_delete($this->table_icon, array('schoolid' => $schoolid,'place' => 6));
	pdo_delete($this->table_icon, array('schoolid' => $schoolid,'place' => 7));
	pdo_delete($this->table_icon, array('schoolid' => $schoolid,'place' => 8));
	pdo_delete($this->table_icon, array('schoolid' => $schoolid,'place' => 9));
	pdo_delete($this->table_icon, array('schoolid' => $schoolid,'place' => 10));
	pdo_delete($this->table_icon, array('schoolid' => $schoolid,'place' => 11));
	//学生底部
	$icon1 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'校园','do' => 'detail','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/bottom_menu_icon1_noSelect.png','icon2' => MODULE_URL.'public/mobile/img/bottom_menu_icon1_Select.png','url' => $this->createMobileUrl('detail', array('schoolid' => $schoolid)),'place' => 6,'ssort' => 1,'status' => 1,);
	$icon2 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'班级圈','do' => 'sbjq','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/bottom_menu_icon2_noSelect.png','icon2' => MODULE_URL.'public/mobile/img/bottom_menu_icon2_Select.png','url' => $this->createMobileUrl('sbjq', array('schoolid' => $schoolid)),'place' => 6,'ssort' => 2,'status' => 1,);
	$icon3 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'通讯录','do' => 'callbook','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/bottom_menu_icon3_noSelect.png','icon2' => MODULE_URL.'public/mobile/img/bottom_menu_icon3_Select.png','url' => $this->createMobileUrl('callbook', array('schoolid' => $schoolid)),'place' => 6,'ssort' => 4,'status' => 1,);
	$icon4 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'我的','do' => 'user','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/bottom_menu_icon4_noSelect.png','icon2' => MODULE_URL.'public/mobile/img/bottom_menu_icon4_Select.png','url' => $this->createMobileUrl('user', array('schoolid' => $schoolid)),'place' => 6,'ssort' => 5,'status' => 1,);	
	//学生弹框
	$icon5 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'请假','color' => '#EAEAEA','icon' => MODULE_URL.'public/mobile/img/ionc_1.png','url' => $this->createMobileUrl('xsqj', array('schoolid' => $schoolid)),'place' => 7,'ssort' => 1,'status' => 1,);
	$icon6 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'留言','color' => '#F6F4F4','icon' => MODULE_URL.'public/mobile/img/ionc_2.png','url' => $this->createMobileUrl('slylist', array('schoolid' => $schoolid)),'place' => 7,'ssort' => 2,'status' => 1,);
	$icon7 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'发动态','color' => '#EAEAEA','icon' => MODULE_URL.'public/mobile/img/ionc_3.png','url' => $this->createMobileUrl('sbjqfabu', array('schoolid' => $schoolid)),'place' => 7,'ssort' => 3,'status' => 1,);
	$icon8 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'传照片','color' => '#F6F4F4','icon' => MODULE_URL.'public/mobile/img/ionc_4.png','url' => $this->createMobileUrl('sxcfb', array('schoolid' => $schoolid)),'place' => 7,'ssort' => 4,'status' => 1,);
	//教师底部
	$icon9 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'校园','do' => 'detail','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/bottom_menu_icon1_noSelect.png','icon2' => MODULE_URL.'public/mobile/img/bottom_menu_icon1_Select.png','url' => $this->createMobileUrl('detail', array('schoolid' => $schoolid)),'place' => 8,'ssort' => 1,'status' => 1,);
	$icon10 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'班级圈','do' => 'bjq','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/bottom_menu_icon2_noSelect.png','icon2' => MODULE_URL.'public/mobile/img/bottom_menu_icon2_Select.png','url' => $this->createMobileUrl('bjq', array('schoolid' => $schoolid)),'place' => 8,'ssort' => 2,'status' => 1,);
	$icon11 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'通讯录','do' => 'tongxunlu','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/bottom_menu_icon3_noSelect.png','icon2' => MODULE_URL.'public/mobile/img/bottom_menu_icon3_Select.png','url' => $this->createMobileUrl('tongxunlu', array('schoolid' => $schoolid)),'place' => 8,'ssort' => 4,'status' => 1,);
	$icon12 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'我的','do' => 'myschool','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/bottom_menu_icon4_noSelect.png','icon2' => MODULE_URL.'public/mobile/img/bottom_menu_icon4_Select.png','url' => $this->createMobileUrl('myschool', array('schoolid' => $schoolid)),'place' => 8,'ssort' => 5,'status' => 1,);	
	//教师弹框
	$icon13 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'发布作业','color' => '#EAEAEA','icon' => MODULE_URL.'public/mobile/img/ionc_1.png','url' => $this->createMobileUrl('zfabu', array('schoolid' => $schoolid)),'place' => 9,'ssort' => 1,'status' => 1,);
	$icon14 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'发通知','color' => '#F6F4F4','icon' => MODULE_URL.'public/mobile/img/ionc_2.png','url' => $this->createMobileUrl('fabu', array('schoolid' => $schoolid)),'place' => 9,'ssort' => 2,'status' => 1,);
	$icon15 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'发动态','color' => '#EAEAEA','icon' => MODULE_URL.'public/mobile/img/ionc_3.png','url' => $this->createMobileUrl('bjqfabu', array('schoolid' => $schoolid)),'place' => 9,'ssort' => 3,'status' => 1,);
	$icon16 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'传照片','color' => '#F6F4F4','icon' => MODULE_URL.'public/mobile/img/ionc_4.png','url' => $this->createMobileUrl('xcfb', array('schoolid' => $schoolid)),'place' => 9,'ssort' => 4,'status' => 1,);	
	//学生中心按钮
	$icon17 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'中心按钮','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/bottom_menu_icon_add.png','place' => 10,'ssort' => 0,'status' => 1,);
	//教师中心按钮
	$icon18 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'中心按钮','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/bottom_menu_icon_add.png','place' => 11,'ssort' => 0,'status' => 1,);
	pdo_insert($this->table_icon, $icon1);
	pdo_insert($this->table_icon, $icon2);
	pdo_insert($this->table_icon, $icon3);
	pdo_insert($this->table_icon, $icon4);
	pdo_insert($this->table_icon, $icon5);
	pdo_insert($this->table_icon, $icon6);
	pdo_insert($this->table_icon, $icon7);
	pdo_insert($this->table_icon, $icon8);
	pdo_insert($this->table_icon, $icon9);
	pdo_insert($this->table_icon, $icon10);
	pdo_insert($this->table_icon, $icon11);
	pdo_insert($this->table_icon, $icon12);	
	pdo_insert($this->table_icon, $icon13);
	pdo_insert($this->table_icon, $icon14);
	pdo_insert($this->table_icon, $icon15);
	pdo_insert($this->table_icon, $icon16);	
	pdo_insert($this->table_icon, $icon17);	
	pdo_insert($this->table_icon, $icon18);	
	$this->imessage('操作成功!', referer(), 'success');
}elseif($operation == 'reset_centerbtn'){
	// 10学生中心按钮   11教师中心按钮
	pdo_delete($this->table_icon, array('schoolid' => $schoolid,'place' => 10));
	pdo_delete($this->table_icon, array('schoolid' => $schoolid,'place' => 11));
	//学生中心按钮
	$icon17 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'中心按钮','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/bottom_menu_icon_add.png','place' => 10,'ssort' => 0,'status' => 1,);
	//教师中心按钮
	$icon18 = array('weid' => $weid,'schoolid' => $schoolid,'name' =>'中心按钮','color' => '#06c1ae','icon' => MODULE_URL.'public/mobile/img/bottom_menu_icon_add.png','place' => 11,'ssort' => 0,'status' => 1,);
	pdo_insert($this->table_icon, $icon17);	
	pdo_insert($this->table_icon, $icon18);	
	$this->imessage('底部菜单中心按钮已恢复至默认!', referer(), 'success');	
}elseif($operation == 'change'){
    $status = trim($_GPC['status']);
    $id     = trim($_GPC['id']);
    $data   = array('status' => $status);
    pdo_update($this->table_icon, $data, array('id' => $id));
}
elseif($operation == 'icons22'){
	$status = trim($_GPC['status']);
	$data   = array('status' => $status);
	pdo_update($this->table_icon, $data, array('schoolid' => $schoolid,'place' => 7));
}elseif($operation == 'icons44'){
	$status = trim($_GPC['status']);
	$data   = array('status' => $status);
	pdo_update($this->table_icon, $data, array('schoolid' => $schoolid,'place' => 9));	
}elseif($operation == 'delclass'){
    $id   = trim($_GPC['id']);
    $item = pdo_fetch("SELECT * FROM " . tablename($this->table_icon) . " where weid = :weid And schoolid = :schoolid And id = :id", array(':weid' => $weid, ':schoolid' => $_GPC['schoolid'], ':id' => $id));
    if($item){
        pdo_delete($this->table_icon, array('id' => $id));
        $message         = "删除操作成功！";
        $data ['result'] = true;
        $data ['msg']    = $message;
    }else{
        $message         = "删除失败请重刷新页面重试!";
        $data ['result'] = false;
        $data ['msg']    = $message;
    }
    die (json_encode($data));
}elseif($operation == 'delicontype'){
	$id   = trim($_GPC['id']);
    $item = pdo_fetch("SELECT * FROM " . GetTableName('icontype') . " where id = :id", array(':id' => $id));
    if($item){
        pdo_delete(GetTableName('icontype',false), array('id' => $id));
        pdo_update(GetTableName('icon',false),array('typeid'=>0), array('typeid' => $id));
        $message         = "删除操作成功！";
        $data ['result'] = true;
        $data ['msg']    = $message;
    }else{
        $message         = "删除失败请重刷新页面重试!";
        $data ['result'] = false;
        $data ['msg']    = $message;
    }
    die (json_encode($data));
}
include $this->template('web/template');
?>
<?php
/**
 * 微教育模块
 *
 * @author 高贵血迹
 */
        global $_W, $_GPC;
        $weid = $_W ['uniacid'];
		$schoolid = intval($_GPC['schoolid']);
		$openid = $_W['openid'];
		$schooltype  = $_W['schooltype'];
		$obid = 1;
        //查询是否用户登录
		$it = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where id = :id ", array(':id' => $_SESSION['user']));
		$school = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $schoolid));
		$chargesetinfo = unserialize($school['chargesetinfo']);
		if(!empty($it)){
			$condition_all = " yue_type = 2 ";
			if($school['is_buzhu'] == 1){
				$condition_all .= " or yue_type = 1 ";
			}
			if($chargesetinfo['is_charge'] == 1){
				$condition_all .= " or yue_type = 3 ";
			}

			$first_cost = $chargesetinfo['price_once'] * 1000 * $chargesetinfo['min_num'] / 1000; 
			$student = pdo_fetch("SELECT id,bj_id,chongzhi,s_name,icon,sex,chargenum,points,buzhu FROM " . tablename($this->table_students) . " where weid = :weid AND id = :id", array(':weid' => $weid, ':id' => $it['sid']));
			$bj_name = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " where weid = :weid AND sid=:sid", array(':weid' => $weid, ':sid' => $student['bj_id']))['sname'];
			$beginThismonth=mktime(0,0,0,date('m'),1,date('Y'));
			$endThismonth=mktime(23,59,59,date('m'),date('t'),date('Y'));
			$ThisMonthAllCost_arr = pdo_fetch("SELECT sum(cost) as allcost FROM " . tablename($this->table_yuecostlog) . " where weid = '{$weid}' AND sid = '{$student['id']}' and cost_type =2 and costtime >='{$beginThismonth}' and costtime <='{$endThismonth}' ");
			$ThisMonthAllCost = $ThisMonthAllCost_arr['allcost']?$ThisMonthAllCost_arr['allcost']:0;
			$nowtime = time();
			$student_buzhu = pdo_fetch("SELECT * FROM " . tablename($this->table_buzhulog) . " where weid ='{$weid}' AND sid = '{$it['sid']}' ORDER BY createtime DESC ");		
			$buzhu = $student['buzhu'];
			$all_yue = $buzhu + $student['chongzhi'];
			$noticeytpe = !empty($_GPC['noticeytpe'])?intval($_GPC['noticeytpe']):2;
			$thistime = trim($_GPC['limit']);
			if(empty($thistime) && empty($_GPC['change']) && empty($_GPC['more'])){
				$loglist = pdo_fetchall("SELECT * FROM " . tablename($this->table_yuecostlog) . " where weid = '{$weid}' And schoolid = '{$schoolid}' And cost_type = '{$noticeytpe}' and sid = '{$it['sid']}' and ({$condition_all}) ORDER BY createtime DESC LIMIT 0,10 ");
				include $this->template(''.$school['style2'].'/yuecostlog');
			//}elseif((intval($thistime) >0 && !empty($_GPC['more'])) || (!empty($_GPC['change']))){
            }else{
			    //var_dump($thistime);
			    //die();



				if($thistime){
					$condition = " AND createtime < '{$thistime}'";
				}

				$loglist1 = pdo_fetchall("SELECT * FROM " . tablename($this->table_yuecostlog) . " where weid = '{$weid}' And schoolid = '{$schoolid}' And cost_type = '{$noticeytpe}' and sid = '{$it['sid']}' $condition and ({$condition_all})  ORDER BY createtime DESC LIMIT 0,10 ");
               // if($thistime || !empty($_GPC['change'])) {
                    include $this->template('comtool/yuecostlog');
                //}
			}		
			

        }else{
			session_destroy();
		    $stopurl = $_W['siteroot'] .'app/'.$this->createMobileUrl('bangding', array('schoolid' => $schoolid));
			header("location:$stopurl");
			exit;
        }        
?>
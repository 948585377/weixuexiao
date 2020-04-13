<?php
/**
 * 微教育模块
 *
 * @author 高贵血迹
 */
		global $_GPC, $_W;
		$weid              = $_W['uniacid'];
		$action            = 'students';
		$this1             = 'no2';
		$GLOBALS['frames'] = $this->getNaveMenu($_GPC['schoolid'], $action);
		$schoolid          = intval($_GPC['schoolid']);
		$schooltype         = $_W['schooltype'];
		$school            = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where id = :id ", array(':id' => $schoolid));
		$logo              = pdo_fetch("SELECT logo,title,is_stuewcode,spic FROM " . tablename($this->table_index) . " WHERE id = '{$schoolid}'");			
		$operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
		$tid_global = $_W['tid'];
		if($operation == 'post'){
			if (!(IsHasQx($tid_global,1000702,1,$schoolid))){
				$this->imessage('非法访问，您无权操作该页面','','error');	
			}
			load()->func('tpl');
			$id = intval($_GPC['id']);

            mload()->model('sell');
            $allselltea = GetAllSellTea($schoolid,$weid,0);
           // var_dump($allselltea);
			if(!empty($id)){
				$item = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id = :id", array(':id' => $id));

				
				if($item['keyid'] != '0' )
				{
					$other = pdo_fetchall("SELECT * FROM " . tablename($this->table_students) . " WHERE keyid = :id", array(':id' => $item['keyid']));
					foreach( $other as $key => $value )
					{
						if($value['keyid'] != $value['id']){
						$item['all'][] = array(
							'xq_id' => $value['xq_id'],
							'bj_id' => $value['bj_id'],
							'sid'   => $value['id']

						);
					}
					}
				}
				
				if(empty($item)){
					$this->imessage('抱歉，学生不存在或是已经删除1！', '', 'error');
				}else{
					if(!empty($item['thumb_url'])){
						$item['thumbArr'] = explode('|', $item['thumb_url']);
					}
					if(!empty($item['sellteaid'])){
					    $item['sellteaname'] =  pdo_fetch("SELECT tname FROM " . tablename($this->table_teachers) . " WHERE id = :id", array(':id' => $item['sellteaid']))['tname'];
                    }
				}
			}
			$xueqi             = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = :weid And schoolid = :schoolid And type = :type ORDER BY ssort DESC", array(':weid' => $weid, ':type' => 'semester', ':schoolid' => $schoolid));
			$bj                = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = :weid And schoolid = :schoolid And type = :type ORDER BY ssort DESC", array(':weid' => $weid, ':type' => 'theclass', ':schoolid' => $schoolid));			
			if($item['code'] == 0){
				$rAndStr = str_shuffle('123456789');
				$rAnd    = substr($rAndStr, 0, 6);
			}else{
				$rAnd = $item['code'];
			}
			if(!empty($_GPC['code'])){
				$rAnd = $_GPC['code'];
			}	
			if(checksubmit('submit')){
				if(!empty($_GPC['new'])){
					if(count($_GPC['bj_new']) != count(array_unique($_GPC['bj_new'])))
						{
							$this->imessage('对不起，您增加的班级有重复', '', 'error');
						}
						if(in_array(0,$_GPC['bj_new']))
						{
							$this->imessage('对不起，您有未选择的班级信息', '', 'error');
						}
				}
				$data  = array(
					'weid'           => $weid,
					'schoolid'       => $schoolid,
					's_name'         => trim($_GPC['s_name']),
					'icon'           => trim($_GPC['icon']),
					'sex'            => intval($_GPC['sex']),
					's_type'            => intval($_GPC['s_type']),
					'bj_id'          => trim($_GPC['bj']),
					'xq_id'          => trim($_GPC['xueqi']),
					'numberid'       => trim($_GPC['numberid']),
					'birthdate'      => strtotime($_GPC['birthdate']),
					'homephone'      => trim($_GPC['tel']),
					'mobile'         => trim($_GPC['mobile']),
					'area_addr'      => trim($_GPC['addr']),
					'seffectivetime' => strtotime($_GPC['seffectivetime']),
					'stheendtime'    => strtotime($_GPC['stheendtime']),
					'note'           => trim($_GPC['note']),
					'code'           => $rAnd,
				);
				if(keep_sk77()){
				    $data['sellteaid'] = $_GPC['jsid'];
				}
				
				if(is_showap()){
					$new_chongzhi = $_GPC['stu_chongzhi'];
					$old_chongzhi = $item['chongzhi'];
					if($old_chongzhi != $new_chongzhi){ //修改了学生余额
						$change_chongzhi = $new_chongzhi - $old_chongzhi;

						$yuelogdata = array(
							'schoolid' => $schoolid,
							'weid' => $weid,
							'sid' => $id,
							'yue_type' => 2,
							'cost' => $change_chongzhi,
							//'ordertype' => 2,
							'cost_type' => 3,
							'createtime' => time(),
							'cztid' => intval($tid_global) >0 ? $tid_global : -1 
						);
						pdo_insert(GetTableName('yuecostlog',false),$yuelogdata);
					}
					$data['chongzhi'] = $new_chongzhi;
				}

				$check = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE s_name = :s_name And mobile = :mobile And schoolid = :schoolid", array(':s_name' => $_GPC['s_name'], ':mobile' => $_GPC['mobile'], ':schoolid' => $schoolid));
				if(empty($data['s_name'])){
					$this->imessage('请输入学生姓名！');
				}
				if(!empty($data['s_name'])){
					if(ischeckName($data['s_name']) == false){
						$this->imessage("禁止使用'测试、test'等作为学生姓名", referer(), 'error');
					}
				}				
			 
				if(empty($id)){
					if(!empty($check)){
						$this->imessage('录入失败，您输入的学生信息有重复，检查手机号和名字是否同时重复！');
					}
					pdo_insert($this->table_students, $data);
					$keysid = pdo_insertid();

					if(keep_Blacklist()){
						pdo_update(GetTableName('students',false),array('numberid'=>$keysid),array('id'=>$keysid));
					}
                    /* if(keep_wt() && CheckWtOn($schoolid)) {
                        mload()->model('wt');
                        //人员录入
                        $param['idcardNo'] = $keysid;
                        $param['name']     = $data['s_name'];
                        $result            = personAction($schoolid, $weid, time(), $param, 'insert');
                        if($result['result'] == '1'){
                            $guid =$result['data']['guid'];
                            pdo_update(GetTableName('students',false),array('guid'=>$guid),array('id'=>$keysid));
                            $result_device =  People2Device($schoolid, $weid, time(),$guid);
                            if($result_device['result'] == '1') {
                                $imgurl      = tomedia($data['icon']);
                                $result_face = PersonFace($schoolid, $weid, time(), $guid, $imgurl);
                                if ($result_face['result'] == '1') {
                                    pdo_update(GetTableName('students', false), array('photo_guid' => $result_face['data']['guid']), array('id' => $keysid));
                                }else{
                                    $back_msg = CheckWtReturnCode($result_face['code']);
                                }
                            }else{
                                $back_msg = CheckWtReturnCode($result_device['code']);
                            }
                        }else{
                            $back_msg = CheckWtReturnCode($result['code']);
                        }
                    } */

					if($logo['is_stuewcode'] ==1){
						if(empty($_GPC['icon'])){
							if(empty($logo['spic'])){
								$this->imessage('抱歉,本校开启了用户二维码功能,请上传学生头像或设置校园默认学生头像');
							}
						}
						load()->func('tpl');
						load()->func('file');
						$barcode = array(
							'expire_seconds' =>2592000,
							'action_name' => '',
							'action_info' => array(
								'scene' => array(
									'scene_id' => $keysid
								),
							),
						);
						$uniacccount = WeAccount::create($wwwweid);
						$barcode['action_name'] = 'QR_SCENE';
						$result = $uniacccount->barCodeCreateDisposable($barcode);
						if (is_error($result)) {
							message($result['message'], referer(), 'fail');
						}
						if (!is_error($result)) {
							$showurl = $this->createImageUrlCenterForUser("https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=" . $result['ticket'], $keysid, 0, $schoolid);
							$urlarr = explode('/',$showurl);
							$qrurls = "images/fm_jiaoyu/".$urlarr['4'];	
							$insert = array(
								'weid' => $weid, 
								'schoolid' => $schoolid,
								'qrcid' => $keysid, 
								'name' => '用户绑定临时二维码', 
								'model' => 1,
								'qr_url' => ltrim($result['url'],"http://weixin.qq.com/q/"),
								'ticket' => $result['ticket'], 
								'show_url' => $qrurls,
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
						}
					}					
					$temp1 = array(
						'keyid' => $keysid,
						'qrcode_id' => $qrid
					);
					pdo_update($this->table_students, $temp1, array('id' =>$keysid)); 
					
					if(!empty($_GPC['new'])){
						foreach($_GPC['new'] as $key => $v)
						{
							$datas  = array(
								'weid'           => $weid,
								'schoolid'       => $schoolid,
								's_name'         => trim($_GPC['s_name']),
								'icon'           => trim($_GPC['icon']),
								'sex'            => intval($_GPC['sex']),
								'bj_id'          => trim($_GPC['bj_new'][$key]),
								'xq_id'          => trim($_GPC['xueqi_new'][$key]),
								'numberid'       => trim($_GPC['numberid']),
								'keyid'          => $keysid,
								'qrcode_id'      => $qrid,
								'birthdate'      => strtotime($_GPC['birthdate']),
								'homephone'      => trim($_GPC['tel']),
								'mobile'         => trim($_GPC['mobile']),
								'area_addr'      => trim($_GPC['addr']),
								'seffectivetime' => strtotime($_GPC['seffectivetime']),
								'stheendtime'    => strtotime($_GPC['stheendtime']),
								'note'           => trim($_GPC['note']),
								'code'           => $rAnd,
							);
							pdo_insert($this->table_students, $datas);
						};
					}
				}else{
					$checkcard = pdo_fetch("SELECT * FROM " . tablename($this->table_idcard) . " WHERE sid = :sid", array(':sid' => $id));
					if($checkcard){
						pdo_update($this->table_idcard, array('bj_id' => trim($_GPC['bj'])), array('sid' => $id));
					}
					$data['numberid'] = $id;
					$data['keyid'] = $id;
					pdo_update($this->table_students, $data, array('id' => $id));
                    /* if(keep_wt() && CheckWtOn($schoolid)) {
                        mload()->model('wt');
                        //人员更新
                        $guid = pdo_fetch("SELECT guid,photo_guid FROM " . GetTableName('students') . " WHERE id = :id", array(':id' => $id));
                        $param['guid'] = $guid['guid'];
                        $param['idcardNo'] = $id;
                        $param['name'] = $data['s_name'];
                        $result = personAction($schoolid, $weid, time(), $param, 'update');
                        if($result['result'] == '1') {
                            $imgurl = tomedia($data['icon']);
                            //删除旧的
                            $Del_face = DeleteFace($schoolid, $weid, time(), $guid['guid'], $guid['photo_guid']);
                            //上传新的
                            $result_face = PersonFace($schoolid, $weid, time(), $guid['guid'], $imgurl);
                            if($result_face['result'] == '1') {
                                if ($result_face['result'] == '1') {
                                    pdo_update(GetTableName('students', false), array('photo_guid' => $result_face['data']['guid']), array('id' => $id));
                                }
                            }else{
                                $back_msg = CheckWtReturnCode($result_face['code']);
                            }

                        }else{
                            $back_msg = CheckWtReturnCode($result['code']);
                        }
                    } */

					$primary = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id=:sid And schoolid = :schoolid", array(':sid' => $id,':schoolid' => $schoolid));
					array_splice($primary,0,1);
					$before_sid_arr = pdo_fetchall("SELECT id FROM " . tablename($this->table_students) . " WHERE keyid=:keyid And schoolid = :schoolid", array(':keyid' => $id,':schoolid' => $schoolid));
					$LenOfBSid =  count($before_sid_arr,COUNT_NORMAL);
					if($LenOfBSid >1 && empty($_GPC['sid_before']))
					{
						foreach( $before_sid_arr as $key => $value )
						{
							if($value['id'] != $id )
							{
								//echo "删除的sid:".$value['id']."\n";
							pdo_delete($this->table_students,array('id' =>$value['id']));
							$checkUser = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " WHERE sid=:sid And schoolid = :schoolid", array(':sid' => $value['id'],':schoolid' => $schoolid));
							if($checkUser)
							{
								pdo_delete($this->table_user,array('sid' =>$value['id']));
									//echo "如果 user表里已绑定1，还要删除sid在user表里的数据\n";
							}	
							}
						}
					}
					if(!empty($_GPC['sid_before'])){
						if(in_array($_GPC['bj'],$_GPC['bj_before'] ))
						{
							$this->imessage('修改失败，修改后的班级有重复！');
						}
						
						$bj_before_arr = array();
						foreach( $_GPC['sid_before'] as $key => $value )
						{
							if(!empty($_GPC['new']))
						{
								if(in_array($_GPC['bj_before'][$key], $_GPC['bj_new'] ))
							{
								$this->imessage('修改失败，修改后的班级有重复！');
							}
						}
							$bj_before_arr[$value]['bj_id'] = $_GPC['bj_before'][$key];
							$bj_before_arr[$value]['xq_id'] = $_GPC['xueqi_before'][$key];
							
						}
						foreach( $before_sid_arr as $key => $value )
					{
						if(in_array($value['id'],$_GPC['sid_before']) )
						{
							$primaryThis = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id=:sid And schoolid = :schoolid", array(':sid' => $value['id'],':schoolid' => $schoolid));
							
							$primaryThis['bj_id'] = $bj_before_arr[$value['id']]['bj_id'];
							$primaryThis['xq_id'] = $bj_before_arr[$value['id']]['xq_id'];
							$primaryThis['s_name'] = trim($_GPC['s_name']);
							$primaryThis['icon'] = trim($_GPC['icon']);
							$primaryThis['sex'] = trim($_GPC['sex']);
							$primaryThis['numberid'] = trim($_GPC['numberid']);
							$primaryThis['birthdate'] = strtotime($_GPC['birthdate']);
							$primaryThis['homephone'] = trim($_GPC['tel']);
							$primaryThis['mobile'] = trim($_GPC['mobile']);
							$primaryThis['area_addr'] = trim($_GPC['addr']);
							$primaryThis['seffectivetime'] = strtotime($_GPC['seffectivetime']);
							$primaryThis['stheendtime'] = strtotime($_GPC['stheendtime']);
							$primaryThis['note'] = trim($_GPC['note']);
							$primaryThis['code'] = $rAnd;
							array_splice($primaryThis,0,1);
							//echo "修改的sid:".$value['id']."\n";
							
							pdo_update($this->table_students,$primaryThis,array('id'=>$value['id']));
							
						}elseif($value['id'] == $id){
							
							
						}else{
							//echo "删除的sid:".$value['id']."\n";
							pdo_delete($this->table_students,array('id' =>$value['id']));
							DeleteStudent($value['id']);
							$checkUser = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " WHERE sid=:sid And schoolid = :schoolid", array(':sid' => $value['id'],':schoolid' => $schoolid));
							if($checkUser)
							{
								pdo_delete($this->table_user,array('sid' =>$value['id']));
									//echo "如果 user表里已绑定1，还要删除sid在user表里的数据\n";
							}	
							
						}
						}
					}

					if(!empty($_GPC['new'])){
						if(in_array($_GPC['bj'], $_GPC['bj_new'] ))
						{
							$this->imessage('修改失败，修改后的班级有重复！');
						}
						foreach($_GPC['new'] as $key => $v)
						{
							$primary['bj_id'] = $_GPC['bj_new'][$key];
							$primary['xq_id'] = $_GPC['xueqi_new'][$key];
							pdo_insert($this->table_students, $primary);
							$newsid = pdo_insertid();
							//echo "新增的bjid:".$_GPC['bj_new'][$key]."\n";
							
							$CkUrKid =  pdo_fetchall("SELECT sid,tid,weid,schoolid,uid,openid,userinfo,pard,status,is_allowmsg,is_frist,createtime FROM " . tablename($this->table_user) . " WHERE sid=:sid And schoolid = :schoolid", array(':sid' => $primary['keyid'],':schoolid' => $schoolid));
							if(!empty($CkUrKid))
							{
								//var_dump($CkUrKid);
								foreach( $CkUrKid as $key => $value )
								{
									$value['sid'] = $newsid;
									pdo_insert($this->table_user,$value);
									$uu = pdo_insertid();
									if( $value['pard'] == 2 )
									{
										$tempFromUser = array(
										'muserid' => $uu
										);
										pdo_update($this->table_students,$tempFromUser,array('id'=>$newsid));
									}
									if( $value['pard'] == 3 )
									{
										$tempFromUser = array(
										'duserid' => $uu
										);
										pdo_update($this->table_students,$tempFromUser,array('id'=>$newsid));
									}
									if( $value['pard'] == 4 )
									{
										$tempFromUser = array(
										'ouserid' => $uu
										);
										pdo_update($this->table_students,$tempFromUser,array('id'=>$newsid));
									}
									if( $value['pard'] == 5 )
									{
										$tempFromUser = array(
										'otheruserid' => $uu
										);
										pdo_update($this->table_students,$tempFromUser,array('id'=>$newsid));
									}
									
									
								
								//echo "如果user表里keyid已绑定1，还要新增user表的数据\n";
								//var_dump($uu);
								}
								
							}
							//die();
						};
					}
				}
                $urlMsg = '操作学生信息成功！';
               /*  if(keep_wt()){
                    if(!empty($back_msg) && $back_msg != ''){
                        $urlMsg .= '<br/>附加信息：<br/>';
                        $urlMsg .= $back_msg;
                    }
                } */
				$this->imessage($urlMsg, $this->createWebUrl('students', array('op' => 'display', 'schoolid' => $schoolid)), 'success');
			}
		}elseif($operation == 'changebjdata'){
				$oldbjdata = pdo_fetchall("SELECT id,bj_id FROM " . tablename($this->table_students) . " WHERE weid = :weid And schoolid = :schoolid ORDER BY id DESC");
				foreach($oldbjdata as $index => $row){
					if($row['bj_id']){
						$data1 = array(
							'weid'     => $weid,
							'schoolid' => $schoolid,
							'sid'      => $row['id'],
							'bj_id'    => $row['bj_id'],
							'type'     => 2,
						);
						pdo_insert($this->table_class, $data1);
					}					
				}
				$this->imessage('操作成功', $this->createWebUrl('students', array('op' => 'display', 'schoolid' => $schoolid)), 'success');			
		}elseif($operation == 'display'){
			if (!(IsHasQx($tid_global,1000701,1,$schoolid))){
				$this->imessage('非法访问，您无权操作该页面','','error');	
			}
			$xueqi             = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = :weid And schoolid = :schoolid And type = :type ORDER BY ssort DESC", array(':weid' => $weid, ':type' => 'semester', ':schoolid' => $schoolid));			
			$allbj             = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = :weid And schoolid = :schoolid And type = :type ORDER BY ssort DESC", array(':weid' => $weid, ':type' => 'theclass', ':schoolid' => $schoolid));
			mload()->model('tea');
			$allkclist = GetAllClassInfoByTid($schoolid,2,$schooltype,$tid_global);
			$pindex    = max(1, intval($_GPC['page']));
			$psize     = 15;
			$condition = '';
			if(!empty($_GPC['keyword'])){
				$condition .= " And s_name LIKE '%{$_GPC['keyword']}%'";
			}
			if(!empty($_GPC['bd_type'])){
				if($_GPC['bd_type'] == 1){
					$condition .= " And (ouserid != 0 Or muserid != 0 Or duserid != 0 Or otheruserid != 0)";
				}
				if($_GPC['bd_type'] == 2){
					$condition .= " And ouserid = 0 And muserid = 0 And duserid = 0 And otheruserid = 0 ";
				}				
			}
			if($_GPC['status'] != -1){
				$condition .= " And status = '{$_GPC['status']}'";
			}
			if(!empty($_GPC['nj_id'])){
				$condition .= " And xq_id = '{$_GPC['nj_id']}'";
			}
			if(!empty($_GPC['s_type'])){
				$condition .= " And s_type = '{$_GPC['s_type']}'";
			}
			if(!empty($_GPC['bj_id'])){
				$condition .= " And bj_id = '{$_GPC['bj_id']}'";
			}
			if(!empty($_GPC['kc_id'])){
				$allbuysid = pdo_fetchall("SELECT distinct sid FROM ".tablename($this->table_order)." where kcid = '{$_GPC['kc_id']}' And type = 1 And status = 2 And sid != 0 ");
				$sidlist = '';
				foreach($allbuysid as $vas){
					$sidlist .= $vas['sid'].",";
				}
				$sidlist = rtrim($sidlist,',');
				$condition .= " AND FIND_IN_SET(id,'{$sidlist}') ";
			} 
			$checkbjold = pdo_fetch("SELECT * FROM " . tablename($this->table_class) . " WHERE schoolid = :schoolid And type = :type ", array(':schoolid' => $schoolid,':type' => 2));			
			//////////导出数据/////////////////
			if($_GPC['out_putcode'] == 'out_putcode'){
				$lists = pdo_fetchall("SELECT s_name,code,mobile,numberid,bj_id FROM " . tablename($this->table_students) . " WHERE weid = '{$weid}' And schoolid = '{$schoolid}' $condition ORDER BY id DESC");
				$ii   = 0;
				foreach($lists as $index => $row){
					$bj                = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " where sid = '{$row['bj_id']}'");
					$arr[$ii]['s_name'] = trim($row['s_name']);
					$arr[$ii]['code']  = $row['code'];
					$arr[$ii]['mobile']  = $row['mobile'];
					$arr[$ii]['numberid']  = $row['numberid'];
					$arr[$ii]['banji']  = $bj['sname'];
					$ii++;
				}
				$this->exportexcel($arr, array('学生', '绑定码', '报名预留手机号', '学号', '班级'), '学生绑定信息表');
				exit();
			}
			//////////////////////////导出学生班级信息//////////////////////////////////////
  			if($_GPC['out_BjExcel'] == 'out_BjExcel'){
				$lists = pdo_fetchall("SELECT id,s_name,code,mobile,numberid,bj_id FROM " . GetTableName('students') . " WHERE weid = '{$weid}' And schoolid = '{$schoolid}' $condition ORDER BY bj_id DESC");
				$ii   = 0;
				foreach($lists as $index => $row){
					$bj = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " where sid = '{$row['bj_id']}'");
					//$arr[$ii]['sid'] = $row['id'];
                    $arr[$ii]['numberid'] = $row['id'];
					$arr[$ii]['s_name'] = trim($row['s_name']);
					$arr[$ii]['banji']  = $bj['sname'];
					$arr[$ii]['newbanji']  = '';
					$arr[$ii]['oldnumberid']  = $row['numberid'];
					$ii++;
				}
				$this->exportexcel($arr, array('学生ID', '学生姓名', '原班级','新班级','原学号','新学号'), '学生绑定信息表');
				exit();
			}
			
			
			//////////////////////////导出学生信息/////////////////////////////////
			if($_GPC['excel_stuinfocard'] == 'excel_stuinfocard'){
			
				$listss = pdo_fetchall("SELECT * FROM " . tablename($this->table_students) . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}' ORDER BY id DESC");
				$ii   = 0;
				foreach($listss as $index => $row){
					$arr[$ii]['s_name'] = $row['s_name'];
					if($row['sex'] == 1){
						$arr[$ii]['sex'] = '男';
					}else{
						$arr[$ii]['sex'] = '女';
					}
					$infocard = json_decode($row['infocard'],true);
					$arr[$ii]['numberid'] = $row['idcard'];
					$this_bj = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " WHERE weid = '{$weid}' AND schoolid = '{$schoolid}'and sid = '{$row['bj_id']}'");
					
					
					$arr[$ii]['bj_name'] = $this_bj['sname'];
					$arr[$ii]['idcard'] = $infocard['IDcard'];
					$arr[$ii]['nation'] = $infocard['Nation'];
					$arr[$ii]['birthdate'] = date("Y-m-d",$row['birthdate']);
					$arr[$ii]['seffectivetime'] = date("Y-m-d",$row['seffectivetime']);
					$arr[$ii]['address'] = $row['area_addr'];
					$arr[$ii]['NowAddress'] = $infocard['NowAddress'];
					
					$arr[$ii]['HomeChild'] = $infocard['HomeChild']?'是':'否';
					$arr[$ii]['SingleFamily'] = $infocard['SingleFamily']?'是':'否';
					$arr[$ii]['IsKeep'] = $infocard['IsKeep']?'是':'否';
					if($infocard['DayOrWeek'] == 1){
						$arr[$ii]['IsKeep'] .= ' | 午托';
					}elseif($infocard['DayOrWeek'] == 2){
						$arr[$ii]['DayOrWeek']  .= ' | 周托';
					}
					$Finfo = '【学历】'.$infocard['Fxueli'].' 【职业】'.$infocard['Fwork'].' 【爱好】'.$infocard['Fhobby'].' 【工作单位】'.$infocard['FWorkPlace'];
					$Minfo = '【学历】'.$infocard['Mxueli'].' 【职业】'.$infocard['Mwork'].' 【爱好】'.$infocard['Mhobby'].' 【工作单位】'.$infocard['MWorkPlace'];
					$GrandFinfo = '【学历】'.$infocard['GrandFxueli'].' 【职业】'.$infocard['GrandFwork'].' 【爱好】'.$infocard['GrandFhobby'].' 【工作单位】'.$infocard['GrandFWorkPlace'];
					$GrandMinfo = '【学历】'.$infocard['GrandMxueli'].' 【职业】'.$infocard['GrandMwork'].' 【爱好】'.$infocard['GrandMhobby'].' 【工作单位】'.$infocard['GrandMWorkPlace'];
					$WGrandFinfo = '【学历】'.$infocard['WGrandFxueli'].' 【职业】'.$infocard['WGrandFwork'].' 【爱好】'.$infocard['WGrandFhobby'].' 【工作单位】'.$infocard['WGrandFWorkPlace'];
					$WGrandMinfo = '【学历】'.$infocard['WGrandMxueli'].' 【职业】'.$infocard['WGrandMwork'].' 【爱好】'.$infocard['WGrandMhobby'].' 【工作单位】'.$infocard['WGrandMWorkPlace'];
					$Otherinfo = '【学历】'.$infocard['Otherxueli'].' 【职业】'.$infocard['Otherwork'].' 【爱好】'.$infocard['Otherhobby'].' 【工作单位】'.$infocard['OtherWorkPlace'];
					$arr[$ii]['Finfo'] = $Finfo;
					$arr[$ii]['Minfo'] = $Minfo;
					$arr[$ii]['GrandFinfo'] = $GrandFinfo;
					$arr[$ii]['GrandMinfo'] = $GrandMinfo;
					$arr[$ii]['WGrandFinfo'] = $WGrandFinfo;
					$arr[$ii]['WGrandMinfo'] = $WGrandMinfo;
					$arr[$ii]['Otherinfo'] = $Otherinfo;
					
					$mainwatch = json_decode($infocard['MainWatcharr']);
					//var_dump($mainwatch);
					$watchmans = '';
					if(!empty($infocard['MainWatcharr']) && $infocard['MainWatcharr'] != 'null'){
						//var_dump($infocard['MainWatcharr']);
					
					 	foreach($mainwatch as $row){
							if($row == 1){
								$watchmans .=' 父亲 |';
							}
							if($row == 2){
								$watchmans .=' 母亲 |';
							}
							if($row == 3){
								$watchmans .=' 爷爷 |';
							}
							if($row == 4){
								$watchmans .=' 奶奶 |';
							}
							if($row == 5){
								$watchmans .=' 外公 |';
							}
							if($row == 6){
								$watchmans .=' 外婆 |';
							}
							if($row == 7){
								$watchmans .=' 其他 |';
							}
						}
						$watchmans = trim($watchmans,'|'); 
					}
					$arr[$ii]['watchmans'] = $watchmans;
					$arr[$ii]['Childhobby'] = $infocard['Childhobby'];
					$arr[$ii]['ChildWord'] = $infocard['ChildWord'];
					$arr[$ii]['SchoolWord'] = $infocard['SchoolWord'];

					$ii++;
				}
				$this->exportexcel($arr, array('姓名','性别','学号','班级','身份证','民族','出生年月','入学时间','家庭住址','现住址','是否留守儿童','是否单亲家庭','是否托管','父亲','母亲','爷爷','奶奶','外公','外婆','其他','监护人','孩子爱好','对孩子的期望','对学校的期望'), '学生详细信息');
                exit();
			}
			
			
			
			
			
			
			
			
			////////////////////////////////
			$category = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " WHERE weid = :weid And schoolid = :schoolid ORDER BY sid ASC, ssort DESC", array(':weid' => $weid, ':schoolid' => $schoolid), 'sid');
			$list = pdo_fetchall("SELECT * FROM " . tablename($this->table_students) . " WHERE weid = '{$weid}' And schoolid = '{$schoolid}' $condition ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize);
			$listAfter = array();
			$ybdxs = 0;
			$chong = 0;
			foreach($list as $key => $value){
			
				if($value['ouid'] || $value['ouserid']){
					$ybdxs ++;
				}
				if($value['muid'] || $value['muserid']){
					$ybdxs ++;
				}
				if($value['duid'] || $value['duserid']){
					$ybdxs ++;
				}
				if($value['otheruid'] || $value['otheruserid']){
					$ybdxs ++;
				}	
                if(!empty($value['sellteaid'])){
                    $list[$key]['sellteaname'] = pdo_fetch("SELECT tname FROM " . tablename($this->table_teachers) . " where id = '{$value['sellteaid']}'")['tname'];
                }
				$member1 = array();
				$member2 = array();
				$member3 = array();
				$member4 = array();
				$user1=  pdo_fetch("SELECT pard,openid,status FROM " . tablename($this->table_user) . " where  weid = :weid And  schoolid = :schoolid And sid = :sid And pard = :pard ", array(':pard' =>4, ':weid' => $weid, ':schoolid' => $schoolid,'sid'=>$value['id']));
				$fans_info1 = mc_fansinfo($user1['openid']);
				$member1['nickname'] = $fans_info1['nickname'];
				$member1['avatar']	 = $fans_info1['headimgurl'];
				$user2=  pdo_fetch("SELECT pard,openid FROM " . tablename($this->table_user) . " where  weid = :weid And  schoolid = :schoolid And sid = :sid And pard = :pard ", array(':pard' =>2, ':weid' => $weid, ':schoolid' => $schoolid,'sid'=>$value['id']));
				$fans_info2 = mc_fansinfo($user2['openid']);
				$member2['nickname'] = $fans_info2['nickname'];
				$member2['avatar']	 = $fans_info2['headimgurl'];
				$user3=  pdo_fetch("SELECT pard,openid FROM " . tablename($this->table_user) . " where  weid = :weid And  schoolid = :schoolid And sid = :sid And pard = :pard ", array(':pard' =>3, ':weid' => $weid, ':schoolid' => $schoolid,'sid'=>$value['id']));
				$fans_info3 = mc_fansinfo($user3['openid']);
				$member3['nickname'] = $fans_info3['nickname'];
				$member3['avatar']	 = $fans_info3['headimgurl'];
				$user4=  pdo_fetch("SELECT pard,openid FROM " . tablename($this->table_user) . " where  weid = :weid And  schoolid = :schoolid And sid = :sid And pard = :pard ", array(':pard' =>5, ':weid' => $weid, ':schoolid' => $schoolid,'sid'=>$value['id']));
				$fans_info4 = mc_fansinfo($user4['openid']);
				$member4['nickname'] = $fans_info4['nickname'];
				$member4['avatar']	 = $fans_info4['headimgurl'];
				$bj      = pdo_fetch("SELECT sname FROM " . tablename($this->table_classify) . " where sid = '{$row['bj_id']}'");
				$bmorder = pdo_fetchall("SELECT DISTINCT kcid FROM " . tablename($this->table_order) . " where sid = '{$value['id']}' And type =1 And status = 2 ");
				$temporder = array();
				$mutikc = [];
				foreach( $bmorder as $key1 => $value1 )
				{
					$kc = pdo_fetch("SELECT name FROM " . tablename($this->table_tcourse) . " where id = '{$value1['kcid']}'");
					$buycourse = pdo_fetchcolumn("SELECT ksnum FROM " . tablename($this->table_coursebuy) . " WHERE sid = :sid And kcid=:kcid And  schoolid =:schoolid", array(':sid' => $value['id'],':kcid'=> $value1['kcid'],':schoolid'=> $schoolid));
					$hasSign =  pdo_fetchcolumn("SELECT sum(costnum) FROM " . tablename($this->table_kcsign) . " WHERE sid = :sid And kcid=:kcid And  schoolid =:schoolid and status = 2 ", array(':sid' =>  $value['id'],':kcid'=> $value1['kcid'],':schoolid'=> $schoolid));
					$rest = $buycourse - $hasSign; 
					$temporder[]= $kc['name']."【剩余".$rest."课时】";

					if(keep_mutikc()){
						$freeks = pdo_fetch("SELECT ksnum FROM ".GetTableName('freekslog')." WHERE sid = '{$value['id']}' AND kcid='{$value1['kcid']}' ");
						$mutikc[$key1]['kcname'] = $kc['name'];
						$mutikc[$key1]['allks'] = $buycourse ? $buycourse : 0; //总课时
						$mutikc[$key1]['hasSign'] = $hasSign ? $hasSign : 0; //已用课时
						$mutikc[$key1]['freeks'] = $freeks['ksnum']; //赠送课时
						$mutikc[$key1]['kcid'] = $value1['kcid']; //赠送课时
					}
				}
				if(keep_mutikc()){
					$list[$key]['mutikc'] = $mutikc;
				}
				$list[$key]['bmkc'] = $temporder;
				$list[$key]['status'] = $user1['status'];
				$list[$key]['onickname']     = $member1['nickname'];
				$list[$key]['oavatar']       = $member1['avatar'];
				$list[$key]['mnickname']     = $member2['nickname'];
				$list[$key]['mavatar']       = $member2['avatar'];
				$list[$key]['dnickname']     = $member3['nickname'];
				$list[$key]['davatar']       = $member3['avatar'];
				$list[$key]['othernickname'] = $member4['nickname'];
				$list[$key]['otheravatar']   = $member4['avatar'];				
				if($value['keyid'] != 0 ){
					$list[$key]['allbj'] = pdo_fetchall("SELECT bj_id,xq_id FROM " . tablename($this->table_students) . " where keyid = :keyid And schoolid = :schoolid  ORDER BY id ASC", array(':keyid' =>$value['keyid'], ':schoolid' => $schoolid));
				}
				if($value['qrcode_id']){
					$qrimg = pdo_fetch("SELECT id,show_url,expire,subnum,qrcid FROM " . tablename($this->table_qrinfo) . " where  id = '{$value['qrcode_id']}' ");
					$list[$key]['img_qr'] = tomedia($qrimg['show_url']);
					$list[$key]['qrcid'] = $qrimg['qrcid'];
					$list[$key]['subnum'] = $qrimg['subnum'];
					$list[$key]['overtime'] = true;
					if($qrimg['expire'] < time()){
						$list[$key]['overtime'] = false;
					}else{
						$list[$key]['restday'] = floor(($qrimg['expire'] - time())/86400);
					}
				}

				if(!empty($value['roomid'])){
				    $roominfo = pdo_fetch("SELECT name,apid FROM " . tablename($this->table_aproom) . " where  id = '{$value['roomid']}' ");
                    $list[$key]['roomname'] = $roominfo['name'];
                    $apinfo = pdo_fetch("SELECT name FROM " . tablename($this->table_apartment) . " where  id = '{$roominfo['apid']}' ");
                    $list[$key]['apname'] = $apinfo['name'];
                }


			}
			if (empty($_GPC['bj_id']) && empty($_GPC['bd_type']) && empty($_GPC['nj_id'])){
				$to1 = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename($this->table_students) . " WHERE weid = '{$weid}' And schoolid = '{$schoolid}' And keyid = 0 ");
				$to2 = pdo_fetchcolumn('SELECT COUNT(DISTINCT keyid) FROM ' . tablename($this->table_students) . " WHERE weid = '{$weid}' And schoolid = '{$schoolid}' And keyid != 0 ");
				$totalsss = $to1 + $to2;
			}
			$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename($this->table_students) . " WHERE weid = '{$weid}' And schoolid = '{$schoolid}' $condition");
			$pager = pagination($total, $pindex, $psize);
			$starttime = mktime(0,0,0,date("m"),date("d"),date("Y"));
			$endtime = $starttime + 86399;
			$zrstarttime = $starttime - 86399;
			$conditions = " And createtime > '{$starttime}' And createtime < '{$endtime}'";
			$conditionss = " And createtime > '{$zrstarttime}' And createtime < '{$starttime}'";
			$jrbd  = pdo_fetchcolumn("select count(*) FROM ".tablename($this->table_user)." WHERE schoolid = '{$schoolid}' And weid = '{$weid}'  $conditions ");
			$zrbd  = pdo_fetchcolumn("select count(*) FROM ".tablename($this->table_user)." WHERE schoolid = '{$schoolid}' And tid = 0 $conditionss ");			
		}elseif($operation == 'delete'){
			$id  = intval($_GPC['id']);
			$row = pdo_fetch("SELECT * FROM " .GetTableName('students'). " WHERE id = :id", array(':id' => $id));

			if(empty($row)){
				$this->imessage('抱歉，学生不存在或是已经被删除！');
			}


			$sid_arr = pdo_fetchall("SELECT id FROM " . tablename($this->table_students) . " WHERE keyid = :keyid", array(':keyid' =>$id));
				
				if(!empty($sid_arr)){
					foreach($sid_arr as $key => $value)	{
						$rowloop = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id = :id", array(':id' => $value['id']));
						if(!empty($rowloop))
						{
							pdo_delete($this->table_students, array('id' => $value['id'], 'schoolid' => $schoolid));
							
							DeleteStudent($value['id']);
							if(!empty($rowloop['otheruserid'])){
								pdo_delete($this->table_user, array('id' => $rowloop['otheruserid']));
							}else{
								pdo_delete($this->table_user, array('sid' => $value['id']));
							}
							if(!empty($rowloop['ouserid'])){
								pdo_delete($this->table_user, array('id' => $rowloop['ouserid']));
							}else{
								pdo_delete($this->table_user, array('sid' => $value['id']));
							}
							if(!empty($rowloop['muserid'])){
								pdo_delete($this->table_user, array('id' => $rowloop['muserid']));
							}else{
								pdo_delete($this->table_user, array('sid' => $value['id']));
							}
							if(!empty($rowloop['duserid'])){
								pdo_delete($this->table_user, array('id' => $rowloop['duserid']));
							}else{
								pdo_delete($this->table_user, array('sid' => $value['id']));
							}
						}
					}
				}else{
					pdo_delete($this->table_students, array('id' => $id, 'schoolid' => $schoolid));
					DeleteStudent($id);
					if(!empty($row['otheruserid'])){
						pdo_delete($this->table_user, array('id' => $row['otheruserid']));
					}else{
						pdo_delete($this->table_user, array('sid' => $id));
					}
					if(!empty($row['ouserid'])){
						pdo_delete($this->table_user, array('id' => $row['ouserid']));
					}else{
						pdo_delete($this->table_user, array('sid' => $id));
					}
					if(!empty($row['muserid'])){
						pdo_delete($this->table_user, array('id' => $row['muserid']));
					}else{
						pdo_delete($this->table_user, array('sid' => $id));
					}
					if(!empty($row['duserid'])){
						pdo_delete($this->table_user, array('id' => $row['duserid']));
					}else{
						pdo_delete($this->table_user, array('sid' => $id));
					}
				}
			if($row['qrcode_id']){
				pdo_delete($this->table_qrinfo, array('id' => $id));
			}
            /* if(keep_wt() && CheckWtOn($schoolid)) {
                mload()->model('wt');
                //人员删除
                $param['guid'] = $row['guid'];
                $result = personAction($schoolid, $weid, time(), $param, 'delete');
                if($result['result'] != '1'){
                    $back_msg = CheckWtReturnCode($result['code']);
                }
            } */
            $urlMsg = '删除成功！';
           /*  if(keep_wt()){
                if(!empty($back_msg) && $back_msg != ''){
                    $urlMsg .= '<br/>附加信息：<br/>';
                    $urlMsg .= $back_msg;
                }
            } */
			$this->imessage('删除成功！', referer(), 'success');
		}elseif($operation == 'own'){
			$id     = intval($_GPC['id']);
			$openid = $_GPC['openid'];
			$row    = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id = :id", array(':id' => $id));
			if($row['keyid'] != 0)
			{
				$sid_arr = pdo_fetchall("SELECT id FROM " . tablename($this->table_students) . " WHERE keyid = :keyid", array(':keyid' =>$id));
			}
			if(empty($row)){
					$this->imessage('抱歉，学生不存在或是已经被删除！');
					}
					$temp = array(
						'own'     => 0,
						'ouserid' => 0,
						'ouid'    => 0
					);
					if(!empty($row['ouserid'])){
						pdo_delete($this->table_user, array('id' => $row['ouserid']));
					}else{
						pdo_delete($this->table_user, array('sid' => $id, 'openid' => $openid, 'uid' => $row['ouid'], 'tid' => 0, 'pard' => 4));
					}
					pdo_update($this->table_students, $temp, array('id' => $id));
			if(!empty($sid_arr))
			{
				foreach( $sid_arr as $key => $value )
				{
					$rowloop    = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id = :id", array(':id' => $value['id']));
					
					$temploop = array(
						'own'     => 0,
						'ouserid' => 0,
						'ouid'    => 0
					);
					if(!empty($rowloop['ouserid'])){
						pdo_delete($this->table_user, array('id' => $rowloop['ouserid']));
					}else{
						pdo_delete($this->table_user, array('sid' => $value['id'], 'openid' => $openid, 'uid' => $rowloop['ouid'], 'tid' => 0, 'pard' => 4));
					}
					pdo_update($this->table_students, $temploop, array('id' => $value['id']));
				}
			}
			$this->imessage('解绑成功！', referer(), 'success');
		}elseif($operation == 'mom'){
			$id     = intval($_GPC['id']);
			$openid = $_GPC['openid'];
			$row    = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id = :id", array(':id' => $id));
			if($row['keyid'] != 0)
			{
				$sid_arr = pdo_fetchall("SELECT id FROM " . tablename($this->table_students) . " WHERE keyid = :keyid", array(':keyid' =>$id));
			}
			if(empty($row)){
				$this->imessage('抱歉，学生不存在或是已经被删除！');
			}
			$temp = array(
				'mom'     => 0,
				'muserid' => 0,
				'muid'    => 0
			);
			if(!empty($row['muserid'])){
				pdo_delete($this->table_user, array('id' => $row['muserid']));
			}else{
				pdo_delete($this->table_user, array('sid' => $id, 'openid' => $openid, 'uid' => $row['muid'], 'tid' => 0, 'pard' => 2));
			}
			pdo_update($this->table_students, $temp, array('id' => $id));
			if(!empty($sid_arr)) //多班级解绑
			{
				foreach( $sid_arr as $key => $value )
				{
					$rowloop    = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id = :id", array(':id' => $value['id']));
					$temploop = array(
						'mom'     => 0,
						'muserid' => 0,
						'muid'    => 0
					);
					if(!empty($rowloop['muserid'])){
						pdo_delete($this->table_user, array('id' => $rowloop['muserid']));
					}else{
						pdo_delete($this->table_user, array('sid' => $value['id'], 'openid' => $openid, 'uid' => $rowloop['muid'], 'tid' => 0, 'pard' => 2));
					}
					pdo_update($this->table_students, $temploop, array('id' => $value['id']));
				}
			}
			$this->imessage('解绑成功！', referer(), 'success');
		}elseif($operation == 'fixavatar'){
				$frommembers   = pdo_fetchall("SELECT uid,avatar FROM " . tablename("mc_members")."where avatar LIKE '%/132132' ");
				
				foreach( $frommembers as $key => $value )
				{
					$temp_avatar = substr_replace($value['avatar'],"/132",-7);
					$data= array(
					'avatar' => $temp_avatar
					);
					pdo_update("mc_members", $data, array('uid' => $value['uid']));

				}
				$count = count($frommembers);
				$this->imessage('修复成功！', referer(), 'success');
				

			
		}elseif($operation == 'dad'){
			$id     = intval($_GPC['id']);
			$openid = $_GPC['openid'];
			$row    = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id = :id", array(':id' => $id));
			if($row['keyid'] != 0)
			{
				$sid_arr = pdo_fetchall("SELECT id FROM " . tablename($this->table_students) . " WHERE keyid = :keyid", array(':keyid' =>$row['keyid']));
			}
		
			if(empty($row)){
				$this->imessage('抱歉，学生不存在或是已经被删除！');
			}
			$temp = array(
				'dad'     => 0,
				'duserid' => 0,
				'duid'    => 0
			);
			if(!empty($row['duserid'])){
				pdo_delete($this->table_user, array('id' => $row['duserid']));
			}else{
				pdo_delete($this->table_user, array('sid' => $id, 'openid' => $openid, 'uid' => $row['duid'], 'tid' => 0, 'pard' => 3));
			}
			pdo_update($this->table_students, $temp, array('id' => $id));
			if(!empty($sid_arr))
			{
				foreach( $sid_arr as $key => $value )
				{
					$rowloop    = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id = :id", array(':id' => $value['id']));
					$temploop = array(
						'dad'     => 0,
						'duserid' => 0,
						'duid'    => 0
					);
					if(!empty($rowloop['duserid'])){
						pdo_delete($this->table_user, array('id' => $rowloop['duserid']));
						
					}else{
						pdo_delete($this->table_user, array('sid' =>  $value['id'], 'openid' => $openid, 'uid' => $rowloop['duid'], 'tid' => 0, 'pard' => 3));
						
					}
					pdo_update($this->table_students, $temploop, array('id' =>  $value['id']));
				}
			}
			
			$this->imessage('解绑成功！', referer(), 'success');
		}elseif($operation == 'other'){
			$id     = intval($_GPC['id']);
			$openid = $_GPC['openid'];
			$row    = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id = :id", array(':id' => $id));
			if($row['keyid'] != 0)
			{
				$sid_arr = pdo_fetchall("SELECT id FROM " . tablename($this->table_students) . " WHERE keyid = :keyid", array(':keyid' =>$id)); 
			}
			if(empty($row)){
				$this->imessage('抱歉，学生不存在或是已经被删除！');
			}
			$temp = array(
				'other'       => 0,
				'otheruserid' => 0,
				'otheruid'    => 0
			);
			if(!empty($row['otheruserid'])){
				pdo_delete($this->table_user, array('id' => $row['otheruserid']));
			}else{
				pdo_delete($this->table_user, array('sid' => $id, 'openid' => $openid, 'uid' => $row['duid'], 'tid' => 0, 'pard' => 5));
			}
			pdo_update($this->table_students, $temp, array('id' => $id));
			if(!empty($sid_arr))
			{
				foreach( $sid_arr as $key => $value )
				{
					$rowloop    = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id = :id", array(':id' => $value['id']));
					$temploop = array(
						'other'       => 0,
						'otheruserid' => 0,
						'otheruid'    => 0
					);
					if(!empty($rowloop['otheruserid'])){
						pdo_delete($this->table_user, array('id' => $rowloop['otheruserid']));
					}else{
						pdo_delete($this->table_user, array('sid' => $value['id'], 'openid' => $openid, 'uid' => $rowloop['duid'], 'tid' => 0, 'pard' => 5));
					}
					pdo_update($this->table_students, $temploop, array('id' => $value['id']));
				}
			}
			$this->imessage('解绑成功！', referer(), 'success');
		}elseif($operation == 'makecode'){
			$nocode = pdo_fetchall("SELECT id,code FROM " . tablename($this->table_students) . " WHERE schoolid = :schoolid ", array(':schoolid' => $schoolid));
			if($nocode){
				$notrowcount = 0;
				foreach($nocode as $k => $row){
					if(empty($row['code'])){
						$rAndStr = str_shuffle('123456789');
						$rAnd    = substr($rAndStr, 0, 6);
						$data = array(
							'code'     => $rAnd
						);					
						pdo_update($this->table_students, $data, array('id' => $row['id']));
						$notrowcount++;
					}
				}
				$this->imessage('操作成功,共为'.$notrowcount.'个学生生成了绑定码！', $this->createWebUrl('students', array('op' => 'display', 'schoolid' => $schoolid)), 'success');
			}else{
				$this->imessage('本校学生全部已生成绑定码，无需重复操作！', '', 'error');
			}
		}elseif($operation == 'makeallqr'){
			if(empty($logo['spic'])){
				$this->imessage('抱歉,本校开启了用户二维码功能,请设置校园默认学生头像');
			}			
			$notrowcount = 0;
			$gqeqrcount = 0;
			foreach($_GPC['idArr'] as $k => $id){
				load()->func('tpl');
				load()->func('file');
				$id = intval($id);
				$row = pdo_fetch("SELECT id,qrcode_id,keyid FROM " . tablename($this->table_students) . " WHERE id = '{$id}'");
				if($row['keyid'] == 0){
					if(!empty($row['qrcode_id'])){
						$qrinfo = pdo_fetch("SELECT id,expire,qrcid FROM " . tablename($this->table_qrinfo) . " WHERE weid = '{$weid}' And id = '{$row['qrcode_id']}' ");
						if(time() > $qrinfo['expire'] || $qrinfo['qrcid'] != $row['id']){
							$barcode = array(
								'expire_seconds' =>2592000 ,
								'action_name' => '',
								'action_info' => array(
												'scene' => array(
														'scene_id' => $row['id']
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
								$showurl = $this->createImageUrlCenterForUser("https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=" . $result['ticket'], $row ['id'], 0, $schoolid);
								$urlarr = explode('/',$showurl);
								$qrurls = "images/fm_jiaoyu/".$urlarr['4'];	
								$insert = array(
									'show_url' => $qrurls,
									'qrcid'   => $row['id'],
									'ticket' => $result['ticket'],
									'qr_url' => ltrim($result['url'],"http://weixin.qq.com/q/"),
									'expire' => $result['expire_seconds'] + time(), 
									'createtime' => time(),
								);
								pdo_update($this->table_qrinfo, $insert, array('id' =>$qrinfo ['id']));	
								$qrurl = pdo_fetch("SELECT show_url FROM " . tablename($this->table_qrinfo) . " WHERE id = '{$qrinfo ['id']}'");
								if (!empty($_W['setting']['remote']['type'])) {
									$remotestatus = file_remote_upload($qrurl['show_url']);
										if (is_error($remotestatus)) {
											message('远程附件上传失败，'.$qrurl['show_url'].'请检查配置并重新上传');
										}
								}
								$gqeqrcount++;
							}								
						}								
					}else{
						$barcode = array(
							'expire_seconds' =>2592000,
							'action_name' => '',
							'action_info' => array(
								'scene' => array(
									'scene_id' => $row['id']
								),
							),
						);
						$uniacccount = WeAccount::create($wwwweid);
						$barcode['action_name'] = 'QR_SCENE';
						$result = $uniacccount->barCodeCreateDisposable($barcode);
						if (is_error($result)) {
							message($result['message'], referer(), 'fail');
						}
						if (!is_error($result)) {
							$showurl = $this->createImageUrlCenterForUser("https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=" . $result['ticket'], $row['id'], 0, $schoolid);
							$urlarr = explode('/',$showurl);
							$qrurls = "images/fm_jiaoyu/".$urlarr['4'];	
							$insert = array(
								'weid' => $_W['uniacid'], 
								'schoolid' => $schoolid,
								'qrcid' => $row['id'], 
								'name' => '用户绑定临时二维码', 
								'model' => 1,
								'qr_url' => ltrim($result['url'],"http://weixin.qq.com/q/"),
								'ticket' => $result['ticket'], 
								'show_url' => $qrurls,
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
						}								
						pdo_update($this->table_students, array('qrcode_id' => $qrid), array('id' => $row['id']));
						$notrowcount++;
					}							
				}
				if($row['id'] == $row['keyid']){
					if(!empty($row['qrcode_id'])){
						$qrinfo = pdo_fetch("SELECT id,expire,qrcid FROM " . tablename($this->table_qrinfo) . " WHERE weid = '{$weid}' And id = '{$row['qrcode_id']}' ");
						if(time() > $qrinfo['expire'] || $qrinfo['qrcid'] != $row['id']){
							$barcode = array(
								'expire_seconds' =>2592000 ,
								'action_name' => '',
								'action_info' => array(
												'scene' => array(
														'scene_id' => $row['id']
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
								$showurl = $this->createImageUrlCenterForUser("https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=" . $result['ticket'], $row ['id'], 0, $schoolid);
								$urlarr = explode('/',$showurl);
								$qrurls = "images/fm_jiaoyu/".$urlarr['4'];	
								$insert = array(
									'show_url' => $qrurls,
									'qrcid' => $row['id'],
									'ticket' => $result['ticket'],
									'qr_url' => ltrim($result['url'],"http://weixin.qq.com/q/"),
									'expire' => $result['expire_seconds'] + time(), 
									'createtime' => time(),
								);
								pdo_update($this->table_qrinfo, $insert, array('id' =>$qrinfo ['id']));	
								$qrurl = pdo_fetch("SELECT show_url FROM " . tablename($this->table_qrinfo) . " WHERE id = '{$qrinfo ['id']}'");
								if (!empty($_W['setting']['remote']['type'])) {
									$remotestatus = file_remote_upload($qrurl['show_url']);
										if (is_error($remotestatus)) {
											message('远程附件上传失败，'.$qrurl['show_url'].'请检查配置并重新上传');
										}
								}
								$gqeqrcount++;
							}								
						}								
					}else{
						$barcode = array(
							'expire_seconds' =>2592000,
							'action_name' => '',
							'action_info' => array(
								'scene' => array(
									'scene_id' => $row['id']
								),
							),
						);
						$uniacccount = WeAccount::create($wwwweid);
						$barcode['action_name'] = 'QR_SCENE';
						$result = $uniacccount->barCodeCreateDisposable($barcode);
						if (is_error($result)) {
							message($result['message'], referer(), 'fail');
						}
						if (!is_error($result)) {
							$showurl = $this->createImageUrlCenterForUser("https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=" . $result['ticket'], $row['id'], 0, $schoolid);
							$urlarr = explode('/',$showurl);
							$qrurls = "images/fm_jiaoyu/".$urlarr['4'];	
							$insert = array(
								'weid' => $_W['uniacid'], 
								'schoolid' => $schoolid,
								'qrcid' => $row['id'], 
								'name' => '用户绑定临时二维码', 
								'model' => 1,
								'qr_url' => ltrim($result['url'],"http://weixin.qq.com/q/"),
								'ticket' => $result['ticket'], 
								'show_url' => $qrurls,
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
						}								
						pdo_update($this->table_students, array('qrcode_id' => $qrid), array('id' => $row['id']));
						$notrowcount++;
					}
				}			
			}
			$message = "操作成功,共为{$notrowcount}个学生生成了二维码,清理过期二维码并重新生成{$gqeqrcount}个！";
			$data ['result'] = true;
			$data ['msg'] = $message;				
			die (json_encode($data));			
		}elseif($operation == 'deleteall'){
			$rowcount    = 0;
			$notrowcount = 0;
			foreach($_GPC['idArr'] as $k => $id){
				$id = intval($id);
				if(!empty($id)){
					$goods = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id = :id", array(':id' => $id));
					if(!empty($goods['mom'])){

						$message = '批量删除失败，学生' . $goods['s_name'] . '母亲微信未解绑！';

						die (json_encode(array(
							'result' => false,
							'msg'    => $message
						)));
					}
					if(!empty($goods['dad'])){

						$message = '批量删除失败，学生' . $goods['s_name'] . '父亲微信未解绑！';

						die (json_encode(array(
							'result' => false,
							'msg'    => $message
						)));
					}
					if(!empty($goods['own'])){

						$message = '批量删除失败，学生' . $goods['s_name'] . '本人微信未解绑！';

						die (json_encode(array(
							'result' => false,
							'msg'    => $message
						)));
					}
					if(!empty($goods['other'])){

						$message = '批量删除失败，学生' . $goods['s_name'] . '家长微信未解绑！';

						die (json_encode(array(
							'result' => false,
							'msg'    => $message
						)));
					}					
					if(empty($goods)){
						$notrowcount++;
						continue;
					}
					if($goods['qrcode_id']){
						pdo_delete($this->table_qrinfo, array('qrcid' => $goods['qrcode_id']));
					}
					$sid_arr = pdo_fetchall("SELECT id FROM " . tablename($this->table_students) . " WHERE keyid = :keyid", array(':keyid' =>$id));
					pdo_delete($this->table_students, array('id' => $id, 'schoolid' => $schoolid));
					pdo_delete($this->table_students, array('keyid' =>$id, 'schoolid' => $schoolid));

                   /*  if(keep_wt() && CheckWtOn($schoolid)) {
                        mload()->model('wt');
                        //人员删除
                        $param['guid'] = $goods['guid'];
                        personAction($schoolid, $weid, time(), $param, 'delete');
                    } */


					if(!empty($sid_arr)){
						foreach($sid_arr as $key => $value)
						{
							DeleteStudent($value['id']);
						}
					} 
					$rowcount++;
				}
			}
			$message = "操作成功！共删除{$rowcount}条数据,{$notrowcount}条数据不能删除!";
			$data ['result'] = true;
			$data ['msg'] = $message;
			die (json_encode($data));
		}elseif($operation == 'add_bj'){  //批量增加班级
			$rowcount    = 0;
			$notrowcount = 0;
			$bj_id = intval($_GPC['bj_id']);
			$xueqi = pdo_fetch("SELECT parentid FROM " . tablename($this->table_classify) . " WHERE sid = :sid", array(':sid' => $bj_id));

				
			if(!empty($xueqi)){
				foreach($_GPC['idArr'] as $k => $id){
					$id = intval($id);
					if(!empty($id)){
						$goods = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id = :id", array(':id' => $id));				
						if(empty($goods)){
							$notrowcount++;
							continue;
						}
						if($goods['keyid'] == 0 )
						{
							pdo_update($this->table_students, array('keyid'=>$id), array('id' => $id));
						}
						$userOld = 	pdo_fetchall("SELECT sid,tid,weid,schoolid,uid,openid,userinfo,pard,status,is_allowmsg,is_frist,createtime FROM " . tablename($this->table_user) . " WHERE sid = :sid", array(':sid' => $id));
						$stuOld =  pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id = :id", array(':id' => $id));				
						$allbj =  pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE keyid = :keyid And bj_id = :bj_id", array(':keyid' => $stuOld['keyid'],':bj_id'=>$bj_id));
						
						if($allbj )
						{
							
							$notrowcount++ ;
							
							
							continue;
						}
							
							
							
									
						array_splice($stuOld,0,1);
						$stuOld['bj_id'] = $bj_id;
						$stuOld['xq_id'] = $xueqi['parentid'];
						pdo_insert($this->table_students,$stuOld);
						$newsid = pdo_insertid();
						foreach( $userOld as $key => $value )
						{
							$value['sid'] = $newsid;
							pdo_insert($this->table_user,$value);
						}
						$rowcount++;
					}
				}

				
				$data ['result'] = true;
				$message = "操作成功！共{$rowcount}个学生新增了班级,{$notrowcount}个学生不能新增!";
			}else{
				$data ['result'] = false;
				$message = "操作失败，你选择的班级无归属年级，请前往基本设置班级管理设置!";
			}
			$data ['msg'] = $message;
			die (json_encode($data));
		}elseif($operation == 'userinfo'){
			$alluser = pdo_fetchall("SELECT id,userinfo,realname,mobile FROM " . tablename('wx_school_user') . " WHERE schoolid != 0 ");
			foreach($alluser as $row){
				if(!empty($row['userinfo'])){
					$userinfo = iunserializer($row['userinfo']);
					$userdata = array();
					if(!empty($userinfo['name']) && empty($row['realname'])){
						$userdata['realname'] = $userinfo['name'];
					}
					if(!empty($userinfo['mobile']) && empty($row['mobile'])){
						$userdata['mobile'] = $userinfo['mobile'];
					}
					if(!empty($row['userinfo']) && (empty($row['realname']) || empty($row['mobile']))){
						pdo_update(GetTableName('user',false), $userdata, array('id' => $row['id']));
					}
				}
			}
			$this->imessage($message, $this->createWebUrl('students', array('op' => 'display', 'schoolid' => $schoolid)), 'success');
		}elseif($operation == 'change_bj'){
			$rowcount    = 0;
			$notrowcount = 0;
			$bj_id = intval($_GPC['bj_id']);
			$xueqi = pdo_fetch("SELECT parentid FROM " . tablename($this->table_classify) . " WHERE sid = :sid", array(':sid' => $bj_id));	
			if(!empty($xueqi)){
				foreach($_GPC['idArr'] as $k => $id){
					$id = intval($id);
					if(!empty($id)){
						$checkcard = pdo_fetch("SELECT * FROM " . tablename($this->table_idcard) . " WHERE sid = :sid", array(':sid' => $id));
						if($checkcard){
							pdo_update($this->table_idcard, array('bj_id' => $bj_id), array('sid' => $id));
						}						
						$goods = pdo_fetch("SELECT id FROM " . tablename($this->table_students) . " WHERE id = :id", array(':id' => $id));					
						if(empty($goods)){
							$notrowcount++;
							continue;
						}
						pdo_update($this->table_students, array('bj_id' => $bj_id,'xq_id' => $xueqi['parentid']), array('id' => $id));
						$rowcount++;
					}
				}
				$data ['result'] = true;
				$message = "操作成功！共转移{$rowcount}个学生,{$notrowcount}个学生不能转移!";
			}else{
				$data ['result'] = false;
				$message = "操作失败，你选择的班级无归属年级，请前往基本设置班级管理设置!";
			}
			$data ['msg'] = $message;
			die (json_encode($data));
		}elseif($operation == 'add'){
			load()->func('tpl');
			$id = intval($_GPC['id']);
			if(!empty($id)){
				$km                = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " where weid = :weid And schoolid = :schoolid And type = :type ORDER BY ssort DESC", array(':weid' => $weid, ':type' => 'subject', ':schoolid' => $schoolid));
				$category = pdo_fetchall("SELECT sid,sname FROM " . tablename($this->table_classify) . " WHERE weid = :weid And schoolid = :schoolid ORDER BY sid ASC, ssort DESC", array(':weid' => $weid, ':schoolid' => $schoolid), 'sid');
				$qh = get_myqh($id,$schoolid);
				$item = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id = :id", array(':id' => $id));
				if(empty($item)){
					$this->imessage('抱歉，学生不存在或是已经删除！', '', 'error');
				}
			}
			if(checksubmit('submit')){
				$data = array(
					'weid'     => $weid,
					'schoolid' => $schoolid,
					'sid'      => intval($_GPC['id']),
					'km_id'    => trim($_GPC['km']),
					'bj_id'    => trim($_GPC['bj']),
					'qh_id'    => trim($_GPC['qh']),
					'xq_id'    => trim($_GPC['xueqi']),
					'my_score' => trim($_GPC['score']),
					'info'     => trim($_GPC['info']),
				);
				if(empty($data['km_id'])){
					$this->imessage('抱歉，请选择科目！', '', 'error');
				}
				if(empty($data['my_score'])){
					$this->imessage('抱歉，请录入分数成绩！', '', 'error');
				}				
				pdo_insert($this->table_score, $data);
				$this->imessage('录入成功，请勿重复录入！', $this->createWebUrl('students', array('op' => 'display', 'schoolid' => $schoolid)), 'success');
			}
		}elseif($operation == 'deleteallstudents'){
			// pdo_delete($this->table_qrinfo, array('schoolid' => $schoolid, 'weid' => $weid, 'type' => 3));
			// pdo_delete($this->table_students, array('schoolid' => $schoolid, 'weid' => $weid));
			// pdo_delete($this->table_user, array('schoolid' => $schoolid, 'tid' => 0));
			// $this->imessage('已全部删除本校学生！', $this->createWebUrl('students', array('op' => 'display', 'schoolid' => $schoolid)), 'success');
		}elseif($operation == 'get_infocard'){
			$stuid = $_GPC['id'];
			$student = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " WHERE id = :id", array(':id' => $stuid));
			$cardinfo = json_decode($student['infocard'],true);
			$MainWatcharr = json_decode($cardinfo['MainWatcharr']);
			//var_dump($cardinfo);
			include $this->template('web/stu_infocard');
			exit();
		}elseif($operation == 'change_cardinfo'){
			//var_dump($_GPC);
			//die();
			$sid = $_GPC['stuId'];
			$this_data = array(
				's_name' => trim($_GPC['StuName_card']),
				'sex' => $_GPC['Sex_card'],
				'numberid' => $_GPC['NumberId_card'],
				'area_addr' => $_GPC['HomeAddress_card'],
				'birthdate' => strtotime($_GPC['Birthdate_card']),
				'seffectivetime' => strtotime($_GPC['Seffectivetime_card'])
			);
			$infocard = array();
			$infocard['NowAddress'] = $_GPC['NowAddress_card'];
			$infocard['IDcard'] = trim($_GPC['IDcard_card']);
			$infocard['Nation'] = trim($_GPC['Nation_card']);
			$infocard['HomeChild'] = trim($_GPC['HomeChild_card']);
			$infocard['SingleFamily'] = trim($_GPC['SingleFamily_card']);
			$infocard['IsKeep'] = trim($_GPC['IsKeep_card']);
			$infocard['DayOrWeek'] = trim($_GPC['DayOrWeek_card']);
			$infocard['Fxueli'] = trim($_GPC['Fxueli_card']);
			$infocard['Fwork'] = trim($_GPC['Fwork_card']);
			$infocard['Fhobby'] = trim($_GPC['Fhobby_card']);
			$infocard['FWorkPlace'] = trim($_GPC['FWorkPlace_card']);
			$infocard['Mxueli'] = trim($_GPC['Mxueli_card']);
			$infocard['Mwork'] = trim($_GPC['Mwork_card']);
			$infocard['Mhobby'] = trim($_GPC['Mhobby_card']);
			$infocard['MWorkPlace'] = trim($_GPC['MWorkPlace_card']);
			$infocard['GrandFxueli'] = trim($_GPC['GrandFxueli_card']);
			$infocard['GrandFwork'] = trim($_GPC['GrandFwork_card']);
			$infocard['GrandFhobby'] = trim($_GPC['GrandFhobby_card']);
			$infocard['GrandFWorkPlace'] = trim($_GPC['GrandFWorkPlace_card']);
			$infocard['GrandMxueli'] = trim($_GPC['GrandMxueli_card']);
			$infocard['GrandMwork'] = trim($_GPC['GrandMwork_card']);
			$infocard['GrandMhobby'] = trim($_GPC['GrandMhobby_card']);
			$infocard['GrandMWorkPlace'] = trim($_GPC['GrandMWorkPlace_card']);
			$infocard['WGrandFxueli'] = trim($_GPC['WGrandFxueli_card']);
			$infocard['WGrandFwork'] = trim($_GPC['WGrandFwork_card']);
			$infocard['WGrandFhobby'] = trim($_GPC['WGrandFhobby_card']);
			$infocard['WGrandFWorkPlace'] = trim($_GPC['WGrandFWorkPlace_card']);
			$infocard['WGrandMxueli'] = trim($_GPC['WGrandMxueli_card']);
			$infocard['WGrandMwork'] = trim($_GPC['WGrandMwork_card']);
			$infocard['WGrandMhobby'] = trim($_GPC['WGrandMhobby_card']);
			$infocard['WGrandMWorkPlace'] = trim($_GPC['WGrandMWorkPlace_card']);
			$infocard['Otherxueli'] = trim($_GPC['Otherxueli_card']);
			$infocard['Otherwork'] = trim($_GPC['Otherwork_card']);
			$infocard['Otherhobby'] = trim($_GPC['Otherhobby_card']);
			$infocard['OtherWorkPlace'] = trim($_GPC['OtherWorkPlace_card']);
			$infocard['MainWatcharr'] = json_encode($_GPC['MainWatcharr']);
			$infocard['Childhobby'] = trim($_GPC['Childhobby_card']);
			$infocard['ChildWord'] = trim($_GPC['ChildWord_card']);
			$infocard['SchoolWord'] = trim($_GPC['SchoolWord_card']);
			$this_data['infocard'] = json_encode($infocard);
			pdo_update($this->table_students,$this_data, array('id' => $sid));
			$result['status'] = true;
			$result['msg'] = "修改成功";
			die(json_encode($result));
		}elseif($operation == 'GetUserList'){
			$sid = $_GPC['id'];
			$schoolid = $_GPC['schoolid'];
			$UserList = pdo_fetchAll("SELECT * FROM " . tablename($this->table_user) . " WHERE sid = '{$sid}'");
			foreach ($UserList as $key => $value) {
				$UserList[$key]['pard'] = get_guanxi($value['pard']);
			}
			$result['data'] = $UserList;
			die(json_encode($result));
		}elseif($operation == 'ChangeStatus'){
			$id = $_GPC['id'];
			$status = $_GPC['status'];
			$schoolid = $_GPC['schoolid'];
			pdo_update($this->table_user, array('status' => $status), array('id' =>$id,'schoolid' => $schoolid));
		}

		elseif($operation == 'GetAllRoomStu'){


			$Stulist = pdo_fetchall("SELECT distinct( student.id ) ,student.roomid,student.s_name,student.bj_id,idcard.idcard FROM ".GetTableName('students')." as student LEFT JOIN ".GetTableName('idcard')." as idcard on student.id = idcard.sid  WHERE student.schoolid = '{$schoolid}' and student.s_type = 2 GROUP BY student.id ");
			$Cao = pdo_fetchall("SELECT bj.sname as bjname ,nj.sname as njname,bj.sid as sid FROM ".GetTableName('classify')." as bj , ".GetTableName('classify')." as nj WHERE bj.schoolid = :schoolid  and bj.parentid = nj.sid ",array(':schoolid'=>$schoolid),'sid');
			 
			$iii = 0;
			$ExArr = [];
			foreach($Stulist as $key=> $value){
				$Bj = pdo_fetch("SELECT bj.sname as bjname ,nj.sname as njname FROM ".GetTableName('classify')." as bj , ".GetTableName('classify')." as nj WHERE bj.schoolid = '{$schoolid}' and bj.sid = '{$value['bj_id']}' and bj.parentid = nj.sid ");
				if($value['roomid'] != 0){
					$Roominfo = pdo_fetch("SELECT room.name as rname ,apart.name as apname FROM ".GetTableName('aproom')." as room , ".GetTableName('apartment')." as apart WHERE room.schoolid = '{$schoolid}' and room.id = '{$value['roomid']}' and apart.id = room.apid ");
					$RoomName = $Roominfo['rname'];
					$ApName = $Roominfo['apname'];

					 
				}
				$ExArr[$iii] = array(
					'sname' => $value['s_name'] ? $value['s_name'] : '',
					//'bjname' => $Bj['bjname'] ? $Bj['bjname'] : '',
					//'Njname' => $Bj['njname'] ? $Bj['njname'] : '',
					'bjname' => $Cao[$value['bj_id']]['bjname'],
					'Njname' => $Cao[$value['bj_id']]['njname'],
					'roomname' => $RoomName ?$ApName."-".$RoomName : '',
				//	'apname' => $ApName ? $ApName : '',
					'idcard' => $value['idcard'] ? $value['idcard'] : '',
				);
				$iii++;
			}


			$title = array('学生姓名','班级','年级','宿舍','卡号');
			$this->exportexcel($ExArr, $title, '住校生');
		 exit();
		}
	/* 	elseif($operation == 'OneKeyUpPeople'){
            $schoolid = $_GPC['schoolid'];
            $studentslist = pdo_fetchall("SELECT id,s_name,icon,guid,photo_guid  FROM " . GetTableName('students') . " WHERE schoolid = '{$schoolid}' and weid = '{$weid}' ");

            foreach ($studentslist as $key => $value){
                if(empty($value['guid'])){
                    //未录入  人员录入
                    $param['idcardNo'] = $value['id'];
                    $param['name']     = $value['s_name'];
                    $result_guid            = personAction($schoolid, $weid, time(), $param, 'insert');
                    if($result_guid['result'] == '1'){
                        $guid_insert =$result_guid['data']['guid'];
                        $result_device =  People2Device($schoolid, $weid, time(),$guid_insert);
                        $imgurl = tomedia($value['icon']);
                        $result_face = PersonFace($schoolid, $weid, time(),$guid_insert,$imgurl);
                        if($result_face['result'] == '1'){
                            $photo_guid_insert = $result_face['data']['guid'];
                        }
                        pdo_update(GetTableName('students',false),array('guid'=>$guid_insert,'photo_guid'=>$result_face['data']['guid']),array('id'=>$value['id']));
                    }
                }else{
                    //已录入 更新照片
                    $param['guid'] = $value['guid'];
                    $param['idcardNo'] = $value['id'];
                    $param['name'] = $value['s_name'];
                    $result = personAction($schoolid, $weid, time(), $param, 'update');
                    $imgurl = tomedia($value['icon']);
                    //上传新的
                    $result_face = PersonFace($schoolid, $weid, time(),$value['guid'],$imgurl);
                    if($result_face['result'] == '1'){
                        //删除旧的
                        DeleteFace($schoolid, $weid, time(),$value['guid'],$value['photo_guid']);
                        pdo_update(GetTableName('students',false),array('photo_guid'=>$result_face['data']['guid']),array('id'=>$value['id']));
                    }
                }
            }
            $this->imessage('同步成功！', referer(), 'success');
        } */
		include $this->template('web/students');
?>
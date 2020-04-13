<?php
/**
 * 微教育模块
 *QQ：332035136
 * @author 高贵血迹
 */
function mload()
{
	static $mloader;
	if (empty($mloader)) {
		$mloader = new Mloader();
	}
	return $mloader;
}
  
class Mloader
{
	private $cache = array();
	function func($name)
	{
		if (isset($this->cache['func'][$name])) {
			return true;
		}
		$file = IA_ROOT . '/addons/fm_jiaoyu/function/' . $name . '.func.php';
		if (file_exists($file)) {
			include $file;
			$this->cache['func'][$name] = true;
			return true;
		} else {
			trigger_error('Invalid Helper Function /addons/fm_jiaoyu/function/' . $name . '.func.php', E_USER_ERROR);
			return false;
		}
	}
	function model($name)
	{
		if (isset($this->cache['model'][$name])) {
			return true;
		}
		$file = IA_ROOT . '/addons/fm_jiaoyu/model/' . $name . '.mod.php';
		if (file_exists($file)) {
			include $file;
			$this->cache['model'][$name] = true;
			return true;
		} else {
			trigger_error('Invalid Model /addons/fm_jiaoyu/model/' . $name . '.mod.php', E_USER_ERROR);
			return false;
		}
	}
	function classs($name)
	{
		if (isset($this->cache['class'][$name])) {
			return true;
		}
		$file = IA_ROOT . '/addons/fm_jiaoyu/class/' . $name . '.class.php';
		if (file_exists($file)) {
			include $file;
			$this->cache['class'][$name] = true;
			return true;
		} else {
			trigger_error('Invalid Class /addons/fm_jiaoyu/class/' . $name . '.class.php', E_USER_ERROR);
			return false;
		}
	}
}

function getMillisecond(){//获取毫秒级时间戳
	list($s1,$s2)=explode(' ',microtime());
	return (float)sprintf('%.0f',(floatval($s1)+floatval($s2))*1000);
}

function get_schoolset($schoolid,$name){
	$item = pdo_fetch("SELECT * FROM " . GetTableName('schoolset') . " WHERE schoolid = '{$schoolid}' ");
	if($item){
		return $item[$name];
	}else{
		return false;
	}
}
function get_language($schoolid){
	global $_W;
	$item = pdo_fetch("SELECT lanset FROM " . tablename('wx_school_language') . " WHERE weid = '{$_W['uniacid']}' And schoolid = '{$schoolid}' And is_on = 1 ");
	if($item){
		$lanconfig = json_decode($item['lanset'],true);
	}else{
		$filename = MODULE_ROOT . '/model/lan.config.php';
		require $filename;
		$lanconfig = $config;
	}
	$_W['lanconfig'] = $lanconfig;
}
function get_week($time){
	if(date('w',$time) == 0 ){
		$day = '星期日';
	}
	if(date('w',$time) == 1 ){
		$day = '星期一';
	}
	if(date('w',$time) == 2 ){
		$day = '星期二';
	}
	if(date('w',$time) == 3 ){
		$day = '星期三';
	}
	if(date('w',$time) == 4 ){
		$day = '星期四';
	}
	if(date('w',$time) == 5 ){
		$day = '星期五';
	}
	if(date('w',$time) == 6 ){
		$day = '星期六';
	}
	return $day;
}

function pay_type($pay_type){
	$types = array(
		'wechat' 		=> "微信支付",
		'alipay' 	=> "支付宝",
		'baifubao'  => "百付宝",
		'unionpay' 	=> "银联",
		'cash' 	=> "现金支付",
		'credit' 	=> "余额支付",
		'chongzhi' 	=> "余额支付"
	);
	return $types[$pay_type];
}

function sale(){
	mload()->model('kc');
	$result = check_plugin('fm_jiaoyu_plugin_sale');
	return $result;
}

function vis(){
    
	mload()->model('kc');
	$result = check_plugin('fm_jiaoyu_plugin_vis');
	return $result;
}

function bigdata(){
	mload()->model('kc');
	$result = check_plugin('fm_jiaoyu_plugin_bigdata');
	return $result;
}

function assets(){
	mload()->model('kc');
	$result = check_plugin('fm_jiaoyu_plugin_assets');
	return $result;
}

function set_plugin(){
	global $_W;
	$_W['vis'] = vis();
	$_W['sale'] = sale();
	$_W['bigdata'] = bigdata();
	$_W['assets'] = assets();
}
function sort_array_multi(array &$arr, array $keys, array $order){
    //校验参数
    if ( count($keys) == ($times = count($order)) ) {
        for ( $i = 0, $j = 0; $j < $times; $i += 2, $j++ ) {
            foreach ( $arr as $k => $v ) {
                //原数组是否存在该字段
                if ( isset($v[$keys[$j]]) ) {
                    $params[$i][] = $v[$keys[$j]];    //TODO 中文排序支持
                } else {
                    return false;
                }
            }
            if ( strtoupper($order[$j]) == 'ASC' ) {
                $params[$i + 1] = SORT_ASC;
            } else {
                $params[$i + 1] = SORT_DESC;
            }
        }
        $params[] = &$arr;
        return call_user_func_array('array_multisort', $params);
    } else {
        return false;
    }
}
function array_sorts($array,$keys,$type='asc'){
	//用法$datas = array_sorts($datas,'is_over','asc');
	$keysvalue = $new_array = array();
	foreach ($array as $k=>$v){
		$keysvalue[$k] = $v[$keys];
	}
	if($type == 'asc'){
		asort($keysvalue);
	}else{
		arsort($keysvalue);
	}
	reset($keysvalue);
	foreach ($keysvalue as $k=>$v){
		$new_array[$k] = $array[$k];
	}
	return $new_array;
}

function sub_day($staday){
	$value = TIMESTAMP - $staday;
	if ($value < 0) {
		return '';
	} elseif ($value >= 0 && $value < 59) {
		return $value + 1 . "秒";
	} elseif ($value >= 60 && $value < 3600) {
		$min = intval($value / 60);
		return $min . " 分钟";
	} elseif ($value >= 3600 && $value < 86400) {
		$h = intval($value / 3600);
		return $h . " 小时";
	} elseif ($value >= 86400 && $value < 86400 * 30) {
		$d = intval($value / 86400);
		return intval($d) . " 天";
	} elseif ($value >= 86400 * 30 && $value < 86400 * 30 * 12) {
		$mon = intval($value / (86400 * 30));
		return $mon . " 月";
	} else {
		$y = intval($value / (86400 * 30 * 12));
		return $y . " 年";
	}
}

function cut($filename){
	$image = $filename; // 原图
	$imgstream = file_get_contents($image);
	$im = imagecreatefromstring($imgstream);
	$x = imagesx($im);//获取图片的宽
	$y = imagesy($im);//获取图片的高
	 
	// 缩略后的大小
	$xx = 500;
	$yy = 500;
	 
	if($x>$y){
	//图片宽大于高
		$sx = abs(($y-$x)/2);
		$sy = 0;
		$thumbw = $y;
		$thumbh = $y;
	} else {
	//图片高大于等于宽
		$sy = abs(($x-$y)/2.5);
		$sx = 0;
		$thumbw = $x;
		$thumbh = $x;
	  }
	if(function_exists("imagecreatetruecolor")) {
	  $dim = imagecreatetruecolor($yy, $xx); // 创建目标图gd2
	} else {
	  $dim = imagecreate($yy, $xx); // 创建目标图gd1
	}
	imageCopyreSampled ($dim,$im,0,0,$sx,$sy,$yy,$xx,$thumbw,$thumbh);
	imagejpeg ($dim, $filename);
}

function readschootyep(){
	$tyep = checkverstype();
	if($tyep == 1){
		return true;
	}else{
		return false;
	}
}
function upload_file($file, $type, $name = ''){
	global $_W;
	if (empty($file['name'])) {
		return error(-1, '上传失败, 请选择要上传的文件！');
	}
	if ($file['error'] != 0) {
		return error(-1, '上传失败, 请重试.');
	}
	load()->func('file');
	$pathinfo = pathinfo($file['name']);
	$ext = strtolower($pathinfo['extension']);
	$basename = strtolower($pathinfo['basename']);
	if ($name != '') {
		$basename = $name;
	}
	$path = "public/upload/{$type}s/{$_W['uniacid']}/";
	mkdirs(MODULE_ROOT . '/' . $path);
	if (!strexists($basename, $ext)) {
		$basename .= '.' . $ext;
	}
	if (!file_move($file['tmp_name'], MODULE_ROOT . '/' . $path . $basename)) {
		return error(-1, '保存上传文件失败');
	}
	return $path . $basename;
}
function read_excel($filename){
	include_once IA_ROOT . '/framework/library/phpexcel/PHPExcel.php';
	$filename = MODULE_ROOT . '/' . $filename;
	if (!file_exists($filename)) {
		return error(-1, '文件不存在或已经删除');
	}
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	if ($ext == 'xlsx') {
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
	} else {
		$objReader = PHPExcel_IOFactory::createReader('Excel5');
	}
	$objReader->setReadDataOnly(true);
	$objPHPExcel = $objReader->load($filename);
	$objWorksheet = $objPHPExcel->getActiveSheet();
	$highestRow = $objWorksheet->getHighestRow();
	$highestColumn = $objWorksheet->getHighestColumn();
	$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
	$excelData = array();
	for ($row = 1; $row <= $highestRow; $row++) {
		for ($col = 0; $col < $highestColumnIndex; $col++) {
			$excelData[$row][] = (string) $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
		}
	}
	return $excelData;
}



function register_jssdks($debug = false){
	
	global $_W;
	
	if (defined('HEADER')) {
		echo '';
		return;
	}
	
	$sysinfo = array(
		'uniacid' 	=> $_W['uniacid'],
		'acid' 		=> $_W['acid'],
		'siteroot' 	=> $_W['siteroot'],
		'siteurl' 	=> $_W['siteurl'],
		'attachurl' => $_W['attachurl'],
		'cookie' 	=> array('pre'=>$_W['config']['cookie']['pre'])
	);
	if (!empty($_W['acid'])) {
		$sysinfo['acid'] = $_W['acid'];
	}
	if (!empty($_W['openid'])) {
		$sysinfo['openid'] = $_W['openid'];
	}
	if (defined('MODULE_URL')) {
		$sysinfo['MODULE_URL'] = MODULE_URL;
	}

	$sysinfo = json_encode($sysinfo);
	$jssdkconfig = json_encode($_W['account']['jssdkconfig']);
	$debug = $debug ? 'true' : 'false';
	
	$script = <<<EOF
<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
<script type="text/javascript">
	window.sysinfo = window.sysinfo || $sysinfo || {};
	
	// jssdk config 对象
	jssdkconfig = $jssdkconfig || {};
	
	// 是否启用调试
	jssdkconfig.debug = $debug;
	
	jssdkconfig.jsApiList = [
		'checkJsApi',
		'onMenuShareWeibo',
		'updateAppMessageShareData',
		'updateTimelineShareData',
		'onMenuShareAppMessage',
		'onMenuShareTimeline',
		'hideMenuItems',
		'showMenuItems',
		'hideAllNonBaseMenuItem',
		'showAllNonBaseMenuItem',
		'translateVoice',
		'startRecord',
		'stopRecord',
		'onRecordEnd',
		'onVoicePlayEnd',
		'onVoiceRecordEnd',
		'playVoice',
		'pauseVoice',
		'stopVoice',
		'uploadVoice',
		'downloadVoice',
		'chooseImage',
		'getLocalImgData',
		'previewImage',
		'uploadImage',
		'downloadImage',
		'getNetworkType',
		'openLocation',
		'getLocation',
		'hideOptionMenu',
		'showOptionMenu',
		'closeWindow',
		'scanQRCode',
		'chooseWXPay',
		'openProductSpecificView',
		'addCard',
		'chooseCard',
		'openCard'
	];
	
	wx.config(jssdkconfig);
	
</script>
EOF;
	echo $script;
}

function tpl_form_field_fans($name, $value = array('openid' => '', 'nickname' => '', 'avatar' => ''))
{
	global $_W;
	if (empty($default)) {
		$default = './resource/images/nopic.jpg';
	}
	$s = '';
	if (!defined('TPL_INIT_TINY_FANS')) {
		$s = '
				<script type="text/javascript">
					function showFansDialog(elm) {
						var btn = $(elm);
						var openid = btn.parent().prev();
						var avatar = btn.parent().prev().prev();
						var nickname = btn.parent().prev().prev().prev();
						var img = btn.parent().parent().next().find("img");
						tiny.selectfan(function(fans){
							if(fans.tag.avatar){
								if(img.length > 0){
									img.get(0).src = fans.tag.avatar;
								}
								openid.val(fans.openid);
								avatar.val(fans.tag.avatar);
								nickname.val(fans.nickname);
							}
						});
					}
				</script>';
		define('TPL_INIT_TINY_FANS', true);
	}
	$s .= '
			<div class="input-group">
				<input type="text" name="' . $name . '[nickname]" value="' . $value['nickname'] . '" class="form-control" readonly>
				<input type="hidden" name="' . $name . '[avatar]" value="' . $value['avatar'] . '">
				<input type="hidden" name="' . $name . '[openid]" value="' . $value['openid'] . '">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button" onclick="showFansDialog(this);">选择粉丝</button>
				</span>
			</div>
			<div class="input-group" style="margin-top:.5em;">
				<img src="' . $value['avatar'] . '" onerror="this.src=\'' . $default . '\'; this.title=\'头像未找到.\'" class="img-responsive img-thumbnail" width="150" />
			</div>';
	return $s;
}

function tpl_form_execl_input($schoolid,$type)
{
	global $_W;
	$pointicon = OSSURL."public/mobile/img/arrow_right.png";
	$suc_icon = OSSURL."public/mobile/img/icon-checked.png";
	$err_icon = OSSURL."public/mobile/img/yellowfork.png";
	$exporturl = $_W['siteroot'] . 'web/index.php?c=site&a=entry&schoolid=' . $schoolid . '&do=chengji&op=export&m=fm_jiaoyu';
	$inputurl = $_W['siteroot'] . 'web/index.php?c=site&a=entry&schoolid=' . $schoolid . '&do=chengji&op=input&m=fm_jiaoyu';
	$s = '';
	$s .='
		<div class="modal fade" style="min-width: 583px!important;" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
			<style>.now{background-color: #14d0b430;}.now_porint{width: 13px;padding-right: 2px;}.suc_icon{width: 13px;padding-right: 2px;}.text_new{white-space: nowrap;overflow: hidden; text-overflow: ellipsis;}.modal-title{text-align:center;color:#333;font-size: 17px;}.modal-left{width:47%;float:left;max-height: 400px;}.modal-right{width:47%;float:left;margin-left: 30px;max-height: 400px;}.group_left{padding: 20px;text-align:left;background: #f0f2f7;}.group_right{padding: 20px;text-align:left;background: #f0f2f7;}</style>
			<div class="modal-dialog">
				<div class="modal-content" style="border-radius: 20px;">
					<div class="modal-header">
						<h4 class="modal-title">导入进度</h4>
					</div>
					<div class="modal-body" style="width: 100%;">
						<div class="help block" id="porssword" style="text-align:center;"> </div>
						<div class="progress"> 
							<div class="progress-bar progress-bar-info" id="progressbar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
								<span class="sr-only"></span>
							</div>
						</div>
						<div class="modal-left">
							<div class="help block" style=" text-align:center;">当前</div>
							<div class="form-group group_left" id="left">
							</div>
						</div>
						<div class="modal-right">
							<div class="help block" style="text-align:center;">失败</div>
							<div class="form-group group_right" id="right">
							</div>
						</div>
					</div>
					<div class="modal-footer" style="border-radius: 6px;">
						<button type="button" class="btn btn-danger" onclick="close_inupt()">关闭</button>
					</div>
				</div>
			</div>
		</div>';
	$s .= '
			<script type="text/javascript">
				function close_inupt() {
					$("#Modal3").modal("toggle");
					$("#left").empty();
					$("#right").empty();
					$("#porssword").html("");
					$("#progressbar").css("width","0%");
					location.reload();
				}
				function submits() {
					var now_qh = $("#qh_id").val();
					if(!now_qh){
						alert("请先选择期号");
						return false;
					}
					$("#progressbar").css("width","0%");
					var form = new FormData(document.getElementById("form"));
					$.ajax({
						url: "'.$exporturl.'",
						type: "post",
						data: form,
						processData: false,
						contentType: false,
						success: function(result) {
							var obj = jQuery.parseJSON(result);
							if(obj.result){
								if(obj.count >= 1){
									$("#left").empty();
									$("#right").empty();
									$("#Modal3").modal("toggle");
									gopress(obj.count,obj.datas);
								}
							}else{
								alert(obj.msg);
							}
							
						},
						error: function(e) {
							alert("访问网络失败");
						}
					});
				}
				function gopress(count,datas) {
					$("#progressbar").css("width","0%");
					var progress_pj = parseInt(100/count);
					var nowpro = 0;
					var qh_id = $("#qh_id").val();
					for (var i=2;i<count+2;i++){
						$.ajax({
							url: "'.$inputurl.'",
							type: "post",
							dataType: "json",
							data: {
								qh_id:qh_id,
								execl:JSON.stringify(datas[i]),
								line:i
							},
							success: function (data) {
								nowpro = nowpro + progress_pj;
								if(i== count+2){
									$("#progressbar").css("width","100%");
									$("#porssword").html("100%");
									$(".now").removeClass("now");
									$(".now_porint").hide();
								}else{
									$("#progressbar").css("width",nowpro+"%");
									$("#porssword").html(nowpro+"%");
								}
								if (data.result) {
									suc_html = "<img class="suc_icon" src="'.$suc_icon.'">";
									html = "<div class="help block now text_new"><img class="now_porint" src="'.$pointicon.'"><img class="suc_icon" src="+suc_icon+">"+data.strs+"</div>";
									$(".now").removeClass("now");
									$(".now_porint").hide();
									$("#left").prepend(html);
								}else{
									html = "<div class="help block text_new"><img class="suc_icon" src="'.$err_icon.'">第<span style="color:red">"+data.line+"</span>行:"+data.tips+"</div>";
									$("#right").prepend(html);
								}
							}		
						});
					}
				}
			</script>';
	echo $s;
}
function tpl_form_field_images($name, $value = '', $default = '', $options = array()) {
	global $_W;
	if (empty($default)) {
		$default = './resource/images/nopic.jpg';
	}
	$val = $default;
	if (!empty($value)) {
		$val = tomedia($value);
	}
	if (defined('SYSTEM_WELCOME_MODULE')) {
		$options['uniacid'] = 0;
	}
	if (!empty($options['global'])) {
		$options['global'] = true;
		$val = to_global_media(empty($value) ? $default : $value);
	} else {
		$options['global'] = false;
	}
	if (empty($options['class_extra'])) {
		$options['class_extra'] = '';
	}
	if (isset($options['dest_dir']) && !empty($options['dest_dir'])) {
		if (!preg_match('/^\w+([\/]\w+)?$/i', $options['dest_dir'])) {
			exit('图片上传目录错误,只能指定最多两级目录,如: "we7_store","we7_store/d1"');
		}
	}
	$options['direct'] = true;
	$options['multiple'] = false;
	if (isset($options['thumb'])) {
		$options['thumb'] = !empty($options['thumb']);
	}
	$options['fileSizeLimit'] = intval($GLOBALS['_W']['setting']['upload']['image']['limit']) * 1024;
	$s = '';
	if (!defined('TPL_INIT_IMAGE')) {
		$s = '
		<script type="text/javascript">
			function showImageDialog(elm, opts, options) {
				require(["util"], function(util){
					var btn = $(elm);
					var ipt = btn.parent().prev();
					var val = ipt.val();
					var img = ipt.parent().next().children();
					options = '.str_replace('"', '\'', json_encode($options)).';
					util.image(val, function(url){
						if(url.url){
							if(img.length > 0){
								img.get(0).src = url.url;
							}
							ipt.val(url.attachment);
							ipt.attr("filename",url.filename);
							ipt.attr("url",url.url);
						}
						if(url.media_id){
							if(img.length > 0){
								img.get(0).src = url.url;
							}
							ipt.val(url.media_id);
						}
					}, options);
				});
			}
			function deleteImage(elm){
				$(elm).prev().attr("src", "./resource/images/nopic.jpg");
				$(elm).parent().prev().find("input").val("");
			}
		</script>';
		define('TPL_INIT_IMAGE', true);
	}

	$s .= '
		<div class="input-group ' . $options['class_extra'] . '">
			<input type="text" name="' . $name . '" value="' . $value . '"' . ($options['extras']['text'] ? $options['extras']['text'] : '') . ' class="form-control" autocomplete="off">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button" onclick="showImageDialog(this);">选择图片</button>
				<button class="btn btn-info show_yulan_img" type="button"><i style="font-size:14px" class="fa fa-search"></i>预览</button>
			</span>
		</div>';
	return $s;
}
function SchoolTypeFromLocal($schoolid,$weid){
	if(unitchecksctype() == true){
		$data = pdo_fetch("SELECT issale FROM " . tablename('wx_school_index') . " where weid='{$weid}'  and id = '{$schoolid}'");
		if($data['issale'] == 0){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}
function ifile_put_contents($filename, $data){
	global $_W;
	$filename = MODULE_ROOT . '/' . $filename;
	mkdirs(dirname($filename));
	file_put_contents($filename, $data);
	@chmod($filename, $_W['config']['setting']['filemode']);
	return is_file($filename);
}

function distanceBetween($fP1Lat, $fP1Lon, $fP2Lat, $fP2Lon)
{
	$fEARTH_RADIUS = 6378137;
	$fRadLon1 = deg2rad($fP1Lon);
	$fRadLon2 = deg2rad($fP2Lon);
	$fRadLat1 = deg2rad($fP1Lat);
	$fRadLat2 = deg2rad($fP2Lat);
	$fD1 = abs($fRadLat1 - $fRadLat2);
	$fD2 = abs($fRadLon1 - $fRadLon2);
	$fP = pow(sin($fD1 / 2), 2) + cos($fRadLat1) * cos($fRadLat2) * pow(sin($fD2 / 2), 2);
	return intval($fEARTH_RADIUS * 2 * asin(sqrt($fP)) + 0.5);
}

function get_myqh($bj_id,$schoolid){
	global $_W;
	$allqh = pdo_fetchall("SELECT sid,sname,qh_bjlist,qhtype FROM " . tablename('wx_school_classify') . " where schoolid = :schoolid And type =:type ORDER BY sid DESC", array(':schoolid' => $schoolid,':type' => 'score'));
	$allmyqh = array();
	$i  = 0;
	foreach($allqh as $key => $row){
		if($row['qhtype'] == 1){
			$allmyqh[$i]['sid'] = $row['sid'];
			$allmyqh[$i]['sname'] = $row['sname'];
			$allmyqh[$i]['qhtype'] = $row['qhtype'];
			$i ++;
		}else{	
			$uniarr = explode(',', $row['qh_bjlist']);
			$is = unarr($uniarr,$bj_id);
			if ($is) {
				$allmyqh[$i]['sid'] = $row['sid'];
				$allmyqh[$i]['sname'] = $row['sname'];
				$allmyqh[$i]['qhtype'] = $row['qhtype'];
				$i ++;
			}		
		}
	}
	return $allmyqh;
}

function unitchecksctype(){
	$tyep = checkverstype();
	if($tyep == 0){
		return true;
	}else{
		return false;
	}
}

function unarr($uniarr, $id) {
	foreach ($uniarr as $key => $value) {
		if ($id == $value) {
			return true;
		}
	}
	return false;
}
// 只需调用函数 并传参2即可
// echo getRandomString(2);
// 如果仅仅是生成小写字母你可以使用类似方法

// echo chr(mt_rand(65, 90);
// 大写字母

// echo chr(mt_rand(97, 122));
function getRandomString($len, $chars=null){
    if (is_null($chars)){
        $chars = "‘abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    }  
    mt_srand(10000000*(double)microtime());
    for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++){
        $str .= $chars[mt_rand(0, $lc)];  
    }
    return $str;
}

function get_mylist($schoolid,$id,$type,$is_over=2){
	if($type == 'teacher'){
		$bjlist = pdo_fetchall("SELECT id,bj_id,km_id FROM ".tablename('wx_school_user_class')." WHERE tid = :tid And schoolid = :schoolid ", array(':tid' => $id,':schoolid' => $schoolid));
	}
	if($type == 'student'){
		$bjlist = pdo_fetchall("SELECT id,bj_id,km_id FROM ".tablename('wx_school_user_class')." WHERE sid = :sid And schoolid = :schoolid  ", array(':sid' => $id,':schoolid' => $schoolid));
	}
	foreach($bjlist as $key =>$row){
		if(!empty($row['bj_id'])){
			$bjinfo = pdo_fetch("SELECT sname,parentid,is_over FROM ".tablename('wx_school_classify')." WHERE sid = :sid ", array(':sid' => $row['bj_id']));
			$xqinfo = pdo_fetch("SELECT sname FROM ".tablename('wx_school_classify')." WHERE sid = :sid ", array(':sid' => $bjinfo['parentid']));
			$bjlist[$key]['xq_id'] = $bjinfo['parentid'];
			$bjlist[$key]['xqname'] = $xqinfo['sname'];
			$bjlist[$key]['is_over'] = $bjinfo['is_over'];
			$bjlist[$key]['bjname'] = $bjinfo['sname'];
		}
		if(!empty($row['km_id'])){	
			$kminfo = pdo_fetch("SELECT sname FROM ".tablename('wx_school_classify')." WHERE sid = :sid ", array(':sid' => $row['km_id']));
			$bjlist[$key]['kmname'] = $kminfo['sname'];
		}
		if($is_over == 2 && $bjinfo['is_over'] == 2){ //如果要求取未毕业的班级 则unset is_over=2的数据
			unset($bjlist[$key]);
		}
	}	
	return $bjlist;
}

function get_my_score($sid,$qh_id,$schoolid){ //查询本期号总分
	$list = pdo_fetchall("SELECT my_score FROM " . tablename('wx_school_score') . " where  schoolid = :schoolid And qh_id = :qh_id And sid = :sid ", array(':schoolid' => $schoolid,':qh_id' => $qh_id,':sid' => $sid));
	$zongfen = 0;
	if(!empty($list)){
		foreach($list as $key =>$row){
			$zongfen = $zongfen + floatval($row['my_score']);
		}
	}
	return $zongfen;
}

function get_myschool($weid,$openid){ //查询老师所有授课学校
	$list = pdo_fetchall("SELECT schoolid FROM " . tablename('wx_school_user') . " where  weid = :weid And openid = :openid And sid = :sid ", array(':weid' => $weid,':openid' => $openid,':sid' => 0));	
	foreach($list as $key =>$row){
		if(!empty($row['schoolid'])){
			$school = pdo_fetch("SELECT title,logo FROM ".tablename('wx_school_index')." WHERE id = :id ", array(':id' => $row['schoolid']));
			$list[$key]['schoolname'] = $school['title'];
			$list[$key]['schoolicon'] = $school['logo'];
		}		
	}
	return $list;
}
function check_unpay($sid){ //查询未付订单数目
	$unpay = pdo_fetchall("SELECT id,costid FROM " . tablename('wx_school_order') . " where :status = status And :sid = sid ORDER BY id DESC", array(
		 ':status' => 1,
		 ':sid' => $sid
		 ));
	$rest = 0;
	foreach($unpay as $k => $r){
		if(!empty($r['costid'])){
			$obset = pdo_fetch("SELECT is_on FROM ".tablename('wx_school_cost')." WHERE id = '{$r['costid']}'");
			if($obset['is_on'] ==1){
				$rest ++;
			}
		}else{
			$rest  ++ ;
		}
	}
	return $rest;
}
function get_myallclass($weid,$openid){ //查询绑定学生所有班级信息（包含其他学校）
	$user = pdo_fetchall("SELECT id,sid,pard FROM " . tablename('wx_school_user') . " where :weid = weid And :openid = openid And :tid = tid", array(
			':weid' => $weid,
			':openid' => $openid,
			':tid' => 0
	));
	if($user){
		foreach($user as $key => $row){
			$student = pdo_fetch("SELECT id,s_name,schoolid,bj_id,sex,icon FROM " . tablename('wx_school_students') . " where id=:id ", array(':id' => $row['sid']));
			$bajinam = pdo_fetch("SELECT sname FROM " . tablename('wx_school_classify') . " where sid = :sid ", array(':sid' => $student['bj_id']));
			$school = pdo_fetch("SELECT spic FROM " . tablename('wx_school_index') . " where :id = id", array(':id' => $student['schoolid']));
			$user[$key]['s_name'] = $student['s_name'];
			$user[$key]['bjname'] = $bajinam['sname'];
			$user[$key]['sid'] = $student['id'];  
			$user[$key]['schoolid'] = $student['schoolid'];
			$user[$key]['sex'] = $student['sex'];
			$user[$key]['pard'] = get_guanxi($row['pard']);
			$user[$key]['icon'] = empty($student['icon'])?$school['spic']:$student['icon'];
		}
		return $user;
	}else{
		return false;
	}
}

function check_bj($tid,$bj_id){ //检查当前班级是否属于本年级管辖且是否为年级主任
	$class = pdo_fetch("SELECT parentid FROM " . tablename('wx_school_classify') . " where sid = :sid ", array(':sid' => $bj_id));
	$status = false;
	if(!empty($class['parentid'])){
		$nianji = pdo_fetch("SELECT tid FROM " . tablename('wx_school_classify') . " where sid = :sid ", array(':sid' => $class['parentid']));
		if($tid == $nianji['tid']){
			$status = true;
		}
	}
	return $status;
}

function get_weidset($weid,$name){
	$item = pdo_fetch("SELECT $name FROM ".tablename('wx_school_set')." WHERE :weid = weid ", array(':weid' => $weid));
	$set = unserialize($item[$name]);	
	return $set;
}

function get_school_sms_rest($schoolid){
	$item = pdo_fetch("SELECT sms_rest_times FROM ".tablename('wx_school_index')." WHERE :id = id ", array(':id' => $schoolid));	
	if ($item['sms_rest_times'] == 0) {
		return false;
	}else{
		return true;
	}
}

function get_school_sms_set($schoolid){
	$item = pdo_fetch("SELECT sms_set FROM ".tablename('wx_school_index')." WHERE :id = id ", array(':id' => $schoolid));
	$set = unserialize($item['sms_set']);	
	return $set;
}

function isallow_sendsms($schoolid,$type){//综合判断是否发送短信
	$item = pdo_fetch("SELECT weid,sms_set,sms_rest_times FROM ".tablename('wx_school_index')." WHERE :id = id ", array(':id' => $schoolid));
	$school_sms_set = unserialize($item['sms_set']);
	$smsset = get_weidset($item['weid'],$type);
	if(!empty($smsset['sms_SignName']) && !empty($smsset['sms_Code']) && $school_sms_set[$type] == 1 && $item['sms_rest_times'] > 0){
		return true;
	}else{
		return false;
	}
}

function check_verifycode($mobile, $code, $weid){
	$bdset = get_weidset($weid,'bd_set');
	$thiscode = pdo_fetch("SELECT createtime FROM ".tablename('uni_verifycode')." WHERE uniacid = :uniacid And receiver = :receiver And verifycode = :verifycode ", array(':uniacid' => $weid, ':receiver' => $mobile, ':verifycode' => $code));
	$resttime = empty($bdset['code_time']) ? 1800 : intval($bdset['code_time']);
	$duibi = TIMESTAMP - $thiscode['createtime'];
	if($duibi < $resttime) {
		return true;
	}else{
		return false;
	}
}

function need_guid($userid,$schoolid,$type){ //检查是否设置新手引导
	global $_W;
	$guids = pdo_fetchall("SELECT id,arr,begintime,endtime FROM " . tablename('wx_school_banners') . " WHERE enabled = 1 And weid = '{$_W['uniacid']}' And place = $type ORDER BY id ASC");
	$user = pdo_fetch("SELECT is_frist FROM ".tablename('wx_school_user')." WHERE :id = id ", array(':id' => $userid));
	foreach($guids as $key => $row){
		$uniarr = explode(',',$row['arr']);
		$is = unarr($uniarr,$schoolid);
		if ($is && TIMESTAMP >= $row['begintime'] && TIMESTAMP < $row['endtime']) {
			$guid = $row['id'];
		}		
	}
	if(!empty($guid) && $user['is_frist'] == 1){
		return $guid;
	}
}

function getvisitorsip(){
	$visitorsip = pdo_fetch("SELECT * FROM ".tablename('wx_school_classify')." WHERE :type = type ", array(':type' => 'thevideos'));
	return $visitorsip['video1'];
}

function getoauthurl(){
	$oauthurl = $_SERVER ['HTTP_HOST'];
	return $oauthurl;
}

function getpard($pard){
	global $_W;
	$config = $_W['lanconfig']['guanxi'];
	if($pard == 0){
		$jsr  = "";
	}
	if($pard == 1){
		$jsr  = "";
	}
	if($pard == 2){
		$jsr  = $config['guanxi_pard2'];
	}
	if($pard == 3){
		$jsr  = $config['guanxi_pard3'];
	}
	if($pard == 4){
		$jsr  = "爷爷";
	}
	if($pard == 5){
		$jsr  = "奶奶";
	}
	if($pard == 6){
		$jsr  = "外公";
	}
	if($pard == 7){
		$jsr  = "外婆";
	}
	if($pard == 8){
		$jsr  = "叔叔";
	}
	if($pard == 9){
		$jsr  = "阿姨";
	}
	if($pard == 10){
		$jsr  = $config['guanxi_pard5'];
	}
	if($pard == 11){
		$jsr  = "-老师代签";
	}
    return $jsr;
}
function getallpardset(){
	global $_W;
	$config = $_W['lanconfig']['guanxi'];
	$data = array();
	$data[1]  = $config['guanxi_pard4'];
	$data[2]  = $config['guanxi_pard2'];
	$data[3]  = $config['guanxi_pard3'];
	$data[4]  = "爷爷";
	$data[5]  = "奶奶";
	$data[6]  = "外公";
	$data[7]  = "外婆";
	$data[8]  = "叔叔";
	$data[9]  = "阿姨";
	$data[10]  = $config['guanxi_pard5'];
    return $data;
}
function getpardforkqj($pard){
	global $_W;
	$config = $_W['lanconfig']['guanxi'];
	if($pard == 1){
		$jsr  = $config['guanxi_pard4'];
	}
	if($pard == 2){
		$jsr  = $config['guanxi_pard2'];
	}
	if($pard == 3){
		$jsr  = $config['guanxi_pard3'];
	}
	if($pard == 4){
		$jsr  = "爷爷";
	}
	if($pard == 5){
		$jsr  = "奶奶";
	}
	if($pard == 6){
		$jsr  = "外公";
	}
	if($pard == 7){
		$jsr  = "外婆";
	}
	if($pard == 8){
		$jsr  = "叔叔";
	}
	if($pard == 9){
		$jsr  = "阿姨";
	}
	if($pard == 10){
		$jsr  = $config['guanxi_pard5'];
	}
    return $jsr;
}

function get_teacher($pard){
	if($pard == 1){
		$jsr  = "老师";
	}
	if($pard == 2){
		$jsr  = "校长";
	}
	if($pard == 3){
		$jsr  = "主任";
	}
    return $jsr;
}

function get_guanxi($pard){ //获取用户绑定时候选定关系称谓
	global $_W;
	$config = $_W['lanconfig']['guanxi'];
	if($pard == 2){
		$jsr  = $config['guanxi_pard2'];
	}
	if($pard == 3){
		$jsr  = $config['guanxi_pard3'];
	}
	if($pard == 4){
		$jsr  = $config['guanxi_pard4'];
	}
	if($pard == 5){
		$jsr  = $config['guanxi_pard5'];
	}	
    return $jsr;
}

function CreateRequest($HttpUrl,$HttpMethod,$COMMON_PARAMS,$secretKey, $PRIVATE_PARAMS, $isHttps)
{
    $FullHttpUrl = $HttpUrl."/v2/index.php";

    /***************对请求参数 按参数名 做字典序升序排列，注意此排序区分大小写*************/
    $ReqParaArray = array_merge($COMMON_PARAMS, $PRIVATE_PARAMS);
    ksort($ReqParaArray);

    /**********************************生成签名原文**********************************
     * 将 请求方法, URI地址,及排序好的请求参数  按照下面格式  拼接在一起, 生成签名原文，此请求中的原文为 
     * GETcvm.api.qcloud.com/v2/index.php?Action=DescribeInstances&Nonce=345122&Region=gz
     * &SecretId=AKIDz8krbsJ5yKBZQ1pn74WFkmLPx3gnPhESA&Timestamp=1408704141
     * &instanceIds.0=qcvm12345&instanceIds.1=qcvm56789
     * ****************************************************************************/
    $SigTxt = $HttpMethod.$FullHttpUrl."?";

    $isFirst = true;
    foreach ($ReqParaArray as $key => $value)
    {
        if (!$isFirst) 
        { 
            $SigTxt = $SigTxt."&";
        }
        $isFirst= false;

        /*拼接签名原文时，如果参数名称中携带_，需要替换成.*/
        if(strpos($key, '_'))
        {
            $key = str_replace('_', '.', $key);
        }

        $SigTxt=$SigTxt.$key."=".$value;
    }

    /*********************根据签名原文字符串 $SigTxt，生成签名 Signature******************/
    $Signature = base64_encode(hash_hmac('sha1', $SigTxt, $secretKey, true));


    /***************拼接请求串,对于请求参数及签名，需要进行urlencode编码********************/
    $Req = "Signature=".urlencode($Signature);
    foreach ($ReqParaArray as $key => $value)
    {
        $Req=$Req."&".$key."=".urlencode($value);
    }

    /*********************************发送请求********************************/
    if($HttpMethod === 'GET')    {
        if($isHttps === true) {
            $Req="https://".$FullHttpUrl."?".$Req;
        }else{
            $Req="http://".$FullHttpUrl."?".$Req;
        }

        $Rsp = file_get_contents($Req);

    }else{
        if($isHttps === true)
        {
            $Rsp= SendPost("https://".$FullHttpUrl,$Req,$isHttps);
        }
        else
        {
            $Rsp= SendPost("http://".$FullHttpUrl,$Req,$isHttps);
        }
    }
    return(json_decode($Rsp,true));
}

function SendPost($FullHttpUrl,$Req,$isHttps){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $Req);

	curl_setopt($ch, CURLOPT_URL, $FullHttpUrl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	if ($isHttps === true) {
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,  false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  false);
	}
	$result = curl_exec($ch);
	return $result;
}

function upload_file_to_cdn($data,$host){
    $ch = curl_init();
	$url = 'http%3a%2f%2fauth.7mao.cc%2fapi%2famr.php';	
	if(version_compare(PHP_VERSION,'5.5.0','>=')){
		$postdata = array (
			"type" => 'amr',
			"host" => $host,
			"oauthurl" => getoauthurl(),
			"upload" => new CURLFile(realpath($data))
		);
		curl_setopt($ch, CURLOPT_URL,urldecode($url));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
	}else{
		$postdata = array (
			"type" => 'amr',
			"host" => $host,
			"oauthurl" => getoauthurl(),
			"upload" => "@".$data
		);
		curl_setopt($ch, CURLOPT_URL, urldecode($url));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
		$response = curl_exec($ch);
	}
	return $response;
}

function delvioce($data,$host){
    $ch = curl_init();
	$url = 'http%3a%2f%2fauth.7mao.cc%2fapi%2famr.php';	
	$postdata = array (
		"type" => 'delamr',
		"host" => $host,
		"oauthurl" => getoauthurl(),
		"mp3name" => $data
	);
	if(version_compare(PHP_VERSION,'5.5.0','>=')){
		curl_setopt($ch, CURLOPT_URL, urldecode($url));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
	}else{
		curl_setopt($ch, CURLOPT_URL, urldecode($url));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		$response = curl_exec($ch);
	}
	return $response;
}

function delcheckpic($name){
	global $_W;
    $ch = curl_init();
    $post_data = array (
		"type" => 'delcheckpic',
		"oauthurl" => getoauthurl(),
		"checkpic" => $name
    );	
	$url = 'http%3a%2f%2fauth.7mao.cc%2fapi%2famr.php';	
	if(version_compare(PHP_VERSION,'5.5.0','>=')){
		curl_setopt($ch, CURLOPT_URL, urldecode($url));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$response = curl_exec($ch);
	}else{
		curl_setopt($ch, CURLOPT_URL, urldecode($url));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$response = curl_exec($ch);
	}
	return true;
}

function opreatmac($macid,$mactype,$posturl,$type,$schoolname){
    $ch = curl_init();
    $post_data = array (
		"type" => $type,
		"oauthurl" => getoauthurl(),
		"mactype" => $mactype,
		"macid" => $macid,
		"schoolname" => $schoolname,
		"posturl" => $posturl
    );
	if(getoauthurl()){$url = 'http%3a%2f%2fauth.7mao.cc%2fapi%2fmac.php';}
	if(version_compare(PHP_VERSION,'5.5.0','>=')){
		curl_setopt($ch, CURLOPT_URL,urldecode($url));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$response = curl_exec($ch);
	}else{
		curl_setopt($ch, CURLOPT_URL, urldecode($url));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$response = curl_exec($ch);
	}	
	return $response;
}

function getImg($picurl){
	$ch=curl_init();
	$timeout=5;
	if(version_compare(PHP_VERSION,'5.5.0','>=')){
		curl_setopt($ch, CURLOPT_URL,$picurl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
		$img=curl_exec($ch);
		curl_close($ch);		
	}else{
		curl_setopt($ch, CURLOPT_URL, $picurl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
		$img=curl_exec($ch);
		curl_close($ch);		
	}	
	delcheckpic($picurl);
	return $img;
}

function DeleteStudent($sid){
	pdo_delete('wx_school_score', array('sid' => $sid));
	pdo_delete('wx_school_answers', array('sid' => $sid));
	pdo_delete('wx_school_leave', array('sid' => $sid));
	pdo_delete('wx_school_media', array('sid' => $sid));
	//pdo_delete('wx_school_order', array('sid' => $sid));
	pdo_delete('wx_school_signup', array('sid' => $sid));
	pdo_delete('wx_school_record', array('sid' => $sid));
	pdo_delete('wx_school_checklog', array('sid' => $sid));
	pdo_delete('wx_school_idcard', array('sid' => $sid));
	pdo_delete('wx_school_scforxs', array('sid' => $sid));
	pdo_delete('wx_school_user', array('sid' => $sid));	
}


function DeleteTeacher($tid){
	pdo_delete('wx_school_user_class', array('tid' => $tid));
	pdo_delete('wx_school_tcourse', array('tid' => $tid));
	pdo_delete('wx_school_kcbiao', array('tid' => $tid));
	pdo_delete('wx_school_user', array('tid' => $tid));
	pdo_delete('wx_school_leave', array('tid' => $tid));
	pdo_delete('wx_school_notice', array('tid' => $tid));
	pdo_delete('wx_school_record', array('tid' => $tid));
	pdo_delete('wx_school_checklog', array('tid' => $tid));
	pdo_delete('wx_school_idcard', array('tid' => $tid));
	pdo_delete('wx_school_zjh', array('tid' => $tid));
	pdo_delete('wx_school_scforxs', array('tid' => $tid));
	pdo_delete('wx_school_shouce', array('tid' => $tid));
	pdo_delete('wx_school_shoucepyk', array('tid' => $tid));
}



function getimg_form_oss($picurl){
	$ch=curl_init();
	$timeout=5;
	if(version_compare(PHP_VERSION,'5.5.0','>=')){
		curl_setopt($ch, CURLOPT_URL,$picurl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
		$img=curl_exec($ch);
		curl_close($ch);		
	}else{
		curl_setopt($ch, CURLOPT_URL, $picurl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
		$img=curl_exec($ch);
		curl_close($ch);		
	}	
	return $img;
}

function isChineseName($name){
	if (preg_match('/^([\xe4-\xe9][\x80-\xbf]{2}){2,4}$/', $name)) {
		return true;
	} else {
		return false;
	}
}

function ischeckName($name){
	if (preg_match('/测试/i', $name) || preg_match('/test/i', $name)) {
		return false;
	} else {
		return true;
	}
}

function GetTeacherTitle($status,$fz_id){
	if(empty($fz_id))
	{
		switch ( $status )
		{
			case 1 :
				$title = "老师";
				break;
			case 2 :
				$title = "校长";
				break;
			case 3 :
				$title = "年级管理";
				break;		
			default:
				$title = "老师";
				break;
		}

	}else if(!empty($fz_id))
	{
		$fz = pdo_fetch("SELECT * FROM ".tablename('wx_school_classify')." WHERE :type = type And sid = :sid ", array(':type' => 'jsfz',':sid' => $fz_id));
		if(!empty($fz))
		{
			$title = $fz['pname'];
		}else{
			$title = '老师';
		}
		
	}
	return $title;
	
}

function PointAct ($weid,$schoolid,$userid,$actop)
{
	$teacher = pdo_fetch("SELECT * FROM ".tablename('wx_school_user')." WHERE id ='{$userid}'");
	$tid = $teacher['tid'];
	$timetoday = strtotime(date("Y-m-d",time()));
	$tomorrow = $timetoday + 3600*24;
	
	$act = pdo_fetch("SELECT * FROM ".tablename('wx_school_points')." WHERE  weid ='{$weid}' And schoolid ='{$schoolid}' And op = '{$actop}' And type='1' ");
	$check = pdo_fetchcolumn("SELECT COUNT(1) FROM ".tablename('wx_school_pointsrecord')." WHERE tid = '{$tid}' And weid ='{$weid}' And schoolid ='{$schoolid}' And type='1' And pid = '{$act['id']}' And createtime <= '{$tomorrow}' And createtime >= '{$timetoday}'  ");
	if($act['is_on'] == 1 )
	{
		if($check < $act['dailytime'])
		{
			if(!empty($tid))
			{
				$old = pdo_fetch("SELECT point FROM ".tablename('wx_school_teachers')." WHERE  weid ='{$weid}' And schoolid ='{$schoolid}' And id = '{$tid}'  ");
				$oldpoint = intval($old['point']);
				$add = intval($act['adpoint']);
				$newpoint = $oldpoint + $add;
				pdo_update('wx_school_teachers',array('point' => $newpoint ), array('id' => $tid,'weid' => $weid,'schoolid' => $schoolid));
				$pointtemp = array(
				'weid' => $weid,
				'schoolid' => $schoolid,
				'tid' => $tid,
				'pid' => $act['id'],
				'type' => 1,
				'createtime' => time()
				);
				pdo_insert('wx_school_pointsrecord',$pointtemp);	
			}
		}
	}
	return $add;
}

function PointMission ($weid,$schoolid,$userid,$actop)
{
	$teacher = pdo_fetch("SELECT * FROM ".tablename('wx_school_user')." WHERE id ='{$userid}'");
	$tid = $teacher['tid'];
	$act = pdo_fetch("SELECT * FROM ".tablename('wx_school_points')." WHERE  weid ='{$weid}' And schoolid ='{$schoolid}' And op = '{$actop}' And type='2' ");
	$check = pdo_fetch("SELECT mcount,id FROM ".tablename('wx_school_pointsrecord')." WHERE tid = '{$tid}' And weid ='{$weid}' And schoolid ='{$schoolid}' And type='2' And pid = '{$act['id']}' ");
	if($act['is_on'] == 1 )
	{
		if(!empty($tid))
		{
			if(!empty($check))
			{
				$oldcount = intval($check['mcount']);
				$maxcount = intval($act['dailytime']);
				if($oldcount < $maxcount)
				{
					$tempcount = $oldcount + 1 ;
					if($tempcount == $maxcount){
						$old = pdo_fetch("SELECT point FROM ".tablename('wx_school_teachers')." WHERE  weid ='{$weid}' And schoolid ='{$schoolid}' And id = '{$tid}'  ");
						$oldpoint = intval($old['point']);
						$add = intval($act['adpoint']);
						$newpoint = $oldpoint + $add;
						pdo_update('wx_school_teachers',array('point' => $newpoint ), array('id' => $tid,'weid' => $weid,'schoolid' => $schoolid));
						pdo_update('wx_school_pointsrecord',array('mcount' => $tempcount, 'createtime' => time() ), array('id' => $check['id']));
					}else{
						pdo_update('wx_school_pointsrecord',array('mcount' => $tempcount, 'createtime' => time()), array('id' => $check['id']));
					}
				}
			}else{
				$pointtemp = array(
					'weid' => $weid,
					'schoolid' => $schoolid,
					'tid' => $tid,
					'pid' => $act['id'],
					'type' => 2,
					'mcount' => 1,
					'createtime' => time()
				);
				pdo_insert('wx_school_pointsrecord',$pointtemp);
				if($act['dailytime'] == 1 ){
					$old = pdo_fetch("SELECT point FROM ".tablename('wx_school_teachers')." WHERE  weid ='{$weid}' And schoolid ='{$schoolid}' And id = '{$tid}'  ");
					$oldpoint = intval($old['point']);
					$add = intval($act['adpoint']);
					$newpoint = $oldpoint + $add;
					pdo_update('wx_school_teachers',array('point' => $newpoint ), array('id' => $tid,'weid' => $weid,'schoolid' => $schoolid));
				}
			}
		}
	}
	return $add;
}

function checktip($do){ //检查小程序内是否需要弹框提示关注的页面
	$doarr = array('signupjc','tlylist','noticelist','smssage','tmssage','mnoticelist','zuoyelist','bjq','bmlist','signlist','tongxunlu','qingjia','calendar','snoticelist','szuoyelist','slylist','leavelist','callbook');
	if(in_array($do,$doarr)){
		return true;
	}else{
		return false;
	}
}


function CheckMission($tid,$weid,$schoolid){
	
	$all =  pdo_fetchall("SELECT id,dailytime FROM ".tablename('wx_school_points')." WHERE  weid ='{$weid}' And schoolid ='{$schoolid}'  And type='2' And is_on = '1' ");
	$i = 0 ;
	foreach( $all as $key => $value )
	{
		$temp = pdo_fetch("SELECT mcount FROM ".tablename('wx_school_pointsrecord')." WHERE  weid ='{$weid}' And schoolid ='{$schoolid}' And tid = '{$tid}' and pid='{$value['id']}' And type='2' ");
		if($temp['mcount'] == $value['dailytime'])
		{
			continue;
		}elseif($temp['mcount'] < $value['dailytime'])
		{
			//$i++;
			return true;
		}
	}
	return false;
}

function CheckMissionFinished($tid,$pid){
	global $_GPC ,$_W ;
	$all =  pdo_fetch("SELECT id,dailytime FROM ".tablename('wx_school_points')." WHERE  id ='{$pid}' and schoolid='{$_GPC['schoolid']}' And weid='{$_W['uniacid']}'  ");
	$i = 0 ;
	
		$temp = pdo_fetch("SELECT mcount FROM ".tablename('wx_school_pointsrecord')." WHERE   tid = '{$tid}' and pid='{$pid}' And type='2' ");
		if(!$temp)
		{
			$back = "未开始";
			
		}else{
			
		
		if($temp['mcount'] == $all['dailytime'])
		{
			$back = "已完成";
			
		}elseif($temp['mcount'] < $all['dailytime'])
		{
			$back ="完成". $temp['mcount']."/".$all['dailytime'];
			
		}
		}
		return $back;
}

//根据tid获得该教师对应的所有年级主任
function GetNjzr($tid){
	global $_GPC ,$_W ;
	$class= pdo_fetchall("SELECT bj_id FROM ".tablename('wx_school_user_class')." WHERE  tid ='{$tid}' and schoolid='{$_GPC['schoolid']}' And weid='{$_W['uniacid']}' ");
	foreach( $class as $key => $value )
	{
		$temp = pdo_fetch("SELECT parentid FROM ".tablename('wx_school_classify')." WHERE  sid ='{$value['bj_id']}'  ");
		$njzr = pdo_fetch("SELECT tid FROM ".tablename('wx_school_classify')." WHERE  sid ='{$temp['parentid']}'  ");
		$name = pdo_fetch("SELECT tname,openid,id FROM ".tablename('wx_school_teachers')." WHERE   id = '{$njzr['tid']}'  ");
		$njzr_temp[$njzr['tid']] = $name;
	}
	return $njzr_temp;
}

function is_njzr($tid){
	global $_GPC;
	if($tid == 'founder' || $tid == 'owner'){
		return false;
	}else{
		$temp = pdo_fetch("SELECT sid FROM ".tablename('wx_school_classify')." WHERE  type ='semester' And tid ='{$tid}'  ");
		if(!empty($temp)){
			return $temp;
		}else{
			return false;
		}
	}	
}

function getallnj($tid){ //获取当前年级主任所有管辖年级
	global $_GPC,$_W;
	$teacher =  pdo_fetch("SELECT status FROM ".tablename('wx_school_teachers')." WHERE  id ='{$tid}'  and schoolid='{$_GPC['schoolid']}' And weid='{$_W['uniacid']}'  ");
	if($teacher['status'] == 2){
		$temp = pdo_fetchall("SELECT sid,sname FROM ".tablename('wx_school_classify')." WHERE  type ='semester' and schoolid='{$_GPC['schoolid']}' And weid='{$_W['uniacid']}'  ");
	}else{
		$temp = pdo_fetchall("SELECT sid,sname FROM ".tablename('wx_school_classify')." WHERE  type ='semester' And tid ='{$tid}'  and schoolid='{$_GPC['schoolid']}' And weid='{$_W['uniacid']}'  ");
	}
	if(!empty($temp))
		return $temp;
	else
		return 0;
}

function getalljsfz($schoolid){ //获取本校所有教师分组
	$list = pdo_fetchall("SELECT sid,sname FROM ".tablename('wx_school_classify')." WHERE  type ='jsfz' And schoolid= '{$schoolid}' ");
	if(!empty($list)){
		return $list;
	}else{
		return false;
	}	
}

function is_xz($tid){
	global $_W;
	 $isxz = pdo_fetch("SELECT * FROM " . tablename('wx_school_teachers') . " where weid = :weid AND id = :id", array(':weid' => $_W ['uniacid'], ':id' => $tid));
	if(!empty($isxz))
		return 1;
	else
		return 0;
}

function get_myalluser($weid,$openid,$schoolid){ //查询当前微信所有在该学校绑定的用户
	$user = pdo_fetchall("SELECT id,sid,tid FROM " . tablename('wx_school_user') . " where :weid = weid And :openid = openid And :schoolid = schoolid ORDER BY tid DESC, sid DESC ", array(
			':weid' => $weid,
			':openid' => $openid,
			':schoolid' => $schoolid
	));
	
	if($user){
		foreach($user as $key => $row){
			if(!empty($row['sid']) && empty($row['tid']))
			{
				$student = pdo_fetch("SELECT id,s_name,bj_id FROM " . tablename('wx_school_students') . " where id=:id ", array(':id' => $row['sid']));
				$bajinam = pdo_fetch("SELECT sname FROM " . tablename('wx_school_classify') . " where sid = :sid ", array(':sid' => $student['bj_id']));
				$user[$key]['s_name'] = $student['s_name'];
				$user[$key]['bjname'] = $bajinam['sname'];
				$user[$key]['sid'] = $student['id'];  
				$user[$key]['type'] = 1;
			}elseif(empty($row['sid']) && !empty($row['tid']))
			{
				$teacher = pdo_fetch("SELECT id,tname FROM " . tablename('wx_school_teachers') . " where id=:id ", array(':id' => $row['tid']));
				$user[$key]['tname'] = $teacher['tname'];
				$user[$key]['tid'] = $teacher['id'];  
				$user[$key]['type'] = 2;
			}
			
		}
		return $user;
	}else{
		return false;
	}
}

function checkvers(){
	load()->func('communication');
	$url = 'http%3a%2f%2fauth.7mao.cc%2fapi%2fgethls.php';
	$data = array(
		'checkver'   => 'checkver',
		'oauthurl' => getoauthurl()
	);	
	$postdata = ihttp_post(urldecode($url), $data);
	if($postdata['code'] ==200){
		$respoed = json_decode($postdata['content'],true);
		if($respoed){
			return($respoed['versions']);
		}
		exit;
	}else{
		return ("访问服务器失败,请检测您的服务器相关设置,错误代码".$postdata['code']);
		exit;				
	}
}

function get_myname($weid,$userid,$schoolid){ //查询当前微信所有在该学校绑定的用户
	$user = pdo_fetch("SELECT id,sid,tid,pard FROM " . tablename('wx_school_user') . " where :weid = weid And :id = id And :schoolid = schoolid ORDER BY tid DESC, sid DESC ", array(
			':weid' => $weid,
			':id' => $userid,
			':schoolid' => $schoolid
	));
	
	if($user){

			if(!empty($user['sid']) && empty($user['tid']))
			{
				$student = pdo_fetch("SELECT id,s_name,bj_id FROM " . tablename('wx_school_students') . " where id=:id ", array(':id' => $user['sid']));
				$bajinam = pdo_fetch("SELECT sname FROM " . tablename('wx_school_classify') . " where sid = :sid ", array(':sid' => $student['bj_id']));
				$user['s_name'] = $student['s_name'];
				$user['bjname'] = $bajinam['sname'];
				$user['sid'] = $student['id'];  
				$user['type'] = 1;
			}elseif(empty($user['sid']) && !empty($user['tid']))
			{
				$teacher = pdo_fetch("SELECT id,tname FROM " . tablename('wx_school_teachers') . " where id=:id ", array(':id' => $user['tid']));
				$user['tname'] = $teacher['tname'];
				$user['tid'] = $teacher['id'];  
				$user['type'] = 2;
			}
			
		
		return $user;
	}else{
		return false;
	}
}

function checkverstype(){
	load()->func('communication');
	$url = 'http%3a%2f%2fauth.7mao.cc%2fapi%2fgethls.php';
	$data = array(
		'checkver'   => 'checkver',
		'oauthurl' => getoauthurl()
	);	
	$postdata = ihttp_post(urldecode($url), $data);
	if($postdata['code'] ==200){
		$respoed = json_decode($postdata['content'],true);
		if($respoed){
			return($respoed['ver_type']);
		}
		exit;
	}else{
		return ("访问服务器失败,请检测您的服务器相关设置,错误代码".$postdata['code']);
		exit;				
	}
}

function checkverstypeforhtml(){
	load()->func('communication');
	$url = 'http%3a%2f%2fauth.7mao.cc%2fapi%2fgethls.php';
	$data = array(
		'checkver'   => 'checkver',
		'forhtml'   => 'forhtml',
		'oauthurl' => getoauthurl()
	);	
	$postdata = ihttp_post(urldecode($url), $data);
	if($postdata['code'] ==200){
		$respoed = json_decode($postdata['content'],true);
		if($respoed){
			return($respoed['log']);
		}
		exit;
	}else{
		return ("访问服务器失败,请检测您的服务器相关设置,错误代码".$postdata['code']);
		exit;				
	}
}

function check_sales($sale){
	load()->func('communication');
	$url = 'http%3a%2f%2fauth.7mao.cc%2fapi%2fsaleapi.php';
	$data = array(
		'sale'   => $sale,
		'checkver'   => 'checkver',
		'oauthurl' => getoauthurl()
	);	
	$postdata = ihttp_post(urldecode($url), $data);
	if($postdata['code'] ==200){
		$respoed = json_decode($postdata['content'],true);
		if($respoed){
			return($respoed['sale']);
		}
		exit;
	}else{
		return ("访问服务器失败,请检测您的服务器相关设置,错误代码".$postdata['code']);
		exit;				
	}
}

function check_apps($app){
	load()->func('communication');
	$url = 'http%3a%2f%2fauth.7mao.cc%2fapi%2fsaleapi.php';
	$data = array(
		'app'   => $app,
		'checkver'   => 'app',
		'oauthurl' => getoauthurl()
	);	
	$postdata = ihttp_post(urldecode($url), $data);
	if($postdata['code'] ==200){
		$respoed = json_decode($postdata['content'],true);
		if($respoed){
			return($respoed['app']);
		}
		exit;
	}else{
		return ("访问服务器失败,请检测您的服务器相关设置,错误代码".$postdata['code']);
		exit;				
	}
}
function check_app($name,$weid,$schoolid){
	$check_app = pdo_fetch("SELECT * FROM " . GetTableName('app') . " WHERE weid = '{$weid}' And schoolid = '{$schoolid}' ");
	if(check_apps($name) && $check_app[$name] == 1){
		return true;
	}else{
		return false;
	}
}
function get_device_type() {
	 //全部变成小写字母
	 $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	 $type = 'other';
	 //分别进行判断
	 if(strpos($agent, 'iphone') || strpos($agent, 'ipad'))
	{
	 $type = 'ios';
	 } 
	  
	 if(strpos($agent, 'android'))
	{
	 $type = 'android';
	 }
	 return $type;
}

function get_myallclass_this_school($weid,$openid,$schoolid){ //查询绑定学生所有班级信息(当前学校)
	$user = pdo_fetchall("SELECT id,sid FROM " . tablename('wx_school_user') . " where :weid = weid And :openid = openid And schoolid=:schoolid And :tid = tid", array(
			':weid' => $weid,
			':openid' => $openid,
			':schoolid' => $schoolid,
			':tid' => 0
	));
	if($user){
		foreach($user as $key => $row){
			$student = pdo_fetch("SELECT id,s_name,bj_id,points FROM " . tablename('wx_school_students') . " where id=:id ", array(':id' => $row['sid']));
			$bajinam = pdo_fetch("SELECT sname FROM " . tablename('wx_school_classify') . " where sid = :sid ", array(':sid' => $student['bj_id']));
			$user[$key]['s_name'] = $student['s_name'];
			$user[$key]['bjname'] = $bajinam['sname'];
			$user[$key]['sid'] = $student['id']; 
			$user[$key]['points'] = $student['points']; 			
		}
		return $user;
	}else{
		return false;
	}
}

//获取权限对应分组
function GetFzByQx ($qx,$type,$schoolid){
	$qxid = 0;
	switch ( $qx )	{
		//s审核教师请假
		case 'shjsqj':
			$qxid = 2001002;
			break;		
		default:
			$qxid = $qx;
			break;
	}  
	$fzlist =  pdo_fetchall("SELECT fzid FROM " . tablename('wx_school_fzqx') . " where qxid='{$qxid}' And type='{$type}' and schoolid = '{$schoolid}'");
	if($fzlist){
		$fzstr = '';
		foreach( $fzlist as $key => $value )
		{
			$fzstr .=$value['fzid'].",";
		}
		$fzstr = trim($fzstr,",");
		return $fzstr;
	}
}

function IsHasQx($tid,$qx,$type,$schoolid)
{
	$logo = pdo_fetch("SELECT is_qx FROM " . tablename('wx_school_index') . " WHERE id = '{$schoolid}'");
	$qxid = 0;
	switch ( $qx )
	{
		//s审核教师请假
		case 'shjsqj':
			$qxid = 2001002;
			break;		
		default:
			$qxid = $qx;
			break;
	}
	if(!empty($tid)){

	
		if($tid !='founder' && $tid !='owner' && $tid !='vice_founder' && $tid !='clerk'){ 
			$teacher =  pdo_fetch("SELECT fz_id FROM " . tablename('wx_school_teachers') . " where id={$tid} And schoolid = {$schoolid}"); 
			$fz =  pdo_fetch("SELECT id FROM " . tablename('wx_school_fzqx') . " where qxid={$qxid} And type={$type} and schoolid = {$schoolid} And fzid={$teacher['fz_id']}");
			if(!empty($fz)){
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}else{
		return false;
	}
}

function GetSchoolTypeFromLocal($schoolid,$weid){
	if(unitchecksctype() == true){
		$data = pdo_fetch("SELECT issale FROM " . tablename('wx_school_index') . " where weid='{$weid}'  and id = '{$schoolid}'");
		if($data['issale'] == 1){
			return true;
		}elseif(empty($data['issale']) || $data['issale'] == 0){
			return false;
		}
	}else{
		$type = readschootyep();
		return $type;
	}
}

function getkcbiao($schoolid,$time,$bj_id) {
	$date = date('Y-m-d',$time);
	$riqi = explode ('-', $date);
	$starttime = mktime(0,0,0,$riqi[1],$riqi[2],$riqi[0]);
	$endtime = $starttime + 86399;
	$condition = " AND begintime < '{$starttime}' AND endtime > '{$endtime}'";
	$cook = pdo_fetch("SELECT * FROM " . tablename('wx_school_timetable') . " WHERE schoolid = :schoolid And bj_id = :bj_id And ishow = 1 $condition", array(':schoolid' => $schoolid,':bj_id' => $bj_id));
	if($cook['monday'] || $cook['tuesday'] || $cook['wednesday'] || $cook['thursday'] || $cook['friday'] || $cook['saturday'] || $cook['sunday']){
		$week = date("w",$endtime);
			if($week ==1){
				if($cook['monday']){
					$thecook = iunserializer($cook['monday']);
					$sd_1 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_1_sd']}'");
					$sd_2 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_2_sd']}'");
					$sd_3 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_3_sd']}'");
					$sd_4 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_4_sd']}'");
					$sd_5 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_5_sd']}'");
					$sd_6 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_6_sd']}'");
					$sd_7 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_7_sd']}'");
					$sd_8 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_8_sd']}'");
					$sd_9 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_9_sd']}'");
					$sd_10 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_10_sd']}'");
					$sd_11 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_11_sd']}'");
					$sd_12 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_12_sd']}'");
					$km_1 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_1_km']}'");
					$km_2 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_2_km']}'");
					$km_3 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_3_km']}'");
					$km_4 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_4_km']}'");
					$km_5 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_5_km']}'");
					$km_6 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_6_km']}'");
					$km_7 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_7_km']}'");
					$km_8 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_8_km']}'");
					$km_9 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_9_km']}'");
					$km_10 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_10_km']}'");
					$km_11 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_11_km']}'");
					$km_12 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['mon_12_km']}'");
					$tehcer1 = findtecher($bj_id,$schoolid,$thecook['mon_1_km']);
					$tehcer2 = findtecher($bj_id,$schoolid,$thecook['mon_2_km']);
					$tehcer3 = findtecher($bj_id,$schoolid,$thecook['mon_3_km']);
					$tehcer4 = findtecher($bj_id,$schoolid,$thecook['mon_4_km']);
					$tehcer5 = findtecher($bj_id,$schoolid,$thecook['mon_5_km']);
					$tehcer6 = findtecher($bj_id,$schoolid,$thecook['mon_6_km']);
					$tehcer7 = findtecher($bj_id,$schoolid,$thecook['mon_7_km']);
					$tehcer8 = findtecher($bj_id,$schoolid,$thecook['mon_8_km']);
					$tehcer9 = findtecher($bj_id,$schoolid,$thecook['mon_9_km']);
					$tehcer10 = findtecher($bj_id,$schoolid,$thecook['mon_10_km']);
					$tehcer11 = findtecher($bj_id,$schoolid,$thecook['mon_11_km']);
					$tehcer12 = findtecher($bj_id,$schoolid,$thecook['mon_12_km']);							
				}
			}
			if($week ==2){
				if($cook['tuesday']){
					$thecook = iunserializer($cook['tuesday']);
					$sd_1 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_1_sd']}'");
					$sd_2 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_2_sd']}'");
					$sd_3 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_3_sd']}'");
					$sd_4 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_4_sd']}'");
					$sd_5 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_5_sd']}'");
					$sd_6 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_6_sd']}'");
					$sd_7 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_7_sd']}'");
					$sd_8 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_8_sd']}'");
					$sd_9 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_9_sd']}'");
					$sd_10 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_10_sd']}'");
					$sd_11 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_11_sd']}'");
					$sd_12 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_12_sd']}'");
					$km_1 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_1_km']}'");
					$km_2 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_2_km']}'");
					$km_3 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_3_km']}'");
					$km_4 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_4_km']}'");
					$km_5 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_5_km']}'");
					$km_6 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_6_km']}'");
					$km_7 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_7_km']}'");
					$km_8 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_8_km']}'");
					$km_9 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_9_km']}'");
					$km_10 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_10_km']}'");
					$km_11 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_11_km']}'");
					$km_12 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['tus_12_km']}'");
					$tehcer1 = findtecher($bj_id,$schoolid,$thecook['tus_1_km']);
					$tehcer2 = findtecher($bj_id,$schoolid,$thecook['tus_2_km']);
					$tehcer3 = findtecher($bj_id,$schoolid,$thecook['tus_3_km']);
					$tehcer4 = findtecher($bj_id,$schoolid,$thecook['tus_4_km']);
					$tehcer5 = findtecher($bj_id,$schoolid,$thecook['tus_5_km']);
					$tehcer6 = findtecher($bj_id,$schoolid,$thecook['tus_6_km']);
					$tehcer7 = findtecher($bj_id,$schoolid,$thecook['tus_7_km']);
					$tehcer8 = findtecher($bj_id,$schoolid,$thecook['tus_8_km']);
					$tehcer9 = findtecher($bj_id,$schoolid,$thecook['tus_9_km']);
					$tehcer10 = findtecher($bj_id,$schoolid,$thecook['tus_10_km']);
					$tehcer11 = findtecher($bj_id,$schoolid,$thecook['tus_11_km']);
					$tehcer12 = findtecher($bj_id,$schoolid,$thecook['tus_12_km']);						
				}		
			}
			if($week ==3){
				if($cook['wednesday']){
					$thecook = iunserializer($cook['wednesday']);	
					$sd_1 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_1_sd']}'");
					$sd_2 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_2_sd']}'");
					$sd_3 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_3_sd']}'");
					$sd_4 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_4_sd']}'");
					$sd_5 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_5_sd']}'");
					$sd_6 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_6_sd']}'");
					$sd_7 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_7_sd']}'");
					$sd_8 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_8_sd']}'");
					$sd_9 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_9_sd']}'");
					$sd_10 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_10_sd']}'");
					$sd_11 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_11_sd']}'");
					$sd_12 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_12_sd']}'");
					$km_1 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_1_km']}'");
					$km_2 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_2_km']}'");
					$km_3 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_3_km']}'");
					$km_4 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_4_km']}'");
					$km_5 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_5_km']}'");
					$km_6 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_6_km']}'");
					$km_7 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_7_km']}'");
					$km_8 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_8_km']}'");
					$km_9 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_9_km']}'");
					$km_10 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_10_km']}'");
					$km_11 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_11_km']}'");
					$km_12 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['wed_12_km']}'");
					$tehcer1 = findtecher($bj_id,$schoolid,$thecook['wed_1_km']);
					$tehcer2 = findtecher($bj_id,$schoolid,$thecook['wed_2_km']);
					$tehcer3 = findtecher($bj_id,$schoolid,$thecook['wed_3_km']);
					$tehcer4 = findtecher($bj_id,$schoolid,$thecook['wed_4_km']);
					$tehcer5 = findtecher($bj_id,$schoolid,$thecook['wed_5_km']);
					$tehcer6 = findtecher($bj_id,$schoolid,$thecook['wed_6_km']);
					$tehcer7 = findtecher($bj_id,$schoolid,$thecook['wed_7_km']);
					$tehcer8 = findtecher($bj_id,$schoolid,$thecook['wed_8_km']);
					$tehcer9 = findtecher($bj_id,$schoolid,$thecook['wed_9_km']);
					$tehcer10 = findtecher($bj_id,$schoolid,$thecook['wed_10_km']);
					$tehcer11 = findtecher($bj_id,$schoolid,$thecook['wed_11_km']);
					$tehcer12 = findtecher($bj_id,$schoolid,$thecook['wed_12_km']);							
				}		
			}
			if($week ==4){
				if($cook['thursday']){
					$thecook = iunserializer($cook['thursday']);
					$sd_1 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_1_sd']}'");
					$sd_2 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_2_sd']}'");
					$sd_3 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_3_sd']}'");
					$sd_4 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_4_sd']}'");
					$sd_5 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_5_sd']}'");
					$sd_6 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_6_sd']}'");
					$sd_7 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_7_sd']}'");
					$sd_8 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_8_sd']}'");
					$sd_9 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_9_sd']}'");
					$sd_10 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_10_sd']}'");
					$sd_11 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_11_sd']}'");
					$sd_12 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_12_sd']}'");
					$km_1 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_1_km']}'");
					$km_2 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_2_km']}'");
					$km_3 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_3_km']}'");
					$km_4 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_4_km']}'");
					$km_5 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_5_km']}'");
					$km_6 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_6_km']}'");
					$km_7 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_7_km']}'");
					$km_8 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_8_km']}'");
					$km_9 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_9_km']}'");
					$km_10 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_10_km']}'");
					$km_11 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_11_km']}'");
					$km_12 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['thu_12_km']}'");
					$tehcer1 = findtecher($bj_id,$schoolid,$thecook['thu_1_km']);
					$tehcer2 = findtecher($bj_id,$schoolid,$thecook['thu_2_km']);
					$tehcer3 = findtecher($bj_id,$schoolid,$thecook['thu_3_km']);
					$tehcer4 = findtecher($bj_id,$schoolid,$thecook['thu_4_km']);
					$tehcer5 = findtecher($bj_id,$schoolid,$thecook['thu_5_km']);
					$tehcer6 = findtecher($bj_id,$schoolid,$thecook['thu_6_km']);
					$tehcer7 = findtecher($bj_id,$schoolid,$thecook['thu_7_km']);
					$tehcer8 = findtecher($bj_id,$schoolid,$thecook['thu_8_km']);
					$tehcer9 = findtecher($bj_id,$schoolid,$thecook['thu_9_km']);
					$tehcer10 = findtecher($bj_id,$schoolid,$thecook['thu_10_km']);
					$tehcer11 = findtecher($bj_id,$schoolid,$thecook['thu_11_km']);
					$tehcer12 = findtecher($bj_id,$schoolid,$thecook['thu_12_km']);						
				}		
			}
			if($week ==5){
				if($cook['friday']){
					$thecook = iunserializer($cook['friday']);	
					$sd_1 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_1_sd']}'");
					$sd_2 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_2_sd']}'");
					$sd_3 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_3_sd']}'");
					$sd_4 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_4_sd']}'");
					$sd_5 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_5_sd']}'");
					$sd_6 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_6_sd']}'");
					$sd_7 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_7_sd']}'");
					$sd_8 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_8_sd']}'");
					$sd_9 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_9_sd']}'");
					$sd_10 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_10_sd']}'");
					$sd_11 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_11_sd']}'");
					$sd_12 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_12_sd']}'");
					$km_1 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_1_km']}'");
					$km_2 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_2_km']}'");
					$km_3 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_3_km']}'");
					$km_4 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_4_km']}'");
					$km_5 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_5_km']}'");
					$km_6 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_6_km']}'");
					$km_7 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_7_km']}'");
					$km_8 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_8_km']}'");
					$km_9 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_9_km']}'");
					$km_10 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_10_km']}'");
					$km_11 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_11_km']}'");
					$km_12 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['fri_12_km']}'");
					$tehcer1 = findtecher($bj_id,$schoolid,$thecook['fri_1_km']);
					$tehcer2 = findtecher($bj_id,$schoolid,$thecook['fri_2_km']);
					$tehcer3 = findtecher($bj_id,$schoolid,$thecook['fri_3_km']);
					$tehcer4 = findtecher($bj_id,$schoolid,$thecook['fri_4_km']);
					$tehcer5 = findtecher($bj_id,$schoolid,$thecook['fri_5_km']);
					$tehcer6 = findtecher($bj_id,$schoolid,$thecook['fri_6_km']);
					$tehcer7 = findtecher($bj_id,$schoolid,$thecook['fri_7_km']);
					$tehcer8 = findtecher($bj_id,$schoolid,$thecook['fri_8_km']);
					$tehcer9 = findtecher($bj_id,$schoolid,$thecook['fri_9_km']);
					$tehcer10 = findtecher($bj_id,$schoolid,$thecook['fri_10_km']);
					$tehcer11 = findtecher($bj_id,$schoolid,$thecook['fri_11_km']);
					$tehcer12 = findtecher($bj_id,$schoolid,$thecook['fri_12_km']);						
				}		
			}
			if($week ==6){
				if($cook['saturday']){
					$thecook = iunserializer($cook['saturday']);
					$sd_1 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_1_sd']}'");
					$sd_2 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_2_sd']}'");
					$sd_3 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_3_sd']}'");
					$sd_4 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_4_sd']}'");
					$sd_5 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_5_sd']}'");
					$sd_6 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_6_sd']}'");
					$sd_7 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_7_sd']}'");
					$sd_8 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_8_sd']}'");
					$sd_9 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_9_sd']}'");
					$sd_10 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_10_sd']}'");
					$sd_11 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_11_sd']}'");
					$sd_12 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_12_sd']}'");
					$km_1 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_1_km']}'");
					$km_2 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_2_km']}'");
					$km_3 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_3_km']}'");
					$km_4 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_4_km']}'");
					$km_5 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_5_km']}'");
					$km_6 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_6_km']}'");
					$km_7 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_7_km']}'");
					$km_8 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_8_km']}'");
					$km_9 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_9_km']}'");
					$km_10 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_10_km']}'");
					$km_11 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_11_km']}'");
					$km_12 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sat_12_km']}'");
					$tehcer1 = findtecher($bj_id,$schoolid,$thecook['sat_1_km']);
					$tehcer2 = findtecher($bj_id,$schoolid,$thecook['sat_2_km']);
					$tehcer3 = findtecher($bj_id,$schoolid,$thecook['sat_3_km']);
					$tehcer4 = findtecher($bj_id,$schoolid,$thecook['sat_4_km']);
					$tehcer5 = findtecher($bj_id,$schoolid,$thecook['sat_5_km']);
					$tehcer6 = findtecher($bj_id,$schoolid,$thecook['sat_6_km']);
					$tehcer7 = findtecher($bj_id,$schoolid,$thecook['sat_7_km']);
					$tehcer8 = findtecher($bj_id,$schoolid,$thecook['sat_8_km']);
					$tehcer9 = findtecher($bj_id,$schoolid,$thecook['sat_9_km']);
					$tehcer10 = findtecher($bj_id,$schoolid,$thecook['sat_10_km']);
					$tehcer11 = findtecher($bj_id,$schoolid,$thecook['sat_11_km']);
					$tehcer12 = findtecher($bj_id,$schoolid,$thecook['sat_12_km']);						
				}		
			}
			if($week == 0){
				if($cook['sunday']){
					$thecook = iunserializer($cook['sunday']);	
					$sd_1 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_1_sd']}'");
					$sd_2 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_2_sd']}'");
					$sd_3 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_3_sd']}'");
					$sd_4 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_4_sd']}'");
					$sd_5 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_5_sd']}'");
					$sd_6 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_6_sd']}'");
					$sd_7 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_7_sd']}'");
					$sd_8 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_8_sd']}'");
					$sd_9 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_9_sd']}'");
					$sd_10 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_10_sd']}'");
					$sd_11 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_11_sd']}'");
					$sd_12 = pdo_fetch("SELECT sname,sd_start,sd_end FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_12_sd']}'");
					$km_1 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_1_km']}'");
					$km_2 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_2_km']}'");
					$km_3 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_3_km']}'");
					$km_4 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_4_km']}'");
					$km_5 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_5_km']}'");
					$km_6 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_6_km']}'");
					$km_7 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_7_km']}'");
					$km_8 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_8_km']}'");
					$km_9 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_9_km']}'");
					$km_10 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_10_km']}'");
					$km_11 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_11_km']}'");
					$km_12 = pdo_fetch("SELECT sname,icon FROM " . tablename('wx_school_classify') . " WHERE sid = '{$thecook['sun_12_km']}'");
					$tehcer1 = findtecher($bj_id,$schoolid,$thecook['sun_1_km']);
					$tehcer2 = findtecher($bj_id,$schoolid,$thecook['sun_2_km']);
					$tehcer3 = findtecher($bj_id,$schoolid,$thecook['sun_3_km']);
					$tehcer4 = findtecher($bj_id,$schoolid,$thecook['sun_4_km']);
					$tehcer5 = findtecher($bj_id,$schoolid,$thecook['sun_5_km']);
					$tehcer6 = findtecher($bj_id,$schoolid,$thecook['sun_6_km']);
					$tehcer7 = findtecher($bj_id,$schoolid,$thecook['sun_7_km']);
					$tehcer8 = findtecher($bj_id,$schoolid,$thecook['sun_8_km']);
					$tehcer9 = findtecher($bj_id,$schoolid,$thecook['sun_9_km']);
					$tehcer10 = findtecher($bj_id,$schoolid,$thecook['sun_10_km']);
					$tehcer11 = findtecher($bj_id,$schoolid,$thecook['sun_11_km']);
					$tehcer12 = findtecher($bj_id,$schoolid,$thecook['sun_12_km']);
					
				}		
			}
			if($km_1 || $km_2 || $km_3 || $km_4 || $km_5 || $km_6 || $km_7 || $km_8 || $km_9 || $km_10 || $km_11 || $km_12){
				if($km_1){
					$result[0]['week'] = $week;
					$result[0]['section'] = 1;
					$result[0]['course_name'] = $km_1['sname'];
					$result[0]['start_time'] = date('H:i',$sd_1['sd_start']);
					$result[0]['end_time'] = date('H:i',$sd_1['sd_end']);
					$result[0]['teacher_name'] = $tehcer1['tname'];
					$result[0]['teacher_img'] = $tehcer1['thumb'];
				}
				if($km_2){
					$result[1]['week'] = $week;
					$result[1]['section'] = 2;
					$result[1]['course_name'] = $km_2['sname'];
					$result[1]['start_time'] = date('H:i',$sd_2['sd_start']);
					$result[1]['end_time'] = date('H:i',$sd_2['sd_end']);
					$result[1]['teacher_name'] = $tehcer2['tname'];
					$result[1]['teacher_img'] = $tehcer2['thumb'];
				}
				if($km_3){
					$result[2]['week'] = $week;
					$result[2]['section'] = 3;
					$result[2]['course_name'] = $km_3['sname'];
					$result[2]['start_time'] = date('H:i',$sd_3['sd_start']);
					$result[2]['end_time'] = date('H:i',$sd_3['sd_end']);
					$result[2]['teacher_name'] = $tehcer3['tname'];
					$result[2]['teacher_img'] = $tehcer3['thumb'];
				}
				if($km_4){
					$result[3]['week'] = $week;
					$result[3]['section'] = 4;
					$result[3]['course_name'] = $km_4['sname'];
					$result[3]['start_time'] = date('H:i',$sd_4['sd_start']);
					$result[3]['end_time'] = date('H:i',$sd_4['sd_end']);
					$result[3]['teacher_name'] = $tehcer4['tname'];
					$result[3]['teacher_img'] = $tehcer4['thumb'];
				}
				if($km_5){
					$result[4]['week'] = $week;
					$result[4]['section'] = 5;
					$result[4]['course_name'] = $km_5['sname'];
					$result[4]['start_time'] = date('H:i',$sd_5['sd_start']);
					$result[4]['end_time'] = date('H:i',$sd_5['sd_end']);
					$result[4]['teacher_name'] = $tehcer5['tname'];
					$result[4]['teacher_img'] = $tehcer5['thumb'];
				}
				if($km_6){
					$result[5]['week'] = $week;
					$result[5]['section'] = 6;
					$result[5]['course_name'] = $km_6['sname'];
					$result[5]['start_time'] = date('H:i',$sd_6['sd_start']);
					$result[5]['end_time'] = date('H:i',$sd_6['sd_end']);
					$result[5]['teacher_name'] = $tehcer6['tname'];
					$result[5]['teacher_img'] = $tehcer6['thumb'];
				}
				if($km_7){
					$result[6]['week'] = $week;
					$result[6]['section'] = 7;
					$result[6]['course_name'] = $km_7['sname'];
					$result[6]['start_time'] = date('H:i',$sd_7['sd_start']);
					$result[6]['end_time'] = date('H:i',$sd_7['sd_end']);
					$result[6]['teacher_name'] = $tehcer7['tname'];
					$result[6]['teacher_img'] = $tehcer7['thumb'];
				}
				if($km_8){
					$result[7]['week'] = $week;
					$result[7]['section'] = 8;
					$result[7]['course_name'] = $km_8['sname'];
					$result[7]['start_time'] = date('H:i',$sd_8['sd_start']);
					$result[7]['end_time'] = date('H:i',$sd_8['sd_end']);
					$result[7]['teacher_name'] = $tehcer8['tname'];
					$result[7]['teacher_img'] = $tehcer8['thumb'];
				}
				if($km_9){
					$result[8]['week'] = $week;
					$result[8]['section'] = 9;
					$result[8]['course_name'] = $km_9['sname'];
					$result[8]['start_time'] = date('H:i',$sd_9['sd_start']);
					$result[8]['end_time'] = date('H:i',$sd_9['sd_end']);
					$result[8]['teacher_name'] = $tehcer9['tname'];
					$result[8]['teacher_img'] = $tehcer9['thumb'];
				}
				if($km_10){
					$result[9]['week'] = $week;
					$result[9]['section'] = 10;
					$result[9]['course_name'] = $km_10['sname'];
					$result[9]['start_time'] = date('H:i',$sd_10['sd_start']);
					$result[9]['end_time'] = date('H:i',$sd_10['sd_end']);
					$result[9]['teacher_name'] = $tehcer10['tname'];
					$result[9]['teacher_img'] = $tehcer10['thumb'];
				}
				if($km_11){
					$result[10]['week'] = $week;
					$result[10]['section'] = 11;
					$result[10]['course_name'] = $km_11['sname'];
					$result[10]['start_time'] = date('H:i',$sd_11['sd_start']);
					$result[10]['end_time'] = date('H:i',$sd_11['sd_end']);
					$result[10]['teacher_name'] = $tehcer11['tname'];
					$result[10]['teacher_img'] = $tehcer11['thumb'];
				}
				if($km_12){
					$result[11]['week'] = $week;
					$result[11]['section'] = 12;
					$result[11]['course_name'] = $km_12['sname'];
					$result[11]['start_time'] = date('H:i',$sd_12['sd_start']);
					$result[11]['end_time'] = date('H:i',$sd_12['sd_end']);
					$result[11]['teacher_name'] = $tehcer12['tname'];
					$result[11]['teacher_img'] = $tehcer12['thumb'];
				}					
			}
	}
	return $result;
}

function makcodetype($url,$weid,$schoolid,$name,$site){
	load()->func('communication');
	$getbasicdata = getbasicdata($weid,$schoolid,$name,$site);
	$data = array(
		'checkver'   => 'upschool',
		'oauthurl' => getoauthurl(),
		'datas' => $getbasicdata
	);	
	$postdata = ihttp_post(urldecode($url), $data);
}

function getbasicdata($weid,$schoolid,$name,$site){
	mload()->model('sms');
	$data = getBasicset($weid,$schoolid);
	$data['wxname'] = $name;
	$data['ctrlurl'] = $site;
	return $data;
}

function GetSchoolType($schoolid,$weid){
	$type = GetSchoolTypeFromLocal($schoolid,$weid);
	return $type;
}
	
function findtecher($bj_id,$schoolid,$km_id){
	$class = pdo_fetch("SELECT tid FROM " . tablename('wx_school_user_class') . " where bj_id = :bj_id AND km_id = :km_id", array(':bj_id' => $bj_id, ':km_id' => $km_id));
	if($class){
		$teach = pdo_fetch("SELECT tname,thumb FROM " . tablename('wx_school_teachers') . " where id = :id", array(':id' => $class['tid']));
		$data['tname'] = $teach['tname'];
		$data['thumb'] = tomedia($teach['thumb']);
	}else{
		$school = pdo_fetch("SELECT tpic FROM " . tablename('wx_school_index') . " where id = :id", array(':id' => $schoolid));
		$data['tname'] = '未安排';
		$data['thumb'] = tomedia($school['tpic']);		
	}
	return $data;
}

//获取权限对应分组
function GetQxByFz ($fzid,$type,$schoolid)
{ 
	$qxlist =  pdo_fetchall("SELECT qxid FROM " . tablename('wx_school_fzqx') . " where fzid={$fzid} And type={$type} and schoolid = {$schoolid}");
	$qxstr = '';
	foreach( $qxlist as $key => $value )
	{
		$qxstr .=$value['qxid'].",";
	}
	$qxstr = trim($qxstr,",");
	return $qxstr;
}

   //按键值删除数组制定元素
function UnsetArrayByKey(&$arr, $key){ 
	  if(!array_key_exists($key, $arr)){ 
		return $arr; 
	  } 
	  $keys = array_keys($arr); 
	  $index = array_search($key, $keys); 
	  // var_dump($index);
	  if($index !== FALSE){ 
		array_splice($arr, $index, 1); 
	  } 
	  return $arr; 
}

function GetNotOverStr($schoolid,$weid){
		$bj = pdo_fetchall("SELECT sid,sname FROM " . tablename('wx_school_classify') . " where weid = :weid AND schoolid = :schoolid And type = :type and is_over!=:is_over ORDER BY CONVERT(sname USING gbk) ASC", array(':weid' => $weid, ':type' => 'theclass', ':schoolid' => $schoolid,':is_over'=>"2"));
		$nj = pdo_fetchall("SELECT sid,sname FROM " . tablename('wx_school_classify') . " where weid = :weid AND schoolid = :schoolid And type = :type and is_over!=:is_over ORDER BY CONVERT(sname USING gbk) ASC", array(':weid' => $weid, ':type' => 'semester', ':schoolid' => $schoolid,':is_over'=>"2"));
		$bj_str_temp = '0,';
		foreach($bj as $key_b=>$value_b){
			$bj_str_temp .=$value_b['sid'].",";
		}
		$bj_str = trim($bj_str_temp,",");
		$nj_str_temp = '0,';
		foreach($nj as $key_n=>$value_n){
			$nj_str_temp .=$value_n['sid'].",";
		}
		$nj_str = trim($nj_str_temp,",");
		$back['bj_str'] = $bj_str;
		$back['nj_str'] = $nj_str;
		
		return $back;
}

//是否养老公寓
function is_showyl(){
	global $_W;
	$oauthurl = getoauthurl();

	if( $oauthurl == "www.xiaobobo.club" )
	//if ( $oauthurl == "manger.weimeizhan.com" )
		return 1;
	else
		return 0;
}




function getFile($url, $save_dir = '', $filename = '', $type = 0) {  
    if (trim($url) == '') {  
        return false;  
    }  
    if (trim($save_dir) == '') {  
        $save_dir = './';  
    }  
    if (0 !== strrpos($save_dir, '/')) {  
        $save_dir.= '/';  
    }  
    //创建保存目录  
    if (!file_exists($save_dir) && !mkdir($save_dir, 0777, true)) {  
        return false;  
    }  
    //获取远程文件所采用的方法  
    if ($type) {  
        $ch = curl_init();  
        $timeout = 5;  
        curl_setopt($ch, CURLOPT_URL, $url);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);  
        $content = curl_exec($ch);  
        curl_close($ch);  
    } else {  
        ob_start();  
        readfile($url);  
        $content = ob_get_contents();  
        ob_end_clean();  
    }  
    //echo $content;  
    $size = strlen($content);  
    //文件大小  
    $fp2 = @fopen($save_dir . $filename, 'a');  
    fwrite($fp2, $content);  
    fclose($fp2);  
    unset($content, $url);  
    return array(  
        'file_name' => $filename,  
        'save_path' => $save_dir . $filename,  
        'file_size' => $size  
    );  
}  

function CreateZipAndDownload($zip_name1,$zip_path_arr){
	$zip_name = IA_ROOT.'/attachment/down/test'.time().'.zip';
//	var_dump($zip_name);
//	die();
	$zip = new ZipArchive();
	$res = $zip->open($zip_name, ZipArchive::CREATE);
	if ($res === TRUE){
		foreach ($zip_path_arr as $key=>$file) { 	//这里直接用原文件的名字进行打包，也可以直接命名，需要注意如果文件名字一样会导致后面文件覆盖前面的文件，所以建议重新命名     
			$new_filename = substr($file, strrpos($file, '/') + 1);
			//var_dump($file);
			$zip->addFile($file,basename($file));

		}
		$zip->close();
		$newname = IA_ROOT.'/attachment/down/zip'.$zip_name1;
		rename($zip_name,$newname);
		$zip_name = $newname;
		$filePath = $zip_name;
		$fileName = basename($filePath);
		$fp=fopen($filePath,"r"); 
		$file_size=filesize($filePath); 
		//下载文件需要用到的头 
		
		
		/*header("Content-Type: application/zip");     
		header("Content-Transfer-Encoding: Binary");      
		header("Content-Length: " . filesize($zip_name));     
		header("Content-Disposition: attachment; filename=\"" . basename($zip_name) . "\"");      
		readfile($zip_name);  */
		
		
		
		Header("Content-type: application/octet-stream"); 
		Header("Accept-Ranges: bytes"); 
		Header("Accept-Length:".$file_size); 
		Header("Content-Disposition: attachment; filename=".$fileName); 
		$buffer=1024;  //设置一次读取的字节数，每读取一次，就输出数据（即返回给浏览器）
		$file_count=0; //读取的总字节数
		//向浏览器返回数据 
		while(!feof($fp) && $file_count<$file_size){ 
			$file_con=fread($fp,$buffer); 
			$file_count+=$buffer; 
			echo $file_con; 
		} 
		fclose($fp);

		//下载完成后删除压缩包，临时文件夹
		if($file_count >= $file_size)
		{
			unlink($filePath);
		}
		$retu =  "finish";
		return $retu; 
	}
}

function GetRviewByQhAndNj($qhid,$njid,$schoolid){
    global $_W;
    $qhinfo = pdo_fetch("SELECT is_review,addedinfo,qhtype,qh_bjlist FROM " . tablename('wx_school_classify') . " where sid = '{$qhid}' And type='score' and schoolid = '{$schoolid}' ");
    if($qhinfo['is_review'] == 1){
        if($qhinfo['qhtype'] == 2){
            $this_bjlist = explode(",",$qhinfo['qh_bjlist']);
        }
        $this_addinfo = json_decode($qhinfo['addedinfo'],true);
        $subarr = explode(',', $this_addinfo['sub_arr']);
        $bjlist = pdo_fetchall("SELECT sname,sid,ssort FROM " . tablename('wx_school_classify') . " where type='theclass' and schoolid = '{$schoolid}' and parentid ='{$njid}' ");
        $back_data = array();
        $bj_score = array();
        $bj_allscore = array();
        foreach($bjlist as $key_b => $value_b){
            if($qhinfo['qhtype'] == 1 || ( $qhinfo['qhtype'] == 2 && in_array($value_b['sid'],$this_bjlist) )){
                $this_bj_allscore = 0 ;
                $studentcount = pdo_fetchcolumn("SELECT count(distinct id) FROM " . tablename('wx_school_students') . " where bj_id = '{$value_b['sid']}' And schoolid = '{$schoolid}' ");
                // $studentcount11 = pdo_fetchall("SELECT distinct id FROM " . tablename('wx_school_students') . " where bj_id = '{$value_b['sid']}' And schoolid = '{$schoolid}' ");
                $reviewcount = round($studentcount * $this_addinfo['review_per'] / 100); //考察人数
                $back_data[$value_b['sid']] = array();
                $back_data[$value_b['sid']]['sname'] = $value_b['sname'];
                $back_data[$value_b['sid']]['bjid'] =$value_b['sid'];
                $rowcount = count($subarr) + 1 ;
                foreach($subarr as $row){
                    //当前科目平均分
                    $kminfo = pdo_fetch("SELECT sname FROM " . tablename('wx_school_classify') . " where sid = '{$row}' And type='subject' and schoolid = '{$schoolid}' ");
                    $avg_score_b =   pdo_fetchcolumn("SELECT AVG(my_score) FROM(SELECT my_score FROM " . tablename('wx_school_score') . " where bj_id = '{$value_b['sid']}' and qh_id = '{$qhid}' And schoolid = '{$schoolid}' and km_id = '{$row}' ORDER BY my_score+0 DESC LIMIT 0 , {$reviewcount} ) as A " );
                    $avg_score = round($avg_score_b, 2);
                    $passNum =  pdo_fetchcolumn("SELECT count(distinct sid) FROM " . tablename('wx_school_score') . " where bj_id = '{$value_b['sid']}' and qh_id = '{$qhid}' And schoolid = '{$schoolid}' and km_id = {$row} and my_score+0>= 60 ORDER BY my_score+0 DESC  ");
                    $avg_per =round($passNum / $reviewcount * 100 , 2)>100?100:round($passNum / $reviewcount * 100 , 2);
                    $back_data[$value_b['sid']]['data'][$row]['avg_score'] = $avg_score;
                    $back_data[$value_b['sid']]['data'][$row]['reviewcount'] = $reviewcount;
                    $back_data[$value_b['sid']]['data'][$row]['avg_per'] = $avg_per;
                    $back_data[$value_b['sid']]['data'][$row]['km_name'] = $kminfo['sname'];
                    $back_data[$value_b['sid']]['data'][$row]['final_score'] = $avg_score + $avg_per ;
                    $bj_score[$row][] = $avg_score + $avg_per ;
                    $this_bj_allscore += $avg_score + $avg_per ;
                }
                $back_data[$value_b['sid']]['allscore']['score'] = $this_bj_allscore;
                $bj_allscore[] = $this_bj_allscore;
                $bjssort[] = $value_b['ssort'] ?$value_b['ssort']: 0 ;
            }
        }


        foreach($bj_score as $key_b=>$row_b){
            rsort($bj_score[$key_b]);
            foreach($back_data as $key_bj=> $value_bj){
                $this_bj_score =  $value_bj['data'][$key_b]['final_score'];
                $b= array_search($this_bj_score, $bj_score[$key_b]);
                $back_data[$key_bj]['data'][$key_b]['rank']= $b + 1 ;
            }
        }
		if(!empty($bjssort)){
			array_multisort($bjssort, SORT_DESC, $back_data);

			rsort($bj_allscore);
			foreach($back_data as $key_bj=> $value_bj){
				$this_score_t =  $value_bj['allscore']['score'];
				$b= array_search($this_score_t, $bj_allscore);
				$back_data[$key_bj]['allscore']['rank_all']= $b + 1 ;
			}
			$result['status'] = true;
			$result['data'] = $back_data;
			$result['rowcount'] = $rowcount;
		}else{
			$result['status'] = false;
			$result['info'] = "当前年级无成绩";
		}
    }else{
		$result['status'] = false;
		$result['info'] = "当前期号未设置考察";
    }
    return  $result;
}


function GetDatesetWithBj($schoolid,$weid){
	global $_W;
	$nowdate = date("Y-n-j",time());
	$nowyear = date("Y",time());
	$nowweek = date("w",time()); 
	$bjlist = pdo_fetchall("SELECT sid,datesetid,sname  FROM " . tablename('wx_school_classify') . " WHERE weid = '{$weid}' And schoolid = '{$schoolid}' and type='theclass' ");
	$result = array();
	foreach($bjlist as $key=>$isfz){
		$result[$isfz['sid']]['sname'] = $isfz['sname'];
		$todaytype = 0;
		$todaytimeset = array(
			array(
				'start'=>'00:00',
				'end'  =>'23:59'
			),
		); 
		if(!empty($isfz['datesetid'])){
			$checkdateset      =  pdo_fetch("SELECT * FROM " . tablename('wx_school_checkdateset') . " WHERE weid = '{$weid}' And schoolid = {$schoolid} and  id = '{$isfz['datesetid']}'");
			$checkdateset_holi =  pdo_fetch("SELECT * FROM " . tablename('wx_school_checkdatedetail') . " WHERE weid = '{$weid}' And schoolid = {$schoolid} and  checkdatesetid = '{$isfz['datesetid']}' and year = '{$nowyear}' ");
			
			$checktime         =  pdo_fetchall("SELECT * FROM " . tablename('wx_school_checktimeset') . " WHERE weid = '{$weid}' And schoolid = {$schoolid} and  checkdatesetid = '{$isfz['datesetid']}' and date = '{$nowdate}' ORDER BY id ASC ");
			if(!empty($checktime)){
				if($checktime[0]['type'] == 6){
					//1放假2上课
					$todaytype = 1;
				}elseif($checktime[0]['type'] == 5){
					$todaytype    = 2;
					$todaytimeset = $checktime; 
				}
			}else{
				if(($nowdate >= $checkdateset_holi['win_start'] && $nowdate <=$checkdateset_holi['win_end']) || ($nowdate >= $checkdateset_holi['sum_start'] && $nowdate <=$checkdateset_holi['sum_end'])){
					$todaytype = 1;
				}else{
					$timeset_work = pdo_fetchall("SELECT start,end FROM " . tablename('wx_school_checktimeset') . " WHERE weid = '{$weid}' And schoolid = {$schoolid} and  checkdatesetid = '{$isfz['datesetid']}' and type=1 ORDER BY id ASC ");
					//星期五
					if($nowweek == 5){
						$todaytype = 2;
						if($checkdateset['friday'] == 1){
							$timeset_fri = pdo_fetchall("SELECT start,end FROM " . tablename('wx_school_checktimeset') . " WHERE weid = '{$weid}' And schoolid = {$schoolid} and  checkdatesetid = '{$isfz['datesetid']}' and type=2 ORDER BY id ASC ");
							$todaytimeset = $timeset_fri;
						}else{
							$todaytimeset = $timeset_work;
						}
					//星期六
					}elseif($nowweek == 6){
						if($checkdateset['saturday'] == 1){
							$timeset_sat = pdo_fetchall("SELECT start,end FROM " . tablename('wx_school_checktimeset') . " WHERE weid = '{$weid}' And schoolid = {$schoolid} and  checkdatesetid = '{$isfz['datesetid']}' and type=3 ORDER BY id ASC ");
							$todaytype = 2;
							$todaytimeset = $timeset_sat;
						}else{
							$todaytype = 1;
						}
					
					//星期天
					}elseif($nowweek == 0){
						if($checkdateset['sunday'] == 1){
							$timeset_sun = pdo_fetchall("SELECT start,end FROM " . tablename('wx_school_checktimeset') . " WHERE weid = '{$weid}' And schoolid = {$schoolid} and  checkdatesetid = '{$isfz['datesetid']}' and type=4 ORDER BY id ASC ");
							$todaytype    = 2;
							$todaytimeset = $timeset_sun;
						}else{
							$todaytype    = 1;
						}
					//工作日	
					}else{
						$todaytype    = 2;
						$todaytimeset = $timeset_work;
					}
				}
			}
			
		}
		$result[$isfz['sid']]['timeset']['todaytype'] = $todaytype;
		$result[$isfz['sid']]['timeset']['todaytimeset'] = $todaytimeset;
	}
	return $result;
}

function GetDatesetWithRoom($schoolid,$weid,$apid){
    global $_W;
    $roomlist_temp =  pdo_fetchall("SELECT noon_start,noon_end,night_start,night_end,id FROM " . tablename('wx_school_aproom') . " WHERE weid = '{$weid}' And schoolid = '{$schoolid}' and apid='{$apid}' ");
    $roomlist = array();
    foreach($roomlist_temp as $key=>$value){
        $roomlist[$value['id']]['time'][] = array(
            'start' => $value['noon_start'],
            'end' => $value['noon_end'],
        );
        $roomlist[$value['id']]['time'][] = array(
            'start' => $value['night_start'],
            'end' => $value['night_end'],
        );
    }
    return $roomlist;
}
 
 //根据经纬度计算距离 单位 米
function getDistance($lat1, $lng1, $lat2, $lng2){

    $radLat1 = deg2rad($lat1);// deg2rad()函数将角度转换为弧度
    $radLat2 = deg2rad($lat2);
    $radLng1 = deg2rad($lng1);
    $radLng2 = deg2rad($lng2);

    $a = $radLat1 - $radLat2;
    $b = $radLng1 - $radLng2;

    $s = 2 * asin(sqrt(pow(sin($a / 2), 2)+cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2))) * 6378137;//6378137是地球的平均半径
    return $s;

}

//百度地图坐标转换成火星坐标
   function bd_decrypt($bd_lon,$bd_lat){
    $x_pi = 3.14159265358979324 * 3000.0 / 180.0;
    $x = $bd_lon - 0.0065;
    $y = $bd_lat - 0.006;
    $z = sqrt($x * $x + $y * $y) - 0.00002 * sin($y * $x_pi);
    $theta = atan2($y, $x) - 0.000003 * cos($x * $x_pi);
    // $data['gg_lon'] = $z * cos($theta);
    // $data['gg_lat'] = $z * sin($theta);
    $gg_lon = $z * cos($theta);
        $gg_lat = $z * sin($theta);
        // 保留小数点后六位
        $data['gg_lon'] = round($gg_lon, 10);
        $data['gg_lat'] = round($gg_lat, 10);
    return $data;
    }

    //GCJ-02(火星，高德)坐标转换成BD-09(百度)坐标
    //@param bd_lon 百度经度
    //@param bd_lat 百度纬度
    function bd_encrypt($gg_lon,$gg_lat){
        $x_pi = 3.14159265358979324 * 3000.0 / 180.0;
        $x = $gg_lon;
        $y = $gg_lat;
        $z = sqrt($x * $x + $y * $y) - 0.00002 * sin($y * $x_pi);
        $theta = atan2($y, $x) - 0.000003 * cos($x * $x_pi);
        $bd_lon = $z * cos($theta) + 0.0065;
        $bd_lat = $z * sin($theta) + 0.006;
        // 保留小数点后六位
        $data['bd_lon'] = round($bd_lon, 10);
        $data['bd_lat'] = round($bd_lat, 10);
        return $data;
    }

#访问申请生产二维码
function visitors_qrcode($data = ''){
    include_once IA_ROOT . '/addons/fm_jiaoyu/inc/web/phpqrcode.php';
    $errorCorrectionLevel = 'L';	//容错级别
    $matrixPointSize = 10;			//生成图片大小
    $qrcode_name = 'images/fm_jiaoyu/'.time().'visitorqr'.rand(111111,999999).'.png';
    $filename = IA_ROOT .'/attachment/'. $qrcode_name;
    QRcode::png($data,$filename , $errorCorrectionLevel, $matrixPointSize,2.2);
    return $qrcode_name;
}


function GetSendSet($schoolid,$weid,$bjid){
    $bjinfo =  pdo_fetch("select checksendset,sname from " . tablename('wx_school_classify') . " where sid=:sid and weid =:weid", array(':sid' => $bjid, ':weid' => $weid));
    if(!empty($bjinfo['checksendset'])){
        $checksendset =unserialize($bjinfo['checksendset']);
    }else{
        $schoolinfo = pdo_fetch("select checksendset from " . tablename('wx_school_index') . " where id=:id and weid =:weid", array(':id' => $schoolid, ':weid' => $weid));
        if(!empty($schoolinfo)){
            $checksendset =unserialize($schoolinfo['checksendset']);
        }
        else{
            $checksendset = array('parents','head_teacher');
        }
    }
    return $checksendset;
}

function CreateHBtodo_ZB($schoolid,$weid,$lastedittime,$command){
    $maclist = pdo_fetchall("select id from " . tablename('wx_school_checkmac') . " where weid=:weid and schoolid =:schoolid and macname = :macname and is_heartbeat = :is_heartbeat", array(':weid' => $weid, ':schoolid' => $schoolid,':macname'=>11,':is_heartbeat'=>1));
    foreach ($maclist as $key=>$value){
        $data = array(
            'weid'	 	=> $weid,
            'schoolid'	=> $schoolid,
            'commond'   => $command,
            'macid'	    => $value['id'],
            'createtime'=> time(),
            'lastedittime' => $lastedittime
        );
        pdo_insert('wx_school_online', $data);
    }
}

//检查openid是否记录
function CheckFans($weid,$openid){
	$fans = pdo_fetch("SELECT tag FROM " . tablename('mc_mapping_fans') . " where openid = '{$openid}' And uniacid = '{$weid}' ");
	if(empty($fans)){
		return false;
	}else{
		return true;
	}
}
/**
 * 查询微擎会员信息
 */
function GetWeFans($weid,$openid){
	$data = array();
	$fans = pdo_fetch("SELECT fanid,uid,tag FROM " . tablename('mc_mapping_fans') . " where openid = '{$openid}' And uniacid = '{$weid}' ");
	if(!empty($fans)){
		if(empty($fans['tag'])){
			$account_api = WeAccount::create($weid);
			$fans_info = $account_api->fansQueryInfo($openid);
			pdo_update('mc_mapping_fans',array('tag'=>base64_encode(iserializer($fans_info))),array('fanid'=>$fans['fanid']));
		}
		$fansinfo = pdo_fetch("SELECT nickname,avatar as headimgurl FROM " . tablename('mc_members') . " where uid = '{$fans['uid']}' And uniacid = '{$weid}' ");
	}else{
		$account_api = WeAccount::create($weid);
		$fansinfo = $account_api->fansQueryInfo($openid);
	}
	$data['nickname'] = $fansinfo['nickname'];
	$data['avatar'] = $fansinfo['headimgurl'];
	return $data;
}

/**
 * 转换实际表名
 *
 * @param [type] $tablename
 * @param boolean $isFront 是否带前缀
 * @return  string
 */
function GetTableName($tablename , $isFront = true  ){
    if($isFront == true){
        if(empty($GLOBALS['_W']['config']['db']['master'])) {
            return "`{$GLOBALS['_W']['config']['db']['tablepre']}wx_school_{$tablename}`";
        }
        return "`{$GLOBALS['_W']['config']['db']['master']['tablepre']}wx_school_{$tablename}`";
    }elseif($isFront == false ){
        return "wx_school_{$tablename}";
    }
}

function CheckSchoolSet($schoolid,$param){
	$schoolset = pdo_fetch("SELECT {$param} FROM ".GetTableName('schoolset')." WHERE schoolid = '{$schoolid}' ");
	return $schoolset[$param];
}

function paginations($total, $pageIndex, $pageSize = 15, $url = '', $context = array('before' => 5, 'after' => 4, 'ajaxcallback' => '', 'callbackfuncname' => '')) {
	global $_W;
	$pdata = array(
		'tcount' => 0,
		'tpage' => 0,
		'cindex' => 0,
		'findex' => 0,
		'pindex' => 0,
		'nindex' => 0,
		'lindex' => 0,
		'options' => ''
	);
	if (empty($context['before'])) {
		$context['before'] = 5;
	}
	if (empty($context['after'])) {
		$context['after'] = 4;
	}

	if ($context['ajaxcallback']) {
		$context['isajax'] = true;
	}

	if ($context['callbackfuncname']) {
		$callbackfunc = $context['callbackfuncname'];
	}

	$pdata['tcount'] = $total;
	$pdata['tpage'] = (empty($pageSize) || $pageSize < 0) ? 1 : ceil($total / $pageSize);
	if ($pdata['tpage'] <= 1) {
		return '';
	}
	$cindex = $pageIndex;
	$cindex = min($cindex, $pdata['tpage']);
	$cindex = max($cindex, 1);
	$pdata['cindex'] = $cindex;
	$pdata['findex'] = 1;
	$pdata['pindex'] = $cindex > 1 ? $cindex - 1 : 1;
	$pdata['nindex'] = $cindex < $pdata['tpage'] ? $cindex + 1 : $pdata['tpage'];
	$pdata['lindex'] = $pdata['tpage'];

	if ($context['isajax']) {
		if (empty($url)) {
			$url = $_W['script_name'] . '?' . http_build_query($_GET);
		}
		$pdata['faa'] = 'href="javascript:;" page="' . $pdata['findex'] . '" '. ($callbackfunc ? 'onclick="'.$callbackfunc.'(\'' . $url . '\', \'' . $pdata['findex'] . '\', this);"' : '');
		$pdata['paa'] = 'href="javascript:;" page="' . $pdata['pindex'] . '" '. ($callbackfunc ? 'onclick="'.$callbackfunc.'(\'' . $url . '\', \'' . $pdata['pindex'] . '\', this);"' : '');
		$pdata['naa'] = 'href="javascript:;" page="' . $pdata['nindex'] . '" '. ($callbackfunc ? 'onclick="'.$callbackfunc.'(\'' . $url . '\', \'' . $pdata['nindex'] . '\', this);"' : '');
		$pdata['laa'] = 'href="javascript:;" page="' . $pdata['lindex'] . '" '. ($callbackfunc ? 'onclick="'.$callbackfunc.'(\'' . $url . '\', \'' . $pdata['lindex'] . '\', this);"' : '');
	} else {
		if ($url) {
			$pdata['faa'] = 'href="?' . str_replace('*', $pdata['findex'], $url) . '"';
			$pdata['paa'] = 'href="?' . str_replace('*', $pdata['pindex'], $url) . '"';
			$pdata['naa'] = 'href="?' . str_replace('*', $pdata['nindex'], $url) . '"';
			$pdata['laa'] = 'href="?' . str_replace('*', $pdata['lindex'], $url) . '"';
		} else {
			$_GET['page'] = $pdata['findex'];
			$pdata['faa'] = 'href="' . $_W['script_name'] . '?' . http_build_query($_GET) . '"';
			$_GET['page'] = $pdata['pindex'];
			$pdata['paa'] = 'href="' . $_W['script_name'] . '?' . http_build_query($_GET) . '"';
			$_GET['page'] = $pdata['nindex'];
			$pdata['naa'] = 'href="' . $_W['script_name'] . '?' . http_build_query($_GET) . '"';
			$_GET['page'] = $pdata['lindex'];
			$pdata['laa'] = 'href="' . $_W['script_name'] . '?' . http_build_query($_GET) . '"';
		}
	}

	$html = '<div><ul class="pagination pagination-centered">';
	$html .= "<li><a {$pdata['faa']} class=\"pager-nav\">首页</a></li>";
	empty($callbackfunc) && $html .= "<li><a {$pdata['paa']} class=\"pager-nav\">&laquo;上一页</a></li>";

		if (!$context['before'] && $context['before'] != 0) {
		$context['before'] = 5;
	}
	if (!$context['after'] && $context['after'] != 0) {
		$context['after'] = 4;
	}

	if ($context['after'] != 0 && $context['before'] != 0) {
		$range = array();
		$range['start'] = max(1, $pdata['cindex'] - $context['before']);
		$range['end'] = min($pdata['tpage'], $pdata['cindex'] + $context['after']);
		if ($range['end'] - $range['start'] < $context['before'] + $context['after']) {
			$range['end'] = min($pdata['tpage'], $range['start'] + $context['before'] + $context['after']);
			$range['start'] = max(1, $range['end'] - $context['before'] - $context['after']);
		}
		for ($i = $range['start']; $i <= $range['end']; $i++) {
			if ($context['isajax']) {
				$aa = 'href="javascript:;" page="' . $i . '" '. ($callbackfunc ? 'onclick="'.$callbackfunc.'(\'' . $url . '\', \'' . $i . '\', this);"' : '');
			} else {
				if ($url) {
					$aa = 'href="?' . str_replace('*', $i, $url) . '"';
				} else {
					$_GET['page'] = $i;
					$aa = 'href="?' . http_build_query($_GET) . '"';
				}
			}
			if (!empty($context['isajax'])) {
				$html .= ($i == $pdata['cindex'] ? '<li class="active">' : '<li>') . "<a {$aa}>" . $i . '</a></li>';
			} else {
				$html .= ($i == $pdata['cindex'] ? '<li class="active"><a href="javascript:;">' . $i . '</a></li>' : "<li><a {$aa}>" . $i . '</a></li>');
			}
		}
	}

	if ($pdata['cindex'] < $pdata['tpage']) {
		empty($callbackfunc) && $html .= "<li><a {$pdata['naa']} class=\"pager-nav\">下一页&raquo;</a></li>";
		$html .= "<li><a {$pdata['laa']} class=\"pager-nav\">尾页</a></li>";
	}
	$html .= '</ul></div>';
	return $html;
}
//游侠
function is_showap(){
    // return 0;
    global $_W;
    $oauthurl = getoauthurl();
    if( $oauthurl == "www.puerqirui.com" || $oauthurl == "www.anqinschool.com" ||$oauthurl == "manger.weimeizhan.com" || $oauthurl =="www.hlwjjy.cn" )
        return 1;
    else
        return 0;
}


//GLP
function is_showpf(){
  // return 1;
    global $_W;
    $oauthurl = getoauthurl();
    if( $oauthurl == "zw.nyxiaowei.com" )
        return 1;
    else
        return 0;
}

//史志强
function is_showgkk(){
    // return 1;
    global $_W;
    $oauthurl = getoauthurl();
    if( $oauthurl == "jy.hlgwlkj.com" )
        return 1;
    else
        return 0;
}

//托尼
function is_Tony(){
    //return 1;
    global $_W;
    $oauthurl = getoauthurl();
    if( $oauthurl == "www.honekeji.com" )
        return 1;
    else
        return 0;
}


//阈值
function is_TestFz(){
   // return 0;
    global $_W;
    $oauthurl = getoauthurl();
    if( $oauthurl == "edu.morree.com" )
        return 1;
    else
		return 0;
}

function is_showZB(){
   // return 1;
    global $_W;
    $oauthurl = getoauthurl();
    if( $oauthurl == "smartattence.zobao.net" )
        return 1;
    else
        return 0;
}
function anhui(){
   // return 0;
    global $_W;
    $oauthurl = getoauthurl();
    if( $oauthurl == "anhui.daren007.com" || $oauthurl == "manger.weimeizhan.com")
        return 1;
    else
        return 0;
}


function Keep_sk77(){
   // return 0;
    global $_W;
    $oauthurl = getoauthurl();
    if( $oauthurl == "bly.sk77.cn" || $oauthurl == "manger.weimeizhan.com")
        return 1;
    else
        return 0;
}

function keep_wt(){
   // return 0;
    global $_W;
    $oauthurl = getoauthurl();
    if( $oauthurl == "vip.slok.com.cn" || $oauthurl == "manger.weimeizhan.com")
        return 1;
    else
        return 0;
}




/**
 * 是否多规格课程定制
 *
 * @return void
 */
function keep_mutikc(){
	//return 0;
    global $_W;
    $oauthurl = getoauthurl();
    if( $oauthurl == "wx.mufochina.com" || $oauthurl == "manger.weimeizhan.com")
        // return 0;
        return 1;
    else
        return 0;
}

function keep_Blacklist(){
//	 return 0;
    global $_W;
    $oauthurl = getoauthurl();
    if($oauthurl == "app.web-works.cn" )
        return 1;
    else
        return 0;
}


function CheckWtOn($schoolid){
    $Check =  pdo_fetch("select is_wtcheck from " . GetTableName('schoolset') . " where schoolid = '{$schoolid}'");
    if($Check['is_wtcheck'] == 1){
        return true;
    }else{
        return false;
    }
}

//统一平台 和校园
function keep_hxy(){
	//return 1;
	global $_W;
    $oauthurl = getoauthurl();
	if( $oauthurl == "www.hlwjjy.cn")
		return 1;
	else
		return 0;
 
}


function ShowSomeThing(){
	 
	global $_W;
    $oauthurl = getoauthurl();
	if( $oauthurl == "eunuo.euedot.cn")
		return 1;
	else
		return 0;
 
}

/*
 * 将多维数组转成字符串
 *
 * */
function arrayToString($arr) {
    if (is_array($arr)){
        return implode(',', array_map('arrayToString', $arr));
    }
    return $arr;
}


/**
 * Undocumented function
 *
 * @param [type] 开始月份
 * @param [type] 结束月份
 * @return $string 月份相差数
 */
function GetMonthDiff($start,$end){
	$start = new DateTime($start);
    $end =  new DateTime($end);
    $diff = $start->diff($end);
	$diff_month = $diff->format('%y')*12+$diff->format('%m');
	return $diff_month;
}
/**
 * Undocumented function
 *
 * @param [day1] 开始时间
 * @param [day2] 结束时间
 * @return $string 月份天数
 */
function diffBetweenTwoDays ($day1, $day2)
{
  $second1 = strtotime($day1);
  $second2 = strtotime($day2);
   
  return ($second2 - $second1) / 86400;
}


/**
 * @param $header 设置头像
 * @param $poster 设置背景图片
 * @param $text   设置文字
 */

function setPoster($qrcode,$poster){
    $data = array( 
        'image'=>array(
            array(
                'url'=>"{$qrcode}", //二维码
                'left'=>200,
                'top'=>300,
                'right'=>0,
                'stream'=>0,
                'bottom'=>0,
                'width'=>400,
                'height'=>400,
                'opacity'=>100
            ),
        ),
        'background'=>"{$poster}",
    );
    return $data;
}

/**
 * 生成宣传海报
 * @param array  参数,包括图片和文字
 * @param string  $filename 生成海报文件名,不传此参数则不生成文件,直接输出图片
 * @return [type] [description]
 */
function createPoster($config=array(),$filename=""){
    //如果要看报什么错，可以先注释调这个header
    if(empty($filename)) header("content-type: image/png");
    $imageDefault = array(
        'left'=>0,
        'top'=>0,
        'right'=>0,
        'bottom'=>0,
        'width'=>100,
        'height'=>100,
        'opacity'=>100
    );
    $textDefault = array(
        'text'=>'',
        'left'=>0,
        'top'=>0,
        'fontSize'=>32,       //字号
        'fontColor'=>'255,255,255', //字体颜色
        'angle'=>0,
    );
    $background = $config['background'];//海报最底层得背景
    //背景方法
    $backgroundInfo = getimagesize($background);
    $backgroundFun = 'imagecreatefrom'.image_type_to_extension($backgroundInfo[2], false);
    $background = $backgroundFun($background);
    $backgroundWidth = imagesx($background);  //背景宽度
    $backgroundHeight = imagesy($background);  //背景高度
    $imageRes = imageCreatetruecolor($backgroundWidth,$backgroundHeight);
	$color = imagecolorallocate($imageRes, 0, 0, 0); //原始颜色
    $color = imagecolorallocatealpha($imageRes, 255, 255, 255,127);
    $color = imagecolorallocate($imageRes, 255, 255, 255);
    imagefill($imageRes, 0, 0, $color);
	imageColorTransparent($imageRes, $color);  //颜色透明
    imagecopyresampled($imageRes,$background,0,0,0,0,imagesx($background),imagesy($background),imagesx($background),imagesy($background));
    //处理了图片
    if(!empty($config['image'])){
		foreach ($config['image'] as $key => $val) {
            $val = array_merge($imageDefault,$val);
            $info = getimagesize($val['url']);
            $function = 'imagecreatefrom'.image_type_to_extension($info[2], false);
            if($val['stream']){   //如果传的是字符串图像流
                $info = getimagesizefromstring($val['url']);
                $function = 'imagecreatefromstring';
            }
            $res = $function($val['url']);
            $resWidth = $info[0];
            $resHeight = $info[1];
            //建立画板 ，缩放图片至指定尺寸
            $canvas=imagecreatetruecolor($val['width'], $val['height']);
            imagefill($canvas, 0, 0, $color);
            //关键函数，参数（目标资源，源，目标资源的开始坐标x,y, 源资源的开始坐标x,y,目标资源的宽高w,h,源资源的宽高w,h）
            imagecopyresampled($canvas, $res, 0, 0, 0, 0, $val['width'], $val['height'],$resWidth,$resHeight);
            $val['left'] = $val['left']<0?$backgroundWidth- abs($val['left']) - $val['width']:$val['left'];
            $val['top'] = $val['top']<0?$backgroundHeight- abs($val['top']) - $val['height']:$val['top'];
            //放置图像
            imagecopymerge($imageRes,$canvas, $val['left'],$val['top'],$val['right'],$val['bottom'],$val['width'],$val['height'],$val['opacity']);//左，上，右，下，宽度，高度，透明度
        }
    }
    //处理文字
    if(!empty($config['text'])){
        foreach ($config['text'] as $key => $val) {
            $val = array_merge($textDefault,$val);
            list($R,$G,$B) = explode(',', $val['fontColor']);
            $fontColor = imagecolorallocate($imageRes, $R, $G, $B);
            $val['left'] = $val['left']<0?$backgroundWidth- abs($val['left']):$val['left'];
            $val['top'] = $val['top']<0?$backgroundHeight- abs($val['top']):$val['top'];
            imagettftext($imageRes,$val['fontSize'],$val['angle'],$val['left'],$val['top'],$fontColor,$val['fontPath'],$val['text']);
        }
	}
    //生成图片
    if(!empty($filename)){
        $res = imagejpeg ($imageRes,$filename,90); //保存到本地
        imagedestroy($imageRes);
        if(!$res) return false;
        return $filename;
    }else{
        imagejpeg ($imageRes);     //在浏览器上显示
        imagedestroy($imageRes);
    }
}

function CheckToken($weid, $schoolid, $token){
	$token_data = json_decode(base64_decode($token),true);
	$mac = pdo_fetch("SELECT * FROM " . GetTableName('checkmac') . " WHERE macid = '{$token_data['macid']}' And weid = '{$weid}' And schoolid = '{$schoolid}' ");
	if(!empty($mac)){
		$banner = unserialize($mac['banner']);
		if($token_data['secret'] == $banner['password'] && $token_data['time'] >= time()){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
	
}
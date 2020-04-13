<?php
//升级数据表
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_lbsmap_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) NOT NULL DEFAULT '0' COMMENT '父栏目id',
  `weid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `url` varchar(1024) NOT NULL COMMENT '链接',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否开启',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_lbsmap_category','id')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_category')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_lbsmap_category','parentid')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_category')." ADD   `parentid` int(11) NOT NULL DEFAULT '0' COMMENT '父栏目id'");}
if(!pdo_fieldexists('wx_lbsmap_category','weid')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_category')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_category','name')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_category')." ADD   `name` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_category','url')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_category')." ADD   `url` varchar(1024) NOT NULL COMMENT '链接'");}
if(!pdo_fieldexists('wx_lbsmap_category','enabled')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_category')." ADD   `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否开启'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_lbsmap_classify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `catename` varchar(255) NOT NULL,
  `enabled` int(2) NOT NULL,
  `displayorder` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_lbsmap_classify','id')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_classify')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_lbsmap_classify','weid')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_classify')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_classify','catename')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_classify')." ADD   `catename` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_classify','enabled')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_classify')." ADD   `enabled` int(2) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_classify','displayorder')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_classify')." ADD   `displayorder` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_lbsmap_store` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `sthumb` varchar(250) NOT NULL,
  `stel` varchar(20) NOT NULL,
  `saddress` varchar(120) NOT NULL,
  `lat` decimal(18,10) NOT NULL,
  `lng` decimal(18,10) NOT NULL,
  `showc` tinyint(2) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `cthumb` varchar(250) NOT NULL,
  `ctel` varchar(20) NOT NULL,
  `cinfo` varchar(10000) DEFAULT NULL,
  `clevel` int(2) NOT NULL,
  `showbtn` tinyint(2) NOT NULL,
  `diyurl_name` varchar(255) NOT NULL,
  `diyurl` varchar(1024) NOT NULL,
  `catenameid` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_lbsmap_store','id')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_lbsmap_store','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `uniacid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','sname')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `sname` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','sthumb')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `sthumb` varchar(250) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','stel')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `stel` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','saddress')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `saddress` varchar(120) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','lat')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `lat` decimal(18,10) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','lng')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `lng` decimal(18,10) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','showc')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `showc` tinyint(2) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','cname')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `cname` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','cthumb')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `cthumb` varchar(250) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','ctel')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `ctel` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','cinfo')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `cinfo` varchar(10000) DEFAULT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','clevel')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `clevel` int(2) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','showbtn')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `showbtn` tinyint(2) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','diyurl_name')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `diyurl_name` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','diyurl')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `diyurl` varchar(1024) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','catenameid')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `catenameid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','content')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `content` longtext NOT NULL");}
if(!pdo_fieldexists('wx_lbsmap_store','status')) {pdo_query("ALTER TABLE ".tablename('wx_lbsmap_store')." ADD   `status` tinyint(1) NOT NULL DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_address` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `openid` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `province` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `county` varchar(40) NOT NULL,
  `address` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_address','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_address')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_address','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_address')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_address','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_address')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_address','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_address')." ADD   `openid` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_school_address','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_address')." ADD   `name` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_address','phone')) {pdo_query("ALTER TABLE ".tablename('wx_school_address')." ADD   `phone` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_school_address','province')) {pdo_query("ALTER TABLE ".tablename('wx_school_address')." ADD   `province` varchar(40) NOT NULL");}
if(!pdo_fieldexists('wx_school_address','city')) {pdo_query("ALTER TABLE ".tablename('wx_school_address')." ADD   `city` varchar(40) NOT NULL");}
if(!pdo_fieldexists('wx_school_address','county')) {pdo_query("ALTER TABLE ".tablename('wx_school_address')." ADD   `county` varchar(40) NOT NULL");}
if(!pdo_fieldexists('wx_school_address','address')) {pdo_query("ALTER TABLE ".tablename('wx_school_address')." ADD   `address` varchar(300) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_allcamera` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `kcid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '画面名称',
  `videopic` varchar(1000) NOT NULL DEFAULT '' COMMENT '监控地址',
  `videourl` varchar(1000) NOT NULL DEFAULT '' COMMENT '监控地址',
  `starttime1` varchar(50) NOT NULL,
  `endtime1` varchar(50) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `conet` text COMMENT '说明',
  `allowpy` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1允许2拒绝',
  `videotype` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1公共2指定班级',
  `bj_id` text COMMENT '关联班级组',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1监控2课程直播',
  `click` int(10) unsigned NOT NULL COMMENT '查看量',
  `ssort` int(10) unsigned NOT NULL COMMENT '排序',
  `is_pay` tinyint(1) NOT NULL DEFAULT '2' COMMENT '单独付费与否',
  `price_one` float NOT NULL,
  `price_one_cun` float NOT NULL,
  `price_all` float NOT NULL,
  `price_all_cun` float NOT NULL,
  `days` int(11) unsigned DEFAULT '10',
  `is_try` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许试看',
  `try_time` int(11) unsigned DEFAULT '30' COMMENT '试看时间',
  `payweid` int(11) unsigned DEFAULT NULL COMMENT '收款公众号',
  `starttime2` varchar(50) NOT NULL,
  `starttime3` varchar(50) NOT NULL,
  `endtime2` varchar(50) NOT NULL,
  `endtime3` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_allcamera','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_allcamera','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_allcamera','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_allcamera','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `kcid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_allcamera','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `name` varchar(50) NOT NULL COMMENT '画面名称'");}
if(!pdo_fieldexists('wx_school_allcamera','videopic')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `videopic` varchar(1000) NOT NULL DEFAULT '' COMMENT '监控地址'");}
if(!pdo_fieldexists('wx_school_allcamera','videourl')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `videourl` varchar(1000) NOT NULL DEFAULT '' COMMENT '监控地址'");}
if(!pdo_fieldexists('wx_school_allcamera','starttime1')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `starttime1` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_allcamera','endtime1')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `endtime1` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_allcamera','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_allcamera','conet')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `conet` text COMMENT '说明'");}
if(!pdo_fieldexists('wx_school_allcamera','allowpy')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `allowpy` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1允许2拒绝'");}
if(!pdo_fieldexists('wx_school_allcamera','videotype')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `videotype` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1公共2指定班级'");}
if(!pdo_fieldexists('wx_school_allcamera','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `bj_id` text COMMENT '关联班级组'");}
if(!pdo_fieldexists('wx_school_allcamera','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1监控2课程直播'");}
if(!pdo_fieldexists('wx_school_allcamera','click')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `click` int(10) unsigned NOT NULL COMMENT '查看量'");}
if(!pdo_fieldexists('wx_school_allcamera','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `ssort` int(10) unsigned NOT NULL COMMENT '排序'");}
if(!pdo_fieldexists('wx_school_allcamera','is_pay')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `is_pay` tinyint(1) NOT NULL DEFAULT '2' COMMENT '单独付费与否'");}
if(!pdo_fieldexists('wx_school_allcamera','price_one')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `price_one` float NOT NULL");}
if(!pdo_fieldexists('wx_school_allcamera','price_one_cun')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `price_one_cun` float NOT NULL");}
if(!pdo_fieldexists('wx_school_allcamera','price_all')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `price_all` float NOT NULL");}
if(!pdo_fieldexists('wx_school_allcamera','price_all_cun')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `price_all_cun` float NOT NULL");}
if(!pdo_fieldexists('wx_school_allcamera','days')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `days` int(11) unsigned DEFAULT '10'");}
if(!pdo_fieldexists('wx_school_allcamera','is_try')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `is_try` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许试看'");}
if(!pdo_fieldexists('wx_school_allcamera','try_time')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `try_time` int(11) unsigned DEFAULT '30' COMMENT '试看时间'");}
if(!pdo_fieldexists('wx_school_allcamera','payweid')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `payweid` int(11) unsigned DEFAULT NULL COMMENT '收款公众号'");}
if(!pdo_fieldexists('wx_school_allcamera','starttime2')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `starttime2` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_allcamera','starttime3')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `starttime3` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_allcamera','endtime2')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `endtime2` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_allcamera','endtime3')) {pdo_query("ALTER TABLE ".tablename('wx_school_allcamera')." ADD   `endtime3` varchar(50) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_ans_remark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `tname` varchar(30) NOT NULL,
  `sid` int(11) NOT NULL,
  `zyid` int(11) NOT NULL,
  `tmid` int(11) NOT NULL,
  `type` int(3) NOT NULL COMMENT '1是电脑创建的作业2是手机创建的作业',
  `content` varchar(500) NOT NULL,
  `createtime` int(11) NOT NULL,
  `audio` varchar(1000) NOT NULL,
  `audiotime` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_ans_remark','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_ans_remark')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_ans_remark','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_ans_remark')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_ans_remark','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_ans_remark')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_ans_remark','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_ans_remark')." ADD   `userid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_ans_remark','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_ans_remark')." ADD   `tid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_ans_remark','tname')) {pdo_query("ALTER TABLE ".tablename('wx_school_ans_remark')." ADD   `tname` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_school_ans_remark','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_ans_remark')." ADD   `sid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_ans_remark','zyid')) {pdo_query("ALTER TABLE ".tablename('wx_school_ans_remark')." ADD   `zyid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_ans_remark','tmid')) {pdo_query("ALTER TABLE ".tablename('wx_school_ans_remark')." ADD   `tmid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_ans_remark','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_ans_remark')." ADD   `type` int(3) NOT NULL COMMENT '1是电脑创建的作业2是手机创建的作业'");}
if(!pdo_fieldexists('wx_school_ans_remark','content')) {pdo_query("ALTER TABLE ".tablename('wx_school_ans_remark')." ADD   `content` varchar(500) NOT NULL");}
if(!pdo_fieldexists('wx_school_ans_remark','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_ans_remark')." ADD   `createtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_ans_remark','audio')) {pdo_query("ALTER TABLE ".tablename('wx_school_ans_remark')." ADD   `audio` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_ans_remark','audiotime')) {pdo_query("ALTER TABLE ".tablename('wx_school_ans_remark')." ADD   `audiotime` varchar(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_answers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `weid` int(10) NOT NULL,
  `schoolid` int(10) NOT NULL,
  `zyid` int(10) NOT NULL COMMENT '问题id',
  `sid` int(10) NOT NULL,
  `tid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tmid` int(10) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1回答2单选3多选4图片5语音6视频',
  `MyAnswer` varchar(2000) NOT NULL,
  `createtime` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_answers','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_answers')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_answers','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_answers')." ADD   `weid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_answers','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_answers')." ADD   `schoolid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_answers','zyid')) {pdo_query("ALTER TABLE ".tablename('wx_school_answers')." ADD   `zyid` int(10) NOT NULL COMMENT '问题id'");}
if(!pdo_fieldexists('wx_school_answers','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_answers')." ADD   `sid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_answers','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_answers')." ADD   `tid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_answers','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_answers')." ADD   `userid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_answers','tmid')) {pdo_query("ALTER TABLE ".tablename('wx_school_answers')." ADD   `tmid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_answers','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_answers')." ADD   `type` tinyint(1) NOT NULL COMMENT '1回答2单选3多选4图片5语音6视频'");}
if(!pdo_fieldexists('wx_school_answers','MyAnswer')) {pdo_query("ALTER TABLE ".tablename('wx_school_answers')." ADD   `MyAnswer` varchar(2000) NOT NULL");}
if(!pdo_fieldexists('wx_school_answers','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_answers')." ADD   `createtime` varchar(13) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_apartment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ssort` int(11) NOT NULL,
  `tid` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_apartment','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_apartment')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_apartment','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_apartment')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_apartment','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_apartment')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_apartment','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_apartment')." ADD   `name` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_apartment','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_apartment')." ADD   `ssort` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_apartment','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_apartment')." ADD   `tid` text NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_app` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `bigdata` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `tuiguang` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `tuan` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `zhuli` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_app','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_app')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_app','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_app')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_app','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_app')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_app','bigdata')) {pdo_query("ALTER TABLE ".tablename('wx_school_app')." ADD   `bigdata` tinyint(1) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_app','tuiguang')) {pdo_query("ALTER TABLE ".tablename('wx_school_app')." ADD   `tuiguang` tinyint(1) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_app','tuan')) {pdo_query("ALTER TABLE ".tablename('wx_school_app')." ADD   `tuan` tinyint(1) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_app','zhuli')) {pdo_query("ALTER TABLE ".tablename('wx_school_app')." ADD   `zhuli` tinyint(1) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_app','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_app')." ADD   `status` tinyint(1) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_app','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_app')." ADD   `createtime` int(10) unsigned NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_aproom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `apid` int(11) NOT NULL COMMENT '楼栋id',
  `noon_start` varchar(20) NOT NULL,
  `noon_end` varchar(20) NOT NULL,
  `night_start` varchar(20) NOT NULL,
  `night_end` varchar(20) NOT NULL,
  `ssort` int(11) NOT NULL,
  `floornum` int(11) NOT NULL,
  `noon_deadline` varchar(20) NOT NULL COMMENT '午间归寝死限',
  `night_deadline` varchar(20) NOT NULL COMMENT '晚归寝死限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_aproom','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_aproom')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_aproom','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_aproom')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_aproom','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_aproom')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_aproom','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_aproom')." ADD   `name` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_aproom','apid')) {pdo_query("ALTER TABLE ".tablename('wx_school_aproom')." ADD   `apid` int(11) NOT NULL COMMENT '楼栋id'");}
if(!pdo_fieldexists('wx_school_aproom','noon_start')) {pdo_query("ALTER TABLE ".tablename('wx_school_aproom')." ADD   `noon_start` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_aproom','noon_end')) {pdo_query("ALTER TABLE ".tablename('wx_school_aproom')." ADD   `noon_end` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_aproom','night_start')) {pdo_query("ALTER TABLE ".tablename('wx_school_aproom')." ADD   `night_start` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_aproom','night_end')) {pdo_query("ALTER TABLE ".tablename('wx_school_aproom')." ADD   `night_end` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_aproom','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_aproom')." ADD   `ssort` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_aproom','floornum')) {pdo_query("ALTER TABLE ".tablename('wx_school_aproom')." ADD   `floornum` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_aproom','noon_deadline')) {pdo_query("ALTER TABLE ".tablename('wx_school_aproom')." ADD   `noon_deadline` varchar(20) NOT NULL COMMENT '午间归寝死限'");}
if(!pdo_fieldexists('wx_school_aproom','night_deadline')) {pdo_query("ALTER TABLE ".tablename('wx_school_aproom')." ADD   `night_deadline` varchar(20) NOT NULL COMMENT '晚归寝死限'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_area` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属帐号',
  `name` varchar(50) NOT NULL COMMENT '区域名称',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID,0为第一级',
  `ssort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `type` char(20) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '显示状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_area','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_area')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_area','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_area')." ADD   `weid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属帐号'");}
if(!pdo_fieldexists('wx_school_area','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_area')." ADD   `name` varchar(50) NOT NULL COMMENT '区域名称'");}
if(!pdo_fieldexists('wx_school_area','parentid')) {pdo_query("ALTER TABLE ".tablename('wx_school_area')." ADD   `parentid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID,0为第一级'");}
if(!pdo_fieldexists('wx_school_area','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_area')." ADD   `ssort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序'");}
if(!pdo_fieldexists('wx_school_area','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_area')." ADD   `type` char(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_area','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_area')." ADD   `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '显示状态'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `uniacid` int(10) unsigned NOT NULL,
  `schoolid` int(11) DEFAULT '0',
  `bannername` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(5000) NOT NULL DEFAULT '',
  `begintime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  `leixing` int(1) NOT NULL DEFAULT '0' COMMENT '0学校,1平台',
  `arr` text COMMENT '列表信息',
  `click` varchar(1000) DEFAULT '' COMMENT '点击量',
  `place` tinyint(1) NOT NULL COMMENT '位置',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_banners','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_banners')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_banners','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_banners')." ADD   `weid` int(11) DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_banners','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_school_banners')." ADD   `uniacid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_banners','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_banners')." ADD   `schoolid` int(11) DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_banners','bannername')) {pdo_query("ALTER TABLE ".tablename('wx_school_banners')." ADD   `bannername` varchar(50) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_banners','link')) {pdo_query("ALTER TABLE ".tablename('wx_school_banners')." ADD   `link` varchar(255) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_banners','thumb')) {pdo_query("ALTER TABLE ".tablename('wx_school_banners')." ADD   `thumb` varchar(5000) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wx_school_banners','begintime')) {pdo_query("ALTER TABLE ".tablename('wx_school_banners')." ADD   `begintime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_banners','endtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_banners')." ADD   `endtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_banners','displayorder')) {pdo_query("ALTER TABLE ".tablename('wx_school_banners')." ADD   `displayorder` int(11) DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_banners','enabled')) {pdo_query("ALTER TABLE ".tablename('wx_school_banners')." ADD   `enabled` int(11) DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_banners','leixing')) {pdo_query("ALTER TABLE ".tablename('wx_school_banners')." ADD   `leixing` int(1) NOT NULL DEFAULT '0' COMMENT '0学校,1平台'");}
if(!pdo_fieldexists('wx_school_banners','arr')) {pdo_query("ALTER TABLE ".tablename('wx_school_banners')." ADD   `arr` text COMMENT '列表信息'");}
if(!pdo_fieldexists('wx_school_banners','click')) {pdo_query("ALTER TABLE ".tablename('wx_school_banners')." ADD   `click` varchar(1000) DEFAULT '' COMMENT '点击量'");}
if(!pdo_fieldexists('wx_school_banners','place')) {pdo_query("ALTER TABLE ".tablename('wx_school_banners')." ADD   `place` tinyint(1) NOT NULL COMMENT '位置'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_bjq` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `content` text NOT NULL COMMENT '详细内容或评价',
  `uid` int(10) unsigned NOT NULL COMMENT '发布者UID',
  `wx` varchar(30) NOT NULL DEFAULT '0' COMMENT '0',
  `bj_id1` int(10) unsigned NOT NULL COMMENT '班级ID1',
  `bj_id2` int(10) unsigned NOT NULL COMMENT '班级ID2',
  `bj_id3` int(10) unsigned NOT NULL COMMENT '班级ID3',
  `sherid` int(10) unsigned NOT NULL COMMENT '所属图文id',
  `shername` varchar(50) DEFAULT '' COMMENT '分享者名字',
  `openid` varchar(30) NOT NULL COMMENT '帖子所属openid',
  `isopen` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否显示',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型0为班级圈1为评论',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  `msgtype` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1文字图片2语音3视频',
  `userid` int(10) NOT NULL COMMENT '发布者用户ID',
  `video` varchar(1000) DEFAULT '',
  `videoimg` varchar(1000) DEFAULT '',
  `plid` int(10) NOT NULL DEFAULT '0',
  `is_private` varchar(3) NOT NULL DEFAULT 'N' COMMENT '禁止评论',
  `audio` varchar(1000) DEFAULT '' COMMENT '音频地址',
  `audiotime` int(10) NOT NULL DEFAULT '0' COMMENT '音频时间',
  `link` varchar(1000) DEFAULT '' COMMENT '外链地址',
  `linkdesc` varchar(200) DEFAULT '' COMMENT '外链标题',
  `hftoname` varchar(100) DEFAULT '',
  `ali_vod_id` varchar(100) DEFAULT '',
  `kc_id` int(11) NOT NULL,
  `is_all` tinyint(3) DEFAULT NULL COMMENT '是否全校可见',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_bjq','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_bjq','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_bjq','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_bjq','content')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `content` text NOT NULL COMMENT '详细内容或评价'");}
if(!pdo_fieldexists('wx_school_bjq','uid')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `uid` int(10) unsigned NOT NULL COMMENT '发布者UID'");}
if(!pdo_fieldexists('wx_school_bjq','wx')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `wx` varchar(30) NOT NULL DEFAULT '0' COMMENT '0'");}
if(!pdo_fieldexists('wx_school_bjq','bj_id1')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `bj_id1` int(10) unsigned NOT NULL COMMENT '班级ID1'");}
if(!pdo_fieldexists('wx_school_bjq','bj_id2')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `bj_id2` int(10) unsigned NOT NULL COMMENT '班级ID2'");}
if(!pdo_fieldexists('wx_school_bjq','bj_id3')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `bj_id3` int(10) unsigned NOT NULL COMMENT '班级ID3'");}
if(!pdo_fieldexists('wx_school_bjq','sherid')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `sherid` int(10) unsigned NOT NULL COMMENT '所属图文id'");}
if(!pdo_fieldexists('wx_school_bjq','shername')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `shername` varchar(50) DEFAULT '' COMMENT '分享者名字'");}
if(!pdo_fieldexists('wx_school_bjq','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `openid` varchar(30) NOT NULL COMMENT '帖子所属openid'");}
if(!pdo_fieldexists('wx_school_bjq','isopen')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `isopen` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否显示'");}
if(!pdo_fieldexists('wx_school_bjq','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型0为班级圈1为评论'");}
if(!pdo_fieldexists('wx_school_bjq','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
if(!pdo_fieldexists('wx_school_bjq','msgtype')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `msgtype` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1文字图片2语音3视频'");}
if(!pdo_fieldexists('wx_school_bjq','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `userid` int(10) NOT NULL COMMENT '发布者用户ID'");}
if(!pdo_fieldexists('wx_school_bjq','video')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `video` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_bjq','videoimg')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `videoimg` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_bjq','plid')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `plid` int(10) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_bjq','is_private')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `is_private` varchar(3) NOT NULL DEFAULT 'N' COMMENT '禁止评论'");}
if(!pdo_fieldexists('wx_school_bjq','audio')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `audio` varchar(1000) DEFAULT '' COMMENT '音频地址'");}
if(!pdo_fieldexists('wx_school_bjq','audiotime')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `audiotime` int(10) NOT NULL DEFAULT '0' COMMENT '音频时间'");}
if(!pdo_fieldexists('wx_school_bjq','link')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `link` varchar(1000) DEFAULT '' COMMENT '外链地址'");}
if(!pdo_fieldexists('wx_school_bjq','linkdesc')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `linkdesc` varchar(200) DEFAULT '' COMMENT '外链标题'");}
if(!pdo_fieldexists('wx_school_bjq','hftoname')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `hftoname` varchar(100) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_bjq','ali_vod_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `ali_vod_id` varchar(100) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_bjq','kc_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `kc_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_bjq','is_all')) {pdo_query("ALTER TABLE ".tablename('wx_school_bjq')." ADD   `is_all` tinyint(3) DEFAULT NULL COMMENT '是否全校可见'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_booksborrow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `bookname` varchar(200) NOT NULL,
  `worth` varchar(30) NOT NULL,
  `borrowtime` int(11) NOT NULL,
  `status` int(3) NOT NULL,
  `returntime` int(11) NOT NULL,
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_booksborrow','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_booksborrow')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_booksborrow','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_booksborrow')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_booksborrow','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_booksborrow')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_booksborrow','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_booksborrow')." ADD   `sid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_booksborrow','bookname')) {pdo_query("ALTER TABLE ".tablename('wx_school_booksborrow')." ADD   `bookname` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_school_booksborrow','worth')) {pdo_query("ALTER TABLE ".tablename('wx_school_booksborrow')." ADD   `worth` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_school_booksborrow','borrowtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_booksborrow')." ADD   `borrowtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_booksborrow','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_booksborrow')." ADD   `status` int(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_booksborrow','returntime')) {pdo_query("ALTER TABLE ".tablename('wx_school_booksborrow')." ADD   `returntime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_booksborrow','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_booksborrow')." ADD   `createtime` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_busgps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `macid` varchar(200) NOT NULL,
  `lat` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '经度',
  `lon` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '纬度',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_busgps','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_busgps')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_busgps','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_busgps')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_busgps','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_busgps')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_busgps','macid')) {pdo_query("ALTER TABLE ".tablename('wx_school_busgps')." ADD   `macid` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_school_busgps','lat')) {pdo_query("ALTER TABLE ".tablename('wx_school_busgps')." ADD   `lat` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '经度'");}
if(!pdo_fieldexists('wx_school_busgps','lon')) {pdo_query("ALTER TABLE ".tablename('wx_school_busgps')." ADD   `lon` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '纬度'");}
if(!pdo_fieldexists('wx_school_busgps','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_busgps')." ADD   `type` tinyint(1) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_busgps','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_busgps')." ADD   `createtime` int(10) unsigned NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_buzhulog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `start_yue` float(8,2) NOT NULL,
  `now_yue` float(8,2) NOT NULL,
  `starttime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_buzhulog','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_buzhulog')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_buzhulog','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_buzhulog')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_buzhulog','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_buzhulog')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_buzhulog','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_buzhulog')." ADD   `sid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_buzhulog','start_yue')) {pdo_query("ALTER TABLE ".tablename('wx_school_buzhulog')." ADD   `start_yue` float(8,2) NOT NULL");}
if(!pdo_fieldexists('wx_school_buzhulog','now_yue')) {pdo_query("ALTER TABLE ".tablename('wx_school_buzhulog')." ADD   `now_yue` float(8,2) NOT NULL");}
if(!pdo_fieldexists('wx_school_buzhulog','starttime')) {pdo_query("ALTER TABLE ".tablename('wx_school_buzhulog')." ADD   `starttime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_buzhulog','endtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_buzhulog')." ADD   `endtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_buzhulog','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_buzhulog')." ADD   `createtime` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_byinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `jbname` varchar(100) NOT NULL COMMENT '疾病名称',
  `jbstatus` text NOT NULL COMMENT '症状说明',
  `hospital` varchar(100) NOT NULL COMMENT '就诊医院',
  `fbtime` varchar(10) NOT NULL COMMENT '发病时间',
  `qztime` varchar(10) NOT NULL COMMENT '确诊时间',
  `zdzm` varchar(1000) NOT NULL COMMENT '诊断证明',
  `blzm` varchar(1000) NOT NULL COMMENT '病历证明',
  `zytime` varchar(10) NOT NULL COMMENT '治愈时间',
  `zyzm` varchar(1000) NOT NULL COMMENT '治愈证明',
  `stzk` varchar(100) NOT NULL COMMENT '身体状况',
  `tsign` varchar(1000) NOT NULL COMMENT '老师签名',
  `tsigntime` int(10) unsigned NOT NULL COMMENT '老师签字时间',
  `fktime` varchar(10) NOT NULL COMMENT '复课时间',
  `sqjtime` varchar(10) NOT NULL,
  `is_heal` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_byinfo','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_byinfo','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_byinfo','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_byinfo','jbname')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `jbname` varchar(100) NOT NULL COMMENT '疾病名称'");}
if(!pdo_fieldexists('wx_school_byinfo','jbstatus')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `jbstatus` text NOT NULL COMMENT '症状说明'");}
if(!pdo_fieldexists('wx_school_byinfo','hospital')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `hospital` varchar(100) NOT NULL COMMENT '就诊医院'");}
if(!pdo_fieldexists('wx_school_byinfo','fbtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `fbtime` varchar(10) NOT NULL COMMENT '发病时间'");}
if(!pdo_fieldexists('wx_school_byinfo','qztime')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `qztime` varchar(10) NOT NULL COMMENT '确诊时间'");}
if(!pdo_fieldexists('wx_school_byinfo','zdzm')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `zdzm` varchar(1000) NOT NULL COMMENT '诊断证明'");}
if(!pdo_fieldexists('wx_school_byinfo','blzm')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `blzm` varchar(1000) NOT NULL COMMENT '病历证明'");}
if(!pdo_fieldexists('wx_school_byinfo','zytime')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `zytime` varchar(10) NOT NULL COMMENT '治愈时间'");}
if(!pdo_fieldexists('wx_school_byinfo','zyzm')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `zyzm` varchar(1000) NOT NULL COMMENT '治愈证明'");}
if(!pdo_fieldexists('wx_school_byinfo','stzk')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `stzk` varchar(100) NOT NULL COMMENT '身体状况'");}
if(!pdo_fieldexists('wx_school_byinfo','tsign')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `tsign` varchar(1000) NOT NULL COMMENT '老师签名'");}
if(!pdo_fieldexists('wx_school_byinfo','tsigntime')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `tsigntime` int(10) unsigned NOT NULL COMMENT '老师签字时间'");}
if(!pdo_fieldexists('wx_school_byinfo','fktime')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `fktime` varchar(10) NOT NULL COMMENT '复课时间'");}
if(!pdo_fieldexists('wx_school_byinfo','sqjtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `sqjtime` varchar(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_byinfo','is_heal')) {pdo_query("ALTER TABLE ".tablename('wx_school_byinfo')." ADD   `is_heal` tinyint(4) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_camerapl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `carmeraid` int(10) unsigned NOT NULL COMMENT '画面ID',
  `userid` int(10) unsigned NOT NULL COMMENT '用户ID',
  `conet` text COMMENT '内容',
  `bj_id` int(10) unsigned NOT NULL COMMENT '班级ID',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1点赞2评论',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_camerapl','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_camerapl')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_camerapl','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_camerapl')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_camerapl','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_camerapl')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_camerapl','carmeraid')) {pdo_query("ALTER TABLE ".tablename('wx_school_camerapl')." ADD   `carmeraid` int(10) unsigned NOT NULL COMMENT '画面ID'");}
if(!pdo_fieldexists('wx_school_camerapl','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_camerapl')." ADD   `userid` int(10) unsigned NOT NULL COMMENT '用户ID'");}
if(!pdo_fieldexists('wx_school_camerapl','conet')) {pdo_query("ALTER TABLE ".tablename('wx_school_camerapl')." ADD   `conet` text COMMENT '内容'");}
if(!pdo_fieldexists('wx_school_camerapl','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_camerapl')." ADD   `bj_id` int(10) unsigned NOT NULL COMMENT '班级ID'");}
if(!pdo_fieldexists('wx_school_camerapl','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_camerapl')." ADD   `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1点赞2评论'");}
if(!pdo_fieldexists('wx_school_camerapl','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_camerapl')." ADD   `createtime` int(10) unsigned NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_camerask` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `carmeraid` int(10) unsigned NOT NULL COMMENT '画面ID',
  `userid` int(10) unsigned NOT NULL COMMENT '用户ID',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1视频试看',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_camerask','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_camerask')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_camerask','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_camerask')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_camerask','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_camerask')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_camerask','carmeraid')) {pdo_query("ALTER TABLE ".tablename('wx_school_camerask')." ADD   `carmeraid` int(10) unsigned NOT NULL COMMENT '画面ID'");}
if(!pdo_fieldexists('wx_school_camerask','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_camerask')." ADD   `userid` int(10) unsigned NOT NULL COMMENT '用户ID'");}
if(!pdo_fieldexists('wx_school_camerask','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_camerask')." ADD   `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1视频试看'");}
if(!pdo_fieldexists('wx_school_camerask','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_camerask')." ADD   `createtime` int(10) unsigned NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_changbjlog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `tid` int(11) NOT NULL COMMENT '操作员',
  `beforekcid` int(11) NOT NULL COMMENT '转班之前的课程',
  `afterkcid` int(11) NOT NULL COMMENT '转班之后的课程',
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_changbjlog','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_changbjlog')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_changbjlog','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_changbjlog')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_changbjlog','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_changbjlog')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_changbjlog','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_changbjlog')." ADD   `sid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_changbjlog','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_changbjlog')." ADD   `tid` int(11) NOT NULL COMMENT '操作员'");}
if(!pdo_fieldexists('wx_school_changbjlog','beforekcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_changbjlog')." ADD   `beforekcid` int(11) NOT NULL COMMENT '转班之前的课程'");}
if(!pdo_fieldexists('wx_school_changbjlog','afterkcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_changbjlog')." ADD   `afterkcid` int(11) NOT NULL COMMENT '转班之后的课程'");}
if(!pdo_fieldexists('wx_school_changbjlog','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_changbjlog')." ADD   `createtime` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_checkdatedetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `year` int(10) NOT NULL,
  `sum_start` varchar(20) NOT NULL,
  `sum_end` varchar(20) NOT NULL,
  `win_start` varchar(20) NOT NULL,
  `win_end` varchar(20) NOT NULL,
  `holiday` varchar(1000) NOT NULL,
  `checkdatesetid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_checkdatedetail','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdatedetail')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_checkdatedetail','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdatedetail')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkdatedetail','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdatedetail')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkdatedetail','year')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdatedetail')." ADD   `year` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkdatedetail','sum_start')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdatedetail')." ADD   `sum_start` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkdatedetail','sum_end')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdatedetail')." ADD   `sum_end` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkdatedetail','win_start')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdatedetail')." ADD   `win_start` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkdatedetail','win_end')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdatedetail')." ADD   `win_end` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkdatedetail','holiday')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdatedetail')." ADD   `holiday` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkdatedetail','checkdatesetid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdatedetail')." ADD   `checkdatesetid` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_checkdateset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(10) NOT NULL,
  `weid` int(10) NOT NULL,
  `name` varchar(500) NOT NULL,
  `friday` tinyint(3) NOT NULL,
  `saturday` tinyint(3) NOT NULL,
  `sunday` tinyint(3) NOT NULL,
  `holiday` varchar(1000) NOT NULL,
  `bj_id` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_checkdateset','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdateset')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_checkdateset','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdateset')." ADD   `schoolid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkdateset','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdateset')." ADD   `weid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkdateset','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdateset')." ADD   `name` varchar(500) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkdateset','friday')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdateset')." ADD   `friday` tinyint(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkdateset','saturday')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdateset')." ADD   `saturday` tinyint(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkdateset','sunday')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdateset')." ADD   `sunday` tinyint(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkdateset','holiday')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdateset')." ADD   `holiday` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkdateset','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkdateset')." ADD   `bj_id` varchar(1000) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_checklog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `macid` int(10) unsigned NOT NULL,
  `cardid` varchar(200) NOT NULL DEFAULT '' COMMENT '卡号',
  `sid` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `bj_id` int(10) unsigned NOT NULL,
  `lat` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '经度',
  `lon` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '纬度',
  `temperature` varchar(10) DEFAULT '',
  `pic` varchar(255) DEFAULT '' COMMENT '图片',
  `pic2` varchar(255) DEFAULT '' COMMENT '图片2',
  `type` varchar(50) DEFAULT '' COMMENT '进校类型',
  `leixing` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1进校2离校3迟到4早退',
  `isread` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1已读2未读',
  `pard` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '1本人2母亲3父亲4爷爷5奶奶6外公7外婆8叔叔9阿姨10其他11老师',
  `qdtid` int(11) NOT NULL COMMENT '代签老师ID',
  `checktype` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1刷卡2微信',
  `isconfirm` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1确认2拒绝',
  `createtime` int(10) unsigned NOT NULL,
  `sc_ap` tinyint(3) NOT NULL COMMENT '0普通考勤1寝室考勤',
  `apid` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  `ap_type` tinyint(3) NOT NULL COMMENT '1进寝2离寝',
  `pname` varchar(100) NOT NULL COMMENT '刷卡人名字',
  `bet` varchar(10) NOT NULL COMMENT '距学校距离',
  `surestatus` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_checklog','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_checklog','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_checklog','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_checklog','macid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `macid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_checklog','cardid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `cardid` varchar(200) NOT NULL DEFAULT '' COMMENT '卡号'");}
if(!pdo_fieldexists('wx_school_checklog','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `sid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_checklog','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `tid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_checklog','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `bj_id` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_checklog','lat')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `lat` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '经度'");}
if(!pdo_fieldexists('wx_school_checklog','lon')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `lon` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '纬度'");}
if(!pdo_fieldexists('wx_school_checklog','temperature')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `temperature` varchar(10) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_checklog','pic')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `pic` varchar(255) DEFAULT '' COMMENT '图片'");}
if(!pdo_fieldexists('wx_school_checklog','pic2')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `pic2` varchar(255) DEFAULT '' COMMENT '图片2'");}
if(!pdo_fieldexists('wx_school_checklog','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `type` varchar(50) DEFAULT '' COMMENT '进校类型'");}
if(!pdo_fieldexists('wx_school_checklog','leixing')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `leixing` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1进校2离校3迟到4早退'");}
if(!pdo_fieldexists('wx_school_checklog','isread')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `isread` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1已读2未读'");}
if(!pdo_fieldexists('wx_school_checklog','pard')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `pard` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '1本人2母亲3父亲4爷爷5奶奶6外公7外婆8叔叔9阿姨10其他11老师'");}
if(!pdo_fieldexists('wx_school_checklog','qdtid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `qdtid` int(11) NOT NULL COMMENT '代签老师ID'");}
if(!pdo_fieldexists('wx_school_checklog','checktype')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `checktype` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1刷卡2微信'");}
if(!pdo_fieldexists('wx_school_checklog','isconfirm')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `isconfirm` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1确认2拒绝'");}
if(!pdo_fieldexists('wx_school_checklog','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_checklog','sc_ap')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `sc_ap` tinyint(3) NOT NULL COMMENT '0普通考勤1寝室考勤'");}
if(!pdo_fieldexists('wx_school_checklog','apid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `apid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_checklog','roomid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `roomid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_checklog','ap_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `ap_type` tinyint(3) NOT NULL COMMENT '1进寝2离寝'");}
if(!pdo_fieldexists('wx_school_checklog','pname')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `pname` varchar(100) NOT NULL COMMENT '刷卡人名字'");}
if(!pdo_fieldexists('wx_school_checklog','bet')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `bet` varchar(10) NOT NULL COMMENT '距学校距离'");}
if(!pdo_fieldexists('wx_school_checklog','surestatus')) {pdo_query("ALTER TABLE ".tablename('wx_school_checklog')." ADD   `surestatus` tinyint(1) NOT NULL DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_checkmac` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `macname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `macid` varchar(200) NOT NULL DEFAULT '' COMMENT '设备编号',
  `banner` varchar(2000) DEFAULT '',
  `macset` varchar(2000) DEFAULT '',
  `is_on` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1启用2不启用',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1进校2离校',
  `createtime` int(10) unsigned NOT NULL,
  `cardtype` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1IC2ID',
  `twmac` varchar(200) NOT NULL DEFAULT '-1',
  `is_bobao` tinyint(1) NOT NULL DEFAULT '1' COMMENT '播报',
  `is_master` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否全校',
  `bj_id` int(10) unsigned DEFAULT NULL COMMENT '绑定班级ID',
  `js_id` int(10) unsigned DEFAULT NULL COMMENT '教室ID',
  `areaid` int(10) NOT NULL,
  `model_type` tinyint(1) NOT NULL,
  `qh_id` int(10) NOT NULL,
  `exam_plan` varchar(1000) NOT NULL,
  `exam_room_name` varchar(200) NOT NULL,
  `cityname` varchar(50) NOT NULL,
  `apid` int(11) NOT NULL,
  `stu1` int(10) DEFAULT NULL,
  `stu2` int(10) DEFAULT NULL,
  `stu3` int(10) DEFAULT NULL,
  `lastedittime` int(11) DEFAULT NULL COMMENT '最近一次修改时间',
  `is_heartbeat` tinyint(3) DEFAULT NULL COMMENT '是否接收心跳任务',
  `sbimg` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_checkmac','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_checkmac','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac','macname')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `macname` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `name` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac','macid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `macid` varchar(200) NOT NULL DEFAULT '' COMMENT '设备编号'");}
if(!pdo_fieldexists('wx_school_checkmac','banner')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `banner` varchar(2000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_checkmac','macset')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `macset` varchar(2000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_checkmac','is_on')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `is_on` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1启用2不启用'");}
if(!pdo_fieldexists('wx_school_checkmac','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1进校2离校'");}
if(!pdo_fieldexists('wx_school_checkmac','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac','cardtype')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `cardtype` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1IC2ID'");}
if(!pdo_fieldexists('wx_school_checkmac','twmac')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `twmac` varchar(200) NOT NULL DEFAULT '-1'");}
if(!pdo_fieldexists('wx_school_checkmac','is_bobao')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `is_bobao` tinyint(1) NOT NULL DEFAULT '1' COMMENT '播报'");}
if(!pdo_fieldexists('wx_school_checkmac','is_master')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `is_master` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否全校'");}
if(!pdo_fieldexists('wx_school_checkmac','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `bj_id` int(10) unsigned DEFAULT NULL COMMENT '绑定班级ID'");}
if(!pdo_fieldexists('wx_school_checkmac','js_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `js_id` int(10) unsigned DEFAULT NULL COMMENT '教室ID'");}
if(!pdo_fieldexists('wx_school_checkmac','areaid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `areaid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac','model_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `model_type` tinyint(1) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac','qh_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `qh_id` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac','exam_plan')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `exam_plan` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac','exam_room_name')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `exam_room_name` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac','cityname')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `cityname` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac','apid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `apid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac','stu1')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `stu1` int(10) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_checkmac','stu2')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `stu2` int(10) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_checkmac','stu3')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `stu3` int(10) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_checkmac','lastedittime')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `lastedittime` int(11) DEFAULT NULL COMMENT '最近一次修改时间'");}
if(!pdo_fieldexists('wx_school_checkmac','is_heartbeat')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `is_heartbeat` tinyint(3) DEFAULT NULL COMMENT '是否接收心跳任务'");}
if(!pdo_fieldexists('wx_school_checkmac','sbimg')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac')." ADD   `sbimg` varchar(1000) DEFAULT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_checkmac_remote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `pid` varchar(100) NOT NULL,
  `deviceId` varchar(100) NOT NULL,
  `passType` int(11) NOT NULL,
  `passDeviceId` varchar(255) NOT NULL,
  `cameras` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_checkmac_remote','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac_remote')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_checkmac_remote','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac_remote')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac_remote','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac_remote')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac_remote','pid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac_remote')." ADD   `pid` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac_remote','deviceId')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac_remote')." ADD   `deviceId` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac_remote','passType')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac_remote')." ADD   `passType` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac_remote','passDeviceId')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac_remote')." ADD   `passDeviceId` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_checkmac_remote','cameras')) {pdo_query("ALTER TABLE ".tablename('wx_school_checkmac_remote')." ADD   `cameras` varchar(255) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_checktimeset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `start` varchar(20) NOT NULL,
  `end` varchar(20) NOT NULL,
  `type` tinyint(3) NOT NULL COMMENT '1工作日2周五3周六4周日5特殊上6特殊休',
  `year` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `checkdatesetid` int(11) NOT NULL,
  `out_in` tinyint(1) DEFAULT NULL,
  `s_type` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_checktimeset','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_checktimeset')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_checktimeset','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checktimeset')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_checktimeset','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checktimeset')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_checktimeset','start')) {pdo_query("ALTER TABLE ".tablename('wx_school_checktimeset')." ADD   `start` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_checktimeset','end')) {pdo_query("ALTER TABLE ".tablename('wx_school_checktimeset')." ADD   `end` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_checktimeset','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_checktimeset')." ADD   `type` tinyint(3) NOT NULL COMMENT '1工作日2周五3周六4周日5特殊上6特殊休'");}
if(!pdo_fieldexists('wx_school_checktimeset','year')) {pdo_query("ALTER TABLE ".tablename('wx_school_checktimeset')." ADD   `year` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_checktimeset','date')) {pdo_query("ALTER TABLE ".tablename('wx_school_checktimeset')." ADD   `date` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_checktimeset','checkdatesetid')) {pdo_query("ALTER TABLE ".tablename('wx_school_checktimeset')." ADD   `checkdatesetid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_checktimeset','out_in')) {pdo_query("ALTER TABLE ".tablename('wx_school_checktimeset')." ADD   `out_in` tinyint(1) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_checktimeset','s_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_checktimeset')." ADD   `s_type` tinyint(1) DEFAULT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_chongzhi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `cost` float NOT NULL,
  `chongzhi` int(11) NOT NULL,
  `createtime` int(11) NOT NULL,
  `ssort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_chongzhi','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_chongzhi')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_chongzhi','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_chongzhi')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_chongzhi','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_chongzhi')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_chongzhi','cost')) {pdo_query("ALTER TABLE ".tablename('wx_school_chongzhi')." ADD   `cost` float NOT NULL");}
if(!pdo_fieldexists('wx_school_chongzhi','chongzhi')) {pdo_query("ALTER TABLE ".tablename('wx_school_chongzhi')." ADD   `chongzhi` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_chongzhi','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_chongzhi')." ADD   `createtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_chongzhi','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_chongzhi')." ADD   `ssort` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_classcard_checklog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `macid` int(10) unsigned NOT NULL,
  `cardid` varchar(200) NOT NULL DEFAULT '' COMMENT '卡号',
  `sid` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `bj_id` int(10) unsigned NOT NULL,
  `lat` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '经度',
  `lon` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '纬度',
  `temperature` varchar(10) DEFAULT '',
  `pic` varchar(255) DEFAULT '' COMMENT '图片',
  `type` varchar(50) DEFAULT '' COMMENT '进校类型',
  `leixing` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1进校2离校3迟到4早退',
  `pard` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '1本人2母亲3父亲4爷爷5奶奶6外公7外婆8叔叔9阿姨10其他11老师',
  `createtime` int(10) unsigned NOT NULL,
  `isread` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1已读2未读',
  `checktype` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1刷卡2微信',
  `isconfirm` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1确认2拒绝',
  `qdtid` int(11) NOT NULL COMMENT '代签userid',
  `pic2` varchar(255) DEFAULT '' COMMENT '图片2',
  `sc_ap` tinyint(3) NOT NULL COMMENT '0普通考勤1寝室考勤',
  `apid` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  `ap_type` tinyint(3) NOT NULL COMMENT '1进寝2离寝',
  `pname` varchar(100) NOT NULL COMMENT '刷卡人名字',
  PRIMARY KEY (`id`),
  KEY `rds_idx_0` (`leixing`,`isconfirm`,`sid`,`createtime`),
  KEY `rds_idx_1` (`cardid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_classcard_checklog','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_classcard_checklog','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_checklog','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_checklog','macid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `macid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_checklog','cardid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `cardid` varchar(200) NOT NULL DEFAULT '' COMMENT '卡号'");}
if(!pdo_fieldexists('wx_school_classcard_checklog','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `sid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_checklog','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `tid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_checklog','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `bj_id` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_checklog','lat')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `lat` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '经度'");}
if(!pdo_fieldexists('wx_school_classcard_checklog','lon')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `lon` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '纬度'");}
if(!pdo_fieldexists('wx_school_classcard_checklog','temperature')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `temperature` varchar(10) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_classcard_checklog','pic')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `pic` varchar(255) DEFAULT '' COMMENT '图片'");}
if(!pdo_fieldexists('wx_school_classcard_checklog','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `type` varchar(50) DEFAULT '' COMMENT '进校类型'");}
if(!pdo_fieldexists('wx_school_classcard_checklog','leixing')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `leixing` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1进校2离校3迟到4早退'");}
if(!pdo_fieldexists('wx_school_classcard_checklog','pard')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `pard` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '1本人2母亲3父亲4爷爷5奶奶6外公7外婆8叔叔9阿姨10其他11老师'");}
if(!pdo_fieldexists('wx_school_classcard_checklog','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_checklog','isread')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `isread` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1已读2未读'");}
if(!pdo_fieldexists('wx_school_classcard_checklog','checktype')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `checktype` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1刷卡2微信'");}
if(!pdo_fieldexists('wx_school_classcard_checklog','isconfirm')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `isconfirm` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1确认2拒绝'");}
if(!pdo_fieldexists('wx_school_classcard_checklog','qdtid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `qdtid` int(11) NOT NULL COMMENT '代签userid'");}
if(!pdo_fieldexists('wx_school_classcard_checklog','pic2')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `pic2` varchar(255) DEFAULT '' COMMENT '图片2'");}
if(!pdo_fieldexists('wx_school_classcard_checklog','sc_ap')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `sc_ap` tinyint(3) NOT NULL COMMENT '0普通考勤1寝室考勤'");}
if(!pdo_fieldexists('wx_school_classcard_checklog','apid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `apid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_checklog','roomid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `roomid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_checklog','ap_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `ap_type` tinyint(3) NOT NULL COMMENT '1进寝2离寝'");}
if(!pdo_fieldexists('wx_school_classcard_checklog','pname')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   `pname` varchar(100) NOT NULL COMMENT '刷卡人名字'");}
if(!pdo_fieldexists('wx_school_classcard_checklog','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   PRIMARY KEY (`id`)");}
if(!pdo_fieldexists('wx_school_classcard_checklog','rds_idx_0')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_checklog')." ADD   KEY `rds_idx_0` (`leixing`,`isconfirm`,`sid`,`createtime`)");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_classcard_duty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id',
  `weid` int(10) unsigned NOT NULL,
  `bj_id` int(10) unsigned NOT NULL,
  `monday` text NOT NULL,
  `tuesday` text NOT NULL,
  `wednesday` text NOT NULL,
  `thursday` text NOT NULL,
  `friday` text NOT NULL,
  `saturday` text NOT NULL,
  `sunday` text NOT NULL,
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_classcard_duty','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_duty')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_classcard_duty','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_duty')." ADD   `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id'");}
if(!pdo_fieldexists('wx_school_classcard_duty','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_duty')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_duty','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_duty')." ADD   `bj_id` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_duty','monday')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_duty')." ADD   `monday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_duty','tuesday')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_duty')." ADD   `tuesday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_duty','wednesday')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_duty')." ADD   `wednesday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_duty','thursday')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_duty')." ADD   `thursday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_duty','friday')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_duty')." ADD   `friday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_duty','saturday')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_duty')." ADD   `saturday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_duty','sunday')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_duty')." ADD   `sunday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_duty','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_duty')." ADD   `createtime` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_classcard_epaper` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `bj_id` int(11) NOT NULL,
  `epaperName` varchar(255) NOT NULL,
  `pictureUrls` text NOT NULL,
  `addTime` int(11) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_classcard_epaper','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_epaper')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_classcard_epaper','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_epaper')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_epaper','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_epaper')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_epaper','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_epaper')." ADD   `bj_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_epaper','epaperName')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_epaper')." ADD   `epaperName` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_epaper','pictureUrls')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_epaper')." ADD   `pictureUrls` text NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_epaper','addTime')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_epaper')." ADD   `addTime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_epaper','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_epaper')." ADD   `createtime` int(10) unsigned NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_classcard_honour` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `bj_id` int(11) NOT NULL,
  `honourName` varchar(255) NOT NULL,
  `pictureUrls` text NOT NULL,
  `addTime` int(11) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_classcard_honour','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_honour')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_classcard_honour','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_honour')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_honour','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_honour')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_honour','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_honour')." ADD   `bj_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_honour','honourName')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_honour')." ADD   `honourName` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_honour','pictureUrls')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_honour')." ADD   `pictureUrls` text NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_honour','addTime')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_honour')." ADD   `addTime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_honour','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_honour')." ADD   `createtime` int(10) unsigned NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_classcard_kouhao` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `bj_id` int(11) NOT NULL,
  `classAdvert` varchar(255) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_classcard_kouhao','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_kouhao')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_classcard_kouhao','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_kouhao')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_kouhao','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_kouhao')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_kouhao','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_kouhao')." ADD   `bj_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_kouhao','classAdvert')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_kouhao')." ADD   `classAdvert` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_kouhao','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_kouhao')." ADD   `createtime` int(10) unsigned NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_classcard_mac` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `macid` varchar(200) NOT NULL DEFAULT '' COMMENT '设备编号',
  `banner` varchar(2000) DEFAULT '',
  `ipc` text COMMENT '摄像机信息',
  `macset` varchar(2000) DEFAULT '',
  `is_on` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1启用2不启用',
  `createtime` int(10) unsigned NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1进校2离校',
  `twmac` varchar(200) NOT NULL DEFAULT '-1',
  `cardtype` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1IC2ID',
  `bj_id` int(10) unsigned NOT NULL COMMENT '班级id',
  `is_master` tinyint(3) unsigned NOT NULL COMMENT '是否全校播报',
  `is_bobao` tinyint(1) NOT NULL DEFAULT '1' COMMENT '播报',
  `js_id` int(10) unsigned DEFAULT NULL COMMENT '教室ID',
  `areaid` int(10) NOT NULL,
  `model_type` tinyint(1) NOT NULL,
  `qh_id` int(10) NOT NULL,
  `exam_plan` varchar(1000) NOT NULL,
  `cityname` varchar(50) NOT NULL,
  `exam_room_name` varchar(200) NOT NULL,
  `apid` int(11) NOT NULL,
  `lastedittime` int(11) DEFAULT NULL COMMENT '最近一次修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_classcard_mac','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_classcard_mac','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_mac','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_mac','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `name` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_mac','macid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `macid` varchar(200) NOT NULL DEFAULT '' COMMENT '设备编号'");}
if(!pdo_fieldexists('wx_school_classcard_mac','banner')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `banner` varchar(2000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_classcard_mac','ipc')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `ipc` text COMMENT '摄像机信息'");}
if(!pdo_fieldexists('wx_school_classcard_mac','macset')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `macset` varchar(2000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_classcard_mac','is_on')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `is_on` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1启用2不启用'");}
if(!pdo_fieldexists('wx_school_classcard_mac','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_mac','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1进校2离校'");}
if(!pdo_fieldexists('wx_school_classcard_mac','twmac')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `twmac` varchar(200) NOT NULL DEFAULT '-1'");}
if(!pdo_fieldexists('wx_school_classcard_mac','cardtype')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `cardtype` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1IC2ID'");}
if(!pdo_fieldexists('wx_school_classcard_mac','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `bj_id` int(10) unsigned NOT NULL COMMENT '班级id'");}
if(!pdo_fieldexists('wx_school_classcard_mac','is_master')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `is_master` tinyint(3) unsigned NOT NULL COMMENT '是否全校播报'");}
if(!pdo_fieldexists('wx_school_classcard_mac','is_bobao')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `is_bobao` tinyint(1) NOT NULL DEFAULT '1' COMMENT '播报'");}
if(!pdo_fieldexists('wx_school_classcard_mac','js_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `js_id` int(10) unsigned DEFAULT NULL COMMENT '教室ID'");}
if(!pdo_fieldexists('wx_school_classcard_mac','areaid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `areaid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_mac','model_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `model_type` tinyint(1) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_mac','qh_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `qh_id` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_mac','exam_plan')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `exam_plan` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_mac','cityname')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `cityname` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_mac','exam_room_name')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `exam_room_name` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_mac','apid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `apid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_mac','lastedittime')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_mac')." ADD   `lastedittime` int(11) DEFAULT NULL COMMENT '最近一次修改时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_classcard_praise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `bj_id` int(11) NOT NULL,
  `praise` varchar(255) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `zhu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_classcard_praise','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_classcard_praise','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_praise','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_praise','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise')." ADD   `bj_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_praise','praise')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise')." ADD   `praise` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_praise','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_praise','zhu')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise')." ADD   `zhu` varchar(255) DEFAULT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_classcard_praise_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `bj_id` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `title` text COMMENT '内容',
  `createtime` int(10) unsigned NOT NULL,
  `ssort` int(10) unsigned NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_classcard_praise_comment','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise_comment')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_classcard_praise_comment','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise_comment')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_praise_comment','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise_comment')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_praise_comment','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise_comment')." ADD   `bj_id` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_praise_comment','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise_comment')." ADD   `tid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_praise_comment','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise_comment')." ADD   `title` text COMMENT '内容'");}
if(!pdo_fieldexists('wx_school_classcard_praise_comment','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise_comment')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_praise_comment','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise_comment')." ADD   `ssort` int(10) unsigned NOT NULL COMMENT '排序'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_classcard_praise_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `title` text COMMENT '内容',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_classcard_praise_type','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise_type')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_classcard_praise_type','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise_type')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_praise_type','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise_type')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_praise_type','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise_type')." ADD   `tid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_praise_type','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise_type')." ADD   `title` text COMMENT '内容'");}
if(!pdo_fieldexists('wx_school_classcard_praise_type','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_praise_type')." ADD   `createtime` int(10) unsigned NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_classcard_set` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `bj_id` int(11) NOT NULL,
  `praise` varchar(255) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `starttime` varchar(20) NOT NULL,
  `endtime` varchar(20) NOT NULL,
  `img` varchar(2000) NOT NULL,
  `accessKeyID` varchar(255) NOT NULL,
  `accessKeySecret` varchar(255) NOT NULL,
  `bucket` varchar(255) NOT NULL,
  `endpoint` varchar(255) NOT NULL,
  `appKey` varchar(255) NOT NULL,
  `roleArn` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_classcard_set','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_set')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_classcard_set','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_set')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_set','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_set')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_set','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_set')." ADD   `bj_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_set','praise')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_set')." ADD   `praise` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_set','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_set')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_set','starttime')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_set')." ADD   `starttime` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_set','endtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_set')." ADD   `endtime` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_set','img')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_set')." ADD   `img` varchar(2000) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_set','accessKeyID')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_set')." ADD   `accessKeyID` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_set','accessKeySecret')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_set')." ADD   `accessKeySecret` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_set','bucket')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_set')." ADD   `bucket` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_set','endpoint')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_set')." ADD   `endpoint` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_set','appKey')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_set')." ADD   `appKey` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_classcard_set','roleArn')) {pdo_query("ALTER TABLE ".tablename('wx_school_classcard_set')." ADD   `roleArn` varchar(255) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_classify` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id',
  `sname` varchar(50) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `ssort` int(5) NOT NULL,
  `weid` int(10) unsigned NOT NULL,
  `type` char(20) NOT NULL,
  `carmeraid` text COMMENT '画面ID组',
  `erwei` varchar(200) NOT NULL DEFAULT '' COMMENT '群二维码',
  `qun` varchar(200) NOT NULL DEFAULT '' COMMENT 'QQ群链接',
  `video` varchar(1000) NOT NULL DEFAULT '' COMMENT '教室监控地址',
  `video1` varchar(1000) NOT NULL DEFAULT '' COMMENT '教室监控地址1',
  `videostart` varchar(50) NOT NULL,
  `videoend` varchar(50) NOT NULL,
  `allowpy` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1允许2拒绝',
  `cost` varchar(11) NOT NULL COMMENT '报名费用',
  `videoclick` varchar(11) NOT NULL COMMENT '视频点击量',
  `tid` int(11) unsigned NOT NULL COMMENT '班级主任userid',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID,0为第一级',
  `is_over` tinyint(1) NOT NULL DEFAULT '1',
  `start` varchar(1000) DEFAULT '' COMMENT '班级之星',
  `star` varchar(1000) DEFAULT '' COMMENT '班级之星',
  `qh_bjlist` varchar(1000) DEFAULT '' COMMENT '期号对应班级',
  `icon` varchar(500) DEFAULT '' COMMENT '图标',
  `qhtype` tinyint(1) NOT NULL DEFAULT '1',
  `is_bjzx` tinyint(1) NOT NULL DEFAULT '1' COMMENT '班级之星',
  `sd_start` int(11) NOT NULL,
  `sd_end` int(11) NOT NULL,
  `js_id` int(10) NOT NULL,
  `datesetid` int(11) NOT NULL,
  `class_device` varchar(100) NOT NULL COMMENT '分班播报id',
  `is_print` tinyint(1) NOT NULL DEFAULT '2' COMMENT '是否启用打印机',
  `printarr` varchar(100) NOT NULL DEFAULT '' COMMENT '打印机',
  `tidarr` varchar(500) NOT NULL,
  `fzid` int(11) NOT NULL,
  `is_review` tinyint(3) NOT NULL,
  `addedinfo` text NOT NULL COMMENT '附加设置信息-以后所有不索引的附加信息都在这里，不用再加字段',
  `lastedittime` int(11) DEFAULT NULL COMMENT '最近一次修改时间',
  `checksendset` text COMMENT '考勤记录推送对象',
  `typt_id` varchar(30) NOT NULL COMMENT '统一平台对应 ID',
  `njabbr` varchar(10) NOT NULL COMMENT '年级缩写编码',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_classify','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD 
  `sid` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_classify','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id'");}
if(!pdo_fieldexists('wx_school_classify','sname')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `sname` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_classify','pname')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `pname` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_classify','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `ssort` int(5) NOT NULL");}
if(!pdo_fieldexists('wx_school_classify','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_classify','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `type` char(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_classify','carmeraid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `carmeraid` text COMMENT '画面ID组'");}
if(!pdo_fieldexists('wx_school_classify','erwei')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `erwei` varchar(200) NOT NULL DEFAULT '' COMMENT '群二维码'");}
if(!pdo_fieldexists('wx_school_classify','qun')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `qun` varchar(200) NOT NULL DEFAULT '' COMMENT 'QQ群链接'");}
if(!pdo_fieldexists('wx_school_classify','video')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `video` varchar(1000) NOT NULL DEFAULT '' COMMENT '教室监控地址'");}
if(!pdo_fieldexists('wx_school_classify','video1')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `video1` varchar(1000) NOT NULL DEFAULT '' COMMENT '教室监控地址1'");}
if(!pdo_fieldexists('wx_school_classify','videostart')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `videostart` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_classify','videoend')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `videoend` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_classify','allowpy')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `allowpy` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1允许2拒绝'");}
if(!pdo_fieldexists('wx_school_classify','cost')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `cost` varchar(11) NOT NULL COMMENT '报名费用'");}
if(!pdo_fieldexists('wx_school_classify','videoclick')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `videoclick` varchar(11) NOT NULL COMMENT '视频点击量'");}
if(!pdo_fieldexists('wx_school_classify','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `tid` int(11) unsigned NOT NULL COMMENT '班级主任userid'");}
if(!pdo_fieldexists('wx_school_classify','parentid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `parentid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID,0为第一级'");}
if(!pdo_fieldexists('wx_school_classify','is_over')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `is_over` tinyint(1) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_classify','start')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `start` varchar(1000) DEFAULT '' COMMENT '班级之星'");}
if(!pdo_fieldexists('wx_school_classify','star')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `star` varchar(1000) DEFAULT '' COMMENT '班级之星'");}
if(!pdo_fieldexists('wx_school_classify','qh_bjlist')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `qh_bjlist` varchar(1000) DEFAULT '' COMMENT '期号对应班级'");}
if(!pdo_fieldexists('wx_school_classify','icon')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `icon` varchar(500) DEFAULT '' COMMENT '图标'");}
if(!pdo_fieldexists('wx_school_classify','qhtype')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `qhtype` tinyint(1) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_classify','is_bjzx')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `is_bjzx` tinyint(1) NOT NULL DEFAULT '1' COMMENT '班级之星'");}
if(!pdo_fieldexists('wx_school_classify','sd_start')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `sd_start` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_classify','sd_end')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `sd_end` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_classify','js_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `js_id` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_classify','datesetid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `datesetid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_classify','class_device')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `class_device` varchar(100) NOT NULL COMMENT '分班播报id'");}
if(!pdo_fieldexists('wx_school_classify','is_print')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `is_print` tinyint(1) NOT NULL DEFAULT '2' COMMENT '是否启用打印机'");}
if(!pdo_fieldexists('wx_school_classify','printarr')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `printarr` varchar(100) NOT NULL DEFAULT '' COMMENT '打印机'");}
if(!pdo_fieldexists('wx_school_classify','tidarr')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `tidarr` varchar(500) NOT NULL");}
if(!pdo_fieldexists('wx_school_classify','fzid')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `fzid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_classify','is_review')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `is_review` tinyint(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_classify','addedinfo')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `addedinfo` text NOT NULL COMMENT '附加设置信息-以后所有不索引的附加信息都在这里，不用再加字段'");}
if(!pdo_fieldexists('wx_school_classify','lastedittime')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `lastedittime` int(11) DEFAULT NULL COMMENT '最近一次修改时间'");}
if(!pdo_fieldexists('wx_school_classify','checksendset')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `checksendset` text COMMENT '考勤记录推送对象'");}
if(!pdo_fieldexists('wx_school_classify','typt_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `typt_id` varchar(30) NOT NULL COMMENT '统一平台对应 ID'");}
if(!pdo_fieldexists('wx_school_classify','njabbr')) {pdo_query("ALTER TABLE ".tablename('wx_school_classify')." ADD   `njabbr` varchar(10) NOT NULL COMMENT '年级缩写编码'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_cookbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id',
  `weid` int(10) unsigned NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `begintime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `monday` text NOT NULL,
  `tuesday` text NOT NULL,
  `wednesday` text NOT NULL,
  `thursday` text NOT NULL,
  `friday` text NOT NULL,
  `saturday` text NOT NULL,
  `sunday` text NOT NULL,
  `ishow` int(1) NOT NULL DEFAULT '1' COMMENT '1:显示,2隐藏,默认1',
  `sort` int(11) NOT NULL DEFAULT '1',
  `type` varchar(15) NOT NULL DEFAULT '',
  `headpic` varchar(200) NOT NULL DEFAULT '',
  `infos` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_cookbook','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_cookbook','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id'");}
if(!pdo_fieldexists('wx_school_cookbook','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_cookbook','keyword')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `keyword` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_cookbook','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `title` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_cookbook','begintime')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `begintime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_cookbook','endtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `endtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_cookbook','monday')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `monday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_cookbook','tuesday')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `tuesday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_cookbook','wednesday')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `wednesday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_cookbook','thursday')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `thursday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_cookbook','friday')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `friday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_cookbook','saturday')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `saturday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_cookbook','sunday')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `sunday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_cookbook','ishow')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `ishow` int(1) NOT NULL DEFAULT '1' COMMENT '1:显示,2隐藏,默认1'");}
if(!pdo_fieldexists('wx_school_cookbook','sort')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `sort` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_cookbook','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `type` varchar(15) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wx_school_cookbook','headpic')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `headpic` varchar(200) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wx_school_cookbook','infos')) {pdo_query("ALTER TABLE ".tablename('wx_school_cookbook')." ADD   `infos` varchar(500) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_cost` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `cost` decimal(18,2) NOT NULL DEFAULT '0.00',
  `bj_id` text COMMENT '关联班级组',
  `name` varchar(100) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `description` text NOT NULL COMMENT '缴费说明',
  `about` int(10) unsigned NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `is_sys` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1关联缴费，2不关联',
  `is_time` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1有时间限制，2不限制',
  `is_on` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1启用，2不启用',
  `createtime` int(10) unsigned NOT NULL,
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  `dataline` int(10) unsigned NOT NULL,
  `payweid` int(10) unsigned NOT NULL COMMENT '支付公众号',
  `is_print` tinyint(1) NOT NULL DEFAULT '2' COMMENT '是否启用打印机',
  `printarr` varchar(100) NOT NULL DEFAULT '' COMMENT '打印机',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_cost','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_cost','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_cost','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_cost','cost')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `cost` decimal(18,2) NOT NULL DEFAULT '0.00'");}
if(!pdo_fieldexists('wx_school_cost','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `bj_id` text COMMENT '关联班级组'");}
if(!pdo_fieldexists('wx_school_cost','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `name` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_cost','icon')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `icon` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_cost','description')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `description` text NOT NULL COMMENT '缴费说明'");}
if(!pdo_fieldexists('wx_school_cost','about')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `about` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_cost','displayorder')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `displayorder` tinyint(3) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_cost','is_sys')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `is_sys` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1关联缴费，2不关联'");}
if(!pdo_fieldexists('wx_school_cost','is_time')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `is_time` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1有时间限制，2不限制'");}
if(!pdo_fieldexists('wx_school_cost','is_on')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `is_on` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1启用，2不启用'");}
if(!pdo_fieldexists('wx_school_cost','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_cost','starttime')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `starttime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_cost','endtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `endtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_cost','dataline')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `dataline` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_cost','payweid')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `payweid` int(10) unsigned NOT NULL COMMENT '支付公众号'");}
if(!pdo_fieldexists('wx_school_cost','is_print')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `is_print` tinyint(1) NOT NULL DEFAULT '2' COMMENT '是否启用打印机'");}
if(!pdo_fieldexists('wx_school_cost','printarr')) {pdo_query("ALTER TABLE ".tablename('wx_school_cost')." ADD   `printarr` varchar(100) NOT NULL DEFAULT '' COMMENT '打印机'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_courseTable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id',
  `weid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `ishow` int(1) NOT NULL DEFAULT '1' COMMENT '1:显示,2隐藏,默认1',
  `sort` int(11) NOT NULL DEFAULT '1',
  `type` varchar(15) NOT NULL DEFAULT '',
  `headpic` varchar(200) NOT NULL DEFAULT '',
  `infos` varchar(500) NOT NULL,
  `xq_id` int(11) NOT NULL COMMENT '学期id',
  `bj_id` int(11) NOT NULL COMMENT '班级id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_courseTable','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseTable')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_courseTable','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseTable')." ADD   `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id'");}
if(!pdo_fieldexists('wx_school_courseTable','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseTable')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_courseTable','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseTable')." ADD   `title` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_courseTable','ishow')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseTable')." ADD   `ishow` int(1) NOT NULL DEFAULT '1' COMMENT '1:显示,2隐藏,默认1'");}
if(!pdo_fieldexists('wx_school_courseTable','sort')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseTable')." ADD   `sort` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_courseTable','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseTable')." ADD   `type` varchar(15) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wx_school_courseTable','headpic')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseTable')." ADD   `headpic` varchar(200) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wx_school_courseTable','infos')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseTable')." ADD   `infos` varchar(500) NOT NULL");}
if(!pdo_fieldexists('wx_school_courseTable','xq_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseTable')." ADD   `xq_id` int(11) NOT NULL COMMENT '学期id'");}
if(!pdo_fieldexists('wx_school_courseTable','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseTable')." ADD   `bj_id` int(11) NOT NULL COMMENT '班级id'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_coursebuy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `kcid` int(11) NOT NULL,
  `ksnum` int(11) NOT NULL,
  `createtime` int(11) NOT NULL,
  `overtime` int(11) NOT NULL COMMENT '过期时间',
  `is_change` tinyint(3) NOT NULL COMMENT '0默认1调前旧的2调后新的',
  `change_id` int(11) NOT NULL COMMENT '调课关联coursebuy id',
  `orderid` int(10) unsigned NOT NULL COMMENT '归属订单ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_coursebuy','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_coursebuy')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_coursebuy','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_coursebuy')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_coursebuy','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_coursebuy')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_coursebuy','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_coursebuy')." ADD   `userid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_coursebuy','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_coursebuy')." ADD   `sid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_coursebuy','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_coursebuy')." ADD   `kcid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_coursebuy','ksnum')) {pdo_query("ALTER TABLE ".tablename('wx_school_coursebuy')." ADD   `ksnum` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_coursebuy','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_coursebuy')." ADD   `createtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_coursebuy','overtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_coursebuy')." ADD   `overtime` int(11) NOT NULL COMMENT '过期时间'");}
if(!pdo_fieldexists('wx_school_coursebuy','is_change')) {pdo_query("ALTER TABLE ".tablename('wx_school_coursebuy')." ADD   `is_change` tinyint(3) NOT NULL COMMENT '0默认1调前旧的2调后新的'");}
if(!pdo_fieldexists('wx_school_coursebuy','change_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_coursebuy')." ADD   `change_id` int(11) NOT NULL COMMENT '调课关联coursebuy id'");}
if(!pdo_fieldexists('wx_school_coursebuy','orderid')) {pdo_query("ALTER TABLE ".tablename('wx_school_coursebuy')." ADD   `orderid` int(10) unsigned NOT NULL COMMENT '归属订单ID'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_courseorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `kcid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `beizhu` varchar(200) NOT NULL,
  `tid` int(11) NOT NULL,
  `createtime` int(11) NOT NULL,
  `type` int(3) NOT NULL COMMENT '类型，0为预约',
  `totid` int(11) NOT NULL,
  `fromuserid` int(11) NOT NULL,
  `huifu` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_courseorder','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseorder')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_courseorder','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseorder')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_courseorder','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseorder')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_courseorder','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseorder')." ADD   `kcid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_courseorder','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseorder')." ADD   `name` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_courseorder','tel')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseorder')." ADD   `tel` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_school_courseorder','beizhu')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseorder')." ADD   `beizhu` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_school_courseorder','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseorder')." ADD   `tid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_courseorder','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseorder')." ADD   `createtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_courseorder','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseorder')." ADD   `type` int(3) NOT NULL COMMENT '类型，0为预约'");}
if(!pdo_fieldexists('wx_school_courseorder','totid')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseorder')." ADD   `totid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_courseorder','fromuserid')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseorder')." ADD   `fromuserid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_courseorder','huifu')) {pdo_query("ALTER TABLE ".tablename('wx_school_courseorder')." ADD   `huifu` varchar(500) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_cyybeizhu_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `beizhu` varchar(200) NOT NULL,
  `cyyid` int(11) NOT NULL,
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_cyybeizhu_teacher','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_cyybeizhu_teacher')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_cyybeizhu_teacher','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_cyybeizhu_teacher')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_cyybeizhu_teacher','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_cyybeizhu_teacher')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_cyybeizhu_teacher','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_cyybeizhu_teacher')." ADD   `tid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_cyybeizhu_teacher','beizhu')) {pdo_query("ALTER TABLE ".tablename('wx_school_cyybeizhu_teacher')." ADD   `beizhu` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_school_cyybeizhu_teacher','cyyid')) {pdo_query("ALTER TABLE ".tablename('wx_school_cyybeizhu_teacher')." ADD   `cyyid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_cyybeizhu_teacher','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_cyybeizhu_teacher')." ADD   `createtime` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_dianzan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `uid` int(10) unsigned NOT NULL COMMENT '发布者UID',
  `sherid` int(10) unsigned NOT NULL COMMENT '所属图文id',
  `zname` varchar(50) DEFAULT '' COMMENT '点赞人名字',
  `order` int(10) unsigned NOT NULL COMMENT '排序',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  `5qing` varchar(30) NOT NULL DEFAULT '0' COMMENT '图片路径',
  `userid` int(10) unsigned DEFAULT NULL COMMENT 'userid',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_dianzan','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_dianzan')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_dianzan','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_dianzan')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_dianzan','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_dianzan')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_dianzan','uid')) {pdo_query("ALTER TABLE ".tablename('wx_school_dianzan')." ADD   `uid` int(10) unsigned NOT NULL COMMENT '发布者UID'");}
if(!pdo_fieldexists('wx_school_dianzan','sherid')) {pdo_query("ALTER TABLE ".tablename('wx_school_dianzan')." ADD   `sherid` int(10) unsigned NOT NULL COMMENT '所属图文id'");}
if(!pdo_fieldexists('wx_school_dianzan','zname')) {pdo_query("ALTER TABLE ".tablename('wx_school_dianzan')." ADD   `zname` varchar(50) DEFAULT '' COMMENT '点赞人名字'");}
if(!pdo_fieldexists('wx_school_dianzan','order')) {pdo_query("ALTER TABLE ".tablename('wx_school_dianzan')." ADD   `order` int(10) unsigned NOT NULL COMMENT '排序'");}
if(!pdo_fieldexists('wx_school_dianzan','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_dianzan')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
if(!pdo_fieldexists('wx_school_dianzan','5qing')) {pdo_query("ALTER TABLE ".tablename('wx_school_dianzan')." ADD   `5qing` varchar(30) NOT NULL DEFAULT '0' COMMENT '图片路径'");}
if(!pdo_fieldexists('wx_school_dianzan','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_dianzan')." ADD   `userid` int(10) unsigned DEFAULT NULL COMMENT 'userid'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_drug` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `content` text NOT NULL COMMENT '详细内容或评价',
  `headimg` varchar(1000) NOT NULL,
  `refuse` varchar(1000) NOT NULL COMMENT '拒绝理由',
  `sid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0未处理，1已通过，2拒绝',
  `createtime` varchar(10) NOT NULL COMMENT '创建时间',
  `starttime` varchar(10) NOT NULL COMMENT '开始时间',
  `endtime` varchar(10) NOT NULL COMMENT '结束时间',
  `datetime` text NOT NULL COMMENT '时间点',
  `updatetime` varchar(10) NOT NULL COMMENT '操作时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_drug','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_drug')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_drug','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_drug')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_drug','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_drug')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_drug','content')) {pdo_query("ALTER TABLE ".tablename('wx_school_drug')." ADD   `content` text NOT NULL COMMENT '详细内容或评价'");}
if(!pdo_fieldexists('wx_school_drug','headimg')) {pdo_query("ALTER TABLE ".tablename('wx_school_drug')." ADD   `headimg` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_drug','refuse')) {pdo_query("ALTER TABLE ".tablename('wx_school_drug')." ADD   `refuse` varchar(1000) NOT NULL COMMENT '拒绝理由'");}
if(!pdo_fieldexists('wx_school_drug','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_drug')." ADD   `sid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_drug','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_drug')." ADD   `status` tinyint(1) NOT NULL COMMENT '0未处理，1已通过，2拒绝'");}
if(!pdo_fieldexists('wx_school_drug','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_drug')." ADD   `createtime` varchar(10) NOT NULL COMMENT '创建时间'");}
if(!pdo_fieldexists('wx_school_drug','starttime')) {pdo_query("ALTER TABLE ".tablename('wx_school_drug')." ADD   `starttime` varchar(10) NOT NULL COMMENT '开始时间'");}
if(!pdo_fieldexists('wx_school_drug','endtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_drug')." ADD   `endtime` varchar(10) NOT NULL COMMENT '结束时间'");}
if(!pdo_fieldexists('wx_school_drug','datetime')) {pdo_query("ALTER TABLE ".tablename('wx_school_drug')." ADD   `datetime` text NOT NULL COMMENT '时间点'");}
if(!pdo_fieldexists('wx_school_drug','updatetime')) {pdo_query("ALTER TABLE ".tablename('wx_school_drug')." ADD   `updatetime` varchar(10) NOT NULL COMMENT '操作时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_druglog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `tid` int(11) NOT NULL COMMENT '班主任',
  `sid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0未处理，1已通过',
  `createtime` varchar(10) NOT NULL COMMENT '创建时间',
  `datetime` text NOT NULL COMMENT '时间点',
  `updatetime` varchar(10) NOT NULL COMMENT '喂药时间',
  `drugid` int(10) NOT NULL COMMENT '喂药申请id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_druglog','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_druglog')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_druglog','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_druglog')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_druglog','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_druglog')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_druglog','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_druglog')." ADD   `tid` int(11) NOT NULL COMMENT '班主任'");}
if(!pdo_fieldexists('wx_school_druglog','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_druglog')." ADD   `sid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_druglog','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_druglog')." ADD   `status` tinyint(1) NOT NULL COMMENT '0未处理，1已通过'");}
if(!pdo_fieldexists('wx_school_druglog','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_druglog')." ADD   `createtime` varchar(10) NOT NULL COMMENT '创建时间'");}
if(!pdo_fieldexists('wx_school_druglog','datetime')) {pdo_query("ALTER TABLE ".tablename('wx_school_druglog')." ADD   `datetime` text NOT NULL COMMENT '时间点'");}
if(!pdo_fieldexists('wx_school_druglog','updatetime')) {pdo_query("ALTER TABLE ".tablename('wx_school_druglog')." ADD   `updatetime` varchar(10) NOT NULL COMMENT '喂药时间'");}
if(!pdo_fieldexists('wx_school_druglog','drugid')) {pdo_query("ALTER TABLE ".tablename('wx_school_druglog')." ADD   `drugid` int(10) NOT NULL COMMENT '喂药申请id'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_email` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `sid` int(10) unsigned NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `bj_id` int(10) unsigned NOT NULL,
  `pard` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1本人2母亲3父亲4爷爷5奶奶6外公7外婆8叔叔9阿姨10其他',
  `suggesd` varchar(1000) DEFAULT '',
  `emailid` int(10) unsigned NOT NULL,
  `isread` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_how` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ssort` int(10) unsigned NOT NULL COMMENT '排序',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_email','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_email')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_email','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_email')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_email','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_email')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_email','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_email')." ADD   `sid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_email','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_email')." ADD   `userid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_email','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_email')." ADD   `bj_id` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_email','pard')) {pdo_query("ALTER TABLE ".tablename('wx_school_email')." ADD   `pard` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1本人2母亲3父亲4爷爷5奶奶6外公7外婆8叔叔9阿姨10其他'");}
if(!pdo_fieldexists('wx_school_email','suggesd')) {pdo_query("ALTER TABLE ".tablename('wx_school_email')." ADD   `suggesd` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_email','emailid')) {pdo_query("ALTER TABLE ".tablename('wx_school_email')." ADD   `emailid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_email','isread')) {pdo_query("ALTER TABLE ".tablename('wx_school_email')." ADD   `isread` tinyint(1) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_email','is_how')) {pdo_query("ALTER TABLE ".tablename('wx_school_email')." ADD   `is_how` tinyint(1) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_email','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_email')." ADD   `ssort` int(10) unsigned NOT NULL COMMENT '排序'");}
if(!pdo_fieldexists('wx_school_email','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_email')." ADD   `createtime` int(10) unsigned NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_fans_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL DEFAULT '0',
  `schoolid` int(10) unsigned NOT NULL DEFAULT '0',
  `count` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `group_desc` varchar(50) NOT NULL DEFAULT '',
  `ssort` int(10) unsigned NOT NULL COMMENT '排序',
  `type` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '二维码状态',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '生成时间',
  `is_zhu` tinyint(1) NOT NULL DEFAULT '2' COMMENT '是否本校主二维码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_fans_group','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_fans_group')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_fans_group','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_fans_group')." ADD   `weid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_fans_group','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_fans_group')." ADD   `schoolid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_fans_group','count')) {pdo_query("ALTER TABLE ".tablename('wx_school_fans_group')." ADD   `count` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_fans_group','group_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_fans_group')." ADD   `group_id` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_fans_group','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_fans_group')." ADD   `name` varchar(50) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wx_school_fans_group','group_desc')) {pdo_query("ALTER TABLE ".tablename('wx_school_fans_group')." ADD   `group_desc` varchar(50) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wx_school_fans_group','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_fans_group')." ADD   `ssort` int(10) unsigned NOT NULL COMMENT '排序'");}
if(!pdo_fieldexists('wx_school_fans_group','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_fans_group')." ADD   `type` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '二维码状态'");}
if(!pdo_fieldexists('wx_school_fans_group','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_fans_group')." ADD   `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '生成时间'");}
if(!pdo_fieldexists('wx_school_fans_group','is_zhu')) {pdo_query("ALTER TABLE ".tablename('wx_school_fans_group')." ADD   `is_zhu` tinyint(1) NOT NULL DEFAULT '2' COMMENT '是否本校主二维码'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_formid` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `fromto` varchar(100) NOT NULL COMMENT '点击来源',
  `formid` varchar(500) NOT NULL COMMENT 'formid',
  `openid` varchar(500) NOT NULL COMMENT 'openid',
  `creattime` int(10) NOT NULL COMMENT '时间',
  `times` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_formid','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_formid')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_formid','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_formid')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_formid','fromto')) {pdo_query("ALTER TABLE ".tablename('wx_school_formid')." ADD   `fromto` varchar(100) NOT NULL COMMENT '点击来源'");}
if(!pdo_fieldexists('wx_school_formid','formid')) {pdo_query("ALTER TABLE ".tablename('wx_school_formid')." ADD   `formid` varchar(500) NOT NULL COMMENT 'formid'");}
if(!pdo_fieldexists('wx_school_formid','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_formid')." ADD   `openid` varchar(500) NOT NULL COMMENT 'openid'");}
if(!pdo_fieldexists('wx_school_formid','creattime')) {pdo_query("ALTER TABLE ".tablename('wx_school_formid')." ADD   `creattime` int(10) NOT NULL COMMENT '时间'");}
if(!pdo_fieldexists('wx_school_formid','times')) {pdo_query("ALTER TABLE ".tablename('wx_school_formid')." ADD   `times` tinyint(1) NOT NULL DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_freekslog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `kcid` int(11) NOT NULL,
  `ksnum` int(3) NOT NULL COMMENT '赠送课时',
  `tid` varchar(10) NOT NULL COMMENT '操作员',
  `createtime` int(10) NOT NULL,
  `beizhu` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_freekslog','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_freekslog')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_freekslog','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_freekslog')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_freekslog','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_freekslog')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_freekslog','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_freekslog')." ADD   `sid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_freekslog','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_freekslog')." ADD   `kcid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_freekslog','ksnum')) {pdo_query("ALTER TABLE ".tablename('wx_school_freekslog')." ADD   `ksnum` int(3) NOT NULL COMMENT '赠送课时'");}
if(!pdo_fieldexists('wx_school_freekslog','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_freekslog')." ADD   `tid` varchar(10) NOT NULL COMMENT '操作员'");}
if(!pdo_fieldexists('wx_school_freekslog','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_freekslog')." ADD   `createtime` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_freekslog','beizhu')) {pdo_query("ALTER TABLE ".tablename('wx_school_freekslog')." ADD   `beizhu` varchar(200) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_fzqx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `fzid` int(11) NOT NULL,
  `qxid` int(11) NOT NULL,
  `type` int(3) NOT NULL COMMENT '1后台2前端',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=863 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_fzqx','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_fzqx')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_fzqx','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_fzqx')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_fzqx','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_fzqx')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_fzqx','fzid')) {pdo_query("ALTER TABLE ".tablename('wx_school_fzqx')." ADD   `fzid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_fzqx','qxid')) {pdo_query("ALTER TABLE ".tablename('wx_school_fzqx')." ADD   `qxid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_fzqx','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_fzqx')." ADD   `type` int(3) NOT NULL COMMENT '1后台2前端'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_gkkpj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `gkkid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `iconid` int(11) NOT NULL,
  `iconlevel` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `torjz` int(1) NOT NULL COMMENT '来自老师2还是家长1',
  `createtime` int(11) NOT NULL,
  `type` int(1) NOT NULL COMMENT '评语1还是等级2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_gkkpj','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpj')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_gkkpj','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpj')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpj','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpj')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpj','gkkid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpj')." ADD   `gkkid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpj','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpj')." ADD   `tid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpj','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpj')." ADD   `userid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpj','iconid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpj')." ADD   `iconid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpj','iconlevel')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpj')." ADD   `iconlevel` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpj','content')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpj')." ADD   `content` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpj','torjz')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpj')." ADD   `torjz` int(1) NOT NULL COMMENT '来自老师2还是家长1'");}
if(!pdo_fieldexists('wx_school_gkkpj','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpj')." ADD   `createtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpj','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpj')." ADD   `type` int(1) NOT NULL COMMENT '评语1还是等级2'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_gkkpjbz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `ssort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_gkkpjbz','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjbz')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_gkkpjbz','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjbz')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjbz','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjbz')." ADD   `schoolid` int(1) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjbz','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjbz')." ADD   `title` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjbz','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjbz')." ADD   `ssort` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_gkkpjk` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `weid` int(10) NOT NULL,
  `schoolid` int(10) NOT NULL,
  `bzid` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `icon1title` varchar(10) NOT NULL,
  `icon2title` varchar(10) NOT NULL,
  `icon3title` varchar(10) NOT NULL,
  `icon4title` varchar(10) NOT NULL,
  `icon5title` varchar(10) NOT NULL,
  `icon1` varchar(1000) NOT NULL,
  `icon2` varchar(1000) NOT NULL,
  `icon3` varchar(1000) NOT NULL,
  `icon4` varchar(1000) NOT NULL,
  `icon5` varchar(1000) NOT NULL,
  `type` int(1) NOT NULL,
  `ssort` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_gkkpjk','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_gkkpjk','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD   `weid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjk','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD   `schoolid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjk','bzid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD   `bzid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjk','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD   `title` varchar(300) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjk','icon1title')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD   `icon1title` varchar(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjk','icon2title')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD   `icon2title` varchar(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjk','icon3title')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD   `icon3title` varchar(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjk','icon4title')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD   `icon4title` varchar(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjk','icon5title')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD   `icon5title` varchar(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjk','icon1')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD   `icon1` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjk','icon2')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD   `icon2` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjk','icon3')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD   `icon3` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjk','icon4')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD   `icon4` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjk','icon5')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD   `icon5` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjk','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD   `type` int(1) NOT NULL");}
if(!pdo_fieldexists('wx_school_gkkpjk','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_gkkpjk')." ADD   `ssort` int(10) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_gongkaike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `ssort` int(3) NOT NULL,
  `bzid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `starttime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `km_id` int(11) NOT NULL,
  `bj_id` int(11) NOT NULL,
  `dagang` text NOT NULL,
  `ticket` varchar(255) NOT NULL,
  `qrid` int(11) NOT NULL,
  `xq_id` int(11) NOT NULL,
  `is_pj` int(1) NOT NULL,
  `createtime` int(11) NOT NULL,
  `createtid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_gongkaike','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_gongkaike','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `ssort` int(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','bzid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `bzid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `tid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `name` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','starttime')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `starttime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','endtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `endtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','addr')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `addr` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','km_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `km_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `bj_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','dagang')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `dagang` text NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','ticket')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `ticket` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','qrid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `qrid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','xq_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `xq_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','is_pj')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `is_pj` int(1) NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `createtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_gongkaike','createtid')) {pdo_query("ALTER TABLE ".tablename('wx_school_gongkaike')." ADD   `createtid` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_groupactivity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `thumb` varchar(500) NOT NULL COMMENT '缩略图',
  `banner` varchar(2000) NOT NULL COMMENT '幻灯片',
  `content` varchar(2000) NOT NULL COMMENT '活动描述',
  `bjarray` varchar(1000) NOT NULL COMMENT '班级组',
  `cost` float NOT NULL COMMENT '报名费',
  `starttime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `type` int(3) NOT NULL COMMENT '1活动2家政3家教',
  `ssort` int(3) NOT NULL COMMENT '排序',
  `createtime` int(11) NOT NULL,
  `isall` int(2) NOT NULL COMMENT '是否全校可报',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_groupactivity','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupactivity')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_groupactivity','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupactivity')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_groupactivity','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupactivity')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_groupactivity','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupactivity')." ADD   `title` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_school_groupactivity','thumb')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupactivity')." ADD   `thumb` varchar(500) NOT NULL COMMENT '缩略图'");}
if(!pdo_fieldexists('wx_school_groupactivity','banner')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupactivity')." ADD   `banner` varchar(2000) NOT NULL COMMENT '幻灯片'");}
if(!pdo_fieldexists('wx_school_groupactivity','content')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupactivity')." ADD   `content` varchar(2000) NOT NULL COMMENT '活动描述'");}
if(!pdo_fieldexists('wx_school_groupactivity','bjarray')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupactivity')." ADD   `bjarray` varchar(1000) NOT NULL COMMENT '班级组'");}
if(!pdo_fieldexists('wx_school_groupactivity','cost')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupactivity')." ADD   `cost` float NOT NULL COMMENT '报名费'");}
if(!pdo_fieldexists('wx_school_groupactivity','starttime')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupactivity')." ADD   `starttime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_groupactivity','endtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupactivity')." ADD   `endtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_groupactivity','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupactivity')." ADD   `type` int(3) NOT NULL COMMENT '1活动2家政3家教'");}
if(!pdo_fieldexists('wx_school_groupactivity','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupactivity')." ADD   `ssort` int(3) NOT NULL COMMENT '排序'");}
if(!pdo_fieldexists('wx_school_groupactivity','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupactivity')." ADD   `createtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_groupactivity','isall')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupactivity')." ADD   `isall` int(2) NOT NULL COMMENT '是否全校可报'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_groupsign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `gaid` int(11) NOT NULL,
  `type` int(3) NOT NULL COMMENT '1集体活动2家政3家教',
  `createtime` int(11) NOT NULL,
  `servetime` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_groupsign','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupsign')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_groupsign','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupsign')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_groupsign','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupsign')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_groupsign','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupsign')." ADD   `userid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_groupsign','gaid')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupsign')." ADD   `gaid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_groupsign','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupsign')." ADD   `type` int(3) NOT NULL COMMENT '1集体活动2家政3家教'");}
if(!pdo_fieldexists('wx_school_groupsign','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupsign')." ADD   `createtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_groupsign','servetime')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupsign')." ADD   `servetime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_groupsign','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_groupsign')." ADD   `sid` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_guige` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `kcid` int(11) NOT NULL,
  `ksnum` int(3) NOT NULL COMMENT '赠送课时',
  `price` decimal(6,2) NOT NULL COMMENT '单价',
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_guige','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_guige')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_guige','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_guige')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_guige','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_guige')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_guige','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_guige')." ADD   `name` varchar(32) NOT NULL");}
if(!pdo_fieldexists('wx_school_guige','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_guige')." ADD   `kcid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_guige','ksnum')) {pdo_query("ALTER TABLE ".tablename('wx_school_guige')." ADD   `ksnum` int(3) NOT NULL COMMENT '赠送课时'");}
if(!pdo_fieldexists('wx_school_guige','price')) {pdo_query("ALTER TABLE ".tablename('wx_school_guige')." ADD   `price` decimal(6,2) NOT NULL COMMENT '单价'");}
if(!pdo_fieldexists('wx_school_guige','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_guige')." ADD   `createtime` int(10) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_helps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `schoolid` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `content` mediumtext NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `lasttime` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  `is_share` tinyint(1) unsigned NOT NULL,
  `share_id` tinyint(1) unsigned NOT NULL,
  `type` int(10) NOT NULL COMMENT '分类',
  `displayorder` int(10) unsigned NOT NULL,
  `could_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_helps','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_helps')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_helps','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_helps')." ADD   `schoolid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_helps','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_helps')." ADD   `title` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_helps','author')) {pdo_query("ALTER TABLE ".tablename('wx_school_helps')." ADD   `author` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_helps','content')) {pdo_query("ALTER TABLE ".tablename('wx_school_helps')." ADD   `content` mediumtext NOT NULL");}
if(!pdo_fieldexists('wx_school_helps','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_helps')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_helps','lasttime')) {pdo_query("ALTER TABLE ".tablename('wx_school_helps')." ADD   `lasttime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_helps','click')) {pdo_query("ALTER TABLE ".tablename('wx_school_helps')." ADD   `click` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_helps','is_share')) {pdo_query("ALTER TABLE ".tablename('wx_school_helps')." ADD   `is_share` tinyint(1) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_helps','share_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_helps')." ADD   `share_id` tinyint(1) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_helps','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_helps')." ADD   `type` int(10) NOT NULL COMMENT '分类'");}
if(!pdo_fieldexists('wx_school_helps','displayorder')) {pdo_query("ALTER TABLE ".tablename('wx_school_helps')." ADD   `displayorder` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_helps','could_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_helps')." ADD   `could_id` int(10) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_hothit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `formid_use` int(10) NOT NULL,
  `fromto` varchar(100) NOT NULL COMMENT '点击来源',
  `btnid` int(10) NOT NULL,
  `openid` varchar(500) NOT NULL COMMENT 'openid',
  `creattime` int(10) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_hothit','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_hothit')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_hothit','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_hothit')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_hothit','formid_use')) {pdo_query("ALTER TABLE ".tablename('wx_school_hothit')." ADD   `formid_use` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_hothit','fromto')) {pdo_query("ALTER TABLE ".tablename('wx_school_hothit')." ADD   `fromto` varchar(100) NOT NULL COMMENT '点击来源'");}
if(!pdo_fieldexists('wx_school_hothit','btnid')) {pdo_query("ALTER TABLE ".tablename('wx_school_hothit')." ADD   `btnid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_hothit','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_hothit')." ADD   `openid` varchar(500) NOT NULL COMMENT 'openid'");}
if(!pdo_fieldexists('wx_school_hothit','creattime')) {pdo_query("ALTER TABLE ".tablename('wx_school_hothit')." ADD   `creattime` int(10) NOT NULL COMMENT '时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_icon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '公众号',
  `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id',
  `name` varchar(50) NOT NULL COMMENT '按钮名称',
  `icon` varchar(1000) NOT NULL COMMENT '按钮图标',
  `icon2` varchar(1000) NOT NULL,
  `beizhu` varchar(50) NOT NULL COMMENT '备注或小字',
  `color` varchar(50) NOT NULL COMMENT '颜色',
  `url` varchar(1000) NOT NULL COMMENT '链接url',
  `do` varchar(100) NOT NULL,
  `place` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1首页菜单2底部菜单',
  `ssort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '显示状态',
  `typeid` int(10) unsigned NOT NULL COMMENT 'icon分类ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=269 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_icon','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_icon')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_icon','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_icon')." ADD   `weid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '公众号'");}
if(!pdo_fieldexists('wx_school_icon','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_icon')." ADD   `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id'");}
if(!pdo_fieldexists('wx_school_icon','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_icon')." ADD   `name` varchar(50) NOT NULL COMMENT '按钮名称'");}
if(!pdo_fieldexists('wx_school_icon','icon')) {pdo_query("ALTER TABLE ".tablename('wx_school_icon')." ADD   `icon` varchar(1000) NOT NULL COMMENT '按钮图标'");}
if(!pdo_fieldexists('wx_school_icon','icon2')) {pdo_query("ALTER TABLE ".tablename('wx_school_icon')." ADD   `icon2` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_icon','beizhu')) {pdo_query("ALTER TABLE ".tablename('wx_school_icon')." ADD   `beizhu` varchar(50) NOT NULL COMMENT '备注或小字'");}
if(!pdo_fieldexists('wx_school_icon','color')) {pdo_query("ALTER TABLE ".tablename('wx_school_icon')." ADD   `color` varchar(50) NOT NULL COMMENT '颜色'");}
if(!pdo_fieldexists('wx_school_icon','url')) {pdo_query("ALTER TABLE ".tablename('wx_school_icon')." ADD   `url` varchar(1000) NOT NULL COMMENT '链接url'");}
if(!pdo_fieldexists('wx_school_icon','do')) {pdo_query("ALTER TABLE ".tablename('wx_school_icon')." ADD   `do` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_icon','place')) {pdo_query("ALTER TABLE ".tablename('wx_school_icon')." ADD   `place` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1首页菜单2底部菜单'");}
if(!pdo_fieldexists('wx_school_icon','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_icon')." ADD   `ssort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序'");}
if(!pdo_fieldexists('wx_school_icon','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_icon')." ADD   `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '显示状态'");}
if(!pdo_fieldexists('wx_school_icon','typeid')) {pdo_query("ALTER TABLE ".tablename('wx_school_icon')." ADD   `typeid` int(10) unsigned NOT NULL COMMENT 'icon分类ID'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_icontype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '公众号',
  `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id',
  `title` varchar(50) NOT NULL COMMENT '分类名称',
  `place` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '位置',
  `ssort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '显示状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_icontype','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_icontype')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_icontype','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_icontype')." ADD   `weid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '公众号'");}
if(!pdo_fieldexists('wx_school_icontype','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_icontype')." ADD   `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id'");}
if(!pdo_fieldexists('wx_school_icontype','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_icontype')." ADD   `title` varchar(50) NOT NULL COMMENT '分类名称'");}
if(!pdo_fieldexists('wx_school_icontype','place')) {pdo_query("ALTER TABLE ".tablename('wx_school_icontype')." ADD   `place` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '位置'");}
if(!pdo_fieldexists('wx_school_icontype','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_icontype')." ADD   `ssort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序'");}
if(!pdo_fieldexists('wx_school_icontype','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_icontype')." ADD   `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '显示状态'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_idcard` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `sid` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `pname` varchar(200) NOT NULL,
  `bj_id` int(10) unsigned NOT NULL,
  `idcard` varchar(200) NOT NULL DEFAULT '' COMMENT '卡号',
  `orderid` int(10) unsigned NOT NULL,
  `spic` varchar(1000) NOT NULL,
  `tpic` varchar(1000) NOT NULL,
  `pard` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1本人2母亲3父亲4爷爷5奶奶6外公7外婆8叔叔9阿姨10其他',
  `createtime` int(10) unsigned NOT NULL,
  `severend` int(10) unsigned NOT NULL,
  `is_on` int(1) NOT NULL DEFAULT '0' COMMENT '1:使用,2未用,默认0',
  `usertype` int(1) NOT NULL DEFAULT '0' COMMENT '1:老师,学生0',
  `is_frist` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:首次,2非首次',
  `lastedittime` int(11) DEFAULT NULL,
  `cardtype` tinyint(1) NOT NULL DEFAULT '1',
  `photo_guid` varchar(200) NOT NULL,
  `guid` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_idcard','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_idcard','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_idcard','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_idcard','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `sid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_idcard','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `tid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_idcard','pname')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `pname` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_school_idcard','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `bj_id` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_idcard','idcard')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `idcard` varchar(200) NOT NULL DEFAULT '' COMMENT '卡号'");}
if(!pdo_fieldexists('wx_school_idcard','orderid')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `orderid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_idcard','spic')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `spic` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_idcard','tpic')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `tpic` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_idcard','pard')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `pard` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1本人2母亲3父亲4爷爷5奶奶6外公7外婆8叔叔9阿姨10其他'");}
if(!pdo_fieldexists('wx_school_idcard','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_idcard','severend')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `severend` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_idcard','is_on')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `is_on` int(1) NOT NULL DEFAULT '0' COMMENT '1:使用,2未用,默认0'");}
if(!pdo_fieldexists('wx_school_idcard','usertype')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `usertype` int(1) NOT NULL DEFAULT '0' COMMENT '1:老师,学生0'");}
if(!pdo_fieldexists('wx_school_idcard','is_frist')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `is_frist` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:首次,2非首次'");}
if(!pdo_fieldexists('wx_school_idcard','lastedittime')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `lastedittime` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_idcard','cardtype')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `cardtype` tinyint(1) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_idcard','photo_guid')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `photo_guid` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_school_idcard','guid')) {pdo_query("ALTER TABLE ".tablename('wx_school_idcard')." ADD   `guid` varchar(200) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_index` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL DEFAULT '0' COMMENT '账户ID',
  `weid` int(10) NOT NULL DEFAULT '0' COMMENT '公众号id',
  `areaid` int(10) NOT NULL DEFAULT '0' COMMENT '区域id',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `logo` varchar(1000) NOT NULL DEFAULT '' COMMENT '学校logo',
  `thumb` varchar(200) NOT NULL DEFAULT '' COMMENT '图文消息缩略图',
  `qroce` varchar(200) NOT NULL DEFAULT '' COMMENT '二维码',
  `info` varchar(1000) NOT NULL DEFAULT '' COMMENT '简短描述',
  `content` text NOT NULL COMMENT '简介',
  `zhaosheng` text NOT NULL COMMENT '招生简章',
  `tel` varchar(20) NOT NULL DEFAULT '' COMMENT '联系电话',
  `location_p` varchar(100) NOT NULL DEFAULT '' COMMENT '省',
  `location_c` varchar(100) NOT NULL DEFAULT '' COMMENT '市',
  `location_a` varchar(100) NOT NULL DEFAULT '' COMMENT '区',
  `address` varchar(200) NOT NULL COMMENT '地址',
  `place` varchar(200) NOT NULL DEFAULT '',
  `lat` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '经度',
  `lng` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '纬度',
  `copyright` varchar(100) NOT NULL DEFAULT '' COMMENT '版权',
  `is_stuewcode` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1开启2关闭',
  `recharging_password` varchar(20) NOT NULL DEFAULT '' COMMENT '充值密码',
  `thumb_url` varchar(1000) DEFAULT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否在手机端显示',
  `ssort` tinyint(3) NOT NULL DEFAULT '0',
  `is_sms` tinyint(1) NOT NULL DEFAULT '0',
  `dateline` int(10) NOT NULL DEFAULT '0',
  `is_hot` tinyint(1) NOT NULL DEFAULT '0' COMMENT '搜索页显示',
  `is_showew` tinyint(1) NOT NULL DEFAULT '1' COMMENT '页面显示二维码开关',
  `is_showad` int(10) NOT NULL DEFAULT '0' COMMENT '是否显示广告',
  `is_comload` int(10) NOT NULL DEFAULT '0' COMMENT '广告ID',
  `is_recordmac` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1启用2不启用',
  `is_cardpay` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1启用2不启用',
  `is_cardlist` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1启用2不启用',
  `is_cost` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1启用2不启用',
  `is_video` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1启用2不启用',
  `is_sign` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1启用2不启用',
  `is_zjh` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1启用2不启用周计划',
  `is_wxsign` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1启用2不启用微信签到',
  `is_openht` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1启用2不启用独立后台',
  `is_signneedcomfim` tinyint(1) NOT NULL DEFAULT '1' COMMENT '手机签到是否需确认1是2否',
  `shoucename` varchar(200) NOT NULL DEFAULT '' COMMENT '手册名称',
  `videoname` varchar(200) NOT NULL DEFAULT '' COMMENT '监控名称',
  `wqgroupid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎默认用户组',
  `videopic` varchar(1000) NOT NULL DEFAULT '' COMMENT '监控封面',
  `manger` varchar(200) NOT NULL DEFAULT '' COMMENT '模版名称1',
  `isopen` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0显示1不',
  `issale` tinyint(1) NOT NULL DEFAULT '5' COMMENT '5种状态',
  `gonggao` varchar(1000) NOT NULL DEFAULT '' COMMENT '通知',
  `is_rest` tinyint(1) NOT NULL DEFAULT '0',
  `signset` varchar(200) NOT NULL COMMENT '报名设置',
  `cardset` varchar(500) NOT NULL COMMENT '刷卡设置',
  `typeid` int(10) NOT NULL DEFAULT '0' COMMENT '学校类型',
  `cityid` int(10) NOT NULL DEFAULT '0' COMMENT '城市ID',
  `spic` varchar(200) NOT NULL DEFAULT '' COMMENT '默认学生头像',
  `tpic` varchar(200) NOT NULL DEFAULT '' COMMENT '默认教师头像',
  `jxstart` varchar(50) DEFAULT '',
  `jxend` varchar(50) DEFAULT '',
  `lxstart` varchar(50) DEFAULT '',
  `lxend` varchar(50) DEFAULT '',
  `jxstart1` varchar(50) DEFAULT '',
  `jxend1` varchar(50) DEFAULT '',
  `lxstart1` varchar(50) DEFAULT '',
  `lxend1` varchar(50) DEFAULT '',
  `jxstart2` varchar(50) DEFAULT '',
  `jxend2` varchar(50) DEFAULT '',
  `lxstart2` varchar(50) DEFAULT '',
  `lxend2` varchar(50) NOT NULL,
  `style1` varchar(200) NOT NULL DEFAULT '' COMMENT '模版名称',
  `style2` varchar(200) NOT NULL DEFAULT '' COMMENT '模版名称2',
  `style3` varchar(200) NOT NULL DEFAULT '' COMMENT '模版名称3',
  `userstyle` varchar(50) NOT NULL DEFAULT '' COMMENT '家长学生中心模板',
  `sms_set` varchar(1000) NOT NULL DEFAULT '' COMMENT '短信设置',
  `is_kb` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1启用2不启公立课表',
  `send_overtime` int(10) NOT NULL DEFAULT '-1' COMMENT '延迟发送',
  `sms_use_times` int(10) NOT NULL COMMENT '短信调用次数',
  `sms_rest_times` int(10) NOT NULL COMMENT '可用短信条数',
  `is_fbvocie` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1启用2不启语音',
  `is_fbnew` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1启用2不启用语音和视频',
  `txid` varchar(100) NOT NULL DEFAULT '' COMMENT '腾讯云APPID',
  `txms` varchar(100) NOT NULL DEFAULT '0' COMMENT '腾讯云密钥',
  `bjqstyle` varchar(50) NOT NULL DEFAULT 'old' COMMENT '班级圈模板',
  `bd_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1名手2名码3名学4名手码5名手学6名学码7名手学码7名手学码',
  `headcolor` varchar(20) NOT NULL DEFAULT '#06c1ae' COMMENT '头部颜色',
  `savevideoto` tinyint(1) NOT NULL DEFAULT '1',
  `mallsetinfo` varchar(500) DEFAULT NULL,
  `wxsignrange` int(11) NOT NULL,
  `yzxxtid` int(11) NOT NULL,
  `comtid` int(11) NOT NULL,
  `Cost2Point` int(11) NOT NULL COMMENT '一元换多少积分',
  `Is_point` int(3) NOT NULL COMMENT '是否开启积分抵用',
  `is_star` int(3) NOT NULL COMMENT '是否星级1是0否',
  `is_chongzhi` int(3) NOT NULL,
  `chongzhiweid` int(11) NOT NULL,
  `is_shoufei` int(3) NOT NULL DEFAULT '1',
  `is_picarr` int(3) NOT NULL COMMENT '是否图片组',
  `picarrset` varchar(500) NOT NULL COMMENT '图片组设置',
  `is_textarr` int(3) NOT NULL COMMENT '是否文字组',
  `textarrset` varchar(2000) NOT NULL COMMENT '文字组设置',
  `is_qx` int(3) NOT NULL DEFAULT '1',
  `shareset` varchar(500) NOT NULL,
  `is_printer` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否启用打印机',
  `sh_teacherids` varchar(1000) DEFAULT NULL COMMENT '校园圈模式审核人',
  `chargesetinfo` text NOT NULL COMMENT '充电桩设置',
  `is_buzhu` tinyint(3) NOT NULL COMMENT '是否启用学生补助余额',
  `is_ap` tinyint(3) NOT NULL,
  `is_book` tinyint(3) NOT NULL,
  `fxlocation` text NOT NULL,
  `checksendset` text COMMENT '考勤记录推送对象',
  `typt_school_id` int(11) NOT NULL COMMENT '统一平台schoolid',
  `typt_ec_code` varchar(30) NOT NULL COMMENT '统一平台集团ec',
  `copyrighturl` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_index','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_index','uid')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `uid` int(10) NOT NULL DEFAULT '0' COMMENT '账户ID'");}
if(!pdo_fieldexists('wx_school_index','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `weid` int(10) NOT NULL DEFAULT '0' COMMENT '公众号id'");}
if(!pdo_fieldexists('wx_school_index','areaid')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `areaid` int(10) NOT NULL DEFAULT '0' COMMENT '区域id'");}
if(!pdo_fieldexists('wx_school_index','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `title` varchar(50) NOT NULL DEFAULT '' COMMENT '名称'");}
if(!pdo_fieldexists('wx_school_index','logo')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `logo` varchar(1000) NOT NULL DEFAULT '' COMMENT '学校logo'");}
if(!pdo_fieldexists('wx_school_index','thumb')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `thumb` varchar(200) NOT NULL DEFAULT '' COMMENT '图文消息缩略图'");}
if(!pdo_fieldexists('wx_school_index','qroce')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `qroce` varchar(200) NOT NULL DEFAULT '' COMMENT '二维码'");}
if(!pdo_fieldexists('wx_school_index','info')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `info` varchar(1000) NOT NULL DEFAULT '' COMMENT '简短描述'");}
if(!pdo_fieldexists('wx_school_index','content')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `content` text NOT NULL COMMENT '简介'");}
if(!pdo_fieldexists('wx_school_index','zhaosheng')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `zhaosheng` text NOT NULL COMMENT '招生简章'");}
if(!pdo_fieldexists('wx_school_index','tel')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `tel` varchar(20) NOT NULL DEFAULT '' COMMENT '联系电话'");}
if(!pdo_fieldexists('wx_school_index','location_p')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `location_p` varchar(100) NOT NULL DEFAULT '' COMMENT '省'");}
if(!pdo_fieldexists('wx_school_index','location_c')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `location_c` varchar(100) NOT NULL DEFAULT '' COMMENT '市'");}
if(!pdo_fieldexists('wx_school_index','location_a')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `location_a` varchar(100) NOT NULL DEFAULT '' COMMENT '区'");}
if(!pdo_fieldexists('wx_school_index','address')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `address` varchar(200) NOT NULL COMMENT '地址'");}
if(!pdo_fieldexists('wx_school_index','place')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `place` varchar(200) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wx_school_index','lat')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `lat` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '经度'");}
if(!pdo_fieldexists('wx_school_index','lng')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `lng` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '纬度'");}
if(!pdo_fieldexists('wx_school_index','copyright')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `copyright` varchar(100) NOT NULL DEFAULT '' COMMENT '版权'");}
if(!pdo_fieldexists('wx_school_index','is_stuewcode')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_stuewcode` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1开启2关闭'");}
if(!pdo_fieldexists('wx_school_index','recharging_password')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `recharging_password` varchar(20) NOT NULL DEFAULT '' COMMENT '充值密码'");}
if(!pdo_fieldexists('wx_school_index','thumb_url')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `thumb_url` varchar(1000) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_index','is_show')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否在手机端显示'");}
if(!pdo_fieldexists('wx_school_index','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `ssort` tinyint(3) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_index','is_sms')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_sms` tinyint(1) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_index','dateline')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `dateline` int(10) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_index','is_hot')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_hot` tinyint(1) NOT NULL DEFAULT '0' COMMENT '搜索页显示'");}
if(!pdo_fieldexists('wx_school_index','is_showew')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_showew` tinyint(1) NOT NULL DEFAULT '1' COMMENT '页面显示二维码开关'");}
if(!pdo_fieldexists('wx_school_index','is_showad')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_showad` int(10) NOT NULL DEFAULT '0' COMMENT '是否显示广告'");}
if(!pdo_fieldexists('wx_school_index','is_comload')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_comload` int(10) NOT NULL DEFAULT '0' COMMENT '广告ID'");}
if(!pdo_fieldexists('wx_school_index','is_recordmac')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_recordmac` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1启用2不启用'");}
if(!pdo_fieldexists('wx_school_index','is_cardpay')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_cardpay` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1启用2不启用'");}
if(!pdo_fieldexists('wx_school_index','is_cardlist')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_cardlist` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1启用2不启用'");}
if(!pdo_fieldexists('wx_school_index','is_cost')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_cost` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1启用2不启用'");}
if(!pdo_fieldexists('wx_school_index','is_video')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_video` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1启用2不启用'");}
if(!pdo_fieldexists('wx_school_index','is_sign')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_sign` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1启用2不启用'");}
if(!pdo_fieldexists('wx_school_index','is_zjh')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_zjh` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1启用2不启用周计划'");}
if(!pdo_fieldexists('wx_school_index','is_wxsign')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_wxsign` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1启用2不启用微信签到'");}
if(!pdo_fieldexists('wx_school_index','is_openht')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_openht` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1启用2不启用独立后台'");}
if(!pdo_fieldexists('wx_school_index','is_signneedcomfim')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_signneedcomfim` tinyint(1) NOT NULL DEFAULT '1' COMMENT '手机签到是否需确认1是2否'");}
if(!pdo_fieldexists('wx_school_index','shoucename')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `shoucename` varchar(200) NOT NULL DEFAULT '' COMMENT '手册名称'");}
if(!pdo_fieldexists('wx_school_index','videoname')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `videoname` varchar(200) NOT NULL DEFAULT '' COMMENT '监控名称'");}
if(!pdo_fieldexists('wx_school_index','wqgroupid')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `wqgroupid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎默认用户组'");}
if(!pdo_fieldexists('wx_school_index','videopic')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `videopic` varchar(1000) NOT NULL DEFAULT '' COMMENT '监控封面'");}
if(!pdo_fieldexists('wx_school_index','manger')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `manger` varchar(200) NOT NULL DEFAULT '' COMMENT '模版名称1'");}
if(!pdo_fieldexists('wx_school_index','isopen')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `isopen` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0显示1不'");}
if(!pdo_fieldexists('wx_school_index','issale')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `issale` tinyint(1) NOT NULL DEFAULT '5' COMMENT '5种状态'");}
if(!pdo_fieldexists('wx_school_index','gonggao')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `gonggao` varchar(1000) NOT NULL DEFAULT '' COMMENT '通知'");}
if(!pdo_fieldexists('wx_school_index','is_rest')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_rest` tinyint(1) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_index','signset')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `signset` varchar(200) NOT NULL COMMENT '报名设置'");}
if(!pdo_fieldexists('wx_school_index','cardset')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `cardset` varchar(500) NOT NULL COMMENT '刷卡设置'");}
if(!pdo_fieldexists('wx_school_index','typeid')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `typeid` int(10) NOT NULL DEFAULT '0' COMMENT '学校类型'");}
if(!pdo_fieldexists('wx_school_index','cityid')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `cityid` int(10) NOT NULL DEFAULT '0' COMMENT '城市ID'");}
if(!pdo_fieldexists('wx_school_index','spic')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `spic` varchar(200) NOT NULL DEFAULT '' COMMENT '默认学生头像'");}
if(!pdo_fieldexists('wx_school_index','tpic')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `tpic` varchar(200) NOT NULL DEFAULT '' COMMENT '默认教师头像'");}
if(!pdo_fieldexists('wx_school_index','jxstart')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `jxstart` varchar(50) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_index','jxend')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `jxend` varchar(50) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_index','lxstart')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `lxstart` varchar(50) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_index','lxend')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `lxend` varchar(50) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_index','jxstart1')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `jxstart1` varchar(50) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_index','jxend1')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `jxend1` varchar(50) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_index','lxstart1')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `lxstart1` varchar(50) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_index','lxend1')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `lxend1` varchar(50) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_index','jxstart2')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `jxstart2` varchar(50) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_index','jxend2')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `jxend2` varchar(50) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_index','lxstart2')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `lxstart2` varchar(50) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_index','lxend2')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `lxend2` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_index','style1')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `style1` varchar(200) NOT NULL DEFAULT '' COMMENT '模版名称'");}
if(!pdo_fieldexists('wx_school_index','style2')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `style2` varchar(200) NOT NULL DEFAULT '' COMMENT '模版名称2'");}
if(!pdo_fieldexists('wx_school_index','style3')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `style3` varchar(200) NOT NULL DEFAULT '' COMMENT '模版名称3'");}
if(!pdo_fieldexists('wx_school_index','userstyle')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `userstyle` varchar(50) NOT NULL DEFAULT '' COMMENT '家长学生中心模板'");}
if(!pdo_fieldexists('wx_school_index','sms_set')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `sms_set` varchar(1000) NOT NULL DEFAULT '' COMMENT '短信设置'");}
if(!pdo_fieldexists('wx_school_index','is_kb')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_kb` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1启用2不启公立课表'");}
if(!pdo_fieldexists('wx_school_index','send_overtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `send_overtime` int(10) NOT NULL DEFAULT '-1' COMMENT '延迟发送'");}
if(!pdo_fieldexists('wx_school_index','sms_use_times')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `sms_use_times` int(10) NOT NULL COMMENT '短信调用次数'");}
if(!pdo_fieldexists('wx_school_index','sms_rest_times')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `sms_rest_times` int(10) NOT NULL COMMENT '可用短信条数'");}
if(!pdo_fieldexists('wx_school_index','is_fbvocie')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_fbvocie` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1启用2不启语音'");}
if(!pdo_fieldexists('wx_school_index','is_fbnew')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_fbnew` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1启用2不启用语音和视频'");}
if(!pdo_fieldexists('wx_school_index','txid')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `txid` varchar(100) NOT NULL DEFAULT '' COMMENT '腾讯云APPID'");}
if(!pdo_fieldexists('wx_school_index','txms')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `txms` varchar(100) NOT NULL DEFAULT '0' COMMENT '腾讯云密钥'");}
if(!pdo_fieldexists('wx_school_index','bjqstyle')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `bjqstyle` varchar(50) NOT NULL DEFAULT 'old' COMMENT '班级圈模板'");}
if(!pdo_fieldexists('wx_school_index','bd_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `bd_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1名手2名码3名学4名手码5名手学6名学码7名手学码7名手学码'");}
if(!pdo_fieldexists('wx_school_index','headcolor')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `headcolor` varchar(20) NOT NULL DEFAULT '#06c1ae' COMMENT '头部颜色'");}
if(!pdo_fieldexists('wx_school_index','savevideoto')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `savevideoto` tinyint(1) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_index','mallsetinfo')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `mallsetinfo` varchar(500) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_index','wxsignrange')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `wxsignrange` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_index','yzxxtid')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `yzxxtid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_index','comtid')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `comtid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_index','Cost2Point')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `Cost2Point` int(11) NOT NULL COMMENT '一元换多少积分'");}
if(!pdo_fieldexists('wx_school_index','Is_point')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `Is_point` int(3) NOT NULL COMMENT '是否开启积分抵用'");}
if(!pdo_fieldexists('wx_school_index','is_star')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_star` int(3) NOT NULL COMMENT '是否星级1是0否'");}
if(!pdo_fieldexists('wx_school_index','is_chongzhi')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_chongzhi` int(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_index','chongzhiweid')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `chongzhiweid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_index','is_shoufei')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_shoufei` int(3) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_index','is_picarr')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_picarr` int(3) NOT NULL COMMENT '是否图片组'");}
if(!pdo_fieldexists('wx_school_index','picarrset')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `picarrset` varchar(500) NOT NULL COMMENT '图片组设置'");}
if(!pdo_fieldexists('wx_school_index','is_textarr')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_textarr` int(3) NOT NULL COMMENT '是否文字组'");}
if(!pdo_fieldexists('wx_school_index','textarrset')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `textarrset` varchar(2000) NOT NULL COMMENT '文字组设置'");}
if(!pdo_fieldexists('wx_school_index','is_qx')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_qx` int(3) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_index','shareset')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `shareset` varchar(500) NOT NULL");}
if(!pdo_fieldexists('wx_school_index','is_printer')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_printer` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否启用打印机'");}
if(!pdo_fieldexists('wx_school_index','sh_teacherids')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `sh_teacherids` varchar(1000) DEFAULT NULL COMMENT '校园圈模式审核人'");}
if(!pdo_fieldexists('wx_school_index','chargesetinfo')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `chargesetinfo` text NOT NULL COMMENT '充电桩设置'");}
if(!pdo_fieldexists('wx_school_index','is_buzhu')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_buzhu` tinyint(3) NOT NULL COMMENT '是否启用学生补助余额'");}
if(!pdo_fieldexists('wx_school_index','is_ap')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_ap` tinyint(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_index','is_book')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `is_book` tinyint(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_index','fxlocation')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `fxlocation` text NOT NULL");}
if(!pdo_fieldexists('wx_school_index','checksendset')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `checksendset` text COMMENT '考勤记录推送对象'");}
if(!pdo_fieldexists('wx_school_index','typt_school_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `typt_school_id` int(11) NOT NULL COMMENT '统一平台schoolid'");}
if(!pdo_fieldexists('wx_school_index','typt_ec_code')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `typt_ec_code` varchar(30) NOT NULL COMMENT '统一平台集团ec'");}
if(!pdo_fieldexists('wx_school_index','copyrighturl')) {pdo_query("ALTER TABLE ".tablename('wx_school_index')." ADD   `copyrighturl` varchar(1000) DEFAULT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_kc_formal_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL COMMENT '公众号ID',
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `kcid` int(10) unsigned NOT NULL COMMENT '来源kcid',
  `tokcid` int(10) unsigned NOT NULL COMMENT '转正到kcid',
  `sid` int(10) unsigned NOT NULL COMMENT 'sid',
  `tid` int(10) unsigned NOT NULL COMMENT '申请操作人',
  `shtid` int(10) unsigned NOT NULL COMMENT '审核人',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0未审核1通过2拒绝',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_kc_formal_log','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_formal_log')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_kc_formal_log','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_formal_log')." ADD   `weid` int(10) unsigned NOT NULL COMMENT '公众号ID'");}
if(!pdo_fieldexists('wx_school_kc_formal_log','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_formal_log')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_kc_formal_log','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_formal_log')." ADD   `kcid` int(10) unsigned NOT NULL COMMENT '来源kcid'");}
if(!pdo_fieldexists('wx_school_kc_formal_log','tokcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_formal_log')." ADD   `tokcid` int(10) unsigned NOT NULL COMMENT '转正到kcid'");}
if(!pdo_fieldexists('wx_school_kc_formal_log','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_formal_log')." ADD   `sid` int(10) unsigned NOT NULL COMMENT 'sid'");}
if(!pdo_fieldexists('wx_school_kc_formal_log','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_formal_log')." ADD   `tid` int(10) unsigned NOT NULL COMMENT '申请操作人'");}
if(!pdo_fieldexists('wx_school_kc_formal_log','shtid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_formal_log')." ADD   `shtid` int(10) unsigned NOT NULL COMMENT '审核人'");}
if(!pdo_fieldexists('wx_school_kc_formal_log','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_formal_log')." ADD   `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0未审核1通过2拒绝'");}
if(!pdo_fieldexists('wx_school_kc_formal_log','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_formal_log')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_kc_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL COMMENT '公众号ID',
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `kcid` int(10) unsigned NOT NULL COMMENT '归属课程ID',
  `name` varchar(500) NOT NULL COMMENT '名称',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_kc_menu','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_menu')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_kc_menu','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_menu')." ADD   `weid` int(10) unsigned NOT NULL COMMENT '公众号ID'");}
if(!pdo_fieldexists('wx_school_kc_menu','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_menu')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_kc_menu','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_menu')." ADD   `kcid` int(10) unsigned NOT NULL COMMENT '归属课程ID'");}
if(!pdo_fieldexists('wx_school_kc_menu','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_menu')." ADD   `name` varchar(500) NOT NULL COMMENT '名称'");}
if(!pdo_fieldexists('wx_school_kc_menu','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_menu')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_kc_promote` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL COMMENT '公众号ID',
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `kcid` int(10) unsigned NOT NULL COMMENT '归属课程ID',
  `name` varchar(500) DEFAULT NULL COMMENT '名称/暂以课程名',
  `team` varchar(1000) DEFAULT NULL COMMENT '推广成员',
  `price` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '优惠格',
  `use_pop` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1启用海报2禁止',
  `pop_id` int(10) unsigned NOT NULL COMMENT '海报风格ID',
  `pop_img` varchar(1000) DEFAULT NULL COMMENT '海报底图',
  `share_title` varchar(600) DEFAULT NULL COMMENT '分享标题',
  `share_word` varchar(600) DEFAULT NULL COMMENT '分享文案',
  `rule_word` varchar(600) DEFAULT NULL COMMENT '规则文案',
  `allow_normal` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1允许普通粉丝推广2禁止',
  `show_ranking` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1推广员端排名2禁止',
  `tg_number` int(10) unsigned NOT NULL COMMENT '试听任务人数',
  `is_royalty` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1提成2否',
  `need_done` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1需完成2否',
  `royalty` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '提成',
  `xg_royalty` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '续购提成',
  `mobile_sign` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1前端分配2否',
  `mobile_sign_fp` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1随机2顺序',
  `count_menber` int(10) unsigned NOT NULL COMMENT '达标人数',
  `type` tinyint(1) unsigned NOT NULL COMMENT '1推广',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_kc_promote','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_kc_promote','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `weid` int(10) unsigned NOT NULL COMMENT '公众号ID'");}
if(!pdo_fieldexists('wx_school_kc_promote','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_kc_promote','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `kcid` int(10) unsigned NOT NULL COMMENT '归属课程ID'");}
if(!pdo_fieldexists('wx_school_kc_promote','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `name` varchar(500) DEFAULT NULL COMMENT '名称/暂以课程名'");}
if(!pdo_fieldexists('wx_school_kc_promote','team')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `team` varchar(1000) DEFAULT NULL COMMENT '推广成员'");}
if(!pdo_fieldexists('wx_school_kc_promote','price')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `price` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '优惠格'");}
if(!pdo_fieldexists('wx_school_kc_promote','use_pop')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `use_pop` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1启用海报2禁止'");}
if(!pdo_fieldexists('wx_school_kc_promote','pop_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `pop_id` int(10) unsigned NOT NULL COMMENT '海报风格ID'");}
if(!pdo_fieldexists('wx_school_kc_promote','pop_img')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `pop_img` varchar(1000) DEFAULT NULL COMMENT '海报底图'");}
if(!pdo_fieldexists('wx_school_kc_promote','share_title')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `share_title` varchar(600) DEFAULT NULL COMMENT '分享标题'");}
if(!pdo_fieldexists('wx_school_kc_promote','share_word')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `share_word` varchar(600) DEFAULT NULL COMMENT '分享文案'");}
if(!pdo_fieldexists('wx_school_kc_promote','rule_word')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `rule_word` varchar(600) DEFAULT NULL COMMENT '规则文案'");}
if(!pdo_fieldexists('wx_school_kc_promote','allow_normal')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `allow_normal` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1允许普通粉丝推广2禁止'");}
if(!pdo_fieldexists('wx_school_kc_promote','show_ranking')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `show_ranking` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1推广员端排名2禁止'");}
if(!pdo_fieldexists('wx_school_kc_promote','tg_number')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `tg_number` int(10) unsigned NOT NULL COMMENT '试听任务人数'");}
if(!pdo_fieldexists('wx_school_kc_promote','is_royalty')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `is_royalty` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1提成2否'");}
if(!pdo_fieldexists('wx_school_kc_promote','need_done')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `need_done` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1需完成2否'");}
if(!pdo_fieldexists('wx_school_kc_promote','royalty')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `royalty` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '提成'");}
if(!pdo_fieldexists('wx_school_kc_promote','xg_royalty')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `xg_royalty` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '续购提成'");}
if(!pdo_fieldexists('wx_school_kc_promote','mobile_sign')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `mobile_sign` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1前端分配2否'");}
if(!pdo_fieldexists('wx_school_kc_promote','mobile_sign_fp')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `mobile_sign_fp` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1随机2顺序'");}
if(!pdo_fieldexists('wx_school_kc_promote','count_menber')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `count_menber` int(10) unsigned NOT NULL COMMENT '达标人数'");}
if(!pdo_fieldexists('wx_school_kc_promote','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `type` tinyint(1) unsigned NOT NULL COMMENT '1推广'");}
if(!pdo_fieldexists('wx_school_kc_promote','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_promote')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_kc_saleset` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL COMMENT '公众号ID',
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `kcid` int(10) unsigned NOT NULL COMMENT '归属课程ID',
  `name` varchar(500) DEFAULT NULL COMMENT '名称/暂以课程名',
  `price` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '优惠格',
  `tuanz_price` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '团长优惠',
  `suc_munber` int(10) unsigned NOT NULL COMMENT '成功人数',
  `overtimeset` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1按课程结束时间2自定义',
  `overtime` int(10) unsigned NOT NULL COMMENT '结束时间小时',
  `endtime` int(10) unsigned NOT NULL COMMENT '整个活动结束时间',
  `allow_again` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1允许继续2禁止',
  `allow_help` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1允许虚拟2禁止',
  `use_pop` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1启用海报2禁止',
  `pop_id` int(10) unsigned NOT NULL COMMENT '海报风格ID',
  `pop_img` varchar(1000) DEFAULT NULL COMMENT '海报底图',
  `share_title` varchar(600) DEFAULT NULL COMMENT '分享标题',
  `share_word` varchar(600) DEFAULT NULL COMMENT '分享文案',
  `rule_word` varchar(600) DEFAULT NULL COMMENT '规则文案',
  `type` tinyint(1) unsigned NOT NULL COMMENT '1团购2助力',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_kc_saleset','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_kc_saleset','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `weid` int(10) unsigned NOT NULL COMMENT '公众号ID'");}
if(!pdo_fieldexists('wx_school_kc_saleset','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_kc_saleset','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `kcid` int(10) unsigned NOT NULL COMMENT '归属课程ID'");}
if(!pdo_fieldexists('wx_school_kc_saleset','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `name` varchar(500) DEFAULT NULL COMMENT '名称/暂以课程名'");}
if(!pdo_fieldexists('wx_school_kc_saleset','price')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `price` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '优惠格'");}
if(!pdo_fieldexists('wx_school_kc_saleset','tuanz_price')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `tuanz_price` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '团长优惠'");}
if(!pdo_fieldexists('wx_school_kc_saleset','suc_munber')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `suc_munber` int(10) unsigned NOT NULL COMMENT '成功人数'");}
if(!pdo_fieldexists('wx_school_kc_saleset','overtimeset')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `overtimeset` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1按课程结束时间2自定义'");}
if(!pdo_fieldexists('wx_school_kc_saleset','overtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `overtime` int(10) unsigned NOT NULL COMMENT '结束时间小时'");}
if(!pdo_fieldexists('wx_school_kc_saleset','endtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `endtime` int(10) unsigned NOT NULL COMMENT '整个活动结束时间'");}
if(!pdo_fieldexists('wx_school_kc_saleset','allow_again')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `allow_again` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1允许继续2禁止'");}
if(!pdo_fieldexists('wx_school_kc_saleset','allow_help')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `allow_help` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1允许虚拟2禁止'");}
if(!pdo_fieldexists('wx_school_kc_saleset','use_pop')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `use_pop` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1启用海报2禁止'");}
if(!pdo_fieldexists('wx_school_kc_saleset','pop_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `pop_id` int(10) unsigned NOT NULL COMMENT '海报风格ID'");}
if(!pdo_fieldexists('wx_school_kc_saleset','pop_img')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `pop_img` varchar(1000) DEFAULT NULL COMMENT '海报底图'");}
if(!pdo_fieldexists('wx_school_kc_saleset','share_title')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `share_title` varchar(600) DEFAULT NULL COMMENT '分享标题'");}
if(!pdo_fieldexists('wx_school_kc_saleset','share_word')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `share_word` varchar(600) DEFAULT NULL COMMENT '分享文案'");}
if(!pdo_fieldexists('wx_school_kc_saleset','rule_word')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `rule_word` varchar(600) DEFAULT NULL COMMENT '规则文案'");}
if(!pdo_fieldexists('wx_school_kc_saleset','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `type` tinyint(1) unsigned NOT NULL COMMENT '1团购2助力'");}
if(!pdo_fieldexists('wx_school_kc_saleset','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_saleset')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_kc_vislog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL COMMENT '公众号ID',
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `kcid` int(10) unsigned NOT NULL COMMENT '归属课程ID',
  `sid` int(10) unsigned NOT NULL COMMENT 'sid',
  `log` varchar(500) DEFAULT NULL COMMENT '记录',
  `tid` int(10) unsigned NOT NULL COMMENT '回访人',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_kc_vislog','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_vislog')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_kc_vislog','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_vislog')." ADD   `weid` int(10) unsigned NOT NULL COMMENT '公众号ID'");}
if(!pdo_fieldexists('wx_school_kc_vislog','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_vislog')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_kc_vislog','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_vislog')." ADD   `kcid` int(10) unsigned NOT NULL COMMENT '归属课程ID'");}
if(!pdo_fieldexists('wx_school_kc_vislog','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_vislog')." ADD   `sid` int(10) unsigned NOT NULL COMMENT 'sid'");}
if(!pdo_fieldexists('wx_school_kc_vislog','log')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_vislog')." ADD   `log` varchar(500) DEFAULT NULL COMMENT '记录'");}
if(!pdo_fieldexists('wx_school_kc_vislog','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_vislog')." ADD   `tid` int(10) unsigned NOT NULL COMMENT '回访人'");}
if(!pdo_fieldexists('wx_school_kc_vislog','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_kc_vislog')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_kcbiao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id',
  `weid` int(10) unsigned NOT NULL,
  `tid` int(11) NOT NULL COMMENT '所属教师ID',
  `kcid` int(11) NOT NULL COMMENT '所属课程ID',
  `nub` int(11) NOT NULL COMMENT '第几堂课或第几讲',
  `bj_id` int(11) NOT NULL,
  `km_id` int(11) NOT NULL,
  `xq_id` int(11) NOT NULL,
  `sd_id` int(11) NOT NULL,
  `isxiangqing` tinyint(1) NOT NULL DEFAULT '0' COMMENT '内容显示开关',
  `content` text NOT NULL COMMENT '课程内容',
  `date` int(10) unsigned NOT NULL COMMENT '开课日期',
  `is_remind` int(3) NOT NULL COMMENT '是否已提醒',
  `addr_id` int(11) NOT NULL,
  `costnum` tinyint(3) NOT NULL DEFAULT '1' COMMENT '消耗课时',
  `rulsetid` varchar(100) DEFAULT NULL COMMENT '规则排课固定值',
  `re_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1每周2隔周3日期0手动',
  `is_try_see` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1试看2否',
  `menu_id` int(10) NOT NULL COMMENT '所属章节',
  `content_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0富文本1直播2视频3语音4纯图5文档',
  `sign_ewcode` varchar(1000) DEFAULT NULL COMMENT '线下签到二维码',
  `name` varchar(500) DEFAULT NULL COMMENT '课时名称',
  `pkuser` varchar(500) DEFAULT NULL COMMENT '排课人',
  `clicks` int(10) DEFAULT NULL COMMENT '点击次数',
  `ssort` int(10) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_kcbiao','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_kcbiao','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id'");}
if(!pdo_fieldexists('wx_school_kcbiao','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_kcbiao','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `tid` int(11) NOT NULL COMMENT '所属教师ID'");}
if(!pdo_fieldexists('wx_school_kcbiao','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `kcid` int(11) NOT NULL COMMENT '所属课程ID'");}
if(!pdo_fieldexists('wx_school_kcbiao','nub')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `nub` int(11) NOT NULL COMMENT '第几堂课或第几讲'");}
if(!pdo_fieldexists('wx_school_kcbiao','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `bj_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcbiao','km_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `km_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcbiao','xq_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `xq_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcbiao','sd_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `sd_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcbiao','isxiangqing')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `isxiangqing` tinyint(1) NOT NULL DEFAULT '0' COMMENT '内容显示开关'");}
if(!pdo_fieldexists('wx_school_kcbiao','content')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `content` text NOT NULL COMMENT '课程内容'");}
if(!pdo_fieldexists('wx_school_kcbiao','date')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `date` int(10) unsigned NOT NULL COMMENT '开课日期'");}
if(!pdo_fieldexists('wx_school_kcbiao','is_remind')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `is_remind` int(3) NOT NULL COMMENT '是否已提醒'");}
if(!pdo_fieldexists('wx_school_kcbiao','addr_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `addr_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcbiao','costnum')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `costnum` tinyint(3) NOT NULL DEFAULT '1' COMMENT '消耗课时'");}
if(!pdo_fieldexists('wx_school_kcbiao','rulsetid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `rulsetid` varchar(100) DEFAULT NULL COMMENT '规则排课固定值'");}
if(!pdo_fieldexists('wx_school_kcbiao','re_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `re_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1每周2隔周3日期0手动'");}
if(!pdo_fieldexists('wx_school_kcbiao','is_try_see')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `is_try_see` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1试看2否'");}
if(!pdo_fieldexists('wx_school_kcbiao','menu_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `menu_id` int(10) NOT NULL COMMENT '所属章节'");}
if(!pdo_fieldexists('wx_school_kcbiao','content_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `content_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0富文本1直播2视频3语音4纯图5文档'");}
if(!pdo_fieldexists('wx_school_kcbiao','sign_ewcode')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `sign_ewcode` varchar(1000) DEFAULT NULL COMMENT '线下签到二维码'");}
if(!pdo_fieldexists('wx_school_kcbiao','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `name` varchar(500) DEFAULT NULL COMMENT '课时名称'");}
if(!pdo_fieldexists('wx_school_kcbiao','pkuser')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `pkuser` varchar(500) DEFAULT NULL COMMENT '排课人'");}
if(!pdo_fieldexists('wx_school_kcbiao','clicks')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `clicks` int(10) DEFAULT NULL COMMENT '点击次数'");}
if(!pdo_fieldexists('wx_school_kcbiao','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcbiao')." ADD   `ssort` int(10) DEFAULT NULL COMMENT '排序'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_kcpingjia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `kcid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `type` int(3) NOT NULL COMMENT '评分1留言2',
  `content` varchar(1000) NOT NULL,
  `star` int(3) NOT NULL,
  `createtime` int(11) NOT NULL,
  `masterid` int(10) unsigned NOT NULL COMMENT '主ID',
  `is_master` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1主评论0回复',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示',
  `pfxmid` int(11) NOT NULL COMMENT '评分项ID',
  `anony` tinyint(1) NOT NULL COMMENT '0不匿名1匿名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_kcpingjia','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcpingjia')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_kcpingjia','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcpingjia')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcpingjia','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcpingjia')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcpingjia','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcpingjia')." ADD   `kcid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcpingjia','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcpingjia')." ADD   `tid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcpingjia','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcpingjia')." ADD   `sid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcpingjia','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcpingjia')." ADD   `userid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcpingjia','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcpingjia')." ADD   `type` int(3) NOT NULL COMMENT '评分1留言2'");}
if(!pdo_fieldexists('wx_school_kcpingjia','content')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcpingjia')." ADD   `content` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcpingjia','star')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcpingjia')." ADD   `star` int(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcpingjia','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcpingjia')." ADD   `createtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcpingjia','masterid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcpingjia')." ADD   `masterid` int(10) unsigned NOT NULL COMMENT '主ID'");}
if(!pdo_fieldexists('wx_school_kcpingjia','is_master')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcpingjia')." ADD   `is_master` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1主评论0回复'");}
if(!pdo_fieldexists('wx_school_kcpingjia','is_show')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcpingjia')." ADD   `is_show` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示'");}
if(!pdo_fieldexists('wx_school_kcpingjia','pfxmid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcpingjia')." ADD   `pfxmid` int(11) NOT NULL COMMENT '评分项ID'");}
if(!pdo_fieldexists('wx_school_kcpingjia','anony')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcpingjia')." ADD   `anony` tinyint(1) NOT NULL COMMENT '0不匿名1匿名'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_kcsign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `kcid` int(11) NOT NULL COMMENT '课程id',
  `ksid` int(11) NOT NULL COMMENT '课时id',
  `sid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `createtime` int(11) NOT NULL,
  `signtime` int(11) NOT NULL COMMENT '签哪天的到',
  `status` int(3) NOT NULL,
  `type` int(3) NOT NULL COMMENT '自由or固定',
  `qrtid` int(11) NOT NULL,
  `kcname` varchar(200) NOT NULL,
  `costnum` tinyint(3) NOT NULL DEFAULT '1' COMMENT '消耗课时',
  `qjid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_kcsign','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcsign')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_kcsign','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcsign')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcsign','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcsign')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcsign','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcsign')." ADD   `kcid` int(11) NOT NULL COMMENT '课程id'");}
if(!pdo_fieldexists('wx_school_kcsign','ksid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcsign')." ADD   `ksid` int(11) NOT NULL COMMENT '课时id'");}
if(!pdo_fieldexists('wx_school_kcsign','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcsign')." ADD   `sid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcsign','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcsign')." ADD   `tid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcsign','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcsign')." ADD   `createtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcsign','signtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcsign')." ADD   `signtime` int(11) NOT NULL COMMENT '签哪天的到'");}
if(!pdo_fieldexists('wx_school_kcsign','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcsign')." ADD   `status` int(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcsign','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcsign')." ADD   `type` int(3) NOT NULL COMMENT '自由or固定'");}
if(!pdo_fieldexists('wx_school_kcsign','qrtid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcsign')." ADD   `qrtid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcsign','kcname')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcsign')." ADD   `kcname` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_school_kcsign','costnum')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcsign')." ADD   `costnum` tinyint(3) NOT NULL DEFAULT '1' COMMENT '消耗课时'");}
if(!pdo_fieldexists('wx_school_kcsign','qjid')) {pdo_query("ALTER TABLE ".tablename('wx_school_kcsign')." ADD   `qjid` int(10) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_language` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL COMMENT '公众号',
  `schoolid` int(10) unsigned NOT NULL COMMENT '分校id',
  `is_on` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否启用',
  `lanset` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_language','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_language')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_language','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_language')." ADD   `weid` int(10) unsigned NOT NULL COMMENT '公众号'");}
if(!pdo_fieldexists('wx_school_language','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_language')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '分校id'");}
if(!pdo_fieldexists('wx_school_language','is_on')) {pdo_query("ALTER TABLE ".tablename('wx_school_language')." ADD   `is_on` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否启用'");}
if(!pdo_fieldexists('wx_school_language','lanset')) {pdo_query("ALTER TABLE ".tablename('wx_school_language')." ADD   `lanset` text NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_leave` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `leaveid` int(10) unsigned NOT NULL,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `uid` int(10) unsigned NOT NULL COMMENT '微擎UID',
  `tuid` int(10) unsigned NOT NULL COMMENT '老师微擎UID',
  `userid` int(10) unsigned NOT NULL COMMENT '发送者id',
  `touserid` int(10) unsigned NOT NULL COMMENT '接收者id',
  `openid` varchar(200) DEFAULT '' COMMENT 'openid',
  `sid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学生ID',
  `tid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '教师ID',
  `type` varchar(10) DEFAULT '' COMMENT '请假类型',
  `startime` varchar(200) DEFAULT '' COMMENT '开始时间',
  `endtime` varchar(200) DEFAULT '' COMMENT '结束时间',
  `startime1` int(10) unsigned NOT NULL COMMENT '开始时间',
  `endtime1` int(10) unsigned NOT NULL COMMENT '结束时间',
  `conet` varchar(200) DEFAULT '' COMMENT '详细内容',
  `reconet` varchar(200) DEFAULT '' COMMENT '详细内容',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  `cltime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '处理时间',
  `cltid` int(10) unsigned NOT NULL COMMENT '老师id',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核状态',
  `bj_id` int(10) unsigned NOT NULL COMMENT '班级ID',
  `teacherid` int(11) DEFAULT NULL,
  `isfrist` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1是0否',
  `isliuyan` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否留言',
  `isread` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1未读2已读',
  `audio` varchar(1000) DEFAULT '',
  `tonjzrtid` int(11) NOT NULL COMMENT '年级主任tid',
  `toxztid` int(11) NOT NULL COMMENT '校长tid',
  `njzryj` varchar(200) NOT NULL COMMENT '年级主任审批意见',
  `njzrcltime` int(11) NOT NULL,
  `picurl` varchar(1000) NOT NULL,
  `tktype` int(3) NOT NULL COMMENT '调课类型',
  `ksnum` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `more_less` tinyint(3) NOT NULL,
  `kcid` int(10) unsigned NOT NULL,
  `ksid` int(10) unsigned NOT NULL,
  `kcsignid` int(10) unsigned NOT NULL,
  `byid` int(11) NOT NULL COMMENT '病因ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_leave','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_leave','leaveid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `leaveid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_leave','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_leave','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_leave','uid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `uid` int(10) unsigned NOT NULL COMMENT '微擎UID'");}
if(!pdo_fieldexists('wx_school_leave','tuid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `tuid` int(10) unsigned NOT NULL COMMENT '老师微擎UID'");}
if(!pdo_fieldexists('wx_school_leave','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `userid` int(10) unsigned NOT NULL COMMENT '发送者id'");}
if(!pdo_fieldexists('wx_school_leave','touserid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `touserid` int(10) unsigned NOT NULL COMMENT '接收者id'");}
if(!pdo_fieldexists('wx_school_leave','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `openid` varchar(200) DEFAULT '' COMMENT 'openid'");}
if(!pdo_fieldexists('wx_school_leave','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `sid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学生ID'");}
if(!pdo_fieldexists('wx_school_leave','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `tid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '教师ID'");}
if(!pdo_fieldexists('wx_school_leave','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `type` varchar(10) DEFAULT '' COMMENT '请假类型'");}
if(!pdo_fieldexists('wx_school_leave','startime')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `startime` varchar(200) DEFAULT '' COMMENT '开始时间'");}
if(!pdo_fieldexists('wx_school_leave','endtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `endtime` varchar(200) DEFAULT '' COMMENT '结束时间'");}
if(!pdo_fieldexists('wx_school_leave','startime1')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `startime1` int(10) unsigned NOT NULL COMMENT '开始时间'");}
if(!pdo_fieldexists('wx_school_leave','endtime1')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `endtime1` int(10) unsigned NOT NULL COMMENT '结束时间'");}
if(!pdo_fieldexists('wx_school_leave','conet')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `conet` varchar(200) DEFAULT '' COMMENT '详细内容'");}
if(!pdo_fieldexists('wx_school_leave','reconet')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `reconet` varchar(200) DEFAULT '' COMMENT '详细内容'");}
if(!pdo_fieldexists('wx_school_leave','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
if(!pdo_fieldexists('wx_school_leave','cltime')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `cltime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '处理时间'");}
if(!pdo_fieldexists('wx_school_leave','cltid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `cltid` int(10) unsigned NOT NULL COMMENT '老师id'");}
if(!pdo_fieldexists('wx_school_leave','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核状态'");}
if(!pdo_fieldexists('wx_school_leave','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `bj_id` int(10) unsigned NOT NULL COMMENT '班级ID'");}
if(!pdo_fieldexists('wx_school_leave','teacherid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `teacherid` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_leave','isfrist')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `isfrist` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1是0否'");}
if(!pdo_fieldexists('wx_school_leave','isliuyan')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `isliuyan` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否留言'");}
if(!pdo_fieldexists('wx_school_leave','isread')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `isread` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1未读2已读'");}
if(!pdo_fieldexists('wx_school_leave','audio')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `audio` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_leave','tonjzrtid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `tonjzrtid` int(11) NOT NULL COMMENT '年级主任tid'");}
if(!pdo_fieldexists('wx_school_leave','toxztid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `toxztid` int(11) NOT NULL COMMENT '校长tid'");}
if(!pdo_fieldexists('wx_school_leave','njzryj')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `njzryj` varchar(200) NOT NULL COMMENT '年级主任审批意见'");}
if(!pdo_fieldexists('wx_school_leave','njzrcltime')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `njzrcltime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_leave','picurl')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `picurl` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_leave','tktype')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `tktype` int(3) NOT NULL COMMENT '调课类型'");}
if(!pdo_fieldexists('wx_school_leave','ksnum')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `ksnum` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_leave','classid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `classid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_leave','more_less')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `more_less` tinyint(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_leave','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `kcid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_leave','ksid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `ksid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_leave','kcsignid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `kcsignid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_leave','byid')) {pdo_query("ALTER TABLE ".tablename('wx_school_leave')." ADD   `byid` int(11) NOT NULL COMMENT '病因ID'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_liuyan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `leaveid` int(10) unsigned NOT NULL,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `uid` int(10) unsigned NOT NULL COMMENT '微擎UID',
  `tuid` int(10) unsigned NOT NULL COMMENT '老师微擎UID',
  `openid` varchar(200) DEFAULT '' COMMENT 'openid',
  `sid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学生ID',
  `tid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '教师ID',
  `type` varchar(10) DEFAULT '' COMMENT '请假类型',
  `startime` varchar(200) DEFAULT '' COMMENT '开始时间',
  `endtime` varchar(200) DEFAULT '' COMMENT '结束时间',
  `conet` varchar(200) DEFAULT '' COMMENT '详细内容',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  `cltime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '处理时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核状态',
  `bj_id` int(10) unsigned NOT NULL COMMENT '班级ID',
  `isliuyan` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否留言',
  `teacherid` int(11) DEFAULT NULL,
  `isfrist` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1是0否',
  `userid` int(11) DEFAULT NULL,
  `touserid` int(11) DEFAULT NULL,
  `isread` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1是2否',
  `startime1` int(10) DEFAULT NULL,
  `endtime1` int(10) DEFAULT NULL,
  `cltid` int(10) unsigned NOT NULL COMMENT '老师id',
  `reconet` varchar(200) DEFAULT '' COMMENT '教师回复',
  `audio` varchar(1000) DEFAULT '',
  `tonjzrtid` int(11) NOT NULL COMMENT '年级主任tid',
  `toxztid` int(11) NOT NULL COMMENT '校长tid',
  `njzryj` varchar(200) NOT NULL COMMENT '年级主任审批意见',
  `njzrcltime` int(11) NOT NULL,
  `picurl` varchar(1000) NOT NULL,
  `tktype` int(3) NOT NULL COMMENT '调课类型',
  `ksnum` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `more_less` tinyint(3) NOT NULL,
  `kcid` int(10) unsigned NOT NULL,
  `ksid` int(10) unsigned NOT NULL,
  `kcsignid` int(10) unsigned NOT NULL,
  `byid` int(11) NOT NULL COMMENT '病因ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_liuyan','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_liuyan','leaveid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `leaveid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_liuyan','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_liuyan','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_liuyan','uid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `uid` int(10) unsigned NOT NULL COMMENT '微擎UID'");}
if(!pdo_fieldexists('wx_school_liuyan','tuid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `tuid` int(10) unsigned NOT NULL COMMENT '老师微擎UID'");}
if(!pdo_fieldexists('wx_school_liuyan','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `openid` varchar(200) DEFAULT '' COMMENT 'openid'");}
if(!pdo_fieldexists('wx_school_liuyan','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `sid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学生ID'");}
if(!pdo_fieldexists('wx_school_liuyan','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `tid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '教师ID'");}
if(!pdo_fieldexists('wx_school_liuyan','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `type` varchar(10) DEFAULT '' COMMENT '请假类型'");}
if(!pdo_fieldexists('wx_school_liuyan','startime')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `startime` varchar(200) DEFAULT '' COMMENT '开始时间'");}
if(!pdo_fieldexists('wx_school_liuyan','endtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `endtime` varchar(200) DEFAULT '' COMMENT '结束时间'");}
if(!pdo_fieldexists('wx_school_liuyan','conet')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `conet` varchar(200) DEFAULT '' COMMENT '详细内容'");}
if(!pdo_fieldexists('wx_school_liuyan','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
if(!pdo_fieldexists('wx_school_liuyan','cltime')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `cltime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '处理时间'");}
if(!pdo_fieldexists('wx_school_liuyan','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核状态'");}
if(!pdo_fieldexists('wx_school_liuyan','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `bj_id` int(10) unsigned NOT NULL COMMENT '班级ID'");}
if(!pdo_fieldexists('wx_school_liuyan','isliuyan')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `isliuyan` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否留言'");}
if(!pdo_fieldexists('wx_school_liuyan','teacherid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `teacherid` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_liuyan','isfrist')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `isfrist` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1是0否'");}
if(!pdo_fieldexists('wx_school_liuyan','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `userid` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_liuyan','touserid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `touserid` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_liuyan','isread')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `isread` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1是2否'");}
if(!pdo_fieldexists('wx_school_liuyan','startime1')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `startime1` int(10) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_liuyan','endtime1')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `endtime1` int(10) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_liuyan','cltid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `cltid` int(10) unsigned NOT NULL COMMENT '老师id'");}
if(!pdo_fieldexists('wx_school_liuyan','reconet')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `reconet` varchar(200) DEFAULT '' COMMENT '教师回复'");}
if(!pdo_fieldexists('wx_school_liuyan','audio')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `audio` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_liuyan','tonjzrtid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `tonjzrtid` int(11) NOT NULL COMMENT '年级主任tid'");}
if(!pdo_fieldexists('wx_school_liuyan','toxztid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `toxztid` int(11) NOT NULL COMMENT '校长tid'");}
if(!pdo_fieldexists('wx_school_liuyan','njzryj')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `njzryj` varchar(200) NOT NULL COMMENT '年级主任审批意见'");}
if(!pdo_fieldexists('wx_school_liuyan','njzrcltime')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `njzrcltime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_liuyan','picurl')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `picurl` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_liuyan','tktype')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `tktype` int(3) NOT NULL COMMENT '调课类型'");}
if(!pdo_fieldexists('wx_school_liuyan','ksnum')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `ksnum` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_liuyan','classid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `classid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_liuyan','more_less')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `more_less` tinyint(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_liuyan','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `kcid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_liuyan','ksid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `ksid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_liuyan','kcsignid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `kcsignid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_liuyan','byid')) {pdo_query("ALTER TABLE ".tablename('wx_school_liuyan')." ADD   `byid` int(11) NOT NULL COMMENT '病因ID'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_mall` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `thumb` varchar(1000) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(500) NOT NULL,
  `fenlei` varchar(500) NOT NULL,
  `sort` int(10) NOT NULL,
  `old_price` float NOT NULL,
  `new_price` float NOT NULL,
  `points` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `sold` int(10) NOT NULL,
  `cop` int(11) NOT NULL COMMENT '1纯积分2纯金额3混合',
  `xsxg` int(3) NOT NULL COMMENT '学生限购数量.0为不限购',
  `showtype` int(3) NOT NULL COMMENT '家长端1/教师端2/两者0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_mall','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_mall','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_mall','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_mall','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD   `title` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_mall','thumb')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD   `thumb` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_mall','content')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD   `content` text NOT NULL");}
if(!pdo_fieldexists('wx_school_mall','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD   `type` varchar(500) NOT NULL");}
if(!pdo_fieldexists('wx_school_mall','fenlei')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD   `fenlei` varchar(500) NOT NULL");}
if(!pdo_fieldexists('wx_school_mall','sort')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD   `sort` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_mall','old_price')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD   `old_price` float NOT NULL");}
if(!pdo_fieldexists('wx_school_mall','new_price')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD   `new_price` float NOT NULL");}
if(!pdo_fieldexists('wx_school_mall','points')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD   `points` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_mall','qty')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD   `qty` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_mall','sold')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD   `sold` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_mall','cop')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD   `cop` int(11) NOT NULL COMMENT '1纯积分2纯金额3混合'");}
if(!pdo_fieldexists('wx_school_mall','xsxg')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD   `xsxg` int(3) NOT NULL COMMENT '学生限购数量.0为不限购'");}
if(!pdo_fieldexists('wx_school_mall','showtype')) {pdo_query("ALTER TABLE ".tablename('wx_school_mall')." ADD   `showtype` int(3) NOT NULL COMMENT '家长端1/教师端2/两者0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_mallorder` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `goodsid` int(11) NOT NULL,
  `addressid` int(11) NOT NULL,
  `torderid` int(11) NOT NULL,
  `tname` varchar(50) NOT NULL,
  `tphone` varchar(15) NOT NULL,
  `taddress` varchar(500) NOT NULL,
  `count` int(10) NOT NULL,
  `allcash` float NOT NULL,
  `allpoint` int(11) NOT NULL,
  `beizhu` varchar(500) NOT NULL,
  `cop` int(11) NOT NULL COMMENT '1纯积分2纯金额3混合',
  `status` int(3) NOT NULL,
  `fahuo` int(3) NOT NULL,
  `createtime` int(10) NOT NULL,
  `sid` int(11) NOT NULL COMMENT '学生id',
  `userid` int(11) NOT NULL COMMENT '购买者userid（学生用）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_mallorder','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_mallorder','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_mallorder','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_mallorder','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `tid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_mallorder','goodsid')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `goodsid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_mallorder','addressid')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `addressid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_mallorder','torderid')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `torderid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_mallorder','tname')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `tname` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_mallorder','tphone')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `tphone` varchar(15) NOT NULL");}
if(!pdo_fieldexists('wx_school_mallorder','taddress')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `taddress` varchar(500) NOT NULL");}
if(!pdo_fieldexists('wx_school_mallorder','count')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `count` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_mallorder','allcash')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `allcash` float NOT NULL");}
if(!pdo_fieldexists('wx_school_mallorder','allpoint')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `allpoint` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_mallorder','beizhu')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `beizhu` varchar(500) NOT NULL");}
if(!pdo_fieldexists('wx_school_mallorder','cop')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `cop` int(11) NOT NULL COMMENT '1纯积分2纯金额3混合'");}
if(!pdo_fieldexists('wx_school_mallorder','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `status` int(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_mallorder','fahuo')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `fahuo` int(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_mallorder','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `createtime` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_mallorder','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `sid` int(11) NOT NULL COMMENT '学生id'");}
if(!pdo_fieldexists('wx_school_mallorder','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_mallorder')." ADD   `userid` int(11) NOT NULL COMMENT '购买者userid（学生用）'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_media` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `uid` int(10) unsigned NOT NULL COMMENT '发布者UID',
  `sid` int(10) unsigned NOT NULL COMMENT '学生SID',
  `picurl` varchar(255) DEFAULT '' COMMENT '图片',
  `fmpicurl` varchar(255) DEFAULT '' COMMENT '封面图片',
  `bj_id1` int(10) unsigned NOT NULL COMMENT '班级ID1',
  `bj_id2` int(10) unsigned NOT NULL COMMENT '班级ID2',
  `bj_id3` int(10) unsigned NOT NULL COMMENT '班级ID3',
  `order` int(10) unsigned NOT NULL COMMENT '排序',
  `sherid` int(10) unsigned NOT NULL COMMENT '所属图文id',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0班级圈1学生相册',
  `isfm` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1是0否',
  `kc_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_media','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_media')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_media','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_media')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_media','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_media')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_media','uid')) {pdo_query("ALTER TABLE ".tablename('wx_school_media')." ADD   `uid` int(10) unsigned NOT NULL COMMENT '发布者UID'");}
if(!pdo_fieldexists('wx_school_media','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_media')." ADD   `sid` int(10) unsigned NOT NULL COMMENT '学生SID'");}
if(!pdo_fieldexists('wx_school_media','picurl')) {pdo_query("ALTER TABLE ".tablename('wx_school_media')." ADD   `picurl` varchar(255) DEFAULT '' COMMENT '图片'");}
if(!pdo_fieldexists('wx_school_media','fmpicurl')) {pdo_query("ALTER TABLE ".tablename('wx_school_media')." ADD   `fmpicurl` varchar(255) DEFAULT '' COMMENT '封面图片'");}
if(!pdo_fieldexists('wx_school_media','bj_id1')) {pdo_query("ALTER TABLE ".tablename('wx_school_media')." ADD   `bj_id1` int(10) unsigned NOT NULL COMMENT '班级ID1'");}
if(!pdo_fieldexists('wx_school_media','bj_id2')) {pdo_query("ALTER TABLE ".tablename('wx_school_media')." ADD   `bj_id2` int(10) unsigned NOT NULL COMMENT '班级ID2'");}
if(!pdo_fieldexists('wx_school_media','bj_id3')) {pdo_query("ALTER TABLE ".tablename('wx_school_media')." ADD   `bj_id3` int(10) unsigned NOT NULL COMMENT '班级ID3'");}
if(!pdo_fieldexists('wx_school_media','order')) {pdo_query("ALTER TABLE ".tablename('wx_school_media')." ADD   `order` int(10) unsigned NOT NULL COMMENT '排序'");}
if(!pdo_fieldexists('wx_school_media','sherid')) {pdo_query("ALTER TABLE ".tablename('wx_school_media')." ADD   `sherid` int(10) unsigned NOT NULL COMMENT '所属图文id'");}
if(!pdo_fieldexists('wx_school_media','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_media')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
if(!pdo_fieldexists('wx_school_media','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_media')." ADD   `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0班级圈1学生相册'");}
if(!pdo_fieldexists('wx_school_media','isfm')) {pdo_query("ALTER TABLE ".tablename('wx_school_media')." ADD   `isfm` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1是0否'");}
if(!pdo_fieldexists('wx_school_media','kc_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_media')." ADD   `kc_id` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `cateid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `content` mediumtext NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `picarr` text COMMENT '图片组',
  `displayorder` int(10) unsigned NOT NULL COMMENT '排序',
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_show_home` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  `dianzan` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_news','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_news','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_news','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_news','cateid')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD   `cateid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_news','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD   `title` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_news','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD   `type` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_news','content')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD   `content` mediumtext NOT NULL");}
if(!pdo_fieldexists('wx_school_news','thumb')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD   `thumb` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_news','description')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD   `description` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_news','author')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD   `author` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_news','picarr')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD   `picarr` text COMMENT '图片组'");}
if(!pdo_fieldexists('wx_school_news','displayorder')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD   `displayorder` int(10) unsigned NOT NULL COMMENT '排序'");}
if(!pdo_fieldexists('wx_school_news','is_display')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD   `is_display` tinyint(3) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_news','is_show_home')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD   `is_show_home` tinyint(3) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_news','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_news','click')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD   `click` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_news','dianzan')) {pdo_query("ALTER TABLE ".tablename('wx_school_news')." ADD   `dianzan` int(10) unsigned NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_notice` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `tid` int(10) unsigned NOT NULL COMMENT '教师ID',
  `tname` varchar(10) DEFAULT '' COMMENT '发布老师名字',
  `title` varchar(50) DEFAULT '' COMMENT '文章名称',
  `content` text NOT NULL COMMENT '详细内容',
  `outurl` varchar(500) DEFAULT '' COMMENT '外部链接',
  `picarr` text COMMENT '图片组',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  `bj_id` int(10) unsigned NOT NULL COMMENT '班级ID',
  `km_id` int(10) unsigned NOT NULL COMMENT '科目ID',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否班级通知',
  `ismobile` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0手机端1电脑端',
  `groupid` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1为全体师生2为全体教师3为全体家长和学生',
  `video` varchar(2000) NOT NULL DEFAULT '' COMMENT '视频地址',
  `ali_vod_id` varchar(100) DEFAULT '' COMMENT '视频画面ID',
  `videopic` varchar(1000) NOT NULL DEFAULT '' COMMENT '视频封面',
  `audio` varchar(100) DEFAULT '' COMMENT '音频',
  `audiotime` int(10) unsigned NOT NULL COMMENT '音频时长',
  `anstype` varchar(200) NOT NULL,
  `usertype` varchar(100) DEFAULT '' COMMENT '接收用户',
  `userdatas` varchar(1000) DEFAULT '' COMMENT '用户数据',
  `comment` tinyint(1) NOT NULL DEFAULT '0',
  `kc_id` int(11) NOT NULL,
  `is_research` tinyint(3) NOT NULL,
  `texturl` varchar(1000) NOT NULL COMMENT '作业附件上传url',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_notice','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_notice','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_notice','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_notice','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `tid` int(10) unsigned NOT NULL COMMENT '教师ID'");}
if(!pdo_fieldexists('wx_school_notice','tname')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `tname` varchar(10) DEFAULT '' COMMENT '发布老师名字'");}
if(!pdo_fieldexists('wx_school_notice','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `title` varchar(50) DEFAULT '' COMMENT '文章名称'");}
if(!pdo_fieldexists('wx_school_notice','content')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `content` text NOT NULL COMMENT '详细内容'");}
if(!pdo_fieldexists('wx_school_notice','outurl')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `outurl` varchar(500) DEFAULT '' COMMENT '外部链接'");}
if(!pdo_fieldexists('wx_school_notice','picarr')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `picarr` text COMMENT '图片组'");}
if(!pdo_fieldexists('wx_school_notice','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
if(!pdo_fieldexists('wx_school_notice','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `bj_id` int(10) unsigned NOT NULL COMMENT '班级ID'");}
if(!pdo_fieldexists('wx_school_notice','km_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `km_id` int(10) unsigned NOT NULL COMMENT '科目ID'");}
if(!pdo_fieldexists('wx_school_notice','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否班级通知'");}
if(!pdo_fieldexists('wx_school_notice','ismobile')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `ismobile` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0手机端1电脑端'");}
if(!pdo_fieldexists('wx_school_notice','groupid')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `groupid` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1为全体师生2为全体教师3为全体家长和学生'");}
if(!pdo_fieldexists('wx_school_notice','video')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `video` varchar(2000) NOT NULL DEFAULT '' COMMENT '视频地址'");}
if(!pdo_fieldexists('wx_school_notice','ali_vod_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `ali_vod_id` varchar(100) DEFAULT '' COMMENT '视频画面ID'");}
if(!pdo_fieldexists('wx_school_notice','videopic')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `videopic` varchar(1000) NOT NULL DEFAULT '' COMMENT '视频封面'");}
if(!pdo_fieldexists('wx_school_notice','audio')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `audio` varchar(100) DEFAULT '' COMMENT '音频'");}
if(!pdo_fieldexists('wx_school_notice','audiotime')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `audiotime` int(10) unsigned NOT NULL COMMENT '音频时长'");}
if(!pdo_fieldexists('wx_school_notice','anstype')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `anstype` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_school_notice','usertype')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `usertype` varchar(100) DEFAULT '' COMMENT '接收用户'");}
if(!pdo_fieldexists('wx_school_notice','userdatas')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `userdatas` varchar(1000) DEFAULT '' COMMENT '用户数据'");}
if(!pdo_fieldexists('wx_school_notice','comment')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `comment` tinyint(1) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_notice','kc_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `kc_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_notice','is_research')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `is_research` tinyint(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_notice','texturl')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice')." ADD   `texturl` varchar(1000) NOT NULL COMMENT '作业附件上传url'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_notice_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `noticeid` int(10) unsigned NOT NULL,
  `commentid` int(10) unsigned NOT NULL,
  `comment` varchar(100) DEFAULT NULL COMMENT '评论内容',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_notice_comment','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice_comment')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_notice_comment','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice_comment')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_notice_comment','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice_comment')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_notice_comment','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice_comment')." ADD   `userid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_notice_comment','noticeid')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice_comment')." ADD   `noticeid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_notice_comment','commentid')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice_comment')." ADD   `commentid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_notice_comment','comment')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice_comment')." ADD   `comment` varchar(100) DEFAULT NULL COMMENT '评论内容'");}
if(!pdo_fieldexists('wx_school_notice_comment','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_notice_comment')." ADD   `createtime` int(10) unsigned NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_object` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` int(10) unsigned NOT NULL,
  `type` varchar(50) NOT NULL,
  `displayorder` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_object','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_object')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_object','item')) {pdo_query("ALTER TABLE ".tablename('wx_school_object')." ADD   `item` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_object','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_object')." ADD   `type` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_object','displayorder')) {pdo_query("ALTER TABLE ".tablename('wx_school_object')." ADD   `displayorder` varchar(50) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_online` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `macid` int(10) unsigned NOT NULL,
  `commond` int(10) unsigned NOT NULL,
  `result` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `isread` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `createtime` int(10) unsigned NOT NULL COMMENT '生成时间',
  `dotime` int(10) unsigned NOT NULL COMMENT '执行时间',
  `lastedittime` int(11) DEFAULT NULL COMMENT '任务对应的最近一次修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_online','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_online')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_online','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_online')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_online','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_online')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_online','macid')) {pdo_query("ALTER TABLE ".tablename('wx_school_online')." ADD   `macid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_online','commond')) {pdo_query("ALTER TABLE ".tablename('wx_school_online')." ADD   `commond` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_online','result')) {pdo_query("ALTER TABLE ".tablename('wx_school_online')." ADD   `result` tinyint(1) unsigned NOT NULL DEFAULT '2'");}
if(!pdo_fieldexists('wx_school_online','isread')) {pdo_query("ALTER TABLE ".tablename('wx_school_online')." ADD   `isread` tinyint(1) unsigned NOT NULL DEFAULT '2'");}
if(!pdo_fieldexists('wx_school_online','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_online')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '生成时间'");}
if(!pdo_fieldexists('wx_school_online','dotime')) {pdo_query("ALTER TABLE ".tablename('wx_school_online')." ADD   `dotime` int(10) unsigned NOT NULL COMMENT '执行时间'");}
if(!pdo_fieldexists('wx_school_online','lastedittime')) {pdo_query("ALTER TABLE ".tablename('wx_school_online')." ADD   `lastedittime` int(11) DEFAULT NULL COMMENT '任务对应的最近一次修改时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_order` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `orderid` int(10) unsigned NOT NULL COMMENT '订单ID',
  `uid` int(10) unsigned NOT NULL COMMENT '发布者UID',
  `userid` int(10) unsigned NOT NULL COMMENT '发布者UID',
  `sid` int(10) unsigned NOT NULL COMMENT '学生id',
  `kcid` int(10) unsigned NOT NULL COMMENT '课程ID',
  `costid` int(10) unsigned NOT NULL COMMENT '项目ID',
  `lastorderid` int(10) unsigned NOT NULL COMMENT '继承订单,用于续费',
  `signid` int(10) unsigned NOT NULL COMMENT '报名ID',
  `bdcardid` int(10) unsigned NOT NULL COMMENT '帮卡ID',
  `obid` int(10) unsigned NOT NULL COMMENT '功能ID',
  `cose` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1未支付2为已支付3为已退款',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1课程2项目3功能4报名',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  `5qing` varchar(30) NOT NULL DEFAULT '0' COMMENT '支付LOGO',
  `paytime` int(10) unsigned NOT NULL COMMENT '支付时间',
  `paytype` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1线上2现金',
  `pay_type` varchar(100) DEFAULT '' COMMENT '支付方式',
  `tuitime` int(10) unsigned NOT NULL COMMENT '退费时间',
  `xufeitype` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1已续费2未续费',
  `payweid` int(10) unsigned NOT NULL COMMENT '支付公众号',
  `uniontid` varchar(1000) DEFAULT '' COMMENT '微信或支付宝返回的订单号',
  `refundid` int(10) unsigned NOT NULL,
  `wxpayid` int(10) unsigned NOT NULL,
  `vodid` int(10) unsigned DEFAULT NULL COMMENT '视频ID',
  `vodtype` varchar(30) NOT NULL COMMENT '视频课程购买类型',
  `morderid` int(11) NOT NULL,
  `ksnum` int(11) NOT NULL,
  `spoint` int(11) NOT NULL COMMENT '学生积分',
  `tempsid` int(11) NOT NULL,
  `tempopenid` varchar(50) NOT NULL,
  `tid` varchar(100) NOT NULL,
  `taocanid` int(11) NOT NULL,
  `shareuserid` int(11) NOT NULL,
  `print_nums` int(11) NOT NULL,
  `new_stu` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0默认1新增学生',
  `sale_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1团2助力0关闭',
  `sale_rule` int(10) unsigned NOT NULL COMMENT '营销所属规则',
  `team_id` int(10) unsigned NOT NULL COMMENT '组队ID',
  `superior_tid` int(10) unsigned NOT NULL COMMENT '推广员ID',
  `team_price` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '队伍优惠',
  `team_dz_price` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '队长优惠',
  `kcstatus` tinyint(4) NOT NULL COMMENT '0首购，1续购',
  `guigeid` int(11) NOT NULL COMMENT '规格ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_order','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_order','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_order','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_order','orderid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `orderid` int(10) unsigned NOT NULL COMMENT '订单ID'");}
if(!pdo_fieldexists('wx_school_order','uid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `uid` int(10) unsigned NOT NULL COMMENT '发布者UID'");}
if(!pdo_fieldexists('wx_school_order','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `userid` int(10) unsigned NOT NULL COMMENT '发布者UID'");}
if(!pdo_fieldexists('wx_school_order','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `sid` int(10) unsigned NOT NULL COMMENT '学生id'");}
if(!pdo_fieldexists('wx_school_order','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `kcid` int(10) unsigned NOT NULL COMMENT '课程ID'");}
if(!pdo_fieldexists('wx_school_order','costid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `costid` int(10) unsigned NOT NULL COMMENT '项目ID'");}
if(!pdo_fieldexists('wx_school_order','lastorderid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `lastorderid` int(10) unsigned NOT NULL COMMENT '继承订单,用于续费'");}
if(!pdo_fieldexists('wx_school_order','signid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `signid` int(10) unsigned NOT NULL COMMENT '报名ID'");}
if(!pdo_fieldexists('wx_school_order','bdcardid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `bdcardid` int(10) unsigned NOT NULL COMMENT '帮卡ID'");}
if(!pdo_fieldexists('wx_school_order','obid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `obid` int(10) unsigned NOT NULL COMMENT '功能ID'");}
if(!pdo_fieldexists('wx_school_order','cose')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `cose` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '价格'");}
if(!pdo_fieldexists('wx_school_order','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1未支付2为已支付3为已退款'");}
if(!pdo_fieldexists('wx_school_order','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1课程2项目3功能4报名'");}
if(!pdo_fieldexists('wx_school_order','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
if(!pdo_fieldexists('wx_school_order','5qing')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `5qing` varchar(30) NOT NULL DEFAULT '0' COMMENT '支付LOGO'");}
if(!pdo_fieldexists('wx_school_order','paytime')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `paytime` int(10) unsigned NOT NULL COMMENT '支付时间'");}
if(!pdo_fieldexists('wx_school_order','paytype')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `paytype` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1线上2现金'");}
if(!pdo_fieldexists('wx_school_order','pay_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `pay_type` varchar(100) DEFAULT '' COMMENT '支付方式'");}
if(!pdo_fieldexists('wx_school_order','tuitime')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `tuitime` int(10) unsigned NOT NULL COMMENT '退费时间'");}
if(!pdo_fieldexists('wx_school_order','xufeitype')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `xufeitype` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1已续费2未续费'");}
if(!pdo_fieldexists('wx_school_order','payweid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `payweid` int(10) unsigned NOT NULL COMMENT '支付公众号'");}
if(!pdo_fieldexists('wx_school_order','uniontid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `uniontid` varchar(1000) DEFAULT '' COMMENT '微信或支付宝返回的订单号'");}
if(!pdo_fieldexists('wx_school_order','refundid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `refundid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_order','wxpayid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `wxpayid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_order','vodid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `vodid` int(10) unsigned DEFAULT NULL COMMENT '视频ID'");}
if(!pdo_fieldexists('wx_school_order','vodtype')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `vodtype` varchar(30) NOT NULL COMMENT '视频课程购买类型'");}
if(!pdo_fieldexists('wx_school_order','morderid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `morderid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_order','ksnum')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `ksnum` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_order','spoint')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `spoint` int(11) NOT NULL COMMENT '学生积分'");}
if(!pdo_fieldexists('wx_school_order','tempsid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `tempsid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_order','tempopenid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `tempopenid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_order','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `tid` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_order','taocanid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `taocanid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_order','shareuserid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `shareuserid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_order','print_nums')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `print_nums` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_order','new_stu')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `new_stu` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0默认1新增学生'");}
if(!pdo_fieldexists('wx_school_order','sale_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `sale_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1团2助力0关闭'");}
if(!pdo_fieldexists('wx_school_order','sale_rule')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `sale_rule` int(10) unsigned NOT NULL COMMENT '营销所属规则'");}
if(!pdo_fieldexists('wx_school_order','team_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `team_id` int(10) unsigned NOT NULL COMMENT '组队ID'");}
if(!pdo_fieldexists('wx_school_order','superior_tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `superior_tid` int(10) unsigned NOT NULL COMMENT '推广员ID'");}
if(!pdo_fieldexists('wx_school_order','team_price')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `team_price` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '队伍优惠'");}
if(!pdo_fieldexists('wx_school_order','team_dz_price')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `team_dz_price` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '队长优惠'");}
if(!pdo_fieldexists('wx_school_order','kcstatus')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `kcstatus` tinyint(4) NOT NULL COMMENT '0首购，1续购'");}
if(!pdo_fieldexists('wx_school_order','guigeid')) {pdo_query("ALTER TABLE ".tablename('wx_school_order')." ADD   `guigeid` int(11) NOT NULL COMMENT '规格ID'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `op` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dailytime` int(11) NOT NULL,
  `adpoint` int(11) NOT NULL,
  `is_on` int(1) NOT NULL COMMENT '1开启2关闭',
  `type` int(3) NOT NULL COMMENT '1规则2任务',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_points','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_points')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_points','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_points')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_points','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_points')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_points','op')) {pdo_query("ALTER TABLE ".tablename('wx_school_points')." ADD   `op` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_school_points','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_points')." ADD   `name` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_points','dailytime')) {pdo_query("ALTER TABLE ".tablename('wx_school_points')." ADD   `dailytime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_points','adpoint')) {pdo_query("ALTER TABLE ".tablename('wx_school_points')." ADD   `adpoint` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_points','is_on')) {pdo_query("ALTER TABLE ".tablename('wx_school_points')." ADD   `is_on` int(1) NOT NULL COMMENT '1开启2关闭'");}
if(!pdo_fieldexists('wx_school_points','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_points')." ADD   `type` int(3) NOT NULL COMMENT '1规则2任务'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_pointsrecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `createtime` int(10) NOT NULL,
  `type` int(3) NOT NULL,
  `mcount` int(3) NOT NULL COMMENT '任务已完成次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_pointsrecord','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_pointsrecord')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_pointsrecord','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_pointsrecord')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_pointsrecord','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_pointsrecord')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_pointsrecord','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_pointsrecord')." ADD   `tid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_pointsrecord','pid')) {pdo_query("ALTER TABLE ".tablename('wx_school_pointsrecord')." ADD   `pid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_pointsrecord','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_pointsrecord')." ADD   `createtime` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_pointsrecord','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_pointsrecord')." ADD   `type` int(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_pointsrecord','mcount')) {pdo_query("ALTER TABLE ".tablename('wx_school_pointsrecord')." ADD   `mcount` int(3) NOT NULL COMMENT '任务已完成次数'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_print_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL DEFAULT '0',
  `schoolid` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `oid` int(10) unsigned NOT NULL DEFAULT '0',
  `foid` varchar(50) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT '1:打印成功,2:打印未成功',
  `printer_type` varchar(20) NOT NULL DEFAULT 'feie',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_print_log','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_print_log')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_print_log','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_print_log')." ADD   `weid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_print_log','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_print_log')." ADD   `schoolid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_print_log','pid')) {pdo_query("ALTER TABLE ".tablename('wx_school_print_log')." ADD   `pid` tinyint(3) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_print_log','oid')) {pdo_query("ALTER TABLE ".tablename('wx_school_print_log')." ADD   `oid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_print_log','foid')) {pdo_query("ALTER TABLE ".tablename('wx_school_print_log')." ADD   `foid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_print_log','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_print_log')." ADD   `status` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT '1:打印成功,2:打印未成功'");}
if(!pdo_fieldexists('wx_school_print_log','printer_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_print_log')." ADD   `printer_type` varchar(20) NOT NULL DEFAULT 'feie'");}
if(!pdo_fieldexists('wx_school_print_log','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_print_log')." ADD   `createtime` int(10) unsigned NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_printer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL DEFAULT '0',
  `schoolid` int(10) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'feie',
  `print_no` varchar(30) NOT NULL,
  `member_code` varchar(50) NOT NULL COMMENT '飞蛾打印机机器号',
  `key` varchar(30) NOT NULL,
  `api_key` varchar(100) NOT NULL COMMENT '易联云打印机api_key',
  `print_nums` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `qrcode_link` varchar(100) NOT NULL,
  `print_header` varchar(50) NOT NULL,
  `print_footer` varchar(50) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `delivery_type` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_printer','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_printer')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_printer','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_printer')." ADD   `weid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_printer','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_printer')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_printer','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_printer')." ADD   `name` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_printer','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_printer')." ADD   `type` varchar(20) NOT NULL DEFAULT 'feie'");}
if(!pdo_fieldexists('wx_school_printer','print_no')) {pdo_query("ALTER TABLE ".tablename('wx_school_printer')." ADD   `print_no` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_school_printer','member_code')) {pdo_query("ALTER TABLE ".tablename('wx_school_printer')." ADD   `member_code` varchar(50) NOT NULL COMMENT '飞蛾打印机机器号'");}
if(!pdo_fieldexists('wx_school_printer','key')) {pdo_query("ALTER TABLE ".tablename('wx_school_printer')." ADD   `key` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_school_printer','api_key')) {pdo_query("ALTER TABLE ".tablename('wx_school_printer')." ADD   `api_key` varchar(100) NOT NULL COMMENT '易联云打印机api_key'");}
if(!pdo_fieldexists('wx_school_printer','print_nums')) {pdo_query("ALTER TABLE ".tablename('wx_school_printer')." ADD   `print_nums` tinyint(3) unsigned NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_printer','qrcode_link')) {pdo_query("ALTER TABLE ".tablename('wx_school_printer')." ADD   `qrcode_link` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_printer','print_header')) {pdo_query("ALTER TABLE ".tablename('wx_school_printer')." ADD   `print_header` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_printer','print_footer')) {pdo_query("ALTER TABLE ".tablename('wx_school_printer')." ADD   `print_footer` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_printer','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_printer')." ADD   `status` tinyint(3) unsigned NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_printer','delivery_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_printer')." ADD   `delivery_type` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_printer','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_printer')." ADD   `createtime` int(10) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_printset` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL DEFAULT '0',
  `schoolid` int(10) unsigned NOT NULL,
  `ordertype` varchar(20) NOT NULL COMMENT '缴费类型',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `printarr` varchar(30) NOT NULL,
  `print_nums` int(10) NOT NULL DEFAULT '1',
  `print_header` varchar(50) NOT NULL,
  `print_footer` varchar(50) NOT NULL,
  `qrcode_link` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_printset','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_printset')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_printset','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_printset')." ADD   `weid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_printset','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_printset')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_printset','ordertype')) {pdo_query("ALTER TABLE ".tablename('wx_school_printset')." ADD   `ordertype` varchar(20) NOT NULL COMMENT '缴费类型'");}
if(!pdo_fieldexists('wx_school_printset','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_printset')." ADD   `status` tinyint(1) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_printset','printarr')) {pdo_query("ALTER TABLE ".tablename('wx_school_printset')." ADD   `printarr` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_school_printset','print_nums')) {pdo_query("ALTER TABLE ".tablename('wx_school_printset')." ADD   `print_nums` int(10) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_printset','print_header')) {pdo_query("ALTER TABLE ".tablename('wx_school_printset')." ADD   `print_header` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_printset','print_footer')) {pdo_query("ALTER TABLE ".tablename('wx_school_printset')." ADD   `print_footer` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_printset','qrcode_link')) {pdo_query("ALTER TABLE ".tablename('wx_school_printset')." ADD   `qrcode_link` varchar(1000) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_promote_fans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL COMMENT '公众号ID',
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `kcid` int(10) unsigned NOT NULL COMMENT '归属课程ID',
  `openid` varchar(500) DEFAULT NULL COMMENT '此粉丝openid',
  `userid` int(10) unsigned NOT NULL COMMENT '用户userid',
  `superior_tid` varchar(500) DEFAULT NULL COMMENT '归属推广tid',
  `superior_uid` varchar(500) DEFAULT NULL COMMENT '归属粉丝openid',
  `superior_userid` int(10) unsigned NOT NULL COMMENT '归属推广userid',
  `opt_tid` int(10) unsigned NOT NULL COMMENT '分配操作人',
  `is_sale` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否消费',
  `com_form` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1推广海报2团购海报3助力海报4前端分配',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_promote_fans','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_fans')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_promote_fans','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_fans')." ADD   `weid` int(10) unsigned NOT NULL COMMENT '公众号ID'");}
if(!pdo_fieldexists('wx_school_promote_fans','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_fans')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_promote_fans','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_fans')." ADD   `kcid` int(10) unsigned NOT NULL COMMENT '归属课程ID'");}
if(!pdo_fieldexists('wx_school_promote_fans','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_fans')." ADD   `openid` varchar(500) DEFAULT NULL COMMENT '此粉丝openid'");}
if(!pdo_fieldexists('wx_school_promote_fans','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_fans')." ADD   `userid` int(10) unsigned NOT NULL COMMENT '用户userid'");}
if(!pdo_fieldexists('wx_school_promote_fans','superior_tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_fans')." ADD   `superior_tid` varchar(500) DEFAULT NULL COMMENT '归属推广tid'");}
if(!pdo_fieldexists('wx_school_promote_fans','superior_uid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_fans')." ADD   `superior_uid` varchar(500) DEFAULT NULL COMMENT '归属粉丝openid'");}
if(!pdo_fieldexists('wx_school_promote_fans','superior_userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_fans')." ADD   `superior_userid` int(10) unsigned NOT NULL COMMENT '归属推广userid'");}
if(!pdo_fieldexists('wx_school_promote_fans','opt_tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_fans')." ADD   `opt_tid` int(10) unsigned NOT NULL COMMENT '分配操作人'");}
if(!pdo_fieldexists('wx_school_promote_fans','is_sale')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_fans')." ADD   `is_sale` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否消费'");}
if(!pdo_fieldexists('wx_school_promote_fans','com_form')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_fans')." ADD   `com_form` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1推广海报2团购海报3助力海报4前端分配'");}
if(!pdo_fieldexists('wx_school_promote_fans','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_fans')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_promote_pop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL COMMENT '公众号ID',
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `kcid` int(10) unsigned NOT NULL COMMENT '归属课程ID',
  `teamid` int(10) unsigned NOT NULL COMMENT '队伍ID',
  `openid` varchar(500) DEFAULT NULL COMMENT '此粉丝openid',
  `userid` int(10) unsigned NOT NULL COMMENT '用户userid',
  `tid` varchar(500) DEFAULT NULL COMMENT '归属推广tid',
  `pop_url` varchar(1000) DEFAULT NULL COMMENT '海报路径',
  `type` tinyint(1) unsigned NOT NULL COMMENT '1营销海报2推广海报',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_promote_pop','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_pop')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_promote_pop','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_pop')." ADD   `weid` int(10) unsigned NOT NULL COMMENT '公众号ID'");}
if(!pdo_fieldexists('wx_school_promote_pop','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_pop')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_promote_pop','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_pop')." ADD   `kcid` int(10) unsigned NOT NULL COMMENT '归属课程ID'");}
if(!pdo_fieldexists('wx_school_promote_pop','teamid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_pop')." ADD   `teamid` int(10) unsigned NOT NULL COMMENT '队伍ID'");}
if(!pdo_fieldexists('wx_school_promote_pop','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_pop')." ADD   `openid` varchar(500) DEFAULT NULL COMMENT '此粉丝openid'");}
if(!pdo_fieldexists('wx_school_promote_pop','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_pop')." ADD   `userid` int(10) unsigned NOT NULL COMMENT '用户userid'");}
if(!pdo_fieldexists('wx_school_promote_pop','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_pop')." ADD   `tid` varchar(500) DEFAULT NULL COMMENT '归属推广tid'");}
if(!pdo_fieldexists('wx_school_promote_pop','pop_url')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_pop')." ADD   `pop_url` varchar(1000) DEFAULT NULL COMMENT '海报路径'");}
if(!pdo_fieldexists('wx_school_promote_pop','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_pop')." ADD   `type` tinyint(1) unsigned NOT NULL COMMENT '1营销海报2推广海报'");}
if(!pdo_fieldexists('wx_school_promote_pop','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_pop')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_promote_team` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL COMMENT '公众号ID',
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `kcid` int(10) unsigned NOT NULL COMMENT '归属课程ID',
  `tid` int(10) unsigned NOT NULL COMMENT '推广员TID',
  `sid` int(10) unsigned NOT NULL COMMENT '正式学生ID',
  `openid` varchar(500) DEFAULT NULL COMMENT '此粉丝openid',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_promote_team','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_team')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_promote_team','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_team')." ADD   `weid` int(10) unsigned NOT NULL COMMENT '公众号ID'");}
if(!pdo_fieldexists('wx_school_promote_team','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_team')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_promote_team','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_team')." ADD   `kcid` int(10) unsigned NOT NULL COMMENT '归属课程ID'");}
if(!pdo_fieldexists('wx_school_promote_team','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_team')." ADD   `tid` int(10) unsigned NOT NULL COMMENT '推广员TID'");}
if(!pdo_fieldexists('wx_school_promote_team','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_team')." ADD   `sid` int(10) unsigned NOT NULL COMMENT '正式学生ID'");}
if(!pdo_fieldexists('wx_school_promote_team','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_team')." ADD   `openid` varchar(500) DEFAULT NULL COMMENT '此粉丝openid'");}
if(!pdo_fieldexists('wx_school_promote_team','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_promote_team')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_qrcode_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL DEFAULT '0',
  `qrcid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '二维码场景ID',
  `gpid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '场景名称',
  `keyword` varchar(100) NOT NULL COMMENT '关联关键字',
  `model` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '模式，1临时，2为永久',
  `ticket` varchar(250) NOT NULL DEFAULT '' COMMENT '标识',
  `show_url` varchar(550) NOT NULL DEFAULT '' COMMENT '图片地址',
  `expire` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间',
  `subnum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关注扫描次数',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '生成时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0为未启用，1为启用',
  `group_id` int(3) unsigned NOT NULL DEFAULT '0',
  `rid` int(3) unsigned NOT NULL DEFAULT '0',
  `schoolid` int(10) unsigned DEFAULT NULL COMMENT '学校ID',
  `qr_url` varchar(300) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_qrcid` (`qrcid`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_qrcode_info','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_qrcode_info','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `weid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_qrcode_info','qrcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `qrcid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '二维码场景ID'");}
if(!pdo_fieldexists('wx_school_qrcode_info','gpid')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `gpid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_qrcode_info','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `name` varchar(50) NOT NULL DEFAULT '' COMMENT '场景名称'");}
if(!pdo_fieldexists('wx_school_qrcode_info','keyword')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `keyword` varchar(100) NOT NULL COMMENT '关联关键字'");}
if(!pdo_fieldexists('wx_school_qrcode_info','model')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `model` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '模式，1临时，2为永久'");}
if(!pdo_fieldexists('wx_school_qrcode_info','ticket')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `ticket` varchar(250) NOT NULL DEFAULT '' COMMENT '标识'");}
if(!pdo_fieldexists('wx_school_qrcode_info','show_url')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `show_url` varchar(550) NOT NULL DEFAULT '' COMMENT '图片地址'");}
if(!pdo_fieldexists('wx_school_qrcode_info','expire')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `expire` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间'");}
if(!pdo_fieldexists('wx_school_qrcode_info','subnum')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `subnum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关注扫描次数'");}
if(!pdo_fieldexists('wx_school_qrcode_info','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '生成时间'");}
if(!pdo_fieldexists('wx_school_qrcode_info','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0为未启用，1为启用'");}
if(!pdo_fieldexists('wx_school_qrcode_info','group_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `group_id` int(3) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_qrcode_info','rid')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `rid` int(3) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_qrcode_info','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `schoolid` int(10) unsigned DEFAULT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_qrcode_info','qr_url')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `qr_url` varchar(300) NOT NULL");}
if(!pdo_fieldexists('wx_school_qrcode_info','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   `type` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_qrcode_info','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_info')." ADD   PRIMARY KEY (`id`)");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_qrcode_set` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bg` int(10) unsigned NOT NULL DEFAULT '0',
  `qrleft` int(10) unsigned NOT NULL DEFAULT '0',
  `qrtop` int(10) unsigned NOT NULL DEFAULT '0',
  `qrwidth` int(10) unsigned NOT NULL DEFAULT '0',
  `qrheight` int(10) unsigned NOT NULL DEFAULT '0',
  `model` int(10) unsigned NOT NULL DEFAULT '1',
  `logoheight` int(10) unsigned NOT NULL DEFAULT '0',
  `logowidth` int(10) unsigned NOT NULL DEFAULT '0',
  `logoqrheight` int(10) unsigned NOT NULL DEFAULT '0',
  `logoqrwidth` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_qrcode_set','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_set')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_qrcode_set','bg')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_set')." ADD   `bg` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_qrcode_set','qrleft')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_set')." ADD   `qrleft` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_qrcode_set','qrtop')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_set')." ADD   `qrtop` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_qrcode_set','qrwidth')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_set')." ADD   `qrwidth` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_qrcode_set','qrheight')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_set')." ADD   `qrheight` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_qrcode_set','model')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_set')." ADD   `model` int(10) unsigned NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_qrcode_set','logoheight')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_set')." ADD   `logoheight` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_qrcode_set','logowidth')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_set')." ADD   `logowidth` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_qrcode_set','logoqrheight')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_set')." ADD   `logoqrheight` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_qrcode_set','logoqrwidth')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_set')." ADD   `logoqrwidth` int(10) unsigned NOT NULL DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_qrcode_statinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL DEFAULT '0',
  `qid` int(10) unsigned NOT NULL,
  `openid` varchar(150) NOT NULL DEFAULT '' COMMENT '用户的唯一身份ID',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否发生在订阅时',
  `qrcid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '二维码场景ID',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '场景名称',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '生成时间',
  `group_id` int(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_qrcode_statinfo','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_statinfo')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_qrcode_statinfo','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_statinfo')." ADD   `weid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_qrcode_statinfo','qid')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_statinfo')." ADD   `qid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_qrcode_statinfo','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_statinfo')." ADD   `openid` varchar(150) NOT NULL DEFAULT '' COMMENT '用户的唯一身份ID'");}
if(!pdo_fieldexists('wx_school_qrcode_statinfo','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_statinfo')." ADD   `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否发生在订阅时'");}
if(!pdo_fieldexists('wx_school_qrcode_statinfo','qrcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_statinfo')." ADD   `qrcid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '二维码场景ID'");}
if(!pdo_fieldexists('wx_school_qrcode_statinfo','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_statinfo')." ADD   `name` varchar(50) NOT NULL DEFAULT '' COMMENT '场景名称'");}
if(!pdo_fieldexists('wx_school_qrcode_statinfo','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_statinfo')." ADD   `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '生成时间'");}
if(!pdo_fieldexists('wx_school_qrcode_statinfo','group_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_qrcode_statinfo')." ADD   `group_id` int(3) unsigned NOT NULL DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_questions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `weid` int(10) NOT NULL,
  `schoolid` int(10) NOT NULL,
  `zyid` int(10) NOT NULL COMMENT '作业id',
  `tid` int(10) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1单选2多选3提问4图片5语音6视频',
  `title` varchar(1000) NOT NULL,
  `qorder` int(10) NOT NULL COMMENT '排序',
  `content` varchar(1000) NOT NULL,
  `AnsType` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_questions','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_questions')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_questions','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_questions')." ADD   `weid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_questions','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_questions')." ADD   `schoolid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_questions','zyid')) {pdo_query("ALTER TABLE ".tablename('wx_school_questions')." ADD   `zyid` int(10) NOT NULL COMMENT '作业id'");}
if(!pdo_fieldexists('wx_school_questions','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_questions')." ADD   `tid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_questions','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_questions')." ADD   `type` tinyint(1) NOT NULL COMMENT '1单选2多选3提问4图片5语音6视频'");}
if(!pdo_fieldexists('wx_school_questions','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_questions')." ADD   `title` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_questions','qorder')) {pdo_query("ALTER TABLE ".tablename('wx_school_questions')." ADD   `qorder` int(10) NOT NULL COMMENT '排序'");}
if(!pdo_fieldexists('wx_school_questions','content')) {pdo_query("ALTER TABLE ".tablename('wx_school_questions')." ADD   `content` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_questions','AnsType')) {pdo_query("ALTER TABLE ".tablename('wx_school_questions')." ADD   `AnsType` varchar(200) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_qzkh` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `schoolid` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `shareid` int(11) NOT NULL COMMENT '分享者',
  `openid` varchar(64) NOT NULL COMMENT '用户ID',
  `sname` varchar(32) NOT NULL COMMENT '学生姓名',
  `name` varchar(32) NOT NULL COMMENT '家长姓名',
  `mobile` char(11) NOT NULL COMMENT '联系电话',
  `birthday` varchar(10) NOT NULL COMMENT '出生日期',
  `sex` tinyint(4) NOT NULL COMMENT '孩子性别',
  `pard` int(11) NOT NULL COMMENT '关系',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1未分配2已分配',
  `createtime` char(10) NOT NULL,
  `hobby` text NOT NULL COMMENT '爱好',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_qzkh','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_qzkh')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_qzkh','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_qzkh')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_qzkh','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_qzkh')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_qzkh','shareid')) {pdo_query("ALTER TABLE ".tablename('wx_school_qzkh')." ADD   `shareid` int(11) NOT NULL COMMENT '分享者'");}
if(!pdo_fieldexists('wx_school_qzkh','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_qzkh')." ADD   `openid` varchar(64) NOT NULL COMMENT '用户ID'");}
if(!pdo_fieldexists('wx_school_qzkh','sname')) {pdo_query("ALTER TABLE ".tablename('wx_school_qzkh')." ADD   `sname` varchar(32) NOT NULL COMMENT '学生姓名'");}
if(!pdo_fieldexists('wx_school_qzkh','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_qzkh')." ADD   `name` varchar(32) NOT NULL COMMENT '家长姓名'");}
if(!pdo_fieldexists('wx_school_qzkh','mobile')) {pdo_query("ALTER TABLE ".tablename('wx_school_qzkh')." ADD   `mobile` char(11) NOT NULL COMMENT '联系电话'");}
if(!pdo_fieldexists('wx_school_qzkh','birthday')) {pdo_query("ALTER TABLE ".tablename('wx_school_qzkh')." ADD   `birthday` varchar(10) NOT NULL COMMENT '出生日期'");}
if(!pdo_fieldexists('wx_school_qzkh','sex')) {pdo_query("ALTER TABLE ".tablename('wx_school_qzkh')." ADD   `sex` tinyint(4) NOT NULL COMMENT '孩子性别'");}
if(!pdo_fieldexists('wx_school_qzkh','pard')) {pdo_query("ALTER TABLE ".tablename('wx_school_qzkh')." ADD   `pard` int(11) NOT NULL COMMENT '关系'");}
if(!pdo_fieldexists('wx_school_qzkh','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_qzkh')." ADD   `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1未分配2已分配'");}
if(!pdo_fieldexists('wx_school_qzkh','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_qzkh')." ADD   `createtime` char(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_qzkh','hobby')) {pdo_query("ALTER TABLE ".tablename('wx_school_qzkh')." ADD   `hobby` text NOT NULL COMMENT '爱好'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `noticeid` int(10) unsigned NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `sid` int(10) unsigned NOT NULL,
  `openid` varchar(30) NOT NULL COMMENT 'openid',
  `type` int(1) unsigned NOT NULL COMMENT '类型1通知2作业',
  `createtime` int(10) unsigned NOT NULL,
  `readtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_record','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_record')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_record','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_record')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_record','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_record')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_record','noticeid')) {pdo_query("ALTER TABLE ".tablename('wx_school_record')." ADD   `noticeid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_record','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_record')." ADD   `userid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_record','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_record')." ADD   `tid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_record','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_record')." ADD   `sid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_record','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_record')." ADD   `openid` varchar(30) NOT NULL COMMENT 'openid'");}
if(!pdo_fieldexists('wx_school_record','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_record')." ADD   `type` int(1) unsigned NOT NULL COMMENT '类型1通知2作业'");}
if(!pdo_fieldexists('wx_school_record','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_record')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_record','readtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_record')." ADD   `readtime` int(10) unsigned NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL DEFAULT '0',
  `schoolid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_reply','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_reply')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_reply','rid')) {pdo_query("ALTER TABLE ".tablename('wx_school_reply')." ADD   `rid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_reply','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_reply')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_reply','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_reply')." ADD   PRIMARY KEY (`id`)");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_roomcheck` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `schoolid` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `type` tinyint(3) NOT NULL COMMENT '1中午2晚上',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_roomcheck','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_roomcheck')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_roomcheck','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_roomcheck')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_roomcheck','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_roomcheck')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_roomcheck','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_roomcheck')." ADD   `sid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_roomcheck','roomid')) {pdo_query("ALTER TABLE ".tablename('wx_school_roomcheck')." ADD   `roomid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_roomcheck','date')) {pdo_query("ALTER TABLE ".tablename('wx_school_roomcheck')." ADD   `date` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_roomcheck','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_roomcheck')." ADD   `type` tinyint(3) NOT NULL COMMENT '1中午2晚上'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_sale_team` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL COMMENT '公众号ID',
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `kcid` int(10) unsigned NOT NULL COMMENT '归属课程ID',
  `userid` int(10) unsigned NOT NULL COMMENT '参团的学生归属用户ID',
  `openid` varchar(500) DEFAULT NULL COMMENT '此粉丝openid',
  `ismaster` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '队长团长',
  `masterid` int(10) unsigned NOT NULL COMMENT '归属团或组',
  `is_sale` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否消费',
  `is_success` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否成功',
  `is_really` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0真实1虚拟',
  `pkuser` varchar(500) DEFAULT NULL COMMENT '虚拟团组添加人',
  `orderid` int(10) unsigned NOT NULL COMMENT '订单ID',
  `tuifei` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '退费申请',
  `tfuser` varchar(500) DEFAULT NULL COMMENT '推翻操作人',
  `type` tinyint(1) unsigned NOT NULL COMMENT '1团购2助力',
  `endtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_sale_team','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_sale_team','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `weid` int(10) unsigned NOT NULL COMMENT '公众号ID'");}
if(!pdo_fieldexists('wx_school_sale_team','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_sale_team','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `kcid` int(10) unsigned NOT NULL COMMENT '归属课程ID'");}
if(!pdo_fieldexists('wx_school_sale_team','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `userid` int(10) unsigned NOT NULL COMMENT '参团的学生归属用户ID'");}
if(!pdo_fieldexists('wx_school_sale_team','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `openid` varchar(500) DEFAULT NULL COMMENT '此粉丝openid'");}
if(!pdo_fieldexists('wx_school_sale_team','ismaster')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `ismaster` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '队长团长'");}
if(!pdo_fieldexists('wx_school_sale_team','masterid')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `masterid` int(10) unsigned NOT NULL COMMENT '归属团或组'");}
if(!pdo_fieldexists('wx_school_sale_team','is_sale')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `is_sale` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否消费'");}
if(!pdo_fieldexists('wx_school_sale_team','is_success')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `is_success` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否成功'");}
if(!pdo_fieldexists('wx_school_sale_team','is_really')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `is_really` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0真实1虚拟'");}
if(!pdo_fieldexists('wx_school_sale_team','pkuser')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `pkuser` varchar(500) DEFAULT NULL COMMENT '虚拟团组添加人'");}
if(!pdo_fieldexists('wx_school_sale_team','orderid')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `orderid` int(10) unsigned NOT NULL COMMENT '订单ID'");}
if(!pdo_fieldexists('wx_school_sale_team','tuifei')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `tuifei` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '退费申请'");}
if(!pdo_fieldexists('wx_school_sale_team','tfuser')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `tfuser` varchar(500) DEFAULT NULL COMMENT '推翻操作人'");}
if(!pdo_fieldexists('wx_school_sale_team','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `type` tinyint(1) unsigned NOT NULL COMMENT '1团购2助力'");}
if(!pdo_fieldexists('wx_school_sale_team','endtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `endtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
if(!pdo_fieldexists('wx_school_sale_team','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_sale_team')." ADD   `createtime` int(10) unsigned NOT NULL COMMENT '创建时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_scforxs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `scid` int(10) unsigned NOT NULL,
  `setid` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `sid` int(10) unsigned NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `iconsetid` int(10) unsigned NOT NULL COMMENT '评价id',
  `iconlevel` int(10) unsigned NOT NULL COMMENT '本评价等级',
  `tword` varchar(1000) DEFAULT '' COMMENT '老师评语',
  `jzword` varchar(1000) DEFAULT '' COMMENT '家长评语',
  `dianzan` varchar(1000) DEFAULT '' COMMENT '点赞数',
  `dianzopenid` varchar(500) DEFAULT '' COMMENT '点赞人openid',
  `fromto` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1来自老师2来自家长',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1文字2表现评价3点赞',
  `createtime` int(10) unsigned NOT NULL,
  `ssort` int(10) unsigned NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_scforxs','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_scforxs','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_scforxs','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_scforxs','scid')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `scid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_scforxs','setid')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `setid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_scforxs','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `tid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_scforxs','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `sid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_scforxs','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `userid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_scforxs','iconsetid')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `iconsetid` int(10) unsigned NOT NULL COMMENT '评价id'");}
if(!pdo_fieldexists('wx_school_scforxs','iconlevel')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `iconlevel` int(10) unsigned NOT NULL COMMENT '本评价等级'");}
if(!pdo_fieldexists('wx_school_scforxs','tword')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `tword` varchar(1000) DEFAULT '' COMMENT '老师评语'");}
if(!pdo_fieldexists('wx_school_scforxs','jzword')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `jzword` varchar(1000) DEFAULT '' COMMENT '家长评语'");}
if(!pdo_fieldexists('wx_school_scforxs','dianzan')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `dianzan` varchar(1000) DEFAULT '' COMMENT '点赞数'");}
if(!pdo_fieldexists('wx_school_scforxs','dianzopenid')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `dianzopenid` varchar(500) DEFAULT '' COMMENT '点赞人openid'");}
if(!pdo_fieldexists('wx_school_scforxs','fromto')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `fromto` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1来自老师2来自家长'");}
if(!pdo_fieldexists('wx_school_scforxs','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1文字2表现评价3点赞'");}
if(!pdo_fieldexists('wx_school_scforxs','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_scforxs','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_scforxs')." ADD   `ssort` int(10) unsigned NOT NULL COMMENT '排序'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_schoolset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alivodappid` varchar(100) NOT NULL,
  `alivodkey` varchar(100) NOT NULL,
  `alivodcate` int(10) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `is_bigdata` tinyint(3) NOT NULL,
  `pwd` varchar(64) NOT NULL,
  `short_url` varchar(32) NOT NULL,
  `bgtitle` varchar(100) NOT NULL,
  `refund` tinyint(1) NOT NULL DEFAULT '0',
  `zyvideolimit` tinyint(3) NOT NULL COMMENT '单位M',
  `remindday` int(11) NOT NULL COMMENT '报名过期提前提醒天数',
  `wt_appid` varchar(200) NOT NULL COMMENT '沃土appid',
  `wt_appkey` varchar(200) NOT NULL COMMENT '沃土appkey',
  `wt_appsecret` varchar(200) NOT NULL COMMENT '沃土appsecret',
  `wt_token` varchar(200) NOT NULL COMMENT '沃土token',
  `wt_token_time` int(10) NOT NULL COMMENT '沃土token获取时间',
  `wt_version` varchar(10) NOT NULL COMMENT '沃土版本号',
  `is_wtcheck` tinyint(3) NOT NULL COMMENT '1启用0不启用 沃土设备',
  `xk_type` tinyint(3) NOT NULL COMMENT '消课类型',
  `is_show_pm` tinyint(3) NOT NULL COMMENT '是否显示成绩排名0否1是',
  `ah_appid` varchar(200) NOT NULL,
  `ah_secret` varchar(200) NOT NULL,
  `uid` text,
  `stutemplate` varchar(10) DEFAULT NULL,
  `teatemplate` varchar(10) DEFAULT NULL,
  `is_gw` tinyint(3) NOT NULL COMMENT '0关闭1启用',
  `is_csyd` tinyint(3) NOT NULL COMMENT '场室预定，0关闭1启用',
  `gwtidarr` text NOT NULL COMMENT '公物管理tidarr',
  `csydtidarr` text NOT NULL COMMENT '场室预定管理tidarr',
  `no_ks_num` int(11) NOT NULL COMMENT '课时不足',
  `no_kcsign_num` int(11) NOT NULL COMMENT '课程签到值',
  `shareinfo` text NOT NULL COMMENT '分享配置信息',
  `teatopiconarr` text NOT NULL COMMENT '普通老师顶部三按钮',
  `mastertopiconarr` text NOT NULL COMMENT '校长顶部四按钮',
  `is_teatotea` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1开启2关闭',
  `is_stutostu` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1开启2关闭',
  `is_teatostu` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1开启2关闭',
  `is_unbind` tinyint(1) NOT NULL DEFAULT '0',
  `msgsendtype` tinyint(3) NOT NULL COMMENT '短信发送方式 0 默认 1统一平台',
  `typt_admin_tid` int(11) NOT NULL COMMENT '默认管理员tid',
  `doctorid` int(10) NOT NULL COMMENT '喂药管理医生tid',
  `is_bingyin` tinyint(3) NOT NULL COMMENT '是否启用详细病因',
  `bingyincontent` text NOT NULL COMMENT '详细病因设置',
  `is_sure_kq` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_schoolset','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_schoolset','alivodappid')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `alivodappid` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_schoolset','alivodkey')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `alivodkey` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_schoolset','alivodcate')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `alivodcate` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_schoolset','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_schoolset','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_schoolset','is_bigdata')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `is_bigdata` tinyint(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_schoolset','pwd')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `pwd` varchar(64) NOT NULL");}
if(!pdo_fieldexists('wx_school_schoolset','short_url')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `short_url` varchar(32) NOT NULL");}
if(!pdo_fieldexists('wx_school_schoolset','bgtitle')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `bgtitle` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_schoolset','refund')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `refund` tinyint(1) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_schoolset','zyvideolimit')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `zyvideolimit` tinyint(3) NOT NULL COMMENT '单位M'");}
if(!pdo_fieldexists('wx_school_schoolset','remindday')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `remindday` int(11) NOT NULL COMMENT '报名过期提前提醒天数'");}
if(!pdo_fieldexists('wx_school_schoolset','wt_appid')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `wt_appid` varchar(200) NOT NULL COMMENT '沃土appid'");}
if(!pdo_fieldexists('wx_school_schoolset','wt_appkey')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `wt_appkey` varchar(200) NOT NULL COMMENT '沃土appkey'");}
if(!pdo_fieldexists('wx_school_schoolset','wt_appsecret')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `wt_appsecret` varchar(200) NOT NULL COMMENT '沃土appsecret'");}
if(!pdo_fieldexists('wx_school_schoolset','wt_token')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `wt_token` varchar(200) NOT NULL COMMENT '沃土token'");}
if(!pdo_fieldexists('wx_school_schoolset','wt_token_time')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `wt_token_time` int(10) NOT NULL COMMENT '沃土token获取时间'");}
if(!pdo_fieldexists('wx_school_schoolset','wt_version')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `wt_version` varchar(10) NOT NULL COMMENT '沃土版本号'");}
if(!pdo_fieldexists('wx_school_schoolset','is_wtcheck')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `is_wtcheck` tinyint(3) NOT NULL COMMENT '1启用0不启用 沃土设备'");}
if(!pdo_fieldexists('wx_school_schoolset','xk_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `xk_type` tinyint(3) NOT NULL COMMENT '消课类型'");}
if(!pdo_fieldexists('wx_school_schoolset','is_show_pm')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `is_show_pm` tinyint(3) NOT NULL COMMENT '是否显示成绩排名0否1是'");}
if(!pdo_fieldexists('wx_school_schoolset','ah_appid')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `ah_appid` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_school_schoolset','ah_secret')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `ah_secret` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_school_schoolset','uid')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `uid` text");}
if(!pdo_fieldexists('wx_school_schoolset','stutemplate')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `stutemplate` varchar(10) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_schoolset','teatemplate')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `teatemplate` varchar(10) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_schoolset','is_gw')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `is_gw` tinyint(3) NOT NULL COMMENT '0关闭1启用'");}
if(!pdo_fieldexists('wx_school_schoolset','is_csyd')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `is_csyd` tinyint(3) NOT NULL COMMENT '场室预定，0关闭1启用'");}
if(!pdo_fieldexists('wx_school_schoolset','gwtidarr')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `gwtidarr` text NOT NULL COMMENT '公物管理tidarr'");}
if(!pdo_fieldexists('wx_school_schoolset','csydtidarr')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `csydtidarr` text NOT NULL COMMENT '场室预定管理tidarr'");}
if(!pdo_fieldexists('wx_school_schoolset','no_ks_num')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `no_ks_num` int(11) NOT NULL COMMENT '课时不足'");}
if(!pdo_fieldexists('wx_school_schoolset','no_kcsign_num')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `no_kcsign_num` int(11) NOT NULL COMMENT '课程签到值'");}
if(!pdo_fieldexists('wx_school_schoolset','shareinfo')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `shareinfo` text NOT NULL COMMENT '分享配置信息'");}
if(!pdo_fieldexists('wx_school_schoolset','teatopiconarr')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `teatopiconarr` text NOT NULL COMMENT '普通老师顶部三按钮'");}
if(!pdo_fieldexists('wx_school_schoolset','mastertopiconarr')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `mastertopiconarr` text NOT NULL COMMENT '校长顶部四按钮'");}
if(!pdo_fieldexists('wx_school_schoolset','is_teatotea')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `is_teatotea` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1开启2关闭'");}
if(!pdo_fieldexists('wx_school_schoolset','is_stutostu')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `is_stutostu` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1开启2关闭'");}
if(!pdo_fieldexists('wx_school_schoolset','is_teatostu')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `is_teatostu` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1开启2关闭'");}
if(!pdo_fieldexists('wx_school_schoolset','is_unbind')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `is_unbind` tinyint(1) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_schoolset','msgsendtype')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `msgsendtype` tinyint(3) NOT NULL COMMENT '短信发送方式 0 默认 1统一平台'");}
if(!pdo_fieldexists('wx_school_schoolset','typt_admin_tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `typt_admin_tid` int(11) NOT NULL COMMENT '默认管理员tid'");}
if(!pdo_fieldexists('wx_school_schoolset','doctorid')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `doctorid` int(10) NOT NULL COMMENT '喂药管理医生tid'");}
if(!pdo_fieldexists('wx_school_schoolset','is_bingyin')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `is_bingyin` tinyint(3) NOT NULL COMMENT '是否启用详细病因'");}
if(!pdo_fieldexists('wx_school_schoolset','bingyincontent')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `bingyincontent` text NOT NULL COMMENT '详细病因设置'");}
if(!pdo_fieldexists('wx_school_schoolset','is_sure_kq')) {pdo_query("ALTER TABLE ".tablename('wx_school_schoolset')." ADD   `is_sure_kq` tinyint(1) NOT NULL DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id',
  `xq_id` int(11) NOT NULL,
  `bj_id` int(11) NOT NULL,
  `qh_id` int(11) NOT NULL,
  `km_id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `my_score` varchar(50) NOT NULL,
  `info` varchar(1000) NOT NULL DEFAULT '' COMMENT '教师评价',
  `createtime` int(10) unsigned NOT NULL,
  `is_absent` tinyint(3) DEFAULT NULL COMMENT '1缺考0未缺考',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=675 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_score','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_score')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_score','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_score')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_score','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_score')." ADD   `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id'");}
if(!pdo_fieldexists('wx_school_score','xq_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_score')." ADD   `xq_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_score','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_score')." ADD   `bj_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_score','qh_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_score')." ADD   `qh_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_score','km_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_score')." ADD   `km_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_score','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_score')." ADD   `sid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_score','my_score')) {pdo_query("ALTER TABLE ".tablename('wx_school_score')." ADD   `my_score` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_score','info')) {pdo_query("ALTER TABLE ".tablename('wx_school_score')." ADD   `info` varchar(1000) NOT NULL DEFAULT '' COMMENT '教师评价'");}
if(!pdo_fieldexists('wx_school_score','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_score')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_score','is_absent')) {pdo_query("ALTER TABLE ".tablename('wx_school_score')." ADD   `is_absent` tinyint(3) DEFAULT NULL COMMENT '1缺考0未缺考'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_set` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `istplnotice` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否模版通知',
  `guanli` tinyint(1) NOT NULL DEFAULT '0' COMMENT '管理方式',
  `xsqingjia` varchar(200) DEFAULT '' COMMENT '学生请假申请ID',
  `xsqjsh` varchar(200) DEFAULT '' COMMENT '学生请假审核通知ID',
  `jsqingjia` varchar(200) DEFAULT '' COMMENT '教员请假申请体提醒ID',
  `jsqjsh` varchar(200) DEFAULT '' COMMENT '教员请假审核通知ID',
  `xxtongzhi` varchar(200) DEFAULT '' COMMENT '学校通知ID',
  `liuyan` varchar(200) DEFAULT '' COMMENT '家长留言ID',
  `liuyanhf` varchar(200) DEFAULT '' COMMENT '教师回复家长留言ID',
  `zuoye` varchar(200) DEFAULT '' COMMENT '发布作业提醒ID',
  `bjtz` varchar(200) DEFAULT '' COMMENT '班级通知ID',
  `bjqshjg` varchar(200) DEFAULT '' COMMENT '班级圈审核结果',
  `bjqshtz` varchar(200) DEFAULT '' COMMENT '班级圈审核提醒',
  `jxlxtx` varchar(200) DEFAULT '' COMMENT '进校提醒',
  `jfjgtz` varchar(200) DEFAULT '' COMMENT '缴费结果通知',
  `bd_set` varchar(1000) DEFAULT '',
  `sms_acss` varchar(1000) DEFAULT '',
  `sms_use_times` int(10) NOT NULL COMMENT '短信调用次数',
  `baidumapapi` varchar(200) DEFAULT '',
  `htname` varchar(200) DEFAULT '' COMMENT '后台系统名称',
  `bgcolor` varchar(20) DEFAULT '' COMMENT '后台系统背景颜色',
  `bgimg` varchar(200) DEFAULT '',
  `banner1` varchar(200) DEFAULT '',
  `banner2` varchar(200) DEFAULT '',
  `banner3` varchar(200) DEFAULT '',
  `banner4` varchar(200) DEFAULT '',
  `sykstx` varchar(300) NOT NULL,
  `kcyytx` varchar(300) NOT NULL,
  `kcqdtx` varchar(300) NOT NULL,
  `sktxls` varchar(300) NOT NULL,
  `newcenteriocn` varchar(1000) NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '1' COMMENT '新旧风格',
  `banquan` varchar(200) NOT NULL COMMENT '版权',
  `sensitive_word` mediumtext NOT NULL COMMENT '敏感词库',
  `school_max` int(10) NOT NULL DEFAULT '0',
  `fkyytx` varchar(300) DEFAULT NULL COMMENT '访客消息推送模板ID',
  `pttz` varchar(200) DEFAULT NULL COMMENT '拼团通知',
  `zltz` varchar(200) DEFAULT NULL COMMENT '助力通知',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_set','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_set','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_set','istplnotice')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `istplnotice` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否模版通知'");}
if(!pdo_fieldexists('wx_school_set','guanli')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `guanli` tinyint(1) NOT NULL DEFAULT '0' COMMENT '管理方式'");}
if(!pdo_fieldexists('wx_school_set','xsqingjia')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `xsqingjia` varchar(200) DEFAULT '' COMMENT '学生请假申请ID'");}
if(!pdo_fieldexists('wx_school_set','xsqjsh')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `xsqjsh` varchar(200) DEFAULT '' COMMENT '学生请假审核通知ID'");}
if(!pdo_fieldexists('wx_school_set','jsqingjia')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `jsqingjia` varchar(200) DEFAULT '' COMMENT '教员请假申请体提醒ID'");}
if(!pdo_fieldexists('wx_school_set','jsqjsh')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `jsqjsh` varchar(200) DEFAULT '' COMMENT '教员请假审核通知ID'");}
if(!pdo_fieldexists('wx_school_set','xxtongzhi')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `xxtongzhi` varchar(200) DEFAULT '' COMMENT '学校通知ID'");}
if(!pdo_fieldexists('wx_school_set','liuyan')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `liuyan` varchar(200) DEFAULT '' COMMENT '家长留言ID'");}
if(!pdo_fieldexists('wx_school_set','liuyanhf')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `liuyanhf` varchar(200) DEFAULT '' COMMENT '教师回复家长留言ID'");}
if(!pdo_fieldexists('wx_school_set','zuoye')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `zuoye` varchar(200) DEFAULT '' COMMENT '发布作业提醒ID'");}
if(!pdo_fieldexists('wx_school_set','bjtz')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `bjtz` varchar(200) DEFAULT '' COMMENT '班级通知ID'");}
if(!pdo_fieldexists('wx_school_set','bjqshjg')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `bjqshjg` varchar(200) DEFAULT '' COMMENT '班级圈审核结果'");}
if(!pdo_fieldexists('wx_school_set','bjqshtz')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `bjqshtz` varchar(200) DEFAULT '' COMMENT '班级圈审核提醒'");}
if(!pdo_fieldexists('wx_school_set','jxlxtx')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `jxlxtx` varchar(200) DEFAULT '' COMMENT '进校提醒'");}
if(!pdo_fieldexists('wx_school_set','jfjgtz')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `jfjgtz` varchar(200) DEFAULT '' COMMENT '缴费结果通知'");}
if(!pdo_fieldexists('wx_school_set','bd_set')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `bd_set` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_set','sms_acss')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `sms_acss` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_set','sms_use_times')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `sms_use_times` int(10) NOT NULL COMMENT '短信调用次数'");}
if(!pdo_fieldexists('wx_school_set','baidumapapi')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `baidumapapi` varchar(200) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_set','htname')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `htname` varchar(200) DEFAULT '' COMMENT '后台系统名称'");}
if(!pdo_fieldexists('wx_school_set','bgcolor')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `bgcolor` varchar(20) DEFAULT '' COMMENT '后台系统背景颜色'");}
if(!pdo_fieldexists('wx_school_set','bgimg')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `bgimg` varchar(200) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_set','banner1')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `banner1` varchar(200) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_set','banner2')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `banner2` varchar(200) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_set','banner3')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `banner3` varchar(200) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_set','banner4')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `banner4` varchar(200) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_set','sykstx')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `sykstx` varchar(300) NOT NULL");}
if(!pdo_fieldexists('wx_school_set','kcyytx')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `kcyytx` varchar(300) NOT NULL");}
if(!pdo_fieldexists('wx_school_set','kcqdtx')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `kcqdtx` varchar(300) NOT NULL");}
if(!pdo_fieldexists('wx_school_set','sktxls')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `sktxls` varchar(300) NOT NULL");}
if(!pdo_fieldexists('wx_school_set','newcenteriocn')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `newcenteriocn` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_set','is_new')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `is_new` tinyint(1) NOT NULL DEFAULT '1' COMMENT '新旧风格'");}
if(!pdo_fieldexists('wx_school_set','banquan')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `banquan` varchar(200) NOT NULL COMMENT '版权'");}
if(!pdo_fieldexists('wx_school_set','sensitive_word')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `sensitive_word` mediumtext NOT NULL COMMENT '敏感词库'");}
if(!pdo_fieldexists('wx_school_set','school_max')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `school_max` int(10) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_set','fkyytx')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `fkyytx` varchar(300) DEFAULT NULL COMMENT '访客消息推送模板ID'");}
if(!pdo_fieldexists('wx_school_set','pttz')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `pttz` varchar(200) DEFAULT NULL COMMENT '拼团通知'");}
if(!pdo_fieldexists('wx_school_set','zltz')) {pdo_query("ALTER TABLE ".tablename('wx_school_set')." ADD   `zltz` varchar(200) DEFAULT NULL COMMENT '助力通知'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_shouce` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `bj_id` int(10) unsigned NOT NULL,
  `xq_id` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `title` varchar(1000) DEFAULT '',
  `setid` int(10) unsigned NOT NULL COMMENT '设置ID',
  `kcid` int(10) unsigned NOT NULL COMMENT '课程ID',
  `ksid` int(10) unsigned NOT NULL COMMENT '课时ID',
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `sendtype` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1未发送2部分发送3全部发送',
  `ssort` int(10) unsigned NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_shouce','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouce')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_shouce','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouce')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shouce','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouce')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shouce','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouce')." ADD   `bj_id` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shouce','xq_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouce')." ADD   `xq_id` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shouce','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouce')." ADD   `tid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shouce','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouce')." ADD   `title` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouce','setid')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouce')." ADD   `setid` int(10) unsigned NOT NULL COMMENT '设置ID'");}
if(!pdo_fieldexists('wx_school_shouce','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouce')." ADD   `kcid` int(10) unsigned NOT NULL COMMENT '课程ID'");}
if(!pdo_fieldexists('wx_school_shouce','ksid')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouce')." ADD   `ksid` int(10) unsigned NOT NULL COMMENT '课时ID'");}
if(!pdo_fieldexists('wx_school_shouce','starttime')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouce')." ADD   `starttime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shouce','endtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouce')." ADD   `endtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shouce','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouce')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shouce','sendtype')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouce')." ADD   `sendtype` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1未发送2部分发送3全部发送'");}
if(!pdo_fieldexists('wx_school_shouce','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouce')." ADD   `ssort` int(10) unsigned NOT NULL COMMENT '排序'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_shoucepyk` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `bj_id` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `title` text COMMENT '内容',
  `createtime` int(10) unsigned NOT NULL,
  `ssort` int(10) unsigned NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_shoucepyk','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_shoucepyk')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_shoucepyk','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_shoucepyk')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shoucepyk','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_shoucepyk')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shoucepyk','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_shoucepyk')." ADD   `bj_id` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shoucepyk','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_shoucepyk')." ADD   `tid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shoucepyk','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_shoucepyk')." ADD   `title` text COMMENT '内容'");}
if(!pdo_fieldexists('wx_school_shoucepyk','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_shoucepyk')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shoucepyk','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_shoucepyk')." ADD   `ssort` int(10) unsigned NOT NULL COMMENT '排序'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_shouceset` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `title` varchar(7) DEFAULT '',
  `bottext` varchar(7) DEFAULT '',
  `boturl` varchar(1000) DEFAULT '',
  `lasttxet` varchar(7) DEFAULT '',
  `nj_id` int(10) unsigned NOT NULL,
  `icon` varchar(1000) DEFAULT '',
  `bg1` varchar(1000) DEFAULT '',
  `bg2` varchar(1000) DEFAULT '',
  `bg3` varchar(1000) DEFAULT '',
  `bg4` varchar(1000) DEFAULT '',
  `bg5` varchar(1000) DEFAULT '',
  `bg6` varchar(1000) DEFAULT '',
  `bgm` varchar(1000) DEFAULT '',
  `top1` varchar(1000) DEFAULT '',
  `top2` varchar(1000) DEFAULT '',
  `top3` varchar(1000) DEFAULT '',
  `top4` varchar(1000) DEFAULT '',
  `top5` varchar(1000) DEFAULT '',
  `guidword1` varchar(20) DEFAULT '',
  `guidword2` varchar(20) DEFAULT '',
  `guidurl` varchar(1000) DEFAULT '',
  `createtime` int(10) unsigned NOT NULL,
  `allowshare` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1允许2禁止',
  `ssort` int(10) unsigned NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_shouceset','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_shouceset','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shouceset','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shouceset','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `title` varchar(7) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','bottext')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `bottext` varchar(7) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','boturl')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `boturl` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','lasttxet')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `lasttxet` varchar(7) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','nj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `nj_id` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shouceset','icon')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `icon` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','bg1')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `bg1` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','bg2')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `bg2` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','bg3')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `bg3` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','bg4')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `bg4` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','bg5')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `bg5` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','bg6')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `bg6` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','bgm')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `bgm` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','top1')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `top1` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','top2')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `top2` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','top3')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `top3` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','top4')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `top4` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','top5')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `top5` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','guidword1')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `guidword1` varchar(20) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','guidword2')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `guidword2` varchar(20) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','guidurl')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `guidurl` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceset','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shouceset','allowshare')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `allowshare` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1允许2禁止'");}
if(!pdo_fieldexists('wx_school_shouceset','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceset')." ADD   `ssort` int(10) unsigned NOT NULL COMMENT '排序'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_shouceseticon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `setid` int(10) unsigned NOT NULL COMMENT '设置ID',
  `title` varchar(7) DEFAULT '',
  `icon1title` varchar(10) DEFAULT '',
  `icon2title` varchar(10) DEFAULT '',
  `icon3title` varchar(10) DEFAULT '',
  `icon4title` varchar(10) DEFAULT '',
  `icon5title` varchar(10) DEFAULT '',
  `icon1` varchar(1000) DEFAULT '',
  `icon2` varchar(1000) DEFAULT '',
  `icon3` varchar(1000) DEFAULT '',
  `icon4` varchar(1000) DEFAULT '',
  `icon5` varchar(1000) DEFAULT '',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1教师使用2家长',
  `ssort` int(10) unsigned NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_shouceseticon','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_shouceseticon','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shouceseticon','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_shouceseticon','setid')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD   `setid` int(10) unsigned NOT NULL COMMENT '设置ID'");}
if(!pdo_fieldexists('wx_school_shouceseticon','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD   `title` varchar(7) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceseticon','icon1title')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD   `icon1title` varchar(10) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceseticon','icon2title')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD   `icon2title` varchar(10) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceseticon','icon3title')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD   `icon3title` varchar(10) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceseticon','icon4title')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD   `icon4title` varchar(10) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceseticon','icon5title')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD   `icon5title` varchar(10) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceseticon','icon1')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD   `icon1` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceseticon','icon2')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD   `icon2` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceseticon','icon3')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD   `icon3` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceseticon','icon4')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD   `icon4` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceseticon','icon5')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD   `icon5` varchar(1000) DEFAULT ''");}
if(!pdo_fieldexists('wx_school_shouceseticon','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD   `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1教师使用2家长'");}
if(!pdo_fieldexists('wx_school_shouceseticon','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_shouceseticon')." ADD   `ssort` int(10) unsigned NOT NULL COMMENT '排序'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_signup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `icon` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `numberid` int(11) DEFAULT NULL,
  `sex` int(1) NOT NULL,
  `mobile` char(11) NOT NULL,
  `nj_id` int(10) unsigned NOT NULL COMMENT '年级ID',
  `bj_id` int(10) unsigned NOT NULL COMMENT '班级ID',
  `idcard` varchar(18) NOT NULL,
  `cost` varchar(10) NOT NULL COMMENT '报名费用',
  `birthday` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `passtime` int(10) unsigned NOT NULL,
  `lasttime` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL COMMENT '发布者UID',
  `orderid` int(10) unsigned NOT NULL,
  `openid` varchar(30) NOT NULL COMMENT 'openid',
  `pard` tinyint(1) unsigned NOT NULL COMMENT '关系',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1审核中2审核通过3不通过',
  `sid` int(11) unsigned NOT NULL,
  `picarr1` varchar(1000) NOT NULL,
  `picarr2` varchar(1000) NOT NULL,
  `picarr3` varchar(1000) NOT NULL,
  `picarr4` varchar(1000) NOT NULL,
  `picarr5` varchar(1000) NOT NULL,
  `textarr1` varchar(1000) NOT NULL,
  `textarr2` varchar(1000) NOT NULL,
  `textarr3` varchar(1000) NOT NULL,
  `textarr4` varchar(1000) NOT NULL,
  `textarr5` varchar(1000) NOT NULL,
  `textarr6` varchar(1000) NOT NULL,
  `textarr7` varchar(1000) NOT NULL,
  `textarr8` varchar(1000) NOT NULL,
  `textarr9` varchar(1000) NOT NULL,
  `textarr10` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_signup','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_signup','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','icon')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `icon` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `name` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','numberid')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `numberid` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_signup','sex')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `sex` int(1) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','mobile')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `mobile` char(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','nj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `nj_id` int(10) unsigned NOT NULL COMMENT '年级ID'");}
if(!pdo_fieldexists('wx_school_signup','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `bj_id` int(10) unsigned NOT NULL COMMENT '班级ID'");}
if(!pdo_fieldexists('wx_school_signup','idcard')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `idcard` varchar(18) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','cost')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `cost` varchar(10) NOT NULL COMMENT '报名费用'");}
if(!pdo_fieldexists('wx_school_signup','birthday')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `birthday` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `createtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','passtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `passtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','lasttime')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `lasttime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','uid')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `uid` int(10) unsigned NOT NULL COMMENT '发布者UID'");}
if(!pdo_fieldexists('wx_school_signup','orderid')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `orderid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `openid` varchar(30) NOT NULL COMMENT 'openid'");}
if(!pdo_fieldexists('wx_school_signup','pard')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `pard` tinyint(1) unsigned NOT NULL COMMENT '关系'");}
if(!pdo_fieldexists('wx_school_signup','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1审核中2审核通过3不通过'");}
if(!pdo_fieldexists('wx_school_signup','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `sid` int(11) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','picarr1')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `picarr1` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','picarr2')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `picarr2` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','picarr3')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `picarr3` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','picarr4')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `picarr4` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','picarr5')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `picarr5` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','textarr1')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `textarr1` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','textarr2')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `textarr2` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','textarr3')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `textarr3` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','textarr4')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `textarr4` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','textarr5')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `textarr5` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','textarr6')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `textarr6` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','textarr7')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `textarr7` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','textarr8')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `textarr8` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','textarr9')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `textarr9` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_signup','textarr10')) {pdo_query("ALTER TABLE ".tablename('wx_school_signup')." ADD   `textarr10` varchar(1000) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_sms_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `type` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sendtime` int(10) unsigned NOT NULL COMMENT '生成时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_sms_log','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_sms_log')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_sms_log','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_sms_log')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_sms_log','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_sms_log')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_sms_log','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_sms_log')." ADD   `type` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_sms_log','mobile')) {pdo_query("ALTER TABLE ".tablename('wx_school_sms_log')." ADD   `mobile` varchar(15) NOT NULL");}
if(!pdo_fieldexists('wx_school_sms_log','msg')) {pdo_query("ALTER TABLE ".tablename('wx_school_sms_log')." ADD   `msg` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_sms_log','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_sms_log')." ADD   `status` tinyint(1) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_sms_log','sendtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_sms_log')." ADD   `sendtime` int(10) unsigned NOT NULL COMMENT '生成时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id',
  `icon` varchar(255) NOT NULL,
  `numberid` varchar(40) NOT NULL,
  `xq_id` int(11) NOT NULL,
  `area_addr` varchar(200) NOT NULL DEFAULT '',
  `ck_id` int(11) NOT NULL,
  `bj_id` int(11) NOT NULL,
  `birthdate` int(10) unsigned NOT NULL,
  `sex` int(1) NOT NULL,
  `createdate` int(10) unsigned NOT NULL,
  `seffectivetime` int(10) unsigned NOT NULL,
  `stheendtime` int(10) unsigned NOT NULL,
  `jf_statu` int(11) DEFAULT NULL,
  `mobile` char(11) NOT NULL,
  `homephone` char(16) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `localdate_id` char(20) NOT NULL DEFAULT '',
  `note` varchar(50) NOT NULL DEFAULT '',
  `amount` int(11) NOT NULL,
  `area` varchar(50) NOT NULL,
  `own` varchar(30) NOT NULL DEFAULT '0' COMMENT '本人微信info',
  `mom` varchar(30) NOT NULL DEFAULT '0' COMMENT '母亲微信info',
  `dad` varchar(30) NOT NULL DEFAULT '0' COMMENT '父亲微信info',
  `other` varchar(30) NOT NULL DEFAULT '0' COMMENT '其他家长微信info',
  `ouserid` int(11) NOT NULL COMMENT '用户ID',
  `muserid` int(11) NOT NULL COMMENT '用户ID',
  `duserid` int(11) NOT NULL COMMENT '用户ID',
  `otheruserid` int(11) NOT NULL COMMENT '用户ID',
  `ouid` int(10) unsigned NOT NULL COMMENT '微擎系统memberID',
  `muid` int(10) unsigned NOT NULL COMMENT '微擎系统memberID',
  `duid` int(10) unsigned NOT NULL COMMENT '微擎系统memberID',
  `otheruid` int(10) unsigned NOT NULL COMMENT '微擎系统memberID',
  `xjid` int(11) unsigned NOT NULL COMMENT '学籍信息',
  `code` varchar(18) DEFAULT NULL COMMENT '绑定码',
  `keyid` int(11) unsigned DEFAULT '0',
  `qrcode_id` int(10) unsigned DEFAULT NULL COMMENT '二维码ID',
  `points` int(11) NOT NULL COMMENT '学生积分',
  `chongzhi` float(10,2) NOT NULL COMMENT '余额',
  `s_type` tinyint(3) NOT NULL COMMENT '走读住校',
  `infocard` text NOT NULL,
  `roomid` int(11) NOT NULL,
  `chargenum` int(11) NOT NULL COMMENT '充电桩剩余次数',
  `sellteaid` int(11) NOT NULL COMMENT '业务员id',
  `guid` varchar(200) NOT NULL COMMENT '沃土 guid',
  `photo_guid` varchar(200) NOT NULL COMMENT '头像guid',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0激活1锁定',
  `superior_tid` int(10) unsigned NOT NULL COMMENT '招生tid',
  `from_kcid` int(10) unsigned NOT NULL COMMENT '来源课程ID',
  `province` varchar(100) DEFAULT NULL COMMENT '省',
  `city` varchar(100) DEFAULT NULL COMMENT '市',
  `county` varchar(100) DEFAULT NULL COMMENT '区',
  `buzhu` float(8,2) NOT NULL,
  `typt_user_id` varchar(30) NOT NULL COMMENT '统一平台用户ID',
  `typt_user_token` varchar(30) NOT NULL COMMENT '统一平台用户令牌',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=732 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_students','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_students','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_students','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id'");}
if(!pdo_fieldexists('wx_school_students','icon')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `icon` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_school_students','numberid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `numberid` varchar(40) NOT NULL");}
if(!pdo_fieldexists('wx_school_students','xq_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `xq_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_students','area_addr')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `area_addr` varchar(200) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wx_school_students','ck_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `ck_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_students','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `bj_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_students','birthdate')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `birthdate` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_students','sex')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `sex` int(1) NOT NULL");}
if(!pdo_fieldexists('wx_school_students','createdate')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `createdate` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_students','seffectivetime')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `seffectivetime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_students','stheendtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `stheendtime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_students','jf_statu')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `jf_statu` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_students','mobile')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `mobile` char(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_students','homephone')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `homephone` char(16) NOT NULL");}
if(!pdo_fieldexists('wx_school_students','s_name')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `s_name` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_students','localdate_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `localdate_id` char(20) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wx_school_students','note')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `note` varchar(50) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wx_school_students','amount')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `amount` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_students','area')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `area` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_students','own')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `own` varchar(30) NOT NULL DEFAULT '0' COMMENT '本人微信info'");}
if(!pdo_fieldexists('wx_school_students','mom')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `mom` varchar(30) NOT NULL DEFAULT '0' COMMENT '母亲微信info'");}
if(!pdo_fieldexists('wx_school_students','dad')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `dad` varchar(30) NOT NULL DEFAULT '0' COMMENT '父亲微信info'");}
if(!pdo_fieldexists('wx_school_students','other')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `other` varchar(30) NOT NULL DEFAULT '0' COMMENT '其他家长微信info'");}
if(!pdo_fieldexists('wx_school_students','ouserid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `ouserid` int(11) NOT NULL COMMENT '用户ID'");}
if(!pdo_fieldexists('wx_school_students','muserid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `muserid` int(11) NOT NULL COMMENT '用户ID'");}
if(!pdo_fieldexists('wx_school_students','duserid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `duserid` int(11) NOT NULL COMMENT '用户ID'");}
if(!pdo_fieldexists('wx_school_students','otheruserid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `otheruserid` int(11) NOT NULL COMMENT '用户ID'");}
if(!pdo_fieldexists('wx_school_students','ouid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `ouid` int(10) unsigned NOT NULL COMMENT '微擎系统memberID'");}
if(!pdo_fieldexists('wx_school_students','muid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `muid` int(10) unsigned NOT NULL COMMENT '微擎系统memberID'");}
if(!pdo_fieldexists('wx_school_students','duid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `duid` int(10) unsigned NOT NULL COMMENT '微擎系统memberID'");}
if(!pdo_fieldexists('wx_school_students','otheruid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `otheruid` int(10) unsigned NOT NULL COMMENT '微擎系统memberID'");}
if(!pdo_fieldexists('wx_school_students','xjid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `xjid` int(11) unsigned NOT NULL COMMENT '学籍信息'");}
if(!pdo_fieldexists('wx_school_students','code')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `code` varchar(18) DEFAULT NULL COMMENT '绑定码'");}
if(!pdo_fieldexists('wx_school_students','keyid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `keyid` int(11) unsigned DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_students','qrcode_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `qrcode_id` int(10) unsigned DEFAULT NULL COMMENT '二维码ID'");}
if(!pdo_fieldexists('wx_school_students','points')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `points` int(11) NOT NULL COMMENT '学生积分'");}
if(!pdo_fieldexists('wx_school_students','chongzhi')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `chongzhi` float(10,2) NOT NULL COMMENT '余额'");}
if(!pdo_fieldexists('wx_school_students','s_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `s_type` tinyint(3) NOT NULL COMMENT '走读住校'");}
if(!pdo_fieldexists('wx_school_students','infocard')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `infocard` text NOT NULL");}
if(!pdo_fieldexists('wx_school_students','roomid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `roomid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_students','chargenum')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `chargenum` int(11) NOT NULL COMMENT '充电桩剩余次数'");}
if(!pdo_fieldexists('wx_school_students','sellteaid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `sellteaid` int(11) NOT NULL COMMENT '业务员id'");}
if(!pdo_fieldexists('wx_school_students','guid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `guid` varchar(200) NOT NULL COMMENT '沃土 guid'");}
if(!pdo_fieldexists('wx_school_students','photo_guid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `photo_guid` varchar(200) NOT NULL COMMENT '头像guid'");}
if(!pdo_fieldexists('wx_school_students','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0激活1锁定'");}
if(!pdo_fieldexists('wx_school_students','superior_tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `superior_tid` int(10) unsigned NOT NULL COMMENT '招生tid'");}
if(!pdo_fieldexists('wx_school_students','from_kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `from_kcid` int(10) unsigned NOT NULL COMMENT '来源课程ID'");}
if(!pdo_fieldexists('wx_school_students','province')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `province` varchar(100) DEFAULT NULL COMMENT '省'");}
if(!pdo_fieldexists('wx_school_students','city')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `city` varchar(100) DEFAULT NULL COMMENT '市'");}
if(!pdo_fieldexists('wx_school_students','county')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `county` varchar(100) DEFAULT NULL COMMENT '区'");}
if(!pdo_fieldexists('wx_school_students','buzhu')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `buzhu` float(8,2) NOT NULL");}
if(!pdo_fieldexists('wx_school_students','typt_user_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `typt_user_id` varchar(30) NOT NULL COMMENT '统一平台用户ID'");}
if(!pdo_fieldexists('wx_school_students','typt_user_token')) {pdo_query("ALTER TABLE ".tablename('wx_school_students')." ADD   `typt_user_token` varchar(30) NOT NULL COMMENT '统一平台用户令牌'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_stuoverhuifang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `schoolid` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `content` text NOT NULL,
  `createtime` int(11) NOT NULL,
  `recordid` int(11) NOT NULL COMMENT 'coursebuy id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_stuoverhuifang','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_stuoverhuifang')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_stuoverhuifang','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_stuoverhuifang')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_stuoverhuifang','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_stuoverhuifang')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_stuoverhuifang','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_stuoverhuifang')." ADD   `sid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_stuoverhuifang','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_stuoverhuifang')." ADD   `tid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_stuoverhuifang','content')) {pdo_query("ALTER TABLE ".tablename('wx_school_stuoverhuifang')." ADD   `content` text NOT NULL");}
if(!pdo_fieldexists('wx_school_stuoverhuifang','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_stuoverhuifang')." ADD   `createtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_stuoverhuifang','recordid')) {pdo_query("ALTER TABLE ".tablename('wx_school_stuoverhuifang')." ADD   `recordid` int(11) NOT NULL COMMENT 'coursebuy id'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_task` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` varchar(50) NOT NULL,
  `kcid` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `type` tinyint(1) unsigned NOT NULL COMMENT '分类',
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_task','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_task')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_task','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_task')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_task','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_task')." ADD   `schoolid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_task','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_task')." ADD   `kcid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_task','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_task')." ADD   `status` tinyint(1) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_task','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_task')." ADD   `type` tinyint(1) unsigned NOT NULL COMMENT '分类'");}
if(!pdo_fieldexists('wx_school_task','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_task')." ADD   `createtime` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_task_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` varchar(50) NOT NULL,
  `taskid` int(10) unsigned NOT NULL,
  `ksid` int(10) unsigned NOT NULL,
  `type` tinyint(1) unsigned NOT NULL COMMENT '分类',
  `createtime` int(11) NOT NULL,
  `kcid` int(11) NOT NULL COMMENT '课程id',
  `sid` int(11) NOT NULL COMMENT 'sid',
  `remind_type` tinyint(3) NOT NULL COMMENT '0上课提醒1过期提醒',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_task_list','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_task_list')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_task_list','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_task_list')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_task_list','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_task_list')." ADD   `schoolid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_task_list','taskid')) {pdo_query("ALTER TABLE ".tablename('wx_school_task_list')." ADD   `taskid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_task_list','ksid')) {pdo_query("ALTER TABLE ".tablename('wx_school_task_list')." ADD   `ksid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_task_list','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_task_list')." ADD   `type` tinyint(1) unsigned NOT NULL COMMENT '分类'");}
if(!pdo_fieldexists('wx_school_task_list','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_task_list')." ADD   `createtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_task_list','kcid')) {pdo_query("ALTER TABLE ".tablename('wx_school_task_list')." ADD   `kcid` int(11) NOT NULL COMMENT '课程id'");}
if(!pdo_fieldexists('wx_school_task_list','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_task_list')." ADD   `sid` int(11) NOT NULL COMMENT 'sid'");}
if(!pdo_fieldexists('wx_school_task_list','remind_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_task_list')." ADD   `remind_type` tinyint(3) NOT NULL COMMENT '0上课提醒1过期提醒'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_tcourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id',
  `weid` int(10) unsigned NOT NULL,
  `tid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '课程名称',
  `dagang` text NOT NULL COMMENT '课程大纲',
  `start` int(10) unsigned NOT NULL COMMENT '开始时间',
  `end` int(10) unsigned NOT NULL COMMENT '结束时间',
  `minge` int(11) NOT NULL COMMENT '名额限制',
  `yibao` int(11) NOT NULL COMMENT '已报人数',
  `cose` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `adrr` varchar(100) NOT NULL DEFAULT '' COMMENT '授课地址或教室',
  `km_id` int(11) NOT NULL,
  `bj_id` int(11) NOT NULL,
  `xq_id` int(11) NOT NULL,
  `sd_id` int(11) NOT NULL,
  `is_hot` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1显示,2否',
  `payweid` int(10) unsigned NOT NULL COMMENT '支付公众号',
  `ssort` tinyint(3) NOT NULL DEFAULT '0',
  `is_dm` tinyint(1) NOT NULL DEFAULT '1' COMMENT '弹幕',
  `is_tx` tinyint(1) unsigned NOT NULL COMMENT '提醒开关',
  `txtime` int(10) unsigned NOT NULL COMMENT '提前分钟',
  `signTime` int(5) NOT NULL COMMENT '签到时间',
  `isSign` int(3) NOT NULL COMMENT '是否可签到',
  `OldOrNew` int(2) NOT NULL COMMENT '固定课时or自由课程',
  `Ctype` int(3) NOT NULL COMMENT '课程类型',
  `FirstNum` int(3) NOT NULL COMMENT '首次包含多少课时',
  `RePrice` decimal(18,2) NOT NULL COMMENT '续费价格/课时',
  `ReNum` int(3) NOT NULL COMMENT '起续课时数',
  `AllNum` int(3) NOT NULL COMMENT '总共多少课时',
  `thumb` varchar(1000) NOT NULL,
  `maintid` int(11) NOT NULL COMMENT '主讲老师',
  `Point2Cost` int(11) NOT NULL COMMENT '多少积分抵一元',
  `MinPoint` int(11) NOT NULL COMMENT '最低使用下限',
  `MaxPoint` int(11) NOT NULL COMMENT '最高使用上限',
  `yytid` int(11) NOT NULL COMMENT '预约负责老师',
  `is_remind_pj` int(2) NOT NULL,
  `is_tuijian` int(3) NOT NULL COMMENT '是否推荐课程',
  `is_print` tinyint(1) NOT NULL DEFAULT '2' COMMENT '是否启用打印机',
  `printarr` varchar(100) NOT NULL DEFAULT '' COMMENT '打印机',
  `bigimg` text COMMENT '幻灯片',
  `overtimeday` int(10) NOT NULL COMMENT '购买/续购后多少天过期',
  `remindday` int(10) NOT NULL COMMENT '提前多少天提醒',
  `tea_sign_confirm` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1老师签到确认2无需确认',
  `rechecktime` int(10) NOT NULL COMMENT '多少分钟内刷卡算重复刷卡',
  `is_print_xk` tinyint(3) NOT NULL COMMENT '是否打印销课记录',
  `allow_menu` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1启用章节2否',
  `allow_tuiguang` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1启用推广2否',
  `kc_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1线上0线下',
  `is_try` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1试听2否',
  `allow_pl` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1评论2否',
  `sale_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1团2助力0关闭',
  `sale_id` int(10) unsigned NOT NULL COMMENT '营销设置ID',
  `tg_id` int(10) unsigned NOT NULL COMMENT '推广设置ID',
  `pkuser` varchar(500) DEFAULT NULL COMMENT '排课人',
  `kcabbr` varchar(10) NOT NULL COMMENT '课程缩写编码',
  `kccode` varchar(32) NOT NULL COMMENT '课程完整代码',
  `kcnumber` int(2) NOT NULL COMMENT '课程编码',
  `guigetype` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0单规格1多规格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_tcourse','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_tcourse','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id'");}
if(!pdo_fieldexists('wx_school_tcourse','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_tcourse','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `tid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_tcourse','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `name` varchar(50) NOT NULL DEFAULT '' COMMENT '课程名称'");}
if(!pdo_fieldexists('wx_school_tcourse','dagang')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `dagang` text NOT NULL COMMENT '课程大纲'");}
if(!pdo_fieldexists('wx_school_tcourse','start')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `start` int(10) unsigned NOT NULL COMMENT '开始时间'");}
if(!pdo_fieldexists('wx_school_tcourse','end')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `end` int(10) unsigned NOT NULL COMMENT '结束时间'");}
if(!pdo_fieldexists('wx_school_tcourse','minge')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `minge` int(11) NOT NULL COMMENT '名额限制'");}
if(!pdo_fieldexists('wx_school_tcourse','yibao')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `yibao` int(11) NOT NULL COMMENT '已报人数'");}
if(!pdo_fieldexists('wx_school_tcourse','cose')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `cose` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '价格'");}
if(!pdo_fieldexists('wx_school_tcourse','adrr')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `adrr` varchar(100) NOT NULL DEFAULT '' COMMENT '授课地址或教室'");}
if(!pdo_fieldexists('wx_school_tcourse','km_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `km_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_tcourse','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `bj_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_tcourse','xq_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `xq_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_tcourse','sd_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `sd_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_tcourse','is_hot')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `is_hot` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否推荐'");}
if(!pdo_fieldexists('wx_school_tcourse','is_show')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1显示,2否'");}
if(!pdo_fieldexists('wx_school_tcourse','payweid')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `payweid` int(10) unsigned NOT NULL COMMENT '支付公众号'");}
if(!pdo_fieldexists('wx_school_tcourse','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `ssort` tinyint(3) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_school_tcourse','is_dm')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `is_dm` tinyint(1) NOT NULL DEFAULT '1' COMMENT '弹幕'");}
if(!pdo_fieldexists('wx_school_tcourse','is_tx')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `is_tx` tinyint(1) unsigned NOT NULL COMMENT '提醒开关'");}
if(!pdo_fieldexists('wx_school_tcourse','txtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `txtime` int(10) unsigned NOT NULL COMMENT '提前分钟'");}
if(!pdo_fieldexists('wx_school_tcourse','signTime')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `signTime` int(5) NOT NULL COMMENT '签到时间'");}
if(!pdo_fieldexists('wx_school_tcourse','isSign')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `isSign` int(3) NOT NULL COMMENT '是否可签到'");}
if(!pdo_fieldexists('wx_school_tcourse','OldOrNew')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `OldOrNew` int(2) NOT NULL COMMENT '固定课时or自由课程'");}
if(!pdo_fieldexists('wx_school_tcourse','Ctype')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `Ctype` int(3) NOT NULL COMMENT '课程类型'");}
if(!pdo_fieldexists('wx_school_tcourse','FirstNum')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `FirstNum` int(3) NOT NULL COMMENT '首次包含多少课时'");}
if(!pdo_fieldexists('wx_school_tcourse','RePrice')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `RePrice` decimal(18,2) NOT NULL COMMENT '续费价格/课时'");}
if(!pdo_fieldexists('wx_school_tcourse','ReNum')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `ReNum` int(3) NOT NULL COMMENT '起续课时数'");}
if(!pdo_fieldexists('wx_school_tcourse','AllNum')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `AllNum` int(3) NOT NULL COMMENT '总共多少课时'");}
if(!pdo_fieldexists('wx_school_tcourse','thumb')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `thumb` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_tcourse','maintid')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `maintid` int(11) NOT NULL COMMENT '主讲老师'");}
if(!pdo_fieldexists('wx_school_tcourse','Point2Cost')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `Point2Cost` int(11) NOT NULL COMMENT '多少积分抵一元'");}
if(!pdo_fieldexists('wx_school_tcourse','MinPoint')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `MinPoint` int(11) NOT NULL COMMENT '最低使用下限'");}
if(!pdo_fieldexists('wx_school_tcourse','MaxPoint')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `MaxPoint` int(11) NOT NULL COMMENT '最高使用上限'");}
if(!pdo_fieldexists('wx_school_tcourse','yytid')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `yytid` int(11) NOT NULL COMMENT '预约负责老师'");}
if(!pdo_fieldexists('wx_school_tcourse','is_remind_pj')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `is_remind_pj` int(2) NOT NULL");}
if(!pdo_fieldexists('wx_school_tcourse','is_tuijian')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `is_tuijian` int(3) NOT NULL COMMENT '是否推荐课程'");}
if(!pdo_fieldexists('wx_school_tcourse','is_print')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `is_print` tinyint(1) NOT NULL DEFAULT '2' COMMENT '是否启用打印机'");}
if(!pdo_fieldexists('wx_school_tcourse','printarr')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `printarr` varchar(100) NOT NULL DEFAULT '' COMMENT '打印机'");}
if(!pdo_fieldexists('wx_school_tcourse','bigimg')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `bigimg` text COMMENT '幻灯片'");}
if(!pdo_fieldexists('wx_school_tcourse','overtimeday')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `overtimeday` int(10) NOT NULL COMMENT '购买/续购后多少天过期'");}
if(!pdo_fieldexists('wx_school_tcourse','remindday')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `remindday` int(10) NOT NULL COMMENT '提前多少天提醒'");}
if(!pdo_fieldexists('wx_school_tcourse','tea_sign_confirm')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `tea_sign_confirm` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1老师签到确认2无需确认'");}
if(!pdo_fieldexists('wx_school_tcourse','rechecktime')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `rechecktime` int(10) NOT NULL COMMENT '多少分钟内刷卡算重复刷卡'");}
if(!pdo_fieldexists('wx_school_tcourse','is_print_xk')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `is_print_xk` tinyint(3) NOT NULL COMMENT '是否打印销课记录'");}
if(!pdo_fieldexists('wx_school_tcourse','allow_menu')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `allow_menu` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1启用章节2否'");}
if(!pdo_fieldexists('wx_school_tcourse','allow_tuiguang')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `allow_tuiguang` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1启用推广2否'");}
if(!pdo_fieldexists('wx_school_tcourse','kc_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `kc_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1线上0线下'");}
if(!pdo_fieldexists('wx_school_tcourse','is_try')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `is_try` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1试听2否'");}
if(!pdo_fieldexists('wx_school_tcourse','allow_pl')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `allow_pl` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1评论2否'");}
if(!pdo_fieldexists('wx_school_tcourse','sale_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `sale_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1团2助力0关闭'");}
if(!pdo_fieldexists('wx_school_tcourse','sale_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `sale_id` int(10) unsigned NOT NULL COMMENT '营销设置ID'");}
if(!pdo_fieldexists('wx_school_tcourse','tg_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `tg_id` int(10) unsigned NOT NULL COMMENT '推广设置ID'");}
if(!pdo_fieldexists('wx_school_tcourse','pkuser')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `pkuser` varchar(500) DEFAULT NULL COMMENT '排课人'");}
if(!pdo_fieldexists('wx_school_tcourse','kcabbr')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `kcabbr` varchar(10) NOT NULL COMMENT '课程缩写编码'");}
if(!pdo_fieldexists('wx_school_tcourse','kccode')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `kccode` varchar(32) NOT NULL COMMENT '课程完整代码'");}
if(!pdo_fieldexists('wx_school_tcourse','kcnumber')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `kcnumber` int(2) NOT NULL COMMENT '课程编码'");}
if(!pdo_fieldexists('wx_school_tcourse','guigetype')) {pdo_query("ALTER TABLE ".tablename('wx_school_tcourse')." ADD   `guigetype` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0单规格1多规格'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id',
  `weid` int(10) unsigned NOT NULL,
  `tname` varchar(50) NOT NULL,
  `birthdate` int(10) unsigned NOT NULL,
  `tel` varchar(20) NOT NULL,
  `mobile` char(11) NOT NULL,
  `email` char(50) NOT NULL,
  `sex` int(1) NOT NULL,
  `km_id1` int(11) NOT NULL COMMENT '授课科目1',
  `km_id2` int(11) NOT NULL COMMENT '授课科目2',
  `km_id3` int(11) NOT NULL COMMENT '授课科目3',
  `bj_id1` int(11) NOT NULL COMMENT '授课班级1',
  `bj_id2` int(11) NOT NULL COMMENT '授课班级2',
  `bj_id3` int(11) NOT NULL COMMENT '授课班级3',
  `xq_id1` int(11) NOT NULL COMMENT '授课年级1',
  `xq_id2` int(11) NOT NULL COMMENT '授课年级2',
  `xq_id3` int(11) NOT NULL COMMENT '授课年级3',
  `fz_id` int(11) NOT NULL COMMENT '所属分组',
  `jiontime` int(10) unsigned NOT NULL,
  `info` text NOT NULL COMMENT '教学成果',
  `jinyan` text NOT NULL COMMENT '教学经验',
  `headinfo` text NOT NULL COMMENT '教学特点',
  `thumb` varchar(200) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` int(11) DEFAULT NULL,
  `code` int(11) unsigned NOT NULL COMMENT '绑定码',
  `openid` varchar(30) NOT NULL DEFAULT '0' COMMENT '教师微信',
  `uid` int(10) unsigned NOT NULL COMMENT '微擎系统memberID',
  `userid` int(11) NOT NULL COMMENT '用户ID',
  `is_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否显示',
  `com` int(11) unsigned NOT NULL,
  `point` int(10) NOT NULL,
  `star` float NOT NULL COMMENT '平均星级',
  `idcard` varchar(20) NOT NULL,
  `jiguan` varchar(80) NOT NULL,
  `minzu` varchar(20) NOT NULL,
  `zzmianmao` varchar(30) NOT NULL,
  `address` varchar(300) NOT NULL,
  `otherinfo` text NOT NULL,
  `plate_num` varchar(15) DEFAULT NULL COMMENT '教师车牌号',
  `is_sell` tinyint(3) NOT NULL COMMENT '0不参与1业务员2销售经理',
  `guid` varchar(200) NOT NULL,
  `photo_guid` varchar(200) NOT NULL,
  `typt_user_id` varchar(30) NOT NULL COMMENT '统一平台用户ID',
  `typt_user_token` varchar(30) NOT NULL COMMENT '统一平台用户令牌',
  `typt_is_admin` tinyint(3) NOT NULL COMMENT '是否统一平台管理员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_teachers','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_teachers','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id'");}
if(!pdo_fieldexists('wx_school_teachers','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','tname')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `tname` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','birthdate')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `birthdate` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','tel')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `tel` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','mobile')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `mobile` char(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','email')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `email` char(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','sex')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `sex` int(1) NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','km_id1')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `km_id1` int(11) NOT NULL COMMENT '授课科目1'");}
if(!pdo_fieldexists('wx_school_teachers','km_id2')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `km_id2` int(11) NOT NULL COMMENT '授课科目2'");}
if(!pdo_fieldexists('wx_school_teachers','km_id3')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `km_id3` int(11) NOT NULL COMMENT '授课科目3'");}
if(!pdo_fieldexists('wx_school_teachers','bj_id1')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `bj_id1` int(11) NOT NULL COMMENT '授课班级1'");}
if(!pdo_fieldexists('wx_school_teachers','bj_id2')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `bj_id2` int(11) NOT NULL COMMENT '授课班级2'");}
if(!pdo_fieldexists('wx_school_teachers','bj_id3')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `bj_id3` int(11) NOT NULL COMMENT '授课班级3'");}
if(!pdo_fieldexists('wx_school_teachers','xq_id1')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `xq_id1` int(11) NOT NULL COMMENT '授课年级1'");}
if(!pdo_fieldexists('wx_school_teachers','xq_id2')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `xq_id2` int(11) NOT NULL COMMENT '授课年级2'");}
if(!pdo_fieldexists('wx_school_teachers','xq_id3')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `xq_id3` int(11) NOT NULL COMMENT '授课年级3'");}
if(!pdo_fieldexists('wx_school_teachers','fz_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `fz_id` int(11) NOT NULL COMMENT '所属分组'");}
if(!pdo_fieldexists('wx_school_teachers','jiontime')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `jiontime` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','info')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `info` text NOT NULL COMMENT '教学成果'");}
if(!pdo_fieldexists('wx_school_teachers','jinyan')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `jinyan` text NOT NULL COMMENT '教学经验'");}
if(!pdo_fieldexists('wx_school_teachers','headinfo')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `headinfo` text NOT NULL COMMENT '教学特点'");}
if(!pdo_fieldexists('wx_school_teachers','thumb')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `thumb` varchar(200) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wx_school_teachers','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `status` tinyint(1) unsigned NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_teachers','sort')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `sort` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_school_teachers','code')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `code` int(11) unsigned NOT NULL COMMENT '绑定码'");}
if(!pdo_fieldexists('wx_school_teachers','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `openid` varchar(30) NOT NULL DEFAULT '0' COMMENT '教师微信'");}
if(!pdo_fieldexists('wx_school_teachers','uid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `uid` int(10) unsigned NOT NULL COMMENT '微擎系统memberID'");}
if(!pdo_fieldexists('wx_school_teachers','userid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `userid` int(11) NOT NULL COMMENT '用户ID'");}
if(!pdo_fieldexists('wx_school_teachers','is_show')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `is_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否显示'");}
if(!pdo_fieldexists('wx_school_teachers','com')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `com` int(11) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','point')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `point` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','star')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `star` float NOT NULL COMMENT '平均星级'");}
if(!pdo_fieldexists('wx_school_teachers','idcard')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `idcard` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','jiguan')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `jiguan` varchar(80) NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','minzu')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `minzu` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','zzmianmao')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `zzmianmao` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','address')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `address` varchar(300) NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','otherinfo')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `otherinfo` text NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','plate_num')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `plate_num` varchar(15) DEFAULT NULL COMMENT '教师车牌号'");}
if(!pdo_fieldexists('wx_school_teachers','is_sell')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `is_sell` tinyint(3) NOT NULL COMMENT '0不参与1业务员2销售经理'");}
if(!pdo_fieldexists('wx_school_teachers','guid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `guid` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','photo_guid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `photo_guid` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_school_teachers','typt_user_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `typt_user_id` varchar(30) NOT NULL COMMENT '统一平台用户ID'");}
if(!pdo_fieldexists('wx_school_teachers','typt_user_token')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `typt_user_token` varchar(30) NOT NULL COMMENT '统一平台用户令牌'");}
if(!pdo_fieldexists('wx_school_teachers','typt_is_admin')) {pdo_query("ALTER TABLE ".tablename('wx_school_teachers')." ADD   `typt_is_admin` tinyint(3) NOT NULL COMMENT '是否统一平台管理员'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_teascore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `score` float(5,2) NOT NULL,
  `fromfzid` int(11) NOT NULL COMMENT '评分人分组',
  `fromtid` varchar(30) NOT NULL COMMENT '评分人tid',
  `scoretime` int(11) NOT NULL COMMENT '评分时间',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `obid` int(11) NOT NULL,
  `parentobid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `type` tinyint(3) NOT NULL,
  `bj_id` int(11) NOT NULL,
  `nj_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_teascore','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_teascore')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_teascore','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teascore')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_teascore','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teascore')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_teascore','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teascore')." ADD   `tid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_teascore','score')) {pdo_query("ALTER TABLE ".tablename('wx_school_teascore')." ADD   `score` float(5,2) NOT NULL");}
if(!pdo_fieldexists('wx_school_teascore','fromfzid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teascore')." ADD   `fromfzid` int(11) NOT NULL COMMENT '评分人分组'");}
if(!pdo_fieldexists('wx_school_teascore','fromtid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teascore')." ADD   `fromtid` varchar(30) NOT NULL COMMENT '评分人tid'");}
if(!pdo_fieldexists('wx_school_teascore','scoretime')) {pdo_query("ALTER TABLE ".tablename('wx_school_teascore')." ADD   `scoretime` int(11) NOT NULL COMMENT '评分时间'");}
if(!pdo_fieldexists('wx_school_teascore','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_teascore')." ADD   `createtime` int(11) NOT NULL COMMENT '创建时间'");}
if(!pdo_fieldexists('wx_school_teascore','obid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teascore')." ADD   `obid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_teascore','parentobid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teascore')." ADD   `parentobid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_teascore','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teascore')." ADD   `sid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_teascore','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_teascore')." ADD   `type` tinyint(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_teascore','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_teascore')." ADD   `bj_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_teascore','nj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_teascore')." ADD   `nj_id` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_teasencefiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `senceid` int(11) NOT NULL,
  `up_word` varchar(500) NOT NULL,
  `up_imgs` varchar(5000) NOT NULL,
  `up_audio` varchar(1000) NOT NULL,
  `audiotime` int(11) NOT NULL,
  `up_video` varchar(1000) NOT NULL,
  `videoimg` varchar(500) NOT NULL,
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_teasencefiles','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_teasencefiles')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_teasencefiles','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teasencefiles')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_teasencefiles','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teasencefiles')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_teasencefiles','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teasencefiles')." ADD   `tid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_teasencefiles','senceid')) {pdo_query("ALTER TABLE ".tablename('wx_school_teasencefiles')." ADD   `senceid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_teasencefiles','up_word')) {pdo_query("ALTER TABLE ".tablename('wx_school_teasencefiles')." ADD   `up_word` varchar(500) NOT NULL");}
if(!pdo_fieldexists('wx_school_teasencefiles','up_imgs')) {pdo_query("ALTER TABLE ".tablename('wx_school_teasencefiles')." ADD   `up_imgs` varchar(5000) NOT NULL");}
if(!pdo_fieldexists('wx_school_teasencefiles','up_audio')) {pdo_query("ALTER TABLE ".tablename('wx_school_teasencefiles')." ADD   `up_audio` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_teasencefiles','audiotime')) {pdo_query("ALTER TABLE ".tablename('wx_school_teasencefiles')." ADD   `audiotime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_teasencefiles','up_video')) {pdo_query("ALTER TABLE ".tablename('wx_school_teasencefiles')." ADD   `up_video` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_teasencefiles','videoimg')) {pdo_query("ALTER TABLE ".tablename('wx_school_teasencefiles')." ADD   `videoimg` varchar(500) NOT NULL");}
if(!pdo_fieldexists('wx_school_teasencefiles','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_teasencefiles')." ADD   `createtime` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_tempstudent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `sex` int(3) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `nj_id` int(11) NOT NULL,
  `bj_id` int(11) NOT NULL,
  `pard` varchar(3) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_tempstudent','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_tempstudent')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_tempstudent','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_tempstudent')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_tempstudent','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_tempstudent')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_tempstudent','sname')) {pdo_query("ALTER TABLE ".tablename('wx_school_tempstudent')." ADD   `sname` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_tempstudent','mobile')) {pdo_query("ALTER TABLE ".tablename('wx_school_tempstudent')." ADD   `mobile` varchar(15) NOT NULL");}
if(!pdo_fieldexists('wx_school_tempstudent','sex')) {pdo_query("ALTER TABLE ".tablename('wx_school_tempstudent')." ADD   `sex` int(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_tempstudent','addr')) {pdo_query("ALTER TABLE ".tablename('wx_school_tempstudent')." ADD   `addr` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_school_tempstudent','nj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_tempstudent')." ADD   `nj_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_tempstudent','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_tempstudent')." ADD   `bj_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_tempstudent','pard')) {pdo_query("ALTER TABLE ".tablename('wx_school_tempstudent')." ADD   `pard` varchar(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_tempstudent','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_tempstudent')." ADD   `openid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_tempstudent','uid')) {pdo_query("ALTER TABLE ".tablename('wx_school_tempstudent')." ADD   `uid` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id',
  `weid` int(10) unsigned NOT NULL,
  `bj_id` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `begintime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `monday` text NOT NULL,
  `tuesday` text NOT NULL,
  `wednesday` text NOT NULL,
  `thursday` text NOT NULL,
  `friday` text NOT NULL,
  `saturday` text NOT NULL,
  `sunday` text NOT NULL,
  `ishow` int(1) NOT NULL DEFAULT '1' COMMENT '1:显示,2隐藏,默认1',
  `sort` int(11) NOT NULL DEFAULT '1',
  `type` varchar(15) NOT NULL DEFAULT '',
  `headpic` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_timetable','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_timetable','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `schoolid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分校id'");}
if(!pdo_fieldexists('wx_school_timetable','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_timetable','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `bj_id` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_timetable','title')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `title` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_school_timetable','begintime')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `begintime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_timetable','endtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `endtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_timetable','monday')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `monday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_timetable','tuesday')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `tuesday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_timetable','wednesday')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `wednesday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_timetable','thursday')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `thursday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_timetable','friday')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `friday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_timetable','saturday')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `saturday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_timetable','sunday')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `sunday` text NOT NULL");}
if(!pdo_fieldexists('wx_school_timetable','ishow')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `ishow` int(1) NOT NULL DEFAULT '1' COMMENT '1:显示,2隐藏,默认1'");}
if(!pdo_fieldexists('wx_school_timetable','sort')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `sort` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_timetable','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `type` varchar(15) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wx_school_timetable','headpic')) {pdo_query("ALTER TABLE ".tablename('wx_school_timetable')." ADD   `headpic` varchar(200) NOT NULL DEFAULT ''");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `fsid` int(11) NOT NULL COMMENT '发布者id',
  `jsid` int(11) NOT NULL COMMENT '接收者id',
  `zjid` int(11) NOT NULL COMMENT '转交者id',
  `todoname` varchar(100) NOT NULL COMMENT '任务名称',
  `content` varchar(2000) NOT NULL,
  `starttime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `createtime` int(11) NOT NULL,
  `acttime` int(11) NOT NULL,
  `status` int(3) NOT NULL COMMENT '状态（7种）',
  `zjbeizhu` varchar(100) NOT NULL COMMENT '转交备注',
  `jjbeizhu1` varchar(100) NOT NULL COMMENT '第一人拒绝备注',
  `jjbeizhu2` varchar(100) NOT NULL COMMENT '第二人拒绝备注',
  `picurls` varchar(5000) NOT NULL,
  `audio` varchar(1000) NOT NULL,
  `audiotime` varchar(300) NOT NULL,
  `videoimg` varchar(1000) NOT NULL,
  `video` varchar(2000) NOT NULL,
  `ali_vod_id` varchar(100) DEFAULT '' COMMENT '视频画面ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_todo','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_todo','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_todo','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_todo','fsid')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `fsid` int(11) NOT NULL COMMENT '发布者id'");}
if(!pdo_fieldexists('wx_school_todo','jsid')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `jsid` int(11) NOT NULL COMMENT '接收者id'");}
if(!pdo_fieldexists('wx_school_todo','zjid')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `zjid` int(11) NOT NULL COMMENT '转交者id'");}
if(!pdo_fieldexists('wx_school_todo','todoname')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `todoname` varchar(100) NOT NULL COMMENT '任务名称'");}
if(!pdo_fieldexists('wx_school_todo','content')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `content` varchar(2000) NOT NULL");}
if(!pdo_fieldexists('wx_school_todo','starttime')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `starttime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_todo','endtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `endtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_todo','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `createtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_todo','acttime')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `acttime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_todo','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `status` int(3) NOT NULL COMMENT '状态（7种）'");}
if(!pdo_fieldexists('wx_school_todo','zjbeizhu')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `zjbeizhu` varchar(100) NOT NULL COMMENT '转交备注'");}
if(!pdo_fieldexists('wx_school_todo','jjbeizhu1')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `jjbeizhu1` varchar(100) NOT NULL COMMENT '第一人拒绝备注'");}
if(!pdo_fieldexists('wx_school_todo','jjbeizhu2')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `jjbeizhu2` varchar(100) NOT NULL COMMENT '第二人拒绝备注'");}
if(!pdo_fieldexists('wx_school_todo','picurls')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `picurls` varchar(5000) NOT NULL");}
if(!pdo_fieldexists('wx_school_todo','audio')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `audio` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_todo','audiotime')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `audiotime` varchar(300) NOT NULL");}
if(!pdo_fieldexists('wx_school_todo','videoimg')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `videoimg` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_todo','video')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `video` varchar(2000) NOT NULL");}
if(!pdo_fieldexists('wx_school_todo','ali_vod_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_todo')." ADD   `ali_vod_id` varchar(100) DEFAULT '' COMMENT '视频画面ID'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属帐号',
  `name` varchar(50) NOT NULL COMMENT '类型名称',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID,0为第一级',
  `ssort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '显示状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_type','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_type')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_type','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_type')." ADD   `weid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属帐号'");}
if(!pdo_fieldexists('wx_school_type','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_type')." ADD   `name` varchar(50) NOT NULL COMMENT '类型名称'");}
if(!pdo_fieldexists('wx_school_type','parentid')) {pdo_query("ALTER TABLE ".tablename('wx_school_type')." ADD   `parentid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID,0为第一级'");}
if(!pdo_fieldexists('wx_school_type','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_type')." ADD   `ssort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序'");}
if(!pdo_fieldexists('wx_school_type','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_type')." ADD   `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '显示状态'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_upsence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `sencetime` int(11) NOT NULL,
  `qxfzid` int(11) NOT NULL,
  `createtime` int(11) NOT NULL,
  `ali_vod_id` varchar(100) DEFAULT '' COMMENT '视频画面ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_upsence','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_upsence')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_upsence','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_upsence')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_upsence','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_upsence')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_upsence','name')) {pdo_query("ALTER TABLE ".tablename('wx_school_upsence')." ADD   `name` varchar(500) NOT NULL");}
if(!pdo_fieldexists('wx_school_upsence','sencetime')) {pdo_query("ALTER TABLE ".tablename('wx_school_upsence')." ADD   `sencetime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_upsence','qxfzid')) {pdo_query("ALTER TABLE ".tablename('wx_school_upsence')." ADD   `qxfzid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_upsence','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_upsence')." ADD   `createtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_upsence','ali_vod_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_upsence')." ADD   `ali_vod_id` varchar(100) DEFAULT '' COMMENT '视频画面ID'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学生ID',
  `tid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '老师ID',
  `weid` int(10) unsigned NOT NULL COMMENT '公众号ID',
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `uid` int(10) unsigned NOT NULL COMMENT '微擎系统memberID',
  `openid` varchar(30) NOT NULL COMMENT 'openid',
  `userinfo` text COMMENT '用户信息',
  `pard` int(1) unsigned NOT NULL COMMENT '关系',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户状态',
  `is_allowmsg` tinyint(1) NOT NULL DEFAULT '1' COMMENT '私聊信息接收语法',
  `is_frist` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1首次2不是',
  `realname` varchar(200) DEFAULT NULL COMMENT '用户真实姓名',
  `mobile` char(11) DEFAULT NULL COMMENT '手机号',
  `superior_tid` int(10) unsigned NOT NULL COMMENT '招生tid',
  `com_from` tinyint(1) DEFAULT '0' COMMENT '1营销0正常',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_user','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_user','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD   `sid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学生ID'");}
if(!pdo_fieldexists('wx_school_user','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD   `tid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '老师ID'");}
if(!pdo_fieldexists('wx_school_user','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD   `weid` int(10) unsigned NOT NULL COMMENT '公众号ID'");}
if(!pdo_fieldexists('wx_school_user','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_user','uid')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD   `uid` int(10) unsigned NOT NULL COMMENT '微擎系统memberID'");}
if(!pdo_fieldexists('wx_school_user','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD   `openid` varchar(30) NOT NULL COMMENT 'openid'");}
if(!pdo_fieldexists('wx_school_user','userinfo')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD   `userinfo` text COMMENT '用户信息'");}
if(!pdo_fieldexists('wx_school_user','pard')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD   `pard` int(1) unsigned NOT NULL COMMENT '关系'");}
if(!pdo_fieldexists('wx_school_user','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD   `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户状态'");}
if(!pdo_fieldexists('wx_school_user','is_allowmsg')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD   `is_allowmsg` tinyint(1) NOT NULL DEFAULT '1' COMMENT '私聊信息接收语法'");}
if(!pdo_fieldexists('wx_school_user','is_frist')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD   `is_frist` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1首次2不是'");}
if(!pdo_fieldexists('wx_school_user','realname')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD   `realname` varchar(200) DEFAULT NULL COMMENT '用户真实姓名'");}
if(!pdo_fieldexists('wx_school_user','mobile')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD   `mobile` char(11) DEFAULT NULL COMMENT '手机号'");}
if(!pdo_fieldexists('wx_school_user','superior_tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD   `superior_tid` int(10) unsigned NOT NULL COMMENT '招生tid'");}
if(!pdo_fieldexists('wx_school_user','com_from')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD   `com_from` tinyint(1) DEFAULT '0' COMMENT '1营销0正常'");}
if(!pdo_fieldexists('wx_school_user','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_user')." ADD   `createtime` int(10) unsigned NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_user_class` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `sid` int(10) unsigned NOT NULL,
  `bj_id` int(10) unsigned NOT NULL,
  `km_id` int(10) unsigned NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1老师2学生',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_user_class','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_user_class')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_user_class','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_user_class')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_user_class','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_user_class')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_user_class','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_user_class')." ADD   `tid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_user_class','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_user_class')." ADD   `sid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_user_class','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_user_class')." ADD   `bj_id` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_user_class','km_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_user_class')." ADD   `km_id` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_user_class','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_user_class')." ADD   `type` tinyint(1) NOT NULL COMMENT '1老师2学生'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_wxappset` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `fromweid` int(10) unsigned NOT NULL COMMENT '所属公众号',
  `headtitle` varchar(50) NOT NULL COMMENT '顶部标题',
  `headcolor` varchar(10) NOT NULL COMMENT '顶部背景颜色',
  `headfont` varchar(10) NOT NULL COMMENT '顶部字体颜色',
  `imgname` varchar(50) NOT NULL COMMENT '图标名',
  `loginimg` varchar(1000) NOT NULL COMMENT '图标地址',
  `imgfontcolor` varchar(10) NOT NULL COMMENT '图标名颜色',
  `btnname` varchar(50) NOT NULL COMMENT '按钮名',
  `btncolor` varchar(1000) NOT NULL COMMENT '按钮框颜色',
  `btnfontcolor` varchar(10) NOT NULL COMMENT '按钮名字体颜色',
  `copyright` varchar(1000) NOT NULL COMMENT '版权',
  `copyrightfontcolor` varchar(10) NOT NULL COMMENT '版权字体颜色',
  `loginbgcolor` varchar(10) NOT NULL COMMENT '背景颜色',
  `loginbgimg` varchar(1000) NOT NULL COMMENT '背景图片',
  `bgtype` int(1) NOT NULL COMMENT '背景模式',
  `show_list` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_wxappset','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_wxappset','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_wxappset','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_wxappset','fromweid')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `fromweid` int(10) unsigned NOT NULL COMMENT '所属公众号'");}
if(!pdo_fieldexists('wx_school_wxappset','headtitle')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `headtitle` varchar(50) NOT NULL COMMENT '顶部标题'");}
if(!pdo_fieldexists('wx_school_wxappset','headcolor')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `headcolor` varchar(10) NOT NULL COMMENT '顶部背景颜色'");}
if(!pdo_fieldexists('wx_school_wxappset','headfont')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `headfont` varchar(10) NOT NULL COMMENT '顶部字体颜色'");}
if(!pdo_fieldexists('wx_school_wxappset','imgname')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `imgname` varchar(50) NOT NULL COMMENT '图标名'");}
if(!pdo_fieldexists('wx_school_wxappset','loginimg')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `loginimg` varchar(1000) NOT NULL COMMENT '图标地址'");}
if(!pdo_fieldexists('wx_school_wxappset','imgfontcolor')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `imgfontcolor` varchar(10) NOT NULL COMMENT '图标名颜色'");}
if(!pdo_fieldexists('wx_school_wxappset','btnname')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `btnname` varchar(50) NOT NULL COMMENT '按钮名'");}
if(!pdo_fieldexists('wx_school_wxappset','btncolor')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `btncolor` varchar(1000) NOT NULL COMMENT '按钮框颜色'");}
if(!pdo_fieldexists('wx_school_wxappset','btnfontcolor')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `btnfontcolor` varchar(10) NOT NULL COMMENT '按钮名字体颜色'");}
if(!pdo_fieldexists('wx_school_wxappset','copyright')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `copyright` varchar(1000) NOT NULL COMMENT '版权'");}
if(!pdo_fieldexists('wx_school_wxappset','copyrightfontcolor')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `copyrightfontcolor` varchar(10) NOT NULL COMMENT '版权字体颜色'");}
if(!pdo_fieldexists('wx_school_wxappset','loginbgcolor')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `loginbgcolor` varchar(10) NOT NULL COMMENT '背景颜色'");}
if(!pdo_fieldexists('wx_school_wxappset','loginbgimg')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `loginbgimg` varchar(1000) NOT NULL COMMENT '背景图片'");}
if(!pdo_fieldexists('wx_school_wxappset','bgtype')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `bgtype` int(1) NOT NULL COMMENT '背景模式'");}
if(!pdo_fieldexists('wx_school_wxappset','show_list')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxappset')." ADD   `show_list` tinyint(1) NOT NULL DEFAULT '1'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_wxpay` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `5qing` varchar(30) NOT NULL DEFAULT '0' COMMENT '订单ID',
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID',
  `orderid` int(10) unsigned NOT NULL COMMENT '返回订单ID',
  `od1` int(10) unsigned NOT NULL COMMENT '1',
  `od2` int(10) unsigned NOT NULL COMMENT '2',
  `od3` int(10) unsigned NOT NULL COMMENT '3',
  `od4` int(10) unsigned NOT NULL COMMENT '4',
  `od5` int(10) unsigned NOT NULL COMMENT '5',
  `cose` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `payweid` int(10) unsigned NOT NULL COMMENT '支付公众号',
  `openid` varchar(30) NOT NULL COMMENT 'openid',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1未支付2为未支付3为已退款',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=441 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_wxpay','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxpay')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_wxpay','5qing')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxpay')." ADD   `5qing` varchar(30) NOT NULL DEFAULT '0' COMMENT '订单ID'");}
if(!pdo_fieldexists('wx_school_wxpay','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxpay')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_wxpay','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxpay')." ADD   `schoolid` int(10) unsigned NOT NULL COMMENT '学校ID'");}
if(!pdo_fieldexists('wx_school_wxpay','orderid')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxpay')." ADD   `orderid` int(10) unsigned NOT NULL COMMENT '返回订单ID'");}
if(!pdo_fieldexists('wx_school_wxpay','od1')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxpay')." ADD   `od1` int(10) unsigned NOT NULL COMMENT '1'");}
if(!pdo_fieldexists('wx_school_wxpay','od2')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxpay')." ADD   `od2` int(10) unsigned NOT NULL COMMENT '2'");}
if(!pdo_fieldexists('wx_school_wxpay','od3')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxpay')." ADD   `od3` int(10) unsigned NOT NULL COMMENT '3'");}
if(!pdo_fieldexists('wx_school_wxpay','od4')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxpay')." ADD   `od4` int(10) unsigned NOT NULL COMMENT '4'");}
if(!pdo_fieldexists('wx_school_wxpay','od5')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxpay')." ADD   `od5` int(10) unsigned NOT NULL COMMENT '5'");}
if(!pdo_fieldexists('wx_school_wxpay','cose')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxpay')." ADD   `cose` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '价格'");}
if(!pdo_fieldexists('wx_school_wxpay','payweid')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxpay')." ADD   `payweid` int(10) unsigned NOT NULL COMMENT '支付公众号'");}
if(!pdo_fieldexists('wx_school_wxpay','openid')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxpay')." ADD   `openid` varchar(30) NOT NULL COMMENT 'openid'");}
if(!pdo_fieldexists('wx_school_wxpay','status')) {pdo_query("ALTER TABLE ".tablename('wx_school_wxpay')." ADD   `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1未支付2为未支付3为已退款'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_yuecostlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `yue_type` tinyint(3) NOT NULL COMMENT '1补助余额2普通余额3充电桩',
  `cost` float(8,2) NOT NULL,
  `costtime` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `cost_type` tinyint(3) NOT NULL COMMENT '1收入2消费',
  `macid` varchar(100) NOT NULL,
  `on_offline` tinyint(3) NOT NULL COMMENT '1线上2线下',
  `createtime` int(11) NOT NULL,
  `cztid` int(11) NOT NULL COMMENT '操作tid',
  `off_fid` varchar(70) NOT NULL COMMENT '线下流水fid',
  `paykind` tinyint(3) NOT NULL,
  `aftermoney` float(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_yuecostlog','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_yuecostlog')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_yuecostlog','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_yuecostlog')." ADD   `schoolid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_yuecostlog','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_yuecostlog')." ADD   `weid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_yuecostlog','sid')) {pdo_query("ALTER TABLE ".tablename('wx_school_yuecostlog')." ADD   `sid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_yuecostlog','yue_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_yuecostlog')." ADD   `yue_type` tinyint(3) NOT NULL COMMENT '1补助余额2普通余额3充电桩'");}
if(!pdo_fieldexists('wx_school_yuecostlog','cost')) {pdo_query("ALTER TABLE ".tablename('wx_school_yuecostlog')." ADD   `cost` float(8,2) NOT NULL");}
if(!pdo_fieldexists('wx_school_yuecostlog','costtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_yuecostlog')." ADD   `costtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_yuecostlog','orderid')) {pdo_query("ALTER TABLE ".tablename('wx_school_yuecostlog')." ADD   `orderid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_yuecostlog','cost_type')) {pdo_query("ALTER TABLE ".tablename('wx_school_yuecostlog')." ADD   `cost_type` tinyint(3) NOT NULL COMMENT '1收入2消费'");}
if(!pdo_fieldexists('wx_school_yuecostlog','macid')) {pdo_query("ALTER TABLE ".tablename('wx_school_yuecostlog')." ADD   `macid` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_yuecostlog','on_offline')) {pdo_query("ALTER TABLE ".tablename('wx_school_yuecostlog')." ADD   `on_offline` tinyint(3) NOT NULL COMMENT '1线上2线下'");}
if(!pdo_fieldexists('wx_school_yuecostlog','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_yuecostlog')." ADD   `createtime` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_school_yuecostlog','cztid')) {pdo_query("ALTER TABLE ".tablename('wx_school_yuecostlog')." ADD   `cztid` int(11) NOT NULL COMMENT '操作tid'");}
if(!pdo_fieldexists('wx_school_yuecostlog','off_fid')) {pdo_query("ALTER TABLE ".tablename('wx_school_yuecostlog')." ADD   `off_fid` varchar(70) NOT NULL COMMENT '线下流水fid'");}
if(!pdo_fieldexists('wx_school_yuecostlog','paykind')) {pdo_query("ALTER TABLE ".tablename('wx_school_yuecostlog')." ADD   `paykind` tinyint(3) NOT NULL");}
if(!pdo_fieldexists('wx_school_yuecostlog','aftermoney')) {pdo_query("ALTER TABLE ".tablename('wx_school_yuecostlog')." ADD   `aftermoney` float(8,2) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_zjh` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `is_on` tinyint(1) NOT NULL DEFAULT '1',
  `picrul` varchar(1000) NOT NULL,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `planuid` varchar(37) NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `bj_id` int(10) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1图片2文字',
  `start` int(10) unsigned NOT NULL,
  `end` int(10) unsigned NOT NULL,
  `ssort` int(10) unsigned NOT NULL COMMENT '排序',
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_zjh','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjh')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_zjh','is_on')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjh')." ADD   `is_on` tinyint(1) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_school_zjh','picrul')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjh')." ADD   `picrul` varchar(1000) NOT NULL");}
if(!pdo_fieldexists('wx_school_zjh','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjh')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_zjh','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjh')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_zjh','planuid')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjh')." ADD   `planuid` varchar(37) NOT NULL");}
if(!pdo_fieldexists('wx_school_zjh','tid')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjh')." ADD   `tid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_zjh','bj_id')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjh')." ADD   `bj_id` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_school_zjh','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjh')." ADD   `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1图片2文字'");}
if(!pdo_fieldexists('wx_school_zjh','start')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjh')." ADD   `start` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_zjh','end')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjh')." ADD   `end` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_zjh','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjh')." ADD   `ssort` int(10) unsigned NOT NULL COMMENT '排序'");}
if(!pdo_fieldexists('wx_school_zjh','createtime')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjh')." ADD   `createtime` int(10) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_zjhdetail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `planuid` varchar(37) NOT NULL,
  `curactivename` varchar(100) NOT NULL,
  `detailuid` varchar(37) NOT NULL,
  `curactiveid` varchar(100) NOT NULL,
  `activedesc` text COMMENT '内容',
  `week` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1-5',
  `ssort` int(10) unsigned NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_zjhdetail','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhdetail')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_zjhdetail','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhdetail')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_zjhdetail','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhdetail')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_zjhdetail','planuid')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhdetail')." ADD   `planuid` varchar(37) NOT NULL");}
if(!pdo_fieldexists('wx_school_zjhdetail','curactivename')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhdetail')." ADD   `curactivename` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_zjhdetail','detailuid')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhdetail')." ADD   `detailuid` varchar(37) NOT NULL");}
if(!pdo_fieldexists('wx_school_zjhdetail','curactiveid')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhdetail')." ADD   `curactiveid` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_zjhdetail','activedesc')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhdetail')." ADD   `activedesc` text COMMENT '内容'");}
if(!pdo_fieldexists('wx_school_zjhdetail','week')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhdetail')." ADD   `week` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1-5'");}
if(!pdo_fieldexists('wx_school_zjhdetail','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhdetail')." ADD   `ssort` int(10) unsigned NOT NULL COMMENT '排序'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_school_zjhset` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `schoolid` int(10) unsigned NOT NULL,
  `planuid` varchar(37) NOT NULL,
  `activetypeid` varchar(100) NOT NULL,
  `curactiveid` varchar(100) NOT NULL,
  `activetypename` varchar(30) DEFAULT '' COMMENT '名称',
  `type` varchar(2) DEFAULT '' COMMENT 'AM,PM',
  `ssort` int(10) unsigned NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_school_zjhset','id')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhset')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_school_zjhset','weid')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhset')." ADD   `weid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_zjhset','schoolid')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhset')." ADD   `schoolid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wx_school_zjhset','planuid')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhset')." ADD   `planuid` varchar(37) NOT NULL");}
if(!pdo_fieldexists('wx_school_zjhset','activetypeid')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhset')." ADD   `activetypeid` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_zjhset','curactiveid')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhset')." ADD   `curactiveid` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_school_zjhset','activetypename')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhset')." ADD   `activetypename` varchar(30) DEFAULT '' COMMENT '名称'");}
if(!pdo_fieldexists('wx_school_zjhset','type')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhset')." ADD   `type` varchar(2) DEFAULT '' COMMENT 'AM,PM'");}
if(!pdo_fieldexists('wx_school_zjhset','ssort')) {pdo_query("ALTER TABLE ".tablename('wx_school_zjhset')." ADD   `ssort` int(10) unsigned NOT NULL COMMENT '排序'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_sucai_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_sucai_article','id')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_article')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_sucai_article','title')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_article')." ADD   `title` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_sucai_article','description')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_article')." ADD   `description` text NOT NULL");}
if(!pdo_fieldexists('wx_sucai_article','pic')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_article')." ADD   `pic` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_sucai_article','link')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_article')." ADD   `link` varchar(255) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_sucai_atl_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `uniacid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_sucai_atl_cats','id')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_atl_cats')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_sucai_atl_cats','title')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_atl_cats')." ADD   `title` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_sucai_atl_cats','article')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_atl_cats')." ADD   `article` text NOT NULL");}
if(!pdo_fieldexists('wx_sucai_atl_cats','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_atl_cats')." ADD   `uniacid` int(10) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_sucai_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `media_id` varchar(255) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_sucai_relation','id')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_relation')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_sucai_relation','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_relation')." ADD   `uniacid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_sucai_relation','media_id')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_relation')." ADD   `media_id` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_sucai_relation','cat_id')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_relation')." ADD   `cat_id` varchar(255) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_sucai_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `setting_key` varchar(255) NOT NULL,
  `setting_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_sucai_setting','id')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_setting')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_sucai_setting','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_setting')." ADD   `uniacid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_sucai_setting','setting_key')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_setting')." ADD   `setting_key` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_sucai_setting','setting_value')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_setting')." ADD   `setting_value` text NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_sucai_shelf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slides` varchar(255) NOT NULL,
  `atl_cats` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_sucai_shelf','id')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_shelf')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_sucai_shelf','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_shelf')." ADD   `uniacid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_sucai_shelf','title')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_shelf')." ADD   `title` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_sucai_shelf','slides')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_shelf')." ADD   `slides` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_sucai_shelf','atl_cats')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_shelf')." ADD   `atl_cats` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_sucai_shelf','link')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_shelf')." ADD   `link` varchar(255) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wx_sucai_slides` (
  `slides_id` int(11) NOT NULL AUTO_INCREMENT,
  `show_sort` int(10) DEFAULT '0',
  `uniacid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`slides_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_sucai_slides','slides_id')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_slides')." ADD 
  `slides_id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_sucai_slides','show_sort')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_slides')." ADD   `show_sort` int(10) DEFAULT '0'");}
if(!pdo_fieldexists('wx_sucai_slides','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_slides')." ADD   `uniacid` int(10) NOT NULL");}
if(!pdo_fieldexists('wx_sucai_slides','name')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_slides')." ADD   `name` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_sucai_slides','thumb')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_slides')." ADD   `thumb` varchar(255) NOT NULL");}
if(!pdo_fieldexists('wx_sucai_slides','description')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_slides')." ADD   `description` varchar(255) DEFAULT NULL");}
if(!pdo_fieldexists('wx_sucai_slides','link')) {pdo_query("ALTER TABLE ".tablename('wx_sucai_slides')." ADD   `link` varchar(255) DEFAULT NULL");}

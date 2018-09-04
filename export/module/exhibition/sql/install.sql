-- -----------------------------
-- 导出时间 `2018-04-17 14:08:38`
-- -----------------------------

-- -----------------------------
-- 表结构 `dp_exhibition_detail`
-- -----------------------------
DROP TABLE IF EXISTS `dp_exhibition_detail`;
CREATE TABLE `dp_exhibition_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '展会名称',
  `content` longtext NOT NULL COMMENT '会展内容',
  `author` varchar(32) NOT NULL DEFAULT '' COMMENT '信息发布人',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `type` varchar(11) NOT NULL DEFAULT '1' COMMENT '展会类型',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `picture` varchar(128) NOT NULL COMMENT '图片集',
  `city_id` int(11) unsigned NOT NULL COMMENT '城市ID',
  `view` int(11) unsigned NOT NULL COMMENT '点击量',
  `startime` int(11) NOT NULL COMMENT '展会开始时间',
  `endtime` int(11) NOT NULL COMMENT '展会结束时间',
  `organizer` varchar(128) NOT NULL,
  `venues` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `photos` varchar(256) NOT NULL,
  `area` int(11) NOT NULL DEFAULT '0',
  `range` longtext NOT NULL,
  `space` int(1) NOT NULL,
  `telephone` varchar(11) NOT NULL DEFAULT '',
  `ename` varchar(64) NOT NULL,
  `lat` varchar(128) NOT NULL,
  `lng` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=888 DEFAULT CHARSET=utf8 COMMENT='会展详情表';


-- -----------------------------
-- 表结构 `dp_exhibition_classification`
-- -----------------------------
DROP TABLE IF EXISTS `dp_exhibition_classification`;
CREATE TABLE `dp_exhibition_classification` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '类别名称',
  `c_status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '类别状态',
  `c_icon` varchar(64) NOT NULL DEFAULT '' COMMENT '会展图标',
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '会展主分类',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8 COMMENT='会展类别表';


-- -----------------------------
-- 表结构 `dp_exhibition_district`
-- -----------------------------
DROP TABLE IF EXISTS `dp_exhibition_district`;
CREATE TABLE `dp_exhibition_district` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `pid` int(11) unsigned DEFAULT '0' COMMENT '父ID',
  `path` varchar(255) DEFAULT NULL COMMENT '路径',
  `level` int(11) unsigned DEFAULT NULL COMMENT '层级',
  `name` varchar(255) DEFAULT NULL COMMENT '中文名称',
  `name_en` varchar(255) DEFAULT NULL COMMENT '英文名称',
  `name_pinyin` varchar(255) DEFAULT NULL COMMENT '中文拼音',
  `code` varchar(50) DEFAULT NULL COMMENT '代码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=255 DEFAULT CHARSET=utf8 COMMENT='会展分区表';


-- -----------------------------
-- 表结构 `dp_city`
-- -----------------------------
DROP TABLE IF EXISTS `dp_city`;
CREATE TABLE `dp_city` (
  `id` int(7) NOT NULL COMMENT '主键',
  `name` varchar(40) DEFAULT NULL COMMENT '省市区名称',
  `pid` int(7) DEFAULT NULL COMMENT '上级ID',
  `shortname` varchar(40) DEFAULT NULL COMMENT '简称',
  `leveltype` tinyint(2) DEFAULT NULL COMMENT '级别:0,中国；1，省分；2，市；3，区、县',
  `citycode` varchar(7) DEFAULT NULL COMMENT '城市代码',
  `zipcode` varchar(7) DEFAULT NULL COMMENT '邮编',
  `lng` varchar(20) DEFAULT NULL COMMENT '经度',
  `lat` varchar(20) DEFAULT NULL COMMENT '纬度',
  `pinyin` varchar(40) DEFAULT NULL COMMENT '拼音',
  `status` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- -----------------------------
-- 导出时间 `2017-10-17 14:50:59`
-- -----------------------------

-- -----------------------------
-- 表结构 `dp_exhibition_detail`
-- -----------------------------
DROP TABLE IF EXISTS `dp_exhibition_detail`;
CREATE TABLE `dp_exhibition_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '展会名称',
  `content` text NOT NULL COMMENT '会展内容',
  `author` varchar(32) NOT NULL DEFAULT '' COMMENT '信息发布人',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `area` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '展会区域',
  `type` tinyint(2) NOT NULL DEFAULT '1' COMMENT '展会类型',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `pictures` varchar(64) NOT NULL COMMENT '图片集',
  `city_id` int(11) unsigned NOT NULL COMMENT '城市ID',
  `view` int(11) unsigned NOT NULL COMMENT '点击量',
  `startime` date DEFAULT NULL COMMENT '展会开始时间',
  `endtime` date DEFAULT NULL COMMENT '展会结束时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会展详情表';



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会展类别表';


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会展分区表';

-- ----------------------------
-- Table structure for `dp_exhibition_venues`
-- ----------------------------
DROP TABLE IF EXISTS `dp_exhibition_venues`;
CREATE TABLE `dp_exhibition_venues` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(64) NOT NULL COMMENT '展馆名称',
  `city_id` int(11) unsigned NOT NULL COMMENT '展馆所属城市',
  `content` longtext NOT NULL COMMENT '展馆介绍',
  `pictures` varchar(128) NOT NULL COMMENT '展馆图片',
  `status` int(2) unsigned NOT NULL COMMENT '展馆状态',
  `acreage` int(11) unsigned NOT NULL COMMENT '展馆面积',
  `phone` varchar(32) NOT NULL COMMENT '展馆联系方式',
  `address` varchar(64) NOT NULL COMMENT '展馆地址',
  `website` varchar(32) NOT NULL COMMENT '展馆网址',
  `author` int(11) unsigned NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='展馆详情表';

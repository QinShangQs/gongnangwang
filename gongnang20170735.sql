/*
Navicat MySQL Data Transfer

Source Server         : 共囊网-生产环境-慎重
Source Server Version : 50631
Source Host           : 139.196.50.245:3306
Source Database       : gongnang

Target Server Type    : MYSQL
Target Server Version : 50631
File Encoding         : 65001

Date: 2017-03-05 16:06:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for gon_activity
-- ----------------------------
DROP TABLE IF EXISTS `gon_activity`;
CREATE TABLE `gon_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `act_name` varchar(20) DEFAULT NULL,
  `act_address` varchar(50) DEFAULT NULL,
  `act_start` varchar(20) DEFAULT NULL,
  `act_end` varchar(20) DEFAULT NULL,
  `act_photo` varchar(50) DEFAULT NULL,
  `act_people_num` varchar(20) DEFAULT NULL,
  `act_class` varchar(10) DEFAULT NULL,
  `act_format` varchar(10) DEFAULT NULL,
  `act_sign` varchar(50) DEFAULT NULL,
  `act_content` text,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for gon_auction
-- ----------------------------
DROP TABLE IF EXISTS `gon_auction`;
CREATE TABLE `gon_auction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auc_name` varchar(20) DEFAULT NULL,
  `auc_type` int(1) DEFAULT NULL,
  `auc_photo` varchar(50) DEFAULT NULL,
  `auc_number` varchar(50) DEFAULT NULL,
  `auc_term` varchar(20) DEFAULT NULL,
  `auc_product_type` varchar(10) DEFAULT NULL,
  `auc_industry` varchar(10) DEFAULT NULL,
  `auc_content` varchar(50) DEFAULT NULL,
  `auc_product_display` varchar(50) DEFAULT NULL,
  `auc_price_type` int(1) DEFAULT NULL,
  `auc_price` int(8) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for gon_auth
-- ----------------------------
DROP TABLE IF EXISTS `gon_auth`;
CREATE TABLE `gon_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '认证自增id',
  `name` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `idcard` varchar(50) DEFAULT NULL COMMENT '身份证号',
  `idcard_photo` varchar(100) DEFAULT NULL COMMENT '身份证照片',
  `email` varchar(50) DEFAULT NULL COMMENT '有效邮箱',
  `license_photo` varchar(100) DEFAULT NULL COMMENT '营业执照待审核照片',
  `identity_photo` varchar(100) DEFAULT NULL COMMENT '身份照片',
  `wechat` varchar(50) DEFAULT NULL COMMENT '微信号',
  `phone` varchar(20) DEFAULT NULL COMMENT '手机号',
  `look` int(1) DEFAULT NULL COMMENT '审核状态0未审核1审核中2审核成功3审核失败',
  `fail_reason` varchar(100) DEFAULT NULL COMMENT '审核失败原因',
  `user_id` int(11) DEFAULT NULL COMMENT '用户关联id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for gon_contact
-- ----------------------------
DROP TABLE IF EXISTS `gon_contact`;
CREATE TABLE `gon_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `con_phone` char(11) DEFAULT NULL,
  `con_wechat` varchar(20) DEFAULT NULL,
  `con_qqnumber` char(11) DEFAULT NULL,
  `con_email` varchar(30) DEFAULT NULL,
  `auc_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for gon_identity
-- ----------------------------
DROP TABLE IF EXISTS `gon_identity`;
CREATE TABLE `gon_identity` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `identity_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for gon_job_delivers
-- ----------------------------
DROP TABLE IF EXISTS `gon_job_delivers`;
CREATE TABLE `gon_job_delivers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '投递人用户ID',
  `extend_id` int(11) NOT NULL COMMENT '岗位ID',
  `par_id` int(11) NOT NULL COMMENT '合伙人ID',
  `resume` varchar(200) DEFAULT '' COMMENT '简历地址',
  `add_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '投递时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='岗位投递记录表';

-- ----------------------------
-- Table structure for gon_partner
-- ----------------------------
DROP TABLE IF EXISTS `gon_partner`;
CREATE TABLE `gon_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `par_title` varchar(30) DEFAULT NULL,
  `par_proname` varchar(30) DEFAULT NULL,
  `par_protype` int(1) DEFAULT NULL,
  `par_website` varchar(30) DEFAULT NULL,
  `par_logo` varchar(200) DEFAULT NULL,
  `par_team` int(5) DEFAULT NULL,
  `par_finance` int(1) DEFAULT NULL,
  `par_address` varchar(50) DEFAULT NULL,
  `par_video` varchar(200) DEFAULT NULL,
  `par_datetime` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for gon_partner_comment
-- ----------------------------
DROP TABLE IF EXISTS `gon_partner_comment`;
CREATE TABLE `gon_partner_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com_content` varchar(50) DEFAULT NULL,
  `par_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for gon_partner_extend
-- ----------------------------
DROP TABLE IF EXISTS `gon_partner_extend`;
CREATE TABLE `gon_partner_extend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `par_position` varchar(30) DEFAULT NULL,
  `par_work` int(1) DEFAULT NULL,
  `par_education` int(1) DEFAULT NULL,
  `par_age` int(1) DEFAULT NULL,
  `par_mode` int(1) DEFAULT NULL,
  `par_pay_type` int(1) DEFAULT NULL,
  `par_pay` varchar(20) DEFAULT NULL,
  `par_return_type` int(1) DEFAULT NULL,
  `par_return` varchar(20) DEFAULT NULL,
  `par_duty` text,
  `par_ask` text,
  `par_browse` int(11) DEFAULT '0',
  `par_datetime` datetime DEFAULT NULL,
  `par_id` int(11) DEFAULT NULL,
  `line_status` varchar(3) DEFAULT 'off' COMMENT '上下线',
  `publish_status` tinyint(1) DEFAULT '1' COMMENT '发布状态 1申请 2通过 3拒绝 4重新申请',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for gon_partner_job_audit
-- ----------------------------
DROP TABLE IF EXISTS `gon_partner_job_audit`;
CREATE TABLE `gon_partner_job_audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extend_id` int(11) NOT NULL COMMENT '岗位ID',
  `par_id` int(11) DEFAULT '0' COMMENT '合伙人ID',
  `old_publish_status` tinyint(4) NOT NULL COMMENT '原发布状态',
  `new_publish_status` tinyint(4) NOT NULL COMMENT '新发布状态',
  `remark` varchar(50) DEFAULT '' COMMENT '审核备注',
  `add_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='岗位审核记录表';

-- ----------------------------
-- Table structure for gon_project
-- ----------------------------
DROP TABLE IF EXISTS `gon_project`;
CREATE TABLE `gon_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(20) DEFAULT NULL,
  `pro_logo` varchar(100) DEFAULT NULL,
  `pro_content` text,
  `pro_address` varchar(50) DEFAULT NULL,
  `pro_state` int(1) DEFAULT NULL,
  `pro_stage` int(1) DEFAULT NULL,
  `pro_valuation` int(10) DEFAULT NULL,
  `pro_return` int(2) DEFAULT NULL,
  `pro_target` int(5) DEFAULT NULL,
  `pro_value` int(1) DEFAULT NULL,
  `pro_type` int(2) DEFAULT NULL,
  `pro_picture` varchar(100) DEFAULT NULL,
  `pro_advisor` varchar(30) DEFAULT NULL,
  `pro_advisornum` int(5) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pro_publish_status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for gon_project_audit
-- ----------------------------
DROP TABLE IF EXISTS `gon_project_audit`;
CREATE TABLE `gon_project_audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL COMMENT '众筹ID',
  `old_publish_status` tinyint(4) NOT NULL COMMENT '原发布状态',
  `new_publish_status` tinyint(4) NOT NULL COMMENT '新发布状态',
  `remark` varchar(50) DEFAULT '' COMMENT '申请备注',
  `add_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for gon_project_extend
-- ----------------------------
DROP TABLE IF EXISTS `gon_project_extend`;
CREATE TABLE `gon_project_extend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bus_video` varchar(100) DEFAULT NULL,
  `bus_userdata` varchar(50) DEFAULT NULL,
  `bus_profit` varchar(50) DEFAULT NULL,
  `bus_other` varchar(50) DEFAULT NULL,
  `bus_operate` varchar(50) DEFAULT NULL,
  `tea_video` varchar(100) DEFAULT NULL,
  `tea_core` varchar(50) DEFAULT NULL,
  `tea_num` int(6) DEFAULT NULL,
  `tea_tutor` varchar(20) DEFAULT NULL,
  `tea_adviser` varchar(20) DEFAULT NULL,
  `roa_video` varchar(100) DEFAULT NULL,
  `roa_guest` varchar(50) DEFAULT NULL,
  `att_name` varchar(100) DEFAULT NULL,
  `pro_datetime` datetime DEFAULT NULL,
  `pro_look` int(1) DEFAULT '0',
  `pro_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for gon_user
-- ----------------------------
DROP TABLE IF EXISTS `gon_user`;
CREATE TABLE `gon_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for gon_userinfo
-- ----------------------------
DROP TABLE IF EXISTS `gon_userinfo`;
CREATE TABLE `gon_userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(20) DEFAULT NULL,
  `age` int(1) DEFAULT NULL,
  `identity` int(1) DEFAULT NULL,
  `company` varchar(20) DEFAULT NULL,
  `posts` varchar(20) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `worklife` int(1) DEFAULT NULL,
  `sign` varchar(200) DEFAULT NULL,
  `resume` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `video` varchar(200) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `look` int(1) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=gbk;

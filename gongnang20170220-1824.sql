/*
Navicat MySQL Data Transfer

Source Server         : gongnang
Source Server Version : 50631
Source Host           : 139.196.50.245:3306
Source Database       : gongnang

Target Server Type    : MYSQL
Target Server Version : 50631
File Encoding         : 65001

Date: 2017-02-20 18:24:24
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
-- Records of gon_activity
-- ----------------------------

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
-- Records of gon_auction
-- ----------------------------

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
-- Records of gon_auth
-- ----------------------------

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
-- Records of gon_contact
-- ----------------------------

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
-- Records of gon_identity
-- ----------------------------

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
  `par_logo` varchar(50) DEFAULT NULL,
  `par_team` int(5) DEFAULT NULL,
  `par_finance` int(1) DEFAULT NULL,
  `par_address` varchar(50) DEFAULT NULL,
  `par_video` varchar(150) DEFAULT NULL,
  `par_datetime` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of gon_partner
-- ----------------------------
INSERT INTO `gon_partner` VALUES ('1', '创业的路程，征程的路上，我们一起奔跑吧！', '落花', '1', 'www.gongnang.com', 'picture/ren/2e3cd9191ba42b9737e6e14348bc57fb.jpg', '1', '1', '北京市,北京市,海淀区', 'http://oh8ny9g1a.bkt.clouddn.com/c6a1d629d0cbfb912dda3c73b9cddb57.mp4', '2016-12-21 14:19:18', '24');
INSERT INTO `gon_partner` VALUES ('2', '共囊网', '共囊网1', '2', 'www.gongnang.com', 'picture/ren/156d63e22287cad3c868b2c1ad1295fc.png', '1', '1', '北京市,北京市,海淀区', 'http://oh8ny9g1a.bkt.clouddn.com/48a411fb753fc4bd1b9782fac7d9d598.mp4', '2016-12-15 16:20:57', '11');
INSERT INTO `gon_partner` VALUES ('3', '创业大平台', '共囊网', '1', 'www.gongnang.com', 'picture/ren/fe3d6801609a77945a88532bc2d922ab.png', '1', '1', '北京市,北京市,海淀区', 'http://oh8ny9g1a.bkt.clouddn.com/b21556acbaa4174d24302960892ac18f.mp4', '2016-12-20 10:34:07', '6');
INSERT INTO `gon_partner` VALUES ('4', '你想一起挑战创新创业吗？你想一起征服全球创业者吗？', '共囊网', '1', 'www.gongnang.com', 'picture/ren/a04c850449a33c78fe46c394cc355fb8.jpg', '1', '1', '北京市,北京市,海淀区', 'http://oh8ny9g1a.bkt.clouddn.com/3dffcb40818546325830afa32ae318f5.mp4', '2016-12-20 10:51:24', '10');
INSERT INTO `gon_partner` VALUES ('6', '心里健康的航母需要勇士加入', '心扒客', '1', 'xbkcms.wandiansheng.com', 'picture/ren/288f4163be207297037560a342b728e6.jpg', '1', '1', '北京市,北京市,海淀区', 'http://oh8ny9g1a.bkt.clouddn.com/356a5acbe8793cbae92c0019e2f9ccc1.mp4', '2017-01-16 11:47:30', '29');
INSERT INTO `gon_partner` VALUES ('5', '同我走向一条别人走不了的路，这条路并不拥挤！', '种花德花', '1', 'www.imiq.cn', 'picture/ren/2981b6960146916a1c4d247c745aa3f7.jpg', '1', '2', '北京市,北京市,海淀区', 'http://oh8ny9g1a.bkt.clouddn.com/b1523b8ec925229ec2c7bab71b8658f5.mp4', '2016-12-21 14:21:34', '26');
INSERT INTO `gon_partner` VALUES ('7', '智能公交项目', '智能公交项目', '1', 'www.gongnang.com', 'picture/ren/2b8e1178c1295c53dacc3463016e49ae.png', '1', '2', '北京市,北京市,东城区', 'http://oh8ny9g1a.bkt.clouddn.com/862c675624964b5494f9080e34901351.mp4', '2017-01-16 17:15:33', '30');
INSERT INTO `gon_partner` VALUES ('8', '抑郁症药物创业项目', '抑郁症药物', '1', 'www.gongnang.com', 'picture/ren/02ca6d91349f71ddf075c2931d2f9d59.png', '3', '4', '北京市,北京市,西城区', 'http://oh8ny9g1a.bkt.clouddn.com/1011ff6d8fa326d356a366028a7d2b5e.mp4', '2017-01-16 17:41:27', '31');
INSERT INTO `gon_partner` VALUES ('9', '宠物社交征集合伙人', '宠物社交', '1', 'www.gongnang.com', 'picture/ren/3957f2aca8f8752741c1be632497f04c.png', '1', '2', '北京市,北京市,海淀区', 'http://oh8ny9g1a.bkt.clouddn.com/147900aa10af30918557316f5da2110d.mp4', '2017-01-17 14:25:07', '34');
INSERT INTO `gon_partner` VALUES ('10', '影视项目征集合伙人', '影视后期', '1', 'www.gongnang.com', 'picture/ren/987ee3ddd34ec1d5cb73bd873ef3906e.png', '1', '1', '北京市,北京市,海淀区', 'http://oh8ny9g1a.bkt.clouddn.com/bc465877fa91586f07e1c0b97e7cc90a.mp4', '2017-01-17 16:07:11', '36');
INSERT INTO `gon_partner` VALUES ('11', '汇蜂科技征集合伙人', '汇蜂科技', '1', 'www.gongnang.com', 'picture/ren/ad4b0bed7e4e5f17f5c26bd1d31a84d8.png', '2', '2', '北京市,北京市,海淀区', 'http://oh8ny9g1a.bkt.clouddn.com/f13f0bb7c7ce1654375b33b7761f4ea1.mp4', '2017-01-19 11:10:11', '37');

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
-- Records of gon_partner_comment
-- ----------------------------
INSERT INTO `gon_partner_comment` VALUES ('1', ' 好', '1', '5');
INSERT INTO `gon_partner_comment` VALUES ('2', ' 好', '1', '5');
INSERT INTO `gon_partner_comment` VALUES ('3', ' 好', '1', '5');
INSERT INTO `gon_partner_comment` VALUES ('4', ' ', '1', '16');
INSERT INTO `gon_partner_comment` VALUES ('5', ' ', '5', null);
INSERT INTO `gon_partner_comment` VALUES ('6', ' qw', '5', null);
INSERT INTO `gon_partner_comment` VALUES ('7', ' qw', '5', null);
INSERT INTO `gon_partner_comment` VALUES ('8', '  水电费', '1', '16');
INSERT INTO `gon_partner_comment` VALUES ('9', '好', '3', '5');
INSERT INTO `gon_partner_comment` VALUES ('10', ' h', '3', '5');
INSERT INTO `gon_partner_comment` VALUES ('11', ' 而非', '3', '5');
INSERT INTO `gon_partner_comment` VALUES ('12', ' 而非', '3', '5');
INSERT INTO `gon_partner_comment` VALUES ('13', ' 而非', '3', '5');
INSERT INTO `gon_partner_comment` VALUES ('14', ' 而非', '3', '5');
INSERT INTO `gon_partner_comment` VALUES ('15', ' 而非', '3', '5');
INSERT INTO `gon_partner_comment` VALUES ('16', ' 而非', '3', '5');
INSERT INTO `gon_partner_comment` VALUES ('17', ' ????????', '3', null);

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of gon_partner_extend
-- ----------------------------
INSERT INTO `gon_partner_extend` VALUES ('1', 'php开发', '2', '2', '2', '1', '1', '10K', '1', '0.001', '会php\n负责后台', '团结', '0', '2016-12-15 16:09:19', '1');
INSERT INTO `gon_partner_extend` VALUES ('2', '前端', '1', '1', '2', '1', '1', '8K', '2', '水果', '会js jq\n', '写一些前台页面', '0', '2016-12-15 16:10:25', '1');
INSERT INTO `gon_partner_extend` VALUES ('3', 'web前端', '3', '2', '1', '1', '1', '6-8k', '2', '五险一金', '1.负责Web前端的开发与维护工作 \n2.参与相关产品前端的交互设计和体验优化 \n3.参与Web前沿技术研究和新技术调研 ', '1.精通HTML、CSS、Javascript，熟练掌握jQuery等一种或多种框架，熟悉HTML5和CSS3 \n2.熟悉页面架构和布局，能够解决各种浏览器兼容性问题 \n3.对前端新技术富有激情，对产品有强烈的责任心，沟通顺畅 \n4.具有大型项目开发经验； \n5.专科及以上学历，有三年以上开发经验 ', '0', '2016-12-15 16:23:51', '2');
INSERT INTO `gon_partner_extend` VALUES ('11', 'UI设计', '3', '1', '2', '1', '1', '8K', '1', '5%', '1.负责PC端、移动端web富应用的开发\n2.负责产品易用性改进，交互体验改进，性能提升\n3.研究新兴前端技术，提升产品性能和用户体验', '1.负责PC端、移动端web富应用的开发\n2.负责产品易用性改进，交互体验改进，性能提升\n3.研究新兴前端技术，提升产品性能和用户体验', '0', '2017-01-12 11:39:16', '3');
INSERT INTO `gon_partner_extend` VALUES ('12', '网页设计', '2', '1', '2', '1', '1', '6K', '1', '2%', '1.负责PC端、移动端web富应用的开发\n2.负责产品易用性改进，交互体验改进，性能提升\n3.研究新兴前端技术，提升产品性能和用户体验', '1.负责PC端、移动端web富应用的开发\n2.负责产品易用性改进，交互体验改进，性能提升\n3.研究新兴前端技术，提升产品性能和用户体验', '0', '2017-01-12 11:40:39', '3');
INSERT INTO `gon_partner_extend` VALUES ('5', 'UI设计师', '2', '3', '2', '1', '1', '12', '2', '12', '欧克', '欧克', '0', '2016-12-15 18:02:43', '1');
INSERT INTO `gon_partner_extend` VALUES ('9', '投资副总裁', '1', '4', '1', '1', '1', '8000', '1', '2', '1.负责共囊网整体项目的投融资工作；\n2.负责共囊网整体品牌文化的引导与宣传；\n3.负责所有创新创业者的活动、路演、以及投融资项目的洽谈合作；', '1.要求硕士以上学历；\n2.要求对创业投资有一定认识和了解；\n3.具备较强的文字表达能力和演说演讲能力；', '0', '2016-12-19 10:55:40', '4');
INSERT INTO `gon_partner_extend` VALUES ('10', '3D建模主程主美', '3', '2', '2', '1', '1', '10 ', '1', '10%', '创业心态 有创新思维  有小目标', '有亿万梦想', '0', '2016-12-20 11:18:47', '5');
INSERT INTO `gon_partner_extend` VALUES ('13', 'PHP程序员', '3', '1', '1', '1', '1', '8K', '1', '1', '1、负责协助技术总监进行技术评测，bug处理，代码开发;\n\n　　2、负责网站数据库、栏目、程序模块的设计与开发;\n\n　　3、负责根据公司要求进行erp、oa、crm系统等项目开发;\n\n　　4、定期与培训部和测试部沟通，获取反馈信息并进行相应的处理;\n\n　　5、按时按质完成公司下达程度开发、系统评测等工作任务;\n\n　　6、定期维护网站程序，处理反馈回来的系统bug;\n\n　　7、网站程序开发文档的编写。', '按时完成上级领导安排的任务，有积极心和上进心，具有团队精神。', '0', '2017-01-16 12:05:47', '6');
INSERT INTO `gon_partner_extend` VALUES ('14', 'PHP', '3', '1', '1', '1', '1', '8K', '1', '1', '1、负责协助技术总监进行技术评测，bug处理，代码开发; 　　2、负责网站数据库、栏目、程序模块的设计与开发; 　　3、负责根据公司要求进行erp、oa、crm系统等项目开发; 　　4、定期与培训部和测试部沟通，获取反馈信息并进行相应的处理; 　　5、按时按质完成公司下达程度开发、系统评测等工作任务; 　　6、定期维护网站程序，处理反馈回来的系统bug; 　　7、网站程序开发文档的编写。', '按时完成上级领导安排的任务，有积极心和上进心，具有团队精神。', '0', '2017-01-16 16:04:26', null);
INSERT INTO `gon_partner_extend` VALUES ('15', 'PHP程序员', '3', '1', '1', '1', '1', '8K', '1', '1', '1、负责协助技术总监进行技术评测，bug处理，代码开发; 　　2、负责网站数据库、栏目、程序模块的设计与开发; 　　3、负责根据公司要求进行erp、oa、crm系统等项目开发; 　　4、定期与培训部和测试部沟通，获取反馈信息并进行相应的处理; 　　5、按时按质完成公司下达程度开发、系统评测等工作任务; 　　6、定期维护网站程序，处理反馈回来的系统bug; 　　7、网站程序开发文档的编写。', '按时完成上级领导安排的任务，有积极心和上进心，具有团队精神。', '0', '2017-01-16 16:55:10', null);
INSERT INTO `gon_partner_extend` VALUES ('16', 'PHP', '3', '1', '1', '1', '1', '8K', '1', '1', '1、负责协助技术总监进行技术评测，bug处理，代码开发; 　　2、负责网站数据库、栏目、程序模块的设计与开发; 　　3、负责根据公司要求进行erp、oa、crm系统等项目开发; 　　4、定期与培训部和测试部沟通，获取反馈信息并进行相应的处理; 　　5、按时按质完成公司下达程度开发、系统评测等工作任务; 　　6、定期维护网站程序，处理反馈回来的系统bug; 　　7、网站程序开发文档的编写。', '按时完成上级领导安排的任务，有积极心和上进心，具有团队精神。', '0', '2017-01-16 17:20:35', '7');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of gon_project
-- ----------------------------
INSERT INTO `gon_project` VALUES ('1', '共囊网', 'picture/chou/logo/b8839b6849d8b2f99e0d318c6d814175.jpg', '共囊大业', '北京市,北京市,海淀区', '1', '1', '500', '10', '100', '3', '4', 'picture/chou/picture/bcb4a3d15855933bb805d0781acb0b2b.jpg', '魏', '12', '24');
INSERT INTO `gon_project` VALUES ('2', '共囊众筹项目发布案例', 'picture/chou/logo/c2c5583b1de1a3d20dcf18fc72421eb7.png', '10万元起投20万元起投', '北京市,北京市,海淀区', '3', '1', '10000', '5', '500', '4', '4', 'picture/chou/picture/1fe34a3caacc91ebe2b20d346a6f7235.png', '刘赫', '2', '10');
INSERT INTO `gon_project` VALUES ('3', '心扒客', 'picture/chou/logo/37f714c5c52a7fe91dca9dc318f99d02.jpg', '心里健康微信直播服务产品转化线上', '北京市,北京市,海淀区', '3', '2', '100', '10', '100', '1', '1', 'picture/chou/picture/07533edd3f50129ff9458732440cc3b4.jpg', '海哥', '2', '29');
INSERT INTO `gon_project` VALUES ('4', '种花德花', 'picture/chou/logo/510edab969e3d7ab6a75c41a0da05004.png', '创业是一份梦想更是一份责任', '北京市,北京市,海淀区', '3', '2', '500', '10', '500', '3', '8', 'picture/chou/picture/19d8b941314515c9d99957d483d96455.png', '刘赫', '1', '26');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of gon_project_extend
-- ----------------------------
INSERT INTO `gon_project_extend` VALUES ('1', 'http://oh8ny9g1a.bkt.clouddn.com/41305e8c933a2beae167a58f2cab670a.mp4', '计算 1000万', '500万', '好好', '2016-12-15', 'http://oh8ny9g1a.bkt.clouddn.com/59a9865d46c143a03d776c74ea493414.mp4', '么么哒', '0', '队长', '魏', 'http://oh8ny9g1a.bkt.clouddn.com/53f2da90ea82be86745b32ef547c770f.mp4', 'loser', 'http://oh8ny9g1a.bkt.clouddn.com/dcf255ad20b058250a2ea33b75f584b5.docx', '2016-12-21 10:47:10', '0', '1');
INSERT INTO `gon_project_extend` VALUES ('2', 'http://oh8ny9g1a.bkt.clouddn.com/商业模式介绍.mp4', '5000', '0', '2年路演举办案例/上千份商业计划书', '2016-12-01', 'http://oh8ny9g1a.bkt.clouddn.com/834d19a766baca8a54e875964aecb547.mp4', '6', '6', '1', '北大博士', 'http://oh8ny9g1a.bkt.clouddn.com/87b6b6b3f70b45509fd656a57fd08584.mp4', '李彦宏', 'http://oh8ny9g1a.bkt.clouddn.com/共囊网高级会员说明.pdf', '2017-02-20 15:47:44', '0', '2');
INSERT INTO `gon_project_extend` VALUES ('3', 'http://oh8ny9g1a.bkt.clouddn.com/40126cef4ea84803cc0adefe476d1295.mp4', '5000', '10万', '日活300人', '2013-11-21', 'http://oh8ny9g1a.bkt.clouddn.com/c4a93865147705a27d488d2535aa7f1f.mp4', '3人', '3', '贾彦海', '黄北川', 'http://oh8ny9g1a.bkt.clouddn.com/9129b15345de6a36ed60378af2cec82d.mp4', '海哥、精一天使...', 'http://oh8ny9g1a.bkt.clouddn.com/d7e86bd05a8ff2ddbf3e1ba68532171f.docx', '2017-01-16 11:59:13', '0', '3');
INSERT INTO `gon_project_extend` VALUES ('4', 'http://oh8ny9g1a.bkt.clouddn.com/0205e5e5b9ec746dec19465e16b26535.mp4', '2190', '100万', '10万', '2013-11-21', 'http://oh8ny9g1a.bkt.clouddn.com/6ad681c40817b0be5857ef8ddb745203.mp4', '5人', '15', '海哥', '赵总', 'http://oh8ny9g1a.bkt.clouddn.com/07c64c9bd893f6263fae0762c38c646a.mp4', '海哥、赵总、精一天使', 'http://oh8ny9g1a.bkt.clouddn.com/ccbf1f1dc841d2a204c7a7421c332a15.doc', '2017-01-18 12:04:52', '0', '4');

-- ----------------------------
-- Table structure for gon_user
-- ----------------------------
DROP TABLE IF EXISTS `gon_user`;
CREATE TABLE `gon_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of gon_user
-- ----------------------------
INSERT INTO `gon_user` VALUES ('12', '18635032408', 'd4513b5b28b910db38f336ba7d5d4f07');
INSERT INTO `gon_user` VALUES ('10', '18600804277', 'd477887b0636e5d87f79cc25c99d7dc9');
INSERT INTO `gon_user` VALUES ('17', '13552397377', 'edda1d455820f14be3325dc20b75512c');
INSERT INTO `gon_user` VALUES ('4', '17710933449', '9db06bcff9248837f86d1a6bcf41c9e7');
INSERT INTO `gon_user` VALUES ('5', '13240230801', 'beab725cc3558ec6103cebddf183f9c1');
INSERT INTO `gon_user` VALUES ('6', '13269078821', '63ee451939ed580ef3c4b6f0109d1fd0');
INSERT INTO `gon_user` VALUES ('7', '13623377294', '9db06bcff9248837f86d1a6bcf41c9e7');
INSERT INTO `gon_user` VALUES ('16', '13716709882', '63ee451939ed580ef3c4b6f0109d1fd0');
INSERT INTO `gon_user` VALUES ('9', '13381132110', '7766294e9949b96f8847fee5aedda1e9');
INSERT INTO `gon_user` VALUES ('13', '15101013087', '9db06bcff9248837f86d1a6bcf41c9e7');
INSERT INTO `gon_user` VALUES ('14', '15600443288', '6a29b922593c4aa10c30f2e65fbb7116');
INSERT INTO `gon_user` VALUES ('15', '18600557756', '14e1b600b1fd579f47433b88e8d85291');
INSERT INTO `gon_user` VALUES ('18', '18621982718', '386d69e2c3da88e8c0617a2a0c6b55f2');
INSERT INTO `gon_user` VALUES ('19', '13121295185', '14e1b600b1fd579f47433b88e8d85291');
INSERT INTO `gon_user` VALUES ('20', '18817848328', '49210f068977d8f19e70e10870fda77e');
INSERT INTO `gon_user` VALUES ('22', '13811611629', 'af1c9a5308a49214a726130e3dafd274');
INSERT INTO `gon_user` VALUES ('24', '18663946388', 'd6bbc0e4dd3c95e2e1a8bce06a06b783');
INSERT INTO `gon_user` VALUES ('25', '13910903553', '00d89875a0ca4505de011da5a6018a1a');
INSERT INTO `gon_user` VALUES ('26', '15818772784', '3474c5e4b51081893cc084367e1cc8c3');
INSERT INTO `gon_user` VALUES ('27', '15910976915', '70873e8580c9900986939611618d7b1e');
INSERT INTO `gon_user` VALUES ('28', '13522126634', '9459cc3905f095583f1b52a0874b650b');
INSERT INTO `gon_user` VALUES ('29', '17181179267', '14e1b600b1fd579f47433b88e8d85291');
INSERT INTO `gon_user` VALUES ('30', '18626066426', '4027875a97a7787b9032ea46dae45d05');
INSERT INTO `gon_user` VALUES ('31', '18607551859', '224cf2b695a5e8ecaecfb9015161fa4b');
INSERT INTO `gon_user` VALUES ('32', '13146076166', '3a5cb84362db2ccc6e38619041ff4c65');
INSERT INTO `gon_user` VALUES ('33', '17716778822', '9db06bcff9248837f86d1a6bcf41c9e7');
INSERT INTO `gon_user` VALUES ('34', '18610667233', '9db06bcff9248837f86d1a6bcf41c9e7');
INSERT INTO `gon_user` VALUES ('35', '18710667233', '9db06bcff9248837f86d1a6bcf41c9e7');
INSERT INTO `gon_user` VALUES ('36', '13716008700', '9db06bcff9248837f86d1a6bcf41c9e7');
INSERT INTO `gon_user` VALUES ('37', '13613002300', '9db06bcff9248837f86d1a6bcf41c9e7');
INSERT INTO `gon_user` VALUES ('38', '13112001300', '9db06bcff9248837f86d1a6bcf41c9e7');
INSERT INTO `gon_user` VALUES ('39', '13415454545', '9db06bcff9248837f86d1a6bcf41c9e7');
INSERT INTO `gon_user` VALUES ('40', '18338202038', '9db06bcff9248837f86d1a6bcf41c9e7');
INSERT INTO `gon_user` VALUES ('41', '13969006900', '9db06bcff9248837f86d1a6bcf41c9e7');
INSERT INTO `gon_user` VALUES ('44', '13146182306', 'a5141f7847f33cc4ff187fee9b67844b');
INSERT INTO `gon_user` VALUES ('43', '18910108676', '550e1bafe077ff0b0b67f4e32f29d751');

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

-- ----------------------------
-- Records of gon_userinfo
-- ----------------------------
INSERT INTO `gon_userinfo` VALUES ('24', '魏文强', '1', '1', '青花', '青花创始人', '北京市,北京市,海淀区', '1', '无限可能 无限激情', null, 'picture/my/6cd1f92037f0e987d69242e9ca6bf9be.jpg', 'http://oh8ny9g1a.bkt.clouddn.com/bd3ab9d9ef4167e79382f65131d5535b.mp4', '2016-12-22 15:05:55', '0', '16');
INSERT INTO `gon_userinfo` VALUES ('18', '乐乐', '2', '1', '天心之翼科技有限公司', '创始人', '北京市,北京市,海淀区', '3', '人生就应该像石头一样坚强，不论男人女人', null, 'picture/my/90976ac7105988dbc70f12b6f22e5ebd.JPG', 'http://oh8ny9g1a.bkt.clouddn.com/ebdb7af5fc622514a1be95c388a1c5de.mp4', '2016-12-09 16:50:19', '0', '10');
INSERT INTO `gon_userinfo` VALUES ('6', '刘赫', '1', '6', '共囊网', 'UI设计', '北京市,北京市,海淀区', '2', '有志者事竟成', null, 'picture/my/ad4d430b5833127ac16ef15d99d9cd72.jpg', 'http://oh8ny9g1a.bkt.clouddn.com/0c7b2909a93cd6ae8d65c6bc23b7400d.mp4', '2017-01-16 16:30:39', '0', '5');
INSERT INTO `gon_userinfo` VALUES ('11', '石鑫', '1', '7', '共囊', '前端', '北京市,北京市,海淀区', '1', '平台', 'file/resume/18aefa447a99717711276a4153d743fc.docx', 'picture/my/242caade0220c1169b85be0a2f7e181b.jpg', 'http://oh8ny9g1a.bkt.clouddn.com/74d7fd7362ca054845d6539897dbab75.mp4', '2016-12-08 16:49:19', '0', '4');
INSERT INTO `gon_userinfo` VALUES ('10', 'haige', '2', '1', '共囊网', '创始人', '北京市,北京市,海淀区', '4', '时代赋予我们必须有这样伟大的梦想家，国家和世界的繁荣更离不开我们每一个创新创业梦想家的激情奋斗！我们共囊网为时代而生、我们共囊网将为国家和世界的创新创业挑战提供最牛逼、最完整、最真实、最有意义的伟大见证！！！\r\n\r\n我们只做这一件事：做行业第一领袖！！！', 'http://oh8ny9g1a.bkt.clouddn.com/共囊网-精准创业投资对接大平台.pdf', 'picture/my/d40270d89001ab987bd89cc1a9caa27c.png', 'http://oh8ny9g1a.bkt.clouddn.com/3fc120389a28e4107bd09e1a587807b9.mp4', '2017-02-20 10:05:36', '0', '6');
INSERT INTO `gon_userinfo` VALUES ('12', '魏奇', '1', '1', '落花', '落花创始人', '天津市,天津市,河东区', '1', '今日复明日，明日何其多', 'file/resume/489b130156fa78a1f219d6f24eb1e679.docx', 'picture/my/335aceb981f064952a2e1668ba486b89.jpg', null, '2017-01-16 16:35:49', '0', '7');
INSERT INTO `gon_userinfo` VALUES ('20', '佳浩baby', '1', '7', '天心之翼科技有限公司', '联合创始人', '北京市,北京市,海淀区', '1', '不忘初心，方得始终。', null, 'picture/my/1d3293adc8fe0c0ee2f2c8510dd0a125.JPG', 'http://oh8ny9g1a.bkt.clouddn.com/30ba777a6c715683b96352eb1548933b.mp4', '2016-12-09 19:04:02', '0', '12');
INSERT INTO `gon_userinfo` VALUES ('21', '焦瑞秋', '3', '7', '共囊网', '安卓技术研发', '北京市,北京市,海淀区', '3', '8年安卓技术研发，精于技术研发与提升，职业代码男。做过多款知名游戏、以及各种商业应用，先后在中外资研发公司担任主程序开发。', null, 'picture/my/ff0c797ed02a2aa57173199d60aeb345.jpg', 'http://oh8ny9g1a.bkt.clouddn.com/9443117e8eb05bdcab73850017c613d3.mp4', '2016-12-21 19:19:35', '0', '13');
INSERT INTO `gon_userinfo` VALUES ('25', '核潜艇', '2', '1', '北京芯片鱼科技有限责任公司', '总经理', '北京市,北京市,丰台区', '1', '做一个伟大的企业！', null, 'picture/my/e6b8aacfbed2b37e417971b15e440649.JPG', 'http://oh8ny9g1a.bkt.clouddn.com/3c0c1ef9f64317ca1a9adbdbab00192a.MP4', '2016-12-14 11:28:21', '0', '19');
INSERT INTO `gon_userinfo` VALUES ('26', '长江', '3', '1', '北京天心之翼科技有限公司', 'CEO', '北京市,北京市,海淀区', '3', '创业是一种生活方式 没有终点；成功是一个理想目标，没有标准，但一定要设定----加油！', null, 'picture/my/9bf3811ad3de8d21f8e5634527a0b819.jpg', 'http://oh8ny9g1a.bkt.clouddn.com/34718216336dba2cd19a8f04b45051f1.MP4', '2016-12-20 10:48:40', '0', '15');
INSERT INTO `gon_userinfo` VALUES ('28', '董先生', '4', '1', '青岛沃润滋商务有限公司', '总经理', '山东省,青岛市,李沧区', '4', '追逐梦想，实现梦想。', null, 'picture/my/7396b67b25e62d7e6b27cd534dcedd02.jpg', 'http://oh8ny9g1a.bkt.clouddn.com/57a80970bcb9ebb7141d1fbd199b7c5a.mp4', '2016-12-21 11:28:50', '0', '24');
INSERT INTO `gon_userinfo` VALUES ('29', '王迪', '3', '1', '心扒客', '创始人', '北京市,北京市,海淀区', '3', '创业是一份梦想，更是一份责任。', null, 'picture/my/96c3b2cf2d88f16772cf0794649eff85.jpg', 'http://oh8ny9g1a.bkt.clouddn.com/a15a00b7c5a80501857b7032512738d1.mp4', '2017-01-16 12:11:57', '0', '14');
INSERT INTO `gon_userinfo` VALUES ('30', '郭修语', '1', '1', '嘉旭智能科技', '创始人', '北京市,北京市,东城区', '2', '创业是一份梦想，更是一份责任。 ', null, 'picture/my/f79ece35ff5221f8a8a640b6007b2bc3.png', 'http://oh8ny9g1a.bkt.clouddn.com/26412d4a3bc3c7585c698ccdcdb2d94c.mp4', '2017-01-16 16:49:56', '0', '33');
INSERT INTO `gon_userinfo` VALUES ('31', '杜静', '3', '1', '抑郁症药物', '创始人', '北京市,北京市,东城区', '2', '创业是一份梦想，更是一份责任。', null, 'picture/my/f93bf3ff02c0351e2ec4fe2c707dbbbb.png', 'http://oh8ny9g1a.bkt.clouddn.com/12.mp4', '2017-01-16 17:31:11', '0', '34');
INSERT INTO `gon_userinfo` VALUES ('38', '勤上', '2', '4', '搜索', '茶厂村', '北京市,北京市,大兴区', '2', '生生世世', 'http://oh8ny9g1a.bkt.clouddn.com/fxx.docx', 'http://oh8ny9g1a.bkt.clouddn.com/8fc79f55dc99749e5b9ce65adab3b811.jpg', 'http://oh8ny9g1a.bkt.clouddn.com/共囊演示.mp4', '2017-02-20 09:41:59', '0', '44');
INSERT INTO `gon_userinfo` VALUES ('36', '陈腾飞', '2', '1', '互联网娱乐化', '创始人', '北京市,北京市,海淀区', '2', '创业是一份梦想，更是一份责任。', null, 'picture/my/1740291053ff56d9568dd0fb9e542e16.png', 'http://oh8ny9g1a.bkt.clouddn.com/8f69107556924f32121fe235b6cc3e5d.mp4', '2017-01-17 15:43:04', '0', '36');
INSERT INTO `gon_userinfo` VALUES ('33', '宠物社交', '3', '1', '宠物社交', '创始人', '北京市,北京市,海淀区', '3', '创业是一份梦想，更是一份责任。', null, 'picture/my/51226f591063efb43736791de06dce21.png', 'http://oh8ny9g1a.bkt.clouddn.com/20dec2702475bc8bda753b0948eb39d9.mp4', '2017-01-17 13:59:53', '0', null);
INSERT INTO `gon_userinfo` VALUES ('34', '宠物社交。', '3', '1', '宠物社交', '创始人', '北京市,北京市,海淀区', '3', '创业是一份责任', null, 'picture/my/02bbd679297ea06c05d553adff54d886.png', 'http://oh8ny9g1a.bkt.clouddn.com/813b8c0200a468a2618aa6addba7e94c.mp4', '2017-01-17 14:03:47', '0', '35');
INSERT INTO `gon_userinfo` VALUES ('35', '修语', '1', '1', '智能公交站', '创始人', '北京市,北京市,海淀区', '2', '创业是一份梦想，更是一份责任。', null, 'picture/my/0239af1045510e8eb89a6d8a8cbd4ddd.png', 'http://oh8ny9g1a.bkt.clouddn.com/5e10bb7734b39b37255b2754d59b8b44.mp4', '2017-01-17 14:54:30', '0', '38');
INSERT INTO `gon_userinfo` VALUES ('37', '峰子科学家', '2', '1', '汇蜂科技（北京）有限公司', 'CEO', '北京市,北京市,海淀区', '2', '迷茫时选难走的路', null, 'picture/my/6cf0e53c5fef5e08b638430542aead77.png', 'http://oh8ny9g1a.bkt.clouddn.com/f79bcd50bdb08fa02be56674177a638e.mp4', '2017-01-19 11:00:21', '0', '39');

/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : ttbbs

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-05-29 12:22:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tt_article`
-- ----------------------------
DROP TABLE IF EXISTS `tt_article`;
CREATE TABLE `tt_article` (
  `article_id` varchar(100) NOT NULL DEFAULT '',
  `user_id` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `kind` varchar(100) DEFAULT NULL,
  `content` text,
  `shenhe` int(2) DEFAULT '0',
  `createuser` varchar(100) DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  KEY `user_article` (`createuser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tt_article
-- ----------------------------
INSERT INTO `tt_article` VALUES ('1', '1', '中国芯 产业兴（经济聚焦）', '1', '片强则产业强，芯片兴则经济兴，没有芯片就没有安全。\r\n\r\n　　作为高端制造业的“皇冠明珠”，芯片即集成电路，是衡量一个国家综合实力的重要标志之一，是信息产业的核心。曾经，我国集成电路高端装备和材料基本处于空白状态，完全依赖进口。如今，2万多名科技工作者历经9年攻关，国家科技重大专项成功打造集成电路制造业创新体系，引领和支撑我国集成电路产业快速崛起，辐射带动了LED和光伏产业世界领先。\r\n\r\n　　5月23日，科技部会同北京市和上海市人民政府组织召开了国家科技重大专项“极大规模集成电路制造装备及成套工艺”（简称集成电路专项）成果发布会，宣布国家科技重大专项打造集成电路制造创新体系的阶段性目标已经实现。\r\n\r\n　　主流工艺水平提升5代，高端装备和材料从无到有\r\n\r\n　　科技部重大专项办公室主任陈传宏介绍，集成电路芯片是信息时代的基石，集成电路制造技术代表着当今世界微细制造的最高水平。专项技术总师叶甜春将集成电路比喻为现代工业的“粮食”，手机、电脑、家电、汽车、高铁、工业控制等各种电子产品和系统都离不开集成电路。没有集成电路产业支撑，信息社会就失去了根基。\r\n\r\n　　在先进制造装备、材料和工艺引进等方面，我国集成电路产业长期以来受到西方的种种限制，高端芯片主要依赖进口。我国集成电路产品从2006年开始超过石油成为我国最大宗进口产品，2013年至今每年进口额超过2000亿美元。\r\n\r\n　　为实现自主创新发展，2008年国务院批准实施集成电路专项，主攻装备、工艺和材料的自主创新。陈传宏介绍，该专项由北京市和上海市人民政府牵头组织实施。共有200多家企事业单位、2万多名科学工作者参与技术攻关，集中在北京、上海、江苏、沈阳、深圳和武汉等6个产业聚集区。', '1', 'admin', '2017-05-03 01:53:27');
INSERT INTO `tt_article` VALUES ('2', '1', '习近平致信祝贺全国台湾同胞投资企业联谊会成立10周年 ', '2', '新华社北京5月24日电（记者李寒芳）在全国台湾同胞投资企业联谊会成立10周年之际，中共中央总书记习近平发来贺信，向全国台湾同胞投资企业联谊会全体会员和广大台商表示热烈祝贺和诚挚问候。\r\n\r\n习近平在贺信中指出，自上世纪80年代海峡两岸封闭的大门被打开后，祖国大陆日益成为台湾同胞投资兴业、安居生活的热土。两岸是割舍不断的命运共同体，两岸经济同属中华民族经济。增进同胞福祉和亲情，把民族命运牢牢掌握在自己手中，是两岸同胞的共同心愿。我们愿意首先同广大台湾同胞分享大陆发展机遇，欢迎台湾同胞来大陆投资兴业。我们将继续研究出台相关政策措施，为台湾同胞在大陆学习、就业、创业、生活提供更多便利。我们也将切实维护台胞合法权益。\r\n\r\n习近平强调，希望全国台企联再接再厉，坚持一个中国原则，广泛团结台湾同胞，共同开拓进取，为维护两岸关系和平发展、实现中华民族伟大复兴作出新的贡献。（贺信全文另发）\r\n\r\n全国台湾同胞投资企业联谊会成立10周年庆祝大会24日在京举行。中共中央政治局常委、全国政协主席俞正声会见了参加庆祝大会的台商代表并讲话。他指出，在全国台企联成立10周年之际，中共中央总书记习近平专门给全国台企联发来贺信，充分体现了对全国台企联和广大台商的高度重视和深情关怀，也为全国台企联发展指明了方向。', '0', '管理员', '0000-00-00 00:00:00');
INSERT INTO `tt_article` VALUES ('3', '1', '全军和武警部队出席党的十九大代表候选人预备人选确定', '3', '　新华社北京5月23日电　全军和武警部队出席党的十九大代表候选人预备人选，分别由各战区、各军兵种、军委机关各部门、军事科学院、国防大学、国防科学技术大学、武警部队和各军区善后工作办公室等31个选举单位，经过推荐提名、组织考察、确定初步人选并公示后，分别召开党委全会或党委会投票确定。近日，中央军委已审查同意。\r\n\r\n　　全军和武警部队确定的十九大代表候选人预备人选具有先进性和广泛的代表性，条件、构成和产生程序均符合党中央和中央军委的要求。预备人选中，党员领导干部占62.16%，基层和工作一线党员占37.84%，其中营以下作战分队党员占14.32%；55岁以下党员占72.16%；受三等功以上奖励的占98.11%；大专以上文化程度的占99.45%，具有研究生学历的比十八大时提高近9个百分点；还有一定数量的女党员、少数民族党员和士官党员。', '1', '管理员', '0000-00-00 00:00:00');
INSERT INTO `tt_article` VALUES ('3b4c6a2f03b1bd23d1f2ee5b2e0c54c8', '1', 'admin的标题', '1111', '正文在这里送id送                                     ', '0', '管理员', '2017-05-28 20:19:41');
INSERT INTO `tt_article` VALUES ('4', '1', '外交部评台当局无视一个中国的不当言论：有些人的确是急了', '4', '人民网5月23日电 据外交部网站消息，外交部发言人华春莹23日主持例行记者会时，针对台湾地区当局的某些不当言论表示，一个中国原则是国际社会的普遍共识。“建议有关人士睁眼看世界，不要让狭隘的政治私利或意识形态偏见蒙蔽了自己的双眼。”她说。', '1', '管理员', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `tt_comment`
-- ----------------------------
DROP TABLE IF EXISTS `tt_comment`;
CREATE TABLE `tt_comment` (
  `comment_id` varchar(100) NOT NULL DEFAULT '',
  `user_id` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `comment_text` text,
  `createtime` datetime DEFAULT NULL,
  `floor` int(32) DEFAULT NULL,
  `article_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tt_comment
-- ----------------------------
INSERT INTO `tt_comment` VALUES ('1', '1', 'admin', '11111111111111111', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tt_comment` VALUES ('179add008eb917fc9b018070c8cc5967', '784400bb71965be4f523d2dd95c38dc4', 'clan', '                                ', '2017-05-28 17:05:40', '8', '1');
INSERT INTO `tt_comment` VALUES ('2', '1', 'admin', '112312323', '0000-00-00 00:00:00', '2', '1');
INSERT INTO `tt_comment` VALUES ('48a88c7f706e31f283a4aeee52d23737', '1', '管理员', '               车市但是都i啊是的                 ', '2017-05-28 15:32:01', '5', '1');
INSERT INTO `tt_comment` VALUES ('89f459f5b9c258c5cd23deeb04f0ad26', '1', '管理员', '    1111111111111111111132是多少啊                            ', '2017-05-28 15:19:02', '3', '1');
INSERT INTO `tt_comment` VALUES ('98a5ada01229145269d8bef18b24d125', '1', '管理员', '                                我还是测试', '2017-05-28 15:37:10', '6', '1');
INSERT INTO `tt_comment` VALUES ('a6f06073c3e732ddec6f8a37ecb19613', '784400bb71965be4f523d2dd95c38dc4', 'clan', '                                ', '2017-05-28 17:04:25', '1', '2');
INSERT INTO `tt_comment` VALUES ('b887d772a76f7eb51e816af7e4d09a5f', '1', '管理员', '                          我的测试      ', '2017-05-28 15:22:28', '4', '1');
INSERT INTO `tt_comment` VALUES ('beb1fa8f8c70f15425c8b2c9801da44f', '784400bb71965be4f523d2dd95c38dc4', 'clan', '                                ', '2017-05-28 17:01:26', '7', '1');

-- ----------------------------
-- Table structure for `tt_del`
-- ----------------------------
DROP TABLE IF EXISTS `tt_del`;
CREATE TABLE `tt_del` (
  `id` varchar(100) NOT NULL DEFAULT '',
  `title` varchar(100) DEFAULT NULL,
  `deluser` varchar(100) DEFAULT NULL,
  `deltime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tt_del
-- ----------------------------
INSERT INTO `tt_del` VALUES ('1', '1111', '111', null);
INSERT INTO `tt_del` VALUES ('296dced2a3e593277406ca434a0f761e', '测试', '管理员', '2017-05-28 17:31:45');
INSERT INTO `tt_del` VALUES ('82c6d9e192508f4343347b110c5c6a76', 'test', '管理员', '2017-05-27 23:03:51');

-- ----------------------------
-- Table structure for `tt_role`
-- ----------------------------
DROP TABLE IF EXISTS `tt_role`;
CREATE TABLE `tt_role` (
  `role_id` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tt_role
-- ----------------------------
INSERT INTO `tt_role` VALUES ('1111', '管理员', 'admin');
INSERT INTO `tt_role` VALUES ('222', '用户', 'user');

-- ----------------------------
-- Table structure for `tt_site`
-- ----------------------------
DROP TABLE IF EXISTS `tt_site`;
CREATE TABLE `tt_site` (
  `ID` varchar(100) NOT NULL DEFAULT '',
  `NAME` varchar(100) DEFAULT NULL,
  `VALUE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tt_site
-- ----------------------------
INSERT INTO `tt_site` VALUES ('1', 'site_name', '提提论坛');
INSERT INTO `tt_site` VALUES ('2', 'site_home', '首页');

-- ----------------------------
-- Table structure for `tt_user`
-- ----------------------------
DROP TABLE IF EXISTS `tt_user`;
CREATE TABLE `tt_user` (
  `user_id` varchar(100) NOT NULL DEFAULT '',
  `name` varchar(100) DEFAULT NULL,
  `loginname` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `logintime` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tt_user
-- ----------------------------
INSERT INTO `tt_user` VALUES ('1', '管理员', 'admin', '356a192b7913b04c54574d18c28d46e6395428abd033e22ae348aeb5660fc2140aec35850c4da997', '88228@qq.com', '2017-05-28 19:57:26');
INSERT INTO `tt_user` VALUES ('784400bb71965be4f523d2dd95c38dc4', 'clan', 'clan', '356a192b7913b04c54574d18c28d46e6395428ab2dd22621c5bffba7631c85bfa7f2dc029f529e11', 'clan@126.com', '2017-05-28 16:58:17');

-- ----------------------------
-- Table structure for `tt_userrole`
-- ----------------------------
DROP TABLE IF EXISTS `tt_userrole`;
CREATE TABLE `tt_userrole` (
  `userrole_id` varchar(100) NOT NULL DEFAULT '',
  `user_id` varchar(100) DEFAULT NULL,
  `role_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userrole_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tt_userrole
-- ----------------------------
INSERT INTO `tt_userrole` VALUES ('22222', '1', '1111');
INSERT INTO `tt_userrole` VALUES ('29a1955761cc6dec86aaff8980a2dba2', '784400bb71965be4f523d2dd95c38dc4', '1111');
INSERT INTO `tt_userrole` VALUES ('33333', '1', '222');
INSERT INTO `tt_userrole` VALUES ('3892b3fcd41db22c185db7b6c5a369e4', '784400bb71965be4f523d2dd95c38dc4', '222');

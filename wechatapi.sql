/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : wechatapi

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-04-07 01:02:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `aID` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` varchar(255) NOT NULL,
  `openID` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location_id` int(11) NOT NULL,
  `hot` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`aID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', '1', '1111', '', '新的一年伊始\r\n牵动千万游子心的海棠季\r\n即将拉开帷幕\r\n又一年海棠花开\r\n我们等你缓缓归矣\r\n今年的海棠季专属明信片\r\n仍然由你来定义\r\n快来选出你心中的最佳明信片吧', '2019-03-11 09:01:36', '1', '5');
INSERT INTO `articles` VALUES ('2', '1', '1111', '', '天津大学是教育部直属国家重点大学，也是985工程、211工程首批高校。学校创建于1895年，前身为北洋大学', '2019-03-11 09:01:43', '1', '1');
INSERT INTO `articles` VALUES ('3', '1', '1111', '', '天津大学智能与计算学部虚位以待，诚聘英才！ “北洋学者英才计划”招聘 暨 第七届“北洋青年科学家”论坛邀请函', '2019-03-11 09:01:45', '1', '0');
INSERT INTO `articles` VALUES ('4', '1', '1111', '', 'bn', '2019-03-11 09:03:48', '1', '0');
INSERT INTO `articles` VALUES ('5', '1', 'omfHM4iU0EA1jCLmUh43itEhtpcc', '这是新文章1', '我们等你缓缓归矣', '2019-03-11 10:23:36', '1', '0');
INSERT INTO `articles` VALUES ('6', '1', 'omfHM4iU0EA1jCLmUh43itEhtpcc', '这是新文章2', '今年的海棠季专属明信片', '2019-03-11 10:23:50', '1', '0');
INSERT INTO `articles` VALUES ('8', '2', '1111', '', '天津大学元英进团队正在揭开物种进化的神秘面纱，该团队首次发现了由人工基因组重排引发的不同尺度的杂合性缺失现象，揭示了基因组结构变异和非整倍体与酵母雷帕霉素耐受性的基因型-表型关系，为研究物种进化的遗传基础提供了新思路。', '2019-03-18 13:52:56', '1', '0');
INSERT INTO `articles` VALUES ('9', '2', '1111', null, '今年天津大学工业设计工程应该算的上是历年来最难考的一年，没有之一，先做一个参考，2018年，报名人数80人，15人进入复试，录取12人。2019年，报名人数140人，43人进入复试，录取6人。（报名人数道听途说，也有一定的参考价值）2019年九月左右，教育部对工业设计工程进行改革，将工业设计工程划归为机械工程或艺术，降了一个等级，对于明年考生建议：明年很大概率考数学，工业设计工程不是很好的选择，设计学和艺术设计选择更有优势。', '2019-03-18 13:53:30', '1', '5');
INSERT INTO `articles` VALUES ('10', '2', '1111', null, '今年就看着天津大学\r\n一开始招30个 后来说20个 放了将近130个进复试\r\n最后出名单收了13个', '2019-03-18 13:58:27', '1', '0');
INSERT INTO `articles` VALUES ('11', '2', '1111', null, '天津大学法硕复试录取了,果然如此好运，狂吸欧气~\r\n\r\n小满哥考上了，激动的要哭了\r\n\r\n付出终于有了回报', '2019-03-18 14:01:12', '1', '0');
INSERT INTO `articles` VALUES ('12', '2', '1111', null, '这两天找我聊天的学弟学妹越来越多，不管是本校的还是外校的，微博上认识我的或者朋友介绍的等等，我都尽可能的去解答大家的问题。但是有一些情况还是不太能准确回答大家，比如说天津大学金融专硕的分数线从18年的330到19年的381，涨了51分，会不会吓退20的一大波考生，这是要看你们20考生的心态，我不会不负责任的瞎预测。\r\n还有最近找我聊天的也有很多不确定学校的，我经验贴上写了我具体确定学校的流程，一定要想清楚自己想要什么。\r\n', '2019-03-18 14:02:53', '1', '0');
INSERT INTO `articles` VALUES ('13', '3', '1111', null, '我们大天津的风，就是这么不期而遇！天津大学走起', '2019-03-18 14:06:41', '1', '0');
INSERT INTO `articles` VALUES ('14', '3', '1111', null, 'hello,world!', '2019-03-18 14:11:13', '1', '0');
INSERT INTO `articles` VALUES ('15', '3', '1111', null, 'hello,world!', '2019-03-18 14:14:20', '1', '0');
INSERT INTO `articles` VALUES ('16', '3', '1111', null, 'hello,world!', '2019-03-18 14:14:46', '1', '0');
INSERT INTO `articles` VALUES ('17', '3', '1111', null, 'hello,world!', '2019-03-18 14:16:35', '1', '0');
INSERT INTO `articles` VALUES ('18', '3', '1111', null, 'hello,world!', '2019-03-18 14:27:01', '1', '0');
INSERT INTO `articles` VALUES ('19', '4', '1111', null, 'hello,world!', '2019-03-18 14:31:25', '1', '0');
INSERT INTO `articles` VALUES ('20', '4', '1111', null, 'hello,world!', '2019-03-18 14:36:25', '1', '0');
INSERT INTO `articles` VALUES ('21', '4', '1111', null, 'hello,world!', '2019-03-18 14:37:14', '1', '0');
INSERT INTO `articles` VALUES ('22', '4', '1111', null, 'hello,world!', '2019-03-18 14:37:37', '1', '0');
INSERT INTO `articles` VALUES ('23', '4', '1111', null, 'hello,world!', '2019-03-18 14:43:49', '1', '0');
INSERT INTO `articles` VALUES ('24', '4', '1111', null, 'hello,world!', '2019-03-18 14:44:42', '1', '0');
INSERT INTO `articles` VALUES ('25', '5', '1111', null, 'hello,world!', '2019-03-18 14:45:32', '1', '0');
INSERT INTO `articles` VALUES ('26', '5', '1111', null, 'hello,world!', '2019-03-18 14:45:55', '1', '0');
INSERT INTO `articles` VALUES ('27', '5', '1111', null, 'hello,world!', '2019-03-18 14:46:39', '1', '0');
INSERT INTO `articles` VALUES ('28', '5', '1111', null, 'hello,world!', '2019-03-18 14:47:26', '1', '0');
INSERT INTO `articles` VALUES ('29', '5', '1111', null, 'hello,world!', '2019-03-18 14:53:07', '1', '0');
INSERT INTO `articles` VALUES ('30', '5', '1111', null, 'hello,world!', '2019-03-18 14:53:19', '1', '0');
INSERT INTO `articles` VALUES ('31', '6', '1111', null, 'hello,world!', '2019-03-18 15:00:54', '1', '0');
INSERT INTO `articles` VALUES ('32', '6', '1111', null, 'hello,world!', '2019-03-18 15:01:21', '1', '0');
INSERT INTO `articles` VALUES ('33', '6', '1111', null, 'hello,world!', '2019-03-18 15:01:36', '1', '0');
INSERT INTO `articles` VALUES ('34', '1', '1111', null, 'hello,world!', '2019-03-18 15:03:22', '1', '0');
INSERT INTO `articles` VALUES ('35', '1', '1111', null, 'hello,world!', '2019-03-18 15:04:57', '1', '0');
INSERT INTO `articles` VALUES ('36', '1', '1111', null, '测试三张图片', '2019-03-27 21:40:21', '1', '0');
INSERT INTO `articles` VALUES ('37', '1', '1111', null, 'hello天津,world!', '2019-03-27 23:28:50', '1', '0');
INSERT INTO `articles` VALUES ('38', '1', '1111', null, 'hello天津,world!', '2019-03-27 23:29:33', '1', '0');
INSERT INTO `articles` VALUES ('39', '1', '1111', null, 'hello,天津world天津!', '2019-03-28 14:44:21', '1', '0');

-- ----------------------------
-- Table structure for article_pictures
-- ----------------------------
DROP TABLE IF EXISTS `article_pictures`;
CREATE TABLE `article_pictures` (
  `pID` int(11) NOT NULL AUTO_INCREMENT,
  `aID` int(11) NOT NULL,
  `pName` varchar(255) NOT NULL,
  `pURL` varchar(255) NOT NULL,
  PRIMARY KEY (`pID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article_pictures
-- ----------------------------
INSERT INTO `article_pictures` VALUES ('1', '1', 'test_001.jpg', 'test_001.jpg');
INSERT INTO `article_pictures` VALUES ('2', '1', 'test_002.jpg', 'test_002.jpg');
INSERT INTO `article_pictures` VALUES ('3', '1', 'banner_1552889473.png', '/upload/article_pictures/banner_1552889473.png');
INSERT INTO `article_pictures` VALUES ('4', '1', 'article_pictures_1552890685.png', '/upload/article_pictures/article_pictures_1552890685.png');
INSERT INTO `article_pictures` VALUES ('5', '1', 'article_pictures_1552890985.png', '/upload/article_pictures/article_pictures_1552890985.png');
INSERT INTO `article_pictures` VALUES ('6', '1', 'article_pictures_1552891034.png', '/upload/article_pictures/article_pictures_1552891034.png');
INSERT INTO `article_pictures` VALUES ('7', '1', 'article_pictures_1552891057.png', '/upload/article_pictures/article_pictures_1552891057.png');
INSERT INTO `article_pictures` VALUES ('8', '1', 'article_pictures_1552891217.png', '/upload/article_pictures/article_pictures_1552891217.png');
INSERT INTO `article_pictures` VALUES ('9', '1', 'article_pictures_1552891429.png', '/upload/article_pictures/article_pictures_1552891429.png');
INSERT INTO `article_pictures` VALUES ('10', '1', 'article_pictures_1552891482.png', '/upload/article_pictures/article_pictures_1552891482.png');
INSERT INTO `article_pictures` VALUES ('11', '1', 'article_pictures_1552891555.png', '/upload/article_pictures/article_pictures_1552891555.png');
INSERT INTO `article_pictures` VALUES ('12', '27', 'article_pictures_1552891599.png', '/upload/article_pictures/article_pictures_1552891599.png');
INSERT INTO `article_pictures` VALUES ('13', '28', 'article_pictures_1552891646.png', '/upload/article_pictures/article_pictures_1552891646.png');
INSERT INTO `article_pictures` VALUES ('14', '31', 'article_pictures_1552892454.png', '/upload/article_pictures/article_pictures_1552892454.png');
INSERT INTO `article_pictures` VALUES ('15', '34', 'article_pictures_1552892602.png', '/upload/article_pictures/article_pictures_1552892602.png');
INSERT INTO `article_pictures` VALUES ('16', '35', 'article_pictures_1552892697.png', '/upload/article_pictures/article_pictures_1552892697.png');
INSERT INTO `article_pictures` VALUES ('17', '36', 'article_pictures_1553694021.png', '/upload/article_pictures/article_pictures_1553694021.png');
INSERT INTO `article_pictures` VALUES ('18', '36', 'article_pictures_1553694022.jpg', '/upload/article_pictures/article_pictures_1553694022.jpg');
INSERT INTO `article_pictures` VALUES ('19', '37', 'article_pictures_1553700530.jpg', '/upload/article_pictures/article_pictures_1553700530.jpg');
INSERT INTO `article_pictures` VALUES ('20', '37', 'article_pictures_1553700530.jpg', '/upload/article_pictures/article_pictures_1553700530.jpg');
INSERT INTO `article_pictures` VALUES ('21', '37', 'article_pictures_1553700530.jpg', '/upload/article_pictures/article_pictures_1553700530.jpg');
INSERT INTO `article_pictures` VALUES ('22', '38', 'article_pictures_1553700573.jpg', '/upload/article_pictures/article_pictures_1553700573.jpg');
INSERT INTO `article_pictures` VALUES ('23', '39', 'article_pictures_1553755461.jpg', '/upload/article_pictures/article_pictures_1553755461.jpg');

-- ----------------------------
-- Table structure for article_types
-- ----------------------------
DROP TABLE IF EXISTS `article_types`;
CREATE TABLE `article_types` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article_types
-- ----------------------------
INSERT INTO `article_types` VALUES ('1', '推荐');
INSERT INTO `article_types` VALUES ('2', '学校');
INSERT INTO `article_types` VALUES ('3', '食堂');
INSERT INTO `article_types` VALUES ('4', '社团');
INSERT INTO `article_types` VALUES ('5', '失物招领');
INSERT INTO `article_types` VALUES ('6', '兼职');
INSERT INTO `article_types` VALUES ('7', '就业');

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `bID` int(255) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `first_typeID` int(11) NOT NULL DEFAULT '1',
  `second_typeID` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`bID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES ('11', 'banners_1553426733.png', '2019-03-24 19:25:34', '1', '2');
INSERT INTO `banners` VALUES ('12', 'banners_1553427035.png', '2019-03-24 19:30:35', '1', '1');
INSERT INTO `banners` VALUES ('13', 'banners_1553427044.png', '2019-03-24 19:30:44', '1', '1');
INSERT INTO `banners` VALUES ('14', 'banners_1553427052.png', '2019-03-24 19:30:52', '1', '1');
INSERT INTO `banners` VALUES ('15', 'banners_1553427061.png', '2019-03-24 19:31:01', '1', '1');

-- ----------------------------
-- Table structure for colletions
-- ----------------------------
DROP TABLE IF EXISTS `colletions`;
CREATE TABLE `colletions` (
  `openID` varchar(255) NOT NULL,
  `type` int(255) NOT NULL,
  `pointerID` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`openID`,`type`,`pointerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of colletions
-- ----------------------------
INSERT INTO `colletions` VALUES ('1111', '1', '1', '2019-03-11 13:43:52');
INSERT INTO `colletions` VALUES ('1111', '1', '2', '2019-03-13 19:33:30');
INSERT INTO `colletions` VALUES ('1111', '2', '1', '2019-03-23 22:30:39');
INSERT INTO `colletions` VALUES ('1111', '2', '2', '2019-03-23 22:36:16');
INSERT INTO `colletions` VALUES ('omfHM4iU0EA1jCLmUh43itEhtpcc', '1', '1', '2019-03-11 15:25:56');
INSERT INTO `colletions` VALUES ('omfHM4iU0EA1jCLmUh43itEhtpcc', '1', '2', '2019-03-11 15:27:00');

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `cID` int(11) NOT NULL AUTO_INCREMENT,
  `cType` int(11) NOT NULL,
  `pointerID` int(11) NOT NULL,
  `openID` int(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('2', '1', '1', '1111', '这是一条评论', '2019-03-23 22:33:30');
INSERT INTO `comments` VALUES ('3', '1', '1', '1111', '这是一条评论', '2019-03-23 22:33:30');
INSERT INTO `comments` VALUES ('4', '1', '1', '1111', '这是一条评论', '2019-03-23 22:33:30');
INSERT INTO `comments` VALUES ('5', '1', '1', '1111', '这是一条评论', '2019-03-23 22:33:30');
INSERT INTO `comments` VALUES ('6', '1', '1', '1111', '这是一条评论', '2019-03-23 22:33:30');
INSERT INTO `comments` VALUES ('7', '1', '1', '1111', '这是一条评论', '2019-03-23 22:33:30');
INSERT INTO `comments` VALUES ('8', '1', '1', '1111', '这是一条评论', '2019-03-23 22:33:30');
INSERT INTO `comments` VALUES ('9', '1', '1', '1111', '这是一条评论', '2019-03-23 22:33:30');
INSERT INTO `comments` VALUES ('10', '1', '1', '1111', '这是一条评论', '2019-03-23 22:33:30');
INSERT INTO `comments` VALUES ('11', '1', '1', '1111', '12342314', '2019-03-25 21:58:12');
INSERT INTO `comments` VALUES ('12', '1', '1', '1111', '@omingyyfy 哈喽，嗯', '2019-03-25 21:59:34');
INSERT INTO `comments` VALUES ('13', '1', '2', '1111', '我爱天大', '2019-03-25 22:31:32');
INSERT INTO `comments` VALUES ('14', '1', '2', '1111', '@omingyyfy 天大爱我', '2019-03-25 22:31:51');
INSERT INTO `comments` VALUES ('15', '1', '35', '1111', '图片咋没了？', '2019-03-27 21:03:29');
INSERT INTO `comments` VALUES ('16', '1', '36', '1111', '为什么测试3张图，然而只有2张？', '2019-03-27 23:20:39');
INSERT INTO `comments` VALUES ('17', '1', '38', '1111', '124', '2019-03-28 14:59:20');
INSERT INTO `comments` VALUES ('18', '1', '39', '1111', '!', '2019-03-28 14:59:47');
INSERT INTO `comments` VALUES ('19', '1', '39', '1111', 'How handsome I am !', '2019-03-28 15:00:08');

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `iID` int(11) NOT NULL AUTO_INCREMENT,
  `iType_ID` int(255) NOT NULL,
  `openID` varchar(255) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_info` varchar(255) NOT NULL,
  `hot` int(255) NOT NULL DEFAULT '0',
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`iID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES ('1', '1', '1111', '土豆', '这是土豆,haha', '444', '2019-03-23 22:34:31');
INSERT INTO `items` VALUES ('2', '2', '1111', '西瓜', '这是西瓜,hoho', '555', '2019-03-23 22:34:31');

-- ----------------------------
-- Table structure for item_pictures
-- ----------------------------
DROP TABLE IF EXISTS `item_pictures`;
CREATE TABLE `item_pictures` (
  `pID` int(11) NOT NULL AUTO_INCREMENT,
  `iID` int(11) NOT NULL,
  `pName` varchar(255) NOT NULL,
  `pURL` varchar(255) NOT NULL,
  PRIMARY KEY (`pID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_pictures
-- ----------------------------
INSERT INTO `item_pictures` VALUES ('1', '1', 'test.jpg', '/upload/item_pictures/test.jpg');
INSERT INTO `item_pictures` VALUES ('2', '1', 'test2.jpg', '/upload/hahahah.jpg');

-- ----------------------------
-- Table structure for item_types
-- ----------------------------
DROP TABLE IF EXISTS `item_types`;
CREATE TABLE `item_types` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_types
-- ----------------------------
INSERT INTO `item_types` VALUES ('1', '旧书');
INSERT INTO `item_types` VALUES ('2', '日用品');

-- ----------------------------
-- Table structure for locations
-- ----------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of locations
-- ----------------------------
INSERT INTO `locations` VALUES ('1', '天津市');

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `mID` int(11) NOT NULL,
  `openID` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`mID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of messages
-- ----------------------------

-- ----------------------------
-- Table structure for schools
-- ----------------------------
DROP TABLE IF EXISTS `schools`;
CREATE TABLE `schools` (
  `sID` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of schools
-- ----------------------------
INSERT INTO `schools` VALUES ('1', '天津大学', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `openID` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT '',
  `school_id` int(11) DEFAULT NULL,
  `session_key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`openID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1111', 'omingyyfy', '1', 'https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132', '1', null);
INSERT INTO `users` VALUES ('omfHM4iU0EA1jCLmUh43itEhtpcc', 'tester2', '1', '1.jpg', '1', null);
INSERT INTO `users` VALUES ('ozInc4nxFajRO-7DVyg7WfLb2GcE', '呜喵王', '1', 'https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132', null, null);

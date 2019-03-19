/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50723
Source Host           : localhost:3306
Source Database       : wechatapi

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2019-03-19 22:33:10
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', '1', '1111', '这是第一篇文章', 'hfgbxxdfgb', '2019-03-11 09:01:36', '1', '5');
INSERT INTO `articles` VALUES ('2', '2', '1111', '这是第二篇文章', 'tdgbdbdafge', '2019-03-11 09:01:43', '1', '1');
INSERT INTO `articles` VALUES ('3', '3', '1111', '这是第三篇文章', '324524524324', '2019-03-11 09:01:45', '1', '0');
INSERT INTO `articles` VALUES ('4', '4', '1111', '这是第四篇文章', '4535434532413412421', '2019-03-11 09:03:48', '1', '0');
INSERT INTO `articles` VALUES ('5', '2', 'omfHM4iU0EA1jCLmUh43itEhtpcc', '这是新文章1', '的撒发射点发射点反动', '2019-03-11 10:23:36', '1', '0');
INSERT INTO `articles` VALUES ('6', '3', 'omfHM4iU0EA1jCLmUh43itEhtpcc', '这是新文章2', '反对法国公司纷纷', '2019-03-11 10:23:50', '1', '0');
INSERT INTO `articles` VALUES ('8', '1', '1111', null, '718041', '2019-03-18 13:52:56', '1', '0');
INSERT INTO `articles` VALUES ('9', '1', '1111', null, '718041', '2019-03-18 13:53:30', '1', '0');
INSERT INTO `articles` VALUES ('10', '1', '1111', null, 'hello,world!', '2019-03-18 13:58:27', '1', '0');
INSERT INTO `articles` VALUES ('11', '1', '1111', null, 'hello,world!', '2019-03-18 14:01:12', '1', '0');
INSERT INTO `articles` VALUES ('12', '1', '1111', null, 'hello,world!', '2019-03-18 14:02:53', '1', '0');
INSERT INTO `articles` VALUES ('13', '1', '1111', null, 'hello,world!', '2019-03-18 14:06:41', '1', '0');
INSERT INTO `articles` VALUES ('14', '1', '1111', null, 'hello,world!', '2019-03-18 14:11:13', '1', '0');
INSERT INTO `articles` VALUES ('15', '1', '1111', null, 'hello,world!', '2019-03-18 14:14:20', '1', '0');
INSERT INTO `articles` VALUES ('16', '1', '1111', null, 'hello,world!', '2019-03-18 14:14:46', '1', '0');
INSERT INTO `articles` VALUES ('17', '1', '1111', null, 'hello,world!', '2019-03-18 14:16:35', '1', '0');
INSERT INTO `articles` VALUES ('18', '1', '1111', null, 'hello,world!', '2019-03-18 14:27:01', '1', '0');
INSERT INTO `articles` VALUES ('19', '1', '1111', null, 'hello,world!', '2019-03-18 14:31:25', '1', '0');
INSERT INTO `articles` VALUES ('20', '1', '1111', null, 'hello,world!', '2019-03-18 14:36:25', '1', '0');
INSERT INTO `articles` VALUES ('21', '1', '1111', null, 'hello,world!', '2019-03-18 14:37:14', '1', '0');
INSERT INTO `articles` VALUES ('22', '1', '1111', null, 'hello,world!', '2019-03-18 14:37:37', '1', '0');
INSERT INTO `articles` VALUES ('23', '1', '1111', null, 'hello,world!', '2019-03-18 14:43:49', '1', '0');
INSERT INTO `articles` VALUES ('24', '1', '1111', null, 'hello,world!', '2019-03-18 14:44:42', '1', '0');
INSERT INTO `articles` VALUES ('25', '1', '1111', null, 'hello,world!', '2019-03-18 14:45:32', '1', '0');
INSERT INTO `articles` VALUES ('26', '1', '1111', null, 'hello,world!', '2019-03-18 14:45:55', '1', '0');
INSERT INTO `articles` VALUES ('27', '1', '1111', null, 'hello,world!', '2019-03-18 14:46:39', '1', '0');
INSERT INTO `articles` VALUES ('28', '1', '1111', null, 'hello,world!', '2019-03-18 14:47:26', '1', '0');
INSERT INTO `articles` VALUES ('29', '1', '1111', null, 'hello,world!', '2019-03-18 14:53:07', '1', '0');
INSERT INTO `articles` VALUES ('30', '1', '1111', null, 'hello,world!', '2019-03-18 14:53:19', '1', '0');
INSERT INTO `articles` VALUES ('31', '1', '1111', null, 'hello,world!', '2019-03-18 15:00:54', '1', '0');
INSERT INTO `articles` VALUES ('32', '1', '1111', null, 'hello,world!', '2019-03-18 15:01:21', '1', '0');
INSERT INTO `articles` VALUES ('33', '1', '1111', null, 'hello,world!', '2019-03-18 15:01:36', '1', '0');
INSERT INTO `articles` VALUES ('34', '1', '1111', null, 'hello,world!', '2019-03-18 15:03:22', '1', '0');
INSERT INTO `articles` VALUES ('35', '1', '1111', null, 'hello,world!', '2019-03-18 15:04:57', '1', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

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

-- ----------------------------
-- Table structure for article_types
-- ----------------------------
DROP TABLE IF EXISTS `article_types`;
CREATE TABLE `article_types` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article_types
-- ----------------------------
INSERT INTO `article_types` VALUES ('1', '学校信息');
INSERT INTO `article_types` VALUES ('2', '食堂资讯');
INSERT INTO `article_types` VALUES ('3', '社团活动');
INSERT INTO `article_types` VALUES ('4', '兼职信息');
INSERT INTO `article_types` VALUES ('5', '就业');

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `bID` int(255) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES ('1', '-1a2153fb14ed0430.jpg', '2019-03-11 11:27:55');
INSERT INTO `banners` VALUES ('2', 'banner_1552275312.jpg', '2019-03-11 11:35:12');
INSERT INTO `banners` VALUES ('3', 'banners_1552889971.png', '2019-03-18 14:19:31');
INSERT INTO `banners` VALUES ('4', 'banners_1552890026.png', '2019-03-18 14:20:26');

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
  PRIMARY KEY (`cID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('2', '1', '1', '1111', '这是一条评论');
INSERT INTO `comments` VALUES ('3', '1', '1', '1111', '这是一条评论');
INSERT INTO `comments` VALUES ('4', '1', '1', '1111', '这是一条评论');
INSERT INTO `comments` VALUES ('5', '1', '1', '1111', '这是一条评论');
INSERT INTO `comments` VALUES ('6', '1', '1', '1111', '这是一条评论');
INSERT INTO `comments` VALUES ('7', '1', '1', '1111', '这是一条评论');
INSERT INTO `comments` VALUES ('8', '1', '1', '1111', '这是一条评论');
INSERT INTO `comments` VALUES ('9', '1', '1', '1111', '这是一条评论');
INSERT INTO `comments` VALUES ('10', '1', '1', '1111', '这是一条评论');

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
  PRIMARY KEY (`iID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of items
-- ----------------------------

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
  PRIMARY KEY (`openID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1111', 'omingyyfy', '1', '1.jpg', '1');
INSERT INTO `users` VALUES ('omfHM4iU0EA1jCLmUh43itEhtpcc', 'tester2', '1', '1.jpg', '1');

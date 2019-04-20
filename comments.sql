/*
Navicat MySQL Data Transfer

Source Server         : wechatmore.xyz
Source Server Version : 50724
Source Host           : wechatmore.xyz:3306
Source Database       : wechatapi

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-04-20 20:54:36
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

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
INSERT INTO `comments` VALUES ('20', '1', '1', '1111', '@omingyyfy 哈哈哈', '2019-04-15 21:17:46');

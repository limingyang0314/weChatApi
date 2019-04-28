/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : wechatapi

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-04-28 16:23:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `mID` int(11) NOT NULL AUTO_INCREMENT,
  `mType` int(11) NOT NULL DEFAULT '1',
  `to_who` varchar(255) NOT NULL,
  `from_who` varchar(255) NOT NULL,
  `pointerID1` int(11) DEFAULT NULL,
  `pointerID2` int(11) DEFAULT NULL,
  `pointerID3` int(11) DEFAULT NULL,
  `has_read` int(11) NOT NULL DEFAULT '0',
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of messages
-- ----------------------------
INSERT INTO `messages` VALUES ('1', '1', '1111', '1111', '1', '2', null, '1', '2019-04-07 23:41:17');
INSERT INTO `messages` VALUES ('2', '1', '1111', '1111', '1', '2', null, '1', '2019-04-07 23:41:18');
INSERT INTO `messages` VALUES ('3', '1', '1111', '1111', '1', '2', null, '0', '2019-04-07 23:41:19');
INSERT INTO `messages` VALUES ('4', '2', '1111', '1111', '1', '3', null, '0', '2019-04-07 23:41:20');
INSERT INTO `messages` VALUES ('5', '2', '1111', '1111', '1', '1', null, '0', '2019-04-28 10:58:24');

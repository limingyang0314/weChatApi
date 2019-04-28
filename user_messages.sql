/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : wechatapi

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-04-28 15:51:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user_messages
-- ----------------------------
DROP TABLE IF EXISTS `user_messages`;
CREATE TABLE `user_messages` (
  `umID` int(11) NOT NULL AUTO_INCREMENT,
  `from_who` varchar(255) DEFAULT NULL,
  `to_who` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `has_read` int(11) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`umID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_messages
-- ----------------------------
INSERT INTO `user_messages` VALUES ('1', 'ozInc4s7Q6bfdfe3_FgfuFegTOcg', '1111', 'hey', '0', '2019-04-28 11:27:33');
INSERT INTO `user_messages` VALUES ('2', '1111', '1111', 'hello', '0', '2019-04-28 11:26:40');

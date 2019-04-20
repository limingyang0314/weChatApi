/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : wechatapi

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-04-20 21:00:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for item_types
-- ----------------------------
DROP TABLE IF EXISTS `item_types`;
CREATE TABLE `item_types` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_types
-- ----------------------------
INSERT INTO `item_types` VALUES ('1', '服饰');
INSERT INTO `item_types` VALUES ('2', '旧书');
INSERT INTO `item_types` VALUES ('3', '电子产品');
INSERT INTO `item_types` VALUES ('4', '其他');

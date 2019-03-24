/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50723
Source Host           : localhost:3306
Source Database       : wechatapi

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2019-03-24 19:31:53
*/

SET FOREIGN_KEY_CHECKS=0;

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

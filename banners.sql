/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : wechatapi

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-04-19 19:40:48
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES ('11', 'banners_1553426733.png', '2019-03-24 19:25:34', '1', '2');
INSERT INTO `banners` VALUES ('12', 'banners_1553427035.png', '2019-03-24 19:30:35', '1', '1');
INSERT INTO `banners` VALUES ('13', 'banners_1553427044.png', '2019-03-24 19:30:44', '1', '1');
INSERT INTO `banners` VALUES ('19', 'banners_1555416226 _1 .png', '2019-04-16 20:03:46', '1', '2');
INSERT INTO `banners` VALUES ('20', 'banners_1555416632 _1 .png', '2019-04-16 20:10:32', '1', '6');
INSERT INTO `banners` VALUES ('21', 'banners_1555416657 _1 .png', '2019-04-16 20:10:57', '1', '4');
INSERT INTO `banners` VALUES ('22', 'banners_1555416672 _1 .png', '2019-04-16 20:11:12', '1', '2');
INSERT INTO `banners` VALUES ('23', 'banners_1555416685 _1 .png', '2019-04-16 20:11:25', '2', '1');
INSERT INTO `banners` VALUES ('24', 'banners_1555416698 _1 .png', '2019-04-16 20:11:38', '1', '7');

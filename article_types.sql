/*
Navicat MySQL Data Transfer

Source Server         : wechatAPI
Source Server Version : 50724
Source Host           : 47.95.213.53:3306
Source Database       : wechatapi

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-03-23 22:56:45
*/

SET FOREIGN_KEY_CHECKS=0;

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

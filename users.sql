/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : wechatapi

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-04-19 19:43:05
*/

SET FOREIGN_KEY_CHECKS=0;

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
INSERT INTO `users` VALUES ('1111', 'omingyyfy', '1', 'https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132', '2', 'hello');
INSERT INTO `users` VALUES ('2222', 'test1', '1', 'https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132', '2', '');
INSERT INTO `users` VALUES ('omfHM4iU0EA1jCLmUh43itEhtpcc', 'tester2', '1', 'https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132', '2', null);
INSERT INTO `users` VALUES ('ozInc4nxFajRO-7DVyg7WfLb2GcE', '呜喵哥', '1', 'https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132', '2', '3Oo5nmL279TDALy2dkqX8A==');
INSERT INTO `users` VALUES ('ozInc4s7Q6bfdfe3_FgfuFegTOcg', 'ネクロ', '1', 'https://wx.qlogo.cn/mmopen/vi_32/KABlAkJHg1j9Rj5kgT0iaCic49XMQNicXibT0kWHlB6n4AmtaNqomc1ev1ibejyHOjQbJBeAuvJGMQ5Q0OibOJa7pibPA/132', null, 'cEgOLpfJnEkCRmXuF/Kkvw==');
INSERT INTO `users` VALUES ('{$openID}', '{$username}', '1', 'https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132', '2', '{$session_key}');

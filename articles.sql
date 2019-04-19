/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : wechatapi

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-04-20 01:46:50
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
  `comment_num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`aID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', '1', '1111', '', '新的一年伊始\r\n牵动千万游子心的海棠季\r\n即将拉开帷幕\r\n又一年海棠花开\r\n我们等你缓缓归矣\r\n今年的海棠季专属明信片\r\n仍然由你来定义\r\n快来选出你心中的最佳明信片吧', '2019-03-11 09:01:36', '1', '5', '3');
INSERT INTO `articles` VALUES ('2', '1', '1111', '', '天津大学是教育部直属国家重点大学，也是985工程、211工程首批高校。学校创建于1895年，前身为北洋大学', '2019-03-11 09:01:43', '1', '1', '0');
INSERT INTO `articles` VALUES ('3', '1', '1111', '', '天津大学智能与计算学部虚位以待，诚聘英才！ “北洋学者英才计划”招聘 暨 第七届“北洋青年科学家”论坛邀请函', '2019-03-11 09:01:45', '1', '0', '0');
INSERT INTO `articles` VALUES ('4', '1', '1111', '', 'bn', '2019-03-11 09:03:48', '1', '0', '0');
INSERT INTO `articles` VALUES ('5', '1', 'omfHM4iU0EA1jCLmUh43itEhtpcc', '这是新文章1', '我们等你缓缓归矣', '2019-03-11 10:23:36', '1', '0', '0');
INSERT INTO `articles` VALUES ('6', '1', 'omfHM4iU0EA1jCLmUh43itEhtpcc', '这是新文章2', '今年的海棠季专属明信片', '2019-03-11 10:23:50', '1', '0', '0');
INSERT INTO `articles` VALUES ('8', '2', '1111', '', '天津大学元英进团队正在揭开物种进化的神秘面纱，该团队首次发现了由人工基因组重排引发的不同尺度的杂合性缺失现象，揭示了基因组结构变异和非整倍体与酵母雷帕霉素耐受性的基因型-表型关系，为研究物种进化的遗传基础提供了新思路。', '2019-03-18 13:52:56', '1', '0', '0');
INSERT INTO `articles` VALUES ('9', '2', '1111', null, '今年天津大学工业设计工程应该算的上是历年来最难考的一年，没有之一，先做一个参考，2018年，报名人数80人，15人进入复试，录取12人。2019年，报名人数140人，43人进入复试，录取6人。（报名人数道听途说，也有一定的参考价值）2019年九月左右，教育部对工业设计工程进行改革，将工业设计工程划归为机械工程或艺术，降了一个等级，对于明年考生建议：明年很大概率考数学，工业设计工程不是很好的选择，设计学和艺术设计选择更有优势。', '2019-03-18 13:53:30', '1', '5', '0');
INSERT INTO `articles` VALUES ('10', '2', '1111', null, '今年就看着天津大学\r\n一开始招30个 后来说20个 放了将近130个进复试\r\n最后出名单收了13个', '2019-03-18 13:58:27', '1', '0', '0');
INSERT INTO `articles` VALUES ('11', '2', '1111', null, '天津大学法硕复试录取了,果然如此好运，狂吸欧气~\r\n\r\n小满哥考上了，激动的要哭了\r\n\r\n付出终于有了回报', '2019-03-18 14:01:12', '1', '0', '0');
INSERT INTO `articles` VALUES ('12', '2', '1111', null, '这两天找我聊天的学弟学妹越来越多，不管是本校的还是外校的，微博上认识我的或者朋友介绍的等等，我都尽可能的去解答大家的问题。但是有一些情况还是不太能准确回答大家，比如说天津大学金融专硕的分数线从18年的330到19年的381，涨了51分，会不会吓退20的一大波考生，这是要看你们20考生的心态，我不会不负责任的瞎预测。\r\n还有最近找我聊天的也有很多不确定学校的，我经验贴上写了我具体确定学校的流程，一定要想清楚自己想要什么。\r\n', '2019-03-18 14:02:53', '1', '0', '0');
INSERT INTO `articles` VALUES ('13', '3', '1111', null, '我们大天津的风，就是这么不期而遇！天津大学走起', '2019-03-18 14:06:41', '1', '0', '0');
INSERT INTO `articles` VALUES ('14', '3', '1111', null, 'hello,world!', '2019-03-18 14:11:13', '1', '0', '0');
INSERT INTO `articles` VALUES ('15', '3', '1111', null, 'hello,world!', '2019-03-18 14:14:20', '1', '0', '0');
INSERT INTO `articles` VALUES ('16', '3', '1111', null, 'hello,world!', '2019-03-18 14:14:46', '1', '0', '0');
INSERT INTO `articles` VALUES ('17', '3', '1111', null, 'hello,world!', '2019-03-18 14:16:35', '1', '0', '0');
INSERT INTO `articles` VALUES ('18', '3', '1111', null, 'hello,world!', '2019-03-18 14:27:01', '1', '0', '0');
INSERT INTO `articles` VALUES ('19', '4', '1111', null, 'hello,world!', '2019-03-18 14:31:25', '1', '0', '0');
INSERT INTO `articles` VALUES ('20', '4', '1111', null, 'hello,world!', '2019-03-18 14:36:25', '1', '0', '0');
INSERT INTO `articles` VALUES ('21', '4', '1111', null, 'hello,world!', '2019-03-18 14:37:14', '1', '0', '0');
INSERT INTO `articles` VALUES ('22', '4', '1111', null, 'hello,world!', '2019-03-18 14:37:37', '1', '0', '0');
INSERT INTO `articles` VALUES ('23', '4', '1111', null, 'hello,world!', '2019-03-18 14:43:49', '1', '0', '0');
INSERT INTO `articles` VALUES ('24', '4', '1111', null, 'hello,world!', '2019-03-18 14:44:42', '1', '0', '0');
INSERT INTO `articles` VALUES ('25', '5', '1111', null, 'hello,world!', '2019-03-18 14:45:32', '1', '0', '0');
INSERT INTO `articles` VALUES ('26', '5', '1111', null, 'hello,world!', '2019-03-18 14:45:55', '1', '0', '0');
INSERT INTO `articles` VALUES ('27', '5', '1111', null, 'hello,world!', '2019-03-18 14:46:39', '1', '0', '0');
INSERT INTO `articles` VALUES ('28', '5', '1111', null, 'hello,world!', '2019-03-18 14:47:26', '1', '0', '0');
INSERT INTO `articles` VALUES ('29', '5', '1111', null, 'hello,world!', '2019-03-18 14:53:07', '1', '0', '0');
INSERT INTO `articles` VALUES ('30', '5', '1111', null, 'hello,world!', '2019-03-18 14:53:19', '1', '0', '0');
INSERT INTO `articles` VALUES ('31', '6', '1111', null, 'hello,world!', '2019-03-18 15:00:54', '1', '0', '0');
INSERT INTO `articles` VALUES ('32', '6', '1111', null, 'hello,world!', '2019-03-18 15:01:21', '1', '0', '0');
INSERT INTO `articles` VALUES ('33', '6', '1111', null, 'hello,world!', '2019-03-18 15:01:36', '1', '0', '0');
INSERT INTO `articles` VALUES ('34', '1', '1111', null, 'hello,world!', '2019-03-18 15:03:22', '1', '0', '0');
INSERT INTO `articles` VALUES ('35', '1', '1111', null, 'hello,world!', '2019-03-18 15:04:57', '1', '0', '0');
INSERT INTO `articles` VALUES ('36', '1', '1111', null, '测试三张图片', '2019-03-27 21:40:21', '1', '0', '0');
INSERT INTO `articles` VALUES ('37', '1', '1111', null, 'hello天津,world!', '2019-03-27 23:28:50', '1', '0', '0');
INSERT INTO `articles` VALUES ('38', '1', '1111', null, 'hello天津,world!', '2019-03-27 23:29:33', '1', '0', '0');
INSERT INTO `articles` VALUES ('39', '1', '1111', null, 'hello,天津world天津!', '2019-03-28 14:44:21', '1', '0', '0');

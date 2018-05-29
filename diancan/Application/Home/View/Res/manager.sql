/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : tpfood

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2017-11-13 18:51:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for manager
-- ----------------------------
DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manager_name` varchar(255) NOT NULL COMMENT '管理员姓名',
  `manager_password` varchar(255) NOT NULL COMMENT '管理员密码',
  `sex` varchar(10) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL COMMENT '角色id',
  `manager_ctime` varchar(30) DEFAULT NULL COMMENT '管理员创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manager
-- ----------------------------
INSERT INTO `manager` VALUES ('1', '段志红', 'e10adc3949ba59abbe56e057f20f883e', '男', '18835573006', '1299239901@qq.com', '1', '2017-11-10 17:23:45');
INSERT INTO `manager` VALUES ('2', '陶彤', 'e10adc3949ba59abbe56e057f20f883e', '男', '18835573006', '1299239901@qq.com', '1', '2017-11-10 17:34:27');
INSERT INTO `manager` VALUES ('4', '秦陈程', 'e10adc3949ba59abbe56e057f20f883e', '女', '18835575248', '799875530@qq.com', '3', '2017-11-12 10:24:17');
INSERT INTO `manager` VALUES ('5', '李萃', 'e10adc3949ba59abbe56e057f20f883e', '女', '18835575248', '799875530@qq.com', '4', '2017-11-12 10:24:47');
INSERT INTO `manager` VALUES ('6', '王想', 'e10adc3949ba59abbe56e057f20f883e', '女', '18835575248', '799875530@qq.com', '5', '2017-11-12 10:25:25');

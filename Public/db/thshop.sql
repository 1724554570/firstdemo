/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50132
Source Host           : localhost:3306
Source Database       : thshop

Target Server Type    : MYSQL
Target Server Version : 50132
File Encoding         : 65001

Date: 2016-09-12 17:52:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_agent`
-- ----------------------------
DROP TABLE IF EXISTS `tb_agent`;
CREATE TABLE `tb_agent` (
  `agent_id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_name` varchar(30) DEFAULT NULL,
  `agent_pass` varchar(50) DEFAULT NULL,
  `agent_power` tinyint(1) DEFAULT '0' COMMENT '权限: 0 - 普通 , 1 - 正常 , 2 - 超级, 3 - 无效',
  `agent_ctime` int(11) DEFAULT NULL,
  `agent_utime` int(11) DEFAULT NULL,
  `agent_state` tinyint(1) DEFAULT '0' COMMENT '登录权限: 0 正常, 1 无效',
  `agent_lastlogin` int(11) DEFAULT NULL,
  PRIMARY KEY (`agent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_agent
-- ----------------------------
INSERT INTO `tb_agent` VALUES ('1', 'admin', 'MTQ3MzY3MjEyMY2PuNaUj5lu', '0', '1473672111', '1473672111', '0', null);

-- ----------------------------
-- Table structure for `tb_users`
-- ----------------------------
DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE `tb_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) DEFAULT NULL,
  `mlogo` varchar(255) DEFAULT NULL,
  `mtel` varchar(20) DEFAULT NULL,
  `mpass` varchar(50) DEFAULT NULL,
  `ctime` varchar(30) DEFAULT NULL,
  `utime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_users
-- ----------------------------

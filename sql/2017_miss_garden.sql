/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : rrhh

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-11-20 16:57:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `2017_miss_garden`
-- ----------------------------
DROP TABLE IF EXISTS `2017_miss_garden`;
CREATE TABLE `2017_miss_garden` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado_civil` int(11) DEFAULT NULL,
  `nombre` varchar(160) DEFAULT NULL,
  `edad` int(2) DEFAULT NULL,
  `sucursal` varchar(120) DEFAULT NULL,
  `departamento` varchar(120) DEFAULT NULL,
  `hobbies` text,
  `fecha` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 2017_miss_garden
-- ----------------------------

/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : rrhh

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-11-20 16:55:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `2017_imagenes_miss_mr`
-- ----------------------------
DROP TABLE IF EXISTS `2017_imagenes_miss_mr`;
CREATE TABLE `2017_imagenes_miss_mr` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_miss_garden` int(11) unsigned DEFAULT NULL,
  `img` varchar(180) DEFAULT NULL,
  `fecha_add` datetime DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 2017_imagenes_miss_mr
-- ----------------------------

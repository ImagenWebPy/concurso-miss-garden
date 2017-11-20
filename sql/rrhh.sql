/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : rrhh

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-11-20 16:51:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `2017_estado_civil`
-- ----------------------------
DROP TABLE IF EXISTS `2017_estado_civil`;
CREATE TABLE `2017_estado_civil` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) DEFAULT NULL,
  `estado` int(1) unsigned DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 2017_estado_civil
-- ----------------------------
INSERT INTO `2017_estado_civil` VALUES ('1', 'Soltera/o', '1');
INSERT INTO `2017_estado_civil` VALUES ('2', 'Casada/o', '1');
INSERT INTO `2017_estado_civil` VALUES ('3', 'Comprometida/o', '1');
INSERT INTO `2017_estado_civil` VALUES ('4', 'Divorciada/o', '1');
INSERT INTO `2017_estado_civil` VALUES ('5', 'Viuda/o', '1');

-- ----------------------------
-- Table structure for `2017_imagenes_miss_mr`
-- ----------------------------
DROP TABLE IF EXISTS `2017_imagenes_miss_mr`;
CREATE TABLE `2017_imagenes_miss_mr` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_miss_garden` int(11) unsigned DEFAULT NULL,
  `img` varchar(180) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 2017_imagenes_miss_mr
-- ----------------------------

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

-- ----------------------------
-- Table structure for `2017_mr_garden`
-- ----------------------------
DROP TABLE IF EXISTS `2017_mr_garden`;
CREATE TABLE `2017_mr_garden` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado_civil` int(11) DEFAULT NULL,
  `id_miss_garden` int(11) DEFAULT NULL,
  `nombre` varchar(160) DEFAULT NULL,
  `edad` int(2) DEFAULT NULL,
  `sucursal` varchar(120) DEFAULT NULL,
  `departamento` varchar(120) DEFAULT NULL,
  `hobbies` text,
  `fecha` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 2017_mr_garden
-- ----------------------------

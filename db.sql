/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50533
 Source Host           : 127.0.0.1
 Source Database       : nrasp

 Target Server Type    : MySQL
 Target Server Version : 50533
 File Encoding         : utf-8

 Date: 10/15/2013 00:20:33 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `binding`
-- ----------------------------
DROP TABLE IF EXISTS `binding`;
CREATE TABLE `binding` (
  `idbinding` int(11) NOT NULL AUTO_INCREMENT,
  `iddays` int(11) DEFAULT NULL,
  `idgroups` int(11) DEFAULT NULL,
  `idlessons_time` int(11) DEFAULT NULL,
  `idsubjects` int(11) DEFAULT NULL,
  `idcabinets` int(11) DEFAULT NULL,
  `overall` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idbinding`),
  KEY `iddays` (`iddays`),
  KEY `idsubjects` (`idsubjects`),
  KEY `idgroups` (`idgroups`),
  KEY `idcabinets` (`idcabinets`),
  KEY `idlessons_time` (`idlessons_time`),
  CONSTRAINT `binding_ibfk_1` FOREIGN KEY (`iddays`) REFERENCES `days` (`iddays`),
  CONSTRAINT `binding_ibfk_2` FOREIGN KEY (`idgroups`) REFERENCES `groups` (`idgroups`),
  CONSTRAINT `binding_ibfk_3` FOREIGN KEY (`idlessons_time`) REFERENCES `lessons_time` (`idlessons_time`),
  CONSTRAINT `binding_ibfk_4` FOREIGN KEY (`idsubjects`) REFERENCES `subjects` (`idsubects`),
  CONSTRAINT `binding_ibfk_5` FOREIGN KEY (`idcabinets`) REFERENCES `cabinets` (`idcabinets`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `binding`
-- ----------------------------
BEGIN;
INSERT INTO `binding` VALUES ('1', '1', '1', '1', '1', '2', '0'), ('2', '1', '1', '2', '1', '2', '1'), ('3', '1', '1', '2', '1', '2', '2'), ('4', '1', '1', '4', '1', '2', '0'), ('7', '1', '2', '2', '2', '3', '0'), ('8', '1', '2', '5', '2', '3', '0'), ('9', '1', '2', '4', '2', '3', '0'), ('11', '1', '3', '7', '1', '2', '0'), ('12', '1', '1', '5', '1', '2', '2'), ('13', '1', '1', '5', '2', '2', '1'), ('14', '1', '1', '6', '1', '2', '2');
COMMIT;

-- ----------------------------
--  Table structure for `cabinets`
-- ----------------------------
DROP TABLE IF EXISTS `cabinets`;
CREATE TABLE `cabinets` (
  `idcabinets` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`idcabinets`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cabinets`
-- ----------------------------
BEGIN;
INSERT INTO `cabinets` VALUES ('2', '102', '1'), ('3', '104', '1'), ('4', '110', '1'), ('5', '114', '1'), ('6', '201', '1'), ('7', '205', '1'), ('8', '206', '1'), ('9', '207', '1'), ('10', '210', '1');
COMMIT;

-- ----------------------------
--  Table structure for `days`
-- ----------------------------
DROP TABLE IF EXISTS `days`;
CREATE TABLE `days` (
  `iddays` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `visibility` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`iddays`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `days`
-- ----------------------------
BEGIN;
INSERT INTO `days` VALUES ('1', '2013-09-26', '1');
COMMIT;

-- ----------------------------
--  Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `idgroups` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`idgroups`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `groups`
-- ----------------------------
BEGIN;
INSERT INTO `groups` VALUES ('1', 'П-411', '1'), ('2', 'П-111', '1'), ('3', 'М-461', '1');
COMMIT;

-- ----------------------------
--  Table structure for `lessons_time`
-- ----------------------------
DROP TABLE IF EXISTS `lessons_time`;
CREATE TABLE `lessons_time` (
  `idlessons_time` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`idlessons_time`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `lessons_time`
-- ----------------------------
BEGIN;
INSERT INTO `lessons_time` VALUES ('1', '1', '08:20:00', '09:00:00', '1'), ('2', '2', '10:00:00', '11:30:00', '1'), ('3', '3', '12:30:00', '14:00:00', '1'), ('4', '4', '14:10:00', '15:40:00', '1'), ('5', '5', '16:00:00', '17:30:00', '1'), ('6', '6', '17:40:00', '19:10:00', '1'), ('7', '7', '19:20:00', '20:50:00', '1');
COMMIT;

-- ----------------------------
--  Table structure for `subjects`
-- ----------------------------
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `idsubects` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `idgroups` int(11) DEFAULT NULL,
  `idteacher` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsubects`),
  KEY `idgroups` (`idgroups`),
  KEY `idteacher` (`idteacher`),
  CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`idgroups`) REFERENCES `groups` (`idgroups`),
  CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`idteacher`) REFERENCES `teachers` (`idteacher`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `subjects`
-- ----------------------------
BEGIN;
INSERT INTO `subjects` VALUES ('1', 'МАТЕМ', '1', '1', '1'), ('2', 'ФИЗИКА', '1', '2', '2');
COMMIT;

-- ----------------------------
--  Table structure for `teachers`
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `idteacher` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idteacher`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `teachers`
-- ----------------------------
BEGIN;
INSERT INTO `teachers` VALUES ('1', 'f1', 'f2', 'f3', '1'), ('2', 'f1_1', 'f2_1', 'f3_1', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

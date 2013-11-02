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

 Date: 11/02/2013 21:40:48 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `BindingSubjectGroup`
-- ----------------------------
DROP TABLE IF EXISTS `BindingSubjectGroup`;
CREATE TABLE `BindingSubjectGroup` (
  `idBindingSubjectGroup` int(11) NOT NULL AUTO_INCREMENT,
  `idSubject` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL,
  PRIMARY KEY (`idBindingSubjectGroup`),
  KEY `idSubject` (`idSubject`),
  KEY `idGroup` (`idGroup`),
  CONSTRAINT `bindingsubjectgroup_ibfk_1` FOREIGN KEY (`idSubject`) REFERENCES `subjects` (`idsubects`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bindingsubjectgroup_ibfk_2` FOREIGN KEY (`idGroup`) REFERENCES `groups` (`idgroups`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `BindingSubjectGroup`
-- ----------------------------
BEGIN;
INSERT INTO `BindingSubjectGroup` VALUES ('1', '1', '1'), ('2', '1', '2'), ('3', '2', '1');
COMMIT;

-- ----------------------------
--  Table structure for `announcements`
-- ----------------------------
DROP TABLE IF EXISTS `announcements`;
CREATE TABLE `announcements` (
  `idannouncements` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`idannouncements`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `type` tinyint(1) DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `binding`
-- ----------------------------
BEGIN;
INSERT INTO `binding` VALUES ('1', '1', '1', '1', '1', '2', '0'), ('2', '1', '1', '2', '1', '2', '1'), ('3', '1', '1', '2', '1', '2', '2'), ('4', '1', '1', '4', '1', '2', '0'), ('7', '1', '2', '2', '2', '3', '0'), ('8', '1', '2', '5', '2', '3', '0'), ('9', '1', '2', '4', '2', '3', '0'), ('11', '1', '3', '7', '1', '2', '0'), ('12', '1', '1', '5', '1', '2', '2'), ('13', '1', '1', '5', '2', '2', '1'), ('14', '1', '1', '6', '1', '2', '2'), ('15', '3', '1', '1', '1', '2', '0'), ('16', null, null, null, null, null, '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `days`
-- ----------------------------
BEGIN;
INSERT INTO `days` VALUES ('1', '2013-09-26', '1'), ('2', '2013-10-20', '1'), ('3', '2013-11-04', '1'), ('4', '2013-11-05', '1'), ('5', '2013-11-06', '1'), ('6', '2013-11-07', '1'), ('7', '2013-11-08', '1'), ('8', '2013-11-09', '1');
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
INSERT INTO `lessons_time` VALUES ('1', '1', '08:20:00', '09:50:00', '1'), ('2', '2', '10:00:00', '11:30:00', '1'), ('3', '3', '12:30:00', '14:00:00', '1'), ('4', '4', '14:10:00', '15:40:00', '1'), ('5', '5', '16:00:00', '17:30:00', '1'), ('6', '6', '17:40:00', '19:10:00', '1'), ('7', '7', '19:20:00', '20:50:00', '1');
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
INSERT INTO `teachers` VALUES ('1', 'Роман', 'Прохоров', 'Гавриилович', '1'), ('2', 'Вячеслав', 'Николаев', 'Максимович', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50533
 Source Host           : localhost
 Source Database       : nrasp

 Target Server Type    : MySQL
 Target Server Version : 50533
 File Encoding         : utf-8

 Date: 11/26/2013 23:05:28 PM
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
--  Table structure for `BindingTeacherSubjects`
-- ----------------------------
DROP TABLE IF EXISTS `BindingTeacherSubjects`;
CREATE TABLE `BindingTeacherSubjects` (
  `idBindingSubjectGroup` int(11) NOT NULL AUTO_INCREMENT,
  `idTeacher` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL,
  PRIMARY KEY (`idBindingSubjectGroup`),
  KEY `idSubject` (`idSubject`),
  KEY `idTeacher` (`idTeacher`),
  CONSTRAINT `bindingteachersubjects_ibfk_1` FOREIGN KEY (`idSubject`) REFERENCES `subjects` (`idsubects`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bindingteachersubjects_ibfk_2` FOREIGN KEY (`idTeacher`) REFERENCES `teachers` (`idteacher`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `BindingTeacherSubjects`
-- ----------------------------
BEGIN;
INSERT INTO `BindingTeacherSubjects` VALUES ('4', '1', '1'), ('5', '2', '2');
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
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `binding`
-- ----------------------------
BEGIN;
INSERT INTO `binding` VALUES ('1', '1', '1', '1', '1', '2', '0'), ('2', '1', '1', '2', '1', '2', '1'), ('3', '1', '1', '2', '1', '2', '2'), ('4', '1', '1', '4', '1', '2', '0'), ('7', '1', '2', '2', '2', '3', '0'), ('8', '1', '2', '5', '2', '3', '0'), ('9', '1', '2', '4', '2', '3', '0'), ('11', '1', '3', '7', '1', '2', '0'), ('12', '1', '1', '5', '1', '2', '2'), ('13', '1', '1', '5', '2', '2', '1'), ('14', '1', '1', '6', '1', '2', '2'), ('15', '3', '1', '1', '1', '2', '0'), ('17', '3', '2', '2', '1', null, '1'), ('18', '3', '1', '3', '2', null, '1'), ('19', '3', '1', '3', '2', null, '2'), ('20', '3', '1', '2', '1', null, '0'), ('23', '5', '1', '1', '1', null, '0'), ('24', '6', '1', '1', '2', null, '0'), ('25', '8', '2', '2', '1', null, '1'), ('26', '8', '2', '2', '1', null, '2'), ('27', '3', '2', '7', '1', null, '0'), ('30', '9', '1', '1', '2', null, '0'), ('31', '9', '1', '2', '2', null, '0'), ('32', '9', '1', '3', '2', null, '0'), ('33', '9', '1', '4', '1', null, '1'), ('34', '9', '1', '4', '1', null, '2'), ('35', '9', '2', '3', '1', null, '1'), ('36', '9', '2', '5', '1', null, '1'), ('37', '10', '1', '3', '1', null, '0'), ('38', '10', '1', '4', '1', null, '1'), ('39', '10', '1', '5', '2', null, '1'), ('40', '10', '2', '1', '1', null, '1'), ('41', '10', '2', '4', '1', null, '2'), ('42', '11', '1', '1', '1', null, '0'), ('43', '11', '1', '2', '2', null, '0'), ('44', '11', '1', '3', '1', null, '0'), ('45', '11', '1', '4', '2', null, '0'), ('46', '11', '1', '5', '2', null, '0'), ('47', '11', '2', '1', '1', null, '1'), ('48', '11', '2', '2', '1', null, '2'), ('49', '12', '1', '1', '2', null, '2'), ('50', '12', '1', '2', '1', null, '1'), ('51', '12', '1', '3', '2', null, '0'), ('52', '12', '1', '4', '2', null, '1'), ('53', '12', '2', '4', '1', null, '1'), ('54', '12', '2', '4', '1', null, '2'), ('143', '15', '1', '1', '1', null, '0'), ('144', '15', '1', '2', '2', null, '0'), ('145', '15', '1', '3', '1', null, '0'), ('146', '15', '1', '4', '2', null, '0'), ('147', '15', '1', '5', '1', null, '0'), ('148', '15', '1', '6', '2', null, '0'), ('149', '15', '1', '7', '1', null, '0'), ('150', '15', '2', '2', '1', null, '0'), ('151', '15', '2', '3', '1', null, '0'), ('152', '16', '1', '1', '1', null, '0'), ('153', '16', '1', '1', '1', null, '2'), ('154', '22', '2', '2', '1', null, '2');
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
--  Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Records of `ci_sessions`
-- ----------------------------
BEGIN;
INSERT INTO `ci_sessions` VALUES ('00a51986b433f8f734ee979db0657ed5', '204.93.154.198', '0', '1385480293', ''), ('65575205c2bedbd001f1f136cf47ad09', '61.50.138.155', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Avast Browser [avastye.com]; .NET CLR 1.1.4322)', '1385479745', ''), ('a8cc84acc8abcf60d51767636c464be7', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '1385485133', 0x613a343a7b733a393a22757365725f64617461223b733a303a22223b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a224b6f646469223b733a363a22737461747573223b733a313a2231223b7d);
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `days`
-- ----------------------------
BEGIN;
INSERT INTO `days` VALUES ('1', '2013-09-26', '1'), ('2', '2013-10-20', '1'), ('3', '2013-11-04', '1'), ('4', '2013-11-05', '1'), ('5', '2013-11-06', '1'), ('6', '2013-11-07', '1'), ('7', '2013-11-08', '1'), ('8', '2013-11-09', '1'), ('9', '2013-11-18', '1'), ('10', '2013-11-19', '1'), ('11', '2013-11-20', '1'), ('12', '2013-11-21', '1'), ('13', '2013-11-22', '1'), ('14', '2013-11-23', '1'), ('15', '2013-11-24', '1'), ('16', '2013-11-25', '1'), ('17', '2013-11-26', '1'), ('18', '2013-11-27', '1'), ('19', '2013-11-28', '1'), ('20', '2013-11-29', '1'), ('21', '1970-01-01', '1'), ('22', '2013-11-26', '1');
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
--  Table structure for `login_attempts`
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Table structure for `subjects`
-- ----------------------------
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `idsubects` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`idsubects`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `subjects`
-- ----------------------------
BEGIN;
INSERT INTO `subjects` VALUES ('1', 'Математика', 'Матем', '1'), ('2', 'Естествознание (Физика)', 'Физика', '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `teachers`
-- ----------------------------
BEGIN;
INSERT INTO `teachers` VALUES ('1', 'Светлана', 'Снегирева', 'Борисовна', '1'), ('2', 'Елена', 'Щербакова', 'Михайловна', '1'), ('3', 'Людмила', 'Велижанская', 'Витальевна', '1'), ('4', 'Марина', 'Калатори', 'Гурамовна', '1'), ('5', 'Марина', 'Ощепкова', 'Валерьевна', '1'), ('6', 'Ирина', 'Фурик', 'Александровна', '1'), ('7', 'Татьяна', 'Томилова', 'Витальевна', '1'), ('8', 'Людмила', 'Вехова', 'Геннадьевна', '1'), ('9', 'Александр', 'Лихачев', 'Владимирович', '1'), ('10', 'Ольга', 'Усольцева', 'Ивановна', '1'), ('11', 'Эмилия', 'Захватошина', 'Михайловна', '1'), ('12', 'Марина', 'Кравченко', 'Игоревна', '1'), ('13', 'Анна', 'Лихачева', 'Анатольевна', '1'), ('14', 'Людмила', 'Курашова', 'Николаевна', '1'), ('15', 'Ольга', 'Цымбал', 'Анатольевна', '1'), ('16', 'Виктория', 'Семенова', 'Сергеевна', '1'), ('17', 'Артем', 'Зюзев', 'Валерьевич', '1'), ('18', 'Даниил', 'Кузнецов', 'Владимирович', '1'), ('19', 'Дмитрий', 'Пьянков', 'Сергеевич', '1'), ('20', 'Ирина', 'Василенко', 'Николаевна', '1'), ('21', 'Василий', 'Брюханов', 'Алексеевич', '1'), ('22', 'Екатерина', 'Зенцова', 'Михайловна', '1');
COMMIT;

-- ----------------------------
--  Table structure for `user_autologin`
-- ----------------------------
DROP TABLE IF EXISTS `user_autologin`;
CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Records of `user_autologin`
-- ----------------------------
BEGIN;
INSERT INTO `user_autologin` VALUES ('c01ad28609f94f4c774512f2274d7fd8', '1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36', '127.0.0.1', '2013-11-03 20:03:31');
COMMIT;

-- ----------------------------
--  Table structure for `user_profiles`
-- ----------------------------
DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Records of `user_profiles`
-- ----------------------------
BEGIN;
INSERT INTO `user_profiles` VALUES ('1', '1', null, null), ('2', '2', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'Koddi', '$2a$08$HVU5DMIgpFYknqnE9o1GJeTN8elu00pkd892DhJwti.PJRc3CbbCu', 'nazgardo@ya.ru', '1', '0', null, null, null, null, null, '127.0.0.1', '2013-11-26 17:11:22', '2013-11-03 19:18:09', '2013-11-26 17:11:22', '1'), ('2', 'test', '$2a$08$mArV63A80FmZq0pvGt8Uy.esLJv1CoglA/lzWZU.nWfLIjEYpYv5O', 'test@test.ru', '1', '0', null, null, null, null, null, '127.0.0.1', '2013-11-03 19:54:24', '2013-11-03 19:54:19', '2013-11-03 19:54:24', null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

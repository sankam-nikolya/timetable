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

 Date: 01/03/2014 22:22:49 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `BindingDayGroupEvent`
-- ----------------------------
DROP TABLE IF EXISTS `BindingDayGroupEvent`;
CREATE TABLE `BindingDayGroupEvent` (
  `idBindingDayGroupEvent` int(11) NOT NULL AUTO_INCREMENT,
  `idDay` int(11) DEFAULT NULL,
  `idGroup` int(11) DEFAULT NULL,
  `txtEvent` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idBindingDayGroupEvent`),
  KEY `idDay` (`idDay`),
  KEY `idGroup` (`idGroup`),
  CONSTRAINT `bindingdaygroupevent_ibfk_1` FOREIGN KEY (`idDay`) REFERENCES `days` (`iddays`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bindingdaygroupevent_ibfk_2` FOREIGN KEY (`idGroup`) REFERENCES `groups` (`idgroups`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `BindingDayGroupEvent`
-- ----------------------------
BEGIN;
INSERT INTO `BindingDayGroupEvent` VALUES ('17', '130', '1', '9.00 Экзамен «Технология выполнения работ по профессии «Оператор ЭВМ» 206');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `BindingSubjectGroup`
-- ----------------------------
BEGIN;
INSERT INTO `BindingSubjectGroup` VALUES ('3', '2', '1'), ('29', '3', '2'), ('30', '3', '5'), ('31', '3', '6'), ('32', '3', '7'), ('33', '3', '8'), ('34', '3', '9'), ('35', '3', '1'), ('36', '3', '3'), ('37', '4', '2'), ('38', '4', '5'), ('39', '4', '6'), ('40', '4', '7'), ('41', '4', '8'), ('42', '4', '9'), ('43', '4', '1'), ('44', '4', '3'), ('45', '5', '2'), ('46', '5', '5'), ('47', '6', '2'), ('48', '6', '5'), ('51', '8', '2'), ('52', '8', '5'), ('53', '9', '2'), ('54', '9', '5'), ('55', '10', '2'), ('56', '10', '5'), ('57', '11', '2'), ('58', '11', '5'), ('59', '12', '2'), ('60', '12', '5'), ('61', '13', '2'), ('62', '13', '5'), ('63', '14', '2'), ('64', '14', '5'), ('65', '15', '2'), ('66', '15', '5'), ('67', '16', '2'), ('68', '16', '5'), ('69', '17', '2'), ('70', '17', '5'), ('71', '18', '5'), ('76', '20', '6'), ('77', '21', '6'), ('80', '24', '6'), ('81', '25', '6'), ('83', '28', '6'), ('84', '29', '6'), ('85', '30', '6'), ('86', '31', '6'), ('87', '32', '6'), ('88', '33', '6'), ('89', '34', '6'), ('91', '36', '6'), ('92', '7', '2'), ('93', '7', '5'), ('94', '7', '6'), ('95', '7', '7'), ('96', '19', '6'), ('97', '19', '7'), ('103', '37', '7'), ('104', '23', '6'), ('105', '23', '7'), ('107', '26', '6'), ('108', '26', '7'), ('109', '39', '7'), ('110', '40', '7'), ('111', '41', '7'), ('112', '42', '7'), ('114', '44', '7'), ('115', '45', '7'), ('116', '46', '7'), ('117', '47', '7'), ('118', '48', '7'), ('119', '38', '7'), ('120', '38', '8'), ('121', '49', '8'), ('124', '50', '8'), ('125', '51', '8'), ('127', '53', '8'), ('128', '54', '8'), ('129', '55', '8'), ('130', '56', '8'), ('131', '57', '8'), ('132', '58', '8'), ('133', '59', '8'), ('134', '60', '8'), ('135', '61', '8'), ('136', '62', '9'), ('137', '63', '9'), ('138', '64', '9'), ('139', '65', '9'), ('140', '66', '9'), ('141', '67', '9'), ('142', '52', '8'), ('143', '52', '1'), ('144', '68', '1'), ('145', '69', '1'), ('146', '72', '1'), ('147', '73', '1'), ('148', '1', '2'), ('149', '1', '5'), ('150', '1', '7'), ('151', '1', '3'), ('152', '22', '6'), ('153', '22', '3'), ('154', '75', '3'), ('155', '76', '3'), ('156', '77', '3'), ('157', '78', '3'), ('158', '79', '3'), ('159', '80', '3'), ('160', '81', '3'), ('161', '82', '3'), ('162', '35', '6'), ('163', '35', '3'), ('164', '83', '3'), ('165', '84', '3'), ('166', '85', '3'), ('167', '86', '3'), ('168', '87', '3'), ('171', '27', '6'), ('175', '43', '5'), ('176', '43', '7'), ('177', '43', '8'), ('178', '70', '1'), ('179', '88', '2'), ('180', '88', '5'), ('181', '88', '6'), ('182', '88', '7'), ('183', '88', '8'), ('184', '88', '9'), ('185', '88', '1'), ('186', '88', '3');
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
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `BindingTeacherSubjects`
-- ----------------------------
BEGIN;
INSERT INTO `BindingTeacherSubjects` VALUES ('15', '21', '72'), ('16', '21', '73'), ('17', '20', '62'), ('18', '20', '66'), ('19', '3', '5'), ('21', '8', '11'), ('22', '8', '12'), ('23', '11', '16'), ('24', '11', '17'), ('25', '11', '19'), ('26', '11', '26'), ('27', '11', '42'), ('28', '22', '82'), ('29', '22', '86'), ('30', '17', '41'), ('31', '4', '6'), ('32', '12', '21'), ('33', '12', '23'), ('34', '12', '29'), ('35', '12', '31'), ('36', '12', '33'), ('37', '12', '77'), ('46', '14', '25'), ('47', '14', '75'), ('48', '14', '81'), ('49', '14', '84'), ('50', '14', '86'), ('51', '9', '14'), ('52', '9', '20'), ('53', '9', '48'), ('54', '9', '60'), ('55', '9', '61'), ('58', '5', '7'), ('59', '5', '8'), ('60', '5', '76'), ('61', '19', '53'), ('62', '19', '58'), ('63', '19', '59'), ('74', '1', '3'), ('75', '7', '10'), ('76', '7', '32'), ('77', '7', '87'), ('78', '10', '1'), ('79', '10', '15'), ('80', '10', '22'), ('81', '10', '38'), ('82', '10', '50'), ('83', '10', '51'), ('84', '10', '57'), ('88', '15', '28'), ('89', '15', '63'), ('90', '15', '64'), ('91', '15', '65'), ('92', '15', '67'), ('93', '2', '4'), ('94', '2', '43'), ('95', '6', '9'), ('96', '6', '27'), ('97', '6', '35'), ('98', '13', '24'), ('131', '16', '37'), ('132', '16', '22'), ('133', '16', '88'), ('134', '16', '44'), ('135', '16', '40'), ('136', '16', '85'), ('137', '16', '45'), ('138', '16', '39'), ('139', '16', '54'), ('140', '16', '70'), ('141', '16', '47'), ('142', '18', '55'), ('143', '18', '68'), ('144', '18', '49'), ('145', '18', '88'), ('146', '18', '44'), ('147', '18', '56'), ('148', '18', '69'), ('149', '18', '71'), ('150', '18', '46');
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
  CONSTRAINT `binding_ibfk_1` FOREIGN KEY (`iddays`) REFERENCES `days` (`iddays`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `binding_ibfk_2` FOREIGN KEY (`idgroups`) REFERENCES `groups` (`idgroups`),
  CONSTRAINT `binding_ibfk_3` FOREIGN KEY (`idlessons_time`) REFERENCES `lessons_time` (`idlessons_time`),
  CONSTRAINT `binding_ibfk_4` FOREIGN KEY (`idsubjects`) REFERENCES `subjects` (`idsubects`),
  CONSTRAINT `binding_ibfk_5` FOREIGN KEY (`idcabinets`) REFERENCES `cabinets` (`idcabinets`)
) ENGINE=InnoDB AUTO_INCREMENT=1251 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `binding`
-- ----------------------------
BEGIN;
INSERT INTO `binding` VALUES ('1232', '129', '6', '1', '4', null, '0'), ('1233', '129', '6', '2', '23', null, '0'), ('1234', '129', '6', '3', '21', null, '0'), ('1235', '129', '6', '4', '25', null, '0'), ('1236', '129', '1', '3', '88', null, '0'), ('1237', '129', '3', '4', '4', null, '0'), ('1238', '129', '3', '5', '4', null, '0'), ('1239', '129', '3', '6', '84', null, '0'), ('1240', '129', '3', '7', '84', null, '0'), ('1241', '130', '6', '1', '4', null, '0'), ('1242', '130', '6', '2', '3', null, '0'), ('1243', '130', '6', '3', '21', null, '0'), ('1244', '130', '6', '4', '3', null, '0'), ('1245', '130', '3', '1', '3', null, '0'), ('1246', '130', '3', '2', '4', null, '0'), ('1247', '130', '3', '3', '3', null, '0'), ('1248', '130', '3', '4', '85', null, '0');
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
INSERT INTO `ci_sessions` VALUES ('808a1d85b59f8f000131c794d956f618', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', '1388760762', ''), ('a2b67fb2d347f8fe2432a6ca7d60eccb', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', '1388765916', 0x613a363a7b733a393a22757365725f64617461223b733a303a22223b733a383a226964656e74697479223b733a31353a2261646d696e4061646d696e2e636f6d223b733a383a22757365726e616d65223b733a31333a2261646d696e6973747261746f72223b733a353a22656d61696c223b733a31353a2261646d696e4061646d696e2e636f6d223b733a373a22757365725f6964223b733a313a2231223b733a31343a226f6c645f6c6173745f6c6f67696e223b733a31303a2231333838373631313439223b7d), ('b298b394303dd6b19aeb5b933e3c4549', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', '1388764579', '');
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
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `days`
-- ----------------------------
BEGIN;
INSERT INTO `days` VALUES ('129', '2014-01-09', '1'), ('130', '2014-01-10', '1');
COMMIT;

-- ----------------------------
--  Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `idgroups` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `fulltime` tinyint(1) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`idgroups`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `groups`
-- ----------------------------
BEGIN;
INSERT INTO `groups` VALUES ('1', 'П-411', '1', null, '7'), ('2', 'П-111', '1', null, '1'), ('3', 'М-461', '1', null, '8'), ('5', 'Л-181', '1', null, '2'), ('6', 'Б-221', '1', null, '3'), ('7', 'И-271', '1', null, '4'), ('8', 'П-311', '1', null, '5'), ('9', 'Б-321', '1', null, '6');
COMMIT;

-- ----------------------------
--  Table structure for `ion_groups`
-- ----------------------------
DROP TABLE IF EXISTS `ion_groups`;
CREATE TABLE `ion_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `ion_groups`
-- ----------------------------
BEGIN;
INSERT INTO `ion_groups` VALUES ('1', 'admin', 'Administrator'), ('2', 'members', 'General User');
COMMIT;

-- ----------------------------
--  Table structure for `ion_login_attempts`
-- ----------------------------
DROP TABLE IF EXISTS `ion_login_attempts`;
CREATE TABLE `ion_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `ion_users`
-- ----------------------------
DROP TABLE IF EXISTS `ion_users`;
CREATE TABLE `ion_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `ion_users`
-- ----------------------------
BEGIN;
INSERT INTO `ion_users` VALUES ('1', 0x7f000001, 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', '73266c5a9eb6c9b02d0bd18fcc0ff10deaa3ddfc', '1385648327', '9d029802e28cd9c768e8e62277c0df49ec65c48c', '1268889823', '1388761277', '1', 'Admin', 'istrator', 'ADMIN', '0'), ('4', 0x7f000001, 'Koddi', 'd9bf7b6f2fc3a04981bb8f21303ef4577b5e8e45', null, 'nazgardo@ya.ru', '', '', null, null, '1388761095', '1388761095', '1', '1', '2', '1', '');
COMMIT;

-- ----------------------------
--  Table structure for `ion_users_groups`
-- ----------------------------
DROP TABLE IF EXISTS `ion_users_groups`;
CREATE TABLE `ion_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `ion_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `ion_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `ion_users_groups`
-- ----------------------------
BEGIN;
INSERT INTO `ion_users_groups` VALUES ('1', '1', '1'), ('5', '4', '1');
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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `subjects`
-- ----------------------------
BEGIN;
INSERT INTO `subjects` VALUES ('1', 'Математика', 'Матем', '1'), ('2', 'Естествознание (Физика)', 'Физика', '1'), ('3', 'Английский язык', 'Англ.яз', '1'), ('4', 'Физическая культура', 'Физ-ра', '1'), ('5', 'Русский язык и литература', 'Русс.яз', '1'), ('6', 'Литература', 'Литерат', '1'), ('7', 'История', 'История', '1'), ('8', 'Обществознание (обществознание)', 'Общест', '1'), ('9', 'Обществознание (право)', 'Право', '1'), ('10', 'Обществознание (экономика)', 'Эконом', '1'), ('11', 'Химия', 'Химия', '1'), ('12', 'Биология', 'Биология', '1'), ('13', 'Основы безопасности жизнедеятельности', 'ОБЖ', '1'), ('14', 'Физика', 'Физика', '1'), ('15', 'Информатика и ИКТ', 'Информ', '1'), ('16', 'Психология делового общения', 'Психол', '1'), ('17', 'Основы проектной деятельности', 'Пр.деят', '1'), ('18', 'География', 'Геогр', '1'), ('19', 'Основы философии', 'Осн.филос', '1'), ('20', 'Элементы высшей математики', 'Эл.высш.мат', '1'), ('21', 'Финансовая математика', 'Финн.мат', '1'), ('22', 'Информационные технологии в профессиональной деятельности', 'ИТвПД', '1'), ('23', 'Экономика организации', 'Экон.орг', '1'), ('24', 'Статистика', 'Статист', '1'), ('25', 'Менеджмент', 'Менедж', '1'), ('26', 'Документационное обеспечение управления', 'ДОУ', '1'), ('27', 'Правовое обеспечение профессиональной деятельности', 'ПОПД', '1'), ('28', 'Финансы, денежное обращение и кредит', 'Финансы', '1'), ('29', 'Бухгалтерский учет', 'Бухучет', '1'), ('30', 'Организация банковского учета в банке', 'Банк.учет', '1'), ('31', 'Анализ финансово-хозяйственной деятельности', 'АФХД', '1'), ('32', 'Основы экономической теории', 'Эк.теор', '1'), ('33', 'Маркетинг', 'Маркет', '1'), ('34', 'Безопасность банковской деятельности', 'ББД', '1'), ('35', 'Трудовое право', 'Труд.пр.', '1'), ('36', 'Страховая деятельность', 'Страх.деят.', '1'), ('37', 'Дискретная математика', 'Дискр.матем.', '1'), ('38', 'Теория вероятностей и математическая статистика', 'ТВиМС', '1'), ('39', 'Основы теории информации', 'ОТИ', '1'), ('40', 'Операционные системы и среды', 'Опер.сист.', '1'), ('41', 'Архитектура ЭВМ и вычислительных систем', 'Архит.', '1'), ('42', 'Психология и этика делового общения и профессиональной деятельности', 'Психол.', '1'), ('43', 'Безопасность жизнедеятельности', 'БЖД', '1'), ('44', 'Обработка отраслевой информации', 'ООИ', '1'), ('45', 'Основы программирования', 'Осн.прогр.', '1'), ('46', 'Учебная практика Технические средства информатизации', 'ТСИ(УП)', '1'), ('47', 'Учебная практика Графика', 'Графика (УП)', '1'), ('48', 'Основы электротехники и электроники (ДОУ)', 'Осн.электр.', '1'), ('49', 'Компьютерные сети', 'К.сети', '1'), ('50', 'Эксплуатация и модификация ИС', 'Эксп.ИС', '1'), ('51', 'Методы и средства проектирования ИС', 'Мет.и ср.', '1'), ('52', 'Сопровождение и продвижение ИС', 'Сопр.ИС', '1'), ('53', 'Язык программирования С#', 'С#', '1'), ('54', 'Пакеты прикладных программ для графики', 'Графика', '1'), ('55', 'Web-ориентированное программирование', 'web', '1'), ('56', 'Предметно-ориентированное программирование', 'ПОП', '1'), ('57', 'Учебная практика Эксплуатация информационных систем', 'УП Эксп.ИС', '1'), ('58', 'Учебная практика Программирование на С#', 'УП C#', '1'), ('59', 'Учебная практика по базам данных', 'УП БД', '1'), ('60', 'Электронные устройства и схемы', 'Эл.устр.', '1'), ('61', 'Элементы и устройства цифровой техники', 'ЦТ', '1'), ('62', 'Организация безналичного расчета', 'Безн.расч.', '1'), ('63', 'Формирование клиентской базы', 'Форм.кл.базы', '1'), ('64', 'Организация кредитной работы', 'Орг.кр.раб.', '1'), ('65', 'Продвижение и продажа банковских продуктов и услуг', 'Продв.банк.усл.', '1'), ('66', 'Учебная практика Организация безналичного расчета', 'УП Безн.расч.', '1'), ('67', 'Учебная практика Организация кредитной работы', 'УП Орг.кр.раб.', '1'), ('68', 'Информационные технологии и платформы разработки ИС', 'Пл.разр.ИС', '1'), ('69', 'Управление проектами', 'Упр.пр.', '1'), ('70', 'Технологии выполнения работ по профессии «Оператор ЭВМ и вычислительных систем»', 'Техн.вып.раб.', '1'), ('71', 'Учебная практика Разработка информационных систем', 'УП РИС', '1'), ('72', 'Системное администрирование', 'Сист.адм.', '1'), ('73', 'Технологии разработки программных продуктов', 'Техн.разр.', '1'), ('75', 'Управление качеством', 'Упр.кач.', '1'), ('76', 'Основы исследовательской деятельности', 'Иссл.деят.', '1'), ('77', 'Маркетинговые исследования', 'Марк.иссл.', '1'), ('78', 'Государственное регулирование экономики', 'Гос.рег.экон.', '1'), ('79', 'Экономическая статистика', 'Экон.стат.', '1'), ('80', 'Система национальных счетов', 'Сист.нац.сч.', '1'), ('81', 'Теория организации', 'Теор.орг.', '1'), ('82', 'Кадровый менеджмент', 'Кадр.мен.', '1'), ('83', 'Документационное обеспечение кадровой службы', 'ДОКС', '1'), ('84', 'Конфликтология', 'Конфл.', '1'), ('85', 'Организация защиты информации', 'Защ.инф.', '1'), ('86', 'Разработка управленческого решения', 'Разр.упр.реш.', '1'), ('87', 'Экономика уральского региона', 'Эк.ур.рег.', '1'), ('88', 'Консультация', 'Консультация', '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `teachers`
-- ----------------------------
BEGIN;
INSERT INTO `teachers` VALUES ('1', 'Светлана', 'Снегирева', 'Борисовна', '1'), ('2', 'Елена', 'Щербакова', 'Михайловна', '1'), ('3', 'Людмила', 'Велижанская', 'Витальевна', '1'), ('4', 'Марина', 'Калатори', 'Гурамовна', '1'), ('5', 'Марина', 'Ощепкова', 'Валерьевна', '1'), ('6', 'Ирина', 'Фурик', 'Александровна', '1'), ('7', 'Татьяна', 'Томилова', 'Витальевна', '1'), ('8', 'Людмила', 'Вехова', 'Геннадьевна', '1'), ('9', 'Александр', 'Лихачев', 'Владимирович', '1'), ('10', 'Ольга', 'Усольцева', 'Ивановна', '1'), ('11', 'Эмилия', 'Захватошина', 'Михайловна', '1'), ('12', 'Марина', 'Кравченко', 'Игоревна', '1'), ('13', 'Анна', 'Лихачева', 'Анатольевна', '1'), ('14', 'Людмила', 'Курашова', 'Николаевна', '1'), ('15', 'Ольга', 'Цымбал', 'Анатольевна', '1'), ('16', 'Виктория', 'Семенова', 'Сергеевна', '1'), ('17', 'Артем', 'Зюзев', 'Валерьевич', '1'), ('18', 'Даниил', 'Кузнецов', 'Владимирович', '1'), ('19', 'Дмитрий', 'Пьянков', 'Сергеевич', '1'), ('20', 'Ирина', 'Василенко', 'Николаевна', '1'), ('21', 'Василий', 'Брюханов', 'Алексеевич', '1'), ('22', 'Екатерина', 'Зенцова', 'Михайловна', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

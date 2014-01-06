/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50170
Source Host           : localhost:3306
Source Database       : nrasp

Target Server Type    : MYSQL
Target Server Version : 50170
File Encoding         : 65001

Date: 2014-01-07 01:01:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `announcements`
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
-- Records of announcements
-- ----------------------------

-- ----------------------------
-- Table structure for `binding`
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of binding
-- ----------------------------
INSERT INTO `binding` VALUES ('1', '1', '2', '2', '3', null, '0');
INSERT INTO `binding` VALUES ('3', '1', '5', '2', '11', null, '1');
INSERT INTO `binding` VALUES ('4', '1', '5', '2', '9', null, '2');

-- ----------------------------
-- Table structure for `BindingDayGroupEvent`
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of BindingDayGroupEvent
-- ----------------------------
INSERT INTO `BindingDayGroupEvent` VALUES ('1', '1', '1', '555');

-- ----------------------------
-- Table structure for `BindingSubjectGroup`
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
-- Records of BindingSubjectGroup
-- ----------------------------
INSERT INTO `BindingSubjectGroup` VALUES ('29', '3', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('30', '3', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('31', '3', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('32', '3', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('33', '3', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('34', '3', '9');
INSERT INTO `BindingSubjectGroup` VALUES ('35', '3', '1');
INSERT INTO `BindingSubjectGroup` VALUES ('36', '3', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('37', '4', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('38', '4', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('39', '4', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('40', '4', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('41', '4', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('42', '4', '9');
INSERT INTO `BindingSubjectGroup` VALUES ('43', '4', '1');
INSERT INTO `BindingSubjectGroup` VALUES ('44', '4', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('45', '5', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('46', '5', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('47', '6', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('48', '6', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('51', '8', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('52', '8', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('53', '9', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('54', '9', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('55', '10', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('56', '10', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('57', '11', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('58', '11', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('59', '12', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('60', '12', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('61', '13', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('62', '13', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('63', '14', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('64', '14', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('65', '15', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('66', '15', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('67', '16', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('68', '16', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('69', '17', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('70', '17', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('71', '18', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('76', '20', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('77', '21', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('80', '24', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('81', '25', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('83', '28', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('84', '29', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('85', '30', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('86', '31', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('87', '32', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('88', '33', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('89', '34', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('91', '36', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('92', '7', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('93', '7', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('94', '7', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('95', '7', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('96', '19', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('97', '19', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('103', '37', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('104', '23', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('105', '23', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('107', '26', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('108', '26', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('109', '39', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('110', '40', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('111', '41', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('112', '42', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('114', '44', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('115', '45', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('116', '46', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('117', '47', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('118', '48', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('119', '38', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('120', '38', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('121', '49', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('124', '50', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('125', '51', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('127', '53', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('128', '54', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('129', '55', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('130', '56', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('131', '57', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('132', '58', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('133', '59', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('134', '60', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('135', '61', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('136', '62', '9');
INSERT INTO `BindingSubjectGroup` VALUES ('137', '63', '9');
INSERT INTO `BindingSubjectGroup` VALUES ('138', '64', '9');
INSERT INTO `BindingSubjectGroup` VALUES ('139', '65', '9');
INSERT INTO `BindingSubjectGroup` VALUES ('140', '66', '9');
INSERT INTO `BindingSubjectGroup` VALUES ('141', '67', '9');
INSERT INTO `BindingSubjectGroup` VALUES ('142', '52', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('143', '52', '1');
INSERT INTO `BindingSubjectGroup` VALUES ('144', '68', '1');
INSERT INTO `BindingSubjectGroup` VALUES ('145', '69', '1');
INSERT INTO `BindingSubjectGroup` VALUES ('146', '72', '1');
INSERT INTO `BindingSubjectGroup` VALUES ('147', '73', '1');
INSERT INTO `BindingSubjectGroup` VALUES ('148', '1', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('149', '1', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('150', '1', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('151', '1', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('152', '22', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('153', '22', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('154', '75', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('155', '76', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('156', '77', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('157', '78', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('158', '79', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('159', '80', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('160', '81', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('161', '82', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('162', '35', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('163', '35', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('164', '83', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('165', '84', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('166', '85', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('167', '86', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('168', '87', '3');
INSERT INTO `BindingSubjectGroup` VALUES ('171', '27', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('175', '43', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('176', '43', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('177', '43', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('178', '70', '1');
INSERT INTO `BindingSubjectGroup` VALUES ('179', '88', '2');
INSERT INTO `BindingSubjectGroup` VALUES ('180', '88', '5');
INSERT INTO `BindingSubjectGroup` VALUES ('181', '88', '6');
INSERT INTO `BindingSubjectGroup` VALUES ('182', '88', '7');
INSERT INTO `BindingSubjectGroup` VALUES ('183', '88', '8');
INSERT INTO `BindingSubjectGroup` VALUES ('184', '88', '9');
INSERT INTO `BindingSubjectGroup` VALUES ('185', '88', '1');
INSERT INTO `BindingSubjectGroup` VALUES ('186', '88', '3');

-- ----------------------------
-- Table structure for `BindingTeacherSubjects`
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
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of BindingTeacherSubjects
-- ----------------------------
INSERT INTO `BindingTeacherSubjects` VALUES ('17', '20', '62');
INSERT INTO `BindingTeacherSubjects` VALUES ('18', '20', '66');
INSERT INTO `BindingTeacherSubjects` VALUES ('19', '3', '5');
INSERT INTO `BindingTeacherSubjects` VALUES ('21', '8', '11');
INSERT INTO `BindingTeacherSubjects` VALUES ('22', '8', '12');
INSERT INTO `BindingTeacherSubjects` VALUES ('23', '11', '16');
INSERT INTO `BindingTeacherSubjects` VALUES ('24', '11', '17');
INSERT INTO `BindingTeacherSubjects` VALUES ('25', '11', '19');
INSERT INTO `BindingTeacherSubjects` VALUES ('26', '11', '26');
INSERT INTO `BindingTeacherSubjects` VALUES ('27', '11', '42');
INSERT INTO `BindingTeacherSubjects` VALUES ('28', '22', '82');
INSERT INTO `BindingTeacherSubjects` VALUES ('29', '22', '86');
INSERT INTO `BindingTeacherSubjects` VALUES ('30', '17', '41');
INSERT INTO `BindingTeacherSubjects` VALUES ('31', '4', '6');
INSERT INTO `BindingTeacherSubjects` VALUES ('32', '12', '21');
INSERT INTO `BindingTeacherSubjects` VALUES ('33', '12', '23');
INSERT INTO `BindingTeacherSubjects` VALUES ('34', '12', '29');
INSERT INTO `BindingTeacherSubjects` VALUES ('35', '12', '31');
INSERT INTO `BindingTeacherSubjects` VALUES ('36', '12', '33');
INSERT INTO `BindingTeacherSubjects` VALUES ('37', '12', '77');
INSERT INTO `BindingTeacherSubjects` VALUES ('46', '14', '25');
INSERT INTO `BindingTeacherSubjects` VALUES ('47', '14', '75');
INSERT INTO `BindingTeacherSubjects` VALUES ('48', '14', '81');
INSERT INTO `BindingTeacherSubjects` VALUES ('49', '14', '84');
INSERT INTO `BindingTeacherSubjects` VALUES ('50', '14', '86');
INSERT INTO `BindingTeacherSubjects` VALUES ('51', '9', '14');
INSERT INTO `BindingTeacherSubjects` VALUES ('52', '9', '20');
INSERT INTO `BindingTeacherSubjects` VALUES ('53', '9', '48');
INSERT INTO `BindingTeacherSubjects` VALUES ('54', '9', '60');
INSERT INTO `BindingTeacherSubjects` VALUES ('55', '9', '61');
INSERT INTO `BindingTeacherSubjects` VALUES ('58', '5', '7');
INSERT INTO `BindingTeacherSubjects` VALUES ('59', '5', '8');
INSERT INTO `BindingTeacherSubjects` VALUES ('60', '5', '76');
INSERT INTO `BindingTeacherSubjects` VALUES ('61', '19', '53');
INSERT INTO `BindingTeacherSubjects` VALUES ('62', '19', '58');
INSERT INTO `BindingTeacherSubjects` VALUES ('63', '19', '59');
INSERT INTO `BindingTeacherSubjects` VALUES ('74', '1', '3');
INSERT INTO `BindingTeacherSubjects` VALUES ('75', '7', '10');
INSERT INTO `BindingTeacherSubjects` VALUES ('76', '7', '32');
INSERT INTO `BindingTeacherSubjects` VALUES ('77', '7', '87');
INSERT INTO `BindingTeacherSubjects` VALUES ('78', '10', '1');
INSERT INTO `BindingTeacherSubjects` VALUES ('79', '10', '15');
INSERT INTO `BindingTeacherSubjects` VALUES ('80', '10', '22');
INSERT INTO `BindingTeacherSubjects` VALUES ('81', '10', '38');
INSERT INTO `BindingTeacherSubjects` VALUES ('82', '10', '50');
INSERT INTO `BindingTeacherSubjects` VALUES ('83', '10', '51');
INSERT INTO `BindingTeacherSubjects` VALUES ('84', '10', '57');
INSERT INTO `BindingTeacherSubjects` VALUES ('88', '15', '28');
INSERT INTO `BindingTeacherSubjects` VALUES ('89', '15', '63');
INSERT INTO `BindingTeacherSubjects` VALUES ('90', '15', '64');
INSERT INTO `BindingTeacherSubjects` VALUES ('91', '15', '65');
INSERT INTO `BindingTeacherSubjects` VALUES ('92', '15', '67');
INSERT INTO `BindingTeacherSubjects` VALUES ('93', '2', '4');
INSERT INTO `BindingTeacherSubjects` VALUES ('94', '2', '43');
INSERT INTO `BindingTeacherSubjects` VALUES ('95', '6', '9');
INSERT INTO `BindingTeacherSubjects` VALUES ('96', '6', '27');
INSERT INTO `BindingTeacherSubjects` VALUES ('97', '6', '35');
INSERT INTO `BindingTeacherSubjects` VALUES ('98', '13', '24');
INSERT INTO `BindingTeacherSubjects` VALUES ('172', '21', '72');
INSERT INTO `BindingTeacherSubjects` VALUES ('173', '21', '73');
INSERT INTO `BindingTeacherSubjects` VALUES ('174', '18', '55');
INSERT INTO `BindingTeacherSubjects` VALUES ('175', '18', '68');
INSERT INTO `BindingTeacherSubjects` VALUES ('176', '18', '49');
INSERT INTO `BindingTeacherSubjects` VALUES ('177', '18', '44');
INSERT INTO `BindingTeacherSubjects` VALUES ('178', '18', '56');
INSERT INTO `BindingTeacherSubjects` VALUES ('179', '18', '52');
INSERT INTO `BindingTeacherSubjects` VALUES ('180', '18', '69');
INSERT INTO `BindingTeacherSubjects` VALUES ('181', '18', '46');
INSERT INTO `BindingTeacherSubjects` VALUES ('182', '18', '71');
INSERT INTO `BindingTeacherSubjects` VALUES ('183', '16', '37');
INSERT INTO `BindingTeacherSubjects` VALUES ('184', '16', '22');
INSERT INTO `BindingTeacherSubjects` VALUES ('185', '16', '44');
INSERT INTO `BindingTeacherSubjects` VALUES ('186', '16', '40');
INSERT INTO `BindingTeacherSubjects` VALUES ('187', '16', '85');
INSERT INTO `BindingTeacherSubjects` VALUES ('188', '16', '45');
INSERT INTO `BindingTeacherSubjects` VALUES ('189', '16', '39');
INSERT INTO `BindingTeacherSubjects` VALUES ('190', '16', '54');
INSERT INTO `BindingTeacherSubjects` VALUES ('191', '16', '52');
INSERT INTO `BindingTeacherSubjects` VALUES ('192', '16', '70');
INSERT INTO `BindingTeacherSubjects` VALUES ('193', '16', '47');

-- ----------------------------
-- Table structure for `cabinets`
-- ----------------------------
DROP TABLE IF EXISTS `cabinets`;
CREATE TABLE `cabinets` (
  `idcabinets` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`idcabinets`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cabinets
-- ----------------------------
INSERT INTO `cabinets` VALUES ('2', '102', '1');
INSERT INTO `cabinets` VALUES ('3', '104', '1');
INSERT INTO `cabinets` VALUES ('4', '110', '1');
INSERT INTO `cabinets` VALUES ('5', '114', '1');
INSERT INTO `cabinets` VALUES ('6', '201', '1');
INSERT INTO `cabinets` VALUES ('7', '205', '1');
INSERT INTO `cabinets` VALUES ('8', '206', '1');
INSERT INTO `cabinets` VALUES ('9', '207', '1');
INSERT INTO `cabinets` VALUES ('10', '210', '1');

-- ----------------------------
-- Table structure for `ci_sessions`
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
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('3c14f5245660dd03f9a8f26e44a23948', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', '1389028673', 0x613A363A7B733A393A22757365725F64617461223B733A303A22223B733A383A226964656E74697479223B733A31343A226E617A676172646F4079612E7275223B733A383A22757365726E616D65223B733A353A224B6F646469223B733A353A22656D61696C223B733A31343A226E617A676172646F4079612E7275223B733A373A22757365725F6964223B733A313A2236223B733A31343A226F6C645F6C6173745F6C6F67696E223B733A31303A2231333839303233343439223B7D);
INSERT INTO `ci_sessions` VALUES ('6f23a0b86a500eb3cf358f1dad634a96', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', '1389032153', 0x613A363A7B733A393A22757365725F64617461223B733A303A22223B733A383A226964656E74697479223B733A31343A226E617A676172646F4079612E7275223B733A383A22757365726E616D65223B733A353A224B6F646469223B733A353A22656D61696C223B733A31343A226E617A676172646F4079612E7275223B733A373A22757365725F6964223B733A313A2236223B733A31343A226F6C645F6C6173745F6C6F67696E223B733A31303A2231333839303233373533223B7D);
INSERT INTO `ci_sessions` VALUES ('7943e9bcb21465034f30abd8923ec6f0', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', '1389033576', 0x613A323A7B733A393A22757365725F64617461223B733A303A22223B733A31373A22666C6173683A6F6C643A6D657373616765223B733A32323A223C703E496E636F7272656374204C6F67696E3C2F703E223B7D);
INSERT INTO `ci_sessions` VALUES ('ce0dbc514d0f20695a7d4f6bc6ba3081', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', '1389033576', 0x613A363A7B733A393A22757365725F64617461223B733A303A22223B733A383A226964656E74697479223B733A31343A226E617A676172646F4079612E7275223B733A383A22757365726E616D65223B733A353A224B6F646469223B733A353A22656D61696C223B733A31343A226E617A676172646F4079612E7275223B733A373A22757365725F6964223B733A313A2236223B733A31343A226F6C645F6C6173745F6C6F67696E223B733A31303A2231333839303238363733223B7D);

-- ----------------------------
-- Table structure for `days`
-- ----------------------------
DROP TABLE IF EXISTS `days`;
CREATE TABLE `days` (
  `iddays` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `visibility` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`iddays`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of days
-- ----------------------------
INSERT INTO `days` VALUES ('1', '2014-01-09', '1');
INSERT INTO `days` VALUES ('2', '2014-01-10', '1');

-- ----------------------------
-- Table structure for `groups`
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
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'П-411', '1', null, '7');
INSERT INTO `groups` VALUES ('2', 'П-111', '1', null, '1');
INSERT INTO `groups` VALUES ('3', 'М-461', '1', null, '8');
INSERT INTO `groups` VALUES ('5', 'Л-181', '1', null, '2');
INSERT INTO `groups` VALUES ('6', 'Б-221', '1', null, '3');
INSERT INTO `groups` VALUES ('7', 'И-271', '1', null, '4');
INSERT INTO `groups` VALUES ('8', 'П-311', '1', null, '5');
INSERT INTO `groups` VALUES ('9', 'Б-321', '1', null, '6');

-- ----------------------------
-- Table structure for `ion_groups`
-- ----------------------------
DROP TABLE IF EXISTS `ion_groups`;
CREATE TABLE `ion_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ion_groups
-- ----------------------------
INSERT INTO `ion_groups` VALUES ('1', 'admin', 'Administrator');
INSERT INTO `ion_groups` VALUES ('2', 'members', 'General User');

-- ----------------------------
-- Table structure for `ion_login_attempts`
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
-- Records of ion_login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for `ion_users`
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ion_users
-- ----------------------------
INSERT INTO `ion_users` VALUES ('6', 0x7F000001, 'Koddi', '5613ead623fbf2a1d0b3fd1f7aebe5aaf45d45c6', null, 'nazgardo@ya.ru', null, null, null, '3c7c4714dd2b07d688c20e8209ef33b895e311f1', '1388943525', '1389032162', '1', null, null, null, null);

-- ----------------------------
-- Table structure for `ion_users_groups`
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ion_users_groups
-- ----------------------------
INSERT INTO `ion_users_groups` VALUES ('7', '6', '1');

-- ----------------------------
-- Table structure for `lessons_time`
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
-- Records of lessons_time
-- ----------------------------
INSERT INTO `lessons_time` VALUES ('1', '1', '08:20:00', '09:50:00', '1');
INSERT INTO `lessons_time` VALUES ('2', '2', '10:00:00', '11:30:00', '1');
INSERT INTO `lessons_time` VALUES ('3', '3', '12:30:00', '14:00:00', '1');
INSERT INTO `lessons_time` VALUES ('4', '4', '14:10:00', '15:40:00', '1');
INSERT INTO `lessons_time` VALUES ('5', '5', '16:00:00', '17:30:00', '1');
INSERT INTO `lessons_time` VALUES ('6', '6', '17:40:00', '19:10:00', '1');
INSERT INTO `lessons_time` VALUES ('7', '7', '19:20:00', '20:50:00', '1');

-- ----------------------------
-- Table structure for `subjects`
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
-- Records of subjects
-- ----------------------------
INSERT INTO `subjects` VALUES ('1', 'Математика', 'Матем', '1');
INSERT INTO `subjects` VALUES ('3', 'Английский язык', 'Англ.яз', '1');
INSERT INTO `subjects` VALUES ('4', 'Физическая культура', 'Физ-ра', '1');
INSERT INTO `subjects` VALUES ('5', 'Русский язык и литература', 'Русс.яз', '1');
INSERT INTO `subjects` VALUES ('6', 'Литература', 'Литерат', '1');
INSERT INTO `subjects` VALUES ('7', 'История', 'История', '1');
INSERT INTO `subjects` VALUES ('8', 'Обществознание (обществознание)', 'Общест', '1');
INSERT INTO `subjects` VALUES ('9', 'Обществознание (право)', 'Право', '1');
INSERT INTO `subjects` VALUES ('10', 'Обществознание (экономика)', 'Эконом', '1');
INSERT INTO `subjects` VALUES ('11', 'Химия', 'Химия', '1');
INSERT INTO `subjects` VALUES ('12', 'Биология', 'Биология', '1');
INSERT INTO `subjects` VALUES ('13', 'Основы безопасности жизнедеятельности', 'ОБЖ', '1');
INSERT INTO `subjects` VALUES ('14', 'Физика', 'Физика', '1');
INSERT INTO `subjects` VALUES ('15', 'Информатика и ИКТ', 'Информ', '1');
INSERT INTO `subjects` VALUES ('16', 'Психология делового общения', 'Психол', '1');
INSERT INTO `subjects` VALUES ('17', 'Основы проектной деятельности', 'Пр.деят', '1');
INSERT INTO `subjects` VALUES ('18', 'География', 'Геогр', '1');
INSERT INTO `subjects` VALUES ('19', 'Основы философии', 'Осн.филос', '1');
INSERT INTO `subjects` VALUES ('20', 'Элементы высшей математики', 'Эл.высш.мат', '1');
INSERT INTO `subjects` VALUES ('21', 'Финансовая математика', 'Финн.мат', '1');
INSERT INTO `subjects` VALUES ('22', 'Информационные технологии в профессиональной деятельности', 'ИТвПД', '1');
INSERT INTO `subjects` VALUES ('23', 'Экономика организации', 'Экон.орг', '1');
INSERT INTO `subjects` VALUES ('24', 'Статистика', 'Статист', '1');
INSERT INTO `subjects` VALUES ('25', 'Менеджмент', 'Менедж', '1');
INSERT INTO `subjects` VALUES ('26', 'Документационное обеспечение управления', 'ДОУ', '1');
INSERT INTO `subjects` VALUES ('27', 'Правовое обеспечение профессиональной деятельности', 'ПОПД', '1');
INSERT INTO `subjects` VALUES ('28', 'Финансы, денежное обращение и кредит', 'Финансы', '1');
INSERT INTO `subjects` VALUES ('29', 'Бухгалтерский учет', 'Бухучет', '1');
INSERT INTO `subjects` VALUES ('30', 'Организация банковского учета в банке', 'Банк.учет', '1');
INSERT INTO `subjects` VALUES ('31', 'Анализ финансово-хозяйственной деятельности', 'АФХД', '1');
INSERT INTO `subjects` VALUES ('32', 'Основы экономической теории', 'Эк.теор', '1');
INSERT INTO `subjects` VALUES ('33', 'Маркетинг', 'Маркет', '1');
INSERT INTO `subjects` VALUES ('34', 'Безопасность банковской деятельности', 'ББД', '1');
INSERT INTO `subjects` VALUES ('35', 'Трудовое право', 'Труд.пр.', '1');
INSERT INTO `subjects` VALUES ('36', 'Страховая деятельность', 'Страх.деят.', '1');
INSERT INTO `subjects` VALUES ('37', 'Дискретная математика', 'Дискр.матем.', '1');
INSERT INTO `subjects` VALUES ('38', 'Теория вероятностей и математическая статистика', 'ТВиМС', '1');
INSERT INTO `subjects` VALUES ('39', 'Основы теории информации', 'ОТИ', '1');
INSERT INTO `subjects` VALUES ('40', 'Операционные системы и среды', 'Опер.сист.', '1');
INSERT INTO `subjects` VALUES ('41', 'Архитектура ЭВМ и вычислительных систем', 'Архит.', '1');
INSERT INTO `subjects` VALUES ('42', 'Психология и этика делового общения и профессиональной деятельности', 'Психол.', '1');
INSERT INTO `subjects` VALUES ('43', 'Безопасность жизнедеятельности', 'БЖД', '1');
INSERT INTO `subjects` VALUES ('44', 'Обработка отраслевой информации', 'ООИ', '1');
INSERT INTO `subjects` VALUES ('45', 'Основы программирования', 'Осн.прогр.', '1');
INSERT INTO `subjects` VALUES ('46', 'Учебная практика Технические средства информатизации', 'ТСИ(УП)', '1');
INSERT INTO `subjects` VALUES ('47', 'Учебная практика Графика', 'Графика (УП)', '1');
INSERT INTO `subjects` VALUES ('48', 'Основы электротехники и электроники (ДОУ)', 'Осн.электр.', '1');
INSERT INTO `subjects` VALUES ('49', 'Компьютерные сети', 'К.сети', '1');
INSERT INTO `subjects` VALUES ('50', 'Эксплуатация и модификация ИС', 'Эксп.ИС', '1');
INSERT INTO `subjects` VALUES ('51', 'Методы и средства проектирования ИС', 'Мет.и ср.', '1');
INSERT INTO `subjects` VALUES ('52', 'Сопровождение и продвижение ИС', 'Сопр.ИС', '1');
INSERT INTO `subjects` VALUES ('53', 'Язык программирования С#', 'С#', '1');
INSERT INTO `subjects` VALUES ('54', 'Пакеты прикладных программ для графики', 'Графика', '1');
INSERT INTO `subjects` VALUES ('55', 'Web-ориентированное программирование', 'web', '1');
INSERT INTO `subjects` VALUES ('56', 'Предметно-ориентированное программирование', 'ПОП', '1');
INSERT INTO `subjects` VALUES ('57', 'Учебная практика Эксплуатация информационных систем', 'УП Эксп.ИС', '1');
INSERT INTO `subjects` VALUES ('58', 'Учебная практика Программирование на С#', 'УП C#', '1');
INSERT INTO `subjects` VALUES ('59', 'Учебная практика по базам данных', 'УП БД', '1');
INSERT INTO `subjects` VALUES ('60', 'Электронные устройства и схемы', 'Эл.устр.', '1');
INSERT INTO `subjects` VALUES ('61', 'Элементы и устройства цифровой техники', 'ЦТ', '1');
INSERT INTO `subjects` VALUES ('62', 'Организация безналичного расчета', 'Безн.расч.', '1');
INSERT INTO `subjects` VALUES ('63', 'Формирование клиентской базы', 'Форм.кл.базы', '1');
INSERT INTO `subjects` VALUES ('64', 'Организация кредитной работы', 'Орг.кр.раб.', '1');
INSERT INTO `subjects` VALUES ('65', 'Продвижение и продажа банковских продуктов и услуг', 'Продв.банк.усл.', '1');
INSERT INTO `subjects` VALUES ('66', 'Учебная практика Организация безналичного расчета', 'УП Безн.расч.', '1');
INSERT INTO `subjects` VALUES ('67', 'Учебная практика Организация кредитной работы', 'УП Орг.кр.раб.', '1');
INSERT INTO `subjects` VALUES ('68', 'Информационные технологии и платформы разработки ИС', 'Пл.разр.ИС', '1');
INSERT INTO `subjects` VALUES ('69', 'Управление проектами', 'Упр.пр.', '1');
INSERT INTO `subjects` VALUES ('70', 'Технологии выполнения работ по профессии «Оператор ЭВМ и вычислительных систем»', 'Техн.вып.раб.', '1');
INSERT INTO `subjects` VALUES ('71', 'Учебная практика Разработка информационных систем', 'УП РИС', '1');
INSERT INTO `subjects` VALUES ('72', 'Системное администрирование', 'Сист.адм.', '1');
INSERT INTO `subjects` VALUES ('73', 'Технологии разработки программных продуктов', 'Техн.разр.', '1');
INSERT INTO `subjects` VALUES ('75', 'Управление качеством', 'Упр.кач.', '1');
INSERT INTO `subjects` VALUES ('76', 'Основы исследовательской деятельности', 'Иссл.деят.', '1');
INSERT INTO `subjects` VALUES ('77', 'Маркетинговые исследования', 'Марк.иссл.', '1');
INSERT INTO `subjects` VALUES ('78', 'Государственное регулирование экономики', 'Гос.рег.экон.', '1');
INSERT INTO `subjects` VALUES ('79', 'Экономическая статистика', 'Экон.стат.', '1');
INSERT INTO `subjects` VALUES ('80', 'Система национальных счетов', 'Сист.нац.сч.', '1');
INSERT INTO `subjects` VALUES ('81', 'Теория организации', 'Теор.орг.', '1');
INSERT INTO `subjects` VALUES ('82', 'Кадровый менеджмент', 'Кадр.мен.', '1');
INSERT INTO `subjects` VALUES ('83', 'Документационное обеспечение кадровой службы', 'ДОКС', '1');
INSERT INTO `subjects` VALUES ('84', 'Конфликтология', 'Конфл.', '1');
INSERT INTO `subjects` VALUES ('85', 'Организация защиты информации', 'Защ.инф.', '1');
INSERT INTO `subjects` VALUES ('86', 'Разработка управленческого решения', 'Разр.упр.реш.', '1');
INSERT INTO `subjects` VALUES ('87', 'Экономика уральского региона', 'Эк.ур.рег.', '1');
INSERT INTO `subjects` VALUES ('88', 'Консультация', 'Консультация', '1');

-- ----------------------------
-- Table structure for `teachers`
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
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES ('1', 'Светлана', 'Снегирева', 'Борисовна', '1');
INSERT INTO `teachers` VALUES ('2', 'Елена', 'Щербакова', 'Михайловна', '1');
INSERT INTO `teachers` VALUES ('3', 'Людмила', 'Велижанская', 'Витальевна', '1');
INSERT INTO `teachers` VALUES ('4', 'Марина', 'Калатори', 'Гурамовна', '1');
INSERT INTO `teachers` VALUES ('5', 'Марина', 'Ощепкова', 'Валерьевна', '1');
INSERT INTO `teachers` VALUES ('6', 'Ирина', 'Фурик', 'Александровна', '1');
INSERT INTO `teachers` VALUES ('7', 'Татьяна', 'Томилова', 'Витальевна', '1');
INSERT INTO `teachers` VALUES ('8', 'Людмила', 'Вехова', 'Геннадьевна', '1');
INSERT INTO `teachers` VALUES ('9', 'Александр', 'Лихачев', 'Владимирович', '1');
INSERT INTO `teachers` VALUES ('10', 'Ольга', 'Усольцева', 'Ивановна', '1');
INSERT INTO `teachers` VALUES ('11', 'Эмилия', 'Захватошина', 'Михайловна', '1');
INSERT INTO `teachers` VALUES ('12', 'Марина', 'Кравченко', 'Игоревна', '1');
INSERT INTO `teachers` VALUES ('13', 'Анна', 'Лихачева', 'Анатольевна', '1');
INSERT INTO `teachers` VALUES ('14', 'Людмила', 'Курашова', 'Николаевна', '1');
INSERT INTO `teachers` VALUES ('15', 'Ольга', 'Цымбал', 'Анатольевна', '1');
INSERT INTO `teachers` VALUES ('16', 'Виктория', 'Семенова', 'Сергеевна', '1');
INSERT INTO `teachers` VALUES ('17', 'Артем', 'Зюзев', 'Валерьевич', '1');
INSERT INTO `teachers` VALUES ('18', 'Даниил', 'Кузнецов', 'Владимирович', '1');
INSERT INTO `teachers` VALUES ('19', 'Дмитрий', 'Пьянков', 'Сергеевич', '1');
INSERT INTO `teachers` VALUES ('20', 'Ирина', 'Василенко', 'Николаевна', '1');
INSERT INTO `teachers` VALUES ('21', 'Василий', 'Брюханов', 'Алексеевич', '1');
INSERT INTO `teachers` VALUES ('22', 'Екатерина', 'Зенцова', 'Михайловна', '1');

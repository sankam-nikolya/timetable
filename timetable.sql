SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `announcements`
-- ----------------------------
DROP TABLE IF EXISTS `announcements`;
CREATE TABLE `announcements` (
  `idannouncements` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `start_datestamp` int(11) NOT NULL,
  `end_datestamp` int(11) NOT NULL,
  `created_datestamp` int(11) NOT NULL,
  `allTime` tinyint(4) NOT NULL DEFAULT '0',
  `ip_address` varbinary(16) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of binding
-- ----------------------------

-- ----------------------------
-- Table structure for `bindingdaygroupevent`
-- ----------------------------
DROP TABLE IF EXISTS `bindingdaygroupevent`;
CREATE TABLE `bindingdaygroupevent` (
  `idBindingDayGroupEvent` int(11) NOT NULL AUTO_INCREMENT,
  `idDay` int(11) DEFAULT NULL,
  `idGroup` int(11) DEFAULT NULL,
  `txtEvent` varchar(255) DEFAULT NULL,
  `global` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idBindingDayGroupEvent`),
  KEY `idDay` (`idDay`),
  KEY `idGroup` (`idGroup`),
  CONSTRAINT `bindingdaygroupevent_ibfk_1` FOREIGN KEY (`idDay`) REFERENCES `days` (`iddays`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bindingdaygroupevent_ibfk_2` FOREIGN KEY (`idGroup`) REFERENCES `groups` (`idgroups`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bindingdaygroupevent
-- ----------------------------

-- ----------------------------
-- Table structure for `bindingsubjectgroup`
-- ----------------------------
DROP TABLE IF EXISTS `bindingsubjectgroup`;
CREATE TABLE `bindingsubjectgroup` (
  `idBindingSubjectGroup` int(11) NOT NULL AUTO_INCREMENT,
  `idSubject` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL,
  PRIMARY KEY (`idBindingSubjectGroup`),
  KEY `idSubject` (`idSubject`),
  KEY `idGroup` (`idGroup`),
  CONSTRAINT `bindingsubjectgroup_ibfk_1` FOREIGN KEY (`idSubject`) REFERENCES `subjects` (`idsubects`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bindingsubjectgroup_ibfk_2` FOREIGN KEY (`idGroup`) REFERENCES `groups` (`idgroups`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bindingsubjectgroup
-- ----------------------------

-- ----------------------------
-- Table structure for `bindingteachersubjects`
-- ----------------------------
DROP TABLE IF EXISTS `bindingteachersubjects`;
CREATE TABLE `bindingteachersubjects` (
  `idBindingSubjectGroup` int(11) NOT NULL AUTO_INCREMENT,
  `idTeacher` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL,
  PRIMARY KEY (`idBindingSubjectGroup`),
  KEY `idSubject` (`idSubject`),
  KEY `idTeacher` (`idTeacher`),
  CONSTRAINT `bindingteachersubjects_ibfk_1` FOREIGN KEY (`idSubject`) REFERENCES `subjects` (`idsubects`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bindingteachersubjects_ibfk_2` FOREIGN KEY (`idTeacher`) REFERENCES `teachers` (`idteacher`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of bindingteachersubjects
-- ----------------------------

-- ----------------------------
-- Table structure for `cabinets`
-- ----------------------------
DROP TABLE IF EXISTS `cabinets`;
CREATE TABLE `cabinets` (
  `idcabinets` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`idcabinets`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

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
INSERT INTO `cabinets` VALUES ('11', '211', '1');
INSERT INTO `cabinets` VALUES ('12', 'ФОК', '1');

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


-- ----------------------------
-- Table structure for `days`
-- ----------------------------
DROP TABLE IF EXISTS `days`;
CREATE TABLE `days` (
  `iddays` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `visibility` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`iddays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of days
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'П-411', '1', '1', '7');
INSERT INTO `groups` VALUES ('2', 'П-111', '1', '1', '1');
INSERT INTO `groups` VALUES ('3', 'М-461', '1', '1', '8');
INSERT INTO `groups` VALUES ('5', 'Л-181', '1', '1', '2');
INSERT INTO `groups` VALUES ('6', 'Б-221', '1', '1', '3');
INSERT INTO `groups` VALUES ('7', 'И-271', '1', '1', '4');
INSERT INTO `groups` VALUES ('8', 'П-311', '1', '1', '5');
INSERT INTO `groups` VALUES ('9', 'Б-321', '1', '1', '6');
INSERT INTO `groups` VALUES ('10', 'ЛЗ-481', '1', '0', '1');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ion_users
-- ----------------------------


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ion_users_groups
-- ----------------------------

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
-- Table structure for `login_attempts`
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
-- Records of login_attempts
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of subjects
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teachers
-- ----------------------------
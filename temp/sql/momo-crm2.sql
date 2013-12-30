/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50613
Source Host           : localhost:3306
Source Database       : momo-crm

Target Server Type    : MYSQL
Target Server Version : 50613
File Encoding         : 65001

Date: 2013-12-30 18:22:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for crm_roles
-- ----------------------------
DROP TABLE IF EXISTS `crm_roles`;
CREATE TABLE `crm_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT NULL,
  `enabled` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crm_roles
-- ----------------------------
INSERT INTO `crm_roles` VALUES ('1', '超级管理员', '1');
INSERT INTO `crm_roles` VALUES ('2', '管理员', '0');
INSERT INTO `crm_roles` VALUES ('3', '经理', '1');
INSERT INTO `crm_roles` VALUES ('7', '前台', '1');

-- ----------------------------
-- Table structure for crm_system
-- ----------------------------
DROP TABLE IF EXISTS `crm_system`;
CREATE TABLE `crm_system` (
  `sys_id` int(11) NOT NULL AUTO_INCREMENT,
  `sys_parent_id` int(11) DEFAULT '0',
  `sys_name` varchar(255) DEFAULT NULL,
  `sys_module` varchar(255) DEFAULT NULL,
  `sys_controller` varchar(255) DEFAULT NULL,
  `sys_action` varchar(255) DEFAULT NULL,
  `visiabled` tinyint(3) DEFAULT '1',
  `sys_order_id` int(11) NOT NULL DEFAULT '0',
  `enabled` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`sys_id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crm_system
-- ----------------------------
INSERT INTO `crm_system` VALUES ('1', '0', '系统管理', null, '', '', '1', '100', '1');
INSERT INTO `crm_system` VALUES ('2', '1', '用户管理', 'admin', 'index', 'user_list', '1', '0', '1');
INSERT INTO `crm_system` VALUES ('3', '1', '用户管理-添加', 'admin', 'index', 'user_add', '0', '0', '1');
INSERT INTO `crm_system` VALUES ('4', '1', '用户管理-编辑', 'admin', 'index', 'user_edit', '0', '0', '1');
INSERT INTO `crm_system` VALUES ('5', '1', '用户管理-删除', 'admin', 'index', 'user_del', '0', '0', '1');
INSERT INTO `crm_system` VALUES ('6', '1', '角色管理', 'admin', 'index', 'role_list', '1', '0', '1');
INSERT INTO `crm_system` VALUES ('7', '1', '角色管理-添加', 'admin', 'index', 'role_add', '0', '0', '1');
INSERT INTO `crm_system` VALUES ('8', '1', '角色管理-编辑', 'admin', 'index', 'role_edit', '0', '0', '1');
INSERT INTO `crm_system` VALUES ('9', '1', '角色管理-删除', 'admin', 'index', 'role_del', '0', '0', '1');
INSERT INTO `crm_system` VALUES ('10', '1', '系统模块管理', 'admin', 'index', 'system_list', '1', '0', '1');
INSERT INTO `crm_system` VALUES ('11', '1', '系统模块管理-添加', 'admin', 'index', 'system_add', '0', '0', '1');
INSERT INTO `crm_system` VALUES ('12', '1', '系统模块管理-编辑', 'admin', 'index', 'system_edit', '0', '0', '1');
INSERT INTO `crm_system` VALUES ('13', '1', '系统模块管理-删除', 'admin', 'index', 'system_del', '0', '0', '1');
INSERT INTO `crm_system` VALUES ('96', '95', '表单列表', ' ', ' ', ' ', '1', '0', '1');
INSERT INTO `crm_system` VALUES ('97', '95', '表单添加', ' ', ' ', ' ', '1', '0', '1');
INSERT INTO `crm_system` VALUES ('91', '1', '数据库管理/优化', 'admin', 'index', 'dumpsql', '1', '0', '1');
INSERT INTO `crm_system` VALUES ('95', '0', '表单管理', ' ', ' ', ' ', '1', '0', '1');

-- ----------------------------
-- Table structure for crm_system_roles
-- ----------------------------
DROP TABLE IF EXISTS `crm_system_roles`;
CREATE TABLE `crm_system_roles` (
  `sr_id` int(11) NOT NULL AUTO_INCREMENT,
  `sr_sys_id` int(11) NOT NULL DEFAULT '0',
  `sr_role_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sr_id`),
  UNIQUE KEY `sr_sys_id` (`sr_sys_id`,`sr_role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1163 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crm_system_roles
-- ----------------------------
INSERT INTO `crm_system_roles` VALUES ('944', '28', '6');
INSERT INTO `crm_system_roles` VALUES ('943', '27', '6');
INSERT INTO `crm_system_roles` VALUES ('942', '26', '6');
INSERT INTO `crm_system_roles` VALUES ('941', '25', '6');
INSERT INTO `crm_system_roles` VALUES ('940', '14', '6');
INSERT INTO `crm_system_roles` VALUES ('939', '91', '2');
INSERT INTO `crm_system_roles` VALUES ('938', '13', '2');
INSERT INTO `crm_system_roles` VALUES ('937', '12', '2');
INSERT INTO `crm_system_roles` VALUES ('936', '11', '2');
INSERT INTO `crm_system_roles` VALUES ('935', '10', '2');
INSERT INTO `crm_system_roles` VALUES ('934', '4', '2');
INSERT INTO `crm_system_roles` VALUES ('933', '3', '2');
INSERT INTO `crm_system_roles` VALUES ('932', '2', '2');
INSERT INTO `crm_system_roles` VALUES ('931', '1', '2');
INSERT INTO `crm_system_roles` VALUES ('945', '15', '6');
INSERT INTO `crm_system_roles` VALUES ('1162', '91', '1');
INSERT INTO `crm_system_roles` VALUES ('1161', '13', '1');
INSERT INTO `crm_system_roles` VALUES ('1160', '12', '1');
INSERT INTO `crm_system_roles` VALUES ('1159', '11', '1');
INSERT INTO `crm_system_roles` VALUES ('1158', '10', '1');
INSERT INTO `crm_system_roles` VALUES ('1157', '9', '1');
INSERT INTO `crm_system_roles` VALUES ('1156', '8', '1');
INSERT INTO `crm_system_roles` VALUES ('1155', '7', '1');
INSERT INTO `crm_system_roles` VALUES ('1154', '6', '1');
INSERT INTO `crm_system_roles` VALUES ('1153', '5', '1');
INSERT INTO `crm_system_roles` VALUES ('1152', '4', '1');
INSERT INTO `crm_system_roles` VALUES ('1151', '3', '1');
INSERT INTO `crm_system_roles` VALUES ('1150', '2', '1');
INSERT INTO `crm_system_roles` VALUES ('1149', '1', '1');
INSERT INTO `crm_system_roles` VALUES ('1148', '97', '1');
INSERT INTO `crm_system_roles` VALUES ('1147', '96', '1');
INSERT INTO `crm_system_roles` VALUES ('930', '90', '2');
INSERT INTO `crm_system_roles` VALUES ('929', '89', '2');
INSERT INTO `crm_system_roles` VALUES ('928', '88', '2');
INSERT INTO `crm_system_roles` VALUES ('927', '87', '2');
INSERT INTO `crm_system_roles` VALUES ('926', '24', '2');
INSERT INTO `crm_system_roles` VALUES ('925', '86', '2');
INSERT INTO `crm_system_roles` VALUES ('924', '85', '2');
INSERT INTO `crm_system_roles` VALUES ('923', '84', '2');
INSERT INTO `crm_system_roles` VALUES ('922', '83', '2');
INSERT INTO `crm_system_roles` VALUES ('921', '82', '2');
INSERT INTO `crm_system_roles` VALUES ('920', '81', '2');
INSERT INTO `crm_system_roles` VALUES ('919', '80', '2');
INSERT INTO `crm_system_roles` VALUES ('918', '79', '2');
INSERT INTO `crm_system_roles` VALUES ('917', '78', '2');
INSERT INTO `crm_system_roles` VALUES ('916', '23', '2');
INSERT INTO `crm_system_roles` VALUES ('915', '77', '2');
INSERT INTO `crm_system_roles` VALUES ('914', '76', '2');
INSERT INTO `crm_system_roles` VALUES ('913', '75', '2');
INSERT INTO `crm_system_roles` VALUES ('912', '74', '2');
INSERT INTO `crm_system_roles` VALUES ('911', '73', '2');
INSERT INTO `crm_system_roles` VALUES ('910', '72', '2');
INSERT INTO `crm_system_roles` VALUES ('909', '71', '2');
INSERT INTO `crm_system_roles` VALUES ('908', '70', '2');
INSERT INTO `crm_system_roles` VALUES ('907', '22', '2');
INSERT INTO `crm_system_roles` VALUES ('906', '69', '2');
INSERT INTO `crm_system_roles` VALUES ('905', '68', '2');
INSERT INTO `crm_system_roles` VALUES ('904', '67', '2');
INSERT INTO `crm_system_roles` VALUES ('903', '66', '2');
INSERT INTO `crm_system_roles` VALUES ('902', '21', '2');
INSERT INTO `crm_system_roles` VALUES ('901', '65', '2');
INSERT INTO `crm_system_roles` VALUES ('900', '64', '2');
INSERT INTO `crm_system_roles` VALUES ('899', '63', '2');
INSERT INTO `crm_system_roles` VALUES ('898', '62', '2');
INSERT INTO `crm_system_roles` VALUES ('897', '61', '2');
INSERT INTO `crm_system_roles` VALUES ('896', '20', '2');
INSERT INTO `crm_system_roles` VALUES ('895', '60', '2');
INSERT INTO `crm_system_roles` VALUES ('894', '59', '2');
INSERT INTO `crm_system_roles` VALUES ('893', '58', '2');
INSERT INTO `crm_system_roles` VALUES ('892', '57', '2');
INSERT INTO `crm_system_roles` VALUES ('891', '56', '2');
INSERT INTO `crm_system_roles` VALUES ('890', '55', '2');
INSERT INTO `crm_system_roles` VALUES ('889', '54', '2');
INSERT INTO `crm_system_roles` VALUES ('888', '53', '2');
INSERT INTO `crm_system_roles` VALUES ('887', '52', '2');
INSERT INTO `crm_system_roles` VALUES ('886', '51', '2');
INSERT INTO `crm_system_roles` VALUES ('885', '50', '2');
INSERT INTO `crm_system_roles` VALUES ('884', '19', '2');
INSERT INTO `crm_system_roles` VALUES ('883', '49', '2');
INSERT INTO `crm_system_roles` VALUES ('882', '48', '2');
INSERT INTO `crm_system_roles` VALUES ('881', '47', '2');
INSERT INTO `crm_system_roles` VALUES ('880', '46', '2');
INSERT INTO `crm_system_roles` VALUES ('879', '45', '2');
INSERT INTO `crm_system_roles` VALUES ('878', '44', '2');
INSERT INTO `crm_system_roles` VALUES ('877', '43', '2');
INSERT INTO `crm_system_roles` VALUES ('876', '18', '2');
INSERT INTO `crm_system_roles` VALUES ('875', '42', '2');
INSERT INTO `crm_system_roles` VALUES ('874', '41', '2');
INSERT INTO `crm_system_roles` VALUES ('873', '40', '2');
INSERT INTO `crm_system_roles` VALUES ('872', '39', '2');
INSERT INTO `crm_system_roles` VALUES ('871', '38', '2');
INSERT INTO `crm_system_roles` VALUES ('870', '17', '2');
INSERT INTO `crm_system_roles` VALUES ('869', '37', '2');
INSERT INTO `crm_system_roles` VALUES ('868', '36', '2');
INSERT INTO `crm_system_roles` VALUES ('867', '35', '2');
INSERT INTO `crm_system_roles` VALUES ('866', '34', '2');
INSERT INTO `crm_system_roles` VALUES ('865', '33', '2');
INSERT INTO `crm_system_roles` VALUES ('864', '16', '2');
INSERT INTO `crm_system_roles` VALUES ('863', '32', '2');
INSERT INTO `crm_system_roles` VALUES ('862', '31', '2');
INSERT INTO `crm_system_roles` VALUES ('861', '30', '2');
INSERT INTO `crm_system_roles` VALUES ('860', '29', '2');
INSERT INTO `crm_system_roles` VALUES ('859', '15', '2');
INSERT INTO `crm_system_roles` VALUES ('858', '28', '2');
INSERT INTO `crm_system_roles` VALUES ('857', '27', '2');
INSERT INTO `crm_system_roles` VALUES ('856', '26', '2');
INSERT INTO `crm_system_roles` VALUES ('855', '25', '2');
INSERT INTO `crm_system_roles` VALUES ('854', '14', '2');
INSERT INTO `crm_system_roles` VALUES ('372', '14', '3');
INSERT INTO `crm_system_roles` VALUES ('373', '25', '3');
INSERT INTO `crm_system_roles` VALUES ('374', '26', '3');
INSERT INTO `crm_system_roles` VALUES ('375', '27', '3');
INSERT INTO `crm_system_roles` VALUES ('376', '28', '3');
INSERT INTO `crm_system_roles` VALUES ('377', '15', '3');
INSERT INTO `crm_system_roles` VALUES ('378', '29', '3');
INSERT INTO `crm_system_roles` VALUES ('379', '30', '3');
INSERT INTO `crm_system_roles` VALUES ('380', '31', '3');
INSERT INTO `crm_system_roles` VALUES ('381', '32', '3');
INSERT INTO `crm_system_roles` VALUES ('382', '16', '3');
INSERT INTO `crm_system_roles` VALUES ('383', '33', '3');
INSERT INTO `crm_system_roles` VALUES ('384', '34', '3');
INSERT INTO `crm_system_roles` VALUES ('385', '35', '3');
INSERT INTO `crm_system_roles` VALUES ('386', '36', '3');
INSERT INTO `crm_system_roles` VALUES ('387', '37', '3');
INSERT INTO `crm_system_roles` VALUES ('388', '17', '3');
INSERT INTO `crm_system_roles` VALUES ('389', '38', '3');
INSERT INTO `crm_system_roles` VALUES ('390', '39', '3');
INSERT INTO `crm_system_roles` VALUES ('391', '40', '3');
INSERT INTO `crm_system_roles` VALUES ('392', '41', '3');
INSERT INTO `crm_system_roles` VALUES ('393', '42', '3');
INSERT INTO `crm_system_roles` VALUES ('394', '18', '3');
INSERT INTO `crm_system_roles` VALUES ('395', '43', '3');
INSERT INTO `crm_system_roles` VALUES ('396', '44', '3');
INSERT INTO `crm_system_roles` VALUES ('397', '45', '3');
INSERT INTO `crm_system_roles` VALUES ('398', '46', '3');
INSERT INTO `crm_system_roles` VALUES ('399', '47', '3');
INSERT INTO `crm_system_roles` VALUES ('400', '48', '3');
INSERT INTO `crm_system_roles` VALUES ('401', '49', '3');
INSERT INTO `crm_system_roles` VALUES ('402', '19', '3');
INSERT INTO `crm_system_roles` VALUES ('403', '50', '3');
INSERT INTO `crm_system_roles` VALUES ('404', '51', '3');
INSERT INTO `crm_system_roles` VALUES ('405', '52', '3');
INSERT INTO `crm_system_roles` VALUES ('406', '53', '3');
INSERT INTO `crm_system_roles` VALUES ('407', '54', '3');
INSERT INTO `crm_system_roles` VALUES ('408', '55', '3');
INSERT INTO `crm_system_roles` VALUES ('409', '56', '3');
INSERT INTO `crm_system_roles` VALUES ('410', '57', '3');
INSERT INTO `crm_system_roles` VALUES ('411', '58', '3');
INSERT INTO `crm_system_roles` VALUES ('412', '59', '3');
INSERT INTO `crm_system_roles` VALUES ('413', '60', '3');
INSERT INTO `crm_system_roles` VALUES ('414', '20', '3');
INSERT INTO `crm_system_roles` VALUES ('415', '61', '3');
INSERT INTO `crm_system_roles` VALUES ('416', '62', '3');
INSERT INTO `crm_system_roles` VALUES ('417', '63', '3');
INSERT INTO `crm_system_roles` VALUES ('418', '64', '3');
INSERT INTO `crm_system_roles` VALUES ('419', '65', '3');
INSERT INTO `crm_system_roles` VALUES ('420', '21', '3');
INSERT INTO `crm_system_roles` VALUES ('421', '66', '3');
INSERT INTO `crm_system_roles` VALUES ('422', '67', '3');
INSERT INTO `crm_system_roles` VALUES ('423', '68', '3');
INSERT INTO `crm_system_roles` VALUES ('424', '69', '3');
INSERT INTO `crm_system_roles` VALUES ('425', '22', '3');
INSERT INTO `crm_system_roles` VALUES ('426', '70', '3');
INSERT INTO `crm_system_roles` VALUES ('427', '71', '3');
INSERT INTO `crm_system_roles` VALUES ('428', '72', '3');
INSERT INTO `crm_system_roles` VALUES ('429', '73', '3');
INSERT INTO `crm_system_roles` VALUES ('430', '74', '3');
INSERT INTO `crm_system_roles` VALUES ('431', '75', '3');
INSERT INTO `crm_system_roles` VALUES ('432', '76', '3');
INSERT INTO `crm_system_roles` VALUES ('433', '77', '3');
INSERT INTO `crm_system_roles` VALUES ('434', '23', '3');
INSERT INTO `crm_system_roles` VALUES ('435', '78', '3');
INSERT INTO `crm_system_roles` VALUES ('436', '79', '3');
INSERT INTO `crm_system_roles` VALUES ('437', '80', '3');
INSERT INTO `crm_system_roles` VALUES ('438', '81', '3');
INSERT INTO `crm_system_roles` VALUES ('439', '82', '3');
INSERT INTO `crm_system_roles` VALUES ('440', '83', '3');
INSERT INTO `crm_system_roles` VALUES ('441', '84', '3');
INSERT INTO `crm_system_roles` VALUES ('442', '85', '3');
INSERT INTO `crm_system_roles` VALUES ('443', '86', '3');
INSERT INTO `crm_system_roles` VALUES ('444', '24', '3');
INSERT INTO `crm_system_roles` VALUES ('445', '87', '3');
INSERT INTO `crm_system_roles` VALUES ('446', '88', '3');
INSERT INTO `crm_system_roles` VALUES ('447', '89', '3');
INSERT INTO `crm_system_roles` VALUES ('448', '90', '3');
INSERT INTO `crm_system_roles` VALUES ('1053', '69', '4');
INSERT INTO `crm_system_roles` VALUES ('1052', '68', '4');
INSERT INTO `crm_system_roles` VALUES ('1051', '67', '4');
INSERT INTO `crm_system_roles` VALUES ('1050', '66', '4');
INSERT INTO `crm_system_roles` VALUES ('1049', '21', '4');
INSERT INTO `crm_system_roles` VALUES ('1048', '60', '4');
INSERT INTO `crm_system_roles` VALUES ('1047', '59', '4');
INSERT INTO `crm_system_roles` VALUES ('1046', '58', '4');
INSERT INTO `crm_system_roles` VALUES ('1045', '57', '4');
INSERT INTO `crm_system_roles` VALUES ('1044', '56', '4');
INSERT INTO `crm_system_roles` VALUES ('1043', '55', '4');
INSERT INTO `crm_system_roles` VALUES ('1042', '54', '4');
INSERT INTO `crm_system_roles` VALUES ('1041', '53', '4');
INSERT INTO `crm_system_roles` VALUES ('1040', '52', '4');
INSERT INTO `crm_system_roles` VALUES ('1039', '51', '4');
INSERT INTO `crm_system_roles` VALUES ('1038', '50', '4');
INSERT INTO `crm_system_roles` VALUES ('1037', '19', '4');
INSERT INTO `crm_system_roles` VALUES ('1036', '37', '4');
INSERT INTO `crm_system_roles` VALUES ('1035', '36', '4');
INSERT INTO `crm_system_roles` VALUES ('1034', '35', '4');
INSERT INTO `crm_system_roles` VALUES ('1033', '34', '4');
INSERT INTO `crm_system_roles` VALUES ('1032', '33', '4');
INSERT INTO `crm_system_roles` VALUES ('1031', '16', '4');
INSERT INTO `crm_system_roles` VALUES ('1146', '95', '1');
INSERT INTO `crm_system_roles` VALUES ('946', '29', '6');
INSERT INTO `crm_system_roles` VALUES ('947', '30', '6');
INSERT INTO `crm_system_roles` VALUES ('948', '31', '6');
INSERT INTO `crm_system_roles` VALUES ('949', '32', '6');
INSERT INTO `crm_system_roles` VALUES ('950', '16', '6');
INSERT INTO `crm_system_roles` VALUES ('951', '33', '6');
INSERT INTO `crm_system_roles` VALUES ('952', '34', '6');
INSERT INTO `crm_system_roles` VALUES ('953', '35', '6');
INSERT INTO `crm_system_roles` VALUES ('954', '36', '6');
INSERT INTO `crm_system_roles` VALUES ('955', '37', '6');
INSERT INTO `crm_system_roles` VALUES ('956', '17', '6');
INSERT INTO `crm_system_roles` VALUES ('957', '38', '6');
INSERT INTO `crm_system_roles` VALUES ('958', '39', '6');
INSERT INTO `crm_system_roles` VALUES ('959', '40', '6');
INSERT INTO `crm_system_roles` VALUES ('960', '41', '6');
INSERT INTO `crm_system_roles` VALUES ('961', '42', '6');
INSERT INTO `crm_system_roles` VALUES ('962', '18', '6');
INSERT INTO `crm_system_roles` VALUES ('963', '43', '6');
INSERT INTO `crm_system_roles` VALUES ('964', '44', '6');
INSERT INTO `crm_system_roles` VALUES ('965', '45', '6');
INSERT INTO `crm_system_roles` VALUES ('966', '46', '6');
INSERT INTO `crm_system_roles` VALUES ('967', '47', '6');
INSERT INTO `crm_system_roles` VALUES ('968', '48', '6');
INSERT INTO `crm_system_roles` VALUES ('969', '49', '6');
INSERT INTO `crm_system_roles` VALUES ('970', '19', '6');
INSERT INTO `crm_system_roles` VALUES ('971', '50', '6');
INSERT INTO `crm_system_roles` VALUES ('972', '51', '6');
INSERT INTO `crm_system_roles` VALUES ('973', '52', '6');
INSERT INTO `crm_system_roles` VALUES ('974', '53', '6');
INSERT INTO `crm_system_roles` VALUES ('975', '54', '6');
INSERT INTO `crm_system_roles` VALUES ('976', '55', '6');
INSERT INTO `crm_system_roles` VALUES ('977', '56', '6');
INSERT INTO `crm_system_roles` VALUES ('978', '57', '6');
INSERT INTO `crm_system_roles` VALUES ('979', '58', '6');
INSERT INTO `crm_system_roles` VALUES ('980', '59', '6');
INSERT INTO `crm_system_roles` VALUES ('981', '60', '6');
INSERT INTO `crm_system_roles` VALUES ('982', '20', '6');
INSERT INTO `crm_system_roles` VALUES ('983', '61', '6');
INSERT INTO `crm_system_roles` VALUES ('984', '62', '6');
INSERT INTO `crm_system_roles` VALUES ('985', '63', '6');
INSERT INTO `crm_system_roles` VALUES ('986', '64', '6');
INSERT INTO `crm_system_roles` VALUES ('987', '65', '6');
INSERT INTO `crm_system_roles` VALUES ('988', '21', '6');
INSERT INTO `crm_system_roles` VALUES ('989', '66', '6');
INSERT INTO `crm_system_roles` VALUES ('990', '67', '6');
INSERT INTO `crm_system_roles` VALUES ('991', '68', '6');
INSERT INTO `crm_system_roles` VALUES ('992', '69', '6');
INSERT INTO `crm_system_roles` VALUES ('993', '22', '6');
INSERT INTO `crm_system_roles` VALUES ('994', '70', '6');
INSERT INTO `crm_system_roles` VALUES ('995', '71', '6');
INSERT INTO `crm_system_roles` VALUES ('996', '72', '6');
INSERT INTO `crm_system_roles` VALUES ('997', '73', '6');
INSERT INTO `crm_system_roles` VALUES ('998', '74', '6');
INSERT INTO `crm_system_roles` VALUES ('999', '75', '6');
INSERT INTO `crm_system_roles` VALUES ('1000', '76', '6');
INSERT INTO `crm_system_roles` VALUES ('1001', '77', '6');
INSERT INTO `crm_system_roles` VALUES ('1002', '23', '6');
INSERT INTO `crm_system_roles` VALUES ('1003', '78', '6');
INSERT INTO `crm_system_roles` VALUES ('1004', '79', '6');
INSERT INTO `crm_system_roles` VALUES ('1005', '80', '6');
INSERT INTO `crm_system_roles` VALUES ('1006', '81', '6');
INSERT INTO `crm_system_roles` VALUES ('1007', '82', '6');
INSERT INTO `crm_system_roles` VALUES ('1008', '83', '6');
INSERT INTO `crm_system_roles` VALUES ('1009', '84', '6');
INSERT INTO `crm_system_roles` VALUES ('1010', '85', '6');
INSERT INTO `crm_system_roles` VALUES ('1011', '86', '6');
INSERT INTO `crm_system_roles` VALUES ('1012', '24', '6');
INSERT INTO `crm_system_roles` VALUES ('1013', '87', '6');
INSERT INTO `crm_system_roles` VALUES ('1014', '88', '6');
INSERT INTO `crm_system_roles` VALUES ('1015', '89', '6');
INSERT INTO `crm_system_roles` VALUES ('1016', '90', '6');
INSERT INTO `crm_system_roles` VALUES ('1017', '1', '6');
INSERT INTO `crm_system_roles` VALUES ('1018', '2', '6');
INSERT INTO `crm_system_roles` VALUES ('1019', '3', '6');
INSERT INTO `crm_system_roles` VALUES ('1020', '4', '6');
INSERT INTO `crm_system_roles` VALUES ('1021', '5', '6');
INSERT INTO `crm_system_roles` VALUES ('1022', '6', '6');
INSERT INTO `crm_system_roles` VALUES ('1023', '7', '6');
INSERT INTO `crm_system_roles` VALUES ('1024', '8', '6');
INSERT INTO `crm_system_roles` VALUES ('1025', '9', '6');
INSERT INTO `crm_system_roles` VALUES ('1026', '10', '6');
INSERT INTO `crm_system_roles` VALUES ('1027', '11', '6');
INSERT INTO `crm_system_roles` VALUES ('1028', '12', '6');
INSERT INTO `crm_system_roles` VALUES ('1029', '13', '6');
INSERT INTO `crm_system_roles` VALUES ('1030', '91', '6');
INSERT INTO `crm_system_roles` VALUES ('1085', '51', '7');
INSERT INTO `crm_system_roles` VALUES ('1084', '50', '7');
INSERT INTO `crm_system_roles` VALUES ('1083', '19', '7');
INSERT INTO `crm_system_roles` VALUES ('1082', '49', '7');
INSERT INTO `crm_system_roles` VALUES ('1081', '48', '7');
INSERT INTO `crm_system_roles` VALUES ('1080', '47', '7');
INSERT INTO `crm_system_roles` VALUES ('1079', '46', '7');
INSERT INTO `crm_system_roles` VALUES ('1078', '45', '7');
INSERT INTO `crm_system_roles` VALUES ('1077', '44', '7');
INSERT INTO `crm_system_roles` VALUES ('1076', '43', '7');
INSERT INTO `crm_system_roles` VALUES ('1075', '18', '7');
INSERT INTO `crm_system_roles` VALUES ('1074', '32', '7');
INSERT INTO `crm_system_roles` VALUES ('1073', '31', '7');
INSERT INTO `crm_system_roles` VALUES ('1072', '30', '7');
INSERT INTO `crm_system_roles` VALUES ('1071', '29', '7');
INSERT INTO `crm_system_roles` VALUES ('1070', '15', '7');
INSERT INTO `crm_system_roles` VALUES ('1086', '52', '7');
INSERT INTO `crm_system_roles` VALUES ('1087', '53', '7');
INSERT INTO `crm_system_roles` VALUES ('1088', '54', '7');
INSERT INTO `crm_system_roles` VALUES ('1089', '55', '7');
INSERT INTO `crm_system_roles` VALUES ('1090', '56', '7');
INSERT INTO `crm_system_roles` VALUES ('1091', '57', '7');
INSERT INTO `crm_system_roles` VALUES ('1092', '58', '7');
INSERT INTO `crm_system_roles` VALUES ('1093', '59', '7');
INSERT INTO `crm_system_roles` VALUES ('1094', '60', '7');
INSERT INTO `crm_system_roles` VALUES ('1095', '20', '7');
INSERT INTO `crm_system_roles` VALUES ('1096', '61', '7');
INSERT INTO `crm_system_roles` VALUES ('1097', '62', '7');
INSERT INTO `crm_system_roles` VALUES ('1098', '63', '7');
INSERT INTO `crm_system_roles` VALUES ('1099', '64', '7');
INSERT INTO `crm_system_roles` VALUES ('1100', '65', '7');
INSERT INTO `crm_system_roles` VALUES ('1101', '21', '7');
INSERT INTO `crm_system_roles` VALUES ('1102', '66', '7');
INSERT INTO `crm_system_roles` VALUES ('1103', '67', '7');
INSERT INTO `crm_system_roles` VALUES ('1104', '68', '7');
INSERT INTO `crm_system_roles` VALUES ('1105', '69', '7');
INSERT INTO `crm_system_roles` VALUES ('1106', '22', '7');
INSERT INTO `crm_system_roles` VALUES ('1107', '70', '7');
INSERT INTO `crm_system_roles` VALUES ('1108', '71', '7');
INSERT INTO `crm_system_roles` VALUES ('1109', '72', '7');
INSERT INTO `crm_system_roles` VALUES ('1110', '73', '7');
INSERT INTO `crm_system_roles` VALUES ('1111', '74', '7');
INSERT INTO `crm_system_roles` VALUES ('1112', '75', '7');
INSERT INTO `crm_system_roles` VALUES ('1113', '76', '7');
INSERT INTO `crm_system_roles` VALUES ('1114', '77', '7');
INSERT INTO `crm_system_roles` VALUES ('1115', '23', '7');
INSERT INTO `crm_system_roles` VALUES ('1116', '78', '7');
INSERT INTO `crm_system_roles` VALUES ('1117', '79', '7');
INSERT INTO `crm_system_roles` VALUES ('1118', '80', '7');
INSERT INTO `crm_system_roles` VALUES ('1119', '81', '7');
INSERT INTO `crm_system_roles` VALUES ('1120', '82', '7');
INSERT INTO `crm_system_roles` VALUES ('1121', '83', '7');
INSERT INTO `crm_system_roles` VALUES ('1122', '84', '7');
INSERT INTO `crm_system_roles` VALUES ('1123', '85', '7');
INSERT INTO `crm_system_roles` VALUES ('1124', '86', '7');
INSERT INTO `crm_system_roles` VALUES ('1125', '24', '7');
INSERT INTO `crm_system_roles` VALUES ('1126', '87', '7');
INSERT INTO `crm_system_roles` VALUES ('1127', '88', '7');
INSERT INTO `crm_system_roles` VALUES ('1128', '89', '7');
INSERT INTO `crm_system_roles` VALUES ('1129', '90', '7');
INSERT INTO `crm_system_roles` VALUES ('1130', '1', '7');
INSERT INTO `crm_system_roles` VALUES ('1131', '2', '7');
INSERT INTO `crm_system_roles` VALUES ('1132', '3', '7');
INSERT INTO `crm_system_roles` VALUES ('1133', '4', '7');
INSERT INTO `crm_system_roles` VALUES ('1134', '5', '7');
INSERT INTO `crm_system_roles` VALUES ('1135', '6', '7');
INSERT INTO `crm_system_roles` VALUES ('1136', '7', '7');
INSERT INTO `crm_system_roles` VALUES ('1137', '8', '7');
INSERT INTO `crm_system_roles` VALUES ('1138', '9', '7');
INSERT INTO `crm_system_roles` VALUES ('1139', '10', '7');
INSERT INTO `crm_system_roles` VALUES ('1140', '11', '7');
INSERT INTO `crm_system_roles` VALUES ('1141', '12', '7');
INSERT INTO `crm_system_roles` VALUES ('1142', '13', '7');
INSERT INTO `crm_system_roles` VALUES ('1143', '91', '7');
INSERT INTO `crm_system_roles` VALUES ('1144', '94', '7');
INSERT INTO `crm_system_roles` VALUES ('1145', '93', '7');

-- ----------------------------
-- Table structure for crm_users
-- ----------------------------
DROP TABLE IF EXISTS `crm_users`;
CREATE TABLE `crm_users` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL DEFAULT '',
  `user_name` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `question` varchar(255) NOT NULL DEFAULT '',
  `answer` varchar(255) NOT NULL DEFAULT '',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `address_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `reg_time` datetime DEFAULT NULL,
  `last_login` int(11) unsigned NOT NULL DEFAULT '0',
  `last_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` varchar(15) NOT NULL DEFAULT '',
  `visit_count` smallint(5) unsigned NOT NULL DEFAULT '0',
  `is_special` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `msn` varchar(60) NOT NULL,
  `qq` varchar(20) NOT NULL,
  `office_phone` varchar(20) NOT NULL,
  `home_phone` varchar(20) NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `is_validated` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `passwd_question` varchar(50) DEFAULT NULL,
  `passwd_answer` varchar(255) DEFAULT NULL,
  `enabled` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `role_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10011 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crm_users
-- ----------------------------
INSERT INTO `crm_users` VALUES ('10006', 'c@c.com', 'admin', 'e10adc3', '', '', '0', '2013-12-17', '0', '2013-12-17 15:33:25', '1', '2013-12-30 15:43:13', '127.0.0.1', '198', '0', '', '', '', '', '', '0', '', '', '1', '1');
INSERT INTO `crm_users` VALUES ('10009', 'c@c.com', 'user1', 'e10adc3', '', '', '0', '2013-12-30', '0', '2013-12-30 16:43:05', '0', '0000-00-00 00:00:00', '', '0', '0', '', '', '', '', '', '0', '', '', '1', '7');

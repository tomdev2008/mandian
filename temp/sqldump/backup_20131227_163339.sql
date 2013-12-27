-- ecshop v2.x SQL Dump Program
-- 
-- DATE : 2013-12-27 16:33:41
-- PHP VERSION : 5.3.27
-- Vol : 1
DROP TABLE IF EXISTS `crm_roles`;
CREATE TABLE `crm_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT NULL,
  `enabled` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `crm_roles` ( `role_id`, `role_name`, `enabled` ) VALUES  ('1', '超级管理员', '1');
INSERT INTO `crm_roles` ( `role_id`, `role_name`, `enabled` ) VALUES  ('2', '管理员', '0');
INSERT INTO `crm_roles` ( `role_id`, `role_name`, `enabled` ) VALUES  ('3', '经理', '1');
INSERT INTO `crm_roles` ( `role_id`, `role_name`, `enabled` ) VALUES  ('4', '销售', '1');
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('1', '0', '系统管理', '', '', '', '1', '100', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('2', '1', '用户管理', 'system', 'user', 'user_list', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('3', '1', '用户管理-添加', 'system', 'user', 'user_add', '0', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('4', '1', '用户管理-编辑', 'system', 'user', 'user_edit', '0', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('5', '1', '用户管理-删除', 'system', 'user', 'user_del', '0', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('6', '1', '角色管理', 'system', 'user', 'role_list', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('7', '1', '角色管理-添加', 'system', 'user', 'role_add', '0', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('8', '1', '角色管理-编辑', 'system', 'user', 'role_edit', '0', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('9', '1', '角色管理-删除', 'system', 'user', 'role_del', '0', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('10', '1', '系统模块管理', 'system', 'system', 'system_list', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('11', '1', '系统模块管理-添加', 'system', 'system', 'system_add', '0', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('12', '1', '系统模块管理-编辑', 'system', 'system', 'system_edit', '0', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('13', '1', '系统模块管理-删除', 'system', 'system', 'system_del', '0', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('14', '0', '工作台', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('15', '0', '营销', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('16', '0', '销售自动化', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('17', '0', '客户', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('18', '0', '产品', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('19', '0', '销售', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('20', '0', '采购', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('21', '0', '售后', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('22', '0', '库存', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('23', '0', '财务', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('24', '0', '报表', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('25', '14', '工作台', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('26', '14', '公司平台', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('27', '14', '日程安排', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('28', '14', '公告', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('29', '15', '营销活动', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('30', '15', '群发短信', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('31', '15', '群发邮件', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('32', '15', '邮件模板', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('33', '16', '关于SFA', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('34', '16', 'SFA工作台', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('35', '16', 'SFA序列', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('36', '16', '执行日志', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('37', '16', '方案设置', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('38', '17', '客户', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('39', '17', '联系人', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('40', '17', '联系记录', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('41', '17', '客户池', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('42', '17', '纪念日', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('43', '18', '产品', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('44', '18', '产品分类', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('45', '18', '产品序列号', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('46', '18', '产品规格', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('47', '18', '库位管理', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('48', '18', '装配方案', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('49', '18', '装配出入库单', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('50', '19', '逍遥行', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('51', '19', '销售导航', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('52', '19', '销售机会', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('53', '19', '销售漏斗', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('54', '19', '报价单', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('55', '19', '竞争对手', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('56', '19', '合同订单', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('57', '19', '发货单', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('58', '19', '员工绩效', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('59', '19', '销售目标', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('60', '19', '销售退货单', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('61', '20', '采购导航', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('62', '20', '进货单', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('63', '20', '供应商', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('64', '20', '供应商联系记录', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('65', '20', '供应商联系人', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('66', '21', '客服控制台', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('67', '21', '客服服务', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('68', '21', '客户投诉', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('69', '21', '常见问题', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('70', '22', '库存导航', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('71', '22', '入库单', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('72', '22', '盘点', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('73', '22', '库存余额', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('74', '22', '初始化库存', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('75', '22', '库间调拨', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('76', '22', '库存流水帐', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('77', '22', '库存台账', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('78', '23', '财务导航', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('79', '23', '应收款', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('80', '23', '应付款', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('81', '23', '收款单', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('82', '23', '付款单', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('83', '23', '往来账', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('84', '23', '初期余额', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('85', '23', '费用报销', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('86', '23', '发票管理', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('87', '24', '综合报表', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('88', '24', '常用报表', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('89', '24', '公司账户统计', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('90', '24', '年终销售报表', '', '', '', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('91', '1', '数据库管理/优化', 'system', 'system', 'dumpsql', '1', '0', '1');
INSERT INTO `crm_system` ( `sys_id`, `sys_parent_id`, `sys_name`, `sys_module`, `sys_controller`, `sys_action`, `visiabled`, `sys_order_id`, `enabled` ) VALUES  ('93', '0', '系统管理', '', '', '', '1', '100', '1');
DROP TABLE IF EXISTS `crm_system_roles`;
CREATE TABLE `crm_system_roles` (
  `sr_id` int(11) NOT NULL AUTO_INCREMENT,
  `sr_sys_id` int(11) NOT NULL DEFAULT '0',
  `sr_role_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sr_id`),
  UNIQUE KEY `sr_sys_id` (`sr_sys_id`,`sr_role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('944', '28', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('943', '27', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('942', '26', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('941', '25', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('940', '14', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('939', '91', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('938', '13', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('937', '12', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('936', '11', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('935', '10', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('934', '4', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('933', '3', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('932', '2', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('931', '1', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('945', '15', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('853', '91', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('852', '13', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('851', '12', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('850', '11', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('849', '10', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('848', '9', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('847', '8', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('846', '7', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('845', '6', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('844', '5', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('843', '4', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('842', '3', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('841', '2', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('840', '1', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('839', '90', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('838', '89', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('837', '88', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('836', '87', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('835', '24', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('834', '86', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('833', '85', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('832', '84', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('831', '83', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('830', '82', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('829', '81', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('828', '80', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('827', '79', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('826', '78', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('825', '23', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('824', '77', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('823', '76', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('822', '75', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('821', '74', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('820', '73', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('819', '72', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('818', '71', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('817', '70', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('816', '22', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('815', '69', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('814', '68', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('813', '67', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('812', '66', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('811', '21', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('810', '65', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('809', '64', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('808', '63', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('807', '62', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('806', '61', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('805', '20', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('804', '60', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('803', '59', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('802', '58', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('801', '57', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('800', '56', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('799', '55', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('798', '54', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('797', '53', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('796', '52', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('795', '51', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('794', '50', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('793', '19', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('792', '49', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('791', '48', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('790', '47', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('789', '46', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('788', '45', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('787', '44', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('786', '43', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('785', '18', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('784', '42', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('783', '41', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('782', '40', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('781', '39', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('780', '38', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('779', '17', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('778', '37', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('777', '36', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('776', '35', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('775', '34', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('774', '33', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('773', '16', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('772', '32', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('771', '31', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('770', '30', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('769', '29', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('768', '15', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('767', '28', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('766', '27', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('765', '26', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('764', '25', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('930', '90', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('929', '89', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('928', '88', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('927', '87', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('926', '24', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('925', '86', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('924', '85', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('923', '84', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('922', '83', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('921', '82', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('920', '81', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('919', '80', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('918', '79', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('917', '78', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('916', '23', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('915', '77', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('914', '76', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('913', '75', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('912', '74', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('911', '73', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('910', '72', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('909', '71', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('908', '70', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('907', '22', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('906', '69', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('905', '68', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('904', '67', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('903', '66', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('902', '21', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('901', '65', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('900', '64', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('899', '63', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('898', '62', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('897', '61', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('896', '20', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('895', '60', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('894', '59', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('893', '58', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('892', '57', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('891', '56', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('890', '55', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('889', '54', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('888', '53', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('887', '52', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('886', '51', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('885', '50', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('884', '19', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('883', '49', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('882', '48', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('881', '47', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('880', '46', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('879', '45', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('878', '44', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('877', '43', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('876', '18', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('875', '42', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('874', '41', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('873', '40', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('872', '39', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('871', '38', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('870', '17', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('869', '37', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('868', '36', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('867', '35', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('866', '34', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('865', '33', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('864', '16', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('863', '32', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('862', '31', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('861', '30', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('860', '29', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('859', '15', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('858', '28', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('857', '27', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('856', '26', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('855', '25', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('854', '14', '2');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('372', '14', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('373', '25', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('374', '26', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('375', '27', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('376', '28', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('377', '15', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('378', '29', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('379', '30', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('380', '31', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('381', '32', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('382', '16', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('383', '33', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('384', '34', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('385', '35', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('386', '36', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('387', '37', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('388', '17', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('389', '38', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('390', '39', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('391', '40', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('392', '41', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('393', '42', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('394', '18', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('395', '43', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('396', '44', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('397', '45', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('398', '46', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('399', '47', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('400', '48', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('401', '49', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('402', '19', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('403', '50', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('404', '51', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('405', '52', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('406', '53', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('407', '54', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('408', '55', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('409', '56', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('410', '57', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('411', '58', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('412', '59', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('413', '60', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('414', '20', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('415', '61', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('416', '62', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('417', '63', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('418', '64', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('419', '65', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('420', '21', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('421', '66', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('422', '67', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('423', '68', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('424', '69', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('425', '22', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('426', '70', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('427', '71', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('428', '72', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('429', '73', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('430', '74', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('431', '75', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('432', '76', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('433', '77', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('434', '23', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('435', '78', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('436', '79', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('437', '80', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('438', '81', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('439', '82', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('440', '83', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('441', '84', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('442', '85', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('443', '86', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('444', '24', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('445', '87', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('446', '88', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('447', '89', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('448', '90', '3');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('484', '60', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('483', '59', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('482', '58', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('481', '57', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('480', '56', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('479', '55', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('478', '54', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('477', '53', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('476', '52', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('475', '51', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('474', '50', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('473', '19', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('472', '37', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('471', '36', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('470', '35', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('469', '34', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('468', '33', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('467', '16', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('485', '21', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('486', '66', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('487', '67', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('488', '68', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('489', '69', '4');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('763', '14', '1');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('946', '29', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('947', '30', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('948', '31', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('949', '32', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('950', '16', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('951', '33', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('952', '34', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('953', '35', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('954', '36', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('955', '37', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('956', '17', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('957', '38', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('958', '39', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('959', '40', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('960', '41', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('961', '42', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('962', '18', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('963', '43', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('964', '44', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('965', '45', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('966', '46', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('967', '47', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('968', '48', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('969', '49', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('970', '19', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('971', '50', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('972', '51', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('973', '52', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('974', '53', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('975', '54', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('976', '55', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('977', '56', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('978', '57', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('979', '58', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('980', '59', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('981', '60', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('982', '20', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('983', '61', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('984', '62', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('985', '63', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('986', '64', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('987', '65', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('988', '21', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('989', '66', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('990', '67', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('991', '68', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('992', '69', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('993', '22', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('994', '70', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('995', '71', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('996', '72', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('997', '73', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('998', '74', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('999', '75', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1000', '76', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1001', '77', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1002', '23', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1003', '78', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1004', '79', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1005', '80', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1006', '81', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1007', '82', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1008', '83', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1009', '84', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1010', '85', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1011', '86', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1012', '24', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1013', '87', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1014', '88', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1015', '89', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1016', '90', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1017', '1', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1018', '2', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1019', '3', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1020', '4', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1021', '5', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1022', '6', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1023', '7', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1024', '8', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1025', '9', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1026', '10', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1027', '11', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1028', '12', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1029', '13', '6');
INSERT INTO `crm_system_roles` ( `sr_id`, `sr_sys_id`, `sr_role_id` ) VALUES  ('1030', '91', '6');
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `crm_users` ( `user_id`, `email`, `user_name`, `password`, `question`, `answer`, `sex`, `birthday`, `address_id`, `reg_time`, `last_login`, `last_time`, `last_ip`, `visit_count`, `is_special`, `msn`, `qq`, `office_phone`, `home_phone`, `mobile_phone`, `is_validated`, `passwd_question`, `passwd_answer`, `enabled`, `role_id` ) VALUES  ('10006', 'c@c.com', 'admin', 'e10adc3', '', '', '0', '2013-12-17', '0', '2013-12-17 15:33:25', '1', '2013-12-27 16:28:52', '127.0.0.1', '187', '0', '', '', '', '', '', '0', '', '', '1', '1');
INSERT INTO `crm_users` ( `user_id`, `email`, `user_name`, `password`, `question`, `answer`, `sex`, `birthday`, `address_id`, `reg_time`, `last_login`, `last_time`, `last_ip`, `visit_count`, `is_special`, `msn`, `qq`, `office_phone`, `home_phone`, `mobile_phone`, `is_validated`, `passwd_question`, `passwd_answer`, `enabled`, `role_id` ) VALUES  ('10008', 'c@c.com', 'user', 'ee11cbb', '', '', '0', '2013-12-23', '0', '2013-12-23 16:41:55', '1', '2013-12-23 19:20:09', '127.0.0.1', '17', '0', '', '', '', '', '', '0', '', '', '1', '3');
-- END momo-crm SQL Dump Program 
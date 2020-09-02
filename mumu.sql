/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : mumu

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 31/08/2020 17:57:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_node
-- ----------------------------
DROP TABLE IF EXISTS `admin_node`;
CREATE TABLE `admin_node`  (
  `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '节点ID',
  `pid` smallint(6) NOT NULL DEFAULT 0 COMMENT '父节点ID',
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `icon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '菜单图标',
  `href` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '链接',
  `target` enum('_self','_blank') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '_self' COMMENT '链接打开方式（_self：当前页面打开 _blank：新建页面打开）',
  `sort` smallint(6) NOT NULL DEFAULT 0 COMMENT '菜单排序',
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '状态（1：可用 0：不可用）',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '备注信息',
  `show` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '展示状态（1：展示 0：不展示）',
  `create_at` datetime(0) NULL DEFAULT NULL COMMENT '创建时间',
  `update_at` datetime(0) NULL DEFAULT NULL COMMENT '更新时间',
  `delete_at` datetime(0) NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_node
-- ----------------------------
INSERT INTO `admin_node` VALUES (1, 0, '后台管理', NULL, NULL, '_self', 1, '1', '后台管理', '1', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for admin_node1
-- ----------------------------
DROP TABLE IF EXISTS `admin_node1`;
CREATE TABLE `admin_node1`  (
  `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '路由名称',
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '节点名称',
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '可用状态',
  `sort` smallint(6) NOT NULL DEFAULT 0 COMMENT '排序',
  `pid` smallint(6) NOT NULL COMMENT '父级id',
  `level` tinyint(1) NOT NULL DEFAULT 1 COMMENT '层级',
  `icon` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'icon',
  `show` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '显示状态',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `node_group`(`name`, `title`, `status`, `sort`, `pid`, `level`, `icon`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admin_node1
-- ----------------------------
INSERT INTO `admin_node1` VALUES (1, 'admin_user', '用户管理', '1', 1, 0, 1, NULL, '1');
INSERT INTO `admin_node1` VALUES (2, 'user_list', '用户列表', '1', 1, 1, 2, NULL, '1');
INSERT INTO `admin_node1` VALUES (3, 'create_user', '添加用户页', '1', 2, 1, 2, NULL, '1');
INSERT INTO `admin_node1` VALUES (4, 'add_user', '保存用户', '1', 2, 1, 2, NULL, '0');
INSERT INTO `admin_node1` VALUES (5, 'edit_user', '修改用户页', '1', 3, 1, 2, NULL, '0');
INSERT INTO `admin_node1` VALUES (6, 'update_user', '更新用户', '1', 3, 1, 2, NULL, '0');
INSERT INTO `admin_node1` VALUES (7, 'delete_user', '删除用户', '1', 4, 1, 2, NULL, '0');
INSERT INTO `admin_node1` VALUES (8, 'test', '测试管理', '1', 2, 0, 1, NULL, '1');
INSERT INTO `admin_node1` VALUES (9, 'test_list', '测试列表', '1', 1, 8, 2, NULL, '1');
INSERT INTO `admin_node1` VALUES (10, 'test2', 'test2', '1', 1, 9, 3, NULL, '1');
INSERT INTO `admin_node1` VALUES (11, 'test3', 'test3', '1', 2, 9, 3, NULL, '1');
INSERT INTO `admin_node1` VALUES (12, 'test4', 'test4', '1', 1, 10, 4, NULL, '1');
INSERT INTO `admin_node1` VALUES (13, 'tt', 'ttt', '1', 3, 0, 1, NULL, '1');

-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user`  (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户名',
  `password` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES (1, 'admin', '$2y$10$Wn2/ukTrnGFKaNmcHsH4h.7EpJkWhv8lV4lOlyb4MnVj70TQRP0ym');

SET FOREIGN_KEY_CHECKS = 1;

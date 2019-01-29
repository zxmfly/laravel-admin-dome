/*
 Navicat Premium Data Transfer

 Source Server         : 本机3301
 Source Server Type    : MySQL
 Source Server Version : 50719
 Source Host           : localhost:3301
 Source Schema         : photo_manage

 Target Server Type    : MySQL
 Target Server Version : 50719
 File Encoding         : 65001

 Date: 26/01/2019 15:52:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `permission` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES (1, 0, 1, 'Index', 'fa-university', '/', NULL, NULL, '2019-01-26 15:43:27');
INSERT INTO `admin_menu` VALUES (2, 0, 2, '系统管理', 'fa-tasks', NULL, NULL, NULL, '2019-01-26 11:42:36');
INSERT INTO `admin_menu` VALUES (3, 2, 3, '后台账号', 'fa-users', 'auth/users', NULL, NULL, '2019-01-26 11:43:00');
INSERT INTO `admin_menu` VALUES (4, 2, 4, '权限组', 'fa-database', 'auth/roles', NULL, NULL, '2019-01-26 15:45:51');
INSERT INTO `admin_menu` VALUES (5, 2, 5, '权限', 'fa-ban', 'auth/permissions', NULL, NULL, '2019-01-26 15:44:34');
INSERT INTO `admin_menu` VALUES (6, 2, 6, '菜单', 'fa-bars', 'auth/menu', NULL, NULL, '2019-01-26 15:44:08');
INSERT INTO `admin_menu` VALUES (7, 2, 7, '后台日志', 'fa-history', 'auth/logs', NULL, NULL, '2019-01-26 15:46:06');

-- ----------------------------
-- Table structure for admin_operation_log
-- ----------------------------
DROP TABLE IF EXISTS `admin_operation_log`;
CREATE TABLE `admin_operation_log`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `admin_operation_log_user_id_index`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 87 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_operation_log
-- ----------------------------
INSERT INTO `admin_operation_log` VALUES (1, 1, 'admin', 'GET', '127.0.0.1', '[]', '2019-01-26 11:31:08', '2019-01-26 11:31:08');
INSERT INTO `admin_operation_log` VALUES (2, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 11:31:47', '2019-01-26 11:31:47');
INSERT INTO `admin_operation_log` VALUES (3, 1, 'admin/auth/menu/6/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 11:32:53', '2019-01-26 11:32:53');
INSERT INTO `admin_operation_log` VALUES (4, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 11:33:13', '2019-01-26 11:33:13');
INSERT INTO `admin_operation_log` VALUES (5, 1, 'admin/auth/menu/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 11:33:17', '2019-01-26 11:33:17');
INSERT INTO `admin_operation_log` VALUES (6, 1, 'admin/auth/menu/2', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u7cfb\\u7edf\\u7ba1\\u7406\",\"icon\":\"fa-tasks\",\"uri\":null,\"roles\":[\"1\",null],\"permission\":null,\"_token\":\"rIZ50Ms5SZZlENJMF3TnIAI13HrAYqguYSas2OTC\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/work3.local.com:85\\/admin\\/auth\\/menu\"}', '2019-01-26 11:42:36', '2019-01-26 11:42:36');
INSERT INTO `admin_operation_log` VALUES (7, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-01-26 11:42:37', '2019-01-26 11:42:37');
INSERT INTO `admin_operation_log` VALUES (8, 1, 'admin/auth/menu/3/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 11:42:44', '2019-01-26 11:42:44');
INSERT INTO `admin_operation_log` VALUES (9, 1, 'admin/auth/menu/3', 'PUT', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"\\u540e\\u53f0\\u8d26\\u53f7\",\"icon\":\"fa-users\",\"uri\":\"auth\\/users\",\"roles\":[null],\"permission\":null,\"_token\":\"rIZ50Ms5SZZlENJMF3TnIAI13HrAYqguYSas2OTC\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/work3.local.com:85\\/admin\\/auth\\/menu\"}', '2019-01-26 11:43:00', '2019-01-26 11:43:00');
INSERT INTO `admin_operation_log` VALUES (10, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-01-26 11:43:00', '2019-01-26 11:43:00');
INSERT INTO `admin_operation_log` VALUES (11, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 11:43:10', '2019-01-26 11:43:10');
INSERT INTO `admin_operation_log` VALUES (12, 1, 'admin/auth/users/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 11:43:20', '2019-01-26 11:43:20');
INSERT INTO `admin_operation_log` VALUES (13, 1, 'admin/auth/users/1/edit', 'GET', '127.0.0.1', '[]', '2019-01-26 12:01:27', '2019-01-26 12:01:27');
INSERT INTO `admin_operation_log` VALUES (14, 1, 'admin/auth/users/1/edit', 'GET', '127.0.0.1', '[]', '2019-01-26 12:10:06', '2019-01-26 12:10:06');
INSERT INTO `admin_operation_log` VALUES (15, 1, 'admin/auth/users/1/edit', 'GET', '127.0.0.1', '[]', '2019-01-26 12:10:08', '2019-01-26 12:10:08');
INSERT INTO `admin_operation_log` VALUES (16, 1, 'admin/auth/users/1/edit', 'GET', '127.0.0.1', '[]', '2019-01-26 12:10:10', '2019-01-26 12:10:10');
INSERT INTO `admin_operation_log` VALUES (17, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 12:21:27', '2019-01-26 12:21:27');
INSERT INTO `admin_operation_log` VALUES (18, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2019-01-26 14:32:58', '2019-01-26 14:32:58');
INSERT INTO `admin_operation_log` VALUES (19, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 14:33:03', '2019-01-26 14:33:03');
INSERT INTO `admin_operation_log` VALUES (20, 1, 'admin/auth/roles/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 14:33:09', '2019-01-26 14:33:09');
INSERT INTO `admin_operation_log` VALUES (21, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 14:38:05', '2019-01-26 14:38:05');
INSERT INTO `admin_operation_log` VALUES (22, 1, 'admin', 'GET', '127.0.0.1', '[]', '2019-01-26 14:39:28', '2019-01-26 14:39:28');
INSERT INTO `admin_operation_log` VALUES (23, 1, 'admin', 'GET', '127.0.0.1', '[]', '2019-01-26 15:08:13', '2019-01-26 15:08:13');
INSERT INTO `admin_operation_log` VALUES (24, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:08:18', '2019-01-26 15:08:18');
INSERT INTO `admin_operation_log` VALUES (25, 1, 'admin', 'GET', '127.0.0.1', '[]', '2019-01-26 15:09:34', '2019-01-26 15:09:34');
INSERT INTO `admin_operation_log` VALUES (26, 1, 'admin', 'GET', '127.0.0.1', '[]', '2019-01-26 15:09:55', '2019-01-26 15:09:55');
INSERT INTO `admin_operation_log` VALUES (27, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:10:10', '2019-01-26 15:10:10');
INSERT INTO `admin_operation_log` VALUES (28, 1, 'admin/auth/menu/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:10:20', '2019-01-26 15:10:20');
INSERT INTO `admin_operation_log` VALUES (29, 1, 'admin/auth/menu/1', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Index\",\"icon\":\"fa-university\",\"uri\":\"\\/\",\"roles\":[null],\"permission\":null,\"_token\":\"m1gHnmHLKHZKV83cKZUlVTACNyh9gLAnNRBVYdIS\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/work3.local.com:85\\/admin\\/auth\\/menu\"}', '2019-01-26 15:43:27', '2019-01-26 15:43:27');
INSERT INTO `admin_operation_log` VALUES (30, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-01-26 15:43:28', '2019-01-26 15:43:28');
INSERT INTO `admin_operation_log` VALUES (31, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-01-26 15:43:31', '2019-01-26 15:43:31');
INSERT INTO `admin_operation_log` VALUES (32, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:43:33', '2019-01-26 15:43:33');
INSERT INTO `admin_operation_log` VALUES (33, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:43:36', '2019-01-26 15:43:36');
INSERT INTO `admin_operation_log` VALUES (34, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:43:42', '2019-01-26 15:43:42');
INSERT INTO `admin_operation_log` VALUES (35, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:43:44', '2019-01-26 15:43:44');
INSERT INTO `admin_operation_log` VALUES (36, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:43:56', '2019-01-26 15:43:56');
INSERT INTO `admin_operation_log` VALUES (37, 1, 'admin/auth/menu/6/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:44:00', '2019-01-26 15:44:00');
INSERT INTO `admin_operation_log` VALUES (38, 1, 'admin/auth/menu/6', 'PUT', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"\\u83dc\\u5355\",\"icon\":\"fa-bars\",\"uri\":\"auth\\/menu\",\"roles\":[null],\"permission\":null,\"_token\":\"m1gHnmHLKHZKV83cKZUlVTACNyh9gLAnNRBVYdIS\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/work3.local.com:85\\/admin\\/auth\\/menu\"}', '2019-01-26 15:44:08', '2019-01-26 15:44:08');
INSERT INTO `admin_operation_log` VALUES (39, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-01-26 15:44:08', '2019-01-26 15:44:08');
INSERT INTO `admin_operation_log` VALUES (40, 1, 'admin/auth/menu/5/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:44:12', '2019-01-26 15:44:12');
INSERT INTO `admin_operation_log` VALUES (41, 1, 'admin/auth/menu/5', 'PUT', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"\\u6743\\u9650\",\"icon\":\"fa-ban\",\"uri\":\"auth\\/permissions\",\"roles\":[null],\"permission\":null,\"_token\":\"m1gHnmHLKHZKV83cKZUlVTACNyh9gLAnNRBVYdIS\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/work3.local.com:85\\/admin\\/auth\\/menu\"}', '2019-01-26 15:44:34', '2019-01-26 15:44:34');
INSERT INTO `admin_operation_log` VALUES (42, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-01-26 15:44:34', '2019-01-26 15:44:34');
INSERT INTO `admin_operation_log` VALUES (43, 1, 'admin/auth/menu/4/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:44:41', '2019-01-26 15:44:41');
INSERT INTO `admin_operation_log` VALUES (44, 1, 'admin/auth/menu/4', 'PUT', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"\\u6743\\u9650\\u7ec4\",\"icon\":\"fa-database\",\"uri\":\"auth\\/roles\",\"roles\":[null],\"permission\":null,\"_token\":\"m1gHnmHLKHZKV83cKZUlVTACNyh9gLAnNRBVYdIS\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/work3.local.com:85\\/admin\\/auth\\/menu\"}', '2019-01-26 15:45:51', '2019-01-26 15:45:51');
INSERT INTO `admin_operation_log` VALUES (45, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-01-26 15:45:51', '2019-01-26 15:45:51');
INSERT INTO `admin_operation_log` VALUES (46, 1, 'admin/auth/menu/7/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:45:58', '2019-01-26 15:45:58');
INSERT INTO `admin_operation_log` VALUES (47, 1, 'admin/auth/menu/7', 'PUT', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"\\u540e\\u53f0\\u65e5\\u5fd7\",\"icon\":\"fa-history\",\"uri\":\"auth\\/logs\",\"roles\":[null],\"permission\":null,\"_token\":\"m1gHnmHLKHZKV83cKZUlVTACNyh9gLAnNRBVYdIS\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/work3.local.com:85\\/admin\\/auth\\/menu\"}', '2019-01-26 15:46:06', '2019-01-26 15:46:06');
INSERT INTO `admin_operation_log` VALUES (48, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-01-26 15:46:07', '2019-01-26 15:46:07');
INSERT INTO `admin_operation_log` VALUES (49, 1, 'admin/auth/menu/4/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:46:20', '2019-01-26 15:46:20');
INSERT INTO `admin_operation_log` VALUES (50, 1, 'admin/auth/menu/4/edit', 'GET', '127.0.0.1', '[]', '2019-01-26 15:46:25', '2019-01-26 15:46:25');
INSERT INTO `admin_operation_log` VALUES (51, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:46:28', '2019-01-26 15:46:28');
INSERT INTO `admin_operation_log` VALUES (52, 1, 'admin/auth/roles/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:46:34', '2019-01-26 15:46:34');
INSERT INTO `admin_operation_log` VALUES (53, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:46:39', '2019-01-26 15:46:39');
INSERT INTO `admin_operation_log` VALUES (54, 1, 'admin/auth/permissions/5/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:47:46', '2019-01-26 15:47:46');
INSERT INTO `admin_operation_log` VALUES (55, 1, 'admin/auth/permissions/5', 'PUT', '127.0.0.1', '{\"slug\":\"\\u7cfb\\u7edf\\u7ba1\\u7406\",\"name\":\"\\u7cfb\\u7edf\\u7ba1\\u7406\",\"http_method\":[null],\"http_path\":\"\\/auth\\/roles\\r\\n\\/auth\\/permissions\\r\\n\\/auth\\/menu\\r\\n\\/auth\\/logs\",\"_token\":\"m1gHnmHLKHZKV83cKZUlVTACNyh9gLAnNRBVYdIS\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/work3.local.com:85\\/admin\\/auth\\/permissions\"}', '2019-01-26 15:48:01', '2019-01-26 15:48:01');
INSERT INTO `admin_operation_log` VALUES (56, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2019-01-26 15:48:01', '2019-01-26 15:48:01');
INSERT INTO `admin_operation_log` VALUES (57, 1, 'admin/auth/permissions/3/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:48:26', '2019-01-26 15:48:26');
INSERT INTO `admin_operation_log` VALUES (58, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:48:30', '2019-01-26 15:48:30');
INSERT INTO `admin_operation_log` VALUES (59, 1, 'admin/auth/permissions/3/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:48:37', '2019-01-26 15:48:37');
INSERT INTO `admin_operation_log` VALUES (60, 1, 'admin/auth/permissions/3', 'PUT', '127.0.0.1', '{\"slug\":\"\\u8d26\\u6237\\u4e2d\\u5fc3\",\"name\":\"\\u8d26\\u6237\\u4e2d\\u5fc3\",\"http_method\":[null],\"http_path\":\"\\/auth\\/login\\r\\n\\/auth\\/logout\\r\\n\\/auth\\/setting\\r\\n\\/\",\"_token\":\"m1gHnmHLKHZKV83cKZUlVTACNyh9gLAnNRBVYdIS\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/work3.local.com:85\\/admin\\/auth\\/permissions\"}', '2019-01-26 15:49:09', '2019-01-26 15:49:09');
INSERT INTO `admin_operation_log` VALUES (61, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2019-01-26 15:49:09', '2019-01-26 15:49:09');
INSERT INTO `admin_operation_log` VALUES (62, 1, 'admin/auth/permissions/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:49:18', '2019-01-26 15:49:18');
INSERT INTO `admin_operation_log` VALUES (63, 1, 'admin/auth/permissions/1', 'PUT', '127.0.0.1', '{\"slug\":\"\\u5168\\u90e8\",\"name\":\"\\u5168\\u90e8\",\"http_method\":[null],\"http_path\":\"*\",\"_token\":\"m1gHnmHLKHZKV83cKZUlVTACNyh9gLAnNRBVYdIS\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/work3.local.com:85\\/admin\\/auth\\/permissions\"}', '2019-01-26 15:49:29', '2019-01-26 15:49:29');
INSERT INTO `admin_operation_log` VALUES (64, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2019-01-26 15:49:29', '2019-01-26 15:49:29');
INSERT INTO `admin_operation_log` VALUES (65, 1, 'admin/auth/permissions/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:49:34', '2019-01-26 15:49:34');
INSERT INTO `admin_operation_log` VALUES (66, 1, 'admin/auth/permissions/1', 'PUT', '127.0.0.1', '{\"slug\":\"superAdmin\",\"name\":\"\\u5168\\u90e8\",\"http_method\":[null],\"http_path\":\"*\",\"_token\":\"m1gHnmHLKHZKV83cKZUlVTACNyh9gLAnNRBVYdIS\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/work3.local.com:85\\/admin\\/auth\\/permissions\"}', '2019-01-26 15:49:48', '2019-01-26 15:49:48');
INSERT INTO `admin_operation_log` VALUES (67, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2019-01-26 15:49:48', '2019-01-26 15:49:48');
INSERT INTO `admin_operation_log` VALUES (68, 1, 'admin/auth/permissions/2', 'DELETE', '127.0.0.1', '{\"_method\":\"delete\",\"_token\":\"m1gHnmHLKHZKV83cKZUlVTACNyh9gLAnNRBVYdIS\"}', '2019-01-26 15:49:53', '2019-01-26 15:49:53');
INSERT INTO `admin_operation_log` VALUES (69, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:49:54', '2019-01-26 15:49:54');
INSERT INTO `admin_operation_log` VALUES (70, 1, 'admin/auth/permissions/4', 'DELETE', '127.0.0.1', '{\"_method\":\"delete\",\"_token\":\"m1gHnmHLKHZKV83cKZUlVTACNyh9gLAnNRBVYdIS\"}', '2019-01-26 15:49:58', '2019-01-26 15:49:58');
INSERT INTO `admin_operation_log` VALUES (71, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:49:58', '2019-01-26 15:49:58');
INSERT INTO `admin_operation_log` VALUES (72, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:50:10', '2019-01-26 15:50:10');
INSERT INTO `admin_operation_log` VALUES (73, 1, 'admin/auth/roles/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:50:14', '2019-01-26 15:50:14');
INSERT INTO `admin_operation_log` VALUES (74, 1, 'admin/auth/roles/1', 'PUT', '127.0.0.1', '{\"slug\":\"superadmin\",\"name\":\"superadmin\",\"permissions\":[\"1\",null],\"_token\":\"m1gHnmHLKHZKV83cKZUlVTACNyh9gLAnNRBVYdIS\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/work3.local.com:85\\/admin\\/auth\\/roles\"}', '2019-01-26 15:50:36', '2019-01-26 15:50:36');
INSERT INTO `admin_operation_log` VALUES (75, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2019-01-26 15:50:37', '2019-01-26 15:50:37');
INSERT INTO `admin_operation_log` VALUES (76, 1, 'admin/auth/roles/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:50:50', '2019-01-26 15:50:50');
INSERT INTO `admin_operation_log` VALUES (77, 1, 'admin/auth/roles/1', 'PUT', '127.0.0.1', '{\"slug\":\"superadmin\",\"name\":\"\\u6700\\u9ad8\\u6743\\u9650\",\"permissions\":[\"1\",null],\"_token\":\"m1gHnmHLKHZKV83cKZUlVTACNyh9gLAnNRBVYdIS\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/work3.local.com:85\\/admin\\/auth\\/roles\"}', '2019-01-26 15:51:00', '2019-01-26 15:51:00');
INSERT INTO `admin_operation_log` VALUES (78, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2019-01-26 15:51:00', '2019-01-26 15:51:00');
INSERT INTO `admin_operation_log` VALUES (79, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:51:06', '2019-01-26 15:51:06');
INSERT INTO `admin_operation_log` VALUES (80, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:51:08', '2019-01-26 15:51:08');
INSERT INTO `admin_operation_log` VALUES (81, 1, 'admin/auth/permissions/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:51:10', '2019-01-26 15:51:10');
INSERT INTO `admin_operation_log` VALUES (82, 1, 'admin/auth/permissions/1', 'PUT', '127.0.0.1', '{\"slug\":\"superAdmin\",\"name\":\"\\u6700\\u9ad8\\u6743\\u9650\",\"http_method\":[null],\"http_path\":\"*\",\"_token\":\"m1gHnmHLKHZKV83cKZUlVTACNyh9gLAnNRBVYdIS\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/work3.local.com:85\\/admin\\/auth\\/permissions\"}', '2019-01-26 15:51:18', '2019-01-26 15:51:18');
INSERT INTO `admin_operation_log` VALUES (83, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2019-01-26 15:51:18', '2019-01-26 15:51:18');
INSERT INTO `admin_operation_log` VALUES (84, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:51:28', '2019-01-26 15:51:28');
INSERT INTO `admin_operation_log` VALUES (85, 1, 'admin/auth/setting', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:51:34', '2019-01-26 15:51:34');
INSERT INTO `admin_operation_log` VALUES (86, 1, 'admin/auth/logout', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-01-26 15:51:41', '2019-01-26 15:51:41');

-- ----------------------------
-- Table structure for admin_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE `admin_permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `http_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_permissions_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_permissions
-- ----------------------------
INSERT INTO `admin_permissions` VALUES (1, '最高权限', 'superAdmin', '', '*', NULL, '2019-01-26 15:51:18');
INSERT INTO `admin_permissions` VALUES (3, '账户中心', '账户中心', '', '/auth/login\r\n/auth/logout\r\n/auth/setting\r\n/', NULL, '2019-01-26 15:49:09');
INSERT INTO `admin_permissions` VALUES (5, '系统管理', '系统管理', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, '2019-01-26 15:48:01');

-- ----------------------------
-- Table structure for admin_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_menu`;
CREATE TABLE `admin_role_menu`  (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `admin_role_menu_role_id_menu_id_index`(`role_id`, `menu_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_role_menu
-- ----------------------------
INSERT INTO `admin_role_menu` VALUES (1, 2, NULL, NULL);

-- ----------------------------
-- Table structure for admin_role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_permissions`;
CREATE TABLE `admin_role_permissions`  (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `admin_role_permissions_role_id_permission_id_index`(`role_id`, `permission_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_role_permissions
-- ----------------------------
INSERT INTO `admin_role_permissions` VALUES (1, 1, NULL, NULL);

-- ----------------------------
-- Table structure for admin_role_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users`  (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `admin_role_users_role_id_user_id_index`(`role_id`, `user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_role_users
-- ----------------------------
INSERT INTO `admin_role_users` VALUES (1, 1, NULL, NULL);

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_roles_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_roles
-- ----------------------------
INSERT INTO `admin_roles` VALUES (1, '最高权限', 'superadmin', '2019-01-26 11:29:28', '2019-01-26 15:51:00');

-- ----------------------------
-- Table structure for admin_user_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_permissions`;
CREATE TABLE `admin_user_permissions`  (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `admin_user_permissions_user_id_permission_id_index`(`user_id`, `permission_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_users_username_unique`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES (1, 'admin', '$2y$10$ozNcHgYMnaecu.LIDj7lrOX8cBo/YajTmAU7d4UkB5QIpvQwh0/Pm', 'Administrator', NULL, 'rfKdCv4f6QLdyu3EXaFwBRwQVavDfaQAwOSmO9ZvGlW0oESAjRpgqeY5hDHH', '2019-01-26 11:29:28', '2019-01-26 11:29:28');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2016_01_04_173148_create_admin_tables', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;

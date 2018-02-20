/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100128
 Source Host           : localhost:3306
 Source Schema         : cuahang

 Target Server Type    : MySQL
 Target Server Version : 100128
 File Encoding         : 65001

 Date: 23/01/2018 00:17:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for danh_muc
-- ----------------------------
DROP TABLE IF EXISTS `danh_muc`;
CREATE TABLE `danh_muc`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_dm` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_id` int(11) NULL DEFAULT NULL,
  `date_created` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `update_id` int(11) NULL DEFAULT NULL,
  `date_update` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of danh_muc
-- ----------------------------
INSERT INTO `danh_muc` VALUES (1, 'Trà đá', 1, '2018-01-22 23:41:45', NULL, '2018-01-22 23:41:45');
INSERT INTO `danh_muc` VALUES (2, 'Trà sữa', 1, '2018-01-22 23:41:45', NULL, '2018-01-22 23:41:45');
INSERT INTO `danh_muc` VALUES (3, 'Chè', 1, '2018-01-22 23:41:45', NULL, '2018-01-22 23:41:45');

-- ----------------------------
-- Table structure for san_pham
-- ----------------------------
DROP TABLE IF EXISTS `san_pham`;
CREATE TABLE `san_pham`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ten_sp` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `id_dm` int(11) NULL DEFAULT NULL,
  `created_id` int(11) NULL DEFAULT NULL,
  `date_created` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `update_id` int(11) NULL DEFAULT NULL,
  `date_update` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of san_pham
-- ----------------------------
INSERT INTO `san_pham` VALUES (1, 'trà chanh', 5000, 1, 1, '2018-01-22 23:51:32', NULL, '2018-01-22 23:51:32');
INSERT INTO `san_pham` VALUES (2, 'trà xanh', 3000, 1, 1, '2018-01-22 23:51:32', NULL, '2018-01-22 23:51:32');
INSERT INTO `san_pham` VALUES (3, 'nhân trần', 3000, 1, 1, '2018-01-22 23:51:32', NULL, '2018-01-22 23:51:32');
INSERT INTO `san_pham` VALUES (4, 'trà sữa việt quất', 50000, 2, 1, '2018-01-22 23:51:32', NULL, '2018-01-22 23:51:32');
INSERT INTO `san_pham` VALUES (5, 'trà sữa kem đánh răng', 40000, 2, 1, '2018-01-22 23:51:32', NULL, '2018-01-22 23:51:32');
INSERT INTO `san_pham` VALUES (6, 'trà sữa trân châu', 30000, 2, 1, '2018-01-22 23:51:32', NULL, '2018-01-22 23:51:32');
INSERT INTO `san_pham` VALUES (7, 'chè thập cẩm', 10000, 3, 1, '2018-01-22 23:51:32', NULL, '2018-01-22 23:51:32');
INSERT INTO `san_pham` VALUES (8, 'chè ngô', 15000, 3, 1, '2018-01-22 23:51:32', NULL, '2018-01-22 23:51:32');
INSERT INTO `san_pham` VALUES (9, 'chè bưởi', 15000, 3, 1, '2018-01-22 23:51:32', NULL, '2018-01-22 23:51:32');

-- ----------------------------
-- Table structure for tai_khoan
-- ----------------------------
DROP TABLE IF EXISTS `tai_khoan`;
CREATE TABLE `tai_khoan`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dia_chi` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `wallet` int(11) NULL DEFAULT 0,
  `time_join` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tai_khoan
-- ----------------------------
INSERT INTO `tai_khoan` VALUES (1, 'Nguyễn Anh Văn', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'kiều mai', 10000000, '2018-01-23 00:04:02');
INSERT INTO `tai_khoan` VALUES (2, 'Nguyễn Bách Dương', 'bachduong', '3e48f1ce9f015cc59bd7bf0605681f28', 'kiều mai', 10000000, '2018-01-23 00:04:02');
INSERT INTO `tai_khoan` VALUES (3, 'Hoàng Văn Minh', 'minh', 'e10adc3949ba59abbe56e057f20f883e', 'kiều mai', 10000000, '2018-01-23 00:04:02');
INSERT INTO `tai_khoan` VALUES (4, 'Trịnh Minh Tâm', 'tam', 'cb181079c5477e7ebe9b23d171bd202e', 'kiều mai', 10000000, '2018-01-23 00:04:02');

SET FOREIGN_KEY_CHECKS = 1;

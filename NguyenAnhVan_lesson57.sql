/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100128
 Source Host           : localhost:3306
 Source Schema         : shop_bost

 Target Server Type    : MySQL
 Target Server Version : 100128
 File Encoding         : 65001

 Date: 03/02/2018 09:11:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_create` int(11) NULL DEFAULT NULL,
  `time_create` datetime(0) NULL DEFAULT NULL,
  `user_update` int(11) NULL DEFAULT NULL,
  `time_update` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_create`(`user_create`) USING BTREE,
  INDEX `user_update`(`user_update`) USING BTREE,
  CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `categories_ibfk_2` FOREIGN KEY (`id`) REFERENCES `images` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `categories_ibfk_3` FOREIGN KEY (`id`) REFERENCES `sale` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `product_id` int(11) NULL DEFAULT NULL,
  `post_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `name`) USING BTREE,
  INDEX `name`(`name`) USING BTREE,
  INDEX `product_id`(`product_id`) USING BTREE,
  INDEX `post_id`(`post_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images`  (
  `id` int(11) NOT NULL,
  `images_link` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `product_id` int(11) NULL DEFAULT NULL,
  `category_id` int(11) NULL DEFAULT NULL,
  `post_id` int(11) NULL DEFAULT NULL,
  INDEX `product_id`(`product_id`) USING BTREE,
  INDEX `category_id`(`category_id`) USING BTREE,
  INDEX `post_id`(`post_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for order_detail
-- ----------------------------
DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail`  (
  `id` int(11) NOT NULL,
  `order_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `product_id` int(11) NULL DEFAULT NULL,
  `quantity` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `order_code`(`order_code`) USING BTREE,
  INDEX `product_id`(`product_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(11) NOT NULL,
  `order_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `info_id` int(11) NULL DEFAULT NULL,
  `total_money` decimal(10, 0) NULL DEFAULT NULL,
  `pay_method` int(11) NULL DEFAULT NULL,
  `time_order` datetime(0) NULL DEFAULT NULL,
  `require_date` datetime(0) NULL DEFAULT NULL,
  `shipped_date` datetime(0) NULL DEFAULT NULL,
  `status` tinyint(3) NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `ship_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `orders_ibfk_1`(`order_code`) USING BTREE,
  INDEX `pay_method`(`pay_method`) USING BTREE,
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_code`) REFERENCES `order_detail` (`order_code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for pay_method
-- ----------------------------
DROP TABLE IF EXISTS `pay_method`;
CREATE TABLE `pay_method`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  CONSTRAINT `pay_method_ibfk_1` FOREIGN KEY (`id`) REFERENCES `orders` (`pay_method`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` int(11) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `user_create` int(11) NULL DEFAULT NULL,
  `time_create` datetime(0) NULL DEFAULT NULL,
  `user_update` int(11) NULL DEFAULT NULL,
  `time_update` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_create`(`user_create`) USING BTREE,
  INDEX `user_update`(`user_update`) USING BTREE,
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id`) REFERENCES `comments` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`id`) REFERENCES `images` (`post_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for product_info
-- ----------------------------
DROP TABLE IF EXISTS `product_info`;
CREATE TABLE `product_info`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `color` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `material` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `origin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `attach` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  CONSTRAINT `product_info_ibfk_1` FOREIGN KEY (`id`) REFERENCES `images` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `supplier_id` int(11) NULL DEFAULT NULL,
  `category_id` int(11) NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT 0.00,
  `stock_unit` int(11) NULL DEFAULT NULL,
  `user_create` int(11) NULL DEFAULT NULL,
  `time_create` datetime(0) NULL DEFAULT NULL,
  `user_update` int(11) NULL DEFAULT NULL,
  `time_update` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `category_id`(`category_id`) USING BTREE,
  INDEX `supplier_id`(`supplier_id`) USING BTREE,
  INDEX `user_create`(`user_create`) USING BTREE,
  INDEX `user_update`(`user_update`) USING BTREE,
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id`) REFERENCES `product_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id`) REFERENCES `order_detail` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_ibfk_3` FOREIGN KEY (`id`) REFERENCES `comments` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_ibfk_4` FOREIGN KEY (`id`) REFERENCES `sale` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sale
-- ----------------------------
DROP TABLE IF EXISTS `sale`;
CREATE TABLE `sale`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `minus` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `product_id` int(11) NULL DEFAULT NULL,
  `category_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `category_id`(`category_id`) USING BTREE,
  INDEX `product_id`(`product_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for suppliers
-- ----------------------------
DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `contact_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `region` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  CONSTRAINT `suppliers_ibfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NULL DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `contact_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `region` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_update` int(255) NULL DEFAULT NULL,
  `time_update` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  INDEX `user_update`(`user_update`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(2) NULL DEFAULT 0,
  `join_time` datetime(0) NULL DEFAULT NULL,
  `balance` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `name`(`name`(255)) USING BTREE,
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_info` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_10` FOREIGN KEY (`id`) REFERENCES `user_info` (`user_update`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id`) REFERENCES `orders` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_3` FOREIGN KEY (`id`) REFERENCES `products` (`user_create`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_4` FOREIGN KEY (`id`) REFERENCES `products` (`user_update`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_5` FOREIGN KEY (`id`) REFERENCES `categories` (`user_create`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_6` FOREIGN KEY (`id`) REFERENCES `categories` (`user_update`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_7` FOREIGN KEY (`id`) REFERENCES `posts` (`user_create`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_8` FOREIGN KEY (`id`) REFERENCES `posts` (`user_update`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_9` FOREIGN KEY (`id`) REFERENCES `comments` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;

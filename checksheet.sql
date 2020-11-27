/*
 Navicat MySQL Data Transfer

 Source Server         : liuling
 Source Server Type    : MySQL
 Source Server Version : 80021
 Source Host           : localhost:3306
 Source Schema         : assets

 Target Server Type    : MySQL
 Target Server Version : 80021
 File Encoding         : 65001

 Date: 27/11/2020 10:54:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for checksheet
-- ----------------------------
DROP TABLE IF EXISTS `checksheet`;
CREATE TABLE `checksheet`  (
  `assetsId` int(0) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `goods` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `assetsNum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `qrcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `inventoryDate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`assetsId`) USING BTREE,
  UNIQUE INDEX `code`(`code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of checksheet
-- ----------------------------
INSERT INTO `checksheet` VALUES (1, 'ZSB0001', '办公电脑', '刘玲', '交付-后勤', '1', '台', '/images/1.png', '2020/11/27');
INSERT INTO `checksheet` VALUES (2, 'ZSB0002', '排插', '刘玲', '交付-后勤', '1', '个', '/images/2.png', '2020/11/27');
INSERT INTO `checksheet` VALUES (3, 'ZSB0003', '路由器', '刘玲', '交付-后勤', '1', '个', '/images/1.png', '2020/11/27');
INSERT INTO `checksheet` VALUES (6, '222', '333', 'jjjj', '11', '1', '1', NULL, '2020-11-26');
INSERT INTO `checksheet` VALUES (10, '1', '1', '1', '产品技术中心', '9', 'ii', NULL, '2020-11-27');

SET FOREIGN_KEY_CHECKS = 1;

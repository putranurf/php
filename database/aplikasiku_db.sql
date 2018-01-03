/*
Navicat MySQL Data Transfer

Source Server         : REACT NATIVE
Source Server Version : 50720
Source Host           : localhost:3306
Source Database       : aplikasiku_db

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2018-01-03 22:40:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tabel_biodata
-- ----------------------------
DROP TABLE IF EXISTS `tabel_biodata`;
CREATE TABLE `tabel_biodata` (
  `no_ktp` varchar(16) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`no_ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tabel_biodata
-- ----------------------------
INSERT INTO `tabel_biodata` VALUES ('3273280112930003', 'Putra Hidayat', '1993-01-12', 'Garut Kota');

-- ----------------------------
-- Table structure for tabel_user
-- ----------------------------
DROP TABLE IF EXISTS `tabel_user`;
CREATE TABLE `tabel_user` (
  `uname` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tabel_user
-- ----------------------------
INSERT INTO `tabel_user` VALUES ('02274', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `tabel_user` VALUES ('putra', 'e10adc3949ba59abbe56e057f20f883e');
SET FOREIGN_KEY_CHECKS=1;

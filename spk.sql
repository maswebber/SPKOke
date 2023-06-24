/*
 Navicat Premium Data Transfer

 Source Server         : LocalDB
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : spk

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 24/06/2023 14:51:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for alters
-- ----------------------------
DROP TABLE IF EXISTS `alters`;
CREATE TABLE `alters`  (
  `idalter` int NOT NULL AUTO_INCREMENT,
  `ket` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_tahun` bigint NULL DEFAULT NULL,
  `status` int NULL DEFAULT NULL,
  PRIMARY KEY (`idalter`) USING BTREE,
  INDEX `id_tahun`(`id_tahun`) USING BTREE,
  CONSTRAINT `alters_ibfk_1` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id_tahun`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of alters
-- ----------------------------
INSERT INTO `alters` VALUES (1, 'Jembatan', 2, 1);
INSERT INTO `alters` VALUES (2, 'Gedung Serbaguna', 2, 1);
INSERT INTO `alters` VALUES (3, 'Taman Desa Sehat', 2, 1);
INSERT INTO `alters` VALUES (4, 'Trotoar', 2, 1);
INSERT INTO `alters` VALUES (7, 'Rumah Rakyat', 2, 1);

-- ----------------------------
-- Table structure for ci_sessions
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions`  (
  `id` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `timestamp` int UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  INDEX `ci_sessions_timestamp`(`timestamp`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('ipnkfmnmhvc37a934au87f1am5v5bm30', '127.0.0.1', 1578642561, 0x5F5F63695F6C6173745F726567656E65726174657C693A313537383634323535383B757365727C733A353A2261646D696E223B726F6C657C733A353A2241444D494E223B69647C733A313A2231223B);
INSERT INTO `ci_sessions` VALUES ('j06bc84i96aedkfhpq62p6vmim2ueje1', '127.0.0.1', 1578641107, 0x5F5F63695F6C6173745F726567656E65726174657C693A313537383634313130373B757365727C733A383A226F70657261746F72223B726F6C657C733A383A224F50455241544F52223B69647C733A323A223132223B);
INSERT INTO `ci_sessions` VALUES ('lbh5cj1p3eb2e4jhjgfgokkapk4k7evg', '127.0.0.1', 1578817908, 0x5F5F63695F6C6173745F726567656E65726174657C693A313537383831373633323B757365727C733A353A2261646D696E223B726F6C657C733A353A2241444D494E223B69647C733A313A2231223B);
INSERT INTO `ci_sessions` VALUES ('nft0i8f90iagookr3iqhh0n435bhj80d', '127.0.0.1', 1578893309, 0x5F5F63695F6C6173745F726567656E65726174657C693A313537383839333330373B757365727C733A353A2261646D696E223B726F6C657C733A353A2241444D494E223B69647C733A313A2231223B);
INSERT INTO `ci_sessions` VALUES ('f5s7t8op4lt36hdlvof7l2dvij0jlvfe', '127.0.0.1', 1578926879, 0x5F5F63695F6C6173745F726567656E65726174657C693A313537383932363837363B757365727C733A383A226F70657261746F72223B726F6C657C733A383A224F50455241544F52223B69647C733A323A223132223B666F746F7C733A35323A2268747470733A2F2F73706B2D646573616F6B2E746573742F6173736574732F696D616765732F696E636F7272656374332E706E67223B);
INSERT INTO `ci_sessions` VALUES ('8942ff568b8f3a528bee51b8da24b150bf75e7b7', '114.125.81.124', 1578927919, 0x5F5F63695F6C6173745F726567656E65726174657C693A313537383932373636373B);
INSERT INTO `ci_sessions` VALUES ('34c18b87c2da12997ef19306896961f6fc607b6f', '114.125.81.124', 1578927929, 0x5F5F63695F6C6173745F726567656E65726174657C693A313537383932373932393B);
INSERT INTO `ci_sessions` VALUES ('2367007171e84b39e56875df8612ad13d57abbca', '114.125.81.124', 1578927949, 0x5F5F63695F6C6173745F726567656E65726174657C693A313537383932373934393B);
INSERT INTO `ci_sessions` VALUES ('180d89cb93b9b1fe59c8dc6430cba824c899b4e2', '182.1.76.90', 1578928682, 0x5F5F63695F6C6173745F726567656E65726174657C693A313537383932383638323B);
INSERT INTO `ci_sessions` VALUES ('62bcd2d92f744f2497aead524eedb9da6dd9ec7c', '179.43.169.182', 1578928005, 0x5F5F63695F6C6173745F726567656E65726174657C693A313537383932383030353B);
INSERT INTO `ci_sessions` VALUES ('f41b6dc43bd1ac1bec8fd7acc811b6bbde32fdf9', '64.41.200.104', 1578928099, 0x5F5F63695F6C6173745F726567656E65726174657C693A313537383932383039393B);
INSERT INTO `ci_sessions` VALUES ('ac824551b0b536231d113426fcc50023b2fb7b08', '209.17.96.66', 1578984727, 0x5F5F63695F6C6173745F726567656E65726174657C693A313537383938343732373B);
INSERT INTO `ci_sessions` VALUES ('6652315dc2215c2fdd28e21e22fe8ed490465a2c', '114.142.169.5', 1579002604, 0x5F5F63695F6C6173745F726567656E65726174657C693A313537393030323630343B);
INSERT INTO `ci_sessions` VALUES ('uld8t9ggkv35211e7eooa5oh944qk4p8', '127.0.0.1', 1687591015, 0x5F5F63695F6C6173745F726567656E65726174657C693A313638373539303934333B);
INSERT INTO `ci_sessions` VALUES ('ko5ksknn6clda52nfssursvd2ninsc4f', '127.0.0.1', 1687592967, 0x5F5F63695F6C6173745F726567656E65726174657C693A313638373539323839313B757365727C733A353A2261646D696E223B726F6C657C733A353A2241444D494E223B69647C733A313A2231223B666F746F7C733A31313A22636F72726563742E706E67223B);

-- ----------------------------
-- Table structure for format_setting
-- ----------------------------
DROP TABLE IF EXISTS `format_setting`;
CREATE TABLE `format_setting`  (
  `head` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `body` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `foot` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of format_setting
-- ----------------------------
INSERT INTO `format_setting` VALUES ('<p><br></p><table class=\"table borderless\" style=\"\"><tbody><tr><td><p style=\"text-align: center; \"><br><img src=\"/assets/images/correct.png\" style=\"width: 150px;\"></p></td><td><table width=\"100%\" style=\"background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); text-align: center;\"><tbody><tr><td width=\"70%\"><h4><span arial=\"\" black\";\"=\"\" style=\"font-family: \"><span style=\"font-weight: 700;\">PEMERINTAH KABUPATEN BANYUMAS</span></span></h4></td></tr><tr><td><h4><span arial=\"\" black\";\"=\"\" style=\"font-family: \"><span style=\"font-weight: 700;\">KECAMATAN KARANG TURI</span></span></h4></td></tr><tr><td><h4><span arial=\"\" black\";\"=\"\" style=\"font-family: \"><span style=\"font-weight: 700;\">ALAMAT KECAMATAN KARANG TURI</span></span></h4></td></tr><tr><td><p><span arial=\"\" black\";\"=\"\" style=\"font-family: \"><span style=\"font-weight: 700;\">Alamat : Jl. Karangturi no 1</span></span></p></td></tr></tbody></table></td></tr></tbody></table>', '<p>Bisa berisi nomor dan keterangan yang dibutuhkan</p>', '<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">Banyumas, <u>                                                   </u></div>\r\n<table class=\"table borderless\">\r\n    <tbody>\r\n        <tr>\r\n            <td style=\"text-align: center; \">\r\n                <p>Mengetahui,</p>\r\n                <p><span style=\"background-color: transparent;\">Sekdes Karangturi</span></p>\r\n                <p><br></p>\r\n                <p>TTD</p>\r\n                <p><br></p>\r\n                <p>Nama</p>\r\n            </td>\r\n            <td style=\"text-align: center; \">\r\n                <p><span style=\"color: rgb(51, 51, 51); background-color: transparent;\">Kaur Perencanaan,</span><br></p>\r\n                <p><span style=\"color: rgb(51, 51, 51);\">Karangturi</span></p>\r\n                <p><br></p>\r\n                <p>TTD</p>\r\n                <p><br></p>\r\n                <p>Nama</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<table class=\"table borderless\">\r\n    <tbody>\r\n        <tr>\r\n            <td style=\"text-align: center; \">\r\n                <p><span style=\"color: rgb(51, 51, 51);\">Meyetujui,</span></p>\r\n                <p><span style=\"color: rgb(51, 51, 51);\">Kepala Desa Karangturi</span></p>\r\n                <p><br></p>\r\n                <p>TTD</p>\r\n                <p><span style=\"color: rgb(51, 51, 51);\"><br></span><span style=\"color: rgb(51, 51, 51);\"><br></span>Nama</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>');

-- ----------------------------
-- Table structure for history
-- ----------------------------
DROP TABLE IF EXISTS `history`;
CREATE TABLE `history`  (
  `id_history` int NOT NULL AUTO_INCREMENT,
  `menu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `aksi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_aksi` datetime NULL DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_history`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of history
-- ----------------------------
INSERT INTO `history` VALUES (2, 'setting', 'update Format Laporan', '0000-00-00 00:00:00', 'admin');
INSERT INTO `history` VALUES (3, 'setting', 'update Format Laporan', '2020-01-10 06:24:44', 'admin');
INSERT INTO `history` VALUES (4, 'setting', 'update Format Laporan', '2020-01-10 06:25:05', 'admin');
INSERT INTO `history` VALUES (5, 'Data Kriteria', 'Tambah Kriteria', '2020-01-10 06:43:40', 'admin');
INSERT INTO `history` VALUES (6, 'Data Kriteria', 'Hapus Kriteria', '2020-01-10 06:43:46', 'admin');
INSERT INTO `history` VALUES (7, 'Data Kriteria', 'Tambah Kriteria', '2020-01-10 06:50:03', 'admin');
INSERT INTO `history` VALUES (8, 'Data Kriteria', 'Hapus Kriteria', '2020-01-10 06:50:19', 'admin');
INSERT INTO `history` VALUES (9, 'Data tahun', 'Tambah tahun ID:9', '2020-01-10 07:33:45', 'admin');
INSERT INTO `history` VALUES (10, 'Data tahun', 'Hapus tahun ID:9', '2020-01-10 07:34:03', 'admin');
INSERT INTO `history` VALUES (11, 'Pengaturan Sistem', 'Ubah Format Laporan', '2020-01-12 07:09:03', 'admin');
INSERT INTO `history` VALUES (12, 'Data setting', 'Ubah setting ID:', '2020-01-12 07:15:27', 'admin');
INSERT INTO `history` VALUES (13, 'Data setting', 'Ubah setting ID:', '2020-01-12 07:32:53', 'admin');
INSERT INTO `history` VALUES (14, 'Data setting', 'Tambah setting ID:0', '2020-01-12 07:35:51', 'admin');
INSERT INTO `history` VALUES (15, 'Data setting', 'Ubah setting ID:', '2020-01-12 07:36:12', 'admin');
INSERT INTO `history` VALUES (16, 'Data format_setting', 'Ubah format_setting ID:', '2020-01-12 07:38:43', 'admin');
INSERT INTO `history` VALUES (17, 'Data setting', 'Ubah setting ID:', '2020-01-12 07:57:34', 'admin');
INSERT INTO `history` VALUES (18, 'Data setting', 'Ubah setting ID:', '2020-01-12 08:14:49', 'admin');
INSERT INTO `history` VALUES (19, 'Data setting', 'Ubah setting ID:', '2020-01-12 08:15:43', 'admin');
INSERT INTO `history` VALUES (20, 'Data setting', 'Ubah setting ID:', '2020-01-12 08:19:03', 'admin');
INSERT INTO `history` VALUES (21, 'Data setting', 'Ubah setting ID:', '2020-01-12 08:19:34', 'admin');
INSERT INTO `history` VALUES (22, 'Data format_setting', 'Ubah format_setting ID:', '2020-01-13 03:09:40', 'admin');
INSERT INTO `history` VALUES (23, 'Data format_setting', 'Ubah format_setting ID:', '2020-01-13 03:10:12', 'admin');
INSERT INTO `history` VALUES (24, 'Data memgota', 'Ubah memgota ID:Array', '2020-01-13 12:30:21', 'admin');
INSERT INTO `history` VALUES (25, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 12:31:33', 'admin');
INSERT INTO `history` VALUES (26, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 12:31:54', 'admin');
INSERT INTO `history` VALUES (27, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 12:35:33', 'admin');
INSERT INTO `history` VALUES (28, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 12:35:39', 'admin');
INSERT INTO `history` VALUES (29, 'Data memgota', '{\"id_ngota\":\"12\",\"pwo\":\"ff852edd2d33b0495d74118a4e8c57e6\"}', '2020-01-13 12:43:08', 'admin');
INSERT INTO `history` VALUES (30, 'Data memgota', 'Tambah memgota ID:13', '2020-01-13 12:45:50', 'admin');
INSERT INTO `history` VALUES (31, 'Data memgota', 'Hapus memgota ID:13', '2020-01-13 12:46:01', 'admin');
INSERT INTO `history` VALUES (32, 'Data memgota', 'Tambah memgota ID:14', '2020-01-13 13:29:16', 'admin');
INSERT INTO `history` VALUES (33, 'Data memgota', '{\"id_ngota\":\"14\"}', '2020-01-13 13:40:10', 'admin');
INSERT INTO `history` VALUES (34, 'Data memgota', '{\"id_ngota\":\"14\"}', '2020-01-13 13:40:28', 'admin');
INSERT INTO `history` VALUES (35, 'Data memgota', '{\"id_ngota\":\"1\"}', '2020-01-13 13:48:44', 'admin');
INSERT INTO `history` VALUES (36, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 13:49:03', 'admin');
INSERT INTO `history` VALUES (37, 'Data memgota', '{\"id_ngota\":\"14\"}', '2020-01-13 13:49:57', 'admin');
INSERT INTO `history` VALUES (38, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 14:45:47', 'operator');
INSERT INTO `history` VALUES (39, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 14:47:14', 'operator');
INSERT INTO `history` VALUES (40, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 14:47:55', 'operator');
INSERT INTO `history` VALUES (41, 'Data format_setting', 'null', '2020-01-13 15:16:09', 'admin');
INSERT INTO `history` VALUES (42, 'Data setting', 'null', '2020-01-13 15:16:31', 'admin');
INSERT INTO `history` VALUES (43, 'Data memgota', '{\"id_ngota\":\"14\"}', '2020-01-13 15:16:57', 'admin');
INSERT INTO `history` VALUES (44, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 15:17:10', 'admin');
INSERT INTO `history` VALUES (45, 'Data memgota', '{\"id_ngota\":\"1\"}', '2020-01-13 15:17:27', 'admin');
INSERT INTO `history` VALUES (46, 'Data setting', 'null', '2023-06-24 07:43:44', 'admin');
INSERT INTO `history` VALUES (47, 'Data setting', 'null', '2023-06-24 07:48:28', 'admin');

-- ----------------------------
-- Table structure for kriteria
-- ----------------------------
DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria`  (
  `idkri` int NOT NULL AUTO_INCREMENT,
  `ketkri` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bobot` float NOT NULL,
  `atribut` set('benefit','cost') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`idkri`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kriteria
-- ----------------------------
INSERT INTO `kriteria` VALUES (1, 'Daya Guna', 5, 'benefit', 'asp', 1);
INSERT INTO `kriteria` VALUES (2, 'Kondisi', 5, 'benefit', 'pkr', 1);
INSERT INTO `kriteria` VALUES (3, 'Budget', 3, 'cost', 'ips', 1);
INSERT INTO `kriteria` VALUES (4, 'Daya Tahan', 3, 'benefit', 'year', 1);
INSERT INTO `kriteria` VALUES (5, 'Waktu Pelaksanaan', 3, 'cost', 'stat', 1);

-- ----------------------------
-- Table structure for memgota
-- ----------------------------
DROP TABLE IF EXISTS `memgota`;
CREATE TABLE `memgota`  (
  `id_ngota` int NOT NULL AUTO_INCREMENT,
  `usn` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pwo` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` set('ADMIN','OPERATOR','PIMPINAN') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `status` int NULL DEFAULT NULL,
  `foto` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_ngota`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of memgota
-- ----------------------------
INSERT INTO `memgota` VALUES (1, 'admin', '1a382c7339f0ac81773311f264ba2610', 'ADMIN', 1, 'correct.png');
INSERT INTO `memgota` VALUES (12, 'operator', 'ff852edd2d33b0495d74118a4e8c57e6', 'OPERATOR', 1, 'correct.png');
INSERT INTO `memgota` VALUES (14, 'test01', '7bff5a560f5bad99fe62c421a57da08a', 'OPERATOR', 1, 'correct.png');

-- ----------------------------
-- Table structure for nilai_alter
-- ----------------------------
DROP TABLE IF EXISTS `nilai_alter`;
CREATE TABLE `nilai_alter`  (
  `idnilai` int NOT NULL AUTO_INCREMENT,
  `idalter` int NOT NULL,
  `idkri` int NOT NULL,
  `nilai` float NOT NULL,
  PRIMARY KEY (`idnilai`) USING BTREE,
  INDEX `idalter`(`idalter`) USING BTREE,
  INDEX `idkri`(`idkri`) USING BTREE,
  CONSTRAINT `nilai_alter_ibfk_1` FOREIGN KEY (`idalter`) REFERENCES `alters` (`idalter`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `nilai_alter_ibfk_2` FOREIGN KEY (`idkri`) REFERENCES `kriteria` (`idkri`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nilai_alter
-- ----------------------------
INSERT INTO `nilai_alter` VALUES (1, 1, 1, 5);
INSERT INTO `nilai_alter` VALUES (2, 1, 2, 10);
INSERT INTO `nilai_alter` VALUES (3, 1, 3, 5);
INSERT INTO `nilai_alter` VALUES (4, 1, 4, 5);
INSERT INTO `nilai_alter` VALUES (5, 1, 5, 4);
INSERT INTO `nilai_alter` VALUES (6, 2, 1, 7);
INSERT INTO `nilai_alter` VALUES (7, 2, 2, 6);
INSERT INTO `nilai_alter` VALUES (9, 2, 3, 5);
INSERT INTO `nilai_alter` VALUES (10, 2, 4, 7);
INSERT INTO `nilai_alter` VALUES (11, 2, 5, 5);
INSERT INTO `nilai_alter` VALUES (12, 3, 1, 5);
INSERT INTO `nilai_alter` VALUES (13, 3, 2, 4);
INSERT INTO `nilai_alter` VALUES (14, 3, 3, 3);
INSERT INTO `nilai_alter` VALUES (15, 3, 4, 6);
INSERT INTO `nilai_alter` VALUES (16, 3, 5, 3);
INSERT INTO `nilai_alter` VALUES (17, 4, 1, 7);
INSERT INTO `nilai_alter` VALUES (18, 4, 2, 8);
INSERT INTO `nilai_alter` VALUES (19, 4, 3, 6);
INSERT INTO `nilai_alter` VALUES (20, 4, 4, 7);
INSERT INTO `nilai_alter` VALUES (21, 4, 5, 8);
INSERT INTO `nilai_alter` VALUES (27, 7, 1, 10);
INSERT INTO `nilai_alter` VALUES (28, 7, 2, 6);
INSERT INTO `nilai_alter` VALUES (29, 7, 3, 1);
INSERT INTO `nilai_alter` VALUES (30, 7, 4, 10);
INSERT INTO `nilai_alter` VALUES (31, 7, 5, 1);

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `logo` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `nama` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `kota` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('correct.png', 'SPK Oke', 'Banyumas');

-- ----------------------------
-- Table structure for stud
-- ----------------------------
DROP TABLE IF EXISTS `stud`;
CREATE TABLE `stud`  (
  `roll_no` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`roll_no`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stud
-- ----------------------------
INSERT INTO `stud` VALUES (1, 'admin');
INSERT INTO `stud` VALUES (2, 'user');

-- ----------------------------
-- Table structure for tahun
-- ----------------------------
DROP TABLE IF EXISTS `tahun`;
CREATE TABLE `tahun`  (
  `id_tahun` bigint NOT NULL AUTO_INCREMENT,
  `tgl_mulai` date NULL DEFAULT NULL,
  `status` int NULL DEFAULT NULL,
  `tgl_selesai` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_tahun`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tahun
-- ----------------------------
INSERT INTO `tahun` VALUES (2, '2008-09-08', 0, '2009-09-10');
INSERT INTO `tahun` VALUES (3, '2018-10-04', 0, '2019-05-18');
INSERT INTO `tahun` VALUES (4, '2019-04-01', 1, '2020-04-01');

SET FOREIGN_KEY_CHECKS = 1;

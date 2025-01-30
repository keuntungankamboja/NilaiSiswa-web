/*
Navicat MySQL Data Transfer

Source Server         : sinline
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : sinline

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-09-30 20:19:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_captcha
-- ----------------------------
DROP TABLE IF EXISTS `tbl_captcha`;
CREATE TABLE `tbl_captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_captcha
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_sessions
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sessions`;
CREATE TABLE `tbl_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_sessions
-- ----------------------------
INSERT INTO `tbl_sessions` VALUES ('a063a37e71c94d80f5ad55774a3ee270', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:29.0) Gecko/20100101 Firefox/29.0', '1402395962', 'a:5:{s:9:\"user_data\";s:0:\"\";s:4:\"user\";s:13:\"Nurul Hidayat\";s:8:\"password\";s:32:\"31958b69d58226ff5020c496db274d7b\";s:7:\"id_user\";s:8:\"10011720\";s:4:\"type\";s:5:\"siswa\";}');
INSERT INTO `tbl_sessions` VALUES ('32709ea7a1a0fc3b423236ee8c16b057', '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36', '1408835777', 'a:7:{s:9:\"user_data\";s:0:\"\";s:9:\"waktusoal\";i:1408787747;s:6:\"soalke\";i:2;s:4:\"user\";s:17:\"A. Zamroni, S.Kom\";s:8:\"password\";s:32:\"c4ca4238a0b923820dcc509a6f75849b\";s:7:\"id_user\";s:1:\"1\";s:4:\"type\";s:4:\"guru\";}');
INSERT INTO `tbl_sessions` VALUES ('eb985a82ac9cfaabbd52193edfc65e8f', '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36', '1409048078', '');
INSERT INTO `tbl_sessions` VALUES ('94473f1e8729a0545ad2038662f84ce9', '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.94 Safari/537.36', '1409353514', 'a:5:{s:9:\"user_data\";s:0:\"\";s:4:\"user\";s:12:\"ACHMAD FAJAR\";s:8:\"password\";s:32:\"c024d58ad478410893cbbe4da74c9f4a\";s:7:\"id_user\";s:4:\"7791\";s:4:\"type\";s:5:\"siswa\";}');
INSERT INTO `tbl_sessions` VALUES ('34a52391be30a6ddafd710dced6d787e', '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.94 Safari/537.36', '1409439268', 'a:5:{s:9:\"user_data\";s:0:\"\";s:4:\"user\";s:17:\"A. Zamroni, S.Kom\";s:8:\"password\";s:32:\"c4ca4238a0b923820dcc509a6f75849b\";s:7:\"id_user\";s:1:\"1\";s:4:\"type\";s:4:\"guru\";}');
INSERT INTO `tbl_sessions` VALUES ('1481c44a4cf75de3432f9ff180cb8261', '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.102 Safari/537.36', '1409737750', 'a:5:{s:9:\"user_data\";s:0:\"\";s:4:\"user\";s:12:\"ZAIFUL BAHRI\";s:8:\"password\";s:32:\"c3d96fbd5b1b45096ff04c04038fff5d\";s:7:\"id_user\";s:4:\"8128\";s:4:\"type\";s:5:\"siswa\";}');
INSERT INTO `tbl_sessions` VALUES ('b9c89edd3571dc0e0d68d87b1c64162f', '::1', 'Mozilla/5.0 (Windows NT 6.3; rv:31.0) Gecko/20100101 Firefox/31.0', '1409711637', 'a:5:{s:9:\"user_data\";s:0:\"\";s:4:\"user\";s:12:\"ZAIFUL BAHRI\";s:8:\"password\";s:32:\"c3d96fbd5b1b45096ff04c04038fff5d\";s:7:\"id_user\";s:4:\"8128\";s:4:\"type\";s:5:\"siswa\";}');
INSERT INTO `tbl_sessions` VALUES ('4c765dfdcb4a35737fbaaa7027cd7685', '192.168.1.1', 'Mozilla/5.0 (X11; Linux i686; rv:22.0) Gecko/20100101 Firefox/22.0 Iceweasel/22.0', '1409956852', 'a:5:{s:9:\"user_data\";s:0:\"\";s:4:\"user\";s:12:\"ZAIFUL BAHRI\";s:8:\"password\";s:32:\"c3d96fbd5b1b45096ff04c04038fff5d\";s:7:\"id_user\";s:4:\"8128\";s:4:\"type\";s:5:\"siswa\";}');
INSERT INTO `tbl_sessions` VALUES ('571d47f024527cb1452754cdc2350a15', '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.103 Safari/537.36', '1410002495', '');
INSERT INTO `tbl_sessions` VALUES ('1319392fdf0977bc8c9c26b66435827b', '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.103 Safari/537.36', '1410002496', 'a:1:{s:9:\"user_data\";s:0:\"\";}');
INSERT INTO `tbl_sessions` VALUES ('c7c3f129c90ac8702295ea00e672f300', '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.103 Safari/537.36', '1410180232', 'a:5:{s:9:\"user_data\";s:0:\"\";s:4:\"user\";s:17:\"A. Zamroni, S.Kom\";s:8:\"password\";s:32:\"c4ca4238a0b923820dcc509a6f75849b\";s:7:\"id_user\";s:1:\"1\";s:4:\"type\";s:4:\"guru\";}');
INSERT INTO `tbl_sessions` VALUES ('f6f3ee7ed09149a0a74be1bd03ab119e', '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36', '1410660369', 'a:5:{s:9:\"user_data\";s:0:\"\";s:4:\"user\";s:17:\"A. Zamroni, S.Kom\";s:8:\"password\";s:32:\"c4ca4238a0b923820dcc509a6f75849b\";s:7:\"id_user\";s:1:\"1\";s:4:\"type\";s:4:\"guru\";}');
INSERT INTO `tbl_sessions` VALUES ('16f6c5d46169aca4e8f0097cdcc02814', '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.103 Safari/537.36', '1410752041', 'a:5:{s:9:\"user_data\";s:0:\"\";s:4:\"user\";s:17:\"A. Zamroni, S.Kom\";s:8:\"password\";s:32:\"c4ca4238a0b923820dcc509a6f75849b\";s:7:\"id_user\";s:1:\"1\";s:4:\"type\";s:4:\"guru\";}');
INSERT INTO `tbl_sessions` VALUES ('be3fad38a51d10c240f37670c7088bea', '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36', '1410953390', 'a:5:{s:9:\"user_data\";s:0:\"\";s:4:\"user\";s:17:\"A. Zamroni, S.Kom\";s:8:\"password\";s:32:\"c4ca4238a0b923820dcc509a6f75849b\";s:7:\"id_user\";s:1:\"1\";s:4:\"type\";s:4:\"guru\";}');
INSERT INTO `tbl_sessions` VALUES ('542365444e0a469bc4b5c259c34d4025', '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36', '1411124714', 'a:5:{s:9:\"user_data\";s:0:\"\";s:4:\"user\";s:12:\"ZAIFUL BAHRI\";s:8:\"password\";s:32:\"c3d96fbd5b1b45096ff04c04038fff5d\";s:7:\"id_user\";s:4:\"8128\";s:4:\"type\";s:5:\"siswa\";}');
INSERT INTO `tbl_sessions` VALUES ('b899434e12becf59b85165efd4a34c30', '192.168.1.87', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36', '1411104475', 'a:1:{s:9:\"user_data\";s:0:\"\";}');
INSERT INTO `tbl_sessions` VALUES ('08291fe39fe3e847f76a38731c37e92e', '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36', '1411528497', '');
INSERT INTO `tbl_sessions` VALUES ('ad2054525e641eaf8b5d1c5ddde1eff3', '192.168.1.12', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.18 Safari/537.36', '1412073253', 'a:5:{s:9:\"user_data\";s:0:\"\";s:4:\"user\";s:17:\"A. Zamroni, S.Kom\";s:8:\"password\";s:32:\"c4ca4238a0b923820dcc509a6f75849b\";s:7:\"id_user\";s:1:\"1\";s:4:\"type\";s:4:\"guru\";}');
INSERT INTO `tbl_sessions` VALUES ('1809995e3b480d5a12f28eaa75a1c73d', '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36', '1411867409', 'a:5:{s:9:\"user_data\";s:0:\"\";s:4:\"user\";s:17:\"A. Zamroni, S.Kom\";s:8:\"password\";s:32:\"c4ca4238a0b923820dcc509a6f75849b\";s:7:\"id_user\";s:1:\"1\";s:4:\"type\";s:4:\"guru\";}');
INSERT INTO `tbl_sessions` VALUES ('d9f2545b47014273c0c26caef3edcb1e', '192.168.1.12', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET4.0C; .NET4.0E)', '1412075132', '');

-- ----------------------------
-- Table structure for tb_admin
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `kontak` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20130003 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_admin
-- ----------------------------
INSERT INTO `tb_admin` VALUES ('1992001', 'admin', 'e553e3bfe782811357b7592536d3b4219f11332a', 'crmspy@gmail.com');

-- ----------------------------
-- Table structure for tb_detail_kelas
-- ----------------------------
DROP TABLE IF EXISTS `tb_detail_kelas`;
CREATE TABLE `tb_detail_kelas` (
  `id_kelas` int(11) DEFAULT '0',
  `nis` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_detail_kelas
-- ----------------------------
INSERT INTO `tb_detail_kelas` VALUES ('9', '7791');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7790');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7789');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7811');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7799');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7798');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7810');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7805');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7804');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7803');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7802');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7801');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7794');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7793');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7792');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7797');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7796');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7795');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7800');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7809');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7808');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7807');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7812');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7813');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7814');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7815');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7816');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7817');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7818');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7819');
INSERT INTO `tb_detail_kelas` VALUES ('9', '7820');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8121');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8097');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8098');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8099');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8100');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8101');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8102');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8103');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8104');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8105');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8106');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8107');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8108');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8109');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8110');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8111');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8112');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8113');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8114');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8115');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8116');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8117');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8118');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8119');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8122');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8123');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8124');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8125');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8126');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8127');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8128');
INSERT INTO `tb_detail_kelas` VALUES ('10', '8120');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8033');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8034');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8035');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8036');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8037');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8038');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8039');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8040');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8041');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8042');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8044');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8045');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8046');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8047');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8048');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8049');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8050');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8051');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8052');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8053');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8054');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8055');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8056');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8057');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8058');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8059');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8060');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8061');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8062');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8063');
INSERT INTO `tb_detail_kelas` VALUES ('11', '8064');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8065');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8066');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8067');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8068');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8069');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8070');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8071');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8072');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8073');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8074');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8075');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8076');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8077');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8078');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8079');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8080');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8081');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8082');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8083');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8084');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8085');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8086');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8087');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8088');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8089');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8090');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8091');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8092');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8093');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8094');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8095');
INSERT INTO `tb_detail_kelas` VALUES ('14', '8096');
INSERT INTO `tb_detail_kelas` VALUES ('16', '8097');
INSERT INTO `tb_detail_kelas` VALUES ('16', '8121');
INSERT INTO `tb_detail_kelas` VALUES ('16', '8098');
INSERT INTO `tb_detail_kelas` VALUES ('16', '8099');
INSERT INTO `tb_detail_kelas` VALUES ('16', '8100');
INSERT INTO `tb_detail_kelas` VALUES ('16', '8101');
INSERT INTO `tb_detail_kelas` VALUES ('16', '8102');
INSERT INTO `tb_detail_kelas` VALUES ('16', '8103');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8105');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8104');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8106');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8107');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8108');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8109');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8110');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8111');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8112');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8113');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8114');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8115');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8116');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8117');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8118');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8119');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8122');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8123');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8124');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8125');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8126');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8127');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8128');
INSERT INTO `tb_detail_kelas` VALUES ('17', '8120');

-- ----------------------------
-- Table structure for tb_guru
-- ----------------------------
DROP TABLE IF EXISTS `tb_guru`;
CREATE TABLE `tb_guru` (
  `id_guru` varchar(30) NOT NULL DEFAULT '',
  `nama_guru` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `kontak` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_guru
-- ----------------------------
INSERT INTO `tb_guru` VALUES ('7', 'Sri Utami Hidayati, S.S', '364f666f434c608a404ab8e2165d3dbb13fef744', '');
INSERT INTO `tb_guru` VALUES ('1', 'A. Zamroni, S.Kom', 'e553e3bfe782811357b7592536d3b4219f11332a', '-');
INSERT INTO `tb_guru` VALUES ('3', 'HARIYADI, S.Pd, MM', '87b48a294aa869f84fc8fd38c29f0c93fef256a7', '');
INSERT INTO `tb_guru` VALUES ('4', 'Drs. A. Bukhari, MM', '388ce5db26c80a83e2b562abb1d61805ef5965a0', '');
INSERT INTO `tb_guru` VALUES ('5', 'Didik Hariyanto, S.Kom', '7abd2c81279d0552ed7f67afc498e50d90f71a4f', '');
INSERT INTO `tb_guru` VALUES ('6', 'Drs. Jatmiko', '41195d60bdf88aa3262db214c2421316d890311a', '');

-- ----------------------------
-- Table structure for tb_hasil_ujian
-- ----------------------------
DROP TABLE IF EXISTS `tb_hasil_ujian`;
CREATE TABLE `tb_hasil_ujian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ujian` int(11) NOT NULL DEFAULT '0',
  `id_siswa` int(11) NOT NULL DEFAULT '0',
  `benar` varchar(4) NOT NULL DEFAULT '',
  `salah` varchar(4) NOT NULL DEFAULT '',
  `kosong` varchar(4) NOT NULL DEFAULT '',
  `skor` double NOT NULL DEFAULT '0',
  `status` varchar(15) NOT NULL DEFAULT '',
  `jml_soal` varchar(4) NOT NULL,
  `waktu` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=315 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tb_hasil_ujian
-- ----------------------------
INSERT INTO `tb_hasil_ujian` VALUES ('221', '100938', '8102', '25', '5', '0', '81', 'Lulus', '30', '3 Menit 4 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('222', '100938', '8103', '28', '2', '0', '95', 'Lulus', '30', '3 Menit 50 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('220', '100938', '8101', '29', '1', '0', '98', 'Lulus', '30', '17 Menit 1 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('216', '100938', '8097', '23', '7', '0', '77', 'Tidak Lulus', '30', '2 Menit 57 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('217', '100938', '8098', '29', '1', '0', '96', 'Lulus', '30', '2 Menit 22 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('305', '100938', '8099', '3', '5', '22', '11', 'Tidak Lulus', '30', '9 Menit 52 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('219', '100938', '8100', '24', '6', '0', '80', 'Lulus', '30', '5 Menit 39 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('223', '100938', '8104', '28', '2', '0', '95', 'Lulus', '30', '22 Menit 42 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('226', '100938', '8105', '25', '5', '0', '86', 'Lulus', '30', '1 Menit 43 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('227', '100938', '8106', '24', '6', '0', '81', 'Lulus', '30', '3 Menit 50 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('228', '100938', '8107', '28', '2', '0', '94', 'Lulus', '30', '4 Menit 40 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('229', '100938', '8108', '23', '6', '1', '73', 'Tidak Lulus', '30', '3 Menit 30 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('231', '100938', '8109', '25', '5', '0', '85', 'Lulus', '30', '1 Menit 33 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('232', '100938', '8110', '28', '2', '0', '94', 'Lulus', '30', '3 Menit 27 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('233', '100938', '8111', '30', '0', '0', '100', 'Lulus', '30', '5 Menit 21 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('252', '100938', '8112', '28', '2', '0', '93', 'Lulus', '30', '2 Menit 50 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('235', '100938', '8122', '29', '1', '0', '97', 'Lulus', '30', '5 Menit 9 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('236', '100938', '8123', '29', '1', '0', '97', 'Lulus', '30', '5 Menit 32 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('237', '100938', '8113', '29', '1', '0', '97', 'Lulus', '30', '5 Menit 38 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('238', '100938', '8114', '28', '2', '0', '93', 'Lulus', '30', '5 Menit 9 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('239', '100938', '8124', '27', '3', '0', '88', 'Lulus', '30', '6 Menit 34 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('240', '100938', '8115', '28', '2', '0', '94', 'Lulus', '30', '5 Menit 48 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('241', '100938', '8125', '25', '5', '0', '81', 'Lulus', '30', '5 Menit 9 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('242', '100938', '8116', '27', '3', '0', '89', 'Lulus', '30', '5 Menit 34 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('243', '100938', '8126', '25', '5', '0', '82', 'Lulus', '30', '5 Menit 14 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('244', '100938', '8117', '28', '2', '0', '94', 'Lulus', '30', '4 Menit 29 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('245', '100938', '8127', '27', '3', '0', '92', 'Lulus', '30', '5 Menit 37 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('246', '100938', '8118', '30', '0', '0', '100', 'Lulus', '30', '6 Menit 57 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('248', '100938', '8119', '30', '0', '0', '100', 'Lulus', '30', '5 Menit 49 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('249', '100938', '8120', '25', '5', '0', '81', 'Lulus', '30', '5 Menit 41 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('307', '100938', '8128', '1', '3', '26', '2', 'Tidak Lulus', '30', '18 Menit 0 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('304', '100938', '8121', '3', '1', '26', '13', 'Tidak Lulus', '30', '13 Menit 37 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('308', '101008', '8104', '2', '0', '2', '60', 'Lulus', '4', '2 Menit 7 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('309', '101008', '8105', '4', '0', '0', '100', 'Lulus', '4', '1 Menit 5 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('310', '101008', '8106', '2', '2', '0', '60', 'Lulus', '4', '0 Menit 28 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('311', '101009', '8097', '4', '0', '0', '80', 'Lulus', '4', '3 Menit 15 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('313', '101009', '8115', '1', '0', '3', '20', 'Tidak Lulus', '4', '0 Menit 7 Detik');
INSERT INTO `tb_hasil_ujian` VALUES ('314', '101009', '8121', '4', '0', '0', '80', 'Lulus', '4', '2 Menit 32 Detik');

-- ----------------------------
-- Table structure for tb_jawaban_siswa
-- ----------------------------
DROP TABLE IF EXISTS `tb_jawaban_siswa`;
CREATE TABLE `tb_jawaban_siswa` (
  `Id_jawaban_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` varchar(11) NOT NULL DEFAULT '',
  `id_ujian` varchar(11) DEFAULT NULL,
  `id_soal` varchar(30) DEFAULT NULL,
  `pilihan_jawaban` varchar(1) DEFAULT NULL,
  `keterangan` varchar(15) DEFAULT NULL,
  `nomor` varchar(4) DEFAULT NULL,
  `waktu_selesai` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_jawaban_siswa`)
) ENGINE=MyISAM AUTO_INCREMENT=1691 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_jawaban_siswa
-- ----------------------------
INSERT INTO `tb_jawaban_siswa` VALUES ('458', '8098', '100938', '174', 'B', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('457', '8098', '100938', '173', 'B', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('456', '8098', '100938', '172', 'A', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('455', '8098', '100938', '171', 'A', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('454', '8098', '100938', '170', 'E', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('453', '8098', '100938', '169', 'A', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('452', '8098', '100938', '168', 'C', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('451', '8098', '100938', '167', 'C', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('450', '8098', '100938', '166', 'B', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('449', '8098', '100938', '165', 'D', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('448', '8098', '100938', '164', 'D', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('447', '8098', '100938', '163', 'C', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('446', '8098', '100938', '162', 'C', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('445', '8098', '100938', '161', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('444', '8098', '100938', '160', 'A', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('443', '8098', '100938', '159', 'A', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('442', '8098', '100938', '158', 'D', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('441', '8098', '100938', '157', 'E', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('440', '8098', '100938', '156', 'B', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('439', '8098', '100938', '155', 'D', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('438', '8098', '100938', '154', 'C', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('437', '8098', '100938', '153', 'E', 'Salah', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('436', '8098', '100938', '152', 'E', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('435', '8098', '100938', '151', 'D', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('434', '8098', '100938', '150', 'A', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('433', '8098', '100938', '149', 'E', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('432', '8098', '100938', '148', 'C', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('544', '8101', '100938', '168', 'C', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('543', '8101', '100938', '167', 'C', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('428', '8097', '100938', '161', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('427', '8097', '100938', '160', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('426', '8097', '100938', '170', 'C', 'Salah', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('425', '8097', '100938', '151', 'D', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('424', '8097', '100938', '158', 'D', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('423', '8097', '100938', '150', 'A', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('422', '8097', '100938', '166', 'B', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('421', '8097', '100938', '164', 'D', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('420', '8097', '100938', '165', 'D', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('419', '8097', '100938', '163', 'B', 'Salah', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('418', '8097', '100938', '174', 'B', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('417', '8097', '100938', '154', 'B', 'Salah', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('416', '8097', '100938', '153', 'A', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('415', '8097', '100938', '159', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('414', '8097', '100938', '152', 'E', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('413', '8097', '100938', '157', 'B', 'Salah', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('412', '8097', '100938', '173', 'B', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('411', '8097', '100938', '172', 'A', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('410', '8097', '100938', '149', 'A', 'Salah', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('409', '8097', '100938', '167', 'C', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('408', '8097', '100938', '169', 'A', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('407', '8097', '100938', '156', 'B', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('406', '8097', '100938', '155', 'D', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('405', '8097', '100938', '162', 'C', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('404', '8097', '100938', '168', 'C', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('403', '8097', '100938', '145', 'B', 'Salah', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('402', '8097', '100938', '146', 'B', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('401', '8097', '100938', '147', 'B', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('400', '8097', '100938', '148', 'A', 'Salah', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('399', '8097', '100938', '171', 'A', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('516', '8100', '100938', '147', 'B', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('515', '8100', '100938', '161', 'A', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('514', '8100', '100938', '160', 'A', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('513', '8100', '100938', '148', 'C', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('512', '8100', '100938', '168', 'C', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('511', '8100', '100938', '150', 'A', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('510', '8100', '100938', '149', 'A', 'Salah', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('509', '8100', '100938', '174', 'B', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('508', '8100', '100938', '145', 'B', 'Salah', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('507', '8100', '100938', '146', 'B', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('506', '8100', '100938', '152', 'E', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('505', '8100', '100938', '171', 'C', 'Salah', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('504', '8100', '100938', '156', 'B', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('503', '8100', '100938', '162', 'C', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('502', '8100', '100938', '151', 'D', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('501', '8100', '100938', '170', 'C', 'Salah', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('500', '8100', '100938', '169', 'A', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('499', '8100', '100938', '153', 'A', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('498', '8100', '100938', '154', 'C', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('497', '8100', '100938', '166', 'D', 'Salah', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('496', '8100', '100938', '165', 'B', 'Salah', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('495', '8100', '100938', '164', 'D', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('494', '8100', '100938', '167', 'C', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('493', '8100', '100938', '155', 'D', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('492', '8100', '100938', '157', 'E', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('491', '8100', '100938', '163', 'C', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('490', '8100', '100938', '159', 'A', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('489', '8100', '100938', '158', 'D', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1666', '8128', '100938', '147', 'A', 'Salah', '3', '0 Menit 8 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('431', '8098', '100938', '147', 'B', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('430', '8098', '100938', '146', 'B', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('429', '8098', '100938', '145', 'A', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1665', '8128', '100938', '146', 'A', 'Salah', '2', '0 Menit 16 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1664', '8128', '100938', '145', 'A', 'Benar', '1', '0 Menit 14 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1654', '8121', '100938', '157', 'E', 'Benar', '4', '0 Menit 19 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1653', '8121', '100938', '147', 'A', 'Salah', '3', '0 Menit 4 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1652', '8121', '100938', '166', 'B', 'Benar', '2', '1 Menit 27 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1651', '8121', '100938', '153', 'A', 'Benar', '1', '1 Menit 10 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1662', '8099', '100938', '165', 'A', 'Salah', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1661', '8099', '100938', '166', 'B', 'Benar', '9', '0 Menit 6 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1660', '8099', '100938', '167', 'A', 'Salah', '8', '1 Menit 40 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1659', '8099', '100938', '170', 'A', 'Salah', '5', '0 Menit 12 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1658', '8099', '100938', '171', 'A', 'Benar', '4', '0 Menit 13 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1657', '8099', '100938', '172', 'B', 'Salah', '3', '0 Menit 9 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1656', '8099', '100938', '173', 'B', 'Benar', '2', '0 Menit 6 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1655', '8099', '100938', '174', 'A', 'Salah', '1', '0 Menit 15 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('542', '8101', '100938', '165', 'D', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('541', '8101', '100938', '164', 'D', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('540', '8101', '100938', '163', 'C', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('539', '8101', '100938', '162', 'C', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('538', '8101', '100938', '158', 'D', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('537', '8101', '100938', '154', 'C', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('536', '8101', '100938', '151', 'D', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('535', '8101', '100938', '150', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('534', '8101', '100938', '161', 'A', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('533', '8101', '100938', '160', 'A', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('532', '8101', '100938', '159', 'A', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('531', '8101', '100938', '157', 'E', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('530', '8101', '100938', '155', 'D', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('529', '8101', '100938', '152', 'E', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('528', '8101', '100938', '149', 'E', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('527', '8101', '100938', '174', 'B', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('526', '8101', '100938', '173', 'A', 'Salah', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('525', '8101', '100938', '172', 'A', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('524', '8101', '100938', '145', 'A', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('523', '8101', '100938', '148', 'C', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('522', '8101', '100938', '146', 'B', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('521', '8101', '100938', '147', 'B', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('520', '8101', '100938', '166', 'B', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('519', '8101', '100938', '153', 'A', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('518', '8100', '100938', '173', 'B', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('517', '8100', '100938', '172', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('545', '8101', '100938', '169', 'A', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('546', '8101', '100938', '170', 'E', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('547', '8101', '100938', '171', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('548', '8101', '100938', '156', 'B', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('549', '8102', '100938', '170', 'E', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('550', '8102', '100938', '160', 'A', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('551', '8102', '100938', '161', 'A', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('552', '8102', '100938', '174', 'B', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('553', '8102', '100938', '152', 'B', 'Salah', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('554', '8102', '100938', '153', 'A', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('555', '8102', '100938', '154', 'C', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('556', '8102', '100938', '156', 'B', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('557', '8102', '100938', '168', 'E', 'Salah', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('558', '8102', '100938', '151', 'D', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('559', '8102', '100938', '169', 'A', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('560', '8102', '100938', '149', 'E', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('561', '8102', '100938', '172', 'A', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('562', '8102', '100938', '173', 'B', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('563', '8102', '100938', '167', 'C', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('564', '8102', '100938', '163', 'A', 'Salah', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('565', '8102', '100938', '164', 'D', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('566', '8102', '100938', '165', 'B', 'Salah', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('567', '8102', '100938', '166', 'B', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('568', '8102', '100938', '155', 'B', 'Salah', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('569', '8102', '100938', '157', 'E', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('570', '8102', '100938', '162', 'C', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('571', '8102', '100938', '150', 'A', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('572', '8102', '100938', '148', 'C', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('573', '8102', '100938', '147', 'B', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('574', '8102', '100938', '146', 'B', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('575', '8102', '100938', '145', 'A', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('576', '8102', '100938', '158', 'D', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('577', '8102', '100938', '159', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('578', '8102', '100938', '171', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('579', '8103', '100938', '160', 'A', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('580', '8103', '100938', '161', 'A', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('581', '8103', '100938', '170', 'E', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('582', '8103', '100938', '151', 'D', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('583', '8103', '100938', '155', 'D', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('584', '8103', '100938', '150', 'A', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('585', '8103', '100938', '159', 'A', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('586', '8103', '100938', '157', 'E', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('587', '8103', '100938', '153', 'A', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('588', '8103', '100938', '154', 'C', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('589', '8103', '100938', '168', 'C', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('590', '8103', '100938', '152', 'E', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('591', '8103', '100938', '167', 'B', 'Salah', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('592', '8103', '100938', '148', 'C', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('593', '8103', '100938', '147', 'B', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('594', '8103', '100938', '146', 'B', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('595', '8103', '100938', '145', 'B', 'Salah', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('596', '8103', '100938', '169', 'A', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('597', '8103', '100938', '162', 'C', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('598', '8103', '100938', '172', 'A', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('599', '8103', '100938', '173', 'B', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('600', '8103', '100938', '163', 'C', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('601', '8103', '100938', '156', 'B', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('602', '8103', '100938', '164', 'D', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('603', '8103', '100938', '165', 'D', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('604', '8103', '100938', '166', 'B', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('605', '8103', '100938', '174', 'B', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('606', '8103', '100938', '149', 'E', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('607', '8103', '100938', '158', 'D', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('608', '8103', '100938', '171', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('609', '8104', '100938', '170', 'E', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('610', '8104', '100938', '151', 'D', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('611', '8104', '100938', '160', 'A', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('612', '8104', '100938', '161', 'A', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('613', '8104', '100938', '158', 'A', 'Salah', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('614', '8104', '100938', '156', 'B', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('615', '8104', '100938', '150', 'A', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('616', '8104', '100938', '174', 'B', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('617', '8104', '100938', '157', 'E', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('618', '8104', '100938', '148', 'C', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('619', '8104', '100938', '147', 'B', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('620', '8104', '100938', '146', 'B', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('621', '8104', '100938', '145', 'B', 'Salah', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('622', '8104', '100938', '155', 'D', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('623', '8104', '100938', '167', 'C', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('624', '8104', '100938', '169', 'A', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('625', '8104', '100938', '171', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('626', '8104', '100938', '149', 'E', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('627', '8104', '100938', '162', 'C', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('628', '8104', '100938', '163', 'C', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('629', '8104', '100938', '164', 'D', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('630', '8104', '100938', '165', 'D', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('631', '8104', '100938', '166', 'B', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('632', '8104', '100938', '159', 'A', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('633', '8104', '100938', '168', 'C', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('634', '8104', '100938', '153', 'A', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('635', '8104', '100938', '154', 'C', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('636', '8104', '100938', '172', 'A', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('637', '8104', '100938', '173', 'B', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('638', '8104', '100938', '152', 'E', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('650', '8105', '100938', '150', 'A', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('649', '8105', '100938', '158', 'A', 'Salah', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('648', '8105', '100938', '151', 'D', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('647', '8105', '100938', '170', 'E', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('646', '8105', '100938', '161', 'A', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('645', '8105', '100938', '160', 'A', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('651', '8105', '100938', '163', 'C', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('652', '8105', '100938', '164', 'D', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('653', '8105', '100938', '165', 'D', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('654', '8105', '100938', '166', 'B', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('655', '8105', '100938', '174', 'B', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('656', '8105', '100938', '153', 'A', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('657', '8105', '100938', '154', 'C', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('658', '8105', '100938', '159', 'A', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('659', '8105', '100938', '152', 'E', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('660', '8105', '100938', '157', 'E', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('661', '8105', '100938', '172', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('662', '8105', '100938', '173', 'B', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('663', '8105', '100938', '149', 'E', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('664', '8105', '100938', '167', 'E', 'Salah', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('665', '8105', '100938', '169', 'A', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('666', '8105', '100938', '156', 'B', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('667', '8105', '100938', '155', 'D', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('668', '8105', '100938', '162', 'C', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('669', '8105', '100938', '168', 'E', 'Salah', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('670', '8105', '100938', '148', 'B', 'Salah', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('671', '8105', '100938', '147', 'B', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('672', '8105', '100938', '146', 'C', 'Salah', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('673', '8105', '100938', '145', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('674', '8105', '100938', '171', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('675', '8106', '100938', '160', 'A', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('676', '8106', '100938', '161', 'A', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('677', '8106', '100938', '170', 'D', 'Salah', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('678', '8106', '100938', '151', 'D', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('679', '8106', '100938', '152', 'E', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('680', '8106', '100938', '163', 'B', 'Salah', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('681', '8106', '100938', '164', 'D', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('682', '8106', '100938', '165', 'D', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('683', '8106', '100938', '166', 'B', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('684', '8106', '100938', '156', 'B', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('685', '8106', '100938', '150', 'A', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('686', '8106', '100938', '158', 'A', 'Salah', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('687', '8106', '100938', '157', 'E', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('688', '8106', '100938', '149', 'B', 'Salah', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('689', '8106', '100938', '148', 'C', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('690', '8106', '100938', '147', 'B', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('691', '8106', '100938', '146', 'B', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('692', '8106', '100938', '145', 'B', 'Salah', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('693', '8106', '100938', '167', 'C', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('694', '8106', '100938', '174', 'B', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('695', '8106', '100938', '169', 'A', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('696', '8106', '100938', '153', 'A', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('697', '8106', '100938', '154', 'A', 'Salah', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('698', '8106', '100938', '155', 'D', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('699', '8106', '100938', '162', 'C', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('700', '8106', '100938', '168', 'C', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('701', '8106', '100938', '172', 'A', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('702', '8106', '100938', '173', 'B', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('703', '8106', '100938', '159', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('704', '8106', '100938', '171', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('705', '8107', '100938', '171', 'A', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('706', '8107', '100938', '148', 'C', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('707', '8107', '100938', '147', 'B', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('708', '8107', '100938', '146', 'B', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('709', '8107', '100938', '145', 'A', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('710', '8107', '100938', '168', 'C', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('711', '8107', '100938', '162', 'C', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('712', '8107', '100938', '155', 'D', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('713', '8107', '100938', '156', 'B', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('714', '8107', '100938', '169', 'A', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('715', '8107', '100938', '167', 'C', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('716', '8107', '100938', '149', 'E', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('717', '8107', '100938', '172', 'A', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('718', '8107', '100938', '173', 'B', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('719', '8107', '100938', '157', 'E', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('720', '8107', '100938', '152', 'E', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('721', '8107', '100938', '159', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('722', '8107', '100938', '153', 'A', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('723', '8107', '100938', '154', 'C', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('724', '8107', '100938', '174', 'B', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('725', '8107', '100938', '163', 'C', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('726', '8107', '100938', '150', 'A', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('727', '8107', '100938', '158', 'A', 'Salah', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('728', '8107', '100938', '151', 'D', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('729', '8107', '100938', '170', 'A', 'Salah', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('730', '8107', '100938', '160', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('731', '8107', '100938', '161', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('732', '8107', '100938', '164', 'D', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('733', '8107', '100938', '165', 'D', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('734', '8107', '100938', '166', 'B', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('735', '8108', '100938', '145', 'A', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('736', '8108', '100938', '146', 'B', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('737', '8108', '100938', '147', 'B', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('738', '8108', '100938', '148', 'C', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('739', '8108', '100938', '149', 'E', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('740', '8108', '100938', '150', 'A', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('741', '8108', '100938', '151', 'D', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('742', '8108', '100938', '153', 'A', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('743', '8108', '100938', '154', 'C', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('744', '8108', '100938', '155', 'B', 'Salah', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('745', '8108', '100938', '156', 'B', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('746', '8108', '100938', '157', 'E', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('747', '8108', '100938', '158', 'D', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('748', '8108', '100938', '159', 'B', 'Salah', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('749', '8108', '100938', '160', 'A', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('750', '8108', '100938', '161', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('751', '8108', '100938', '162', 'C', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('752', '8108', '100938', '163', 'C', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('753', '8108', '100938', '164', 'B', 'Salah', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('754', '8108', '100938', '165', 'B', 'Salah', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('755', '8108', '100938', '166', 'B', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('756', '8108', '100938', '167', 'E', 'Salah', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('757', '8108', '100938', '168', 'E', 'Salah', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('758', '8108', '100938', '169', 'A', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('759', '8108', '100938', '170', 'E', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('760', '8108', '100938', '171', 'A', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('761', '8108', '100938', '172', 'A', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('762', '8108', '100938', '173', 'B', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('763', '8108', '100938', '174', 'B', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('764', '8109', '100938', '174', 'B', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('765', '8109', '100938', '173', 'C', 'Salah', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('766', '8109', '100938', '172', 'A', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('767', '8109', '100938', '171', 'C', 'Salah', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('768', '8109', '100938', '170', 'E', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('769', '8109', '100938', '169', 'A', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('770', '8109', '100938', '168', 'C', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('771', '8109', '100938', '167', 'C', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('772', '8109', '100938', '166', 'B', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('773', '8109', '100938', '165', 'D', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('774', '8109', '100938', '164', 'B', 'Salah', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('775', '8109', '100938', '163', 'C', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('776', '8109', '100938', '162', 'C', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('777', '8109', '100938', '161', 'A', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('778', '8109', '100938', '160', 'A', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('779', '8109', '100938', '159', 'A', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('780', '8109', '100938', '158', 'D', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('781', '8109', '100938', '157', 'E', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('782', '8109', '100938', '156', 'B', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('783', '8109', '100938', '155', 'D', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('784', '8109', '100938', '154', 'C', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('785', '8109', '100938', '153', 'A', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('786', '8109', '100938', '152', 'D', 'Salah', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('787', '8109', '100938', '151', 'D', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('788', '8109', '100938', '150', 'A', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('789', '8109', '100938', '149', 'E', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('790', '8109', '100938', '148', 'B', 'Salah', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('791', '8109', '100938', '147', 'B', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('792', '8109', '100938', '146', 'B', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('793', '8109', '100938', '145', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('794', '8110', '100938', '158', 'D', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('795', '8110', '100938', '159', 'A', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('796', '8110', '100938', '163', 'C', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('797', '8110', '100938', '157', 'E', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('798', '8110', '100938', '155', 'D', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('799', '8110', '100938', '167', 'C', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('800', '8110', '100938', '164', 'D', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('801', '8110', '100938', '165', 'D', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('802', '8110', '100938', '166', 'B', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('803', '8110', '100938', '154', 'C', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('804', '8110', '100938', '153', 'A', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('805', '8110', '100938', '169', 'A', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('806', '8110', '100938', '170', 'C', 'Salah', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('807', '8110', '100938', '151', 'D', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('808', '8110', '100938', '162', 'C', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('809', '8110', '100938', '156', 'B', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('810', '8110', '100938', '171', 'C', 'Salah', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('811', '8110', '100938', '152', 'E', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('812', '8110', '100938', '146', 'B', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('813', '8110', '100938', '145', 'A', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('814', '8110', '100938', '174', 'B', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('815', '8110', '100938', '149', 'E', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('816', '8110', '100938', '150', 'A', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('817', '8110', '100938', '168', 'C', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('818', '8110', '100938', '148', 'C', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('819', '8110', '100938', '160', 'A', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('820', '8110', '100938', '161', 'A', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('821', '8110', '100938', '147', 'B', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('822', '8110', '100938', '172', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('823', '8110', '100938', '173', 'B', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('824', '8111', '100938', '153', 'A', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('825', '8111', '100938', '166', 'B', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('826', '8111', '100938', '147', 'B', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('827', '8111', '100938', '146', 'B', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('828', '8111', '100938', '148', 'C', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('829', '8111', '100938', '145', 'A', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('830', '8111', '100938', '172', 'A', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('831', '8111', '100938', '173', 'B', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('832', '8111', '100938', '174', 'B', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('833', '8111', '100938', '149', 'E', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('834', '8111', '100938', '152', 'E', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('835', '8111', '100938', '155', 'D', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('836', '8111', '100938', '157', 'E', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('837', '8111', '100938', '159', 'A', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('838', '8111', '100938', '160', 'A', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('839', '8111', '100938', '161', 'A', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('840', '8111', '100938', '150', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('841', '8111', '100938', '151', 'D', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('842', '8111', '100938', '154', 'C', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('843', '8111', '100938', '158', 'D', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('844', '8111', '100938', '162', 'C', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('845', '8111', '100938', '163', 'C', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('846', '8111', '100938', '164', 'D', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('847', '8111', '100938', '165', 'D', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('848', '8111', '100938', '167', 'C', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('849', '8111', '100938', '168', 'C', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('850', '8111', '100938', '169', 'A', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('851', '8111', '100938', '170', 'E', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('852', '8111', '100938', '171', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('853', '8111', '100938', '156', 'B', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('854', '8112', '100938', '170', 'E', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('855', '8112', '100938', '160', 'A', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('856', '8112', '100938', '161', 'A', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('857', '8122', '100938', '170', 'E', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('858', '8122', '100938', '160', 'A', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('859', '8122', '100938', '161', 'A', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('860', '8112', '100938', '151', 'D', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('861', '8112', '100938', '169', 'A', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('862', '8112', '100938', '149', 'E', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('863', '8122', '100938', '151', 'D', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('864', '8122', '100938', '169', 'D', 'Salah', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('865', '8122', '100938', '149', 'E', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('866', '8112', '100938', '174', 'B', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('867', '8112', '100938', '152', 'A', 'Salah', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('868', '8112', '100938', '153', 'A', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('869', '8122', '100938', '174', 'B', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('870', '8122', '100938', '152', 'E', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('871', '8122', '100938', '153', 'A', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('872', '8112', '100938', '154', 'C', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('873', '8112', '100938', '156', 'B', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('874', '8112', '100938', '168', 'C', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('875', '8122', '100938', '154', 'C', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('876', '8122', '100938', '156', 'B', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('877', '8122', '100938', '168', 'C', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('878', '8112', '100938', '172', 'D', 'Salah', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('879', '8112', '100938', '173', 'B', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('880', '8112', '100938', '167', 'C', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('881', '8122', '100938', '172', 'A', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('882', '8122', '100938', '173', 'B', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('883', '8122', '100938', '167', 'C', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('884', '8112', '100938', '163', 'C', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('885', '8112', '100938', '164', 'D', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('886', '8112', '100938', '165', 'D', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('887', '8122', '100938', '163', 'C', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('888', '8122', '100938', '164', 'D', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('889', '8122', '100938', '165', 'D', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('890', '8112', '100938', '166', 'B', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('891', '8112', '100938', '155', 'D', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('892', '8112', '100938', '157', 'E', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('893', '8122', '100938', '166', 'B', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('894', '8122', '100938', '155', 'D', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('895', '8122', '100938', '157', 'E', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('896', '8112', '100938', '162', 'C', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('897', '8112', '100938', '150', 'A', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('898', '8112', '100938', '148', 'C', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('899', '8122', '100938', '162', 'C', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('900', '8122', '100938', '150', 'A', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('901', '8122', '100938', '148', 'C', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('902', '8112', '100938', '147', 'B', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('903', '8112', '100938', '146', 'B', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('904', '8112', '100938', '145', 'A', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('905', '8122', '100938', '147', 'B', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('906', '8122', '100938', '146', 'B', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('907', '8122', '100938', '145', 'A', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('908', '8112', '100938', '158', 'D', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('909', '8112', '100938', '159', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('910', '8112', '100938', '171', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('911', '8122', '100938', '158', 'D', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('912', '8122', '100938', '159', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('913', '8122', '100938', '171', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('914', '8113', '100938', '160', 'A', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('915', '8113', '100938', '161', 'A', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('916', '8113', '100938', '170', 'E', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('917', '8123', '100938', '160', 'A', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('918', '8123', '100938', '161', 'A', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('919', '8123', '100938', '170', 'E', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('920', '8113', '100938', '151', 'D', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('921', '8113', '100938', '155', 'D', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('922', '8113', '100938', '150', 'A', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('923', '8123', '100938', '151', 'D', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('924', '8123', '100938', '155', 'D', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('925', '8123', '100938', '150', 'A', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('926', '8113', '100938', '159', 'A', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('927', '8113', '100938', '157', 'E', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('928', '8113', '100938', '153', 'A', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('929', '8123', '100938', '159', 'A', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('930', '8123', '100938', '157', 'E', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('931', '8123', '100938', '153', 'A', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('932', '8113', '100938', '154', 'C', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('933', '8113', '100938', '168', 'C', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('934', '8113', '100938', '152', 'E', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('935', '8123', '100938', '154', 'C', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('936', '8123', '100938', '168', 'C', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('937', '8123', '100938', '152', 'E', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('938', '8113', '100938', '167', 'C', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('939', '8113', '100938', '148', 'C', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('940', '8113', '100938', '147', 'B', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('941', '8123', '100938', '167', 'C', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('942', '8123', '100938', '148', 'C', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('943', '8123', '100938', '147', 'B', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('944', '8113', '100938', '146', 'B', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('945', '8113', '100938', '145', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('946', '8113', '100938', '169', 'A', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('947', '8123', '100938', '146', 'B', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('948', '8123', '100938', '145', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('949', '8123', '100938', '169', 'A', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('950', '8113', '100938', '162', 'D', 'Salah', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('951', '8113', '100938', '172', 'A', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('952', '8113', '100938', '173', 'B', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('953', '8123', '100938', '162', 'D', 'Salah', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('954', '8123', '100938', '172', 'A', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('955', '8123', '100938', '173', 'B', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('956', '8113', '100938', '156', 'B', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('957', '8113', '100938', '163', 'C', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('958', '8113', '100938', '164', 'D', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('959', '8123', '100938', '156', 'B', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('960', '8123', '100938', '163', 'C', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('961', '8123', '100938', '164', 'D', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('962', '8113', '100938', '165', 'D', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('963', '8113', '100938', '166', 'B', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('964', '8113', '100938', '174', 'B', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('965', '8123', '100938', '165', 'D', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('966', '8123', '100938', '166', 'B', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('967', '8123', '100938', '174', 'B', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('968', '8113', '100938', '149', 'E', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('969', '8113', '100938', '158', 'D', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('970', '8113', '100938', '171', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('971', '8123', '100938', '149', 'E', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('972', '8123', '100938', '158', 'D', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('973', '8123', '100938', '171', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('974', '8114', '100938', '170', 'E', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('975', '8114', '100938', '151', 'D', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('976', '8114', '100938', '160', 'A', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('977', '8124', '100938', '170', 'E', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('978', '8124', '100938', '151', 'D', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('979', '8124', '100938', '160', 'A', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('980', '8114', '100938', '161', 'A', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('981', '8114', '100938', '158', 'D', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('982', '8114', '100938', '156', 'B', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('983', '8124', '100938', '161', 'A', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('984', '8124', '100938', '158', 'D', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('985', '8124', '100938', '156', 'B', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('986', '8114', '100938', '150', 'A', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('987', '8114', '100938', '174', 'B', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('988', '8114', '100938', '157', 'E', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('989', '8124', '100938', '150', 'A', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('990', '8124', '100938', '174', 'B', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('991', '8124', '100938', '157', 'E', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('992', '8114', '100938', '148', 'D', 'Salah', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('993', '8114', '100938', '147', 'B', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('994', '8114', '100938', '146', 'B', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('995', '8124', '100938', '148', 'B', 'Salah', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('996', '8124', '100938', '147', 'B', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('997', '8124', '100938', '146', 'B', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('998', '8114', '100938', '145', 'A', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('999', '8114', '100938', '155', 'C', 'Salah', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1000', '8114', '100938', '167', 'C', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1001', '8124', '100938', '145', 'A', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1002', '8124', '100938', '155', 'C', 'Salah', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1003', '8124', '100938', '167', 'C', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1004', '8114', '100938', '169', 'A', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1005', '8114', '100938', '171', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1006', '8114', '100938', '149', 'E', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1007', '8124', '100938', '169', 'A', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1008', '8124', '100938', '171', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1009', '8124', '100938', '149', 'E', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1010', '8114', '100938', '162', 'C', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1011', '8114', '100938', '163', 'C', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1012', '8114', '100938', '164', 'D', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1013', '8124', '100938', '162', 'C', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1014', '8124', '100938', '163', 'C', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1015', '8124', '100938', '164', 'D', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1016', '8114', '100938', '165', 'D', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1017', '8114', '100938', '166', 'B', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1018', '8114', '100938', '159', 'A', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1019', '8124', '100938', '165', 'D', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1020', '8124', '100938', '166', 'B', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1021', '8124', '100938', '159', 'A', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1022', '8114', '100938', '168', 'C', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1023', '8114', '100938', '153', 'A', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1024', '8114', '100938', '154', 'C', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1025', '8124', '100938', '168', 'C', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1026', '8124', '100938', '153', 'A', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1027', '8124', '100938', '154', 'C', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1028', '8114', '100938', '172', 'A', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1029', '8114', '100938', '173', 'B', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1030', '8114', '100938', '152', 'E', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1031', '8124', '100938', '172', 'A', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1032', '8124', '100938', '173', 'B', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1033', '8124', '100938', '152', 'B', 'Salah', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1034', '8115', '100938', '160', 'A', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1035', '8115', '100938', '161', 'A', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1036', '8115', '100938', '170', 'E', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1037', '8125', '100938', '160', 'A', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1038', '8125', '100938', '161', 'A', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1039', '8125', '100938', '170', 'E', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1040', '8115', '100938', '151', 'D', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1041', '8115', '100938', '158', 'A', 'Salah', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1042', '8115', '100938', '150', 'A', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1043', '8125', '100938', '151', 'D', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1044', '8125', '100938', '158', 'A', 'Salah', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1045', '8125', '100938', '150', 'A', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1046', '8115', '100938', '163', 'C', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1047', '8115', '100938', '164', 'E', 'Salah', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1048', '8115', '100938', '165', 'D', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1049', '8125', '100938', '163', 'C', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1050', '8125', '100938', '164', 'E', 'Salah', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1051', '8125', '100938', '165', 'D', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1052', '8115', '100938', '166', 'B', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1053', '8115', '100938', '174', 'B', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1054', '8115', '100938', '153', 'A', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1055', '8125', '100938', '166', 'B', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1056', '8125', '100938', '174', 'B', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1057', '8125', '100938', '153', 'A', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1058', '8115', '100938', '154', 'C', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1059', '8115', '100938', '159', 'A', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1060', '8115', '100938', '152', 'E', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1061', '8125', '100938', '154', 'C', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1062', '8125', '100938', '159', 'A', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1063', '8125', '100938', '152', 'C', 'Salah', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1064', '8115', '100938', '157', 'E', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1065', '8115', '100938', '172', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1066', '8115', '100938', '173', 'B', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1067', '8125', '100938', '157', 'E', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1068', '8125', '100938', '172', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1069', '8125', '100938', '173', 'B', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1070', '8115', '100938', '149', 'E', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1071', '8115', '100938', '167', 'C', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1072', '8115', '100938', '169', 'A', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1073', '8125', '100938', '149', 'B', 'Salah', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1074', '8125', '100938', '167', 'C', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1075', '8125', '100938', '169', 'A', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1076', '8115', '100938', '156', 'B', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1077', '8115', '100938', '155', 'D', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1078', '8115', '100938', '162', 'C', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1079', '8125', '100938', '156', 'B', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1080', '8125', '100938', '155', 'D', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1081', '8125', '100938', '162', 'C', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1082', '8115', '100938', '168', 'C', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1083', '8115', '100938', '148', 'C', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1084', '8115', '100938', '147', 'B', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1085', '8125', '100938', '168', 'C', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1086', '8125', '100938', '148', 'C', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1087', '8125', '100938', '147', 'B', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1088', '8115', '100938', '146', 'B', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1089', '8115', '100938', '145', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1090', '8115', '100938', '171', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1091', '8125', '100938', '146', 'B', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1092', '8125', '100938', '145', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1093', '8125', '100938', '171', 'B', 'Salah', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1094', '8126', '100938', '160', 'A', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1095', '8116', '100938', '160', 'A', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1096', '8116', '100938', '161', 'A', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1097', '8116', '100938', '170', 'E', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1098', '8126', '100938', '161', 'A', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1099', '8126', '100938', '170', 'E', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1100', '8116', '100938', '151', 'D', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1101', '8116', '100938', '152', 'B', 'Salah', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1102', '8116', '100938', '163', 'C', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1103', '8126', '100938', '151', 'D', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1104', '8126', '100938', '152', 'D', 'Salah', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1105', '8126', '100938', '163', 'C', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1106', '8116', '100938', '164', 'D', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1107', '8116', '100938', '165', 'D', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1108', '8116', '100938', '166', 'B', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1109', '8126', '100938', '164', 'D', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1110', '8126', '100938', '165', 'D', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1111', '8126', '100938', '166', 'A', 'Salah', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1112', '8116', '100938', '156', 'B', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1113', '8116', '100938', '150', 'D', 'Salah', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1114', '8116', '100938', '158', 'D', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1115', '8126', '100938', '156', 'B', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1116', '8126', '100938', '150', 'D', 'Salah', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1117', '8126', '100938', '158', 'D', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1118', '8116', '100938', '157', 'E', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1119', '8116', '100938', '149', 'E', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1120', '8116', '100938', '148', 'C', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1121', '8126', '100938', '157', 'E', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1122', '8126', '100938', '149', 'E', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1123', '8126', '100938', '148', 'C', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1124', '8116', '100938', '147', 'B', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1125', '8116', '100938', '146', 'B', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1126', '8116', '100938', '145', 'A', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1127', '8126', '100938', '147', 'B', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1128', '8126', '100938', '146', 'B', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1129', '8126', '100938', '145', 'A', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1130', '8116', '100938', '167', 'C', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1131', '8116', '100938', '174', 'B', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1132', '8116', '100938', '169', 'C', 'Salah', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1133', '8126', '100938', '167', 'C', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1134', '8126', '100938', '174', 'B', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1135', '8126', '100938', '169', 'E', 'Salah', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1136', '8116', '100938', '153', 'A', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1137', '8116', '100938', '154', 'C', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1138', '8116', '100938', '155', 'D', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1139', '8126', '100938', '153', 'A', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1140', '8126', '100938', '154', 'C', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1141', '8126', '100938', '155', 'D', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1142', '8116', '100938', '162', 'C', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1143', '8116', '100938', '168', 'C', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1144', '8116', '100938', '172', 'A', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1145', '8116', '100938', '173', 'B', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1146', '8116', '100938', '159', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1147', '8116', '100938', '171', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1148', '8126', '100938', '162', 'C', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1149', '8126', '100938', '168', 'B', 'Salah', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1150', '8126', '100938', '172', 'A', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1151', '8126', '100938', '173', 'B', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1152', '8126', '100938', '159', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1153', '8126', '100938', '171', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1154', '8117', '100938', '171', 'C', 'Salah', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1155', '8117', '100938', '148', 'C', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1156', '8117', '100938', '147', 'B', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1157', '8127', '100938', '171', 'C', 'Salah', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1158', '8127', '100938', '148', 'C', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1159', '8127', '100938', '147', 'B', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1160', '8117', '100938', '146', 'B', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1161', '8117', '100938', '145', 'A', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1162', '8117', '100938', '168', 'C', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1163', '8127', '100938', '146', 'B', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1164', '8127', '100938', '145', 'A', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1165', '8127', '100938', '168', 'C', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1166', '8117', '100938', '162', 'C', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1167', '8117', '100938', '155', 'D', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1168', '8117', '100938', '156', 'B', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1169', '8127', '100938', '162', 'C', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1170', '8127', '100938', '155', 'D', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1171', '8127', '100938', '156', 'B', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1172', '8117', '100938', '169', 'A', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1173', '8117', '100938', '167', 'D', 'Salah', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1174', '8117', '100938', '149', 'E', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1175', '8127', '100938', '169', 'A', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1176', '8127', '100938', '167', 'C', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1177', '8127', '100938', '149', 'E', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1178', '8117', '100938', '172', 'A', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1179', '8117', '100938', '173', 'B', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1180', '8117', '100938', '157', 'E', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1181', '8127', '100938', '172', 'A', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1182', '8127', '100938', '173', 'B', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1183', '8127', '100938', '157', 'E', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1184', '8117', '100938', '152', 'E', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1185', '8117', '100938', '153', 'A', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1186', '8117', '100938', '159', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1187', '8127', '100938', '152', 'E', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1188', '8127', '100938', '159', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1189', '8127', '100938', '153', 'A', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1190', '8117', '100938', '154', 'C', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1191', '8117', '100938', '174', 'B', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1192', '8117', '100938', '163', 'C', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1193', '8127', '100938', '154', 'C', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1194', '8127', '100938', '174', 'A', 'Salah', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1195', '8127', '100938', '163', 'C', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1196', '8117', '100938', '164', 'D', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1197', '8117', '100938', '165', 'D', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1198', '8117', '100938', '166', 'B', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1199', '8127', '100938', '164', 'D', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1200', '8127', '100938', '165', 'D', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1201', '8127', '100938', '166', 'B', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1202', '8117', '100938', '150', 'A', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1203', '8117', '100938', '158', 'D', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1204', '8117', '100938', '151', 'D', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1205', '8127', '100938', '150', 'A', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1206', '8127', '100938', '158', 'D', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1207', '8127', '100938', '151', 'D', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1208', '8117', '100938', '170', 'E', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1209', '8117', '100938', '160', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1210', '8117', '100938', '161', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1211', '8127', '100938', '170', 'D', 'Salah', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1212', '8127', '100938', '160', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1213', '8127', '100938', '161', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1214', '8118', '100938', '145', 'A', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1215', '8118', '100938', '146', 'B', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1216', '8118', '100938', '147', 'B', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1217', '8118', '100938', '148', 'C', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1218', '8118', '100938', '149', 'E', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1219', '8118', '100938', '150', 'A', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1226', '8118', '100938', '151', 'D', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1227', '8118', '100938', '152', 'E', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1228', '8118', '100938', '153', 'A', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1232', '8118', '100938', '154', 'C', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1233', '8118', '100938', '155', 'D', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1234', '8118', '100938', '156', 'B', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1238', '8118', '100938', '157', 'E', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1239', '8118', '100938', '158', 'D', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1240', '8118', '100938', '159', 'A', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1244', '8118', '100938', '160', 'A', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1245', '8118', '100938', '161', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1246', '8118', '100938', '162', 'C', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1250', '8118', '100938', '163', 'C', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1251', '8118', '100938', '164', 'D', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1252', '8118', '100938', '165', 'D', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1256', '8118', '100938', '166', 'B', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1257', '8118', '100938', '167', 'C', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1258', '8118', '100938', '168', 'C', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1262', '8118', '100938', '169', 'A', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1263', '8118', '100938', '170', 'E', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1264', '8118', '100938', '171', 'A', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1268', '8118', '100938', '172', 'A', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1269', '8118', '100938', '173', 'B', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1270', '8118', '100938', '174', 'B', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1274', '8119', '100938', '174', 'B', 'Benar', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1275', '8119', '100938', '173', 'B', 'Benar', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1276', '8119', '100938', '172', 'A', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1277', '8119', '100938', '171', 'A', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1278', '8120', '100938', '158', 'B', 'Salah', '1', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1279', '8120', '100938', '159', 'B', 'Salah', '2', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1280', '8120', '100938', '163', 'A', 'Salah', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1281', '8119', '100938', '170', 'E', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1282', '8119', '100938', '169', 'A', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1283', '8120', '100938', '157', 'E', 'Benar', '4', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1284', '8120', '100938', '155', 'D', 'Benar', '5', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1285', '8120', '100938', '167', 'C', 'Benar', '6', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1286', '8119', '100938', '168', 'C', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1287', '8119', '100938', '167', 'C', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1288', '8119', '100938', '166', 'B', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1289', '8120', '100938', '164', 'D', 'Benar', '7', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1290', '8120', '100938', '165', 'D', 'Benar', '8', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1291', '8120', '100938', '166', 'B', 'Benar', '9', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1292', '8119', '100938', '165', 'D', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1293', '8119', '100938', '164', 'D', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1294', '8119', '100938', '163', 'C', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1295', '8120', '100938', '154', 'C', 'Benar', '10', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1296', '8120', '100938', '153', 'A', 'Benar', '11', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1297', '8120', '100938', '169', 'A', 'Benar', '12', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1298', '8119', '100938', '162', 'C', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1299', '8119', '100938', '161', 'A', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1300', '8119', '100938', '160', 'A', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1301', '8120', '100938', '170', 'E', 'Benar', '13', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1302', '8120', '100938', '151', 'D', 'Benar', '14', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1303', '8120', '100938', '162', 'C', 'Benar', '15', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1304', '8119', '100938', '159', 'A', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1305', '8119', '100938', '158', 'D', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1306', '8119', '100938', '157', 'E', 'Benar', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1307', '8120', '100938', '171', 'A', 'Benar', '17', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1308', '8120', '100938', '152', 'A', 'Salah', '18', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1309', '8120', '100938', '156', 'B', 'Benar', '16', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1310', '8119', '100938', '156', 'B', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1311', '8119', '100938', '155', 'D', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1312', '8119', '100938', '154', 'C', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1313', '8120', '100938', '174', 'B', 'Benar', '21', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1314', '8120', '100938', '145', 'A', 'Benar', '20', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1315', '8120', '100938', '146', 'B', 'Benar', '19', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1316', '8119', '100938', '153', 'A', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1317', '8119', '100938', '152', 'E', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1318', '8119', '100938', '151', 'D', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1319', '8120', '100938', '149', 'E', 'Benar', '22', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1320', '8120', '100938', '150', 'A', 'Benar', '23', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1321', '8120', '100938', '168', 'C', 'Benar', '24', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1322', '8119', '100938', '150', 'A', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1323', '8119', '100938', '149', 'E', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1324', '8119', '100938', '148', 'C', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1325', '8120', '100938', '148', 'C', 'Benar', '25', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1326', '8120', '100938', '160', 'A', 'Benar', '26', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1327', '8120', '100938', '161', 'A', 'Benar', '27', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1328', '8119', '100938', '147', 'B', 'Benar', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1329', '8119', '100938', '146', 'B', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1330', '8119', '100938', '145', 'A', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1331', '8120', '100938', '147', 'C', 'Salah', '28', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1332', '8120', '100938', '172', 'A', 'Benar', '29', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1333', '8120', '100938', '173', 'B', 'Benar', '30', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1667', '8128', '100938', '148', 'A', 'Salah', '4', '0 Menit 11 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1668', '8104', '101008', '233', 'A', 'Benar', '3', '0 Menit 8 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1669', '8104', '101008', '232', 'A', 'Benar', '4', '0 Menit 11 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1670', '8105', '101008', '235', 'A', 'Benar', '1', '0 Menit 12 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1671', '8105', '101008', '234', 'A', 'Benar', '2', '0 Menit 4 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1672', '8105', '101008', '233', 'A', 'Benar', '3', null);
INSERT INTO `tb_jawaban_siswa` VALUES ('1673', '8105', '101008', '232', 'A', 'Benar', '4', '0 Menit 17 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1674', '8106', '101008', '235', 'A', 'Benar', '1', '0 Menit 3 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1675', '8106', '101008', '234', 'B', 'Salah', '2', '0 Menit 8 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1676', '8106', '101008', '233', 'B', 'Salah', '3', '0 Menit 5 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1677', '8106', '101008', '232', 'A', 'Benar', '4', '0 Menit 8 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1678', '8097', '101009', '239', 'A', 'Benar', '1', '3 Menit 52 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1679', '8097', '101009', '238', 'A', 'Benar', '2', '0 Menit 6 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1680', '8097', '101009', '237', 'A', 'Benar', '3', '0 Menit 4 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1681', '8097', '101009', '236', 'A', 'Benar', '4', '0 Menit 6 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1686', '8115', '101009', '239', 'A', 'Benar', '1', '0 Menit 4 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1687', '8121', '101009', '239', 'A', 'Benar', '1', '1 Menit 13 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1688', '8121', '101009', '237', 'A', 'Benar', '2', '0 Menit 4 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1689', '8121', '101009', '236', 'A', 'Benar', '3', '0 Menit 2 Detik');
INSERT INTO `tb_jawaban_siswa` VALUES ('1690', '8121', '101009', '238', 'A', 'Benar', '4', '0 Menit 5 Detik');

-- ----------------------------
-- Table structure for tb_jurusan
-- ----------------------------
DROP TABLE IF EXISTS `tb_jurusan`;
CREATE TABLE `tb_jurusan` (
  `kode_jurusan` varchar(30) NOT NULL DEFAULT '',
  `jurusan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_jurusan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_jurusan
-- ----------------------------
INSERT INTO `tb_jurusan` VALUES ('AK', 'Akutansi');
INSERT INTO `tb_jurusan` VALUES ('RPL', 'Rekayasa Perangkat Lunak');
INSERT INTO `tb_jurusan` VALUES ('TKJ', 'Teknik Komputer Jaringan');
INSERT INTO `tb_jurusan` VALUES ('APK', 'Andmistrasi Perkantoran');
INSERT INTO `tb_jurusan` VALUES ('MM', 'Multi Media');
INSERT INTO `tb_jurusan` VALUES ('PM', 'Pemasaran');

-- ----------------------------
-- Table structure for tb_kelas
-- ----------------------------
DROP TABLE IF EXISTS `tb_kelas`;
CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(255) DEFAULT NULL,
  `kode_jurusan` varchar(30) DEFAULT NULL,
  `tahun` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_kelas
-- ----------------------------
INSERT INTO `tb_kelas` VALUES ('9', 'XII TKJ', 'TKJ', '2014');
INSERT INTO `tb_kelas` VALUES ('10', 'XI TKJ', 'TKJ', '2014');
INSERT INTO `tb_kelas` VALUES ('11', 'XI RPL 1', 'RPL', '2014');
INSERT INTO `tb_kelas` VALUES ('14', 'XI RPL 2', 'RPL', '2014');
INSERT INTO `tb_kelas` VALUES ('16', 'XII TKJ 1', 'TKJ', '2015');
INSERT INTO `tb_kelas` VALUES ('17', 'XII TKJ 2', 'TKJ', '2015');

-- ----------------------------
-- Table structure for tb_mata_pelajaran
-- ----------------------------
DROP TABLE IF EXISTS `tb_mata_pelajaran`;
CREATE TABLE `tb_mata_pelajaran` (
  `id_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT,
  `pelajaran` varchar(100) NOT NULL DEFAULT '',
  `kode_jurusan` varchar(30) NOT NULL DEFAULT '',
  `id_guru` varchar(30) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  PRIMARY KEY (`id_mata_pelajaran`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_mata_pelajaran
-- ----------------------------
INSERT INTO `tb_mata_pelajaran` VALUES ('6', 'Menginstalasi Perangkat LAN', 'TKJ', '1', '2014');
INSERT INTO `tb_mata_pelajaran` VALUES ('5', 'Menginstalasi SO Jaringan', 'TKJ', '1', '2014');
INSERT INTO `tb_mata_pelajaran` VALUES ('7', 'Mengadministrasi Server dalam Jaringan', 'TKJ', '5', '2014');
INSERT INTO `tb_mata_pelajaran` VALUES ('8', 'Menginstalasi Jaringan WAN', 'TKJ', '5', '2014');
INSERT INTO `tb_mata_pelajaran` VALUES ('9', 'Melakukan Desain dan Perancangan Software', 'RPL', '5', '2014');
INSERT INTO `tb_mata_pelajaran` VALUES ('10', 'Pendidikan Agama Islam', 'RPL', '4', '2014');

-- ----------------------------
-- Table structure for tb_siswa
-- ----------------------------
DROP TABLE IF EXISTS `tb_siswa`;
CREATE TABLE `tb_siswa` (
  `nis` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `kode_jurusan` varchar(30) NOT NULL DEFAULT '',
  `kontak` varchar(100) DEFAULT '',
  `angkatan` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_siswa
-- ----------------------------
INSERT INTO `tb_siswa` VALUES ('7800', 'INDRA CAHYONO', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7795', 'ELOK RIZQIYA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7796', 'ERVIN YULISTIANA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7797', 'FERDY AFFANDI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7798', 'FIRDAUSI ALFANIA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7799', 'HIDAYATHUL CHOIRIYAH', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('8121', 'NOVITA SHOLEHATUL UMROH', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('7789', 'ABDUL WAHID HASYIM', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7790', 'ABDUL WAHID ZAINURI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7791', 'ACHMAD FAJAR', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7792', 'AGIL ANDRIAN', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7793', 'AHMAD TAUFIQ HIDAYATULLAH', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7794', 'DEVI KURNIAWATI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7801', 'JIHAN CLARIZA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7802', 'KHILYATUN NISA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7803', 'LUKMAN HADI PRATAMA PUTRA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7804', 'MISIN YULIANA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7805', 'MOCHAMMAD YUSUF AGUNG TRI SAKTI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7807', 'MOH. BUDI HARTONO', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7808', 'MOH. JAMIL ', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7809', 'MOHAMMAD  YASIN SUKRI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7810', 'MOHAMMAD SOFYAN MIFTAH', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7811', 'MUHAMMAD AFIF ', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7812', 'NIKO PRAYOGA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7813', 'NUR ABDILLAH', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7814', 'NUR DIANA KHOLIDAH', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7815', 'RINGGI JUNAIDI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7816', 'RISKI ROMADHANI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7817', 'RUDI FEBRIYANTO', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7818', 'SAIFUDDIN ZUHRI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7819', 'SHOLEHUDDIN AL ISLAMI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('7820', 'ZAINUL HASAN ', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2011');
INSERT INTO `tb_siswa` VALUES ('8097', 'ABDUL KADIR', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8098', 'ABU YAZID BUSTOMI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8099', 'ACHMAT ROSIDI SAPUTRA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8100', 'AGUS BUDIANTO', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8101', 'AHMAD BAHRUL LAILI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8102', 'AHMAD FAUZAN RIZAL', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8103', 'ALVIATUL QOMARIAH', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8104', 'AMELIA CHINTYA DEVI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8105', 'ARIK SEPRIYANTO', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8106', 'DENI SUMARLIN', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8107', 'DESY PERMATASARI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8108', 'DIMAS WIJANARKO', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8109', 'EIDHO MEIRENDY NURYANTO', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8110', 'FAHMI ULIN NUHA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8111', 'FEBRIYANTI FITRIYAH', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8112', 'FERDIAN TEGUH HADINATA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8113', 'HENDRIK DERMAWAN', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8114', 'HENDRIK DERMAWAN', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8115', 'LESTARI FITRI WAYUNI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8116', 'LINA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8117', 'LUKMAN NUL HAKIM', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8118', 'MOCH ROSI KURNIAWAN', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8119', 'MOH BUDI UTOMO SETIAWAN', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8122', 'NUR ROHMAN DWI AJI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8123', 'NUR HALIZA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8124', 'RUBIYATUL AINI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8125', 'SANTI PUTRI SANJAYA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8126', 'SATRIA BAGUS PRAKOSO', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8127', 'WIDIYA WULANDARI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8128', 'ZAIFUL BAHRI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8120', 'MUTASIM BILLAH', '2b9f333a62c0fe084dc9b1e451fb876f59ef49c0', 'TKJ', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8033', 'ABD. RAHMAN', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8034', 'ACHMAD DANIAL', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8035', 'ADIYONO DENI TRI SUHARTO', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8036', 'ALEK RUDIYANTO', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8037', 'ALFAN FATONI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8038', 'ALFIAN MURSIDI AFRIZAL AKBAR', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8039', 'ANITA FIRDIYAH PERMATASARI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8040', 'BAWON IDA ROYANA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8041', 'BELLA HARUM RESTU', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8042', 'budiheliawan', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8044', 'DIAR NUR DITA DWI YANTI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8045', 'DIMAS DWI ARIYANTO', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8046', 'DWI INTAN NOVIFAH', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8047', 'DWI SEPTYANTO S.P', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8048', 'Eka Oktavia Wulan Dari', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8049', 'ENDANG YULIANTI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8050', 'faridatus soleha', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8051', 'FEBRIANTO', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8052', 'HASAN BASORI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8053', 'HIDAYATIR RIZKIYAH', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8054', 'IIS NURFADILAH', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8055', 'IVA UMAMIYAH', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8056', 'KISWATININGSIH', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8057', 'LINDA NOVITA SARI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8058', 'Margareta nur arisa', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8059', 'MARIA ULFA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8060', 'MOCHAMMAD QOMARUZZAMAN', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8061', 'MOH. AINUL YAQIN', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8062', 'Moh. Amrur Rizal', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8063', 'MOH. IRFAN EFENDI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8064', 'MOH. NUR MAULIDI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8065', 'MOH HABIBI	HABIBI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8066', 'MOH.IRFAN GUSFENDI	IRFAN', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8067', 'MOH.MASY UDI	YUDI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8068', 'MUHAMMAD ZAINUL	ZAINUL', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8069', 'NABILLA AL-BAITY	NABILA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8070', 'NIKMATUL MAULA	NIKMA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8071', 'NURUL BADIAH	BADIAH', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8072', 'PRIMA RAMADHAN HADI PUTRA	PRIMA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8073', 'RAHAYU DIANASARI	DIANA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8074', 'RAHMANIA MARETTA	NIA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8075', 'RATIH AYUNINGSIH	RATIH', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8076', 'RENIKA PUTRI MARIA ULFIANDARI	RENIKA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8077', 'RIZKIYATUL ROMADHONIYAH	NIA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8078', 'robi cahya fatoni	robi', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8079', 'RONY DWI ALVIANTO	RONY', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8080', 'ROSITA JAHRA	ROSITA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8081', 'SANI SUSANTI	SANI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8082', 'SITI ROFIATUL MASRUROH	RURO', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8083', 'Slamet hermanto	Slamet', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8084', 'SOFIATUL  FITRI	SOFI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8085', 'SONY HARYADI	Sony', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8086', 'SRI FATMAWATI	SRI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8087', 'STEPHANIE REVITA CATUR RIZCA	VITA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8088', 'SUDIYONO	YONO', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8089', 'TOMMY HARUN	HARUN', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8090', 'UMI HANIK	ISLAM', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8091', 'UMMI MALIKA BALGIS	Ummi', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8092', 'VERA ARDIYANSYAH	VERA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8093', 'YETI  OKTAVIA	YETI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8094', 'YUNDI VIA SAVITRI	VIA', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8095', 'YUNITA DEWI ANGGRAINI	DEWI', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');
INSERT INTO `tb_siswa` VALUES ('8096', 'YUYUN CAHYATI	YUYUN', 'e553e3bfe782811357b7592536d3b4219f11332a', 'RPL', '-', '2012');

-- ----------------------------
-- Table structure for tb_soal
-- ----------------------------
DROP TABLE IF EXISTS `tb_soal`;
CREATE TABLE `tb_soal` (
  `id_ujian` varchar(11) NOT NULL DEFAULT '',
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` tinytext,
  `p_a` tinytext,
  `p_b` tinytext,
  `p_c` tinytext,
  `p_d` tinytext,
  `p_e` tinytext,
  `jawaban` varchar(1) DEFAULT NULL,
  `tingkat_kesulitan` varchar(15) DEFAULT NULL,
  `poin` double DEFAULT NULL,
  `waktu_soal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=MyISAM AUTO_INCREMENT=249 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_soal
-- ----------------------------
INSERT INTO `tb_soal` VALUES ('100938', '149', '<p>Di bawah ini termasuk fungsi jaringan, kecuali :</p>\n', '<p>Berbagi pemakaian sumber daya (resource)</p>\n', '<p>Teleconference meeting</p>\n', '<p>Internet</p>\n', '<p>Mailing list</p>\n', '<p>Resource Disable</p>\n', 'E', ' sulit', '5', null);
INSERT INTO `tb_soal` VALUES ('100938', '148', '<p>Bila suatu network berada dalam satu lokasi (contoh dalam satu gedung) maka disebut sebagai :</p>\n', '<p>Stand Alone</p>\n', '<p>Network</p>\n', '<p>LAN</p>\n', '<p>WAN</p>\n', '<p>Internet</p>\n', 'C', 'mudah', '2', null);
INSERT INTO `tb_soal` VALUES ('100938', '147', '<p>Bagaimana antar komputer berhubungan serta mengatur koneksi yang ada, itulah yang disebut dengan :</p>\n', '<p>Stand Alone</p>\n', '<p>Network</p>\n', '<p>LAN</p>\n', '<p>WAN</p>\n', '<p>Internet</p>\n', 'B', 'sedang', '4', null);
INSERT INTO `tb_soal` VALUES ('100938', '146', '<p>Jika komputer Anda berhubungan dengan komputer dan peralatan-peralatan lain sehingga membentuk suatu grup, maka ini disebut sebagai :</p>\n', '<p>Stand Alone</p>\n', '<p>Network</p>\n', '<p>LAN</p>\n', '<p>WAN</p>\n', '<p>Internet</p>\n', 'B', ' sedang', '4', null);
INSERT INTO `tb_soal` VALUES ('100938', '145', '<p>Istilah bagi keadaan komputer yang tidak terhubung dengan komputer lain adalah :</p>\n', '<p>Stand Alone</p>\n', '<p>Network</p>\n', '<p>LAN</p>\n', '<p>WAN</p>\n', '<p>Internet</p>\n', 'A', 'mudah', '2', null);
INSERT INTO `tb_soal` VALUES ('100938', '150', '<p>Dalam suatu jaringan komputer kita bisa saling berbagi pemakaian sumber daya, yang disebut dengan :</p>\n', '<p>Sharing</p>\n', '<p>Chating</p>\n', '<p>e-mail</p>\n', '<p>browsing</p>\n', '<p>FTP</p>\n', 'A', ' sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '151', '<p>Pada kabel LAN terdapat pasangan kabel yang dililit satu sama lain, hal ini bertujuan agar mengurangi interferensi listrik pada kabel. berapa jumlah kabel yang terdapat pada kabel LAN tersebut...</p>\n', '<p>14 Kabel</p>\n', '<p>6 Kabel</p>\n', '<p>4 Kabel</p>\n', '<p>8 Kabel</p>\n', '<p>5 Kabel</p>\n', 'D', ' sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '152', '<p>Kita dapat memanfaatkan jaringan komputer untuk mengadakan percakapan jarak jauh yang dikenal dengan :</p>\n', '<p>Chating</p>\n', '<p>e-mail</p>\n', '<p>browsing</p>\n', '<p>FTP</p>\n', '<p>Teleconference meeting.</p>\n', 'E', ' sulit', '5', null);
INSERT INTO `tb_soal` VALUES ('100938', '153', '<p>Tipe jaringan yang memilki karakteristik semua workstation (node) pada jaringan ini dikelola oleh pengontrol Domain disebut :</p>\n', '<p>Client &ndash; Server</p>\n', '<p>Diskless</p>\n', '<p>Pear to pear</p>\n', '<p>Client</p>\n', '<p>Server</p>\n', 'A', 'sulit', '5', null);
INSERT INTO `tb_soal` VALUES ('100938', '154', '<p>Tipe jaringan yang memilki karakteristik Tidak ada perbedaan sistem operasi antara PC yang berfungsi sebagai client maupun server disebut :</p>\n', '<p>Client &ndash; Server</p>\n', '<p>Diskless</p>\n', '<p>Pear to pear</p>\n', '<p>Client</p>\n', '<p>Server</p>\n', 'C', '  sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '155', '<p>Untuk membuat suatu jaringan komputer, diperlukan perlengkapan sebagai berikut, kecuali :</p>\n', '<p>Minimal ada satu komputer yang berlaku sebagai server (pusat data)</p>\n', '<p>Ada komputer workstation (tempat kerja)</p>\n', '<p>Peripheral jaringan seperti Network Interface Card (NIC), hub, dll</p>\n', '<p>Peripheral multimedia seperti sound card, speaker, dll</p>\n', '<p>Media penghubung antarkomputer seperti kabel, connector, terminator, dll</p>\n', 'D', ' sulit', '5', null);
INSERT INTO `tb_soal` VALUES ('100938', '156', '<p>Komputer yang berlaku sebagai pusat data disebut :</p>\n', '<p>Client</p>\n', '<p>Server</p>\n', '<p>Client-server</p>\n', '<p>Pear to pear</p>\n', '<p>Domain</p>\n', 'B', 'mudah', '2', null);
INSERT INTO `tb_soal` VALUES ('100938', '157', '<p>Yang bukan merupakan media penghubung antar komputer adalah :</p>\n', '<p>NIC</p>\n', '<p>Connector RJ 45</p>\n', '<p>HUB</p>\n', '<p>Kabel LAN</p>\n', '<p>IDE</p>\n', 'E', 'sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '158', '<p>Yang tidak termasuk pada kabel jaringan adalah &nbsp;:</p>\n', '<p>STP</p>\n', '<p>UTP</p>\n', '<p>Fiber Optic</p>\n', '<p>AC line</p>\n', '<p>Coaxial</p>\n', 'D', ' sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '159', '<p>Yang termasuk pada kabel twisted pairs adalah :</p>\n', '<p>STP</p>\n', '<p>Coaxial</p>\n', '<p>Thin Cable</p>\n', '<p>Fiber Optic</p>\n', '<p>RJ 45</p>\n', 'A', ' sulit', '5', null);
INSERT INTO `tb_soal` VALUES ('100938', '160', '<p>Berapa kecepatan transfer data kable UTP :</p>\n', '<p>100 Mbps</p>\n', '<p>10 Mbps</p>\n', '<p>10 Kbps</p>\n', '<p>56 Mbps</p>\n', '<p>56 Kbps</p>\n', 'A', 'sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '161', '<p>Berapa kecepatan transfer data kable UTP :</p>\n', '<p>100 Mbps</p>\n', '<p>10 Mbps</p>\n', '<p>10 Kbps</p>\n', '<p>56 Mbps</p>\n', '<p>56 Kbps</p>\n', 'A', 'sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '162', '<p>Konektor yang digunakan untuk kabel UTP atau STP adalah :</p>\n', '<p>RJ 10</p>\n', '<p>RJ 54</p>\n', '<p>RJ 45</p>\n', '<p>RG 45</p>\n', '<p>RG 54</p>\n', 'C', ' sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '163', '<p>Yang bukan merupakan topologi jaringan komputer adalah :</p>\n', '<p>Mesh</p>\n', '<p>Star</p>\n', '<p>Car</p>\n', '<p>Bus</p>\n', '<p>Ring</p>\n', 'C', ' sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '164', '<p>Topologi yang paling sederhana dalam penginstallasian adalah :</p>\n', '<p>Mesh</p>\n', '<p>Star</p>\n', '<p>Car</p>\n', '<p>Bus</p>\n', '<p>Ring</p>\n', 'D', ' sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '165', '<p>Topologi yang paling hemat dalam penggunaan biaya pembuatan adalah :</p>\n', '<p>Mesh</p>\n', '<p>Star</p>\n', '<p>Car</p>\n', '<p>Bus</p>\n', '<p>Ring</p>\n', 'D', ' sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '166', '<p>Topologi yang mampu dengan beban trafik atau koneksi besar adalah :</p>\n', '<p>Mesh</p>\n', '<p>Star</p>\n', '<p>Car</p>\n', '<p>Bus</p>\n', '<p>Ring</p>\n', 'B', 'sulit', '5', null);
INSERT INTO `tb_soal` VALUES ('100938', '167', '<p>Tujuan dibentuknya workgroup&hellip;&hellip;&hellip;&hellip;&hellip;</p>\n', '<p>Mempermudah pengalamatan IP</p>\n', '<p>Mempermudah transfer data</p>\n', '<p>Mempermudah sharing data</p>\n', '<p>Mempermudah koneksi internet</p>\n', '<p>Mempermudah pengelolaan jaringan</p>\n', 'C', ' sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '168', '<p>Dalam konfigurasi berbagi pakai koneksi internet (internet connection sharing), komputer yang tersambung dengan internet akan berfungsi sebagai....</p>\n', '<p>client</p>\n', '<p>dump</p>\n', '<p>router</p>\n', '<p>switch</p>\n', '<p>server / gateway</p>\n', 'C', ' sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '169', '<p>Pemasangan NIC pada computer tidak plug and play disebabkan&hellip;&hellip;&hellip;&hellip;..</p>\n', '<p>Belum ada driver NIC pada OS</p>\n', '<p>NIC bertipe ISA</p>\n', '<p>NIC bertipe PCI</p>\n', '<p>NIC rusak</p>\n', '<p>NIC bertipe AGP</p>\n', 'A', ' sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '170', '<p>Pada pemasangan kabel straight, pin yang digunakan untuk mengirim (transmit) data adalah&hellip;&hellip;&hellip;.<br />\n&nbsp;</p>\n', '<p>1 dan 2</p>\n', '<p>4 dan 5</p>\n', '<p>3 dan 8</p>\n', '<p>7 dan 6</p>\n', '<p>3 dan 6</p>\n', 'E', ' sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '171', '<p>Kombinasi pengkabelan straight pada jaringan komputer yang sesuai dengan standart internasional &nbsp;adalah....</p>\n', '<p>White orange &ndash; orange - white green &ndash; blue - white blue - green &ndash; white brown - brown</p>\n', '<p>White orange &ndash; orange - white green &ndash; green - white blue - blue &ndash; white brown - brown</p>\n', '<p>White green &ndash; green - white orange &ndash; blue - white blue - orange &ndash; white brown - brown</p>\n', '<p>White orange &ndash; orange - white green - green - white blue - blue &ndash; white brown - brown</p>\n', '<p>Orange &ndash; white orange &ndash; green &ndash; white green - white blue &nbsp;- blue &ndash; white brown &ndash; brown</p>\n', 'A', ' sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '172', '<p><img alt=\"\" src=\"/project/sinline/bootstrap/js/kcfinder-3.12/upload/images/lan card.jpg\" /></p>\n\n<p>Apa nama dari perangkat keras atas...</p>\n', '<p>Lan Card</p>\n', '<p>Router</p>\n', '<p>Switch</p>\n', '<p>Konektor</p>\n', '<p>Server</p>\n', 'A', ' sedang', '2', null);
INSERT INTO `tb_soal` VALUES ('100938', '173', '<p><img alt=\"\" src=\"/project/sinline/bootstrap/js/kcfinder-3.12/upload/images/images (8).jpg\" /></p>\n\n<p>Apa nama dari perangkat keras atas...</p>\n', '<p>Lan Card</p>\n', '<p>Router</p>\n', '<p>Switch</p>\n', '<p>Konektor</p>\n', '<p>Server</p>\n', 'B', ' sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('100938', '174', '<p>Gambar Dibawah Merupakan topologi ...</p>\n\n<p><img alt=\"\" src=\"/project/sinline/bootstrap/js/kcfinder-3.12/upload/images/images (9).jpg\" /></p>\n', '<p>Bus</p>\n', '<p>Star</p>\n', '<p>Mesh</p>\n', '<p>Car</p>\n', '<p>Hybrid</p>\n', 'B', ' sedang', '3', null);
INSERT INTO `tb_soal` VALUES ('101009', '239', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', 'A', ' sulit', '20', null);
INSERT INTO `tb_soal` VALUES ('101009', '238', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', 'A', ' mudah', '20', null);
INSERT INTO `tb_soal` VALUES ('101009', '237', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', 'A', ' sulit', '20', null);
INSERT INTO `tb_soal` VALUES ('101009', '236', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', 'A', ' sedang', '20', null);
INSERT INTO `tb_soal` VALUES ('101008', '235', '<p>200</p>\n', '<p>200</p>\n', '<p>200</p>\n', '<p>200</p>\n', '<p>200</p>\n', '<p>200</p>\n', 'A', ' mudah', '30', '50');
INSERT INTO `tb_soal` VALUES ('101008', '234', '<p>200</p>\n', '<p>200</p>\n', '<p>200</p>\n', '<p>200</p>\n', '<p>200</p>\n', '<p>200</p>\n', 'A', ' sedang', '30', '150');
INSERT INTO `tb_soal` VALUES ('101008', '233', '<p>200</p>\n', '<p>200</p>\n', '<p>200</p>\n', '<p>200</p>\n', '<p>200</p>\n', '<p>200</p>\n', 'A', ' sulit', '30', '180');
INSERT INTO `tb_soal` VALUES ('101008', '232', '<p>200</p>\n', '<p>200</p>\n', '<p>200</p>\n', '<p>200</p>\n', '<p>200</p>\n', '<p>200</p>\n', 'A', ' sulit', '30', '200');
INSERT INTO `tb_soal` VALUES ('100998', '229', '<p>2</p>\n', '<p>2</p>\n', '<p>2</p>\n', '<p>2</p>\n', '<p>2</p>\n', '<p>2</p>\n', 'A', ' mudah', '22', '22');
INSERT INTO `tb_soal` VALUES ('100998', '228', '<p>11</p>\n', '<p>s</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', 'A', ' mudah', '1', '1');
INSERT INTO `tb_soal` VALUES ('100998', '227', '<p>11</p>\n', '<p>s</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', 'A', ' mudah', '1', '1');
INSERT INTO `tb_soal` VALUES ('100998', '225', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', 'A', ' mudah', '1', '1');
INSERT INTO `tb_soal` VALUES ('100998', '226', '<p>11</p>\n', '<p>s</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', 'A', ' mudah', '1', '1');
INSERT INTO `tb_soal` VALUES ('100998', '223', '<p>asd</p>\n', '<p>as</p>\n', '<p>as</p>\n', '<p>as</p>\n', '<p>as</p>\n', '<p>as</p>\n', 'E', ' mudah', '2', '61');
INSERT INTO `tb_soal` VALUES ('100998', '222', '<p>asd</p>\n', '<p>as</p>\n', '<p>as</p>\n', '<p>as</p>\n', '<p>as</p>\n', '<p>as</p>\n', 'E', ' mudah', '2', '60');
INSERT INTO `tb_soal` VALUES ('100998', '221', '<p>xxx</p>\n', '<p>xxx</p>\n', '<p>xxx</p>\n', '<p>xxx</p>\n', '<p>xxx</p>\n', '<p>xxx</p>\n', 'B', 'sulit', '400', '400');
INSERT INTO `tb_soal` VALUES ('100998', '220', '<p>asd</p>\n', '<p>as</p>\n', '<p>as</p>\n', '<p>as</p>\n', '<p>as</p>\n', '<p>as</p>\n', 'A', 'sulit', '123', '400');
INSERT INTO `tb_soal` VALUES ('101008', '240', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', 'A', ' mudah', '1', '1');
INSERT INTO `tb_soal` VALUES ('101008', '241', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', 'A', ' mudah', '1', '1');
INSERT INTO `tb_soal` VALUES ('101008', '242', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>0</p>\n', 'A', ' mudah', '1', '20');
INSERT INTO `tb_soal` VALUES ('101008', '243', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>0</p>\n', 'A', ' mudah', '1', '20');
INSERT INTO `tb_soal` VALUES ('101008', '244', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>0</p>\n', 'A', ' mudah', '1', '20');
INSERT INTO `tb_soal` VALUES ('101008', '245', '<p>12</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', 'A', ' mudah', '11', '11');
INSERT INTO `tb_soal` VALUES ('101008', '246', '<p>12</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', 'A', ' mudah', '11', '11');
INSERT INTO `tb_soal` VALUES ('101008', '247', '<p>12</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', 'A', ' sulit', '11', '500');
INSERT INTO `tb_soal` VALUES ('101008', '248', '<p>12</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', '<p>1</p>\n', 'A', ' sulit', '11', '500');

-- ----------------------------
-- Table structure for tb_ujian
-- ----------------------------
DROP TABLE IF EXISTS `tb_ujian`;
CREATE TABLE `tb_ujian` (
  `id_ujian` int(11) NOT NULL AUTO_INCREMENT,
  `id_mp` varchar(11) NOT NULL DEFAULT '',
  `waktu` int(11) NOT NULL DEFAULT '0',
  `tgl` datetime DEFAULT '0000-00-00 00:00:00',
  `id_kelas` varchar(255) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `standard_nilai` varchar(5) DEFAULT NULL,
  `jenis_ujian` varchar(255) DEFAULT NULL,
  `kompetensi` varchar(255) DEFAULT '',
  `tipe_waktu` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_ujian`)
) ENGINE=MyISAM AUTO_INCREMENT=101010 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_ujian
-- ----------------------------
INSERT INTO `tb_ujian` VALUES ('100938', '6', '30', '2014-08-22 07:30:00', '10', 'aktif', '80', 'ulangan harian', 'menginstalasi perangkat jaringan', '1');
INSERT INTO `tb_ujian` VALUES ('100986', '6', '60', '2014-09-21 08:45:00', '17', 'tidak aktif', '65', 'UTS', 'Pengenalan perangkat lan', '1');
INSERT INTO `tb_ujian` VALUES ('101008', '5', '30', '2014-05-27 08:45:00', '17', 'tidak aktif', '60', 'manual', '11', '0');
INSERT INTO `tb_ujian` VALUES ('101009', '6', '30', '2014-05-15 15:50:00', '10', 'aktif', '30', 'otomatis', 'otomatis', '1');

-- ----------------------------
-- Table structure for tb_waktu
-- ----------------------------
DROP TABLE IF EXISTS `tb_waktu`;
CREATE TABLE `tb_waktu` (
  `id_mata_pelajaran` int(11) DEFAULT NULL,
  `sulit` varchar(255) DEFAULT NULL,
  `sedang` varchar(255) DEFAULT NULL,
  `mudah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_waktu
-- ----------------------------
INSERT INTO `tb_waktu` VALUES ('6', '120', '200', '50');
INSERT INTO `tb_waktu` VALUES ('5', '180', '120', '60');

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_monitoring.absensi
CREATE TABLE IF NOT EXISTS `absensi` (
  `id_absensi` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_absensi` date NOT NULL,
  `id_murid` int(11) NOT NULL,
  `status_kehadiran` varchar(10) NOT NULL,
  PRIMARY KEY (`id_absensi`),
  KEY `fk-absensi-id_murid` (`id_murid`),
  CONSTRAINT `fk-absensi-id_murid` FOREIGN KEY (`id_murid`) REFERENCES `murid` (`id_murid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_monitoring.absensi: ~1 rows (approximately)
DELETE FROM `absensi`;
/*!40000 ALTER TABLE `absensi` DISABLE KEYS */;
INSERT INTO `absensi` (`id_absensi`, `tgl_absensi`, `id_murid`, `status_kehadiran`) VALUES
	(4, '2021-12-21', 1, 'Hadir'),
	(5, '2021-12-21', 2, 'Hadir');
/*!40000 ALTER TABLE `absensi` ENABLE KEYS */;

-- Dumping structure for table db_monitoring.agenda
CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `agenda` text NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_monitoring.agenda: ~1 rows (approximately)
DELETE FROM `agenda`;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` (`id`, `tanggal`, `agenda`, `file`) VALUES
	(1, '2021-12-14', '<p>cobaa agendaaa</p>', 'file41e4c46cc29c92709e9f962b9acefc5c.jpg');
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;

-- Dumping structure for table db_monitoring.auth_assignment
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_monitoring.auth_assignment: ~2 rows (approximately)
DELETE FROM `auth_assignment`;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('admin', '1', 1638764403),
	('guru', '3', NULL),
	('ortu', '5', NULL),
	('ortu', '6', NULL);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;

-- Dumping structure for table db_monitoring.auth_item
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_monitoring.auth_item: ~11 rows (approximately)
DELETE FROM `auth_item`;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/*', 2, NULL, NULL, NULL, 1638764389, 1638764389),
	('/absensi/index', 2, NULL, NULL, NULL, 1638947237, 1638947237),
	('/pesan/*', 2, NULL, NULL, NULL, 1638947179, 1638947179),
	('/pesan/index', 2, NULL, NULL, NULL, 1638947223, 1638947223),
	('/raport/*', 2, NULL, NULL, NULL, 1638947177, 1638947177),
	('/raport/index', 2, NULL, NULL, NULL, 1638947216, 1638947216),
	('/report/*', 2, NULL, NULL, NULL, 1638947175, 1638947175),
	('/report/index', 2, NULL, NULL, NULL, 1638947217, 1638947217),
	('/site/*', 2, NULL, NULL, NULL, 1638947139, 1638947139),
	('admin', 1, NULL, NULL, NULL, 1638764386, 1638764386),
	('guru', 1, 'Guru', NULL, NULL, 1638764618, 1638764618),
	('ortu', 1, 'Orang Tua', NULL, NULL, 1638764618, 1638764618);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;

-- Dumping structure for table db_monitoring.auth_item_child
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_monitoring.auth_item_child: ~9 rows (approximately)
DELETE FROM `auth_item_child`;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
	('admin', '/*'),
	('guru', '/pesan/*'),
	('guru', '/raport/*'),
	('guru', '/report/*'),
	('guru', '/site/*'),
	('ortu', '/absensi/index'),
	('ortu', '/pesan/index'),
	('ortu', '/raport/index'),
	('ortu', '/report/index');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;

-- Dumping structure for table db_monitoring.auth_rule
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_monitoring.auth_rule: ~0 rows (approximately)
DELETE FROM `auth_rule`;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;

-- Dumping structure for table db_monitoring.guru
CREATE TABLE IF NOT EXISTS `guru` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_monitoring.guru: ~0 rows (approximately)
DELETE FROM `guru`;
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
INSERT INTO `guru` (`id_guru`, `nama_guru`, `alamat`, `no_hp`, `jenis_kelamin`, `username`, `password`) VALUES
	(2, 'BUDI', 'zscxzxcaa\r\n', '`121312', 'Laki-laki', 'Budix', '123456');
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;

-- Dumping structure for table db_monitoring.jenis_kelas
CREATE TABLE IF NOT EXISTS `jenis_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_kelas` (`nama_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_monitoring.jenis_kelas: ~0 rows (approximately)
DELETE FROM `jenis_kelas`;
/*!40000 ALTER TABLE `jenis_kelas` DISABLE KEYS */;
INSERT INTO `jenis_kelas` (`id`, `nama_kelas`, `keterangan`) VALUES
	(1, 'Kelas-Mawar', '4-5 Tahun\r\n');
/*!40000 ALTER TABLE `jenis_kelas` ENABLE KEYS */;

-- Dumping structure for table db_monitoring.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_murid` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_jenis_kelas` int(11) NOT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `fk-murid-kelas` (`id_murid`),
  KEY `fk-guru-kelas` (`id_guru`),
  KEY `fk-kelas-jenis_kelas` (`id_jenis_kelas`),
  CONSTRAINT `fk-guru-kelas` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE,
  CONSTRAINT `fk-kelas-jenis_kelas` FOREIGN KEY (`id_jenis_kelas`) REFERENCES `jenis_kelas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-murid-kelas` FOREIGN KEY (`id_murid`) REFERENCES `murid` (`id_murid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_monitoring.kelas: ~0 rows (approximately)
DELETE FROM `kelas`;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` (`id_kelas`, `id_murid`, `id_guru`, `id_jenis_kelas`) VALUES
	(3, 1, 2, 1);
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;

-- Dumping structure for table db_monitoring.laporan
CREATE TABLE IF NOT EXISTS `laporan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `laporan` text DEFAULT NULL,
  `file_laporan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_laporan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_monitoring.laporan: ~0 rows (approximately)
DELETE FROM `laporan`;
/*!40000 ALTER TABLE `laporan` DISABLE KEYS */;
INSERT INTO `laporan` (`id_laporan`, `laporan`, `file_laporan`) VALUES
	(1, 'cobaaa', 'file_laporanb10c199e1d5e31f3056fe14b94f54650.jpg');
/*!40000 ALTER TABLE `laporan` ENABLE KEYS */;

-- Dumping structure for table db_monitoring.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_monitoring.migration: ~19 rows (approximately)
DELETE FROM `migration`;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1638764215),
	('m130524_201442_init', 1638764217),
	('m170228_064223_rbac_create', 1638764218),
	('m170228_064635_mimin_init', 1638764218),
	('m211130_091453_create_guru_table', 1638764218),
	('m211206_042059_insert_auth_guru_ortu', 1638764618),
	('m211206_063544_create_murid_table', 1638772688),
	('m211206_070046_create_murid_kelas', 1638774954),
	('m211206_072925_create_laporan_table', 1638776221),
	('m211206_080319_create_absen_table', 1638777994),
	('m211206_083231_alter_user', 1638779613),
	('m211206_085916_create_raport_table', 1638781325),
	('m211206_123608_create_raport_table', 1638794265),
	('m211206_132809_alter_raport', 1638797418),
	('m211208_043236_create_pesan_table', 1638938034),
	('m211217_054034_alter_murid', 1639719698),
	('m211217_055345_create_kelas_table', 1639720516),
	('m211217_060138_alter_kelas', 1639721288),
	('m211217_083322_alter_laporan', 1639730135),
	('m211221_060730_create_agenda_table', 1640067010);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Dumping structure for table db_monitoring.murid
CREATE TABLE IF NOT EXISTS `murid` (
  `id_murid` int(11) NOT NULL AUTO_INCREMENT,
  `nama_murid` varchar(100) NOT NULL,
  `nama_walimurid` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  PRIMARY KEY (`id_murid`),
  UNIQUE KEY `nisn` (`nisn`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_monitoring.murid: ~2 rows (approximately)
DELETE FROM `murid`;
/*!40000 ALTER TABLE `murid` DISABLE KEYS */;
INSERT INTO `murid` (`id_murid`, `nama_murid`, `nama_walimurid`, `alamat`, `no_hp`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `username`, `password`, `nisn`) VALUES
	(1, 'Budiko', 'Budi', '1323123ZZ', '121212', 'Laki-laki', '2022-01-06', 'Surabaya', 'Budik00', '123456', '1212121'),
	(2, 'Budiko', 'Budi', 'ewqew', '', 'Laki-laki', '2021-12-31', 'Surabaya', 'Budik00s', '123456', '12121210');
/*!40000 ALTER TABLE `murid` ENABLE KEYS */;

-- Dumping structure for table db_monitoring.pesan
CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `id_penerima` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`id_pesan`),
  KEY `fk_pesan_penerima` (`id_penerima`),
  KEY `fk_pesan_pengirim` (`id_pengirim`),
  CONSTRAINT `fk_pesan_penerima` FOREIGN KEY (`id_penerima`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_pesan_pengirim` FOREIGN KEY (`id_pengirim`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_monitoring.pesan: ~1 rows (approximately)
DELETE FROM `pesan`;
/*!40000 ALTER TABLE `pesan` DISABLE KEYS */;
INSERT INTO `pesan` (`id_pesan`, `id_penerima`, `id_pengirim`, `pesan`) VALUES
	(1, 5, 1, 'cobaaaaaaaaaaaa');
/*!40000 ALTER TABLE `pesan` ENABLE KEYS */;

-- Dumping structure for table db_monitoring.raport
CREATE TABLE IF NOT EXISTS `raport` (
  `id_raport` int(11) NOT NULL AUTO_INCREMENT,
  `id_murid` int(11) NOT NULL,
  `hasil_raport` text NOT NULL,
  `file_raport` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_raport`),
  KEY `fk-raport-id_murid` (`id_murid`),
  CONSTRAINT `fk-raport-id_murid` FOREIGN KEY (`id_murid`) REFERENCES `murid` (`id_murid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_monitoring.raport: ~1 rows (approximately)
DELETE FROM `raport`;
/*!40000 ALTER TABLE `raport` DISABLE KEYS */;
INSERT INTO `raport` (`id_raport`, `id_murid`, `hasil_raport`, `file_raport`) VALUES
	(1, 1, '<p>test</p>', 'file_raport2fc7a8f2e576f94887e2edc6972d651b.xlsx');
/*!40000 ALTER TABLE `raport` ENABLE KEYS */;

-- Dumping structure for table db_monitoring.report
CREATE TABLE IF NOT EXISTS `report` (
  `id_report` int(11) NOT NULL AUTO_INCREMENT,
  `id_murid` int(11) NOT NULL,
  `tgl_report` date NOT NULL,
  `hasil_report` text NOT NULL,
  PRIMARY KEY (`id_report`),
  KEY `idx-report-id_murid` (`id_murid`),
  CONSTRAINT `fk-report-id_murid` FOREIGN KEY (`id_murid`) REFERENCES `murid` (`id_murid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_monitoring.report: ~3 rows (approximately)
DELETE FROM `report`;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` (`id_report`, `id_murid`, `tgl_report`, `hasil_report`) VALUES
	(1, 1, '2021-12-28', 'GTEsss'),
	(2, 1, '2021-12-31', '<p>cobbba</p>'),
	(3, 2, '2021-12-31', '<p>testingg</p>');
/*!40000 ALTER TABLE `report` ENABLE KEYS */;

-- Dumping structure for table db_monitoring.route
CREATE TABLE IF NOT EXISTS `route` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_monitoring.route: ~106 rows (approximately)
DELETE FROM `route`;
/*!40000 ALTER TABLE `route` DISABLE KEYS */;
INSERT INTO `route` (`name`, `alias`, `type`, `status`) VALUES
	('/*', '*', '', 1),
	('/absensi/*', '*', 'absensi', 1),
	('/absensi/create', 'create', 'absensi', 1),
	('/absensi/delete', 'delete', 'absensi', 1),
	('/absensi/index', 'index', 'absensi', 1),
	('/absensi/update', 'update', 'absensi', 1),
	('/absensi/view', 'view', 'absensi', 1),
	('/datecontrol/*', '*', 'datecontrol', 1),
	('/datecontrol/parse/*', '*', 'datecontrol/parse', 1),
	('/datecontrol/parse/convert', 'convert', 'datecontrol/parse', 1),
	('/debug/*', '*', 'debug', 1),
	('/debug/default/*', '*', 'debug/default', 1),
	('/debug/default/db-explain', 'db-explain', 'debug/default', 1),
	('/debug/default/download-mail', 'download-mail', 'debug/default', 1),
	('/debug/default/index', 'index', 'debug/default', 1),
	('/debug/default/toolbar', 'toolbar', 'debug/default', 1),
	('/debug/default/view', 'view', 'debug/default', 1),
	('/debug/user/*', '*', 'debug/user', 1),
	('/debug/user/reset-identity', 'reset-identity', 'debug/user', 1),
	('/debug/user/set-identity', 'set-identity', 'debug/user', 1),
	('/gii/*', '*', 'gii', 1),
	('/gii/default/*', '*', 'gii/default', 1),
	('/gii/default/action', 'action', 'gii/default', 1),
	('/gii/default/diff', 'diff', 'gii/default', 1),
	('/gii/default/index', 'index', 'gii/default', 1),
	('/gii/default/preview', 'preview', 'gii/default', 1),
	('/gii/default/view', 'view', 'gii/default', 1),
	('/gridview/*', '*', 'gridview', 1),
	('/gridview/export/*', '*', 'gridview/export', 1),
	('/gridview/export/download', 'download', 'gridview/export', 1),
	('/gridview/grid-edited-row/*', '*', 'gridview/grid-edited-row', 1),
	('/gridview/grid-edited-row/back', 'back', 'gridview/grid-edited-row', 1),
	('/guru/*', '*', 'guru', 1),
	('/guru/create', 'create', 'guru', 1),
	('/guru/delete', 'delete', 'guru', 1),
	('/guru/index', 'index', 'guru', 1),
	('/guru/update', 'update', 'guru', 1),
	('/guru/view', 'view', 'guru', 1),
	('/kelas/*', '*', 'kelas', 1),
	('/kelas/create', 'create', 'kelas', 1),
	('/kelas/delete', 'delete', 'kelas', 1),
	('/kelas/index', 'index', 'kelas', 1),
	('/kelas/update', 'update', 'kelas', 1),
	('/kelas/view', 'view', 'kelas', 1),
	('/laporan/*', '*', 'laporan', 1),
	('/laporan/create', 'create', 'laporan', 1),
	('/laporan/delete', 'delete', 'laporan', 1),
	('/laporan/index', 'index', 'laporan', 1),
	('/laporan/update', 'update', 'laporan', 1),
	('/laporan/view', 'view', 'laporan', 1),
	('/mimin/*', '*', 'mimin', 1),
	('/mimin/role/*', '*', 'mimin/role', 1),
	('/mimin/role/create', 'create', 'mimin/role', 1),
	('/mimin/role/delete', 'delete', 'mimin/role', 1),
	('/mimin/role/index', 'index', 'mimin/role', 1),
	('/mimin/role/permission', 'permission', 'mimin/role', 1),
	('/mimin/role/update', 'update', 'mimin/role', 1),
	('/mimin/role/view', 'view', 'mimin/role', 1),
	('/mimin/route/*', '*', 'mimin/route', 1),
	('/mimin/route/create', 'create', 'mimin/route', 1),
	('/mimin/route/delete', 'delete', 'mimin/route', 1),
	('/mimin/route/generate', 'generate', 'mimin/route', 1),
	('/mimin/route/index', 'index', 'mimin/route', 1),
	('/mimin/route/update', 'update', 'mimin/route', 1),
	('/mimin/route/view', 'view', 'mimin/route', 1),
	('/mimin/user/*', '*', 'mimin/user', 1),
	('/mimin/user/create', 'create', 'mimin/user', 1),
	('/mimin/user/delete', 'delete', 'mimin/user', 1),
	('/mimin/user/index', 'index', 'mimin/user', 1),
	('/mimin/user/update', 'update', 'mimin/user', 1),
	('/mimin/user/view', 'view', 'mimin/user', 1),
	('/murid/*', '*', 'murid', 1),
	('/murid/create', 'create', 'murid', 1),
	('/murid/delete', 'delete', 'murid', 1),
	('/murid/index', 'index', 'murid', 1),
	('/murid/update', 'update', 'murid', 1),
	('/murid/view', 'view', 'murid', 1),
	('/pesan/*', '*', 'pesan', 1),
	('/pesan/create', 'create', 'pesan', 1),
	('/pesan/delete', 'delete', 'pesan', 1),
	('/pesan/index', 'index', 'pesan', 1),
	('/pesan/update', 'update', 'pesan', 1),
	('/pesan/view', 'view', 'pesan', 1),
	('/raport/*', '*', 'raport', 1),
	('/raport/create', 'create', 'raport', 1),
	('/raport/delete', 'delete', 'raport', 1),
	('/raport/index', 'index', 'raport', 1),
	('/raport/update', 'update', 'raport', 1),
	('/raport/view', 'view', 'raport', 1),
	('/report/*', '*', 'report', 1),
	('/report/create', 'create', 'report', 1),
	('/report/delete', 'delete', 'report', 1),
	('/report/index', 'index', 'report', 1),
	('/report/update', 'update', 'report', 1),
	('/report/view', 'view', 'report', 1),
	('/site/*', '*', 'site', 1),
	('/site/about', 'about', 'site', 1),
	('/site/captcha', 'captcha', 'site', 1),
	('/site/contact', 'contact', 'site', 1),
	('/site/error', 'error', 'site', 1),
	('/site/index', 'index', 'site', 1),
	('/site/login', 'login', 'site', 1),
	('/site/logout', 'logout', 'site', 1),
	('/site/request-password-reset', 'request-password-reset', 'site', 1),
	('/site/reset-password', 'reset-password', 'site', 1),
	('/site/signup', 'signup', 'site', 1);
/*!40000 ALTER TABLE `route` ENABLE KEYS */;

-- Dumping structure for table db_monitoring.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `jenis_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_monitoring.user: ~4 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `jenis_user`) VALUES
	(1, 'admin', 'Bj2xEpff-WmRLtY4TyHPHxRp6eAxsNZ0', '$2y$13$lyzLwLoeBeCxjFtGgQVPquL0qaL6F1ygdBgqTnKE22Q2x.dwAaQ9S', NULL, 'piant.grunger@gmail.com', 10, 1485769884, 1488270381, NULL),
	(3, 'Budix', '2', '$2y$13$9PzSxFHy.ed5tTJ3c11Z0.ZB.0NBxWUJWhR07fuqzFAs0tKHZmkbi', NULL, NULL, 10, 1638766151, 1638779799, 'guru'),
	(5, 'Budik00', '1', '$2y$13$R64aFzHl6vd3pwfZO0K2P.84Cs/jPcsHHEJGL5HWa3.ULHy48cRJK', NULL, NULL, 10, 1638773221, 1639720134, 'murid'),
	(6, 'Budik00s', '2', '$2y$13$d32JO5Ve4OLOYl7.7oZM..OhakB1ibY68yTUP.sZOgGOPn35cTB0K', NULL, NULL, 10, 1639720189, 1639720189, 'murid');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

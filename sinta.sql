-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.35-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sinta
CREATE DATABASE IF NOT EXISTS `sinta` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sinta`;

-- Dumping structure for table sinta.detail_pesanan
CREATE TABLE IF NOT EXISTS `detail_pesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pemesanan_id` int(11) NOT NULL DEFAULT '0',
  `no_kontainer` varchar(50) NOT NULL DEFAULT '0',
  `no_seal` varchar(50) NOT NULL DEFAULT '0',
  `biaya_tambahan` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_kontainer` (`no_kontainer`),
  KEY `FK_detail_pesanan_pemesanan` (`pemesanan_id`),
  CONSTRAINT `FK_detail_pesanan_pemesanan` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table sinta.detail_pesanan: ~4 rows (approximately)
/*!40000 ALTER TABLE `detail_pesanan` DISABLE KEYS */;
INSERT INTO `detail_pesanan` (`id`, `pemesanan_id`, `no_kontainer`, `no_seal`, `biaya_tambahan`, `total`) VALUES
	(5, 3, '1234567', '1234567', 20000, 0),
	(6, 3, '1234564', '1234567', 20000, 0),
	(7, 3, '1234563', '1234567', 20000, 0),
	(8, 5, '6666666', '6666666', 900000, 0);
/*!40000 ALTER TABLE `detail_pesanan` ENABLE KEYS */;

-- Dumping structure for table sinta.konsumen
CREATE TABLE IF NOT EXISTS `konsumen` (
  `id_konsumen` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `perusahaan` varchar(50) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `profil_perusahaan` varchar(50) DEFAULT NULL,
  `dok_MOU` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_konsumen`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table sinta.konsumen: ~1 rows (approximately)
/*!40000 ALTER TABLE `konsumen` DISABLE KEYS */;
INSERT INTO `konsumen` (`id_konsumen`, `nama_konsumen`, `jabatan`, `perusahaan`, `npwp`, `alamat`, `profil_perusahaan`, `dok_MOU`) VALUES
	(7, 'Bayung Pahlihan', 'General Manager', 'PT. Escorindo Jasa Prima', '02.021.481.3-046.000', 'Wisma Mitra Sunter Lt 4-01 Yos Sudarso 89 Blok C-1', NULL, NULL);
/*!40000 ALTER TABLE `konsumen` ENABLE KEYS */;

-- Dumping structure for table sinta.kontainer
CREATE TABLE IF NOT EXISTS `kontainer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_seal` int(20) NOT NULL DEFAULT '0',
  `no_kontainer` int(7) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table sinta.kontainer: ~3 rows (approximately)
/*!40000 ALTER TABLE `kontainer` DISABLE KEYS */;
INSERT INTO `kontainer` (`id`, `no_seal`, `no_kontainer`) VALUES
	(1, 222, 222),
	(2, 3333, 33333),
	(3, 111, 1111);
/*!40000 ALTER TABLE `kontainer` ENABLE KEYS */;

-- Dumping structure for table sinta.pemesanan
CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pesanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_konsumen` int(11) NOT NULL,
  `konsumen` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kapasitas_muat` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `jum_kontainer` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `_20` int(11) DEFAULT NULL,
  `_40` int(11) DEFAULT NULL,
  `tarif` int(11) NOT NULL,
  `total_tarif` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `jadwal_kirim` date NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `status_pengiriman` varchar(50) NOT NULL DEFAULT 'PENDING',
  `is_tagihan` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pesanan`),
  KEY `FK_pemesanan_konsumen` (`id_konsumen`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table sinta.pemesanan: ~6 rows (approximately)
/*!40000 ALTER TABLE `pemesanan` DISABLE KEYS */;
INSERT INTO `pemesanan` (`id_pesanan`, `id_konsumen`, `konsumen`, `nama_barang`, `kapasitas_muat`, `tujuan`, `jum_kontainer`, `tipe`, `_20`, `_40`, `tarif`, `total_tarif`, `tgl_pesan`, `jadwal_kirim`, `keterangan`, `status_pengiriman`, `is_tagihan`) VALUES
	(2, 8, 'Bayung Pahlihan', 'asd', '2 Kg', 'Cilacap', 2, '', 0, 0, 0, 0, '2019-07-14', '2019-07-14', 'adwaw', 'PROSES', 0),
	(3, 7, 'Bayung Pahlihan', 'Barang1', '20 Ton', 'Cilacap', 3, '', 1800000, 0, 1800000, 5400000, '2019-07-14', '2019-07-14', 'ASD', 'PROSES', 1),
	(4, 7, 'Bayung Pahlihan', 'AKU', '20 Ton', 'Narogong', 1, '', 1800000, 0, 1800000, 0, '2019-07-14', '2019-07-15', 'asd', 'PROSES', 0),
	(5, 7, 'Bayung Pahlihan', 'TESTER2', '2 Ton', 'Narogong', 1, '', 1800000, 0, 1800000, 0, '2019-07-15', '2019-07-15', 'TESTER2', 'PROSES', 1),
	(6, 7, 'Bayung Pahlihan', 'TESER3', '5 Ton', 'Narogong', 3, '', 1800000, 0, 1800000, 5400000, '2019-07-15', '2019-07-15', 'TESTER3', 'PROSES', 0),
	(7, 7, 'Bayung Pahlihan', 'TEST Cilacap', '50 Ton', 'Cilacap', 2, '', 0, 7900000, 7900000, 15800000, '2019-07-15', '2019-07-15', 'TEST Cilacap', 'PROSES', 0);
/*!40000 ALTER TABLE `pemesanan` ENABLE KEYS */;

-- Dumping structure for table sinta.rute
CREATE TABLE IF NOT EXISTS `rute` (
  `id_rute` int(11) NOT NULL AUTO_INCREMENT,
  `id_konsumen` int(11) DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `_20` int(11) DEFAULT NULL,
  `_40` int(11) DEFAULT NULL,
  `is_deleted` mediumint(9) DEFAULT '0',
  PRIMARY KEY (`id_rute`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table sinta.rute: ~2 rows (approximately)
/*!40000 ALTER TABLE `rute` DISABLE KEYS */;
INSERT INTO `rute` (`id_rute`, `id_konsumen`, `tujuan`, `_20`, `_40`, `is_deleted`) VALUES
	(12, 7, 'Narogong', 1800000, 0, 0),
	(13, 7, 'Cilacap', 0, 7900000, 0);
/*!40000 ALTER TABLE `rute` ENABLE KEYS */;

-- Dumping structure for table sinta.sistem_setting
CREATE TABLE IF NOT EXISTS `sistem_setting` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `cabang_bank` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sinta.sistem_setting: ~1 rows (approximately)
/*!40000 ALTER TABLE `sistem_setting` DISABLE KEYS */;
INSERT INTO `sistem_setting` (`id`, `nama_perusahaan`, `alamat`, `telp`, `email`, `bank`, `cabang_bank`, `no_rekening`, `atas_nama`) VALUES
	(1, 'CV. MAJU BERSAMA RAHAYU', '', '', '', '', '', '', '');
/*!40000 ALTER TABLE `sistem_setting` ENABLE KEYS */;

-- Dumping structure for table sinta.tb_groups
CREATE TABLE IF NOT EXISTS `tb_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table sinta.tb_groups: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_groups` DISABLE KEYS */;
INSERT INTO `tb_groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Roles Admin'),
	(2, 'klien', 'Roles untuk user Klien');
/*!40000 ALTER TABLE `tb_groups` ENABLE KEYS */;

-- Dumping structure for table sinta.tb_login_attempts
CREATE TABLE IF NOT EXISTS `tb_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table sinta.tb_login_attempts: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_login_attempts` ENABLE KEYS */;

-- Dumping structure for table sinta.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `id_konsumen` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Dumping data for table sinta.tb_users: ~5 rows (approximately)
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` (`id`, `ip_address`, `id_konsumen`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `avatar`) VALUES
	(1, '127.0.0.1', 7, 'sintawulansr', '$2y$08$Kpso52jO/ld.bHeDSE5hPO2x9qsIdnVhEVlgFqrZ3c8TIq6zuNLze', '', 'sinta@admin.com', '86ed629d0fc67b65fa78a1f7b776dd9c56032abb', NULL, NULL, 'G.WaoqYoZ/Zq6l6VddiHGe', '0000-00-00 00:00:00', '2019-07-16 14:34:20', 1, 'Sinta', 'Wulansari', 'ANDROMEDA', '08523442353235', 'user8-128x128.jpg'),
	(9, '::1', 7, 'rizkifreao', '$2y$08$Kpso52jO/ld.bHeDSE5hPO2x9qsIdnVhEVlgFqrZ3c8TIq6zuNLze', NULL, 'rizkipebrianto96@bpr.co.id', NULL, NULL, NULL, 'fmAygl1DaHNc5qtHi/xHFO', '2018-11-09 16:55:31', '2019-07-15 13:49:22', 1, 'Rizki', 'Pebrianto', 'BPR Kertaharja', NULL, 'user1-128x128.jpg'),
	(13, '::1', 3, 'sintaw', '$2y$08$Kpso52jO/ld.bHeDSE5hPO2x9qsIdnVhEVlgFqrZ3c8TIq6zuNLze', NULL, 'sinta@bpr.co.id', NULL, NULL, NULL, NULL, '2018-11-19 16:04:42', '2019-06-22 15:38:47', 1, 'Sinta', 'Wulansari', 'BPR Kertaharja', '08523442353235', '1.jpg'),
	(16, '::1', 0, 'test@gmail.com', '$2y$08$/UjdP5j8we2Iq47HdFs5huonITDoJKOfhM1GTRnjMAS/C4A57QAaW', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, '2019-05-14 04:44:44', '2019-05-14 04:44:58', 1, 'tester', 'tester', 'IBII', NULL, NULL),
	(17, '::1', NULL, 'asd', '$2y$08$P6oE9RfOlshGh/z.qqWQ0OEt1ApkJlB8PtmzjrRCRu1MaZGn1gWYm', NULL, 'asd@gmail.com', NULL, NULL, NULL, NULL, '2019-06-23 18:46:47', NULL, 1, 'asd', 'asd', 'asd', NULL, NULL);
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;

-- Dumping structure for table sinta.tb_users_groups
CREATE TABLE IF NOT EXISTS `tb_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `tb_users_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `tb_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `tb_users_groups_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- Dumping data for table sinta.tb_users_groups: ~6 rows (approximately)
/*!40000 ALTER TABLE `tb_users_groups` DISABLE KEYS */;
INSERT INTO `tb_users_groups` (`id`, `user_id`, `group_id`) VALUES
	(38, 1, 1),
	(46, 1, 2),
	(40, 9, 2),
	(44, 13, 2),
	(49, 16, 2),
	(50, 17, 2);
/*!40000 ALTER TABLE `tb_users_groups` ENABLE KEYS */;

-- Dumping structure for table sinta.trucking
CREATE TABLE IF NOT EXISTS `trucking` (
  `id` int(11) NOT NULL,
  `pemesanan_id` int(11) NOT NULL,
  `no_kontainer` int(7) NOT NULL,
  `no_seal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sinta.trucking: ~0 rows (approximately)
/*!40000 ALTER TABLE `trucking` DISABLE KEYS */;
/*!40000 ALTER TABLE `trucking` ENABLE KEYS */;

-- Dumping structure for table sinta.uang_jalan
CREATE TABLE IF NOT EXISTS `uang_jalan` (
  `id_uang_jalan` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` varchar(50) DEFAULT NULL,
  `ppn` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_uang_jalan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sinta.uang_jalan: ~2 rows (approximately)
/*!40000 ALTER TABLE `uang_jalan` DISABLE KEYS */;
INSERT INTO `uang_jalan` (`id_uang_jalan`, `deskripsi`, `ppn`) VALUES
	(1, '2-Excel', '10%'),
	(2, '3-Excel', '8%');
/*!40000 ALTER TABLE `uang_jalan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

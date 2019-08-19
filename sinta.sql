-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.35-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sinta
CREATE DATABASE IF NOT EXISTS `sinta` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sinta`;

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
  `is_delete` int(11) DEFAULT '0',
  PRIMARY KEY (`id_konsumen`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table sinta.konsumen: ~2 rows (approximately)
/*!40000 ALTER TABLE `konsumen` DISABLE KEYS */;
INSERT INTO `konsumen` (`id_konsumen`, `nama_konsumen`, `jabatan`, `perusahaan`, `npwp`, `alamat`, `profil_perusahaan`, `dok_MOU`, `is_delete`) VALUES
	(7, 'Bayung Pahlihan', 'General Manager', 'PT. Escorindo Jasa Prima', '02.021.481.3-046.000', 'Wisma Mitra Sunter Lt 4-01 Yos Sudarso 89 Blok C-1', NULL, '7-MOU.pdf', 0),
	(8, 'ASF', 'SAD', 'awd', 'awd', 'adaw', 'ad', '8-MOU.pdf', 0),
	(9, 'Rizki', 'Manager', 'PT ABC', '222 222 3333 5555', 'Jl Bumi Asri', NULL, NULL, 0);
/*!40000 ALTER TABLE `konsumen` ENABLE KEYS */;

-- Dumping structure for table sinta.notifikasi
CREATE TABLE IF NOT EXISTS `notifikasi` (
  `id_notif` int(11) NOT NULL AUTO_INCREMENT,
  `pengirim` int(11) NOT NULL DEFAULT '0',
  `penerima` int(11) NOT NULL DEFAULT '0',
  `keterangan` varchar(255) NOT NULL DEFAULT '0',
  `data` int(11) NOT NULL DEFAULT '0',
  `status_notif` enum('TRUE','FALSE') NOT NULL DEFAULT 'FALSE',
  PRIMARY KEY (`id_notif`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table sinta.notifikasi: ~12 rows (approximately)
/*!40000 ALTER TABLE `notifikasi` DISABLE KEYS */;
INSERT INTO `notifikasi` (`id_notif`, `pengirim`, `penerima`, `keterangan`, `data`, `status_notif`) VALUES
	(1, 25, 1, 'Telah mengajukan pesanan', 14, 'TRUE'),
	(2, 25, 1, 'Telah mengajukan pesanan', 15, 'TRUE'),
	(3, 25, 23, 'Telah mengajukan pesanan', 15, 'FALSE'),
	(4, 25, 24, 'Telah mengajukan pesanan', 15, 'FALSE'),
	(5, 25, 20, 'Telah mengajukan pesanan', 15, 'FALSE'),
	(6, 25, 1, 'Telah mengajukan pesanan', 16, 'TRUE'),
	(7, 25, 23, 'Telah mengajukan pesanan', 16, 'FALSE'),
	(8, 25, 24, 'Telah mengajukan pesanan', 16, 'FALSE'),
	(9, 25, 20, 'Telah mengajukan pesanan', 16, 'FALSE'),
	(10, 25, 1, 'Telah mengajukan pesanan', 17, 'TRUE'),
	(11, 25, 23, 'Telah mengajukan pesanan', 17, 'FALSE'),
	(12, 25, 24, 'Telah mengajukan pesanan', 17, 'FALSE'),
	(13, 25, 20, 'Telah mengajukan pesanan', 17, 'FALSE');
/*!40000 ALTER TABLE `notifikasi` ENABLE KEYS */;

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
  `send_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`),
  KEY `FK_pemesanan_konsumen` (`id_konsumen`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table sinta.pemesanan: ~13 rows (approximately)
/*!40000 ALTER TABLE `pemesanan` DISABLE KEYS */;
INSERT INTO `pemesanan` (`id_pesanan`, `id_konsumen`, `konsumen`, `nama_barang`, `kapasitas_muat`, `tujuan`, `jum_kontainer`, `tipe`, `_20`, `_40`, `tarif`, `total_tarif`, `tgl_pesan`, `jadwal_kirim`, `keterangan`, `status_pengiriman`, `is_tagihan`, `send_by`) VALUES
	(2, 8, 'Bayung Pahlihan', 'asd', '2 Kg', 'Cilacap', 2, '', 1800000, 0, 1800000, 3600000, '2019-07-14', '2019-07-14', 'adwaw', 'PROSES', 0, NULL),
	(3, 7, 'Bayung Pahlihan', 'Barang1', '20 Ton', 'Cilacap', 3, '20\'', 1800000, 0, 1800000, 5400000, '2019-07-14', '2019-07-14', 'ASD', 'SELESAI', 1, NULL),
	(4, 7, 'Bayung Pahlihan', 'AKU', '20 Ton', 'Narogong', 1, '20\'', 1800000, 0, 1800000, 0, '2019-07-14', '2019-07-15', 'asd', 'PROSES', 0, NULL),
	(5, 7, 'Bayung Pahlihan', 'TESTER2', '2 Ton', 'Narogong', 1, '20\'', 1800000, 0, 1800000, 0, '2019-07-15', '2019-07-15', 'TESTER2', 'PROSES', 1, NULL),
	(6, 7, 'Bayung Pahlihan', 'TESER3', '5 Ton', 'Narogong', 3, '20\'', 1800000, 0, 1800000, 5400000, '2019-07-15', '2019-07-15', 'TESTER3', 'PROSES', 0, NULL),
	(7, 7, 'Bayung Pahlihan', 'TEST Cilacap', '50 Ton', 'Cilacap', 2, '40\'', 0, 7900000, 7900000, 15800000, '2019-07-15', '2019-07-15', 'TEST Cilacap', 'SELESAI', 1, NULL),
	(8, 7, 'PT. Escorindo Jasa Prima', 'BARU LAGI', '30 Ton', 'Narogong', 2, '20\'', 1800000, 0, 1800000, 3600000, '2019-08-05', '2016-08-05', 'TIDAK ADA', 'PROSES', 1, NULL),
	(9, 7, 'PT. Escorindo Jasa Prima', 'adadawd', '40 Ton', 'Narogong', 2, '20\'', 1800000, 0, 1800000, 3600000, '2019-08-11', '2019-08-11', 'Tidak ada', 'PROSES', 1, NULL),
	(10, 9, 'PT ABC', 'Kasur', '50 Ton', 'BDG', 2, '20\'', 1500000, 0, 1500000, 3000000, '2019-08-16', '2019-08-16', 'Atas nama rizkifreao', 'PROSES', 1, NULL),
	(12, 9, 'PT ABC', 'asd', '2 Ton', 'BDG', 2, '20\'', 1500000, 0, 1500000, 3000000, '2019-08-16', '2019-08-16', '', 'PROSES', 0, NULL),
	(13, 9, 'PT ABC', 'Test Notif', '2 Ton', 'BDG', 2, '20\'', 1500000, 0, 1500000, 3000000, '2019-08-16', '2019-08-16', '', 'PROSES', 0, NULL),
	(14, 9, 'PT ABC', 'Test Notif', '2 Ton', 'BDG', 2, '20\'', 1500000, 0, 1500000, 3000000, '2019-08-16', '2019-08-16', '', 'PROSES', 0, 25),
	(15, 9, 'PT ABC', 'TEST NOTIF AHH', '22 Ton', 'BDG', 2, '20\'', 1500000, 0, 1500000, 3000000, '2019-08-16', '2019-08-16', '', 'PROSES', 0, 25),
	(17, 9, 'PT ABC', 'kk', '20 Ton', 'BDG', 1, '20\'', 1500000, 0, 1500000, 1500000, '2019-08-18', '2019-08-19', 'kk', 'PENDING', 0, 25);
/*!40000 ALTER TABLE `pemesanan` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table sinta.detail_pesanan: ~9 rows (approximately)
/*!40000 ALTER TABLE `detail_pesanan` DISABLE KEYS */;
INSERT INTO `detail_pesanan` (`id`, `pemesanan_id`, `no_kontainer`, `no_seal`, `biaya_tambahan`, `total`) VALUES
	(5, 3, '1234567', '1234567', 20000, 0),
	(6, 3, '1234564', '1234567', 20000, 0),
	(7, 3, '1234563', '1234567', 20000, 0),
	(8, 5, '6666666', '6666666', 900000, 0),
	(9, 8, 'asd1111', 'asd1111', 550000, 0),
	(10, 2, 'asd1112', 'asd1112', 500000, 0),
	(12, 6, 'asdasd3', 'ddd', 2000, 0),
	(13, 7, 'ccccccc', 'ccccccc', -1222, 0),
	(14, 7, 'aaaaaaa', 'aaaaaaa', 222, 0),
	(15, 7, 'bbbbbbb', 'bbbbbbb', -111, 0),
	(16, 7, 'wwwwwww', 'wwwwwww', 111, 0),
	(17, 9, '9999999', '9999999', 200000, 0),
	(18, 9, '7657465', '7657465', 200000, 0),
	(19, 10, 'abcabca', 'abc123', 200000, 0),
	(20, 10, 'acvacva', 'acv555', 200000, 0);
/*!40000 ALTER TABLE `detail_pesanan` ENABLE KEYS */;

-- Dumping structure for table sinta.rute
CREATE TABLE IF NOT EXISTS `rute` (
  `id_rute` int(11) NOT NULL AUTO_INCREMENT,
  `id_konsumen` int(11) DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `_20` int(11) DEFAULT NULL,
  `_40` int(11) DEFAULT NULL,
  `is_deleted` mediumint(9) DEFAULT '0',
  PRIMARY KEY (`id_rute`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table sinta.rute: ~4 rows (approximately)
/*!40000 ALTER TABLE `rute` DISABLE KEYS */;
INSERT INTO `rute` (`id_rute`, `id_konsumen`, `tujuan`, `_20`, `_40`, `is_deleted`) VALUES
	(12, 7, 'Narogong', 1800000, 0, 0),
	(13, 7, 'Cilacap', 0, 7900000, 0),
	(14, 9, 'BDG', 1500000, 0, 0),
	(15, 9, 'SBG', 0, 3500000, 0);
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
  `npwp` varchar(50) NOT NULL,
  `direktur` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sinta.sistem_setting: ~1 rows (approximately)
/*!40000 ALTER TABLE `sistem_setting` DISABLE KEYS */;
INSERT INTO `sistem_setting` (`id`, `nama_perusahaan`, `alamat`, `telp`, `email`, `bank`, `cabang_bank`, `no_rekening`, `atas_nama`, `npwp`, `direktur`, `logo`) VALUES
	(0, 'CV. MAJU BERSAMA SEJAHTERA', 'Jl. Setrawangi IV No 24 Babakan Surabaya Kiaracondong Bandung 40215\r\n', '(022) 20527470', 'mbsmajubersama@gmail.com', 'MANDIRI', 'BANDUNG', '131-00-1383634-3', 'CV.MAJU BERSAMA', '74 309 766 9 424 000', 'IMAN HERI ALFIANSYAH, S.SOS', 'Logo.png');
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
	(1, 'Admin', 'Roles Admin'),
	(2, 'Konsumen', 'Roles untuk user Klien');
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
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Dumping data for table sinta.tb_users: ~6 rows (approximately)
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` (`id`, `ip_address`, `id_konsumen`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `avatar`) VALUES
	(1, '127.0.0.1', 0, 'sintawulansr', '$2y$08$Kpso52jO/ld.bHeDSE5hPO2x9qsIdnVhEVlgFqrZ3c8TIq6zuNLze', '', 'sinta@admin.com', '86ed629d0fc67b65fa78a1f7b776dd9c56032abb', NULL, NULL, 'G.WaoqYoZ/Zq6l6VddiHGe', '0000-00-00 00:00:00', '2019-08-18 11:40:30', 1, 'Sintaaaaaaaaaaaaa', 'Wulansari', 'ANDROMEDA', '123445566778', 'user8-128x128.jpg'),
	(9, '::1', 7, 'rizkifreaoo', '$2y$08$Kpso52jO/ld.bHeDSE5hPO2x9qsIdnVhEVlgFqrZ3c8TIq6zuNLze', NULL, 'rizkipebrianto96@bpr.co.id', NULL, NULL, NULL, 'fmAygl1DaHNc5qtHi/xHFO', '2018-11-09 16:55:31', '2019-08-12 04:22:23', 1, 'Rizki', 'Pebrianto', 'BPR Kertaharja', '08544432', 'user1-128x128.jpg'),
	(19, '::1', 8, 'testgrup', '$2y$08$nKPUD5rmnZCczbAt6gtZkOPLtBNisJaEbQG5IRLk4KAtgWk28gF/.', NULL, 'testgrup@testgrup.com', NULL, NULL, NULL, NULL, '2019-08-08 07:32:44', NULL, 1, 'TEST', 'GRUP', '7', '123445566778', NULL),
	(20, '::1', 0, 'asdgrup', '$2y$08$ErWZcJ7ZjgvlyR4cx03xc.FA8fdol.V0lqNiMAHP6lYDPsy1n0z3C', NULL, 'asdgrup@asdgrup.com', NULL, NULL, NULL, NULL, '2019-08-08 07:38:20', NULL, 1, 'ZZZ', 'Grup', NULL, '4222323', NULL),
	(23, '::1', 0, 'adminku', '$2y$08$S42HAV81ZlXEClc1y1k2sOoEqkTHgAE3r5VhjphJ70npN94NgCUP.', NULL, 'admin@admin.com', NULL, NULL, NULL, NULL, '2019-08-08 15:56:42', NULL, 1, 'Admin', 'admin', NULL, NULL, NULL),
	(24, '::1', 0, 'asd', '$2y$08$kQceZh8Cq97ffBVHx8obVeEDKjvyCjVCgZ/TI5aAfDar88F5N3fDW', NULL, 'asd@asd.asd', NULL, NULL, NULL, NULL, '2019-08-08 16:52:29', NULL, 1, 'asd', 'asd', NULL, '0000000000', NULL),
	(25, '::1', 9, 'rizkifreao', '$2y$08$g7NB.teKK7Zjz8G9xatjs.EaNIQJxIAv3OCzLOAG21n68Ln9CTlVC', NULL, 'rizkifreao@abc.com', NULL, NULL, NULL, NULL, '2019-08-16 04:13:53', '2019-08-18 11:46:58', 1, 'Rizki', 'Freao', NULL, '02222', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;

-- Dumping data for table sinta.tb_users_groups: ~6 rows (approximately)
/*!40000 ALTER TABLE `tb_users_groups` DISABLE KEYS */;
INSERT INTO `tb_users_groups` (`id`, `user_id`, `group_id`) VALUES
	(38, 1, 1),
	(111, 9, 2),
	(121, 19, 2),
	(124, 20, 1),
	(113, 23, 1),
	(117, 24, 1),
	(125, 25, 2);
/*!40000 ALTER TABLE `tb_users_groups` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

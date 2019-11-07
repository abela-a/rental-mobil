/*
Navicat MySQL Data Transfer

Source Server         : Database
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : project_rental

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-11-07 20:03:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `merk`
-- ----------------------------
DROP TABLE IF EXISTS `merk`;
CREATE TABLE `merk` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `KdMerk` varchar(50) NOT NULL,
  `NmMerk` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`,`KdMerk`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of merk
-- ----------------------------
INSERT INTO `merk` VALUES ('2', 'DHT', 'Daihatsu');
INSERT INTO `merk` VALUES ('3', 'DTS', 'Datsun');
INSERT INTO `merk` VALUES ('4', 'HND', 'Honda');
INSERT INTO `merk` VALUES ('5', 'ISZ', 'Isuzu');
INSERT INTO `merk` VALUES ('6', 'KIA', 'Korean Industrial Autocar');
INSERT INTO `merk` VALUES ('7', 'MBS', 'Mitsubishi');
INSERT INTO `merk` VALUES ('8', 'NSN', 'Nissan');
INSERT INTO `merk` VALUES ('9', 'SZK', 'Suzuki');
INSERT INTO `merk` VALUES ('16', 'TYT', 'Toyota');
INSERT INTO `merk` VALUES ('17', 'CHV', 'Chevrolet');
INSERT INTO `merk` VALUES ('18', 'WLI', 'Wuling');

-- ----------------------------
-- Table structure for `mobil`
-- ----------------------------
DROP TABLE IF EXISTS `mobil`;
CREATE TABLE `mobil` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `NoPlat` varchar(10) NOT NULL,
  `KdMerk` varchar(20) DEFAULT NULL,
  `IdType` varchar(10) DEFAULT NULL,
  `StatusRental` enum('Jalan','Dipesan','Kosong') DEFAULT NULL,
  `HargaSewa` double(10,0) DEFAULT NULL,
  `FotoMobil` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`NoPlat`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mobil
-- ----------------------------
INSERT INTO `mobil` VALUES ('23', 'DD 2727 IL', 'HND', 'JZZ', 'Dipesan', '350000', 'FotoMobil-1568728004-17-Sep-2019.png');
INSERT INTO `mobil` VALUES ('28', 'DD 1321 XY', 'HND', 'JZZ', 'Jalan', '275000', 'FotoMobil-1569814624-30-Sep-2019.jpg');
INSERT INTO `mobil` VALUES ('29', 'DD 7878 AH', 'TYT', 'AGY', 'Kosong', '215000', 'FotoMobil-1571185117-16-Oct-2019.jpg');
INSERT INTO `mobil` VALUES ('30', 'DD 2727 AN', 'SZK', 'ER3', 'Kosong', '280000', 'FotoMobil-1571830355-23-Oct-2019.jpg');

-- ----------------------------
-- Table structure for `sopir`
-- ----------------------------
DROP TABLE IF EXISTS `sopir`;
CREATE TABLE `sopir` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `IdSopir` char(6) NOT NULL,
  `NIK` char(13) NOT NULL,
  `NmSopir` varchar(50) DEFAULT NULL,
  `Alamat` text,
  `NoTelp` char(13) DEFAULT NULL,
  `JenisKelamin` enum('P','L') DEFAULT NULL,
  `NoSim` char(20) DEFAULT NULL,
  `TarifPerhari` double(10,0) DEFAULT NULL,
  `StatusSopir` enum('Busy','Booked','Free') DEFAULT NULL,
  PRIMARY KEY (`id`,`IdSopir`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sopir
-- ----------------------------
INSERT INTO `sopir` VALUES ('3', 'SPR001', '172040', 'Muh. Rafly Hisyam', 'Dekat Fajar', '089672708681', 'L', '789876545678', '120000', 'Free');
INSERT INTO `sopir` VALUES ('4', 'SPR002', '172043', 'Muhammad Atma Nugraha', 'Dg. Ramang City', '087282828270', 'L', '72131231231', '150000', 'Free');
INSERT INTO `sopir` VALUES ('5', 'SPR003', '172069', 'Wahyudi', 'Dekat Nur', '086578771654', 'L', '092019201', '130000', 'Free');
INSERT INTO `sopir` VALUES ('7', 'SPR000', '-', '-', '-', '-', 'L', '-', '0', 'Booked');
INSERT INTO `sopir` VALUES ('8', 'SPR004', '102910', 'Yunita', 'Jl. jalan ki sama saya', '081182002233', 'P', '1221322', '350000', 'Busy');

-- ----------------------------
-- Table structure for `transaksi`
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `NoTransaksi` char(8) NOT NULL,
  `NIK` char(13) DEFAULT NULL,
  `Id_Mobil` int(3) DEFAULT NULL,
  `Tanggal_Pesan` date DEFAULT NULL,
  `Tanggal_Pinjam` date DEFAULT NULL,
  `Tanggal_Kembali_Rencana` date DEFAULT NULL,
  `Tanggal_Kembali_Sebenarnya` date DEFAULT NULL,
  `LamaRental` int(3) DEFAULT NULL,
  `LamaDenda` int(3) DEFAULT NULL,
  `Kerusakan` text,
  `Id_Sopir` char(6) DEFAULT NULL,
  `BiayaBBM` double(10,0) DEFAULT NULL,
  `BiayaKerusakan` double(10,0) DEFAULT NULL,
  `Denda` double(10,0) DEFAULT NULL,
  `Total_Bayar` double(10,0) DEFAULT NULL,
  `Jumlah_Bayar` double(10,0) DEFAULT NULL,
  `Kembalian` double(10,0) DEFAULT NULL,
  `StatusTransaksi` enum('Proses','Mulai','Batal','Arsip','Selesai') DEFAULT NULL,
  `Arsip` int(1) DEFAULT NULL,
  PRIMARY KEY (`NoTransaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES ('TRS00000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0');
INSERT INTO `transaksi` VALUES ('TRS00001', '0017093660', '30', '2019-10-25', '2019-10-25', '2019-10-27', '2019-10-25', '2', '0', 'Tidak ada kerusakan', 'SPR002', '100000', '100000', '0', '900000', '930000', '30000', 'Selesai', '1');
INSERT INTO `transaksi` VALUES ('TRS00002', '172037', '30', '2019-10-26', '2019-10-26', '2019-10-27', null, '1', null, null, 'SPR003', null, null, null, '430000', null, null, 'Batal', '1');
INSERT INTO `transaksi` VALUES ('TRS00003', '172037', '23', '2019-10-27', '2019-10-27', '2019-10-28', '2019-10-29', '1', '1', 'Hilang bannya satu', 'SPR002', '156000', '935000', '50000', '1791000', '1800000', '9000', 'Selesai', '0');
INSERT INTO `transaksi` VALUES ('TRS00004', '172060', '28', '2019-10-28', '2019-10-28', '2019-10-29', '2019-10-29', '1', '0', 'ceper langsung', 'SPR001', '45000', '100000', '0', '600000', '600000', '0', 'Selesai', '0');
INSERT INTO `transaksi` VALUES ('TRS00005', '172004', '30', '2019-10-29', '2019-10-29', '2019-10-31', null, '2', null, null, 'SPR003', null, null, null, '860000', null, null, 'Batal', '0');
INSERT INTO `transaksi` VALUES ('TRS00006', '172004', '23', '2019-10-31', '2019-10-31', '2019-11-01', '2019-10-31', '1', '0', 'Tak ada yang rusak', 'SPR001', '45000', '0', '50000', '420000', '420000', '0', 'Selesai', '0');
INSERT INTO `transaksi` VALUES ('TRS00007', '172037', '23', '2019-10-31', '2019-11-01', '2019-11-02', '2019-11-06', '1', '4', 'Aman terkendali.', 'SPR000', '53000', '0', '200000', '603000', '610000', '7000', 'Selesai', '0');
INSERT INTO `transaksi` VALUES ('TRS00008', '172037', '28', '2019-11-06', '2019-11-06', '2019-11-07', null, '1', null, null, 'SPR004', null, null, null, '625000', null, null, 'Mulai', '0');
INSERT INTO `transaksi` VALUES ('TRS00009', '172004', '23', '2019-11-07', '2019-11-07', '2019-11-08', null, '1', null, null, 'SPR000', null, null, null, '350000', null, null, 'Proses', '0');

-- ----------------------------
-- Table structure for `type`
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `IdType` varchar(20) NOT NULL,
  `NmType` varchar(50) DEFAULT NULL,
  `KdMerk` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`,`IdType`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('2', 'XNA', 'Xenia', 'DHT');
INSERT INTO `type` VALUES ('4', 'JZZ', 'Jazz', 'HND');
INSERT INTO `type` VALUES ('5', 'BRO', 'Brio', 'HND');
INSERT INTO `type` VALUES ('6', 'ER3', 'Ertiga', 'SZK');
INSERT INTO `type` VALUES ('7', 'AYL', 'Ayla', 'DHT');
INSERT INTO `type` VALUES ('8', 'YRS', 'Yaris', 'TYT');
INSERT INTO `type` VALUES ('9', 'SPR', 'Spark', 'CHV');
INSERT INTO `type` VALUES ('10', 'AGY', 'Agya', 'TYT');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `NIK` char(13) NOT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `NamaUser` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `JenisKelamin` enum('L','P') DEFAULT NULL,
  `Alamat` text,
  `NoTelp` varchar(13) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `RoleId` int(2) DEFAULT NULL,
  `IsActive` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`NIK`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '172039', 'Abel Ardhana S', 'abelardhana96@gmail.com', '$2y$10$JOng8ZGdgIXgh/vB2F4oAegdX9z8fLA7xC1ik0VeXeZ87ofberc4K', 'L', 'Jl. Goa Ria, Pondok Asri 1 Blok A7 No.10', '087816973617', 'Abel Ardhana S-1572387198-29-Oct-2019.jpg', '1', '1');
INSERT INTO `users` VALUES ('2', '172047', 'Nur Fitriani S', 'nrftrianis12@gmail.com', '$2y$10$fu4iwdXVOgLBfwr6ship0.ftNzLSLKCmKTygeWFdD.lBNGZ6rbg1u', 'P', 'Jl. Abdurrahman, samping gerbang Yayasan', '087817535342', 'Nur Fitriani S-1572513250-31-Oct-2019.jpg', '2', '1');
INSERT INTO `users` VALUES ('11', '250001', 'Muh Abidzar S', 'Abidzar.s@gmail.com', '$2y$10$oAedzcwuh97yAUV1hxlFJexP18RmrwCrGmNNIyigvjh87UBU.el9K', 'L', 'Jl. Baruga', '087816973617', 'default.png', '2', '1');
INSERT INTO `users` VALUES ('12', '172060', 'Mitra', 'mitra.madara@gmail.com', '$2y$10$g0RTu4rjb0mq7JC/NEtupOMl.Wk48QE4OJ7KRBC1AyR.iDIrQ8Yi2', 'L', 'Bengkel Tunas Jaya Motor', '085200000000', 'Mitra-1570106394-03-Oct-2019.jpg', '3', '1');
INSERT INTO `users` VALUES ('21', '0017093660', 'Ryan Midzar Wiradinata Ramli', 'ryanmizarwiradinata@gmail.com', '$2y$10$uwyJ9ODo1Z3IOn2Nkt4IUOSF5CiYSWUrvqwUFY8syNX/O0eLCEWXG', 'L', 'BTP Blok Ad Keberkahan No.202', '087800571806', 'Ryan Midzar Wiradinata Ramli-1570150999-04-Oct-2019.jpg', '3', '1');
INSERT INTO `users` VALUES ('22', '172037', 'Muh Fajar Putra Ramadhan', 'fajar@mail.comge', '$2y$10$XG4vMYUyOnGJcEGLwQJVi.jC30pJSDuW/UO6G55bJHhepN4C0KJB6', 'L', 'Jalan jalan ki ke tirta garden, jangan lupa terus2 ki, mungkin ada rumah fajar, jangan lupa assalamualaikum', '088090100201', 'Muh Fajar Putra Ramadhan-1572521961-31-Oct-2019.jpg', '3', '1');
INSERT INTO `users` VALUES ('27', '210018', 'Hamasa Aisyah', 'aisyah.hamasah@gmail.com', '$2y$10$AngzyLsOlsewoXSYZi9ZNuozcIi373eOK0yYWVxJjyzrHkNZWJ6du', 'P', 'Rumahnya dana', '0878-1697-534', 'default.png', '3', '0');
INSERT INTO `users` VALUES ('28', '172066', 'Sultan Ainan', 'sultan.kaya@gmail.com', '$2y$10$l96Hpm2FZNtBWiBerSkFSu8gIt9sXVbtHVTSKjAyTmNYZZyDQImrq', 'L', 'Jalan jalan', '0878-8818-181', 'default.png', '3', '0');
INSERT INTO `users` VALUES ('29', '172004', 'Andi Ahmad Nur Khaidir', 'ur.hika29@gmail.com', '$2y$10$.GAyc7yjIp1Pfmt5/6XaHusA.BrZuouEyDn7fbLUagaLb7kTy83p.', 'L', 'Gor', '088888888888', 'default.png', '3', '1');

-- ----------------------------
-- Table structure for `user_role`
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES ('1', 'Admin');
INSERT INTO `user_role` VALUES ('2', 'Karyawan');
INSERT INTO `user_role` VALUES ('3', 'Pelanggan');

-- ----------------------------
-- View structure for `viewmobil`
-- ----------------------------
DROP VIEW IF EXISTS `viewmobil`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewmobil` AS select `mobil`.`id` AS `id`,`mobil`.`NoPlat` AS `NoPlat`,`mobil`.`KdMerk` AS `KdMerk`,`mobil`.`IdType` AS `IdType`,`mobil`.`StatusRental` AS `StatusRental`,`mobil`.`HargaSewa` AS `HargaSewa`,`mobil`.`FotoMobil` AS `FotoMobil`,`merk`.`NmMerk` AS `NmMerk`,`type`.`NmType` AS `NmType` from ((`mobil` join `type` on((`mobil`.`IdType` = `type`.`IdType`))) join `merk` on((`mobil`.`KdMerk` = `merk`.`KdMerk`))) ;

-- ----------------------------
-- View structure for `viewtransaksi`
-- ----------------------------
DROP VIEW IF EXISTS `viewtransaksi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewtransaksi` AS select `transaksi`.`NoTransaksi` AS `NoTransaksi`,`transaksi`.`NIK` AS `NIK`,`transaksi`.`Id_Mobil` AS `Id_Mobil`,`transaksi`.`Tanggal_Pesan` AS `Tanggal_Pesan`,`transaksi`.`Tanggal_Pinjam` AS `Tanggal_Pinjam`,`transaksi`.`Tanggal_Kembali_Rencana` AS `Tanggal_Kembali_Rencana`,`transaksi`.`Tanggal_Kembali_Sebenarnya` AS `Tanggal_Kembali_Sebenarnya`,`transaksi`.`LamaRental` AS `LamaRental`,`transaksi`.`LamaDenda` AS `LamaDenda`,`transaksi`.`Kerusakan` AS `Kerusakan`,`transaksi`.`Id_Sopir` AS `Id_Sopir`,`transaksi`.`BiayaBBM` AS `BiayaBBM`,`transaksi`.`BiayaKerusakan` AS `BiayaKerusakan`,`transaksi`.`Denda` AS `Denda`,`transaksi`.`Total_Bayar` AS `Total_Bayar`,`transaksi`.`Jumlah_Bayar` AS `Jumlah_Bayar`,`transaksi`.`Kembalian` AS `Kembalian`,`transaksi`.`StatusTransaksi` AS `StatusTransaksi`,`users`.`Nama` AS `Nama`,`users`.`NamaUser` AS `NamaUser`,`viewmobil`.`NoPlat` AS `NoPlat`,`viewmobil`.`NmMerk` AS `NmMerk`,`viewmobil`.`NmType` AS `NmType`,`viewmobil`.`HargaSewa` AS `HargaSewa`,`sopir`.`NmSopir` AS `NmSopir`,`sopir`.`TarifPerhari` AS `TarifPerhari`,`users`.`id` AS `id`,`transaksi`.`Arsip` AS `Arsip` from (((`transaksi` join `viewmobil` on((`transaksi`.`Id_Mobil` = `viewmobil`.`id`))) join `sopir` on((`transaksi`.`Id_Sopir` = `sopir`.`IdSopir`))) join `users` on((`transaksi`.`NIK` = `users`.`NIK`))) ;

-- ----------------------------
-- View structure for `viewtype`
-- ----------------------------
DROP VIEW IF EXISTS `viewtype`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewtype` AS select `type`.`id` AS `id`,`type`.`IdType` AS `IdType`,`type`.`NmType` AS `NmType`,`type`.`KdMerk` AS `KdMerk`,`merk`.`NmMerk` AS `NmMerk` from (`type` join `merk` on((`type`.`KdMerk` = `merk`.`KdMerk`))) ;

-- ----------------------------
-- View structure for `viewusers`
-- ----------------------------
DROP VIEW IF EXISTS `viewusers`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewusers` AS select `users`.`id` AS `id`,`users`.`NIK` AS `NIK`,`users`.`Nama` AS `Nama`,`users`.`NamaUser` AS `NamaUser`,`users`.`Password` AS `Password`,`users`.`JenisKelamin` AS `JenisKelamin`,`users`.`Alamat` AS `Alamat`,`users`.`NoTelp` AS `NoTelp`,`users`.`Foto` AS `Foto`,`users`.`RoleId` AS `RoleId`,`users`.`IsActive` AS `IsActive`,`user_role`.`role` AS `role` from (`users` join `user_role` on((`users`.`RoleId` = `user_role`.`id`))) ;

/*
Navicat MySQL Data Transfer

Source Server         : Database
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : project_rental

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-11-13 12:52:12
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

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
INSERT INTO `merk` VALUES ('20', 'WLI', 'Wuling');

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
  `JenisMobil` varchar(20) DEFAULT NULL,
  `Transmisi` enum('Manual','CVT','Matic') DEFAULT NULL,
  `FotoMobil` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`NoPlat`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mobil
-- ----------------------------
INSERT INTO `mobil` VALUES ('33', 'DD 34 AD', 'TYT', 'AVZ-V-AT', 'Kosong', '315000', 'MPV', 'Matic', 'FotoMobil-1573251530-08-Nov-2019.png');
INSERT INTO `mobil` VALUES ('34', 'DD 1717 AA', 'HND', 'MBL-S-MT', 'Kosong', '320000', 'MPV', 'Manual', 'FotoMobil-1573300731-09-Nov-2019.jpg');
INSERT INTO `mobil` VALUES ('35', 'DD 2378 AO', 'HND', 'MBL-RS', 'Jalan', '335000', 'MPV', 'CVT', 'FotoMobil-1573300839-09-Nov-2019.png');
INSERT INTO `mobil` VALUES ('37', 'DD 3421 YU', 'SZK', 'ER3-GX-AT', 'Kosong', '284000', 'MPV', 'Matic', 'FotoMobil-1573305978-09-Nov-2019.png');
INSERT INTO `mobil` VALUES ('38', 'DD 8247 AJ', 'NSN', 'GL-HWS', 'Dipesan', '312000', 'MPV', 'CVT', 'FotoMobil-1573301562-09-Nov-2019.png');
INSERT INTO `mobil` VALUES ('39', 'DE 1928 AA', 'DHT', 'XNA-R', 'Kosong', '278000', 'MPV', 'Manual', 'FotoMobil-1573302357-09-Nov-2019.jpg');
INSERT INTO `mobil` VALUES ('40', 'DF 2421 AT', 'TYT', 'YRS-E-AT', 'Dipesan', '290000', 'City', 'Matic', 'FotoMobil-1573303283-09-Nov-2019.png');
INSERT INTO `mobil` VALUES ('41', 'DD 5432 GG', 'SZK', 'SWF-S', 'Kosong', '300000', 'City', 'CVT', 'FotoMobil-1573303450-09-Nov-2019.png');
INSERT INTO `mobil` VALUES ('42', 'DD 1810 AN', 'HND', 'JZZ-S-MT', 'Kosong', '1810000', 'City', 'Manual', 'FotoMobil-1573303676-09-Nov-2019.png');
INSERT INTO `mobil` VALUES ('43', 'DD 3543', 'MBS', 'MRG-GLX', 'Kosong', '278000', 'City', 'Manual', 'FotoMobil-1573304827-09-Nov-2019.png');
INSERT INTO `mobil` VALUES ('44', 'DD 1080 NA', 'HND', 'CVC-H-LS', 'Kosong', '1080000', 'Sedan', 'CVT', 'FotoMobil-1573305521-09-Nov-2019.png');
INSERT INTO `mobil` VALUES ('45', 'DD 4882 UL', 'TYT', 'CRL-G-MT', 'Kosong', '311000', 'Sedan', 'Manual', 'FotoMobil-1573305870-09-Nov-2019.png');
INSERT INTO `mobil` VALUES ('46', 'DD 245 HG', 'HND', 'HRV-G-MT', 'Kosong', '320000', 'SUV', 'Manual', 'FotoMobil-1573306259-09-Nov-2019.png');
INSERT INTO `mobil` VALUES ('47', 'DD 129 MT', 'MBS', 'EXP-G-MT', 'Kosong', '370000', 'SUV', 'Manual', 'FotoMobil-1573306954-09-Nov-2019.jpg');
INSERT INTO `mobil` VALUES ('48', 'DD 90 FF', 'HND', 'CR-V-P-AT', 'Kosong', '385000', 'SUV', 'Matic', 'FotoMobil-1573307000-09-Nov-2019.png');
INSERT INTO `mobil` VALUES ('49', 'DD 34 HH', 'TYT', 'R-TRDS-AT', 'Kosong', '365000', 'SUV', 'Matic', 'FotoMobil-1573307054-09-Nov-2019.png');
INSERT INTO `mobil` VALUES ('50', 'DD 6464 KU', 'DHT', 'TRS-X-MT', 'Kosong', '377000', 'SUV', 'Manual', 'FotoMobil-1573307115-09-Nov-2019.png');
INSERT INTO `mobil` VALUES ('51', 'DD 69 AW', 'TYT', 'FRT-VRZ-4x', 'Kosong', '400000', 'SUV', 'Matic', 'FotoMobil-1573307240-09-Nov-2019.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sopir
-- ----------------------------
INSERT INTO `sopir` VALUES ('9', 'SPR000', '-', '-', '-', '-', 'L', '-', '0', 'Busy');
INSERT INTO `sopir` VALUES ('10', 'SPR001', '172040', 'Muh. Rafly Hisyam', 'Taman Sudiang', '088812313211', 'L', '817381790', '210000', 'Free');
INSERT INTO `sopir` VALUES ('11', 'SPR002', '172069', 'Wahyudi', 'Dekat penjual stiker', '081278991213', 'L', '19397147', '195000', 'Free');
INSERT INTO `sopir` VALUES ('12', 'SPR003', '172043', 'Muhammad Atma Nugraha', 'Dg. Ramang City', '087312393987', 'L', '0138842917', '250000', 'Free');
INSERT INTO `sopir` VALUES ('13', 'SPR004', '120308', 'Bang Kumis', 'Jl. Perumnas Sudiang', '081271289991', 'L', '12039138', '180000', 'Booked');
INSERT INTO `sopir` VALUES ('14', 'SPR005', '172041', 'Muh. Saiful', 'Dekat tower, Laikang', '087823813115', 'L', '1923739', '174000', 'Booked');
INSERT INTO `sopir` VALUES ('15', 'SPR006', '11308', 'Mamang Garox', 'Masih stay disini', '081169696969', 'L', '696969', '690000', 'Free');

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
INSERT INTO `transaksi` VALUES ('TRS00001', '172060', '46', '2019-11-10', '2019-11-10', '2019-11-11', '2019-11-11', '1', '0', 'Rusak spion kanan', 'SPR001', '100000', '100000', '0', '730000', '750000', '20000', 'Selesai', '0');
INSERT INTO `transaksi` VALUES ('TRS00002', '172037', '47', '2019-11-11', '2019-11-11', '2019-11-12', '2019-11-12', '1', '0', 'Ban belakang bagian kanan, kempes.', 'SPR006', '0', '5000', '0', '1065000', '1070000', '5000', 'Selesai', '0');
INSERT INTO `transaksi` VALUES ('TRS00003', '0017093660', '35', '2019-11-12', '2019-11-12', '2019-11-13', null, '1', null, null, 'SPR000', null, null, null, '335000', null, null, 'Mulai', '0');
INSERT INTO `transaksi` VALUES ('TRS00004', '172037', '38', '2019-11-13', '2019-11-13', '2019-11-14', null, '1', null, null, 'SPR005', null, null, null, '486000', null, null, 'Proses', '0');
INSERT INTO `transaksi` VALUES ('TRS00005', '172060', '40', '2019-11-13', '2019-11-13', '2019-11-15', null, '2', null, null, 'SPR004', null, null, null, '940000', null, null, 'Proses', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('11', 'AVZ-G-MT', 'Avanza 1.5 G MT', 'TYT');
INSERT INTO `type` VALUES ('12', 'AVZ-V-AT', 'Avanza Veloz 1.3 AT', 'TYT');
INSERT INTO `type` VALUES ('13', 'MBL-S-MT', 'Mobilio 2017 S MT', 'HND');
INSERT INTO `type` VALUES ('14', 'MBL-RS', 'Mobilio RS', 'HND');
INSERT INTO `type` VALUES ('16', 'ER3-GX-AT', 'Ertiga GX AT', 'SZK');
INSERT INTO `type` VALUES ('17', 'GL-HWS', 'Grand Livina HWS', 'NSN');
INSERT INTO `type` VALUES ('18', 'XNA-R', 'Xenia R', 'DHT');
INSERT INTO `type` VALUES ('19', 'YRS-E-AT', 'Yaris 1.5 E AT', 'TYT');
INSERT INTO `type` VALUES ('20', 'SWF-S', 'Swift Sport', 'SZK');
INSERT INTO `type` VALUES ('21', 'JZZ-S-MT', 'Jazz S MT', 'HND');
INSERT INTO `type` VALUES ('22', 'MRG-GLX', 'Mirage GLX', 'MBS');
INSERT INTO `type` VALUES ('23', 'CRL-G-MT', 'Corolla Altis G MT', 'TYT');
INSERT INTO `type` VALUES ('24', 'CVC-H-LS', 'Civic Hatchback LS', 'HND');
INSERT INTO `type` VALUES ('25', 'HRV-G-MT', 'HRV G MT', 'HND');
INSERT INTO `type` VALUES ('26', 'EXP-G-MT', 'Expander G MT', 'MBS');
INSERT INTO `type` VALUES ('27', 'CR-V-P-AT', 'CR-V 2.4L Prestige AT', 'HND');
INSERT INTO `type` VALUES ('28', 'R-TRDS-AT', 'Rush TRD S AT', 'TYT');
INSERT INTO `type` VALUES ('29', 'TRS-X-MT', 'Terios X MT', 'DHT');
INSERT INTO `type` VALUES ('30', 'FRT-VRZ-4x4-AT', 'Fortuner VRZ 4x4 AT', 'TYT');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

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
INSERT INTO `users` VALUES ('30', '21001', 'Abil Ardhaya S', 'abilardhana2414@gmail.com', '$2y$10$rj.KsxJYLSf9AKyX1XmHN.47ww8xj0B1IoFwC/NMIPnk4X9NYbD3q', 'L', 'Jl. Kima 10', '087854352128', 'default.png', '2', '1');

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
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewmobil` AS select `mobil`.`id` AS `id`,`mobil`.`NoPlat` AS `NoPlat`,`mobil`.`KdMerk` AS `KdMerk`,`mobil`.`IdType` AS `IdType`,`mobil`.`StatusRental` AS `StatusRental`,`mobil`.`HargaSewa` AS `HargaSewa`,`mobil`.`FotoMobil` AS `FotoMobil`,`merk`.`NmMerk` AS `NmMerk`,`type`.`NmType` AS `NmType`,`mobil`.`JenisMobil` AS `JenisMobil`,`mobil`.`Transmisi` AS `Transmisi` from ((`mobil` join `type` on((`mobil`.`IdType` = `type`.`IdType`))) join `merk` on((`mobil`.`KdMerk` = `merk`.`KdMerk`))) ;

-- ----------------------------
-- View structure for `viewtransaksi`
-- ----------------------------
DROP VIEW IF EXISTS `viewtransaksi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewtransaksi` AS select `transaksi`.`NoTransaksi` AS `NoTransaksi`,`transaksi`.`NIK` AS `NIK`,`transaksi`.`Id_Mobil` AS `Id_Mobil`,`transaksi`.`Tanggal_Pesan` AS `Tanggal_Pesan`,`transaksi`.`Tanggal_Pinjam` AS `Tanggal_Pinjam`,`transaksi`.`Tanggal_Kembali_Rencana` AS `Tanggal_Kembali_Rencana`,`transaksi`.`Tanggal_Kembali_Sebenarnya` AS `Tanggal_Kembali_Sebenarnya`,`transaksi`.`LamaRental` AS `LamaRental`,`transaksi`.`LamaDenda` AS `LamaDenda`,`transaksi`.`Kerusakan` AS `Kerusakan`,`transaksi`.`Id_Sopir` AS `Id_Sopir`,`transaksi`.`BiayaBBM` AS `BiayaBBM`,`transaksi`.`BiayaKerusakan` AS `BiayaKerusakan`,`transaksi`.`Denda` AS `Denda`,`transaksi`.`Total_Bayar` AS `Total_Bayar`,`transaksi`.`Jumlah_Bayar` AS `Jumlah_Bayar`,`transaksi`.`Kembalian` AS `Kembalian`,`transaksi`.`StatusTransaksi` AS `StatusTransaksi`,`users`.`Nama` AS `Nama`,`users`.`NamaUser` AS `NamaUser`,`sopir`.`NmSopir` AS `NmSopir`,`sopir`.`TarifPerhari` AS `TarifPerhari`,`users`.`id` AS `id`,`transaksi`.`Arsip` AS `Arsip`,`viewmobil`.`NoPlat` AS `NoPlat`,`viewmobil`.`HargaSewa` AS `HargaSewa`,`viewmobil`.`NmMerk` AS `NmMerk`,`viewmobil`.`NmType` AS `NmType` from (((`transaksi` join `sopir` on((`transaksi`.`Id_Sopir` = `sopir`.`IdSopir`))) join `users` on((`transaksi`.`NIK` = `users`.`NIK`))) join `viewmobil` on((`transaksi`.`Id_Mobil` = `viewmobil`.`id`))) ;

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

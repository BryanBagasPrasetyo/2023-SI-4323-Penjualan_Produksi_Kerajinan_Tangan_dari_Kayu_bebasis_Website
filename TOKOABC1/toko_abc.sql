/*
SQLyog Community v13.1.3  (32 bit)
MySQL - 5.6.24 : Database - toko_abc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`toko_abc` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `toko_abc`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `hrg` double DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang` */

insert  into `barang`(`id`,`nama`,`hrg`,`jml`,`keterangan`,`foto`) values 
(1,'aglonema Suksom',45000,10,'aglonema','aglonemaSuksom.jpg'),
(2,'aglonema Rotundum Aceh',30000,10,'-','aglonemaRotundumAceh.jpg'),
(3,'aglonema RoDudAnjamani',75000,10,'-','aglonemaRoDudAnjamani.jpg'),
(4,'aglonemaSnowWhiteRemaja',77,10,'-','aglonemaSnowWhiteRemaja.jpg'),
(5,'aglonemaSuperWhite',90000,50,'-','aglonemaSuperWhite.jpg'),
(6,'aglonemaVenus',90000,10,'77','aglonemaVenus.jpg'),
(7,'aglonemaRedAnjamaniDewasa',75000,10,'-','aglonemaRedAnjamaniDewasa.jpg'),
(8,'aglonemaAyunindi',35000,10,'-','aglonemaAyunindi.jpg'),
(9,'aglonemaKhocin',35000,5,'-','aglonemaKhocin.jpg');

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_member` varchar(40) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `alamat` varchar(60) DEFAULT NULL,
  `kota` varchar(40) DEFAULT NULL,
  `provinsi` varchar(40) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `member` */

insert  into `member`(`id`,`nama_member`,`email`,`telp`,`alamat`,`kota`,`provinsi`,`gender`,`username`,`password`,`foto`) values 
(1,'agus','agus@gmail.com','1234','Jl Melati IV 212','semarang','jateng','1','agus','123','orang3.jpg'),
(2,'joko','joko@gmail.com',NULL,'jl jalan bambu','Semarang','Jateng',NULL,'joko','123','avatar_g2.jpg'),
(4,'Adul','adul@gmail.com',NULL,'jl melati sukma 12','pekalongan','Jaten',NULL,'adul','123','avatar_smoke.jpg');

/*Table structure for table `tbkategori` */

DROP TABLE IF EXISTS `tbkategori`;

CREATE TABLE `tbkategori` (
  `idkategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idkategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbkategori` */

insert  into `tbkategori`(`idkategori`,`nama_kategori`,`foto`,`keterangan`) values 
(1,'anggrek','anggrek.jpg','bunga anggrek'),
(2,'Tanaman Hias Daun','tanamanhiasdaun.jpg','bunga hias daun'),
(3,'Tanaman hias bunga','tanamanhiasbunga.jpg','Tanaman bunga hias'),
(4,'Tanaman buah','tanamanbuah.jpg','Tanaman buah strawberry');

/*Table structure for table `tborder` */

DROP TABLE IF EXISTS `tborder`;

CREATE TABLE `tborder` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idmember` int(10) NOT NULL,
  `tgl` date NOT NULL,
  `jenisByr` varchar(20) DEFAULT NULL,
  `bank` varchar(40) DEFAULT NULL,
  `norek` varchar(40) DEFAULT NULL,
  `biayaKirim` double DEFAULT NULL,
  `pembelian` double DEFAULT NULL,
  `totalByr` double DEFAULT NULL,
  `ekspedisi` varchar(40) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tborder` */

/*Table structure for table `tborder_detail` */

DROP TABLE IF EXISTS `tborder_detail`;

CREATE TABLE `tborder_detail` (
  `idorder` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `jml` float NOT NULL,
  `hrg` int(11) NOT NULL,
  PRIMARY KEY (`idorder`,`idbarang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tborder_detail` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `iduser` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`iduser`,`username`,`password`,`foto`) values 
(1,'admin','123','aglonemaSuksom.jpg'),
(2,'Fauzan','123','foto1.jpg'),
(4,'amin aaaaa','123456','foto2.jpg'),
(5,'aaa','12345','foto3.jpg'),
(7,'Kiko','123','orang3.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

/*
SQLyog Ultimate v9.50 
MySQL - 5.5.5-10.4.32-MariaDB : Database - sampah
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sampah` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `sampah`;

/*Table structure for table `tb_notif` */

DROP TABLE IF EXISTS `tb_notif`;

CREATE TABLE `tb_notif` (
  `id_notif` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` datetime DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `level` varchar(16) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `id_user` varchar(16) DEFAULT NULL,
  `status_notif` tinyint(11) DEFAULT NULL,
  PRIMARY KEY (`id_notif`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_notif` */

insert  into `tb_notif`(`id_notif`,`waktu`,`judul`,`level`,`link`,`id_user`,`status_notif`) values (5,'2024-08-31 14:21:56','Ari Ayuni mendaftar sebagai warga.','kabid','m=warga_show&ID=3',NULL,1),(6,'2024-08-31 14:35:45','1 mendaftar sebagai warga.','kabid','m=warga_show&ID=4',NULL,1),(7,'2024-08-31 14:38:35','Status Anda sudah tidak aktif.','warga','m=warga_profil','1',1),(8,'2024-08-31 14:38:42','Status Anda sudah aktif.','warga','m=warga_profil','1',1),(9,'2024-08-31 14:41:19','Herdiana melakukan pengaduan.','kasi','m=pengaduan_ubah&ID=4',NULL,1),(11,'2024-08-31 14:48:19','Status pengaduan Anda telah diubah menjadi Diproses.','warga','m=pengaduan','1',1),(12,'2024-08-31 14:48:42','Status pengaduan Anda telah diubah menjadi Diproses.','warga','m=pengaduan','1',1),(13,'2024-08-31 14:48:46','Status pengaduan Anda telah diubah menjadi Selesai.','warga','m=pengaduan','1',1),(14,'2024-08-31 14:55:38','Herdiana menabung sebanyak 15.','pengepul','m=tabungan_ubah&ID=1','2',0),(16,'2024-08-31 15:09:17','Rengga mendaftar sebagai pengepul.','kabid','m=pengepul_show&ID=1',NULL,1),(17,'2024-08-31 16:41:56','Status Anda sudah aktif.','pengepul','m=pengepul_profil','1',1),(18,'2024-08-31 17:02:29','Herdiana menabung sebanyak 15.','pengepul','m=tabungan_ubah&ID=1','1',1),(19,'2024-08-31 17:13:38','Tabungan selesai diproses, saldo berhasil ditambahkan.','warga','m=saldo','1',1),(20,'2024-09-07 11:41:59','Profil Anda diubah oleh petugas!','warga','m=warga_profil','3',0),(21,'2024-09-07 11:48:39','Profil Anda diubah oleh petugas!','pengepul','m=pengepul_profil','1',0);

/*Table structure for table `tb_pengaduan` */

DROP TABLE IF EXISTS `tb_pengaduan`;

CREATE TABLE `tb_pengaduan` (
  `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT,
  `waktu_pengaduan` datetime DEFAULT NULL,
  `id_warga` varchar(16) DEFAULT NULL,
  `nama_pengaduan` varchar(255) DEFAULT NULL,
  `foto_pengaduan` varchar(255) DEFAULT NULL,
  `alamat_pengaduan` varchar(255) DEFAULT NULL,
  `detail_pengaduan` varchar(255) DEFAULT NULL,
  `status_pengaduan` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_pengaduan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tb_pengaduan` */

insert  into `tb_pengaduan`(`id_pengaduan`,`waktu_pengaduan`,`id_warga`,`nama_pengaduan`,`foto_pengaduan`,`alamat_pengaduan`,`detail_pengaduan`,`status_pengaduan`) values (1,'2024-08-16 16:40:54','1','Sampah Menumpuk','3680g1.jpg','Jl. Nangka No. 1','Sudah 3 hari dan berserakan.',2),(2,'2024-08-19 17:40:12','1','Pengaduan 3','4603foto-tidak-buram.png','Jl. Nangka No. 1','-',1),(3,'2024-08-19 17:41:13','1','Pengaduan 4','2621foto-tidak-buram.png','Jl. Nangka No. 1','-',0),(4,'2024-08-31 14:41:19','1','Sampah Menumpuk','526311.jpg','Jl. Nangka No. 1','Cek saja.',0);

/*Table structure for table `tb_pengepul` */

DROP TABLE IF EXISTS `tb_pengepul`;

CREATE TABLE `tb_pengepul` (
  `id_pengepul` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengepul` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telpon` varchar(255) DEFAULT NULL,
  `layanan` text DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `status_pengepul` tinyint(4) DEFAULT NULL,
  `harga_pengepul` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pengepul`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tb_pengepul` */

insert  into `tb_pengepul`(`id_pengepul`,`nama_pengepul`,`alamat`,`email`,`telpon`,`layanan`,`user`,`pass`,`status_pengepul`,`harga_pengepul`) values (1,'Rengga','Denpasar','rengga@gmail.com','1234567890','Layanan saya','rengga','rengga',1,15000);

/*Table structure for table `tb_saldo` */

DROP TABLE IF EXISTS `tb_saldo`;

CREATE TABLE `tb_saldo` (
  `id_saldo` int(11) NOT NULL AUTO_INCREMENT,
  `id_warga` int(11) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `debet` int(11) DEFAULT NULL,
  `kredit` int(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_saldo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_saldo` */

insert  into `tb_saldo`(`id_saldo`,`id_warga`,`waktu`,`debet`,`kredit`,`saldo`,`keterangan`) values (1,1,'2024-08-31 17:13:38',225000,0,225000,'Tabungan sejumlah 15'),(5,1,'2024-08-31 17:53:06',0,100000,125000,'Penarikan sejumlah 100.000');

/*Table structure for table `tb_tabungan` */

DROP TABLE IF EXISTS `tb_tabungan`;

CREATE TABLE `tb_tabungan` (
  `id_tabungan` int(11) NOT NULL AUTO_INCREMENT,
  `id_warga` int(11) DEFAULT NULL,
  `id_pengepul` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `ket_tabungan` varchar(255) DEFAULT NULL,
  `status_tabungan` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_tabungan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tb_tabungan` */

insert  into `tb_tabungan`(`id_tabungan`,`id_warga`,`id_pengepul`,`tanggal`,`jumlah`,`ket_tabungan`,`status_tabungan`) values (1,1,1,'2024-08-31','15','Tabungan 1',1);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(255) DEFAULT NULL,
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL,
  `level` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`nama_user`,`user`,`pass`,`level`) values (1,'Administrator','admin','admin','admin'),(2,'Kasi PS','kasi','kasi','kasi'),(3,'Kabid PS3','kabid','kabid','kabid');

/*Table structure for table `tb_warga` */

DROP TABLE IF EXISTS `tb_warga`;

CREATE TABLE `tb_warga` (
  `id_warga` int(11) NOT NULL AUTO_INCREMENT,
  `nama_warga` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telpon` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `status_warga` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_warga`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tb_warga` */

insert  into `tb_warga`(`id_warga`,`nama_warga`,`alamat`,`email`,`telpon`,`user`,`pass`,`status_warga`) values (1,'Herdiana','Jl. Nangka No. 1 ','herdi@gmail.com ','1234567890 ','herdi','herdi',1),(3,'Ari Ayuni','Denpasar','ari@gmail.com','1234567890','ari','ari',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

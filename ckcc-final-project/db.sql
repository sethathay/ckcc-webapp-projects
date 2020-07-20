/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.17 : Database - final
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`final` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `final`;

/*Table structure for table `tblnewsfeed` */

DROP TABLE IF EXISTS `tblnewsfeed`;

CREATE TABLE `tblnewsfeed` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tblnewsfeed` */

insert  into `tblnewsfeed`(`id`,`title`,`description`,`created`) values (1,'Visit of PNC to The University test','test','2015-09-12 07:34:17');

/*Table structure for table `tblstudents` */

DROP TABLE IF EXISTS `tblstudents`;

CREATE TABLE `tblstudents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcard` varchar(10) DEFAULT NULL,
  `firstname` varchar(500) DEFAULT NULL,
  `lastname` varchar(500) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL COMMENT '1: Male 2: Female',
  `address` varchar(500) DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `rank` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tblstudents` */

insert  into `tblstudents`(`id`,`idcard`,`firstname`,`lastname`,`gender`,`address`,`class`,`rank`) values (1,'001','tes','test','2','pp','12','1'),(2,'002','pin','len','1','pp','12','2');

/*Table structure for table `tblusers` */

DROP TABLE IF EXISTS `tblusers`;

CREATE TABLE `tblusers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(500) DEFAULT NULL,
  `lastname` varchar(500) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tblusers` */

insert  into `tblusers`(`id`,`firstname`,`lastname`,`username`,`password`) values (1,'Setha','Thay','sethathay@gmail.com','A@#123'),(2,'Ky','Piseth','k.piseth@khmerdev.com','B@#123');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

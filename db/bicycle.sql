/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.5-10.1.25-MariaDB : Database - bicycle
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bicycle` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bicycle`;

/*Table structure for table `backend_user` */

DROP TABLE IF EXISTS `backend_user`;

CREATE TABLE `backend_user` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `backend_user` */

/*Table structure for table `bicycle_brand` */

DROP TABLE IF EXISTS `bicycle_brand`;

CREATE TABLE `bicycle_brand` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `bicycle_brand` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `bicycle_brand` */

insert  into `bicycle_brand`(`id`,`bicycle_brand`,`description`) values (1,'Core','Core is a bicycle brand developed by lion cycle.'),(2,'Raleigh','Raleigh is an old company with good reputation.'),(3,'Duronto','Duronto is a bangladeshi brand. It produces bicycle that are under the budget of middle class people.');

/*Table structure for table `bicycle_info` */

DROP TABLE IF EXISTS `bicycle_info`;

CREATE TABLE `bicycle_info` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `bicycle_model` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `quantity` int(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

/*Data for the table `bicycle_info` */

insert  into `bicycle_info`(`id`,`bicycle_model`,`brand`,`price`,`quantity`,`image_url`) values (1,'Core Slash','Core',17000,5,NULL),(2,'Duronto Mountain Bike','Duronto',16000,5,NULL),(3,'Nekro 501','Nekro',15000,5,NULL),(4,'Phoneix 1100','Phoneix',12500,5,NULL),(20,'Core Slash','Core',16500,5,'core slash.jpg'),(21,'Core Slash','Core',16500,5,'core slash.jpg'),(25,'Phoneix 1100','Raleigh',12500,5,'core slash.jpg'),(26,'Phoneix 1100','Core',12500,5,'core slash.jpg'),(27,'Phoneix 1100','Duronto',16500,5,'core slash wrong.jpg'),(28,'Phoneix 1100','Core',12500,5,'core slash wrong.jpg');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `status` int(255) DEFAULT NULL,
  `created_at` int(255) DEFAULT NULL,
  `updated_at` int(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password_hash`,`password_reset_token`,`email`,`auth_key`,`status`,`created_at`,`updated_at`,`password`) values (0,'refat2','$2y$13$4T0I5QUf0CYzJtOxKAQTVeiRFxktIxd5.twy7PXLN1HJPFikt5vUu',NULL,'refat@unlocklive.com','YF8kCddUCph9BMPlBOh93nvIapQeVf9u',10,1511252690,1511252690,''),(1,'refat',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'refat');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

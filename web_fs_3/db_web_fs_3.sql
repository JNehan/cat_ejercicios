/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 8.0.31 : Database - web_fs_3
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`web_fs_3` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `web_fs_3`;

/*Table structure for table `reservation` */

DROP TABLE IF EXISTS `reservation`;

CREATE TABLE `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(91) DEFAULT NULL,
  `email` varchar(91) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `destination` varchar(10) DEFAULT NULL,
  `schedule` time DEFAULT NULL,
  `service_type` varchar(10) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

/*Data for the table `reservation` */

/* Procedure structure for procedure `save_book` */

/*!50003 DROP PROCEDURE IF EXISTS  `save_book` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `save_book`(
  IN _name VARCHAR (91),
  IN _email VARCHAR (91),
  IN _phone varchar (20),
  IN _destination varchar (10),
  IN _schedule time,
  IN _service_type varchar (10),
  IN _total float
)
BEGIN
  INSERT INTO `web_fs_3`.`reservation` (
    `id`,
    `name`,
    `email`,
    `phone`,
    `destination`,
    `schedule`,
    `service_type`,
    `total`,
    `status`
  ) 
  VALUES
    (
      null,
      _name,
      _email,
      _phone,
      _destination,
      _schedule,
      _service_type,
      _total,
      1
    ) ;
  SELECT LAST_INSERT_ID() ;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

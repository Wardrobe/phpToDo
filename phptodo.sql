/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.7.9 : Database - phptodo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`phptodo` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `phptodo`;

/*Table structure for table `podstavka` */

DROP TABLE IF EXISTS `podstavka`;

CREATE TABLE `podstavka` (
  `StavkaID` int(11) NOT NULL,
  `PodstavkaID` int(11) NOT NULL,
  `ImePodstavke` tinytext,
  `TekstPodstavke` text,
  `Vreme` datetime DEFAULT NULL,
  `Obavljeno` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`StavkaID`,`PodstavkaID`),
  CONSTRAINT `podstavka_ibfk_1` FOREIGN KEY (`StavkaID`) REFERENCES `stavka` (`StavkaID`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `podstavka` */

/*Table structure for table `stavka` */

DROP TABLE IF EXISTS `stavka`;

CREATE TABLE `stavka` (
  `StavkaID` int(11) NOT NULL AUTO_INCREMENT,
  `ImeStavke` tinytext,
  `TekstStavke` text,
  `Vreme` datetime DEFAULT NULL,
  `Obavljeno` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`StavkaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `stavka` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

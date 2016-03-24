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

/*Table structure for table `subtask` */

DROP TABLE IF EXISTS `subtask`;

CREATE TABLE `subtask` (
  `TaskID` int(11) NOT NULL,
  `SubTaskID` int(11) NOT NULL,
  `SubTaskName` tinytext,
  `SubTaskText` text,
  `SubTaskDateTime` datetime DEFAULT NULL,
  `SubTaskDone` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`TaskID`,`SubTaskID`),
  CONSTRAINT `subtask_ibfk_1` FOREIGN KEY (`TaskID`) REFERENCES `task` (`TaskID`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `subtask` */

/*Table structure for table `task` */

DROP TABLE IF EXISTS `task`;

CREATE TABLE `task` (
  `TaskID` int(11) NOT NULL AUTO_INCREMENT,
  `TaskName` tinytext,
  `TaskText` text,
  `TastDateTime` datetime DEFAULT NULL,
  `TaskDone` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`TaskID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `task` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

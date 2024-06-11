/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 5.7.9 : Database - event_management
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`event_management` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `event_management`;

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `booking_date` varchar(100) DEFAULT NULL,
  `booking_time` varchar(100) DEFAULT NULL,
  `booking_venue` varchar(100) DEFAULT NULL,
  `no_of_persons` varchar(100) DEFAULT NULL,
  `booking_status` varchar(100) DEFAULT NULL,
  `booking_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `booking` */

/*Table structure for table `complaint` */

DROP TABLE IF EXISTS `complaint`;

CREATE TABLE `complaint` (
  `complaint_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `complaint` varchar(100) DEFAULT NULL,
  `reply` varchar(100) DEFAULT NULL,
  `complaint_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `complaint` */

/*Table structure for table `customevent` */

DROP TABLE IF EXISTS `customevent`;

CREATE TABLE `customevent` (
  `custom_event_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `custom_event_title` varchar(100) DEFAULT NULL,
  `budget_amount` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `no_of_persons` varchar(100) DEFAULT NULL,
  `custom_event_date` varchar(100) DEFAULT NULL,
  `custom_event_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`custom_event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `customevent` */

/*Table structure for table `eventcategories` */

DROP TABLE IF EXISTS `eventcategories`;

CREATE TABLE `eventcategories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `eventcategories` */

insert  into `eventcategories`(`category_id`,`category_name`) values 
(1,'cateorty');

/*Table structure for table `eventpackages` */

DROP TABLE IF EXISTS `eventpackages`;

CREATE TABLE `eventpackages` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `food_id` int(11) DEFAULT NULL,
  `package_title` varchar(100) DEFAULT NULL,
  `package_amount` varchar(100) DEFAULT NULL,
  `package_description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `eventpackages` */

insert  into `eventpackages`(`package_id`,`category_id`,`food_id`,`package_title`,`package_amount`,`package_description`) values 
(1,1,2,'title','skhjdlsa','hgdgajsh');

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback` varchar(100) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `feedback_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `feedback` */

/*Table structure for table `food` */

DROP TABLE IF EXISTS `food`;

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `serving_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `food` */

insert  into `food`(`food_id`,`food_name`,`description`,`quantity`,`serving_type`) values 
(2,'food1','jhdklj1','201','1qweghj1');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`login_id`,`username`,`password`,`user_type`) values 
(1,'staff','staff','Staff'),
(2,'admin','admin','admin'),
(3,'staff','123','Staff'),
(4,'user','user','Users'),
(5,'user','123','Users'),
(6,'hai','hai','Users');

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `payment_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `payment` */

/*Table structure for table `proposal` */

DROP TABLE IF EXISTS `proposal`;

CREATE TABLE `proposal` (
  `proposal_id` int(11) NOT NULL AUTO_INCREMENT,
  `custom_event_id` int(11) DEFAULT NULL,
  `proposal_date` varchar(100) DEFAULT NULL,
  `proposal_amount` varchar(100) DEFAULT NULL,
  `proposal_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`proposal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `proposal` */

/*Table structure for table `staff` */

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `house_name` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `staff` */

insert  into `staff`(`staff_id`,`login_id`,`first_name`,`last_name`,`gender`,`house_name`,`place`,`pincode`,`email`,`phone`) values 
(2,3,'staff','stt','female','hdljawhdlia','ernakaulam','682032','owner@gmail.com','1234567890');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `house_name` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`user_id`,`login_id`,`first_name`,`last_name`,`gender`,`house_name`,`place`,`pincode`,`email`,`phone`) values 
(1,5,'user','qwerty','male','hkjhn kjhlkjhl;','ernakaulam','123456','0987654321','staff@gamilcom'),
(2,6,'hai','jkaks','other','hajhflajlikdjlwaio','jkowjww','123456','2345678907','user@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

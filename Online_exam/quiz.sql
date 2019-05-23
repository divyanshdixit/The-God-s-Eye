/*
SQLyog Enterprise - MySQL GUI v5.22
Host - 4.1.13a-nt : Database - quiz
*********************************************************************
Server version : 4.1.13a-nt
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `quiz`;

USE `quiz`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `mst_admin` */

DROP TABLE IF EXISTS `mst_admin`;

CREATE TABLE `mst_admin` (
  `loginid` varchar(20) default NULL,
  `pass` varchar(20) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mst_admin` */

insert  into `mst_admin`(`loginid`,`pass`) values ('pgdca','pgdca');

/*Table structure for table `mst_question` */

DROP TABLE IF EXISTS `mst_question`;

CREATE TABLE `mst_question` (
  `que_id` int(5) NOT NULL auto_increment,
  `test_id` int(5) default NULL,
  `que_desc` varchar(150) default NULL,
  `ans1` varchar(75) default NULL,
  `ans2` varchar(75) default NULL,
  `ans3` varchar(75) default NULL,
  `ans4` varchar(75) default NULL,
  `true_ans` int(1) default NULL,
  PRIMARY KEY  (`que_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mst_question` */

insert  into `mst_question`(`que_id`,`test_id`,`que_desc`,`ans1`,`ans2`,`ans3`,`ans4`,`true_ans`) values (16,8,'What  Default Data Type ?','String','Variant','Integer','Boolear',2),(17,8,'What is Default Form Border Style ?','Fixed Single','None','Sizeable','Fixed Diaglog',3),(18,8,'Which is not type of Control ?','text','lable','checkbox','option button',1),(19,9,'Which of the follwing contexts are available in the add watch window?','Project','Module','Procedure','All',4),(20,9,'Which window will allow you to halt the execution of your code when a variable changes?','The call stack window','The immedite window','The locals window','The watch window',4),(22,9,'How can you print the object name associated with the last VB  error to the Immediate window?','Debug.Print Err.Number','Debug.Print Err.Source','Debug.Print Err.Description','Debug.Print Err.LastDLLError',2),(23,9,'How can you print the object name associated with the last VB  error to the Immediate window?','Debug.Print Err.Number','Debug.Print Err.Source','Debug.Print Err.Description','Debug.Print Err.LastDLLError',2),(24,9,'What function does the TabStop property on a command button perform?','It determines whether the button can get the focus','If set to False it disables the Tabindex property.','It determines the order in which the button will receive the focus','It determines if the access key swquence can be used',1),(25,10,'You application creates an instance of a form. What is the first event that will be triggered in the from?','Load','GotFocus','Instance','Initialize',4),(26,10,'Which of the following is Hungarian notation for a menu?','Menu','Men','mnu','MN',3),(27,10,'You are ready to run your program to see if it works.Which key on your keyboard will start the program?','F2','F3','F4','F5',4),(28,10,'Which of the following snippets of code will unload a form named frmFo0rm from memory?','Unload Form','Unload This','Unload Me','Unload',3),(29,10,'You want the text in text box named txtMyText to read My Text.In which property will you place this string?','Caption','Text','String','None of the above',2);

/*Table structure for table `mst_result` */

DROP TABLE IF EXISTS `mst_result`;

CREATE TABLE `mst_result` (
  `login` varchar(20) default NULL,
  `test_id` int(5) default NULL,
  `test_date` date default NULL,
  `score` int(3) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mst_result` */

insert  into `mst_result`(`login`,`test_id`,`test_date`,`score`) values ('raj',8,'0000-00-00',3),('raj',9,'0000-00-00',3),('raj',8,'0000-00-00',1),('ashish',10,'0000-00-00',3),('ashish',9,'0000-00-00',2),('ashish',10,'0000-00-00',0),('raj',8,'0000-00-00',0);

/*Table structure for table `mst_subject` */

DROP TABLE IF EXISTS `mst_subject`;

CREATE TABLE `mst_subject` (
  `sub_id` int(5) NOT NULL auto_increment,
  `sub_name` varchar(25) default NULL,
  PRIMARY KEY  (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mst_subject` */

insert  into `mst_subject`(`sub_id`,`sub_name`) values (1,'VB'),(2,'Oracle'),(3,'Java'),(4,'PHP'),(5,'Computer Fundamental'),(6,'Networking');

/*Table structure for table `mst_test` */

DROP TABLE IF EXISTS `mst_test`;

CREATE TABLE `mst_test` (
  `test_id` int(5) NOT NULL auto_increment,
  `sub_id` int(5) default NULL,
  `test_name` varchar(30) default NULL,
  `total_que` varchar(15) default NULL,
  PRIMARY KEY  (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mst_test` */

insert  into `mst_test`(`test_id`,`sub_id`,`test_name`,`total_que`) values (8,1,'VB Basic Test','3'),(9,1,'Essentials of VB','5'),(10,1,'Creating User Services','5');

/*Table structure for table `mst_user` */

DROP TABLE IF EXISTS `mst_user`;

CREATE TABLE `mst_user` (
  `user_id` int(5) NOT NULL auto_increment,
  `login` varchar(20) default NULL,
  `pass` varchar(20) default NULL,
  `username` varchar(30) default NULL,
  `address` varchar(50) default NULL,
  `city` varchar(15) default NULL,
  `phone` int(10) default NULL,
  `email` varchar(30) default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mst_user` */

insert  into `mst_user`(`user_id`,`login`,`pass`,`username`,`address`,`city`,`phone`,`email`) values (1,'raj','raj','Rajen','limbdi','limbdi',9999,'raj@yahoo.com'),(12,'ashish','shah','ashish','laskdjf','S\'nagar',228585,'ashish@yahoo.com'),(14,'Dhaval123','a','a','a','a',0,'dhaval@yahoo.com');

/*Table structure for table `mst_useranswer` */

DROP TABLE IF EXISTS `mst_useranswer`;

CREATE TABLE `mst_useranswer` (
  `sess_id` varchar(80) default NULL,
  `test_id` int(11) default NULL,
  `que_des` varchar(200) default NULL,
  `ans1` varchar(50) default NULL,
  `ans2` varchar(50) default NULL,
  `ans3` varchar(50) default NULL,
  `ans4` varchar(50) default NULL,
  `true_ans` int(11) default NULL,
  `your_ans` int(11) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mst_useranswer` */

insert  into `mst_useranswer`(`sess_id`,`test_id`,`que_des`,`ans1`,`ans2`,`ans3`,`ans4`,`true_ans`,`your_ans`) values ('2b8e3337837b82112def8d3e2f42f26e',8,'What  Default Data Type ?','String','Variant','Integer','Boolear',2,1),('2b8e3337837b82112def8d3e2f42f26e',8,'What is Default Form Border Style ?','Fixed Single','None','Sizeable','Fixed Diaglog',3,3),('2b8e3337837b82112def8d3e2f42f26e',8,'Which is not type of Control ?','text','lable','checkbox','option button',1,3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

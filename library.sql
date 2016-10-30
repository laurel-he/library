# Host: localhost  (Version: 5.5.40)
# Date: 2016-09-19 08:01:41
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_name` varchar(20) NOT NULL,
  `admin_id` int(32) NOT NULL,
  `admin_position` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `if_passed` int(2) NOT NULL COMMENT '是否审核通过',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "admin"
#

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('admin',100,'xiaohua','1111',0);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

#
# Structure for table "books_info"
#

DROP TABLE IF EXISTS `books_info`;
CREATE TABLE `books_info` (
  `books_id` int(32) NOT NULL AUTO_INCREMENT,
  `books_name` varchar(32) NOT NULL COMMENT '书名',
  `books_ISBN` varchar(32) NOT NULL,
  `books_author` varchar(32) NOT NULL COMMENT '作者',
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '修改时间',
  `press` varchar(32) DEFAULT NULL COMMENT '出版社',
  `books_image` varchar(64) NOT NULL,
  PRIMARY KEY (`books_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "books_info"
#

/*!40000 ALTER TABLE `books_info` DISABLE KEYS */;
INSERT INTO `books_info` VALUES (1,'《瓦尔登湖》','9787544710763','（美）亨利·大卫·梭罗','2016-09-18 19:22:29','译林出版社','views/images/瓦尔登湖.jpg'),(2,'《鲁迅经典作品全集》','9787545115895','鲁迅','2016-09-18 19:22:29',' 辽海出版社','views/images/鲁迅经典作品全集.jpg'),(3,'《中国小说史略》','9787100086189','鲁迅','2016-09-18 19:22:29','商务印书馆','views/images/中国小说史略.jpg'),(4,'《孔子论·鲁迅辩》','9787100097895','宋志坚','2016-09-18 19:22:29','商务印书馆','views/images/孔子论·鲁迅辩.jpg'),(5,'《蛙》','9787100097895','莫言','2016-09-18 19:22:29','作家出版社','views/images/蛙.jpg'),(6,'《C++ Primer（中文版 第5版）》','9787121155352','Stanley B. Lippman，Josée Lajoie，','2016-09-18 19:22:29','电子工业出版社','views/images/C++ Primer.jpg'),(7,'《PHP和MySQL Web开发》','9787111262817','[澳] Luke Welling','2016-09-18 19:22:29','机械工业出版社','views/images/PHP和MySQL Web开发.jpg'),(8,'《PHP从入门到精通》','9787302288534','明日科技','2016-09-18 19:22:29','清华大学出版社','views/images/PHP从入门到精通.jpg');
/*!40000 ALTER TABLE `books_info` ENABLE KEYS */;

#
# Structure for table "borrow"
#

DROP TABLE IF EXISTS `borrow`;
CREATE TABLE `borrow` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `books_id` int(2) DEFAULT '0',
  `books_name` varchar(64) DEFAULT NULL,
  `user_name` varchar(64) DEFAULT NULL,
  `user_id` int(32) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='借书记录表';

#
# Data for table "borrow"
#

/*!40000 ALTER TABLE `borrow` DISABLE KEYS */;
/*!40000 ALTER TABLE `borrow` ENABLE KEYS */;

#
# Structure for table "library_info"
#

DROP TABLE IF EXISTS `library_info`;
CREATE TABLE `library_info` (
  `library_name` varchar(64) NOT NULL,
  `library_id` int(12) NOT NULL AUTO_INCREMENT,
  `library_address` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`library_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "library_info"
#

/*!40000 ALTER TABLE `library_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `library_info` ENABLE KEYS */;

#
# Structure for table "students"
#

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `student_name` varchar(20) NOT NULL,
  `student_id` int(30) NOT NULL AUTO_INCREMENT,
  `student_number` int(30) NOT NULL,
  `student_gender` enum('female','male') DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "students"
#

/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES ('jiao',1,1304020307,'','jiao');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

#
# Structure for table "teachers"
#

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `teachers_name` varchar(20) NOT NULL,
  `teachers_id` int(16) NOT NULL,
  `teachers_position` varchar(32) NOT NULL,
  `if_passed` int(2) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`teachers_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "teachers"
#

/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES ('laoshi',100,'php',1,'laoshi'),('ye',1000,'C++',0,'');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;

#
# Structure for table "verify"
#

DROP TABLE IF EXISTS `verify`;
CREATE TABLE `verify` (
  `varify_id` int(10) NOT NULL AUTO_INCREMENT,
  `varify_content` varchar(10) NOT NULL,
  PRIMARY KEY (`varify_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

#
# Data for table "verify"
#

/*!40000 ALTER TABLE `verify` DISABLE KEYS */;
INSERT INTO `verify` VALUES (1,'jiao'),(2,'ligong'),(3,'he'),(4,'xiao'),(5,'hua'),(6,'test'),(7,'you'),(8,'hehe'),(9,'yijin'),(10,'xuexi'),(11,'ceshi'),(12,'xiaojiao'),(13,'sha'),(14,'sichuan'),(15,'guawa'),(16,'youxi'),(17,'luck'),(18,'happy');
/*!40000 ALTER TABLE `verify` ENABLE KEYS */;

CREATE DATABASE `jobsystem` /*!40100 DEFAULT CHARACTER SET latin1 */;

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `birthday` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `client_extra_field_cv` (
  `idnewfield` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `company_cv_newfield` (
  `id` int(11) NOT NULL,
  `idcompany` int(11) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `cv_education` (
  `idClient` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Name` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `cv_experience` (
  `idclient` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `company` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `cv_languages` (
  `idclient` int(11) NOT NULL,
  `Description` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `cv_projects` (
  `idclient` int(11) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `cv_projects` (
  `idclient` int(11) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `companyid` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `title` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `yearsReq` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `idjob` int(11) NOT NULL,
  `question` varchar(2000) NOT NULL,
  `rate` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `quiz_reponse` (
  `ID` int(11) NOT NULL,
  `reponse` varchar(100) NOT NULL,
  `status` bit(1) NOT NULL,
  `IDQuestion` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `request_job` (
  `idclient` int(11) NOT NULL,
  `idjob` int(11) NOT NULL,
  `date` date NOT NULL,
  `LiveDate` datetime DEFAULT NULL,
  `QuizRate` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `jobsystem`.`client`(`id`,`name`,`address`,`birthday`,`phone`,`password`)VALUES(1000,'Candidate 1','none','none','12345678','123');
INSERT INTO `jobsystem`.`company`(`id`,`name`,`address`,`type`,`birthday`,`status`,`password`)VALUES(1,'Company 1','none','Development',1,'123');


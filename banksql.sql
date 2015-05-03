
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `idnumber` varchar(30) NOT NULL,
  `passportnumber` varchar(30) DEFAULT NULL,
  `address` longtext,
  `mobilenumber` varchar(30) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idnumber`),
  UNIQUE KEY `id` (`idnumber`)
) ENGINE=InnoDB;


DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `accnumber` varchar(30) NOT NULL,
  `balance` double(30,0) DEFAULT NULL,
  `accountype` varchar(30) DEFAULT NULL,
  `idnumber` varchar(30) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`accnumber`,`idnumber`),
  UNIQUE KEY `acc` (`accnumber`),
  KEY `idnumber` (`idnumber`),
  KEY `accnumber` (`accnumber`),
  CONSTRAINT `account_ibfk_1` FOREIGN KEY (`idnumber`) REFERENCES `customer` (`idnumber`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `beneficiary`;

CREATE TABLE `beneficiary` (
  `accname` varchar(255) DEFAULT NULL,
  `accnumber` varchar(255) DEFAULT NULL,
  `baccnumber` varchar(255) DEFAULT NULL,
  `branchcode` varchar(255) DEFAULT NULL,
  `bankname` varchar(300) DEFAULT NULL,
  `benfid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`benfid`),
  KEY `accnumber` (`accnumber`),
  CONSTRAINT `beneficiary_ibfk_1` FOREIGN KEY (`accnumber`) REFERENCES `account` (`accnumber`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;






DROP TABLE IF EXISTS `loan`;
CREATE TABLE `loan` (
  `idnumber` varchar(255) NOT NULL,
  `loanumber` int(11) NOT NULL AUTO_INCREMENT,
  `typeofloan` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `amount` double(11,0) NOT NULL,
  `dateapproved` date DEFAULT NULL,
  `dateapplied` date NOT NULL,
  PRIMARY KEY (`loanumber`),
  KEY `idnumber` (`idnumber`),
  CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`idnumber`) REFERENCES `customer` (`idnumber`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;


DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `idnumber` varchar(255) NOT NULL,
  `level` int(255) DEFAULT '0',
  `access` int(255) DEFAULT '0',
  `stamp` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`,`idnumber`),
  UNIQUE KEY `user` (`username`),
  KEY `idnumber` (`idnumber`),
  CONSTRAINT `login_ibfk_1` FOREIGN KEY (`idnumber`) REFERENCES `customer` (`idnumber`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;


DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `accnumber` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `payments` float(30,0) NOT NULL DEFAULT '0',
  `balance` float(30,0) NOT NULL DEFAULT '0',
  `deposits` float(30,0) NOT NULL DEFAULT '0',
  `tranid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`tranid`),
  KEY `accnumber` (`accnumber`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`accnumber`) REFERENCES `account` (`accnumber`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `sessdata`
CREATE TABLE `sessdata` (
  `sess_id` varchar(500) NOT NULL,
  `sess_data` varchar(500) NOT NULL,
  `access` int(11) NOT NULL,
  `ipaddress` varchar(100) NOT NULL,
  `useragent` varchar(400) NOT NULL,
  PRIMARY KEY (`sess_id`)

)ENGINE=MEMORY;

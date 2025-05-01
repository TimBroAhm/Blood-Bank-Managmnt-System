-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 05:26 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `USER_ID` int(11) NOT NULL,
  `USER_NAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(60) NOT NULL,
  `ROLE` varchar(30) NOT NULL,
  `EMAIL` varchar(56) NOT NULL,
  `STATUS` int(11) NOT NULL,
  `ADMIN_IDF` int(11) NOT NULL,
  KEY `ADMIN_IDF` (`ADMIN_IDF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`USER_ID`, `USER_NAME`, `PASSWORD`, `ROLE`, `EMAIL`, `STATUS`, `ADMIN_IDF`) VALUES
(1, 'Admin', 'MTIzNDU2Nzg=', 'sysadmin', 'se@gmail.com', 0, 1),
(40, 'Dister123', 'MTIzNDU2Nzhh', 'distermanager', 'a@gmail.com', 0, 1),
(432, 'Operator', 'MTIzNDU2Nzg=', 'operator', 'a@gmail.com', 0, 1),
(44, 'Mizan123', 'MTIzNDU2Nzhh', 'assomanager', 'a@gmail.com', 0, 1),
(45, 'Mahir', 'MTIzNDU2Nzg=', 'assomanager', 't@gmail.com', 0, 1),
(100, 'Aba', 'MTIzNDU2Nzg=', 'operator', 'aa@gmail.com', 0, 1),
(37, 'Dev123', 'MTIzNDU2Nzhh', 'devmanager', 'de@gmail.com', 0, 1),
(2112, 'Adiss', 'MTIzNDU2Nzg=', 'operator', 'w@gmail.com', 0, 1),
(68, 'Brihanu', 'MTIzNDU2Nzhh', 'Employee', 'a@gmail.com', 0, 1),
(20110005, 'Ass11', 'MTIzNDU2Nzhh', 'operator', 'As@gmail.com', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ADMIN_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(30) NOT NULL,
  `MIDDLE_NAME` varchar(30) NOT NULL,
  `LAST_NAME` varchar(30) NOT NULL,
  `SEX` char(6) NOT NULL,
  `DOB` date NOT NULL,
  `QUALIFICATION` varchar(30) NOT NULL,
  `PHONE_NUMBER` int(11) NOT NULL,
  `KEBELE` varchar(20) NOT NULL,
  PRIMARY KEY (`ADMIN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `FIRST_NAME`, `MIDDLE_NAME`, `LAST_NAME`, `SEX`, `DOB`, `QUALIFICATION`, `PHONE_NUMBER`, `KEBELE`) VALUES
(1, 'admin', 'adminman', 'adminu', 'm', '2018-05-09', 'diploma', 9876454, '3');

-- --------------------------------------------------------

--
-- Table structure for table `association`
--

CREATE TABLE IF NOT EXISTS `association` (
  `EMPL_ID` int(11) NOT NULL,
  `ASSOCIATION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ASSOCIATION_NAME` varchar(34) NOT NULL,
  `FORMED_DATE` date NOT NULL,
  `PHONE_NO` int(11) NOT NULL,
  `MANGER_NAME` varchar(30) NOT NULL,
  `MANAGER_ID` int(11) NOT NULL,
  `LEVEL` int(11) NOT NULL,
  PRIMARY KEY (`ASSOCIATION_ID`),
  KEY `EMPL_ID` (`EMPL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `association`
--

INSERT INTO `association` (`EMPL_ID`, `ASSOCIATION_ID`, `ASSOCIATION_NAME`, `FORMED_DATE`, `PHONE_NO`, `MANGER_NAME`, `MANAGER_ID`, `LEVEL`) VALUES
(39, 19, 'Tana Beles', '2018-06-06', 918715962, 'MIzanAlebel', 44, 3),
(39, 20, 'Tiret', '2018-06-06', 918720499, 'SahileShferaw', 47, 2),
(39, 21, 'Hibr', '2018-06-07', 918779159, 'MahrieEyasu', 45, 1),
(39, 22, 'Blien', '2018-06-06', 918560386, 'MelkamDagnaw', 48, 2),
(39, 23, 'Key Kebero', '2010-03-02', 918020084, 'Mersha W/Gebrial', 49, 1),
(39, 24, 'Habesha', '2010-06-04', 974500202, 'Ashenafie Desalegn', 46, 3),
(39, 25, 'Abay Zuria Zenbaba', '2005-06-06', 918766982, 'Belay Afework', 50, 2),
(39, 26, 'Abay', '2016-05-30', 918340151, 'Abayneh Mahrie', 51, 1),
(39, 27, 'Zenbaba', '2018-06-05', 930296554, 'Kumander Estifanos', 52, 3),
(39, 28, 'Tisabay', '2012-03-06', 918027961, 'Asnka Tigabu', 53, 1),
(39, 29, 'Alemsaga', '2006-06-07', 918719262, 'Andamlak', 54, 2);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(200) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `content`, `post_id`) VALUES
(38, '12', 13),
(39, '13', 13),
(40, 'hii', 13),
(41, '1', 14),
(42, '2', 14),
(43, '', 14),
(44, 'gggg', 13),
(45, '33333333333', 15),
(46, '2222222222', 15),
(47, 'aaa', 15),
(48, 'xxx', 17),
(49, 'aaaaaaaaaaaa', 19),
(50, 'zzz', 21),
(51, 'sss', 21),
(52, 'nnn', 14);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `EID` int(11) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` varchar(25) NOT NULL,
  `MIDDLE_NAME` varchar(25) NOT NULL,
  `LAST_ANAME` varchar(25) NOT NULL,
  `SEX` char(6) NOT NULL,
  `DOB` date NOT NULL,
  `PHONE_NO` int(11) NOT NULL,
  `KEBELE` varchar(23) NOT NULL,
  `QUALIFICATION` varchar(35) NOT NULL,
  `ROLE` varchar(35) NOT NULL,
  `ADMIN_ID` int(11) NOT NULL,
  PRIMARY KEY (`EID`),
  KEY `ADMIN_ID` (`ADMIN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EID`, `FIRST_NAME`, `MIDDLE_NAME`, `LAST_ANAME`, `SEX`, `DOB`, `PHONE_NO`, `KEBELE`, `QUALIFICATION`, `ROLE`, `ADMIN_ID`) VALUES
(1, 'Mersha', 'asa', 'abush', 'm', '2012-05-09', 9458, '4', 'msc', 'sysadmin', 1),
(37, '', '', '', 'M', '0000-00-00', 0, '', '', '-Select Role-', 1),
(39, 'dev', 'dev', 'dse', 'm', '2018-06-18', 9458, '4', 'diplo', 'devmanager', 1),
(40, '', '', '', 'M', '0000-00-00', 0, '', '', '-Select Role-', 1),
(44, 'mizal', 'alebel', 'ww', 'M', '2018-06-12', 918, '10', 'Bsc', 'Asso Manager', 1),
(45, 'mahrie', 'as', 'as', 'M', '2018-06-15', 34, '2', 'Msc', 'Asso Manager', 1),
(46, 'ashenafie', 'desalegn', 'as', 'M', '2018-06-08', 918, '12', 'Bsc', 'Asso Manager', 1),
(47, 'Sahile', 'shferaw', 'tsema', 'M', '2018-06-03', 2147483647, '10', 'msc', 'Asso Manager', 1),
(48, 'Melkamu', 'dagnaw', 'dawit', 'M', '2018-06-29', 2147483647, '04', 'Bsc', 'Asso Manager', 1),
(49, 'Mersha', 'Gbremedhin', 'tefera', 'M', '2018-06-14', 964586, '09', 'MSc', 'Asso Manager', 1),
(52, 'Estifanos', 'abebe', 'dereje', 'M', '2018-06-22', 9684576, '15', 'Msc', 'Asso Manager', 1),
(53, 'Asnka', 'tigabu', 'dawit', 'F', '2018-06-15', 978, '12', 'Msc', 'Asso Manager', 1),
(54, 'Andamlak', 'teferie', 'goshu', 'M', '2018-06-08', 998797, '05', 'Bsc', 'Asso Manager', 1),
(62, 'Asefa', 'Belay', 'Dessie', 'M', '2018-06-26', 985768576, '12', 'MSc', 'Asso Manager', 1),
(68, 'Dereje', 'Bizuayehu', 'Mech', 'M', '1998-07-09', 934765345, '04', 'Bsc', 'Distributer Manager', 1),
(69, 'Ermias', 'Belay', 'Dessie', 'M', '1997-04-14', 987878787, '09', 'Msc', 'Asso Manager', 1),
(70, 'Achenf', 'Belay', 'Dessie', 'F', '0000-00-00', 978787878, '12', 'Bsc', 'Asso Manager', 1),
(71, 'Asefa', 'Belay', 'Ferede', 'F', '2000-06-13', 988777773, '34', 'Msc', 'Devt Process manager', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(200) NOT NULL,
  `posted_by` int(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `posted_by` (`posted_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `content`, `posted_by`) VALUES
(14, 'mahir', 45);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `FIRST_NAME` varchar(25) NOT NULL,
  `MIDDLE_NAME` varchar(25) NOT NULL,
  `LAST_NAME` varchar(25) NOT NULL,
  `PHONE_NO` int(11) NOT NULL,
  `KEBELE` varchar(23) NOT NULL,
  `REQUEST_TO` varchar(30) NOT NULL,
  `LEVEL` varchar(54) NOT NULL,
  `BORD_NO` int(11) NOT NULL,
  `OPERATOR_LICENCE` varchar(874) NOT NULL,
  `BUSINESS_LICENCE` varchar(765) NOT NULL,
  `INSURANCE_MEMBER` varchar(678) NOT NULL,
  `REQUASTED_DATE` date NOT NULL,
  `REQUAST_ID` int(11) NOT NULL,
  `ACCEPTED` varchar(35) NOT NULL,
  `APPROVED` varchar(35) NOT NULL,
  PRIMARY KEY (`REQUAST_ID`),
  KEY `REQUAST_ID` (`REQUAST_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`FIRST_NAME`, `MIDDLE_NAME`, `LAST_NAME`, `PHONE_NO`, `KEBELE`, `REQUEST_TO`, `LEVEL`, `BORD_NO`, `OPERATOR_LICENCE`, `BUSINESS_LICENCE`, `INSURANCE_MEMBER`, `REQUASTED_DATE`, `REQUAST_ID`, `ACCEPTED`, `APPROVED`) VALUES
('aa', 'ab', 'ab', 2345, '2', 'Tana Beles', 'level 3', 0, '1.jpg', '3.jpg', '5.jpg', '2018-06-15', 101, 'accepted', 'Approved'),
('Adiss', 'Abye', 'Feree', 987654323, '09', 'Tana Beles', 'level 3', 39, 'bbg.jpg', '223.jpg', 'b3.jpg', '0000-00-00', 2112, 'accepted', 'Approved'),
('Dgdsg', 'Djfjdshf', 'Vcvcvc', 975245422, '12', 'Tana Beles', 'level 3', 678, '223.jpg', 'ask1.jpg', 'ask1.jpg', '2018-05-31', 20110004, 'accepted', 'Not'),
('Dss', 'Tyy', 'Yyy', 987654326, '1', 'Tana Beles', 'level 1', 200, '4.jpg', '5.jpg', '6.jpg', '2018-06-02', 20110005, 'accepted', 'Approved'),
('Hhhh', 'Nmmm', 'Mnnn', 987654321, '09', 'Hibr', 'level 1', 800, '9.jpg', '8.jpg', '8.jpg', '2018-06-02', 20110006, 'accepted', 'Approved'),
('Achenf', 'Bhulu', 'Ybel', 987655656, '09', 'Tana Beles', 'level 3', 301, 'amazone3.png', 'ask1.jpg', 'ask1.jpg', '2018-06-04', 20110007, 'Not', 'Not'),
('Abate', 'Dfsd', 'Dss', 948748738, '08', 'Tiret', 'level 3', 321, 'ask1.jpg', 'ask1.jpg', 'ask1.jpg', '2018-06-04', 20110008, 'Not', 'Not'),
('Mahrie', 'Kiros', 'Dereje', 989797979, '04', 'Tana Beles', 'level 3', 690, 'ask1.jpg', 'ask1.jpg', 'ask1.jpg', '0000-00-00', 20110016, 'accepted', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `EMPL_ID` int(11) NOT NULL,
  `BORD_NUMBER` int(11) NOT NULL,
  `ASSOCIATION_NAME` varchar(30) NOT NULL,
  `REQ_ID` int(11) NOT NULL,
  `INITIAL_PLACE` varchar(34) NOT NULL,
  `DESTINATION_PLACE` varchar(45) NOT NULL,
  `LEVEL` varchar(23) NOT NULL,
  `PREPARED_DATE` date NOT NULL,
  `DISTANCE` varchar(23) NOT NULL,
  `TARIFF` varchar(35) NOT NULL,
  `STATUS` varchar(23) DEFAULT NULL,
  KEY `EMPL_ID` (`EMPL_ID`,`ASSOCIATION_NAME`,`REQ_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`EMPL_ID`, `BORD_NUMBER`, `ASSOCIATION_NAME`, `REQ_ID`, `INITIAL_PLACE`, `DESTINATION_PLACE`, `LEVEL`, `PREPARED_DATE`, `DISTANCE`, `TARIFF`, `STATUS`) VALUES
(40, 1002, 'Tana Beles', 70, 'Bahir Dar', 'Gondar', 'Level 3', '2018-06-02', '1750', '800', 'Null'),
(40, 567, 'Tana Beles', 20110016, 'bahirdar', 'Adis Abeba', 'Level 1', '2018-06-03', '', '', 'OutBDR'),
(40, 0, 'Tana Beles', 101, 'bahir', 'go', '', '2018-06-01', '', '', 'Null'),
(40, 567, 'Tana Beles', 20110016, 'bahirdar', 'Adis Abeba', 'Level 3', '2018-06-03', '', '', 'OutBDR'),
(40, 39, 'Tana Beles', 2112, 'xxx', 'yyyy', 'level 3', '2018-06-01', '180', '10000', 'Null'),
(40, 200, 'Tana Beles', 20110005, 'Bahir Dar', 'Adis Abeba', 'level 1', '2018-06-02', '200', '200', 'InBDR'),
(40, 0, 'Tana Beles', 101, 'bahir', 'go', '', '2018-06-04', 'áˆµáˆµáˆµ', 'á‰¥áˆ­', 'Null'),
(40, 0, 'Tana Beles', 101, 'bahir', 'go', '', '2018-06-04', 'áˆ…áˆ…áˆ…', 'á‰¥áˆ­áˆ­', 'Null');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_backup`
--

CREATE TABLE IF NOT EXISTS `schedule_backup` (
  `BORD_NUMBER` varchar(46) DEFAULT NULL,
  `REQ_ID` varchar(34) NOT NULL,
  `INITIAL_PLACE` varchar(76) NOT NULL,
  `DESTINATION_PLACE` varchar(65) NOT NULL,
  `PREPARED_DATE` datetime NOT NULL,
  `LEVEL` varchar(34) DEFAULT NULL,
  `DISTANCE` varchar(54) NOT NULL,
  `TARIFF` varchar(100) NOT NULL,
  `STATUS` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_backup`
--

INSERT INTO `schedule_backup` (`BORD_NUMBER`, `REQ_ID`, `INITIAL_PLACE`, `DESTINATION_PLACE`, `PREPARED_DATE`, `LEVEL`, `DISTANCE`, `TARIFF`, `STATUS`) VALUES
('1002', '70', 'Bahir Dar', 'Gondar', '2018-05-31 00:00:00', 'Level 3', '175', '80', 'Null'),
('1002', '90', 'Bahir Dar', 'debr Brihan', '2018-05-31 00:00:00', '', '190', '30', 'Null'),
('400', '2112', 'hhdshf', 'hfdhf', '2018-05-31 00:00:00', 'level 3', '435', '534', 'InBDR'),
('400', '2112', 'hhdshf', 'hfdhf', '2018-05-31 09:41:22', 'level 3', '435', '534', 'OutBDR'),
('400', '2112', 'hhdshf', 'hfdhf', '2018-05-31 09:43:25', 'level 3', '435', '534', 'OutBDR'),
('1002', '70', 'Bahir Dar', 'Gondar', '2018-05-31 09:57:39', 'Level 3', '175', '80', 'Null'),
('1002', '70', 'Bahir Dar', 'Gondar', '2018-05-31 10:21:19', 'Level 3', '175', '80', 'OutBDR'),
('1002', '70', 'Bahir Dar', 'Gondar', '2018-05-31 10:22:02', 'Level 3', '175', '80', 'InBDR'),
('1002', '70', 'Bahirar', 'Gondar', '2018-06-02 09:45:18', 'Level 3', '1750', '800', 'Null'),
('200', '20110005', 'BahirDar', 'AdissAbeba', '2018-06-02 15:17:19', 'level 1', '200', '200', 'InBDR'),
('567', '20110016', 'bahirdar', 'Adis Abeba', '2018-06-02 22:14:48', 'Level 3', '', '', 'OutBDR');

-- --------------------------------------------------------

--
-- Table structure for table `shedule_request`
--

CREATE TABLE IF NOT EXISTS `shedule_request` (
  `OPERATOR_ID` int(11) NOT NULL,
  `REQUEST_FOR` varchar(45) NOT NULL,
  `ASSOCATION_NAME` varchar(45) NOT NULL,
  `BORD_NO` int(11) NOT NULL,
  `LEVEL` varchar(26) NOT NULL,
  `REQUEST_DATE` date NOT NULL,
  `FROM` varchar(56) NOT NULL,
  `TO` varchar(56) NOT NULL,
  `PERMISSION` varchar(34) NOT NULL,
  `PREPARED` varchar(50) NOT NULL,
  KEY `OPERATOR_ID` (`OPERATOR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shedule_request`
--

INSERT INTO `shedule_request` (`OPERATOR_ID`, `REQUEST_FOR`, `ASSOCATION_NAME`, `BORD_NO`, `LEVEL`, `REQUEST_DATE`, `FROM`, `TO`, `PERMISSION`, `PREPARED`) VALUES
(101, 'To Update', 'Tana Beles', 0, '', '0000-00-00', 'bahir', 'go', 'Yes', 'Done'),
(2112, 'New User', 'Tana Beles', 700, 'Level 3', '2010-05-01', 'Bahir Dar', 'Gondar', 'Yes', 'Done'),
(20110016, 'New User', 'Tana Beles', 567, 'Level 3', '0000-00-00', 'bahirdar', 'Adiss Abeba', 'Yes', 'Ok'),
(2112, 'To Update', 'Tana Beles', 39, 'level 3', '2018-05-29', 'xxx', 'yyyy', 'wait', 'Ok'),
(20110005, 'New User', 'Tana Beles', 200, 'level 1', '2018-06-02', 'BahirDar', 'AdissAbeba', 'Yes', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `DATE` date NOT NULL,
  `NOTICE_FOR` varchar(45) NOT NULL,
  `IMAGE` varchar(564) NOT NULL,
  `TEXT` varchar(234) NOT NULL,
  `EMPL_ID` int(11) NOT NULL,
  KEY `EMPL_ID` (`EMPL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`DATE`, `NOTICE_FOR`, `IMAGE`, `TEXT`, `EMPL_ID`) VALUES
('2018-05-03', 'Blien', '5.jpg', 'sdaaaaaaaaaaaaaaa', 44),
('2018-05-01', 'For All Association', '5.jpg', 'dddddddddddddddddddddddddddddddd', 45),
('2018-06-02', 'Tana Beles', '5.jpg', 'ererer', 40);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`ADMIN_IDF`) REFERENCES `admin` (`ADMIN_ID`);

--
-- Constraints for table `association`
--
ALTER TABLE `association`
  ADD CONSTRAINT `association_ibfk_1` FOREIGN KEY (`EMPL_ID`) REFERENCES `employee` (`EID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`ADMIN_ID`) REFERENCES `admin` (`ADMIN_ID`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`posted_by`) REFERENCES `employee` (`EID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`EMPL_ID`) REFERENCES `employee` (`EID`);

--
-- Constraints for table `shedule_request`
--
ALTER TABLE `shedule_request`
  ADD CONSTRAINT `shedule_request_ibfk_1` FOREIGN KEY (`OPERATOR_ID`) REFERENCES `request` (`REQUAST_ID`);

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `upload_ibfk_1` FOREIGN KEY (`EMPL_ID`) REFERENCES `employee` (`EID`);

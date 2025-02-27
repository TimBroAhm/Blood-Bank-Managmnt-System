DROP TABLE IF EXISTS account;

CREATE TABLE `account` (
  `USER_ID` int NOT NULL,
  `USER_NAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(60) NOT NULL,
  `ROLE` varchar(30) NOT NULL,
  `EMAIL` varchar(56) NOT NULL,
  `STATUS` int NOT NULL,
  `ADMIN_IDF` int NOT NULL,
  KEY `ADMIN_IDF` (`ADMIN_IDF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO account VALUES("1","Admin","1234","sysadmin","se@gmail.com","0","1");
INSERT INTO account VALUES("40","Dister123","1234","distermanager","a@gmail.com","0","1");
INSERT INTO account VALUES("432","Operator","1234","operator","a@gmail.com","0","1");
INSERT INTO account VALUES("44","Mizan123","1234","assomanager","a@gmail.com","0","1");
INSERT INTO account VALUES("45","Mahir","1234","assomanager","t@gmail.com","0","1");
INSERT INTO account VALUES("100","Aba","1234","operator","aa@gmail.com","0","1");
INSERT INTO account VALUES("37","Dev123","1234","devmanager","de@gmail.com","0","1");
INSERT INTO account VALUES("2112","Adiss","1234","operator","w@gmail.com","0","1");
INSERT INTO account VALUES("68","Brihanu","1234","Employee","a@gmail.com","0","1");
INSERT INTO account VALUES("20110005","Ass11","1234","operator","As@gmail.com","0","1");
INSERT INTO account VALUES("72","NGAT00840916","JHBhc3N3b3Jk","sysadmin","ahmbim25@gmail.com","1","1");
INSERT INTO account VALUES("1","Admin","MTIzNDU2Nzg=","sysadmin","se@gmail.com","0","1");
INSERT INTO account VALUES("40","Dister123","MTIzNDU2Nzhh","distermanager","a@gmail.com","0","1");
INSERT INTO account VALUES("432","Operator","MTIzNDU2Nzg=","operator","a@gmail.com","0","1");
INSERT INTO account VALUES("44","Mizan123","MTIzNDU2Nzhh","assomanager","a@gmail.com","0","1");
INSERT INTO account VALUES("45","Mahir","MTIzNDU2Nzg=","assomanager","t@gmail.com","0","1");
INSERT INTO account VALUES("100","Aba","MTIzNDU2Nzg=","operator","aa@gmail.com","0","1");
INSERT INTO account VALUES("37","Dev123","MTIzNDU2Nzhh","devmanager","de@gmail.com","0","1");
INSERT INTO account VALUES("2112","Adiss","MTIzNDU2Nzg=","operator","w@gmail.com","0","1");
INSERT INTO account VALUES("68","Brihanu","MTIzNDU2Nzhh","Employee","a@gmail.com","0","1");
INSERT INTO account VALUES("20110005","Ass11","MTIzNDU2Nzhh","operator","As@gmail.com","0","1");
INSERT INTO account VALUES("1","Admin","MTIzNDU2Nzg=","sysadmin","se@gmail.com","0","1");
INSERT INTO account VALUES("40","Dister123","MTIzNDU2Nzhh","distermanager","a@gmail.com","0","1");
INSERT INTO account VALUES("432","Operator","MTIzNDU2Nzg=","operator","a@gmail.com","0","1");
INSERT INTO account VALUES("44","Mizan123","MTIzNDU2Nzhh","assomanager","a@gmail.com","0","1");
INSERT INTO account VALUES("45","Mahir","MTIzNDU2Nzg=","assomanager","t@gmail.com","0","1");
INSERT INTO account VALUES("100","Aba","MTIzNDU2Nzg=","operator","aa@gmail.com","0","1");
INSERT INTO account VALUES("37","Dev123","MTIzNDU2Nzhh","devmanager","de@gmail.com","0","1");
INSERT INTO account VALUES("2112","Adiss","MTIzNDU2Nzg=","operator","w@gmail.com","0","1");
INSERT INTO account VALUES("68","Brihanu","MTIzNDU2Nzhh","Employee","a@gmail.com","0","1");
INSERT INTO account VALUES("20110005","Ass11","MTIzNDU2Nzhh","operator","As@gmail.com","0","1");
INSERT INTO account VALUES("1","Admin","MTIzNDU2Nzg=","sysadmin","se@gmail.com","0","1");
INSERT INTO account VALUES("40","Dister123","MTIzNDU2Nzhh","distermanager","a@gmail.com","0","1");
INSERT INTO account VALUES("432","Operator","MTIzNDU2Nzg=","operator","a@gmail.com","0","1");
INSERT INTO account VALUES("44","Mizan123","MTIzNDU2Nzhh","assomanager","a@gmail.com","0","1");
INSERT INTO account VALUES("45","Mahir","MTIzNDU2Nzg=","assomanager","t@gmail.com","0","1");
INSERT INTO account VALUES("100","Aba","MTIzNDU2Nzg=","operator","aa@gmail.com","0","1");
INSERT INTO account VALUES("37","Dev123","MTIzNDU2Nzhh","devmanager","de@gmail.com","0","1");
INSERT INTO account VALUES("2112","Adiss","MTIzNDU2Nzg=","operator","w@gmail.com","0","1");
INSERT INTO account VALUES("68","Brihanu","MTIzNDU2Nzhh","Employee","a@gmail.com","0","1");
INSERT INTO account VALUES("20110005","Ass11","MTIzNDU2Nzhh","operator","As@gmail.com","0","1");
INSERT INTO account VALUES("1","Admin","MTIzNDU2Nzg=","sysadmin","se@gmail.com","0","1");
INSERT INTO account VALUES("40","Dister123","MTIzNDU2Nzhh","distermanager","a@gmail.com","0","1");
INSERT INTO account VALUES("432","Operator","MTIzNDU2Nzg=","operator","a@gmail.com","0","1");
INSERT INTO account VALUES("44","Mizan123","MTIzNDU2Nzhh","assomanager","a@gmail.com","0","1");
INSERT INTO account VALUES("45","Mahir","MTIzNDU2Nzg=","assomanager","t@gmail.com","0","1");
INSERT INTO account VALUES("100","Aba","MTIzNDU2Nzg=","operator","aa@gmail.com","0","1");
INSERT INTO account VALUES("37","Dev123","MTIzNDU2Nzhh","devmanager","de@gmail.com","0","1");
INSERT INTO account VALUES("2112","Adiss","MTIzNDU2Nzg=","operator","w@gmail.com","0","1");
INSERT INTO account VALUES("68","Brihanu","MTIzNDU2Nzhh","Employee","a@gmail.com","0","1");
INSERT INTO account VALUES("20110005","Ass11","MTIzNDU2Nzhh","operator","As@gmail.com","0","1");


DROP TABLE IF EXISTS admin;

CREATE TABLE `admin` (
  `ADMIN_ID` int NOT NULL,
  `FIRST_NAME` varchar(30) NOT NULL,
  `MIDDLE_NAME` varchar(30) NOT NULL,
  `LAST_NAME` varchar(30) NOT NULL,
  `SEX` char(6) NOT NULL,
  `DOB` date NOT NULL,
  `QUALIFICATION` varchar(30) NOT NULL,
  `PHONE_NUMBER` int NOT NULL,
  `KEBELE` varchar(20) NOT NULL,
  PRIMARY KEY (`ADMIN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES("1","admin","adminman","adminu","m","2018-05-09","diploma","9876454","3");


DROP TABLE IF EXISTS association;

CREATE TABLE `association` (
  `EMPL_ID` int NOT NULL,
  `ASSOCIATION_ID` int NOT NULL AUTO_INCREMENT,
  `ASSOCIATION_NAME` varchar(34) NOT NULL,
  `FORMED_DATE` date NOT NULL,
  `PHONE_NO` int NOT NULL,
  `MANGER_NAME` varchar(30) NOT NULL,
  `MANAGER_ID` int NOT NULL,
  `LEVEL` int NOT NULL,
  PRIMARY KEY (`ASSOCIATION_ID`),
  KEY `EMPL_ID` (`EMPL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

INSERT INTO association VALUES("39","19","Tana Beles","2018-06-06","918715962","MIzanAlebel","44","3");
INSERT INTO association VALUES("39","20","Tiret","2018-06-06","918720499","SahileShferaw","47","2");
INSERT INTO association VALUES("39","21","Hibr","2018-06-07","918779159","MahrieEyasu","45","1");
INSERT INTO association VALUES("39","22","Blien","2018-06-06","918560386","MelkamDagnaw","48","2");
INSERT INTO association VALUES("39","23","Key Kebero","2010-03-02","918020084","Mersha W/Gebrial","49","1");
INSERT INTO association VALUES("39","24","Habesha","2010-06-04","974500202","Ashenafie Desalegn","46","3");
INSERT INTO association VALUES("39","25","Abay Zuria Zenbaba","2005-06-06","918766982","Belay Afework","50","2");
INSERT INTO association VALUES("39","26","Abay","2016-05-30","918340151","Abayneh Mahrie","51","1");
INSERT INTO association VALUES("39","27","Zenbaba","2018-06-05","930296554","Kumander Estifanos","52","3");
INSERT INTO association VALUES("39","28","Tisabay","2012-03-06","918027961","Asnka Tigabu","53","1");
INSERT INTO association VALUES("39","29","Alemsaga","2006-06-07","918719262","Andamlak","54","2");


DROP TABLE IF EXISTS bids;

CREATE TABLE `bids` (
  `bid_id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `content` text,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bid_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO bids VALUES("1","EPSS","Computer Laptop Tenders And GPN Opportunities 2025\nWe have identified 352 global computer laptop tenders from the public procurement domain worldwide. View the latest global tenders for computer laptop from Africa, the Americas, Asia, Australia, Europe, the Middle East, and other countries. Find global tender information, RFPs, RFQs, ICBs, bidding contracts, and invitations to bid for computer laptop tenders published by various government departments, the World Bank, the United Nations, multilateral funding agencies, military, defense, and private companies across the world.","2025-01-22","2025-01-24","Pending");
INSERT INTO bids VALUES("2","GOOGLE","Bids for laptops are requests for quotations or proposals from qualified suppliers to provide laptops. They may be issued by organizations or businesses to procure laptops for their own use. ","2025-01-24","2025-01-31","Pending");


DROP TABLE IF EXISTS collage;

CREATE TABLE `collage` (
  `collage_id` varchar(23) NOT NULL,
  `collage_name` varchar(22) DEFAULT NULL,
  `collage_status` varchar(35) NOT NULL,
  PRIMARY KEY (`collage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO collage VALUES("11","Agriculture","Active");
INSERT INTO collage VALUES("23","technology","Active");
INSERT INTO collage VALUES("3","Health","Active");
INSERT INTO collage VALUES("43","social scince","Block");


DROP TABLE IF EXISTS comment;

CREATE TABLE `comment` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `content` varchar(200) NOT NULL,
  `post_id` int NOT NULL,
  `date_posted` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

INSERT INTO comment VALUES("38","12","13","2025-01-23 12:15:07");
INSERT INTO comment VALUES("39","13","13","2025-01-23 12:15:07");
INSERT INTO comment VALUES("40","hii","13","2025-01-23 12:15:07");
INSERT INTO comment VALUES("41","1","14","2025-01-23 12:15:07");
INSERT INTO comment VALUES("42","2","14","2025-01-23 12:15:07");
INSERT INTO comment VALUES("43","","14","2025-01-23 12:15:07");
INSERT INTO comment VALUES("44","gggg","13","2025-01-23 12:15:07");
INSERT INTO comment VALUES("45","33333333333","15","2025-01-23 12:15:07");
INSERT INTO comment VALUES("46","2222222222","15","2025-01-23 12:15:07");
INSERT INTO comment VALUES("47","aaa","15","2025-01-23 12:15:07");
INSERT INTO comment VALUES("48","xxx","17","2025-01-23 12:15:07");
INSERT INTO comment VALUES("49","aaaaaaaaaaaa","19","2025-01-23 12:15:07");
INSERT INTO comment VALUES("50","zzz","21","2025-01-23 12:15:07");
INSERT INTO comment VALUES("51","sss","21","2025-01-23 12:15:07");
INSERT INTO comment VALUES("52","nnn","14","2025-01-23 12:15:07");
INSERT INTO comment VALUES("53","ffffff","2147483647","2025-01-23 12:15:07");
INSERT INTO comment VALUES("54","Ahmed","2147483647","2025-01-23 12:15:07");
INSERT INTO comment VALUES("55","rr","2147483647","2025-01-23 12:15:07");
INSERT INTO comment VALUES("56","hiiiiiii kkkkkkkk","2147483647","2025-01-23 12:15:07");
INSERT INTO comment VALUES("57","hello guys","23","2025-01-23 12:15:44");
INSERT INTO comment VALUES("58","WELL COME OURS SYSTEM","0","2025-01-23 12:17:10");


DROP TABLE IF EXISTS department;

CREATE TABLE `department` (
  `Did` varchar(24) NOT NULL,
  `collage_id` varchar(24) DEFAULT NULL,
  `Dept_Name` varchar(24) DEFAULT NULL,
  `Dept_status` varchar(33) NOT NULL,
  PRIMARY KEY (`Did`),
  KEY `collage_id` (`collage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO department VALUES("12","11","computer science","Active");
INSERT INTO department VALUES("19","23","computer science","Active");
INSERT INTO department VALUES("2","23","Information Technology","Active");


DROP TABLE IF EXISTS employee;

CREATE TABLE `employee` (
  `Employee_id` varchar(23) NOT NULL,
  `First_Name` varchar(25) DEFAULT NULL,
  `Middle_Name` varchar(33) NOT NULL,
  `Last_Name` varchar(25) DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `Dept_Office_collage_Id` varchar(25) DEFAULT NULL,
  `Employe_status` varchar(25) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Sex` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO employee VALUES("100","Ahmed","Hussen","Ali","Male","ahmbim@gmail.com","onduty","","2025-01-18 14:02:04");
INSERT INTO employee VALUES("13","Yibeltal","Goda","Asnake","yibe@gmail.com","2","onduty","2031-03-18","Male");
INSERT INTO employee VALUES("17","tom","jerry","jo","tom@gmail.com","cs","onduty","2024-12-09","Female");
INSERT INTO employee VALUES("22","Ahhhhyyyyy","Hussen","Mgg","Male","ahmbim@gmail.com","Abay","0000-00-00","2025-01-18 14:09:57");
INSERT INTO employee VALUES("556765","Ahhhhyyyyy","Agt","Mgg","Female","a@gmail.com","Alemsaga","0000-00-00","2025-01-18 14:05:49");


DROP TABLE IF EXISTS employee1;

CREATE TABLE `employee1` (
  `EID` int NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` varchar(25) NOT NULL,
  `MIDDLE_NAME` varchar(25) NOT NULL,
  `LAST_ANAME` varchar(25) NOT NULL,
  `SEX` char(6) NOT NULL,
  `DOB` date NOT NULL,
  `PHONE_NO` int NOT NULL,
  `KEBELE` varchar(23) NOT NULL,
  `QUALIFICATION` varchar(35) NOT NULL,
  `ROLE` varchar(35) NOT NULL,
  `ADMIN_ID` int NOT NULL,
  PRIMARY KEY (`EID`),
  KEY `ADMIN_ID` (`ADMIN_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

INSERT INTO employee1 VALUES("72","Ahmed","Hussen","Ali","M","2001-01-01","251923","04","Bsc","System Admin","1");


DROP TABLE IF EXISTS item;

CREATE TABLE `item` (
  `item_Register_ID` varchar(23) NOT NULL,
  `serial_numbre` varchar(33) DEFAULT NULL,
  `item_model` varchar(44) DEFAULT NULL,
  `catagory` varchar(33) DEFAULT NULL,
  `description` varchar(33) DEFAULT NULL,
  `shelf_number` varchar(33) DEFAULT NULL,
  `request_id` varchar(23) DEFAULT NULL,
  `supplier_id` varchar(23) DEFAULT NULL,
  `stockclerk_id` varchar(32) DEFAULT NULL,
  `price` varchar(31) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`item_Register_ID`),
  KEY `request_id` (`request_id`),
  KEY `supplier_id` (`supplier_id`),
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `request` (`request_id`),
  CONSTRAINT `item_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO item VALUES("10000","3454","222","non_fixed","wwee","333","55","4643","33333","4560","2025-01-22 10:00:32");
INSERT INTO item VALUES("43","23","toshiba","fixed","8GB","47","12","15","15","7600001","2018-04-24");
INSERT INTO item VALUES("4646","90","toshiba","fixedhhh","8GB","6","12","4643","4643","20002","2018-04-18");
INSERT INTO item VALUES("556765","3454","lap","fixed","wwee","333","11","15","33333","23","2025-01-22 09:56:59");


DROP TABLE IF EXISTS item_transfer;

CREATE TABLE `item_transfer` (
  `transfer_id` varchar(23) NOT NULL,
  `withdraw_id` varchar(23) DEFAULT NULL,
  `Transfer_employe_ID` varchar(33) DEFAULT NULL,
  `Reciver_employe_ID` varchar(32) DEFAULT NULL,
  `witness_employe_ID` varchar(25) DEFAULT NULL,
  `DateOf_Register` varchar(29) DEFAULT NULL,
  PRIMARY KEY (`transfer_id`),
  KEY `withdraw_id` (`withdraw_id`),
  CONSTRAINT `item_transfer_ibfk_1` FOREIGN KEY (`withdraw_id`) REFERENCES `item_withdraw` (`withdraw_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO item_transfer VALUES("","45","17","100","55","2025-01-22 12:46:40");
INSERT INTO item_transfer VALUES("11","3","22","45","44","2024-11-25");


DROP TABLE IF EXISTS item_withdraw;

CREATE TABLE `item_withdraw` (
  `withdraw_id` varchar(23) NOT NULL,
  `item_Register_ID` varchar(33) DEFAULT NULL,
  `stockclerk_employee_ID` varchar(34) DEFAULT NULL,
  `Employee_id` varchar(23) DEFAULT NULL,
  `DateOf_Register` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`withdraw_id`),
  UNIQUE KEY `item_Register_ID` (`item_Register_ID`),
  KEY `Employee_id` (`Employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO item_withdraw VALUES("1000","","","100","2025-01-22 12:33:06");
INSERT INTO item_withdraw VALUES("3","43","4","1","23-11-2024");
INSERT INTO item_withdraw VALUES("33","4646","2","1","");
INSERT INTO item_withdraw VALUES("45","556765","100","100","2025-01-22 12:38:47");


DROP TABLE IF EXISTS notice;

CREATE TABLE `notice` (
  `id` int NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Content` text,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Status` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO notice VALUES("0","aa","dd","2025-01-18","2025-01-28","Active");


DROP TABLE IF EXISTS office;

CREATE TABLE `office` (
  `office_id` varchar(23) NOT NULL,
  `office_name` varchar(23) DEFAULT NULL,
  `office_status` varchar(43) NOT NULL,
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO office VALUES("11","General Service","Active");
INSERT INTO office VALUES("12","ahmed","Active");
INSERT INTO office VALUES("13","stockclerk","Active");
INSERT INTO office VALUES("33","ICT Directorate","Active");
INSERT INTO office VALUES("44","ahmed","Active");


DROP TABLE IF EXISTS post;

CREATE TABLE `post` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `content` varchar(200) NOT NULL,
  `posted_by` int NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `posted_by` (`posted_by`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO post VALUES("14","mahir","45");


DROP TABLE IF EXISTS postion;

CREATE TABLE `postion` (
  `postion_name` varchar(50) DEFAULT NULL,
  `postion_id` varchar(40) NOT NULL,
  `Employee_id` varchar(23) DEFAULT NULL,
  `Dept_Office_collage_Id` varchar(40) DEFAULT NULL,
  `postion_status` varchar(33) DEFAULT NULL,
  `DateOfRegistration` varchar(44) DEFAULT NULL,
  PRIMARY KEY (`postion_id`),
  KEY `Employee_id` (`Employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO postion VALUES("collage","17","3","12","Active","2024-11-29");
INSERT INTO postion VALUES("office","345","4647","2","Active","2024-11-22");
INSERT INTO postion VALUES("Office","identity(1,1)","100","11","Active","2025-01-22 12:19:04");


DROP TABLE IF EXISTS request;

CREATE TABLE `request` (
  `request_id` varchar(23) NOT NULL,
  `Employee_id` varchar(23) DEFAULT NULL,
  `item_name` varchar(34) DEFAULT NULL,
  `specification` varchar(34) DEFAULT NULL,
  `quentity` varchar(34) DEFAULT NULL,
  `request_from` varchar(34) DEFAULT NULL,
  `Date` varchar(34) DEFAULT NULL,
  `status` varchar(34) DEFAULT NULL,
  PRIMARY KEY (`request_id`),
  KEY `Employee_id` (`Employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO request VALUES("0000","100","66","hp","100","directorate","2025-01-23","seen by procurement");
INSERT INTO request VALUES("11","43","hp","8GB","12","19","2018-03-28","seen");
INSERT INTO request VALUES("12","13","library","to","2","19","2018-03-28","seen");
INSERT INTO request VALUES("13","44","social","desktop","12","11","2018-04-13","seen by procurment");
INSERT INTO request VALUES("19","","Ahmed Hussen Ali","hp","100","","2025-01-22 17:40:54","send by VicePresidant");
INSERT INTO request VALUES("45","","Ahmed Hussen Ali","hp","12","","2025-01-22 17:43:38","Reject by procurement");
INSERT INTO request VALUES("55","13","social","ww","9","3","2018-03-28","seen by procurment");
INSERT INTO request VALUES("556765","100","66","hp","100","college dean","2025-01-22","pending");


DROP TABLE IF EXISTS schedule;

CREATE TABLE `schedule` (
  `EMPL_ID` int NOT NULL,
  `BORD_NUMBER` int NOT NULL,
  `ASSOCIATION_NAME` varchar(30) NOT NULL,
  `REQ_ID` int NOT NULL,
  `INITIAL_PLACE` varchar(34) NOT NULL,
  `DESTINATION_PLACE` varchar(45) NOT NULL,
  `LEVEL` varchar(23) NOT NULL,
  `PREPARED_DATE` date NOT NULL,
  `DISTANCE` varchar(23) NOT NULL,
  `TARIFF` varchar(35) NOT NULL,
  `STATUS` varchar(23) DEFAULT NULL,
  KEY `EMPL_ID` (`EMPL_ID`,`ASSOCIATION_NAME`,`REQ_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO schedule VALUES("40","1002","Tana Beles","70","Bahir Dar","Gondar","Level 3","2018-06-02","1750","800","Null");
INSERT INTO schedule VALUES("40","567","Tana Beles","20110016","bahirdar","Adis Abeba","Level 1","2018-06-03","","","OutBDR");
INSERT INTO schedule VALUES("40","0","Tana Beles","101","bahir","go","","2018-06-01","","","Null");
INSERT INTO schedule VALUES("40","567","Tana Beles","20110016","bahirdar","Adis Abeba","Level 3","2018-06-03","","","OutBDR");
INSERT INTO schedule VALUES("40","39","Tana Beles","2112","xxx","yyyy","level 3","2018-06-01","180","10000","Null");
INSERT INTO schedule VALUES("40","200","Tana Beles","20110005","Bahir Dar","Adis Abeba","level 1","2018-06-02","200","200","InBDR");
INSERT INTO schedule VALUES("40","0","Tana Beles","101","bahir","go","","2018-06-04","áˆµáˆµáˆµ","á‰¥áˆ­","Null");
INSERT INTO schedule VALUES("40","0","Tana Beles","101","bahir","go","","2018-06-04","áˆ…áˆ…áˆ…","á‰¥áˆ­áˆ­","Null");


DROP TABLE IF EXISTS schedule_backup;

CREATE TABLE `schedule_backup` (
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

INSERT INTO schedule_backup VALUES("1002","70","Bahir Dar","Gondar","2018-05-31 00:00:00","Level 3","175","80","Null");
INSERT INTO schedule_backup VALUES("1002","90","Bahir Dar","debr Brihan","2018-05-31 00:00:00","","190","30","Null");
INSERT INTO schedule_backup VALUES("400","2112","hhdshf","hfdhf","2018-05-31 00:00:00","level 3","435","534","InBDR");
INSERT INTO schedule_backup VALUES("400","2112","hhdshf","hfdhf","2018-05-31 09:41:22","level 3","435","534","OutBDR");
INSERT INTO schedule_backup VALUES("400","2112","hhdshf","hfdhf","2018-05-31 09:43:25","level 3","435","534","OutBDR");
INSERT INTO schedule_backup VALUES("1002","70","Bahir Dar","Gondar","2018-05-31 09:57:39","Level 3","175","80","Null");
INSERT INTO schedule_backup VALUES("1002","70","Bahir Dar","Gondar","2018-05-31 10:21:19","Level 3","175","80","OutBDR");
INSERT INTO schedule_backup VALUES("1002","70","Bahir Dar","Gondar","2018-05-31 10:22:02","Level 3","175","80","InBDR");
INSERT INTO schedule_backup VALUES("1002","70","Bahirar","Gondar","2018-06-02 09:45:18","Level 3","1750","800","Null");
INSERT INTO schedule_backup VALUES("200","20110005","BahirDar","AdissAbeba","2018-06-02 15:17:19","level 1","200","200","InBDR");
INSERT INTO schedule_backup VALUES("567","20110016","bahirdar","Adis Abeba","2018-06-02 22:14:48","Level 3","","","OutBDR");


DROP TABLE IF EXISTS shedule_request;

CREATE TABLE `shedule_request` (
  `OPERATOR_ID` int NOT NULL,
  `REQUEST_FOR` varchar(45) NOT NULL,
  `ASSOCATION_NAME` varchar(45) NOT NULL,
  `BORD_NO` int NOT NULL,
  `LEVEL` varchar(26) NOT NULL,
  `REQUEST_DATE` date NOT NULL,
  `FROM` varchar(56) NOT NULL,
  `TO` varchar(56) NOT NULL,
  `PERMISSION` varchar(34) NOT NULL,
  `PREPARED` varchar(50) NOT NULL,
  KEY `OPERATOR_ID` (`OPERATOR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO shedule_request VALUES("101","To Update","Tana Beles","0","","0000-00-00","bahir","go","Yes","Done");
INSERT INTO shedule_request VALUES("2112","New User","Tana Beles","700","Level 3","2010-05-01","Bahir Dar","Gondar","Yes","Done");
INSERT INTO shedule_request VALUES("20110016","New User","Tana Beles","567","Level 3","0000-00-00","bahirdar","Adiss Abeba","Yes","Ok");
INSERT INTO shedule_request VALUES("2112","To Update","Tana Beles","39","level 3","2018-05-29","xxx","yyyy","wait","Ok");
INSERT INTO shedule_request VALUES("20110005","New User","Tana Beles","200","level 1","2018-06-02","BahirDar","AdissAbeba","Yes","Done");


DROP TABLE IF EXISTS supplier;

CREATE TABLE `supplier` (
  `supplier_id` varchar(23) NOT NULL,
  `Organization_Name` varchar(23) DEFAULT NULL,
  `phone` int NOT NULL,
  `country` varchar(20) DEFAULT NULL,
  `city` varchar(33) NOT NULL,
  `Tin_Number` varchar(34) NOT NULL,
  `Date` varchar(23) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO supplier VALUES("15","Ahm","923117939","Kenya","Adama","667","2024-12-09","10233","Pending");
INSERT INTO supplier VALUES("4643","AASTU","923117939","Ethiopia","Addis Ababa","667","2024-12-09","2345","Winner");
INSERT INTO supplier VALUES("556765","iso","0","ad","+251923 117 939","333","2025-01-22 09:31:53","23","Winner");


DROP TABLE IF EXISTS upload;

CREATE TABLE `upload` (
  `DATE` date NOT NULL,
  `NOTICE_FOR` varchar(45) NOT NULL,
  `IMAGE` varchar(564) NOT NULL,
  `TEXT` varchar(234) NOT NULL,
  `EMPL_ID` int NOT NULL,
  KEY `EMPL_ID` (`EMPL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO upload VALUES("2025-01-23","For All","lap.jpeg","Detail Specification of All Items","1");
INSERT INTO upload VALUES("2025-01-23","For All","lap.jpeg","Urgent???????????? 2025 Academic Calendar","1");



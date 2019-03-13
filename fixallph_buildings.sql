# Host: localhost  (Version 5.5.5-10.1.26-MariaDB)
# Date: 2019-03-14 07:31:46
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "apartmentinfo"
#

DROP TABLE IF EXISTS `apartmentinfo`;
CREATE TABLE `apartmentinfo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectId` int(11) DEFAULT NULL,
  `ApartmentName` varchar(255) DEFAULT NULL,
  `SectionCount` int(11) DEFAULT NULL,
  `PictureCount` int(11) DEFAULT NULL,
  `PartInfos` text,
  `SectionInfos` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;

#
# Data for table "apartmentinfo"
#

INSERT INTO `apartmentinfo` VALUES (66,2,'ap1',9,63,'1,10','1,10,50,-1,-1,-1,-1,-1,-1'),(67,2,'ap2',13,88,'-1,-1','-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1'),(68,2,'ap3',10,69,'1,50','1,10,20,30,-1,-1,-1,-1,-1,-1');

#
# Structure for table "defect_reparation"
#

DROP TABLE IF EXISTS `defect_reparation`;
CREATE TABLE `defect_reparation` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectId` int(11) DEFAULT NULL,
  `ApartmentNumber` int(11) DEFAULT NULL,
  `PhotoIdx` int(11) DEFAULT NULL,
  `PhotoCat` varchar(255) DEFAULT NULL,
  `idxGroup` int(11) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `OriginalFilePath` varchar(255) DEFAULT NULL,
  `SmallFilePath` varchar(255) DEFAULT NULL,
  `PosRect` varchar(255) DEFAULT NULL,
  `Infos` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

#
# Data for table "defect_reparation"
#

INSERT INTO `defect_reparation` VALUES (3,2,2,1,'plan',0,'Defect','container/project1/uploaded//original/2019-02-25-13-50-59.jpg','container/project1/uploaded//small/2019-02-25-13-50-59.jpg','{\"left\":276,\"top\":186,\"width\":74,\"height\":53.5938,\"parentWidth\":565,\"parentHeight\":377.25}','{\"ShootingDate\":\"2019-1-24\",\"ShootingTime\":\"During Construction Works\",\"ShootingPerson\":\"Company representative\",\"Frequency\":\"First Defect\",\"Origin\":\"Works Defect\",\"Structure\":\"Structural Defect\",\"Level\":\"Minor\",\"Desc\":\"\",\"Description\":\"\",\"Worker\":\"\",\"Contractor\":\"\"}'),(4,2,2,1,'plan',0,'Defect','container/project1/uploaded//original/2019-02-25-13-51-22.png','container/project1/uploaded//small/2019-02-25-13-51-22.png','{\"left\":284,\"top\":174,\"width\":74,\"height\":74.875,\"parentWidth\":565,\"parentHeight\":377.25}','{\"ShootingDate\":\"2018-6-1\",\"ShootingTime\":\"During Construction Works\",\"ShootingPerson\":\"Company representative\",\"Frequency\":\"First Defect\",\"Origin\":\"Works Defect\",\"Structure\":\"Structural Defect\",\"Level\":\"Minor\",\"Desc\":\"\",\"Description\":\"\",\"Worker\":\"\",\"Contractor\":\"\"}'),(8,2,2,1,'plan',0,'Reparation','container/project1/uploaded/original/2019-02-28-20-59-12.png','container/project1/uploaded/small/2019-02-28-20-59-12.png','{\"left\":248,\"top\":170,\"width\":74,\"height\":45.2813,\"parentWidth\":503.85900000000004,\"parentHeight\":336.422}','{\"ShootingDate\":\"2018-6-24\",\"ShootingTime\":\"במהלך הבנייה\",\"ShootingPerson\":\"נציג החברה\",\"Frequency\":\"עזרה ראשונה\",\"Origin\":\"פגמים עבודה\",\"Structure\":\"מבני\",\"Level\":\"דחוף\",\"Desc\":\"\",\"Description\":\"\",\"Worker\":\"\",\"Contractor\":\"\"}'),(9,2,2,2,'plan',0,'','container/project1/uploaded/original/2019-02-28-21-03-37.jpg','container/project1/uploaded/small/2019-02-28-21-03-37.jpg','{\"left\":244,\"top\":121,\"width\":74,\"height\":53.5938,\"parentWidth\":503.85900000000004,\"parentHeight\":336.422}','{\"ShootingDate\":\"2019-1-24\",\"ShootingTime\":\"במהלך הבנייה\",\"ShootingPerson\":\"נציג החברה\",\"Frequency\":\"תקלה ראשונה\",\"Origin\":\"פגמים עבודה\",\"Structure\":\"מבני\",\"Level\":\"דחוף\",\"Desc\":\"\",\"Description\":\"\",\"Worker\":\"\",\"Contractor\":\"\"}'),(10,2,2,2,'plan',0,'','container/project1/uploaded/original/2019-02-28-21-03-45.png','container/project1/uploaded/small/2019-02-28-21-03-45.png','{\"left\":237,\"top\":128,\"width\":74,\"height\":45.2813,\"parentWidth\":503.85900000000004,\"parentHeight\":336.422}','{\"ShootingDate\":\"2018-6-24\",\"ShootingTime\":\"במהלך הבנייה\",\"ShootingPerson\":\"נציג החברה\",\"Frequency\":\"עזרה ראשונה\",\"Origin\":\"פגמים עבודה\",\"Structure\":\"מבני\",\"Level\":\"דחוף\",\"Desc\":\"\",\"Description\":\"\",\"Worker\":\"\",\"Contractor\":\"\"}'),(11,2,2,2,'plan',1,'','container/project1/uploaded/original/2019-02-28-21-06-47.jpg','container/project1/uploaded/small/2019-02-28-21-06-47.jpg','{\"left\":127,\"top\":141,\"width\":74,\"height\":53.5938,\"parentWidth\":503.85900000000004,\"parentHeight\":336.422}','{\"ShootingDate\":\"2019-1-24\",\"ShootingTime\":\"במהלך הבנייה\",\"ShootingPerson\":\"נציג החברה\",\"Frequency\":\"תקלה ראשונה\",\"Origin\":\"פגמים עבודה\",\"Structure\":\"מבני\",\"Level\":\"דחוף\",\"Desc\":\"\",\"Description\":\"\",\"Worker\":\"\",\"Contractor\":\"\"}'),(12,2,2,2,'plan',1,'Defect','container/project1/uploaded/original/2019-02-28-21-08-48.png','container/project1/uploaded/small/2019-02-28-21-08-48.png','{\"left\":130,\"top\":146,\"width\":74,\"height\":45.2813,\"parentWidth\":503.85900000000004,\"parentHeight\":336.422}','{\"ShootingDate\":\"2018-6-24\",\"ShootingTime\":\"במהלך הבנייה\",\"ShootingPerson\":\"נציג החברה\",\"Frequency\":\"תקלה ראשונה\",\"Origin\":\"פגמים עבודה\",\"Structure\":\"מבני\",\"Level\":\"דחוף\",\"Desc\":\"\",\"Description\":\"\",\"Worker\":\"\",\"Contractor\":\"\"}'),(13,2,2,2,'plan',1,'Defect','container/project1/uploaded/original/2019-02-28-21-09-31.png','container/project1/uploaded/small/2019-02-28-21-09-31.png','{\"left\":117,\"top\":147,\"width\":74,\"height\":53.5938,\"parentWidth\":503.85900000000004,\"parentHeight\":336.422}','{\"ShootingDate\":\"2018-6-27\",\"ShootingTime\":\"במהלך הבנייה\",\"ShootingPerson\":\"נציג החברה\",\"Frequency\":\"תקלה ראשונה\",\"Origin\":\"פגמים עבודה\",\"Structure\":\"מבני\",\"Level\":\"דחוף\",\"Desc\":\"\",\"Description\":\"\",\"Worker\":\"\",\"Contractor\":\"\"}'),(14,2,2,2,'plan',1,'Defect','container/project1/uploaded/original/2019-02-28-21-11-30.png','container/project1/uploaded/small/2019-02-28-21-11-30.png','{\"left\":111,\"top\":154,\"width\":74,\"height\":44.7344,\"parentWidth\":503.85900000000004,\"parentHeight\":336.422}','{\"ShootingDate\":\"2018-6-26\",\"ShootingTime\":\"במהלך הבנייה\",\"ShootingPerson\":\"נציג החברה\",\"Frequency\":\"עזרה ראשונה\",\"Origin\":\"פגמים עבודה\",\"Structure\":\"מבני\",\"Level\":\"דחוף\",\"Desc\":\"\",\"Description\":\"\",\"Worker\":\"\",\"Contractor\":\"\"}'),(15,2,2,2,'plan',1,'Defect','container/project1/uploaded/original/2019-02-28-21-12-15.png','container/project1/uploaded/small/2019-02-28-21-12-15.png','{\"left\":130,\"top\":147,\"width\":74,\"height\":45.3594,\"parentWidth\":503.85900000000004,\"parentHeight\":336.422}','{\"ShootingDate\":\"2018-6-21\",\"ShootingTime\":\"במהלך הבנייה\",\"ShootingPerson\":\"נציג החברה\",\"Frequency\":\"עזרה ראשונה\",\"Origin\":\"פגמים עבודה\",\"Structure\":\"מבני\",\"Level\":\"דחוף\",\"Desc\":\"\",\"Description\":\"\",\"Worker\":\"\",\"Contractor\":\"\"}'),(16,2,2,2,'plan',1,'Defect','container/project1/uploaded/original/2019-02-28-21-13-14.png','container/project1/uploaded/small/2019-02-28-21-13-14.png','{\"left\":129,\"top\":114,\"width\":74,\"height\":84.8281,\"parentWidth\":503.85900000000004,\"parentHeight\":336.422}','{\"ShootingDate\":\"2018-9-12\",\"ShootingTime\":\"במהלך הבנייה\",\"ShootingPerson\":\"נציג החברה\",\"Frequency\":\"עזרה ראשונה\",\"Origin\":\"פגמים עבודה\",\"Structure\":\"מבני\",\"Level\":\"דחוף\",\"Desc\":\"\",\"Description\":\"\",\"Worker\":\"\",\"Contractor\":\"\"}'),(17,2,2,2,'plan',1,'Reparation','container/project1/uploaded/original/2019-02-28-21-16-18.png','container/project1/uploaded/small/2019-02-28-21-16-18.png','{\"left\":126,\"top\":137,\"width\":74,\"height\":45.2813,\"parentWidth\":503.85900000000004,\"parentHeight\":336.422}','{\"ShootingDate\":\"2018-6-24\",\"ShootingTime\":\"במהלך הבנייה\",\"ShootingPerson\":\"נציג החברה\",\"Frequency\":\"עזרה ראשונה\",\"Origin\":\"פגמים עבודה\",\"Structure\":\"מבני\",\"Level\":\"דחוף\",\"Desc\":\"\",\"Description\":\"\",\"Worker\":\"\",\"Contractor\":\"\"}');

#
# Structure for table "note"
#

DROP TABLE IF EXISTS `note`;
CREATE TABLE `note` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectId` int(11) DEFAULT NULL,
  `ApartmentNumber` int(11) DEFAULT NULL,
  `PhotoIdx` int(11) DEFAULT NULL,
  `Notes` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

#
# Data for table "note"
#

INSERT INTO `note` VALUES (1,2,1,1,''),(2,2,1,2,'sample2.'),(3,2,1,3,'sadf'),(4,2,1,4,'fadsf'),(5,2,1,5,'asdfsdfasdf'),(6,2,1,8,'8'),(7,2,3,1,'ap2-1'),(8,2,2,1,''),(9,2,2,2,'ap2-2'),(10,2,2,3,'');

#
# Structure for table "parts"
#

DROP TABLE IF EXISTS `parts`;
CREATE TABLE `parts` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectId` int(11) DEFAULT NULL,
  `PartName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

#
# Data for table "parts"
#

INSERT INTO `parts` VALUES (2,2,'ceilings'),(3,2,'floorings');

#
# Structure for table "projectinfo"
#

DROP TABLE IF EXISTS `projectinfo`;
CREATE TABLE `projectinfo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectPath` varchar(255) DEFAULT NULL,
  `ProjectName` varchar(255) DEFAULT NULL,
  `ProjectNumber` varchar(255) DEFAULT NULL,
  `ProjectType` varchar(255) DEFAULT NULL,
  `Zone` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `Street` varchar(255) DEFAULT NULL,
  `No` varchar(255) DEFAULT NULL,
  `Constructor` varchar(255) DEFAULT NULL,
  `ProjectManager` varchar(255) DEFAULT NULL,
  `WorksManager` varchar(255) DEFAULT NULL,
  `Photography` varchar(255) DEFAULT NULL,
  `DocumentDate` date DEFAULT NULL,
  `BuildingNumber` varchar(255) DEFAULT NULL,
  `EntranceNumber` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "projectinfo"
#

INSERT INTO `projectinfo` VALUES (2,'project1','Project_1','123','Office','Zone','City','Street','No','Constructor ','Project Manager','Works ','Photography ','2019-02-20','12','B');

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserEmail` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `InviteUrl` varchar(255) DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (4,NULL,'admin','admin',NULL),(9,'wangstar1031@hotmail.com',NULL,NULL,'1mI5183eiDJtZ0nOf0A4RUZ8M601k1tk1xhCL3A3ztFr0KHsJI');

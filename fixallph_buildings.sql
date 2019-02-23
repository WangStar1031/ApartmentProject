# Host: localhost  (Version 5.5.5-10.1.26-MariaDB)
# Date: 2019-02-23 12:09:55
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Structure for table "parts"
#

DROP TABLE IF EXISTS `parts`;
CREATE TABLE `parts` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectId` int(11) DEFAULT NULL,
  `PartName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

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

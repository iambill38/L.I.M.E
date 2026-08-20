CREATE DATABASE  IF NOT EXISTS `lime` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `lime`;
-- MySQL dump 10.13  Distrib 8.0.46, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: lime
-- ------------------------------------------------------
-- Server version	8.0.46

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `AdminID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `PermissionLevel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `application` (
  `ApplicationID` int NOT NULL AUTO_INCREMENT,
  `StudentID` int NOT NULL,
  `OpportunityID` int NOT NULL,
  `ApplyDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending',
  PRIMARY KEY (`ApplicationID`),
  KEY `fk_application_student` (`StudentID`),
  KEY `fk_application_opportunity` (`OpportunityID`),
  CONSTRAINT `fk_application_opportunity` FOREIGN KEY (`OpportunityID`) REFERENCES `opportunity` (`OpportunityID`) ON DELETE CASCADE,
  CONSTRAINT `fk_application_student` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company` (
  `CompanyID` int NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `RegistrationNumber` varchar(100) NOT NULL,
  `OfficialEmail` varchar(255) NOT NULL,
  `Domain` varchar(255) DEFAULT NULL,
  `Industry` varchar(150) DEFAULT NULL,
  `Website` varchar(255) DEFAULT NULL,
  `VerificationStatus` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `DateRegistered` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CompanyID`),
  UNIQUE KEY `UserID` (`UserID`),
  CONSTRAINT `fk_company_user` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `institution`
--

DROP TABLE IF EXISTS `institution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `institution` (
  `InstitutionID` int NOT NULL AUTO_INCREMENT,
  `InstitutionName` varchar(255) NOT NULL,
  `Type` enum('University','College','TVET','Other') DEFAULT NULL,
  `Country` varchar(100) DEFAULT 'South Africa',
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`InstitutionID`),
  UNIQUE KEY `InstitutionName` (`InstitutionName`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `MessageID` int NOT NULL AUTO_INCREMENT,
  `SenderUserID` int NOT NULL,
  `ReceiverUserID` int NOT NULL,
  `Content` text NOT NULL,
  `Timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `IsRead` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`MessageID`),
  KEY `fk_message_sender` (`SenderUserID`),
  KEY `fk_message_receiver` (`ReceiverUserID`),
  CONSTRAINT `fk_message_receiver` FOREIGN KEY (`ReceiverUserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE,
  CONSTRAINT `fk_message_sender` FOREIGN KEY (`SenderUserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `NotificationID` int NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `Type` varchar(100) DEFAULT NULL,
  `Content` text,
  `Timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `IsRead` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`NotificationID`),
  KEY `fk_notification_user` (`UserID`),
  CONSTRAINT `fk_notification_user` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `opportunity`
--

DROP TABLE IF EXISTS `opportunity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `opportunity` (
  `OpportunityID` int NOT NULL AUTO_INCREMENT,
  `CompanyID` int NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text,
  `Type` enum('Internship','Workshop','WIL') NOT NULL,
  `RequiredSkill` varchar(500) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `DatePosted` datetime DEFAULT CURRENT_TIMESTAMP,
  `Deadline` date DEFAULT NULL,
  `Status` enum('Open','Closed') DEFAULT 'Open',
  PRIMARY KEY (`OpportunityID`),
  KEY `fk_opportunity_company` (`CompanyID`),
  CONSTRAINT `fk_opportunity_company` FOREIGN KEY (`CompanyID`) REFERENCES `company` (`CompanyID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project` (
  `ProjectID` int NOT NULL AUTO_INCREMENT,
  `StudentID` int DEFAULT NULL,
  `ProjectType` enum('Project','Assignment') DEFAULT NULL,
  `Title` varchar(50) NOT NULL,
  `ProjectDescription` varchar(250) DEFAULT NULL,
  `Filepath` varchar(512) DEFAULT NULL,
  `DatePosted` date NOT NULL DEFAULT (curdate()),
  PRIMARY KEY (`ProjectID`),
  KEY `fk_project_student` (`StudentID`),
  CONSTRAINT `fk_project_student` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `projectskill`
--

DROP TABLE IF EXISTS `projectskill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projectskill` (
  `ProjectID` int NOT NULL,
  `SkillID` int NOT NULL,
  PRIMARY KEY (`ProjectID`,`SkillID`),
  KEY `fk_projectskill_skill` (`SkillID`),
  CONSTRAINT `fk_projectskill_project` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ProjectID`) ON DELETE CASCADE,
  CONSTRAINT `fk_projectskill_skill` FOREIGN KEY (`SkillID`) REFERENCES `skill` (`SkillID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `recommendation`
--

DROP TABLE IF EXISTS `recommendation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recommendation` (
  `RecommendationID` int NOT NULL AUTO_INCREMENT,
  `StudentID` int NOT NULL,
  `OpportunityID` int NOT NULL,
  `RelevanceScore` decimal(5,2) DEFAULT NULL,
  `AIData` text,
  `DateGenerated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`RecommendationID`),
  KEY `fk_recommendation_student` (`StudentID`),
  KEY `fk_recommendation_opportunity` (`OpportunityID`),
  CONSTRAINT `fk_recommendation_opportunity` FOREIGN KEY (`OpportunityID`) REFERENCES `opportunity` (`OpportunityID`) ON DELETE CASCADE,
  CONSTRAINT `fk_recommendation_student` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `skill`
--

DROP TABLE IF EXISTS `skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skill` (
  `SkillID` int NOT NULL AUTO_INCREMENT,
  `SkillName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`SkillID`),
  UNIQUE KEY `SkillName` (`SkillName`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
  `StudentID` int NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `InstitutionID` int DEFAULT NULL,
  `FirstName` varchar(100) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `StudentNumber` int DEFAULT NULL,
  `ApprovalStatus` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `LinkedIn` varchar(250) DEFAULT NULL,
  `Github` varchar(250) DEFAULT NULL,
  `RegisteredDate` date NOT NULL DEFAULT (curdate()),
  PRIMARY KEY (`StudentID`),
  UNIQUE KEY `UserID` (`UserID`),
  KEY `fk_student_institution` (`InstitutionID`),
  CONSTRAINT `fk_student_institution` FOREIGN KEY (`InstitutionID`) REFERENCES `institution` (`InstitutionID`) ON DELETE SET NULL,
  CONSTRAINT `fk_student_user` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE,
  CONSTRAINT `chk_student_github` CHECK (((`Github` is null) or regexp_like(`Github`,_utf8mb4'^https?://([a-z0-9-]+\\.)*github\\.com/.*$'))),
  CONSTRAINT `chk_student_linkedin` CHECK (((`LinkedIn` is null) or regexp_like(`LinkedIn`,_utf8mb4'^https?://([a-z0-9-]+\\.)*linkedin\\.com/.*$')))
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `studentskill`
--

DROP TABLE IF EXISTS `studentskill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `studentskill` (
  `StudentID` int NOT NULL,
  `SkillID` int NOT NULL,
  PRIMARY KEY (`StudentID`,`SkillID`),
  KEY `fk_studentskill_skill` (`SkillID`),
  CONSTRAINT `fk_studentskill_skill` FOREIGN KEY (`SkillID`) REFERENCES `skill` (`SkillID`) ON DELETE CASCADE,
  CONSTRAINT `fk_studentskill_student` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` enum('Student','Company') NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Email` (`Email`),
  CONSTRAINT `chk_user_email` CHECK (regexp_like(`Email`,_utf8mb4'^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,}$'))
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-20 16:47:38

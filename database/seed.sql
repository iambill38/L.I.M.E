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
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
INSERT INTO `application` (`ApplicationID`, `StudentID`, `OpportunityID`, `ApplyDate`, `Status`) VALUES (1,1,1,'2026-08-20 14:41:58','Pending'),(2,2,1,'2026-08-20 14:41:58','Accepted'),(3,3,2,'2026-08-20 14:41:58','Rejected');
/*!40000 ALTER TABLE `application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` (`CompanyID`, `UserID`, `Name`, `RegistrationNumber`, `OfficialEmail`, `Domain`, `Industry`, `Website`, `VerificationStatus`, `DateRegistered`) VALUES (1,201,'Acme Innovations','','',NULL,'Software Engineering',NULL,'Pending','2026-08-20 14:41:58'),(2,202,'CloudOps Solutions','','',NULL,'Cloud Infrastructure',NULL,'Pending','2026-08-20 14:41:58'),(3,203,'Data Analytics SA','','',NULL,'Data Science & BI',NULL,'Pending','2026-08-20 14:41:58');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `institution`
--

LOCK TABLES `institution` WRITE;
/*!40000 ALTER TABLE `institution` DISABLE KEYS */;
INSERT INTO `institution` (`InstitutionID`, `InstitutionName`, `Type`, `Country`, `CreatedAt`) VALUES (1,'University of Cape Town','University','South Africa','2026-08-20 14:41:58'),(2,'False Bay TVET College','TVET','South Africa','2026-08-20 14:41:58'),(3,'Stellenbosch University','University','South Africa','2026-08-20 14:41:58');
/*!40000 ALTER TABLE `institution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`MessageID`, `SenderUserID`, `ReceiverUserID`, `Content`, `Timestamp`, `IsRead`) VALUES (1,201,102,'Hi Sophia, thank you for submitting your application!','2026-08-20 14:41:58',1),(2,102,201,'Thanks! I am really looking forward to discussing the position further.','2026-08-20 14:41:58',1),(3,201,102,'Great! Are you available for a brief technical screening tomorrow at 10 AM?','2026-08-20 14:41:58',0),(4,103,201,'Hello, I had a quick question regarding the required skills for the WIL program.','2026-08-20 14:41:58',0);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` (`NotificationID`, `UserID`, `Type`, `Content`, `Timestamp`, `IsRead`) VALUES (1,101,'Application Update','Your application for Junior Software Developer Internship has been marked as Accepted.','2026-08-20 14:41:58',0),(2,102,'New Recommendation','A new opportunity matching your skill profile has been recommended to you.','2026-08-20 14:41:58',1),(3,103,'System Notice','Please complete your profile details to improve your match score with top companies.','2026-08-20 14:41:58',0);
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `opportunity`
--

LOCK TABLES `opportunity` WRITE;
/*!40000 ALTER TABLE `opportunity` DISABLE KEYS */;
INSERT INTO `opportunity` (`OpportunityID`, `CompanyID`, `Title`, `Description`, `Type`, `RequiredSkill`, `Location`, `DatePosted`, `Deadline`, `Status`) VALUES (1,1,'Junior Software Developer Internship','A 3-month hands-on program focused on web development with Python and React.','Internship','Python, React, Git','Cape Town','2026-08-20 14:41:58','2026-09-30','Open'),(2,2,'Cloud Architecture Workshop','An intensive 2-day practical workshop covering AWS infrastructure and containerization.','Workshop','AWS, Docker, Networking','Remote','2026-08-20 14:41:58','2026-10-15','Open'),(3,3,'Work Integrated Learning - Data Analytics','A structured WIL program for students specializing in database queries and reporting.','WIL','SQL, Data Analysis, PowerBI','Johannesburg','2026-08-20 14:41:58','2026-11-01','Closed');
/*!40000 ALTER TABLE `opportunity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` (`ProjectID`, `StudentID`, `ProjectType`, `Title`, `ProjectDescription`, `Filepath`, `DatePosted`) VALUES (1,1,'Project','AI Task Automation System','A Python-based workflow automation tool using LLMs.','/uploads/projects/ai_automation.pdf','2026-08-20'),(2,2,'Assignment','Database Schema Design','Relational database design for a university management system.','/uploads/assignments/db_design.pdf','2026-08-20'),(3,1,'Project','E-Commerce Mobile App','Flutter application featuring payment gateway integration.','/uploads/projects/ecommerce_app.zip','2026-08-20');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `projectskill`
--

LOCK TABLES `projectskill` WRITE;
/*!40000 ALTER TABLE `projectskill` DISABLE KEYS */;
INSERT INTO `projectskill` (`ProjectID`, `SkillID`) VALUES (1,1),(3,2),(1,3),(2,3),(3,4);
/*!40000 ALTER TABLE `projectskill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `recommendation`
--

LOCK TABLES `recommendation` WRITE;
/*!40000 ALTER TABLE `recommendation` DISABLE KEYS */;
INSERT INTO `recommendation` (`RecommendationID`, `StudentID`, `OpportunityID`, `RelevanceScore`, `AIData`, `DateGenerated`) VALUES (1,1,1,95.50,'{\"matched_skills\": [\"Python\", \"React\"], \"score_breakdown\": {\"skills\": 0.6, \"education\": 0.35}}','2026-08-20 14:41:58'),(2,2,1,88.25,'{\"matched_skills\": [\"JavaScript\"], \"score_breakdown\": {\"skills\": 0.5, \"education\": 0.38}}','2026-08-20 14:41:58'),(3,3,2,74.00,'{\"matched_skills\": [\"Docker\"], \"score_breakdown\": {\"skills\": 0.4, \"education\": 0.34}}','2026-08-20 14:41:58');
/*!40000 ALTER TABLE `recommendation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `skill`
--

LOCK TABLES `skill` WRITE;
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
INSERT INTO `skill` (`SkillID`, `SkillName`) VALUES (6,'Docker'),(2,'JavaScript'),(5,'Node.js'),(1,'Python'),(4,'React'),(3,'SQL');
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`StudentID`, `UserID`, `InstitutionID`, `FirstName`, `Surname`, `StudentNumber`, `ApprovalStatus`, `LinkedIn`, `Github`, `RegisteredDate`) VALUES (1,101,1,'Liam','Vance',2201001,'Approved','https://www.linkedin.com/in/liam-vance','https://github.com/liamvance','2026-08-20'),(2,102,2,'Sophia','Chen',2201002,'Pending','https://linkedin.com/in/sophiachen','https://www.github.com/sophiachen','2026-08-20'),(3,103,3,'Marcus','Devlin',2201003,'Rejected',NULL,NULL,'2026-08-20');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `studentskill`
--

LOCK TABLES `studentskill` WRITE;
/*!40000 ALTER TABLE `studentskill` DISABLE KEYS */;
INSERT INTO `studentskill` (`StudentID`, `SkillID`) VALUES (1,1),(3,1),(2,2),(1,3),(1,4),(2,5),(3,6);
/*!40000 ALTER TABLE `studentskill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`UserID`, `Email`, `Password`, `Role`) VALUES (101,'liam.vance@example.com','','Student'),(102,'sophia.chen@example.com','','Student'),(103,'marcus.devlin@example.com','','Student'),(201,'hr@acmeinnovations.co.za','','Company'),(202,'tech@cloudops.co.za','','Company'),(203,'careers@dataanalytics.co.za','','Company');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-20 16:50:34

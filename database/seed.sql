-- MySQL dump 10.13  Distrib 8.0.46, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: userport
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
-- Dumping data for table `institution`
--

LOCK TABLES `institution` WRITE;
/*!40000 ALTER TABLE `institution` DISABLE KEYS */;
INSERT INTO `institution` VALUES (1,'Richfield Graduate Institute of Technology','College','South Africa','2026-07-22 15:55:53'),(2,'University of Cape Town','University','South Africa','2026-07-22 15:55:53'),(3,'University of South Africa','University','South Africa','2026-07-22 15:55:53');
/*!40000 ALTER TABLE `institution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,1,'Project','Management platform','This platform manages finances.','/home/storage/assignments/2026/systems_analysis_report.pdf','2026-07-22'),(2,2,'Assignment','Ecommerce platform','This platform manages transactions.','/home/storage/assignments/2026/systems_analysis_report.pdf','2026-07-22'),(3,3,'Assignment','Social media platform','This platform manages socials.','/home/storage/assignments/2026/systems_analysis_report.pdf','2026-07-22');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `project_skill`
--

LOCK TABLES `project_skill` WRITE;
/*!40000 ALTER TABLE `project_skill` DISABLE KEYS */;
INSERT INTO `project_skill` VALUES (1,1),(2,2),(3,3);
/*!40000 ALTER TABLE `project_skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `skill`
--

LOCK TABLES `skill` WRITE;
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
INSERT INTO `skill` VALUES (3,'Machine Learning'),(1,'mySQL'),(2,'Python');
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'izumi3000',1,'Jay','Jorden',403451769,'Pending','https://www.linkedin.com/in/johndoe-dev/','https://github.com/johndoe-codes','2026-07-22'),(2,'joker23',2,'Amy','Long',401428569,'Pending','https://www.linkedin.com/in/sarah-smith-eng/','https://github.com/sarah-smith-dev','2026-07-22'),(3,'sprinter31',3,'Amy','Long',401428569,'Pending','https://www.linkedin.com/in/sarah-smith-eng/','https://github.com/sarah-smith-dev','2026-07-22');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `studentskills`
--

LOCK TABLES `studentskills` WRITE;
/*!40000 ALTER TABLE `studentskills` DISABLE KEYS */;
INSERT INTO `studentskills` VALUES (1,1),(2,2),(3,3);
/*!40000 ALTER TABLE `studentskills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('izumi3000','awe321@gmail.com','batman45','student'),('joker23','hallo123@gmail.com','yooo123','student'),('sprinter31','sprint@gmail.com','bolt3000','student');
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



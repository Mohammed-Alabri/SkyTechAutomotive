-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: ulsq0qqx999wqz84.chr7pe7iynqr.eu-west-1.rds.amazonaws.com    Database: seklrqnnhsqij64j
-- ------------------------------------------------------
-- Server version	8.0.33

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '';

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointments` (
  `idappointments` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `car_brand` varchar(45) DEFAULT NULL,
  `car_name` varchar(45) DEFAULT NULL,
  `car_model` int DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idappointments`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (1,'John Doe','555-1234','john.doe@example.com','Toyota','Camry',2022,'Scheduled for regular maintenance.'),(2,'Jane Smith','555-5678','jane.smith@example.com','Ford','Fusion',2020,'Need oil change and tire rotation.'),(3,'Bob Johnson','555-9876','bob.johnson@example.com','Chevrolet','Malibu',2018,'Experiencing engine issues, needs diagnostic.'),(4,'Alice Williams','555-4321','alice.williams@example.com','Honda','Civic',2019,'Interested in a pre-purchase inspection for a used car.'),(5,'Chris Davis','555-8765','chris.davis@example.com','Nissan','Altima',2021,'Appointment for brake inspection and repair.'),(6,'Eva Martinez','555-2345','eva.martinez@example.com','Hyundai','Elantra',2017,'Car making strange noises, needs immediate attention.'),(7,'Michael Brown','555-6789','michael.brown@example.com','Kia','Optima',2016,'General checkup and maintenance service.'),(8,'mohammed','92778742','msa.2003.999@gmail.com','Toyota','Camry',2018,'change oil 0W-16'),(9,'mohammed','92778742','msa.2003.999@gmail.com','Toyota','Camry',2018,'change oil 0W-16'),(10,'Ahmed','97555555','aahmed@ss.com','nissan','versa',2015,'oil change');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `name` varchar(25) NOT NULL,
  `rate` varchar(15) DEFAULT NULL,
  `product` tinyint(1) DEFAULT NULL,
  `service` tinyint(1) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES ('11111','average',1,1,''),('14324432','good',1,1,'323'),('214123','average',1,1,'323'),('23123','good',1,1,'1232'),('aass','excellent',1,1,'122'),('ali','Excellent',1,1,'hello'),('mohammed','excellent',1,0,'very good'),('mohd','very good',1,1,'ok'),('qqa','excellent',1,1,'122'),('mohammed','excellent',1,0,'very good'),('ali','average',1,1,'very good'),('ali','average',1,1,'very good'),('ali','average',1,1,'very good'),('mmgimg','average',0,0,'btfgtbbt');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `name` varchar(15) DEFAULT NULL,
  `stars` int DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workers`
--

DROP TABLE IF EXISTS `workers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workers` (
  `idworkers` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `performance` int DEFAULT NULL,
  `review` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idworkers`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workers`
--

LOCK TABLES `workers` WRITE;
/*!40000 ALTER TABLE `workers` DISABLE KEYS */;
INSERT INTO `workers` VALUES (1,'mohammed','worker',7,'very good guy'),(2,'John Doe','Garage Mechanic',9,'John is a hardworking and skilled mechanic. His attention to detail is commendable.'),(3,'Jane Smith','Garage Technician',7,'Jane consistently meets expectations and shows dedication to her work.'),(4,'Bob Johnson','Garage Supervisor',9,'Bob manages the team effectively and ensures tasks are completed on time.'),(5,'Alice Williams','Garage Assistant',6,'Alice has room for improvement in terms of efficiency and attention to detail.'),(6,'lexus vw','Garage Mechanic',1,'Eva is a dedicated mechanic with a strong work ethic. Her skills contribute positively to the team.'),(7,'toyota nissan','Garage Technician',5,'Carlos consistently demonstrates good technical knowledge and attention to detail.'),(8,'carlos ali','Garage Supervisor',2,'Sophie is an excellent supervisor, providing clear guidance to the team and ensuring high-quality work.');
/*!40000 ALTER TABLE `workers` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-21 20:37:13

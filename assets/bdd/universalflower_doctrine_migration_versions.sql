-- MySQL dump 10.13  Distrib 8.0.28, for macos11 (x86_64)
--
-- Host: 127.0.0.1    Database: universalflower
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20220718143545','2022-07-18 14:36:23',35),('DoctrineMigrations\\Version20220718144647','2022-07-18 14:46:58',39),('DoctrineMigrations\\Version20220722114556','2022-07-22 11:46:06',39),('DoctrineMigrations\\Version20220722123334','2022-07-22 12:33:45',53),('DoctrineMigrations\\Version20220722140126','2022-07-22 14:01:35',30),('DoctrineMigrations\\Version20220830122641','2022-08-30 12:26:53',36),('DoctrineMigrations\\Version20220830122926','2022-08-30 12:29:32',39),('DoctrineMigrations\\Version20220830125503','2022-08-30 12:55:11',43),('DoctrineMigrations\\Version20220831101953','2022-08-31 10:20:05',38),('DoctrineMigrations\\Version20220901184846','2022-09-01 18:48:53',98),('DoctrineMigrations\\Version20220909145955','2022-09-09 15:00:03',85),('DoctrineMigrations\\Version20220925103652','2022-09-25 10:37:00',25),('DoctrineMigrations\\Version20220925201831','2022-09-25 20:18:38',43),('DoctrineMigrations\\Version20221004131118','2022-10-04 13:11:26',87),('DoctrineMigrations\\Version20221004131458','2022-10-04 13:15:05',29),('DoctrineMigrations\\Version20221018135733','2022-10-18 13:57:41',94),('DoctrineMigrations\\Version20221019122924','2022-10-19 12:29:29',112),('DoctrineMigrations\\Version20221019135731','2022-10-19 13:57:38',53),('DoctrineMigrations\\Version20221026094052','2022-10-26 09:40:58',59);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-31 10:03:12

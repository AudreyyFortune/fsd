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
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_send` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'audrey@test.com','test','test','test','1','2022-07-18 17:48:06'),(2,'audrey@test.com','test','test','test 2','1','2022-07-18 17:50:13'),(3,'audaname@hotmail.fr','audrey','test','test','1','2022-09-11 19:11:24'),(4,'audaname@hotmail.fr','audrey','test','test','1','2022-09-11 19:11:39'),(5,'audaname@hotmail.fr','audrey','test','test','1','2022-09-11 19:16:52'),(6,'audaname@hotmail.fr','audrey','test','test','1','2022-09-11 19:17:38'),(7,'audaname@hotmail.fr','audrey','test','test','1','2022-09-11 19:17:51'),(8,'audrey@test.fr','audrey','test api sendinblue','testt','1','2022-09-11 19:21:03'),(9,'audaname@hotmail.fr','audrey','test api sendinblue','test','1','2022-09-11 19:28:19'),(10,'audrey.fortune@3wa.io','Audrey','Mailer','Pour voir s\'il y a bien connexion au mailer','1','2022-09-16 07:34:42'),(11,'audrey.fortune@3wa.io','audrey','Mailer','Si votre demande concerne une commande, veuillez indiquer son numéro.','1','2022-09-16 07:48:10'),(12,'audrey.fortune@3wa.io','audrey','test variable','test','1','2022-09-16 07:49:14'),(13,'audrey.fortune@3wa.io','audrey','test variable','test','1','2022-09-16 07:54:24'),(14,'audrey.fortune@3wa.io','audrey','test variable','test','1','2022-09-16 07:55:33'),(15,'audrey@free.fr','Audrey','Test pour voir si ça fonctionne bien','question ?','1','2022-10-21 12:21:41'),(16,'audrey@free.fr','Audrey','Test pour voir si ça fonctionne bien','question ?','1','2022-10-21 12:24:09'),(17,'audrey.fortune@3wa.io','audrey','test api sendinblue','gg','1','2022-10-21 13:17:29');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
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

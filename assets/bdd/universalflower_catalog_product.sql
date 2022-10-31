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
-- Table structure for table `catalog_product`
--

DROP TABLE IF EXISTS `catalog_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catalog_product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_catalog_id` int NOT NULL,
  `id_product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DCF8F98169B6E62B` (`id_catalog_id`),
  KEY `IDX_DCF8F981E00EE68D` (`id_product_id`),
  CONSTRAINT `FK_DCF8F98169B6E62B` FOREIGN KEY (`id_catalog_id`) REFERENCES `catalog_event` (`id`),
  CONSTRAINT `FK_DCF8F981E00EE68D` FOREIGN KEY (`id_product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_product`
--

LOCK TABLES `catalog_product` WRITE;
/*!40000 ALTER TABLE `catalog_product` DISABLE KEYS */;
INSERT INTO `catalog_product` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(6,1,6),(7,1,7),(8,1,15),(9,1,16),(10,1,17),(11,1,18),(12,1,19),(13,1,20),(14,1,21),(15,1,22),(16,1,23),(17,1,29),(18,1,30),(19,1,31),(20,1,32),(21,1,33),(22,1,41),(23,1,42),(24,8,8),(25,8,9),(26,8,10),(27,8,11),(28,8,12),(29,8,13),(30,8,14),(31,8,24),(32,8,25),(33,8,26),(34,8,27),(35,8,28),(36,8,34),(37,8,35),(38,8,36),(39,8,37),(40,8,38),(41,8,39),(42,8,40),(43,2,2),(44,2,5),(45,2,15),(46,2,16),(47,2,41),(48,2,7),(49,2,6),(50,3,3),(51,3,17),(52,3,19),(53,3,18),(54,3,4),(55,4,15),(56,4,20),(57,4,21),(58,4,42),(59,4,22),(60,4,33),(61,4,23),(62,5,29),(63,5,20),(64,5,23),(65,5,31),(66,5,32),(67,5,30),(78,6,41),(79,6,7),(80,6,21),(81,6,33),(82,6,31),(83,6,6),(84,7,1),(85,7,17),(86,7,18),(87,7,7),(88,7,19),(89,7,4),(90,7,22),(91,7,21),(92,7,32),(93,2,29),(94,2,31),(95,3,1),(96,3,16),(97,3,41),(98,3,30),(99,4,29),(100,4,16),(101,4,31),(102,4,2),(103,4,7),(104,4,17),(105,4,32),(106,5,6),(107,5,18),(108,5,5),(109,5,42),(110,6,22),(111,6,15),(112,6,28),(113,6,2);
/*!40000 ALTER TABLE `catalog_product` ENABLE KEYS */;
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

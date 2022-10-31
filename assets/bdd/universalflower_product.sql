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
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_price_category_id` int NOT NULL,
  `reference` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_funeral` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04ADE4A8B9E3` (`id_price_category_id`),
  CONSTRAINT `FK_D34A04ADE4A8B9E3` FOREIGN KEY (`id_price_category_id`) REFERENCES `product_size_price` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,4,'41449','buenos aires','buenos-aires-41449',0),(2,1,'41386','nassau','nassau-41386',0),(3,1,'41394','brussels','brussels-41394',0),(4,1,'41399','sofia','sofia-41399',0),(5,1,'41388','brasilia','brasilia-41388',0),(6,1,'41391','rio','rio-41391',0),(7,1,'41494','nuuk','nuuk-41494',0),(8,5,'41422','haera','haera-41422',1),(9,6,'41431','orana','orana-41431',1),(10,7,'41429','manao','manao-41429',1),(11,5,'41436','peretita','peretita-41436',1),(12,5,'41439','tapone','tapone-41439',1),(13,6,'41437','tahora','tahora-41437',1),(14,6,'41438','tanata','tanata-41438',1),(15,3,'41401','astana','astana-41401',0),(16,1,'41390','djibouti','djibouti-41390',0),(17,4,'41467','paris','paris-41467',0),(18,2,'41396','roma','roma-41396',0),(19,3,'41398','new delhi','new-delhi-41398',0),(20,1,'41411','bern','bern-41411',0),(21,3,'41461','kito','kito-41461',0),(22,3,'41444','lome','lome-41444',0),(23,2,'41445','tunis','tunis-41445',0),(24,6,'41421','fetia','fetia-41421',1),(25,7,'41440','tinito','tinito-41440',1),(26,8,'41441','vahina','vahina-41441',1),(27,8,'41430','morea','morea-41430',1),(28,8,'41434','paniora','paniora-41434',1),(29,1,'41446','ankara','ankara-41446',0),(30,1,'41410','victoria','victoria-41410',0),(31,1,'41455','jakarta','jakarta-41455',0),(32,1,'41447','stockholm','stockholm-41447',0),(33,1,'41405','rabat','rabat-41405',0),(34,6,'41428','mame','mame-41428',1),(35,7,'41432','orano','orano-41432',1),(36,5,'41420','acerra','acerra-41420',1),(37,7,'41427','itaria','itaria-41427',1),(38,8,'41435','parahi','parahi-41435',1),(39,8,'41442','vinita','vinita-41442',1),(40,7,'41426','initia','initia-41426',1),(41,1,'41479','la habana','la-habana-41479',0),(42,1,'41443','caracas','caracas-41443',0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-31 10:03:13

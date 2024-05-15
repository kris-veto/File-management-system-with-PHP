-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: php_final_p
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

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
-- Table structure for table `product_info`
--

DROP TABLE IF EXISTS `product_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Product_name` varchar(40) NOT NULL,
  `Price` decimal(8,2) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `name` varchar(45) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_info`
--

LOCK TABLES `product_info` WRITE;
/*!40000 ALTER TABLE `product_info` DISABLE KEYS */;
INSERT INTO `product_info` VALUES (28,'Blender',8888.00,7,'HtrrrrrrrSpracticepagesss','Screenshot 2024-03-02 045235.png','./uploads/Screenshot 2024-03-02 045235.png'),(32,'Test8',12.00,1,'na','Screenshot 2023-11-15 203737.png','./uploads/Screenshot 2023-11-15 203737.png');
/*!40000 ALTER TABLE `product_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_users`
--

DROP TABLE IF EXISTS `r_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `r_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_users`
--

LOCK TABLES `r_users` WRITE;
/*!40000 ALTER TABLE `r_users` DISABLE KEYS */;
INSERT INTO `r_users` VALUES (1,'Usertest','1111111111','1234-12-12','czzzz2@gmail.com','$2y$10$T.0jF5ZBWIZX9P9petMvFeil.RUqLPlep0mw/ibZhnpbCQahSUxri'),(2,'Kris Ver','1111111111','1234-12-12','Aa1234@gmail.com','$2y$10$Vc7UxCvreT6lYeU/MTKTNuxyAJntq3RzKpDn6h/S5xVUii1TvQ2e6'),(3,'Kris Vero','1111111111','1234-12-01','c33333@gmail.com','$2y$10$CAzLNThHa/fVpN3YtjonL.fk3j16o9uz9ehemSiTA30pQ2bM4hPTe'),(4,'Kris Very','2222222222','1234-12-05','xxx@gmail.com','$2y$10$MVUXg7Mdme3JCEe6UEhTU.OyqPcel.EBUT4u4eCH1LDMaq84rzQOO');
/*!40000 ALTER TABLE `r_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-07 17:27:16

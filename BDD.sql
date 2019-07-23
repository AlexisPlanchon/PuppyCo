-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: testmvc
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cart` (
  `idusers` varchar(45) NOT NULL,
  `iditem` varchar(45) NOT NULL,
  `quantity` int(100) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES ('1','1',1);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `category` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`idcategory`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Laisses'),(2,'Couchage'),(3,'Jouets'),(4,'Hygiene'),(5,'Alimentation'),(6,'Niches'),(7,'Transport');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commands`
--

DROP TABLE IF EXISTS `commands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `commands` (
  `idcommands` int(11) NOT NULL AUTO_INCREMENT,
  `idusers` int(11) NOT NULL,
  `date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcommands`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commands`
--

LOCK TABLES `commands` WRITE;
/*!40000 ALTER TABLE `commands` DISABLE KEYS */;
INSERT INTO `commands` VALUES (2,1,'2019-07-18 13:21:06'),(3,1,'2019-07-18 13:22:28'),(4,1,'2019-07-18 13:23:57'),(5,1,'2019-07-18 13:24:43'),(6,1,'2019-07-18 13:30:47'),(7,1,'2019-07-18 13:32:29'),(8,1,'2019-07-18 13:33:50'),(9,1,'2019-07-18 13:33:56'),(10,1,'2019-07-19 13:12:52'),(11,1,'2019-07-22 17:34:27'),(12,1,'2019-07-22 17:47:37');
/*!40000 ALTER TABLE `commands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mvctable`
--

DROP TABLE IF EXISTS `mvctable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `mvctable` (
  `idmvctable` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `prix` varchar(45) NOT NULL,
  `description` varchar(400) NOT NULL,
  `category` varchar(45) NOT NULL,
  `stock` varchar(45) NOT NULL,
  PRIMARY KEY (`idmvctable`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mvctable`
--

LOCK TABLES `mvctable` WRITE;
/*!40000 ALTER TABLE `mvctable` DISABLE KEYS */;
INSERT INTO `mvctable` VALUES (6,'Caisse de transport Mappa pour chien et chat','23','Caisse de transport pour chien, chat et petits animaux jusqu\'à 5 kg.','7','45'),(4,'Royal Canin Maxi Digestive Care','55','Croquettes pour chien adulte de grande race à la digestion sensible, acides gras oméga 6 pour un poil brillant','5','13'),(3,'Royal Canin Mini Light Weight Care pour chien','23','Croquettes pour chien adulte de petite race ayant tendance au surpoids','5','46'),(2,'Royal Canin Maxi Light Weight Care pour chien','50','Croquettes pour chien adulte de grande race ayant tendance au surpoids','5','56'),(1,'Royal Canin Maxi Adult Sterilised','49','Nourriture spéciale pour chien castré de grandes races (26-44 kg)','5','78'),(7,'Canapé orthopédique gris','35','Canapé orthopédique à mémoire de forme pour chien, soulage les articulations.','2','34'),(8,'Panier ovale Memory','25','Panier orthopédique pour chien avec matelas Memory Foam','2','23'),(9,'Panier Blossom','19','Magnifique panier pour chat et petit chien en forme de fleur','2','85'),(10,'Jouet à friandise Active Bone','5','Jouet pour chien en forme d\'os, à remplir de friandises (fournies)','3','146'),(11,'Os en caoutchouc TPR avec corde','11','Corde pour chiot et petit chien, pour les jeux de lancer/rapporter et de traction','3','124'),(12,'Jouet Os Nylabone Dura Chew Chicken ','23','Os à mâcher pour chien, favorise une bonne santé dentaire, élimine la plaque dentaire','3','127'),(13,'Laisse réglable Hunter Retriever ','14','Laisse lasso pour chien 2 en 1 : collier et laisse à la fois','1','23'),(14,'Laisse réglable en corde de nylon ','15','Laisse en nylon pour chien, peut aussi être portée par-dessus l\'épaule','1','34'),(15,'Shampooing neutre Trixie','10','Shampooing nourrissant pour chien','4','456'),(16,'Shampooing Pet Head DIRTY TALK','12','Shampooing doux Pet Head DIRTY TALK','4','345'),(17,'Shampooing Advance Atopic Care','14','Shampooing pour chien, formule triple action associant de l\'aloe vera, du collagène et de l\'extrait de feuilles d\'olivier','4','347'),(18,'Shampooing Ultra Premium FURminator ','16','Shampooing pour chien et chat frais et hypoallergénique, pour une peau saine','4','458'),(19,'Niche Sylvan Special','145','Niche pour chien verrouillable, avec toit en pente, pourvue d\'une terrasse couverte','6','3'),(20,'Niche Spike Spécial','154','Niche pour chien en bois huilé au toit en pente. Avec terrasse couverte en bois massif','6','5'),(21,'Niche Trixie Natura Lodge avec terrasse','125','Niche Trixie Natura Lodge avec terrasse, en bois de pin lasuré','6','9'),(5,'Cage de transport Ferplast Atlas Car Scenic','95','Cage de transport en plastique pour chien, grande porte coulissante grillagée à verrou sécurisé','7','25');
/*!40000 ALTER TABLE `mvctable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `reviews` (
  `idreviews` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` varchar(45) NOT NULL,
  `reviews` varchar(1000) NOT NULL,
  `author` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idreviews`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,'1','Super','Jerem'),(2,'1','Top mo chien adore','Nathalie'),(3,'1','Qualité au rendez-vous','Benjam'),(4,'2','Super','Cedric'),(5,'3','Je ne regrette pas mon achat','Lucas'),(6,'1','Super','Richard'),(7,'1','Top mo chien adore','Jean-Luc'),(8,'1','Qualité au rendez-vous','Lorie'),(9,'2','Super','Anais'),(10,'3','Je ne regrette pas mon achat','Kevin'),(11,'3','Niquel','Luc'),(12,'4','Correspond a mes attentes','Murielle'),(13,'5','Livraison rapide','Antoine'),(14,'5','Je viens de recevoir l\'article, il est top','Alexis'),(15,'5','Rien a redire merci PuppyStore','Mathieu'),(16,'5','Qualité Top, Prix top !','Nicolas'),(17,'6','Super qualité','Simon'),(18,'6','Jamais déçu avec PuppyStore. Merci','Jerome'),(19,'6','Super article','Nathalie'),(20,'6','Vraiment bien, mon chien adore','Lea'),(21,'6','Parfait','Louane'),(22,'7','Super article je recommande','Lucie'),(23,'8','Top top top','Carolina'),(24,'9','Super, merci PuppyStore','Nina');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `password` varchar(500) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idusers`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'antoine','30a4b0cc5aa115a343b03f837ca06ae3b92ac3f69e52d5f54e4e701d436b63d5','antoinehisette@gmail.com',1),(2,'alexis','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','alexis@gmail.com',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-23 14:10:46

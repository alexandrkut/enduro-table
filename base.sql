-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: enduro
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `date` date NOT NULL,
  `place` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'Печерский кабан','2017-10-15','Псков','Гонка Печерский кабан'),(2,'Шусрая белка','2018-06-08','Карелия','Карельская Шустря белка'),(4,'Майские во Пскове','2018-04-28','Псков','Майское мероприятие'),(5,'Юкки Пойка ','2018-04-21','Юкки','Дружеская покатушка в Юкках');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peoples`
--

DROP TABLE IF EXISTS `peoples`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peoples` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` smallint(5) unsigned DEFAULT NULL,
  `fio` text NOT NULL,
  `date` date NOT NULL,
  `place` varchar(255) NOT NULL,
  `moto` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `fio` (`fio`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peoples`
--

LOCK TABLES `peoples` WRITE;
/*!40000 ALTER TABLE `peoples` DISABLE KEYS */;
INSERT INTO `peoples` VALUES (1,333,'Башлачёв Дима','0000-00-00','',NULL,''),(2,52,'Скобелев Николай','0000-00-00','',NULL,''),(3,0,'Кудашев Костя','0000-00-00','',NULL,''),(4,45,'Мелков Стас','0000-00-00','',NULL,''),(5,430,'Булгаков Антон','0000-00-00','',NULL,''),(6,23,'Коробов Андрей','0000-00-00','',NULL,''),(7,0,'Михаил Полещук','0000-00-00','',NULL,''),(8,27,'Тарас Багно','0000-00-00','',NULL,''),(9,599,'Чулочников Сергей','0000-00-00','',NULL,''),(10,125,'Балакирев Юрий','0000-00-00','',NULL,''),(11,73,'Серега ПИЛОТТ','0000-00-00','',NULL,''),(12,181,'Кутилин Александр','0000-00-00','',NULL,''),(13,0,'Везиков Сергей','0000-00-00','',NULL,''),(14,44,'Мелков Виталик','0000-00-00','',NULL,''),(15,33,'Силантьев Влад','0000-00-00','',NULL,''),(16,389,'Шкуратов Евгений','0000-00-00','',NULL,''),(17,25,'Куликов Сергей','0000-00-00','',NULL,''),(18,303,'Макаров Алексей','0000-00-00','',NULL,''),(19,74,'Феддер Максим','0000-00-00','',NULL,''),(20,2,'Лобанов Данила','0000-00-00','',NULL,''),(21,65,'Железнов  Владимир','0000-00-00','',NULL,''),(22,13,'Курбатов Роман','0000-00-00','',NULL,''),(23,42,'Корнеев Максим','0000-00-00','',NULL,''),(24,329,'Белов Николай','0000-00-00','',NULL,''),(25,41,'Островский Александр','0000-00-00','',NULL,''),(26,35,'Колобов Алексей','0000-00-00','',NULL,''),(27,107,'Котов Владимир','0000-00-00','',NULL,''),(28,73,'Шевчук Женя','0000-00-00','',NULL,''),(29,263,'Жаринов Роман','0000-00-00','',NULL,''),(30,21,'Цапков Женя','0000-00-00','',NULL,''),(31,78,'Самсонов Сергей','0000-00-00','',NULL,''),(32,180,'Киселёв Андрей ','0000-00-00','',NULL,''),(33,5,'Казанский Алексей','0000-00-00','',NULL,''),(34,338,'Кирилл Аристов','0000-00-00','',NULL,''),(35,4,'Витто Валло','0000-00-00','',NULL,''),(36,75,'Гаврилов Костя','0000-00-00','',NULL,''),(37,21,'Гаврил Аркадьевич','0000-00-00','',NULL,''),(38,19,'Максим Лавриненко','0000-00-00','',NULL,''),(39,717,'Андрей Вязаницин','0000-00-00','',NULL,''),(40,9,'Бобров Илья','0000-00-00','',NULL,''),(41,165,'Ян Блюмхен','0000-00-00','',NULL,''),(42,747,'Ситников Василий','0000-00-00','',NULL,''),(43,656,'Каменских Валерий','0000-00-00','',NULL,''),(44,32,'Шатохин Максим','0000-00-00','',NULL,''),(45,777,'Жорж Заболотских','0000-00-00','',NULL,''),(46,666,'Вайнилович','0000-00-00','',NULL,''),(47,888,'Хаакан','0000-00-00','',NULL,''),(48,119,'Белоруков Андрей','0000-00-00','',NULL,''),(49,25,'Васильев Александр','0000-00-00','',NULL,''),(50,227,'Шолохов Сергей','0000-00-00','',NULL,''),(51,9,'Макаровский Артем','0000-00-00','',NULL,''),(52,66,'Самойлов Алексей','0000-00-00','',NULL,''),(53,36,'Вербенчук Михаил','0000-00-00','',NULL,''),(54,708,'Ельчанинов Владимир','0000-00-00','',NULL,''),(55,22,'Гаетан Рукие','0000-00-00','',NULL,''),(56,0,'Кривцов Игорь ','0000-00-00','',NULL,''),(57,50,'Романов Дмитрий','0000-00-00','',NULL,''),(58,757,'Смирнов Денис ','0000-00-00','',NULL,''),(59,0,'Бокучава Илья','0000-00-00','',NULL,''),(60,0,'Бородин Анатолий','0000-00-00','',NULL,''),(61,0,'Нос Носиков','0000-00-00','',NULL,''),(62,500,'Федотов Михаил','0000-00-00','',NULL,''),(63,0,'Хотько Игорь','0000-00-00','',NULL,''),(64,100,'Эдгар Гессель','0000-00-00','',NULL,''),(65,515,'Астапов Степан','0000-00-00','',NULL,''),(66,47,'Келер Сергей','1967-06-26','Всеволожск','ktm250exc','');
/*!40000 ALTER TABLE `peoples` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event` int(10) unsigned NOT NULL,
  `people` int(10) unsigned NOT NULL,
  `number` int(10) unsigned NOT NULL DEFAULT '0',
  `class` tinyint(3) unsigned NOT NULL,
  `result` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `event` (`event`),
  KEY `people` (`people`),
  CONSTRAINT `event` FOREIGN KEY (`event`) REFERENCES `events` (`id`),
  CONSTRAINT `people` FOREIGN KEY (`people`) REFERENCES `peoples` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
INSERT INTO `results` VALUES (1,1,12,0,0,0),(4,1,5,430,0,0),(5,1,39,717,0,0),(7,1,6,23,1,0),(8,1,4,45,1,0);
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-19 14:57:59

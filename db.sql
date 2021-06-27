-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	5.7.22-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Admin','admin@gmail.com','$2y$10$.TaI6ew.FZVk3bqScasqZ.AOso2MX53u49uVkGIt3ygCPvFOxg06C',NULL,NULL,NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_values`
--

DROP TABLE IF EXISTS `attribute_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` int(11) NOT NULL,
  `value_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_values`
--

LOCK TABLES `attribute_values` WRITE;
/*!40000 ALTER TABLE `attribute_values` DISABLE KEYS */;
INSERT INTO `attribute_values` VALUES (1,1,'S',NULL,NULL),(2,1,'M',NULL,NULL),(3,1,'L',NULL,NULL),(4,2,'Black',NULL,NULL),(5,2,'Yellow',NULL,NULL),(6,2,'White',NULL,NULL),(7,2,'Red',NULL,NULL);
/*!40000 ALTER TABLE `attribute_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attributes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attributes`
--

LOCK TABLES `attributes` WRITE;
/*!40000 ALTER TABLE `attributes` DISABLE KEYS */;
INSERT INTO `attributes` VALUES (1,'Size',NULL,NULL),(2,'Color',NULL,NULL);
/*!40000 ALTER TABLE `attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot` tinyint(4) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,'Uncategorized','uncategorized',NULL,NULL,0,1,NULL,NULL),(2,0,'Headphone','headphone','uploads/category/2021/06/09/headphone.jpg',NULL,0,1,NULL,'2021-06-09 20:47:47'),(3,0,'Watch','watch','uploads/category/2021/06/09/watch.jpg',NULL,0,1,NULL,'2021-06-09 20:48:08'),(4,0,'Phone','phone','uploads/category/2021/06/09/phone.jpg',NULL,0,1,NULL,'2021-06-09 20:48:29'),(5,0,'Game','game','uploads/category/2021/06/09/game.jpg',NULL,0,1,NULL,'2021-06-09 20:48:55'),(6,0,'Laptop','laptop','uploads/category/2021/06/09/laptop.jpg',NULL,0,1,NULL,'2021-06-09 20:49:07'),(7,0,'Televison','televison','uploads/category/2021/06/09/televison.jpg',NULL,0,1,NULL,'2021-06-09 20:49:14');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (13,'2014_10_12_100000_create_password_resets_table',1),(14,'2019_08_19_000000_create_failed_jobs_table',1),(15,'2021_03_21_162747_create_categories_table',1),(16,'2021_03_23_052037_create_admins_table',1),(17,'2021_04_11_150934_create_attributes_table',1),(18,'2021_04_11_151045_create_attribute_values_table',1),(19,'2021_04_11_151229_create_sku_values_table',1),(20,'2021_04_11_151417_create_product_skus_table',1),(21,'2021_04_11_151907_create_products_table',1),(22,'2021_04_23_154111_add_variation_default_id_to_products',1),(23,'2014_10_12_000000_create_users_table',2),(24,'2021_05_16_093105_create_orders_table',3),(25,'2021_05_16_093114_create_order_items_table',3),(26,'2021_05_17_145110_add_selled_count_to_products',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_sku_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,1,1,1,2,200.00,0.00,'2021-05-17 08:39:45','2021-05-17 08:39:45'),(2,2,1,1,2,200.00,0.00,'2021-05-17 09:13:49','2021-05-17 09:13:49'),(3,3,1,1,3,200.00,0.00,'2021-05-17 15:05:34','2021-05-17 15:05:34'),(4,4,1,1,3,200.00,0.00,'2021-05-17 15:05:52','2021-05-17 15:05:52'),(5,12,1,1,2,200.00,0.00,'2021-05-19 12:07:05','2021-05-19 12:07:05'),(6,13,2,2,1,300.00,0.00,'2021-05-19 15:59:43','2021-05-19 15:59:43'),(7,13,1,1,1,200.00,0.00,'2021-05-19 15:59:43','2021-05-19 15:59:43'),(8,14,2,2,1,300.00,0.00,'2021-05-19 16:06:55','2021-05-19 16:06:55'),(9,15,2,3,1,100.00,0.00,'2021-05-19 16:08:51','2021-05-19 16:08:51'),(10,16,1,1,1,200.00,0.00,'2021-05-20 11:25:27','2021-05-20 11:25:27'),(11,17,1,1,1,200.00,0.00,'2021-05-20 11:29:39','2021-05-20 11:29:39'),(12,18,2,3,1,100.00,0.00,'2021-06-02 14:03:18','2021-06-02 14:03:18'),(13,19,1,1,2,200.00,0.00,'2021-06-02 14:03:37','2021-06-02 14:03:37'),(14,20,1,1,1,200.00,0.00,'2021-06-02 17:16:15','2021-06-02 17:16:15'),(15,21,2,3,1,100.00,0.00,'2021-06-02 17:16:30','2021-06-02 17:16:30'),(16,25,5,6,1,30.00,0.00,'2021-06-09 00:29:48','2021-06-09 00:29:48'),(17,26,5,6,1,30.00,0.00,'2021-06-09 20:29:00','2021-06-09 20:29:00'),(18,26,5,6,1,30.00,0.00,'2021-06-09 20:29:00','2021-06-09 20:29:00');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,'Thương đẹp trai',400.00,'351a Lạc Long Quân, hcm 111','0986319121','',0,'2021-05-17 08:39:45','2021-05-20 12:06:05'),(2,1,'Thương đẹp trai',400.00,'351a Lạc Long Quân, hcm','0986319121','',0,'2021-05-17 09:13:48','2021-05-20 12:06:56'),(3,1,'Thương đẹp trai',600.00,'351a Lạc Long Quân, hcm 111','0986319121','',1,'2021-05-17 15:05:34','2021-05-20 08:49:23'),(4,1,'Thương đẹp trai',600.00,'351a Lạc Long Quân, hcm 111','0986319121','',1,'2021-05-17 15:05:52','2021-05-20 08:49:28'),(11,1,'Thương đẹp trai',400.00,'351a Lạc Long Quân, hcm 111','0986319121','',1,'2021-05-19 12:06:12','2021-05-20 11:20:33'),(12,1,'Thương đẹp trai',400.00,'351a Lạc Long Quân, hcm 111','0986319121','',1,'2021-05-19 12:07:05','2021-05-20 08:49:35'),(13,1,'Thương đẹp trai',500.00,'351a Lạc Long Quân, hcm 111','0986319121','',0,'2021-05-19 15:59:43','2021-05-20 08:49:45'),(14,1,'Thương đẹp trai',300.00,'351a Lạc Long Quân, hcm 111','0986319121','',0,'2021-05-19 16:06:54','2021-05-19 16:06:54'),(15,1,'Thương đẹp trai',100.00,'351a Lạc Long Quân, hcm 111','0986319121','',0,'2021-05-19 16:08:51','2021-05-19 16:08:51'),(16,1,'Thương đẹp trai',200.00,'351a Lạc Long Quân, hcm','0986319121','',0,'2021-05-20 11:25:27','2021-05-20 11:25:27'),(17,1,'Thương đẹp trai',200.00,'351a Lạc Long Quân, hcm','0986319121','',0,'2021-05-20 11:29:39','2021-05-20 11:29:39'),(18,1,'Thương đẹp trai',100.00,'351a Lạc Long Quân, hcm','0986319121','',0,'2021-06-02 14:03:17','2021-06-02 14:03:17'),(19,1,'Thương đẹp trai',400.00,'351a Lạc Long Quân, hcm','0986319121','',0,'2021-06-02 14:03:37','2021-06-02 14:03:37'),(20,1,'Thương đẹp trai',200.00,'351a Lạc Long Quân, hcm','0986319121','',0,'2021-06-02 17:16:15','2021-06-02 17:16:15'),(21,1,'Thương đẹp trai',100.00,'351a Lạc Long Quân, hcm','0986319121','',0,'2021-06-02 17:16:30','2021-06-02 17:16:30'),(25,1,'Thương đẹp trai',30.00,'351a Lạc Long Quân, hcm','0986319121','',0,'2021-06-09 00:29:48','2021-06-09 00:29:48'),(26,1,'Thương đẹp trai',60.00,'351a Lạc Long Quân, hcm','0986319121','',0,'2021-06-09 20:29:00','2021-06-09 20:29:00');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_skus`
--

DROP TABLE IF EXISTS `product_skus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_skus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_skus`
--

LOCK TABLES `product_skus` WRITE;
/*!40000 ALTER TABLE `product_skus` DISABLE KEYS */;
INSERT INTO `product_skus` VALUES (4,3,'U8SB','uploads/product_sku/2021/06/10/u8s-smart-bluetooth-30_B33SGK9e.jpg',20.00,13.00,100,1,'2021-06-08 22:55:49','2021-06-10 16:36:29'),(5,4,'IP57RT','uploads/product_sku/2021/06/08/sony-smartwatch-2-sw2.jpg',30.00,10.00,100,1,'2021-06-08 23:08:46','2021-06-08 23:08:46'),(6,5,'X36015T','uploads/product_sku/2021/06/09/hp-spectre-x360-15t_GrXkCtmX.jpg',30.00,28.00,97,1,'2021-06-08 23:13:09','2021-06-09 20:29:00'),(7,6,'APGR12','uploads/product_sku/2021/06/08/apple-watch-sport-green.jpg',43.00,30.00,100,1,'2021-06-08 23:17:26','2021-06-08 23:17:26'),(8,7,'APTR45','uploads/product_sku/2021/06/08/mota-smartwatch-g2-pro.jpg',40.00,35.00,100,1,'2021-06-08 23:27:59','2021-06-08 23:27:59'),(9,8,'SONY12','uploads/product_sku/2021/06/08/headphone-sony-2-sw2.jpg',40.00,40.00,99,1,'2021-06-08 23:46:06','2021-06-08 23:46:06'),(10,9,'SONYWH','uploads/product_sku/2021/06/10/sony-wh-1000xm4_iMOkdPCs.jpg',349.00,298.00,100,1,'2021-06-08 23:51:04','2021-06-10 16:24:50'),(11,10,'APTR45','uploads/product_sku/2021/06/08/sony-wireless-headphones-wh-ch510.jpg',50.00,39.00,100,1,'2021-06-08 23:53:52','2021-06-08 23:53:52'),(12,11,'APTRS4','uploads/product_sku/2021/06/08/sony-mdre9lpblk-ear-buds.jpg',5.00,3.00,100,1,'2021-06-08 23:56:28','2021-06-08 23:56:28'),(13,12,'QPAODA','uploads/product_sku/2021/06/08/sony-whxb900n.jpg',159.00,70.00,100,1,'2021-06-08 23:59:42','2021-06-08 23:59:42'),(14,13,'PAOSAE','uploads/product_sku/2021/06/09/sony-mdrzx110nc.jpg',69.00,28.00,100,1,'2021-06-09 00:00:39','2021-06-09 00:00:39'),(15,14,'IPXSMB','uploads/product_sku/2021/06/10/apple-iphone-xs-max_KAQtQhU0.jpg',500.00,490.00,100,1,'2021-06-09 00:02:33','2021-06-10 16:35:59'),(16,15,'IPXODA','uploads/product_sku/2021/06/10/apple-iphone-x_ucHNnRA6.jpg',400.00,355.00,100,1,'2021-06-09 00:04:28','2021-06-10 16:30:13'),(17,16,'APISXA','uploads/product_sku/2021/06/09/apple-iphone-xs.jpg',500.00,379.00,100,1,'2021-06-09 00:05:37','2021-06-09 00:05:37'),(18,17,'IPSEPR','uploads/product_sku/2021/06/10/apple-iphone-se_NsQ4ZWu1.jpg',375.00,325.00,100,1,'2021-06-09 00:06:54','2021-06-10 16:47:01'),(19,18,'TDAEAA','uploads/product_sku/2021/06/10/apple-iphone-11_BlER78m3.jpg',490.00,380.00,100,1,'2021-06-09 00:11:04','2021-06-10 16:46:07'),(20,19,'PLAYER','uploads/product_sku/2021/06/09/steelseries-nimbus-bluetooth-mobile-gaming-controller.jpg',120.00,70.00,100,1,'2021-06-09 00:14:41','2021-06-09 00:14:41'),(21,20,'PLAYCO','uploads/product_sku/2021/06/09/sony-playstation-4-slim-1tb-console.jpg',600.00,469.00,100,1,'2021-06-09 00:16:13','2021-06-09 00:16:13'),(22,21,'HPHONE','uploads/product_sku/2021/06/09/sony-playstation-3.jpg',182.00,169.00,100,1,'2021-06-09 00:17:57','2021-06-09 00:17:57'),(23,22,'LAPEQA','uploads/product_sku/2021/06/09/acer-aspire-5-slim-laptop.jpg',500.00,490.00,100,1,'2021-06-09 00:19:29','2021-06-09 00:19:29'),(24,23,'APKSAV','uploads/product_sku/2021/06/10/2021-newest-dell-inspiron-3000-laptop_aWCFIPtW.jpg',567.00,547.00,100,1,'2021-06-09 00:21:38','2021-06-10 16:36:58'),(25,24,'ASSAO','uploads/product_sku/2021/06/09/hp-chromebook-11-inch-laptop.jpg',600.00,560.00,100,1,'2021-06-09 00:22:51','2021-06-09 00:22:51'),(26,25,'TVLTHN','uploads/product_sku/2021/06/09/tcl-32-inch-3-series-720p-roku-smart-tv-32s335.jpg',178.00,159.00,100,1,'2021-06-09 00:24:13','2021-06-09 00:24:13'),(27,26,'POKLOA','uploads/product_sku/2021/06/09/samsung-65-inch-class-crystal-uhd-au8000-series.jpg',152.00,149.00,100,1,'2021-06-09 00:25:40','2021-06-09 00:25:40'),(28,5,'PIUADA','uploads/product_sku/2021/06/09/hp-spectre-x360-15t_alRVUhUT.jpg',30.00,26.00,100,0,'2021-06-09 20:22:10','2021-06-09 20:23:43'),(29,8,'DERTLY','uploads/product_sku/2021/06/10/headphone-sony-2-sw2_SP57bM4A.jpg',500.00,200.00,100,0,'2021-06-10 16:40:49','2021-06-10 16:40:49'),(30,8,'DLDKAA','uploads/product_sku/2021/06/10/headphone-sony-2-sw2_js3TztN2.jpg',300.00,290.00,100,0,'2021-06-10 16:42:04','2021-06-10 16:42:12'),(31,27,'PLYCAM','uploads/product_sku/2021/06/10/plycam.jpg',400.00,390.00,100,1,'2021-06-10 16:43:26','2021-06-10 16:43:26');
/*!40000 ALTER TABLE `product_skus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `variantion_default_id` int(11) DEFAULT '0',
  `selled_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (3,'U8S Smart Bluetooth 3.0','u8s-smart-bluetooth-30','Main Features:\r\nPhonebook / Call Log / Message / Music Sync\r\nEasily realize information synchronization with your mobile phone, more convenient to users.\r\nComing Call / Message Reminder\r\nYou will never worry about missing some important calls or messages, it will remind you.\r\nSedentary / Drink Water Reminder\r\nDevelop scientific habits and effectively resist sub-health, remind you to drink water and have a rest.\r\nSleep Monitoring / Pedometer\r\nMonitor your sleep and you can know your sleep date on your phone; Record steps, calories, and distance make you fully control your sports.\r\n\r\nIf your mobile phone is Bluetooth 3.0, then you can use it.\r\nThe watch band is detachable, so you can change it.\r\nCharging time: about 20 - 30 minutes.\r\n\r\nAPP download\r\nScan the QR code to download app -\r\n\r\nNote:\r\nOnly can download the offering APK, can\'t download the other APP.\r\nFactory original password\'s recovery: 1122','U8 Smart Bluetooth 3.0 Watch Outdoor Sports Smartwatch - Black',7,1,0,'2021-06-08 22:55:47','2021-06-10 16:36:31',4,0),(4,'Sony Smartwatch 2 Sw2','sony-smartwatch-2-sw2','BODY	Dimensions	42 x 41 x 9 mm (1.65 x 1.61 x 0.35 in)\r\nWeight	122.5 g (4.34 oz)\r\nBuild	Glass front, aluminum frame\r\nSIM	No\r\n IP57 dust/water resistant (up to 1m. and 30 mins)\r\nCompatible with standard 24mm straps','Sony SmartWatch 2 SW2',3,1,0,'2021-06-08 23:08:45','2021-06-08 23:08:46',5,0),(5,'HP Spectre X360 - 15t','hp-spectre-x360-15t','1.If the bracelet can\'t be started up,pls charge 5-10min before you use.\r\n2.The product is M5,NOT FOR XIAOMI MIBAND 5.\r\n3.This product can only be life waterproof, please don\'t wear it to swim.\r\n4.Smart wristband is not for medical use, please don\'t buy for check the health(heart problem, blood pressure problem) it\'s not for professional use.Just can be a reference.\r\n\r\nOriginal M5 Smart Bracelet Bluetooth Sport Fitness Tracker Heart rate Monitor Waterproof Women Men Wristwatch Smart Band PK Mi5\r\n\r\n2020 new bracelet-M5 Smart Band\r\nApp Language:\r\nRussian,German,Czech,Japanese,French,Thai, Chinese,Traditional Chinese,English,Portuguese,Spanish,Arabic, Malay','Original NEW M5 Smart Bracelet Bluetooth Sport Fitness Tracker Heart rate Monitor Waterproof Women Men Wristwatch Smart Band',3,1,0,'2021-06-08 23:13:09','2021-06-09 20:29:00',6,3),(6,'Apple Watch Sport Green','apple-watch-sport-green','color: black/silver/pink\r\nmain chip: NRF52832 QFAA\r\nAccelerometer: BOSCH BMA 421\r\nDisplay specifications: 1.3 inch IPS color screen resolution 240*240\r\nButton mode: Single touch panel\r\ntype of battery: Lithium polymer battery 230 mAh\r\nDynamic heart rate / blood pressure: support\r\ncharging method: Magnetic interface in-line charging\r\nBluetooth type: Bluetooth 4.0\r\nSupport APP: Da Fit\r\nMobile phone system requirements:\r\nSupport Android 4.4 and above, IOS9.0 or above','P70 Women Waterproof Smart Watch Sports Bracelet',3,1,1,'2021-06-08 23:17:26','2021-06-08 23:17:26',7,0),(7,'Mota SmartWatch G2 Pro','mota-smartwatch-g2-pro','APP language:\r\nChinese, Traditional Chinese, English, Korean, German, Spanish, Japanese, French, Italian, Russian, Portuguese, Arabic, Ukrainian\r\n\r\nSports record:\r\nStep, exercise time, mileage, calorie consumption, sleep monitoring,\r\n\r\nHealth monitoring:\r\nHeart rate measurement, blood pressure measurement, blood oxygen measurement\r\n\r\nSmart reminder:\r\nCustom alarm reminder, sedentary reminder, call reminder, information push reminder (SMS/QQ/WeChat/Skype/Facebook/Twitter/Line/WhatsApp)','Mota SmartWatch G2 Pro',3,1,1,'2021-06-08 23:27:59','2021-06-08 23:27:59',8,0),(8,'headphone sony 2 Sw2','headphone-sony-2-sw2','Industry-leading noise canceling with Dual Noise Sensor technology\r\nNext-level music with Edge-AI, co-developed with Sony Music Studios Tokyo\r\nUp to 30-hour battery life with quick charging (10 min charge for 5 hours of playback)\r\nTouch Sensor controls to pause play skip tracks, control volume, activate your voice assistant, and answer phone calls\r\nSpeak-to-chat technology automatically reduces volume during conversations\r\nSuperior call quality with precise voice pickup\r\nWearing detection pauses playback when headphones are removed','headphone sony 2 Sw2',2,1,1,'2021-06-08 23:46:06','2021-06-08 23:46:06',9,0),(9,'Sony WH-1000XM4','sony-wh-1000xm4','Industry-leading noise canceling with Dual Noise Sensor technology\r\nNext-level music with Edge-AI, co-developed with Sony Music Studios Tokyo\r\nUp to 30-hour battery life with quick charging (10 min charge for 5 hours of playback)\r\nTouch Sensor controls to pause play skip tracks, control volume, activate your voice assistant, and answer phone calls\r\nSpeak-to-chat technology automatically reduces volume during conversations\r\nSuperior call quality with precise voice pickup\r\nWearing detection pauses playback when headphones are removed','Sony WH-1000XM4 Wireless Industry Leading Noise Canceling Overhead Headphones with Mic for Phone-Call and Alexa Voice Control, Black',2,1,0,'2021-06-08 23:51:03','2021-06-08 23:54:08',10,0),(10,'Sony Wireless WH-CH510','sony-wireless-wh-ch510','Listen all day long with up to 35 hours of playback time\r\nListen to your favorite tracks wirelessly with a Bluetooth wireless technology by pairing your smartphone or tablet\r\n30mm driver unit for dynamic sound\r\nSwivel design for easy travel\r\nEasy hands-free calling and voice assistant commands with microphone\r\nVoice assistant-compatible for easy access to your smartphone\r\nNext-generation USB Type C charging.\r\nIn the box: USB Type-C cable','Sony Wireless Headphones WH-CH510: Wireless Bluetooth On-Ear Headset with Mic for Phone-Call, White (Amazon Exclusive)',7,1,0,'2021-06-08 23:53:52','2021-06-10 16:25:17',11,0),(11,'Sony MDRE9LP/BLK Ear Buds','sony-mdre9lpblk-ear-buds','Sony MDRE9LP/BLK Ear Buds','Connectivity Technology: Wired\r\n13.5mm driver unit, neodymium magnet, 1.2m cord\r\nWide range of colours to choose from\r\nEnjoy powerful bass on the go\r\nPair with a music player',2,1,0,'2021-06-08 23:56:27','2021-06-08 23:56:28',12,0),(12,'Sony WHXB900N','sony-whxb900n','Feel the power of extra bass\r\nNext-level digital noise cancelling technology\r\nEnjoy the convenience of hands-free calling thanks to the integrated microphone and Bluetooth connectivity\r\nGet up to 30 hours of battery life\r\nTouch sensor controls to pause play skip tracks control volume activate your voice assistant and answer phone calls\r\nQuick attention mode for effortless conversations without taking your headphones off\r\nActivate Alexa, the Google Assistant, or your voice assistant with a simple touch','Sony WHXB900N Noise Cancelling Headphones, Wireless Bluetooth Over the Ear Headset with Mic for Phone-Call and Alexa Voice Control- Black (WH-XB900N/B)\r\nVisit the Sony Store',2,1,0,'2021-06-08 23:59:41','2021-06-08 23:59:42',13,0),(13,'Sony MDRZX110NC','sony-mdrzx110nc','Over ear, Noise isolating Headphones. Connectivity Technology: Wired\r\n30mm Neodymium Driver. 110 dB MW – Power off, 115 dB MW – Power on\r\nUp To 80 Hours Of Battery Life\r\nFrequency response:10 22,000 Hz\r\nImpedance (Ohm) Power ON 220 ohm, OFF 45 ohm (at 1 kHz). Cord Length:3.94 feet','Sony MDRZX110NC Noise Cancelling Headphones, Black',2,1,0,'2021-06-09 00:00:38','2021-06-09 00:00:39',14,0),(14,'Apple iPhone XS Max','apple-iphone-xs-max','A like-new experience. Backed by a one-year satisfaction guarantee.\r\nRenewed Premium products are shipped and sold by Amazon and have been certified to work and look like new. They have an increased battery life (min 90% battery capacity) and come with an Amazon-branded box and generic accessories which are in brand new condition. Renewed Premium products are not Apple certified but come with a one-year full satisfaction guarantee. See terms here.','Apple iPhone XS Max, 64GB, Gold - Fully Unlocked (Renewed Premium)',7,1,0,'2021-06-09 00:02:33','2021-06-10 16:36:09',15,0),(15,'Apple iPhone X','apple-iphone-x','Compatible with GSM carriers like AT&T, T-Mobile, Verizon US Cellular and Metro.\r\nTested for battery health and guaranteed to come with a battery that exceeds 90% of original capacity.\r\nInspected and guaranteed to have minimal cosmetic damage, which is not noticeable when the device is held at arm’s length. Successfully passed a full diagnostic test which ensures like-new functionality and removal of any prior-user personal information.\r\nIncludes a brand new, generic charging cable that is certified Mfi (Made for iPhone) and a brand new, generic wall plug that is UL certified for performance and safety. Also includes a SIM tray removal tool but does not come with headphones or a SIM card.\r\nBacked by the same one-year satisfaction guarantee as brand new Apple products.','Apple iPhone X, 64GB, Silver - Fully Unlocked (Renewed Premium)',7,1,0,'2021-06-09 00:04:28','2021-06-10 16:30:23',16,0),(16,'Apple iPhone XS','apple-iphone-xs','Compatible with GSM carriers like AT&T, T-Mobile, Verizon US Cellular and Metro.\r\nTested for battery health and guaranteed to come with a battery that exceeds 90% of original capacity.\r\nInspected and guaranteed to have minimal cosmetic damage, which is not noticeable when the device is held at arm’s length. Successfully passed a full diagnostic test which ensures like-new functionality and removal of any prior-user personal information.\r\nIncludes a brand new, generic charging cable that is certified Mfi (Made for iPhone) and a brand new, generic wall plug that is UL certified for performance and safety. Also includes a SIM tray removal tool but does not come with headphones or a SIM card.\r\nBacked by the same one-year satisfaction guarantee as brand new Apple products.','Apple iPhone XS, 64GB, Space Gray - Fully Unlocked (Renewed Premium)',4,1,0,'2021-06-09 00:05:37','2021-06-09 00:05:37',17,0),(17,'Apple iPhone SE','apple-iphone-se','Fully unlocked and compatible with any carrier of choice (e.g. AT&T, T-Mobile, Sprint, Verizon, US-Cellular, Cricket, Metro, etc.), both domestically and internationally.\r\nTested for battery health and guaranteed to come with a battery that exceeds 90% of original capacity.\r\nInspected and guaranteed to have minimal cosmetic damage, which is not noticeable when the device is held at arm’s length. Successfully passed a full diagnostic test which ensures like-new functionality and removal of any prior-user personal information.\r\nIncludes a brand new, generic charging cable that is certified Mfi (Made for iPhone) and a brand new, generic wall plug that is UL certified for performance and safety. Also includes a SIM tray removal tool but does not come with headphones or a SIM card.\r\nBacked by the same one-year satisfaction guarantee as brand new Apple products.','Apple iPhone SE, 64GB, Black - Fully Unlocked (Renewed Premium)',7,1,0,'2021-06-09 00:06:53','2021-06-10 16:47:03',18,0),(18,'Apple iPhone 11','apple-iphone-11','OFFER INCLUDES: An Apple iPhone and a wireless plan with unlimited data/talk/text\r\nWIRELESS PLAN: Unlimited talk, text, and data with mobile hotspot, nationwide coverage, and international reach. No long-term contract required.\r\nPROGRAM DETAILS: When you add this offer to cart, it will reflect 3 items: the iPhone, SIM kit, and carrier subscription\r\n6.1-inch Liquid Retina HD LCD display, water and dust resistant, with Face ID\r\nDual-camera system with 12MP Ultra Wide camera, 12MP TrueDepth front camera with Portrait mode','Roll over image to zoom in\r\nApple iPhone 11 [64GB, Purple] + Carrier Subscription [Cricket Wireless]',7,1,0,'2021-06-09 00:11:03','2021-06-10 16:46:23',19,0),(19,'SteelSeries Gaming Controller','steelseries-gaming-controller','Official Apple-licensed Wireless Connectivity – works with all Apple products including iOS, iPads and tvs devices\r\nBuilt-in Rechargeable Battery – Rechargeable battery allows for 50+ hours of play on a single charge\r\nPlay Thousands of Games – Compatible with thousands of titles across the App Store and Apple Arcade\r\nTactile D-Pad Buttons – The arrow buttons have been upgraded with a tactile click for fast and responsive feedback\r\nClickable Joysticks – Clickable L3/R3 buttons allow for more input options across a variety of games\r\nFor optimizing compatibility with all iOS devices we strongly suggest that you update the controller by downloading SteelSeries Engine from the SteelSeries website','SteelSeries Nimbus+ Bluetooth Mobile Gaming Controller with iPhone Mount, 50+ Hour Battery Life, Apple Licensed, Made for iOS, iPadOS, tvOS',7,1,0,'2021-06-09 00:14:40','2021-06-10 16:38:10',20,0),(20,'SONY PlayStation 4 Slim 1TB Console','sony-playstation-4-slim-1tb-console','SONY PlayStation 4 Slim 1TB Console, Light & Slim PS4 System, 1TB Hard Drive, All the Greatest Games, TV, Music & More','SONY PlayStation 4 Slim 1TB Console, Light & Slim PS4 System, 1TB Hard Drive, All the Greatest Games, TV, Music & More',5,1,0,'2021-06-09 00:16:12','2021-06-09 00:16:13',21,0),(21,'Sony Playstation 3','sony-playstation-3','Sony Playstation 3 160GB SystemBM Cell processor and a co-developed NVIDIA graphics processor\r\nDolby Digital 5.1, DTS 5.1\r\nPlayStation 3 utilizes the Blu-ray disc media format\r\nThe Dualshock 3 wireless controller(one controller) included with The PlayStation 3\r\nHDMI + Bravia Synch functionality','Sony Playstation 3 160GB System',1,1,0,'2021-06-09 00:17:56','2021-06-09 00:17:57',22,0),(22,'Acer Aspire 5 Slim Laptop','acer-aspire-5-slim-laptop','AMD Ryzen 3 3200U Dual Core Processor (Up to 3.5GHz); 4GB DDR4 Memory; 128GB PCIe NVMe SSD\r\n15.6 inches full HD (1920 x 1080) widescreen LED backlit IPS display; AMD Radeon Vega 3 Mobile Graphics\r\n1 USB 3.1 Gen 1 port, 2 USB 2.0 ports & 1 HDMI port with HDCP support\r\n802.11ac Wi-Fi; Backlit Keyboard; Up to 7.5 hours battery life\r\nWindows 10 in S mode. Maximum power supply wattage: 65 Watts','Acer Aspire 5 Slim Laptop, 15.6 inches Full HD IPS Display, AMD Ryzen 3 3200U, Vega 3 Graphics, 4GB DDR4, 128GB SSD, Backlit Keyboard, Windows 10 in S Mode, A515-43-R19L, Silver',6,1,0,'2021-06-09 00:19:29','2021-06-09 00:19:29',23,0),(23,'2021 Newest Dell','2021-newest-dell','【Dell Inspiron Laptop】16GB high-bandwidth RAM to smoothly run multiple applications and browser tabs all at once; 1TB Hard Disk Drive for ample storage space.\r\n【Processor】Intel Celeron Processor N4020 (2 cores, 2 Threads, 4MB Cache, up to 2.8 GHz)\r\n【Display 】15.6-inch HD (1366 x 768) Anti-Glare LED-Backlit Non-touch Display, Intel UHD Graphics with Shared Graphics Memory\r\n【Tech Specs】802.11ac 1x1 WiFi and Bluetooth, 1 x SD Card Reader, 1 x USB 2.0, 1 x Wedge-shaped lock slot, 1 x Power, 1 x HDMI 1.4b, 1 x RJ-45, 2 x USB 3.1 Gen 1, 1 x Headphone & Microphone Audio Jack, Win10 Home\r\n【Included in the package】Mousepad from PConline365','2021 Newest Dell Inspiron 3000 Laptop, 15.6 HD LED-Backlit Display, Intel Celeron Processor N4020, 16GB DDR4 RAM, 1TB Hard Disk Drive, Online Meeting Ready, Webcam, WiFi, HDMI, Win10 Home, Black',7,1,0,'2021-06-09 00:21:37','2021-06-10 16:47:53',24,0),(24,'HP Chromebook 11-inch Laptop','hp-chromebook-11-inch-laptop','bout this item\r\nALWAYS ON THE GO - Take this light and durable HP Chromebook with you anywhere. It travels well and has a 15 hour and 45 minute battery life, so you can stay connected without having to search for an outlet\r\nMADE FOR WHAT YOU DO - Switch between gaming, connecting with friends, and getting your schoolwork done. The powerful MediaTek mobile processor, full-size keyboard, and 11-inch display can handle it all\r\nTHE GOOGLE EXPERIENCE - Enjoy the seamless simplicity that comes with Google Chrome and Android apps, all integrated into one laptop. It’s fast, simple, and secure\r\nEFFICIENT OPTICS - Never sacrifice graphics for battery life again. The MediaTek Integrated Graphics card has Octa-core CPU and GPU graphics processors and a multimedia engine, so it’s built to perform without draining your battery\r\nHIGH DEFINITION, HIGH QUALITY - With an anti-glare, 11-inch laptop screen, you can stream movies and shows beautifully, all in the high-definition detail of 1 million pixels\r\nREMOTE WORK READY – Connect with work colleagues or friends and family from home and in high quality with an HP True Vision camera, integrated dual array digital microphones, and custom-tuned dual speakers','HP Chromebook 11-inch Laptop - Up to 15 Hour Battery Life - MediaTek - MT8183 - 4 GB RAM - 32 GB eMMC Storage - 11.6-inch HD Display - with Chrome OS - (11a-na0021nr, 2020 Model, Snow White)',6,1,0,'2021-06-09 00:22:50','2021-06-09 00:22:51',25,0),(25,'TCL 32-inch 3-Series 720p Roku Smart TV - 32S335','tcl-32-inch-3-series-720p-roku-smart-tv-32s335','Dimensions with Stand (W x H x D): 28.8\" x 18.9\" x 7.1\" | Without Stand (W x H x D): 28.8\" x 17.2\" x 2.9\" | Weight with Stand: 8.2 lbs | Weight without Stand: 8.0 lbs\r\nSmart functionality delivers all your favorite content with over 500,000 movies and TV episodes, accessible through the simple and intuitive Roku TV\r\nHD, Resolution: High definition (720p) resolution for excellent detail, color and contrast\r\nDual band Wi-Fi: Get fast and easy access to your favorite content to the dual band Wi-Fi connection\r\nInputs: 3 HDMI 2.0 with HDCP 2.2 (one with HDMI ARC), 1 USB (media player), RF, Composite, Headphone Jack, Optical Audio Out\r\nEasy Voice Control: Works with Amazon Alexa or Google Assistant to help you find movie titles, launch or change channels, even switch inputs, using just your voice. Also available through the Roku mobile app','TCL 32-inch 3-Series 720p Roku Smart TV - 32S335, 2021 Model',7,1,0,'2021-06-09 00:24:13','2021-06-09 00:24:13',26,0),(26,'SAMSUNG 65-Inch Class Crystal UHD AU8000 Series','samsung-65-inch-class-crystal-uhd-au8000-series','DYNAMIC CRYSTAL COLOR: A fine crystal layer reveals millions of true-to-life colors.\r\nCRYSTAL PROCESSOR 4K: Intelligent, ultra-fast optimization of 4K content.\r\nSMART TV WITH MULTIPLE VOICE ASSISTANTS: Access apps and streaming services right on your TV with your voice.\r\n3 HDMI PORTS: Connect up to 3 devices with HDMI.\r\nHDR: Unveils shades of color that go beyond HDTV.','SAMSUNG 65-Inch Class Crystal UHD AU8000 Series - 4K UHD Dual LED HDR Smart TV with Alexa Built-in (UN65AU8000FXZA, 2021 Model)',7,1,0,'2021-06-09 00:25:39','2021-06-09 00:25:40',27,0),(27,'Plycam','plycam','Plycam','Plycam',5,1,0,'2021-06-10 16:43:26','2021-06-10 16:43:26',31,0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sku_values`
--

DROP TABLE IF EXISTS `sku_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sku_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_sku_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `attribute_value_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sku_values`
--

LOCK TABLES `sku_values` WRITE;
/*!40000 ALTER TABLE `sku_values` DISABLE KEYS */;
INSERT INTO `sku_values` VALUES (5,3,1,1,'2021-05-19 16:06:02','2021-05-19 16:06:02'),(6,3,2,4,'2021-05-19 16:06:02','2021-05-19 16:06:02'),(7,4,1,1,'2021-06-08 22:55:49','2021-06-08 22:55:49'),(8,4,2,4,'2021-06-08 22:55:49','2021-06-08 22:55:49'),(9,5,1,1,'2021-06-08 23:08:46','2021-06-08 23:08:46'),(10,5,2,4,'2021-06-08 23:08:46','2021-06-08 23:08:46'),(11,6,1,1,'2021-06-08 23:13:09','2021-06-09 20:21:34'),(12,6,2,4,'2021-06-08 23:13:09','2021-06-09 20:23:17'),(13,7,1,1,'2021-06-08 23:17:26','2021-06-08 23:17:26'),(14,7,2,4,'2021-06-08 23:17:27','2021-06-08 23:17:27'),(15,8,1,1,'2021-06-08 23:27:59','2021-06-08 23:27:59'),(16,8,2,4,'2021-06-08 23:27:59','2021-06-08 23:27:59'),(17,9,1,1,'2021-06-08 23:46:06','2021-06-08 23:46:06'),(18,9,2,4,'2021-06-08 23:46:06','2021-06-08 23:46:06'),(19,10,1,1,'2021-06-08 23:51:04','2021-06-08 23:51:04'),(20,10,2,4,'2021-06-08 23:51:04','2021-06-08 23:51:04'),(21,11,1,1,'2021-06-08 23:53:52','2021-06-08 23:53:52'),(22,11,2,4,'2021-06-08 23:53:52','2021-06-08 23:53:52'),(23,12,1,1,'2021-06-08 23:56:28','2021-06-08 23:56:28'),(24,12,2,4,'2021-06-08 23:56:28','2021-06-08 23:56:28'),(25,13,1,1,'2021-06-08 23:59:42','2021-06-08 23:59:42'),(26,13,2,4,'2021-06-08 23:59:42','2021-06-08 23:59:42'),(27,14,1,1,'2021-06-09 00:00:39','2021-06-09 00:00:39'),(28,14,2,4,'2021-06-09 00:00:39','2021-06-09 00:00:39'),(29,15,1,1,'2021-06-09 00:02:33','2021-06-09 00:02:33'),(30,15,2,6,'2021-06-09 00:02:33','2021-06-10 16:35:59'),(31,16,1,1,'2021-06-09 00:04:28','2021-06-09 00:04:28'),(32,16,2,4,'2021-06-09 00:04:28','2021-06-09 00:04:28'),(33,17,1,1,'2021-06-09 00:05:37','2021-06-09 00:05:37'),(34,17,2,4,'2021-06-09 00:05:37','2021-06-09 00:05:37'),(35,18,1,1,'2021-06-09 00:06:54','2021-06-09 00:06:54'),(36,18,2,4,'2021-06-09 00:06:54','2021-06-09 00:06:54'),(37,19,1,1,'2021-06-09 00:11:04','2021-06-09 00:11:04'),(38,19,2,4,'2021-06-09 00:11:04','2021-06-09 00:11:04'),(39,20,1,1,'2021-06-09 00:14:41','2021-06-09 00:14:41'),(40,20,2,4,'2021-06-09 00:14:41','2021-06-09 00:14:41'),(41,21,1,1,'2021-06-09 00:16:13','2021-06-09 00:16:13'),(42,21,2,4,'2021-06-09 00:16:13','2021-06-09 00:16:13'),(43,22,1,1,'2021-06-09 00:17:57','2021-06-09 00:17:57'),(44,22,2,4,'2021-06-09 00:17:57','2021-06-09 00:17:57'),(45,23,1,1,'2021-06-09 00:19:30','2021-06-09 00:19:30'),(46,23,2,4,'2021-06-09 00:19:30','2021-06-09 00:19:30'),(47,24,1,1,'2021-06-09 00:21:38','2021-06-09 00:21:38'),(48,24,2,4,'2021-06-09 00:21:38','2021-06-09 00:21:38'),(49,25,1,1,'2021-06-09 00:22:51','2021-06-09 00:22:51'),(50,25,2,4,'2021-06-09 00:22:51','2021-06-09 00:22:51'),(51,26,1,1,'2021-06-09 00:24:13','2021-06-09 00:24:13'),(52,26,2,4,'2021-06-09 00:24:13','2021-06-09 00:24:13'),(53,27,1,1,'2021-06-09 00:25:40','2021-06-09 00:25:40'),(54,27,2,4,'2021-06-09 00:25:40','2021-06-09 00:25:40'),(55,28,1,2,'2021-06-09 20:22:10','2021-06-09 20:22:10'),(56,28,2,5,'2021-06-09 20:22:10','2021-06-09 20:22:10'),(57,29,1,2,'2021-06-10 16:40:49','2021-06-10 16:40:49'),(58,29,2,7,'2021-06-10 16:40:49','2021-06-10 16:41:24'),(59,30,1,3,'2021-06-10 16:42:04','2021-06-10 16:42:04'),(60,30,2,6,'2021-06-10 16:42:04','2021-06-10 16:42:12'),(61,31,1,1,'2021-06-10 16:43:26','2021-06-10 16:43:26'),(62,31,2,4,'2021-06-10 16:43:26','2021-06-10 16:43:26');
/*!40000 ALTER TABLE `sku_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public/user/defaulfavt.png',
  `birthday` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Thương đẹp trai','Vanthuonghcmue@gmail.com','2021-05-15 09:25:21','$2y$10$M9Qj52sxhu0UaUQNceeTwu3MnFsUsKJHqtwMLs9eHsUkYSR/t0spu','351a Lạc Long Quân, hcm','0986319121','user/1-1621508496.jpg','2021-05-15',NULL,'2021-05-15 09:24:53','2021-05-20 11:01:36');
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

-- Dump completed on 2021-06-10 14:23:01

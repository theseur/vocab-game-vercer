

DROP TABLE IF EXISTS `targytemakor`;

CREATE TABLE `targytemakor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nev` varchar(100) COLLATE utf16_hungarian_ci NOT NULL,
  `szulo` int DEFAULT NULL,
  `kepnev` varchar(200) COLLATE utf16_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_targynev` (`nev`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

INSERT INTO `targytemakor` VALUES (1,'angol',NULL,'angol.jpg'),(2,'család',1,'Angol Család.jpg'),(3,'történelem',NULL,'Történelem.jpg'),(4,'földrajz',NULL,'Földrajz.jpg'),(5,'haz',1,'Angol ház1.jpg'),(6,'ókor',3,'ókor.jpg'),(7,'fizika',NULL,'fizika.jpg'),(8,'SI nevek',7,'Si nevek.jpg'),(9,'világ országai',4,NULL),(10,'SI jelek',7,'SI jelek.jpg'),(11,'biológia',NULL,NULL),(12,'Európa fővárosai',4,'Európa fővárosai3.jpg'),(13,'erdő',11,'erdő1.jpg');

UNLOCK TABLES;


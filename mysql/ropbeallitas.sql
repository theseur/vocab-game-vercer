

CREATE TABLE `ropbeallitas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `temakorid` int NOT NULL,
  `osztaly` varchar(45) COLLATE utf8mb3_hungarian_ci NOT NULL,
  `datum` datetime NOT NULL,
  `tanarid` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `osztalydatum` (`osztaly`,`datum`),
  KEY `FK_tanarid` (`tanarid`),
  KEY `FK_temakorid` (`temakorid`),
  CONSTRAINT `FK_tanarid` FOREIGN KEY (`tanarid`) REFERENCES `felhasznalok` (`id`),
  CONSTRAINT `FK_temakorid` FOREIGN KEY (`temakorid`) REFERENCES `targytemakor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;




INSERT INTO `ropbeallitas` VALUES (1,6,'5.a angol emelt','2022-09-28 00:00:00',3),(2,8,'5.a angol emelt','2022-10-03 00:00:00',3),(3,6,'6.b angol emelt','2022-12-07 18:00:00',3),(4,2,'6.b angol emelt','2022-10-27 13:00:01',3),(8,6,'7 a közép','2022-12-16 12:12:00',3),(9,6,'7 a közép','2022-12-16 12:20:00',3),(10,6,'7 a közép','2022-12-16 14:00:00',3),(11,6,'7 a közép','2022-12-17 18:12:00',3),(12,6,'7 a közép','2022-12-17 19:39:00',3),(15,6,'7 a közép','2023-01-07 19:07:00',3),(16,6,'1.a közép','2023-02-04 18:29:00',3),(17,2,'8.b angol emelt','2024-02-17 11:24:00',3),(18,2,'7.a angol emelt','2024-02-17 11:56:00',3),(19,2,'8.b angol emelt','2024-02-17 11:57:00',3),(20,10,'7.a angol emelt','2024-03-15 16:09:00',3),(21,2,'3.a közép','2024-03-30 13:00:50',3),(22,12,'3.a közép','2024-03-30 13:51:23',3),(23,2,'3.a közép','2024-03-30 14:00:48',3),(24,2,'3.a közép','2024-03-30 14:07:14',3),(25,2,'3.a közép','2024-03-30 14:34:00',3),(26,2,'3.a közép','2024-03-30 14:36:00',3),(27,2,'3.a közép','2024-03-30 14:37:00',3),(28,2,'3.a közép','2024-03-30 14:39:00',3),(29,2,'3.a közép','2024-03-30 14:40:00',3),(30,2,'3.a közép','2024-03-30 14:42:00',3),(31,2,'3.a közép','2024-03-30 14:47:00',3),(32,2,'3.a közép','2024-03-30 14:55:00',3),(33,2,'3.a közép','2024-03-30 14:57:00',3),(36,2,'3.a közép','2024-04-04 18:18:00',3),(37,2,'3.a közép','2024-04-04 18:19:00',3),(38,2,'3.a közép','2024-04-04 18:20:00',3),(39,2,'3.a közép','2024-04-04 18:24:00',3),(40,2,'3.a közép','2024-04-04 18:26:00',3),(46,2,'3.a közép','2024-04-11 19:42:00',3),(47,2,'8.c közép','2024-04-11 19:44:00',3),(48,2,'4.c közép','2024-04-11 19:48:00',3);




CREATE TABLE `feladatok` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ropdolgozatid` int NOT NULL,
  `pontszam` int unsigned NOT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test3` (`ropdolgozatid`),
  KEY `test4` (`userid`),
  CONSTRAINT `test3` FOREIGN KEY (`ropdolgozatid`) REFERENCES `ropdolgozat` (`id`),
  CONSTRAINT `test4` FOREIGN KEY (`userid`) REFERENCES `felhasznalok` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;



LOCK TABLES `feladatok` WRITE;

INSERT INTO `feladatok` VALUES (1,6,5,5),(2,6,5,5),(3,6,3,5),(4,61,5,5),(5,63,5,5),(15,123,5,7),(16,129,5,7),(17,135,5,7),(18,140,5,15),(19,145,5,29),(20,152,3,6);

UNLOCK TABLES;


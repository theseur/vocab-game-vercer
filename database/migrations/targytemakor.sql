DROP TABLE IF EXISTS `targytemakor`;

CREATE TABLE `targytemakor` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `nev` TEXT NOT NULL,
  `szulo` INTEGER DEFAULT NULL,
  `kepnev` TEXT DEFAULT NULL,
  CONSTRAINT `unique_targynev` UNIQUE (`nev`)
);

INSERT INTO `targytemakor` (`id`,`nev`,`szulo`,`kepnev`) VALUES
(1,'angol',NULL,'angol.jpg'),
(2,'család',1,'Angol Család.jpg'),
(3,'történelem',NULL,'Történelem.jpg'),
(4,'földrajz',NULL,'Földrajz.jpg'),
(5,'haz',1,'Angol ház1.jpg'),
(6,'ókor',3,'ókor.jpg'),
(7,'fizika',NULL,'fizika.jpg'),
(8,'SI nevek',7,'Si nevek.jpg'),
(9,'világ országai',4,NULL),
(10,'SI jelek',7,'SI jelek.jpg'),
(11,'biológia',NULL,NULL),
(12,'Európa fővárosai',4,'Európa fővárosai3.jpg'),
(13,'erdő',11,'erdő1.jpg');
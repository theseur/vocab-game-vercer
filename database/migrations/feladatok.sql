CREATE TABLE `feladatok` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `ropdolgozatid` INTEGER NOT NULL,
  `pontszam` INTEGER NOT NULL CHECK (`pontszam` >= 0),
  `userid` INTEGER NOT NULL,
  CONSTRAINT `test3` FOREIGN KEY (`ropdolgozatid`) REFERENCES `ropdolgozat` (`id`),
  CONSTRAINT `test4` FOREIGN KEY (`userid`) REFERENCES `felhasznalok` (`id`)
);

CREATE INDEX `test3` ON `feladatok` (`ropdolgozatid`);
CREATE INDEX `test4` ON `feladatok` (`userid`);

INSERT INTO `feladatok` (`id`,`ropdolgozatid`,`pontszam`,`userid`) VALUES
(1,6,5,5),(2,6,5,5),(3,6,3,5),(4,61,5,5),(5,63,5,5),
(15,123,5,7),(16,129,5,7),(17,135,5,7),(18,140,5,15),(19,145,5,29),(20,152,3,6);
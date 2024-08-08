


CREATE TABLE `szoszedet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `angol` varchar(100) COLLATE utf8mb3_hungarian_ci NOT NULL,
  `magyar` varchar(100) COLLATE utf8mb3_hungarian_ci NOT NULL,
  `temakorid` int NOT NULL,
  `deactivate` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `temakorid` (`temakorid`),
  CONSTRAINT `szoszedet_ibfk_1` FOREIGN KEY (`temakorid`) REFERENCES `targytemakor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=475 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

LOCK TABLES `szoszedet` WRITE;

INSERT INTO `szoszedet` VALUES (0,'English','angol',2,0),(1,'season','évszak',2,0),(2,'spring','tavasz',2,0),(3,'summer','nyár',2,0),(4,'autumn','ősz',2,0),(5,'winter','tél',2,0),(6,'to fall (fell, fallen)','esni, hullani',2,0),(7,'to burst into bloom (burst, burst)','virágzani kezd',2,0),(8,'to bloom (bloomed, bloomed)','virágzani',2,0),(9,'to be in bloom','virágzani passzív',2,0),(10,'to begin to blossom (began, begun)','virágzani kezd (fa)',2,0),(11,'to blossom (blossomed, blossomed)','virágzik (fa)',2,0),(12,'to sprout (sprouted, sprouted)','csírázik, kihajt',2,0),(13,'to ripen (ripened, ripened)','érik, érlel',2,0),(14,'to grow (grew, grown)','nőni',2,0),(15,'ripe','érett',2,0),(16,'nature','természet',2,0),(17,'plant','növény',2,0),(18,'to plant (planted, planted)','ültetni',2,0),(19,'flower','virág',2,0),(20,'tree','fa',2,0),(21,'bush','bokor',2,0),(22,'grass','fű',2,0),(23,'woods','erdő',2,0),(24,'forest','erdő (nagyobb)',2,0),(25,'Family members, relatives –','családtagok, rokonok',2,0),(26,'fiancé ',' vőlegény',2,0),(27,'fiancée ',' menyasszony',2,0),(28,'bride ','menyasszony (az esküvőn)',2,0),(29,'groom  ',' vőlegény (az esküvőn)',2,0),(30,'bridesmaid ',' nyoszolyólány',2,0),(31,'best man ',' vőlegény tanúja',2,0),(32,'spouse ',' házastárs',2,0),(33,'widow ',' özvegyasszony',2,0),(34,'widower ',' özvegy (férfi)',2,0),(35,'single parent ','egyedülálló szül?',2,0),(36,'stepparent ',' mostoha szül?',2,0),(37,'dad','apa',2,0),(38,'mom ','anya',2,0),(39,'great grandparents ','– déd szülők',2,0),(40,'godparents ','kereszt szülők',2,0),(41,'nephew ',' unokaöccs',2,0),(42,'niece ',' unokahúg',2,0),(43,'in laws',' – anyós/após',2,0),(44,'only child ','egyedüli gyermek',2,0),(45,'Expressions ',' kifejezések',2,0),(46,'partner ',' partner',2,0),(47,'couple ',' pár',2,0),(48,'childhood ',' gyermekkor',2,0),(49,'adulthood ',' felnőttkor',2,0),(50,'to bring up ','felnevelni',2,0),(51,'to grow up ',' felnőni',2,0),(52,'to separate ',' különválni',2,0),(53,'to date ',' együttjárni',2,0),(54,'to get married ',' összeházasodni',2,0),(55,'reception ','fogadás, lakodalom',2,0),(56,'honeymoon ',' mézeshetek',2,0),(57,'to cheat (on) ',' megcsalni',2,0),(58,'to get divorced ',' elválni',2,0),(59,'to take after sy ','hasonlítani vkire',2,0),(60,'nursing home ','idősek otthona',2,0),(61,'to adopt ','örökbe fogadni',2,0),(62,'adoption ',' örökbefogadás',2,0),(63,'to take care of – ','gondot visel',2,0),(64,'to raise ',' felnevelni',2,0),(65,'to look after ',' vigyázni',2,0),(66,'to fall asleep ','elaludni',2,0),(67,'to oversleep –','reggel elaludni',2,0),(68,'to stay in ','otthon maradni',2,0),(69,'to live on one’s own ','egyedül élni',2,0),(70,'to change someone’s mind ','meggondolni magát',2,0),(71,'to lose someone ','elveszíteni vkit',2,0),(72,'to turn your back on someone ','hátat fordítani vkine',2,0),(73,'independent ',' független',2,0),(74,'Life stages ',' életszakaszok',2,0),(75,'new-born','  újszülött',2,0),(76,'toddler ','kisgyermek, totyogó',2,0),(77,'child ',' gyermek',2,0),(78,'teenager ',' serdül?',2,0),(79,'adult ',' feln?tt',2,0),(80,'middle-aged ',' középkorú',2,0),(81,'in your early/mid/late forties – a 40','es évei elején/közepén/végén járó',2,0),(82,'pensioner/retired ',' nyugdíjas',2,0),(83,'house','elszállásol, szállást biztosít vkinek(2)',5,0),(84,'move','elköltözik (munkahelyet, iskolát) változtat(2)',5,0),(85,'rent','bérel (lakást/házat)(1)',5,0),(86,'rent','bérbe ad (lakást/házat)(3)',5,0),(87,'apartment','lakás (ált. az épület egy szintjén)',5,0),(88,'flat','lakás',5,0),(89,'home','otthon (ahol vki él)(1)',5,0),(90,'house','családi ház ház, épület(1)',5,0),(91,'housing','lakóhely (lakhatási lehet?ség) (lakás, ház, stb.)',5,0),(92,'landlady','szállásadón? tulajdonosn?',5,0),(93,'landlord','szállásadó tulajdonos',5,0),(94,'move','költözés, költözködés(2)',5,0),(95,'neighbour','szomszéd (mellette lakó)(1)',5,0),(96,'neighbourhood','környék környékbeliek',5,0),(97,'place','hely, lakóhely (otthon, lakás, ház, nyaraló, stb.)(2)',5,0),(98,'property','ingatlan birtok(2)',5,0),(99,'rent','lakbér',5,0),(100,'roommate','szobatárs, lakótárs',5,0),(101,'tenant','bérl? (házban, lakásban)',5,0),(102,'detached','különálló (épület, ház, garázs)(1)',5,0),(103,'next-door','szomszéd (lakás/ház/épület)',5,0),(104,'semi-detached','iker (-ház)',5,0),(105,'next door','a szomszédban (a szomszéd lakásban/házban/épületben)',5,0),(106,'Kr. e. III. évezred',' Sumer tündöklése és bukása.',6,0),(107,'Kr. e. XVIII. század',' Óbabiloni Birodalom – Hammurapi törvénygy?jteménye.',6,0),(108,'Kr. e. 2900',' Alsó- és Felsô-Egyiptom egyesítése.',6,0),(109,'Kr. e. XXVIII–XXV. század',' a piramisépítô fáraók kora.',6,0),(110,'Kr. e. XIII. század',' dór vándorlás – a mükénei központok pusztulása.',6,0),(111,'Kr. e. 776',' az elsô feljegyzett olimpia – a görög idôszámítás kezdete.',6,0),(112,'Kr. e. 753',' Róma alapítása.',6,0),(113,'Kr. e. 594',' Szolón reformjai Athénban.',6,0),(114,'Kr. e. 525',' Kürosz perzsa király elfoglalja Egyiptomot.',6,0),(115,'Kr. e. 510',' az arisztokratikus köztársaság kialakulása Rómában.',6,0),(116,'Kr. e. 508',' Kleiszthenész reformjai Athénban.',6,0),(117,'Kr. e. 490',' a marathóni csata.',6,0),(118,'Kr. e. 480',' a thermopülai és a szalamiszi csata.',6,0),(119,'Kr. e. 431–421',' a peloponnészoszi háború.',6,0),(120,'Kr. e. 367',' törvényben maximálják Rómában az állami földekbôl bérelhetô föld nagyságát (Licinius-féle földtörvé',6,0),(121,'Kr. e. 336–323',' Alexandrosz uralkodása.',6,0),(122,'Kr. e. 264–241',' az elsô pun háború. Róma elfoglalja Szicíliát.',6,0),(123,'Kr. e. 218–201',' a második pun háború.',6,0),(124,'Kr. e. 168',' a püdnai csata. A római elôretörés kezdete Keleten.',6,0),(125,'Kr. e. 48',' a pharszaloszi csata. Caesar legyôzi Pompeiust.',6,0),(126,'Kr. e. 44',' Caesar meggyilkolása.',6,0),(127,'Kr. e. 31',' az actiumi csata. Octavianus legyôzi Antoniust',6,0),(128,'Kr. e. 27–Kr. u. 14',' Octavianus (Augustus) uralkodása. A principátus',6,0),(129,'Kr. e. 9',' a római hódítás kezdete Pannóniában.',6,0),(130,'Kr. u. 284',' Diocletianus trónra lépése (uralkodik 305-ig). A dominátus',6,0),(131,'Kr. u. 313',' Constantinus türelmi rendelete – a kereszténység egyenjogúsítása.',6,0),(132,'Kr. u. 395',' Theodosius császár két részre osztja a Római Birodalmat.',6,0),(133,'Kr. u. 476',' a Nyugatrómai Birodalom bukása. Az ókor vége.',6,0),(134,'622',' a hidzsra – a mohamedán idôszámítás kezdete.',6,0),(135,'732',' Martell Károly Poitiers-nél megállítja az arabokat.',6,0),(136,'756',' a Pápai Állam létrejötte.',6,0),(137,'768–814',' Nagy Károly uralkodása – a Frank Birodalom fénykora.',6,0),(138,'800',' Nagy Károlyt Rómában császárrá koronázzák.',6,0),(139,'843',' a verduni szerzôdés – a Frank Birodalom felosztása.',6,0),(140,'962',' I. (Nagy) Ottó koronázása',6,0),(141,'895–900',' a honfoglalás.',6,0),(142,'907',' a pozsonyi csata – magyar gyôzelem a bajorok felett.',6,0),(143,'907–955',' a magyar kalandozások fô idôszaka.',6,0),(144,'955',' az augsburgi csata – a magyarok veresége.',6,0),(145,'972–997',' Géza fejedelem uralkodása.',6,0),(146,'973',' a quedlinburgi találkozó ',6,0),(147,'997–1038',' I. (Szent) István uralkodása.',6,0),(148,'1000 vagy 1001',' Szent István megkoronázása.',6,0),(149,'1054',' az egyházszakadás.',6,0),(150,'hosszúság (út)','méter',8,0),(151,'terület','négyzetméter',8,0),(152,'térfogat','köbméter',8,0),(153,'idő','másodperc (szekundum)',8,0),(154,'sebesség','méter per szekundum',8,0),(155,'gyorsulás','méter per szekundumnégyzet',8,0),(156,'tömeg','kilogramm',8,0),(157,'sűrűség','kilogramm per köbméter',8,0),(158,'erő','newton',8,0),(159,'nyomás','pascal',8,0),(160,'munka','joule W',8,0),(161,'energia','joule E',8,0),(162,'teljesítmény','watt',8,0),(163,'hőmérséklet','kelvin',8,0),(164,'áramerősség','amper',8,0),(165,'töltés','coulomb',8,0),(166,'feszültség','volt',8,0),(167,'ellenállás','ohm',8,0),(171,'Afganisztán','Kabul',9,0),(172,'Aland-szigetek ','Mariehamn',9,0),(173,'Albánia','Tirana',9,0),(174,'Algéria','Algír',9,0),(175,'Amerikai Szamoa ','Pago Pago',9,0),(176,'Amerikai Virgin-szigetek ','Charlotte Amalie',9,0),(177,'Andorra','Andorra la Vella',9,0),(178,'Angola','Luanda',9,0),(179,'Anguilla ','The Valley',9,0),(180,'Antigua és Barbuda','Saint John’s',9,0),(181,'Apostoli Szentszék','Vatikánváros',9,0),(182,'Argentína','Buenos Aires',9,0),(183,'Aruba ','Oranjestad',9,0),(184,'Ausztrália','Canberra',9,0),(185,'Ausztria','Bécs',9,0),(186,'Azerbajdzsán','Baku',9,0),(187,'Bahama-szigetek','Nassau',9,0),(188,'Bahrein','Manáma',9,0),(189,'Banglades','Dakka',9,0),(190,'Barbados','Bridgetown',9,0),(191,'Belarusz / Fehéroroszország','Minszk',9,0),(192,'Belgium','Brüsszel',9,0),(193,'Belize','Belmopan',9,0),(194,'Benin','Porto Novo',9,0),(195,'Bermuda ','Hamilton',9,0),(196,'Bhután','Timpu',9,0),(197,'Bissau-Guinea','Bissau',9,0),(198,'Bolívia','Sucre',9,0),(199,'Bosznia-Hercegovina','Szarajevó',9,0),(200,'Botswana','Gaborone',9,0),(201,'Brazília','Brazíliaváros (Brasília)',9,0),(202,'Brit Virgin-szigetek ','Road Town',9,0),(203,'Brunei','Bandar Seri Begawan',9,0),(204,'Bulgária','Szófia',9,0),(205,'Burkina Faso','Ouagadougou',9,0),(206,'Burundi','Bujumbura',9,0),(207,'Chile','Santiago de Chile',9,0),(208,'Ciprus','Nicosia',9,0),(209,'Comore-szigetek','Moroni',9,0),(210,'Cook-szigetek ','Avarua',9,0),(211,'Costa Rica','San José',9,0),(212,'Csád','N’Djamena',9,0),(213,'Csehország','Prága',9,0),(214,'Dánia','Koppenhága',9,0),(215,'Dél-Afrika','Pretoria',9,0),(216,'Dél-Korea','Szöul',9,0),(217,'Dominika','Roseau',9,0),(218,'Dominikai Köztársaság','Santo Domingo',9,0),(219,'Dzsibuti','Dzsibuti',9,0),(220,'Ecuador','Quito',9,0),(221,'Egyenlít?i-Guinea','Malabo',9,0),(222,'Egyesült Államok','Washington',9,0),(223,'Egyesült Arab Emírségek','Abu-Dzabi',9,0),(224,'Egyesült Királyság','London',9,0),(225,'Egyiptom','Kairó',9,0),(226,'Elefántcsontpart','Yamoussoukro',9,0),(227,'Eritrea','Aszmara',9,0),(228,'Északi-Mariana-szigetek ','Garapan',9,0),(229,'Észak-Korea','Phenjan',9,0),(230,'Észtország','Tallinn',9,0),(231,'Etiópia','Addisz-Abeba',9,0),(232,'Falkland-szigetek','Stanley',9,0),(233,'Feröer szigetek ','Tórshavn',9,0),(234,'Fidzsi-szigetek','Suva',9,0),(235,'Finnország','Helsinki',9,0),(236,'Francia Guyana ','Cayenne',9,0),(237,'Francia Polinézia ','Papeete',9,0),(238,'Franciaország','Párizs',9,0),(239,'Fülöp-szigetek','Manila',9,0),(240,'Gabon','Libreville',9,0),(241,'Gambia','Banjul',9,0),(242,'Ghána','Accra',9,0),(243,'Gibraltár ','Gibraltár',9,0),(244,'Görögország','Athén',9,0),(245,'Grenada','Saint George’s',9,0),(246,'Grönland ','Nuuk (Godthab)',9,0),(247,'Grúzia','Tbiliszi',9,0),(248,'Guadeloupe ','Basse-Terre',9,0),(249,'Guam ','Hagatna',9,0),(250,'Guatemala','Guatemalaváros',9,0),(251,'Guinea','Conakry',9,0),(252,'Guyana','Georgetown',9,0),(253,'Haiti','Port-au-Prince',9,0),(254,'Holland Antillák ','Willemstad',9,0),(255,'Hollandia','Amszterdam',9,0),(256,'Honduras','Tegucigalpa',9,0),(257,'Horvátország','Zágráb',9,0),(258,'India','Újdelhi',9,0),(259,'Indonézia','Jakarta',9,0),(260,'Irak','Bagdad',9,0),(261,'Irán','Teherán',9,0),(262,'Írország','Dublin',9,0),(263,'Izland','Reykjavík',9,0),(264,'Izrael','Tel Aviv (Jeruzsálem)',9,0),(265,'Jamaica','Kingston',9,0),(266,'Japán','Tokió',9,0),(267,'Jemen','Szanaa',9,0),(268,'Jordánia','Ammán',9,0),(269,'Kajmán-szigetek ','Georgetown',9,0),(270,'Kambodzsa','Phnompen',9,0),(271,'Kamerun','Yaoundé',9,0),(272,'Kanada','Ottawa',9,0),(273,'Karácsony-sziget ','Flying Fish Cove',9,0),(274,'Katar','Doha',9,0),(275,'Kazahsztán','Asztana',9,0),(276,'Kelet-Timor','Dili',9,0),(277,'Kenya','Nairobi',9,0),(278,'Kína','Peking',9,0),(279,'Kirgizisztán','Biskek',9,0),(280,'Kiribati','Tarawa',9,0),(281,'Kókusz-szigetek/Keeling-szigetek','Bantam',9,0),(282,'Kolumbia','Bogotá',9,0),(283,'Kongó','Brazzaville',9,0),(284,'Kongói Demokratikus Köztársaság','Kinshasa',9,0),(285,'Közép-afrikai Köztársaság','Bangui',9,0),(286,'Kuba','Havanna',9,0),(287,'Kuvait','Kuvaitváros',9,0),(288,'Laosz','Vientián',9,0),(289,'Lengyelország','Varsó',9,0),(290,'Lesotho','Maseru',9,0),(291,'Lettország','Riga',9,0),(292,'Libanon','Bejrút',9,0),(293,'Libéria','Monrovia',9,0),(294,'Líbia','Tripoli',9,0),(295,'Liechtenstein','Vaduz',9,0),(296,'Litvánia','Vilnius',9,0),(297,'Luxemburg','Luxembourg',9,0),(298,'Macedónia','Szkopje',9,0),(299,'Madagaszkár','Antananarivo',9,0),(300,'Magyarország','Budapest',9,0),(301,'Makaó ','Makaó',9,0),(302,'Malajzia','Kuala Lumpur',9,0),(303,'Malawi','Lilongwe',9,0),(304,'Maldív-szigetek','Male',9,0),(305,'Mali','Bamako',9,0),(306,'Málta','Valletta',9,0),(307,'Marokkó','Rabat',9,0),(308,'Marshall-szigetek','Majuro',9,0),(309,'Martinique ','Fort-de-France',9,0),(310,'Mauritánia','Nuáksút (Nouakchott)',9,0),(311,'Mauritius','Port Louis',9,0),(312,'Mayotte ','Mamoudzou',9,0),(313,'Mexikó','Mexikóváros',9,0),(314,'Mianmar ','Rangun',9,0),(315,'Mikronézia','Palikir',9,0),(316,'Moldova','Chi?in?u',9,0),(317,'Monaco','Monaco',9,0),(318,'Mongólia','Ulánbátor',9,0),(319,'Montenegró','Podgorica',9,0),(320,'Montserrat ','Plymouth',9,0),(321,'Mozambik','Maputo',9,0),(322,'Namíbia','Windhoek',9,0),(323,'Nauru','Yaren',9,0),(324,'Németország','Berlin',9,0),(325,'Nepál','Katmandu',9,0),(326,'Nicaragua','Managua',9,0),(327,'Niger','Niamey',9,0),(328,'Nigéria','Abuja',9,0),(329,'Niue ','Alofi',9,0),(330,'Norfolk-sziget ','Kingston',9,0),(331,'Norvégia','Oslo',9,0),(332,'Nyugat-Szahara ','Ajún',9,0),(333,'Olaszország','Róma',9,0),(334,'Omán','Maszkat',9,0),(335,'Oroszország','Moszkva',9,0),(336,'Örményország','Jereván',9,0),(337,'Pakisztán','Iszlámábád',9,0),(338,'Palau','Melekeok',9,0),(339,'Panama','Panamavárosk',9,0),(340,'Pápua Új-Guinea','Port Moresby',9,0),(341,'Paraguay','Asunción',9,0),(342,'Peru','Lima',9,0),(343,'Pitcairn-szigetek ','Adamstown',9,0),(344,'Portugália','Lisszabon',9,0),(345,'Puerto Rico ','San Juan',9,0),(346,'Réunion ','Saint-Denis',9,0),(347,'Románia','Bukarest',9,0),(348,'Ruanda','Kigali',9,0),(349,'Saint Kitts és Nevis','Basseterre',9,0),(350,'Saint Lucia','Castries',9,0),(351,'Saint-Pierre és Miquelon','Saint-Pierre',9,0),(352,'Saint Vincent és Grenadine-szigetek','Kingstown',9,0),(353,'Salamon-szigetek','Honiara',9,0),(354,'Salvador','San Salvador',9,0),(355,'San Marino','San Marino',9,0),(356,'S?o Tomé és Príncipe','S?o Tomé',9,0),(357,'Seychelle-szigetek','Victoria',9,0),(358,'Sierra Leone','Freetown',9,0),(359,'Spanyolország','Madrid',9,0),(360,'Srí Lanka','Colombo',9,0),(361,'Suriname','Paramaribo',9,0),(362,'Svájc','Bern',9,0),(363,'Svalbard- és Jan Mayen-szigetek ','Longyearbyen',9,0),(364,'Svédország','Stockholm',9,0),(365,'Szamoa','Apia',9,0),(366,'Szaúd-Arábia','Rijád',9,0),(367,'Szenegál','Dakar',9,0),(368,'Szent Ilona ','Jamestown',9,0),(369,'Szerbia','Belgrád',9,0),(370,'Szingapúr','Szingapúr',9,0),(371,'Szíria','Damaszkusz',9,0),(372,'Szlovákia','Pozsony (Bratislava)',9,0),(373,'Szlovénia','Ljubljana',9,0),(374,'Szomália','Mogadishu',9,0),(375,'Szudán','Kartúm',9,0),(376,'Szváziföld','Mbabane',9,0),(377,'Tádzsikisztán','Dusanbe',9,0),(378,'Tajvan ','Tajpej',9,0),(379,'Tanzánia','Dodoma',9,0),(380,'Thaiföld','Bangkok',9,0),(381,'Togo','Lomé',9,0),(382,'Tonga','Nuku’alofa',9,0),(383,'Törökország','Ankara',9,0),(384,'Trinidad és Tobago','Port of Spain',9,0),(385,'Tunézia','Tunisz',9,0),(386,'Turks- és Caicos-szigetek ','Cockburn Town',9,0),(387,'Tuvalu','Funafuti',9,0),(388,'Türkmenisztán','Asgabat',9,0),(389,'Uganda','Kampala',9,0),(390,'Új-Kaledónia ','Noumea',9,0),(391,'Új-Zéland','Wellington',9,0),(392,'Ukrajna','Kijev',9,0),(393,'Uruguay','Montevideo',9,0),(394,'Üzbegisztán','Taskent',9,0),(395,'Vanuatu','Port Vila',9,0),(396,'Venezuela','Caracas',9,0),(397,'Vietnam','Hanoi',9,0),(398,'Wallis és Futuna ','Mata-Utu',9,0),(399,'Zambia','Lusaka',9,0),(400,'Zimbabwe','Harare',9,0),(401,'Zöld-foki-szigetek','Praia',9,0),(402,'s','méter',10,0),(403,'A','négyzetméter',10,0),(404,'V','köbméter',10,0),(405,'t','másodperc (szekundum)',10,0),(406,'v','méter per szekundum',10,0),(407,' a g','méter per szekundumnégyzet',10,0),(408,'m','kilogramm',10,0),(409,'ró','kilogramm per köbméter',10,0),(410,'F','newton',10,0),(411,'p','pascal',10,0),(412,'W','joule W',10,0),(413,'E','joule E',10,0),(414,'P','watt',10,0),(415,'T','kelvin',10,0),(416,'I','amper',10,0),(417,'Q','coulomb',10,0),(418,'U','volt',10,0),(419,'R','ohm',10,0),(422,'Ausztria','Bécs\r\n',12,0),(423,'Belgium','Brüsszel\r\n',12,0),(424,'Bosznia-Hercegovina','Szarajevó\r\n',12,0),(425,'Bulgária','Szófia\r\n',12,0),(426,'Ciprus','Nicosia\r\n',12,0),(427,'Csehország','Prága\r\n',12,0),(428,'Dánia','Koppenhága\r\n',12,0),(429,'Finnország','Helsinki\r\n',12,0),(430,'Franciaország','Párizs\r\n',12,0),(431,'Gibraltár ','Gibraltár\r\n',12,0),(432,'Görögország','Athén\r\n',12,0),(433,'Hollandia','Amszterdam\r\n',12,0),(434,'Horvátország','Zágráb\r\n',12,0),(435,'Írország','Dublin\r\n',12,0),(436,'Izland','Reykjavík\r\n',12,0),(437,'Lengyelország','Varsó\r\n',12,0),(438,'Lettország','Riga\r\n',12,0),(439,'Liechtenstein','Vaduz\r\n',12,0),(440,'Litvánia','Vilnius\r\n',12,0),(441,'Luxemburg','Luxembourg\r\n',12,0),(442,'Macedónia','Szkopje\r\n',12,0),(443,'Magyarország','Budapest\r\n',12,0),(444,'Moldova','Chiºinãu\r\n',12,0),(445,'Monaco','Monaco\r\n',12,0),(446,'Németország','Berlin\r\n',12,0),(447,'Norvégia','Oslo\r\n',12,0),(448,'Olaszország','Róma\r\n',12,0),(449,'Oroszország','Moszkva\r\n',12,0),(450,'Spanyolország','Madrid\r\n',12,0),(451,'Svájc','Bern\r\n',12,0),(452,'Svédország','Stockholm\r\n',12,0),(453,'Szerbia','Belgrád\r\n',12,0),(454,'Szlovákia','Pozsony (Bratislava)\r\n',12,0),(455,'Szlovénia','Ljubljana\r\n',12,0),(456,'Ukrajna','Kijev\r\n',12,0),(457,'Románia','Bukarest\r\n',12,0),(458,'PortugáliaLisszabon',' Lisszabon\r\n',12,0),(459,'Montenegro',' Podgorica\r\n',12,0);

UNLOCK TABLES;

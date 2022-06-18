-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: news_db
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE cp1250_croatian_ci DEFAULT NULL,
  `short_desc` text COLLATE cp1250_croatian_ci DEFAULT NULL,
  `content` text COLLATE cp1250_croatian_ci DEFAULT NULL,
  `author` varchar(120) COLLATE cp1250_croatian_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `category` varchar(30) COLLATE cp1250_croatian_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE cp1250_croatian_ci DEFAULT NULL,
  `archive` tinyint(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Evo koliko je Dinamo ovog ljeta zaradio od transfera igrača koje nije imao u kadru','DINAMO je danas potvrdio transfer Petra Stojanovića u talijanski Empoli. Slovenski desni bek bio je pro&scaron;le sezone na posudbi u Serie A, a Empoli ga je odlučio otkupiti:','za 1. milijuna eura pa Stojanović nakon &scaron;est godina odlazi s Maksimira. Dinamo ga je 2016. godine Mariboru platio dva milijuna eura, a Stojanović je odigrao 186 utakmica te upisao dva gola i 18 asistencija.</p>\n<p>Stojanović je drugi igrač koji je prodan nakon posudbe ovog ljeta. Ista je stvar s Kristijanom Jakićem koji je tehnički na posudbi u Eintrachtu do kraja lipnja, nakon čega će ga Eintracht otkupiti za sedam milijuna eura. No Dinamo je ovog ljeta zaradio puno vi&scaron;e od tog iznosa.</p>\n<p>Hrvatski prvak uprihodio je dodatna četiri milijuna eura bonusa od transfera Danija Olma u Leipzig koji je taj novac Dinamu platio zbog osvajanja Kupa, nastupa u Ligi prvaka i jo&scaron; nekih bonusa. I u ugovor o transferu Jo&scaron;ka Gvardiola ugrađeni su određeni bonusi pa je Dinamo i od Gvardiola zaradio 500.000 eura na ime osvajanja njemačkoga kupa.</p>\n<p><strong>Novac od transfera u ratama</strong></p>\n<p>Tako je Dinamo ukupno ovog ljeta bez novih transfera zaradio 12.7 milijuna eura od prodaje Jakića i Stojanovića te bonusa od transfera Gvardiola i Olma. Vrijedi istaknuti da Dinamo novac od transfera neće dobiti odmah u cijelosti, već će on biti isplaćen u ratama kroz sljedećih nekoliko godina.</p>\n<p>&Scaron;to se ostalih odlazaka iz Maksimira tiče, najrealnije je da ovog ljeta prodan bude Dominik Livaković za kojeg se opet pojavio interes nekih klubova, ali službene ponude jo&scaron; nema. Može se dogoditi i transfer Luke Ivanu&scaron;eca, ali je realnije da on otiđe nakon SP-a, dok za Brunu Petkovića ponuda nema.</p>','luchenac','2022-06-18 00:05:14','sport','sport-img/4bc87d58-d312-4d29-82ca-2a13f8fb210c.jpg',0),(2,'Trump: Penceu je nedostajalo hrabrosti kada je napadnut Kapitol','BIV&Scaron;I američki predsjednik Donald Trump je danas, dan nakon zadnjih saslu&scaron;anja u Kongresu na temu 6. siječnja 2021.','a su Trumpovi prista&scaron;e upali na Kapitol, kritizirao postupke biv&scaron;eg potpredsjednika Mikea Pencea tog dana, rekav&scaron;i da mu je nedostajalo hrabrosti.</p>\r\n<p>Saslu&scaron;anja su pokazala na koje je načine Trump pozivao svoje prista&scaron;e da se okrenu protiv Pencea zbog njegovog odbijanja Trumpovog zahtjeva da odbaci rezultate predsjedničkih izbora iz studenog 2020. godine, prije nego &scaron;to su upali na Kapitol, sukobili se s policijom, a neki od njih su vikali \"objesite Mikea Pencea!\"</p>\r\n<p><strong>\"Mike pence je imao &scaron;ansu da bude velik\"</strong></p>\r\n<p>\"Mike Pence je imao &scaron;ansu da bude velik. Imao je &scaron;ansu,&nbsp;iskreno, da uđe u povijest. Mike, i to kažem sa žalo&scaron;ću jer mi je drag, no Mike nije imao hrabrosti djelovati\", rekao je Trump na skupu konzervativaca u Nashvilleu u petak.</p>\r\n<p>Republikanac Trump je ponovio svoje lažne optužbe da je njegov poraz protiv demokrata Joe Bidena bio rezultat velike prevare, &scaron;to je odbacilo vi&scaron;e sudova, izborni dužnosnici i članovi njegove administracije.</p>\r\n<p>Penceovo osoblje nije bilo odmah dostupno za komentar.</p>\r\n<p>No&nbsp;Pence je u intervjuu za Wall Street Journal branio svoje postupke.</p>\r\n<p>\"Konačno, vjerujem da većina Amerikanaca razumije da smo obavili svoju dužnost toga dana, prema ustavu i zakonima ove zemlje\", citirale su te novine Pencea.</p>','luchenac','2022-06-18 00:08:36','pol','pol-img/46fc07fa-c757-485c-a264-3090b5733ba4.jpg',0),(3,'Plenković hvalio HDZ: Mi smo tako jedinstveni, tako utjecajni','PREMIJER i predsjednik HDZ-a Andrej Plenković rekao je danas da će HDZ u budućnosti biti orijentiran na moderni hrvatski suverenizam poručiv&scaron;i kako nema suverenističkijeg&nbsp;poteza od spajanja Hrvatske mostom Pelje&scaron;ac, ulaska u eurozonu, schengenski prostor te pomoći u krizi.\r\n\"Dana&scaron;nje vrijeme i dana&scaron;nji prioriteti drugačiji su nego &scaron;to su bili prije 30-ak godina.','erni hrvatski suverenizam, oko kojeg formiramo sve na&scaron;e aktivnosti&nbsp;i politiku proteklih nekoliko godina, lako se može prevesti u dana&scaron;nje političke prioritete. Nema suverenističkijeg poteza&nbsp;od spajanja Hrvatske 26. srpnja - mostom Pelje&scaron;ac\", rekao je Plenković na obilježavanju 33. obljetnice HDZ-a i sjednici Nacionalnog odbora&nbsp;Zajednice utemeljitelja HDZ-a \"dr. Franjo Tuđman\" u prostorijama NK Jarun.&nbsp;</p>\r\n<p><strong>Uloga države u krizi</strong></p>\r\n<p>Naveo je i da danas moderni hrvatski suverenizam znači i odluka ministara financija EU da Hrvatska&nbsp;1. siječnja 2023. postane članica europodručja. Uz to,&nbsp;dodao je, moderni suverenizam će se početkom iduće godine \"projicirati\" i članstvom u schengenskom prostoru, ulaganjem u nabavku vi&scaron;enamjenskih borbenih aviona za Hrvatsko ratno zrakoplovstvo te, u dana&scaron;njim sigurnosnim ugrozama, dosad najvećim ulaganjima u proračun za obranu.</p>\r\n<p>Osvrćući se na ulogu države u krizi, Plenković je podsjetio na brojne izazove s kojima su se suočili proteklih godina - Agrokor, dolazak na naplatu enormnih&nbsp;dugova hrvatskih brodogradili&scaron;ta, pandemiju koronavirusa, dva razorna potresa koja su pogodila Zagreb i Baniju te krizu izazvanu&nbsp;agresijom Rusije na Ukrajinu.&nbsp;</p>\r\n<p>\"Mi smo tu, tu su radna mjesta, tu je gospodarski rast, tu je investicijski kreditni rejting. Nema prekomjernog proračunskog manjka, nema makroekonomskih&nbsp;neravnoteža, država staje iza hrvatskog radnika i plaća vi&scaron;e od 700.000 ljudi u privatnom sektoru, omogućuje za vi&scaron;e od&nbsp;120.000 kompanija da ostanu na nogama u krizi u kojoj bi većina njih stavila ključ u bravu\", naglasio je.&nbsp;</p>','luchenac','2022-06-18 00:11:31','pol','pol-img/26591ea1-dccb-4089-b6aa-dde68b88ecaf.jpg',0),(4,'CNN: Povećanje kamatne stope bit će katastrofa za američku ekonomiju','POVIJEST neće biti blaga u osudi američkih Federalnih rezervi u mandatu Jeromea Powella. Prvo, sredi&scaron;nja nacionalna bankovna institucija donijela je najveću inflaciju u vi&scaron;e desetljeća, a sada Ameriku usmjerava na put te&scaron;kog ekonomskog prizemljenja.','\r\n<p>Pro&scaron;le godine, kada se američko gospodarstvo snažno oporavljalo, Federalne rezerve (FED) su zadržale kamatnu stopu na nižoj donjoj granici i dopustile da se sveobuhvatna ponuda novca poveća za 40% u razdoblju od dvije godine. Slično, kada su trži&scaron;ta dionica i nekretnina bili u problemima, Fed je nastavio pumpati likvidnost na trži&scaron;te kupujući mjesečno 120 milijardi dolara vrijedne državne obveznice i hipotekarne vrijednosne papire, pi&scaron;e CNN.</p>\r\n<p><strong>\"Fed prestrogo priti&scaron;će\"</strong></p>\r\n<p>Uspaničene rastućom inflacijom, koju su potaknule svojim potezima, Federalne rezerve sada prestrogo priti&scaron;ću kočnice monetarne politike na isti način na koji su pro&scaron;le godine predugo držale nogu na gasu. To sada čine podizanjem kamatnih stopa u koracima od 75 baznih bodova umjesto normalnijim koracima od 25 baznih bodova. I povlače velike količine trži&scaron;ne likvidnosti ne prebacujući svoje dospjele obveznice.</p>\r\n<p>Na sličan način na koji su pro&scaron;le godine tiskale novac i kupovale državne obveznice, sada Federalne rezerve povlače novac iz sustava zahtijevajući od Ministarstva financija da otplati te obveznice po dospijeću.</p>\r\n<p>Jedan od razloga za razmi&scaron;ljanje da bi pomak Federalnih rezervi prema odvažnijoj politici mogao dovesti do recesije jest taj &scaron;to je takvo ne&scaron;to već izazvalo pucanje balona na trži&scaron;tu dionica i kredita stvorenog pro&scaron;le godine. Od početka godine cijene dionica pale su za gotovo 25%, cijene obveznica pale su za oko 11%, a trži&scaron;te kriptovaluta se uru&scaron;ava, pri čemu je bitcoin od petka izgubio četvrtinu svoje vrijednosti, a ethereum oko trećine vrijednosti.</p>','luchenac','2022-06-18 00:15:43','pol','pol-img/547f0d38-92be-4d3a-a534-67d8d2aec329.jpg',0),(7,'Leclercu deset mjesta kazne za Veliku nagradu Kanade','FERRARIJEV vozač Charles Leclerc kažnjen je s deset pozicija slabijim mjestom na startu Velike nagrade Kanade u odnosu na ono koje će zaslužiti vožnjom u kvalifikacijama. Razlog je treće kori&scaron;tenje kontrolne elektronike, &scaron;to za sobom odmah povlači spomenutu kaznu.','\r\n<p>Nakon niza problema koje je imao u dosada&scaron;njem dijelu sezone, koji su ga ko&scaron;tali iznimno puno bodova u utrci za naslov, Leclerc se suočio s novim. Nakon prve tri utrke u sezoni Leclerc je imao prednost od 46 bodova pred Maxom Verstappenom, a pred devetu utrku zaostaje 34 boda.</p>\r\n<p>U posljednje tri utrke Leclerc je morao dvaput odustati zbog problema s motorom bolida, oba puta kao vodeći u utrci.</p>','luchenac','2022-06-18 10:31:59','sport','sport-img/33fd8153-0c3a-45f1-a7a9-b5d675ce686d.jpg',0),(8,'Životinja utrčala na stazu Formule 1','UTRKE Formule 1 nastavit će se ove nedjelje za Veliku nagradu Kanade. Nakon dvije godine otkazivanja natjecanja zbog pandemije koronavirusa bolidi su ponovno na stazi u Montrealu, na kojoj su već i odradili dva uvodna slobodna treninga.','<p>prvom je snimljen krajnje neuobičajen prizor za F1, no ne i takav prvi, posebice ne na stazi koja nosi ime po&nbsp;Gillesu Villeneuveu.</p>\r\n<p>&nbsp;</p>\r\n<p>Malo je nedostajalo da prvi trening ostane upamćen ne samo po najboljoj vožnji Maxa Verstappena, koji je pobijedio i na drugom slobodnom treningu, već i po nesreći. Naime, u jednom trenutku na stazi se uz bolide na&scaron;ao i svizac koji je utrčao na nju, a onda pro&scaron;ao između bolida Fernanda Alonsa i Carlosa Sainza. Sve je pro&scaron;lo bez neželjenih posljedica, i za vozače i za svisca.</p>\r\n<p>KLIKNI <a href=\"https://sportklub.hr/automoto/formula-1/video-alonso-i-sainz-jedva-izbjegli-nepozvanog-gosta/\" target=\"_blank\" rel=\"noopener\">OVDJE&nbsp;</a>I POGLEDAJ TAJ TRENUTAK</p>','admin','2022-06-18 20:31:55','sport','sport-img/086dbce1-2339-433a-944b-34544bb11143.jpg',0);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE cp1250_croatian_ci DEFAULT NULL,
  `email` varchar(128) COLLATE cp1250_croatian_ci DEFAULT NULL,
  `password` varchar(255) COLLATE cp1250_croatian_ci DEFAULT NULL,
  `rights` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'luchenac','lukabican18@gmail.com','$2y$10$kXfDZIpRjlzsZMFw5gOPb.MaakyK1JBL2eZ2CKWe3eM36cdn8K7z.',2),(2,'admin','admin@ztimes','$2y$10$r3JCZv/SBoOUbsFDFzOrhOzf1q0DlRAwOi69rnEW16Z7aC8RTpJlS',2),(5,'noviracun','test@gmail.com','$2y$10$3b8EKhoheu0e/CjzBFsJCOLHfhySS8J/bOmCXSyu3ADzPBOp817h.',1);
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

-- Dump completed on 2022-06-18 21:48:43

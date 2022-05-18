-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2022 at 10:08 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kniznica`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
CREATE TABLE IF NOT EXISTS `autor` (
  `Cislo_autora` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Číslo autora',
  `Meno_autora` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Meno autora',
  `Priezvisko_autora` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Priezvisko autora',
  PRIMARY KEY (`Cislo_autora`),
  KEY `Priezvisko_autora` (`Priezvisko_autora`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`Cislo_autora`, `Meno_autora`, `Priezvisko_autora`) VALUES
(0001, 'Jacob', 'Grimm'),
(0002, 'Božena', 'Němcová'),
(0003, 'Milan', 'Brož'),
(0004, 'Jozef', 'Hvorecký'),
(0006, 'Gregory', 'O\'Hara'),
(0007, 'jozef', 'mak');

-- --------------------------------------------------------

--
-- Table structure for table `citatel`
--

DROP TABLE IF EXISTS `citatel`;
CREATE TABLE IF NOT EXISTS `citatel` (
  `Cislo_citatela` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Číslo čitateľa',
  `Rodne_cislo` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Rodné číslo',
  `Meno_citatela` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Meno čitateľa',
  `Priezvisko_citatela` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Priezvisko čitateľa',
  `Ulica` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cislo_domu` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Číslo domu',
  `Mesto` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PSC` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'PSČ',
  `Login` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Heslo` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Rola` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Cislo_citatela`),
  UNIQUE KEY `Rodne_cislo` (`Rodne_cislo`),
  UNIQUE KEY `Login` (`Login`),
  KEY `Priezvisko_citatela` (`Priezvisko_citatela`),
  KEY `Rodne_cislo_2` (`Rodne_cislo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `citatel`
--

INSERT INTO `citatel` (`Cislo_citatela`, `Rodne_cislo`, `Meno_citatela`, `Priezvisko_citatela`, `Ulica`, `Cislo_domu`, `Mesto`, `PSC`, `Login`, `Heslo`, `Rola`) VALUES
(0001, '150307/1470', 'Ján', 'Kopecký', 'SNP', '21', 'Horná dolná', '735 35', 'kopecky', 'c4ca4238a0b923820dcc509a6f75849b', 'user'),
(0002, '800955/5474', 'Jarmila', 'Malá', '', '25', 'Stupava', '735 34', 'mala', 'c4ca4238a0b923820dcc509a6f75849b', 'user'),
(0003, '741412/6470', 'Eva', 'Veľka', 'Spálená', '28/2a', 'Horná dolná', '735 35', 'velka', 'c4ca4238a0b923820dcc509a6f75849b', 'user'),
(0004, '741411/6574', 'Ján', 'Kopecký', 'SNP', '21', 'Horná dolná', '735 35', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `exemplar`
--

DROP TABLE IF EXISTS `exemplar`;
CREATE TABLE IF NOT EXISTS `exemplar` (
  `Cislo_exemplara` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `Datum_zaobstarania` date NOT NULL,
  `Kniha` int(5) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`Cislo_exemplara`),
  KEY `Cislo_zaznamu` (`Kniha`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exemplar`
--

INSERT INTO `exemplar` (`Cislo_exemplara`, `Datum_zaobstarania`, `Kniha`) VALUES
(00001, '2021-12-16', 00001),
(00002, '2021-12-16', 00001),
(00003, '2021-12-16', 00002),
(00004, '2021-12-16', 00002),
(00005, '2021-12-16', 00004),
(00006, '2021-12-16', 00005),
(00007, '2021-12-16', 00005),
(00008, '2021-12-16', 00006),
(00009, '2021-12-16', 00007),
(00010, '2021-12-16', 00007),
(00011, '2021-12-16', 00008),
(00012, '2021-12-16', 00008),
(00013, '2021-12-16', 00009),
(00014, '2021-12-16', 00009),
(00015, '2021-12-16', 00009),
(00016, '2021-12-16', 00010),
(00017, '2021-12-16', 00010),
(00018, '2021-12-16', 00010);

-- --------------------------------------------------------

--
-- Table structure for table `kniha`
--

DROP TABLE IF EXISTS `kniha`;
CREATE TABLE IF NOT EXISTS `kniha` (
  `Cislo_zaznamu` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `Nazov_knihy` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Popis_knihy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Zaner` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Autor` int(4) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`Cislo_zaznamu`),
  KEY `Nazov_knihy` (`Nazov_knihy`),
  KEY `Autor` (`Autor`),
  KEY `Zaner` (`Zaner`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kniha`
--

INSERT INTO `kniha` (`Cislo_zaznamu`, `Nazov_knihy`, `Popis_knihy`, `Zaner`, `Autor`) VALUES
(00001, 'Rozprávky bratov Grimmovcov ', 'Bratia Jacob a Wilhelm Grimmovci sa preslávili najmä zbieraním rozprávok. Na najkrajších a najznámejších z nich vyrastali už celé generácie pred nami a čítajú si ich aj dnešné deti. Niektoré sú poučné, v iných sa skrýva ľudová múdrosť a ďalšie neváhajú pretlmočiť reč zvierat do jazyka ľudí. Nasledovníci Grimmovcov zahrnuli opakujúce sa motívy ich rozprávok do vlastných príbehov, preto sa šikovnosť slabšieho, víťazstvo dobra nad zlom či triumf rozumu nad silou už celé stáročia znova a znova objavujú v príbehoch o nekonečnej túžbe po láske, mladosti, dobrote a spravodlivosti. Táto knižka obsahuje výber dvadsiatich ôsmich rozprávok bratov Grimmovcov, ktoré môžu zohrať dôležitú úlohu nielen v rozvoji umeleckého cítenia detí, ale aj v ich príprave na život.', 'rozprávka', 0001),
(00002, 'Microsoft Excel 2003', 'Excel je dnes už neodmysliteľnou výbavou každého užívateľského počítača, podobne ako napríklad textový procesor Word. Podrobná príručka od jedného z najskúsenejších autorov príručiek a sprievodcov ku kancelárskym programom na trhu vás zoznámi so všetkými dôležitými nástrojmi a možnosťami Excelu 2003 a naučí vás všetko, čo potrebujete pre jeho využitie v každodennej kancelárskej alebo súkromnej praxi. ', 'IT', 0003),
(00003, 'Microsoft Office Excel 2007', 'Podrobná príručka od jedného z najväčších znalcov Excelu Vás naučí vytvárať profesionálne vyzerajúce tabuľky a grafy spôsobom, ktorý výrazne uľahčí Vašu prácu. ', 'IT', 0003),
(00004, 'Microsoft Excel 2007/2010', 'Potřebujete pouze jeden kompletní zdroj informací, s jehož pomocí zvládnete v Excelu jakoukoli funkci, budete umět perfektně pracovat se vzorci, statisticky zpracovávat data, vytvářet výpočetní modely nebo si definovat vlastní funkce? Díky mnoha příkladům, postupům, námětům a poznatkům z praxe dokážete po přečtení tohoto průvodce využít funkce a vzorce Excelu k praktickým účelům a pomocí výpočtů s nimi budete umět to, co se dříve zdálo jako nemožné nebo příliš složité. Informace zmíněné v knize jsou navíc platné nejen pro Excel verze 2010, ale také pro starší verzi 2007. ', 'IT', 0003),
(00005, 'Mistrovství v Microsoft Excel 2000', ' V prvních čtyřech kapitolách se seznámíte s novinkami Excelu 2000, problematikou kompatibility s předchozími verzemi, širokou paletou jeho ovládání a různými technikami práce s tabulkami, listy a soubory. \r\n Pátá kapitola je věnována vytváření grafů pro různé typy tabulek a prozrazuje desítky specialit pro jejich správné využití. ', 'IT', 0003),
(00006, 'Databázové technológie (Podporný učebný materiál)', 'Publikácia nadväzuje na učebnicu Jozefa Hvoreckého – Databázové technológie. Zatiaľ čo učebnica obsahuje teóriu, tu nájdete praktické zadania. Ich úspešné vyriešenie na jednej strane vyžaduje znalosť teórie a postupov riešenia, ktoré sú podrobne opísané v učebnici, avšak všetky zadania sú formulované tak, aby poznatky z učebnice postačovali na ich vyriešenie. Na druhej strane, tak, ako sa nedá naučiť bicyklovať bez bicykla, databázové aplikácie sa nedajú pochopiť bez riešenia zadaní na počítači a bez overovania ich správnosti. Len tak získajú teoretické poznatky pevný základ, na ktorom vydržia dostatočne dlho', 'IT', 0004),
(00007, 'Databázové technológie', 'Učebnica vysvetľuje základné pojmy, zaoberá sa základnými zdrojmi údajov – tabuľkami, spracovávaním údajov pomocou dotazov, ako aj vzájomnými súvislosťami medzi údajmi, až po spájanie predtým rozdelených tabuliek do väčších celkov a vytváranie zložitých databázových aplikácií. Vysvetľuje, ako konkrétne postupovať pri riešení v programe Microsoft Access verzia 2010. Jej cieľom je ukázať všetky prvky, ktorých kombináciami vznikajú moderné databázy. Je určená jednak programátorom (vysvetľuje, ako organizácie využívajú a spracúvajú dáta), ale aj používateľom (naznačuje, ako sa údaje v počítači uchovávajú a ako ich z neho získať). Podobne ako plávanie alebo hra na klavíri, aj tvorba databázových aplikácií je činnosť, ktorá sa nedá naučiť iba čítaním. Riešiť problémy na počítači, trpezlivo opakovať každý krok a odhaľovať vlastné chyby je najlepšia cesta k poznaniu. K učebnici preto vychádza aj zbierka zadaní.', 'IT', 0004),
(00008, 'Virtuálna trieda', 'Všetci autori pôsobia na Vysokej škole manažmentu v Trenčíne/City University of Seattle, ktorá je priekopníkom a lídrom v oblasti online vzdelávania na Slovensku. S mnohými svojimi študentmi sa stretávajú častejšie na internete ako v realite.', 'IT', 0004),
(00009, 'Testament vedca', 'Prečo sa nositeľ Nobelovej ceny nemôže stať profesorom na slovenskej univerzite? Vládne školstvu solidarita neschopných? Prečo zlyhali všetky porevolučné reformy vzdelávania? Autor nielen kritizuje, ale akademickej obci a širokej verejnosti navrhuje rýchle, efektívne a úsporné riešenia.', 'fantázia', 0004),
(00010, 'Moje rozprávky', 'Výber najkrajších rozprávok Boženy Němcovej, K. J. Erbena, Bratov Grimmovcov a Charlesa Perraulta s pôvabnými ilustráciami známej českej ilustrátorky Eleny Zmatlíkovej.', 'rozprávka', 0002),
(00011, 'Skusobnynazov123', 'Snad to pojde', 'komédia', 0003),
(00012, 'lol', 'lol', 'komédia', 0001);

-- --------------------------------------------------------

--
-- Table structure for table `polozka`
--

DROP TABLE IF EXISTS `polozka`;
CREATE TABLE IF NOT EXISTS `polozka` (
  `Cislo` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `Datum_vratenia` date NOT NULL,
  `Vypozicka` int(6) UNSIGNED ZEROFILL NOT NULL,
  `Exemplar` int(5) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`Cislo`),
  KEY `Vypozicka` (`Vypozicka`),
  KEY `exemplar_ind` (`Exemplar`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `polozka`
--

INSERT INTO `polozka` (`Cislo`, `Datum_vratenia`, `Vypozicka`, `Exemplar`) VALUES
(0000001, '2021-12-16', 000001, 00001),
(0000002, '2021-12-16', 000002, 00012),
(0000003, '2021-12-16', 000002, 00015),
(0000004, '2021-12-16', 000003, 00003),
(0000006, '2021-12-16', 000003, 00005),
(0000007, '2021-12-16', 000003, 00007),
(0000013, '2021-12-16', 000012, 00008),
(0000015, '2021-12-16', 000014, 00006),
(0000016, '2021-12-16', 000015, 00004),
(0000022, '2021-12-16', 000022, 00011),
(0000024, '2021-12-16', 000024, 00009);

-- --------------------------------------------------------

--
-- Table structure for table `vypozicka`
--

DROP TABLE IF EXISTS `vypozicka`;
CREATE TABLE IF NOT EXISTS `vypozicka` (
  `Cislo_vypozicky` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `Datum_vypozicky` date NOT NULL,
  `Citatel` int(4) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`Cislo_vypozicky`),
  KEY `Citatel` (`Citatel`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vypozicka`
--

INSERT INTO `vypozicka` (`Cislo_vypozicky`, `Datum_vypozicky`, `Citatel`) VALUES
(000001, '2021-12-09', 0001),
(000002, '2021-12-09', 0001),
(000003, '2021-12-09', 0003),
(000012, '2021-12-09', 0001),
(000014, '2021-12-09', 0001),
(000015, '2021-12-09', 0001),
(000022, '2021-12-09', 0004),
(000024, '2021-12-09', 0002);

-- --------------------------------------------------------

--
-- Table structure for table `zaner_knihy`
--

DROP TABLE IF EXISTS `zaner_knihy`;
CREATE TABLE IF NOT EXISTS `zaner_knihy` (
  `Nazov_zanru` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Popis_zanru` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Nazov_zanru`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zaner_knihy`
--

INSERT INTO `zaner_knihy` (`Nazov_zanru`, `Popis_zanru`) VALUES
('fantázia', 'knihy a poviedky o nadprirodzených javoch'),
('IT', 'počítače, Internet, programovanie'),
('komédia', 'úsmevné príbehy poviedky'),
('krimi', 'kriminálne príbehy a poviedky s tajomnou zápletkou'),
('krimikomédia ', 'úsmevné príbehy s kriminálnou zápletkou'),
('poézia', 'básnické zbierky'),
('rozprávka', 'rozprávkové príbehy, poviedky a báchorky');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exemplar`
--
ALTER TABLE `exemplar`
  ADD CONSTRAINT `exemplar_ibfk_1` FOREIGN KEY (`Kniha`) REFERENCES `kniha` (`Cislo_zaznamu`);

--
-- Constraints for table `kniha`
--
ALTER TABLE `kniha`
  ADD CONSTRAINT `kniha_ibfk_1` FOREIGN KEY (`Autor`) REFERENCES `autor` (`Cislo_autora`),
  ADD CONSTRAINT `kniha_ibfk_2` FOREIGN KEY (`Zaner`) REFERENCES `zaner_knihy` (`Nazov_zanru`);

--
-- Constraints for table `polozka`
--
ALTER TABLE `polozka`
  ADD CONSTRAINT `polozka_ibfk_1` FOREIGN KEY (`Vypozicka`) REFERENCES `vypozicka` (`Cislo_vypozicky`),
  ADD CONSTRAINT `polozka_ibfk_2` FOREIGN KEY (`Exemplar`) REFERENCES `exemplar` (`Cislo_exemplara`);

--
-- Constraints for table `vypozicka`
--
ALTER TABLE `vypozicka`
  ADD CONSTRAINT `vypozicka_ibfk_1` FOREIGN KEY (`Citatel`) REFERENCES `citatel` (`Cislo_citatela`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

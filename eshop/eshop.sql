-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2022 at 06:23 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--
CREATE DATABASE IF NOT EXISTS `eshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `eshop`;

-- --------------------------------------------------------

--
-- Table structure for table `kategoria`
--

DROP TABLE IF EXISTS `kategoria`;
CREATE TABLE IF NOT EXISTS `kategoria` (
  `nazov_kategorie` varchar(10) NOT NULL,
  PRIMARY KEY (`nazov_kategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoria`
--

INSERT INTO `kategoria` (`nazov_kategorie`) VALUES
('Elektro'),
('Hobby'),
('Nábytok'),
('Oblečenie');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `cislo_objednavky` int(4) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `zakaznik` int(4) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`cislo_objednavky`),
  KEY `zakaznik` (`zakaznik`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`cislo_objednavky`, `datum`, `zakaznik`) VALUES
(6, '2022-02-09', 0015),
(7, '2022-02-09', 0015),
(8, '2022-02-09', 0015),
(9, '2022-02-09', 0015),
(10, '2022-02-09', 0016),
(11, '2022-02-09', 0016),
(12, '2022-02-09', 0017),
(13, '2022-02-10', 0017),
(14, '2022-02-10', 0017),
(15, '2022-02-10', 0017),
(16, '2021-01-01', 0015),
(17, '2020-01-01', 0015),
(18, '2022-02-10', 0015),
(19, '2022-02-10', 0015),
(20, '2022-02-10', 0001),
(21, '2022-02-10', 0001),
(22, '2022-02-10', 0001),
(23, '2022-02-10', 0001),
(24, '2022-02-10', 0001);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

DROP TABLE IF EXISTS `order_list`;
CREATE TABLE IF NOT EXISTS `order_list` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `order` int(5) NOT NULL,
  `polozka` int(4) UNSIGNED ZEROFILL NOT NULL,
  `pocet` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tovar` (`polozka`),
  KEY `order` (`order`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `order`, `polozka`, `pocet`) VALUES
(2, 6, 0009, 2),
(3, 6, 0010, 1),
(4, 7, 0011, 1),
(5, 7, 0014, 2),
(6, 7, 0012, 3),
(7, 7, 0016, 4),
(8, 8, 0011, 2),
(9, 8, 0011, 2),
(10, 9, 0010, 1),
(11, 9, 0001, 1),
(12, 9, 0015, 2),
(13, 9, 0014, 3),
(14, 10, 0009, 3),
(15, 10, 0008, 3),
(16, 11, 0009, 1),
(17, 11, 0008, 1),
(18, 11, 0012, 2),
(19, 11, 0014, 3),
(20, 11, 0016, 1),
(21, 12, 0008, 1),
(22, 12, 0012, 2),
(23, 12, 0015, 4),
(24, 13, 0009, 1),
(25, 13, 0008, 1),
(26, 13, 0010, 1),
(27, 14, 0013, 1),
(28, 14, 0015, 2),
(29, 14, 0016, 2),
(30, 15, 0010, 1),
(31, 16, 0010, 1),
(32, 17, 0016, 2),
(33, 18, 0001, 2),
(34, 19, 0009, 1),
(35, 20, 0014, 1),
(36, 21, 0015, 1),
(37, 22, 0001, 1),
(38, 22, 0010, 1),
(39, 22, 0012, 2),
(40, 22, 0014, 3),
(41, 22, 0016, 2),
(42, 23, 0014, 3),
(43, 23, 0015, 2),
(44, 23, 0016, 2),
(45, 24, 0001, 1),
(46, 24, 0011, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tovar`
--

DROP TABLE IF EXISTS `tovar`;
CREATE TABLE IF NOT EXISTS `tovar` (
  `cislo_tovaru` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nazov` varchar(50) NOT NULL,
  `opis` text NOT NULL,
  `kategoria` varchar(10) NOT NULL,
  `cena` int(4) NOT NULL,
  PRIMARY KEY (`cislo_tovaru`),
  KEY `kategoria` (`kategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tovar`
--

INSERT INTO `tovar` (`cislo_tovaru`, `nazov`, `opis`, `kategoria`, `cena`) VALUES
(0001, 'Mac mini M1 2020', 'Mini PC Apple M1, Apple M1 8-jadrová GPU, RAM 16GB, SSD 256GB, bez mechaniky, HDMI, 2×USB 3.2, typ skrine: Micro Tower, macOS', 'Elektro', 1000),
(0008, 'Xiaomi Redmi 9C 64GB', 'Mobilný telefón – 6.53\" IPS 1600 × 720, procesor MediaTek Helio G35 8-jadrový, RAM 3GB, interná pamäť 64GB, MicroSD až 512 GB, zadný fotoaparát 13Mpx (f/2.2)+2Mpx (f/2.4), predný fotoaparát 5Mpx, GPS, IrDA, NFC, LTE, Jack (3.5mm) a USB micro, čítačka odtlačkov prstov, dual SIM + pamäťová karta, neblokovaný, batéria 5000mAh, Android 10', 'Elektro', 135),
(0009, 'Nikon D5600', 'Digitálny fotoaparát – zrkadlovka, APS-C, CMOS 24.2Mpx, EXPEED 4, bajonet Nikon F, 3.2\" výklopný displej, Full HD video, HDR, SD/SDHC/SDXC, optický hľadáčik, Wifi, Bluetooth, HDMI, USB, NFC, sekvenčné snímanie 5 sn./s', 'Elektro', 670),
(0010, 'Fender Squier Affinity Series Stratocaster', 'Tento Strat sa vyznačuje niekoľkými \"user-friendly\" vylepšeniami, ako je tenké a ľahké telo, tenký a pohodlný profil krku v tvare „C“, 2-bodová tremolo kobylka pre vynikajúcu akciu tremola a zapečatené die-cast ladiace mechaniky s delenými hriadeľmi pre hladký chod, presné vyladenie a ľahké prestrunenie. Tento model, nabitý trojicou jednocievkových Strat snímačov od spoločnosti Squier s 5-smerným prepínačom snímačov pre zvukovú rozmanitosť, ktorá definuje žáner, je pripravený sprevádzať každého hráča v ktorejkoľvek fáze.', 'Hobby', 230),
(0011, 'GT Avalanche Elite', 'Pre začínajúcich horských cyklistov, ktorí chcú mať svoju jazdu pod kontrolou a ktorá sa bude prispôsobovať rozvoju ich schopností. Avalanche Elite má odpruženú vidlicu SR Suntour XCR-RL a radiace páky microSHIFT M851.', 'Hobby', 1100),
(0012, 'Kreslo Pello', 'Pohodlné kreslo PELLO sa hodí kamkoľvek do domácnosti. Poskytuje oporu chrbtu a má mierne odolný rám.', 'Nábytok', 55),
(0013, 'Posteľ Malm', 'V dvoch zásuvkách pod posteľou sa skrýva bohatý úložný priestor. Hodí sa na paplóny, vankúše a posteľnú bielizeň. Úložné škatule vďaka kolieskam na základni jednoducho vytiahnete. Čistý dizajn s drevenou dyhou z každej strany. Môžete ju postaviť voľne alebo oprieť čelom k stene. Môžete tiež pridať úložné diely, ktoré sa vďaka kolieskam ľahko vyťahujú.', 'Nábytok', 400),
(0014, 'Košeľa', 'Košeľa z oxfordskej bavlnenej tkaniny s golierom s gombíkmi, klasickým zapínaním, sedlom na chrbte a otvoreným náprsným vreckom. Dlhé rukávy s gombíkom na manžetách a rozparkom s gombíkom. Mierne zaoblený spodný lem. Regular Fit – klasický strih s dostatkom miesta na pohyb a mierne zúženým pásom pre pohodlnú, jemne priliehavú siluetu.', 'Oblečenie', 20),
(0015, 'Nohavice', 'Oblekové nohavice z tkanej látky so zapínaním na zips a gombík a háčik z vnútornej strany pása. Šikmé bočné vrecká, spevnené zadné vrecká a puky. Regular Fit – klasický strih s dostatkom miesta na pohyb v oblasti stehien a kolien, ktorý vytvára pohodlnú, rovnú siluetu.', 'Oblečenie', 30),
(0016, 'Tenisky', 'Šnurovacie tenisky s vatovaným horným okrajom. Podšívka aj stielka zo sieťoviny a gumená podrážka.', 'Oblečenie', 25);

-- --------------------------------------------------------

--
-- Table structure for table `zakaznik`
--

DROP TABLE IF EXISTS `zakaznik`;
CREATE TABLE IF NOT EXISTS `zakaznik` (
  `cislo_zakaznika` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `meno` varchar(10) NOT NULL,
  `priezvisko` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefon` int(15) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `heslo` varchar(50) NOT NULL,
  `rola` varchar(5) NOT NULL,
  PRIMARY KEY (`cislo_zakaznika`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zakaznik`
--

INSERT INTO `zakaznik` (`cislo_zakaznika`, `meno`, `priezvisko`, `email`, `telefon`, `login`, `heslo`, `rola`) VALUES
(0001, 'Jan', 'Novak', 'jan.novak@gmail.com', 908090809, 'novak', '202cb962ac59075b964b07152d234b70', 'user'),
(0002, 'Matej', 'Mak', 'matej.mak@gmail.com', NULL, 'mak', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(0015, 'Admin', 'Admin', 'admin@gmail.com', NULL, '9', '45c48cce2e2d7fbdea1afc51c7c6ad26', 'admin'),
(0016, 'Meno', 'Priezvisko', 'test1@gmail.com', 951381305, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'user'),
(0017, 'Ivan', 'Kováč', 'kovac@email.com', 684623152, 'kovac', '202cb962ac59075b964b07152d234b70', 'user'),
(0018, 'Ivan', 'Botto', 'botto@email.com', NULL, 'botto', '202cb962ac59075b964b07152d234b70', 'user'),
(0019, 'Juraj', 'Novák', 'novak@email.com', 654315843, 'novak1', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`zakaznik`) REFERENCES `zakaznik` (`cislo_zakaznika`);

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `order_list_ibfk_1` FOREIGN KEY (`order`) REFERENCES `orders` (`cislo_objednavky`),
  ADD CONSTRAINT `order_list_ibfk_2` FOREIGN KEY (`polozka`) REFERENCES `tovar` (`cislo_tovaru`);

--
-- Constraints for table `tovar`
--
ALTER TABLE `tovar`
  ADD CONSTRAINT `tovar_ibfk_1` FOREIGN KEY (`kategoria`) REFERENCES `kategoria` (`nazov_kategorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

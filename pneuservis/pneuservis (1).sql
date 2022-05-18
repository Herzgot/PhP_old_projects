-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 13, 2022 at 10:34 PM
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
-- Database: `pneuservis`
--

-- --------------------------------------------------------

--
-- Table structure for table `servis_udaje`
--

DROP TABLE IF EXISTS `servis_udaje`;
CREATE TABLE IF NOT EXISTS `servis_udaje` (
  `kategoria_vozidla` varchar(50) CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
  `pneumatiky` varchar(20) CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
  `spz` varchar(8) NOT NULL,
  `krajina` varchar(30) CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
  `psc` varchar(8) NOT NULL,
  `mesto` varchar(20) CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
  `ulica` varchar(50) CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
  `telefon` varchar(14) NOT NULL,
  `termin` varchar(8) NOT NULL,
  PRIMARY KEY (`termin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `servis_udaje`
--

INSERT INTO `servis_udaje` (`kategoria_vozidla`, `pneumatiky`, `spz`, `krajina`, `psc`, `mesto`, `ulica`, `telefon`, `termin`) VALUES
('motorka (cena 20 Euro)', 'ANO = 50', '', 'bhbhABXIU', '48451', 'DADASD', 'AADSAD', '0659515', '1011'),
('motorka (cena 20 Euro)', 'ANO = 50', 'ba11586', 'bhbhABXIU', '48451', 'DADASD', 'dasd', '0659515', '28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

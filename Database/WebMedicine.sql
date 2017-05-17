-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2017 at 01:51 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webmedicine`
--
CREATE DATABASE IF NOT EXISTS `webmedicine` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `webmedicine`;

-- --------------------------------------------------------

--
-- Table structure for table `chemmed`
--

DROP TABLE IF EXISTS `chemmed`;
CREATE TABLE IF NOT EXISTS `chemmed` (
  `SrNo` int(10) NOT NULL AUTO_INCREMENT,
  `MedName` varchar(40) NOT NULL,
  `ChemName` varchar(40) NOT NULL,
  `Priority` int(2) NOT NULL,
  PRIMARY KEY (`SrNo`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chemmed`
--

INSERT INTO `chemmed` (`SrNo`, `MedName`, `ChemName`, `Priority`) VALUES
(1, 'COMPLERA', 'Emtricitabine', 1),
(2, 'COMPLERA ', 'Rilpivirine', 2),
(3, 'COMPLERA ', 'Tenofovir Disoproxil Fumarate', 3),
(4, 'AFINITOR ', 'Hypromellose', 4),
(5, 'AFINITOR ', 'Mannitol', 5),
(6, 'AFINITOR ', 'Butylated Hydroxytoluene', 1),
(7, 'AFINITOR ', 'Colloidal Silicon Dioxide', 2),
(8, 'AFINITOR ', 'Crospovidone', 3),
(9, 'ARANESP ', 'Polysorbate ', 1),
(10, 'ARANESP ', 'Sodium chloride', 2),
(18, 'Medicine 1', 'Chemical 1', 4),
(17, 'Test Med', 'Rilpivirine', 1),
(16, 'Test Med', 'Emtricitabine', 2),
(15, 'Test Med', 'Tenofovir Disoproxil Fumarate', 3),
(19, 'Medicine 1', 'Chemical 2', 1),
(20, 'Medicine 1', 'Chemical 3', 3),
(21, 'Medicine 1', 'Chemical 4', 2),
(22, 'Medicine 2', 'Chemical 2', 3),
(23, 'Medicine 2', 'Chemical 5', 1),
(24, 'Medicine 2', 'Chemical 6', 2),
(25, 'Medicine 3', 'Chemical 1', 1),
(26, 'Medicine 3', 'Chemical 2', 2),
(27, 'Medicine 3', 'Chemical 3', 3),
(28, 'Medicine 3', 'Chemical 4', 4),
(29, 'Medicine 4', 'Chemical 7', 1),
(30, 'Medicine 4', 'Chemical 8', 2),
(31, 'Medicine 5', 'Chemical 9', 1),
(32, 'Medicine 5', 'Chemical 6', 2),
(33, 'Medicine 5', 'Chemical 7', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

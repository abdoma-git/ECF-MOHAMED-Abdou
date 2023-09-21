-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2023 at 07:27 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cours`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `j1` int NOT NULL,
  `j2` int NOT NULL,
  `j3` int NOT NULL,
  `j4` int NOT NULL,
  `j5` int NOT NULL,
  `j6` int NOT NULL,
  `j7` int NOT NULL,
  `j8` int NOT NULL,
  `j9` int NOT NULL,
  `j10` int NOT NULL,
  `j11` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipe`
--

INSERT INTO `equipe` (`id`, `nom`, `pays`, `j1`, `j2`, `j3`, `j4`, `j5`, `j6`, `j7`, `j8`, `j9`, `j10`, `j11`) VALUES
(1, 'LOS ANGELES', 'USA', 15, 4, 4, 3, 6, 2, 4, 3, 1, 1, 1),
(2, 'React', 'USA', 19, 1, 2, 4, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `numero` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `joueur`
--

INSERT INTO `joueur` (`id`, `nom`, `prenom`, `numero`) VALUES
(1, 'yassine', 'bouno', '1'),
(2, 'ayoub', 'ziach', '2'),
(3, 'john', 'doe', '3'),
(4, 'jane', 'smith', '4'),
(5, 'michael', 'brown', '5'),
(6, 'sarah', 'wilson', '6'),
(7, 'david', 'martinez', '7'),
(8, 'emily', 'johnson', '8'),
(9, 'william', 'jones', '9'),
(10, 'olivia', 'brown', '10'),
(11, 'james', 'davis', '11'),
(12, 'emma', 'lee', '12'),
(13, 'benjamin', 'harris', '13'),
(14, 'ava', 'miller', '14'),
(15, 'daniel', 'moore', '15'),
(16, 'chloe', 'walker', '16'),
(17, 'matthew', 'rodriguez', '17'),
(18, 'mia', 'gonzalez', '18'),
(19, 'joseph', 'lopez', '19'),
(20, 'sophia', 'perez', '20'),
(21, 'andrew', 'taylor', '21'),
(22, 'grace', 'campbell', '22');

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

DROP TABLE IF EXISTS `match`;
CREATE TABLE IF NOT EXISTS `match` (
  `id` int NOT NULL AUTO_INCREMENT,
  `team1` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `team2` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `score1` int NOT NULL DEFAULT '0',
  `score2` int NOT NULL DEFAULT '0',
  `match_day` date NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time DEFAULT NULL,
  `meteo` varchar(10) NOT NULL,
  `cote1` float NOT NULL,
  `cote2` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `match`
--

INSERT INTO `match` (`id`, `team1`, `team2`, `score1`, `score2`, `match_day`, `status`, `heure_debut`, `heure_fin`, `meteo`, `cote1`, `cote2`) VALUES
(1, 'Cincinnati Bengals', 'Los Angeles Rams', 12, 10, '2023-09-29', 'Termine', '09:25:50', '17:25:50', 'Nuageux', 2, 4),
(3, '1', '2', 0, 0, '2023-01-03', 'En attente', '00:01:00', NULL, 'Cloud', 0.09, 0.09);

-- --------------------------------------------------------

--
-- Table structure for table `pairs`
--

DROP TABLE IF EXISTS `pairs`;
CREATE TABLE IF NOT EXISTS `pairs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `pwd` text NOT NULL,
  `role` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pairs`
--

INSERT INTO `pairs` (`id`, `Nom`, `Prenom`, `username`, `Email`, `pwd`, `role`) VALUES
(2, 'Ali', 'Ahmed', 'Ali Ahmed', 'ali@gmail.com', 'f5a8139e8b185c74a4e7273824e84481', 0),
(3, 'Ayoub', 'Amine', 'Ayoub Amine', 'ayoub@gmail.com', 'f5a8139e8b185c74a4e7273824e84481', 0),
(4, 'hola', 'hola', 'hola hola', 'hola@gmail.com', 'f5a8139e8b185c74a4e7273824e84481', 0),
(20, 'admin', 'admin', 'admin', 'admin@gmail.com', 'f5a8139e8b185c74a4e7273824e84481', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 07 mai 2018 à 21:55
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gym`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_no` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `home_tel` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_no`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`admin_no`, `first_name`, `last_name`, `password`, `date_of_birth`, `gender`, `mobile`, `home_tel`, `email`, `address`) VALUES
(1, 'Adrien', 'TRAN', 'troll', '1997-08-21', 'Male', '0610991459', '0610991459', 'tran.adri3n@outlook.fr', '66 rue boissière'),
(2, 'toto', 'charles', 'toto', '1997-08-21', 'Male', '498651', '02126987465', 'qshjd@outlook.fr', '4566 qsdqsd 45'),
(3, 'qsdnlkqsdnlk', 'qjnsdjnkqsnkdj', 'jolu', '1997-08-21', 'Male', '946294', '4562316', 'bkbqsd@outlook.fr', 'qsdnjdqs 56q qd');

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `member_no` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `home_tel` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `inscription_date` date DEFAULT NULL,
  `yoga` int(11) DEFAULT '0',
  `zumba` int(11) DEFAULT '0',
  `fitness` int(11) DEFAULT '0',
  `step` int(11) DEFAULT '0',
  `family` int(11) DEFAULT '0',
  `offer` int(11) DEFAULT '0',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`member_no`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `news_no` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(30) NOT NULL,
  `text` varchar(500) DEFAULT NULL,
  `picloc` varchar(30) DEFAULT NULL,
  `news_date` datetime DEFAULT NULL,
  PRIMARY KEY (`news_no`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`news_no`, `Title`, `text`, `picloc`, `news_date`) VALUES
(8, 'trdfgyhujkl', 'qsdfghjk', 'pic/trdfgyhujkl.jpg', '2018-05-07 16:16:00');

-- --------------------------------------------------------

--
-- Structure de la table `not_member`
--

DROP TABLE IF EXISTS `not_member`;
CREATE TABLE IF NOT EXISTS `not_member` (
  `email` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `yoga` int(11) DEFAULT '0',
  `zumba` int(11) DEFAULT '0',
  `fitness` int(11) DEFAULT '0',
  `step` int(11) DEFAULT '0',
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `not_member`
--

INSERT INTO `not_member` (`email`, `first_name`, `last_name`, `mobile`, `yoga`, `zumba`, `fitness`, `step`) VALUES
('bonjour@outlook.fr', 'bonjour', 'yolo', '5468941', 0, 1, 1, 0),
('hjkl@outlook.fr', 'adrien', 'tran', '789465123', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `quires`
--

DROP TABLE IF EXISTS `quires`;
CREATE TABLE IF NOT EXISTS `quires` (
  `email` varchar(50) DEFAULT NULL,
  `quires_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `quires`
--

INSERT INTO `quires` (`email`, `quires_date`) VALUES
('tran.adri3n@outlook.fr', '2018-05-07 18:55:46'),
('tran.adri3n@outlook.fr', '2018-05-07 18:55:47'),
('tran.adri3n@outlook.fr', '2018-05-07 18:55:48'),
('tran.adri3n@outlook.fr', '2018-05-07 18:55:48');

-- --------------------------------------------------------

--
-- Structure de la table `staf`
--

DROP TABLE IF EXISTS `staf`;
CREATE TABLE IF NOT EXISTS `staf` (
  `staf_no` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `home_tel` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`staf_no`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `staf`
--

INSERT INTO `staf` (`staf_no`, `first_name`, `last_name`, `password`, `date_of_birth`, `gender`, `mobile`, `home_tel`, `email`, `address`, `end_date`) VALUES
(2, 'bonjour', 'bonjour', 'bonjour', '1997-08-21', 'Male', '789465132', '978456132', 'bonjour@outlook.fr', '564 sqds 654', '1997-08-21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

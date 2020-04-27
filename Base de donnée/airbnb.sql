-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 27 avr. 2020 à 09:39
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `airbnb`
--

-- --------------------------------------------------------

--
-- Structure de la table `announce`
--

DROP TABLE IF EXISTS `announce`;
CREATE TABLE IF NOT EXISTS `announce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Titles` varchar(100) DEFAULT NULL,
  `Descriptions` varchar(800) DEFAULT NULL,
  `Pictures` varchar(100) DEFAULT NULL,
  `PlaceAvailable` int(11) NOT NULL,
  `Adresse` varchar(250) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `UserId` (`UserId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `announce`
--

INSERT INTO `announce` (`id`, `Titles`, `Descriptions`, `Pictures`, `PlaceAvailable`, `Adresse`, `Price`, `StartDate`, `EndDate`, `UserId`) VALUES
(1, 'Loft Parisien', NULL, NULL, 4, 'Paris', NULL, '2020-01-01', '2020-01-07', 1),
(2, 'Maison bourgeoise', NULL, NULL, 2, 'Lyon', NULL, '2020-03-24', '2020-03-28', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `idReservation` int(11) DEFAULT NULL,
  `commentaire` text,
  `note` tinyint(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idReservation` (`idReservation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `PricePerNight` int(11) DEFAULT NULL,
  `NumberOfPersons` int(11) DEFAULT NULL,
  `TotalAmount` int(11) DEFAULT NULL,
  `AnnounceId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `AnnounceId` (`AnnounceId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `ProfilPicture` varchar(100) DEFAULT NULL,
  `CreditAccount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `UserName`, `Email`, `Password`, `FirstName`, `LastName`, `ProfilPicture`, `CreditAccount`) VALUES
(8, 'JHer', 'Hermano@gmail.com', '$2y$12$l0MV3O4UcRwIn0VVODl5oO7UCI4QMvWAwBaRloTCqeRiv0MLzrqE.', 'Julia', 'Hermano', NULL, NULL),
(1, 'Berni', 'Lopez.Bernard@gmail.com', '$2y$12$3WwslZYhEIz4oBP0U5MNI.jFsvpF5xljkMq.S/GMWERwq0JbOlCFO', 'Bernard', 'Lopez ', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

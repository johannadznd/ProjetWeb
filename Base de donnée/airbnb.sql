-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 29 mai 2020 à 10:15
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
CREATE DATABASE IF NOT EXISTS `airbnb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `airbnb`;

-- --------------------------------------------------------

--
-- Structure de la table `announce`
--

DROP TABLE IF EXISTS `announce`;
CREATE TABLE IF NOT EXISTS `announce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Titles` varchar(100) DEFAULT NULL,
  `Descriptions` varchar(800) DEFAULT NULL,
  `Pictures` varchar(255) DEFAULT NULL,
  `PlaceAvailable` int(11) DEFAULT NULL,
  `Adresse` varchar(250) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `UserId` (`UserId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `announce`
--

INSERT INTO `announce` (`id`, `Titles`, `Descriptions`, `Pictures`, `PlaceAvailable`, `Adresse`, `Price`, `StartDate`, `EndDate`, `UserId`, `map`) VALUES
(1, 'Loft Parisien', 'Magnifique loft avec vue sur la tour Eiffel\r\n', 'chambre1.jpg', 5, '2 Rue de Buenos Aires, 75007 Paris', 150, '2020-01-01', '2020-01-11', 1, 'https://www.google.com/maps/d/u/0/embed?mid=1_FEeGz6TmvE-DKKvOeTBpHPJJbZ3FZmM'),
(2, 'Maison bourgeoise', 'Jolie maison bourgeoise de 300mÂ² prÃ¨s de Lyon', 'villa1.jpg', 4, 'Ecully 22 Rue BenoÃ®t Tabard', 165, '2020-03-24', '2020-03-28', 2, 'https://www.google.com/maps/d/u/0/embed?mid=1OQdh6TafcUW6FE9yuituDCHVrCS_ASul'),
(3, 'Villa NiÃ§oise', 'Magnifique villa niÃ§oise de 300 mÂ² au bord de la mer mÃ©diterranÃ©e.', 'villa3.jpg', 6, '4 Boulevard Joseph Garnier, 06100 Nice', 300, '2020-08-16', '2020-08-23', 1, 'https://www.google.com/maps/d/u/0/embed?mid=1u-BjRHYIcTfEig4EB3nJZpnrY75MVIK7'),
(10, 'Villa Ã  St tropez', 'Villa prÃ¨s de la mer Ã  St-Tropez', 'villa4.jpg', 6, '30 Avenue Paul Roussel, 83990 Saint-Tropez', 300, '2020-07-01', '2020-08-31', 14, 'https://www.google.com/maps/d/u/0/embed?mid=1is0pqFCObqkZpPV2nyekE_Xa9FUDo-dp');

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `UserName`, `Email`, `Password`, `FirstName`, `LastName`, `ProfilPicture`, `CreditAccount`) VALUES
(2, 'JHer', 'Hermano@gmail.com', '$2y$12$GF6NJGgwSa6N/FJEp32jWeSW6qm0kX.Lm1zoqAPthIdJDwwm2fCyG', 'Julia', 'Hermano', 'pers2.JPG', 350),
(1, 'Berni', 'Bernad.lopez@gmail.com', '$2y$12$01dOuut67hWGGVO8//aVKu7IvQAYPE59nQiL2AIm3Uo2XES841RAy', 'Bernard', 'Lopez', 'pers1.jpg', 200),
(3, 'CÃ©line ', 'Fugere.Celine@gmail.com', '$2y$12$71PetXTt/LjL3Hz76AAzRugqtA1guo0RllTP1uTS.hjM5VtWuS9di', 'CÃ©line ', 'FugÃ¨re', 'pers2.JPG', 400);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

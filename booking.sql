-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 24 fév. 2020 à 12:33
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `booking`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Day` date NOT NULL,
  `Hour` varchar(5) NOT NULL,
  `User_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`Id`, `Day`, `Hour`, `User_Id`) VALUES
(18, '2020-03-07', '20:00', 8),
(17, '0555-05-23', '03:44', 3),
(8, '2020-02-12', '22:22', 3),
(9, '2020-02-01', '23:44', 3),
(10, '2020-02-15', '20:33', 3),
(11, '2020-02-05', '20:11', 3),
(16, '0333-03-31', '03:03', 3),
(15, '3333-03-31', '03:33', 3),
(19, '2020-03-24', '10:00', 8),
(20, '2020-03-30', '08:00', 7),
(21, '2020-05-02', '14:00', 7);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(60) NOT NULL,
  `LastName` varchar(60) NOT NULL,
  `Birthday` date NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Role` varchar(10) NOT NULL,
  `Password` varchar(120) NOT NULL,
  `Adress` varchar(60) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Zip` int(5) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `CreationTimeStamp` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `FirstName`, `LastName`, `Birthday`, `Email`, `Phone`, `Role`, `Password`, `Adress`, `City`, `Zip`, `Country`, `CreationTimeStamp`) VALUES
(4, 'admin', 'admin', '1996-05-03', 'admin@admin.fr', 666666666, 'admin', '$2y$11$335d2d5acddc5335c6f76uzQYr9AtG1zAXsdo9ZJiAXfpYfwZARqK', 'Rue des admin', 'AdminLand', 75000, 'France', '2019-12-27 15:20:53'),
(7, 'Amandine', 'Dupont', '1996-06-26', 'amandine@hotmail.fr', 766665577, 'user', '$2y$11$eef47114b157b2b65fa74OfM7XEYjR0HJh4A4EQgnzs9fT0GcXpDS', '4 Boulevard de Strasbourg', 'Paris', 75001, 'France', '2020-02-24 12:30:45'),
(8, 'Lara', 'Lepain', '1986-09-24', 'lara@hotmail.fr', 666774433, 'user', '$2y$11$0cec0b1146f811c8bb531u10m3jFatyPcf5XwrQQ3KXnvM00DnfV6', '32 Rue Auguste Polissard', 'Paris', 75009, 'France', '2020-02-24 12:32:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

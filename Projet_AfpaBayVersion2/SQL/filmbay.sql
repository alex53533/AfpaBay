-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 02 Juillet 2017 à 22:07
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `filmbay`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(256) NOT NULL,
  `realisateur` varchar(256) NOT NULL,
  `acteurs` varchar(1024) NOT NULL,
  `année` int(255) NOT NULL,
  `lienimage` varchar(256) DEFAULT NULL,
  `IDgenre` int(10) NOT NULL,
  `genre` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `film`
--

INSERT INTO `film` (`ID`, `titre`, `realisateur`, `acteurs`, `année`, `lienimage`, `IDgenre`, `genre`) VALUES
(1, 'Bernie', 'A. Dupontel', 'A. Dupontel', 1996, 'images/Bernie.jpg', 1, 'Comédie'),
(2, 'StarWars', 'Georges Lucas', 'Mark Hamill, Karie Fisher, Harrison Ford', 1977, 'images/Starwars.jpg', 2, 'Fantasy'),
(3, 'Leon', 'Luc Besson', 'Jean Reno, Natalie Portman', 1994, 'images/Leon.jpg', 3, 'Thriller'),
(4, 'Terminator', 'James Cameron', 'Arnold Schwarzenegger, Linda Hamilton', 1984, 'images/Terminator.jpg', 3, 'Thriller'),
(5, 'La Momie', 'Alex Kurtzman', 'Tom Cruise, Sofia Boutella', 2017, 'images/Lamomie.jpg', 3, 'Thriller'),
(6, 'K.O.', 'Fabrice Gobert', 'Laurent Lafitte, Chiara Mastroianni', 2017, 'images/KO.jpg', 4, 'Policier/ Drame'),
(7, 'Avatar', 'James Cameron', 'Zoe Saidana, Sam Worthington', 2009, 'images/Avatar.jpg', 2, 'Fantasy'),
(8, 'Jurassic Park', 'Steven Spielberg', 'Sam Neill, Laura Dern', 1993, 'images/Jurassic Parkjpg', 2, 'Fantasy'),
(10, 'Indiana Jones', 'Steven Spielberg', 'Harrison Ford', 1981, 'images/Indiana Jonesjpg', 2, 'Fantasy'),
(11, 'Psychose', 'A. Hitchcock', 'Anthony Perkins, Janet Leigh', 1960, 'images/Psychosejpg', 4, 'Policier/ Drame');

-- --------------------------------------------------------

--
-- Structure de la table `genre_film`
--

CREATE TABLE IF NOT EXISTS `genre_film` (
  `ID_genre` int(11) NOT NULL,
  `Genre` varchar(256) NOT NULL,
  PRIMARY KEY (`ID_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `genre_film`
--

INSERT INTO `genre_film` (`ID_genre`, `Genre`) VALUES
(1, 'Comédie'),
(2, 'Fantasy'),
(3, 'Thriller'),
(4, 'Policier/ Drame');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `Identifiant` varchar(256) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Age` int(2) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`userID`, `Identifiant`, `Password`, `Age`) VALUES
(1, 'alexandre', '$2y$10$dQV63F/xiuErvCTb1IBebe.vySldw32ZaVEuVb5ra8EkTIQAUbm1a', 29),
(8, 'Guillaume', '$2y$10$Rq2GVutNxyXROAY4LmmOR.gBZQ.44qJCCgQaWCdQpe3nJghkuPAHe', 22),
(9, 'fifi', '$2y$10$nmpcFaUbcrLA3jyLwmbLM.6dtfupsiZpjJ7VK06zmnZDkZpq4pybe', 25),
(10, 'fff', '$2y$10$APfCVQ23hUaAOCcFMgPhG.g9bflPM6mnVUQpSt2YyYa1dKgjpFGHW', 25),
(11, 'ab', '$2y$10$DOhXsRL.0C3xT4eJFvWql.MbxZkKB1xbiOLP8YwgAkuOslBkrf0Pq', 22);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

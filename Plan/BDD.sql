-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 20 oct. 2017 à 14:09
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `howimetyourcve`
--

-- --------------------------------------------------------

--
-- Structure de la table `cve`
--

DROP TABLE IF EXISTS `cve`;
CREATE TABLE IF NOT EXISTS `cve` (
  `idCve` int(11) NOT NULL AUTO_INCREMENT,
  `nomCve` varchar(20) DEFAULT NULL,
  `dateCve` date DEFAULT NULL,
  `statuteCve` varchar(15) DEFAULT NULL,
  `descriptionCve` varchar(100) DEFAULT NULL,
  `referencesCve` varchar(75) DEFAULT NULL,
  `noteCve` varchar(100) DEFAULT NULL,
  `fk_idEditeur` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCve`),
  KEY `fk_id_editeur` (`fk_idEditeur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

DROP TABLE IF EXISTS `editeur`;
CREATE TABLE IF NOT EXISTS `editeur` (
  `idEditeur` int(11) NOT NULL AUTO_INCREMENT,
  `nomEditeur` varchar(30) DEFAULT NULL,
  `descriptionEditeur` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`idEditeur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `faille`
--

DROP TABLE IF EXISTS `faille`;
CREATE TABLE IF NOT EXISTS `faille` (
  `idFaille` int(11) NOT NULL AUTO_INCREMENT,
  `nomFaille` varchar(50) DEFAULT NULL,
  `descriptionFaille` varchar(100) DEFAULT NULL,
  `fk_idType` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFaille`),
  KEY `fk_idType` (`fk_idType`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `referencecve`
--

DROP TABLE IF EXISTS `referencecve`;
CREATE TABLE IF NOT EXISTS `reference_cve` (
  `idReference` int(11) NOT NULL AUTO_INCREMENT,
  `nomReference` varchar(30) DEFAULT NULL,
  `fk_idCve` int(11) DEFAULT NULL,
  PRIMARY KEY (`idReference`),
  KEY `fk_idCve` (`fk_idCve`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_faille`
--

DROP TABLE IF EXISTS `type_faille`;
CREATE TABLE IF NOT EXISTS `type_faille` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `nomFaille` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `nomUsers` varchar(30) DEFAULT NULL,
  `passwordUsers` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

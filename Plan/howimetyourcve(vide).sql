-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 25 Octobre 2017 à 20:50
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `cve` (
  `idCve` int(11) NOT NULL,
  `nomCve` varchar(15) NOT NULL,
  `dateCve` date NOT NULL,
  `statusCve` tinyint(1) NOT NULL DEFAULT '1',
  `descriptionCve` text NOT NULL,
  `noteBaseCve` double(11,1) DEFAULT NULL,
  `noteExploitabiliteCve` double(11,1) DEFAULT NULL,
  `noteImpactCve` double(11,1) DEFAULT NULL,
  `adminAccesCve` tinyint(1) DEFAULT NULL,
  `userAccesCve` tinyint(1) DEFAULT NULL,
  `userInteractionRequiredCve` tinyint(1) DEFAULT NULL,
  `authentificationImpactCve` varchar(15) DEFAULT NULL,
  `confidentialiteImpactCve` varchar(15) DEFAULT NULL,
  `integriteImpactCve` varchar(15) DEFAULT NULL,
  `disponibiliteImpactCve` varchar(15) DEFAULT NULL,
  `accesComplexiteCve` varchar(15) DEFAULT NULL,
  `severiteCve` int(11) DEFAULT NULL,
  `idEditeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

CREATE TABLE `editeur` (
  `idEditeur` int(11) NOT NULL,
  `nomEditeur` varchar(30) NOT NULL,
  `descriptionEditeur` text,
  `logoEditeur` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `faille`
--

CREATE TABLE `faille` (
  `idFaille` int(11) NOT NULL,
  `nomFaille` varchar(50) NOT NULL,
  `descriptionFaille` text,
  `idType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `link_cve_faille`
--

CREATE TABLE `link_cve_faille` (
  `idCve` int(11) NOT NULL,
  `idFaille` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `link_cve_produit`
--

CREATE TABLE `link_cve_produit` (
  `idCve` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `link_cve_reference`
--

CREATE TABLE `link_cve_reference` (
  `idCve` int(11) NOT NULL,
  `idReference` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `link_cve_user`
--

CREATE TABLE `link_cve_user` (
  `idCve` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `favoris` tinyint(1) DEFAULT NULL,
  `commentaire` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `link_editeur_user`
--

CREATE TABLE `link_editeur_user` (
  `idEditeur` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `favoris` tinyint(1) DEFAULT NULL,
  `commentaire` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `link_faille_user`
--

CREATE TABLE `link_faille_user` (
  `idFaille` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `favoris` tinyint(1) DEFAULT NULL,
  `commentaire` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `nomProduit` varchar(50) NOT NULL,
  `descriptionProduit` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reference`
--

CREATE TABLE `reference` (
  `idReference` int(11) NOT NULL,
  `urlReference` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typefaille`
--

CREATE TABLE `typefaille` (
  `idType` int(11) NOT NULL,
  `nomType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nomUser` varchar(30) NOT NULL,
  `mailUser` varchar(25) DEFAULT NULL,
  `passwordUser` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cve`
--
ALTER TABLE `cve`
  ADD PRIMARY KEY (`idCve`),
  ADD KEY `fkEditeurCVE` (`idEditeur`);

--
-- Index pour la table `editeur`
--
ALTER TABLE `editeur`
  ADD PRIMARY KEY (`idEditeur`);

--
-- Index pour la table `faille`
--
ALTER TABLE `faille`
  ADD PRIMARY KEY (`idFaille`),
  ADD KEY `fktypeFaille` (`idType`);

--
-- Index pour la table `link_cve_faille`
--
ALTER TABLE `link_cve_faille`
  ADD PRIMARY KEY (`idCve`,`idFaille`),
  ADD KEY `fkCVEFaille` (`idFaille`);

--
-- Index pour la table `link_cve_produit`
--
ALTER TABLE `link_cve_produit`
  ADD PRIMARY KEY (`idCve`,`idProduit`),
  ADD KEY `fkCVEProduit` (`idProduit`);

--
-- Index pour la table `link_cve_reference`
--
ALTER TABLE `link_cve_reference`
  ADD PRIMARY KEY (`idCve`,`idReference`),
  ADD KEY `fkCVEReference` (`idReference`);

--
-- Index pour la table `link_cve_user`
--
ALTER TABLE `link_cve_user`
  ADD PRIMARY KEY (`idCve`,`idUser`),
  ADD KEY `fkCVEUser` (`idUser`);

--
-- Index pour la table `link_editeur_user`
--
ALTER TABLE `link_editeur_user`
  ADD PRIMARY KEY (`idEditeur`,`idUser`),
  ADD KEY `fkUserEditeur` (`idUser`);

--
-- Index pour la table `link_faille_user`
--
ALTER TABLE `link_faille_user`
  ADD PRIMARY KEY (`idFaille`,`idUser`),
  ADD KEY `fkUserFaille` (`idUser`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`);

--
-- Index pour la table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`idReference`);

--
-- Index pour la table `typefaille`
--
ALTER TABLE `typefaille`
  ADD PRIMARY KEY (`idType`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cve`
--
ALTER TABLE `cve`
  ADD CONSTRAINT `fkEditeurCVE` FOREIGN KEY (`idEditeur`) REFERENCES `editeur` (`idEditeur`);

--
-- Contraintes pour la table `faille`
--
ALTER TABLE `faille`
  ADD CONSTRAINT `fktypeFaille` FOREIGN KEY (`idType`) REFERENCES `typefaille` (`idType`);

--
-- Contraintes pour la table `link_cve_faille`
--
ALTER TABLE `link_cve_faille`
  ADD CONSTRAINT `fkCVEFaille` FOREIGN KEY (`idFaille`) REFERENCES `faille` (`idFaille`),
  ADD CONSTRAINT `fkFailleCVE` FOREIGN KEY (`idCve`) REFERENCES `cve` (`idCve`);

--
-- Contraintes pour la table `link_cve_produit`
--
ALTER TABLE `link_cve_produit`
  ADD CONSTRAINT `fkCVEProduit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`),
  ADD CONSTRAINT `fkFProduitCVE` FOREIGN KEY (`idCve`) REFERENCES `cve` (`idCve`);

--
-- Contraintes pour la table `link_cve_reference`
--
ALTER TABLE `link_cve_reference`
  ADD CONSTRAINT `fkCVEReference` FOREIGN KEY (`idReference`) REFERENCES `reference` (`idReference`),
  ADD CONSTRAINT `fkReferenceCVE` FOREIGN KEY (`idCve`) REFERENCES `cve` (`idCve`);

--
-- Contraintes pour la table `link_cve_user`
--
ALTER TABLE `link_cve_user`
  ADD CONSTRAINT `fkCVEUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `fkUserCVE` FOREIGN KEY (`idCve`) REFERENCES `cve` (`idCve`);

--
-- Contraintes pour la table `link_editeur_user`
--
ALTER TABLE `link_editeur_user`
  ADD CONSTRAINT `fkEditeurUser` FOREIGN KEY (`idEditeur`) REFERENCES `editeur` (`idEditeur`),
  ADD CONSTRAINT `fkUserEditeur` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `link_faille_user`
--
ALTER TABLE `link_faille_user`
  ADD CONSTRAINT `fkFailleUser` FOREIGN KEY (`idFaille`) REFERENCES `faille` (`idFaille`),
  ADD CONSTRAINT `fkUserFaille` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

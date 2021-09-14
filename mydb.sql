-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 14 juin 2020 à 09:10
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

DROP TABLE IF EXISTS `resultat`;
CREATE TABLE IF NOT EXISTS `resultat` (
  `idresultat` int(11) NOT NULL AUTO_INCREMENT,
  `resultat` varchar(50) DEFAULT NULL,
  `vote_idvote` int(11) NOT NULL,
  `utilisateur_idutilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idresultat`),
  KEY `fk_resultat_vote1_idx` (`vote_idvote`),
  KEY `fk_resultat_utilisateur1_idx` (`utilisateur_idutilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `resultat`
--

INSERT INTO `resultat` (`idresultat`, `resultat`, `vote_idvote`, `utilisateur_idutilisateur`) VALUES
(1, 'oui', 13, 1),
(2, 'peut-être', 13, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idutilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(45) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `MotDePasse` varchar(250) DEFAULT NULL,
  `recovmdp` int(10) DEFAULT NULL,
  `grade` int(6) DEFAULT NULL,
  PRIMARY KEY (`idutilisateur`),
  UNIQUE KEY `idutilisateur_UNIQUE` (`idutilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `prenom`, `nom`, `mail`, `login`, `MotDePasse`, `recovmdp`, `grade`) VALUES
(1, 'toto', 'toto', 'toto@toto.com', 'toto', '$2y$10$mfaODCTnkc4r4ijnEgdwBO6v4wXj/T9iCgoYrDfg6dDJlh.NN9XBq', NULL, 1),
(2, 'titi', 'titi', 'titi@toto.com', 'titi', '$2y$10$Z5wxhAelwzawl9SOruvHTuFmZ5Jl59BKr58BUxkRz.qT0pFX65MSe', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `idvote` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(120) DEFAULT NULL,
  `reponse1` varchar(50) DEFAULT NULL,
  `reponse2` varchar(50) DEFAULT NULL,
  `reponse3` varchar(50) DEFAULT NULL,
  `utilisateur_idutilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idvote`),
  UNIQUE KEY `idvote_UNIQUE` (`idvote`),
  KEY `fk_vote_utilisateur1_idx` (`utilisateur_idutilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`idvote`, `question`, `reponse1`, `reponse2`, `reponse3`, `utilisateur_idutilisateur`) VALUES
(13, 'Allez-vous voter?', 'oui', 'non', 'peut-être', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD CONSTRAINT `fk_resultat_utilisateur1` FOREIGN KEY (`utilisateur_idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_resultat_vote1` FOREIGN KEY (`vote_idvote`) REFERENCES `vote` (`idvote`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `fk_vote_utilisateur1` FOREIGN KEY (`utilisateur_idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

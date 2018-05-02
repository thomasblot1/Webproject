-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 02 mai 2018 à 08:16
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
-- Base de données :  `reseausocial`
--

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `Contenu_texte` varchar(255) NOT NULL,
  `contenu_multimédia` longblob NOT NULL,
  `Date` date NOT NULL,
  `ID_publication` int(255) NOT NULL AUTO_INCREMENT,
  `nb_like` int(255) NOT NULL,
  PRIMARY KEY (`ID_publication`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_admin`
--

DROP TABLE IF EXISTS `table_admin`;
CREATE TABLE IF NOT EXISTS `table_admin` (
  `ID_admin` int(255) NOT NULL AUTO_INCREMENT,
  `Mail` varchar(255) DEFAULT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `Photo` longblob,
  `Photo_fond` longblob,
  PRIMARY KEY (`ID_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_admin`
--

INSERT INTO `table_admin` (`ID_admin`, `Mail`, `Nom`, `Prenom`, `Photo`, `Photo_fond`) VALUES
(1, 'cyprien.uj@gmail.com', 'uhart-jouet', 'cyprien', NULL, NULL),
(2, 'segado@id.campuseiffel.fr', 'segado', 'jean-pierre', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `table_job`
--

DROP TABLE IF EXISTS `table_job`;
CREATE TABLE IF NOT EXISTS `table_job` (
  `ID_job` int(255) NOT NULL AUTO_INCREMENT,
  `Nom_job` varchar(255) NOT NULL,
  `Entreprise` varchar(255) NOT NULL,
  `Descriptif` varchar(255) NOT NULL,
  `type_de_contrat` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_job`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_job`
--

INSERT INTO `table_job` (`ID_job`, `Nom_job`, `Entreprise`, `Descriptif`, `type_de_contrat`) VALUES
(1, 'stage R&D', 'Google', '', 'CDD 3 mois'),
(2, 'ingénieur efficacité énergetique', 'EDF', '', 'CDI'),
(3, 'ingénieur cyber sécurité', 'facebook', '', 'CDD');

-- --------------------------------------------------------

--
-- Structure de la table `table_reseau`
--

DROP TABLE IF EXISTS `table_reseau`;
CREATE TABLE IF NOT EXISTS `table_reseau` (
  `ID_ami` int(255) NOT NULL AUTO_INCREMENT,
  `Mail_ami` varchar(255) NOT NULL,
  `Prenom_ami` int(255) NOT NULL,
  `Nom_ami` int(255) NOT NULL,
  `Photo_ami` longblob NOT NULL,
  PRIMARY KEY (`ID_ami`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_utilisateurs`
--

DROP TABLE IF EXISTS `table_utilisateurs`;
CREATE TABLE IF NOT EXISTS `table_utilisateurs` (
  `ID_utilisateur` int(255) NOT NULL AUTO_INCREMENT,
  `Mail` varchar(255) DEFAULT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `Photo` longblob,
  `Photo_de_fond` longblob,
  PRIMARY KEY (`ID_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_utilisateurs`
--

INSERT INTO `table_utilisateurs` (`ID_utilisateur`, `Mail`, `Nom`, `Prenom`, `Photo`, `Photo_de_fond`) VALUES
(1, 'thomas.blot@edu.ece.fr', 'blot', 'thomas', NULL, NULL),
(2, 'sarah.bragas@edu.ece.fr', 'bragas', 'sarah', NULL, NULL),
(3, 'loki.odinson@edu.ece.fr', 'odinson', 'loki', NULL, NULL),
(4, 'heimdall.bifrost@edu.ece.fr', 'bifrost', 'heimdall', NULL, NULL),
(5, 'peter.parker@edu.ece.fr', 'parker', 'peter', NULL, NULL),
(6, 'steven.strange@edu.ece.fr', 'strange', 'steven', NULL, NULL),
(7, 'thor.odinson@edu.ece.fr', 'odinson', 'thor', NULL, NULL),
(8, 'luke.skywalker@edu.ece.fr', 'skywalker', 'luke', NULL, NULL),
(9, 'atila.lehun@edu.ece.fr', 'lehun', 'atila', NULL, NULL),
(10, 'honor.harrington@edu.ece.fr', 'harrington', 'honor', NULL, NULL),
(11, 'tyler.durden@edu.ece.fr', 'durden', 'tyler', NULL, NULL),
(12, 'jack.daniels@edu.ece.fr', 'daniels', 'jack', NULL, NULL),
(13, 'seth.radiant@edu.ece.fr', 'radiant', 'seth', NULL, NULL),
(14, 'richard.aldana@edu.ece.fr', 'aldana', 'richard', NULL, NULL),
(15, 'longjohn.silver@edu.ece.fr', 'silver', 'longjohn', NULL, NULL),
(16, 'capitaine.flint@edu.ece.fr', 'flint', 'capitaine', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 30 mars 2019 à 11:22
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `id4218719_projetcompta`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `adresse`, `tel`, `mail`) VALUES
(18, 'Acundeger', '18 avenue du PHP', '0678145781', 'erol.acundeger@outlook.fr'),
(19, 'Ivo', '5 rue de petit pont 06000 Nice', '0612345644', 'dudu@invalid.com'),
(20, 'Sil', '3 bis avenue du JS', '0678124589', 'sothasil@live.fr');

-- --------------------------------------------------------

--
-- Structure de la table `factureclient`
--

DROP TABLE IF EXISTS `factureclient`;
CREATE TABLE IF NOT EXISTS `factureclient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idClient` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `dateEmission` date NOT NULL,
  `dateRecouvrement` date NOT NULL,
  `produit` varchar(50) NOT NULL,
  `tauxTVA` varchar(50) NOT NULL,
  `totalHT` int(11) NOT NULL,
  `montantTVA` float(11,0) NOT NULL,
  `totalTTC` int(11) NOT NULL,
  `paye` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idClient` (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `factureclient`
--

INSERT INTO `factureclient` (`id`, `idClient`, `ref`, `dateEmission`, `dateRecouvrement`, `produit`, `tauxTVA`, `totalHT`, `montantTVA`, `totalTTC`, `paye`) VALUES
(14, 17, 32432, '2018-01-11', '2018-01-30', 'SGBD-PGSQL', '20%', 10, 2, 12, 0);

-- --------------------------------------------------------

--
-- Structure de la table `facturefournisseur`
--

DROP TABLE IF EXISTS `facturefournisseur`;
CREATE TABLE IF NOT EXISTS `facturefournisseur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idFournisseur` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `dateFacture` date NOT NULL,
  `dateRecouvrement` date NOT NULL,
  `totalHT` int(11) NOT NULL,
  `montantTVA` float NOT NULL,
  `totalTTC` int(11) NOT NULL,
  `paye` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idFournisseur` (`idFournisseur`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facturefournisseur`
--

INSERT INTO `facturefournisseur` (`id`, `idFournisseur`, `ref`, `description`, `dateFacture`, `dateRecouvrement`, `totalHT`, `montantTVA`, `totalTTC`, `paye`) VALUES
(3, 6, 234, 'EDF', '2018-01-12', '2018-01-27', 10, 5, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `adresse`, `tel`, `mail`) VALUES
(6, 'EDF', '46 rue du Pont des Marchands', '0969321515', 'EDF@hotmail.com'),
(7, 'Aperture Laboratories', '42 rue Erwin Schrodinger', '060606060', 'apertureLabs@hotmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idService` int(11) DEFAULT NULL,
  `appellation` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `montantHT` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idService` (`idService`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `idService`, `appellation`, `description`, `montantHT`) VALUES
(1, 1, 'Espace web 10Mo', 'Création d\'un espace Web de 10Mo avec 3 boites aux lettres mail et un nom de domaine', 5),
(2, 1, 'Espace web 50Mo', 'Création d\'un espace Web de 50Mo avec 10 boites aux lettres mail et un nom de domaine', 10),
(3, 1, 'Espace web 100Mo', 'Création d\'un espace Web de 100Mo avec 30 boites aux lettres mail et un nom de domaine', 20),
(4, 1, 'Espace web 500Mo', 'Création d\'un espace Web de 500Mo avec 100 boites aux lettres mail et un nom de domaine', 50),
(5, 1, 'Espace web 1000Mo', 'Création d\'un espace Web de 1000Mo avec 200 boites aux lettres mail et un nom de domaine', 100),
(6, 2, 'SGBS-MSQL', 'Associe à chaque espace un SGBD MySQL', 10),
(7, 2, 'SGBD-PGSQL', 'Associe à chaque espace un SGBD PostGresSQL', 10),
(8, 2, 'SGBD-O', 'Associe à chaque espace un SGBD Oracle', 100),
(9, 3, ' SD-S', 'Location de serveurs dédiés de capacité 2coeurs/8GoRAM', 200),
(10, 3, 'SD-L', 'Location de serveurs dédiés de capacité 4coeurs/32GoRAM', 300),
(11, 3, 'SD-X', 'Location de serveurs dédiés de capacité 8coeurs/64GoRAM', 400),
(12, 4, 'Depot nom de domaine', 'Le dépôt d’un nom de domaine correspondant à l’appellation DD', 10);

-- --------------------------------------------------------

--
-- Structure de la table `salarie`
--

DROP TABLE IF EXISTS `salarie`;
CREATE TABLE IF NOT EXISTS `salarie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `salaireNet` int(11) NOT NULL,
  `salaireBrut` int(11) NOT NULL,
  `datePaiement` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salarie`
--

INSERT INTO `salarie` (`id`, `nom`, `adresse`, `tel`, `mail`, `fonction`, `salaireNet`, `salaireBrut`, `datePaiement`) VALUES
(5, 'Douglas', '2 avenue Jean Medecin', '0610101010', 'salarie.test@outlook.fr', 'Sujet de test', 1500, 2000, '2018-01-20'),
(7, 'Laiolo', '3 bis rue Arson', '0645915760', 'louis.laiolo@hotmail.com', 'Consultant', 1603, 1700, '2018-02-21');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `nom`, `description`) VALUES
(1, 'Location espace web', 'Le client peut louer un espace web de différentes tailles'),
(2, 'Location SGBD', 'Le client peut louer pour chaque espace un SGBD de plusieurs types'),
(3, 'Location serveur', 'Le client peut louer des serveurs'),
(4, 'Location nom de domaine', 'Le client peut déposer un nom de domaine correspondant à l’appellation DD');

-- --------------------------------------------------------

--
-- Structure de la table `taxe`
--

DROP TABLE IF EXISTS `taxe`;
CREATE TABLE IF NOT EXISTS `taxe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `montant` int(11) NOT NULL,
  `dateEmission` date NOT NULL,
  `dateRecouvrement` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `taxe`
--

INSERT INTO `taxe` (`id`, `type`, `montant`, `dateEmission`, `dateRecouvrement`) VALUES
(2, 'Taxe Habitation', 100, '2018-01-26', '2018-01-31');

-- --------------------------------------------------------

--
-- Structure de la table `tva`
--

DROP TABLE IF EXISTS `tva`;
CREATE TABLE IF NOT EXISTS `tva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tva`
--

INSERT INTO `tva` (`id`, `montant`) VALUES
(1, 20);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mail`, `password`, `date_inscription`) VALUES
(49, 'CLAEYS', 'CLAUDIA', 'claudiaclaeys@hotmail.fr', 'pechemachatte', '2018-02-24'),
(48, 'Acundeger', 'Erol', 'mymail@live.fr', 'iut', '2018-02-23'),
(47, 'Laiolo', 'Louis', 'louis.laiolo@hotmail.com', 'gray1', '2018-02-23'),
(46, 'Johson', 'Cave', 'apertureLab@live.fr', 'code51', '2018-02-23'),
(50, 'Mercer', 'Alexandre', 'unmail@live.fr', 'code51', '2018-02-27'),
(51, 'Laiolo', 'Louis', 'louis.laiolo@hotmail.com', 'code51', '2018-02-28'),
(52, 'Jeanne', 'Michu', 'jeanne.michu@gmx.fr', 'toto12345', '2018-04-12'),
(53, 'Jeanne', 'Michu2', 'jeanne.michu2@gmx.fr', 'toto12345', '2018-04-12'),
(54, 'Empty', 'Empty', 'empty@live.fr', 'code51', '2019-03-28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Lun 18 Mai 2015 à 10:37
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `brocante`
--

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `departement` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `login`, `password`, `email`, `nom`, `prenom`, `departement`, `ville`) VALUES
(20, 'mateo', 'af7e3908a080079988123be1e3d261c3d95f4e603fb10efc33dffbc3d8926825', 'mateo.l@hotmail.fr', 'lostanlen', 'matÃ©o', 33, 'bordeaux'),
(22, 'jean', 'af7e3908a080079988123be1e3d261c3d95f4e603fb10efc33dffbc3d8926825', 'jean@hotmail.fr', 'dupont', 'jean', 33, 'talence'),
(23, 'paul', 'af7e3908a080079988123be1e3d261c3d95f4e603fb10efc33dffbc3d8926825', 'paul@hotmail.fr', 'martin', 'paul', 75, 'Paris'),
(24, 'Antoine', 'af7e3908a080079988123be1e3d261c3d95f4e603fb10efc33dffbc3d8926825', 'antoine.pichon@enseirb-matmeca.fr', 'Pichon', 'Antoine', 44, 'Nantes'),
(25, 'aaaaa', 'ed968e840d10d2d313a870bc131a4e2c311d7ad09bdf32b3418147221f51a6e2', 'aaaaa@aa.dr', 'aaaaa', 'aaaaa', 22, 'aaaaa');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
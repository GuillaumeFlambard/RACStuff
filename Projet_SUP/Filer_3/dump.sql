-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mer 13 Février 2013 à 13:08
-- Version du serveur: 5.1.53
-- Version de PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `dump`
--

-- --------------------------------------------------------

--
-- Structure de la table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `id_membre` int(11) NOT NULL,
  `action_effectue` varchar(10) NOT NULL,
  `element_affecte` varchar(30) NOT NULL,
  `parametre_action` varchar(30) NOT NULL,
  `date_heure` date NOT NULL,
  `IP_utilisateur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `actions`
--


-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id_membre` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(50) NOT NULL,
  `mot_de_pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `membres`
--


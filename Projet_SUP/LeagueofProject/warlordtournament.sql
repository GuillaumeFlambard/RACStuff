-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 17 Octobre 2013 à 23:36
-- Version du serveur: 5.1.53
-- Version de PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `warlordtournament`
--

-- --------------------------------------------------------

--
-- Structure de la table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `max_hp` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `velocity` int(11) NOT NULL,
  `intelligence` int(11) NOT NULL,
  `health_point` int(11) NOT NULL,
  `critical` int(11) NOT NULL,
  `critical_power` int(11) NOT NULL,
  `classe` varchar(30) NOT NULL,
  `loop` int(11) NOT NULL,
  `skill` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `players`
--


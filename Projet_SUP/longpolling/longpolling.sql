-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 18 Octobre 2013 à 12:24
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `longpolling`
--
CREATE DATABASE IF NOT EXISTS `longpolling` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `longpolling`;

-- --------------------------------------------------------

--
-- Structure de la table `queued_msgs`
--

CREATE TABLE IF NOT EXISTS `queued_msgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `msg` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=66 ;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `session_expire` int(11) NOT NULL,
  `session_data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

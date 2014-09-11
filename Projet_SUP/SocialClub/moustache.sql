-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 30 Mai 2013 à 10:12
-- Version du serveur: 5.1.53
-- Version de PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `moustache`
--

-- --------------------------------------------------------

--
-- Structure de la table `codes`
--

CREATE TABLE IF NOT EXISTS `codes` (
  `idCode` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`idCode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `codes`
--


-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `idImage` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) NOT NULL,
  `legende` varchar(200) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idImage`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`idImage`, `path`, `legende`, `idUser`) VALUES
(22, './users/faustine/photos/1.jpg', 'hey', 9),
(26, './users/faustine/photos/image-5.jpg', 'TrÃ¨s belle image venue du site LightBox', 9),
(5, './users/faustine/photos/image-4.jpg', 'Bonjour', 9),
(6, './users/faustine/photos/image-3.jpg', 'hello', 9),
(8, './users/faustine/photos/image-2.jpg', 'hehe', 9),
(15, './users/faustine/photos/agrid.jpg', 'Agrid mon matou trop chou', 9),
(21, './users/faustine/photos/Minitokyo.Keroberos.Wallpapers.544308.jpg', 'ol', 9),
(13, './users/faustine/photos/image-1.jpg', 'hey', 9),
(16, './users/faustine/photos/alienor.jpg', 'C''est ta soeur owi elle est trop mignonne !', 9),
(23, './users/faustine/photos/1351508064_pink_and_blue_disney_castle_w1.jpeg', 'disney sney', 9),
(24, './users/faustine/photos/177052_3744038411410_310015892_o.jpg', 'foret', 9),
(25, './users/faustine/photos/559555_4370055821454_662719658_n.jpg', 'night', 9),
(27, './users/judith/photos/Citrouille.jpg', 'Citrouille', 11),
(28, './users/judith/photos/1351507944_frightful_jack_o_lanterns_w1.jpeg', 'Pumpkins !', 11);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `idMessage` int(11) NOT NULL AUTO_INCREMENT,
  `idUserSender` int(11) DEFAULT NULL,
  `idUserRecipient` int(11) DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`idMessage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`idMessage`, `idUserSender`, `idUserRecipient`, `content`, `date`) VALUES
(1, 9, 11, 'Coucou judith, j''essaie de faire fonctionner ta bullshit', '0000-00-00 00:00:00'),
(2, 9, 11, 'Je rÃ©essaye, la date avait buguÃ© sur le prÃ©cÃ©dent message ! C''est fou', '2013-05-29 21:23:39'),
(3, 9, 11, 'Encore un petit effort, je regarde si les accents (et pas les accents comme l''accent du sud hÃ©in) fonctionnent. Voyons mÃ© chÃ¨r compatriotes', '2013-05-29 21:24:55'),
(4, 9, 11, 'HÃ©hÃ©hÃ©hÃ©hÃ©', '2013-05-29 21:25:12'),
(5, 9, 11, 'Gligueubluck', '2013-05-29 22:12:29'),
(6, 9, 12, 'Coucou', '2013-05-29 22:12:41');

-- --------------------------------------------------------

--
-- Structure de la table `relationships`
--

CREATE TABLE IF NOT EXISTS `relationships` (
  `idRelationship` int(11) NOT NULL AUTO_INCREMENT,
  `idUser1` int(11) NOT NULL DEFAULT '0',
  `idUser2` int(11) NOT NULL DEFAULT '0',
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idRelationship`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=98 ;

--
-- Contenu de la table `relationships`
--

INSERT INTO `relationships` (`idRelationship`, `idUser1`, `idUser2`, `accepted`) VALUES
(3, 11, 12, 1),
(4, 12, 11, 1),
(5, 11, 13, 1),
(6, 13, 11, 1),
(7, 11, 14, 1),
(8, 14, 11, 1),
(9, 11, 15, 1),
(10, 15, 11, 1),
(11, 11, 16, 1),
(12, 16, 11, 1),
(13, 11, 17, 1),
(14, 17, 11, 1),
(21, 9, 14, 1),
(22, 14, 9, 1),
(23, 9, 15, 1),
(24, 15, 9, 1),
(27, 9, 17, 1),
(28, 17, 9, 1),
(29, 9, 18, 1),
(30, 18, 9, 1),
(41, 9, 25, 1),
(42, 25, 9, 1),
(43, 9, 26, 1),
(44, 26, 9, 1),
(45, 9, 27, 1),
(46, 27, 9, 1),
(47, 9, 28, 1),
(48, 28, 9, 1),
(49, 9, 29, 1),
(50, 29, 9, 1),
(51, 9, 30, 1),
(52, 30, 9, 1),
(53, 9, 31, 1),
(54, 31, 9, 1),
(55, 9, 32, 1),
(56, 32, 9, 1),
(57, 9, 33, 1),
(58, 33, 9, 1),
(59, 9, 34, 1),
(60, 34, 9, 1),
(61, 9, 35, 1),
(62, 35, 9, 1),
(63, 9, 36, 1),
(64, 36, 9, 1),
(65, 9, 37, 1),
(66, 37, 9, 1),
(67, 9, 38, 1),
(68, 38, 9, 1),
(69, 9, 41, 1),
(70, 41, 9, 1),
(72, 9, 49, 0),
(73, 9, 51, 0),
(74, 9, 52, 0),
(75, 9, 13, 0),
(78, 11, 29, 0),
(81, 40, 9, 0),
(84, 9, 11, 1),
(87, 11, 9, 1),
(89, 53, 12, 0),
(90, 53, 9, 0),
(91, 9, 48, 0),
(95, 11, 28, 0),
(97, 11, 18, 0);

-- --------------------------------------------------------

--
-- Structure de la table `statuts`
--

CREATE TABLE IF NOT EXISTS `statuts` (
  `idStatut` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `content` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idStatut`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=18 ;

--
-- Contenu de la table `statuts`
--

INSERT INTO `statuts` (`idStatut`, `idUser`, `date`, `content`) VALUES
(1, 49, '2013-05-27 22:20:59', 'La description scription scription'),
(2, 49, '2013-05-27 23:04:28', 'Essaye de re poster un statut'),
(3, 49, '2013-05-27 23:22:42', 'Essaye de re poster un statut'),
(4, 9, '2013-05-28 00:04:03', 'Bonjour Ganondorf tes trop kikoolol'),
(5, 50, '2013-05-28 00:06:43', 'You mad Peach ?'),
(6, 51, '2013-05-28 00:07:36', 'Si la conversation Ã©tait fonctionnelle, je te parlerai en pv you bastard !'),
(7, 9, '2013-05-28 01:11:23', 'Sommeil paradoxal'),
(8, 9, '2013-05-28 01:37:13', 'Coucou'),
(9, 9, '2013-05-28 01:38:17', 'Autant de '' que je veux'),
(10, 9, '2013-05-28 01:39:47', 'Je disais. Aujourd''hui (hier en fait) j''ai appris que les chats ronronnaient mÃªme lorsqu''ils ressentaient une douleur. Et pour cause, le ronronnement permet l''apaisement des maux, favorise la rÃ©cupÃ©ration musculaire et contribue Ã  la cicatrisation oss'),
(11, 9, '2013-05-28 01:41:07', 'Trying, does it work ?'),
(12, 9, '2013-05-28 01:43:03', 'Citation du jour : &quot;je suis tout hÃ©rissÃ© !&quot;'),
(13, 11, '2013-05-28 17:36:52', 'Je test de poster un superbe statuuut'),
(14, 11, '2013-05-28 17:40:40', 'Je re test parce que c''est trop bien d''Ã©crire des statuts Youpi'''),
(15, 53, '2013-05-28 18:33:19', 'Mon premier statut !'),
(16, 9, '2013-05-28 19:37:20', 'Franck Dubosc : Je vous aime. I love you, ti amo, te quiero, ich liebe dish, i want to fuck you'),
(17, 9, '2013-05-29 08:53:29', 'Et en fait quand on se rÃ©veille et qu''on re-test eh bien tout fonctionne encore ! Moi Ã§a me fait trop plaisir dans mon coeur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=60 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `login`, `password`, `email`, `description`) VALUES
(9, 'faustine', 'e1a0d2225de365ea2b48c3292e4a439a1f7e775b', '', 'Bonjour, mes chers compatriotes. Aujourd''hui, Ã  cette heure prÃ©cise (21h35, pas 7h) j''ai fait marcher tout plein de choses trop bien et Ã§a me fait trop du plaisir dans mon coeur. Je vous aime.'),
(11, 'judith', 'e1a0d2225de365ea2b48c3292e4a439a1f7e775b', 'judith@sup.fr', ''),
(12, 'guillaume', '2450ec3ccdf9492f0296810ab160876644aa9cff', 'guillaume@sup.fr', ''),
(13, 'thomas', '5f50a84c1fa3bcff146405017f36aec1a10a9e38', 'thomas@sup.fr', ''),
(14, 'hello', 'e1a0d2225de365ea2b48c3292e4a439a1f7e775b', 'hello@sup.fr', ''),
(15, 'testun', 'b58186dbf066677d44277f1749622ee3af5ab38b', 'testun@sup.fr', ''),
(16, 'kiwete', 'a69722f91f9d925f71871cd5dbe72792568d76c3', 'kiwete@sup.fr', ''),
(17, 'killian', '0ca54836ba6f3f1612d0df456a71d5cf8d30a4e7', '', ''),
(18, 'fenegan', '1b163f76deadc071d9fdb78238d1cbf7029e88c0', '', ''),
(24, 'bonjour', '1f71e0f4ac9b47cd93bf269e4017abaab9d3bd63', '', ''),
(25, 'priscillia', '134582d81f8fdff19e6399c569de7629a652005d', '', ''),
(26, 'nicolas', '418d940643b1975d62234ee01246ad4b58904184', '', ''),
(27, 'julien', '5c682c2d1ec4073e277f9ba9f4bdf07e5794dabe', '', ''),
(28, 'mariejeanne', '837ea407d9ac963e0767534dfd20e0bbd2bb379e', '', ''),
(29, 'Laureline', '603d48959055003f08ae69179ad9e05e44c9c257', '', ''),
(30, 'dimitri', '24bef948627238e46f7a1a189276781098b74b3c', '', ''),
(31, 'foubart', '9d278d3484b98970ee79c12dc7e6edc95ac3b6b3', '', ''),
(32, 'isabelle', '4303f7fbc75763e3133bf7714fc90f02260848b5', '', ''),
(33, 'melanie', '0ecfbc3894c7b8e374232cadc0afa67162a600be', '', ''),
(34, 'nitendo', 'aa62cc652ae1f66972b4e077dac095464bc602e9', '', ''),
(35, 'malcolm', 'ff5207c7210a6d8d186d89e5962b0928b66c53fe', '', ''),
(36, 'laurent', 'f1b010126f61b5c59e7d5eb42c5c68f6105c5914', '', ''),
(37, 'hubert', '394623d3491514d47f1279a4d0ef0068741e3017', '', ''),
(38, 'charles', 'cbdb0cc7f3f5b4be81a75fa7242590e3e9882e1e', '', ''),
(39, 'paul', '3fa83d579894b8e102cc3d3b6cfe446b02c1193b', '', ''),
(40, 'jaison', 'b9731e8b589923881881dc3d6d48988e3c948373', '', ''),
(41, 'quentin', 'd6b8e48afb2534b213e391cab43016505747a234', '', ''),
(42, 'Pierre', 'ff019a5748a52b5641624af88a54a2f0e46a9fb5', '', ''),
(43, 'girafe', '8aa514f2b9bf314dc8f926bf8b8ec17c80c4e53e', '', ''),
(44, 'soutenance', '081a8c2cb3b197f1127ba9a3f129154c17a77d26', '', ''),
(45, 'moustache', '8110c78c44ef6b63e70ce8a466df629d9450765a', '', ''),
(46, 'Kangourou', '41bc5cc23a0da6c27b26c7fa3654c6d535c81f5a', '', ''),
(47, 'dinosaure', 'a52384a5660c9e5a94e456bcbb6a761d8dbf7160', '', ''),
(48, 'charolais', '02f009ac8eab8b1e0b095a59bb37660145b5d133', '', ''),
(49, 'Ganondorf', '81411ea1a457ab7be7e49afdca0702f7d0974f12', '', ''),
(50, 'Bowser', '7e020271296998570130e9be83f8ce44b39b843b', '', ''),
(51, 'Peach', '894a8a137f2421dd39231a60d7c7639c3d5d4723', '', ''),
(52, 'test', '51abb9636078defbf888d8457a7c76f85c8f114c', '', ''),
(53, 'minscrit', 'ce9984766c5804a951b7ae3f5891196e22086392', '', 'Je m''appelle Minscrit, j''adore m''inscrire sur des rÃ©seaux sociaux pour les moustachus dans l''Ã¢me !'),
(54, 'Tarama', '5abbc31af0d796ef09c161c650edb3f9334e316d', 'tarama@test.fr', 'Veuillez entrer votre description.'),
(55, 'Moussaka', '87447e505716b1c4d5daa9e1f9ef6759616bceeb', 'moussaka@test.fr', 'Veuillez entrer votre description.'),
(56, 'rudolphe', 'fcfec49afeb8c0498efad0f399f59b255b989304', 'rudolphe@test.fr', 'Veuillez entrer votre description.'),
(57, 'Tiramisu', 'e516c4a18a95591eac638a7d437854570117cad2', 'tiramisu@test.fr', 'Veuillez entrer votre description.'),
(58, 'Yannik', 'd043d3f3e5fe8ed8612f4161b09da9ebfdf9a97c', 'yannik@test.fr', 'Veuillez entrer votre description.'),
(59, 'jeanne', 'f4cd4c30077271414e90e7feb56bda34e19cb7ad', 'jeanne@test.fr', 'Veuillez entrer votre description.');

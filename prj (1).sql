-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 29 sep. 2021 à 10:42
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `prj`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `author_img` varchar(255) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comment`, `comment_author`, `author_img`) VALUES
(12, 3, 2, 'hello', 'Aya Rjili', 'aya.jpg'),
(13, 3, 2, 'Bonne journÃ©e', 'Abid Narjes', 'PXL_20210909_122109182.PORTRAIT.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_to` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `msg_seen` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `user_to`, `user_from`, `msg`, `date`, `msg_seen`) VALUES
(24, 2, 1, 'Salut', '2021-09-29 09:15:43', 'no'),
(23, 2, 1, 'Salut', '2021-09-29 09:15:40', 'no'),
(22, 1, 6, 'Hi', '2021-09-29 00:09:41', 'no'),
(21, 1, 6, 'Hi', '2021-09-29 00:09:38', 'no');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post` varchar(255) NOT NULL,
  `upload_img` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `post`, `upload_img`, `date`) VALUES
(1, 1, 'hello', 'PXL_20210302_121218288.jpg.jpg', '2021-09-29 01:06:16'),
(2, 6, 'hello', '161390149_3702716496520365_4580067903945180077_n.jpg', '2021-09-29 01:09:57'),
(3, 2, 'Hello World', NULL, '2021-09-29 10:30:50');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `user_img` varchar(255) DEFAULT 'prof.jpeg',
  `tmp_conn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `nom`, `prenom`, `email`, `password`, `confirm_password`, `user_img`, `tmp_conn`) VALUES
(1, 'narjes', 'abid', 'narjes@gmail.com', '123456', '123456', 'PXL_20210909_122109182.PORTRAIT.jpg', '2021-09-29 11:10:23'),
(2, 'rjili', 'aya', 'aya@gmail.com', '123456789', '123456789', 'aya.jpg', '2021-09-29 11:10:23'),
(3, 'achref', 'abid', 'achref@gmail.com', 'beshbesh', 'beshbesh', 'prof.jpeg', '2021-09-29 11:10:23'),
(6, 'aya', 'aya', 'aya@ensi.com', '123123', '123123', 'prof.jpeg', '2021-09-29 11:10:23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

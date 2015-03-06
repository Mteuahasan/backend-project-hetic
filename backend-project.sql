-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  mysql51-85.pro
-- Généré le :  Ven 06 Mars 2015 à 09:30
-- Version du serveur :  5.1.73-2+squeeze+build1+1-log
-- Version de PHP :  5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `crapouilmbstpy`
--

-- --------------------------------------------------------

--
-- Structure de la table `boards`
--

CREATE TABLE IF NOT EXISTS `boards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext,
  `author` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `likes` int(11) DEFAULT '0',
  `filepath` text NOT NULL,
  `filepath2` text NOT NULL,
  `filepath3` text NOT NULL,
  `filepath4` text NOT NULL,
  `filepath5` text NOT NULL,
  `date` date NOT NULL,
  `tags` text NOT NULL,
  `commentNumber` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=129 ;

--
-- Contenu de la table `boards`
--

INSERT INTO `boards` (`id`, `name`, `description`, `author`, `user_id`, `likes`, `filepath`, `filepath2`, `filepath3`, `filepath4`, `filepath5`, `date`, `tags`, `commentNumber`) VALUES
(118, 'Glory Owl #197', 'Le chien malin', 'Gadi', 13, 2, 'public/assets/197.jpg', '', '', '', '', '2015-03-06', '', 1),
(119, 'Le caricaturiste est dangereux', 'Les crayons comme armes.', 'Large', 15, 1, 'public/assets/large-caricaturiste.jpg', '', '', '', '', '2015-03-06', '', 2),
(120, 'Doge-dogetime', 'Quelle beauté !', 'Large', 15, 1, 'public/assets/doge-dogetime.png', '', '', '', '', '2015-03-06', '', 3),
(121, 'Glory Owl #170', 'Nazis at the beach', 'Bathroom Quest', 12, 2, 'public/assets/170.jpg', '', '', '', '', '2015-03-06', 'nazis, beach, dark, humor', 1),
(122, 'Glory Owl #173', 'Ecowarrior le plus badass des écolos', 'Bathroom Quest', 12, 0, 'public/assets/173.jpg', '', '', '', '', '2015-03-06', 'ecology, ecowarrior, gun, warrior, politic, dark, humor, comic, bathroom', 0),
(123, 'Derp-shave', 'J’aurais jamais du ….', 'Nicolas ', 17, 1, 'public/assets/derp-shave.png', 'public/assets/derp-mp3.png', 'public/assets/derp-shower.jpg', '', '', '2015-03-06', '', 3),
(124, 'Glory Owl', 'Indiana Jones adore les grottes & La vie quotidienne de Big Foot', 'Bathroom Quest', 12, -1, 'public/assets/209.jpg', 'public/assets/229.jpg', '', '', '', '2015-03-06', '', 1),
(125, 'Glory Owl #237', 'La xénophobie, cette plaie ancestrale.', 'Bathroom Quest', 12, 0, 'public/assets/237.jpg', '', '', '', '', '2015-03-06', 'xenophobie,politique,religious,homme,des,cavernes', 0),
(126, 'Plantut - mohamet', 'Why did I become Jackie Chan? Mostly because I work very hard. When people were sleeping, I was still training', 'LoadingArtist', 18, 1, 'public/assets/plantu-mahomet.jpg', 'public/assets/plantu-misogininie.jpg', '', '', '', '2015-03-06', '', 0),
(127, 'zep-rock', 'let’s rock !', 'Keurly', 19, 0, 'public/assets/zep-rock.jpg', 'public/assets/zep-piscine.jpg', 'public/assets/zep-leshormones.jpg', '', '', '2015-03-06', 'rock, rebelle, yolo', 1),
(128, 'Dr Gore', 'Sketch concept for my future comic.', 'jacques', 20, 1, 'public/assets/gore.jpg', '', '', '', '', '2015-03-06', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `boards_has_categories`
--

CREATE TABLE IF NOT EXISTS `boards_has_categories` (
  `boards_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `boards_has_categories`
--

INSERT INTO `boards_has_categories` (`boards_id`, `categories_id`) VALUES
(118, 5),
(119, 8),
(120, 9),
(121, 2),
(121, 5),
(121, 8),
(122, 2),
(122, 3),
(122, 5),
(123, 7),
(124, 2),
(124, 5),
(124, 9),
(125, 2),
(125, 3),
(125, 8),
(126, 10),
(127, 9),
(128, 1),
(128, 6);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `slug`) VALUES
(1, 'Comics', NULL, 'comics'),
(2, 'Humor', NULL, 'humor'),
(3, 'Politic', NULL, 'politic'),
(4, 'Celebrities', '', 'celebrities'),
(5, 'Dark Humor', NULL, 'dark_humor'),
(6, 'Gore', NULL, 'gore'),
(7, 'Sensual', NULL, 'sensual'),
(8, 'Religious', NULL, 'religious'),
(9, 'Kids', NULL, 'kids'),
(10, 'Daily', NULL, 'daily'),
(11, 'Fantastic', NULL, 'fantastic'),
(12, 'Manga', NULL, 'manga');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `board_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `author`, `date`, `board_id`) VALUES
(35, 'Je suis Charlie !', 'Charlie', '2015-03-06 08:01:00', 119),
(36, 'Ahah ce Doge', 'Charlie', '2015-03-06 08:02:19', 120),
(37, 'Trop drôle', 'Nicolas ', '2015-03-06 08:02:33', 123),
(38, 'Ahaha ! very funny.', 'Annabelle', '2015-03-06 08:04:23', 118),
(39, 'N''est-ce pas', 'Charlie', '2015-03-06 08:04:55', 123),
(40, 'I love this dog.', 'Annabelle', '2015-03-06 08:04:58', 120),
(41, 'Sorry, but it''s not funy... and I don''t understand', 'Bathroom Quest', '2015-03-06 08:05:10', 123),
(42, 'C''est nul, aucun talent', 'LoadingArtist', '2015-03-06 08:08:46', 124),
(43, 'Ce n''est pas une bonne illustration cela', 'Bathroom Quest', '2015-03-06 08:12:50', 120),
(44, 'Hahaha Trop drôle les nazis\r\n', 'LoadingArtist', '2015-03-06 09:09:25', 121),
(45, 'En plus c''est pas cher !', 'jacques', '2015-03-06 09:19:02', 119),
(46, 'Titeuf c''est vraiment une très bonne bande dessinée.', 'Keurly', '2015-03-06 09:22:15', 127);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `filepath` text NOT NULL,
  `website` text NOT NULL,
  `url_twitter` text NOT NULL,
  `url_facebook` text NOT NULL,
  `url_linkdin` text NOT NULL,
  `description` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `interest` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `filepath`, `website`, `url_twitter`, `url_facebook`, `url_linkdin`, `description`, `city`, `interest`) VALUES
(8, 'MissJPM', 'julia.parrinello@hetic.net', '$2y$10$iuarkuiuok32543FEZfezeuuDYQSSki5Ddnw9H060EDWUtdjMUxH.', 'public/assets/acheter-jouet-pour-chat-pas-cher.jpg', '', '', '', '', 'Always inspired to invent stories and good designer I would try my hand at creating comic strips', 'Paris', 'humor, comics, daily'),
(9, 'Mteuahasan', 'matthieu.lachassagne@hetic.net', '$2y$10$iuarkuiuok32543FEZfezeT9kK.3SCnva6gBQBPIhA8fsSTIn0exq', 'public/assets/profil-pic.png', 'http://matthieulachassagne.com', '', '', '', '', 'Paris', ''),
(10, 'Oscar', 'osc.deloizy@gmail.com', '$2y$10$iuarkuiuok32543FEZfezeEaXRC6cv.tkpNMBMGPO/z5m0ldcAx62', '', '', '', '', '', '', '', ''),
(11, 'Matteo ', 'bath.quest@gmail.com', '$2y$10$iuarkuiuok32543FEZfeze2zz2MoNZoSk48A3Odc7sqyLXowILnJ2', '', '', '', '', '', '', '', ''),
(12, 'Bathroom Quest', 'BathroomQuest@gmail.com', '$2y$10$iuarkuiuok32543FEZfeze2zz2MoNZoSk48A3Odc7sqyLXowILnJ2', '', '', '', '', '', '', '', ''),
(13, 'Gadi', 'gadi.quest@gmail.com', '$2y$10$iuarkuiuok32543FEZfeze2zz2MoNZoSk48A3Odc7sqyLXowILnJ2', '', '', '', '', '', '', '', ''),
(14, 'Annabelle', 'annabelle.ruiz@live.fr', '$2y$10$iuarkuiuok32543FEZfeze2zz2MoNZoSk48A3Odc7sqyLXowILnJ2', 'public/assets/img-9868coooopiiiiiie.jpg', '', '', '', '', 'Je suis la plus jolie', 'Paris', 'Humor'),
(15, 'Large', 'dularge@dugros.com', '$2y$10$iuarkuiuok32543FEZfeze2zz2MoNZoSk48A3Odc7sqyLXowILnJ2', '', '', '', '', '', '', '', ''),
(16, 'Charlie', 'charlie@hotmail.fr', '$2y$10$iuarkuiuok32543FEZfezeuvEpCvVpuwJg0kR890S9Ktljw7vjzBq', '', '', '', '', '', '', '', ''),
(17, 'Nicolas ', 'Nico@vivelevert.com', '$2y$10$iuarkuiuok32543FEZfeze2zz2MoNZoSk48A3Odc7sqyLXowILnJ2', 'public/assets/sketch-520.jpg', '', '', '', '', '', '', ''),
(18, 'LoadingArtist', 'GregorCzaykowski@gmail.com', '$2y$10$iuarkuiuok32543FEZfeze2zz2MoNZoSk48A3Odc7sqyLXowILnJ2', '', '', ': https://twitter.com/LoadingArtist', '', '', 'I make the Loading Artist webcomic', 'Auckland', 'humor, dark, humor, politic'),
(19, 'Keurly', 'Keurly@gmail.com', '$2y$10$iuarkuiuok32543FEZfeze2zz2MoNZoSk48A3Odc7sqyLXowILnJ2', '', '', '', '', '', '', '', ''),
(20, 'jacques', 'alban.nogaret@gmail.com', '$2y$10$iuarkuiuok32543FEZfezeuMGDxvT7.t0ji8RK8ZEsFC6VnLXM3qy', '', '', '', '', '', '', '', ''),
(21, 'test', 'test@test.fr', '$2y$10$iuarkuiuok32543FEZfeze2zz2MoNZoSk48A3Odc7sqyLXowILnJ2', '', '', '', '', '', '', '', ''),
(22, 'nerfols', 'valentin.david7@gmail.com', '$2y$10$iuarkuiuok32543FEZfezeNfzhaNpzEsntQ/a.VU8loB5B4tZwes.', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `users_has_likes`
--

CREATE TABLE IF NOT EXISTS `users_has_likes` (
  `users_id` int(11) NOT NULL,
  `boards_id` int(11) NOT NULL,
  PRIMARY KEY (`users_id`,`boards_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users_has_likes`
--

INSERT INTO `users_has_likes` (`users_id`, `boards_id`) VALUES
(12, 123),
(14, 118),
(14, 120),
(16, 123),
(17, 123),
(18, 121),
(18, 124),
(18, 126),
(20, 118),
(20, 119),
(20, 121),
(20, 128);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

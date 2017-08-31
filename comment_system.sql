-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Version du serveur :  10.0.32-MariaDB

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `comment_system`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `user` varchar(64) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  `is_spam` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `user`, `text`, `date`, `post_id`, `is_spam`) VALUES
(1, 'naomi', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', '2017-08-29 00:00:00', 1, 0),
(2, 'naomi', 'ersefsdfsdfsdf', '2017-08-29 00:00:00', 1, 0),
(3, 'ui', 'fuck you', '2017-08-30 15:52:01', 1, 1),
(4, 'mena', 'zerzer', '2017-08-30 15:54:37', 1, 0),
(5, 'zerzer', '&lt;b&gt;fuck&lt;/b&gt; you &lt;b&gt;bitch&lt;/b&gt;', '2017-08-30 16:08:56', 1, 1),
(6, 'erzr', 'ssfdf', '2017-08-30 20:30:39', 4, 0),
(7, 'erzr', 'fsddddddddddd', '2017-08-30 20:30:46', 4, 0),
(8, 'sdffff', 'sdfdf', '2017-08-30 21:15:16', 4, 0),
(9, 'qsdqsd', 'qsdqd', '2017-08-30 21:15:26', 4, 0),
(10, 'test', 'test', '2017-08-30 21:15:34', 4, 0),
(11, 'live', 'live', '2017-08-30 21:16:00', 4, 0),
(12, 'ezr', '&lt;b&gt;fuck&lt;/b&gt; you', '2017-08-30 21:16:54', 4, 1),
(13, 'zerzer', '&lt;b&gt;fuck&lt;/b&gt;', '2017-08-30 21:17:52', 4, 1),
(14, 'ser', 'zer', '2017-08-30 21:30:03', 4, 0),
(15, 'uiert', '&lt;b&gt;fuck&lt;/b&gt; you', '2017-08-30 21:36:02', 4, 1),
(16, 'uiert', '&lt;b&gt;fuck&lt;/b&gt; you', '2017-08-30 21:36:04', 4, 1),
(17, 'zerzer', 'bema', '2017-08-30 23:04:04', 7, 0),
(18, 'uiii', '&lt;b&gt;fuck&lt;/b&gt;', '2017-08-30 23:11:51', 7, 1),
(19, 'qsd', 'qsds', '2017-08-30 23:51:25', 7, 0),
(20, 'qsd', 'qsd', '2017-08-30 23:51:34', 5, 0),
(21, 'sdfdsf', 'sdfsfsd', '2017-08-31 00:07:21', 7, 0),
(22, 'sdfsdsd', 'sdfsdf', '2017-08-31 00:51:58', 8, 0),
(23, 'neli', 'furtado', '2017-08-31 00:52:25', 8, 0),
(24, 'qsdqsd', 'Verum ad istam omnem orationem brevis est defensio. Nam quoad aetas M. Caeli dare potuit isti suspicioni locum, fuit primum ipsius pudore, deinde etiam patris diligentia disciplinaque munita. Qui ut huic virilem togam deditšnihil dicam hoc loco de me; tantum sit, quantum vos existimatis; hoc dicam, hunc a patre continuo ad me esse deductum; nemo hunc M. Caelium in illo aetatis flore vidit nisi aut cum patre aut mecum aut in M. Crassi castissima domo, cum artibus honestissimis erudiretur.', '2017-08-31 00:54:56', 10, 0),
(25, 'sxcxwc', 'wxcwxc', '2017-08-31 01:00:57', 11, 0),
(26, 'sxcxwc', '&lt;b&gt;fuck&lt;/b&gt;', '2017-08-31 01:01:16', 11, 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `author`, `content`) VALUES
(4, 'Lorem', 'In his tractibus navigerum nusquam visitur flumen sed in locis plurimis aquae suapte natura\r\n            calentes emergunt ad usus aptae multiplicium medelarum. verum has quoque regiones pari sorte Pompeius\r\n            Iudaeis domitis et Hierosolymis captis in provinciae speciem delata iuris dictione formavit.'),
(5, 'zerez', 'zerezr'),
(6, 'zerzer', 'zerzerzer'),
(7, 'eazeaze', 'azaaaaaaaaz'),
(8, 'sdfsdf', 'sdfsdf'),
(9, 'test', 'sdfsdfsdfsdf'),
(10, 'zema', 'lolo'),
(11, 'wcwxc', 'Verum ad istam omnem orationem brevis est defensio. Nam quoad aetas M. Caeli dare potuit isti suspicioni locum, fuit primum ipsius pudore, deinde etiam patris diligentia disciplinaque munita. Qui ut huic virilem togam deditšnihil dicam hoc loco de me; tantum sit, quantum vos existimatis; hoc dicam, hunc a patre continuo ad me esse deductum; nemo hunc M. Caelium in illo aetatis flore vidit nisi aut cum patre aut mecum aut in M. Crassi castissima domo, cum artibus honestissimis erudiretur.');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

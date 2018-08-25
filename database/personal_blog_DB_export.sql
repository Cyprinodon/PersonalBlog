-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 25 août 2018 à 06:16
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
-- Base de données :  `personal_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `excerpt` text,
  `content` text,
  `last_edit_timestamp` datetime NOT NULL,
  `moderator_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `moderator_article_fk` (`moderator_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`ID`, `title`, `excerpt`, `content`, `last_edit_timestamp`, `moderator_id`) VALUES
(1, 'Titre particulièrement explicite', '<p>Un résumé pour mettre fin à tous les résumés !</p>\r\n<p><em>(Sauf peut-être les plus intéressants)</em></p>', '<p>S\'il est vrai qu\'un titre se doit d\'être <em>explicite</em>, ainsi que les conventions d\'écriture le demandent, et que les résumés se doivent de n\'être ni trop long ni trop court de façon à ne point ennuyer le lecteur, l\'auteur pense cependant préférable de n\'en rien faire par <em>pure paresse intellectuelle</em>. Après tout, un article utilisé comme simple exemple n\'a aucunement besoin d\'être <em>intéressant</em> et/ou <em>bien écrit</em>.</p>', '2018-06-13 09:02:29', 1),
(2, 'À titre d\'exemple', '<p>En résumé : Un article écrit avec soin pour servir de témoin à l\'affichage sans défauts du contenu de la base de données.</p> ', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at odio facilisis, semper turpis eget, feugiat lacus. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean commodo elementum mattis. Nulla a hendrerit mi, a consequat ante. Praesent tincidunt turpis enim, a imperdiet urna elementum sit amet. Vivamus ultrices odio diam, eget tempor orci lobortis vitae. Vestibulum eu accumsan enim. Cras dui risus, porta ut tortor ut, pretium congue tortor. Vestibulum id venenatis magna, in faucibus turpis. Nam nisl mauris, malesuada non vestibulum ac, lobortis vel ipsum. Phasellus luctus felis at nisi posuere fermentum. Pellentesque semper urna ut ex accumsan, quis dapibus turpis eleifend. Aenean consequat lectus dui, at placerat nibh sagittis a. Quisque aliquam, ante sit amet sodales ullamcorper, magna nisl rhoncus ipsum, eu consectetur eros eros ac odio. Vivamus fringilla interdum congue.</p>\r\n<h3>Aegis nunca ante est</h3>\r\n<p>Donec nec ante augue. Donec rutrum ligula orci, eget interdum lectus aliquam sed. Quisque feugiat, ante vel tempor imperdiet, arcu tortor bibendum libero, ac mattis libero leo vitae justo. Suspendisse non justo luctus, pharetra sem at, pretium diam. Proin sed facilisis sapien. Phasellus facilisis auctor mi, sit amet suscipit sem. Donec et convallis odio. Ut eget ultrices turpis. Integer elementum consectetur quam, ac rhoncus nibh pharetra et. Vestibulum fringilla sem sit amet leo commodo condimentum. Curabitur nec tellus ac nulla dignissim porta. Quisque eleifend, odio non placerat maximus, velit libero interdum urna, ut volutpat sem velit id turpis.</p>\r\n<hr>\r\n<p>Etiam in pellentesque nunc. Phasellus convallis consequat lacinia. Nullam lobortis nunc vel ex accumsan efficitur. Nulla eu metus ut augue dictum pellentesque. Sed ac accumsan nisi, quis tristique nunc. Pellentesque ipsum sapien, congue ut magna et, porta laoreet augue. Nam gravida quam id consectetur fringilla. Proin luctus vulputate neque.</p>', '2018-06-13 09:17:52', 1),
(9, 'Un article écrit depuis le site !', 'Incroyable, la création et l\'édition d\'articles est enfin là. Ça fonctionne plutôt bien...', '<h3>Lorem ?</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam blandit cursus risus, et pulvinar ligula molestie semper. Nam non hendrerit ligula, in tincidunt diam. Etiam a dolor vel risus rutrum maximus. Pellentesque elementum elit et enim convallis, in hendrerit arcu tristique. Maecenas porta finibus ex in fermentum. In mollis rutrum porta. Fusce non molestie risus, eget pulvinar nulla. Sed vel lorem sit amet ipsum ultricies commodo. Ut commodo dictum lacus, sed fringilla ligula feugiat vitae. Nunc accumsan turpis vitae ligula scelerisque feugiat. Etiam fermentum, tortor et vehicula sodales, ipsum ante pellentesque metus, sit amet semper turpis velit in nisl. Praesent sit amet elementum dui. Sed elementum eros eu arcu luctus, ut lobortis nunc tincidunt.</p>\r\n\r\n<h3>Ipsum !</h3>\r\n<p>Quisque ac elit quam. Vestibulum consectetur diam odio, luctus elementum felis laoreet sit amet. Cras laoreet lacus eget eros suscipit, at commodo felis egestas. Nulla a malesuada velit. Ut quam est, aliquam a rutrum eget, ultricies ut nisl. Duis molestie tortor molestie nunc consequat porta. Mauris semper lacus metus, quis volutpat nunc malesuada vel. Donec elementum leo ut ex ultricies, ut sagittis quam blandit. Etiam tincidunt tortor molestie nunc iaculis, non maximus diam lacinia. Sed efficitur nibh sed fermentum viverra. Ut in nibh placerat, lobortis urna at, sollicitudin nunc. Vestibulum commodo sem vel tellus faucibus, quis elementum augue molestie. Praesent tellus mi, congue non tincidunt vitae, porta cursus velit.</p>', '2018-08-22 17:23:14', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `content` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `creation_timestamp` datetime NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `article_comment_fk` (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`ID`, `author`, `content`, `status`, `creation_timestamp`, `article_id`) VALUES
(1, 'Un lecteur concerné', 'Je trouve que la paresse est un très vilain défaut.', 'Validé', '2018-06-13 11:49:56', 1),
(2, 'Un homme heureux', 'J\'ai pu écrire un commentaire utile. Je suis trop content. Vive internet !', 'Refusé', '2018-06-13 11:49:56', 2),
(9, 'Grossier personnage', 'J\'te déteste, sale $#@!?', 'Refusé', '2018-08-24 16:15:06', 1),
(7, 'Florance_Boutnick', 'Bravo à toi d\'avoir réussi. Continue, j\'ai hâte de voir la suite !', 'Validé', '2018-08-24 16:04:41', 9);

-- --------------------------------------------------------

--
-- Structure de la table `moderator`
--

DROP TABLE IF EXISTS `moderator`;
CREATE TABLE IF NOT EXISTS `moderator` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_timestamp` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `moderator`
--

INSERT INTO `moderator` (`ID`, `login`, `first_name`, `last_name`, `password`, `signup_timestamp`) VALUES
(1, 'SuperAdministrateur', 'Super', 'Administrateur', '$2y$10$suv15zVoA5wTyN7UIboMiuSNuLmf6y3chZvhps3nF.qzUlaXnsA7m', '2018-07-03 11:17:47'),
(2, 'GerardHork', 'Gerard', 'Hork', '$2y$10$uJP4f8p7.yjZmCCZ95II9..qrn0LPVYRnA8uCTu3gbiSvpiCVoTT.', '2018-08-22 19:50:32'),
(4, 'SamuelJackson', 'Samuel', 'Jackson', '$2y$10$lWwXbv3Q/c.ZX74uaOgZeeQI7gHYEGZeiWK8vyr40gZJsEL4YAhbe', '2018-08-24 16:48:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

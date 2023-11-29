-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 29 nov. 2023 à 09:50
-- Version du serveur : 10.4.10-MariaDB
-- Version de PHP : 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `my_mvc_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_picture` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `com` text NOT NULL,
  `date_com` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `ForeignKey_CommentIdPicture_PictureId` (`id_picture`),
  KEY `FK_commentIdUser_UsersId` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=286 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `id_picture`, `id_user`, `com`, `date_com`) VALUES
(1, 2, 2, 'hgfds', '2023-11-02 14:31:30'),
(6, 2, 4, 'C\'est franchement pas mal', '2023-11-02 14:31:45'),
(31, 4, 4, 'C bo', '2023-11-02 14:32:02'),
(32, 4, 3, 'comme un lundi', '2023-11-02 14:32:08'),
(34, 1, 4, 'Un jour je vous montrerez', '2023-11-02 14:32:19'),
(35, 1, 3, 'Lorem ipsum dolor sit, amet consectetur Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum animi assumenda obcaecati, quas dolore magnam ullam eum id molestias consequatur nostrum illo totam quisquam delectus quibusdam praesentium nesciunt mollitia modi?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum animi assumenda obcaecati, quas dolore magnam ullam eum id molestias consequatur nostrum illo totam quisquam delectus quibusdam praesentium nesciunt mollitia modi?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum animi assumenda obcaecati, quas dolore magnam ullam eum id molestias consequatur nostrum illo totam quisquam delectus quibusdam praesentium nesciunt mollitia modi?adipisicing elit. Ipsum animi assumenda obcaecati, quas dolore magnam ullam eum id molestias consequatur nostrum illo totam quisquam delectus quibusdam praesentium nesciunt mollitia modi?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum animi assumenda obcaecati, quas dolore magnam ullam eum id molestias consequatur nostrum illo totam quisquam delectus quibusdam praesentium nesciunt mollitia modi?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum animi assumenda obcaecati, quas dolore magnam ullam eum id molestias consequatur nostrum illo totam quisquam delectus quibusdam praesentium nesciunt mollitia modi?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum animi assumenda obcaecati, quas dolore magnam ullam eum id molestias consequatur nostrum illo totam quisquam delectus quibusdam praesentium nesciunt mollitia modi?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum animi assumenda obcaecati, quas dolore magnam ullam eum id molestias consequatur nostrum illo totam quisquam delectus quibusdam praesentium nesciunt mollitia modi?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum animi assumenda obcaecati, quas dolore magnam ullam eum id molestias consequatur nostrum illo totam quisquam delectus quibusdam praesentium nesciunt mollitia modi?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum animi assumenda obcaecati, quas dolore magnam ullam eum id molestias consequatur nostrum illo totam quisquam delectus quibusdam praesentium nesciunt mollitia modi?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum animi assumenda obcaecati, quas dolore magnam ullam eum id molestias consequatur nostrum illo totam quisquam delectus quibusdam praesentium nesciunt mollitia modi?', '2023-11-02 14:32:24'),
(48, 9, 4, 'coucou', '2023-11-02 14:48:32'),
(49, 1, 4, 'c\'est beau', '2023-11-02 14:55:57'),
(50, 16, 2, 'sympa ', '2023-11-02 14:56:35'),
(72, 1, 4, 'Vous savez je ne pense pas qu\'il y est de bonnes ou de mauvaises situations', '2023-11-03 14:07:46'),
(76, 5, 4, 'c\'est trop bien', '2023-11-03 18:05:34'),
(77, 2, 2, 'c\'est beauuuu', '2023-11-03 18:09:45'),
(80, 5, 2, 'Belle Bête', '2023-11-07 15:07:08'),
(83, 5, 2, 'Hello', '2023-11-07 15:10:40'),
(85, 23, 2, 'prems\r\n', '2023-11-09 11:34:39'),
(86, 7, 2, 'hello', '2023-11-09 11:39:46'),
(90, 9, 2, 'bye bye', '2023-11-09 15:23:32'),
(92, 35, 3, 'Game !', '2023-11-10 10:37:42'),
(94, 9, 3, 'hello', '2023-11-10 11:43:00'),
(99, 37, 3, 'hello', '2023-11-10 12:15:35'),
(100, 37, 3, 'coucou', '2023-11-10 12:19:10'),
(141, 23, 3, 'cailloux', '2023-11-10 13:30:56'),
(142, 23, 3, '', '2023-11-10 13:31:00'),
(143, 23, 3, '', '2023-11-10 13:31:00'),
(145, 23, 3, 'cailloux', '2023-11-10 13:31:18'),
(146, 35, 3, 'cailloux', '2023-11-10 13:32:39'),
(147, 35, 3, 'cailloux', '2023-11-10 13:32:48'),
(148, 35, 3, 'hemoiu', '2023-11-10 13:37:14'),
(150, 38, 27, 'nice', '2023-11-11 17:55:18'),
(151, 34, 27, 'cute', '2023-11-11 21:56:41'),
(152, 41, 27, 'les chevaliers du zodiahahkeuh', '2023-11-11 21:57:15'),
(198, 35, 2, '', '2023-11-13 09:03:42'),
(200, 41, 2, 'hello', '2023-11-15 09:13:35'),
(201, 44, 2, 'gfgfgfg', '2023-11-15 11:17:45'),
(202, 44, 2, 'gfgfgfg', '2023-11-15 11:17:47'),
(203, 44, 2, 'fd', '2023-11-15 11:17:53'),
(204, 44, 2, 'vcvc', '2023-11-15 11:18:00'),
(213, 41, 2, 'coucou', '2023-11-17 15:08:36'),
(214, 7, 31, 'long voyage', '2023-11-24 10:52:29'),
(285, 40, 2, 'coucou', '2023-11-28 11:42:41');

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_follow` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_FriendsIdFollow_UsersIdUsers` (`id_follow`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `friends`
--

INSERT INTO `friends` (`id`, `id_user`, `id_follow`) VALUES
(1, 2, 3),
(43, 27, 7),
(44, 27, 6),
(106, 27, 2),
(107, 2, 6),
(108, 2, 5),
(109, 2, 26),
(110, 2, 4),
(112, 2, 28),
(113, 2, 34),
(114, 2, 27);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_picture` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_LikesIdPicture_PictureId` (`id_picture`),
  KEY `id_user` (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=268 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `id_picture`, `id_user`) VALUES
(15, 9, 4),
(21, 4, 4),
(23, 16, 4),
(24, 2, 4),
(25, 7, 4),
(35, 5, 4),
(53, 23, 26),
(85, 30, 2),
(88, 16, 26),
(90, 32, 26),
(161, 9, 2),
(168, 2, 2),
(169, 3, 2),
(170, 5, 2),
(174, 8, 2),
(183, 7, 3),
(186, 8, 3),
(188, 3, 3),
(202, 16, 3),
(203, 9, 3),
(207, 37, 3),
(208, 35, 3),
(209, 32, 3),
(210, 1, 3),
(212, 16, 2),
(214, 32, 2),
(220, 34, 27),
(223, 37, 27),
(224, 23, 27),
(225, 16, 27),
(227, 8, 27),
(229, 39, 27),
(230, 35, 27),
(238, 42, 2),
(241, 44, 2),
(244, 34, 2),
(246, 40, 2),
(247, 39, 2),
(248, 35, 2),
(250, 32, 31),
(253, 39, 31),
(255, 34, 31),
(256, 16, 31),
(257, 9, 31),
(258, 41, 2),
(260, 23, 2),
(261, 1, 2),
(262, 5, 3),
(263, 6, 3),
(264, 6, 2),
(265, 4, 2),
(266, 7, 27),
(267, 53, 2);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `src` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_PhotoIdUser_usersId` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id`, `id_user`, `src`) VALUES
(3, 2, 'https://pbs.twimg.com/profile_images/790274701276901376/XzILbOXC_400x400.jpg'),
(4, 3, 'https://www.coeurcoeur.fr/wp-content/uploads/2021/01/Les-5-races-de-chats-les-plus-moches-du-monde.jpg'),
(5, 4, 'https://www.santevet.com/upload/admin/images/article/Chien%202/Actualit%C3%A9_chien/chien%20le%20plus%20laid%20du%20monde.jpg'),
(6, 5, 'https://i.pinimg.com/236x/34/cb/a0/34cba0cb540843ff138761e9a464a213.jpg'),
(7, 6, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRzhf3WDDbxo2aOlHiRwCHY9WhJDfzLoSBvkw&usqp=CAU'),
(8, 2, './uploads/Didi2profilpic1699736532.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actif` varchar(80) NOT NULL DEFAULT 'oui',
  `id_user` int(11) NOT NULL,
  `src` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_pictureIdUser_userId` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id`, `actif`, `id_user`, `src`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'oui', 2, 'https://static.nationalgeographic.fr/files/styles/image_3200/public/Iceland-mount-Kirkjufell-aurora.adapt_.1190.1.jpg?w=1190&h=793', 'Aurores Boréales ', 'On voit des aurores en Islande de septembre à mars même si quelques chanceux ont parfois l\'occasion d\'en observer dès le mois d\'août et jusqu\'au mois d\'avril.', '2023-11-08 11:20:57', '2023-10-23 22:00:00'),
(2, 'oui', 2, 'https://www.travelandleisure.com/thmb/1ZNi1aFJlzZpGXf0vOqdmj_U5VE=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/TAL-header-vik-reykjavik-iceland-summer-CRUISEICELAND0523-da5be9587e3a4cb1b5efa8ab0d8b6dc8.jpg', 'Vik, Village d\'islande', 'Vík est une localité située sur la côte sud de l\'Islande. En 2011, on comptait 291 habitants.', '2023-11-08 11:21:07', '2023-11-03 09:06:56'),
(3, 'oui', 4, 'https://lp-cms-production.imgix.net/2020-11/LPT1117_007.jpg?auto=format&w=1440&h=810&fit=crop&q=75', 'Jökulsárlón, Le lac de glace', 'Jökulsárlón est une lagune glaciaire à la limite du parc national de Vatnajökull, dans le sud-est de l\'Islande. Ses eaux bleues paisibles sont parsemées d\'icebergs provenant du glacier Breiðamerkurjökull environnant.', '2023-11-08 11:21:13', '2023-11-03 18:06:07'),
(4, 'oui', 4, 'https://images.newscientist.com/wp-content/uploads/2019/09/02140648/1-vatnajokull-ice-cave-150131_mg_3748.jpg?width=1200', 'Grotte de glace glagla', 'Explorez les profondeurs d\'un glacier en Islande avec cette incroyable visite de grotte glaciaire Katla au Mýrdalsjökull.', '2023-11-08 11:21:14', '2023-11-03 07:57:57'),
(5, 'oui', 3, 'https://global.hurtigruten.com/globalassets/photos/destinations/iceland/wildlife/icelandic-horses-james-mcgill.jpg?width=1900&height=950&center=0.45,0.53&transform=DownResizeCrop', 'Bestiaire', 'Découvrez les animaux en Islande et notamment ceux que vous pouvez voir lors de votre voyage sur la terre de glace et de feu: macareux, baleines, phoques, chevaux...', '2023-11-08 11:21:16', '2023-11-02 10:59:54'),
(6, 'oui', 3, 'https://static.voyage-islande.fr/posts/368/368-1-1115x743.jpg', 'Cascade Skogafoss', 'La Skógafoss est une cascade située sur la rivière Skógá, dans le petit village de Skógar, dans le sud de l\'Islande. La rivière Skógá se jette de ses falaises et tombe de 62 mètres en formant une chute d\'une largeur de quelque 25 mètres. ', '2023-11-08 11:21:18', '2023-10-23 22:00:00'),
(7, 'oui', 2, 'https://images.unsplash.com/photo-1610123598147-f632aa18b275?auto=format&fit=crop&q=80&w=1000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aWNlbGFuZCUyMGxhbmRzY2FwZXxlbnwwfHwwfHx8MA%3D%3D', 'La route 1', 'La route 1 ou route circulaire est la principale route d\'Islande, d\'une longueur de 1 339 kilomètres. Elle fait le tour du pays en suivant grossièrement le littoral.', '2023-11-08 11:21:21', '2023-10-23 22:00:00'),
(8, 'oui', 2, 'https://www.insightvacations.com/media/cb3dcp1b/natural-wonders-iceland-guided-tour-14.jpg', 'Geysir le geyser', 'Geysir est le geyser islandais qui a donné son nom à tous les autres, et dont le terme vient du verbe islandais gjósa signifiant « jaillir ».', '2023-11-08 11:21:26', '2023-11-03 07:31:25'),
(9, 'oui', 2, 'https://guidetoiceland.imgix.net/354484/x/0/blue-lagoon-en-islande-guide-complet-du-lagon-bleu-6?ixlib=php-3.3.0&w=883', 'Blue Lagoon Islande', 'Le Lagon bleu, en islandais Bláa Lónið, est le nom d\'une station thermale située dans le sud-ouest de l\'Islande', '2023-11-08 11:21:29', '2023-11-02 09:41:56'),
(16, 'oui', 4, 'https://bustravel.is/wp-content/uploads/2023/10/Eyjafjallajokull-glacier-volcano-Eruption-in-2010-viewing-from-the-sky-copy.jpg', 'Eyjafjallajokull Volcan et Glacier', 'L\'Eyjafjallajökull est une calotte glaciaire du Sud de l\'Islande. D\'une superficie de 78 km² environ, il est le sixième plus grand glacier du pays sur les treize calottes glaciaires que compte l\'Islande.', '2023-11-08 11:21:30', '2023-11-03 07:32:24'),
(23, 'oui', 2, 'https://static.voyage-islande.fr/posts/361/361-1115x743.jpg', 'Gullfoss, La double Cascade !', 'La Gullfoss, toponyme islandais signifiant littéralement en français « les chutes dorées », est une cascade d\'Islande située sur la Hvítá, dans le sud-ouest du pays. Elle est composée de deux sauts dont un de 21 mètres de hauteur.', '2023-11-08 11:21:34', '2023-11-07 15:55:31'),
(27, 'non', 26, 'https://bustravel.is/wp-content/uploads/2023/10/Eyjafjallajokull-glacier-volcano-Eruption-in-2010-viewing-from-the-sky-copy.jpg', 'gougug', 'fvoufojf', '2023-11-08 11:34:52', '2023-11-08 11:28:03'),
(28, 'non', 26, 'https://bustravel.is/wp-content/uploads/2023/10/Eyjafjallajokull-glacier-volcano-Eruption-in-2010-viewing-from-the-sky-copy.jpg', 'fdsqdfg', 'gfdzefg', '2023-11-08 12:04:54', '2023-11-08 11:39:52'),
(29, 'non', 2, 'https://bustravel.is/wp-content/uploads/2023/10/Eyjafjallajokull-glacier-volcano-Eruption-in-2010-viewing-from-the-sky-copy.jpg', 'fdsqsd', 'fdsdfda', '2023-11-09 12:34:25', '2023-11-09 12:34:15'),
(30, 'non', 2, './uploads/Didi1699537849.jpeg', 'ghjhgfds', 'hgfdsdfgh,hg', '2023-11-09 13:57:00', '2023-11-09 13:50:49'),
(31, 'non', 2, './uploads/Didi1699538188.png', 'fghgfd', 'hgfdsdfg', '2023-11-09 13:56:56', '2023-11-09 13:56:28'),
(32, 'oui', 26, './uploads/Mi-laine1699538714.jpeg', 'Albert', 'Albert le dev', '2023-11-09 14:05:14', '2023-11-09 14:05:14'),
(33, 'non', 3, './uploads/Wiwi1699539525.jpeg', 'gfdsqsdf', 'gfdsqdfg', '2023-11-09 14:19:32', '2023-11-09 14:18:45'),
(34, 'oui', 2, 'https://media.tenor.com/MYL0JUb9bYMAAAAC/adventure-time-gunter.gif', ' Les Secrets des Terres Gelées d\'Ooo', 'Salut les p\'tits pingouins et amateurs d\'aventures glacées ! C\'est moi, Gunther, votre guide imperturbable à travers les terres gelées d\'Ooo. Aujourd\'hui, je vous emmène dans un voyage palpitant au cœur des mystères des régions glacées. Préparez-vous à glisser sur la glace et à plonger dans le frisson de l\'inconnu !\r\n', '2023-11-15 11:48:46', '2023-11-15 11:48:46'),
(35, 'non', 27, './uploads/biboule deneigeHaiku php engagé1699671485.jpeg', 'Haiku php engagé', 'Code en lambeaux flotte,\r\nPHP pleure dans mes scripts,\r\nDéveloppeur honteux.', '2023-11-24 15:12:51', '2023-11-11 02:58:05'),
(36, 'non', 2, '', '', '', '2023-11-11 20:36:27', '2023-11-11 20:36:09'),
(37, 'non', 27, 'https://media.tenor.com/MYL0JUb9bYMAAAAC/adventure-time-gunter.gif', 'SDFGH', 'DFGHN', '2023-11-11 21:52:56', '2023-11-11 12:26:23'),
(38, 'non', 27, './uploads/biboule deneigeSDFDSQSDF1699705679.jpeg', 'SDFDSQSDF', 'FDSQSDFGFDS', '2023-11-11 21:53:01', '2023-11-11 12:27:59'),
(39, 'oui', 5, './uploads/Mc ManuTraverser la rue1699738728.jpeg', 'Traverser la rue', 'Comme quoi on peut traverser la rue et trouver plus que du travail, on peut trouver aussi la gloire lol', '2023-11-11 21:38:48', '2023-11-11 21:38:48'),
(40, 'oui', 6, './uploads/MartinoBonsoir à tous1699739053.jpeg', 'Bonsoir à tous je suis un cheval', 'Enfin un nouveau site trop cool pour faire valoir ma collection de photos de cheval moche', '2023-11-24 15:14:22', '2023-11-24 15:14:22'),
(41, 'non', 7, './uploads/BébertBientot dans ton PMU1699739301.jpeg', 'Bientot dans ton PMU', 't\'aime les moshpit ? Alors vient au PMU du village de jeuvieille-la-souche pour pogoter avec les pilier de bar', '2023-11-24 15:11:48', '2023-11-11 21:48:21'),
(42, 'non', 2, './uploads/DidiUltimate Battle bros1700035739.png', 'Ultimate Battle bros', 'Bientot dans vos boutiques', '2023-11-15 09:08:08', '2023-11-15 08:08:59'),
(43, 'non', 2, './uploads/Didifdsdf1700036970.png', 'fdsdf', 'fdsdf', '2023-11-15 08:29:44', '2023-11-15 08:29:30'),
(44, 'non', 2, './uploads/Didiphoto test1700046703.png', 'photo test', 'coucou', '2023-11-15 11:18:55', '2023-11-15 11:11:43'),
(51, 'non', 2, './uploads/DidiPlanète Mars1700839117.jpeg', 'Planète Mars', 'Une jolie photo de la planète Mars', '2023-11-24 15:19:57', '2023-11-24 15:18:37'),
(52, 'non', 2, './uploads/DidiPlanète Mars1700839421.jpeg', 'Planète Mars', 'Encore une jolie photo de la planète Mars et elle est rouge', '2023-11-24 15:25:37', '2023-11-24 15:25:28'),
(53, 'oui', 2, './uploads/DidiMars1701096502.jpeg', 'Mars', 'Mars est la quatrième planète du Système solaire par ordre croissant de la distance au Soleil et la deuxième par ordre croissant de la taille et de la masse. Son éloignement au Soleil est compris entre 1,381 et 1,666 UA, avec une période orbitale de 669,58 jours martiens.', '2023-11-27 14:48:22', '2023-11-27 14:48:22');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` int(11) DEFAULT 0,
  `id_photo` int(11) DEFAULT 3,
  `firstname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `src_photo` text DEFAULT './uploads/profiluserdefault.jpg',
  `src_banner` text DEFAULT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_UsersIdPhoto_PhotoId` (`id_photo`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `admin`, `id_photo`, `firstname`, `name`, `pseudo`, `gender`, `mail`, `password`, `src_photo`, `src_banner`, `date_create`) VALUES
(2, 1, 3, 'Diégo', 'Mazenc', 'Didi', 'homme', 'diego.mazenc@gmail.com', '$2y$10$v11UEBcQwaNHHGOoQ6LOPuuE8Gb8Adyg5Ew3dVy1o8Wm2YIRdvxP2', './uploads/Didi2profilpic1701251094.jpeg', './uploads/Didi2bannerpic1701084670.jpeg', '2023-11-02 13:17:07'),
(3, 0, 4, 'Will', 'Smith', 'Wiwi', 'homme', 'willsmith@gmail.com', '$2y$10$LVv/MGziT/bxbMsjfw5i9uyHiPCdvJv8biTbjmfE9O/pIy7/XCvHK', './uploads/Wiwi3profilpic1699738357.jpeg', NULL, '2023-11-02 14:21:30'),
(4, 0, 5, 'Jean-Luc', 'Mélenchon', 'JL-mel', 'homme', 'jlmech@mail.fr', '$2y$10$EZQ.8J9lcB/AH7rzhR1D7OxEdB5kZz1XGnqirdkzsH6SUA1lq6IqK', './uploads/JL-mel4profilpic1699738459.jpeg', NULL, '2023-11-02 14:23:04'),
(5, 0, 6, 'Emmanuel', 'Macaron', 'Mc Manu', 'autres', 'macrondu91@gmail.com', '$2y$10$v6rRJW/hVgVshejDitx/WeYgkQtnhLYGmtBP/XCKrIZCFF9PpaXWK', './uploads/Mc Manu5profilpic1699738550.jpeg', NULL, '2023-11-03 09:32:36'),
(6, 0, 7, 'François', 'Martin', 'Martino', 'homme', 'francoismartin@gmail.com', '$2y$10$/PJJzRzvCzbmTLQrDGda/evdUy6zXpMuOxiSr3iDvpPDXzy/k9m4K', './uploads/Martino6profilpic1699738940.jpeg', NULL, '2023-11-03 09:40:06'),
(7, 0, 3, 'Bernard', 'Minet', 'Bébert', 'homme', 'clubernard@mail.fr', '$2y$10$EHsTxsbt5TGEwDOaY0cRke36hfxFhqI7Xqa.ZChCVInS6NgjwXLki', './uploads/Bébert7profilpic1699739170.jpeg', NULL, '2023-11-03 11:02:30'),
(26, 1, 3, 'Mylène', 'Farmer', 'Mi-laine', 'autres', 'farmer@mail.fr', '$2y$10$.cgWczKdzXnWlix8z6kIeOwUSYlNS282fQQF7iiw5R1TjNI4HR8s.', './uploads/Mi-laine26profilpic1699739467.jpeg', NULL, '2023-11-08 09:55:20'),
(27, 1, 7, 'BIbi', 'deneige', 'Bébouh', 'autres', 'contact.sabrinaa@gmail.com', '$2y$10$GBJx.rvdjTVfh/iidvw16uVceTos.0PtIbx3vhqh4.3AXfnUlILD2', './uploads/Bébouh27profilpic1699739531.jpeg', NULL, '2023-11-11 03:51:02'),
(28, 0, 3, 'Mickeal', 'Jackson', 'Mika', 'homme', 'jackson@mail.com', '$2y$10$g72B6tbdTAj4Uei/RPsg1O/hLT7h46rytbVeuVqx/BpI3Q7JA/10q', './uploads/profiluserdefault.jpg', NULL, '2023-11-15 08:23:17'),
(29, 0, 3, 'Jean-François', 'Millet', 'Millet', 'homme', 'jeanfrancois@millet.fr', '$2y$10$crIpW/iapwM07ocf9/KlDuE7QdIXQ6dQoG5iyAOnVFO7yYQa/6WIW', './uploads/profiluserdefault.jpg', NULL, '2023-11-24 11:33:43'),
(30, 0, 3, 'Claude', 'Monet', 'Cloclo', 'homme', 'claude@monet.fr', '$2y$10$zBMMZUmm8srqpbl7dx6QX.mBg93xdsJviqGpoDZ0tcJx77KvjFZhm', './uploads/profiluserdefault.jpg', NULL, '2023-11-24 11:38:11'),
(31, 0, 3, 'Eugène', 'Delacroix', 'Eugène', 'homme', 'eugene@delacroix.fr', '$2y$10$VE8rcFjEAbzGfdErLQM4zOyGBRkdasECCszhtv..ieo/lb5h3m4h2', './uploads/profiluserdefault.jpg', NULL, '2023-11-24 11:40:29'),
(32, 0, 3, 'Théodore', 'Géricault', 'Méduse', 'homme', 'theodore@gericault.fr', '$2y$10$85ixqrBX9l8sw5i/ZrvYBu2Z07x77d16Fa5z0c1Mzg/66qB/DxoJG', './uploads/profiluserdefault.jpg', NULL, '2023-11-24 15:08:25'),
(33, 0, 3, 'Léonardo', 'Dicaprio', 'Léo', 'homme', 'leonardo@dicaprio.fr', '$2y$10$sGot5P/pYA10wZN5OTjfeOOMMmkWj4Er4JDlpCQn1C0lmK6XefYQa', './uploads/profiluserdefault.jpg', NULL, '2023-11-24 16:44:08'),
(34, 0, 3, 'Salvador', 'Dali', 'Salva', 'homme', 'salvador@dali.com', '$2y$10$1cmLeWnJCJqiEdttzjWITO8rMv.GYJHvQYX.lx4R9oYOADbl8Boh2', './uploads/profiluserdefault.jpg', NULL, '2023-11-27 09:54:48');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `FK_PhotoIdUser_usersId` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `FK_pictureIdUser_userId` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_UsersIdPhoto_PhotoId` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

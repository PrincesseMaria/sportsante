-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Juin 2017 à 22:33
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sportsante`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

CREATE TABLE `abonnement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datedebut` datetime NOT NULL,
  `datefin` datetime NOT NULL,
  `nombreseance` int(11) NOT NULL,
  `prixseance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `abonnement`
--

INSERT INTO `abonnement` (`id`, `user_id`, `datedebut`, `datefin`, `nombreseance`, `prixseance`) VALUES
(15, 1, '2017-06-03 19:50:52', '2018-06-03 19:50:52', 150, 75),
(16, 2, '2017-06-03 21:27:15', '2018-06-03 21:27:15', 18, 50),
(17, 18, '2017-06-13 22:02:57', '2018-06-13 22:02:57', 14, 35);

-- --------------------------------------------------------

--
-- Structure de la table `adresse_user`
--

CREATE TABLE `adresse_user` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `nom` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpostale` int(11) NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `adresse_user`
--

INSERT INTO `adresse_user` (`id`, `utilisateur_id`, `nom`, `prenom`, `adresse`, `cpostale`, `ville`, `pays`) VALUES
(3, 2, 'test3', 'test3', '60 strasbour', 97222, 'Paris', 'Ville'),
(4, 2, 'test5', 'test5', '60 b avenue de colmar', 68100, 'Mulhouse', 'France'),
(5, 1, 'Dioni', 'oumar', '60 b avenue de colmar', 68100, 'Mulhouse', 'France'),
(6, 15, 'ouakour', 'hamza', '20 quai des cigognes', 68200, 'mulhouse', 'france'),
(7, 18, 'a', 'a', 'rues de rien', 18, 'mulhouse', 'france'),
(8, 18, 'aa', 'zzz', 'fffd', 68100, 'Mulhouse', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `category_nom`) VALUES
(1, 'Cardio'),
(3, 'Musculation');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `commande_intitule` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `commande_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `user_id`, `commande_intitule`, `commande_date`) VALUES
(1, 1, 'ref', '2017-06-06 23:10:42'),
(2, 1, 'ref', '2017-06-07 20:31:36'),
(3, 2, '593b182e6f34009-06-2017', '2017-06-09 21:50:38'),
(4, 1, '59405f7a9c09413-06-2017', '2017-06-13 21:56:10'),
(5, 18, '5940608e3b4fd13-06-2017', '2017-06-13 22:00:46');

-- --------------------------------------------------------

--
-- Structure de la table `commande_materiel`
--

CREATE TABLE `commande_materiel` (
  `id` int(11) NOT NULL,
  `materiel_id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `quantite_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `commande_materiel`
--

INSERT INTO `commande_materiel` (`id`, `materiel_id`, `commande_id`, `quantite_commande`) VALUES
(3, 22, 2, 1),
(4, 23, 2, 1),
(5, 22, 3, 1),
(6, 25, 4, 6),
(7, 26, 4, 1),
(8, 23, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `creneau`
--

CREATE TABLE `creneau` (
  `id` int(11) NOT NULL,
  `seance_id` int(11) NOT NULL,
  `heured_creneau` time NOT NULL,
  `heuref_creneau` time NOT NULL,
  `nbplace_creneau` int(11) NOT NULL,
  `nomActivite_creneau` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `creneau`
--

INSERT INTO `creneau` (`id`, `seance_id`, `heured_creneau`, `heuref_creneau`, `nbplace_creneau`, `nomActivite_creneau`) VALUES
(15, 3, '09:00:00', '10:00:00', 7, 'ABDO'),
(16, 3, '10:15:00', '11:00:00', 11, 'Natation'),
(17, 3, '11:00:00', '12:00:00', 11, 'Natation'),
(24, 3, '12:15:00', '13:00:00', 20, 'Cardio'),
(25, 3, '13:00:00', '14:00:00', 56, 'Musculation'),
(26, 3, '14:05:00', '15:00:00', 55, 'ABDO');

-- --------------------------------------------------------

--
-- Structure de la table `creneau_user`
--

CREATE TABLE `creneau_user` (
  `creneau_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `creneau_user`
--

INSERT INTO `creneau_user` (`creneau_id`, `user_id`) VALUES
(15, 1),
(16, 1);

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `nom`, `prenom`, `adresse`) VALUES
(1, 'oumar', 'oumar', 'oumarsmall@gmail.com', 'oumarsmall@gmail.com', 1, NULL, '$2y$13$gGnm9Fg64SNNCDwY4HebfuEr3xhE.avXobyBZ6Nm/4K3jZS3w9ezK', '2017-06-13 18:32:15', NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 'DIONI', 'Oumar', ''),
(2, 'testot', 'testot', 'oumardioni@outlook.fr', 'oumardioni@outlook.fr', 1, NULL, '$2y$13$If5IhSX6SXzNSSjpuoADC.ov8moNSVAzSWN6FewrnEtGRtPg7ANDS', '2017-06-12 18:43:14', NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 'ott', 'marsheim', '60 b avenue de colmar 68100 Mulhouse'),
(15, 'ouakour', 'ouakour', 'dionioumar@gmail.com', 'dionioumar@gmail.com', 1, NULL, '$2y$13$O7VKMxFXp5ni3mVsjx04LeaLte9jjlpQgfr/EpHPiYjsSC0G6E03W', '2017-05-30 08:03:05', 'I7sRhCFW-1Z9zNHAK1bbI6NDaaML1AXR-GNPjqWu8dk', '2017-06-12 12:50:37', 'a:0:{}', 'ouakour', 'hamza', '20 quai des cigognes 68200'),
(16, 'test8', 'test8', 'test1@yopmail.com', 'test1@yopmail.com', 1, NULL, '$2y$13$UMGOSxfjMRwaIt6veT62tuzLhnFgx8VCqE9GYc0TiCmP23A8JkcH.', '2017-06-12 12:56:08', 'KzfQPvAO8TNXkfvcqCEJa_bR05lRkOswiJB7bj50WTI', '2017-06-12 12:56:30', 'a:0:{}', 'test', 'test', '60 b avenue de colmar'),
(17, 'test', 'test', 'test@tes.com', 'test@tes.com', 1, NULL, '$2y$13$34LtSQ93TRnIWZ2xTBF/bubGOwzVcQSC1fUEwBt0e1B3pq3ao7wBm', '2017-06-13 01:09:18', NULL, NULL, 'a:0:{}', 'test88', 'test88', '60 b avenue de colmar'),
(18, 'aaa', 'aaa', 'a@gmail.com', 'a@gmail.com', 1, NULL, '$2y$13$67i4YCq2wU422g9tFJZtauXQmkbPhDcd8rlhe7PnAixLtguqqJG1i', '2017-06-13 21:57:54', NULL, NULL, 'a:0:{}', 'a', 'a', 'rue des cigognes'),
(19, 'omar', 'omar', 'oooo@yaho.fr', 'oooo@yaho.fr', 1, NULL, '$2y$13$o16rLciXpvWbbt3mpA4QrecqvOXBp9ngn.QKDNrkHrRSlUYug0U7e', '2017-06-13 22:06:00', NULL, NULL, 'a:0:{}', 'test', 'test', '60 b avenue de colmar'),
(20, 'test00', 'test00', 'test@te.com', 'test@te.com', 1, NULL, '$2y$13$vI84tUgfIRLPhbsL3T3AB.X0uCUzjPqYNPQKBmCZMYPgEEUAKv2Mm', '2017-06-13 22:08:27', NULL, NULL, 'a:0:{}', 'oma', 'omar', '60 b avenue de colmar');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `url`, `alt`) VALUES
(3, 'jpeg', 'acceuil.jpg'),
(4, 'jpeg', 'image-de-velo-2.jpg'),
(5, 'jpeg', 'salle-musculation-grenoble.jpg'),
(6, 'jpeg', '1.jpg'),
(7, 'jpeg', '1.jpg'),
(8, 'jpeg', 'salle-musculation-grenoble.jpg'),
(9, 'jpeg', 'salle-musculation-grenoble.jpg'),
(10, 'jpeg', 'image-de-velo-2.jpg'),
(11, 'jpeg', 'image-de-velo-2.jpg'),
(13, 'jpeg', 'big.jpg'),
(14, 'jpeg', 'big1.jpg'),
(15, 'jpeg', '00_big.jpg'),
(16, 'jpeg', '001_big.jpg'),
(18, 'jpeg', '141big.jpg'),
(19, 'jpeg', '001_big.jpg'),
(20, 'jpeg', '00_big.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `datelivraison` datetime NOT NULL,
  `dateretour` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `livraison`
--

INSERT INTO `livraison` (`id`, `commande_id`, `datelivraison`, `dateretour`) VALUES
(2, 2, '2017-06-12 00:00:00', '2017-06-25 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `id` int(11) NOT NULL,
  `materiel_nom` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `materiel_marque` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `materiel_prixlocation` double NOT NULL,
  `quantite` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `materiel_tva` double NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `materiel`
--

INSERT INTO `materiel` (`id`, `materiel_nom`, `materiel_marque`, `materiel_prixlocation`, `quantite`, `category_id`, `materiel_tva`, `image_id`, `description`) VALUES
(22, 'Cecofit', 'V1700120', 23, 2, 1, 0.2, 13, '<p>Obtenez d&egrave;s maintenant le&nbsp;<strong>v&eacute;lo de spinning Fitness 7008</strong>&nbsp;et commencez &agrave; faire du sport &agrave; la maison avec des r&eacute;sultats professionnels !&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Volant d&rsquo;inertie de 16 kg</li>\r\n	<li>Amortisseur dans le cadre en acier pour un plus grand confort</li>\r\n	<li>Transissiom par cha&icirc;ne et pignon fixe</li>\r\n	<li>Syst&egrave;me Silence Fit (mieux de p&eacute;dalage et plus silencieux)</li>\r\n	<li>Niveaux de r&eacute;sistance variables</li>\r\n	<li>&Eacute;cran LCD (temps, vitesse, distance et calories)</li>\r\n	<li>Cadre avec des d&eacute;tails en chrome</li>\r\n	<li>Guidon &agrave; hauteur r&eacute;glable et inclinable recouvert de mousse</li>\r\n	<li>Moniteur de fr&eacute;quence cardiaque int&eacute;gr&eacute;</li>\r\n	<li>P&eacute;dales avec adh&eacute;rence maximale (serrage par cale-pieds)</li>\r\n	<li>Selle rembourr&eacute;e bicouleur, r&eacute;glable verticalement et horizontalement</li>\r\n	<li>Syst&egrave;me de freinage silencieux</li>\r\n	<li>Stabilisateurs int&eacute;gr&eacute;s</li>\r\n	<li>Design firme ergonomique et durable</li>\r\n	<li>Finitions de haute qualit&eacute;</li>\r\n	<li>Roues pour son d&eacute;placement</li>\r\n	<li>Base de silicone</li>\r\n	<li>Support pour t&eacute;l&eacute;phone portable</li>\r\n	<li>Poids maximum : 120 kg</li>\r\n	<li>Dimensions env. : 56 x 113 x 109 cm</li>\r\n</ul>'),
(23, 'Cecofit', 'V1700118', 12.5, 6, 1, 0.2, 14, '<p>Emmenez votre salle de sport &agrave; la maison avec le&nbsp;<strong>v&eacute;lo statique magn&eacute;tique Fitness 7002&nbsp;</strong>!</p>\r\n\r\n<ul>\r\n	<li>Volant d&rsquo;inertie 4,5 kg</li>\r\n	<li>&Eacute;cran LCD (temps, vitesse, calories, distance et impulsion)</li>\r\n	<li>Guidon r&eacute;glable en mousse recouvert pour une meilleure adh&eacute;rence et confort</li>\r\n	<li>P&eacute;dalier silencieux d&rsquo;adh&eacute;rence maximale</li>\r\n	<li>Assise large et confortable en mousse avec hauteur r&eacute;glable</li>\r\n	<li>Syst&egrave;me de freinage magn&eacute;tique</li>\r\n	<li>Barres stabilisantes pour plus de s&eacute;curit&eacute;</li>\r\n	<li>Roues pour son d&eacute;placement et sa manipulation faciles</li>\r\n	<li>8 niveaux de r&eacute;sistance</li>\r\n	<li>Assemblage facile</li>\r\n	<li>Poids maximum : 100 kg</li>\r\n	<li>Dimensions env. : 50 x 125 x 107 cm</li>\r\n</ul>'),
(24, 'Cecofit', 'V1700117', 23, 12, 1, 0.2, 15, '<p>Si vous avez besoin de vous mettre en forme et que vous n&#39;avez pas le temps d&#39;aller &agrave; la salle de gym, le&nbsp;<strong>v&eacute;lo&nbsp;de spinning Fitness 7003&nbsp;</strong>est la solution id&eacute;ale<strong>&nbsp;</strong>!</p>\r\n\r\n<ul>\r\n	<li>Volant d&rsquo;inertie de 13 kg</li>\r\n	<li>Transmission par cha&icirc;ne et pignon fixe</li>\r\n	<li>Niveaux de r&eacute;sistance variables</li>\r\n	<li>&Eacute;cran LCD (temps, vitesse, distance et calories)</li>\r\n	<li>Guidon &agrave; hauteur r&eacute;glable avec rev&ecirc;tement en mousse</li>\r\n	<li>P&eacute;dales de maximum adh&eacute;rence</li>\r\n	<li>Si&egrave;ge rembourr&eacute;, r&eacute;glable verticalement et horizontalement</li>\r\n	<li>Porte-bidon avec bidon inclus</li>\r\n	<li>Syst&egrave;me de frein</li>\r\n	<li>Barres stabilisantes</li>\r\n	<li>Roues pour son d&eacute;placement</li>\r\n	<li>Poids maximum : 120 kg</li>\r\n	<li>Dimensions env. : 48 x 117 x 106 cm</li>\r\n</ul>'),
(25, 'Cecofit', 'V1700115', 223, 12, 1, 0.2, 16, '<p>Vous n&#39;avez d&eacute;sormais plus d&#39;excuss, avec l&#39;<strong><strong>&eacute;lliptique</strong>&nbsp;<strong>Fitness 7005</strong></strong>, vous pourrez vous mettre en forme sans sortir de chez vous !&nbsp;</p>\r\n\r\n<ul>\r\n	<li>R&eacute;sistance de contr&ocirc;le magn&eacute;tique silencieuse de demi-lune ext&eacute;rieure</li>\r\n	<li>Mesure du pouls sur le guidon</li>\r\n	<li>&Eacute;cran LCD (temps, vitesse, calories, distance et impulsion)</li>\r\n	<li>Barres stabilisatrices qui g&eacute;n&egrave;rent plus d&rsquo;adh&eacute;rence</li>\r\n	<li>Design ergonomique</li>\r\n	<li>Assemblage facile</li>\r\n	<li>Poids maximum : 120 kg</li>\r\n	<li>Dimensions env. : 56 x 148 x 122 cm</li>\r\n</ul>'),
(26, 'Cecofit', 'V1700114', 22, 12, 1, 0.2, 18, '<p>Mettez-vous en forme &agrave; la maison et &agrave; votre rythme avec le&nbsp;<strong>tapis de marche</strong>&nbsp;<strong>Fitness 7001&nbsp;</strong>!</p>\r\n\r\n<ul>\r\n	<li>&Eacute;cran LED</li>\r\n	<li>3 programmes automatiques</li>\r\n	<li>Panneau de contr&ocirc;le (vitesse, temps, distance et calories)</li>\r\n	<li>Bras de pr&eacute;hension&nbsp;en mousse pour le confort et la commodit&eacute;</li>\r\n	<li>Orifice pour bouteille d&#39;eau</li>\r\n	<li>Pliable (pour aider au rangement)</li>\r\n	<li>Incorpore des haut-parleurs et un c&acirc;ble Jack d&#39;entr&eacute;e/sortie</li>\r\n	<li>Syst&egrave;me de s&eacute;curit&eacute; magn&eacute;tique</li>\r\n	<li>2 roues avant pour faciliter la maniabilit&eacute; et le transport</li>\r\n	<li>Vitesse s&eacute;lectionnable : 3, 5, 7 et 10 km/h</li>\r\n	<li>Superficie pour courir : 98 x 32 cm</li>\r\n	<li>Poids maximum : 120 kg</li>\r\n	<li>Tension : 220-240 V</li>\r\n	<li>Fr&eacute;quence : 50-60 Hz</li>\r\n	<li>Puissance : 1000 W</li>\r\n	<li>Dimensions env. :&nbsp;64 x 122 x 132 cm</li>\r\n</ul>'),
(27, 'Cecofit', 'V1700114', 22, 12, 1, 0.2, 19, '<p>Mettez-vous en forme &agrave; la maison et &agrave; votre rythme avec le&nbsp;<strong>tapis de marche</strong>&nbsp;<strong>Fitness 7001&nbsp;</strong>!</p>\r\n\r\n<ul>\r\n	<li>&Eacute;cran LED</li>\r\n	<li>3 programmes automatiques</li>\r\n	<li>Panneau de contr&ocirc;le (vitesse, temps, distance et calories)</li>\r\n	<li>Bras de pr&eacute;hension&nbsp;en mousse pour le confort et la commodit&eacute;</li>\r\n	<li>Orifice pour bouteille d&#39;eau</li>\r\n	<li>Pliable (pour aider au rangement)</li>\r\n	<li>Incorpore des haut-parleurs et un c&acirc;ble Jack d&#39;entr&eacute;e/sortie</li>\r\n	<li>Syst&egrave;me de s&eacute;curit&eacute; magn&eacute;tique</li>\r\n	<li>2 roues avant pour faciliter la maniabilit&eacute; et le transport</li>\r\n	<li>Vitesse s&eacute;lectionnable : 3, 5, 7 et 10 km/h</li>\r\n	<li>Superficie pour courir : 98 x 32 cm</li>\r\n	<li>Poids maximum : 120 kg</li>\r\n	<li>Tension : 220-240 V</li>\r\n	<li>Fr&eacute;quence : 50-60 Hz</li>\r\n	<li>Puissance : 1000 W</li>\r\n	<li>Dimensions env. :&nbsp;64 x 122 x 132 cm</li>\r\n</ul>'),
(28, 'Cecofit', 'V1700114', 22, 12, 1, 0.2, 20, '<p>Mettez-vous en forme &agrave; la maison et &agrave; votre rythme avec le&nbsp;<strong>tapis de marche</strong>&nbsp;<strong>Fitness 7001&nbsp;</strong>!</p>\r\n\r\n<ul>\r\n	<li>&Eacute;cran LED</li>\r\n	<li>3 programmes automatiques</li>\r\n	<li>Panneau de contr&ocirc;le (vitesse, temps, distance et calories)</li>\r\n	<li>Bras de pr&eacute;hension&nbsp;en mousse pour le confort et la commodit&eacute;</li>\r\n	<li>Orifice pour bouteille d&#39;eau</li>\r\n	<li>Pliable (pour aider au rangement)</li>\r\n	<li>Incorpore des haut-parleurs et un c&acirc;ble Jack d&#39;entr&eacute;e/sortie</li>\r\n	<li>Syst&egrave;me de s&eacute;curit&eacute; magn&eacute;tique</li>\r\n	<li>2 roues avant pour faciliter la maniabilit&eacute; et le transport</li>\r\n	<li>Vitesse s&eacute;lectionnable : 3, 5, 7 et 10 km/h</li>\r\n	<li>Superficie pour courir : 98 x 32 cm</li>\r\n	<li>Poids maximum : 120 kg</li>\r\n	<li>Tension : 220-240 V</li>\r\n	<li>Fr&eacute;quence : 50-60 Hz</li>\r\n	<li>Puissance : 1000 W</li>\r\n	<li>Dimensions env. :&nbsp;64 x 122 x 132 cm</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `nom_salle` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `adresse_salle` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ville_salle` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `cp_salle` int(11) NOT NULL,
  `latittude_salle` double NOT NULL,
  `longitude_salle` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`id`, `nom_salle`, `adresse_salle`, `ville_salle`, `cp_salle`, `latittude_salle`, `longitude_salle`) VALUES
(1, 'Porte jeune', '68 Rue de Guebwiller', 'Kingersheim9', 68260, 47.787, 7.317),
(2, 'fitness park', 'Tour Europe', 'Mulhouse', 68100, 47.757, 7.332);

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `id` int(11) NOT NULL,
  `salle_id` int(11) NOT NULL,
  `jour_seance` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `date_seance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `seance`
--

INSERT INTO `seance` (`id`, `salle_id`, `jour_seance`, `date_seance`) VALUES
(3, 1, 'Mercredi', '2017-06-14'),
(4, 1, 'Jeudi', '2017-06-15'),
(5, 1, 'Vendredi', '2017-06-16'),
(6, 1, 'Samedi', '2017-06-17'),
(7, 1, 'Dimanche', '2017-06-18'),
(8, 1, 'Lundi', '2017-06-19'),
(9, 1, 'Mardi', '2017-06-20'),
(10, 1, 'Mercredi', '2017-06-21'),
(11, 1, 'Jeudi', '2017-06-22'),
(12, 1, 'Vendredi', '2017-07-21'),
(13, 1, 'Samedi', '2017-06-24'),
(14, 2, 'Dimanche', '2017-07-23'),
(15, 1, 'Lundi', '2017-06-26'),
(18, 1, 'Mardi', '2017-06-27');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_351268BBA76ED395` (`user_id`);

--
-- Index pour la table `adresse_user`
--
ALTER TABLE `adresse_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7D95019FFB88E14F` (`utilisateur_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6EEAA67DA76ED395` (`user_id`);

--
-- Index pour la table `commande_materiel`
--
ALTER TABLE `commande_materiel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CEF2A80B16880AAF` (`materiel_id`),
  ADD KEY `IDX_CEF2A80B82EA2E54` (`commande_id`);

--
-- Index pour la table `creneau`
--
ALTER TABLE `creneau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F9668B5FE3797A94` (`seance_id`);

--
-- Index pour la table `creneau_user`
--
ALTER TABLE `creneau_user`
  ADD PRIMARY KEY (`creneau_id`,`user_id`),
  ADD KEY `IDX_D98922147D0729A9` (`creneau_id`),
  ADD KEY `IDX_D9892214A76ED395` (`user_id`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A60C9F1F82EA2E54` (`commande_id`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_18D2B0913DA5256D` (`image_id`),
  ADD KEY `IDX_18D2B09112469DE2` (`category_id`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4E977E5CBF396750` (`id`);

--
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DF7DFD0EDC304035` (`salle_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `abonnement`
--
ALTER TABLE `abonnement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `adresse_user`
--
ALTER TABLE `adresse_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `commande_materiel`
--
ALTER TABLE `commande_materiel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `creneau`
--
ALTER TABLE `creneau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `seance`
--
ALTER TABLE `seance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD CONSTRAINT `FK_351268BBA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

--
-- Contraintes pour la table `adresse_user`
--
ALTER TABLE `adresse_user`
  ADD CONSTRAINT `FK_7D95019FFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `fos_user` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

--
-- Contraintes pour la table `commande_materiel`
--
ALTER TABLE `commande_materiel`
  ADD CONSTRAINT `FK_CEF2A80B16880AAF` FOREIGN KEY (`materiel_id`) REFERENCES `materiel` (`id`),
  ADD CONSTRAINT `FK_CEF2A80B82EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`);

--
-- Contraintes pour la table `creneau`
--
ALTER TABLE `creneau`
  ADD CONSTRAINT `FK_F9668B5FE3797A94` FOREIGN KEY (`seance_id`) REFERENCES `seance` (`id`);

--
-- Contraintes pour la table `creneau_user`
--
ALTER TABLE `creneau_user`
  ADD CONSTRAINT `FK_D98922147D0729A9` FOREIGN KEY (`creneau_id`) REFERENCES `creneau` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D9892214A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `FK_A60C9F1F82EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`);

--
-- Contraintes pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `FK_18D2B09112469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_18D2B0913DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `FK_DF7DFD0EDC304035` FOREIGN KEY (`salle_id`) REFERENCES `salle` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

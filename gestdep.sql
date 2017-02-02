-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 26 Janvier 2016 à 17:56
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gestdep`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `entreprise` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entreprise` (`entreprise`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=951 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `email`, `telephone`, `adresse`, `entreprise`) VALUES
(1, 'Super U Candé', 'candé@superu.fr', '0241656787', 'Candé', 1),
(2, 'Super U Segré', 'segré@superu.fr', '0241765643', 'C.C. La Renaissance - Route de Laval - D775, 49500 Segré', 1),
(3, 'Super U Craon', 'craon@superu.fr', '0243789867', 'Super U, ZA La Pepiniere, 53400 Craon', 1),
(763, 'Ad', NULL, '+33604478480', '', 1),
(764, 'Adrien  Menier', '', '07 77 77 51 46', '', 1),
(765, 'alexandre  ', 'alexandrebellier@hotmail.fr', '', '', 1),
(766, 'Alexandre  Bellier', '', '0679655880', '', 1),
(767, 'Alexandre  Bonsergent', '', '0683834586', '', 1),
(768, 'Alexandre  Dut', '', '+33614212195', '', 1),
(769, 'Alexandre  planchais', '', '', '', 1),
(770, 'Alexis  Prod''homme', 'alexis_boss_95@hotmail.fr', '0630431972', '', 1),
(771, 'Aline Le Qu', '', '06 32 24 59 94', '', 1),
(772, 'Alisia  M', '', '0637470962', '', 1),
(773, 'Allison  ', '', '+33681206711', '', 1),
(774, 'anais  ', 'MAILER-DAEMON@orange.fr', '+33647417571', '', 1),
(775, 'Anais  Bde', '', '06 61 75 32 83', '', 1),
(776, 'Ana', '', '0604498452', '', 1),
(777, 'Andorin  Maeva', '', '', '', 1),
(778, 'Andr', '', '0629410892', '', 1),
(779, 'Andrea  ', '', '00491705112182', '', 1),
(780, 'Annaelle  Lorandel', '', '0642814280', '', 1),
(781, 'Anne-c', '', '0622953419', '', 1),
(782, 'Annette  Franck', '', '00 49 177 7817371', '', 1),
(783, 'Anthony  Richard', '', '+33631942846', '', 1),
(784, 'Antoine  Couet', '', '0646102137', '', 1),
(785, 'Antoine  Gueron', '', '06 22 91 24 86', '', 1),
(786, 'Antoine  Leroyer', '', '', '', 1),
(787, 'Antonin  ', '', '+33 6 87 79 56 02', '', 1),
(788, '  ', '', '', '', 1),
(789, 'Aristide  Volard', '', '0650229488', '', 1),
(790, 'Arthur  Marcelin', '', '06 86 06 50 35', '', 1),
(791, 'Aur', 'aurelifab@hotmail.fr', '0664970092', '', 1),
(792, 'Baptiste  ROUGER', 'rouger.baptiste@gmail.com', '02 43 70 39 90', '10 rue beausoleil\r\nSaint Quentin Les Anges   53400\r\nFrance', 1),
(793, 'Benjamin  Buffard', '', '0673081295', '', 1),
(794, 'Beno', '', '0243686008', '', 1),
(795, 'Bertrand Le Gac', '', '07 86 17 29 55', '', 1),
(796, 'Calvin  ', '', '+33601728939', '', 1),
(797, 'Capucine  Lamoine', '', '06 80 85 66 13', '', 1),
(798, 'Caroline  S', 'carolinesejourne13@gmail.com', '0760085225', '', 1),
(799, 'Cassandre  Chevillard', '', '', '', 1),
(800, 'Cathy  Mochet', '', '+33633050947', '', 1),
(801, 'C', '', '', '', 1),
(802, 'C', '', '06 58 72 86 40', '', 1),
(803, 'Charline  ', '', '06 46 77 34 49', '', 1),
(804, 'Charlotte  Robin', '', '06 64 39 30 04', '', 1),
(805, 'Chaton  <3', '', '06 68 36 08 29', '', 1),
(806, 'Chaton Non Persistant', '', '+33633890018', '', 1),
(807, 'Chlo', '', '+33 6 32 73 53 30', '', 1),
(808, 'Claude  L''anton', '', '06 69 51 00 08', '', 1),
(809, 'Cl', '', '0626257378', '', 1),
(810, 'Corentin  Grosbois', '', '', '', 1),
(811, 'Corentin  Pinel', '', '06 46 74 56 71', '', 1),
(812, 'Corinne  Bellier', '', '0629057961', '', 1),
(813, 'Cotentin  Rabouin', '', '+33 6 33 75 40 09', '', 1),
(814, 'Damien  ', '', '+33 6 50 99 38 01', '', 1),
(815, 'David  Louaisil', '', '+33618421429', '', 1),
(816, 'Diane  Berthelot', '', '0666489388', '', 1),
(817, 'Dimitri  Saingre', '', '06 37 91 57 23', '', 1),
(818, 'Docteur  Meunier', '', '06 09 79 18 82', '', 1),
(819, 'Dominique  Marteau', 'd.marteau@yahoo.fr', '0243062666', '', 1),
(820, 'Dylan  Gautier', 'tonton.judas@gmail.com', '+33 6 58 43 73 44', '', 1),
(821, 'Dylan  Gouraud', '', '0658211157', '', 1),
(822, '', '', '0631354307', '', 1),
(823, '', '', '06 16 52 18 13', '', 1),
(824, 'Fanfan  ', '', '+33674055287', '', 1),
(825, 'Fixe  Matthey', '', '+33 9 82 38 66 71', '', 1),
(826, 'Florent  Bonsergent', '', '0787066230', '', 1),
(827, 'Florian  Berson', '', '0683973477', '', 1),
(828, 'Fran', '', '0243060521', '', 1),
(829, 'Fran', '', '+33602393641', '', 1),
(830, 'Fran', '', '0786428328', '', 1),
(831, 'Francois  W', '', '06 23 92 00 17', '', 1),
(832, 'Gael  Delorme', '', '06 31 59 92 49', '', 1),
(833, 'Gauthier  Masson', '', '06 76 09 16 44', '', 1),
(834, 'Gilles  Bordier', 'BORDIER.GILLES@wanadoo.fr', '', '', 1),
(835, 'Gwen(covoiturage)  ', '', '+33687024371', '', 1),
(836, 'Harold  ', '', '07 82 45 56 58', '', 1),
(837, 'Helene  ', '', '', '', 1),
(838, 'Houdellier  L', '', '07 86 43 59 08', '', 1),
(839, 'Hugo  Pigeon', '', '+33 6 37 24 55 84', '', 1),
(840, 'Hugo  Sanslavilke', '', '+33781994091', '', 1),
(841, 'Hugues  Oger', '', '0633371302', '', 1),
(842, 'Isa  Cano', '', '0699021696', '', 1),
(843, 'James  Dorian', '', '+353861542784', '', 1),
(844, 'Jannick  Michel', '', '+33678439689', '', 1),
(845, 'Jarrys  ', '', '+33 6 24 62 77 03', '', 1),
(846, 'Jean-Baptiste  Paumier', '', '', '', 1),
(847, 'Jean-charles  Richard', '', '+33243061746', '', 1),
(848, 'Jean-Jacques  Cerisier', '', '+33 6 71 24 89 52', '', 1),
(849, 'J', '', '06 98 01 87 93', '', 1),
(850, 'Joris  Laurent', 'jochlaurent53@gmail.com', '+33607402000', '', 1),
(851, 'Jules  Asgostini', '', '06 52 09 85 71', '', 1),
(852, 'Julie (Copine Simon)', '', '+33647933534', '', 1),
(853, 'Julie  L', '', '06 71 06 46 00', '', 1),
(854, 'Julie  Villedieu', '', '+33669758106', '', 1),
(855, 'Julien  Ferrer', '', '0614950286', '', 1),
(856, 'Julien  Pallaird', '', '0786295137', '', 1),
(857, 'Juliette  ', '', '+33659734863', '', 1),
(858, 'Lalie  Jarry', '', '+33628732651', '', 1),
(859, 'Laureen  Loison', '', '06 72 30 10 30', '', 1),
(860, 'L', '', '0674455963', '', 1),
(861, 'Louise  ', '', '+33678304229', '', 1),
(862, 'Lucie  Drouet', '', '+33 6 65 73 51 69', '', 1),
(863, 'Lucien  Giraudet', '', '+33610790937', '', 1),
(864, 'Ludovic  Beillouin', '', '+33662997326', '', 1),
(865, '  ', '', '', '', 1),
(866, 'Lydie  ', '', '0682608175', '', 1),
(867, 'Ma petite ch', '', '06 88 90 93 85', '', 1),
(868, 'Ma', '', '+33770030147', '', 1),
(869, 'Maelane  Giret', '', '0677357647', '', 1),
(870, 'Maeva  Andorin', '', '0786279582', '', 1),
(871, 'Maeva  Luzu', '', '0689167777', '', 1),
(872, 'ma', 'luzu.maeva@hotmail.fr', '', '', 1),
(873, 'Maison  Floriane', '', '0983287720', '', 1),
(874, 'Maison  Nantes', '', '+33 2 40 75 52 42', '', 1),
(875, 'Maison Saint Seb', '', '+33973539612', '', 1),
(876, 'Maman  ', '', '0953314501', '', 1),
(877, 'mamie  ', 'rouger.jeanette@bbox.fr', '', '', 1),
(878, 'Mamie  ', '', '0243682024', '', 1),
(879, 'Mamie De Flo', '', '+33 6 59 86 31 25', '', 1),
(880, 'Mamie  Marie-ange', '', '02 43 37 94 41', '', 1),
(881, 'Margaux  Halberstadt', '', '06 61 06 43 69', '', 1),
(882, 'Marie  Delaunay', '', '+33618663899', '', 1),
(883, 'Marie  Jouenne', '', '0621645084', '', 1),
(884, 'Marie Projet Jeune', '', '+33 9 64 25 42 87', '', 1),
(885, 'Marion  Landais', '', '0635308739', '', 1),
(886, 'Martin  ', '', '00491704838870', '', 1),
(887, 'Martin  Bonnet', '', '06 37 73 04 01', '', 1),
(888, 'Martin  Levrard', 'levrard.martin@gmail.com', '+33750295703', '', 1),
(889, 'Mary  Durand', '', '0686885487', '', 1),
(890, 'Mathieu  Goulay', '', '', '', 1),
(891, 'Matthieu  goulay', 'ptit-goulay@hotmail.fr', '', '', 1),
(892, 'Maxime  Ferrer', 'maxf1@hotmail.fr', '0612393382', '', 1),
(893, 'Mc  Abb', '', '06 16 88 28 88', '', 1),
(894, 'Mc  Hack', '', '06 30 50 35 49', '', 1),
(895, 'Megane  Linget', '', '+33 6 95 72 56 66', '', 1),
(896, 'M', '', '06 50 80 60 02', '', 1),
(897, 'MME Odile GERE', '04824@cmmabn.creditmutuel.fr', '', '', 1),
(898, 'Mme  Trommeur', '', '0621736653', '', 1),
(899, 'Morgane  ', 'crunchdu53@hotmail.fr', '', '', 1),
(900, 'Nadine  Lardeux', '', '0630730874', '', 1),
(901, 'Nicolas  Landais', '', '0634456322', '', 1),
(902, 'Niellez  Cassandra', '', '06 16 38 94 10', '', 1),
(903, 'NRJ  ', '', '61112', '', 1),
(904, 'Olivia  Meignant', '', '0633429044', '', 1),
(905, 'Papa  ', 'laurent.rouger@bbox.fr', '0243703990', '', 1),
(906, 'Papie  ', '', '02 43 68 20 24', '', 1),
(907, 'Patrick  Cano', '', '06 61 77 03 99', '', 1),
(908, 'Paul  Madiot', '', '0243065049', '', 1),
(909, 'Pauline  Guess', '', '+4793417698', '', 1),
(910, 'Pauline  Poch', '', '0601720593', '', 1),
(911, 'Pierre  Barretep', '', '+33658167299', '', 1),
(912, 'Pierre-Alexandre  Bouvet', '', '+33659238433', '', 1),
(913, 'Pipi  ', '', '06 58 00 51 72', '', 1),
(914, 'Quentin  Canovas', '', '+33661501051', '', 1),
(915, 'Quentin  Lesourd', '', '', '', 1),
(916, 'Quentin  Naturel', '', '06 72 64 10 62', '', 1),
(917, 'R', '666', '', '', 1),
(918, 'Robin  Delaporte', '', '+33 6 09 14 33 45', '', 1),
(919, 'romain  tuault', 'ptit.romaiin@hotmail.fr', '', '', 1),
(920, 'Roman  Uzal', '', '06 17 07 28 17', '', 1),
(921, 'samuel  ', 'samuel.veille@hotmail.fr', '', '', 1),
(922, 'Sean  ', '', '06 50 47 38 55', '', 1),
(923, 'S', '', '07 85 63 61 69', '', 1),
(924, 'Simon  Goulay', 'simon.goulay@yahoo.fr', '0677037111', '', 1),
(925, 'Sylvain  Bidault', 'sylvainbidault.tauxdiscount@orange.fr', '06 78 62 65 30', '', 1),
(926, 'Tatataatataatyatat  ', '', '', '', 1),
(927, 'Th  ', '', '0678343397', '', 1),
(928, 'Thibaud  Courtoison', '', '06 77 06 00 28', '', 1),
(929, '  ', 'thibaultbabara12@hotmail.fr', '', '', 1),
(930, 'Thiffany  ', '', '+33616970709', '', 1),
(931, 'Thomas  Guineheux', '', '0645655531', '', 1),
(932, 'Thomas  Picard', '', '+33658870929', '', 1),
(933, 'Tiburce  ', '', '+33 6 98 29 05 36', '', 1),
(934, 'Timoth', '', '+33760074902', '', 1),
(935, 'Tonton  ', '', '0760022665', '', 1),
(936, 'Valentin  Fac', '', '+33 6 59 57 43 86', '', 1),
(937, 'Valentin  Gaultier', '', '', '', 1),
(938, 'Val', '', '06 62 14 10 36', '', 1),
(939, '  ', 'vava.jsp@hotmail.fr', '', '', 1),
(940, 'V', '', '+33 6 08 27 48 29', '', 1),
(941, 'Ventin  ', '', '0663204524', '', 1),
(942, 'vicdu49  ', 'vicdu49@gmail.com', '', '', 1),
(943, 'Victor  Muhammad', '', '', '', 1),
(944, 'Victoria  ', '', '+33615828578', '', 1),
(945, 'Vincent  ', '', '+33602283171', '', 1),
(946, 'Vincent  Piton', 'bill-53_@live.fr', '', '', 1),
(947, 'Vivien  ', '', '', '', 1),
(948, 'wii dela famille', 'w5508620679621587@wii.com', '', '', 1),
(949, 'William  ', '', '0667893808', '', 1),
(950, 'Zach  Smithson', '', '06 32 28 80 74', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code postal` int(5) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `debutExercice` date NOT NULL,
  `responsable` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`, `adresse`, `code postal`, `ville`, `debutExercice`, `responsable`) VALUES
(1, 'BAT', '10 rue de beausoleil', 53400, 'Saint Quentin Les Anges', '2016-01-01', 1);

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

CREATE TABLE IF NOT EXISTS `informations` (
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `responsable` int(11) NOT NULL,
  KEY `responsable` (`responsable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `informations`
--

INSERT INTO `informations` (`nom`, `adresse`, `responsable`) VALUES
('bat', '10, rue de beausoleil, 53400 Saint Quentin les Anges', 1);

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE IF NOT EXISTS `trajet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `voiture` int(11) NOT NULL,
  `date` date NOT NULL,
  `km` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur` (`utilisateur`,`client`,`voiture`),
  KEY `client` (`client`),
  KEY `voiture` (`voiture`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `trajet`
--

INSERT INTO `trajet` (`id`, `utilisateur`, `client`, `voiture`, `date`, `km`) VALUES
(1, 1, 1, 1, '2015-08-22', 31.4),
(2, 1, 2, 2, '2015-08-24', 9.7),
(3, 3, 1, 2, '2015-08-23', 31.4),
(4, 1, 3, 1, '2015-08-25', 11.4);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `droits` varchar(255) NOT NULL,
  `entreprise` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entreprise` (`entreprise`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mail`, `mdp`, `droits`, `entreprise`) VALUES
(1, 'Rouger', 'Baptiste', 'rouger.baptiste@gmail.com', 'ge2Y431wimYI6', 'SuAdmin', 1),
(2, 'Michel', 'Bernard', 'michel.bernard@gmail.com', 'geNqHd5eFD.Tk', 'Admin', 1),
(3, 'Canovas', 'Floriane', 'floriane.canovas@gmail.com', 'geR9XjAv9aTpA', 'User', 1);

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE IF NOT EXISTS `voiture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `puissance` varchar(255) NOT NULL,
  `entreprise` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entreprise` (`entreprise`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `voiture`
--

INSERT INTO `voiture` (`id`, `nom`, `puissance`, `entreprise`) VALUES
(1, 'Audi A5', '11', 1),
(2, 'Renault Twingo', '6', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_de` FOREIGN KEY (`entreprise`) REFERENCES `entreprise` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `informations`
--
ALTER TABLE `informations`
  ADD CONSTRAINT `responsable_de` FOREIGN KEY (`responsable`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `trajet_ibfk_1` FOREIGN KEY (`utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `trajet_ibfk_2` FOREIGN KEY (`client`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `trajet_ibfk_3` FOREIGN KEY (`voiture`) REFERENCES `voiture` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_de` FOREIGN KEY (`entreprise`) REFERENCES `entreprise` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `voiture_de` FOREIGN KEY (`entreprise`) REFERENCES `entreprise` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

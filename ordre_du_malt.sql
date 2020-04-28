CREATE DATABASE IF NOT EXISTS ordre_du_malt CHARACTER SET utf8;

USE ordre_du_malt;

--
-- Database: `ordre_du_malt`
--

-- --------------------------------------------------------

--
-- Table structure for table `bier`
--

DROP TABLE IF EXISTS `bier`;
CREATE TABLE IF NOT EXISTS `bier` (
  `id_bier` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `style` text,
  `description` text,
  PRIMARY KEY (`id_bier`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bier`
--

INSERT INTO `bier` (`id_bier`, `name`, `style`, `description`) VALUES
(1, 'Carolus d\'or', 'Bière de garde', NULL),
(2, 'Kilkenny', 'Pale Ale', NULL),
(3, 'Guiness', 'Stout', 'Dry Stout'),
(4, 'Bleue du Mont', 'Fruit Beer', NULL),
(5, 'Jet Lag', 'IPA', NULL),
(6, 'Comet de ses morts', 'IPA', 'IPA - Imperial / Double'),
(7, '20 Years Later', 'IPA', 'Double IPA'),
(8, 'Delirium Tremens', 'Pale Ale', 'bonne et forte mais manque de caractère'),
(9, 'Scottish Brown Ale', 'Brown Ale', NULL),
(10, 'Twisted Thistle IPA', 'IPA', 'American IPA'),
(11, 'Dublin Abbaye', 'Amber Ale', 'Belgian Amber Ale');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

DROP TABLE IF EXISTS `place`;
CREATE TABLE IF NOT EXISTS `place` (
  `id_place` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `description` text,
  `address` text,
  `website` text,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  PRIMARY KEY (`id_place`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id_place`, `name`, `type`, `description`, `address`, `website`, `latitude`, `longitude`) VALUES
(1, 'Le Falstaff', 'Bar', NULL, '42 Rue du Montparnasse, 75014 Paris', NULL, '48.842840', '2.326065'),
(2, 'Bières Cultes Châtelet', 'Micro-brasserie', NULL, '14 Rue des Halles, 75001 Paris', 'http://bierescultes.fr', '48.859861', '2.346811'),
(6, 'Coopérative laitière du Beaufortain', 'Fromagerie', NULL, '9 Rue Corneille, 75006 Paris', 'https://www.cooperative-de-beaufort.com/', '48.849217', '2.339104'),
(5, 'Le Vieux Chêne', 'Bar', NULL, '69 Rue Mouffetard, 75005 Paris', NULL, '48.842335', '2.349820'),
(7, 'O\'Clock Brewing', 'Micro-brasserie', NULL, '3 d Rue Georges Méliès, 78390 Bois-d\'Arcy', NULL, '48.800566', '2.009211'),
(8, 'Le Violon Dingue', 'Bar', NULL, '46 Rue de la Montagne Sainte-Geneviève, 75005 Paris', NULL, '48.847622', '2.348459');

-- --------------------------------------------------------

--
-- Table structure for table `place_bier`
--

DROP TABLE IF EXISTS `place_bier`;
CREATE TABLE IF NOT EXISTS `place_bier` (
  `id_place_bier` int(11) NOT NULL AUTO_INCREMENT,
  `id_place` int(11) NOT NULL,
  `id_bier` int(11) NOT NULL,
  `score` decimal(4,2) DEFAULT NULL,
  `price` decimal(4,2) DEFAULT NULL,
  `alcohol_level` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`id_place_bier`),
  KEY `lieu_biere_ibfk_1` (`id_place`),
  KEY `lieu_biere_ibfk_2` (`id_bier`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place_bier`
--

INSERT INTO `place_bier` (`id_place_bier`, `id_place`, `id_bier`, `score`, `price`, `alcohol_level`) VALUES
(1, 1, 1, NULL, '5.00', NULL),
(2, 1, 2, NULL, NULL, NULL),
(4, 1, 3, NULL, NULL, NULL),
(5, 6, 4, NULL, '5.20', '5.40'),
(6, 7, 5, NULL, '2.50', '6.50'),
(7, 7, 6, NULL, '2.50', '8.50'),
(8, 7, 7, NULL, '2.50', '8.50'),
(9, 5, 8, '3.50', '5.50', '8.50'),
(10, 8, 9, NULL, '5.00', NULL),
(11, 8, 10, NULL, '5.00', NULL),
(12, 8, 11, NULL, '6.50', NULL);


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_name` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `password_hash`) VALUES
('admin', '$2y$10$NQcjYlb5NXLcvgwnPmpxd..H560RWEIehBHb21Jc70RGBWwK/Hwdm');
COMMIT;

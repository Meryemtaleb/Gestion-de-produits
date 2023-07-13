
DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'ordinateur'),
(2, 'tablette'),
(3, 'mobile');

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `categorie` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `photo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie` (`categorie`)
);

INSERT INTO `produit` (`id`, `nom`, `categorie`, `prix`, `stock`, `photo`) VALUES
(26, 'Asus rog strix', 1, 1800, 10, '5.png'),
(23, 'Galaxy Tab S', 2, 900, 20, '4.png'),
(24, 'Xiaomi 13', 3, 1200, 15, '2.png'),
(21, 'macbook air', 1, 1200, 25, 'macbook.png'),
(19, 'Dell Xps', 1, 2000, 20, '9.png'),
(27, 'ipad pro', 2, 1100, 30, '6.png'),
(18, 'Surface tab ', 2, 1300, 20, '7.png'),
(17, 'samsung z flip', 3, 1400, 10, '10.png'),
(25, 'iphone 14', 3, 1300, 15, '8.png');

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `pseudo` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`pseudo`)
);

INSERT INTO `user` (`pseudo`, `nom`, `prenom`, `email`, `mdp`, `role`) VALUES
('willly', 'smith', 'will', 'will@email.com', 'azerty', 'responsable'),
('wick', 'wick', 'john', 'wick@gmail.com', 'azerty', 'responsable'),
('Chris', 'Bale', 'Christian', 'chris@gmail.com', 'azerty', 'employe'),
('leo', 'Dicaprio', 'Leonardo', 'leo@gmail.com', 'azerty', 'employe'),
('Morgan', 'Freeman', 'Morgan', 'morgan@gmail.com', 'azerty', 'employe');


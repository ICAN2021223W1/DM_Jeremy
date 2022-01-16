-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 16 jan. 2022 à 12:32
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`) VALUES
(1, 'Catégorie 272772', 'jaile pas le pain'),
(8, 'categirie 333', 'oui j\'aime pas cette catego'),
(10, 'catego 666', 'oui oui non'),
(11, 'categogogogogo', 'ouiuuoouuoiuiu');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `prix`, `qte`, `categorie`) VALUES
(1, 'Jai', 'zdzd', 2222, 44223, 1),
(2, 'dknkzddzdad', 'kzdnkznad', 2, 2222, 1),
(3, 'zdkzdkd', 'kzdkzd', 2223, 2222, 1),
(4, 'zdkzdkd', 'kzdkzdzadazdazd', 2223, 2222, 1),
(5, 'zadk,zadkazd;zdaaz', 'k,kzd,', 3457, 578, 1),
(7, 'j\'aime le patté ', 'OU oui le Pathé c\'est bon', 22, 222, 1),
(8, 'zada', 'zqdzada', 22, 22, 1),
(9, 'ghjkolmù', 'rtyuiop^ù', 22, 54567890, 1),
(10, 'zertyuio', 'sdeftuiolpmù', 22, 45789, 1),
(14, 'oui', 'oui oui oui', 22, 22, 1),
(15, 'oui', 'oui j\'aime pas cette catego', 22, 666, 1),
(16, 'ddd', 'ddd', 22, 22, 1),
(17, 'uzdhazdazda22uazddarthus', 'rtyuzdadiopzdazd', 2345620, 66663456, 10),
(19, 'azdlahzd', 'jzdazjdb@', 4567, 4567, 10),
(20, 'ba', 'louoluoouou', 3456789, 3456789, 8),
(21, 'bzad', 'ozbadaz', 456, 4567, 11),
(22, 'bzad', 'ozbadaz', 456, 4567, 11),
(23, 'bzad', 'ozbadaz', 456, 4567, 11),
(24, 'bzad', 'ozbadaz', 456, 4567, 11),
(25, 'mkzanjd', 'njlzadlkanz', 34567890, 56789, 11),
(26, 'bzadlua', 'zbjdjabzd', 34567, 4567, 11),
(27, 'zadzaijdia', 'zanazoiza', 34567811, 56789, 11);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$9o5bHTaIscuPEAoHkcsbQOk05E7tJR4eUxV2s3y7wLt3cxqnl/Ji2', 'admin'),
(2, 'Arthus', 'user@gmail.com', '$2y$10$9o5bHTaIscuPEAoHkcsbQOk05E7tJR4eUxV2s3y7wLt3cxqnl/Ji2', 'admin'),
(3, 'balou', 'jejbalou@gmail.com', '$2y$10$9o5bHTaIscuPEAoHkcsbQOk05E7tJR4eUxV2s3y7wLt3cxqnl/Ji2', 'user'),
(4, 'balou', 'jejeje@gmail.com', '$2y$10$9o5bHTaIscuPEAoHkcsbQOk05E7tJR4eUxV2s3y7wLt3cxqnl/Ji2', 'user'),
(5, 'oui', 'oui@gmail.com', '$2y$10$9o5bHTaIscuPEAoHkcsbQOk05E7tJR4eUxV2s3y7wLt3cxqnl/Ji2', 'user'),
(6, 'dazdzada', 'zdkzbd@gzdb.com', '$2y$10$MvEyoye0YmfRcHvwcpRB5OTcNRNhzTE2rwoa0/LtMncTtZ0hgHu4W', 'user'),
(7, 'jerem', 'jerem@gg.com', '$2y$10$U.2YPMqw469w5QGqTvsTyOgkCqtWc9pkcUwUzEhQBMo2c8f2O9YCW', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie` (`categorie`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

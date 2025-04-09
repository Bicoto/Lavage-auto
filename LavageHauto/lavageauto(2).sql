-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 09 avr. 2025 à 16:53
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lavageauto`
--

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

CREATE TABLE `prestation` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `caracteristique` varchar(255) NOT NULL,
  `prix` double NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `prestation`
--

INSERT INTO `prestation` (`id`, `nom`, `caracteristique`, `prix`, `image`) VALUES
(1, 'Lavage extérieur', 'Le lavage extérieur est l’étape indispensable pour une brillance incomparable et un entretien total\r\nde votre véhicule.\r\nCarrosserie, vitres et pare-brise et jantes.\r\nTemps estimé : 2 heures\r\nprise de rendez-vous nécessaire.', 69, 'image/prestation/prestation1.jpg'),
(2, 'Lavage intérieur\r\n', 'Quoi de mieux que le lavage intérieur pour se sentir agréablement bien dans votre voiture ?\r\n\r\nAspiration, lavage des moquettes et tissus et nettoyage des plastiques.\r\nTemps estimé : 1 heure\r\nPrise de rendez-vous nécessaire.\r\n', 59, 'image/prestation/prestation5.jpg'),
(3, 'Lavage extérieur et intérieur', 'Le lavage extérieur et intérieur est la formule all exclusive pour votre voiture et votre bien être de\r\nconduite.\r\ncarrosserie, vitres et pare-brise, jantes, aspiration, lavage moquettes et tissus et nettoyage des\r\nplastiques. \r\n\r\nTemps estimé : 3 heures\r', 109, 'image/prestation/prestation3.jpg'),
(4, 'Traitement céramique\r\n', 'Un traitement céramique est une innovation technologique utilisée pour protéger la carrosserie\r\nd\'un véhicule.\r\n\r\nTemps estimé : 1 heure\r\nprise de rendez-vous nécessaire.\r\nNB : Nécessite un lavage extérieur au préalable.', 39, 'image/prestation/prestation4.jpg'),
(5, 'Lustrage intégral ', 'Il regroupe de multiples techniques qui cherchent à nourrir le vernis ou la peinture d\'une\r\ncarrosserie afin de lui donner un aspect brillant, voire un effet miroir.\r\n\r\nTemps estimé : 2 heures\r\nprise de rendez-vous nécessaire.\r\nNB : Nécessite un lavage ex', 49, 'image/prestation/prestation6.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `caracteristique` varchar(255) NOT NULL,
  `prix` double NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `caracteristique`, `prix`, `image`) VALUES
(NULL, 'Coffret lavage normal', 'Le coffret lavage normal, permet un lavage simple pour l’extérieur de votre véhicule.\r\nIl est composé de :\r\n- Bouteille de savon ultra moussant\r\n- Éponge désincrustante\r\n- Peau de chamois. \r\n\r\nSous réserve de stock disponible.\r\nPas de livraison possible, ', 12, 'image/produit/produit10.jpg'),
(NULL, 'Coffret lavage prémium', 'Le coffret lavage prémium, permet un lavage effica\r\nce pour l’extérieur de votre véhicule.\r\nIl est composé de :\r\n- Bouteille de savon ultra moussant\r\n- Éponge désincrustante\r\n- Peau de chamois\r\n- Pulvérisateur lustrage déperlant \r\n- Micro fibre \r\n\r\nSous r', 21, 'image/produit/produit1.jpg'),
(NULL, 'Coffret lavage exclusif', 'Le coffret lavage exclusif, permet un lavage total pour l’extérieur de votre véhicule pour une\r\ndurabilité maximale.\r\nIl est composé de :\r\n- Bouteille de savon ultra moussant\r\n- Éponge désincrustante\r\n- Peau de chamois\r\n- Pulvérisateur lustrage déperlant\r', 35, 'image/produit/produit8.jpg'),
(NULL, 'Bouteille de savon ultra moussant \r\n', 'Ce savon vous permet la décontamination votre carrosserie et la désincrustation de salissures et\r\ngoudron. \r\n\r\nSous réserve de stock disponible.\r\nPas de livraison possible, passez en magasin.', 6, ' image/produit/produit9.jpg'),
(NULL, 'Pulvérisateur lustrant déperlant', 'Grace à a ce pulvérisateur les salissures adhèrent moins à la carrosserie et évite les traces de\r\ncalcaire.\r\n\r\nSous réserve de stock disponible.\r\nPas de livraison possible, passez en magasin.', 4, 'image/produit/produit7.jpg'),
(NULL, 'Cire lustrante', 'Cette cire s’applique sur une carrosserie sèche et permet une brillance extreme. \r\n\r\nSous réserve de stock disponible.\r\nPas de livraison possible, passez en magasin.', 16, 'image/produit/produit11.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(0, 'bicoto', 'Tery', 'tbicoto@gmail.com', '$2y$10$QIxcWYqhYJQ.T/0jPSZhv.DHdV49ic9pCrp73L8Gk4oubkAvONIxC'),
(0, 'Monkey', 'Luffy', 'LuffyMonkey@gmail.com', '$2y$10$cvHnfYXO1Qfdaym/30RTrudkBmW1Xa9GyEhGHE0r0vI55fD2QCy5y'),
(0, 'Joseph', 'Jephte ', 'tbicoto@gmail.com', '$2y$10$QkTYw0iSwMS4stn/NNreq.5U.MtnwmArtzTDQZArJbywbNth20Ciq');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `prestation`
--
ALTER TABLE `prestation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

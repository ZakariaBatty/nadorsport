-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 19 avr. 2022 à 16:01
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nadorsport`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `lastName`, `firstName`, `email`, `password`, `photo`, `phone`, `status`) VALUES
(1, 'admin ', 'admin', 'admin@gmail.com', '$2y$12$COMKzl7moYIfIUyKmDIaj.gksVcgLm61s86FLbWqyrS3m/iBynP5W', NULL, '687904633', 1);

-- --------------------------------------------------------

--
-- Structure de la table `calendrier`
--

CREATE TABLE `calendrier` (
  `cale_id` int(11) NOT NULL,
  `date_` date NOT NULL,
  `hour_start` varchar(45) NOT NULL,
  `hour_fin` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `user_id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`user_id`, `firstName`, `lastName`, `email`, `phone`, `password`, `status`) VALUES
(29, 'ziko', 'ziko', 'ziko@gmail.com', 6666666, '$2y$12$dsTkAMufMrlI6NrbCGZuc.WGet9csrTUky5R.dCjXydbIz12JWmP6', 0),
(31, 'zakaria', 'batty', 'zbatty0912@gmail.com', 687904633, '$2y$12$a6uI3mRT33FoRJrCYJa3v.qi/ZBz63nu6mAqEU5fPLGLk0ASwdfIi', 0);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `reserv_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `terrain_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `date_` varchar(45) NOT NULL,
  `hour_start` varchar(45) NOT NULL,
  `hour_fin` varchar(45) NOT NULL,
  `status_reservation` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`reserv_id`, `user_id`, `terrain_id`, `sport_id`, `date_`, `hour_start`, `hour_fin`, `status_reservation`) VALUES
(6, 29, 7, 2, '2022-06-22', '08:00', '10:30', 'confirmé');

-- --------------------------------------------------------

--
-- Structure de la table `sports`
--

CREATE TABLE `sports` (
  `sport_id` int(11) NOT NULL,
  `name_sport` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sports`
--

INSERT INTO `sports` (`sport_id`, `name_sport`) VALUES
(1, 'Football'),
(2, 'basketball');

-- --------------------------------------------------------

--
-- Structure de la table `terrains`
--

CREATE TABLE `terrains` (
  `terrain_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `terrain` varchar(255) NOT NULL,
  `localisation` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `sport_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `terrains`
--

INSERT INTO `terrains` (`terrain_id`, `image`, `terrain`, `localisation`, `prix`, `sport_id`) VALUES
(7, 'terrain1 (1).png', 'terrain 1', 'localisation', 14, 1),
(11, 'terrain1 (2).png', 'terrain 2', 'localisation', 30, 1),
(12, 'terrain1 (3).png', 'terrain 4', 'localisation', 30, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `calendrier`
--
ALTER TABLE `calendrier`
  ADD PRIMARY KEY (`cale_id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reserv_id`),
  ADD KEY `terrain_id` (`terrain_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `reservation_ibfk_3` (`sport_id`);

--
-- Index pour la table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`sport_id`);

--
-- Index pour la table `terrains`
--
ALTER TABLE `terrains`
  ADD PRIMARY KEY (`terrain_id`),
  ADD KEY `terrain_ibfk_1` (`sport_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `calendrier`
--
ALTER TABLE `calendrier`
  MODIFY `cale_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reserv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `sports`
--
ALTER TABLE `sports`
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `terrains`
--
ALTER TABLE `terrains`
  MODIFY `terrain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `clients` (`user_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`terrain_id`) REFERENCES `terrains` (`terrain_id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`sport_id`);

--
-- Contraintes pour la table `terrains`
--
ALTER TABLE `terrains`
  ADD CONSTRAINT `terrains_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`sport_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

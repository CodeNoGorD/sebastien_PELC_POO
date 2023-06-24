-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 25 juin 2023 à 00:51
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `motos`
--

-- --------------------------------------------------------

--
-- Structure de la table `moto`
--

CREATE TABLE `moto` (
  `moto_id` int(11) NOT NULL,
  `moto_marque` varchar(255) NOT NULL,
  `moto_modele` varchar(255) NOT NULL,
  `moto_type` int(11) NOT NULL,
  `moto_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `moto`
--

INSERT INTO `moto` (`moto_id`, `moto_marque`, `moto_modele`, `moto_type`, `moto_image`) VALUES
(1, 'SUZUKI', 'GSX-R-1000', 3, 'sportive.jpg'),
(3, 'KAYO', 'Cross 250cc', 1, 'enduro.jpg'),
(4, 'HONDA', 'CMX 1100 Rebel ', 2, 'custom.jpg'),
(7, 'HARLEY-DAVIDSON', 'Sportster S', 4, 'roadster.jpg'),
(9, 'YAMASAKI', 'Scorpion 50 CC', 3, '6496a54a76ec1.jpeg'),
(11, 'DUCATI', 'Streetfighter V4', 4, '649757e5781fb.jpeg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `moto`
--
ALTER TABLE `moto`
  ADD PRIMARY KEY (`moto_id`),
  ADD KEY `moto_type` (`moto_type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `moto`
--
ALTER TABLE `moto`
  MODIFY `moto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `moto`
--
ALTER TABLE `moto`
  ADD CONSTRAINT `moto_ibfk_1` FOREIGN KEY (`moto_type`) REFERENCES `type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

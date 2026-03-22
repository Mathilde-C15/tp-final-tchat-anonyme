-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 22 mars 2026 à 18:44
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp-final-tchat-anonyme`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `content` text NOT NULL,
  `pinned` tinyint(1) DEFAULT NULL,
  `id_room` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `date`, `content`, `pinned`, `id_room`) VALUES
(23, '2026-03-22 18:28:49', 'Comment vous allez aujourd\'hui ?? Moi ça va !', 0, 16),
(24, '2026-03-22 18:29:06', 'ça va très bien j\'ai passé une superbe journée !', 1, 16),
(25, '2026-03-22 18:29:39', 'Ferarie f40', 1, 17),
(26, '2026-03-22 18:29:51', 'GT3 RS', 0, 17),
(27, '2026-03-22 18:30:35', 'Les F1 cest trop beau', 0, 17),
(28, '2026-03-22 18:31:18', 'Zelda BOTW', 0, 18),
(29, '2026-03-22 18:31:22', 'Minecraft', 0, 18),
(30, '2026-03-22 18:31:25', 'Gta V', 0, 18),
(31, '2026-03-22 18:31:31', 'Fortnite', 1, 18),
(32, '2026-03-22 18:31:37', 'Robloc', 0, 18),
(33, '2026-03-22 18:31:46', 'Rocket League', 0, 18),
(34, '2026-03-22 18:32:06', 'Les brainrots', 0, 18),
(35, '2026-03-22 18:32:16', 'League of Legend', 0, 18),
(36, '2026-03-22 18:32:19', 'TFT', 0, 18),
(37, '2026-03-22 18:32:39', 'Zelda TOTK', 0, 18),
(38, '2026-03-22 18:32:56', 'Pire zelda de la d', 0, 18),
(39, '2026-03-22 18:32:59', 'saga', 0, 18),
(40, '2026-03-22 18:34:28', 'Moi je préfère brrr brrr patapim', NULL, 20),
(41, '2026-03-22 18:35:01', 'communication en plus on a un oral', NULL, 22),
(42, '2026-03-22 18:35:20', 'Le zombie de minecraft le meilleur', NULL, 23),
(43, '2026-03-22 18:36:58', 'Coucou', 0, 21);

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`id`, `name`) VALUES
(16, 'Comment s\'est passée votre journée ?'),
(17, 'Voiture préférée ??'),
(18, 'Jeu vidéo auquel vous avez joué en dernier'),
(19, 'Des exploits réalisés récement ?'),
(20, 'Tung tung tung sahur'),
(21, 'Encore un salon pour remplir'),
(22, 'Le prochain cours ?'),
(23, 'Zombies'),
(24, 'Un petit dernier pour la route'),
(25, 'Juste un test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_room` (`id_room`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_room`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 21 nov. 2023 à 16:23
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `memento`
--

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `contents` varchar(255) NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `users_id` int DEFAULT NULL,
  `droit` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `contents`, `color`, `users_id`, `droit`, `created_at`, `modified_at`) VALUES
(4, 'Course ', 'Fromages et charcuteries :\r\n- Fromage à raclette (environ 200-250 g par personne)\r\n\r\n- Charcuterie (jambon, saucisson, etc.)\r\n\r\nPommes de terre :\r\n\r\n- Pommes de terre à chair ferme (environ 3-4 par personne)\r\n\r\nCondiments et accompagnements :\r\n\r\nCornichon', NULL, NULL, NULL, '2023-11-20 13:56:58', '2023-11-20 13:55:55'),
(25, 'tit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum incidunt aperiam officiis ea temporibus laudantium! Tempore, veniam qui libero odio at, accusamus vitae, tempora natus rem itaque mollitia velit consectetur!', 'red', NULL, NULL, '2023-11-21 10:50:54', '2023-11-21 10:50:26'),
(37, 'Php', '<?php echo \'<h1>Bonjour, \' . $_SESSION[\'user\'][\'name\'] . \', \' . $_SESSION[\'user\'][\'firstname\'] . \'</h1>\'; ?>', 'green', 1, NULL, '2023-11-21 16:15:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(5) NOT NULL DEFAULT 'us',
  `email` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `type`, `email`, `name`, `firstname`, `password`, `created_at`, `modified_at`) VALUES
(1, 'us', 'richard@boomer.old', 'Richard', 'Boomer', '5f4dcc3b5aa765d61d8327deb882cf99', '2023-11-21 09:45:28', NULL),
(2, 'su', 'super.user@memento.com', 'Super', 'User', 'c0f736e821fdf74987a154054283bc4d', '2023-11-21 13:31:14', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_relas` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

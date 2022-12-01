-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 déc. 2022 à 22:33
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `labs_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `cin` varchar(255) NOT NULL,
  `n_tele` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `cin`, `n_tele`, `age`, `created_at`, `updated_at`) VALUES
(1, 'Eddiani', 'anas', 'm555555', '0634509362', NULL, '2022-11-19 07:30:39', '2022-11-19 07:30:39'),
(3, 'fathi', 'ahmed', 'm457896', '0612365474', 45, '2022-11-19 14:51:26', '2022-11-19 14:51:26');

-- --------------------------------------------------------

--
-- Structure de la table `clients_services`
--

CREATE TABLE `clients_services` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `montant` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients_services`
--

INSERT INTO `clients_services` (`id`, `client_id`, `service_id`, `montant`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 200, '2022-11-19 08:38:34', '2022-11-19 08:38:34'),
(2, 1, 5, 2500, '2022-11-19 13:37:01', '2022-11-19 13:37:01'),
(3, 1, 2, 200, '2022-11-19 15:49:40', '2022-11-19 15:49:40'),
(4, 1, 2, 200, '2022-11-19 15:49:50', '2022-11-19 15:49:50'),
(5, 3, 3, 800, '2022-11-19 15:51:58', '2022-11-19 15:51:58');

-- --------------------------------------------------------

--
-- Structure de la table `clients_services_paiements`
--

CREATE TABLE `clients_services_paiements` (
  `id` int(11) NOT NULL,
  `clients_services_id` int(11) NOT NULL,
  `paiement_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients_services_paiements`
--

INSERT INTO `clients_services_paiements` (`id`, `clients_services_id`, `paiement_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-11-19 14:27:42', '2022-11-19 14:27:42'),
(2, 1, 2, '2022-11-19 14:28:04', '2022-11-19 14:28:04'),
(3, 2, 3, '2022-11-19 14:28:23', '2022-11-19 14:28:23'),
(4, 1, 4, '2022-11-19 14:28:44', '2022-11-19 14:28:44'),
(5, 1, 5, '2022-11-19 15:48:02', '2022-11-19 15:48:02'),
(6, 5, 6, '2022-11-19 15:53:08', '2022-11-19 15:53:08');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `client_service_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `mineType` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `img`, `client_service_id`, `type`, `mineType`, `created_at`, `updated_at`) VALUES
(1, 'uploads/1668868172_reçu-392.pdf', 2, 1, 'application/pdf', '2022-11-19 14:29:32', '2022-11-19 14:29:32'),
(2, 'uploads/1668868188_image.jpg', 2, 1, 'image/jpeg', '2022-11-19 14:29:48', '2022-11-19 14:29:48'),
(3, 'uploads/1669930167_szfkXrrkF8STls-2yuAHQeHOPAn4WHmkIqbhWr6_wV4_1920x1080_1x-0.jpg', 5, 1, 'image/jpeg', '2022-12-01 21:29:28', '2022-12-01 21:29:28');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `note` text NOT NULL,
  `client_service_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `note`, `client_service_id`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2, '2022-11-19 13:30:19', '2022-11-19 13:30:19');

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `id` int(11) NOT NULL,
  `montant` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `paiements`
--

INSERT INTO `paiements` (`id`, `montant`, `created_at`, `updated_at`) VALUES
(1, '500', '2022-11-19 14:27:42', '2022-11-19 14:27:42'),
(2, '100', '2022-11-19 14:28:04', '2022-11-19 14:28:04'),
(3, '1000', '2022-11-19 14:28:23', '2022-11-19 14:28:23'),
(4, '50', '2022-11-19 14:28:44', '2022-11-19 14:28:44'),
(5, '50', '2022-11-19 15:48:02', '2022-11-19 15:48:02'),
(6, '200', '2022-11-19 15:53:08', '2022-11-19 15:53:08');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `title`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Medecine dentaire', '200', '2022-11-15 18:15:43', '2022-11-15 18:15:43'),
(2, 'Orthodontie', '200', '2022-11-15 18:16:00', '2022-11-15 18:16:00'),
(3, 'Dente fixes', '200', '2022-11-15 18:16:26', '2022-11-15 18:16:26'),
(5, 'Prothese dentaire', '1000', '2022-11-15 18:17:02', '2022-11-19 14:48:38');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom_complet`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'admin@gmail.com', '$2y$10$yKVjSxwy52QhSiyLc8BD5.P7U0AsWc1oJG.ErQqzGB/KMw1k58p2W', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'inviter', 'inviter@gmail.com', '$2y$10$3dpgu2cw2qVFw8JHw3YdR.kQLx6KSdv75FpCKQGkrb2W.w/PMy04K', 'invite', '2022-11-19 13:08:39', '2022-11-19 13:08:39'),
(3, 'test test', 'test@gmail.com', '$2y$10$/JgjWLLQJQS59IliUpxie.NXEeOzvBQepQpIicEJ6nWJ6dvs43OB6', 'invite', '2022-11-19 14:54:53', '2022-11-19 14:54:53');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients_services`
--
ALTER TABLE `clients_services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients_services_paiements`
--
ALTER TABLE `clients_services_paiements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `clients_services`
--
ALTER TABLE `clients_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `clients_services_paiements`
--
ALTER TABLE `clients_services_paiements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

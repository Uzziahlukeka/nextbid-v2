-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 01 juil. 2023 à 09:37
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `log`
--

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(256) NOT NULL,
  `item_photo` longblob NOT NULL,
  `item_description` varchar(256) DEFAULT NULL,
  `item_price` int(11) NOT NULL,
  `item_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_photo`, `item_description`, `item_price`, `item_date`) VALUES
(56, 'joy', 0x4057616c6c7061706572734772616d346b5f617374726f6e6175745f3338343078323631342e6a7067, 'more than money', 12000, '2023-06-23 22:00:01'),
(57, 'try', 0x32303233303131385f3039333632382e6a7067, 'second chance on trying', 4500, '2023-07-01 08:15:11');

-- --------------------------------------------------------

--
-- Structure de la table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(69, 'Uzziah Lukekas', 'uzziahlukeka007@gmail.com', '$2y$10$szStwbvIJvJVSAt5cawozOhE0fMRmi.HqpIflAV.ZTjQP3g6xWBEC', '2023-07-01 09:16:11'),
(68, 'Uzziah Lukeka Yambayamba', 'uzziahlukeka04@gmail.com', '$2y$10$17cvHweHtpxr3CtU6i9vwenwb.9eYMinvd1CaztBhTH3rtL6jYJMO', '2023-06-23 21:53:53'),
(66, 'Uzziah Lukeka Yambayamba', 'uzziahlukeka@gmail.com', '$2y$10$tIsW5ImgDi5OgICyueX.FeAkI/3424IKgg.1jKfidugorZl0GQZg6', '2023-06-15 19:17:18'),
(67, 'john katkat', 'uzziahlukekaas@gmail.com', '$2y$10$uGv5ayKHvYEkVtTQ8LtKZet15VSuUg67MeypKgrIXJhrMjY/NFk8S', '2023-06-17 11:25:49');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Index pour la table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

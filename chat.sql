-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 16 mai 2022 à 06:52
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
-- Base de données : `chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `canaux`
--

CREATE TABLE `canaux` (
  `id_c` int(11) NOT NULL,
  `canal` varchar(80) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `canaux`
--

INSERT INTO `canaux` (`id_c`, `canal`, `date`) VALUES
(2, 'actus', '2022-05-03 06:23:26'),
(16, 'tele', '2022-05-10 10:22:27'),
(18, 'sport', '2022-05-10 11:35:56'),
(19, 'ciné', '2022-05-10 11:36:06'),
(20, 'mode', '2022-05-11 10:04:20'),
(21, 'art', '2022-05-11 10:07:57'),
(22, 'cuisine', '2022-05-16 08:00:15');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE `droits` (
  `id` int(11) NOT NULL,
  `statut` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `statut`) VALUES
(1, 'user'),
(666, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id_m` int(11) NOT NULL,
  `pseudo` varchar(80) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `id_channel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_m`, `pseudo`, `msg`, `id_channel`, `id_user`, `date`) VALUES
(197, 'toti', 'hello', 2, 15, '2022-05-13 11:04:31'),
(198, 'test', 'ca va !', 19, 1, '2022-05-13 11:04:52'),
(199, 'test', 'hey', 19, 1, '2022-05-13 11:04:59'),
(200, 'toti', 'ca va', 2, 15, '2022-05-13 11:05:08'),
(201, 'toti', 'comment ca va !', 19, 15, '2022-05-13 11:05:44'),
(202, 'rick', 'hello', 18, 16, '2022-05-15 13:08:23'),
(203, 'test', 'hello', 18, 1, '2022-05-15 13:08:52'),
(204, 'rick', 'comment vas tu ', 18, 16, '2022-05-15 13:09:05'),
(205, 'rick', 'oui', 2, 16, '2022-05-15 13:09:28'),
(206, 'rick', 'bonour', 20, 16, '2022-05-15 13:10:22'),
(207, 'rick', 'bonjour', 20, 16, '2022-05-15 13:11:21'),
(208, 'rick', 'hello', 20, 16, '2022-05-15 13:11:38'),
(209, 'test', 'qui fait de la peinture ici', 21, 1, '2022-05-15 13:12:24'),
(210, 'rick', 'qui fait de la peinture ici', 21, 16, '2022-05-15 13:13:05'),
(211, 'test', 'hello', 21, 1, '2022-05-15 13:13:34'),
(212, 'toti', 'pourquoi?', 21, 15, '2022-05-15 13:14:51'),
(213, 'toti', 'hello', 21, 15, '2022-05-16 07:04:31'),
(214, 'toti', 'jjj', 19, 15, '2022-05-16 07:26:27');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_u` int(11) NOT NULL,
  `pseudo` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `id_droit` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_u`, `pseudo`, `email`, `mdp`, `id_droit`) VALUES
(1, 'test', 'test@mail.com', 'test', 666),
(14, 'mat', 'mat@mail.com', 'mat', 1),
(15, 'toti', 'toto@mail.com', 'toto', 1),
(16, 'rick', 'rick@mail.com', 'rick', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `canaux`
--
ALTER TABLE `canaux`
  ADD PRIMARY KEY (`id_c`);

--
-- Index pour la table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_m`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `canaux`
--
ALTER TABLE `canaux`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `droits`
--
ALTER TABLE `droits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=667;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

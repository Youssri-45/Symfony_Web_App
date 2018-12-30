-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 27 Mai 2017 à 03:13
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pfa2`
--

-- --------------------------------------------------------

--
-- Structure de la table `abscence`
--

CREATE TABLE `abscence` (
  `id` int(11) NOT NULL,
  `date_abs` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `num_tel`, `email`, `password`) VALUES
(1, 'Bchir', 'Hassene', '99244785', 'bchirhassene@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `employer`
--

CREATE TABLE `employer` (
  `id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_embauche` datetime DEFAULT NULL,
  `assiduite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `employer`
--

INSERT INTO `employer` (`id`, `is_active`, `date_embauche`, `assiduite`, `nom`, `prenom`, `num_tel`, `email`, `password`) VALUES
(1, 1, '2017-03-11 00:00:00', '5', 'Bchir', 'Hassene', '99244785', 'bchirhassene@gmail.com', '123456789'),
(2, 1, '2017-05-12 00:00:00', '4', 'doe', 'john', '1234', 'johndoe@gmail.om', '123456789'),
(4, 1, '2017-05-21 00:00:00', '4', 'dhaouadi', 'aymen', '123456', 'chouaib@gmail.com', '123'),
(6, 1, '2017-05-24 02:57:14', '3', 'chouaib', 'chouaib', '12345', 'chouaib2@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `gentillesse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serieux` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `efficacite` int(11) NOT NULL,
  `is_resolved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`id`, `note`, `client_id`, `employer_id`, `gentillesse`, `serieux`, `efficacite`, `is_resolved`) VALUES
(1, '3', 1, 2, '2', '4', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `noteclient`
--

CREATE TABLE `noteclient` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gentillesse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serieux` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `efficacite` int(11) NOT NULL,
  `is_resolved` tinyint(1) NOT NULL,
  `tache_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `noteclient`
--

INSERT INTO `noteclient` (`id`, `client_id`, `employer_id`, `note`, `gentillesse`, `serieux`, `efficacite`, `is_resolved`, `tache_id`, `created_at`) VALUES
(15, 1, 1, '3.6666666666667', '4', '4', 3, 1, 1, '0000-00-00 00:00:00'),
(16, 1, 2, '3.6666666666667', '3', '4', 4, 1, 2, '0000-00-00 00:00:00'),
(17, 1, 2, '3.3333333333333', '3', '4', 3, 1, 3, '0000-00-00 00:00:00'),
(18, 1, 1, '4', '3', '5', 4, 1, 8, '0000-00-00 00:00:00'),
(19, 1, 1, '3.3333333333333', '3', '3', 4, 1, 9, '0000-00-00 00:00:00'),
(20, 1, 6, '3.6666666666667', '4', '3', 4, 1, 10, '2017-05-24 03:06:53'),
(21, 1, 1, '3.6666666666667', '4', '3', 4, 1, 7, '2017-05-24 10:47:45'),
(22, 1, 1, '4.6666666666667', '5', '5', 4, 1, 11, '2017-05-24 10:52:29');

-- --------------------------------------------------------

--
-- Structure de la table `noteemployer`
--

CREATE TABLE `noteemployer` (
  `id` int(11) NOT NULL,
  `employer_note_id` int(11) NOT NULL,
  `employer_notant_id` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gentillesse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serieux` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `efficacite` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `noteemployer`
--

INSERT INTO `noteemployer` (`id`, `employer_note_id`, `employer_notant_id`, `note`, `gentillesse`, `serieux`, `efficacite`, `created_at`) VALUES
(1, 2, 1, '3', '3', '4', 2, '0000-00-00 00:00:00'),
(2, 4, 1, '3.3333333333333', '4', '4', 2, '0000-00-00 00:00:00'),
(3, 2, 1, '4.6666666666667', '4', '5', 5, '2017-05-23 07:30:28'),
(4, 1, 2, '4', '3', '4', 5, '2017-05-23 17:08:34'),
(5, 6, 1, '3.6666666666667', '4', '4', 3, '2017-05-24 03:03:50'),
(6, 2, 1, '3.3333333333333', '3', '4', 3, '2017-05-24 13:58:28');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `nom_tache` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_resolved` tinyint(1) DEFAULT NULL,
  `is_done` tinyint(1) DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_noted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `note_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tache`
--

INSERT INTO `tache` (`id`, `employer_id`, `client_id`, `nom_tache`, `is_resolved`, `is_done`, `description`, `is_noted`, `created_at`, `note_id`) VALUES
(1, 1, 1, 'Panne Disque Dur', 1, NULL, 'sjksdhfsdnglksd,gsdgsdgsgsdgsjksdhfsdnglksd,gsdgsdgsgsdgsjksdhfsdnglksd,gsdgsdgsgsdgsjksdhfsdnglksd,gsdgsdgsgsdgsjksdhfsdnglksd,gsdgsdgsgsdgsjksdhfsdnglksd,gsdgsdgsgsdg', 1, '0000-00-00 00:00:00', NULL),
(2, 2, 1, 'panne pc', 1, NULL, 'sdsgsgsdgsdg', 1, '0000-00-00 00:00:00', 16),
(3, 2, 1, 'panne pc2', 1, NULL, 'sgsdgsdgds', 1, '0000-00-00 00:00:00', 17),
(4, 2, 1, 'panne pc3', NULL, NULL, 'hlghgfghdhdh', 1, '0000-00-00 00:00:00', NULL),
(5, 2, 1, 'panne pc3', NULL, NULL, 'hlghgfghdhdh', 1, '0000-00-00 00:00:00', NULL),
(6, 2, 1, 'panne pc4', NULL, NULL, 'sgqqllfgjhljmgljgmlj', 1, '2017-05-12 05:37:50', NULL),
(7, 1, 1, 'Chouaib', 1, NULL, 'vwxbbwb', 1, '2017-05-14 23:58:33', 21),
(8, 1, 1, 'panne', 1, NULL, 'jkhsdhjshgd', 1, '2017-05-19 12:29:12', 18),
(9, 1, 1, 'panne pcsdgsgs', 1, NULL, 'jkhsjhflsdksdlg', 1, '2017-05-19 17:01:58', 19),
(10, 6, 1, 'Chouaib 3', 1, NULL, 'gsgdsgsd', 1, '2017-05-24 03:06:13', 20),
(11, 1, 1, 'nouveau', 1, NULL, 'lkhsklsdghshgldsklg', 1, '2017-05-24 10:50:29', 22),
(12, 1, 1, 'tache 1', NULL, NULL, 'nouvelle tache', 0, '2017-05-24 13:59:04', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abscence`
--
ALTER TABLE `abscence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C7440455E7927C74` (`email`);

--
-- Index pour la table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_DE4CF066E7927C74` (`email`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CFBDFA1419EB6921` (`client_id`),
  ADD KEY `IDX_CFBDFA1441CD9E7A` (`employer_id`);

--
-- Index pour la table `noteclient`
--
ALTER TABLE `noteclient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_286C4B1E19EB6921` (`client_id`),
  ADD KEY `IDX_286C4B1E41CD9E7A` (`employer_id`),
  ADD KEY `IDX_286C4B1ED2235D39` (`tache_id`);

--
-- Index pour la table `noteemployer`
--
ALTER TABLE `noteemployer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2BA2D5816E0071E2` (`employer_note_id`),
  ADD KEY `IDX_2BA2D58179EE8F87` (`employer_notant_id`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9387207541CD9E7A` (`employer_id`),
  ADD KEY `IDX_9387207519EB6921` (`client_id`),
  ADD KEY `IDX_9387207526ED0855` (`note_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `abscence`
--
ALTER TABLE `abscence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `noteclient`
--
ALTER TABLE `noteclient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `noteemployer`
--
ALTER TABLE `noteemployer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_CFBDFA1419EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_CFBDFA1441CD9E7A` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`);

--
-- Contraintes pour la table `noteclient`
--
ALTER TABLE `noteclient`
  ADD CONSTRAINT `FK_286C4B1E19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_286C4B1E41CD9E7A` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`),
  ADD CONSTRAINT `FK_286C4B1ED2235D39` FOREIGN KEY (`tache_id`) REFERENCES `tache` (`id`);

--
-- Contraintes pour la table `noteemployer`
--
ALTER TABLE `noteemployer`
  ADD CONSTRAINT `FK_2BA2D5816E0071E2` FOREIGN KEY (`employer_note_id`) REFERENCES `employer` (`id`),
  ADD CONSTRAINT `FK_2BA2D58179EE8F87` FOREIGN KEY (`employer_notant_id`) REFERENCES `employer` (`id`);

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `FK_9387207519EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_9387207526ED0855` FOREIGN KEY (`note_id`) REFERENCES `noteclient` (`id`),
  ADD CONSTRAINT `FK_9387207541CD9E7A` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

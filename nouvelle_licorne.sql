-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 29 mars 2022 à 09:49
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nouvelle_licorne`
--

-- --------------------------------------------------------

--
-- Structure de la table `benevoles`
--

CREATE TABLE `benevoles` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `benevoles`
--

INSERT INTO `benevoles` (`id`, `prenom`, `nom`, `date_naissance`, `adresse`, `ville`, `telephone`) VALUES
(1, 'baris', 'amine', '2002-03-20', '1 rue des champs', 'Strasbourg', '0655649585');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `categorie` enum('caritatif','competitif','initiation','sponsoring') NOT NULL,
  `materiel` set('table','souris','clavier','cables','chaise','ecran','tour','nourritures','casque','serveur','camera') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `nom`, `lieu`, `date`, `categorie`, `materiel`) VALUES
(1, 'Z-event', 'Paris', '2022-04-01', '', 'table,souris,clavier,cables,chaise,ecran,tour,nourritures'),
(2, 'Z-event', 'Paris', '2022-04-01', 'caritatif', 'table');

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`id`, `prenom`, `nom`, `pic`, `text`) VALUES
(1, 'Kevin', 'Fernandez', 'https://media-exp1.licdn.com/dms/image/C4D35AQF1BKY5cmVtkg/profile-framedphoto-shrink_800_800/0/1598863729130?e=1648627200&v=beta&t=mKRYy9mC5BBXCIPmzkVYI9f1Y2FyA8U_WcjU1hoNjIE', ' Cuando Dios amanece, para todos amanece. '),
(2, 'Franck', 'Roth', 'https://media-exp1.licdn.com/dms/image/C4D03AQEBp-G-hFrTfQ/profile-displayphoto-shrink_800_800/0/1623501118704?e=1654128000&v=beta&t=tL0106XHWBZcFjps3y5mND6cnhQdT5bNUFPtwNVh414', 'Le Boss'),
(3, 'Baris', 'Gunay', 'https://media-exp1.licdn.com/dms/image/C4E03AQFz0vNeRHMzaw/profile-displayphoto-shrink_800_800/0/1648307544548?e=1654128000&v=beta&t=NSwUN1pfUdjitbpkCGuo2SKfKT3eHFnE_0GiGjD7rNg', 'Merhaba benim adım Barış sadece kızları sikiyorum ve bilişimde harikayım\r\n'),
(4, 'Amine', 'El amrani', 'https://media-exp1.licdn.com/dms/image/C4D03AQFkVE6DGrIzXQ/profile-displayphoto-shrink_800_800/0/1648214693507?e=2147483647&v=beta&t=JXaK0EyY6LiDzc6-MLVhdOjr_j6NEHDwpHLaCJrYdqw', 'La valeur de la jeunesse, c\'est un vieux qui te la donnera. La valeur de la richesse, c\'est un pauvre qui te la donnera.\r\n');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `benevoles`
--
ALTER TABLE `benevoles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `benevoles`
--
ALTER TABLE `benevoles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

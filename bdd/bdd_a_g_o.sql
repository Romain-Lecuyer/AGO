-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 02 mai 2022 à 16:39
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_a_g_o`
--

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

CREATE TABLE `amis` (
  `utilisateur1` int(11) DEFAULT NULL,
  `utilisateur2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `jeuxID` int(11) DEFAULT NULL,
  `utilisateurID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`jeuxID`, `utilisateurID`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `id` int(100) NOT NULL,
  `nom_jeux` varchar(100) NOT NULL,
  `vote` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `main` varchar(9999) DEFAULT NULL,
  `descrip` text NOT NULL,
  `telechar` text DEFAULT NULL,
  `nblike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`id`, `nom_jeux`, `vote`, `type`, `main`, `descrip`, `telechar`, `nblike`) VALUES
(1, 'Zombie Invader', 47, 'T', NULL, 'Zombie Invader est un jeu de tower defense, vous contrôlez une tourelle que vous devrez améliorer pour résister aux vagues de Zombies. Vous pouvez aussi placer des protections comme des murs et différents types de mines. Vous débloquerez après plusieurs vagues le bombardier et si vous resistez assez longtemps vous aurez accès à la bombe nucléaire vous permettant de gagner la partie. Ce jeu comporte 3 cartes, 21 succès et 6 skins. Bonne chance et bon jeu!', 'Zombie_Invader V 1.2.1.zip', 0),
(2, 'Speed Click', 3, 'L', 'jeux/SC.php', 'Vous disposez d\'une minute pour cliquer sur un maximum de blocs bleus. \r\nLe chronomètre démarrera quand vous cliquerez sur le premier bloc bleu. \r\nBonne chance. \r\nConseil : mettre la page web en full screen \"F11\".', NULL, 0),
(3, 'Simon', 9, 'L', NULL, 'Le classique jeu du Simon, solo ,arcade.', NULL, 0),
(4, 'Snake', 50, 'L', NULL, 'Le bon vieux Snake que tout le monde connait, solo ,arcade.', NULL, 0),
(5, 'Juste Prix', 1, 'L', NULL, 'Le classique jeu du Juste Prix, solo.', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `img` varchar(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `descrip` varchar(512) DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `img`, `mail`, `mdp`, `descrip`, `statut`) VALUES
(1, 'Mast', '', 'nik', 'P@ssword', 'Mast tel un Master', 'En ligne'),
(2, 'romain', '', '', 'P@ssword', NULL, NULL),
(3, 'thierry', '', '', 'P@ssword', NULL, NULL),
(4, 'theo', '', '', 'P@ssword', NULL, NULL),
(5, 'UnaChevrotina', '', '', 'P@ssword', 'Chèvre personnage d\'un jeu à temps plein', NULL),
(6, 'erwan', '', '', 'P@ssword', NULL, NULL),
(7, 'f', '', '', 'P@ssword', NULL, NULL),
(8, 'Crxnglxrd', '', '', '3105', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `amis`
--
ALTER TABLE `amis`
  ADD KEY `utilisateur1` (`utilisateur1`),
  ADD KEY `utilisateur2` (`utilisateur2`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD KEY `jeuxID` (`jeuxID`),
  ADD KEY `utilisateurID` (`utilisateurID`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `amis`
--
ALTER TABLE `amis`
  ADD CONSTRAINT `amis_ibfk_1` FOREIGN KEY (`utilisateur1`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `amis_ibfk_2` FOREIGN KEY (`utilisateur2`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`jeuxID`) REFERENCES `jeux` (`id`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`utilisateurID`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

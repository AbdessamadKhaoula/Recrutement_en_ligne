-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 mars 2023 à 00:08
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `recrutement_en_ligne`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `idAnnonce` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `societe` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `domaine` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `reference` varchar(10) NOT NULL,
  `dateDebut` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`idAnnonce`, `mail`, `societe`, `type`, `domaine`, `categorie`, `reference`, `dateDebut`, `description`) VALUES
(2, 'anas@gmail.com', 'xxxxx', 'Stage', 'Informatique', 'Bac+3', '345678', '2023-04-09', 'Un poste de responsable de gestion de projets\r\n'),
(3, 'anas@gmail.com', 'YYYY', 'Emploi', 'Comptabilité ', 'Bac+2', '45678', '2023-04-20', 'Nous sommes à la recherche d\'un comptable \r\n'),
(4, 'admin@gmail.com', 'xxxxx', 'Emploi', 'Mécanique ', 'Bac+5', '4567890', '2023-05-20', 'Nous sommes à la recherche d\'un ingénieur en mécanique '),
(5, 'admin@gmail.com', 'XXXXXXX', 'Emploi', 'Marketing ', 'Bac+2', '567890', '2023-04-08', 'offres d\'emploi disponibles: Chargé De Marketing, Chef De Projet Digital et bien d\'autres : postulez dès maintenant !'),
(6, 'admin@gmail.com', 'xxxxx', 'Emploi', 'Mécanique ', 'Bac+3', '7890', '2023-03-31', 'Production, maintenance, qualité Secteur ');

-- --------------------------------------------------------

--
-- Structure de la table `candidatcv`
--

CREATE TABLE `candidatcv` (
  `id` int(11) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `score` double NOT NULL,
  `domaine` varchar(30) NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `dureeExp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `candidatcv`
--

INSERT INTO `candidatcv` (`id`, `mail`, `tel`, `adresse`, `score`, `domaine`, `categorie`, `dureeExp`) VALUES
(17, 'khawla@gmail.com', '0612345678', 'Casablanca', 4.25, 'Informatique', 'Bac+3', 1),
(18, 'kawtar@gmail.com', '0612345678', 'Casablanca', 5.25, 'Commerce ', 'Bac+5', 2),
(19, 'faouzia@gmail.com', '0612345678', 'Casablanca', 4.25, 'Informatique', 'Bac+3', 4);

-- --------------------------------------------------------

--
-- Structure de la table `candidats`
--

CREATE TABLE `candidats` (
  `idCandidat` int(11) NOT NULL,
  `nomCandidat` varchar(20) NOT NULL,
  `prenomCandidat` varchar(20) NOT NULL,
  `mailCandidat` varchar(50) NOT NULL,
  `passwordCandidat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `candidats`
--

INSERT INTO `candidats` (`idCandidat`, `nomCandidat`, `prenomCandidat`, `mailCandidat`, `passwordCandidat`) VALUES
(12, 'Khaoula ', 'khaoula ', 'myemail@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(13, 'khawla ', 'khawla', 'khawla@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, 'kaoutar', 'kaoutar', 'kaoutar@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(15, 'faouzia', 'Faouzia', 'faouzia@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `idCategorie` int(11) NOT NULL,
  `NomCategorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idCategorie`, `NomCategorie`) VALUES
(1, 'Bac'),
(2, 'Bac+2'),
(3, 'Bac+3'),
(4, 'Bac+5'),
(5, 'Bac+8');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `idCompetence` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `idCandidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`idCompetence`, `nom`, `idCandidat`) VALUES
(18, 'php', 17),
(19, 'java', 17),
(20, '   php', 18),
(21, 'c++', 18),
(22, 'sql', 19);

-- --------------------------------------------------------

--
-- Structure de la table `domaines`
--

CREATE TABLE `domaines` (
  `idDomaine` int(11) NOT NULL,
  `NomDomaine` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `domaines`
--

INSERT INTO `domaines` (`idDomaine`, `NomDomaine`) VALUES
(1, 'Informatique'),
(2, 'Industrie'),
(3, 'Achats et Approvisionnement'),
(4, 'Art et Design'),
(5, 'Banque et Assurence'),
(6, 'Biologie et Agroalimentaire'),
(7, 'Construction'),
(8, 'Commerce '),
(9, 'Comptabilité '),
(10, 'Droit et Justice'),
(11, 'Education'),
(12, 'Journalisme'),
(13, 'Electrique'),
(14, 'Energies renouvables'),
(15, 'Gestion et Organisation '),
(16, 'Hôtellerie'),
(17, 'Marketing '),
(18, 'Mécanique '),
(19, 'Mecatronique'),
(20, 'Production'),
(21, 'Sécurité '),
(22, 'Réseau et télécommunication'),
(23, 'Ressources humaines '),
(24, 'Santé '),
(25, 'Sport'),
(26, 'Politique ');

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `idExperience` int(11) NOT NULL,
  `nomExp` varchar(50) NOT NULL,
  `societe` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `idCandidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`idExperience`, `nomExp`, `societe`, `type`, `dateDebut`, `dateFin`, `idCandidat`) VALUES
(15, 'stage d\'initiation', 'xxxxx', 'Stage', '2022-07-07', '2022-08-07', 17),
(16, 'assistance commerciale ', 'xxxxx', 'Stage', '2023-03-03', '2023-04-09', 18),
(17, 'stage d\'observation ', 'yyy', 'Stage', '2023-03-24', '2023-04-02', 19);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `idformation` int(11) NOT NULL,
  `nomForation` varchar(50) NOT NULL,
  `etablisement` varchar(50) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `idCandidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`idformation`, `nomForation`, `etablisement`, `dateDebut`, `dateFin`, `idCandidat`) VALUES
(16, 'bac', 'lycée xxx', '2019-09-09', '2020-07-09', 17),
(17, 'LST', 'Fsts', '2022-09-01', '2023-07-01', 18),
(18, 'bac', 'lycée xxx', '2023-02-28', '2023-03-16', 18),
(19, 'bac', 'lycée xxx', '2023-03-01', '2023-03-30', 19),
(20, 'deust', 'fsts', '2023-03-02', '2023-03-18', 19);

-- --------------------------------------------------------

--
-- Structure de la table `recruteurs`
--

CREATE TABLE `recruteurs` (
  `idRecruteur` int(11) NOT NULL,
  `nomRecruteur` varchar(20) NOT NULL,
  `prenomRecruteur` varchar(20) NOT NULL,
  `mailRecruteur` varchar(50) NOT NULL,
  `passwordRecruteur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recruteurs`
--

INSERT INTO `recruteurs` (`idRecruteur`, `nomRecruteur`, `prenomRecruteur`, `mailRecruteur`, `passwordRecruteur`) VALUES
(2, 'Anas', 'Anas', 'anas@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'abc', 'admin', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`idAnnonce`);

--
-- Index pour la table `candidatcv`
--
ALTER TABLE `candidatcv`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD PRIMARY KEY (`idCandidat`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`idCompetence`),
  ADD KEY `idCandidat` (`idCandidat`);

--
-- Index pour la table `domaines`
--
ALTER TABLE `domaines`
  ADD PRIMARY KEY (`idDomaine`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`idExperience`),
  ADD KEY `idCandidat` (`idCandidat`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`idformation`),
  ADD KEY `idCandidat` (`idCandidat`);

--
-- Index pour la table `recruteurs`
--
ALTER TABLE `recruteurs`
  ADD PRIMARY KEY (`idRecruteur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `idAnnonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `candidatcv`
--
ALTER TABLE `candidatcv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `candidats`
--
ALTER TABLE `candidats`
  MODIFY `idCandidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `idCompetence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `domaines`
--
ALTER TABLE `domaines`
  MODIFY `idDomaine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `idExperience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `idformation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `recruteurs`
--
ALTER TABLE `recruteurs`
  MODIFY `idRecruteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `competences`
--
ALTER TABLE `competences`
  ADD CONSTRAINT `competences_ibfk_1` FOREIGN KEY (`idCandidat`) REFERENCES `candidatcv` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_ibfk_1` FOREIGN KEY (`idCandidat`) REFERENCES `candidatcv` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_ibfk_1` FOREIGN KEY (`idCandidat`) REFERENCES `candidatcv` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

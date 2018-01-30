-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 30 Janvier 2018 à 10:08
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `annee`
--

CREATE TABLE `annee` (
  `idAnnee` int(11) NOT NULL,
  `libelleAnne` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `chapitres`
--

CREATE TABLE `chapitres` (
  `idChapitre` int(11) NOT NULL,
  `titreChapitre` varchar(25) DEFAULT NULL,
  `idNiveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `idClasse` int(11) NOT NULL,
  `nomClasse` varchar(25) DEFAULT NULL,
  `idNiveau` int(11) NOT NULL,
  `idAnnee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `idCompetence` int(11) NOT NULL,
  `titreCompetence` varchar(25) DEFAULT NULL,
  `idChapitre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `idEleve` int(11) NOT NULL,
  `nomEleve` varchar(250) DEFAULT NULL,
  `prenomEleve` varchar(250) DEFAULT NULL,
  `idClasse` int(11) NOT NULL,
  `idSexe` int(11) NOT NULL,
  `idUtilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

CREATE TABLE `niveaux` (
  `idNiveau` int(11) NOT NULL,
  `titreNiveau` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `notation`
--

CREATE TABLE `notation` (
  `idNotation` int(11) NOT NULL,
  `libelleNotation` varchar(25) DEFAULT NULL,
  `idCompetence` int(11) NOT NULL,
  `idEleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

CREATE TABLE `professeurs` (
  `idProfesseur` int(11) NOT NULL,
  `nomProfesseur` varchar(250) DEFAULT NULL,
  `prenomProfesseur` varchar(250) DEFAULT NULL,
  `idSexe` int(11) NOT NULL,
  `idUtilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `prof_classe`
--

CREATE TABLE `prof_classe` (
  `idClasse` int(11) NOT NULL,
  `idProfesseur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

CREATE TABLE `sexe` (
  `idSexe` int(11) NOT NULL,
  `nomSexe` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL,
  `loginUtilisateur` varchar(250) DEFAULT NULL,
  `mdpUtilisateur` varchar(250) DEFAULT NULL,
  `saltUtilisateur` varchar(250) DEFAULT NULL,
  `roleUtilisateur` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `loginUtilisateur`, `mdpUtilisateur`, `saltUtilisateur`, `roleUtilisateur`) VALUES
(1, 'JohnDoe', 'L2nNR5hIcinaJkKR+j4baYaZjcHS0c3WX2gjYF6Tmgl1Bs+C9Qbr+69X8eQwXDvw0vp73PrcSeT0bGEW5+T2hA==', 'YcM=A$nsYzkyeDVjEUa7W9K', 'ROLE_ADMIN'),
(2, 'JaneDoe', 'EfakNLxyhHy2hVJlxDmVNl1pmgjUZl99gtQ+V3mxSeD8IjeZJ8abnFIpw9QNahwAlEaXBiQUBLXKWRzOmSr8HQ==', 'dhMTBkzwDKxnD;4KNs,4ENy', 'ROLE_USER'),
(3, 'admin', 'gqeuP4YJ8hU3ZqGwGikB6+rcZBqefVy+7hTLQkOD+jwVkp4fkS7/gr1rAQfn9VUKWc7bvOD7OsXrQQN5KGHbfg==', 'EDDsl&fBCJB|a5XUtAlnQN8', 'ROLE_ADMIN');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annee`
--
ALTER TABLE `annee`
  ADD PRIMARY KEY (`idAnnee`);

--
-- Index pour la table `chapitres`
--
ALTER TABLE `chapitres`
  ADD PRIMARY KEY (`idChapitre`),
  ADD KEY `FK_chapitres_idNiveau` (`idNiveau`);

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`idClasse`),
  ADD KEY `FK_classes_idNiveau` (`idNiveau`),
  ADD KEY `FK_classes_idAnnee` (`idAnnee`);

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`idCompetence`),
  ADD KEY `FK_competences_idChapitre` (`idChapitre`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`idEleve`),
  ADD KEY `FK_eleves_idClasse` (`idClasse`),
  ADD KEY `FK_eleves_idSexe` (`idSexe`),
  ADD KEY `FK_eleves_idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`idNiveau`);

--
-- Index pour la table `notation`
--
ALTER TABLE `notation`
  ADD PRIMARY KEY (`idNotation`),
  ADD KEY `FK_notation_idCompetence` (`idCompetence`),
  ADD KEY `FK_notation_idEleve` (`idEleve`);

--
-- Index pour la table `professeurs`
--
ALTER TABLE `professeurs`
  ADD PRIMARY KEY (`idProfesseur`),
  ADD KEY `FK_professeurs_idSexe` (`idSexe`),
  ADD KEY `FK_professeurs_idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `prof_classe`
--
ALTER TABLE `prof_classe`
  ADD PRIMARY KEY (`idClasse`,`idProfesseur`),
  ADD KEY `FK_prof_classe_idProfesseur` (`idProfesseur`);

--
-- Index pour la table `sexe`
--
ALTER TABLE `sexe`
  ADD PRIMARY KEY (`idSexe`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `chapitres`
--
ALTER TABLE `chapitres`
  ADD CONSTRAINT `FK_chapitres_idNiveau` FOREIGN KEY (`idNiveau`) REFERENCES `niveaux` (`idNiveau`);

--
-- Contraintes pour la table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `FK_classes_idAnnee` FOREIGN KEY (`idAnnee`) REFERENCES `annee` (`idAnnee`),
  ADD CONSTRAINT `FK_classes_idNiveau` FOREIGN KEY (`idNiveau`) REFERENCES `niveaux` (`idNiveau`);

--
-- Contraintes pour la table `competences`
--
ALTER TABLE `competences`
  ADD CONSTRAINT `FK_competences_idChapitre` FOREIGN KEY (`idChapitre`) REFERENCES `chapitres` (`idChapitre`);

--
-- Contraintes pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD CONSTRAINT `FK_eleves_idClasse` FOREIGN KEY (`idClasse`) REFERENCES `classes` (`idClasse`),
  ADD CONSTRAINT `FK_eleves_idSexe` FOREIGN KEY (`idSexe`) REFERENCES `sexe` (`idSexe`),
  ADD CONSTRAINT `FK_eleves_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`);

--
-- Contraintes pour la table `notation`
--
ALTER TABLE `notation`
  ADD CONSTRAINT `FK_notation_idCompetence` FOREIGN KEY (`idCompetence`) REFERENCES `competences` (`idCompetence`),
  ADD CONSTRAINT `FK_notation_idEleve` FOREIGN KEY (`idEleve`) REFERENCES `eleves` (`idEleve`);

--
-- Contraintes pour la table `professeurs`
--
ALTER TABLE `professeurs`
  ADD CONSTRAINT `FK_professeurs_idSexe` FOREIGN KEY (`idSexe`) REFERENCES `sexe` (`idSexe`),
  ADD CONSTRAINT `FK_professeurs_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`);

--
-- Contraintes pour la table `prof_classe`
--
ALTER TABLE `prof_classe`
  ADD CONSTRAINT `FK_prof_classe_idClasse` FOREIGN KEY (`idClasse`) REFERENCES `classes` (`idClasse`),
  ADD CONSTRAINT `FK_prof_classe_idProfesseur` FOREIGN KEY (`idProfesseur`) REFERENCES `professeurs` (`idProfesseur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 28 fév. 2018 à 09:40
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS notation;
DROP TABLE IF EXISTS prof_classe;
DROP TABLE IF EXISTS professeurs;
DROP TABLE IF EXISTS eleves;
DROP TABLE IF EXISTS utilisateurs;
DROP TABLE IF EXISTS sexe;
DROP TABLE IF EXISTS competences;
DROP TABLE IF EXISTS classes;
DROP TABLE IF EXISTS chapitres;
DROP TABLE IF EXISTS annee;
DROP TABLE IF EXISTS niveaux;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `php_math`
--

-- --------------------------------------------------------

--
-- Structure de la table `annee`
--


CREATE TABLE IF NOT EXISTS `annee` (
  `idAnnee` int(11) NOT NULL AUTO_INCREMENT,
  `libelleAnne` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idAnnee`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annee`
--

INSERT INTO `annee` (`idAnnee`, `libelleAnne`) VALUES
(1, '2016-2017'),
(2, '2017-2018');

-- --------------------------------------------------------

--
-- Structure de la table `chapitres`
--

CREATE TABLE IF NOT EXISTS `chapitres` (
  `idChapitre` int(11) NOT NULL AUTO_INCREMENT,
  `titreChapitre` varchar(250) DEFAULT NULL,
  `idNiveau` int(11) NOT NULL,
  PRIMARY KEY (`idChapitre`),
  KEY `FK_chapitres_idNiveau` (`idNiveau`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chapitres`
--

INSERT INTO `chapitres` (`idChapitre`, `titreChapitre`, `idNiveau`) VALUES
(1, 'Cours sur les nombres entiers et rationnels', 4),
(2, 'Cours sur le calcul littéral et les équations', 4),
(3, 'Cours sur les racines carrées', 4),
(4, 'Cours sur les systèmes d équations', 4),
(5, 'Cours sur les inégalités et les inéquations', 4),
(6, 'Cours sur les puissances et grandeurs', 4),
(7, 'Cours sur les fonctions linéaires et les fonctions affines', 4),
(8, 'Cours sur les statistiques et probabilités', 4),
(9, 'Cours sur le théorème de Thales', 4),
(10, 'Cours sur la trigonométrie', 4),
(11, 'Cours sur la géométrie dans l espace', 4),
(12, 'Cours sur les angles et polygones', 4),
(13, 'Cours sur les nombres relatifs', 3),
(14, 'Cours sur les fractions', 3),
(15, 'Cours sur le calcul littéral', 3),
(16, 'Cours sur les équations et inégalités', 3),
(17, 'Cours sur les puissances', 3),
(18, 'Cours sur la proportionnalité', 3),
(19, 'Cours sur les statistiques', 3),
(20, 'Cours sur le triangle rectangle', 3),
(21, 'Cours sur le théorème de Pythagore', 3),
(22, 'Cours sur les triangles et parallèles', 3),
(23, 'Cours sur les droites remarquables du triangle', 3),
(24, 'Cours sur le cosinus', 3),
(25, 'Cours sur les pyramides et les cônes', 3),
(26, 'Cours sur les opérations sur les nombres entiers et décimaux positifs', 2),
(27, 'Cours sur les fractions', 2),
(28, 'Cours sur la proportionnalité', 2),
(29, 'Cours sur les nombres relatifs', 2),
(30, 'Cours sur le calcul littéral, équations', 2),
(31, 'Cours sur les statistiques', 2),
(32, 'Cours sur les triangles', 2),
(33, 'Cours sur la symétrie centrale', 2),
(34, 'Cours sur angles et parallèles', 2),
(35, 'Cours sur les parallélogrammes', 2),
(36, 'Cours sur les aires', 2),
(37, 'Cours sur le prisme et le cylindre', 2),
(38, 'Cours sur les nombres entiers et les nombres décimaux', 1),
(39, 'Cours sur les opérations', 1),
(40, 'Cours sur les fractions', 1),
(41, 'Cours sur la proportionnalité et les pourcentages', 1),
(42, 'Cours sur l organisation et la représentation de données', 1),
(43, 'Cours sur les figures planes', 1),
(44, 'Cours sur les angles et leur mesure', 1),
(45, 'Cours sur l aire et le périmètre', 1),
(46, 'Cours sur les symétries axiales', 1),
(47, 'Cours sur les volumes et les pavés droits', 1);

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `idClasse` int(11) NOT NULL AUTO_INCREMENT,
  `nomClasse` varchar(25) DEFAULT NULL,
  `idNiveau` int(11) NOT NULL,
  `idAnnee` int(11) NOT NULL,
  PRIMARY KEY (`idClasse`),
  KEY `FK_classes_idNiveau` (`idNiveau`),
  KEY `FK_classes_idAnnee` (`idAnnee`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`idClasse`, `nomClasse`, `idNiveau`, `idAnnee`) VALUES
(1, '6ème A', 1, 2),
(2, '6ème B', 1, 2),
(3, '5ème A', 2, 2),
(4, '5ème B', 2, 2),
(5, '4ème A', 3, 2),
(6, '4ème B', 3, 2),
(7, '3ème A', 4, 2),
(8, '3ème B', 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE IF NOT EXISTS `competences` (
  `idCompetence` int(11) NOT NULL AUTO_INCREMENT,
  `titreCompetence` varchar(250) DEFAULT NULL,
  `idChapitre` int(11) NOT NULL,
  PRIMARY KEY (`idCompetence`),
  KEY `FK_competences_idChapitre` (`idChapitre`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`idCompetence`, `titreCompetence`, `idChapitre`) VALUES
(1, 'Les nombres premiers', 1),
(2, 'Le PGCD', 1),
(3, 'Les fractions irréductibles', 1),
(4, 'Développer une expression littérale', 2),
(5, 'Factoriser une expression littérale', 2),
(6, 'Définition et propriétés des racines carré', 3),
(7, 'Calculs et équations avec les racines carrées', 3),
(8, 'Résolution dun système l équations par substitution', 4),
(9, 'Résolution d un système d équations par addition', 4),
(10, 'Résoudre une inéquation', 5),
(11, 'Règles de calcul sur les puissances', 6),
(12, 'La notion de fonction', 7),
(13, 'Les fonctions linéaires', 7),
(14, 'Les fonctions affines', 7),
(15, 'Statistiques', 8),
(16, 'Les probabilités', 8),
(17, 'Le théorème de Thales', 9),
(18, 'La réciproque du théorème de Thales', 9),
(19, 'Cosinus, sinus et tangente', 10),
(20, 'Sphères et boules', 11),
(21, 'Angle inscrit et angle au centre', 12),
(22, 'La pyramide', 13),
(23, 'Multiplier plusieurs nombres relatifs', 13),
(24, 'Quotient de nombres nombres relatifs', 14),
(25, 'Simplifier une fraction', 14),
(26, 'Produit en croix', 14),
(27, 'Inverse et quotient', 14),
(28, 'Les expressions littérales', 15),
(29, 'Calcul sur les expressions littérales', 15),
(30, 'Egalité et équations', 16),
(31, 'Résoudre une équation', 16),
(32, 'Puissance et calcul sur les puissances', 17),
(33, 'Les puissances de dix', 17),
(34, 'Tableaux et graphiques de grandeurs proportionnelles', 18),
(35, 'Mouvement uniforme', 18),
(36, 'Effectifs cumulés et fréquences cumulées', 19),
(37, 'Moyenne et moyenne pondérée', 19),
(38, 'Cercle circonscrit', 20),
(39, 'Mediane et triangle rectangle', 20),
(40, 'Théorème de Pythagore et réciproque', 21),
(41, 'Droite des milieux', 22),
(42, 'Le théorème de Thalès', 22),
(43, 'Les bissectrices et leurs propriétés', 23),
(44, 'Propriétés des hauteurs, médianes et médiatrice', 23),
(45, 'Cosinus d un angle', 24),
(46, 'La pyramide', 25),
(47, 'Le cône de révolution', 25),
(48, 'Calculs avec et sans parenthèses', 26),
(49, 'La distributivité', 26),
(50, 'Multiplier des fractions', 27),
(51, 'Comparer des fractions', 27),
(53, 'Additionner et soustraire des fractions', 27),
(54, 'Mouvement uniforme', 28),
(55, 'Les nombres relatifs', 29),
(56, 'Additionner et soustraire les nombres relatifs', 29),
(57, 'Calcul littéral et distributivité', 30),
(58, 'Vocabulaire des statistiques', 31),
(59, 'L inégalité triangulaire', 32),
(60, 'Médiatrice et cercle circonscrit', 32),
(61, 'Médianes et hauteurs d un triangle', 32),
(62, 'Symétrique d un point par symétrie centrale', 33),
(63, 'Propriétés de la symétrie centrale', 33),
(64, 'Angles et vocabulaire', 34),
(65, 'Angles et droites parallèles', 34),
(66, 'Somme des angles d un triangle', 34),
(67, 'Propriétés des parallélogrammes', 35),
(68, 'Parallélogrammes particuliers', 35),
(69, 'Aire d un parallélogramme', 36),
(70, 'Aire d un triangle', 36),
(71, 'Aire d un disque', 36),
(72, 'Le prisme droit', 37),
(73, 'Le cylindre de révolution', 37),
(74, 'Ecriture décimale dun nombre', 38),
(75, 'Ecriture fractionnaire dun nombre décimal', 38),
(76, 'Comparer des nombres', 38),
(77, 'Vocabulaire lié aux opérations', 39),
(78, 'Addition et soustraction', 39),
(79, 'Multiplication', 39),
(80, 'Fraction et quotient', 40),
(81, 'Ecriture fractionnaire d un nombre', 40),
(82, 'Critères de divisibilité', 40),
(83, 'Grandeurs proportionnelles et tableau de proportionnalité', 41),
(84, 'Les pourcentages', 41),
(85, 'Les tableaux', 42),
(86, 'Droites parallèles et perpendiculaires', 43),
(87, 'Symétrie dans les figures planes', 43),
(88, 'La médiatrice', 43),
(89, 'Les cercles', 43),
(90, 'Les triangles', 43),
(91, 'Les angles et leur notation', 44),
(92, 'Les bissectrices', 44),
(93, 'Aire et périmètre d une figure', 45),
(94, 'Formules d aire et de périmètre', 45),
(95, 'Symétrique d un point par rapport à une droite', 46),
(96, 'Symétrique par rapport à une droite d un segment, d une droite, d un cercle et d une figure.', 46),
(97, 'Le pavé droit et ses caractéristiques', 47);

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE IF NOT EXISTS `eleves` (
  `idEleve` int(11) NOT NULL AUTO_INCREMENT,
  `nomEleve` varchar(250) DEFAULT NULL,
  `prenomEleve` varchar(250) DEFAULT NULL,
  `idClasse` int(11) NOT NULL,
  `idSexe` int(11) NOT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEleve`),
  KEY `FK_eleves_idSexe` (`idSexe`),
  KEY `FK_eleves_idUtilisateur` (`idUtilisateur`),
  KEY `FK_eleves_idClasse` (`idClasse`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

CREATE TABLE IF NOT EXISTS `niveaux` (
  `idNiveau` int(11) NOT NULL AUTO_INCREMENT,
  `titreNiveau` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idNiveau`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `niveaux`
--

INSERT INTO `niveaux` (`idNiveau`, `titreNiveau`) VALUES
(1, '6ème'),
(2, '5ème'),
(3, '4ème'),
(4, '3ème');

-- --------------------------------------------------------

--
-- Structure de la table `notation`
--

CREATE TABLE IF NOT EXISTS `notation` (
  `idNotation` int(11) NOT NULL AUTO_INCREMENT,
  `libelleNotation` varchar(25) DEFAULT NULL,
  `idCompetence` int(11) NOT NULL,
  `idEleve` int(11) NOT NULL,
  PRIMARY KEY (`idNotation`),
  KEY `FK_notation_idCompetence` (`idCompetence`),
  KEY `FK_notation_idEleve` (`idEleve`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

CREATE TABLE IF NOT EXISTS `professeurs` (
  `idProfesseur` int(11) NOT NULL AUTO_INCREMENT,
  `nomProfesseur` varchar(250) DEFAULT NULL,
  `prenomProfesseur` varchar(250) DEFAULT NULL,
  `idSexe` int(11) NOT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProfesseur`),
  KEY `FK_professeurs_idSexe` (`idSexe`),
  KEY `FK_professeurs_idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professeurs`
--

INSERT INTO `professeurs` (`idProfesseur`, `nomProfesseur`, `prenomProfesseur`, `idSexe`, `idUtilisateur`) VALUES
(1, 'Doe', 'John', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `prof_classe`
--

CREATE TABLE IF NOT EXISTS `prof_classe` (
  `idClasse` int(11) NOT NULL,
  `idProfesseur` int(11) NOT NULL,
  PRIMARY KEY (`idClasse`,`idProfesseur`),
  KEY `FK_prof_classe_idProfesseur` (`idProfesseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

CREATE TABLE IF NOT EXISTS `sexe` (
  `idSexe` int(11) NOT NULL AUTO_INCREMENT,
  `nomSexe` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idSexe`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sexe`
--

INSERT INTO `sexe` (`idSexe`, `nomSexe`) VALUES
(1, 'M'),
(2, 'F'),
(3, 'T');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `loginUtilisateur` varchar(250) DEFAULT NULL,
  `mdpUtilisateur` varchar(250) DEFAULT NULL,
  `saltUtilisateur` varchar(250) DEFAULT NULL,
  `roleUtilisateur` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `loginUtilisateur`, `mdpUtilisateur`, `saltUtilisateur`, `roleUtilisateur`) VALUES
(1, 'JohnDoe', 'L2nNR5hIcinaJkKR+j4baYaZjcHS0c3WX2gjYF6Tmgl1Bs+C9Qbr+69X8eQwXDvw0vp73PrcSeT0bGEW5+T2hA==', 'YcM=A$nsYzkyeDVjEUa7W9K', 'ROLE_ADMIN'),
(2, 'JaneDoe', 'EfakNLxyhHy2hVJlxDmVNl1pmgjUZl99gtQ+V3mxSeD8IjeZJ8abnFIpw9QNahwAlEaXBiQUBLXKWRzOmSr8HQ==', 'dhMTBkzwDKxnD;4KNs,4ENy', 'ROLE_USER'),
(3, 'admin', 'gqeuP4YJ8hU3ZqGwGikB6+rcZBqefVy+7hTLQkOD+jwVkp4fkS7/gr1rAQfn9VUKWc7bvOD7OsXrQQN5KGHbfg==', 'EDDsl&fBCJB|a5XUtAlnQN8', 'ROLE_ADMIN');

--
-- Contraintes pour les tables déchargées
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

DROP TABLE IF EXISTS prof_classe;
DROP TABLE IF EXISTS professeurs;
DROP TABLE IF EXISTS notation;
DROP TABLE IF EXISTS eleves;
DROP TABLE IF EXISTS classes;
DROP TABLE IF EXISTS annee;
DROP TABLE IF EXISTS sexe;
DROP TABLE IF EXISTS utilisateurs;
DROP TABLE IF EXISTS competences;
DROP TABLE IF EXISTS chapitres;
DROP TABLE IF EXISTS niveaux;


#------------------------------------------------------------
# Table: annee
#------------------------------------------------------------

CREATE TABLE annee(
        idAnnee     Int NOT NULL ,
        libelleAnne Int ,
        PRIMARY KEY (idAnnee )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: chapitres
#------------------------------------------------------------

CREATE TABLE chapitres(
        idChapitre    Int NOT NULL ,
        titreChapitre Varchar (25) ,
        idNiveau      Int NOT NULL ,
        PRIMARY KEY (idChapitre )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: classes
#------------------------------------------------------------

CREATE TABLE classes(
        idClasse  Int NOT NULL ,
        nomClasse Varchar (25) ,
        idNiveau  Int NOT NULL ,
        idAnnee   Int NOT NULL ,
        PRIMARY KEY (idClasse )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: competences
#------------------------------------------------------------

CREATE TABLE competences(
        idCompetence    Int NOT NULL ,
        titreCompetence Varchar (25) ,
        idChapitre      Int NOT NULL ,
        PRIMARY KEY (idCompetence )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: eleves
#------------------------------------------------------------

CREATE TABLE eleves(
        idEleve       Int NOT NULL ,
        nomEleve      Varchar (250) ,
        prenomEleve   Varchar (250) ,
        idClasse      Int NOT NULL ,
        idSexe        Int NOT NULL ,
        idUtilisateur Int ,
        PRIMARY KEY (idEleve )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: niveaux
#------------------------------------------------------------

CREATE TABLE niveaux(
        idNiveau    Int NOT NULL ,
        titreNiveau Varchar (25) ,
        PRIMARY KEY (idNiveau )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: notation
#------------------------------------------------------------

CREATE TABLE notation(
        idNotation      Int NOT NULL ,
        libelleNotation Varchar (25) ,
        idCompetence    Int NOT NULL ,
        idEleve         Int NOT NULL ,
        PRIMARY KEY (idNotation )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: professeurs
#------------------------------------------------------------

CREATE TABLE professeurs(
        idProfesseur     Int NOT NULL ,
        nomProfesseur    Varchar (250) ,
        prenomProfesseur Varchar (250) ,
        idSexe           Int NOT NULL ,
        idUtilisateur    Int ,
        PRIMARY KEY (idProfesseur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sexe
#------------------------------------------------------------

CREATE TABLE sexe(
        idSexe  Int NOT NULL ,
        nomSexe Varchar (1) ,
        PRIMARY KEY (idSexe )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisateurs
#------------------------------------------------------------

CREATE TABLE utilisateurs(
        idUtilisateur    int (11) Auto_increment  NOT NULL ,
        loginUtilisateur Varchar (250) ,
        mdpUtilisateur   Varchar (250) ,
        saltUtilisateur  Varchar (250) ,
        roleUtilisateur  Varchar (250) ,
        PRIMARY KEY (idUtilisateur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prof_classe
#------------------------------------------------------------

CREATE TABLE prof_classe(
        idClasse     Int NOT NULL ,
        idProfesseur Int NOT NULL ,
        PRIMARY KEY (idClasse ,idProfesseur )
)ENGINE=InnoDB;

ALTER TABLE chapitres ADD CONSTRAINT FK_chapitres_idNiveau FOREIGN KEY (idNiveau) REFERENCES niveaux(idNiveau);
ALTER TABLE classes ADD CONSTRAINT FK_classes_idNiveau FOREIGN KEY (idNiveau) REFERENCES niveaux(idNiveau);
ALTER TABLE classes ADD CONSTRAINT FK_classes_idAnnee FOREIGN KEY (idAnnee) REFERENCES annee(idAnnee);
ALTER TABLE competences ADD CONSTRAINT FK_competences_idChapitre FOREIGN KEY (idChapitre) REFERENCES chapitres(idChapitre);
ALTER TABLE eleves ADD CONSTRAINT FK_eleves_idClasse FOREIGN KEY (idClasse) REFERENCES classes(idClasse);
ALTER TABLE eleves ADD CONSTRAINT FK_eleves_idSexe FOREIGN KEY (idSexe) REFERENCES sexe(idSexe);
ALTER TABLE eleves ADD CONSTRAINT FK_eleves_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES utilisateurs(idUtilisateur);
ALTER TABLE notation ADD CONSTRAINT FK_notation_idCompetence FOREIGN KEY (idCompetence) REFERENCES competences(idCompetence);
ALTER TABLE notation ADD CONSTRAINT FK_notation_idEleve FOREIGN KEY (idEleve) REFERENCES eleves(idEleve);
ALTER TABLE professeurs ADD CONSTRAINT FK_professeurs_idSexe FOREIGN KEY (idSexe) REFERENCES sexe(idSexe);
ALTER TABLE professeurs ADD CONSTRAINT FK_professeurs_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES utilisateurs(idUtilisateur);
ALTER TABLE prof_classe ADD CONSTRAINT FK_prof_classe_idClasse FOREIGN KEY (idClasse) REFERENCES classes(idClasse);
ALTER TABLE prof_classe ADD CONSTRAINT FK_prof_classe_idProfesseur FOREIGN KEY (idProfesseur) REFERENCES professeurs(idProfesseur);

#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: CHAPITRES
#------------------------------------------------------------

CREATE TABLE CHAPITRES(
        idChapitre    int (11) Auto_increment  NOT NULL ,
        titreChapitre Varchar (25) ,
        idNiveau      Int ,
        PRIMARY KEY (idChapitre )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: COMPETENCES
#------------------------------------------------------------

CREATE TABLE COMPETENCES(
        idCompetence    int (11) Auto_increment  NOT NULL ,
        titreCompetence Varchar (25) ,
        idChapitre      Int ,
        PRIMARY KEY (idCompetence )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: NIVEAUX
#------------------------------------------------------------

CREATE TABLE NIVEAUX(
        idNiveau    int (11) Auto_increment  NOT NULL ,
        titreNiveau Varchar (25) ,
        PRIMARY KEY (idNiveau )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CLASSES
#------------------------------------------------------------

CREATE TABLE CLASSES(
        idClasse  int (11) Auto_increment  NOT NULL ,
        nomClasse Varchar (25) ,
        idNiveau  Int ,
        idAnnee   Int ,
        PRIMARY KEY (idClasse )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ELEVES
#------------------------------------------------------------

CREATE TABLE ELEVES(
        idEleve     int (11) Auto_increment  NOT NULL ,
        nomEleve    Varchar (25) ,
        prenomEleve Varchar (25) ,
        loginEleve  Varchar (255) ,
        mdpEleve    Varchar (255) ,
        idClasse    Int ,
        idSexe      Int ,
        PRIMARY KEY (idEleve )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ANNEE
#------------------------------------------------------------

CREATE TABLE ANNEE(
        idAnnee     int (11) Auto_increment  NOT NULL ,
        libelleAnne Int ,
        PRIMARY KEY (idAnnee )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PROFESSEURS
#------------------------------------------------------------

CREATE TABLE PROFESSEURS(
        idProfesseur     int (11) Auto_increment  NOT NULL ,
        nomProfesseur    Varchar (25) ,
        prenomProfesseur Varchar (25) ,
        loginProfesseur  Varchar (255) ,
        mdpProfesseur    Varchar (255) ,
        idSexe           Int ,
        PRIMARY KEY (idProfesseur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: NOTATION
#------------------------------------------------------------

CREATE TABLE NOTATION(
        idNotation      int (11) Auto_increment  NOT NULL ,
        libelleNotation Varchar (25) ,
        idCompetence    Int ,
        idEleve         Int ,
        PRIMARY KEY (idNotation )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: SEXE
#------------------------------------------------------------

CREATE TABLE SEXE(
        idSexe  int (11) Auto_increment  NOT NULL ,
        nomSexe Varchar (1) ,
        PRIMARY KEY (idSexe )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PROF_CLASSE
#------------------------------------------------------------

CREATE TABLE PROF_CLASSE(
        idClasse     Int NOT NULL ,
        idProfesseur Int NOT NULL ,
        PRIMARY KEY (idClasse ,idProfesseur )
)ENGINE=InnoDB;

ALTER TABLE CHAPITRES ADD CONSTRAINT FK_CHAPITRES_idNiveau FOREIGN KEY (idNiveau) REFERENCES NIVEAUX(idNiveau);
ALTER TABLE COMPETENCES ADD CONSTRAINT FK_COMPETENCES_idChapitre FOREIGN KEY (idChapitre) REFERENCES CHAPITRES(idChapitre);
ALTER TABLE CLASSES ADD CONSTRAINT FK_CLASSES_idNiveau FOREIGN KEY (idNiveau) REFERENCES NIVEAUX(idNiveau);
ALTER TABLE CLASSES ADD CONSTRAINT FK_CLASSES_idAnnee FOREIGN KEY (idAnnee) REFERENCES ANNEE(idAnnee);
ALTER TABLE ELEVES ADD CONSTRAINT FK_ELEVES_idClasse FOREIGN KEY (idClasse) REFERENCES CLASSES(idClasse);
ALTER TABLE ELEVES ADD CONSTRAINT FK_ELEVES_idSexe FOREIGN KEY (idSexe) REFERENCES SEXE(idSexe);
ALTER TABLE PROFESSEURS ADD CONSTRAINT FK_PROFESSEURS_idSexe FOREIGN KEY (idSexe) REFERENCES SEXE(idSexe);
ALTER TABLE NOTATION ADD CONSTRAINT FK_NOTATION_idCompetence FOREIGN KEY (idCompetence) REFERENCES COMPETENCES(idCompetence);
ALTER TABLE NOTATION ADD CONSTRAINT FK_NOTATION_idEleve FOREIGN KEY (idEleve) REFERENCES ELEVES(idEleve);
ALTER TABLE PROF_CLASSE ADD CONSTRAINT FK_PROF_CLASSE_idClasse FOREIGN KEY (idClasse) REFERENCES CLASSES(idClasse);
ALTER TABLE PROF_CLASSE ADD CONSTRAINT FK_PROF_CLASSE_idProfesseur FOREIGN KEY (idProfesseur) REFERENCES PROFESSEURS(idProfesseur);

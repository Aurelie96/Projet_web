<?php

namespace Projet_web\Domain;

class Professeur {
    
    /**
     * Id du professeur
     * 
     * @var integer
     */
    private $id;

    /**
     * Nom du professeur
     * 
     * @var string
     */
    private $nom;

    /**
     * Prénom du professeur
     * 
     * @var string
     */
    private $prenom;

    /**
     * Id de la classe du professeur
     * 
     * @var integer
     */
    private $idClasse;

    ////////////////////////////////////////

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getIdClasse() {
        return $this->idClasse;
    }

    public function setIdClasse($idClasse) {
        $this->idClasse = $idClasse;
    }
}

?>
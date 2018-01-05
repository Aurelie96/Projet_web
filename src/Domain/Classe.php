<?php

namespace Projet_web\Domain;

class Classe{

    private $id;
    
    private $nom;

    private $idNiveau;

    private $idAnnee;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getIdNiveau(){
        return $this->idNiveau;
    }

    public function setIdNiveau($idNiveau){
        $this->idNiveau = $idNiveau;
    }

    public function getIdAnnee(){
        return $this->idAnnee;
    }

    public function setIdAnnee($idAnnee){
        $this->idAnnee = $idAnnee;
    }
}
<?php

namespace Projet_web\Domain;

class Notation{

    private $id;
    
    private $libelle;

    private $idCompetence;

    private $idEleve;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getLibelle(){
        return $this->libelle;
    }

    public function setLibelle($libelle){
        $this->libelle = $libelle;
    }

    public function getIdCompetence(){
        return $this->idCompetence;
    }

    public function setIdCompetence($idCompetence){
        $this->idCompetence = $idCompetence;
    }

    public function getIdEleve(){
        return $this->idEleve;
    }

    public function setIdEleve($idEleve){
        $this->idEleve = $idEleve;
    }
}
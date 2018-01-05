<?php

namespace Projet_web\Domain;

class Competence{
    
    private $id;
    
    private $titre;
    
    private $idChapitre;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTitre(){
        return $this->titre;
    }

    public function setTitre($titre){
        $this->titre = $titre;
    }

    public function getIdChapitre(){
        return $this->idChapitre;
    }

    public function setIdChapitre($idChapitre){
        $this->idChapitre = $idChapitre;
    }
}
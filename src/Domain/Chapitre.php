<?php

namespace Projet_web\Domain;

class Chapitre{
    
    /**
     * Chapitre id.
     * 
     * @var integer
     */
    private $id;

    /**
     * Chapitre titre.
     * 
     * @var string
     */
    private $titre;

    /**
     * Chapitre idNiveau.
     * 
     * @var integer
     */
    private $idNiveau;

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

    public function getIdNiveau(){
        return $this->idNiveau;
    }

    public function setIdNiveau($idNiveau){
        $this->idNiveau = $idNiveau;
    }

}
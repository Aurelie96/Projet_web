<?php

namespace Projet_web\Domain;

class Competences 
{
    /**
     * Competences idCompetence.
     *
     * @var integer
     */
    private $id;

    /**
     * Competences titreCompetence.
     *
     * @var string
     */
    private $titre;

    /**
     * Competences idChapitre.
     *
     * @var integer
     */
    private $idChapitre;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getIdChapitre() {
        return $this->idChapitre;
    }

    public function setIdChapitre($idChapitre) {
        $this->idChapitre = $idChapitre;
    }
}
<?php

namespace Projet_web\Domain;

class Chapitres 
{
    /**
     * Chapitres idChapitre.
     *
     * @var integer
     */
    private $id;

    /**
     * Chapitres titreChapitre.
     *
     * @var string
     */
    private $titre;

    /**
     * Chapitres idNiveau.
     *
     * @var integer
     */
    private $idNiveau;

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

    public function getIdNiveau() {
        return $this->idNiveau;
    }

    public function setIdNiveau($idNiveau) {
        $this->idNiveau = $idNiveau;
    }
}
<?php

namespace Projet_web\Domain;

class Niveaux 
{
    /**
     * Niveaux idNiveau.
     *
     * @var integer
     */
    private $id;

    /**
     * Niveaux titreNiveau.
     *
     * @var string
     */
    private $titre;

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
}
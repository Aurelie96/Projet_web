<?php

namespace Projet_web\Domain;

class Chapitres 
{
    /**
     * Chapitres idChapitre.
     *
     * @var integer
     */
    private $idChapitre;

    /**
     * Chapitres titreChapitre.
     *
     * @var string
     */
    private $titreChapitre;

    /**
     * Chapitres idNiveau.
     *
     * @var integer
     */
    private $idNiveau;

    public function getIdChapitre() {
        return $this->idChapitre;
    }

    public function setIdChapitre($idChapitre) {
        $this->idChapitre = $idChapitre;
    }

    public function getTitreChapitre() {
        return $this->titreChapitre;
    }

    public function setTitreChapitre($titreChapitre) {
        $this->titreChapitre = $titreChapitre;
    }

    public function getIdNiveau() {
        return $this->idNiveau;
    }

    public function setIdNiveau($idNiveau) {
        $this->idNiveau = $idNiveau;
    }
}
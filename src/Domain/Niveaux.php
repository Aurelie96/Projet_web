<?php

namespace ECOLE\Domain;

class Niveaux 
{
    /**
     * Niveaux idNiveau.
     *
     * @var integer
     */
    private $idNiveau;

    /**
     * Niveaux titreNiveau.
     *
     * @var string
     */
    private $titreNiveau;

    public function getIdNiveau() {
        return $this->idNiveau;
    }

    public function setIdNiveau($idNiveau) {
        $this->idNiveau = $idNiveau;
    }

    public function getTitreNiveau() {
        return $this->titreNiveau;
    }

    public function setTitreNiveau($titreNiveau) {
        $this->titreNiveau = $titreNiveau;
    }
}
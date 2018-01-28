<?php

namespace Projet_web\Domain;

class Sexe 
{
    /**
     * Sexe idSexe.
     *
     * @var integer
     */
    private $idSexe;

    /**
     * Sexe nomSexe.
     *
     * @var string
     */
    private $nomSexe;

    public function getIdSexe() {
        return $this->idSexe;
    }

    public function setIdSexe($idSexe) {
        $this->idSexe = $idSexe;
    }

    public function getNomSexe() {
        return $this->nomSexe;
    }

    public function setNomSexe($nomSexe) {
        $this->nomSexe = $nomSexe;
    }
}
<?php

namespace ECOLE\Domain;

class Notation 
{
    /**
     * Notation idNotation.
     *
     * @var integer
     */
    private $idNotation;

    /**
     * Notation libelleNotation.
     *
     * @var string
     */
    private $libelleNotation;

    /**
     * Notation idCompetence.
     *
     * @var integer
     */
    private $idCompetence;

    /**
     * Notation idEleve.
     *
     * @var integer
     */
    private $idEleve;

    public function getIdNotation() {
        return $this->idNotation;
    }

    public function setIdNotation($idNotation) {
        $this->idNotation = $idNotation;
    }

    public function getLibelleNotation() {
        return $this->libelleNotation;
    }

    public function setLibelleNotation($libelleNotation) {
        $this->libelleNotation = $libelleNotation;
    }

    public function getIdCompetence() {
        return $this->idCompetence;
    }

    public function setIdCompetence($idCompetence) {
        $this->idCompetence = $idCompetence;
    }

    public function getIdEleve() {
        return $this->idEleve;
    }

    public function setIdEleve($idEleve) {
        $this->idEleve = $idEleve;
    }
}
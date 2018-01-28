<?php

namespace ECOLE\Domain;

class Competences 
{
    /**
     * Competences idCompetence.
     *
     * @var integer
     */
    private $idCompetence;

    /**
     * Competences titreCompetence.
     *
     * @var string
     */
    private $titreCompetence;

    /**
     * Competences idChapitre.
     *
     * @var integer
     */
    private $idChapitre;

    public function getIdCompetence() {
        return $this->idCompetence;
    }

    public function setIdCompetence($idCompetence) {
        $this->idCompetence = $idCompetence;
    }

    public function getTitreCompetence() {
        return $this->titreCompetence;
    }

    public function setTitreCompetence($titreCompetence) {
        $this->titreCompetence = $titreCompetence;
    }

    public function getIdChapitre() {
        return $this->idChapitre;
    }

    public function setIdChapitre($idChapitre) {
        $this->idChapitre = $idChapitre;
    }
}
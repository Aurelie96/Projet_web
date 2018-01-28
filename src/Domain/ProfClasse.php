<?php

namespace Projet_web\Domain;

class ProfClasse 
{
    /**
     * ProfClasse idClasse.
     *
     * @var integer
     */
    private $idClasse;

    /**
     * ProfClasse idProfesseur.
     *
     * @var integer
     */
    private $idProfesseur;

    public function getIdClasse() {
        return $this->idProfesseur;
    }

    public function setIdClasse($idClasse) {
        $this->idClasse = $idClasse;
    }

    public function getIdProfesseur() {
        return $this->idProfesseur;
    }

    public function setIdProfesseur($idProfesseur) {
        $this->idProfesseur = $idProfesseur;
    }
}
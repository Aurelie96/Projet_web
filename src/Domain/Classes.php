<?php

namespace Projet_web\Domain;

class Classes 
{
    /**
     * Classes idClasse.
     *
     * @var integer
     */
    private $idClasse;

    /**
     * Classes nomClasse.
     *
     * @var string
     */
    private $nomClasse;

    /**
     * Classes idNiveau.
     *
     * @var integer
     */
    private $idNiveau;

    /**
     * Classes idAnnee.
     *
     * @var integer
     */
    private $idAnnee;

    public function getIdClasse() {
        return $this->idClasse;
    }

    public function setIdClasse($idClasse) {
        $this->idClasse = $idClasse;
    }

    public function getNomClasse() {
        return $this->nomClasse;
    }

    public function setNomClasse($nomClasse) {
        $this->nomClasse = $nomClasse;
    }

    public function getIdNiveau() {
        return $this->idNiveau;
    }

    public function setIdNiveau($idNiveau) {
        $this->idNiveau = $idNiveau;
    }

    public function getIdAnnee() {
        return $this->idAnnee;
    }

    public function setIdAnnee($idAnnee) {
        $this->idAnnee = $idAnnee;
    }
}
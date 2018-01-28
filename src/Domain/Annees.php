<?php

namespace ECOLE\Domain;

class Annees 
{
    /**
     * Annees idAnnee.
     *
     * @var integer
     */
    private $idAnnee;

    /**
     * Annees libelleAnne.
     *
     * @var string
     */
    private $libelleAnne;

    public function getIdAnnee() {
        return $this->idAnnee;
    }

    public function setIdAnnee($idAnnee) {
        $this->idAnnee = $idAnnee;
    }

    public function getLibelleAnne() {
        return $this->libelleAnne;
    }

    public function setLibelleAnne($libelleAnne) {
        $this->libelleAnne = $libelleAnne;
    }
}
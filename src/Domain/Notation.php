<?php

namespace Projet_web\Domain;

class Notation 
{
    /**
     * Notation idNotation.
     *
     * @var integer
     */
    private $id;

    /**
     * Notation libelleNotation.
     *
     * @var string
     */
    private $libelle;

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

    public function getId() {
        return $this->idNotation;
    }

    public function setId($idNotation) {
        $this->idNotation = $idNotation;
    }

    public function getLibelle() {
        return $this->libelleNotation;
    }

    public function setLibelle($libelleNotation) {
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
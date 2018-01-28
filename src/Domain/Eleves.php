<?php

namespace ECOLE\Domain;

class Eleves 
{
    /**
     * Eleves idEleve.
     *
     * @var integer
     */
    private $idEleve;

    /**
     * Eleves nomEleve.
     *
     * @var string
     */
    private $nomEleve;

    /**
     * Eleves prenomEleve.
     *
     * @var string
     */
    private $prenomEleve;

    /**
     * Eleves idClasse.
     *
     * @var integer
     */
    private $idClasse;

    /**
     * Eleves idSexe.
     *
     * @var integer
     */
    private $idSexe;

    /**
     * Eleves idUtilisateur.
     *
     * @var integer
     */
    private $idUtilisateur;

    public function getIdEleve() {
        return $this->idEleve;
    }

    public function setIdEleve($idEleve) {
        $this->idEleve = $idEleve;
    }

    public function getNomEleve() {
        return $this->nomEleve;
    }

    public function setNomEleve($nomEleve) {
        $this->nomEleve = $nomEleve;
    }

    public function getPrenomEleve() {
        return $this->prenomEleve;
    }

    public function setPrenomEleve($prenomEleve) {
        $this->prenomEleve = $prenomEleve;
    }

    public function getIdClasse() {
        return $this->idClasse;
    }

    public function setIdClasse($idClasse) {
        $this->idClasse = $idClasse;
    }

    public function getIdSexe() {
        return $this->idSexe;
    }

    public function setIdSexe($idSexe) {
        $this->idSexe = $idSexe;
    }

    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur($idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }
}
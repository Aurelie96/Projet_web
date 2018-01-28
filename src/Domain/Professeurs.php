<?php

namespace ECOLE\Domain;

class Professeurs 
{
    /**
     * Professeurs idProfesseur.
     *
     * @var integer
     */
    private $idProfesseur;

    /**
     * Professeurs nomProfesseur.
     *
     * @var string
     */
    private $nomProfesseur;

    /**
     * Professeurs prenomProfesseur.
     *
     * @var string
     */
    private $prenomProfesseur;

    /**
     * Professeurs idSexe.
     *
     * @var integer
     */
    private $idSexe;

    /**
     * Professeurs idUtilisateur.
     *
     * @var integer
     */
    private $idUtilisateur;

    public function getIdProfesseur() {
        return $this->idProfesseur;
    }

    public function setIdProfesseur($idProfesseur) {
        $this->idProfesseur = $idProfesseur;
    }

    public function getNomProfesseur() {
        return $this->nomProfesseur;
    }

    public function setNomProfesseur($nomProfesseur) {
        $this->nomProfesseur = $nomProfesseur;
    }

    public function getPrenomProfesseur() {
        return $this->prenomProfesseur;
    }

    public function setPrenomProfesseur($prenomProfesseur) {
        $this->prenomProfesseur = $prenomProfesseur;
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
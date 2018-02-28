<?php

namespace Projet_web\Domain;

class Eleves 
{
    /**
     * Eleves idEleve.
     *
     * @var integer
     */
    private $id;

    /**
     * Eleves nomEleve.
     *
     * @var string
     */
    private $nom;

    /**
     * Eleves prenomEleve.
     *
     * @var string
     */
    private $prenom;

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

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
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
<?php

namespace Projet_web\Domain;

class Professeurs
{
    /**
     *  id
     *
     * @var integer
     */
    private $id;

    /**
     *  nom
     *
     * @var string
     */
    private $nom;

    /**
     *  prenom
     *
     * @var string
     */
    private $prenom;

    /**
     *  idSexe
     *
     * @var integer
     */
    private $idSexe;

    /**
     *  idUtilisateur
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
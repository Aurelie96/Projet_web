<?php

namespace Projet_web\Domain;

class Eleve{

    private $id;
    
    private $nom;

    private $prenom;

    private $login;

    private $mdp;

    private $idClasse;

    private $idSexe;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function getMdp(){
        return $this->mdp;
    }

    public function setMdp($mdp){
        $this->mdp = $mdp;
    }

    public function getIdClasse(){
        return $this->idClasse;
    }

    public function setIdClasse($idClasse){
        $this->idClasse = $idClasse;
    }

    public function getIdSexe(){
        return $this->idSexe;
    }

    public function setIdSexe($idSexe){
        $this->idSexe = $idSexe;
    }

}
<?php

namespace Projet_web\DAO;

use Projet_Web\Domain\Eleve;

class EleveDAO extends DAO{

    /**
     * Assure la connexion de l'élève.
     * Retourne TRUE si les informations utilisateurs sont correctes sinon FALSE
     * 
     * @var bool
     */
    public function connectEleve($login, $pass) {
        $r = false;
        $sql = "SELECT * FROM Eleves WHERE loginEleve = :login AND mdpEleve = :pass";
        $req = $this->getDb()->prepare($sql);
        
        if ($req->execute(array(
            'login'=>$login,
            'mdpEleve'=>hash('sha256', $pass) // https://secure.php.net/manual/fr/function.hash.php
        ))) {
            if ($req->rowCount() > 0) {
                $r = true;

                $result = $req->fetchAll();

                // converti le résultat en un tableau d'objet
                $connectEleve = array();
                foreach($result as $row) {
                    $eleve = $this->buildDomainObject($row);
                }
            }
        }

        return $r;
    }

    /**
     * Déconnecte l'utilisateur
     */
    public function disconnectEleve() {
        
    }

    /**
     * Construit et instancie l'objet ELEVE
     */
    protected function buildDomainObject($row) {
        $eleve = new Eleve();
        $eleve->setIdEleve($row['idEleve']);
        $eleve->setNom($row['nom']);
        $eleve->setPrenom($row['prenom']);
        $eleve->setIdClasse($row['idClasse']);

        return $eleve;
    }
}
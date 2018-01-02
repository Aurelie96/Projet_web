<?php

namespace Projet_web\DAO;

use Projet_Web\Domain\Chapitre;

class ChapitreDAO extends DAO{
    /**
     * Retourne une liste de l'ensemble des chapitre de la table chapitre.
     * 
     * @return array une liste de tous les visiteurs.
     */
    public function findAll(){
        $sql = "select * from chapitre";
        $result = $this->getDb()->fetchAll($sql);

        // Convertit les resultat query en un array d'objets
        $chapitres = array();
        foreach ($result as $row){
            $chapitreId = $row['id'];
            $chapitres[$chapitreId] = $this->buildDomainObject($row);
        }
        return $chapitres;
    }

    public function findChapitresByNiveau($idNiveau){
        $sql = "select * from chapitre where idNiveau = ".$idNiveau." order by idChapitre asc";
        $result = $this->getDb()->fetchAll($sql);

        //Convertit le résultat de la requête en une liste
        $chapitres = array();
        foreach ($result as $row){
            $chapitreId = $row['id'];
            $chapitres[$chapitreId] = $this->buildDomainObject($row);
        }
        return $chapitres;
    }
}
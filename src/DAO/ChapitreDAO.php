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

    /**
     * Retourne un chapitre en fonction de l'ID
     * 
     * @param integer $id la référence du chapitre
     * 
     * @return \Projet_web\Domaine\chapitre
     */
    public function find($id){
        $sql = "select * from chapitre where id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if($row)
            return $this->buildDomainObject($row);
        else    
            throw new \Exception("Pas de chapitre pour cette référence " . $id);
    }

    public function save(Chapitre $chapitre){
        $chapitreData = array(
            'titre'=> $chapitre->getTitre(),
            'idNiveau'=>$chapitre->getIdNiveau()
            );
        
        if($chapitre->getId()){
            $this->getDb()->update('chapitre', $chapitreData, array('id' => $chapitre->getId()));
        } else{
            $this->getDb()->insert('chapitre', $chapitreData);
            $id = $this->getDb()->lastInsertID();
            $visiteur->setId($id);
        }

    }

    public function delete($id){
        $sql = "delete from chapitre where idChapitre =" .$id;
        $this->getDb()->exec($sql);
    }

    protected function buildDomainObject($row){
        $chapitre = new Chapitre();
        $chapitre->setId($row['id']);
        $chapitre->setTitre($row['titre']);
        $chapitre->setIdNiveau($row['idNiveau']);
        return $chapitre;
    }

}
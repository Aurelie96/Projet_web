<?php

namespace Projet_web\DAO;

use Projet_Web\Domain\Annee;

class AnneeDAO extends DAO{
    public function findAll(){
        $sql = "select * from annee";
        $result = $this->getDb()->fetchAll($sql);

        $annees = array();
        foreach($result as $row){
            $anneeId = $row['id'];
            $annees[$anneeId] = $this->buildDomainObject($row);
        }
        return $annees;
    }

    public function find($id){
        $sql = "select * from annee where id =?";
        $row =  $this->getDb()->fetchAssoc($sql, array($id));

        if($row){
            return $this->buildDomainObject($row);
        }else {
            throw new \Exception("Aucune annee à été trouvé pour l'id " .$id);
        }
    }

    public function save(Annee $annee){
        $anneeData = array(
            'id' => $annee->getId(),
            'nom' => $annee->getLibelle(),
        ); 
        
        if($annee->getId()){
            $this->getDb()->update('annee', $anneeData, array('id' => $annee->getId()));
        }else {
            $this->getDb()->insert('annee', $anneeData);
            $id = $this-getDb()->lastInsertId();
            $annee->setId($id);
        }
    }

    public function delete($id){
        $this->getDb()->delete('annee', array('id' => $id));
    }

    protected function buildDomainObject($row){
        $annee = new Annee();
        $annee->setId($row['id']);
        $annee->setNom($row['libelle']);
        return $annee;
    }
}
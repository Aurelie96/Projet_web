<?php

namespace Projet_web\DAO;

use Projet_Web\Domain\Classe;

class ClasseDAO extends DAO{
    public function findAll(){
        $sql = "select * from classe";
        $result = $this->getDb()->fetchAll($sql);

        $classes = array();
        foreach($result as $row){
            $classeId = $row['id'];
            $classes[$classeId] = $this->buildDomainObject($row);
        }
        return $classes;
    }

    public function find($id){
        $sql = "select * from classe where id =?";
        $row =  $this->getDb()->fetchAssoc($sql, array($id));

        if($row){
            return $this->buildDomainObject($row);
        }else {
            throw new \Exception("Aucune classe à été trouvé pour l'id " .$id);
        }
    }

    public function save(Classe $classe){
        $classeData = array(
            'id' => $classe->getId(),
            'nom' => $classe->getNom(),
            'idNiveau' => $classe->getIdNiveau(),
            'idAnnee' => $classe->getIdAnnee(),
        ); 
        
        if($classe->getId()){
            $this->getDb()->update('classe', $classeData, array('id' => $classe->getId()));
        }else {
            $this->getDb()->insert('classe', $classeData);
            $id = $this-getDb()->lastInsertId();
            $classe->setId($id);
        }
    }

    public function delete($id){
        $this->getDb()->delete('classe', array('id' => $id));
    }

    protected function buildDomainObject($row){
        $classe = new Classe();
        $classe->setId($row['id']);
        $classe->setNom($row['nom']);
        $classe->setIdNiveau($row['idNiveau']);
        $classe->setIdAnnee($row['idAnnee']);
        return $classe;
    }
}
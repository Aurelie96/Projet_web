<?php

namespace Projet_web\DAO;

use Projet_Web\Domain\Notation;

class NotationDAO extends DAO{
    public function findAll(){
        $sql = "select * from notation";
        $result = $this->getDb()->fetchAll($sql);

        $notations = array();
        foreach($result as $row){
            $notationId = $row['id'];
            $notations[$notationId] = $this->buildDomainObject($row);
        }
        return $notations;
    }

    public function find($id){
        $sql = "select * from notation where id =?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if($row){
            return $this->buildDomainObject($row);
        }else {
            throw new \Exception("Aucun notation à été trouvé pour l'id " .$id);
        }
    }

    public function save(Notation $notation){
        $notationData = array(
            'id' => $notation->getId(),
            'libelle' => $notation->getLibelle(),
            'idCompetence' => $notation->getIdCompetence(),
            'idEleve' => $notation->getIdEleve(),
        );
        if($notation->getId()){
            $this->getDb()->update('notation', $notationData, array('id' => $notation->getId()));
        }else {
            $this->getDb()->insert('notation', $notationData);
            $id = $this->getDb()->lastInsertId();
            $competence->setId($id);
        }
    }

    public function delete($id){
        $this->getDb()->delete('notation', array('id' => $id));
    }

    protected function buildDomainObject($row){
        $notation = new Niveau();
        $notation->setId($row['id']);
        $notation->setLibelle($row['libelle']);
        $notation->setIdCompetence($row['idCompetence']);
        $notation->setIdEleve($row['idEleve']);
        return $notation;
    }
}
<?php

namespace Projet_web\DAO;

use Projet_web\Domain\Notation;

class NotationDAO extends DAO
{
    public function findAll() {
        $sql = "select * from notation order by idNotation desc";
        $result = $this->getDb()->fetchAll($sql);
        $notations = array();
        foreach ($result as $row) {
            $notationId = $row['idNotation'];
            $notations[$notationId] = $this->buildDomainObject($row);
        }
        return $notations;
    }

    public function findNotaionsByEleves($idCompetence) {
        $sql = "select * from notation where idCompetence =".$idCompetence." order by idNotation asc";
        $result = $this->getDb()->fetchAll($sql);

        $notations = array();
        foreach ($result as $row) {
            $notationId = $row['idNotation'];
            $notations[$notationId] = $this->buildDomainObject($row);
        }
        return $notations;
    }
    
    public function find($id) {
        $sql = "select * from notation where idNotation=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)   
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Pas de notation pour cette reference " . $id);
    }
    
    public function save(Notation $notation) {
        
        $notationData = array(
            'libelleNotation'=> $notation->getLibelle(),
            'idCompetence'=> $notation->getIdCompetence(),
            'idEleve'=> $notation->getIdEleve()
            );
        
        if ($notation->getId()) {
            $this->getDb()->update('notation', $notationData, array('idNotation' => $notation->getId()));
        } else {
            $this->getDb()->insert('notation', $notationData);
            $id = $this->getDb()->lastInsertId();
            $notation->setId($id);
        }
    }

    public function delete($id) {
        $this->getDb()->delete('notation', array('idNotation' => $id));;
    }
    
    protected function buildDomainObject($row) {
        $notation = new Notation();
        $notation->setId($row['idNotation']);
        $notation->setLibelle($row['libelleNotation']);
        $notation->setIdCompetence($row['idCompetence']);
        $notation->setIdEleve($row['idEleve']);
        return $notation;
    }
}
<?php

namespace Projet_web\DAO;

use Projet_web\Domain\Classes;

class ClassesDAO extends DAO
{
    public function findAll() {
        $sql = "select * from classes order by idClasse desc";
        $result = $this->getDb()->fetchAll($sql);
        
        $classes = array();
        foreach ($result as $row) {
            $classeId = $row['idClasse'];
            $classes[$classeId] = $this->buildDomainObject($row);
        }
        return $classes;
    }


    public function find($id) {
        $sql = "select * from classes where idClasse=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Pas de classe pour cette reference " . $id);
    }

    public function save(Classes $classe) {
        $classeData = array(
            'nomClasse' => $classe->getNom(),
            'idNiveau' => $classe->getIdNiveau(),
            'idAnnee' => $classe->getIdAnnee()
            );

        if ($secteur->getId()) {
            $this->getDb()->update('classes', $classeData, array('idClasse' => $classe->getId()));
        } else {
            $this->getDb()->insert('classes', $classeData);

            $id = $this->getDb()->lastInsertId();
            $secteur->setId($id);
        }
    }
    
    public function delete($id) {
        $this->getDb()->delete('classes', array('idClasse' => $id));
    }
    protected function buildDomainObject($row) {
        $classe = new Classes();
        $classe->setId($row['idClasse']);
        $classe->setNom($row['nomClasse']);
        $classe->setIdNiveau($row['nomClasse']);
        $classe->setIdAnnee($row['nomClasse']);
        return $classe;
    }
}
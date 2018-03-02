<?php

namespace Projet_web\DAO;

use Projet_web\Domain\Chapitres;

class ChapitresDAO extends DAO
{
    public function findAll() {
        $sql = "select * from chapitres order by idChapitre desc";
        $result = $this->getDb()->fetchAll($sql);
        
        $chapitres = array();
        foreach ($result as $row) {
            $chapitreId = $row['idChapitre'];
            $chapitres[$chapitreId] = $this->buildDomainObject($row);
        }
        return $chapitres;
    }


    public function find($id) {
        $sql = "select * from chapitres where idChapitre=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Pas de chapitre pour cette référence " . $id);
    }

    public function save(Chapitres $chapitre) {
        $chapitreData = array(
            'titreChapitre' => $chapitre->getTitre(),
            'idNiveau' => $chapitre->getIdNiveau()
            );

        if ($chapitre->getId()) {
            $this->getDb()->update('chapitres', $chapitreData, array('idChapitre' => $chapitre->getId()));
        } else {
            $this->getDb()->insert('chapitres', $chapitreData);

            $id = $this->getDb()->lastInsertId();
            $chapitre->setId($id);
        }
    }
    
    public function delete($id) {
        $this->getDb()->delete('chapitres', array('idChapitre' => $id));
    }
    protected function buildDomainObject($row) {
        $chapitre = new Chapitres();
        $chapitre->setId($row['idChapitre']);
        $chapitre->setTitre($row['titreChapitre']);
        $chapitre->setIdNiveau($row['idNiveau']);
        return $chapitre;
    }
}
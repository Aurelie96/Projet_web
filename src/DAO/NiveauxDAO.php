<?php

namespace Projet_web\DAO;

use Projet_web\Domain\Niveaux;

class NiveauxDAO extends DAO
{
    public function findAll() {
        $sql = "select * from niveaux order by idNiveau desc";
        $result = $this->getDb()->fetchAll($sql);
        
        $niveaux = array();
        foreach ($result as $row) {
            $niveauId = $row['idNiveau'];
            $niveaux[$niveauId] = $this->buildDomainObject($row);
        }
        return $niveaux;
    }

    public function find($id) {
        $sql = "select * from niveaux where idNiveau=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Pas de niveau pour cette reference " . $id);
    }

    public function save(Niveaux $niveau) {
        $niveauData = array(
            'titreNiveau' => $niveau->getTitre(),
            'idNiveau' => $niveau->getIdNiveau()
            );

        if ($niveau->getId()) {
            $this->getDb()->update('niveaux', $niveauData, array('idNiveau' => $niveau->getId()));
        } else {
            $this->getDb()->insert('niveaux', $niveauData);

            $id = $this->getDb()->lastInsertId();
            $niveau->setId($id);
        }
    }
    
    public function Liste(){
        $sql = "select titreNiveau from niveaux order by idNiveau desc";
        $result = $this->getDb()->fetchAll($sql);
        
        $niveaux = array();
        foreach ($result as $row) {
            $niveauId = $row['idNiveau'];
            $niveaux[$niveauId] = $this->buildDomainObject($row);
        }
        return $niveaux;
    }

    public function delete($id) {
        $this->getDb()->delete('niveaux', array('idNiveau' => $id));
    }
    protected function buildDomainObject($row) {
        $niveau = new Niveaux();
        $niveau->setId($row['idNiveau']);
        $niveau->setTitre($row['titreNiveau']);;
        return $niveau;
    }
}
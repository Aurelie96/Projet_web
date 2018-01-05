<?php

namespace Projet_web\DAO;

use Projet_Web\Domain\Niveau;

class NiveauDAO extends DAO{
    public function findAll(){
        $sql = "select * from niveau";
        $result = $this->getDb()->fetchAll($sql);

        $niveaux = array();
        foreach($result as $row){
            $niveauId = $row['id'];
            $niveaux[$niveauId] = $this->buildDomainObject($row);
        }
        return $niveaux;
    }

    public function find($id){
        $sql = "select * from niveau where id =?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if($row){
            return $this->buildDomainObject($row);
        }else {
            throw new \Exception("Aucun niveau à été trouvé pour l'id " .$id);
        }
    }

    public function save(Niveau $niveau){
        $niveauData = array(
            'id' => $niveau->getId(),
            'titre' => $niveau->getTitre(),
        );
        if($niveau->getId()){
            $this->getDb()->update('niveau', $niveauData, array('id' => $niveau->getId()));
        }else {
            $this->getDb()->insert('niveau', $niveauData);
            $id = $this->getDb()->lastInsertId();
            $competence->setId($id);
        }
    }

    public function delete($id){
        $this->getDb()->delete('niveau', array('id' => $id));
    }

    protected function buildDomainObject($row){
        $niveau = new Niveau();
        $niveau->setId($row['id']);
        $niveau->setTitre($row['titre']);
        return $niveau;
    }
}
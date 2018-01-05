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
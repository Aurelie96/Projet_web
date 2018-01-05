<?php

namespace Projet_web\DAO;

use Projet_Web\Domain\Professeur;

class ProfesseurDAO extends DAO{
    public function findAll(){
        $sql = "select * from professeur";
        $result = $this->getDb()->fetchAll($sql);

        $professeurs = array();
        foreach($result as $row){
            $professeurId = $row['id'];
            $professeurs[$professeurId] = $this->buildDomainObject($row);
        }
        return $professeurs;
    }

    public function find($id){
        $sql = "select * from professeur where id =?";
        $row =  $this->getDb()->fetchAssoc($sql, array($id));

        if($row){
            return $this->buildDomainObject($row);
        }else {
            throw new \Exception("Aucun professeur à été trouvé pour l'id " .$id);
        }
    }

    public function save(Professeur $professeur){
        $professeurData = array(
            'id' => $professeur->getId(),
            'nom' => $professeur->getNom(),
            'prenom' => $professeur->getPrenom(),
            'login' => $professeur->getLogin(),
            'mdp' => $professeur->getMdp(),
            'idSexe' => $professeur->getIdSexe(),
        ); 
        
        if($professeur->getId()){
            $this->getDb()->update('professeur', $professeurData, array('id' => $professeur->getId()));
        }else {
            $this->getDb()->insert('professeur', $professeurData);
            $id = $this-getDb()->lastInsertId();
            $professeur->setId($id);
        }
    }

    public function delete($id){
        $this->getDb()->delete('professeur', array('id' => $id));
    }

    protected function buildDomainObject($row){
        $professeur = new Professeur();
        $professeur->setId($row['id']);
        $professeur->setNom($row['nom']);
        $professeur->setPrenom($row['prenom']);
        $professeur->setLogin($row['login']);
        $professeur->setMdp($row['mdp']);
        $professeur->setIdSexe($row['idSexe']);
        return $professeur;
    }
}
<?php

namespace Projet_web\DAO;

use Projet_Web\Domain\Eleve;

class EleveDAO extends DAO{
    public function findAll(){
        $sql = "select * from eleve";
        $result = $this->getDb()->fetchAll($sql);

        $eleves = array();
        foreach($result as $row){
            $eleveId = $row['id'];
            $eleves[$eleveId] = $this->buildDomainObject($row);
        }
        return $eleves;
    }

    public function find($id){
        $sql = "select * from eleve where id =?";
        $row =  $this->getDb()->fetchAssoc($sql, array($id));

        if($row){
            return $this->buildDomainObject($row);
        }else {
            throw new \Exception("Aucun eleve à été trouvé pour l'id " .$id);
        }
    }

    public function save(Eleve $eleve){
        $eleveData = array(
            'id' => $eleve->getId(),
            'nom' => $eleve->getNom(),
            'prenom' => $eleve->getPrenom(),
            'login' => $eleve->getLogin(),
            'mdp' => $eleve->getMdp(),
            'idClasse' => $eleve->getIdClasse(),
            'idSexe' => $eleve->getIdSexe(),
        ); 
        
        if($eleve->getId()){
            $this->getDb()->update('eleve', $eleveData, array('id' => $eleve->getId()));
        }else {
            $this->getDb()->insert('eleve', $eleveData);
            $id = $this-getDb()->lastInsertId();
            $eleve->setId($id);
        }
    }

    public function delete($id){
        $this->getDb()->delete('eleve', array('id' => $id));
    }

    protected function buildDomainObject($row){
        $eleve = new Eleve();
        $eleve->setId($row['id']);
        $eleve->setNom($row['nom']);
        $eleve->setPrenom($row['prenom']);
        $eleve->setLogin($row['login']);
        $eleve->setMdp($row['mdp']);
        $eleve->setIdClasse($row['idClasse']);
        $eleve->setIdSexe($row['idSexe']);
        return $eleve;
    }
}
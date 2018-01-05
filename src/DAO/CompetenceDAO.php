<?php

namespace Projet_web\DAO;

use Projet_Web\Domain\Competence;

class CompetenceDAO extends DAO{
    /**
     * Retourne une liste de l'ensemble des compétence de la table competence
     * 
     * @return array une list de tous les visiteurs.
     */
    public function findAll(){
        $sql = "select * from competence";
        $result = $this->getDb()->fetchAll($sql);

        // Convertit les resultats query en un array d'objets
        $competences = array();
        foreach ($result as $row){
            $competenceId = $row['id'];
            $competences[$competenceId] = $this->buildDomainObject($row);
        }
        return $competences;
    }

    public function find($id){
        $sql = "select * from competence where id =?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if($row){
            return $this->buildDomainObject($row);
        }else {
            throw new \Exception("Aucune compétence à été trouvé pour l'id " .$id);
        }
    }

    public function save(Competence $competence){
        $competenceData =array(
            'id' => $competence->getId(),
            'titre' => $competence->getTitre(),
            'idChapitre' => $competence->getIdChapitre(),
        );
        if($competence->getId()){
            $this->getDb()->update('competence', $competenceData, array('id' => $competence->getId()));
        }else{
            $this->getDb()->insert('competence', $competenceData);
            $id = $this->getDb()->lastInsertId();
            $competence->setId($id);
        }
    }

    public function delete($id){
        $this->getDb()->delete('competence', array('id' => $id));
    }

    protected function buildDomainObject($row){
        $competence = new Competence();
        $competence->setId($row['id']);
        $competence->setTitre($row['titre']);
        $competence->setIdChapitre($row['idChapitre']);
        return $competence;
    }
}
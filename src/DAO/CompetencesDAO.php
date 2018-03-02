<?php

namespace Projet_web\DAO;

use Projet_web\Domain\Competences;

class CompetencesDAO extends DAO
{
    public function findAll() {
        $sql = "select * from competences order by idCompetence desc";
        $result = $this->getDb()->fetchAll($sql);
        $competences = array();
        foreach ($result as $row) {
            $competenceId = $row['idCompetence'];
            $competences[$competenceId] = $this->buildDomainObject($row);
        }
        return $competences;
    }

    public function findCompetencesByChapitre($idChapitre) {
        $sql = "select * from competences where idChapitre =".$idChapitre." order by idCompetence asc";
        $result = $this->getDb()->fetchAll($sql);

        $competences = array();
        foreach ($result as $row) {
            $competenceId = $row['idCompetence'];
            $competences[$competenceId] = $this->buildDomainObject($row);
        }
        return $competences;
    }
    
    public function find($id) {
        $sql = "select * from competences where idCompetence=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)   
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Pas de compétence pour cette reference " . $id);
    }
    
    public function save(Competences $competence) {
        
        $competenceData = array(
            'titreCompetence'=> $competence->getTitre(),
            'idChapitre'=> $competence->getIdChapitre()
            );
        
        if ($competence->getId()) {
            $this->getDb()->update('competences', $competenceData, array('idCompetence' => $competence->getId()));
        } else {
            $this->getDb()->insert('competences', $competenceData);
            $id = $this->getDb()->lastInsertId();
            $competence->setId($id);
        }
    }

    public function delete($id) {
        $this->getDb()->delete('competences', array('idCompetence' => $id));;
    }
    
    protected function buildDomainObject($row) {
        $competence = new Competences();
        $competence->setId($row['idCompetence']);
        $competence->setTitre($row['titreCompetence']);
        $competence->setIdChapitre($row['idChapitre']);
        return $competence;
    }
}
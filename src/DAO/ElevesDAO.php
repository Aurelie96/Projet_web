<?php

namespace Projet_web\DAO;

use Projet_web\Domain\Eleves;

class ElevesDAO extends DAO
{
    public function findAll() {
        $sql = "select * from eleves order by idEleve desc";
        $result = $this->getDb()->fetchAll($sql);
        $eleves = array();
        foreach ($result as $row) {
            $eleveId = $row['idEleve'];
            $eleves[$eleveId] = $this->buildDomainObject($row);
        }
        return $eleves;
    }

    public function findElevesByClasse($idClasse) {
        $sql = "select * from eleves where idClasse =".$idClasse." order by idEleve asc";
        $result = $this->getDb()->fetchAll($sql);

        $eleves = array();
        foreach ($result as $row) {
            $eleveId = $row['idEleve'];
            $eleves[$eleveId] = $this->buildDomainObject($row);
        }
        return $eleves;
    }
    
    public function find($id) {
        $sql = "select * eleves where idEleve=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Pas d'élève pour cette reference " . $id);
    }
    
    public function save(Eleves $eleve) {
        
        $eleveData = array(
            'nomEleve'=> $eleve->getNom(),
            'prenomEleve'=> $eleve->getPrenom(),
            'idClasse'=> $eleve->getIdClasse(),
            'idSexe'=> $eleve->getIdSexe(),
            'idUtilisateur'=> $eleve->getIdUtilisateur()
            );
        
        if ($eleve->getId()) {
            $this->getDb()->update('eleves', $eleveData, array('idEleve' => $eleve->getId()));
        } else {
            $this->getDb()->insert('eleves', $eleveData);
            $id = $this->getDb()->lastInsertId();
            $eleve->setId($id);
        }
    }

    public function delete($id) {
        $this->getDb()->delete('eleves', array('idEleve' => $id));;
    }
    
    protected function buildDomainObject($row) {
        $eleve = new Eleves();
        $eleve->setId($row['idEleve']);
        $eleve->setNom($row['nomEleve']);
        $eleve->setPrenom($row['prenomEleve']);
        $eleve->setIdClasse($row['idClasse']);
        $eleve->setIdSexe($row['idSexe']);
        $eleve->setIdUtilisateur($row['idUtilisateur']);
        return $eleve;
    }
}
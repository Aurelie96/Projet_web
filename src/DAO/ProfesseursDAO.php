<?php

namespace Projet_web\DAO;

use Projet_web\Domain\Professeurs;

class ProfesseursDAO extends DAO
{
    /**
     * Retourne une liste de l'ensemble des professeurs de la table professeurs
     * 
     * @return array une liste de tous les professeurs.
     */
    public function findAll(){
        $sql = "select * from professeurs order by idProfesseur desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convertir les résultats query en un array d'objets
        $professeurs = array();
        foreach ($result as $row) {
            $professeurId = $row['idProfesseur'];
            $professeurs[$professeurId] = $this->buildDomainObject($row);
        }
        return $professeurs;
    }

    /**
     * Retourne un professeur en fonction de l'id
     * 
     * @param integer $id la référence d'un professeur.
     * 
     * @return \Projet_web\Domain\professeur
     */
    public function find($id) {
        $sql = "select * from professeurs where idProfesseur=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)   
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Pas de professeurs pour cette reference " . $id);
    }

    /**
     *Enregistrer un professeur dans la base de données
     */
    public function save(Professeurs $professeur){
        $professeurData = array(
            'nomProfesseur'=> $professeur->getNomProfesseur(),
            'prenomProfesseur' => $professeur->getPrenomProfesseur(),
            'idSexe' => $professeur->getIdSexe(),
            'idUtilisateur' => $professeur->getIdUtilisateur()
        );
        if ($professeur->getIdProfesseur()){
            $this->getDb()->update('professeurs', $professeurData, array('idProfesseur' => $professeur->getIdProfesseur()));
        } else {
            $this->getDb()->update('professeurs', $professeurData);
            $idProfesseur = $this->getDb()->lastInsertId();
            $professeur->setIdProfesseur($idProfesseur);
        }
    }

    public function delete($idProfesseur){
        $this->getDb()->delete('professeurs', array('idProfesseur' => $idProfesseur));
    }

    protected function buildDomainObject($row){
        $professeur = new Professeurs();
        $professeur->setIdProfesseur($row['idProfesseur']);
        $professeur->setNomProfesseur($row['nomProfesseur']);
        $professeur->setPrenomProfesseur($row['prenomProfesseur']);
        $professeur->setIdSexe($row['idSexe']);
        $professeur->setIdUtilisateur($row['idUtilisateur']);
        return $professeur;
    }
}
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
        return $professeurs
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
        $row = $this->getDb()->fetchAssoc($sql, array)

        if ($row)   
            

    }
}
<?php

namespace Projet_web\DAO;

use Doctrine\DBAL\Connection;

abstract class  DAO
{
    private $db;

    /**
     * Consructeur
     */
    public function __construct(Connection $db){
        $this->db = $db;
    }


    /**
     * Recupère la variable de connection
     */
    protected function getDb(){
        return $this->db;
    }

    /**
     * Construction d'un objet 
     */
    protected abstract function builDomainObject($row);
}

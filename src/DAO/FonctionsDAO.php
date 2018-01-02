<?php

namespace Projet_web\DAO;

class FunctionsDAO{

    /**
     * Echappe les caractères spéciaux HTML
     * http://php.net/manual/fr/mysqli.real-escape-string.php#113658
     * 
     * @var string
     */
    public static function EscapeHtmlCharact($input){
        $string = htmlentities($input,ENT_NOQUOTES,'UTF-8');
        $string = str_replace('&euro;',chr(128),$string);
        $string = html_entity_decode($string,ENT_NOQUOTES,'ISO-8859-15');
        return $string;
    }    
}
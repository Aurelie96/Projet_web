<?php

// page d'accueil
$app->get('/', function() {
    echo('test fonction page d\'accueil');

    /*require('./../src/DAO/DAO.php');
    require('./../src/Domain/Eleve.php');
    require('./../src/DAO/EleveDAO.php');*/

    ob_start();
    echo "test";
    /*$eleve = EleveDAO()->connectEleve('test', 'test');*/
    $view = ob_get_clean();
    var_dump($view);
});

?>
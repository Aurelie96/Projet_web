<?php

require_once('./src/DAO/DAO.php');
require_once('./src/Domain/Eleve.php');
require_once('./src/DAO/EleveDAO.php');

echo ('hello');
$eleve = EleveDAO()->connectEleve('test', 'test');
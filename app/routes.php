<?php

use Symfony\Component\HttpFoundation\Request;
use ECOLE\Domain\Annees;
use ECOLE\Domain\Chapitres;
use ECOLE\Domain\Classes;
use ECOLE\Domain\Competences;
use ECOLE\Domain\Eleves;
use ECOLE\Domain\Niveaux;
use ECOLE\Domain\Notation;
use ECOLE\Domain\ProfClasse;
use ECOLE\Domain\Professeurs;
use ECOLE\Domain\Sexe;
use ECOLE\Domain\Utilisateurs;

//route appelée de base : authentification
$app->get('/', function(Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('home');

// Login 
$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('login');


// -------------------------------------------------- Section Chapitres----------------------------------------------


// -------------------------------------------------- Section Classes----------------------------------------------


// -------------------------------------------------- Section Competences----------------------------------------------


// -------------------------------------------------- Section Eleves----------------------------------------------


// -------------------------------------------------- Section Niveaux----------------------------------------------


// -------------------------------------------------- Section Notation----------------------------------------------


// -------------------------------------------------- Section Professeurs----------------------------------------------


// -------------------------------------------------- Section Utilisateurs----------------------------------------------


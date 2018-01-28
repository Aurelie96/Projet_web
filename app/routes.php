<?php

use Symfony\Component\HttpFoundation\Request;
use Projet_web\Domain\Annees;
use Projet_web\Domain\Chapitres;
use Projet_web\Domain\Classes;
use Projet_web\Domain\Competences;
use Projet_web\Domain\Eleves;
use Projet_web\Domain\Niveaux;
use Projet_web\Domain\Notation;
use Projet_web\Domain\ProfClasse;
use Projet_web\Domain\Professeurs;
use Projet_web\Domain\Sexe;
use Projet_web\Domain\Utilisateurs;
use Projet_web\Form\Type\UtilisateursType;

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


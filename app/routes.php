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

//Renvoie la page des professeurs  
$app->get('/professeurs', function () use ($app) {
   
    $professeurs = $app['dao.professeurs']->findAll();

    //on affiche la page avec un tableau de professeurs    
    return $app['twig']->render('professeurs.html.twig', array(
        'professeurs' => $professeurs));
})->bind('professeurs');


// Ajouter une nouveau professeur
$app->match('/admin/professeurs/add', function(Request $request) use ($app) {
    $professeur = new Professeurs();
    $professeurForm = $app['form.factory']->create(new ProfesseurType(), $professeur);
    $professeurForm->handleRequest($request);

    //Si la demande a été soumise (formulaire rempli) on enregistre puis on redirige sur la page produits
    if ($professeurForm->isSubmitted() && $professeurForm->isValid()) {
        $app['dao.professeurs']->save($professeur);
        $app['session']->getFlashBag()->add('success', 'Le professeur a été créé avec succès.');
        return $app->redirect($app['url_generator']->generate('professeurs'));
    }
    //On affiche le formulaire de produit 
    return $app['twig']->render('professeur_form.html.twig', array(
        'title' => 'Nouveau professeur',
        'professeurForm' => $professeurForm->createView()));
})->bind('admin_professeurs_add');


// Editer un produit existant
$app->match('/admin/professeurs/{ref}/edit', function($ref, Request $request) use ($app) {
    $professeur = $app['dao.professeurs']->find($ref);
    $professeurForm = $app['form.factory']->create(new ProfesseurType(), $professeur);
    $professeurForm->handleRequest($request);

    //Si la demande a été soumise on enregistre puis on redirige sur la page produits
    if ($professeurForm->isSubmitted() && $professeurForm->isValid()) {
        $app['dao.professeurs']->save($professeur);
        $app['session']->getFlashBag()->add('success', 'Le professeur a été modifié avec succès.');
        return $app->redirect($app['url_generator']->generate('professeurs'));
    }

    //On affiche par defaut le formulaire de produit rempli avec les données du produit
    return $app['twig']->render('professeur_form.html.twig', array(
        'title' => 'Editer un professeur',
        'professeurForm' => $professeurForm->createView()));
})->bind('admin_professeurs_edit');


// Supprimer un produit
$app->get('/admin/professeurs/{ref}/delete', function($ref, Request $request) use ($app) {
    // Supprimer le produit
    $app['dao.professeurs']->delete($ref);
    $app['session']->getFlashBag()->add('success', 'Le professeur a été supprimé avec succès.');
    // Redirection sur la page des produits
    return $app->redirect($app['url_generator']->generate('professeurs'));
})->bind('admin_professeurs_delete');


// Afficher le détail d'un produit 
$app->get('/professeurs/{ref}', function ($ref, Request $request) use ($app) {
    $professeurs = $app['dao.professeurs']->find($ref);
    return $app['twig']->render('professeur.html.twig', array(
        'professeurs' => $professeurs));
})->bind('professeur');



// -------------------------------------------------- Section Utilisateurs----------------------------------------------


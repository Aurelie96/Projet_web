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
use Projet_web\Form\Type\ProfesseursType;
use Projet_web\Form\Type\ElevesType;

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
//Renvoie la page des eleves
$app->get('/classe_eleves', function () use ($app) {
   
    $eleves = $app['dao.eleves']->findAll();
    $classes = $app['dao.classes']->findAll();

    //Si la variable issue de la liste déroulante a été renseigné on renvoie seulement les eleves du classe en question
    if(isset($_GET['classe']) && $_GET['classe'] != 0){   
        $classe = $_GET['classes'];
        $eleves = $app['dao.eleves']->findElevesByClasse($classe);
        
    }
    //on affiche la page avec un tableau de eleve triables par classe
    return $app['twig']->render('classe_eleves.html.twig', array(
        'eleves' => $eleves,
        'classes' => $classes ));
})->bind('classe_eleves');


// Ajouter une nouveau eleve
$app->match('/admin/eleves/add', function(Request $request) use ($app) {
    $classes = $app['dao.classes']->findAll();
    $eleve = new Eleves();
    $eleveForm = $app['form.factory']->create(new ElevesType(), $eleve);
    $eleveForm->handleRequest($request);

    //Si la demande a été soumise (formulaire rempli) on enregistre puis on redirige sur la page eleve
    if ($eleveForm->isSubmitted() && $eleveForm->isValid()) {
        $app['dao.eleves']->save($eleve);
        $app['session']->getFlashBag()->add('success', 'L eleve a été créé avec succès.');
        return $app->redirect($app['url_generator']->generate('classe_eleves'));
    }
    //On affiche le formulaire de eleve 
    return $app['twig']->render('eleve_form.html.twig', array(
        'classes' => $classes,
        'title' => 'Nouveau élève',
        'eleveForm' => $eleveForm->createView()));
})->bind('admin_eleves_add');

// Editer un eleve existant
$app->match('/admin/eleves/{id}/edit', function($id, Request $request) use ($app) {
    $eleve = $app['dao.eleves']->find($id);
    $eleveForm = $app['form.factory']->create(new ElevesType(), $eleve);
    $eleveForm->handleRequest($request);
    
    //Si la demande a été soumise on enregistre puis on redirige sur la page eleve
    if ($eleveForm->isSubmitted() && $eleveForm->isValid()) {
        $app['dao.eleves']->save($eleve);
        $app['classes']->getFlashBag()->add('success', 'L eleve a été modifié avec succès.');
        return $app->redirect($app['url_generator']->generate('classe_eleves'));
    }

    //On affiche par defaut le formulaire de visiteur rempli avec les données du visiteur
    return $app['twig']->render('eleve_form.html.twig', array(
        'title' => 'Editer un eleve',
        'eleveForm' => $eleveForm->createView()));
})->bind('admin_eleves_edit');


// Supprimer un visiteur
$app->get('/admin/eleves/{id}/delete', function($id, Request $request) use ($app) {
    // Supprimer le visiteur
    $app['dao.eleves']->delete($id);
    $app['classes']->getFlashBag()->add('success', 'L eleve a été supprimé avec succès.');
    // Redirection sur la page des eleves
    return $app->redirect($app['url_generator']->generate('classe_eleves'));
})->bind('admin_eleves_delete');


// Afficher le détail d'un eleve 
$app->get('/eleves/{id}', function ($id, Request $request) use ($app) {
    $eleves = $app['dao.eleves']->find($id);
    return $app['twig']->render('eleve.html.twig', array(
        'eleves' => $eleves));
})->bind('eleve');


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
    $professeurForm = $app['form.factory']->create(new ProfesseursType(), $professeur);
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
    $professeurForm = $app['form.factory']->create(new ProfesseursType(), $professeur);
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


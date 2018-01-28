<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app['twig'] = $app->share($app->extend('twig', function(Twig_Environment $twig, $app) {
    $twig->addExtension(new Twig_Extensions_Extension_Text());
    return $twig;
}));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'secured' => array(
            'pattern' => '^/',
            'anonymous' => true,
            'logout' => true,
            'form' => array('login_path' => '/login', 'check_path' => '/login_check'),
            'users' => $app->share(function () use ($app) {
                return new Projet_web\DAO\UtilisateursDAO($app['db']);
            }),
        ),
    ),
    'security.role_hierarchy' => array(
        'ROLE_ADMIN' => array('ROLE_USER'),
    ),
    'security.access_rules' => array(
        array('^/admin', 'ROLE_ADMIN'),
    ),
));
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());

// Register services


$app['dao.annees'] = $app->share(function ($app) {
    return new Projet_web\DAO\AnneesDAO($app['db']);
});

$app['dao.chapitres'] = $app->share(function ($app) {
    return new Projet_web\DAO\ChapitresDAO($app['db']);
});

$app['dao.classes'] = $app->share(function ($app) {
    return new Projet_web\DAO\ClassesDAO($app['db']);
});

$app['dao.competences'] = $app->share(function ($app) {
    return new Projet_web\DAO\CompetencesDAO($app['db']);
});

$app['dao.eleves'] = $app->share(function ($app) {
    return new Projet_web\DAO\ElevesDAO($app['db']);
});

$app['dao.niveaux'] = $app->share(function ($app) {
    return new Projet_web\DAO\NiveauxDAO($app['db']);
});

$app['dao.notation'] = $app->share(function ($app) {
    return new Projet_web\DAO\NotationDAO($app['db']);
});

$app['dao.ProfClasse'] = $app->share(function ($app) {
    return new Projet_web\DAO\ProfClasseDAO($app['db']);
});

$app['dao.professeurs'] = $app->share(function ($app) {
    return new Projet_web\DAO\ProfesseursDAO($app['db']);
});

$app['dao.sexe'] = $app->share(function ($app) {
    return new Projet_web\DAO\SexeDAO($app['db']);
});

$app['dao.utilisateurs'] = $app->share(function ($app) {
    return new Projet_web\DAO\UtilisateursDAO($app['db']);
});


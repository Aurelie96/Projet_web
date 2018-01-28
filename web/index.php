<?php

date_default_timezone_set('Europe/Paris');
require_once(__DIR__ . '/../vendor/autoload.php');

$app = new Silex\Application();

// enable the debug modes
$app['debug'] = true;

//require_once(__DIR__.'/../app/config/dev.php');
//require_once(__DIR__.'/../app/app.php');
require_once(__DIR__.'/../app/routes.php');

$app->run();
echo ('hello');

?>
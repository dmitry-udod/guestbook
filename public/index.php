<?php

require_once __DIR__.'/../vendor/autoload.php';

use controllers\PostsController;

// Load twig
$loader = new Twig_Loader_Filesystem(__DIR__.'/../app/views');
$twig = new Twig_Environment($loader, array(
    'cache' => __DIR__.'/../app/cache',
    'debug' => true
));

// Add dump for twig
//$twig->addExtension(new Twig_Extension_Debug());

$controller = new PostsController($twig);

// If we have post data save it
if (!empty($_POST)) {
    $controller->save($_POST);
}

// Show all posts
echo $controller->all();

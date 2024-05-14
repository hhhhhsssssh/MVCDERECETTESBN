<?php
require_once __DIR__.'/vendor/autoload.php';

// Initialiser Dotenv
use Symfony\Component\Dotenv\Dotenv;
use App\Router;
use App\Controller\HomeController;
use App\Controller\RecettesController;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

session_start();

$router = new Router();

$router->register('GET', '/', function() {
    $controller = new RecettesController();
    $controller->index();
});

$router->register('GET', '/afficherrecettes', function() {
    $controller = new RecettesController();
    $controller->index();
});


$router->register('GET', '/creerrecette', function() {
    $controller = new RecettesController();
    $controller->create();
});

$router->register('POST', '/recettes/save', function() {//enregistrer la recette créée dans la base de données
    $controller = new RecettesController();
    $controller->store();
});

$router->register('GET','/recettes/edit/{id}',function($id){//formulaire modifier
    $controller = new RecettesController();
    $controller->edit($id);
});

$router->register('POST','/recettes/update',function(){//mettre à jour dans la base de données
    $controller = new RecettesController();
    $controller->update();
});

$router->register('GET', '/recettes/delete/{id}', function($id) {
    $controller = new RecettesController();
    $controller->delete($id);
});

$router->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));



<?php
require_once __DIR__.'/vendor/autoload.php';

// Initialiser Dotenv
use Symfony\Component\Dotenv\Dotenv;
use App\Router;
use App\Controller\HomeController;
use App\Controller\RecettesController;
use App\Controller\UtilisateursController;
use App\Controller\CommentairesController;
use App\Controller\AuthentificationController;
use App\Controller\InscriptionController; 

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');


session_start(); // Démarre la session

$router=new Router();



$router->register('GET','/',function(){
    $controller = new HomeController();
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

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$router->register('GET', '/afficherutilisateurs', function() {
    $controller = new UtilisateursController();
    $controller->index();
});


$router->register('GET', '/creerutilisateur', function() {
    $controller = new UtilisateursController();
    $controller->create();
});

$router->register('POST', '/utilisateurs/save', function() {//enregistrer lutilisateur créé dans la base de données
    $controller = new UtilisateursController();
    $controller->store();
});

$router->register('GET','/utilisateurs/edit/{id}',function($id){//formulaire modifier
    $controller = new UtilisateursController();
    $controller->edit($id);
});

$router->register('POST','/utilisateurs/update',function(){//mettre à jour dans la base de données
    $controller = new UtilisateursController();
    $controller->update();
});

$router->register('GET', '/utilisateurs/delete/{id}', function($id) {
    $controller = new UtilisateursController();
    $controller->delete($id);
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$router->register('GET', '/affichercommentaires', function() {
    $controller = new CommentairesController();
    $controller->index();
});


$router->register('GET', '/addCommentaire', function() {
    $controller = new CommentairesController();
    $controller->addCommentaire();
});

$router->register('GET', '/addReponse', function() {
    $controller = new CommentairesController();
    $controller->addReponse();
});


$router->register('POST', '/Commentaires/storeCommentaire', function() {
    $controller = new CommentairesController();
    $controller->storeCommentaire();
});

$router->register('POST', '/Commentaires/storeReponse', function() {
    $controller = new CommentairesController();
    $controller->storeReponse();
});

$router->register('GET','/Commentaires/edit/{id}',function($id){//formulaire modifier
    $controller = new CommentairesController();
    $controller->edit($id);
});

$router->register('POST','/Commentaires/update',function(){//mettre à jour dans la base de données
    $controller = new CommentairesController();
    $controller->update();
});

$router->register('GET', '/Commentaires/delete/{id}', function($id) {
    $controller = new CommentairesController();
    $controller->delete($id);
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$router->register('GET', '/login', function() {
    $controller = new AuthentificationController();
    $controller->showLoginForm();
});

$router->register('POST', '/login', function() {
    $controller = new AuthentificationController();
    $controller->login();
});

$router->register('GET', '/logout', function() {
    $controller = new AuthentificationController();
    $controller->logout();
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Enregistrer les routes pour l'inscription

$router->register('GET', '/inscription', function() {
    $controller = new InscriptionController();
    $controller->showRegistrationForm();
});

$router->register('POST', '/inscription', function() {
    $controller = new InscriptionController();
    $controller->register();
});



$router->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));



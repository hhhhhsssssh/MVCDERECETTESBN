<?php

namespace App\Controller;

use App\Model\RecetteModel;

class RecettesController {
    private $recetteModel;

    public function __construct() {
        $this->recetteModel = new RecetteModel();
    }
    public function index() {
        $recettes = $this->recetteModel->getAllRecettes();
        include 'src/View/Recettes/index.php';
    }

    public function create() {
        include 'src/View/Recettes/create.php';
    }
    
    public function store() {
        $titre = $_POST['titre'];
        $ingredients = $_POST['ingredients'];
        $preparation = $_POST['preparation'];
        $lien_photo = $_POST['lien-photo'];

        $Utilisateurs_id = $_POST['Utilisateurs_id'];

        $this->recetteModel->addRecette($titre, $ingredients, $preparation, $lien_photo, $Utilisateurs_id);
        header('Location: /afficherrecettes');
   
    }

    public function edit($id) {
        $recette = $this->recetteModel->getRecetteById($id);
        include 'src/View/Recettes/edit.php';
    }
    
    public function update() {
        $titre = $_POST['titre'];
        $ingredients = $_POST['ingredients'];
        $preparation = $_POST['preparation'];
        $lien_photo = $_POST['lien-photo'];
        $id = $_POST['id'];
        $this->recetteModel->updateRecette($titre, $ingredients, $preparation, $lien_photo, $id);
        header('Location: /afficherrecettes');
    }

    public function delete($id) {
        $this->recetteModel->deleteRecette($id);
        header('Location: /afficherrecettes');
    }

}


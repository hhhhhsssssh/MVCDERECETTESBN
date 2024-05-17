<?php

namespace App\Controller;

use App\Model\RecetteModel;
use App\Model\CommentaireModel;
class RecettesController {
    private $recetteModel;
    private $commentaireModel;

    public function __construct() {
        $this->recetteModel = new RecetteModel();
        $this->commentaireModel = new CommentaireModel();
    }
    public function index() {
        $recettes = $this->recetteModel->getAllRecettes();
         // Pour chaque recette, récupérer les commentaires associés
         foreach ($recettes as &$recette) {
            $recette['commentaires'] = $this->commentaireModel->getCommentairesByRecetteId($recette['id']);
        }
        include 'src/View/Recettes/index.php';
    }

    public function create() {
        include 'src/View/Recettes/create.php';
    }
    
    public function store() {
         // Récupérez l'ID de l'utilisateur à partir de la session
        $utilisateurId = $_SESSION['user']['id'];
    
        // Récupérez les données du formulaire
        $titre = $_POST["titre"];
        $ingredients = $_POST["ingredients"];
        $preparation = $_POST["preparation"];
        $lien_photo = $_POST["lien-photo"];
        $date_creation =  date("Y-m-d"); 
    
        // Insérez les données dans la base de données
        $this->recetteModel->addRecette($titre, $ingredients, $preparation, $lien_photo, $utilisateurId, $date_creation);
    
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


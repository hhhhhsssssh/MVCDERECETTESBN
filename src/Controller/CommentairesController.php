<?php

namespace App\Controller;

use App\Model\CommentaireModel;

class CommentairesController {
    private $commentaireModel;

    public function __construct() {// Initialise le modèle des commentaires
        $this->commentaireModel = new CommentaireModel();
    }
    public function index() {// Récupère tous les commentaires
        $commentaires = $this->commentaireModel->getAllCommentaires();
        include 'src/View/Commentaires/index.php';// Inclut la vue pour afficher les commentaires
    }
//////////////////////////////////
    public function addCommentaire() {
        include 'src/View/Commentaires/addCommentaire.php'; // Inclut la vue pour ajouter un commentaire
    }
    
    public function addReponse() {
        include 'src/View/Commentaires/addReponse.php'; // Inclut la vue pour ajouter une réponse à un commentaire
    }
    
    public function storeCommentaire() {
        
        // Récupère les données du formulaire
        $commentaire = $_POST['commentaire'];
        $recette_id = $_POST['recette_id'];
        $utilisateurId = $_SESSION['user']['id'];
    
        // Ajoute le commentaire dans la base de données
        $this->commentaireModel->addCommentaire($commentaire, $utilisateurId, $recette_id);
    
        // Redirige vers la page des commentaires
        header('Location: /affichercommentaires');
        exit();
    }
    
    public function storeReponse() {
        // Récupère les données du formulaire
        $reponse_commentaire = $_POST['reponse_commentaire'];
        $commentaire_id = $_POST['commentaire_id'];
        $utilisateurId = $_SESSION['user']['id'];
    
        // Ajoute la réponse dans la base de données
        $this->commentaireModel->addReponse($reponse_commentaire, $utilisateurId, $commentaire_id);
    
        // Redirige vers la page des commentaires
        header('Location: /affichercommentaires');
        exit();
    }

///////////////////////////////////
    public function edit($id) {// Récupère le commentaire par son ID
        $commentaire = $this->commentaireModel->getCommentaireById($id);
        include 'src/View/Commentaires/edit.php'; // Inclut la vue pour éditer un commentaire
    }
    
    public function update() { // Récupère les données du formulaire
        $commentaire = $_POST['commentaire'];
        $jourcomment = $_POST['jour-comment'];
        $id = $_POST['id'];
        $this->commentaireModel->updateCommentaire($commentaire, $jourcomment, $id);  // Met à jour le commentaire
        header('Location: /affichercommentaires');       // Redirige vers la page des commentaires
    }

    public function delete($id) {  // Supprime le commentaire par son ID
        $this->commentaireModel->deleteCommentaire($id);
        header('Location: /affichercommentaires'); // Redirige vers la page des commentaires
    }


////////////////////////////////////
}
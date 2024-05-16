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

    public function create() {
        include 'src/View/Commentaires/create.php'; // Inclut la vue pour créer un commentaire
    }
    
    public function store() { // Récupère les données du formulaire
        $commentaire = $_POST['commentaire'];
        $jourcomment =  date('Y-m-d'); // Utilise la date actuelle
        $Utilisateurs_id = $_POST['Utilisateurs_id'];

        $this->commentaireModel->addCommentaire($commentaire, $jourcomment, $Utilisateurs_id);// Ajoute un commentaire
        header('Location: /affichercommentaires'); // Redirige vers la page des commentaires
    }

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

}


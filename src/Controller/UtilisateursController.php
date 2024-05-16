<?php

namespace App\Controller;

use App\Model\UtilisateurModel;

class UtilisateursController {
    private $utilisateurModel;

    public function __construct() {
        $this->utilisateurModel = new UtilisateurModel();
    }
    public function index() {
        $utilisateurs = $this->utilisateurModel->getAllUtilisateurs();
        include 'src/View/Utilisateurs/index.php';
    }

    public function create() {
        include 'src/View/Utilisateurs/create.php';
    }
    
    public function store() {
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $motdepasse = $_POST['motdepasse'];

        $this->utilisateurModel->addUtilisateur($pseudo, $email, $motdepasse);
        header('Location: /afficherutilisateurs');
   
    }

    public function edit($id) {
        $utilisateur = $this->utilisateurModel->getUtilisateurById($id);
        include 'src/View/Utilisateurs/edit.php';
    }
    
    public function update() {
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $motdepasse = $_POST['motdepasse'];
        $id = $_POST['id'];
        $this->utilisateurModel->updateUtilisateur($pseudo, $email, $motdepasse, $id);
        header('Location: /afficherutilisateurs');
    }

    public function delete($id) {
        $this->utilisateurModel->deleteUtilisateur($id);
        header('Location: /afficherutilisateurs');
    }

}


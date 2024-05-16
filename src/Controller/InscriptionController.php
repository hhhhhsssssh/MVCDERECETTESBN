<?php

namespace App\Controller;

use App\Model\UtilisateurModel;

class InscriptionController {
    private $utilisateurModel;

    public function __construct() {
        $this->utilisateurModel = new UtilisateurModel();
    }

    public function showRegistrationForm() {
        // Afficher le formulaire d'inscription
        include 'src/View/Inscription/sinscrire.php';
    }

    public function register() {
        // Vérifier si les données d'inscription sont envoyées via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $motdepasse = $_POST['motdepasse'];

             // Vérifier si l'utilisateur existe déjà
             if ($this->utilisateurModel->checkAnyExists($pseudo, $email)) {
                // Rediriger vers la page d'inscription avec un message d'erreur
                header('Location: /inscription?error=user_already_exists');
                exit();
            }

            // Inscrire l'utilisateur
            if ($this->utilisateurModel->registerUser($pseudo, $email, $motdepasse)) {
                // Rediriger vers la page de connexion avec un message de succès
                header('Location: /afficherrecettes');
                exit();
            } else {
                // Rediriger vers la page d'inscription avec un message d'erreur
                header('Location: /inscription?error=registration_failed');
                exit();
            }
        } else {
            // Si la requête n'est pas POST, rediriger vers la page d'inscription
            header('Location: /inscription');
            exit();
        }
    }
}
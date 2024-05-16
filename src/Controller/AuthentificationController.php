<?php

namespace App\Controller;

use App\Model\AuthentificationModel;

class AuthentificationController {
    private $authModel;

    public function __construct() {
        $this->authModel = new AuthentificationModel();
    }

    public function showLoginForm() {
        // Afficher le formulaire de connexion
        include 'src/View/Authentification/accueil.php';
    }

    public function login() {
        // Vérifier si les données de connexion sont envoyées via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $pseudo = $_POST['pseudo'];
            $motdepasse = $_POST['motdepasse'];

            // Vérifier les informations de connexion
            if ($this->authModel->checkPassword($pseudo, $motdepasse)) {
                // Connexion réussie
                // Démarrer la session et stocker les informations de l'utilisateur
                session_start();
                $_SESSION['pseudo'] = $pseudo;

                // Rediriger vers la page d'accueil ou autre page
                header('Location: /afficherrecettes');
                exit();
            } else {
                // Échec de la connexion
                // Rediriger vers la page de connexion avec un message d'erreur
                header('Location: /login?error=invalid_credentials');
                exit();
            }
        } else {
            // Si la requête n'est pas POST, rediriger vers la page de connexion
            header('Location: /login');
            exit();
        }
    }
}
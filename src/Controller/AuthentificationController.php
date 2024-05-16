<?php

namespace App\Controller;

use App\Model\UtilisateurModel;

class AuthentificationController {
    private $utilisateurModel;

    public function __construct() {
        $this->utilisateurModel = new UtilisateurModel();
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
            if ($this->utilisateurModel->checkPassword($pseudo, $motdepasse)) {
                // Connexion réussie
                // Démarrer la session et stocker les informations de l'utilisateur
                session_start();
                $_SESSION['pseudo'] = $pseudo;

                // Rediriger vers la page recettes
                header('Location: /afficherrecettes');
                exit();
            } else {
                // Vérifier si l'utilisateur existe déjà
                if ($this->utilisateurModel->checkPseudoExists($pseudo)) {
                    // Rediriger vers la page de connexion avec un message d'erreur
                    header('Location: /login?error=invalid_credentials');
                    exit();
                } else {
                    // Rediriger vers la page d'inscription
                    header('Location: /inscription');
                    exit();
                }
            }
        } else {
            // Si la requête n'est pas POST, rediriger vers la page de connexion
            header('Location: /login');
            exit();
        }
    }

    public function logout() {
        // Démarrer la session si elle n'est pas déjà démarrée
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Fermer la session (supprimer les informations de l'utilisateur)
        unset($_SESSION['pseudo']);

        // Optionnel : rediriger vers la page de connexion ou une autre page appropriée
        header('Location: /login');
        exit();
    }
}
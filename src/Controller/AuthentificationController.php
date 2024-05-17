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
        $user = $this->utilisateurModel->checkPassword($pseudo, $motdepasse);

        if ($user) {
            // Connexion réussie
            // Démarrer la session et stocker les informations de l'utilisateur
            $_SESSION['user'] = $user;
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

/*Lorsque les données de connexion sont envoyées via POST,
le code récupère le pseudo et le mot de passe à partir du formulaire.

Ensuite, il utilise la méthode checkPassword du modèle utilisateur pour vérifier si les informations de connexion sont correctes.
Cette méthode retourne soit les informations de l'utilisateur si les informations sont correctes,soit false si les informations sont incorrectes.

Si les informations de connexion sont correctes
(c'est-à-dire si la méthode checkPassword retourne des informations utilisateur),
le code démarre une session et stocke les informations de l'utilisateur dans la variable de session $_SESSION['user'].

Ensuite,il redirige l'utilisateur vers la page de recettes (/afficherrecettes) pour qu'il puisse accéder à l'application en tant qu'utilisateur connecté.

Si les informations de connexion ne sont pas correctes (c'est-à-dire si la méthode checkPassword retourne false),
le code vérifie si le pseudo existe déjà dans la base de données en appelant la méthode checkPseudoExists du modèle utilisateur.

Si le pseudo existe dans la base de données mais le mot de passe est incorrect,
le code redirige l'utilisateur vers la page de connexion (/login) avec un message d'erreur indiquant que les identifiants sont invalides.

Si le pseudo n'existe pas dans la base de données, cela signifie que l'utilisateur n'est pas encore inscrit.
Dans ce cas, le code redirige l'utilisateur vers la page d'inscription (/inscription) pour qu'il puisse créer un compte.

Enfin, si la requête n'est pas POST (c'est-à-dire si l'utilisateur accède à la page de connexion sans soumettre le formulaire),
le code redirige l'utilisateur vers la page de connexion pour qu'il puisse saisir ses identifiants.*/

     function logout() {
        // Démarrer la session si elle n'est pas déjà démarrée
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Fermer la session (supprimer les informations de l'utilisateur)
        unset($_SESSION['pseudo']);

        // Optionnel : rediriger vers la page de connexion ou une autre page appropriée
        header('Location: /login');
      
    }
}

<?php

namespace App\Model;

use PDO;
use App\Model\Database;

class AuthentificationModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }
    public function findByPseudo($pseudo) {
        $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo");
        $stmt->execute([':pseudo' => $pseudo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
        public function checkPassword($pseudo, $motdepasse) {
        $user = $this->findByPseudo($pseudo);

        if (!$user) {
            return false; // Utilisateur non trouvé
        }

        // Vérifier le mot de passe
        if (password_verify($motdepasse, $user['motdepasse'])) {
            return true; // Mot de passe correct
        }

        return false; // Mot de passe incorrect
    }
}
    

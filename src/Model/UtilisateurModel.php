<?php

namespace App\Model;

use PDO;
use App\Model\Database;

class UtilisateurModel {
    private $db;

   public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAllUtilisateurs() {
        $stmt = $this->db->query("SELECT * FROM utilisateurs");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUtilisateur($pseudo, $email, $motdepasse) {
        $stmt = $this->db->prepare("INSERT INTO utilisateurs (pseudo, email, motdepasse) VALUES (?, ?, ?)");
        $stmt->execute([$pseudo, $email, $motdepasse]);
    }
    

    public function getUtilisateurById($id): array 
    {
        $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUtilisateur($pseudo, $email, $motdepasse, $id) {
        $stmt = $this->db->prepare("UPDATE utilisateurs SET pseudo = ?, email = ?, motdepasse = ? WHERE id = ?");
        $stmt->execute([$pseudo, $email, $motdepasse, $id]);
    }

    public function deleteUtilisateur($id) {
       $stmt = $this->db->prepare("DELETE FROM utilisateurs WHERE id = ?");
       $stmt->execute([$id]);
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

    public function checkAnyExists($pseudo, $email) {
        // Vérifier si l'utilisateur existe déjà dans la base de données
        $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo OR email = :email");
        $stmt->execute([':pseudo' => $pseudo, ':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Si un utilisateur avec le même pseudo ou email est trouvé, retourner vrai
        return $user !== false;
    }

    public function registerUser($pseudo, $email, $motdepasse) {
        // Vérifier si l'utilisateur existe déjà
        if ($this->checkAnyExists($pseudo, $email)) {
            return false; // L'utilisateur existe déjà
        }
        // Inscrire l'utilisateur dans la base de données
        $stmt = $this->db->prepare("INSERT INTO utilisateurs (pseudo, email, motdepasse) VALUES (?, ?, ?)");
        return $stmt->execute([$pseudo, $email, $motdepasse]);
    }

    public function checkPseudoExists($pseudo) {
        // Vérifier si l'utilisateur existe déjà dans la base de données
        $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo");
        $stmt->execute([':pseudo' => $pseudo]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Si un utilisateur avec le même pseudo ou email est trouvé, retourner vrai
        return $user !== false;
    }
}
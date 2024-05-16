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

}
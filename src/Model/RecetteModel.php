<?php

namespace App\Model;

use PDO;
use App\Model\Database;

class RecetteModel {
    private $db;

   public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAllRecettes() {
        $stmt = $this->db->query("SELECT * FROM recettes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addRecette($titre, $ingredients, $preparation, $lien_photo, $Utilisateurs_id) {
        $stmt = $this->db->prepare("INSERT INTO recettes (titre, ingredients, preparation, `lien-photo`, Utilisateurs_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$titre, $ingredients, $preparation, $lien_photo, $Utilisateurs_id]);
    }
    

    public function getRecetteById($id): array 
    {
        $stmt = $this->db->prepare("SELECT * FROM recettes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateRecette($titre, $ingredients, $preparation, $lien_photo, $id) {
        $stmt = $this->db->prepare("UPDATE recettes SET titre = ?, ingredients = ?, preparation = ?, `lien-photo` = ? WHERE id = ?");
        $stmt->execute([$titre, $ingredients, $preparation, $lien_photo, $id]);
    }

    public function deleteRecette($id) {
       $stmt = $this->db->prepare("DELETE FROM recettes WHERE id = ?");
       $stmt->execute([$id]);
   }

}



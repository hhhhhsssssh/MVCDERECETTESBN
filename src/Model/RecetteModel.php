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
        $stmt = $this->db->query("SELECT Recettes.*, Utilisateurs.pseudo AS pseudo_utilisateur
                              FROM Recettes
                              JOIN Utilisateurs ON Recettes.Utilisateurs_id = Utilisateurs.id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    public function addRecette($titre, $ingredients, $preparation, $lien_photo, $utilisateurId, $date_creation) {
        // Préparez et exécutez la requête SQL pour insérer une nouvelle recette
        $stmt = $this->db->prepare("INSERT INTO Recettes (titre, ingredients, preparation, `lien-photo`, `jour-post`, Utilisateurs_id) 
                                    VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$titre, $ingredients, $preparation, $lien_photo, $date_creation, $utilisateurId]);
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



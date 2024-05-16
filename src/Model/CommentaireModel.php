<?php

namespace App\Model;

use PDO;
use App\Model\Database;

class CommentaireModel {
    private $db;

   public function __construct() {
        $this->db = Database::getInstance(); // Initialise la base de données
    }

    public function getAllCommentaires() {
        $stmt = $this->db->query("SELECT * FROM commentaires"); // Récupère tous les commentaires
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCommentaire($commentaire, $jourcomment, $Utilisateurs_id) {
        $stmt = $this->db->prepare("INSERT INTO commentaires (commentaire, `jour-comment`, Utilisateurs_id) VALUES (?, ?, ?)"); // Prépare et exécute l'insertion d'un commentaire
        $stmt->execute([$commentaire, $jourcomment, $Utilisateurs_id]);
    }
    

    public function getCommentaireById($id): array // Prépare et exécute la sélection d'un commentaire par ID
    {
        $stmt = $this->db->prepare("SELECT * FROM commentaires WHERE id = ?");// Prépare et exécute la sélection d'un commentaire par ID
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCommentaire($commentaire, $jourcomment, $id) {
        $stmt = $this->db->prepare("UPDATE commentaires SET commentaire = ?, jour-comment = ? WHERE id = ?");// Prépare et exécute la mise à jour d'un commentaire
        $stmt->execute([$commentaire, $jourcomment, $id]);
    }

    public function deleteCommentaire($id) {
       $stmt = $this->db->prepare("DELETE FROM commentaires WHERE id = ?");// Prépare et exécute la suppression d'un commentaire
       $stmt->execute([$id]);
   }

}
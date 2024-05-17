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

    public function getCommentairesByRecetteId($recetteId) {
        // Requête pour récupérer les commentaires d'une recette
        $stmt = $this->db->prepare('SELECT * FROM Commentaires WHERE Recettes_id = :recette_id');
        $stmt->bindParam(':recette_id', $recetteId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCommentaire($commentaire, $utilisateurId, $recette_id) {
        // Prépare la requête pour ajouter un commentaire
        $stmt = $this->db->prepare("INSERT INTO Commentaires (commentaire, Utilisateurs_id, Recettes_id, `jour-comment`) VALUES (:commentaire, :utilisateur_id, :recette_id, NOW())");
        $stmt->bindParam(':commentaire', $commentaire);
        $stmt->bindParam(':utilisateur_id', $utilisateurId);
        $stmt->bindParam(':recette_id', $recette_id);
        $stmt->execute(); // Exécute la requête
    }

    public function addReponse($commentaire, $utilisateuId, $commentaire_id) {
        // Prépare la requête pour ajouter une réponse à un commentaire
        $stmt = $this->db->prepare("INSERT INTO Commentaires (commentaire, Utilisateurs_id, Commentaires_id, `jour-comment`) VALUES (:commentaire, :utilisateur_id, :commentaire_id, NOW())");
        $stmt->bindParam(':commentaire', $commentaire);
        $stmt->bindParam(':utilisateur_id', $utilisateurId);
        $stmt->bindParam(':commentaire_id', $commentaire_id);
        $stmt->execute(); // Exécute la requête
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
////////////////////////////////


}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste Recettes</title>
    <link rel="stylesheet" href="assets/css/styleindex.css">
</head>
<body>
        <nav>
            <ul>
                <li><a href="/login">Accueil</a></li>
                <li><a href="/logout">Déconnexion</a></li>
                <li><a href="/creerrecette">créer une recette</a></li>
                <li><a href="/affichercommentaires">commentaires</a></li>
                <li><a href="/afficherutilisateurs">utilisateurs</a></li>
            </ul>
        </nav>
    <h1>Liste des recettes</h1>
    <ul>
        <?php foreach ($recettes as $recette): ?>
           <li>
               <strong><?= htmlspecialchars($recette['titre']) ?></strong><br>
                Posté le<?= htmlspecialchars($recette['jour-post']) ?> par<?= htmlspecialchars($recette['pseudo_utilisateur']) ?><br>
               <img src="<?= htmlspecialchars($recette['lien-photo']) ?>" alt="Photo de la recette" /><br>
               <p>Ingrédients:<?= nl2br(htmlspecialchars($recette['ingredients'])) ?></p>
               <p>Préparation:<?= nl2br(htmlspecialchars($recette['preparation'])) ?></p>
               <a href="/recettes/edit/<?= $recette['id'] ?>">Modifier</a> 
               <a href="/recettes/delete/<?= $recette['id'] ?>">Supprimer</a>
               <br>
               <button onclick="toggleCommentaires('commentaires-<?= $recette['id'] ?>')">Voir les commentaires</button>

               <div id="commentaires-<?= $recette['id'] ?>" style="display: none;">
                   <h3>Commentaires :</h3>
                   <ul>
                       <?php if (!empty($recette['commentaires'])): ?>
                           <?php foreach ($recette['commentaires'] as $commentaire): ?>
                               <li><?= htmlspecialchars($commentaire['commentaire']) ?> -<?= htmlspecialchars($commentaire['jour-comment']) ?></li>
                           <?php endforeach; ?>
                       <?php else: ?>
                           <li>Aucun commentaire pour cette recette.</li>
                       <?php endif; ?>
                   </ul>
               </div>
       <?php endforeach; ?>
    </ul>

    <script>;
        function toggleCommentaires(id) {
            const element = document.getElementById(id);
            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
    </script>
</body>
</html>
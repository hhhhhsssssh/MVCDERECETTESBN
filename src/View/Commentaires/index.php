<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Liste Commentaires</title>
        <link rel="stylesheet" href="assets/css/styleindex.css">
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="/login">Accueil</a></li>
                <li><a href="/logout">Déconnexion</a></li>
                <li><a href="/creercommentaire">créer un commentaire</a></li>
                <li><a href="/afficherrecettes">recettes</a></li>
                <li><a href="/afficherutilisateurs">utilisateurs</a></li>
            </ul>
        </nav>

        <h1>Liste des Commentaires</h1>
        <ul>
            <?php foreach ($commentaires as $commentaire): ?>
                <li><?= $commentaire['commentaire'] ?> <?= $commentaire['Utilisateurs_id'] ?> <?= $commentaire['Recettes_id'] ?> <?= $commentaire['Commentaires_id'] ?> <a href="/commentaires/edit/<?= $commentaire['id'] ?>">Modifier</a> <a href="/commentaires/delete/<?= $commentaire['id'] ?>">Supprimer</a></li>
            <?php endforeach; ?>
        </ul>
    </body>

<?php include 'src/View/templates/footer.php'; ?>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste Recettes</title>
    <link rel="stylesheet" href="assets/css/styleindex.css">
</head>
<body>
    <h1>Liste des recettes</h1>
    <ul>
        <?php foreach ($recettes as $recette): ?>
            <li><?= $recette['titre'] ?> <?= $recette['jour-post'] ?> <?= $recette['Utilisateurs_id'] ?> <?= $recette['lien-photo'] ?> <?= $recette['ingredients'] ?> <?= $recette['preparation'] ?> <a href="/recettes/edit/<?= $recette['id'] ?>">Modifier</a> <a href="/recettes/delete/<?= $recette['id'] ?>">Supprimer</a></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
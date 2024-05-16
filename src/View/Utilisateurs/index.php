<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste Utilisateurs</title>
    <link rel="stylesheet" href="assets/css/styleindex.css">
</head>
<body>
        <nav>
            <ul>
                <li><a href="/login">Accueil</a></li>
                <li><a href="/creerutilisateur">créer un utilisateur</a></li>
                <li><a href="/affichercommentaires">commentaires</a></li>
                <li><a href="/afficherrecettes">recettes</a></li>
            </ul>
        </nav>
    <h1>Liste des Utilisateurs</h1>
    <ul>
        <?php foreach ($utilisateurs as $utilisateur): ?>
            <li><?= $utilisateur['pseudo'] ?> <?= $utilisateur['email'] ?> <?= $utilisateur['motdepasse'] ?> <a href="/utilisateurs/edit/<?= $utilisateur['id'] ?>">Modifier</a> <a href="/utilisateurs/delete/<?= $utilisateur['id'] ?>">Supprimer</a></li>
        <?php endforeach; ?>
    </ul>
</body>
<?php include 'src/View/templates/footer.php'; ?>
</html>
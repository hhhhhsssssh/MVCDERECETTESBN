<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $_ENV['APP_NAME'] ?></title>
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="/login">Accueil</a></li>
                <li><a href="/affichercommentaires">les commentaires</a></li>
                <li><a href="/afficherrecettes">recettes</a></li>
                <li><a href="/afficherutilisateurs">utilisateurs</a></li>
            </ul>
        </nav>
        <main>

        <form action="/commentaires/save" method="post">
        <label for="commentaire">commentaire :</label>
        <input type="text" id="commentaire" name="commentaire" value="<?php echo $commentaire['commentaire']; ?>" required>

        <input type="hidden" id="Utilisateurs_id" name="Utilisateurs_id" value="<?php echo $commentaire['Utilisateurs_id']; ?>">
        <input type="hidden" id="id" name="id" value="<?php echo $commentaire['id']; ?>">

        <button type="submit">Mettre à jour</button>
        </form>

        </main>
    </body>
    <?php include 'src/View/templates/footer.php'; ?>
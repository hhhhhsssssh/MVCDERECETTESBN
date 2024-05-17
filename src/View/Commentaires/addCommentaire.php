Utilisateur<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un commentaire</title>
</head>
<body>
    <h1>Ajouter un commentaire</h1>

    <form method="POST" action="/storeCommentaire">
    <label for="commentaire">Commentaire :</label>
    <input type="text" id="commentaire" name="commentaire" required>

    <input type="hidden" id="utilisateur_id" name="utilisateur_id" value="<?= $_SESSION['user']['id'] ?>">
    <input type="hidden" id="jour_comment" name="jour_comment" value="<?= date('Y-m-d') ?>">
    <input type="hidden" id="recette_id" name="recette_id" value="<?= $recette['id'] ?>">

    <button type="submit">Ajouter Commentaire</button>
</form>

</body>
</html>
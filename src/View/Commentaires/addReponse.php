<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une réponse</title>
</head>
<body>
    <h1>Ajouter une réponse</h1>


    <form method="POST" action="/storeReponse">
    <label for="reponse_commentaire">Réponse :</label>
    <input type="text" id="reponse_commentaire" name="reponse_commentaire" required>

    <input type="hidden" id="utilisateur_id" name="utilisateur_id" value="<?= $_SESSION['user']['id'] ?>">
    <input type="hidden" id="jour_comment" name="jour_comment" value="<?= date('Y-m-d') ?>">
    <input type="hidden" id="commentaire_id" name="commentaire_id" value="<?= $commentaire['id'] ?>">

    <button type="submit">Ajouter Réponse</button>
</form>

</body>
</html>
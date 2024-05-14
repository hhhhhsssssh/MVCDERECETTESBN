<?php include 'src/View/templates/header.php'; ?>

<form action="/recettes/save" method="post">
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" required>

    <label for="ingredients">Ingredients :</label>
    <input type="ingredients" id="ingredients" name="ingredients" required>

    <label for="preparation">Preparation :</label>
    <input type="preparation" id="preparation" name="preparation" required>

    <label for="lien-photo">lien-photo :</label>
    <input type="lien-photo" id="lien-photo" name="lien-photo" required>

    <label for="Utilisateurs_id">Utilisateurs_id :</label>
    <input type="Utilisateurs_id" id="Utilisateurs_id" name="Utilisateurs_id" required>

    <button type="submit">Créer Recette</button>
</form>

<?php include 'src/View/templates/footer.php'; ?>
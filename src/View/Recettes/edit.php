<?php include 'src/View/templates/header.php'; ?>

<form action="/recettes/update" method="post">
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" value="<?php echo $recette['titre']; ?>" required>

    <label for="ingredients">Ingredients :</label>
    <input type="ingredients" id="ingredients" name="ingredients" value="<?php echo $recette['ingredients']; ?>" required>

    <label for="preparation">Preparation :</label>
    <input type="preparation" id="preparation" name="preparation" value="<?php echo $recette['preparation']; ?>" required>

    <label for="lien-photo">lien-photo :</label>
    <input type="lien-photo" id="lien-photo" name="lien-photo" value="<?php echo $recette['lien-photo']; ?>" required>

    <input type="hidden" id="Utilisateurs_id" name="Utilisateurs_id" value="<?php echo $recette['Utilisateurs_id']; ?>">
    <input type="hidden" id="id" name="id" value="<?php echo $recette['id']; ?>">

    <button type="submit">mettre à jour </button>
</form>

<?php include 'src/View/templates/footer.php'; ?>
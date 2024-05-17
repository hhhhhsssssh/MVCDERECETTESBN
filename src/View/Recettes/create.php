<?php include 'src/View/templates/header.php'; ?>

<form action="/recettes/save" method="post">
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" required>

    <input type="hidden" id="utilisateur_id" name="utilisateur_id" value="<?php echo $_SESSION['user']['id']; ?>">;
    <input type="hidden" id="date_creation" name="date_creation" value="<?php echo date('Y-m-d'); ?>">;

    <label for="ingredients">Ingredients :</label>
    <input type="ingredients" id="ingredients" name="ingredients" required>

    <label for="preparation">Preparation :</label>
    <input type="preparation" id="preparation" name="preparation" required>

    <label for="lien-photo">lien-photo :</label>
    <input type="lien-photo" id="lien-photo" name="lien-photo" required>

   
    <button type="submit">Créer Recette</button>
</form>

<?php include 'src/View/templates/footer.php'; ?>
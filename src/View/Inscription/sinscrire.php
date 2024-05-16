<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_ENV['APP_NAME'] ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<header></header>
<main>

<form action="/inscription" method="post">
<label for="pseudo">pseudo :</label>
<input type="text" id="pseudo" name="pseudo" required>

<label for="email">email :</label>
<input type="email" id="email" name="email" required>

<label for="motdepasse">motdepasse :</label>
<input type="text" id="motdepasse" name="motdepasse" required>

<button type="submit">S'inscrire</button>
</form>

</main>

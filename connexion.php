<?php

session_start();
require_once "php/varSession.inc.php";

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
</head>
<body>

    <form action="php/login_post.php" method="post">
        <label for="id">Pseudo</label>
        <input type="text" name="id" id="id">
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp">
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>

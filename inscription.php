<?php

session_start();
require_once "php/varSession.inc.php";
?>

<!doctype html>
<html lang="rf">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
</head>
<body>
    <form action="php/signin_post.php" method="post">
        <label for="id">Pseudo</label>
        <input type="text" name="id" id="id">
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp">
        <label for="mdp2">Répéter le mot de passe</label>
        <input type="password" name="mdp2" id="mdp2">
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>

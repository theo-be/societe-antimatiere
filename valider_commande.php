<?php
session_start();
require_once "php/varSession.inc.php";


$_SESSION["panier"] = [];
$_SESSION["page"] = "/index.php";

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validation de commande</title>
</head>
<body>

    <h1>Commande enregistrée, merci pour votre confiance</h1>


</body>
</html>

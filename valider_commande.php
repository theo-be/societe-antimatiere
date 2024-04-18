<?php
session_start();
require_once "php/varSession.inc.php";


$_SESSION["page"] = "/index.php";


?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <link rel="stylesheet" href="css/valider_commande.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <title>Validation de commande</title>
</head>

<body>

<div class="logo-box">
    <img src="img/icon.png" alt="Logo du site" width="250" height="125" id="logo">
    <h1 id="title">Société Antimatiere</h1>
</div>

<div class="ticket-box">
    <div class="text">
        <h1>Commande enregistrée, merci de votre confiance !</h1>
        <button onclick="backToSite()" class="submit">Revenir sur le site</button>
    </div>
</div>


<script>

    window.onload = function() {
        var ticketBox = document.querySelector('.ticket-box');

        // Ajoute la classe 'show' pour activer l'animation
        ticketBox.classList.add('show');
    };

    function backToSite(){
        window.location.href ="accueil.php";
    }
</script>
</body>
</html>
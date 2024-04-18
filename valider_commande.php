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
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <title>Validation de commande</title>
</head>

<style>
    body{
        overflow: hidden;
        font-family: 'Inter', sans-serif;
        background-image: url('img/stars-bg.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        margin: 0;
        padding: 0;
        text-align: center;
        color: white;
    }

    .ticket-box h1{
        font-family: , Serif, serif;
        font-size: xx-large;
    }

    .logo-box {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 10%;
        left: 0;
        right: 0;
        width: 100%;
        font-size: 30px;
    }

    .ticket-box{
        top : 150%; /* Position initiale*/
        color: black;
        margin: 0 auto;
        position: relative;
        background-image: url("img/receipt.png");
        background-size: cover;
        width: 382px;
        height: 653px;
        transition: top 1s;
    }

    .ticket-box.show {
        top: 50vh; /* Position finale */
    }

    .submit{
        font-size: large;
        border: 1px solid green;
        background-color: green;
        color: black;
        padding:10px;
        margin: 50px;
        transition:200ms;
    }

    .submit:hover{
        box-shadow: 0 0 20px 10px darkgreen;
        color:white;
    }

    .text {
        flex: 1;
        padding: 20px;
    }

</style>
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


<?php
session_start();
require_once "php/varSession.inc.php";
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="css/styles.css">
    <meta name="description" content="">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <style>
        .rouge {
            border: red;
            background: red;
            color: red;
        }
    </style>
</head>




<body>
<header role="banner">
    <div class="banner">
        <img src="icon.png" alt="Logo du site" id="logo">
        <h1 id="title">Société Antimatiere</h1>
    </div>
    <nav>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Générateurs d'Antimatière</a></li>
            <li><a href="#">Améliorations Dimensionnelles</a></li>
            <li><a href="#">Dispositifs de Manipulation Temporelle</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    <div class="connexion">

        <a href="#">Se connecter</a>
    </div>
</header>

<!-- partie principale + menu -->
<div class="sidemenu">
    <nav>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li>Nos produits</a></li>
            <li><a href="#">Générateurs d'Antimatière</a></li>
            <li><a href="#">Améliorations Dimensionnelles</a></li>
            <li><a href="#">Dispositifs de Manipulation Temporelle</a></li>
        </ul>
    </nav>
</div>
<?php
//    var_dump($_SESSION);
    if ($_SESSION["contact_ok"] === true) {
        require_once "php/formulaire_contact.php";
//        echo "contact_ok : " . $_SESSION["contact_ok"] . "<br>";
    } else {
        require_once "php/formulaire_contact_prerempli.php";
//        echo "contact_ok : " . $_SESSION["contact_ok"] . "<br>";
    }
//    var_dump($_SESSION["formulaire_contact"]);
?>
<!--<script src="js/app.js"></script>-->




<footer>
    <p>Copyright Société Antimatiere</p>
    <p>Contact : 06.55.50.50.55</p>
</footer>
</body>

</html>
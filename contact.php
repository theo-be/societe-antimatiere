
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
    <link rel="stylesheet" href="accueil.css">
    <meta name="description" content="">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>




<body>
<header role="banner">
    <div class="banner">
    <div class="logotitre">
        <img src="icon.png" alt="Logo du site" width="100" height="50" id="logo">
        <h1 id="title">Société Antimatiere</h1>
    </div>
        <!-- Logo du site -->
       <!-- <div class="bandeaubleu"></div> -->
    </div>



    <div class="bandeauvert"></div>
        <!-- Menu horizontal -->
        <table class='menu'>
            <tr href="#" class="side"><td><a class="sideecrit" >Accueil</a></td></tr>
            <tr href="#" class="side"><td><a class="sideecrit" >celestial</a></td></tr>
            <tr href="#" class="side"><td><a class="sideecrit" >glyph</a></td></tr>
            <tr href="#" class="side"><td><a class="sideecrit" >sticker</a></td></tr>
            <tr href="#" class="side"><td><a class="sideecrit" >> Contact</a></td></tr>
        </table>
    <div>
        <a href="#" class="inscription">S'inscrire</a>
        <a href="#" class="connexion">Se connecter</a>
    </div>

    <div>
       <img src="https://purepng.com/public/uploads/large/purepng.com-shopping-cartshoppingcarttrolleycarriagebuggysupermarkets-1421526532356pnf5n.png" alt="Logo du site" class="cart" width="40" height="40" id="logo">

</header>

<!-- partie principale + menu
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
</div> -->
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


<div class="bandeaubleu"></div>
<footer class="foot">
    <div class="footcontenu">
        <p>Copyright Société Antimatiere</p>
        <p>Contact : 06.55.50.50.55</p>
        <a href="https://discord.gg/ZFbejANc"><img src="https://i.pinimg.com/736x/b6/fe/4a/b6fe4a830e0263d8344b63e3dbcf3033.jpg" alt="discord" height="50" width="50" href="#" id="contact"></a>
        <a href="https://github.com/theo-be/societe-antimatiere/tree/main"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSu7esomngrloanUN5V-4X2Rk9P4W2EcXLN-hGNWwHsOw&s" alt="Logo du site" width="50" height="50" id="logo"></a>
    </div>
</footer>
</body>

</html>
<?php

session_start();
require_once "php/varSession.inc.php";
require_once "php/header_footer.php";
// verification de l'acces a la page
if ($_SESSION["compte"]) {
    header("Location:" . $_SESSION["page"]);
}
template_header("Inscription");
?>


    <form action="php/login_post.php" method="post">
        <label for="id">Pseudo</label>
        <input type="text" name="id" id="id">
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp">
        <label for="resterconnecte">Rester connecté</label>
        <input type="checkbox" name="resterconnecte" id="resterconnecte">
        <input type="submit" value="Se connecter">
    </form>

<?=template_footer()?>
<?php

session_start();
require_once "php/varSession.inc.php";
require_once "php/header_footer.php";
template_header("Inscription");
?>


    <form action="php/login_post.php" method="post">
        <label for="id">Pseudo</label>
        <input type="text" name="id" id="id">
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp">
        <input type="submit" value="Se connecter">
    </form>

<?=template_footer()?>

<?php

session_start();
require_once "varSession.inc.php";
require_once "header_footer.php";
template_header("Connexion");
?>

    <form action="login_post.php" method="post">
        <label for="id">Pseudo</label>
        <input class="formulaire" type="text" name="id" id="id"><br><br>
        <label for="mdp">Mot de passe</label>
        <input class="formulaire" type="password" name="mdp" id="mdp"><br><br>
        <input class="submit" type="submit" value="Se connecter"><br><br>
    </form>

<?=template_footer()?>

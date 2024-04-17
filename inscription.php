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


    <form action="php/signin_post.php" method="post">
        <label for="id">Pseudo</label>
        <input class="formulaire" type="text" name="id" id="id"><br><br>
        <label for="mdp">Mot de passe</label>
        <input class="formulaire" type="password" name="mdp" id="mdp"><br><br>
        <label for="mdp2">Répéter le mot de passe</label>
        <input class="formulaire" type="password" name="mdp2" id="mdp2"><br><br>
        <label for="resterconnnecte">Rester connecté</label>
        <input type="checkbox" name="resterconnecte" id="resterconnnecte"><br><br>
        <?php
        if (isset($_SESSION['errors']) && is_array($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo "<div class='error-message'>" . $error . "</div><br><br>";
            }
            unset($_SESSION['errors']);
        }
        ?>
        <input class="submit" type="submit" value="S'inscrire"><br><br>
    </form>



<?=template_footer()?>
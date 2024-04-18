<?php

session_start();
require_once "php/varSession.inc.php";
require_once "php/header_footer.php";
// verification de l'acces a la page
if ($_SESSION["compte"]) {
    header("Location:" . $_SESSION["page"]);
}

template_header("Connexion");
?>

    <!--<form action="php/login_post.php" method="post">
        <label for="id">Pseudo</label>
        <input class="formulaire" type="text" name="id" id="id"><br><br>
        <label for="mdp">Mot de passe</label>
        <input class="formulaire" type="password" name="mdp" id="mdp"><br><br>
        <label for="resterconnecte">Rester connecté</label>
        <input type="checkbox" name="resterconnecte" id="resterconnecte"><br><br>
        <?php
        /*if (isset($_SESSION['errors']) && is_array($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo "<div class='error-message'>" . $error . "</div><br><br>";
            }
            unset($_SESSION['errors']);
        }*/
        ?>
        <input class="submit" type="submit" value="Se connecter"><br><br>
    </form>-->
<div class="form">
    <h1 class="title">Connectez-vous</h1>
    <form method="post" action="php/login_post.php" id="login-form" class="login-form">
        <div>
            <label for="id" class="label-id">
                <span class="required">Pseudo</span>
                <input type="text" class="text" name="id" id="id" placeholder="Pseudo" tabindex="1" required />

            </label>
        </div>
        <div>
            <label class="label-password">
                <span class="required">Mot de passe</span>
                <input type="password" class="text" name="mdp" id="mdp" tabindex="2" required />

            </label>
        </div>
        <div>
            <label class="label-show-password" for="show-password">
                <span>Voir le mot de passe</span>
                <input type="checkbox" name="show-password" class="show-password" id="show-password" />
            </label>
        </div>
        <div>
            <label class="label-resterconnecte" for="resterconnecte">
                <span>Rester connecté</span>
                <input type="checkbox" name="resterconnecte" class="resterconnecte" id="resterconnecte">

            </label>
        </div>
        <input class="submit" type="submit" value="Se connecter" />
    </form>
    <?php
    if (isset($_SESSION['errors']) && is_array($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) {
            echo "<div class='error-message'>" . $error . "</div>";
        }
        unset($_SESSION['errors']);
    }
    ?>
</div>


<script>
    // Get the password input field
    var passwordInput = document.getElementById("mdp");

    // Get the show password checkbox
    var showPasswordCheckbox = document.getElementById("show-password");

    // Add event listener to the checkbox
    showPasswordCheckbox.addEventListener("change", function() {
        // If the checkbox is checked, change the input type to "text"; otherwise, change it back to "password"
        passwordInput.type = this.checked ? "text" : "password";
    });
</script>


<?=template_footer()?>



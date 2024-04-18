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


   <!-- <form action="php/signin_post.php" method="post">
        <label for="id">Pseudo</label>
        <input class="formulaire" type="text" name="id" id="id"><br><br>
        <label for="mdp">Mot de passe</label>
        <input class="formulaire" type="password" name="mdp" id="mdp"><br><br>
        <label for="mdp2">Répéter le mot de passe</label>
        <input class="formulaire" type="password" name="mdp2" id="mdp2"><br><br>
        <label for="resterconnnecte">Rester connecté</label>
        <input type="checkbox" name="resterconnecte" id="resterconnnecte"><br><br>
        <?php
        /*if (isset($_SESSION['errors']) && is_array($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo "<div class='error-message'>" . $error . "</div><br><br>";
            }
            unset($_SESSION['errors']);
        }
        */?>
        <input class="submit" type="submit" value="S'inscrire"><br><br>
    </form>-->

    <div class="form">
        <h1 class="title">Inscrivez-vous</h1>
        <form method="post" action="php/signin_post.php" id="signin-form" class="signin-form">
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
                <label class="label-password">
                    <span class="required">Répéter le mot de passe</span>
                    <input type="password" class="text" name="mdp2" id="mdp2"  tabindex="2" required />
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
            <input class="submit" type="submit" value="S'inscrire" />
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
        var passwordInput1 = document.getElementById("mdp");
        var passwordInput2 = document.getElementById("mdp2");

        var showPasswordCheckbox = document.getElementById("show-password");

        showPasswordCheckbox.addEventListener("change", function() {
            passwordInput1.type = passwordInput2.type = this.checked ? "text" : "password";
        });
    </script>

<?=template_footer()?>
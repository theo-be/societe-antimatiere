<!--
<?php
/*
require_once "remplir_formulaire.php";
*/?>

<div class="contact">
    <form method="post" action="php/demandecontact.php">
        <h2>Demande de contact</h2>
        <h1>ERREUR informations incorrectes</h1>
        <?php
/*
        foreach ($_SESSION["formulaire_contact"]["erreur"] as $value) {
            echo "$value, ";
        }

        echo'
        <!--<label>Date du contact</label><input type="date" name="date_contact" required><br><br>-->
        <label>Nom</label> <input type="text" name="nom" ' . remplir_formualire("nom") . ' required><br><br>
        <label>Prenom</label> <input type="text" name="prenom" ' . remplir_formualire("prenom") . ' required><br><br>
        <label>Email</label> <input type="email" name="email" ' . remplir_formualire("email") . ' required><br><br>
        <label ' . remplir_formualire("genre") . '>Genre</label><input type="radio" id="femme" name="genre" value="Femme"' . remplir_formulaire_genre("Femme") . '><label for="femme">Femme</label>
        <input type="radio" id="homme" name="genre" value="Homme"' . remplir_formulaire_genre("Homme") . '><label for="homme">Homme</label><br><br>
        <label>Date de Naissance</label><input type="date" name="date_naissance" ' . remplir_formualire("date_naissance") . ' required><br><br>
        <label for="fonction">Fonction</label>
        <select name="fonction" id="fonction" ' . remplir_formualire("fonction") . '>
            <option value="Ens" ' . remplir_formulaire_fonction("Ens") . '>Enseignant</option>
            <option value="Eleve" ' . remplir_formulaire_fonction("Eleve") . '>Eleve</option>
            <option value="Autre" ' . remplir_formulaire_fonction("Autre") . '>Autre</option>
        </select>
        <br><br>
        <label>Sujet:</label><input type="text" name="sujet" ' . remplir_formualire("sujet") . ' required><br><br>
        <label>Contenu:</label><input type="text" name="contenu" ' . remplir_formualire("contenu") . ' required>   <br><br>
';
        */?>
        <button type="submit">Envoyer</button>
    </form>

</div>-->


<?php

require_once "remplir_formulaire.php";
?>


        <?php

        foreach ($_SESSION["formulaire_contact"]["erreur"] as $value) {
            echo "$value, ";
        }

        echo'
        <div class="form">
    <h1 class="title">Demande de contact</h1>
    <form method="post" action="php/demandecontact.php" class="contact-form">
        <div>
            <label class="placeholder">
                <span class="required">Nom</span>
                <input ' . remplir_formualire("nom") . ' type="text" name="nom" id="nom" class="text" placeholder="Nom" required>
            </label>
        </div>
        <div>
            <label class="placeholder">
                <span class="required">Prenom</span>
                <input ' . remplir_formualire("prenom") . ' type="text" name="prenom" id="prenom" class="text" placeholder="Prenom" required>
            </label>
        </div>
        <div>
            <label class="placeholder">
                <span class="required">Email</span>
                <input ' . remplir_formualire("email") . '" type="email" name="email" id="email" class="text" placeholder="Email" required>
            </label>
        </div>
        <div>
            <label>
                <span>Genre</span>
                <div class="radios">
                <label for="femme">
                    <span>Femme</span>
                    <input type="radio" id="femme" name="genre" value="Femme"' . remplir_formulaire_genre("Femme") . ' class="formulaire">
                </label>
                <label for="femme">
                    <span>Homme</span>
                    <input type="radio" id="homme" name="genre" value="Homme"' . remplir_formulaire_genre("Homme") . ' class="formulaire">
                </label>
                </div>
            </label>
        </div>
        <div>
            <label>
                <span>Date de Naissance</span>
                <input ' . remplir_formualire("date_naissance") . ' type="date" name="date_naissance" id="date_naissance" class="text" required>
            </label>
        </div>
        <div>
            <label>
                <span>Fonction</span>

                <select ' . remplir_formualire("fonction") . '" name="fonction" id="fonction" class="formulaire">
                    <option value="Ens" ' . remplir_formulaire_fonction("Ens") . '>Enseignant</option>
                    <option value="Eleve" ' . remplir_formulaire_fonction("Eleve") . '>Eleve</option>
                    <option value="Autre" ' . remplir_formulaire_fonction("Autre") . '>Autre</option>
                </select>
            </label>
        </div>
        <div>
            <label class="placeholder">
                <span class="required">Sujet</span>
                <input ' . remplir_formualire("sujet") . ' type="text" name="sujet" id="sujet" class="text" placeholder="Sujet" required>
            </label>
        </div>
        <div>
            <label class="placeholder">
                <span class="required">Contenu</span>
                <textarea name="contenu" id="contenu" class="text" placeholder="Contenu" required>' . remplir_formulaire_contenu() . '</textarea>
            </label>
        </div>
        <input class="submit" type="submit" value="Envoyer" />
    </form>
</div>
';
        ?>

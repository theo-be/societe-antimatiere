
<?php

require_once "remplir_formulaire.php";
?>

<div class="contact">
    <form method="post" action="php/demandecontact.php">
        <h2>Demande de contact</h2>
        <h1>ERREUR informations incorrectes</h1>
        <?php

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
        ?>
        <button type="submit">Envoyer</button>
    </form>

</div>
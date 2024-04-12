

<div class="contact">
    <form method="post" action="php/demandecontact.php">
        <h2>Demande de contact</h2>
        <!--<label>Date du contact</label><input type="date" name="date_contact" required><br><br>-->
        <label>Nom</label> <input class="formulaire" type="text" placeholder="Entrez Nom" name="nom" required><br><br>
        <label>Prenom</label> <input class="formulaire" type="text" placeholder="Entrez Prenom" name="prenom" required><br><br>
        <label>Email</label> <input class="formulaire" type="email" placeholder="monmail@monsite.org" name="email" required><br><br>
        <label>Genre</label><input class="formulaire" type="radio" id="femme" name="genre" value="Femme"><label for="femme">Femme</label>
        <input class="formulaire" type="radio" id="homme" name="genre" value="Homme"><label for="homme">Homme</label><br><br>
        <label>Date de Naissance</label><input class="formulaire" type="date" name="date_naissance" required><br><br>
        <label for="fonction">Fonction</label>
        <select class="formulaire" name="fonction" id="fonction">
            <option value="Ens">Enseignant</option>
            <option value="Eleve">Eleve</option>
            <option value="Autre">Autre</option>
        </select>
        <br><br>
        <label>Sujet</label><input class="formulaire" type="text" placeholder="Entrez le sujet de votre mail" name="sujet" required><br><br>
        <label>Contenu</label><input class="formulaire" type="text" placeholder="Tapez ici votre mail" name="contenu" required>   <br><br>
        <button class="submit" type="submit">Envoyer</button>
    </form>

</div>

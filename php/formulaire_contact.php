

<!--<div class="form">
    <form method="post" action="php/demandecontact.php">
        <h2>Demande de contact</h2>-->
        <!--<label>Date du contact</label><input type="date" name="date_contact" required>-->
        <!--<label class="placeholder">Nom</label> <input class="formulaire" type="text" name="nom" required>
        <label class="placeholder">Prenom</label> <input class="formulaire" type="text" name="prenom" required>
        <label class="placeholder">Email</label> <input class="formulaire" type="email" name="email" required>
        <label >Genre</label><input class="formulaire" type="radio" id="femme" name="genre" value="Femme"><label for="femme">Femme</label>
        <input class="formulaire" type="radio" id="homme" name="genre" value="Homme"><label for="homme">Homme</label>
        <label>Date de Naissance</label><input class="formulaire" type="date" name="date_naissance" required>
        <label for="fonction">Fonction</label>
        <select class="formulaire" name="fonction" id="fonction">
            <option value="Ens">Enseignant</option>
            <option value="Eleve">Eleve</option>
            <option value="Autre">Autre</option>
        </select>
        <label>Sujet</label><input class="formulaire" type="text" name="sujet" required>
        <label>Contenu</label><input class="formulaire" type="text" name="contenu" required>
        <button class="submit" type="submit">Envoyer</button>
    </form>

</div> -->


<div class="form">
    <h1 class="title">Demande de contact</h1>
    <form method="post" action="php/demandecontact.php" class="contact-form">
        <div>
            <label class="placeholder">
                <span class="required">Nom</span>
                <input type="text" name="nom" id="nom" class="text" placeholder="Nom" required>
            </label>
        </div>
        <div>
            <label class="placeholder">
                <span class="required">Prenom</span>
                <input type="text" name="prenom" id="prenom" class="text" placeholder="Prenom" required>
            </label>
        </div>
        <div>
            <label class="placeholder">
                <span class="required">Email</span>
                <input type="email" name="email" id="email" class="text" placeholder="Email" required>
            </label>
        </div>
        <div>
            <label>
                <span>Genre</span>
                <div class="radios">
                <label for="femme">
                    <span>Femme</span>
                    <input type="radio" id="femme" name="genre" value="Femme" class="formulaire">
                </label>
                <label for="femme">
                    <span>Homme</span>
                    <input type="radio" id="homme" name="genre" value="Homme" class="formulaire">
                </label>
                </div>
            </label>
        </div>
        <div>
            <label>
                <span>Date de Naissance</span>
                <input type="date" name="date_naissance" id="date_naissance" class="text" required>
            </label>
        </div>
        <div>
            <label>
                <span>Fonction</span>

                <select name="fonction" id="fonction" class="formulaire">
                    <option value="Ens">Enseignant</option>
                    <option value="Eleve">Eleve</option>
                    <option value="Autre">Autre</option>
                </select>
            </label>
        </div>
        <div>
            <label class="placeholder">
                <span class="required">Sujet</span>
                <input type="text" name="sujet" id="sujet" class="text" placeholder="Sujet" required>
            </label>
        </div>
        <div>
            <label class="placeholder">
                <span class="required">Contenu</span>
                <textarea name="contenu" id="contenu" class="text" placeholder="Contenu" required></textarea>
            </label>
        </div>
        <input class="submit" type="submit" value="Envoyer" />
    </form>
</div>







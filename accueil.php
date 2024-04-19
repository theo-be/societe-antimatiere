<?php
// Début de la session
session_start();

// Inclusion des fichiers nécessaires
require_once "php/varSession.inc.php";
require_once "php/header_footer.php";

// Appel de la fonction pour afficher l'en-tête
template_header("Accueil");
?>

    <div class="accueil">
        <h1>Bienvenue sur le site de la Société Antimatiere</h1>
        <p>Ici vous pourrez retrouver <strong>vos éléments préférés du jeu</strong> : des <a href='produits.php?cat=Celestial'>céléstials</a>, des <a href='produits.php?cat=Glyphe'>glyphs</a> et des <a href='produits.php?cat=Sticker'>stickers</a>.</p>
        <p>Bon shopping !</p>
    </div>

<?php
// Appel de la fonction pour afficher le pied de page
echo template_footer();
?>
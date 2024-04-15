<?php
// Début de la session
session_start();

// Inclusion des fichiers nécessaires
require_once "varSession.inc.php";
require_once "header_footer.php";

// Appel de la fonction pour afficher l'en-tête
template_header("Accueil");
?>

<style>
    .accueil{
        margin-bottom: 480px;
    }
</style>

<div class="accueil">
    <h1>Bienvenue sur le site de la Société Antimatiere</h1>
    <p>Ici vous pourrez retrouver vos éléments préférés du jeu : des céléstials, des glyphs et des stickers.</p>
    <p>Bon shopping !</p>
</div>

<?php
// Appel de la fonction pour afficher le pied de page
echo template_footer();
?>

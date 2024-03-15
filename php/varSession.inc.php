<?php

if (!isset($_SESSION["init"])) {
    $_SESSION["init"] = true;
    $_SESSION["tabcategories"] = null;
    $_SESSION["panier"] = null;
}


$_SESSION["tabcategories"] = null;

/*
 * a faire
 * recuperer toutes les donnees de produits depuis le serveur
 *
 * page produits :
 * construire dynamiquement un tableau html selon la bdd et selon la demande de l'utilisateur
 * si pas de get afficher tous les produits
 *
 * page de demande de contact :
 * recup le formulaire et le stocker dans la bdd
 */

?>




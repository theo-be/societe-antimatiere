<?php


/*
 * a faire
 *
 * modif page produits
 * nettoyage
 * panier
 * bdd date client
 * $session[page] sur les pages dedies aux cat
 * minimum de caracteres mdp
 * verif connexion pour demande contact ou commande
 */

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["init"])) {
    $_SESSION["init"] = true;
    $_SESSION["panier"] = [];
    $_SESSION["contact_ok"] = true;
    $_SESSION["compte"] = false;
    $_SESSION["id"] = null;
    $_SESSION["page"] = $_SERVER["REQUEST_URI"];

}



?>




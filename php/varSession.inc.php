<?php

if (!isset($_SESSION["init"])) {
    $_SESSION["init"] = true;
    $_SESSION["tabcategories"] = null;
    $_SESSION["panier"] = null;
    $_SESSION["contact_ok"] = true;

    // recuperation de la base de donnees

    $dbtext = file_get_contents("php/db.json");
    $_SESSION["bdd"] = json_decode($dbtext, true);

}





?>




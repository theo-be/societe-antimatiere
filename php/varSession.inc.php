<?php

if (!isset($_SESSION["init"])) {
    $_SESSION["init"] = true;
    $_SESSION["tabcategories"] = null;
    $_SESSION["panier"] = [];
    $_SESSION["contact_ok"] = true;
    $_SESSION["compte"] = false;

    // recuperation de la base de donnees

    $dbtext = file_get_contents("php/db.json");
    $_SESSION["bdd"] = json_decode($dbtext, true);

}
//
//if ($_SESSION["compte"]) {
//    echo "bonjour, " . $_SESSION["id"] . "<br>";
//} else echo "pas connecte<br>";
//



?>




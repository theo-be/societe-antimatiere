<?php

session_start();
require_once "varSession.inc.php";
require_once "bdd.php";

$id = $_POST["id"];
$mdp = $_POST["mdp"];


if ($res = connexion($id, $mdp)) {
    // charger les infos du compte
    $_SESSION["compte"] = true;
    $_SESSION["id"] = htmlspecialchars( $id);

    header("Location:". $_SESSION["page"]);
}
else {
    header("Location:connexion.php");
}


?>
<?php

session_start();
require_once "varSession.inc.php";
require_once "bdd.php";

$id = $_POST["id"];
$mdp = $_POST["mdp"];
$_SESSION['errors'] = array();

if ($res = connexion($id, $mdp)) {
    // charger les infos du compte
    $_SESSION["compte"] = true;
    $_SESSION["id"] = htmlspecialchars( $id);

    header("Location:". $_SESSION["page"]);
}
else {
    $_SESSION['errors'][] = "Une erreur s'est produite lors de la connexion. Veuillez réessayer.";
    header("Location:connexion.php");
}


?>
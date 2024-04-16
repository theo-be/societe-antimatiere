<?php

session_start();
require_once "varSession.inc.php";
require_once "bdd.php";

$_SESSION['errors'] = array();

if (!isset($_POST["id"]) || !isset($_POST["mdp"]) || !isset($_POST["mdp2"])){
    // formulaire incomplet
    $_SESSION['errors'][] = "Formulaire incomplet";
    header("Location:../inscription.php");
}

$id = $_POST["id"];
$mdp = $_POST["mdp"];
$mdp2 = $_POST["mdp2"];

$resterconnecte = !((!isset($_POST["resterconnecte"]) || $_POST["resterconnecte"] != "on"));



if ($mdp != $mdp2) {
    // les mdp correspondent pas
    $_SESSION['errors'][] = "Les mots de passe ne correspondent pas.";
    header("Location:../inscription.php");
} else if (strlen($mdp) < 8) {
    // nombre minimal de caracteres non respecte
    $_SESSION['errors'][] = "Le mot de passe doit contenir au moins 8 caractères.";
    header("Location:../inscription.php");
} else
// insertion dans la bdd

if (inscription($id, $mdp, $resterconnecte)) {
    header("Location:" . $_SESSION["page"]);

    $_SESSION["compte"] = true;
    $_SESSION["id"] = htmlspecialchars($id);

//    echo $_SESSION["id"];

}
else {
    $_SESSION['errors'][] = "Une erreur s'est produite lors de l'inscription. Veuillez réessayer.";
    header("Location:../inscription.php");
}

// si retour faux alors le compte existe deja




?>

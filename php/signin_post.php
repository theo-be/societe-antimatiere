<?php
session_start();
require_once "varSession.inc.php";
require_once "bdd.php";

$_SESSION['errors'] = array();


if (!isset($_POST["id"]) || !isset($_POST["mdp"]) || !isset($_POST["mdp2"])){
    $_SESSION['errors'][] = "Formulaire incomplet";
    header("Location:inscription.php");
    exit();
}


$id = $_POST["id"];
$mdp = $_POST["mdp"];
$mdp2 = $_POST["mdp2"];




if ($mdp != $mdp2) {
    $_SESSION['errors'][] = "Les mots de passe ne correspondent pas.";
    header("Location:inscription.php");
    exit();
} elseif (strlen($mdp) < 8) {
    $_SESSION['errors'][] = "Le mot de passe doit contenir au moins 8 caractères.";
    header("Location:inscription.php");
    exit();
} elseif (!inscription($id, $mdp)) {
    $_SESSION['errors'][] = "Une erreur s'est produite lors de l'inscription. Veuillez réessayer.";
    header("Location:inscription.php");
    exit();
}

$_SESSION["compte"] = true;
$_SESSION["id"] = htmlspecialchars($id);
header("Location:" . $_SESSION["page"]);
?>

<?php

session_start();
require_once "varSession.inc.php";
require_once "bdd.php";


$id = $_POST["id"];
$mdp = $_POST["mdp"];
$mdp2 = $_POST["mdp2"];




if ($mdp != $mdp2) {
    // les mdp correspondent pas
//    header("Location:../inscription.php");
} else
// insertion dans la bdd

if (inscription($id, $mdp)) {
    header("Location:../index.php");

    $_SESSION["compte"] = true;
    $_SESSION["id"] = $id;

    echo $_SESSION["id"];
}
else {
    header("Location:../inscription.php");
}

// si retour faux alors le compte existe deja




?>
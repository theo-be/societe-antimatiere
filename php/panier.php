<?php


session_start();
require_once "varSession.inc.php";

$idproduit = $_POST["id"];
$quantite = $_POST["quantite"];
$danspanier = false;

for ($i = 0; $i < count($_SESSION["panier"]); $i++) {
    if ($_SESSION["panier"][$i]["id"] == $idproduit) {
        $_SESSION["panier"][$i]["quantite"] = $quantite;
        $danspanier = true;
        break;
    }
}

if (!$danspanier) {
    $_SESSION["panier"][] = ["id" => $idproduit, "quantite" => $quantite];
}

header("Location:". $_SESSION["page"]);


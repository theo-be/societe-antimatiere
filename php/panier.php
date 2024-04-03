<?php


session_start();
require_once "varSession.inc.php";

$idproduit = $_GET["produit"];
$quantite = $_GET["quantite"];
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

var_dump($_SESSION["panier"]);


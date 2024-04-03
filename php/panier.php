<?php


session_start();
require_once "varSession.inc.php";

$idproduit = $_GET["produit"];
$quantite = $_GET["quantite"];

if (in_array($idproduit, array_keys($_SESSION["panier"]))) {
    foreach ($_SESSION["panier"] as $obj) {
        if ($obj["id"] == $idproduit) {
            $obj["quantite"] = $quantite;
        }
    }

}
else {
    $_SESSION["panier"][] = ["id" => $idproduit, "quantite" => $quantite];
}

var_dump($_SESSION["panier"]);


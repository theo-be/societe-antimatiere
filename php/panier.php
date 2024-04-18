<?php


session_start();
require_once "varSession.inc.php";


$idproduit = $_POST["id"];
$quantite = $_POST["quantite"];
$danspanier = false;


// verification de l'existance du produit et des stocks

$db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$requete = $db->prepare("SELECT quantite_en_stock FROM produit WHERE id=?");
$requete->execute(array($idproduit));

if (($produit = $requete->fetch())) {
    for ($i = 0; $i < count($_SESSION["panier"]); $i++) {
        if ($_SESSION["panier"][$i]["id"] == $idproduit) {
            $_SESSION["panier"][$i]["quantite"] = min($quantite, $produit["quantite_en_stock"]);
            $danspanier = true;
            break;
        }
    }

    if (!$danspanier) {
        $_SESSION["panier"][] = ["id" => $idproduit, "quantite" => min($quantite, $produit["quantite_en_stock"])];
    }
}

$requete->closeCursor();

header("Location:". $_SESSION["page"]);


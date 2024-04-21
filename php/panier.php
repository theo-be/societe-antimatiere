<?php


session_start();
require_once "varSession.inc.php";


$idproduit = $_POST["id"];
$quantite = $_POST["quantite"];
$danspanier = false;


// verification de l'existance du produit et des stocks

$db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$requetetexte = file_get_contents("../sql/stock_produit.sql");
$requete = $db->prepare($requetetexte);

$requete->execute(array($idproduit));

if (($produit = $requete->fetch())) {
    for ($i = 0; $i < count($_SESSION["panier"]); $i++) {
        if ($_SESSION["panier"][$i]["id"] == $idproduit) {
            $danspanier = true;
            // on verifie si la quantite est valide
            if ($_SESSION["panier"][$i]["quantite"] <= 0) {
                $_SESSION["panier"] = array_splice($_SESSION["panier"], $i, 1);
            } else {
                $_SESSION["panier"][$i]["quantite"] = min($quantite, $produit["quantite_en_stock"]);
            }
            break;
        }
    }

    if (!$danspanier && $quantite > 0) {
        $_SESSION["panier"][] = ["id" => $idproduit, "quantite" => min($quantite, $produit["quantite_en_stock"])];
    }
}

$requete->closeCursor();

header("Location:". $_SESSION["page"]);


<?php
session_start();
require_once "varSession.inc.php";


$db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


// code client


$idcompte = 0;
$requeteidcomptetexte = file_get_contents("../sql/id_depuis_compte.sql");
$requeteidcompte = $db->prepare($requeteidcomptetexte);
$requeteidcompte->execute([$_SESSION["id"]]);
if ($id = $requeteidcompte->fetch())
    $idcompte = $id["id"];

$requeteidcompte->closeCursor();

// insertion des produits

foreach ($_SESSION["panier"] as $produit) {
    $requetetexte = file_get_contents("../sql/ajout_commande.sql");
    $requete = $db->prepare($requetetexte);
    $requete->execute(array($idcompte, $produit["id"], $produit["quantite"]));
    $requete->closeCursor();
}


$_SESSION["panier"] = [];

header("Location:../valider_commande.php");
?>
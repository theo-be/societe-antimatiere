<?php
session_start();
require_once "varSession.inc.php";


$db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


// code client


$idcompte = 0;
$requeteidcompte = $db->prepare("SELECT id FROM compte WHERE pseudo=?");
$requeteidcompte->execute([$_SESSION["id"]]);
if ($id = $requeteidcompte->fetch())
    $idcompte = $id["id"];

$requeteidcompte->closeCursor();

// insertion des produits

foreach ($_SESSION["panier"] as $produit) {
    $requete = $db->prepare("INSERT INTO commande (code_client, id_produit, quantite_commande) VALUES (?,?,?);");
    $requete->execute(array($idcompte, $produit["id"], $produit["quantite"]));
    $requete->closeCursor();
}


$_SESSION["panier"] = [];

header("Location:../valider_commande.php");
?>
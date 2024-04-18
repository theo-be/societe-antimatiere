<?php
session_start();

// récupère l'id du produit dans l'url
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_produit = $_GET['id'];

    // cherche le produit à supprimer dans le panier
    foreach ($_SESSION["panier"] as $key => $item) {
        if ($item["id"] == $id_produit) {
            unset($_SESSION["panier"][$key]);
            break;
        }
    }
}

// redirige vers la page du panier après la suppression
header("Location: ../monpanier.php");
?>

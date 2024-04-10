<?php

session_start();
require_once "php/varSession.inc.php";
?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détail du produit</title>
</head>
<body>
<?php
if (!isset($_GET) || !isset($_GET["id"])) {
    // erreur dans l'url
    echo "Aucun produit sélectionné";
} else {
    $id = $_GET["id"];
    $db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $requete = $db->prepare("select * from produit where id=?");
    $requete->execute(array($id));

    if ($resultat = $requete->fetch()) {

        // recuperation du produit

        $nom = $resultat["nom"];
        $stock = $resultat["quantite_en_stock"];
        $photo = $resultat["photo"];
        $description = $resultat["text_description"];
        $prix = $resultat["prix"];

        $requete->closeCursor();


        // affichage des données du produit





    } else {
        // erreur dans l'id dans l'url
        echo "Aucun produit valide avec cette référence";
    }
}


?>
</body>
</html>





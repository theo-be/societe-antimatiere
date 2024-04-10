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
    <title>Panier</title>
</head>
<body>

    <?php
    // affichage du panier

    if (count($_SESSION["panier"]) == 0) {
        echo "rien dans le panier";
    } else {

        $db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        echo '<table border="1">
                <tr>
                <td class="photo">Photo</td>
                <td class="nom">Nom</td>
                <td class="reference">Reference</td>
                <td class="description">Description</td>
                <td class="prix">Prix</td>
                <td class="qt">Quantité</td>
                </tr>
                ';
        foreach ($_SESSION["panier"] as $item) {
            $requete = $db->prepare("select * from produit where id=?");
            $requete->execute(array($item["id"]));
            $resultat = null;
            if ($resultat = $requete->fetch()) {

                echo "<tr>   
                <td class='photo'><img src='img/" . $resultat["photo"] . "' alt='" . $resultat["photo"] . "' </td>
                <td class='nom'>" . $resultat["nom"] . "</td>
                <td class='reference'>" . $resultat["id"] . "</td>
                <td class='description'>" . $resultat["text_description"] . "</td>
                <td class='prix'>" . $resultat["prix"] . "</td>
                <td class='qt'>" . $item["quantite"] . "</td>

</tr>";
            }
            $requete->closeCursor();
        }
        echo "</table>";
        echo "
    <a href='valider_commande.php'>Passer la commande</a>";
    }


    ?>


</body>
</html>


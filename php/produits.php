<?php

session_start();
require_once "varSession.inc.php";
require_once "header_footer.php";


$db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', 'cytech0001', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$categoriesrequete = $db->query("select nom from categorie");
$categories = array();
while ($categorie = $categoriesrequete->fetch())
    $categories[] = $categorie["nom"];

$categoriesrequete->closeCursor();

$selectionUtilisateur = false;

// prise en compte des categories demandees

$_SESSION["page"] = $_SERVER["REQUEST_URI"];

$cat = array();
if (isset($_GET["cat"])) {
    $selectionUtilisateur = true;

    $query = explode(',', $_GET["cat"]);
    foreach ($query as $item) {
        if (in_array($item, $categories))
            $cat[] = $item;
    }
}

if ($selectionUtilisateur)
    $selection = array_diff($categories, array_diff($categories, $cat));
else
    $selection = $categories;

?>

<?=template_header("Produits")?>




<?php
// recuperation de la page actuelle avec la methode GET
$_SESSION["page"] = $_SERVER["REQUEST_URI"];

// affichage des produits

foreach ($selection as $value) {
    $requete = $db->prepare("SELECT * FROM produit WHERE id_categorie = (SELECT id FROM categorie WHERE nom=?)");
    $requete->execute(array($value));

    echo "<div class='category-container'>";
    echo "<h1>Catégorie $value</h1>";

    while ($resultat = $requete->fetch()) {
        echo "
        <div class='boite-produit'>
                    <a href='produit.php?id={$resultat["id"]}' class='lien-produit'>
                <div class='image'>
                    <img src='../img/{$resultat["photo"]}' alt='{$resultat["photo"]}'>
                </div>
                <div class='texte-produit'>
                        <div class='nom-produit'>{$resultat["nom"]}</div>
                        <div class='prixproduit'>{$resultat["prix"]} €</div>
                </div>
                    </a>
        </div>";
    }

    echo "</div>";

    $requete->closeCursor();
}



//        echo "<tr>
//                <td class='photo'>" . $resultat["photo"] . "</td>
//                <td class='nom'>" . $resultat["nom"] . "</td>
//                <td class='reference'>" . $resultat["id"] . "</td>
//                <td class='description'>" . $resultat["text_description"] . "</td>
//                <td class='prix'>" . $resultat["prix"] . "</td>";
//        // Quantity controls (plus and minus buttons)
//        echo "<td class='quantite'>";
//        echo "<div class='quantity-controls'>";
//        echo "<button class='minus'>-</button>";
//        echo "<span class='quantity' data-stock='{$resultat["quantite_en_stock"]}'>0</span>";
//
//        echo "<button class='plus'>+</button>";
//        echo "</div>";
//        echo "</td>";
//        // Add to cart button
//        echo "<td class='ajouter'><a class='ajouter' href='php/panier.php?produit={$resultat["id"]}&quantite=1'>Ajouter au panier</a></td>";
//echo "</tr>";




?>

<!--boite lambda-->

<!--
<div class="boite-produit">
    <a href="produit.php?id=" class="lien-produit">
        <div class="image"><img src="img/" alt=""></div>
        <div class="nom-produit">Nom du produit</div>
        <div class="prixproduit">2000 €</div>
    </a>
</div>

-->



<?php

template_footer();
?>
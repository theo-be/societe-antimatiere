<?php

session_start();
require_once "php/varSession.inc.php";
require_once "php/header_footer.php";


$db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

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
                    <img src='img/{$resultat["photo"]}' alt='{$resultat["photo"]}'>
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












<!--    <button id="afficher">afficher</button>-->

<!---->
<!--<script>-->
<!--document.getElementById("afficher").addEventListener("click", (e) => {-->
<!--    let stocks = document.getElementsByClassName("stock");-->
<!--    if (stocks[0].style.display === "none") {-->
<!--        for (let i = 0; i < stocks.length; i++) {-->
<!--            stocks[i].style.display = "inline";-->
<!--        }-->
<!--    }-->
<!--    else {-->
<!--        for (let j = 0; j < stocks.length; j++) {-->
<!--            stocks[j].style.display = "none";-->
<!--        }-->
<!--    }-->
<!--})-->
<!--</script>-->


<!--<button id="Stock">Stock</button>-->

<script type="text/javascript">
    document.getElementById("Stock").addEventListener("click", (e) => {
        var stocks = document.querySelectorAll('.stock');
        stocks.forEach(function(stock) {
            stock.classList.toggle('hidden');
        });
    });

    // Function to enlarge image on hover
    var images = document.querySelectorAll('.photo img');
    images.forEach(function(image) {
        image.addEventListener('mouseenter', function() {
            this.classList.add('agrandie');
        });

        image.addEventListener('mouseleave', function() {
            this.classList.remove('agrandie');
        });
    });

    // Function to handle quantity adjustments and button activations
    var quantityControls = document.querySelectorAll('.quantity-controls');
    quantityControls.forEach(function(control) {
        var quantitySpan = control.querySelector('.quantity');
        var plusButton = control.querySelector('.plus');
        var minusButton = control.querySelector('.minus');

        plusButton.addEventListener('click', function() {
            var quantity = parseInt(quantitySpan.textContent);
            var stock = parseInt(quantitySpan.dataset.stock);
            if (quantity < stock) {
                quantitySpan.textContent = quantity + 1;
            }
            updateAddToCartButtonState();
        });

        minusButton.addEventListener('click', function() {
            var quantity = parseInt(quantitySpan.textContent);
            if (quantity > 0) {
                quantitySpan.textContent = quantity - 1;
            }
            updateAddToCartButtonState();
        });
    });

    function updateAddToCartButtonState() {
        var rows = document.querySelectorAll('tr');
        rows.forEach(function(row) {
            var quantitySpan = row.querySelector('.quantity');
            if (quantitySpan) {
                var addButton = row.querySelector('.ajouter button');
                var quantity = parseInt(quantitySpan.textContent);
                var stock = parseInt(quantitySpan.dataset.stock);
                if (quantity > 0 && quantity <= stock) {
                    addButton.removeAttribute('disabled');
                } else {
                    addButton.setAttribute('disabled', 'disabled');
                }
            }
        });
    }


    function addToCart(reference, stock, event) {
        // Get the parent row of the clicked button
        var row = event.target.closest('tr');

        // Find the quantity span within the row
        var quantitySpan = row.querySelector('.quantity');
        var quantity = parseInt(quantitySpan.textContent);

        // Check quantity
        if (quantity > 0 && quantity <= stock) {
            window.location.href = "php/panier.php?produit=" + reference + "&quantite=" + quantity;
        } else {
            alert("Invalid quantity!");
        }
    }

</script>

<?php

template_footer();
?>
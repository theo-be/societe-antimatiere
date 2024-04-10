<?php

    session_start();
    require_once "php/varSession.inc.php";



    $db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//    $categoriesrequete = $_SESSION["bdd"]->query("select nom from categorie");
    $categoriesrequete = $db->query("select nom from categorie");
    $categories = array();
    while ($categorie = $categoriesrequete->fetch())
        $categories[] = $categorie["nom"];

    $categoriesrequete->closeCursor();

    $selectionUtilisateur = false;

    // prise en compte des categories demandees

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

//    var_dump($selection);
?>

<!doctype html>
<html>
<head></head>
<body>




<?php

// affichage des produits

foreach ($selection as $value) {
    $requete = $db->prepare("select * from produit where id_categorie = (select id from categorie where nom=?)");
    $requete->execute(array($value));

    echo "<h1>categorie $value</h1>";
    echo '<table border="1">
                <tr>
                <td class="photo">Photo</td>
                <td class="nom">Nom</td>
                <td class="reference">Reference</td>
                <td class="description">Description</td>
                <td class="prix">Prix</td>
                <td class="stock">Stock</td>
                <td class="ajouter">Ajouter au panier</td>
                </tr>
                ';

    while ($resultat = $requete->fetch()) {
        // key : categorie
        // element : produit

        echo "<tr>   
                <td class='photo'>" . $resultat["photo"] . "</td>
                <td class='nom'>" . $resultat["nom"] . "</td>
                <td class='reference'>" . $resultat["id"] . "</td>
                <td class='description'>" . $resultat["text_description"] . "</td>
                <td class='prix'>" . $resultat["prix"] . "</td>";
        // Quantity controls (plus and minus buttons)
        echo "<td class='quantite'>";
        echo "<div class='quantity-controls'>";
        echo "<button class='minus'>-</button>";
        echo "<span class='quantity' data-stock='{$resultat["quantite_en_stock"]}'>0</span>";

        echo "<button class='plus'>+</button>";
        echo "</div>";
        echo "</td>";
        // Add to cart button
        echo "<td class='ajouter'><button disabled class='ajouter' onclick='addToCart({$item['reference']}, {$item['stock']}, event)'>Ajouter au panier</button></td>";
echo "</tr>";


    }

    echo "</table>";


    $requete->closeCursor();

}


?>

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


<button id="Stock">Stock</button>

<script>
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

</body>
</html>

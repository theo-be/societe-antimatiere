<?php
session_start();
require_once "php/varSession.inc.php";

$dbtext = file_get_contents("php/db.json");
$db = json_decode($dbtext, true);

$categories = [];
$categories["test"] = false;
foreach ($db as $cat => $aaaa) {
    $categories += [$cat => false];
}

$selectionUtilisateur = false;

// prise en compte des categories demandees
if (isset($_GET["cat"])) {
    $selectionUtilisateur = true;
    $query = explode(',', $_GET["cat"]);
    foreach ($query as $item) {
        if (isset($categories["$item"])) {
            $categories[$item] = true;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Affichage des produits</title>
    <style>
        /* Style pour agrandir l'image au survol */
        .agrandie {
            transform: scale(3.0);
            transition: transform 0.3s ease;  /* petite transition*/
        }
    </style>
</head>
<body>

<style>
    .hidden {
        display: none;
    }
    .quantity-controls button {
        margin: 0 5px;
        cursor: pointer;
    }
</style>

<?php
// affichage du tableau
foreach ($db as $key => $element) {
    if (!$categories[$key] && $selectionUtilisateur)
        continue;

    // affichage du tableau
    echo "<h1>Catégorie $key</h1>";
    echo '<table border="1">
            <tr>
                <td class="photo">Photo</td>
                <td class="nom">Nom</td>
                <td class="reference">Reference</td>
                <td class="description">Description</td>
                <td class="prix">Prix</td>
                <td class="stock">Stock</td>
                <td class="quantite">Quantité commandée</td>
                <td class="ajouter">Ajouter au panier</td>
            </tr>';

    foreach ($element as $item) {
        // item : champ produit
        // elem : contenu
        echo "<tr>";
        foreach ($item as $spec => $desc) {
            echo "<td class='$spec'>";
            if ($spec == "photo") {
                echo "<img src='$desc' alt='$spec' width='200' height='auto'>";
            } else {
                echo "$desc";
            }
            echo "</td>";
        }
        // Quantity controls (plus and minus buttons)
        echo "<td class='quantite'>";
        echo "<div class='quantity-controls'>";
        echo "<button class='minus'>-</button>";
        echo "<span class='quantity' data-stock='{$item['stock']}'>0</span>";

        echo "<button class='plus'>+</button>";
        echo "</div>";
        echo "</td>";
        // Add to cart button
        echo "<td class='ajouter'><button disabled class='ajouter' onclick='addToCart(" . $item['reference'] . ", " . $item['stock'] . ")' >Ajouter au panier</button></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>


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


    function addToCart(reference, stock) {
        var quantitySpan = document.querySelector('.quantity');
        var quantity = parseInt(quantitySpan.textContent);

        // Check quantity
        if (quantity > 0 && quantity <= stock) {
            window.location.href = "php/panier.php?ref=" + reference + "&quantite=" + quantity;
        } else {
            alert("Invalid quantity!");
        }
    }


</script>

</body>
</html>

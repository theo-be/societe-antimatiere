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
        if (isset($categories["$item"]))
            $categories[$item] = true;
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
            transform: scale(4.0);
            transition: transform 0.3s ease;  /* petite transition*/
        }
    </style>
</head>
<body>

<?php
// affichage du tableau
foreach ($db as $key => $element) {
    if (!$categories[$key] && $selectionUtilisateur)
        continue;
    // key : categorie
    // element : produit
    echo "<h1>Catégorie $key</h1>";
    echo '<table border="1">
            <tr>
                <td class="photo">Photo</td>
                <td class="nom">Nom</td>
                <td class="reference">Reference</td>
                <td class="description">Description</td>
                <td class="prix">Prix</td>
                <td class="stock">Stock</td>
            </tr>';

    foreach ($element as $item) {
        // item : champ produit
        // elem : contenu
        echo "<tr>";
        foreach ($item as $spec => $desc) {
            echo "<td class='$spec'>";
            if ($spec == "photo") {
                echo "<img src='$desc' alt='$spec' >";
            } else {
                echo "$desc";
            }
            echo "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}

?>

<button id="afficher">Afficher</button>

<script>
    document.getElementById("afficher").addEventListener("click", (e) => {
        var stocks = document.getElementsByClassName("stock");
        for (var i = 0; i < stocks.length; i++) {
            if (stocks[i].style.display == "none") {
                stocks[i].style.display = "inline";
            } else {
                stocks[i].style.display = "none";
            }
        }
    });

    // Fonction pour agrandir chaque image individuellement au survol
    var images = document.querySelectorAll('.photo img');
    images.forEach(function(image) {
        image.addEventListener('mouseenter', function() {
            this.classList.add('agrandie'); // Ajoute la classe pour agrandir l'image au survol
        });

        image.addEventListener('mouseleave', function() {
            this.classList.remove('agrandie'); // Retire la classe pour réduire l'image à sa taille normale
        });
    });
</script>

</body>
</html>

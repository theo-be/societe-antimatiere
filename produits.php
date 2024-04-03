<?php

    session_start();
    require_once "php/varSession.inc.php";



    $categories = [];
    $categories["test"] = false;
    foreach ($_SESSION["bdd"] as $cat => $aaaa) {
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

<!doctype html>
<html>
<head></head>
<body>




<?php

    // affichage du tableau

    foreach ($_SESSION["bdd"] as $key => $element) {
        if (!$categories[$key] && $selectionUtilisateur)
            continue;
    // key : categorie
    // element : produit
        echo "<h1>categorie $key</h1>";
        echo '<table border="1">
                <tr>
                <td class="photo">Photo</td>
                <td class="nom">Nom</td>
                <td class="reference">Reference</td>
                <td class="description">Description</td>
                <td class="prix">Prix</td>
                <td class="stock">Stock</td>
                </tr>
                ';

        foreach ($element as $item) {
            // item : champ produit
            // elem : contenu
            echo "<tr>";
            foreach ($item as $spec => $desc) {
                
                echo "<td class='$spec'>";
                if ($spec == "photo") echo "<img src='$desc' alt='$spec'>";
                else echo "$desc";
                echo "</td>";
            }
            echo "</tr>";
        }




        echo "</table>";
        }






    echo "</table>";


?>

    <button id="afficher">afficher</button>


<script>
document.getElementById("afficher").addEventListener("click", (e) => {
    let stocks = document.getElementsByClassName("stock");
    if (stocks[0].style.display === "none") {
        for (let i = 0; i < stocks.length; i++) {
            stocks[i].style.display = "inline";
        }
    }
    else {
        for (let j = 0; j < stocks.length; j++) {
            stocks[j].style.display = "none";
        }
    }
})
</script>

</body>
</html>

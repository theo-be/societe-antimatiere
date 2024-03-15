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

<!doctype html>
<html>
<head></head>
<body>




<?php

    // affichage du tableau

    foreach ($db as $key => $element) {
        if (!$categories[$key] && $selectionUtilisateur)
            continue;
    // key : categorie
    // element : produit
        echo "<h1>categorie $key</h1>";
        echo "<table border='1'>
    <tr>
    <td>Photo</td>
    <td>Reference</td>
    <td>Description</td>
    <td>Prix</td>
    <td>Stock</td>
    </tr>
    ";

        foreach ($element as $item) {
            // item : champ produit
            // elem : contenu
            echo "<tr>";
            foreach ($item as $desc) {
                echo "<td>$desc</td>";
            }
            echo "</tr>";
        }




        echo "</table>";
        }






    echo "</table>";


?>

</body>
</html>

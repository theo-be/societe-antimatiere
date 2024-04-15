<?php

session_start();
require_once "varSession.inc.php";
require_once "header_footer.php";
template_header("Détail du produit");
?>



<?php

if (!isset($_GET) || !isset($_GET["id"])) {
    // erreur dans l'url
    echo "Aucun produit sélectionné";
} else {
    $id = $_GET["id"];
    $db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', 'cytech0001', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

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
        ?>
        <script src="../js/script.js"></script>
        <div class="product">
            <img src="../img/<?= $photo ?>" width="500" height="500" alt="<?= $nom ?>">
            <div>
                <h1 class="nom"><?= $nom ?></h1>
                <span class="prix">
                <?= $prix ?>&euro;
                </span>
                <form action="panier.php" method="post">


                    <!-- Boutons +/- -->
                    <div class="quantity-control">
                        <button type="button" class="decrement-btn">-</button>
                        <input type="text" name="quantite" value="1" class="quantity-field" data-stock="<?= $stock ?>" readonly>
                        <button type="button" class="increment-btn">+</button>
                    </div>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <!--Stock -->
                    <div class="stock">
                        <input type="hidden" id="stock" value="<?= $stock ?>" readonly>
                        <button type="button" class="stock-btn" onclick="show_stock()">Voir le stock</button>
                    </div>
                    <input class="ajouter-panier-btn" type="submit" value="Ajouter au panier">
                </form>
                <div class="description">
                    <?= $description ?>
                </div>
            </div>
        </div>



        <?php
    } else {
        // erreur dans l'id dans l'url
        echo "Aucun produit valide avec cette référence";
    }
}

template_footer();

?>
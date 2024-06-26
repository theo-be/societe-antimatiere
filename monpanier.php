<?php

session_start();
require_once "php/varSession.inc.php";
require_once "php/header_footer.php";
template_header("Panier");

$_SESSION["page"] = $_SERVER["REQUEST_URI"];

?>

    <div class="panier-box">
        <h1>Votre panier</h1>
        <form id="commandeForm" action="php/gestion_commande.php" method="post">
            <table class="panier">
                <thead>
                <tr>
                    <td colspan="2">Photo</td>
                    <td>Nom</td>
                    <td>Reference</td>
                    <td>Description</td>
                    <td>Prix</td>
                    <td colspan="2">Quantité</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $total = 0.0;
                // affichage du panier
                if (count($_SESSION["panier"]) == 0) {
                    echo "<tr><td colspan='7' style='text-align:center'>Votre panier est vide</td></tr>";
                } else {
                    $db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                    foreach ($_SESSION["panier"] as $item) {
                        $requete = $db->prepare("select * from produit where id=?");
                        $requete->execute(array($item["id"]));
                        $resultat = null;
                        if ($resultat = $requete->fetch()) {
                            echo "<tr>
                                   <td class='photo' colspan='2'><img src='img/" . $resultat["photo"] . "' alt='" . $resultat["nom"] . "' width='50' height='50'></td>
                                   <td class='nom'>" . $resultat["nom"] . "</td>
                                    <td class='reference'>" . $resultat["id"] . "</td>
                                    <td class='description'>" . $resultat["text_description"] . "</td>
                                    <td class='prix'>" . $resultat["prix"] . "</td>
                                    <td class='qt'>" . $item["quantite"] . "</td>
                                    <td><a href='php/supprimer_panier.php?id=" . $resultat['id'] . "' onmouseover='changeImage(this)' onmouseout='restoreImage(this)'><img src='img/bin.png' title='supprimer du panier' alt='poubelle' width='30' height='30' class='image-bin'></a></td>
                                  </tr>";

                            //calcul total
                            $total += $resultat["prix"] * $item["quantite"];
                        }
                        $requete->closeCursor();
                    }
                }
                ?>
                </tbody>
            </table>

            <?php if (count($_SESSION["panier"]) > 0): ?>
                <div class="total">
                    <span class="text">Total</span>
                    <span class="prix"><?=$total?>&euro;</span>
                </div>
                <?php
                if ($_SESSION["compte"]):
                    ?>

                    <button type="submit" class="valider-commande-btn">Valider la commande</button>
                <?php else:
                    ?>
                    <a href="connexion.php" class="valider-commande-btn">Veuillez vous connecter pour passer la commende</a>
                <?php endif; ?>

            <?php endif; ?>
        </form>
    </div>



<?=template_footer()?>


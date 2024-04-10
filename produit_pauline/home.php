<?php
include_once 'index.php';
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM produit ORDER BY id');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?=template_header('Home')?>
<!--
<div class="featured">
    <h2>Gadgets</h2>
    <p>Essential gadgets for everyday use</p>
</div>
-->
<div class="recentlyadded content-wrapper">
    <h2>Recently Added Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $produit): ?>
            <a href="index.php?page=product&id=<?=$produit['id']?>" class="produit">
                <img src="icon.png" width="200" height="200" alt="<?=$produit['nom']?>">
                <span class="nom"><?=$produit['nom']?></span>
                <span class="prix">
                <?=$produit['prix']?>&euro;
                    <?php if ($produit['quantite_en_stock'] > 0): ?>
                        <span class="quantite_en_stock"><?=$produit['quantite_en_stock']?></span>
                    <?php endif; ?>
            </span>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>

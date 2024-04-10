<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM produit WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>





<?=template_header('Product')?>

<div class="product content-wrapper">
    <img src="icon.png" width="500" height="500" alt="<?=$product['nom']?>">
    <div>
        <h1 class="nom"><?=$product['nom']?></h1>
        <span class="prix">
            <?=$product['prix']?>&euro;
            <?php /* if ($product['quantite_en_stock'] > 0): */ ?>
                <!-- <span class="quantite_en_stock"><?=$product['quantite_en_stock']?></span> -->
            <?php /* endif; */ ?>
        </span>
        <form action="index.php?page=panier" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantite_en_stock']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description">
            <?=$product['text_description']?>
        </div>
    </div>
</div>

<?=template_footer()?>

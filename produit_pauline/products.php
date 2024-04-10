
<?php
// The amounts of products to show on each page
$num_products_on_each_page = 5;
// The current page - in the URL, will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;

// Category ID - you need to replace this with the actual category ID you want to display products for
$category_id = isset($_GET['id_categorie']) && is_numeric($_GET['id_categorie']) ? (int)$_GET['id_categorie'] : null;

// Select products based on the category ID
if ($category_id !== null) {
    $stmt = $pdo->prepare('SELECT * FROM produit WHERE id_categorie = ? ORDER BY id LIMIT ?,?');
    $stmt->bindValue(1, $category_id, PDO::PARAM_INT);
} else {
    // Select all products if no category ID is specified
    $stmt = $pdo->prepare('SELECT * FROM produit ORDER BY id LIMIT ?,?');
}

// bindValue will allow us to use an integer in the SQL statement, which we need to use for the LIMIT clause
$stmt->bindValue($category_id !== null ? 2 : 1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue($category_id !== null ? 3 : 2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of products
if ($category_id !== null) {
    // If filtering by category, get the total number of products for that category
    $total_products = $pdo->prepare('SELECT * FROM produit WHERE id_categorie = ?');
    $total_products->bindValue(1, $category_id, PDO::PARAM_INT);
    $total_products->execute();
    $total_products = $total_products->rowCount();
} else {
    // If no category filtering, get the total number of all products
    $total_products = $pdo->query('SELECT * FROM produit')->rowCount();
}
?>




<?=template_header('Products')?>

<div class="products content-wrapper">
    <h1>Products</h1>
    <div class="products-wrapper">
        <?php foreach ($products as $product): ?>
            <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
                <img src="icon.png" width="200" height="200" alt="<?=$product['nom']?>">
                <span class="name"><?=$product['nom']?></span>
                <span class="prix">
                <?=$product['prix']?>&euro;
                </span>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>



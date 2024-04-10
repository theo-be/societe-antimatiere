<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = 'cytech0001';
    $DATABASE_NAME = 'antimaterDimension';
    try {
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
        // If there is an error with the connection, stop the script and display the error.
        exit('Failed to connect to database!');
    }
}


// Template header, feel free to customize this
function template_header($title) {
    // Get the number of items in the shopping cart, which will be displayed in the header.
    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="stylesheet.css" rel="stylesheet" type="text/css">
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <img src="icon.png" width="15%" alt="Logo du site" id="logo">
                <h1>Societe Antimatiere</h1>
                <nav>
                    <a href="index.php">Accueil</a>
                    <a href="index.php?page=products&id_categorie=1">Celestial</a>
                    <a href="index.php?page=products&id_categorie=2">Glyphe</a>
                </nav>
                <div class="link-icons">
                    <a href="index.php?page=panier">
                    <img src="cart.png" width="10%" alt="cart" class="cart">
						<span>$num_items_in_cart</span>
					</a>
                </div>
                <!-- Espace de connexion -->
                <a href="#" class="connexion">Se connecter</a>
            </div>
        </header>
        <!-- Menu horizontal -->
    <table class='menu'>
      <tr href="#" class="side"><td><a class="sideecrit" >Accueil</a></td></tr>
      <tr href="#" class="side"><td><a class="sideecrit" >Celestial</a></td></tr>
      <tr href="#" class="side"><td><a class="sideecrit" >Glyphe</a></td></tr>
    </table>
        <main>
EOT;
}
// Template footer
function template_footer() {
    $year = date('Y');
    echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; $year, Societe Antimatiere</p>
            </div>
        </footer>
    </body>
</html>
EOT;
}
?>
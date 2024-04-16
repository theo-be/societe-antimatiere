<?php


function template_header($title) {

    $num_items_in_cart = isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0;

    echo <<<EOT

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>$title</title>
    
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/panier.css">
    <link rel="stylesheet" type="text/css" href="../css/header_footer.css">
    <link rel="stylesheet" type="text/css" href="../css/produits.css">
    <link rel="stylesheet" type="text/css" href="../css/formulaire.css">
    <link rel="stylesheet" type="text/css" href="../css/produit.css">
    <meta name="description" content="">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
</head>


<body>
<header role="banner">
    <div class="banner">
    <div class="logotitre">
        <img src="../img/icon.png" alt="Logo du site" width="100" height="50" id="logo">
        <h1 id="title">Société Antimatiere</h1>
    </div>
    </div>



    <div class="bandeauvert"></div>
        <!-- Menu horizontal -->
        <table class='menu'>
            <tr class="side"><td><a href="accueil.php" class="sideecrit">Accueil</a></td></tr>
            <tr class="side"><td><a href="produits.php" class="sideecrit">Catalogue</a></td></tr>
             <tr class="side"><td><a href="produits.php?cat=Celestial" class="sideecrit">Célestial</a></td></tr>
            <tr class="side"><td><a href="produits.php?cat=Glyphe" class="sideecrit">Glyphe</a></td></tr>
            <tr class="side"><td><a href="produits.php?cat=Sticker" class="sideecrit">Sticker</a></td></tr>
            <tr class="side"><td><a href="contact.php" class="sideecrit">Contact</a></td></tr>

        </table>
EOT;

    // Vérifie si l'utilisateur est connecté
    if (isset($_SESSION['compte']) && $_SESSION["compte"] === true) {
        // Si connecté, affiche le nom du compte et le bouton de déconnexion
        echo "<div>";
        echo "<a class='inscription' title='" . $_SESSION["id"] . "'>" . $_SESSION["id"] . "</a>";
        echo "<a href='deconnexion.php' class='connexion'>Se déconnecter</a>";
        echo "</div>";
    } else {
        // Si non connecté, affiche les boutons d'inscription et de connexion
        echo "<div>";
        echo "<a href='inscription.php' class='inscription'>S'inscrire</a>";
        echo "<a href='connexion.php' class='connexion'>Se connecter</a>";
        echo "</div>";
    }

    echo <<<EOT


      
    <div class="panier">
         <a href="monpanier.php">
         <img src="https://purepng.com/public/uploads/large/purepng.com-shopping-cartshoppingcarttrolleycarriagebuggysupermarkets-1421526532356pnf5n.png" alt="Panier" class="cart" width="40" height="40" id="panier">
         <span>$num_items_in_cart</span>
		</a>
    </div>

</header>
<main>
EOT;
}

function template_footer() {
    echo <<<EOT
        </main>
        <div class="container">
            <div class="boundary"></div>
            <footer class="foot">
                <div class="footcontenu">
                    <p>Copyright Société Antimatiere</p>
                    <p>Contact : 06.55.50.50.55</p>
                    <a href="https://discord.gg/ZFbejANc"><img src="https://i.pinimg.com/736x/b6/fe/4a/b6fe4a830e0263d8344b63e3dbcf3033.jpg" alt="discord" height="50" width="50" href="#" id="contact"></a>
                    <a href="https://github.com/theo-be/societe-antimatiere/tree/main"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSu7esomngrloanUN5V-4X2Rk9P4W2EcXLN-hGNWwHsOw&s" alt="Logo du site" width="50" height="50" id="logo"></a>
                </div>
            </footer>
        </div>
</body>

</html>
EOT;
}

?>
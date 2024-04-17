<?php





if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["init"])) {
    $_SESSION["init"] = true;
    $_SESSION["panier"] = [];
    $_SESSION["contact_ok"] = true;
    $_SESSION["compte"] = false;
    $_SESSION["id"] = null;
    $_SESSION["page"] = $_SERVER["REQUEST_URI"];
    $_SESSION["errors"] = [];


    // si l'utilisateur a choisi "rester connecte"
    if (isset($_COOKIE["id"])) {
        require_once "bdd.php";
        if (connexion_cookie($_COOKIE["id"], $_COOKIE["mdp"])) {
            $_SESSION["compte"] = true;
            $_SESSION["id"] = htmlspecialchars($_COOKIE["id"]);
        }
    }


}


?>




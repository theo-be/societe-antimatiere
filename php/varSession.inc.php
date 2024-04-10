<?php




if (!isset($_SESSION)) {
    session_start();
    echo "pas de session";
}

if (!isset($_SESSION["init"])) {
    echo "session pas init";
    $_SESSION["init"] = true;
    $_SESSION["tabcategories"] = null;
    $_SESSION["panier"] = [];
    $_SESSION["contact_ok"] = true;
    $_SESSION["compte"] = false;
    $_SESSION["id"] = null;
    
}

?>




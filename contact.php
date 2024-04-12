
<?php
session_start();
require_once "php/varSession.inc.php";
require_once "php/header_footer.php";

template_header("Contact");

?>



<!-- partie principale + menu
<div class="sidemenu">
    <nav>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li>Nos produits</a></li>
            <li><a href="#">Générateurs d'Antimatière</a></li>
            <li><a href="#">Améliorations Dimensionnelles</a></li>
            <li><a href="#">Dispositifs de Manipulation Temporelle</a></li>
        </ul>
    </nav>
</div> -->
<?php
//    var_dump($_SESSION);
    if ($_SESSION["contact_ok"] === true) {
        require_once "php/formulaire_contact.php";
//        echo "contact_ok : " . $_SESSION["contact_ok"] . "<br>";
    } else {
        require_once "php/formulaire_contact_prerempli.php";
//        echo "contact_ok : " . $_SESSION["contact_ok"] . "<br>";
    }
//    var_dump($_SESSION["formulaire_contact"]);
?>
<!--<script src="js/app.js"></script>-->


<?=template_footer()?>
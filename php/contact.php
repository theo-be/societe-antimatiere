
<?php
session_start();
require_once "varSession.inc.php";
require_once "header_footer.php";

template_header("Contact");

?>


<?php
//    var_dump($_SESSION);
    if ($_SESSION["contact_ok"] === true) {
        require_once "formulaire_contact.php";
//        echo "contact_ok : " . $_SESSION["contact_ok"] . "<br>";
    } else {
        require_once "formulaire_contact_prerempli.php";
//        echo "contact_ok : " . $_SESSION["contact_ok"] . "<br>";
    }
//    var_dump($_SESSION["formulaire_contact"]);
?>
<!--<script src="js/app.js"></script>-->


<?=template_footer()?>
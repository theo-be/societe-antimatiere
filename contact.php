
<?php
session_start();
require_once "php/varSession.inc.php";
require_once "php/header_footer.php";

template_header("Contact");

?>


<?php
if ($_SESSION["contact_ok"] === true) {
    require_once "php/formulaire_contact.php";
} else {
    require_once "php/formulaire_contact_prerempli.php";
}
?>


<?=template_footer()?>
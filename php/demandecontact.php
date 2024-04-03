<?php

    session_start();
    require_once "varSession.inc.php";

    /*
     * a faire
     *
     * ajax et panier
     * comptes et personnes connectees
     * bdd
     */


    $_SESSION["contact_ok"] = true;

    $form_content_keys = array("nom", "prenom", "email", "genre", "date_naissance", "fonction", "sujet", "contenu");

    $diff = array_diff($form_content_keys, array_keys($_POST));

    // verifie que l'on a toutes les valeurs que l'on veut avoir, ni plus, ni moins
    if (count($diff) > 0 && count(array_merge($form_content_keys, $diff)) <= count($form_content_keys))
        $_SESSION["contact_ok"] = false;

    var_dump($_POST);
    echo "<br>";
    var_dump($diff);
    echo "<br>";

//    foreach ($_POST as $key => $element) {
//        if (!in_array($key, $form_content_keys)) {
//            $_SESSION["contact_ok"] = false;
//            $_SESSION["formulaire_contact"][$key] = "";
//
//        }
//    }

    $_SESSION["formulaire_contact"]["erreur"] = $diff;

    // verification de la presence des informations

    $_SESSION["formulaire_contact"] = array();



    // recuperation des informations de contact
    // on appelle array_merge au lieu de faire une affectation ou de faire array_push car si l'utilisateur renvoie un formulaire qui etait incorrect, alors les donnees sont remplacees

    $_SESSION["formulaire_contact"] = array_merge($_SESSION["formulaire_contact"], $_POST);
    $_SESSION["formulaire_contact"]["date_contact"] = date("Y-m-d");
/*    $_SESSION["formulaire_contact"]["nom"] = $_POST["nom"];
    $_SESSION["formulaire_contact"]["prenom"] = $_POST["prenom"];
    $_SESSION["formulaire_contact"]["email"] = $_POST["email"];
    $_SESSION["formulaire_contact"]["genre"] = $_POST["genre"];
    $_SESSION["formulaire_contact"]["date_naissance"] = $_POST["date_naissance"];
    $_SESSION["formulaire_contact"]["fonction"] = $_POST["fonction"];
    $_SESSION["formulaire_contact"]["sujet"] = $_POST["sujet"];
    $_SESSION["formulaire_contact"]["contenu"] = $_POST["contenu"];*/


    // on convertit les caractetes speciaux s'il y en a pour eviter des failles de securite
    foreach ($_SESSION["formulaire_contact"] as $elem) {
        $elem = htmlspecialchars($elem);
    }

    foreach ($_SESSION["formulaire_contact"]["erreur"] as $key) {
        $_SESSION["formulaire_contact"]["$key"] = "";
    }



    if (!preg_match("#^([0-9a-z]){3,}@([a-z]){2,}.([a-z]){2,4}$#i", $_POST["email"])) {
        // email invalide
        echo "email invalide<br>";
        $_SESSION["contact_ok"] = false;
        $_SESSION["formulaire_contact"]["email"] = "";
    }

    if (!preg_match("#[0-9]{4}(-[0-9]{2}){2}#", $_POST["date_naissance"])) {
        echo "date de naissance invalide<br>";
        $_SESSION["formulaire_contact"]["date_naissance"] = "";
        $_SESSION["contact_ok"] = false;
    }





    // si tout est bon, alors on envoie les donnees dans la bdd et on les libere de la session

    if ($_SESSION["contact_ok"] === true) {
        // preparation des scripts SQL
        // envoi vers la bdd

        $_SESSION["formulaire_contact"] = null;
        header("Location:../contact.php");
    }

    else {

        header("Location:../contact.php");
        var_dump($_SESSION["formulaire_contact"]);
    }
    // sinon on renvoie l'utilisateur vers le formulaire


echo "<br><br> ok :" . $_SESSION['contact_ok'];

?>

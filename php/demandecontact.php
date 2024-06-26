<?php

    session_start();
    require_once "varSession.inc.php";



    $_SESSION["contact_ok"] = true;

    $clef_dans_formulaire = array("nom", "prenom", "email", "genre", "date_naissance", "fonction", "sujet", "contenu");

    $diff = array_diff($clef_dans_formulaire, array_keys($_POST));

    // verifie que l'on a toutes les valeurs que l'on veut avoir, ni plus, ni moins
    if (count($diff) > 0 && count(array_merge($clef_dans_formulaire, $diff)) <= count($clef_dans_formulaire))
        $_SESSION["contact_ok"] = false;

    $_SESSION["formulaire_contact"] = array();

    // verification de la presence des informations

    // recuperation des informations de contact
    // on appelle array_merge au lieu de faire une affectation ou de faire array_push car si l'utilisateur renvoie un formulaire qui etait incorrect, alors les donnees sont remplacees

    $_SESSION["formulaire_contact"] = array_merge($_SESSION["formulaire_contact"], $_POST);
//    $_SESSION["formulaire_contact"]["date_contact"] = date("Y-m-d");

    $_SESSION["formulaire_contact"]["erreur"] = $diff;

    foreach ($_SESSION["formulaire_contact"]["erreur"] as $key) {
        $_SESSION["formulaire_contact"]["$key"] = "";
    }

    // on convertit les caractetes speciaux s'il y en a pour eviter des failles de securite
    foreach ($clef_dans_formulaire as $key) {
        $_SESSION["formulaire_contact"][$key] = htmlspecialchars($_SESSION["formulaire_contact"][$key]);
    }

    if (!preg_match("#^([0-9a-z.]){3,}@([a-z]){2,}.([a-z]){2,}$#i", $_POST["email"])) {
        // email invalide
        $_SESSION["contact_ok"] = false;
        $_SESSION["formulaire_contact"]["email"] = "";
    }

    if (!preg_match("#[0-9]{4}(-[0-9]{2}){2}#", $_POST["date_naissance"])) {
        $_SESSION["formulaire_contact"]["date_naissance"] = "";
        $_SESSION["contact_ok"] = false;
    }

    // si tout est bon, alors on envoie les donnees dans la bdd et on les libere de la session

    if ($_SESSION["contact_ok"] === true) {
        // preparation des scripts SQL
        // envoi vers la bdd

        $db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $idcompte = 0;
        $requeteidcomptetexte = file_get_contents("../sql/id_depuis_compte.sql");
        $requeteidcompte = $db->prepare($requeteidcomptetexte);
        $requeteidcompte->execute([$_SESSION["id"]]);
        if ($id = $requeteidcompte->fetch())
            $idcompte = $id["id"];

        $requeteidcompte->closeCursor();

        $requetetexte = file_get_contents("../sql/ajout_client.sql");
        $requete = $db->prepare($requetetexte);
        $requete->execute(array(
            $_SESSION["formulaire_contact"]["nom"],
            $_SESSION["formulaire_contact"]["prenom"],
            $_SESSION["formulaire_contact"]["email"],
            $_SESSION["formulaire_contact"]["genre"],
            $_SESSION["formulaire_contact"]["fonction"],
            $_SESSION["formulaire_contact"]["date_naissance"],
            $_SESSION["formulaire_contact"]["sujet"],
            $_SESSION["formulaire_contact"]["contenu"],
            $idcompte
        ));

        $requete->closeCursor();

        $_SESSION["formulaire_contact"] = null;
        header("Location:../contact.php");
    }

    else {

        header("Location:../contact.php");
    }
    // sinon on renvoie l'utilisateur vers le formulaire


echo "<br><br> ok :" . $_SESSION['contact_ok'];

?>

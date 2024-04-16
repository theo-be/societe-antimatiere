<?php


function connexion ($pseudo, $mdp, $resterconnecte): bool
{

//    $requetetext = file_get_contents("sql/BDD recuperation mdp");
    $db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', 'cytech0001', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $requete = $db->prepare("SELECT mdp FROM compte WHERE pseudo=?");
    $requete->execute(array($pseudo));

    if (!($c = $requete->fetch())) {
        return false;
    }
    $requete->closeCursor();
    if (password_verify($mdp, $c["mdp"])) {
        if ($resterconnecte) {
            // creation d'un cookie qui dure quatre semaines
            setcookie("id", $pseudo, time() + 60 * 60 * 24 * 28, '/', null, false, true);
            // stockage du mot de passe crypte afin d'eviter les fuites de donnees
            setcookie("mdp", $c["mdp"], time() + 60 * 60 * 24 * 28, '/', null, false, true);
        }
        return true;
    }
    return false;
}

function connexion_cookie ($pseudo, $mdp): bool
{

//    $requetetext = file_get_contents("sql/BDD recuperation mdp");
    $db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', 'cytech0001', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $requete = $db->prepare("SELECT mdp FROM compte WHERE pseudo=?");
    $requete->execute(array($pseudo));

    if (!($c = $requete->fetch())) {
        return false;
    }
    $requete->closeCursor();
    if ($mdp == $c["mdp"]) {

        // creation d'un cookie qui dure quatre semaines
        setcookie("id", $pseudo, time() + 60 * 60 * 24 * 28, '/', null, false, true);
        // stockage du mot de passe crypte afin d'eviter les fuites de donnees
        setcookie("mdp", $mdp, time() + 60 * 60 * 24 * 28, '/', null, false, true);

        return true;
    }
    return false;
}

function inscription ($pseudo, $mdp, $resterconnecte): bool
{
    $db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', 'cytech0001', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    // verification de l'unicite du compte
    $verifrequete = $db->prepare("select id from compte where pseudo=?");
    $verifrequete->execute(array($pseudo));
    if ($verifrequete->fetch()) {
        return false;
    }

    // le compte n'existe pas alors on peut le creer

    $requete = $db->prepare("insert into compte (pseudo, mdp) values (?, ?)");

    $mdp_crypte = password_hash("$mdp", PASSWORD_DEFAULT);
    $requete->execute(array($pseudo, $mdp_crypte));

    $requete->closeCursor();

    if ($resterconnecte) {
        // creation d'un cookie qui dure quatre semaines
        setcookie("id", $pseudo, time() + 60 * 60 * 24 * 28, '/', null, false, true);
        // stockage du mot de passe crypte afin d'eviter les fuites de donnees
        setcookie("mdp", $mdp_crypte, time() + 60 * 60 * 24 * 28, '/', null, false, true);
    }
    return true;
}


function deconnexion (): void
{
    if (!isset($_SESSION))
        session_start();
    session_destroy();

    // que l'utilisateur choisisse "rester connecte" ou pas,
    // on cree un cookie qui sera automatiquement supprime
    // car la date d'expiration est inferieure a la date actuelle
    setcookie("id", '', time() - 1000, '/', null, false, true);
    setcookie("mdp", '', time() - 1000, '/', null, false, true);
}
<?php


function connexion ($pseudo, $mdp): bool
{

    $requetetext = file_get_contents("sql/BDD recuperation mdp");
    $db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $requete = $db->prepare("SELECT mdp FROM compte WHERE pseudo=?");
    $requete->execute(array($pseudo));

    if (!($c = $requete->fetch())) {
        return false;
    }
    $requete->closeCursor();
    if (password_verify($mdp, $c["mdp"])) {
        return true;
    }
    return false;
}

function inscription ($pseudo, $mdp): bool
{
    $db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

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
    return true;
}


function deconnexion (): void
{
    if (!isset($_SESSION))
        session_start();
    session_destroy();
}
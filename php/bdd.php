<?php


function connexion ($id, $mdp): bool
{

    $requetetext = file_get_contents("sql/BDD recuperation mdp");
    $db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $requete = $db->prepare("SELECT mdp FROM compte WHERE pseudo=?");
    $requete->execute(array($id));

    if (!($c = $requete->fetch())) {
        return false;
    }
    $requete->closeCursor();
    if (password_verify($mdp, $c["mdp"])) {
        return true;
    }
    return false;
}

function inscription ($id, $mdp): bool
{
    $db = new PDO('mysql:host=localhost;dbname=antimaterDimension', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $requete = $db->prepare("insert into compte (pseudo, mdp) values (?, ?)");

    $mdp_crypte = password_hash("$mdp", PASSWORD_DEFAULT);
    $requete->execute(array($id, $mdp_crypte));

//    $c = null;
//    foreach ($dbc as $compte) {
//        if ($compte["id"] == $id) {
//            $c = $compte;
//            break;
//        }
//    }
//
//    if ($c != null) {
//        // le compte existe deja
//        return false;
//    }

//    $dbc[] = ["id" => "$id", "mdp" => password_hash("$mdp", PASSWORD_DEFAULT)];
//
//    $dbctext = json_encode($dbc, JSON_PRETTY_PRINT);
//    file_put_contents("dbcompte.json", $dbctext);


    return true;
}


function deconnexion () {
    if (!isset($_SESSION))
        session_start();
    session_destroy();
}
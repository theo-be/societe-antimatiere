<?php

session_start();
require_once "varSession.inc.php";
require_once "bdd.php";

deconnexion();
header("Location:../accueil.php");
?>
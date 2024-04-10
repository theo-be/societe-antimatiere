<?php

session_start();
require_once "php/varSession.inc.php";
require_once "php/bdd.php";

deconnexion();
header("Location:../index.php");
?>
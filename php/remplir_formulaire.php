<?php

if (!isset($_SESSION["init"]) or $_SESSION["contact_ok"] === true) {
    // on n'a pas besoin de cette fonction
}
function remplir_formualire ($key) {
    if ($_SESSION["formulaire_contact"]["$key"] == "")
        return "class='red'";
    else return "value=\"" . $_SESSION['formulaire_contact'][$key] . "\"";
}

function remplir_formulaire_genre ($genre) {
    return ($_SESSION["formulaire_contact"]["genre"] == "$genre") ? 'checked="checked"' : "";
}

function remplir_formulaire_fonction ($fonction) {
    return ($_SESSION["formulaire_contact"]["fonction"] == "$fonction" ? 'selected="selected"' : "");
}
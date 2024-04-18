<?php
session_start();

require_once "php/varSession.inc.php";

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <title>societe antimatiere</title>
</head>


<body>

<div class="logo-box">
    <img src="img/icon.png" alt="Logo du site" width="250" height="125" id="logo">
    <h1 id="title">Société Antimatiere</h1>
</div>

<div class="index-box">
    <div id="Progress_Status">
        <div id="myprogressBar">1%</div>
    </div>
    <br>
    <button onclick="update()" class="submit">Visiter le site</button>
</div>
<script>

    function update() {
        var element = document.getElementById("myprogressBar");
        var width = 1;
        var identity = setInterval(scene, 10);

        function scene() {
            if (width >= 100) {
                clearInterval(identity);
                window.location.href = "produits.php";
            } else {
                width++;
                element.style.width = width + '%';
                element.innerHTML = width * 1  + '%';
            }
        }
    }


</script>

</body>
</html>

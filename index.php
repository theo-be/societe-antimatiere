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

    <title>societe antimatiere</title>
</head>

<style>
    body{
        font-family: 'Inter', sans-serif;
        background-image: url('img/dark-bg.png');
        background-size: cover; /* Optional: Adjust the size of the background */
        background-position: center; /* Center the background image */
        margin: 0; /* Optional: Remove default body margin */
        padding: 0;
        text-align: center;
        color: white;
    }

    h1{
        font-family: , Serif, serif;
        font-size: xx-large;
    }

    .index-box{
        margin:200px ;
    }

    #Progress_Status {
        display: block;
        margin: 0 auto;
        width: 50%;
        background-color: #000;
    }

    #myprogressBar {
        width: 1%;
        height: 35px;
        background-color: #4CAF50;
        text-align: center;
        line-height: 32px;
        color: white;
    }

    .submit{
        font-size: large;
        border: 1px solid green;
        background-color: black;
        color:white;
        padding:10px;
        transition:200ms;
    }

    .submit:hover{
        background-color: green;
        color:black;
    }

</style>
<body>

<div class="index-box">
<h1>Cliquer pour visiter le site de vente en ligne de la Societé Antimatiere</h1>

<img src="img/1.png" width="200px">

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
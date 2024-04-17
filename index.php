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
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <title>societe antimatiere</title>
</head>

<style>
    body{
        overflow: hidden;
        font-family: 'Inter', sans-serif;
        background-image: url('img/stars-bg.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        margin: 0;
        padding: 0;
        text-align: center;
        color: white;
    }



    .logo-box {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 10%;
        left: 0;
        right: 0;
        width: 100%;
        font-size: 30px;
    }

    .index-box{
        top : 50vh;
        margin: 0 auto;
        position: relative;

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
        background-color: green;
        text-align: center;
        line-height: 32px;
        color: white;
    }

    .submit{
        margin: 20px;
        font-size: large;
        border: 1px solid green;
        background-color: black;
        color:white;
        padding:10px;
        transition:200ms;
    }

    .submit:hover{
        box-shadow: 0 0 20px 10px darkgreen;
        background-color: green;
        color:black;
    }

</style>
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

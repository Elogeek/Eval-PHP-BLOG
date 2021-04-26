<?php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title><?= $title ?></title>
</head>
<body>
<?= $html ?>
<div id="container">

    <div>
        <img src="/assets/img/logo.png" alt="mon super logo" id="logo">
    </div>
    <div id="cercle"></div>
    <div id="info">

       <span id="span1">Welcome !</span>
       <p id="p1">
           Bienvenue sur mon blog culinaire !<br>
           Ici, vous avez toutes les dernières actualités culinaires !<br>
           Vous pouvez aussi partager vos idées, vos envies... <br>
            Et oui, le gras c'est la vie ! :D
       </p

    </div>
    <button type="submit" id="btnInfo"> Ajouter un article </button>
    <div id="img2"></div>
    <div id="img1"></div>


</div>
<script src="/assets/js/app.js"></script>
</body>
</html>
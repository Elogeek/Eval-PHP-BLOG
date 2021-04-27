<?php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://kit.fontawesome.com/e3ddf954eb.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<div id="container">

    <div>
        <img src="/assets/img/logo.png" alt="mon super logo" id="logo">
    </div>
    <div id="cercle"></div>
    <div id="div1">
       <p id="p1">
           <title><?= $title ?></title>
           <?= $html ?>
       </p
    </div>

    <div id='btnAddArticle'>
        <!--add a here-->
        <button type="submit"> Ajouter un article </button>
    </div>
    <div id="img2"></div>


</div>
<script src="/assets/js/app.js"></script>
</body>
</html>
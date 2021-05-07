<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://kit.fontawesome.com/e3ddf954eb.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title><?= $title ?></title>
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

        <!--article-->
        <div class="article">
            <div id='btnAddArticle'>
                <!--add a here-->
                <button type="submit" id="addArticle"> Ajouter un article </button>
            </div>
        </div>
        <!--design image-->
        <div id="img2"></div>
        <div id="img3"></div>
        <div id="img4"></div>
        <div id="img5"></div>

        <div id="divComment">
            <textarea name="content" id="contentComment" placeholder=" Entrez votre commentaire ici ! "
                      cols="50" rows="5" style="padding: 1%"></textarea>
            <button type="submit" id="btnComment"> Envoyer !</button>
        </div>

        <!--animation btn share-->
        <div class="containerShare">
            <div class="btnShare">Share</div>
            <div class="social twitter"><i class="fa fa-twitter"></i></div>
            <div class="social facebook"><i class="fa fa-facebook"></i></div>
            <div class=" social google"><i class="fa fa-google-plus"></i></div>
            <div class="social youtube"><i class="fa fa-youtube"></i></div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg">
            <defs>
                <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="8" result="blur" />
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                    <feBlend in="SourceGraphic" in2="goo" />
                </filter>
            </defs>
        </svg>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/assets/js/app.js"></script>
</body>

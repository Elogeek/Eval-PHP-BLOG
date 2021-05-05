
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



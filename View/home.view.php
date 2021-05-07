<h1>Bienvenue sur ma page acceuil !</h1>
<span>Welcome <?= $var['user'] ?></span>

<div>
    <a href="/index.php?controller=articles">Consulter la liste de nos articles</a>
</div>

<?php if(isset($_SESSION['role']) && $_SESSION['role'] === "admin") {?>
    <div id="buttonAdmin">
        <a href="../index.php?controller=articles&action=new"><button>Nouvelle article</button></a>
        <a href="../index.php?controller=articles&action=update"><button>Modifier un article</button></a>
    </div>
<?php }
if(isset($_GET['action']) && $_GET['action'] == "readAll") {
    ?>
    <h1>Liste des articles!</h1>
    <?php
}
else {
    ?>

    <h1>Les derniers articles!</h1>

    <?php
}

if(isset($var['articles'])) {
    foreach ($var['articles'] as $article) {?>
        <div class="articleDiv">
            <a href="../index.php?controller=articles&action=read&article=<?= $article->getId()?>">
                <div class="articleHome">
                    <h3><?= $article->getTitle()?></h3>
                    <p><?= $article->getContent()?></p>
                    <p><?= $article->getAuthorFk()?></p>
                </div>
            </a>
        </div>
        <?php
    }
}
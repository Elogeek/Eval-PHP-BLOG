<?php
?>
<h2>Nouveau article</h2>
<div class="form-content">
    <form action="" method="post">
        <div>
            <label for="title"></label>
            <textarea name="title" id="title" required  placeholder="Titre de l'article"></textarea>
        </div>
        <textarea name="content" id="content" cols="30" rows="20" placeholder="Contenu de l'article"></textarea>
        <!-- Fake utilisateur pour rapidement démontrer le concept. -->
        <!-- ID 2 => John Doe en BDD -->
        <input type="hidden" name="user" value="<?= $var["user"]->getId() ?>>">
        <input type="submit" value="Ajouter article">
    </form>
</div>
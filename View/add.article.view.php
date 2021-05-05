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
        <input type="text" name="user" value="2"> <!-- ID 1 => John Doe en base de données. -->
        <input type="submit" value="Ajouter article">
    </form>
</div>
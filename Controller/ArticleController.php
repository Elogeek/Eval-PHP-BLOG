<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;
use Model\Entity\Article;
use Model\Manager\ArticleManager;
use Model\User\UserManager;

class ArticleController {

    use RenderViewTrait;

    private ArticleManager $articleManager;
    private UserManager $userManager;

    public function __construct() {
        $this->articleManager = new ArticleManager();
        $this->userManager = new UserManager();
    }


    /**
     * Affiche la liste des articles disponibles.
     */
    public function articles() {
        $manager = new ArticleManager();
        $articles = $manager->getAll();

        $this->render('articles', 'Mes articles', [
            'articles' => $articles,
        ]);
    }

    /**
     * add new article
     */
    public function addArticle($fields){
        if(isset($fields['content'], $fields['user'])) {
            // Alors ca veut dure que le formulaire a été envoyé.
            $userManager = new UserManager();
            $articleManager = new ArticleManager();

            $content = htmlentities($fields['content']);
            $user_fk = intval($fields['user']);

            $user = $userManager->getById($user_fk);
            if($user->getId()) {
                $article = new Article($title,$content, $user, $author);
                $articleManager->add($article);
            }
        }

        $this->render('add.article', 'Ajouter un article');
    }
}
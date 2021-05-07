<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;
use Model\Entity\Article;
use Model\Entity\Comment;
use Model\Manager\ArticleManager;
use Model\Manager\CommentaryManager;

class ArticleController
{

    use RenderViewTrait;

    /**
     *  all article
     */
    public function articles()
    {
        $manager = new ArticleManager();
        $articles = $manager->getAll();

        $this->render('home', 'Les articles', [
            'articles' => $articles,
        ]);
    }

    /**
     *  add an article into DBB
     */
    public function addArticle()
    {
        if (isset( $_POST['title'],$_POST['content'])) {
            $articleManager = new ArticleManager();

            $title = htmlentities($_POST['title']);
            $content = htmlentities($_POST['content']);

            $article = new Article();
            $article->setContent($content)->setTitle($userFk);
            $articleManager->add($article);

            $controller = new HomeController();
            $controller->homePage(6);
        } else {
            $this->render('add.article', 'Ajouter un article');
        }
    }

    /**
     * Poster article page
     * @param $id
     */
    public function readArticle($id)
    {
        $article = ArticleManager::getManager()->get($id);
        $comment = CommentaryManager::getManager()->getAll($article->getId());
        $this->render('article', 'Article', [
            "article" => $article,
            "comment" => $comment
        ]);
    }

    /**
     * delete an article
     */
    public function deleteArticle()
    {
        $controller = new HomeController();

        if (isset($_GET['article'])) {
            $article = ArticleManager::getManager()->get($_GET['article']);
            if (ArticleManager::getManager()->delete($article)) {
                $controller->homePage($vars);
            } else {
                $controller->homePage($vars);
            }
        } else {
            $controller->homePage($vars);
        }
    }

}
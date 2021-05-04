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
     * Poster home page with all article
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
     * Poster create article page and add an article into table article
     */
    public function addArticle()
    {
        if (isset($_POST['content'], $_POST['subTitle'], $_POST['title'], $_POST['resume'])) {
            $articleManager = new ArticleManager();

            $content = htmlentities($_POST['content']);
            $title = htmlentities($_POST['title']);
            $subTitle = htmlentities($_POST['subTitle']);
            $resume = htmlentities($_POST['resume']);

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
     * Poster update article or articles page and update article choice
     * @param int|null $id
     */
    public function updateArticle(?int $id = null)
    {
        if (isset($_POST['content'], $_POST['user_fk'])) {
            $articleManager = new ArticleManager();

            $content = htmlentities($_POST['content']);
            $user = htmlentities($_POST['user_fk']);


            $article = ArticleManager::getManager()->get($id);
            $article->setContent($content)->setUserFk($user);
            $controller = new HomeController();

            if ($articleManager->update($article)) {
                $controller->homePage(7);
            } else {
                $controller->homePage(3);
            }

        } elseif ($id != null) {
            $article = ArticleManager::getManager()->get($id);
            $this->render('update.article', 'Modifier un article', [
                'article' => $article,
            ]);
        } else {
            $manager = new ArticleManager();
            $articles = $manager->getAll();

            $this->render('update.articles', 'Modifier un article', [
                'articles' => $articles,
            ]);
        }
    }

    /**
     * Poster home page and delete an article
     */
    public function deleteArticle()
    {
        $controller = new HomeController();

        if (isset($_GET['article'])) {
            $article = ArticleManager::getManager()->get($_GET['article']);
            if (ArticleManager::getManager()->delete($article)) {
                $controller->homePage(8);
            } else {
                $controller->homePage(3);
            }
        } else {
            $controller->homePage(3);
        }
    }
}
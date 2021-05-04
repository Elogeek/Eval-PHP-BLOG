<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;
use Model\Entity\Comment;
use Model\Manager\ArticleManager;
use Model\Manager\CommentaryManager;
use Model\User\UserManager;

class CommentController
{
    use RenderViewTrait;

    /**
     * Poster article page and add commentary into table comment
     */
    public function add() {
        $article = ArticleManager::getManager()->get($_GET['article']);

        if(isset($_POST['comment'], $_SESSION['id'])) {
            $comment = htmlentities($_POST['comment']);
            $commentary = new Comment();
            $user = UserManager::getManager()->getById($_SESSION['id']);

            $commentary->setContent($comment)->setArticleFk($article)->setUserFk($user);

            if(CommentaryManager::getManager()->add($commentary)) {
                $comment = CommentaryManager::getManager()->getAll($article->getId());
                $this->render('article', 'Article', [
                    "article" => $article,
                    "comment" => $comment
                ]);
            }
        }
        else {
            $comment = CommentManager::getManager()->getAll($article->getId());
            $this->render('article', 'Article', [
                "article" => $article,
                "comment" => $comment,
                "error" => "9"
            ]);
        }
    }

    /**
     * Poster article page and delete a comment
     */
    public function delete() {
        if(isset($_GET['comment'])) {
            $comment = CommentaryManager::getManager()->get($_GET['comment']);
            if(CommentaryManager::getManager()->delete($comment)) {
                $article = ArticleManager::getManager()->get($_GET['article']);
                $comment = CommentaryManager::getManager()->getAll($article->getId());
                $this->render('article', 'Article', [
                    "article" => $article,
                    "comment" => $comment
                ]);
            }
        }
    }
}
<?php

namespace Model\Manager;

use Model\Entity\Article;
use Model\Entity\User;
use  Model\Manager\Traits\ManagerTrait;
use  Model\DB\DB;
use PDO;
use  Model\User\UserManager;

require_once 'include.php';
class ArticleManager {

    use ManagerTrait;

    /**
     * Return all articles.
     */
    public function getAll(): array
    {
        $articles = [];
        $request = DB::getInstance()->prepare("SELECT * FROM Article");
        $result = $request->execute();
        if ($result) {
            $data = $request->fetchAll();
            foreach ($data as $article_data) {
                $user = UserManager::getManager()->getById($article_data['author']);
                if ($user->getId()) {
                    $articles[] = new Article($article_data['id'],$article_data['title'],$article_data['content'],$user);
                }
            }
        }
        return $articles;
    }

    /**
     * Add an article into the DTB.
     * @param Article $article
     * @return bool
     */
    public function addArticle(Article $article)
    {
        $request = DB::getInstance()->prepare("
            INSERT INTO article (title, content, author_fk)
                VALUES (:title,:content, :author) 
        ");
        $request->bindValue(':title', $article->getTitle());
        $request->bindValue(':content', $article->getContent());
        $request->bindValue(':author', $article->getAuthor()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /** Delete an article  in the DTB via ID
     * @param Article $article
     * @return bool
     */
    public function deleteArticle(Article $article) {
        $request = \DB::getInstance()->prepare("DELETE FROM Article WHERE id =''");
        return $request->execute();
    }

}
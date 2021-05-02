<?php

namespace Model\Manager;

use \Model\Entity\Article;
use \Model\Entity\User;
use  Model\Manager\Traits\ManagerTrait;
use  Model\DB;
use PDO;
use  Model\User\UserManager;

require_once 'include.php';
class ArticleManager {

    use ManagerTrait;

    /**
     * Return all articles.
     */
    public function getAll(): array {
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
    public function addArticle(Article $article) {
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
    public function deleteArticle($id) {
        $request = \DB::getInstance()->prepare("DELETE FROM Article WHERE id = :id");
        $request->bindValue(":id", $id);
        return $request->execute();
    }

    /** Edit an article
     * @param $id
     * @param $content
     */
    public function editArticle($id, $content){
        $request = \DB::getInstance()->prepare("UPDATE article SET content = :content WHERE id = :id");
        $request->bindValue(":content", DB::secureData($content));
        $request->bindValue(":id", $id);
        $request->execute();
    }


}
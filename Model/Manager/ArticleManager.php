<?php

namespace Model\Manager;

use App\Entity\Article;
use DB;
use Model\Manager\Traits\ManagerTrait;

require_once 'include.php';

class ArticleManager {
    use ManagerTrait;

    /**
     * Return all article
     */
    public function getAll(): array {
        $articles = [];
        $request = DB::getInstance()->prepare("SELECT * FROM Article");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $article_data) {
                $articles[] = new Article($article_data['id'],$article_data['title'], $article_data['content'], $article_data['author_fk']);
            }
        }
        return $articles;
    }

    /**
     * Return an Article or null
     * @param $id
     * @return Article
     */
    public function get($id): ?Article {
        $request = DB::getInstance()->prepare("SELECT * FROM Article WHERE id = :id");
        $request->bindValue(':id', $id);
        $result = $request->execute();
        $article = null;

        if($result && $data = $request->fetch()) {
            $article = new Article($data['id'],$data['title'], $data['content'], $data['author_fk']);
        }

        return $article;
    }

    /**
     * Add an article into the database
     * @param Article $article
     * @return bool
     */
    public function add(Article $article): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO Article (title,content, author_fk)
                VALUES (:title, :content, :author) 
        ");
        $request->bindValue(':title', $article->getTitle());
        $request->bindValue(':content', $article->getContent());
        $request->bindValue(':author', $article->getAuthorFk());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * Update an article into the database
     * @param Article $article
     * @return bool
     */
    public function update(Article $article): bool {
        $request = DB::getInstance()->prepare("UPDATE Article SET content = :content,title = :title, author_fk = :author WHERE id = :id");
        $request->bindValue(':id', $article->getId());
        $request->bindValue(':title', $article->getTitle());
        $request->bindValue(':content', $article->getContent());
        $request->bindValue(':author', $article->getAuthorFk());

        return $request->execute();
    }

    /**
     * Delete an article into the database
     * @param Article $article
     * @return bool
     */
    public function delete(Article $article): bool {
        $request = DB::getInstance()->prepare("DELETE FROM Article WHERE id = :id");
        $request->bindValue(':id', $article->getId());

        return $request->execute();
    }
}
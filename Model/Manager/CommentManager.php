<?php

namespace Model\Manager;

use Model\Manager\Traits\ManagerTrait;
use Model\DB;
use Model\Entity\Comment;
use Model\User\UserManager;

class CommentaryManager {
use ManagerTrait;

    /**
     * Get all comment of an article
     * @param $article_fk
     * @return array
     */
    public function getAll($article_fk): array {
        $commentaries = [];

        $request = DB::getInstance()->prepare("SELECT * FROM commentaire WHERE article_fk = :article_fk");
        $request->bindValue(':article_fk', $article_fk);
        $result = $request->execute();

        if ($result && $data = $request->fetchAll()) {
            foreach ($data as $comment) {
                $user = UserManager::getManager()->getById($comment['user_fk']);
                $article = ArticleManager::getManager()->get($comment['article_fk']);
                $commentaries [] = new Comment($comment['id'], $comment['content'], $user, $article);
            }
        }
        return $commentaries;
    }

    /**
     * Get a comment by id
     * @param $id
     * @return Comment|null
     */
    public function get($id): ?Comment {
        $request = DB::getInstance()->prepare("SELECT * FROM commentaire WHERE id = :id");
        $request->bindValue(':id', $id);
        $result = $request->execute();
        $comment = null;

        if ($result && $data = $request->fetch()) {
            $user = UserManager::getManager()->getById($data['user_fk']);
            $article = ArticleManager::getManager()->get($data['article_fk']);
            $comment = new Comment($comment['id'], $comment['content'], $user, $article);

        }

        return $comment;
    }

    /** Add a comment into the table commentaire
     * @param Comment $comment
     * @return bool
     */
    public function add(Comment $comment): bool
    {
        $request = DB::getInstance()->prepare("INSERT INTO commentaire(content, user_fk, article_fk) VALUES (:content, :user_fk, :article_fk)");
        $request->bindValue(":content", $comment->getContent());
        $request->bindValue(":user_fk", $comment->getUserFk()->getId());
        $request->bindValue("article_fk", $comment->getArticleFk()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * Update a comment into the table commentaire
     * @param Comment $comment
     * @return bool
     */
    public function update(Comment $comment): bool
    {
        $request = DB::getInstance()->prepare("UPDATE commentaire SET content = :content WHERE id = :id");
        $request->bindValue(":content", $comment->getContent());
        $request->bindValue(":id", $comment->getId());

        return $request->execute();
    }

    /**
     * Delete a comment into the table commentaire
     * @param Comment $comment
     * @return bool
     */
    public function delete(Comment $comment): bool
    {
        $request = DB::getInstance()->prepare("DELETE FROM commentaire WHERE id = :id");
        $request->bindValue(":id", $comment->getId());

        return $request->execute();
    }
}
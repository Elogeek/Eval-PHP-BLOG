<?php

namespace Model\Manager;


use App\Entity\Comment;
use Model\Entity\Article;
use Model\Entity\User;
use Model\Manager\Traits\ManagerTrait;
use Model\DB;
use Model\User\UserManager;

class CommentManager {
    use ManagerTrait;

    /**
     * Return all comments
     */
    public function getAll(): array
    {
        $comments = [];
        $request = DB::getInstance()->prepare("SELECT * FROM Commentaire");
        $result = $request->execute();
        if ($result) {
            $data = $request->fetchAll();
            foreach ($data as $comment_data) {
                $user = UserManager::getManager()->getById($comment_data['user_fk']);
                if ($user->getId()) {
                    $comments[] = new Comment($comment_data['id'],$comment_data['content'],$comment_data['user_fk'],$comment_data['author']);
                }
            }
        }
        return $comments;
    }

    /**
     * Add a comment  in  the DTB.
     * @param Comment $article
     * @return bool
     */
    public function addComment(Comment $comment)
    {
        $request = DB::getInstance()->prepare("
            INSERT INTO Commentaire(content, user_fk,article_fk)
                VALUES (:content,:userFK, :articleFK) 
        ");

        $request->bindValue(':content', $comment->getContent());
        $request->bindValue(':ufk', $comment->getUser()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    //TODO delete comment?
}
<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;
use Model\Manager\ArticleManager;

class HomeController
{

    use RenderViewTrait;

    /**
     * Poster home page
     * @param int|null $error
     */
    public function homePage(?int $error = null)
    {
        $articles = array_reverse(ArticleManager::getManager()->getAll());
        if (count($articles) > 3) {
            $articles = array_slice($articles, 0, 3);
        }

        $this->render('home', 'Ma home page', [
            "articles" => $articles,
            "error" => $error
        ]);
    }

}
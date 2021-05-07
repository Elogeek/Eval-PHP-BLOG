<?php
session_start();

require_once './include.php';

use \Model\Manager\CommentManager;
use Controller\HomeController;
use Controller\ArticleController;
use Controller\UserController;


if(isset($_GET['controller'])) {
    switch($_GET['controller']) {
        case 'articles':
            $controller = new ArticleController();

            if(isset($_GET['action'])) {
                switch($_GET['action']) {
                    case 'new' :
                        $controller->addArticle();
                        break;

                    case 'read':
                        $controller->readArticle($_GET['article']);
                        break;

                    case 'readAll':
                        $controller->articles();
                        break;


                    case 'delete':
                        $controller->deleteArticle();
                        break;

                    default:
                        break;
                }
            }
            else {
                $controller->articles();
            }
            break;


        case 'comment':
            $controller = new CommentManager();

            if(isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'add':
                        $controller->add();
                        break;

                    case 'delete':
                        $controller->delete();
                        break;

                    default:
                        break;
                }
            }
            break;

        default:
            break;
    }
}
else {
    $controller = new HomeController();
    $controller->homePage();
}
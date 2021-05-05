<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/View/_partials/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/View/_partials/footer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/Traits/ManagerTrait.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/Traits/RenderViewTrait.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Article.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Comment.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/ArticleManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/CommentManager.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/HomeController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/ArticleController.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/php/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/disconnection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/register.php';


<?php
require_once './Model/DB.php';
require_once './Model/Manager/Traits/ManagerTrait.php';
require_once './Controller/Traits/RenderViewTrait.php';

require_once './Model/Entity/User.php';
require_once './Model/Entity/Article.php';
require_once './Model/Entity/Comment.php';

require_once './Model/Manager/ArticleManager.php';
require_once './Model/Manager/UserManager.php';
require_once './Model/Manager/CommentManager.php';

require_once './Controller/HomeController.php';
require_once './Controller/ArticleController.php';

require_once './assets/php/admin.php';
require_once  './assets/php/connect.php';
require_once './assets/php/disconnection.php';
require_once './assets/php/signUp.php';
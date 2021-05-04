<?php

namespace Controller;

use App\Entity\User;
use Controller\Traits\RenderViewTrait;
use Model\DB;
use Model\Entity\Role;
use Model\Entity\User;
use Model\User\UserManager;


class UserController {

    use RenderViewTrait;

    /**
     * Poster login page and create sessions (id, username and role) if the information is correct
     */
    public function existEmail() {
        if(isset($_POST['email'], $_POST['password'])) {
            $user_data = UserManager::getManager()->existEmail($_POST['email']);
            if($user_data != null) {
                if(password_verify($_POST['password'], $user_data->getPassword())) {
                    $_SESSION['id'] = $user_data->getId();
                    $_SESSION['name'] = $user_data->gatName();
                    $_SESSION['PSEUDO'] = $user_data->getPseudo();
                    $_SESSION['role'] = $user_data->getRole()->getId();

                    $controller = new HomeController();
                    $controller->homePage();
                }
                else {
                    $this->render('login', 'Connexion', [
                        'error' => "5",
                    ]);
                }
            }
            else {
                $this->render('login', 'Connexion', [
                    'error' => "4",
                ]);
            }
        }
        $this->render('login', 'Connexion');
    }

    /**
     * Poster create page and add a user in table User if conditions is clear
     */
    public function create() {
        if(isset($_POST['username'], $_POST['password'], $_POST['mail'])) {
            $name = \DB::secureData($_POST['name']);
            $pseudo = \DB::secureData($_POST['pseudo']);
            $email = \DB::secureData($_POST['email']);
            $password = \DB::secureData($_POST['password']);

            if(!\DB::encodePassword($password)) {
                $this->render('newUser', 'Création de compte', [
                    'error' => "1",
                ]);
            }
            elseif(UserManager::getManager()->existEmail($email) != null) {
                $this->render('newUser', 'Création de compte', [
                    'error' => "2",
                ]);
            }
            else {
                $user = new User($name, $pseudo, $email, $password, new Role();
                $add = UserManager::getManager()->addUser($user);

                if($add) {
                    $controller = new HomeController();
                    $controller->homePage("0");
                }
                else {
                    $this->render('newUser', 'Création de compte', [
                        'error' => "3",
                    ]);
                }
            }
        }

        $this->render('newUser', 'Création de compte');
    }

    /**
     * Poster home page and disconnect user
     */
    public function logout() {
        if(isset($_SESSION['id'], $_SESSION['username'], $_SESSION['role'])) {
            $_SESSION = array();
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
            session_destroy();

            $controller = new HomeController();
            $controller->homePage();
        }
    }
}
<?php

namespace Controller;

use App\Entity\User;
use Controller\Traits\RenderViewTrait;
use Model\DB;
use Model\User\UserManager;

class UserController {

    use RenderViewTrait;

    /**
     * si l'email exist déjà
     */
    public function existEmail() {
        if(isset($_POST['email'], $_POST['password'])) {
            $user_data = UserManager::getManager()->existEmail($_POST['email']);
            if($user_data != null) {
                if(password_verify($_POST['password'], $user_data->getPassword())) {
                    $_SESSION['id'] = $user_data->getId();
                    $_SESSION['name'] = $user_data->gatName();
                    $_SESSION['pseudo'] = $user_data->getPseudo();
                    $_SESSION['role'] = $user_data->getRole()->getId();

                    $controller = new HomeController();
                    $controller->homePage();
                }
                else {
                    $this->render('connection', 'Connexion', [
                       'page'=> "connection",
                    ]);
                }
            }

             // si il n'existe pas, alors on créer le compte

            if(isset($_POST['username'], $_POST['password'], $_POST['mail'])) {
                $name = \DB::secureData($_POST['name']);
                $pseudo = \DB::secureData($_POST['pseudo']);
                $email = \DB::secureData($_POST['email']);
                $password = \DB::secureData($_POST['password']);

                if (!\DB::encodePassword($password)) {
                    $this->render('register', 'Création de compte', [
                        'page' =>  "register",
                    ]);
                } elseif (UserManager::getManager()->existEmail($email) != null) {
                    $this->render('register', 'Création de compte', [
                        'page' => "register",
                    ]);
                } else {
                    $user = new User($name, $pseudo, $email, $password);
                    $add = UserManager::getManager()->add($user);

                    if ($add) {
                        (new HomeController())->homePage();
                    }
                }
            }
        }
    }

    /**
     * Affiche la page de connexion.
     */
    public function connexionPage() {
        $user = 'Anonymous';
        $var = [];
        if(isset($_GET["error"])) {
            if(isset($_GET["color"])){
                $color = $_GET["color"];
            }
            else{
                $color = "red";
            }
            $var = ["error" => $_GET["error"], "color" => $color];
        }

        $this->render('connexion', 'Connexion', $var);
    }




}
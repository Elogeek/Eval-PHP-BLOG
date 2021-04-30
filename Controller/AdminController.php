<?php
namespace Controller;

use Controller\Traits\RenderViewTrait;

class AdminController {

    use RenderViewTrait;

    /**
     * Affiche la page admin, si l'id est égal à 1.
     */
    public function adminPage() {
        if(isset($_SESSION['admin'])) {
            $admin = $_SESSION['admin']= $_SESSION['id']= 1;
            $this->adminPage();
            session_start();
            $this->render('admin', 'Mon espace super admin');
                }

            //si c'est un user et qu'il est plus grand que 1 alors ===> retour à l'accueil du blog
            $user = 'Anonymous';
            if(isset($_SESSION['user'] && !isset($_SESSION['user']) > 1)) {
                $user = $_SESSION['user'];
            }
            $this->render('home', 'Mon blog', [
                'user' => $user,
            ]);
    }

}
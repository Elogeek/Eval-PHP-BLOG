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
        }
        $user = 'Anonymous';
        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }

        $this->render('home', 'Mon blog', [
            'user' => $user,
        ]);
    }

}
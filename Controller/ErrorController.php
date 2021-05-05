<?php

class ErrorController extends Controller {

    /**
     * Display 404 not found page.
     */
    public function notFound() {
        $this->render('404', 'NOFOUND', [
            'page' => $_GET['ctrl']
        ]);
    }
}
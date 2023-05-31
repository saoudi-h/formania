<?php

namespace Formania\Controllers;

require_once 'BaseController.php';

use Formania\Controllers\BaseController;

class HomeController extends BaseController
{

    /**
     * Cette méthode affiche la page d'accueil
     *
     * @return void
     */
    public function index()
    {
        $page = [
            "name" => "Home",
            "method" => "GET",
            "title" => "Page d'accueil",
            "description" => "Bienvenue sur la plateforme d'e-learning",
            "css" => [
                // "/css/index.css"
            ],
            "js" => [
                // "/js/index.js"
            ],
        ];

        require_once ROOT . '../views/components/head.php';
        require_once ROOT . '../views/components/header.php';
        require_once ROOT . '../views/home.php';
        require_once ROOT . '../views/components/footer.php';
    }
}

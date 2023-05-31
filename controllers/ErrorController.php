<?php

namespace Formania\Controllers;

require_once 'BaseController.php';

require_once '..\App\Config.php';

use Formania\Controllers\BaseController;

use Formania\App\Config;

class ErrorController extends BaseController
{

    /**
     * Méthode permettant d'afficher un cours à partir de son slug
     *
     * @param string $slug
     * @return void
     */
    public function show(string $message)
    {
        if (!Config::SHOW_ERRORS) {
            // Redirection vers la page 404 si le debug est a false
            header("Location: /404");
            exit;
        }

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
        echo '<div>' . $message . '</div>';
        require_once ROOT . '../views/components/footer.php';
    }
}

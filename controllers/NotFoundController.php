<?php

namespace Formania\Controllers;

require_once 'BaseController.php';

use Formania\Controllers\BaseController;

class NotFoundController extends BaseController
{

    /**
     * Cette méthode affiche la page 404 Not Found.
     *
     * @return void
     */
    public function index()
    { {
            $page = [
                "name" => "notFound",
                "method" => ["GET"],
                "title" => "Page Introuvable",
                "description" => "Erreur 404 | Page Introuvable !",
                "css" => [
                    "/css/notFound.css"
                ],
                "js" => [
                    "/js/notFound.js"
                ],
            ];
            header("HTTP/1.0 404 Not Found");
            require_once ROOT . '../views/components/head.php';
            require_once ROOT . '../views/components/header.php';
            require_once ROOT . '../views/notFound.php';
            require_once ROOT . '../views/components/footer.php';
            exit;
        }
    }
}

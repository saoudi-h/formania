<?php

namespace Formania\Controllers;

require_once 'BaseController.php';

use Formania\Controllers\BaseController;

class LoginController extends BaseController
{


    /**
     * Cette méthode affiche le formulaire de connexion
     *
     * @return void
     */
    public function index()
    {
        $page = [
            "name" => "login",
            "method" => "GET",
            "title" => "Connexion",
            "description" => "Connectez-vous à votre compte",
            "css" => [
                "/css/login.css"
            ],
            "js" => [
                "/js/login.js"
            ],
        ];

        require_once ROOT . '../views/components/head.php';
        require_once ROOT . '../views/components/header.php';
        require_once ROOT . '../views/login.php';
        require_once ROOT . '../views/components/footer.php';
    }
    /**
     * Cette méthode connect l'utilisateur
     *
     * @return void
     */
    public function login()
    {
        echo "<div>login Home world</div>";
        // On instancie le modèle "Course"
        $this->loadModel('Course');

        // On stocke la liste des Courses dans $Courses
        // $Courses = $this->Course->getAll();

        // On envoie les données à la vue index
        // $this->render('index', compact('Courses'));
    }
}

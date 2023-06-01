<?php

namespace Formania\Controllers;

require_once 'BaseController.php';

use Formania\Controllers\BaseController;

require_once '../models/User.php';

use Formania\Models\User;

require_once '../App/FlashMessage.php';

use Formania\App\FlashMessage;


require_once '../App/Authentification.php';

use Formania\App\{Autentification, Role};

class RegisterController extends BaseController
{

    protected $allowedRoles = [Role::notAuthenticated];


    /**
     * Cette méthode affiche le formulaire de d'inscription.
     *
     * @return void
     */
    public function index()
    {
        $page = [
            "name" => "register",
            "method" => "GET",
            "title" => "Page d'inscription",
            "description" => "Inscrivez-vous pour profiter d'un maximum de contenu.",
            "css" => [
                // "assets/css/index.css"
            ],
            "js" => [
                // "assets/js/index.js"
            ],
        ];

        require_once ROOT . '../views/components/head.php';
        require_once ROOT . '../views/components/header.php';
        require_once ROOT . '../views/register.php';
        require_once ROOT . '../views/components/footer.php';
    }

    /**
     * Cette méthode affiche le formulaire de d'inscription.
     *
     * @return void
     */
    public function register()
    {
        $user = new User($_POST);
        $errors = $user->validate();



        if (count($errors) === 0) {
            $res = $user->register();
            if (!$res) {
                FlashMessage::set('danger', 'Une erreur est survenue');
                header("Location: /register");
                exit;
            } else {
                FlashMessage::set('success', 'Votre inscription a été prise en compte. Veuillez confirmer votre inscription en cliquant sur le lien reçu par email.');
                header("Location: /");
                exit;
            }
        }
        $errorsMessage = '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';
        FlashMessage::set('warning', $errorsMessage);
        header("Location: /register");
        exit;
    }
}

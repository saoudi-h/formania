<?php

namespace Formania\Controllers;

require_once 'BaseController.php';
require_once '../App/FlashMessage.php';
require_once '../models/UserModel.php';
require_once '../models/User.php';

use Exception;
use Formania\App\FlashMessage;
use Formania\Controllers\BaseController;
use Formania\Models\User;
use Formania\Models\UserModel;


require_once '../App/Authentification.php';

use Formania\App\{Autentification, Role};

class LoginController extends BaseController
{


    protected $allowedRoles = [Role::notAuthenticated];
    /**
     * Cette méthode affiche le formulaire de connexion
     *
     * @return void
     */
    public function index()
    {
        $this->redirectUnauthorized('profile');

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
        $this->redirectUnauthorized('profile');
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $userModel = new UserModel();
            try {
                $userData = $userModel->getByUnique('email', $_POST['email']);
                if (!isset($userData['email'])) {
                    $warningMessage = 'Email incorrecte.';
                    FlashMessage::set('warning', $warningMessage);
                    header('location: login');
                    exit;
                }
                $user = new User($userData);
            } catch (Exception $e) {
                $errorMessage = 'Erreur innatendu.';
                FlashMessage::set('danger', $errorMessage);
                header('location: login');
                exit;
            }
            if ($user->checkPassword($_POST['password'])) {
                $userModel->login($user);
                $successMessage = 'Connexion réussi.';
                FlashMessage::set('success', $successMessage);
                // header('location: profile');
                // exit;
            }
            $warningMessage = 'Mot de passe incorrect.';
            FlashMessage::set('warning', $warningMessage);
            header('location: login');
            exit;
        } else {
            $dangerMessage = 'Une erreur est survenue veuillez réessayer.';
            FlashMessage::set('danger', $dangerMessage);
            header('location: /login');
            exit;
        }
    }
}

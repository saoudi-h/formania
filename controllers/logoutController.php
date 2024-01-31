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

use Formania\App\{Autentification, Authentification, Role};

class LogoutController extends BaseController
{


    protected $allowedRoles = [Role::administrator, Role::former, Role::student];

    /**
     * Cette méthode connect l'utilisateur
     *
     * @return void
     */
    public function logout()
    {
        $this->redirectUnauthorized('profile');
        Authentification::restartSession();
        Authentification::initAuthentification();
        header('location .');
    }
}

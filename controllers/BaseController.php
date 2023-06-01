<?php

namespace Formania\Controllers;

require_once '../App/Authentification.php';
use Formania\App\Autentification;



class BaseController
{

    /**
     *store all authorized role
     */
    protected $allowedRoles = [];

    /**
     * Permet de charger un modèle
     *
     * @param string $model
     * @return void
     */
    public function loadModel(string $model)
    {
        // On va chercher le fichier correspondant au modèle souhaité
        require_once(ROOT . '/models/' . $model . '.php');

        $this->$model = new $model();
    }

    /**
     * Afficher une vue
     *
     * @param string $fichier
     * @param array $data
     * @return void
     */
    public function render(string $fichier, array $data = [])
    {
        extract($data);

        require_once(ROOT . 'views/' . strtolower(get_class($this)) . '/' . $fichier . '.php');
    }
}

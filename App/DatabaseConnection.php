<?php


namespace Formania\App;

use PDO;
use PDOException;

require_once 'Config.php';
use Formania\App\Config;

class DatabaseConnection
{
    private static $instance;
    private $connection;

    private function __construct()
    {
        // Initialisation de la connexion à la base de données
        $this->connection = new PDO("mysql:host=".Config::DB_HOST.";dbname=".config::DB_NAME, Config::DB_USER, Config::DB_PASSWORD);
        $this->connection->exec("set names utf8");
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
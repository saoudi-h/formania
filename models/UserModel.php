<?php


namespace Formania\Models;

require_once 'BaseModel.php';
require_once '../App/Authentification.php';
require_once 'User.php';

use Formania\App\Authentification;
use Formania\Models\BaseModel;
use Formania\Models\User;

class UserModel extends BaseModel
{
    protected $table = "user";
    protected $fields = ['id', 'firstname', 'lastname', 'username', 'email', 'password', 'status', 'birthdate', 'gender', 'phone', 'created_at', 'updated_at'];
    protected $uniques = ['email'];


    public function login(User $user)
    {

        if (isset($_SESSION['authenticated']) && !$_SESSION['authenticated']) {
            // Récupérer l'ID de session à partir de la variable de session
            $sessionId = self::generateSessionId();


            // Vérifier si une entrée pour cet utilisateur existe déjà dans la table de session
            $query = "INSERT INTO session (user_id, session_id, is_active) 
                      VALUES (:user_id, :session_id, 1) 
                      ON DUPLICATE KEY UPDATE session_id = :session_id, is_active = 1";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':user_id', $user->id);
            $stmt->bindParam(':session_id', $sessionId);
            $res = $stmt->execute();

            if (!$res) return false;

            $_SESSION['session_id'] = $sessionId;
            $_SESSION['role'] = Authentification::getRoleFrom($user->role);
            $_SESSION['authenticated'] = true;
            $_SESSION['user_name'] = $user->userName;
            $_SESSION['gravatar'] = $user->getGravatar();
            return true;
        }
    }

    public function logout()
    {
        if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
            $sessionId = $_SESSION['session_id'];

            $query = "UPDATE session SET is_active = 0 WHERE session_id = :session_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':session_id', $sessionId);
            $res = $stmt->execute();

            if (!$res) {
                return false;
            }

            Authentification::restartSession();
            Authentification::initAuthentification();
            return true;
        }
    }

    public static function generateSessionId()
    {
        return bin2hex(random_bytes(16));
    }
}

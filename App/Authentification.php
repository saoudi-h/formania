<?php

namespace Formania\App;

enum Role
{
    case administrator;
    case former;
    case student;
    case notAuthenticated;
}


class Authentification
{

    // $_SESSION['user_id'];
    // $_SESSION['authenticated'];
    // $_SESSION['role'];


    public static function initAuthentification()
    {
        // vérifier si l'utilisateur actuel a déja une session
        if (!isset($_SESSION['authenticated'])) {
            self::restartSession();
            $_SESSION['authenticated'] = false;
            $_SESSION['role'] = Role::notAuthenticated;
        }
    }

    public static function initSession()
    {
        // securiser la session
        ini_set('session.cookie_secure', '1');
        ini_set('session.cookie_httponly', '1');
        ini_set('session.gc_maxlifetime', 1800);
        ini_set('session.use_strict_mode', '1');
        ini_set('session.sid_length', '64');
        ini_set('session.sid_bits_per_character', '6');
        ini_set('session.entropy_length', '32');
        ini_set('session.entropy_file', '/dev/urandom');

        // Démarre la session
        session_start();
    }

    public static function restartSession()
    {
        $_SESSION = array();
        session_destroy();
        session_start();
    }
    public static function getRoleFrom($strRole)
    {
        $role = null;
        switch ($strRole) {
            case 'student':
                $role = Role::student;
                break;
            case 'former':
                $role = Role::former;
                break;
            case 'administrator':
                $role = Role::administrator;
                break;
        }
        return $role;
    }
}

<?php

namespace Formania\App;

class FlashMessage
{
    public static function set($type, $message)
    {
        $_SESSION['flash_message']['type'] = $type;
        $_SESSION['flash_message']['message'] = $message;
        session_write_close();
    }

    public static function display()
    {
        if (isset($_SESSION['flash_message'])) {
            $type = $_SESSION['flash_message']['type'];
            $message = $_SESSION['flash_message']['message'];

            // Affichage du message selon le type (warning, success)
            echo '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert"><div>' . $message . '</div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

            // Suppression du message de la session
            unset($_SESSION['flash_message']);
        }
    }
}

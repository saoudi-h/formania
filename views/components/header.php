<?php
require_once '../App/FlashMessage.php';

use Formania\App\FlashMessage;

?>
<header>
    <?php


    require_once __DIR__ . '/navBar.php';
    FlashMessage::display();
    if ($page['name'] === 'Home')
        require_once __DIR__ . '/Landing.php';

    ?>
</header>